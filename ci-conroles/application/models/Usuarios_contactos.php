<?php

class Usuarios_contactos extends CI_Model{

	public function __construct()
  {
	   $this->load->database();
	}


  public function get_contactos($user_id)
  {
    $this->db->select('contactos_usuarios.usuario_id,contactos_usuarios.contacto_id, contactos_usuarios.telefono, contactos_usuarios.email, usuarios.id, usuarios.nickname, usuarios.apellido');
		$this->db->from('contactos_usuarios');
		$this->db->join('usuarios', 'contactos_usuarios.contacto_id = usuarios.id', 'left');
		$this->db->where('contactos_usuarios.usuario_id =',$user_id);
		$query = $this->db->get();
		return $query->result();
  }




}
