<?php
defined('BASEPATH') or exit('No direct script access allowed');
class UserModel extends CI_Model
{
    public function register($data)
    {
        // Simpan data ke tabel 'user'
        $this->db->insert('user', $data);
    }


    public function get_user($username)
    {
        // Ambil data user berdasarkan username
        return $this->db->get_where('user', array('username' =>
        $username))->row_array();
    }
}
