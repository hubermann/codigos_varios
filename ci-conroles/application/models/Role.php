<?php

class Role extends CI_Model{

	public function __construct()
	{
		$this->load->database();
	}
	//all
	public function get_records($num,$start)
	{
		$this->db->select()->from('roles')->order_by('id','ASC')->limit($num,$start);
		return $this->db->get()->result();
	}

	public function get_records_menu()
	{
		$this->db->select()->from('roles')->order_by('nombre','ASC');
		return $this->db->get()->result();

	}

	//detail
	public function get_record($id)
	{
		$this->db->where('id' ,$id);
		$this->db->limit(1);
		$c = $this->db->get('roles');

		return $c->row();
	}

	//total rows
	public function count_rows()
	{
		$this->db->select('id')->from('roles');
		$query = $this->db->get();
		return $query->num_rows();
	}



	//add new
	public function add_record($data)
	{
		 $this->db->insert('roles', $data);
		 $last_role = $this->db->insert_id();

		$modulos = array(
			'usuarios',
			'notas',
			'eventos',
			'categoria_eventos',
			'beneficios',
			'categoria_notas',
			'citas',
			'eventos_tipos',
			'imagenes_lugares ',
			'imagenes_notas',
			'imagenes_usuarios',
			'imagenes_lugares',
			'lugares',
			'useradmin',
		);

		try {

			foreach ($modulos as $modulo) {
				$this->db->select('id')->from('modulos')->where('nombre' , $modulo );
				$query = $this->db->get();

				 if( !empty($query->row()->id))
				 {
					 $modulo_data = array(
			 			'role_id' => $last_role,
						'modulo_id' => $query->row()->id,
						'view' => 0,
						'build' => 0,
						'modify' => 0,
						'destroy' => 0
			 		);
			 		$this->db->insert('permisos', $modulo_data);

				 }//end if
			}


		} catch (\Exception $e) {
			//fail
		}


	}


	//update
	public function update_record($id, $data){

		$this->db->where('id', $id);
		$this->db->update('roles', $data);

	}

	//destroy
	public function delete_record($id){

		$this->db->where('id', $id);
		$this->db->delete('roles');
	}


}

?>
