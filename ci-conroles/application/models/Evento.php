<?php

class Evento extends CI_Model{

	public function __construct(){

	$this->load->database();

	}

	public function get_records($num=10,$start=1)
	{
		$this->db->select("eventos.*,eventos.id as evento_id,categoria_eventos.id as categoria_id,categoria_eventos.nombre as categoria_nombre, lugares.direccion as evento_direccion, lugares.filename as logo_lugar,lugares.nombre as nombre_lugar, eventos_tipos.id, eventos_tipos.nombre as evento_tipo");
	  $this->db->from("eventos");
	  $this->db->join("categoria_eventos", "categoria_eventos.id = eventos.categoria_id",'left');
		$this->db->join("lugares", "lugares.id = eventos.lugar",'left');
		$this->db->join("eventos_tipos", "eventos_tipos.id = eventos.tipo_evento",'left');
		$this->db->order_by('eventos.id','ASC')->limit($num,$start);
		return $this->db->get()->result();
	}

	public function get_lasts($num=1)
	{
		$this->db->select("eventos.*,eventos.id as evento_id,categoria_eventos.id as categoria_id,categoria_eventos.nombre as categoria_nombre, lugares.direccion as evento_direccion, lugares.filename as logo_lugar,lugares.nombre as nombre_lugar, eventos_tipos.id, eventos_tipos.nombre as evento_tipo");
	  $this->db->from("eventos");
	  $this->db->join("categoria_eventos", "categoria_eventos.id = eventos.categoria_id",'left');
		$this->db->join("lugares", "lugares.id = eventos.lugar",'left');
		$this->db->join("eventos_tipos", "eventos_tipos.id = eventos.tipo_evento",'left');
		$this->db->order_by('eventos.id','ASC')->limit($num);
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



	//detail
	public function get_record($id){
		$this->db->select("eventos.*, eventos.id as evento_id, categoria_eventos.id as categoria_id,categoria_eventos.nombre as categoria_nombre,lugares.direccion as evento_direccion, lugares.filename as logo_lugar,lugares.nombre as nombre_lugar");
		$this->db->where('eventos.id' ,$id);
		$this->db->join("categoria_eventos", "categoria_eventos.id = eventos.categoria_id",'left');
		$this->db->join("lugares", "lugares.id = eventos.lugar",'left');
		$this->db->join("eventos_tipos", "eventos_tipos.id = eventos.tipo_evento",'left');
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



		//add new
		public function add_record($data){
			$this->db->insert('eventos', $data);
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
