<?php

class Eventos_tipo extends CI_Model{

	public function __construct(){

	$this->load->database();

	}
	//all
	public function get_records($num,$start){
		$this->db->select()->from('eventos_tipos')->order_by('id','DESC')->limit($num,$start);
		return $this->db->get()->result();

	}

	public function get_records_menu(){
		$this->db->select()->from('eventos_tipos')->order_by('nombre','ASC');
		return $this->db->get()->result();
	}

	//detail
	public function get_record($id){
		$this->db->where('id' ,$id);
		$this->db->limit(1);
		$c = $this->db->get('eventos_tipos');

		return $c->row();
	}

	//total rows
	public function count_rows(){
		$this->db->select('id')->from('eventos_tipos');
		$query = $this->db->get();
		return $query->num_rows();
	}



		//add new
		public function add_record($data){ $this->db->insert('eventos_tipos', $data);


	}


		//update
		public function update_record($id, $data){

			$this->db->where('id', $id);
			$this->db->update('eventos_tipos', $data);

		}

		//destroy
		public function delete_record($id){

			$this->db->where('id', $id);
			$this->db->delete('eventos_tipos');
		}


		/*
		public function traer_nombre($id){
					$this->db->where('eventos_tipos_categoria_id' ,$id);
					$this->db->limit(1);
					$c = $this->db->get('eventos_tipos');

					return $c->row('nombre');
				}

		*/

}

?>
