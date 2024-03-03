<?php
defined('BASEPATH') or exit('No direct script access allowed');
class AlbumModel extends CI_Model
{
    public function __construct()
    {
        parent::__construct();
        $this->load->database();
    }


    public function insert_album($data)
    {
        return $this->db->insert('album', $data);
    }

    //menampilkan data album
    public function get_albums()
    {
        return $this->db->get('album')->result_array();
    }

    //ambil data dari database berdasarkan id album
    public function get_album_by_id($id)
    {
        return $this->db->where('AlbumID', $id)->get('album')->row_array();
    }
    //update album
    public function update_album($id, $data)
    {
        $this->db->where('AlbumID', $id);
        return $this->db->update('album', $data);
    }

    //mendapatkan semua data dari tabel album
    public function get_all_albums()
    {
        return $this->db->get('album')->result_array();
    }

    public function get_photos_by_album($albumID)
    {
        $this->db->where('AlbumID', $albumID);
        $query = $this->db->get('foto');
        return $query->result_array();
    }
    //delete data album
    public function delete_album($id)

    {

        $this->db->where('AlbumID', $id);
        return $this->db->delete('album'); // Ganti 'album' dengan nama tabel Anda

    }
}
