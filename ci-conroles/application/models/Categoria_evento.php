<?php

class Categoria_evento extends CI_Model{

	public function __construct(){

	$this->load->database();

	}
	//all
	public function get_records($num,$start){
		$this->db->select()->from('categoria_eventos')->order_by('id','ASC')->limit($num,$start);
		return $this->db->get()->result();

	}

	public function get_records_menu(){
		$this->db->select()->from('categoria_eventos')->order_by('nombre','ASC');
		return $this->db->get()->result();
	}
	//detail
	public function get_record($id){
		$this->db->where('id' ,$id);
		$this->db->limit(1);
		$c = $this->db->get('categoria_eventos');

		return $c->row();
	}

	//total rows
	public function count_rows(){
		$this->db->select('id')->from('categoria_eventos');
		$query = $this->db->get();
		return $query->num_rows();
	}



		//add new
		public function add_record($data){ $this->db->insert('categoria_eventos', $data);


	}


		//update
		public function update_record($id, $data){

			$this->db->where('id', $id);
			$this->db->update('categoria_eventos', $data);

		}

		//destroy
		public function delete_record($id){

			$this->db->where('id', $id);
			$this->db->delete('categoria_eventos');
		}


		/*
		public function traer_nombre($id){
					$this->db->where('categoria_eventos_categoria_id' ,$id);
					$this->db->limit(1);
					$c = $this->db->get('categoria_eventos');

					return $c->row('nombre');
				}

		*/

}

?>
