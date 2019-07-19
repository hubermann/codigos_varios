<?php

class admins extends CI_Controller{


public function __construct(){

	parent::__construct();
	$this->load->model('useradmins_m');
	$this->load->model('role');
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

	$this->data['thumbnail_sizes'] = array(); //thumbnails sizes

}

public function index(){
	//Pagination
	$per_page = 10;
	$page = $this->uri->segment(3);
	if(!$page){ $start =0; $page =1; }else{ $start = ($page -1 ) * $per_page; }
		$data['pagination_links'] = "";
		$total_pages = ceil($this->useradmins_m->count_rows() / $per_page);

		if ($total_pages > 1){
			for ($i=1;$i<=$total_pages;$i++){
			if ($page == $i)
				//si muestro el índice de la página actual, no coloco enlace
				$data['pagination_links'] .=  '<li class="active"><a>'.$i.'</a></li>';
			else
				//si el índice no corresponde con la página mostrada actualmente, coloco el enlace para ir a esa pagina
				$data['pagination_links']  .= '<li><a href="'.base_url().'control/admins/'.$i.'" > '. $i .'</a></li>';
		}
	}
	//End Pagination

	$data['title'] = 'admins';
	$data['menu'] = 'control/admins/menu_admin';
	$data['content'] = 'control/admins/all';
	$data['query'] = $this->useradmins_m->get_records($per_page,$start);

	$this->load->view('control/pixel-admin/control_layout', $data);

}

//detail
public function detail(){

$data['title'] = 'usuario';
$data['content'] = 'control/admins/detail';
$data['menu'] = 'control/admins/menu_admin';
$data['query'] = $this->useradmins_m->get_record($this->uri->segment(4));
$this->load->view('control/pixel-admin/control_layout', $data);
}


//new
public function form_new(){
$this->load->helper('form');
$data['title'] = 'Nuevo usuario';
$data['content'] = 'control/admins/new_admin';
$data['menu'] = 'control/admins/menu_admin';
$this->load->view('control/pixel-admin/control_layout', $data);
}

//create
public function create(){

	$this->load->helper('form');
	$this->load->library('form_validation');

	$this->form_validation->set_rules('password', 'Password', 'required');
	#$this->form_validation->set_rules('salt', 'Salt', 'required');
	$this->form_validation->set_rules('email', 'Email', 'required');
	$this->form_validation->set_rules('role_id', 'Role', 'required');


	if ($this->form_validation->run() === FALSE){

		$this->load->helper('form');
		$data['title'] = 'Nuevo admins';
		$data['content'] = 'control/admins/new_admin';
		$data['menu'] = 'control/admins/menu_admin';
		$this->load->view('control/pixel-admin/control_layout', $data);

	}else{

		if($this->input->post('slug')){
			$this->load->helper('url');
			$slug = url_title($this->input->post('titulo'), 'dash', TRUE);
		}


		 $newusuario = array(
		 'role_id' => $this->input->post('role_id'),
		 'password' => $this->input->post('password'),
		 'salt' => "loremipsum",
		 'email' => $this->input->post('email'),

		);
		#save
		$this->useradmins_m->add_record($newusuario);
		$this->session->set_flashdata('success', 'usuario creado. <a href="admins/detail/'.$this->db->insert_id().'">Ver</a>');
		redirect('control/admins', 'refresh');

	}



}

//edit
public function editar(){
	$this->load->helper('form');
	$data['title']= 'Editar usuario';
	$data['content'] = 'control/admins/edit_admin';
	$data['menu'] = 'control/admins/menu_admin';
	$data['query'] = $this->useradmins_m->get_record($this->uri->segment(4));

	$this->load->view('control/pixel-admin/control_layout', $data);
}

//update
public function update(){
	$this->load->helper('form');
	$this->load->library('form_validation');
	$this->form_validation->set_rules('role_id', 'Role', 'required');
	$this->form_validation->set_rules('password', 'Password', 'required');
	$this->form_validation->set_rules('email', 'Email', 'required');
	$this->form_validation->set_message('required','El campo %s es requerido.');

	if ($this->form_validation->run() === FALSE){
		$this->load->helper('form');

		$data['title'] = 'Nuevo usuario';
		$data['content'] = 'control/admins/edit_admin';
		$data['menu'] = 'control/admins/menu_admin';
		$data['query'] = $this->useradmins_m->get_record($this->input->post('id'));
		$this->load->view('control/pixel-admin/control_layout', $data);
	}else{
		$id=  $this->input->post('id');

		$editedusuario = array(
			'role_id' => $this->input->post('role_id'),
			 'password' => $this->input->post('password'),
			 'salt' => $this->input->post('salt'),
			 'email' => $this->input->post('email'),
		);

		#save
		$this->session->set_flashdata('success', 'usuario Actualizado!');
		$this->useradmins_m->update_record($id, $editedusuario);
		if($this->input->post('id')!=""){
			redirect('control/admins', 'refresh');
		}else{
			redirect('control/admins', 'refresh');
		}



	}



}


//delete comfirm
public function delete_comfirm(){
	$this->load->helper('form');
	$data['content'] = 'control/admins/comfirm_delete';
	$data['title'] = 'Eliminar usuario';
	$data['menu'] = 'control/admins/menu_admin';
	$data['query'] = $data['query'] = $this->useradmins_m->get_record($this->uri->segment(4));
	$this->load->view('control/pixel-admin/control_layout', $data);


}


public function destroy()
{
	if($this->uri->segment(4)){
		$this->session->set_flashdata('success', 'Lugar eliminado!');

		$prod = $this->useradmins_m->get_record($this->uri->segment(4));


		$this->useradmins_m->delete_record($this->uri->segment(4));
	}else{
		$this->session->set_flashdata('warning', 'Error al eliminar!');
	}

	redirect('control/admins', 'refresh');
}



//delete
public function delete(){

	$this->load->helper('form');
	$this->load->library('form_validation');

	$this->form_validation->set_rules('comfirm', 'comfirm', 'required');
	$this->form_validation->set_message('required','Por favor, confirme para eliminar.');


	if ($this->form_validation->run() === FALSE){
		#validation failed
		$this->load->helper('form');

		$data['content'] = 'control/admins/comfirm_delete';
		$data['title'] = 'Eliminar usuario';
		$data['menu'] = 'control/admins/menu_admin';
		$data['query'] = $this->useradmins_m->get_record($this->input->post('id'));
		$this->load->view('control/pixel-admin/control_layout', $data);
	}else{
		#validation passed
		$this->session->set_flashdata('success', 'usuario eliminado!');

		$prod = $this->useradmins_m->get_record($this->input->post('id'));
			$path = 'images-admins/'.$prod->filename;
			if(is_link($path)){
				unlink($path);
			}

		$id_item = $this->uri->segment(4);


		$this->useradmins_m->delete_record($id_item);
		redirect('control/admins', 'refresh');


	}
}


} //end class

?>
