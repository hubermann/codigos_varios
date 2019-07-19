<?php

class Notas extends CI_Controller{


	public function __construct(){

		parent::__construct();
		$this->load->model('nota');
		$this->load->model('imagenes_nota');
		$this->load->model('categoria_nota');
		$this->load->helper('url','text','selects_fechas');
		$this->load->helper('text');
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
	$total_pages = ceil($this->nota->count_rows() / $per_page);

	if ($total_pages > 1){
		for ($i=1;$i<=$total_pages;$i++){
			if ($page == $i)
				//si muestro el índice de la página actual, no coloco enlace
				$data['pagination_links'] .=  '<li class="active"><a>'.$i.'</a></li>';
			else
				//si el índice no corresponde con la página mostrada actualmente, coloco el enlace para ir a esa pagina
				$data['pagination_links']  .= '<li><a href="'.base_url().'control/notas/'.$i.'" > '. $i .'</a></li>';
		}
	}
	//End Pagination

	$data['title'] = 'notas';
	$data['menu'] = 'control/notas/menu_nota';
	$data['content'] = 'control/notas/all';
	$data['query'] = $this->nota->get_records($per_page,$start);

	$this->load->view('control/pixel-admin/control_layout', $data);

}

//detail
public function detail(){

	$data['title'] = 'nota';
	$data['content'] = 'control/notas/detail';
	$data['menu'] = 'control/notas/menu_nota';
	$data['query'] = $this->nota->get_record($this->uri->segment(4));
	$this->load->view('control/pixel-admin/control_layout', $data);
}


//new
public function form_new(){
	$this->load->helper('form');
	$data['title'] = 'Nuevo nota';
	$data['content'] = 'control/notas/new_nota';
	$data['menu'] = 'control/notas/menu_nota';
	$this->load->view('control/pixel-admin/control_layout', $data);
}

//create
public function create(){

	$this->load->helper('form');
	$this->load->library('form_validation');
	$this->form_validation->set_rules('titulo', 'Titulo', 'required');
	$this->form_validation->set_rules('descripcion', 'Descripcion', 'required');

	if ($this->form_validation->run() === FALSE){

		$this->load->helper('form');
		$data['title'] = 'Nuevo notas';
		$data['content'] = 'control/notas/new_nota';
		$data['menu'] = 'control/notas/menu_nota';
		$this->load->view('control/pixel-admin/control_layout', $data);

	}else{

		if($this->input->post('slug')){
			$this->load->helper('url');
			$slug = url_title($this->input->post('titulo'), 'dash', TRUE);
		}

		// list($dia,$mes,$ano) = explode("-", $this->input->post('fecha_desde'));
		// $fecha_desde = $ano."-".$mes."-".$dia;

		// list($dia,$mes,$ano) = explode("-", $this->input->post('fecha_hasta'));
		// $fecha_hasta = $ano."-".$mes."-".$dia;

		$fecha_desde = $this->input->post('ano_fecha_desde').'-'.$this->input->post('mes_fecha_desde').'-'.$this->input->post('dia_fecha_desde');
		$fecha_hasta = $this->input->post('ano_fecha_hasta').'-'.$this->input->post('mes_fecha_hasta').'-'.$this->input->post('dia_fecha_hasta');

		$newnota = array(
			'categoria_id' => $this->input->post('categoria_id'),
			'titulo' => $this->input->post('titulo'),
			'descripcion' => $this->input->post('descripcion'),
			'fecha_desde' => $fecha_desde,
			'fecha_hasta' => $fecha_hasta,
			);
		#save
		$this->nota->add_record($newnota);
		$this->session->set_flashdata('success', 'Nota creada. <a href="notas/detail/'.$this->db->insert_id().'">Ver</a>');
		redirect('control/notas', 'refresh');

	}

}

//edit
public function editar(){
	$this->load->helper('form');
	$data['title']= 'Editar nota';
	$data['content'] = 'control/notas/edit_nota';
	$data['menu'] = 'control/notas/menu_nota';
	$data['query'] = $this->nota->get_record($this->uri->segment(4));
	$this->load->view('control/pixel-admin/control_layout', $data);
}

//update
public function update(){
	$this->load->helper('form');
	$this->load->library('form_validation');
	$this->form_validation->set_rules('titulo', 'Titulo', 'required');
	$this->form_validation->set_rules('descripcion', 'Descripcion', 'required');
	$this->form_validation->set_message('required','El campo %s es requerido.');

	if ($this->form_validation->run() === FALSE){
		$this->load->helper('form');

		$data['title'] = 'Nuevo nota';
		$data['content'] = 'control/notas/edit_nota';
		$data['menu'] = 'control/notas/menu_nota';
		$data['query'] = $this->nota->get_record($this->input->post('id'));
		$this->load->view('control/pixel-admin/control_layout', $data);
	}else{
		$id=  $this->input->post('id');

		if($this->input->post('slug')){
			$this->load->helper('url');
			$slug = url_title($this->input->post('titulo'), 'dash', TRUE);
		}

		$fecha_desde = $this->input->post('ano_fecha_desde').'-'.$this->input->post('mes_fecha_desde').'-'.$this->input->post('dia_fecha_desde');
		$fecha_hasta = $this->input->post('ano_fecha_hasta').'-'.$this->input->post('mes_fecha_hasta').'-'.$this->input->post('dia_fecha_hasta');

		$editednota = array(
			'categoria_id' => $this->input->post('categoria_id'),
			'titulo' => $this->input->post('titulo'),
			'descripcion' => $this->input->post('descripcion'),
			'fecha_desde' => $fecha_desde,
			'fecha_hasta' => $fecha_hasta,
			);
		#save
		$this->session->set_flashdata('success', 'Nota actualizada.');
		$this->nota->update_record($id, $editednota);
		if($this->input->post('id')!=""){
			redirect('control/notas', 'refresh');
		}else{
			redirect('control/notas', 'refresh');
		}

	}

}

