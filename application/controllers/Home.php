<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller {


	public function __construct()

    {

        parent::__construct();
        $this->load->model('FotoModel');
        $this->load->model('AlbumModel');
    }

	public function index()
	{
		$data['fotos'] = $this->FotoModel->get_fotos();
        $data['albumsi'] = $this->AlbumModel->get_albums();
		$this->load->view('template/v_header');
        $this->load->view('v_home', $data);
        $this->load->view('template/v_footer');
	}
}
