<?php

class Registro extends CI_Model{

	public function __construct(){

	$this->load->database();

	}
	//all
	public function get_records($num,$start){
		$this->db->select()->from('registros')->order_by('id','DESC')->limit($num,$start);
		return $this->db->get()->result();

	}

	//detail
	public function get_record($id){
		$this->db->where('id' ,$id);
		$this->db->limit(1);
		$c = $this->db->get('registros');

		return $c->row();
	}

	//total rows
	public function count_rows(){
		$this->db->select('id')->from('registros');
		$query = $this->db->get();
		return $query->num_rows();
	}



		//add new
		public function add_record($data){ $this->db->insert('registros', $data);


	}


		//update
		public function update_record($id, $data){

			$this->db->where('id', $id);
			$this->db->update('registros', $data);

		}

		//destroy
		public function delete_record($id){

			$this->db->where('id', $id);
			$this->db->delete('registros');
		}


		/*
		public function traer_nombre($id){
					$this->db->where('registros_categoria_id' ,$id);
					$this->db->limit(1);
					$c = $this->db->get('registros');

					return $c->row('nombre');
				}

		*/

}

?>
