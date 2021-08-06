<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Auth extends CI_Controller 
{
	public function __construct()
	{
		parent::__construct();
		$this->load->model('Pelanggan_model');
		$this->load->model('Produk_model');
		$this->load->library('cart');
		$this->load->helper('form');
        $this->load->helper('url_helper');
		$this->load->library('form_validation');
	}

	public function login()
	{
		if ($this->session->userdata('email_pelanggan')) {
			redirect('beranda');
		}
		$this->form_validation->set_rules('email', 'Email', 'trim|required');
		$this->form_validation->set_rules('password', 'Password', 'trim|required');
		$data['judul'] = "Toegoe Photography | User Login";
		if ($this->form_validation->run() == false) {
		$this->load->view('auth/login', $data);
		} else {
		if (isset($_POST["login"])) {
					$email = $_POST["email"];
					$password = $_POST["password"];
					#lakukan query mengecek akun ditabel pelanggan pada db
					$pelanggan = $this->db->get_where('pelanggan', ['email_pelanggan' => $email])->row_array();
					//hitung akun yang terambil
					

					//jika 1 akun yang cocok, maka login
					if($password == $pelanggan['pass_pelanggan']) {
						//anda sudah login
						//mendapatkan akun dalam bentuk array
						$data = [
							'id_pelanggan' => $pelanggan['id_pelanggan'],
							'email_pelanggan' => $pelanggan['email_pelanggan'],
							'pass_pelanggan' => $pelanggan['pass_pelanggan'],
							'nama_pelanggan' => $pelanggan['nama_pelanggan'],
							'telepon_pelanggan' => $pelanggan['telepon_pelanggan'],
							'alamat_pelanggan' => $pelanggan['alamat_pelanggan']
						];
						//simpan di session pelanggan
						$this->session->set_userdata($data);
						echo "<div class='alert alert-info'>Login Sukses</div>";
						// echo "<script>alert('Anda sukses login');</script>";

						// jika sudah belanja
						if ($cart = $this->cart->contents())
            			{
							redirect('produk/checkout');
						}
						else
						{
							redirect('beranda');
						}
					}
					else{
						//anda gagal login
						echo "<script>alert('Anda gagal login, periksa kembali akun Anda');</script>";
						$this->load->view('auth/login');
					}
				}

		}
	}

	public function register()
	{
		if ($this->session->userdata('email_pelanggan')) {
			redirect('beranda');
		}
		$this->form_validation->set_rules('nama', 'Nama', 'required|trim');
		$this->form_validation->set_rules('email', 'Email', 'required|trim|is_unique[pelanggan.email_pelanggan]', [
			'is_unique' => 'Email ini sudah digunakan!'
		]);

		$data['judul'] = "TOEGOE Photography | Registration";
		if ( $this->form_validation->run() == false) {
		$this->load->view('auth/daftar', $data);
		} else {
			$this->Pelanggan_model->register();
			redirect('auth/login');
		}
		
	}

	public function edit_profil()
	{
		if ($this->session->userdata('email_pelanggan')) {
		$data['pelanggan'] = $this->db->get_where('pelanggan', ['email_pelanggan' =>
		$this->session->userdata('email_pelanggan')])->row_array();
		$pel = $this->db->get_where('pelanggan', ['email_pelanggan' =>
		$this->session->userdata('email_pelanggan')])->row_array();
		$this->load->view('templates/header', $data);
		$this->load->view('auth/edit_profil', $data);
		$this->load->view('templates/footer');
		$id_pelanggan = $pel['id_pelanggan'];
						// jika tombol edit ditekan
						if (isset($_POST["edit"])) 
						{
							// mengambil nama,email,password,alamat,telepon
							$data = [
								'nama_pelanggan' => $_POST['nama'],
								'alamat_pelanggan' => $_POST['alamat'],
								'telepon_pelanggan' => $_POST['telepon']
							]; 
							$where1 = array('id_pelanggan' => $id_pelanggan);
								// update data
							$this->db->update('pelanggan', $data, $where1);
								echo "<script>alert('ubah data berhasil');</script>";
								redirect('auth/profil');
						}
		} else {
			echo "<script>alert('Silahkan login terlebih dahulu');</script>";
			redirect('auth/login');
		}
	}

	public function logout()
	{
		$this->session->unset_userdata('email_pelanggan');

		$this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">
  			Anda telah logout!
			</div>');
			redirect('beranda');
	}

	public function profil()
	{
		if ($this->session->userdata('email_pelanggan')) {
		$data['pelanggan'] = $this->db->get_where('pelanggan', ['email_pelanggan' =>
		$this->session->userdata('email_pelanggan')])->row_array();
		$this->load->view('templates/header', $data);
		$this->load->view('auth/profil', $data);
		$this->load->view('templates/footer');

		} else {
			echo "<script>alert('Silahkan login terlebih dahulu');</script>";
			redirect('auth/login');
		}
	}
}

