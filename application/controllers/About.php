<?php
defined('BASEPATH') or exit('No direct script access allowed');

class About extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('AboutModel');
    }
    public function index()
    {
        $data['abouts'] = $this->AboutModel->get_abouts();
        $this->load->view('template/v_header');
        $this->load->view('template/v_topbar');
        $this->load->view('v_about', $data);
        $this->load->view('template/v_footer');
    }
    public function viewaddalbum()
    {
        $this->load->view('template/v_header');
        $this->load->view('v_addabout');
        $this->load->view('template/v_footer');
    }

    //controller tambah album
    public function addabout()

    {
        // Tangkap data dari form
        $data = array(
            'Visi' => $this->input->post('Visi'),
            'UserID' => $this->session->userdata('userid')
            //'UserID' => $this->input->post('UserID')
        );

        //panggil model untuk menyiapkan data
        $result = $this->AboutModel->insert_about($data);

        if ($result) {
            echo "Data berhasil disimpan.";
            $data['abouts'] = $this->AboutModel->get_abouts();
            /* $this->load->view('template/v_header');
                    $this->load->view('v_album', $data);
                    $this->load->view('template/v_footer');*/
            redirect('About');
        } else {
            echo "Gagal menyimpan data.";
        }
    }

    //controller menampilkan data album
    public function get_abouts()
    {
        $data['abouts'] = $this->AboutModel->get_abouts();
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
        $data['about'] = $this->AboutModel->get_about_by_id($id);

        //load view untuk form update
        $this->load->view('template/v_header');
        $this->load->view('template/v_topbar');
        $this->load->view('v_editabout', $data);
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
            'Visi' => $this->input->post('Visi')
            //tambahkan field lain yang ingin diupdate
        );

        $result = $this->AboutModel->update_about($id, $data);

        //tampilkan pesan berhasil atau gagal
        if ($result) {
            //echo "Data Berhasail Diupdate";
            redirect('about');
        } else {
            echo "GAgal Mengupdate Data";
        }
    }


    public function delete($id)

    {
        $result = $this->AboutModel->delete_about($id);
        if ($result) {
            // Jika penghapusan berhasil, redirect atau kirim pesan sukses
            redirect('about'); // Misalnya, redirect ke halaman utama album
        } else {
            // Jika penghapusan gagal, redirect atau kirim pesan kesalahan
            echo "Gagal menghapus data.";
        }
    }
}
