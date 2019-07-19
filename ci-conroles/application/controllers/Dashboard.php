<?php

class Dashboard extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model(['useradmins_m', 'usuario', 'lugar', 'nota']);
        $this->load->helper('url');
        $this->load->helper('form');
        $this->load->library('session');
        $this->load->library('form_validation');
    }

    public function index()
    {
        //dashboard
        if (! $this->session->userdata('logged_in')) {
            redirect('dashboard/login');
        }
        $data['cantidad_usuarios'] = $this->usuario->count_rows();
        $data['cantidad_lugares'] = $this->lugar->count_rows();
        $data['cantidad_notas'] = $this->nota->count_rows();
        $data['title'] = 'Bienvenido';
        $data['menu'] = 'control/pixel-admin/empty';
        $data['content'] = 'control/pixel-admin/control_index';
        $this->load->view('control/pixel-admin/control_layout', $data);
    }

    public function login()
    {
        $this->form_validation->set_rules('email', 'Email', 'required|trim');
        $this->form_validation->set_rules('password', 'Password', 'required|trim');

        #Paso validacion
        if ($this->form_validation->run()) {

        //Coinciden los datos
            if ($this->useradmins_m->try_login($this->input->post('email'), $this->input->post('password'))) {
                redirect('/control');
            }
            //no coinciden datos
            else {
                $this->session->set_flashdata('error', 'No se encuentran usuario con esos datos.');
                redirect('dashboard/login', 'refresh');
            }
        }
        //No paso la validacion
        $data['content'] = 'control/login';
        $this->load->view('control/modal_layout', $data);
    }

    public function logout()
    {
        $this->useradmins_m->logout();
        $data['content'] = 'control/pixel-admin/login';
        $this->load->view('control/pixel-admin/modal_layout', $data);
    }
}
