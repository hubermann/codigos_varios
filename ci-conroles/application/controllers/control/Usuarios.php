<?php

class Usuarios extends CI_Controller{


	public function __construct(){

		parent::__construct();
		$this->load->model('usuario');
		$this->load->model('permiso');
		$this->load->model('imagenes_usuario');
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
	#$this->permiso->verify_access( 'usuarios', 'index');
	//Pagination
	$per_page = 10;
	$page = $this->uri->segment(3);
	if(!$page){ $start =0; $page =1; }else{ $start = ($page -1 ) * $per_page; }
	$data['pagination_links'] = "";
	$total_pages = ceil($this->usuario->count_rows() / $per_page);

	if ($total_pages > 1){
		for ($i=1;$i<=$total_pages;$i++){
			if ($page == $i)
				//si muestro el índice de la página actual, no coloco enlace
				$data['pagination_links'] .=  '<li class="active"><a>'.$i.'</a></li>';
			else
				//si el índice no corresponde con la página mostrada actualmente, coloco el enlace para ir a esa pagina
				$data['pagination_links']  .= '<li><a href="'.base_url().'control/usuarios/'.$i.'" > '. $i .'</a></li>';
		}
	}
	//End Pagination

	$data['title'] = 'usuarios';
	$data['menu'] = 'control/usuarios/menu_usuario';
	$data['content'] = 'control/usuarios/all';
	$data['query'] = $this->usuario->get_records($per_page,$start);

	$this->load->view('control/pixel-admin/control_layout', $data);

}


public function ajax_autocomplete()
{
	$users = $this->usuario->get_autocomplete($this->input->post('service'));

	foreach ($users as $user_sugested) {
		#echo '<div class="suggest-element"><a data="'.$user_sugested->nombre .' '.$user_sugested->apellido.'" id="service'.$user_sugested->id.'">'.utf8_encode($user_sugested->nombre .' '.$user_sugested->apellido).'</a></div>';
		#echo '<option value="'.$user_sugested->id.'">'.$user_sugested->nombre .' '.$user_sugested->apellido.'</option>';
		$data[] = array("name"=> $user_sugested->nombre );
	}

	echo json_encode($data);
}

//detail
public function detail(){

	$data['title'] = 'usuario';
	$data['content'] = 'control/usuarios/detail';
	$data['menu'] = 'control/usuarios/menu_usuario';
	$data['query'] = $this->usuario->get_record($this->uri->segment(4));
	$this->load->view('control/pixel-admin/control_layout', $data);
}


//new
public function form_new(){
	$this->load->helper('form');
	$data['title'] = 'Nuevo usuario';
	$data['content'] = 'control/usuarios/new_usuario';
	$data['menu'] = 'control/usuarios/menu_usuario';
	$this->load->view('control/pixel-admin/control_layout', $data);
}

//create
public function create(){
	$this->load->helper('form');
	$this->load->library('form_validation');
	$this->form_validation->set_rules('nickname', 'Nickname', 'required');
	$this->form_validation->set_rules('password', 'Password', 'required');
	$this->form_validation->set_rules('email', 'Email', 'required');
	$this->form_validation->set_rules('apellido', 'Apellido', 'required');
	$this->form_validation->set_rules('nombre', 'Nombre', 'required');
	$this->form_validation->set_rules('dni', 'Dni', 'required');
	$this->form_validation->set_rules('sexo', 'Sexo', 'required');
	$this->form_validation->set_rules('nacimiento', 'Nacimiento', 'required');
	$this->form_validation->set_rules('edad', 'Edad', 'required');
	$this->form_validation->set_rules('telcontacto', 'Telcontacto', 'required');
	$this->form_validation->set_rules('barrio', 'Barrio', 'required');
	$this->form_validation->set_rules('calle', 'Calle', 'required');
	$this->form_validation->set_rules('numero', 'Numero', 'required');
	$this->form_validation->set_rules('conocio', 'Conocio', 'required');
	$this->form_validation->set_rules('profesion', 'Profesion', 'required');
	$this->form_validation->set_rules('localidad', 'Localidad', 'required');
	$this->form_validation->set_rules('fuma', 'Fuma', 'required');
	$this->form_validation->set_rules('toma', 'Toma', 'required');
	$this->form_validation->set_rules('descripcion', 'Descripcion', 'required');
	$this->form_validation->set_rules('estado_civil', 'Estado_civil', 'required');
	$this->form_validation->set_rules('educacion', 'Educacion', 'required');
	$this->form_validation->set_rules('provincia', 'Provincia', 'required');
	$this->form_validation->set_rules('zodiaco', 'Zodiaco', 'required');
	$this->form_validation->set_rules('busco', 'Busco', 'required');
	$this->form_validation->set_rules('nacionalidad', 'Nacionalidad', 'required');
	$this->form_validation->set_rules('activo', 'Activo', 'required');
	$this->form_validation->set_rules('estatura', 'Estatura', 'required');
	$this->form_validation->set_rules('peso', 'Peso', 'required');
	$this->form_validation->set_rules('contextura_fisica', 'Contextura_fisica', 'required');
	$this->form_validation->set_rules('color_pelo', 'Color_pelo', 'required');
	$this->form_validation->set_rules('color_ojos', 'Color_ojos', 'required');
	#$this->form_validation->set_rules('tipo_busuqeda', 'Tipo_busuqeda', 'required');

	if ($this->form_validation->run() === FALSE){

		$this->load->helper('form');
		$data['title'] = 'Nuevo usuarios';
		$data['content'] = 'control/usuarios/new_usuario';
		$data['menu'] = 'control/usuarios/menu_usuario';
		$this->load->view('control/pixel-admin/control_layout', $data);

	}else{

		if($this->input->post('slug')){
			$this->load->helper('url');
			$slug = url_title($this->input->post('titulo'), 'dash', TRUE);
		}
		$user_salt = password_hash($this->input->post('password'), PASSWORD_BCRYPT);

		$newusuario = array( 'nickname' => $this->input->post('nickname'),
			'password' => $this->input->post('password'),
			'salt' => $user_salt,
			'email' => $this->input->post('email'),
			'apellido' => $this->input->post('apellido'),
			'nombre' => $this->input->post('nombre'),
			'dni' => $this->input->post('dni'),
			'sexo' => $this->input->post('sexo'),
			'nacimiento' => $this->input->post('nacimiento'),
			'edad' => $this->input->post('edad'),
			'telcontacto' => $this->input->post('telcontacto'),
			'barrio' => $this->input->post('barrio'),
			'calle' => $this->input->post('calle'),
			'numero' => $this->input->post('numero'),
			'piso' => $this->input->post('piso'),
			'depto' => $this->input->post('depto'),
			'conocio' => $this->input->post('conocio'),
			'profesion' => $this->input->post('profesion'),
			'localidad' => $this->input->post('localidad'),
			'fuma' => $this->input->post('fuma'),
			'toma' => $this->input->post('toma'),
			'descripcion' => $this->input->post('descripcion'),
			'telcelular' => $this->input->post('telcelular'),
			'estado_civil' => $this->input->post('estado_civil'),
			'educacion' => $this->input->post('educacion'),
			'provincia' => $this->input->post('provincia'),
			'zodiaco' => $this->input->post('zodiaco'),
			'busco' => $this->input->post('busco'),
			'ocupacion' => $this->input->post('ocupacion'),
			'celular_cia' => $this->input->post('celular_cia'),
			'tel_citas' => $this->input->post('tel_citas'),
			'validado' => $this->input->post('validado'),
			'hijos' => $this->input->post('hijos'),
			'codigo_verificacion' => $this->input->post('codigo_verificacion'),
			'negocios' => $this->input->post('negocios'),
			'cod_postal' => $this->input->post('cod_postal'),
			'religion' => $this->input->post('religion'),
			'foto_main' => $this->input->post('foto_main'),
			'nacionalidad' => $this->input->post('nacionalidad'),
			'activo' => $this->input->post('activo'),
			'estatura' => $this->input->post('estatura'),
			'peso' => $this->input->post('peso'),
			'contextura_fisica' => $this->input->post('contextura_fisica'),
			'color_pelo' => $this->input->post('color_pelo'),
			'color_ojos' => $this->input->post('color_ojos'),
			'convivencia' => $this->input->post('convivencia'),
			'facebook' => $this->input->post('facebook'),
			'twitter' => $this->input->post('twitter'),
			'linkedin' => $this->input->post('linkedin'),
			'youtube' => $this->input->post('youtube'),
			'myspace' => $this->input->post('myspace'),
			'badoo' => $this->input->post('badoo'),
			'msn' => $this->input->post('msn'),
			'skype' => $this->input->post('skype'),
			'whatsapp' => $this->input->post('whatsapp'),
			'google' => $this->input->post('google'),
			'tipo_busuqeda' => $this->input->post('busco'),
			'completa_signin' => 0,
			'claves_erroneas' => 0,
			'id_paises' => $this->input->post('id_paises'),
			'score' => $this->input->post('score'),
			);
	#save
	$this->usuario->add_record($newusuario);
	$this->session->set_flashdata('success', 'usuario creado. <a href="usuarios/detail/'.$this->db->insert_id().'">Ver</a>');
	redirect('control/usuarios', 'refresh');

}



}

//edit
public function editar(){
	$this->load->helper('form');
	$data['title']= 'Editar usuario';
	$data['content'] = 'control/usuarios/edit_usuario';
	$data['menu'] = 'control/usuarios/menu_usuario';
	$data['query'] = $this->usuario->get_record($this->uri->segment(4));
	$this->load->view('control/pixel-admin/control_layout', $data);
}

