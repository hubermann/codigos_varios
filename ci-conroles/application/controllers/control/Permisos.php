<?php

class Permisos extends CI_Controller{


	public function __construct(){

		parent::__construct();
		$this->load->model('permiso');
		$this->load->helper('url');
		$this->load->library('session');$this->load->helper('form');

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
		redirect('control/', 'refresh');
	}

	//detail
	public function detail(){
		if($this->uri->segment(3)){
			$data['title'] = 'permiso';
			$data['content'] = 'control/permisos/all';
			$data['menu'] = 'control/permisos/menu_permiso';
			$data['query'] = $this->permiso->get_records($this->uri->segment(3));

			$this->load->view('control/pixel-admin/control_layout', $data);
		}else{
			redirect('control/', 'refresh');
		}

	}


	//update
	public function update(){
		function cambiar_valor($valor){ return ($valor) ? "1" : "0"; }

		if($this->input->post('role_id') && $this->input->post('modulo_id'))
		{
			$editedpermiso = array(
				'view' => cambiar_valor($this->input->post('view')),
				'build' => cambiar_valor($this->input->post('build')),
				'modify' => cambiar_valor($this->input->post('modify')),
				'destroy' => cambiar_valor($this->input->post('destroy')),
			);

			#save
			$this->session->set_flashdata('success', 'permiso Actualizado!');
			$this->permiso->update_record($this->input->post('modulo_id'), $editedpermiso);
		}



		redirect('control/permisos/'.$this->input->post('role_id'), 'refresh');


	}





} //end class

?>
