<?php 

class Registros extends CI_Controller{


public function __construct(){

	parent::__construct();
	$this->load->model('registro');
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
		$total_pages = ceil($this->registro->count_rows() / $per_page);

		if ($total_pages > 1){ 
			for ($i=1;$i<=$total_pages;$i++){ 
			if ($page == $i) 
				//si muestro el índice de la página actual, no coloco enlace 
				$data['pagination_links'] .=  '<li class="active"><a>'.$i.'</a></li>'; 
			else 
				//si el índice no corresponde con la página mostrada actualmente, coloco el enlace para ir a esa pagina 
				$data['pagination_links']  .= '<li><a href="'.base_url().'control/registros/'.$i.'" > '. $i .'</a></li>'; 
		} 
	}
	//End Pagination

	$data['title'] = 'registros';
	$data['menu'] = 'control/registros/menu_registro';
	$data['content'] = 'control/registros/all';
	$data['query'] = $this->registro->get_records($per_page,$start);

	$this->load->view('control/control_layout', $data);

}

//detail
public function detail(){

$data['title'] = 'registro';
$data['content'] = 'control/registros/detail';
$data['menu'] = 'control/registros/menu_registro';
$data['query'] = $this->registro->get_record($this->uri->segment(4));
$this->load->view('control/control_layout', $data);
}


//new
public function form_new(){
$this->load->helper('form');
$data['title'] = 'Nuevo registro';
$data['content'] = 'control/registros/new_registro';
$data['menu'] = 'control/registros/menu_registro';
$this->load->view('control/control_layout', $data);
}

//create
public function create(){

	$this->load->helper('form');
	$this->load->library('form_validation');
$this->form_validation->set_rules('usuario_id', 'Usuario_id', 'required');

$this->form_validation->set_rules('evento_id', 'Evento_id', 'required');

$this->form_validation->set_rules('pago', 'Pago', 'required');

$this->form_validation->set_rules('neto', 'Neto', 'required');

$this->form_validation->set_rules('comision', 'Comision', 'required');

$this->form_validation->set_rules('asistio', 'Asistio', 'required');

$this->form_validation->set_rules('confirmado', 'Confirmado', 'required');

$this->form_validation->set_rules('created_at', 'Created_at', 'required');

$this->form_validation->set_rules('updated_at', 'Updated_at', 'required');

	
	if ($this->form_validation->run() === FALSE){

		$this->load->helper('form');
		$data['title'] = 'Nuevo registros';
		$data['content'] = 'control/registros/new_registro';
		$data['menu'] = 'control/registros/menu_registro';
		$this->load->view('control/control_layout', $data);

	}else{
		
		if($this->input->post('slug')){
			$this->load->helper('url');
			$slug = url_title($this->input->post('titulo'), 'dash', TRUE);
		}

		
		$newregistro = array( 'usuario_id' => $this->input->post('usuario_id'), 
 'evento_id' => $this->input->post('evento_id'), 
 'pago' => $this->input->post('pago'), 
 'neto' => $this->input->post('neto'), 
 'comision' => $this->input->post('comision'), 
 'asistio' => $this->input->post('asistio'), 
 'confirmado' => $this->input->post('confirmado'), 
 'created_at' => $this->input->post('created_at'), 
 'updated_at' => $this->input->post('updated_at'), 
);
		#save
		$this->registro->add_record($newregistro);
		$this->session->set_flashdata('success', 'registro creado. <a href="registros/detail/'.$this->db->insert_id().'">Ver</a>');
		redirect('control/registros', 'refresh');

	}



}

//edit
public function editar(){
	$this->load->helper('form');
	$data['title']= 'Editar registro';	
	$data['content'] = 'control/registros/edit_registro';
	$data['menu'] = 'control/registros/menu_registro';
	$data['query'] = $this->registro->get_record($this->uri->segment(4));
	$this->load->view('control/control_layout', $data);
}

//update
public function update(){
	$this->load->helper('form');
	$this->load->library('form_validation'); 
$this->form_validation->set_rules('usuario_id', 'Usuario_id', 'required');

$this->form_validation->set_rules('evento_id', 'Evento_id', 'required');

$this->form_validation->set_rules('pago', 'Pago', 'required');

$this->form_validation->set_rules('neto', 'Neto', 'required');

$this->form_validation->set_rules('comision', 'Comision', 'required');

$this->form_validation->set_rules('asistio', 'Asistio', 'required');

$this->form_validation->set_rules('confirmado', 'Confirmado', 'required');

$this->form_validation->set_rules('created_at', 'Created_at', 'required');

$this->form_validation->set_rules('updated_at', 'Updated_at', 'required');


	$this->form_validation->set_message('required','El campo %s es requerido.');

	if ($this->form_validation->run() === FALSE){
		$this->load->helper('form');

		$data['title'] = 'Nuevo registro';
		$data['content'] = 'control/registros/edit_registro';
		$data['menu'] = 'control/registros/menu_registro';
		$data['query'] = $this->registro->get_record($this->input->post('id'));
		$this->load->view('control/control_layout', $data);
	}else{		
		$id=  $this->input->post('id');

		if($this->input->post('slug')){
			$this->load->helper('url');
			$slug = url_title($this->input->post('titulo'), 'dash', TRUE);
		}

		$editedregistro = array(  
'usuario_id' => $this->input->post('usuario_id'),

'evento_id' => $this->input->post('evento_id'),

'pago' => $this->input->post('pago'),

'neto' => $this->input->post('neto'),

'comision' => $this->input->post('comision'),

'asistio' => $this->input->post('asistio'),

'confirmado' => $this->input->post('confirmado'),

'created_at' => $this->input->post('created_at'),

'updated_at' => $this->input->post('updated_at'),
);
		#save
		$this->session->set_flashdata('success', 'registro Actualizado!');
		$this->registro->update_record($id, $editedregistro);
		if($this->input->post('id')!=""){
			redirect('control/registros', 'refresh');
		}else{
			redirect('control/registros', 'refresh');
		}



	}



}


//delete comfirm		
public function delete_comfirm(){
	$this->load->helper('form');
	$data['content'] = 'control/registros/comfirm_delete';
	$data['title'] = 'Eliminar registro';
	$data['menu'] = 'control/registros/menu_registro';
	$data['query'] = $data['query'] = $this->registro->get_record($this->uri->segment(4));
	$this->load->view('control/control_layout', $data);


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

		$data['content'] = 'control/registros/comfirm_delete';
		$data['title'] = 'Eliminar registro';
		$data['menu'] = 'control/registros/menu_registro';
		$data['query'] = $this->registro->get_record($this->input->post('id'));
		$this->load->view('control/control_layout', $data);
	}else{
		#validation passed
		$this->session->set_flashdata('success', 'registro eliminado!');

		$prod = $this->registro->get_record($this->input->post('id'));
			$path = 'images-registros/'.$prod->filename;
			if(is_link($path)){
				unlink($path);
			}

		$id_item = $this->uri->segment(4);
		

		$this->registro->delete_record($id_item);
		redirect('control/registros', 'refresh');
		

	}
}


} //end class

?>