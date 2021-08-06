<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->library('form_validation');
		$this->load->model('Produk_model');
		$this->load->model('Pelanggan_model');
		$this->load->helper('form');
		$this->load->helper('file');
		$this->load->library('upload');
		$this->load->library('session');
		$this->load->library('cart');
		$this->load->library('pagination');
        $this->load->helper('url_helper');
	}

	public function index()
	{
		if ($this->session->userdata('username')) {
		$data['admin'] = $this->db->get_where('admin', ['username' =>
		$this->session->userdata('username')])->row_array();
		$this->load->view('admin/index', $data);
		} else {
			echo "<script>alert('Silahkan login terlebih dahulu');</script>";
			redirect('admin/login');
		}
	}

	public function home()
	{
		
		$data['admin'] = $this->db->get_where('admin', ['username' =>
		$this->session->userdata('username')])->row_array();
		$this->load->view('admin/home', $data);
	}

	public function login()
	{
		if (isset($_POST['login'])) 
					{
						$username = $_POST["user"];
						$password = $_POST["pass"];
						#lakukan query mengecek akun ditabel pelanggan pada db
						$admin = $this->db->get_where('admin', ['username' => $username])->row_array();
						//$yangcocok = $ambil->num_rows;
						//jika 1 akun yang cocok, maka login
						if($password == $admin['password']) {
						//anda sudah login
						//mendapatkan akun dalam bentuk array
						$data = [
							'id_admin' => $admin['id_admin'],
							'username' => $admin['username'],
							'password' => $admin['password'],
							'nama_lengkap' => $admin['nama_lengkap']
						];
						//simpan di session pelanggan
						$this->session->set_userdata($data);
							echo "<div class='alert alert-info'>Login Sukses</div>";
							echo "<meta http-equiv='refresh' content='1;url=index'>";
						}else{
							echo "<div class='alert alert-danger'>Login Gagal</div>";
							echo "<meta http-equiv='refresh' content='1;url=login'>";
						}
					}
		$this->load->view('auth/admin_login');
	}

		public function logout()
	{
		$this->session->unset_userdata('username');

		$this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">
  			Anda telah logout!
			</div>');
			redirect('admin/login');
	}


}