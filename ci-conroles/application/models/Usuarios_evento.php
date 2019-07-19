<?php

class Usuarios_evento extends CI_Model{

	public function __construct(){

	$this->load->database();

	}

	// public function get_records($num=10,$start=1)
	// {
	// 	$this->db->select("eventos.*,categoria_eventos.id as categoria_id,categoria_eventos.nombre as categoria_nombre, lugares.direccion as evento_direccion, lugares.filename as logo_lugar, eventos_tipos.id, eventos_tipos.nombre as evento_tipo");
	//   $this->db->from("eventos");
	//   $this->db->join("categoria_eventos", "categoria_eventos.id = eventos.categoria_id",'left');
	// 	$this->db->join("lugares", "lugares.id = eventos.lugar",'left');
	// 	$this->db->join("eventos_tipos", "eventos_tipos.id = eventos.tipo_evento",'left');
	// 	$this->db->order_by('eventos.id','ASC')->limit($num,$start);
	// 	return $this->db->get()->result();
	// }


	public function get_solicitudes_recibidas($evento_id)
	{
			$this->db->select('usuarios_eventos.*, usuarios.id as user_id,usuarios.nickname,usuarios.nombre,usuarios.apellido,usuarios.edad,usuarios.email,usuarios.sexo,usuarios.provincia,usuarios.localidad,')
					->from('usuarios_eventos')
					->where('usuarios_eventos.evento_id', $evento_id)
					->where('usuarios_eventos.status', 1);

		  $this->db->join("usuarios", "usuarios_eventos.usuario_id = usuarios.id",'left');
			$this->db->join("lugares", "lugares.id = usuarios_eventos.evento_id",'left');
			//$this->db->join("eventos_tipos", "eventos_tipos.id = eventos.tipo_evento",'left');
			//$this->db->order_by('eventos.id','ASC');
			return $this->db->get()->result();
	}

	public function get_solicitudes_aprobadas($evento_id)
	{
			$this->db->select('usuarios_eventos.*, usuarios.id as user_id,usuarios.nickname,usuarios.nombre,usuarios.apellido,usuarios.edad,usuarios.email,usuarios.sexo,usuarios.provincia,usuarios.localidad,')
					->from('usuarios_eventos')
					->where('usuarios_eventos.evento_id', $evento_id)
					->where('usuarios_eventos.status', 2);

		  $this->db->join("usuarios", "usuarios_eventos.usuario_id = usuarios.id",'left');
			$this->db->join("lugares", "lugares.id = usuarios_eventos.evento_id",'left');
			//$this->db->join("eventos_tipos", "eventos_tipos.id = eventos.tipo_evento",'left');
			//$this->db->order_by('eventos.id','ASC');
			return $this->db->get()->result();
	}

	public function get_solicitudes_comfirmadas($evento_id)
	{
			$this->db->select('usuarios_eventos.*, usuarios.id as user_id,usuarios.nickname,usuarios.nombre,usuarios.apellido,usuarios.edad,usuarios.email,usuarios.sexo,usuarios.provincia,usuarios.localidad,')
					->from('usuarios_eventos')
					->where('usuarios_eventos.evento_id', $evento_id)
					->where('usuarios_eventos.status', 4);

		  $this->db->join("usuarios", "usuarios_eventos.usuario_id = usuarios.id",'left');
			$this->db->join("lugares", "lugares.id = usuarios_eventos.evento_id",'left');
			//$this->db->join("eventos_tipos", "eventos_tipos.id = eventos.tipo_evento",'left');
			//$this->db->order_by('eventos.id','ASC');
			return $this->db->get()->result();
	}



	public function get_records_menu()
	{
		$this->db->select("eventos.*,categoria_eventos.id as categoria_id,categoria_eventos.nombre as categoria_nombre");
	  $this->db->from("eventos");
	  $this->db->join("categoria_eventos", "categoria_eventos.id = eventos.categoria_id",'left');
		$this->db->order_by('eventos.id','ASC');
		return $this->db->get()->result();
	}

	//USuarios que si fueron al evento para poder f\gestionar sus contactos
	public function get_asistencias_comfirmadas($evento_id)
	{
			$this->db->select('usuarios_eventos.*, usuarios.id as user_id,usuarios.nickname,usuarios.nombre,usuarios.apellido,usuarios.edad,usuarios.email,usuarios.sexo,usuarios.provincia,usuarios.localidad,')
					->from('usuarios_eventos')
					->where('usuarios_eventos.evento_id', $evento_id)
					->where('usuarios_eventos.status', 4);

		  $this->db->join("usuarios", "usuarios_eventos.usuario_id = usuarios.id",'left');
			$this->db->join("lugares", "lugares.id = usuarios_eventos.evento_id",'left');
			//$this->db->join("eventos_tipos", "eventos_tipos.id = eventos.tipo_evento",'left');
			//$this->db->order_by('eventos.id','ASC');
			return $this->db->get()->result_array();
	}


	public function get_asistencias_comfirmadas_by_user($user_id)
	{
			$this->db->select('evento_id')
					->from('usuarios_eventos')
					->where('usuario_id', $user_id);
			//$this->db->join("eventos_tipos", "eventos_tipos.id = eventos.tipo_evento",'left');
			//$this->db->order_by('eventos.id','ASC');
			return $this->db->get()->result_array();
	}



	//detail
	public function get_record($id){
		$this->db->where('id' ,$id);
		$this->db->limit(1);
		$c = $this->db->get('eventos');

		return $c->row();
	}

	//total rows
	public function count_rows(){
		$this->db->select('id')->from('eventos');
		$query = $this->db->get();
		return $query->num_rows();
	}


	public function verificar_asistencia($user_id, $evento_id)
	{
		$status =0;
		$this->db->where('usuario_id',$user_id);
		$this->db->where('evento_id',$evento_id);
    $query = $this->db->get('usuarios_eventos');
    if ( $query->num_rows() > 0 )
		{
			return $query->row('status');
		}
		return $status;
	}

	public function solicitar_asistencia($user_id, $evento_id)
	{
		$this->db->where('usuario_id',$user_id);
		$this->db->where('evento_id',$evento_id);
    $query = $this->db->get('usuarios_eventos');
    if ($query->num_rows() > 0){ return false; } //ya existe
		$ahora = date("Y-m-d h:m:s");
		$data = [
			'usuario_id'=> $user_id,
			'evento_id'=>$evento_id,
			'status' => 1,
			'created_at' => $ahora,
			'updated_at' => $ahora
		];
		if($this->db->insert('usuarios_eventos', $data))
		{
			return true;
		}
		return false;
	}

		//add new
		public function add_record($data)
		{
			$this->db->insert('eventos', ['usuario_id'=> $user_id, 'evento_id'=>$evento_id]);
	  }


		//update
		public function update_record($id, $data){

			$this->db->where('id', $id);
			$this->db->update('eventos', $data);

		}

		//destroy
		public function delete_record($id){

			$this->db->where('id', $id);
			$this->db->delete('eventos');
		}


		/*
		public function traer_nombre($id){
					$this->db->where('eventos_categoria_id' ,$id);
					$this->db->limit(1);
					$c = $this->db->get('eventos');

					return $c->row('nombre');
				}

		*/

}

?>
