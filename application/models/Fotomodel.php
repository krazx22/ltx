<?php
defined('BASEPATH') or exit('No direct script access allowed');
class Fotomodel extends CI_Model
{
    public function __construct()
    {
        parent::__construct();
        $this->load->database();
    }

    public function tambah_foto($data)

    {

        return $this->db->insert('foto', $data);
    }

    //menampilkan data album
    public function get_fotos()
    {
        return $this->db->get('foto')->result_array();
    }

    //ambil data dari database berdasarkan id album
    public function get_foto_by_id($id)
    {
        return $this->db->where('FotoID', $id)->get('foto')->row_array();
    }
    //update album
    public function update_photo($id, $data)

    {

        $this->db->where('FotoID', $id);
        $this->db->update('foto', $data);
    }

    public function get_photo_name($id)

    {

        $this->db->select('*');
        $this->db->from('foto');
        $this->db->where('FotoID', $id);
        $query = $this->db->get();

        if ($query->num_rows() > 0) {
            $row = $query->row();
            return $row->LokasiFile;
        } else {

            return FALSE;
        }
    }

    public function getDataByID($id)
    {
        return $this->db->get_where('foto', array('FotoID' => $id));
    }
    //mendapatkan semua data dari tabel album
    public function get_all_fotos()
    {
        return $this->db->get('foto')->result_array();
    }

    //delete data album
    public function delete_foto($id)

    {
        $this->db->where('FotoID', $id);
        return $this->db->delete('foto'); // Ganti 'album' dengan nama tabel Anda
    }

    //menambahkan data foto


}