	//destroy
	public function destroy()
	{
		if($this->uri->segment(4)){
			$this->session->set_flashdata('success', 'Nota eliminada!');

			$prod = $this->nota->get_record($this->uri->segment(4));
			$path = (isset($prod->filename)) ? $prod->filename : "";
			if($path!=""){
				unlink('images-notas/'.$path);
			}

			$this->nota->delete_record($this->uri->segment(4));
		}else{
			$this->session->set_flashdata('warning', 'Error al eliminar!');
		}

		redirect('control/notas', 'refresh');
	}

	public function imagenes(){
		$this->load->helper('form');
		$data['content'] = 'control/notas/imagenes';
		$data['title'] = 'Imagenes ';
		$data['menu'] = 'control/notas/menu_nota';
		$data['query_imagenes'] = $this->imagenes_nota->imagenes_nota($this->uri->segment(4));
		$this->load->view('control/pixel-admin/control_layout', $data);
	}


public function add_imagen(){

	$file =[];
		//adjunto
	if($_FILES['adjunto']['size'] > 0 && $_FILES['adjunto']['name'] != ""){

		$file  = $this->upload_file();

		if ( $file['status'] != 0 ){
			//guardo
			$nueva_imagen = array(
				'nota_id' => $this->input->post('id'),
				'filename' => $file['filename'],
				);
			#save
			$this->session->set_flashdata('success', 'Imagen cargada!');
			$this->imagenes_nota->add_record($nueva_imagen);
			redirect('control/notas/imagenes/'.$this->input->post('id'));
		}

		$this->session->set_flashdata('error', $file['msg']);
	}

	redirect('control/notas/imagenes/'.$this->input->post('id'));
}

public function delete_imagen(){
	$id_imagen = $this->uri->segment(4);

	$imagen = $this->imagenes_nota->get_record($id_imagen);
	$path = 'images-notas/'.$imagen->filename;
	unlink($path);

	$this->imagenes_nota->delete_record($id_imagen);
	#echo "Eliminada : ".$imagen->filename;
}



/*******  FILE ADJUNTO  ********/
public function upload_file(){

	//1 = OK - 0 = Failure
	$file = array('status' => '', 'filename' => '', 'msg' => '' );

	array('image/jpeg','image/pjpeg', 'image/jpg', 'image/png', 'image/gif','image/bmp');
	//check extencion
	/*
	$file_extensions_allowed = array('application/pdf', 'application/msword', 'application/rtf', 'application/vnd.ms-excel','application/vnd.ms-powerpoint','application/zip','application/x-rar-compressed', 'text/plain');
	$exts_humano = array('PDF', 'WORD', 'RTF', 'EXCEL', 'PowerPoint', 'ZIP', 'RAR');
	*/
	$file_extensions_allowed = array('image/jpeg','image/pjpeg', 'image/jpg', 'image/png', 'image/gif','image/bmp');
	$exts_humano = array('JPG', 'JPEG', 'PNG', 'GIF');


	$exts_humano = implode(', ',$exts_humano);
	$ext = $_FILES['adjunto']['type'];
	#$ext = strtolower($ext);
	if(!in_array($ext, $file_extensions_allowed)){
		$exts = implode(', ',$file_extensions_allowed);

		$file['msg'] .="<p>".$_FILES['adjunto']['name']." <br />Puede subir archivos que tengan alguna de estas extenciones: ".$exts_humano."</p>";
		$file['status'] = 0 ;
	}else{
		include(APPPATH.'libraries/class.upload.php');
		$yukle = new upload;
		$yukle->set_max_size(1900000);
		$yukle->set_directory('./images-notas');
		$yukle->set_tmp_name($_FILES['adjunto']['tmp_name']);
		$yukle->set_file_size($_FILES['adjunto']['size']);
		$yukle->set_file_type($_FILES['adjunto']['type']);
		$random = substr(md5(rand()),0,6);
		$name_whitout_whitespaces = str_replace(" ","-",$_FILES['adjunto']['name']);
		$imagname=''.$random.'_'.$name_whitout_whitespaces;
		#$thumbname='tn_'.$imagname;
		$yukle->set_file_name($imagname);


		$yukle->start_copy();



		if($yukle->is_ok()){

			if(count($this->data['thumbnail_sizes'])){
				foreach ($this->data['thumbnail_sizes'] as $thumb_size) {
                        //create thumbnail
                        #$yukle->resize(1000,0);
                        #$$yukle->set_thumbnail_name('tn_'.$thumb_size.'_'.$imagname);
                        #$$result_thumb = $yukle->create_thumbnail();
                        #$$yukle->set_thumbnail_size($thumb_size, 0);
				}
			}

                //UPLOAD ok
			$file['filename'] = $imagname;
			$file['status'] = 1;
		}
		else{
			$file['status'] = 0 ;
			$file['msg'] = 'Error al subir archivo';
		}



		//clean
		$yukle->set_tmp_name('');
		$yukle->set_file_size('');
		$yukle->set_file_type('');
		$imagname='';
	}//fin if(extencion)


	return $file;
}

} //end class

?>
