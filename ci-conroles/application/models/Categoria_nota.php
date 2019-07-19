<?php  

class Categoria_nota extends CI_Model{

	public function __construct(){

	$this->load->database();

	}
	//all
	public function get_records($num,$start){
		$this->db->select()->from('categoria_notas')->order_by('id','ASC')->limit($num,$start);
		return $this->db->get()->result();

	}

	public function get_records_menu(){
		$this->db->select()->from('categoria_notas')->order_by('nombre','ASC');
		return $this->db->get()->result();

	}

	//detail
	public function get_record($id){
		$this->db->where('id' ,$id);
		$this->db->limit(1);
		$c = $this->db->get('categoria_notas');

		return $c->row(); 
	}
	
	//total rows
	public function count_rows(){ 
		$this->db->select('id')->from('categoria_notas');
		$query = $this->db->get();
		return $query->num_rows();
	}



		//add new
		public function add_record($data)
		{ 
			$this->db->insert('categoria_notas', $data);
		}


		//update
		public function update_record($id, $data){

			$this->db->where('id', $id);
			$this->db->update('categoria_notas', $data);

		}

		//destroy
		public function delete_record($id){

			$this->db->where('id', $id);
			$this->db->delete('categoria_notas');
		}


		/*
		public function traer_nombre($id){
					$this->db->where('categoria_notas_categoria_id' ,$id);
					$this->db->limit(1);
					$c = $this->db->get('categoria_notas');

					return $c->row('nombre'); 
				}
		
		*/

}

?>
