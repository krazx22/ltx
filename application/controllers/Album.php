<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Album extends CI_Controller
{
        public function __construct()
        {
                parent::__construct();
                $this->load->model('AlbumModel');
        }
        public function index()
        {
                $data['albums'] = $this->AlbumModel->get_albums();
                $this->load->view('template/v_header');
                $this->load->view('template/v_topbar');
                $this->load->view('v_album', $data);
                $this->load->view('template/v_footer');
        }
        public function viewaddalbum()
        {
                $this->load->view('template/v_header');
                $this->load->view('v_addalbum');
                $this->load->view('template/v_footer');
        }

        //controller tambah album
        public function addalbum()

        {
                // Tangkap data dari form
                $data = array(
                        'NamaAlbum' => $this->input->post('NamaAlbum'),
                        'Deskripsi' => $this->input->post('Deskripsi'),
                        'TanggalDibuat' => $this->input->post('TanggalDibuat'),
                        'UserID' => $this->session->userdata('userid')
                        //'UserID' => $this->input->post('UserID')
                );

                //panggil model untuk menyiapkan data
                $result = $this->AlbumModel->insert_album($data);

                if ($result) {
                        echo "Data berhasil disimpan.";
                        $data['albums'] = $this->AlbumModel->get_albums();
                        /* $this->load->view('template/v_header');
                        $this->load->view('v_album', $data);
                        $this->load->view('template/v_footer');*/
                        redirect('Album');
                } else {
                        echo "Gagal menyimpan data.";
                }
        }

        //controller menampilkan data album
        public function get_albums()
        {
                $data['albums'] = $this->AlbumModel->get_albums();
                echo json_encode($data);
        }


        //panggil data edit berdasarkan id
        public function edit($id)
        {
                //lakukan validasi ID
                if (!isset($id) || empty($id)) {
                        //handle error jika id tidak valid
                        echo "ID tidak valid";
                        return;
                }

                //panggil model untuk mendapatkan data yang akan diupdate
                $data['album'] = $this->AlbumModel->get_album_by_id($id);

                //load view untuk form update
                $this->load->view('template/v_header');
                $this->load->view('template/v_topbar');
                $this->load->view('v_editalbum', $data);
                $this->load->view('template/v_footer');
        }

        //update album
        public function update($id)
        {
                //lakukan validasi ID
                if (!isset($id) || empty($id)) {
                        //handle error jika id tidak valid
                        echo "ID tidak valid";
                        return;
                }

                //panggil metode model untuk mengupdate data
                $data = array(
                        'NamaAlbum' => $this->input->post('NamaAlbum'),
                        'Deskripsi' => $this->input->post('Deskripsi')
                        //tambahkan field lain yang ingin diupdate
                );

                $result = $this->AlbumModel->update_album($id, $data);

                //tampilkan pesan berhasil atau gagal
                if ($result) {
                        //echo "Data Berhasail Diupdate";
                        redirect('album');
                } else {
                        echo "GAgal Mengupdate Data";
                }
        }


        public function delete($id)

        {
                $result = $this->AlbumModel->delete_album($id);
                if ($result) {
                        // Jika penghapusan berhasil, redirect atau kirim pesan sukses
                        redirect('album'); // Misalnya, redirect ke halaman utama album
                } else {
                        // Jika penghapusan gagal, redirect atau kirim pesan kesalahan
                        echo "Gagal menghapus data.";
                }
        }

        public function view_photos($albumID)
        {
                $data['albumsi'] = $this->AlbumModel->get_albums();
                $data['photos'] = $this->AlbumModel->get_photos_by_album($albumID);
                //$this->load->view('photos', $data);
                $this->load->view('template/v_header');
                $this->load->view('v_homealbum', $data);
                $this->load->view('template/v_footer');
                //echo "Pindah";
        }
}
