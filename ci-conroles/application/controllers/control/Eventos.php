<?php

class Eventos extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		$this->load->model('evento');
		$this->load->model('lugar');
		$this->load->model('categoria_evento');
		$this->load->model('eventos_tipo');
				$this->load->model('usuarios_evento');
		$this->load->helper('url');
		$this->load->library('session');

		//Si no hay session redirige a Login
		if (! $this->session->userdata('logged_in')) {
			redirect('dashboard');
		}

		if (! ini_get('date.timezone')) {
			date_default_timezone_set('GMT');
			setlocale(LC_ALL, "es_ES");
			setlocale(LC_TIME, 'es_AR');
		}

		$this->data['thumbnail_sizes'] = array(); //thumbnails sizes
	}

	public function index()
	{
		//Pagination
		$per_page = 10;
		$page = $this->uri->segment(3);
		if (!$page) {
			$start =0;
			$page =1;
		} else {
			$start = ($page -1) * $per_page;
		}
		$data['pagination_links'] = "";
		$total_pages = ceil($this->evento->count_rows() / $per_page);

		if ($total_pages > 1) {
			for ($i=1;$i<=$total_pages;$i++) {
				if ($page == $i) {
					//si muestro el índice de la página actual, no coloco enlace
					$data['pagination_links'] .=  '<li class="active"><a>'.$i.'</a></li>';
				} else {
					//si el índice no corresponde con la página mostrada actualmente, coloco el enlace para ir a esa pagina
					$data['pagination_links']  .= '<li><a href="'.base_url().'control/eventos/'.$i.'" > '. $i .'</a></li>';
				}
			}
		}
		//End Pagination

		$data['title'] = 'eventos';
		$data['menu'] = 'control/eventos/menu_evento';
		$data['content'] = 'control/eventos/all';
		$data['query'] = $this->evento->get_records($per_page, $start);

		$this->load->view('control/pixel-admin/control_layout', $data);
	}

	//detail
	public function detail()
	{
		$data['title'] = 'evento';
		$data['content'] = 'control/eventos/detail';
		$data['menu'] = 'control/eventos/menu_evento';
		$data['evento'] = $this->evento->get_record($this->uri->segment(4));
		$this->load->view('control/pixel-admin/control_layout', $data);
	}


	//new
	public function form_new()
	{
		$this->load->helper('form');
		$data['title'] = 'Nuevo evento';
		$data['content'] = 'control/eventos/new_evento';
		$data['menu'] = 'control/eventos/menu_evento';
		$this->load->view('control/pixel-admin/control_layout', $data);
	}

	//create
	public function create()
	{
		$this->load->helper('form');
		$this->load->library('form_validation');
		$this->form_validation->set_rules('categoria_id', 'Categoria_id', 'required');
		$this->form_validation->set_rules('fecha', 'Fecha', 'required');
		$this->form_validation->set_rules('hora', 'Hora', 'required');
		$this->form_validation->set_rules('lugar', 'Lugar', 'required');
		$this->form_validation->set_rules('precio', 'Precio', 'required');
		$this->form_validation->set_rules('precio_hombres', 'Precio_hombres', 'required');
		$this->form_validation->set_rules('edad_minima', 'Edad_minima', 'required');
		$this->form_validation->set_rules('edad_maxima', 'Edad_maxima', 'required');
		$this->form_validation->set_rules('edad_minina_hombre', 'Edad_minina_hombre', 'required');
		$this->form_validation->set_rules('edad_maxima_hombre', 'Edad_maxima_hombre', 'required');
		$this->form_validation->set_rules('estado_hombres', 'Estado_hombres', 'required');
		$this->form_validation->set_rules('estado_mujeres', 'Estado_mujeres', 'required');
		$this->form_validation->set_rules('coincidencias_habilitadas', 'Coincidencias_habilitadas', 'required');
		$this->form_validation->set_rules('tipo_evento', 'Tipo_evento', 'required');
		$this->form_validation->set_rules('localidad', 'Localidad', 'required');
		$this->form_validation->set_rules('duracion_session', 'Duracion_session', 'required');

		if ($this->form_validation->run() === false) {
			$this->load->helper('form');
			$data['title'] = 'Nuevo eventos';
			$data['content'] = 'control/eventos/new_evento';
			$data['menu'] = 'control/eventos/menu_evento';
			$this->load->view('control/pixel-admin/control_layout', $data);
		} else {
			if ($this->input->post('slug')) {
				$this->load->helper('url');
				$slug = url_title($this->input->post('titulo'), 'dash', true);
			}
			$now = date("Y-m-d h:m:s");

			$newevento = array( 'categoria_id' => $this->input->post('categoria_id'),
			 'fecha' => $this->input->post('fecha'),
			 'hora' => $this->input->post('hora'),
			 'lugar' => $this->input->post('lugar'),
			 'precio' => $this->input->post('precio'),
			 'precio_hombres' => $this->input->post('precio_hombres'),
			 'edad_minima' => $this->input->post('edad_minima'),
			 'edad_maxima' => $this->input->post('edad_maxima'),
			 'edad_minina_hombre' => $this->input->post('edad_minina_hombre'),
			 'edad_maxima_hombre' => $this->input->post('edad_maxima_hombre'),
			 'estado_hombres' => $this->input->post('estado_hombres'),
			 'estado_mujeres' => $this->input->post('estado_mujeres'),
			 'coincidencias_habilitadas' => $this->input->post('coincidencias_habilitadas'),
			 'tipo_evento' => $this->input->post('tipo_evento'),
			 'localidad' => $this->input->post('localidad'),
			 'duracion_session' => $this->input->post('duracion_session'),
			 'created_at' => $now,
			 'updated_at' => $now,
			);
			#save
			$this->evento->add_record($newevento);
			$this->session->set_flashdata('success', 'evento creado. <a href="eventos/detail/'.$this->db->insert_id().'">Ver</a>');
			redirect('control/eventos', 'refresh');
		}
	}

	//edit
	public function editar()
	{
		$this->load->helper('form');
		$data['title']= 'Editar evento';
		$data['content'] = 'control/eventos/edit_evento';
		$data['menu'] = 'control/eventos/menu_evento';
		$data['query'] = $this->evento->get_record($this->uri->segment(4));
		$this->load->view('control/pixel-admin/control_layout', $data);
	}

	//update
	public function update()
	{
		#print_r($_POST).die();
		$this->load->helper('form');
		$this->load->library('form_validation');
		$this->form_validation->set_rules('categoria_id', 'Categoria_id', 'required');
		$this->form_validation->set_rules('fecha', 'Fecha', 'required');
		$this->form_validation->set_rules('hora', 'Hora', 'required');
		$this->form_validation->set_rules('lugar', 'Lugar', 'required');
		$this->form_validation->set_rules('precio', 'Precio', 'required');
		$this->form_validation->set_rules('precio_hombres', 'Precio_hombres', 'required');
		$this->form_validation->set_rules('edad_minima', 'Edad_minima', 'required');
		$this->form_validation->set_rules('edad_maxima', 'Edad_maxima', 'required');
		$this->form_validation->set_rules('edad_minina_hombre', 'Edad_minina_hombre', 'required');
		$this->form_validation->set_rules('edad_maxima_hombre', 'Edad_maxima_hombre', 'required');
		$this->form_validation->set_rules('estado_hombres', 'Estado_hombres', 'required');
		$this->form_validation->set_rules('estado_mujeres', 'Estado_mujeres', 'required');
		$this->form_validation->set_rules('coincidencias_habilitadas', 'Coincidencias_habilitadas', 'required');
		$this->form_validation->set_rules('tipo_evento', 'Tipo_evento', 'required');
		$this->form_validation->set_rules('localidad', 'Localidad', 'required');
		$this->form_validation->set_rules('duracion_session', 'Duracion_session', 'required');
		$this->form_validation->set_message('required', 'El campo %s es requerido.');

		if ($this->form_validation->run() === false) {
			$this->load->helper('form');

			$data['title'] = 'Nuevo evento';
			$data['content'] = 'control/eventos/edit_evento';
			$data['menu'] = 'control/eventos/menu_evento';
			$data['query'] = $this->evento->get_record($this->input->post('id'));
			$this->load->view('control/pixel-admin/control_layout', $data);
		} else {
			$id=  $this->input->post('id');

			if ($this->input->post('slug')) {
				$this->load->helper('url');
				$slug = url_title($this->input->post('titulo'), 'dash', true);
			}

			$editedevento = array(
			'categoria_id' => $this->input->post('categoria_id'),
			'fecha' => $this->input->post('fecha'),
			'hora' => $this->input->post('hora'),
			'lugar' => $this->input->post('lugar'),
			'precio' => $this->input->post('precio'),
			'precio_hombres' => $this->input->post('precio_hombres'),
			'edad_minima' => $this->input->post('edad_minima'),
			'edad_maxima' => $this->input->post('edad_maxima'),
			'edad_minina_hombre' => $this->input->post('edad_minina_hombre'),
			'edad_maxima_hombre' => $this->input->post('edad_maxima_hombre'),
			'estado_hombres' => $this->input->post('estado_hombres'),
			'estado_mujeres' => $this->input->post('estado_mujeres'),
			'coincidencias_habilitadas' => $this->input->post('coincidencias_habilitadas'),
			'tipo_evento' => $this->input->post('tipo_evento'),
			'localidad' => $this->input->post('localidad'),
			'duracion_session' => $this->input->post('duracion_session'),
			'updated_at' => $this->input->post('updated_at'),
			);
			#save
			$this->session->set_flashdata('success', 'evento Actualizado!');
			$this->evento->update_record($id, $editedevento);
			if ($this->input->post('id')!="") {
				redirect('control/eventos', 'refresh');
			} else {
				redirect('control/eventos', 'refresh');
			}
		}
	}



	//destroy
	public function destroy()
	{
		if ($this->uri->segment(4)) {
			$this->session->set_flashdata('success', 'evento eliminada!');

			$prod = $this->evento->get_record($this->uri->segment(4));
			$path = (isset($prod->filename)) ? $prod->filename : "";
			if ($path!="") {
				unlink('images-eventos/'.$path);
			}

			$this->evento->delete_record($this->uri->segment(4));
		} else {
			$this->session->set_flashdata('warning', 'Error al eliminar!');
		}

		redirect('control/eventos', 'refresh');
	}


	//delete comfirm
	public function delete_comfirm()
	{
		$this->load->helper('form');
		$data['content'] = 'control/eventos/comfirm_delete';
		$data['title'] = 'Eliminar evento';
		$data['menu'] = 'control/eventos/menu_evento';
		$data['query'] = $data['query'] = $this->evento->get_record($this->uri->segment(4));
		$this->load->view('control/pixel-admin/control_layout', $data);
	}

	//delete
	public function delete()
	{
		$this->load->helper('form');
		$this->load->library('form_validation');

		$this->form_validation->set_rules('comfirm', 'comfirm', 'required');
		$this->form_validation->set_message('required', 'Por favor, confirme para eliminar.');


		if ($this->form_validation->run() === false) {
			#validation failed
			$this->load->helper('form');

			$data['content'] = 'control/eventos/comfirm_delete';
			$data['title'] = 'Eliminar evento';
			$data['menu'] = 'control/eventos/menu_evento';
			$data['query'] = $this->evento->get_record($this->input->post('id'));
			$this->load->view('control/pixel-admin/control_layout', $data);
		} else {
			#validation passed
			$this->session->set_flashdata('success', 'evento eliminado!');

			$prod = $this->evento->get_record($this->input->post('id'));
			$path = 'images-eventos/'.$prod->filename;
			if (is_link($path)) {
				unlink($path);
			}

			$id_item = $this->uri->segment(4);


			$this->evento->delete_record($id_item);
			redirect('control/eventos', 'refresh');
		}
	}


		public function solicitudes_recibidas()
		{
						//Solicitudes que el usuario pidio que lo agreguen - Solicitud recibida (desde front) STATUS=1
			$evento = $this->check_evento_id();
			$data['usuarios'] = $this->usuarios_evento->get_solicitudes_recibidas($evento->id);
			$data['evento'] = $evento;
			$data['content'] ='control/eventos/solicitudes_recibidas';
			$this->load->view('control/pixel-admin/control_layout', $data);
		}

		public function solicitudes_aprobadas()
		{
						# solicitud aprobada (aguardando pago) STATUS=2
			$evento = $this->check_evento_id();
			$data['usuarios'] = $this->usuarios_evento->get_solicitudes_aprobadas($evento->id);
			$data['evento'] = $evento;
			$data['content'] ='control/eventos/solicitudes_aprobadas';
			$this->load->view('control/pixel-admin/control_layout', $data);
		}

		public function solicitudes_pago_demorado()
		{
						# pago demorado STATUS=3
			$usuarios = $this->usuarios_evento->get_solicitudes_pendientes($evento->id);
		}


		public function solicitudes_confirmadas()
		{
						# Pagado y confirmado STATUS=4
			$evento = $this->check_evento_id();
			$data['usuarios'] = $this->usuarios_evento->get_solicitudes_comfirmadas($evento->id);
			$data['evento'] = $evento;
			$data['content'] ='control/eventos/solicitudes_comfirmadas';
			$this->load->view('control/pixel-admin/control_layout', $data);
		}

		public function check_evento_id()
		{
			if(!$this->uri->segment(4))
			{
				$this->session->set_flashdata('warning', 'Se requiere id del evento');
				return redirect('/control/eventos/');
			}
			return $evento = $this->evento->get_record($this->uri->segment(4));
		}




} //end class
