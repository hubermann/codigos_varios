<?php  

class Beneficio extends CI_Model{

	public function __construct(){

		$this->load->database();

	}
	//all
	public function get_records($num,$start){
		$this->db->select()->from('beneficios')->order_by('id','DESC')->limit($num,$start);
		return $this->db->get()->result();

	}

		//all
	public function get_records_menu(){
		$this->db->select()->from('beneficios')->order_by('id','ASC');
		return $this->db->get();

	}

	//detail
	public function get_record($id){
		$this->db->where('id' ,$id);
		$this->db->limit(1);
		$c = $this->db->get('beneficios');

		return $c->row(); 
	}
	
	//total rows
	public function count_rows(){ 
		$this->db->select('id')->from('beneficios');
		$query = $this->db->get();
		return $query->num_rows();
	}



		//add new
	public function add_record($data)
	{ 
		$this->db->insert('beneficios', $data);
	}


		//update
	public function update_record($id, $data)
	{

		$this->db->where('id', $id);
		$this->db->update('beneficios', $data);

	}

		//destroy
	public function delete_record($id){

		$this->db->where('id', $id);
		$this->db->delete('beneficios');
	}


		/*
		public function traer_nombre($id){
					$this->db->where('beneficios_categoria_id' ,$id);
					$this->db->limit(1);
					$c = $this->db->get('beneficios');

					return $c->row('nombre'); 
				}
		
		*/

}
?>
