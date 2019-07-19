<?php

class Imagenes_usuario extends CI_Model
{
    public function __construct()
    {
        $this->load->database();
    }

    public function get_records($num, $start)
    {
        $this->db->select()->from('imagenes_usuarios')->limit($num, $start);
        return $this->db->get();
    }

    public function view_all($id)
    {
        $this->db->where('usuario_id', $id);
        return  $this->db->get('imagenes_usuarios');
    }

    public function imagenes_usuario($id_usuario)
    {
        $this->db->select()->from('imagenes_usuarios')->where('usuario_id', $id_usuario);
        return $this->db->get();
    }

    //detail
    public function get_record($id)
    {
        $this->db->where('id', $id);
        $this->db->limit(1);
        $c = $this->db->get('imagenes_usuarios');
        return $c->row();
    }

    public function update_avatar($imagen_id, $user_id)
    {
        $this->db->where('usuario_id', $user_id);
        $this->db->update('imagenes_usuarios', ['avatar' => 0]);
        $this->db->where('id', $imagen_id);
        $this->db->update('imagenes_usuarios', ['avatar' => 1]);
        return true;
    }

    public function usuario_avatar($user_id)
    {
        $this->db->where('usuario_id', $user_id);
        $this->db->where('avatar', 1);
        $c = $this->db->get('imagenes_usuarios');
        return $c->row('filename');
    }

    public function get_records_menu()
    {
        $this->db->select()->from('imagenes_usuarios')->order_by('id', 'ASC');
        return $this->db->get();
    }

    public function count_rows()
    {
        $this->db->select('id')->from('imagenes_usuarios');
        $query = $this->db->get();
        return $query->num_rows();
    }

    public function add_record($data)
    {
        $this->db->insert('imagenes_usuarios', $data);
    }

    public function update_record($id, $data)
    {
        $this->db->where('id', $id);
        $this->db->update('imagenes_usuarios', $data);
    }

    public function delete_record($id_imagen)
    {
        $this->db->where('id', $id_imagen);
        $this->db->delete('imagenes_usuarios');
    }
}
