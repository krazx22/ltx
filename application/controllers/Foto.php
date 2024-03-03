<?php defined('BASEPATH') or exit('No direct script access allowed');
class Foto extends CI_Controller

{

    public function __construct()

    {

        parent::__construct();
        $this->load->model('FotoModel');
        $this->load->model('AlbumModel');
    }

    public function index()

    {

        $data['fotos'] = $this->FotoModel->get_fotos();
        $this->load->view('template/v_header');
        $this->load->view('template/v_topbar');
        $this->load->view('v_foto', $data);
        $this->load->view('template/v_footer');
    }

    public function viewaddfoto()

    {

        $data['fotos'] = $this->FotoModel->get_fotos();
        $data['viewalbums'] = $this->AlbumModel->get_all_albums();
        $this->load->view('template/v_header');
        $this->load->view('v_addfoto', $data);
        $this->load->view('template/v_footer');
    }
    //controller menampilkan data album 
    public function get_fotos()

    {

        $data['fotos'] = $this->FotoModel->get_fotos();
        $data['fotos'] = scandir('./uploads/');
        echo json_encode($data);
    }

    public function addfoto()

    {

        // Ambil data yang dikirimkan dari form

        $data = array(

            'JudulFoto' => $this->input->post('JudulFoto'),
            'DeskripsiFoto' => $this->input->post('DeskripsiFoto'),
            'TanggalUnggah' => date('Y-m-d H:i:s'), // Gunakan tanggal dan waktu saat ini
            'LokasiFile' => $_FILES['LokasiFile']['name'],
            'AlbumID' => $this->input->post('AlbumID'),
            'UserID' => $this->session->userdata('userid')

        );

        // Upload file jika ada

        if (!empty($_FILES['LokasiFile']['name'])) {
            $config['upload_path'] = './uploads/'; // Lokasi penyimpanan file
            $config['allowed_types'] = 'gif|jpg|png|jpeg'; //Jenis file yang diizinkan
            //$this->load->library('upload', $config);

            $this->upload->initialize($config);

            if ($this->upload->do_upload('LokasiFile')) {

                $upload_data = $this->upload->data();
                $data['LokasiFile'] = $upload_data['file_name'];
            } else {
                // Handle error jika upload gagal
                $error = $this->upload->display_errors();
                echo $error;
            }
        }



        // Panggil model untuk menambahkan data baru
        $result = $this->FotoModel->tambah_foto($data);
        // Beri respons sesuai dengan hasil operasi
        if ($result) {
            //echo "Data foto berhasil ditambahkan";
            redirect('Foto');
        } else {
            echo "Gagal menambahkan data foto";
        }
    }

    public function edit($id)

    {
        // Lakukan validasi ID
        if (!isset($id) || empty($id)) {
            // Handle error jika ID tidak valid
            echo "ID tidak valid";
            return;
        }

        // Panggil model untuk mendapatkan data yang akan diupdate

        $data['fotos'] = $this->FotoModel->get_foto_by_id($id);
        $data['albums'] = $this->AlbumModel->get_albums();

        // Load view untuk form update
        $this->load->view('template/v_header');
        $this->load->view('template/v_topbar');
        $this->load->view('v_editfoto', $data);
        $this->load->view('template/v_footer');
    }

    public function update($id)
    {
        // Periksa apakah ada file yang diunggah 
        if (!empty($_FILES['LokasiFile']['name'])) {
            $this->upload_photo($id);
        }
        // Update data, termasuk foto

        $data = array(

            'JudulFoto' => $this->input->post('JudulFoto'),
            'DeskripsiFoto' => $this->input->post('DeskripsiFoto')
        );
        $this->FotoModel->update_photo($id, $data);
        // Redirect atau tampilkan pesan sukses
        redirect('foto');
    }

    private function upload_photo($id)
    {

        $config['upload_path'] = './uploads/';
        $config['allowed_types'] = 'jpg|jpeg|png|gif';
        $config['max_size'] = 2048; // Ukuran maksimum 2MB   
        $config['file_name'] = 'photo_' .  $id; //Nama file sesuaidengan ID

        $this->load->library('upload', $config);
        $this->upload->initialize($config);

        if ($this->upload->do_upload('LokasiFile')) {
            // Hapus foto lama jika ada
            $old_photo = $this->FotoModel->get_photo_name($id);
            if ($old_photo && file_exists('./uploads/' . $old_photo)) {
                unlink('./uploads/' .  $old_photo);
            }

            // Simpan nama file foto yang baru di database

            $data = array('LokasiFile' => $this->upload->data('file_name'));
            $this->FotoModel->update_photo($id, $data);
        } else {
            // Tampilkan pesan error jika proses upload gagal
            echo $this->upload->display_errors();
        }
    }



    public function delete($id)

    {
        $result = $this->FotoModel->getDataByID($id)->row();

        $nama = './uploads/' . $result->LokasiFile;

        if(is_readable($nama) && unlink($nama)){
            $delete = $this->FotoModel->delete_foto($id);
            redirect('foto');
        }else{
            echo "Gagal menghapus data";
        }
       
    }
}
