<?php

class Useradmins_m extends CI_Model{



	public function try_login($email = NULL, $password = NULL){

       		//consulto BD con los datos (cuento la cantidad de encontrados)
		$this->db->select('*')->from('useradmin')
		->limit(1)
		->where( array('email' => $email, 'password'=> $password));
		$query = $this->db->count_all_results();

		if ($query != 1) return FALSE;


       	######  hash('sha512', $row->salt.$row->password) #####


		$query = $this->db->select('*')->from('useradmin')
		->where( array('email' => $email, 'password'=> $password))
		->limit(1)
		->get();

		$sess_array = array('id' => $query->row('id'),'email' => $query->row('email'));

		$this->session->set_userdata('logged_in', $sess_array);

		return TRUE;

	}

	function check_role_admin($id){
		$this->db->where('id' ,$id);
		$this->db->limit(1);
		$c = $this->db->get('useradmin');

		return $c->row('role_id');

	}


		//all
	public function get_records($num,$start){
		$this->db->select('useradmin.id as admin_id, useradmin.email as admin_email, useradmin.password, useradmin.salt,roles.*');
		$this->db->from('useradmin');
		$this->db->join('roles', 'useradmin.role_id = roles.id', 'left');
		$query = $this->db->get();
		return $query->result();



	}

	public function add_record($data)
	{
		$this->db->insert('useradmin', $data);
	}

	public function get_record($id){
		$this->db->where('id' ,$id);
		$this->db->limit(1);
		$c = $this->db->get('useradmin');

		return $c->row();
	}


	//total rows
	public function count_rows(){
		$this->db->select('id')->from('useradmin');
		$query = $this->db->get();
		return $query->num_rows();
	}


		//update
		public function update_record($id, $data){

			$this->db->where('id', $id);
			$this->db->update('useradmin', $data);

		}

		//destroy
		public function delete_record($id){

			$this->db->where('id', $id);
			$this->db->delete('useradmin');
		}


		//Cerrar session
	public function logout(){
		$this->session->unset_userdata('logged_in');
		redirect('/dashboard', 'refresh');
	}



}
?>
