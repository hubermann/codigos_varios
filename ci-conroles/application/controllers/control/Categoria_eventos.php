<?php 

class Categoria_eventos extends CI_Controller{


public function __construct(){

	parent::__construct();
	$this->load->model('categoria_evento');
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
		$total_pages = ceil($this->categoria_evento->count_rows() / $per_page);

		if ($total_pages > 1){ 
			for ($i=1;$i<=$total_pages;$i++){ 
			if ($page == $i) 
				//si muestro el índice de la página actual, no coloco enlace 
				$data['pagination_links'] .=  '<li class="active"><a>'.$i.'</a></li>'; 
			else 
				//si el índice no corresponde con la página mostrada actualmente, coloco el enlace para ir a esa pagina 
				$data['pagination_links']  .= '<li><a href="'.base_url().'control/categoria_eventos/'.$i.'" > '. $i .'</a></li>'; 
		} 
	}
	//End Pagination

	$data['title'] = 'categoria_eventos';
	$data['menu'] = 'control/categoria_eventos/menu_categoria_evento';
	$data['content'] = 'control/categoria_eventos/all';
	$data['query'] = $this->categoria_evento->get_records($per_page,$start);

	$this->load->view('control/pixel-admin/control_layout', $data);

}

//detail
public function detail(){

$data['title'] = 'categoria_evento';
$data['content'] = 'control/categoria_eventos/detail';
$data['menu'] = 'control/categoria_eventos/menu_categoria_evento';
$data['query'] = $this->categoria_evento->get_record($this->uri->segment(4));
$this->load->view('control/pixel-admin/control_layout', $data);
}


//new
public function form_new(){
$this->load->helper('form');
$data['title'] = 'Nuevo categoria_evento';
$data['content'] = 'control/categoria_eventos/new_categoria_evento';
$data['menu'] = 'control/categoria_eventos/menu_categoria_evento';
$this->load->view('control/pixel-admin/control_layout', $data);
}

//create
public function create(){

	$this->load->helper('form');
	$this->load->library('form_validation');
	$this->form_validation->set_rules('nombre', 'Nombre', 'required');
	
	if ($this->form_validation->run() === FALSE){

		$this->load->helper('form');
		$data['title'] = 'Nuevo categoria_eventos';
		$data['content'] = 'control/categoria_eventos/new_categoria_evento';
		$data['menu'] = 'control/categoria_eventos/menu_categoria_evento';
		$this->load->view('control/pixel-admin/control_layout', $data);

	}else{
		

		$this->load->helper('url');
		$slug = url_title($this->input->post('nombre'), 'dash', TRUE);
		
		$newcategoria_evento = array( 
			'nombre' => $this->input->post('nombre'), 
 			'slug' => $slug, 
		);
		#save
		$this->categoria_evento->add_record($newcategoria_evento);
		$this->session->set_flashdata('success', 'categoria_evento creado. <a href="categoria_eventos/detail/'.$this->db->insert_id().'">Ver</a>');
		redirect('control/categoria_eventos', 'refresh');

	}



}

//edit
public function editar(){
	$this->load->helper('form');
	$data['title']= 'Editar categoria_evento';	
	$data['content'] = 'control/categoria_eventos/edit_categoria_evento';
	$data['menu'] = 'control/categoria_eventos/menu_categoria_evento';
	$data['query'] = $this->categoria_evento->get_record($this->uri->segment(4));
	$this->load->view('control/pixel-admin/control_layout', $data);
}

//update
public function update(){
	$this->load->helper('form');
	$this->load->library('form_validation'); 
	$this->form_validation->set_rules('nombre', 'Nombre', 'required');

	$this->form_validation->set_message('required','El campo %s es requerido.');

	if ($this->form_validation->run() === FALSE){
		$this->load->helper('form');

		$data['title'] = 'Nuevo categoria_evento';
		$data['content'] = 'control/categoria_eventos/edit_categoria_evento';
		$data['menu'] = 'control/categoria_eventos/menu_categoria_evento';
		$data['query'] = $this->categoria_evento->get_record($this->input->post('id'));
		$this->load->view('control/pixel-admin/control_layout', $data);
	}else{		
		$id=  $this->input->post('id');

		
		$slug = url_title($this->input->post('nombre'), 'dash', TRUE);
		

		$editedcategoria_evento = array(  
			'nombre' => $this->input->post('nombre'),
			'slug' => $slug,
		);
		#save
		$this->session->set_flashdata('success', 'categoria_evento Actualizado!');
		$this->categoria_evento->update_record($id, $editedcategoria_evento);
		if($this->input->post('id')!=""){
			redirect('control/categoria_eventos', 'refresh');
		}else{
			redirect('control/categoria_eventos', 'refresh');
		}



	}



}


	//destroy
	public function destroy()
	{
		if($this->uri->segment(4)){
			$this->session->set_flashdata('success', 'Categoria de eventos eliminada!');

			$prod = $this->categoria_evento->get_record($this->uri->segment(4));
	

			$this->categoria_evento->delete_record($this->uri->segment(4));
		}else{
			$this->session->set_flashdata('warning', 'Error al eliminar!');
		}
		
		redirect('control/categoria_eventos', 'refresh');
	}




} //end class

?>
