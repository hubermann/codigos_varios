<?php

class Usuario_tipo_relacion extends CI_Model
{
    public function __construct()
    {
        $this->load->database();
    }
    //all
    public function get_records($id)
    {
        $this->db->select()->from('usuario_tipos_relacion')->where('user_id', $id);
        return $this->db->get()->result();
    }

		public function get_records_by_user($id)
    {
        $query = $this->db->select()->from('usuario_tipos_relacion')->where('user_id', $id);
				return $this->db->get()->result();
    }

    //detail
    public function get_record($user_id, $evento_id)
    {
        $this->db->where('user_id', $user_id);
        $this->db->where('tipo_relacion_id', $evento_id);
        $this->db->limit(1);
        $c = $this->db->get('usuario_eventos');

        return $c->row();
    }


    //add new
    public function add_record($data)
    {
        $this->db->insert('usuario_tipos_relacion', $data);
    }

    //destroy
    public function delete_record($user_id, $evento_id)
    {
        $this->db->where('user_id', $user_id);
				$this->db->where('tipo_relacion_id', $evento_id);
        $this->db->delete('usuario_tipos_relacion');
    }

		public function reset($user_id)
    {
        $this->db->where('user_id', $user_id);
        $this->db->delete('usuario_tipos_relacion');
    }

}
