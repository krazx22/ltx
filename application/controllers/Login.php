<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Login extends CI_Controller
{

	public function __construct()
	{
		parent::__construct();
		$this->load->model('UserModel');
		$this->load->model('FotoModel');
        $this->load->model('AlbumModel');
	}

	public function index()
	{
		$this->load->view('template/v_header');
		$this->load->view('v_login');
		$this->load->view('template/v_footer');
	}

	public function register()
	{
		$this->load->view('template/v_header');
		$this->load->view('v_register');
		$this->load->view('template/v_footer');
	}

	public function register_user()
	{
		//$this->load->library('form_validation');

		// Set aturan validasi
		$this->form_validation->set_rules('username', 'Username', 'required|is_unique[user.username]');
		$this->form_validation->set_rules('password', 'Password', 'required');
		$this->form_validation->set_rules('email', 'Email', 'required');
		$this->form_validation->set_rules('namalengkap', 'NamaLengkap', 'required');
		$this->form_validation->set_rules('alamat', 'Alamat', 'required');

		if ($this->form_validation->run() == FALSE) {
			// Jika validasi gagal, kembali ke halaman registrasi
			$this->load->view('template/v_header');
			$this->load->view('v_register');
			$this->load->view('template/v_footer');
		} else {
			// Jika validasi berhasil, simpan data ke database

			$data = array(
				'username' => $this->input->post('username'),
				'password' => password_hash($this->input->post('password'), PASSWORD_DEFAULT),
				'namalengkap' => $this->input->post('namalengkap'),
				'email' => $this->input->post('email'),
				'alamat' => $this->input->post('alamat')
			);

			$this->UserModel->register($data);

			// Tampilkan pesan sukses atau redirect ke halaman lain
			//echo "Registrasi berhasil!";
			$this->load->view('template/v_header');
			$this->load->view('v_login');
			$this->load->view('template/v_footer');
		}
	}

	public function authenticate()
	{
		$this->load->library('form_validation');

		// Set aturan validasi
		$this->form_validation->set_rules('username', 'Username', 'required');
		$this->form_validation->set_rules('password', 'Password', 'required');

		if ($this->form_validation->run() == FALSE) {
			// Jika validasi gagal, kembali ke halaman login
			//$this->load->view('login_form'); redirect('Login');
		} else {
			// Jika validasi berhasil, cek autentikasi
			$username = $this->input->post('username');
			$password = $this->input->post('password');

			$user = $this->UserModel->get_user($username);

			if ($user && password_verify($password, $user['Password'])) {
				// Autentikasi berhasil, set session dan redirect ke halaman lain
				//$this->session->set_userdata('userid', $user['UserID']);
				$this->session->set_userdata('logged_in', TRUE);
				$this->session->set_userdata('username', $username);
				$this->session->set_userdata('userid', $user['UserID']);
				//redirect('dashboard'); // Ganti 'dashboard' dengan halaman setelah login


				//echo "Berhasil Login";
				$data['fotos'] = $this->FotoModel->get_fotos();
				$data['albumsi'] = $this->AlbumModel->get_albums();
				$this->load->view('template/v_header');
				$this->load->view('v_home',$data);
				$this->load->view('template/v_footer');
			} else {
				// Autentikasi gagal, tampilkan pesan error
				echo "Login gagal. Periksa username dan password.";
			}
		}
	}

	public function logout()
	{
		// Hapus data login dari session
		$this->session->unset_userdata('logged_in');
		$this->session->unset_userdata('username');
		redirect('home');
	}
}