	//update
	public function update(){
		$this->load->helper('form');
		$this->load->library('form_validation');
		$this->form_validation->set_rules('nickname', 'Nickname', 'required');
		$this->form_validation->set_rules('password', 'Password', 'required');
		$this->form_validation->set_rules('email', 'Email', 'required');
		$this->form_validation->set_rules('apellido', 'Apellido', 'required');
		$this->form_validation->set_rules('nombre', 'Nombre', 'required');
		$this->form_validation->set_rules('dni', 'Dni', 'required');
		$this->form_validation->set_rules('sexo', 'Sexo', 'required');
		$this->form_validation->set_rules('nacimiento', 'Nacimiento', 'required');
		$this->form_validation->set_rules('edad', 'Edad', 'required');
		$this->form_validation->set_rules('telcontacto', 'Telcontacto', 'required');
		$this->form_validation->set_rules('barrio', 'Barrio', 'required');
		$this->form_validation->set_rules('calle', 'Calle', 'required');
		$this->form_validation->set_rules('numero', 'Numero', 'required');
		$this->form_validation->set_rules('conocio', 'Conocio', 'required');
		$this->form_validation->set_rules('profesion', 'Profesion', 'required');
		$this->form_validation->set_rules('localidad', 'Localidad', 'required');
		$this->form_validation->set_rules('fuma', 'Fuma', 'required');
		$this->form_validation->set_rules('toma', 'Toma', 'required');
		$this->form_validation->set_rules('descripcion', 'Descripcion', 'required');
		$this->form_validation->set_rules('estado_civil', 'Estado_civil', 'required');
		$this->form_validation->set_rules('educacion', 'Educacion', 'required');
		$this->form_validation->set_rules('provincia', 'Provincia', 'required');
		$this->form_validation->set_rules('zodiaco', 'Zodiaco', 'required');
		$this->form_validation->set_rules('busco', 'Busco', 'required');
		$this->form_validation->set_rules('nacionalidad', 'Nacionalidad', 'required');
		$this->form_validation->set_rules('activo', 'Activo', 'required');
		$this->form_validation->set_rules('estatura', 'Estatura', 'required');
		$this->form_validation->set_rules('peso', 'Peso', 'required');
		$this->form_validation->set_rules('contextura_fisica', 'Contextura_fisica', 'required');
		$this->form_validation->set_rules('color_pelo', 'Color_pelo', 'required');
		$this->form_validation->set_rules('color_ojos', 'Color_ojos', 'required');
		$this->form_validation->set_rules('tipo_busuqeda', 'Tipo_busuqeda', 'required');
		$this->form_validation->set_message('required','El campo %s es requerido.');

		if ($this->form_validation->run() === FALSE){
			$this->load->helper('form');

			$data['title'] = 'Nuevo usuario';
			$data['content'] = 'control/usuarios/edit_usuario';
			$data['menu'] = 'control/usuarios/menu_usuario';
			$data['query'] = $this->usuario->get_record($this->input->post('id'));
			$this->load->view('control/pixel-admin/control_layout', $data);
		}else{
			$id=  $this->input->post('id');

			if($this->input->post('slug')){
				$this->load->helper('url');
				$slug = url_title($this->input->post('titulo'), 'dash', TRUE);
			}

			$editedusuario = array(
				'nickname' => $this->input->post('nickname'),
				'email' => $this->input->post('email'),
				'apellido' => $this->input->post('apellido'),
				'nombre' => $this->input->post('nombre'),
				'dni' => $this->input->post('dni'),
				'sexo' => $this->input->post('sexo'),
				'nacimiento' => $this->input->post('nacimiento'),
				'edad' => $this->input->post('edad'),
				'telcontacto' => $this->input->post('telcontacto'),
				'barrio' => $this->input->post('barrio'),
				'calle' => $this->input->post('calle'),
				'numero' => $this->input->post('numero'),
				'piso' => $this->input->post('piso'),
				'depto' => $this->input->post('depto'),
				'conocio' => $this->input->post('conocio'),
				'profesion' => $this->input->post('profesion'),
				'localidad' => $this->input->post('localidad'),
				'fuma' => $this->input->post('fuma'),
				'toma' => $this->input->post('toma'),
				'descripcion' => $this->input->post('descripcion'),
				'telcelular' => $this->input->post('telcelular'),
				'estado_civil' => $this->input->post('estado_civil'),
				'educacion' => $this->input->post('educacion'),
				'provincia' => $this->input->post('provincia'),
				'zodiaco' => $this->input->post('zodiaco'),
				'busco' => $this->input->post('busco'),
				'ocupacion' => $this->input->post('ocupacion'),
				'celular_cia' => $this->input->post('celular_cia'),
				'tel_citas' => $this->input->post('tel_citas'),
				'validado' => $this->input->post('validado'),
				'hijos' => $this->input->post('hijos'),
				'codigo_verificacion' => $this->input->post('codigo_verificacion'),
				'negocios' => $this->input->post('negocios'),
				'cod_postal' => $this->input->post('cod_postal'),
				'religion' => $this->input->post('religion'),
				'foto_main' => $this->input->post('foto_main'),
				'nacionalidad' => $this->input->post('nacionalidad'),
				'activo' => $this->input->post('activo'),
				'estatura' => $this->input->post('estatura'),
				'peso' => $this->input->post('peso'),
				'contextura_fisica' => $this->input->post('contextura_fisica'),
				'color_pelo' => $this->input->post('color_pelo'),
				'color_ojos' => $this->input->post('color_ojos'),
				'convivencia' => $this->input->post('convivencia'),
				'facebook' => $this->input->post('facebook'),
				'twitter' => $this->input->post('twitter'),
				'linkedin' => $this->input->post('linkedin'),
				'youtube' => $this->input->post('youtube'),
				'myspace' => $this->input->post('myspace'),
				'badoo' => $this->input->post('badoo'),
				'msn' => $this->input->post('msn'),
				'skype' => $this->input->post('skype'),
				'whatsapp' => $this->input->post('whatsapp'),
				'google' => $this->input->post('google'),
				'tipo_busuqeda' => $this->input->post('tipo_busuqeda'),
				'completa_signin' => $this->input->post('completa_signin'),
				'claves_erroneas' => $this->input->post('claves_erroneas'),
				'id_paises' => $this->input->post('id_paises'),
				'score' => $this->input->post('score'),
				);
		#save
		$this->session->set_flashdata('success', 'usuario Actualizado!');
		$this->usuario->update_record($id, $editedusuario);
		if($this->input->post('id')!=""){
			redirect('control/usuarios', 'refresh');
		}else{
			redirect('control/usuarios', 'refresh');
		}



	}



	}


//delete comfirm
public function delete_comfirm(){
	$this->load->helper('form');
	$data['content'] = 'control/usuarios/comfirm_delete';
	$data['title'] = 'Eliminar usuario';
	$data['menu'] = 'control/usuarios/menu_usuario';
	$data['query'] = $data['query'] = $this->usuario->get_record($this->uri->segment(4));
	$this->load->view('control/pixel-admin/control_layout', $data);


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

		$data['content'] = 'control/usuarios/comfirm_delete';
		$data['title'] = 'Eliminar usuario';
		$data['menu'] = 'control/usuarios/menu_usuario';
		$data['query'] = $this->usuario->get_record($this->input->post('id'));
		$this->load->view('control/pixel-admin/control_layout', $data);
	}else{
		#validation passed
		$this->session->set_flashdata('success', 'usuario eliminado!');

		$imagenes = $this->imagenes_usuario->imagenes_usuario($this->input->post('id'));
		if(!empty($imagenes->result())){
			foreach ($imagenes->result() as $imagen) {
				$path = 'images-usuarios/'.$imagen->filename;
				if(strlen($path) >20){\
					unlink($path);
				}
			}
		}

		$this->usuario->delete_record($this->input->post('id'));
		redirect('control/usuarios', 'refresh');

	}
}

public function imagenes(){
	$this->load->helper('form');
	$data['content'] = 'control/usuarios/imagenes';
	$data['title'] = 'Imagenes ';
	$data['menu'] = 'control/usuarios/menu_usuario';
	$data['query_imagenes'] = $this->imagenes_usuario->imagenes_usuario($this->uri->segment(4));
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
				'usuario_id' => $this->input->post('id'),
				'filename' => $file['filename'],
				);
		#save
			$this->session->set_flashdata('success', 'Imagen cargada!');
			$this->imagenes_usuario->add_record($nueva_imagen);
			redirect('control/usuarios/imagenes/'.$this->input->post('id'));
		}
		$this->session->set_flashdata('error', $file['msg']);

	}
	redirect('control/usuarios/imagenes/'.$this->input->post('id'));
}

public function delete_imagen(){
	$id_imagen = $this->uri->segment(4);

	$imagen = $this->imagenes_usuario->get_record($id_imagen);
	$path = 'images-usuarios/'.$imagen->filename;
	unlink($path);

	$this->imagenes_usuario->delete_record($id_imagen);
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
		$yukle->set_directory('./images-usuarios');
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
