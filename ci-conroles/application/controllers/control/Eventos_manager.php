<?php

class Eventos_manager extends CI_Controller{


	public function __construct(){

		parent::__construct();
		$this->load->model('cita');
		$this->load->model('usuario');
		$this->load->model('evento');
		$this->load->helper('url');
		$this->load->library('session');

	//Si no hay session redirige a Login
		if(! $this->session->userdata('logged_in')){
			redirect('dashboard');
		}

		if( ! ini_get('date.timezone') ){
			date_default_timezone_set('GMT');
			setlocale(LC_ALL,"es_ES");
			setlocale(LC_TIME, 'es_AR');
        }
    }    

        public function index()
        {
            if(!$this->uri->segment(4))
            {   
                $this->session->set_flashdata('warning', 'Se requiere id del evento');
                return redirect('/control/eventos/');
            }
            
            $data['evento'] = $this->evento->get_record($this->uri->segment(4));
            $data['content'] = 'control/eventos_manager/index';
            $this->load->view('control/pixel-admin/control_layout', $data);
        }

        public function usuarios_invitados()
        {
            if(!$this->uri->segment(4))
            {   
                $this->session->set_flashdata('warning', 'Se requiere id del evento');
                return redirect('/control/eventos/');
            }
            
            $data['query'] = $this->evento->get_record($this->uri->segment(4));
            var_dump($data);
        }

        public function usuarios_aprobados()
        {
            if(!$this->uri->segment(4))
            {   
                $this->session->set_flashdata('warning', 'Se requiere id del evento');
                return redirect('/control/eventos/');
            }
            
            $data['query'] = $this->evento->get_record($this->uri->segment(4));
            var_dump($data);
        }

        public function invitar_usuarios()
        {
            if(!$this->uri->segment(3))
            {   
                $this->session->set_flashdata('warning', 'Se requiere id del evento');
                return redirect('/control/eventos/');
            }
            
            $evento = $this->evento->get_record($this->uri->segment(3));
            $data['evento'] = $evento;
            $data['usuarios'] = $this->usuario->get_para_evento($evento->edad_minima, $evento->edad_maxima);
            $data['content'] = 'control/eventos_manager/invitar_usuarios';
            $this->load->view('control/pixel-admin/control_layout', $data);
        }

        


        // public function invitar_ajax()
        // {
        //     $id_usuario = $this->uri->segment(3);
        //     $id_evento = $this->uri->segment(4);

        //     header('Content-type: application/json');
        //     $response_array['status'] = 'success';
        //     echo json_encode($response_array);
        // }


}