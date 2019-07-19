<?php

class Nota extends CI_Model{

	public function __construct(){

	$this->load->database();

	}
	//all
	public function get_records($num,$start)
	{
		$this->db->select("notas.*,categoria_notas.id as categoria_id,categoria_notas.nombre as categoria_nombre");
	  $this->db->from("notas");
	  $this->db->join("categoria_notas", "categoria_notas.id = notas.categoria_id",'left');
		$this->db->order_by('notas.id','ASC')->limit($num,$start);
		return $this->db->get()->result();
	}


	public function traer_home($num=6)
	{
		$this->db->select("notas.*,categoria_notas.id as categoria_id,categoria_notas.nombre as categoria_nombre");
	  $this->db->from("notas");
	  $this->db->join("categoria_notas", "categoria_notas.id = notas.categoria_id",'left');
		$this->db->order_by('notas.id','ASC')->limit($num);
		return $this->db->get()->result();
	}

	//detail
	public function get_record($id){
		$this->db->where('id' ,$id);
		$this->db->limit(1);
		$c = $this->db->get('notas');

		return $c->row();
	}

	//total rows
	public function count_rows(){
		$this->db->select('id')->from('notas');
		$query = $this->db->get();
		return $query->num_rows();
	}



		//add new
		public function add_record($data){ $this->db->insert('notas', $data);


	}


		//update
		public function update_record($id, $data){

			$this->db->where('id', $id);
			$this->db->update('notas', $data);

		}

		//destroy
		public function delete_record($id){

			$this->db->where('id', $id);
			$this->db->delete('notas');
		}


		/*
		public function traer_nombre($id){
					$this->db->where('notas_categoria_id' ,$id);
					$this->db->limit(1);
					$c = $this->db->get('notas');

					return $c->row('nombre');
				}

		*/

}

?>
