<?php

class Cita extends CI_Model{

	public function __construct(){

	$this->load->database();

	}
	//all
	public function get_records($num,$start){
		 $this->db->select()->from('citas')->order_by('id','DESC')->limit($num,$start);
		 return $this->db->get()->result();

		// 		$this->db->select('e.*, c.*, u.*');
		// 	     $this->db->from('eventos e, citas c, usuarios u');
		// 	     $this->db->where('c.id = c.usuario_id');
		// 	     $this->db->where('e.id = c.evento_id');
		// 	     $query = $this->db->get();
		//
		// SELECT e.id, e.fecha, e.localidad, u.*, c.*
		// FROM
		// eventos e, usuarios u, citas c
		// WHERE e.id = c.evento_id
		// AND u.id = c.usuario_id

	}




	public function check_clasificacion($evento_id, $usuario_id, $cita_id)
	{
		$this->db->where('evento_id', $evento_id);
		$this->db->where('usuario_id', $usuario_id);
		$this->db->where('cita_id', $cita_id);
		$this->db->limit(1);
		$c = $this->db->get('citas');
		if( empty($c->row()->clasificacion_id)){
			return null;
		}
		return $c->row()->clasificacion_id;
	}

	public function citas_by_evento($evento_id, $usuario_id)
	{
		$this->db->where('evento_id', $evento_id);
		$this->db->where('usuario_id', $usuario_id);

		return $this->db->get('citas')->result();
	}

	//detail
	public function get_record($id){
		$this->db->where('id' ,$id);
		$this->db->limit(1);
		$c = $this->db->get('citas');

		return $c->row();
	}

	//total rows
	public function count_rows(){
		$this->db->select('id')->from('citas');
		$query = $this->db->get();
		return $query->num_rows();
	}



	//add new
	public function add_record($data)
	{
		$this->db->insert('citas', $data);
	}


	//update
	public function update_record($id, $data){

		$this->db->where('id', $id);
		$this->db->update('citas', $data);

	}

	//destroy
	public function delete_record($id){

		$this->db->where('id', $id);
		$this->db->delete('citas');
	}

	public function remove_by_evento_and_user($evento_id, $usuario_id)
	{
		$this->db->where('evento_id', $evento_id);
		$this->db->where('usuario_id', $usuario_id);
		$this->db->delete('citas');
	}


		/*
		public function traer_nombre($id){
					$this->db->where('citas_categoria_id' ,$id);
					$this->db->limit(1);
					$c = $this->db->get('citas');

					return $c->row('nombre');
				}

		*/

}

?>
