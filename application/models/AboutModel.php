<?php
defined('BASEPATH') or exit('No direct script access allowed');
class AboutModel extends CI_Model
{
    public function __construct()
    {
        parent::__construct();
        $this->load->database();
    }


    public function insert_about($data)
    {
        return $this->db->insert('about', $data);
    }

    //menampilkan data album
    public function get_abouts()
    {
        return $this->db->get('about')->result_array();
    }

    //ambil data dari database berdasarkan id album
    public function get_about_by_id($id)
    {
        return $this->db->where('AboutID', $id)->get('about')->row_array();
    }
    //update album
    public function update_about($id, $data)
    {
        $this->db->where('AboutID', $id);
        return $this->db->update('about', $data);
    }

    //mendapatkan semua data dari tabel album
    public function get_all_abouts()
    {
        return $this->db->get('about')->result_array();
    }

    //delete data album
    public function delete_about($id)

    {

        $this->db->where('AboutID', $id);
        return $this->db->delete('about'); // Ganti 'album' dengan nama tabel Anda

    }
}
