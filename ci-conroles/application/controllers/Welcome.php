<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Welcome extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('usuario');
        $this->load->model('imagenes_usuario');
        $this->load->model('imagenes_nota');
        $this->load->model('evento');
        $this->load->model('nota');
        $this->load->helper('url');
        $this->load->helper('form');
        $this->load->library('session');
        $this->load->library('form_validation');
    }

    public function index()
    {
        $data['notas'] = $this->nota->traer_home();
        $data['eventos'] = $this->evento->get_lasts($num=3);
        $data['ultimo_evento'] = $this->evento->get_lasts($num=1);
        $this->load->view('frontend_main', $data);
    }

    public function register()
    {
        $data['content'] = 'frontend/login-and-signup';
        $this->load->view('frontend_main', $data);
    }

    public function login()
    {
        $data['content'] = 'frontend/login-and-signup';
        $this->load->view('frontend_main', $data);
    }

    public function check_login()
    {
        $this->output->enable_profiler(true);

        $this->form_validation->set_rules('email', 'Email', 'required|trim');
        $this->form_validation->set_rules('password', 'Password', 'required|trim');

        #Paso validacion
        if ($this->form_validation->run()) {
            $this->session->set_flashdata('error', 'por checuqerar.');
            //Coinciden los datos

            if ($this->usuario->check_credentials($this->input->post('email'), $this->input->post('password'))) {
                $this->session->set_flashdata('success', 'Bienvenido.');
                redirect('/');
            } else {
                //no coinciden datos
                $this->session->set_flashdata('error', 'No se encuentran usuario con esos datos.');
                redirect('login', 'refresh');
            }
        }
        //No paso la validacion
        $this->session->set_flashdata('error', 'nada para check.');
        $data['content'] = 'frontend/login-and-signup';
        $this->load->view('frontend_main', $data);
    }

    public function logout()
    {
        $this->session->set_flashdata('success', 'Sesion finalizada.');
        redirect('/', 'refresh');
    }

    //valida si existe un user con esa direccion de email
    public function email_check($email)
    {
        return $this->usuario->check_email_exist($this->input->post('email'));
    }



    public function process_registration()
    {
        $this->load->helper('form');
        $this->load->library('form_validation');
        $this->form_validation->set_rules('nickname', 'Nickname', 'required');
        $this->form_validation->set_rules('password', 'Password', 'required');
        $this->form_validation->set_rules('email', 'Email', 'required|is_unique[usuarios.email]|valid_email');
        $this->form_validation->set_rules('nombre', 'Nombre', 'required');

        $this->form_validation->set_message('is_unique', 'Existe registro con ese mail.');

        if ($this->form_validation->run() === false) {
            $this->load->helper('form');
            $data['content'] = 'frontend/login-and-signup';
            $this->load->view('frontend_main', $data);
        } else {

            #$user_salt = password_hash($this->input->post('password'), PASSWORD_BCRYPT);
            // set default time zone if not set at php.ini
            if (!date_default_timezone_get('date.timezone')) {
                date_default_timezone_set('America/Buenos_Aires');
            }
            $ahora = date("Y-m-d H:i:s");
            //encrypto

            $salt = md5(uniqid(rand(), true));
            $hash = hash('sha512', $salt.$this->input->post('password'));
            $nick_sanitizado = url_title($this->input->post('nickname'), 'dash', true);

            $newusuario = array(
                'nickname' => $nick_sanitizado,
                'password' => $hash,
                'salt' => $salt,
                'email' => $this->input->post('email'),
                'nombre' => $this->input->post('nombre')
                );

            $id_insert = $this->usuario->add_record($newusuario);
            $this->session->set_userdata(array(
                    'user_id' => $id_insert,
                    'user_email' => $this->input->post('email')
                    ));

            $this->session->set_flashdata('success', 'Cuenta creada!');
            redirect('/', 'refresh');
        }
    }





}
