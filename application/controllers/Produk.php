<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Produk extends CI_Controller {

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
		$data['pelanggan'] = $this->db->get_where('pelanggan', ['email_pelanggan' =>
		$this->session->userdata('email_pelanggan')])->row_array();
		//konfigurasi pagination
        $config['base_url'] = site_url('produk/index'); //site url
        $config['total_rows'] = $this->db->count_all('produk'); //total row
        $config['per_page'] = 8;  //show record per halaman
        $config["uri_segment"] = 3;  // uri parameter
        $choice = $config["total_rows"] / $config["per_page"];
        $config["num_links"] = floor($choice);
 
        // Membuat Style pagination untuk BootStrap v4
      $config['first_link']       = 'First';
        $config['last_link']        = 'Last';
        $config['next_link']        = 'Next';
        $config['prev_link']        = 'Prev';
        $config['full_tag_open']    = '<div class="pagging text-center"><nav><ul class="pagination justify-content-center">';
        $config['full_tag_close']   = '</ul></nav></div>';
        $config['num_tag_open']     = '<li class="page-item"><span class="page-link">';
        $config['num_tag_close']    = '</span></li>';
        $config['cur_tag_open']     = '<li class="page-item active"><span class="page-link">';
        $config['cur_tag_close']    = '<span class="sr-only">(current)</span></span></li>';
        $config['next_tag_open']    = '<li class="page-item"><span class="page-link">';
        $config['next_tagl_close']  = '<span aria-hidden="true">&raquo;</span></span></li>';
        $config['prev_tag_open']    = '<li class="page-item"><span class="page-link">';
        $config['prev_tagl_close']  = '</span>Next</li>';
        $config['first_tag_open']   = '<li class="page-item"><span class="page-link">';
        $config['first_tagl_close'] = '</span></li>';
        $config['last_tag_open']    = '<li class="page-item"><span class="page-link">';
        $config['last_tagl_close']  = '</span></li>';
 
        $this->pagination->initialize($config);
        $data['page'] = ($this->uri->segment(3)) ? $this->uri->segment(3) : 0;
 
        //panggil function get_mahasiswa_list yang ada pada mmodel mahasiswa_model. 
        $data['produk'] = $this->Produk_model->getProduk($config["per_page"], $data['page']);           
        $data['pagination'] = $this->pagination->create_links();
 
		$this->load->view('templates/header', $data);
		$this->load->view('produk/index', $data);
		$this->load->view('templates/footer');
	}

	public function beli($id_produk)
	{
		$produk = $this->db->get_where('produk', ['id_produk' => $id_produk])->row_array();
		$data = array(
						'id' => $produk['id_produk'],
						'name' => $produk['nama_produk'],
						'price' => $produk['harga_produk'],
						'qty' => 1,
						'tipe' => $produk['tipe_produk'],
						'stok' => $produk['stok_produk']
				);
		$d = $this->cart->insert($data);
		echo "<script>alert('Produk berhasil masuk ke keranjang belanja');</script>";
		redirect('keranjang');
	}

	public function keranjang()
	{
		$data['produk'] = $this->Produk_model->getAllProduk();
		$data['pelanggan'] = $this->db->get_where('pelanggan', ['email_pelanggan' =>
		$this->session->userdata('email_pelanggan')])->row_array();
		$this->load->view('templates/header', $data);
		$this->load->view('produk/keranjang', $data);
		$this->load->view('templates/footer');
	}

	public function hapuskeranjang($rowid)
	{
		if ($rowid=="all")
            {
                $this->cart->destroy();
            }
        else
            {
                $data = array('rowid' => $rowid,
                              'qty' =>0);
                $this->cart->update($data);
            }
        redirect('keranjang');
	}

	public function checkout()
	{
		if ($this->session->userdata('email_pelanggan')) {
			$data['pelanggan'] = $this->db->get_where('pelanggan', ['email_pelanggan' =>
			$this->session->userdata('email_pelanggan')])->row_array();
			$data['ongkir'] = $this->Produk_model->getOngkir();
			$data['produk'] = $this->Produk_model->getAllProduk();

			$this->load->view('templates/header', $data);
			$this->load->view('produk/checkout', $data);
			$this->load->view('templates/footer');

		if (isset($_POST["checkout"])) 
		{
			$nama_pelanggan = $this->input->post('nama_pelanggan', true);
			$id_pelanggan = $this->input->post('id_pelanggan', true);
			$id_ongkir = $this->input->post('id_ongkir', true);
			$arrayongkir = $this->Produk_model->getOngkirById($id_ongkir);
			$totalbelanja = $_POST["totalbelanja"];

			$data = [
				"id_pelanggan" => $id_pelanggan,
				"id_ongkir" => $id_ongkir,
				"tanggal_pembelian" => date("Y-m-d"),
				"total_pembelian" => $totalbelanja + $arrayongkir['tarif'],
				"nama_kota" => $arrayongkir['nama_kota'],
				"tarif" => $arrayongkir['tarif'],
				"alamat_pengiriman" => $this->input->post('alamat_pengiriman', true)
			];
			//1. menyimpan data ke tabel pembelian
			$this->db->insert('pembelian', $data);
			$id_pembelian_barusan = $this->db->insert_id();

			//mendapatkan id_pembelian barusan terjadi 
			
			if ($cart = $this->cart->contents())
            {
				foreach ($cart as $item)
				{

				$data_detail = array(
					"id_pembelian" => $id_pembelian_barusan,
					"id_produk" => $item['id'],
					"jumlah" => $item['qty'],
					"nama" => $item['name'], 
					"harga" => $item['price'],
					// "tipe" => $item['tipe'],
					"subharga" => $item['price']*$item['qty']
				);
				$stok_produk = $item['stok']-$item['qty'];
				$id_produk = $item['id'];
				$proses = $this->Produk_model->pembelian_produk($data_detail);
				$this->db->set('stok_produk', $stok_produk);
				$this->db->where('id_produk', $id_produk);
				$this->db->update('produk');
				}
				
			}
			//m4ngkosongkan keranjang belanja
			$this->cart->destroy();

			//tampilan dialihkan ke halaman nota, nota dari pembelian barusan
			echo "<script>alert('pembelian sukses')</script>";
			echo "<script>location='nota/$id_pembelian_barusan';</script>";
		}
		
		} else {
			echo "<script>alert('Silahkan login terlebih dahulu');</script>";
			redirect('login');
		}
	}	

	public function nota()
	{
		if ($this->session->userdata('email_pelanggan')) {
		$data['id_pembelian_barusan'] =($this->uri->segment(2))?$this->uri->segment(2):0;
		$data['pelanggan'] = $this->db->get_where('pelanggan', ['email_pelanggan' =>
		$this->session->userdata('email_pelanggan')])->row_array();
		//$data['detail'] = $this->Produk_model->getAllPembelian($id_pembelian_barusan);
		//$data['produk'] = $this->Produk_model->getAllPembelianproduk($id_pembelian_barusan);
		$this->load->view('templates/header', $data);
		$this->load->view('produk/nota', $data);
		$this->load->view('templates/footer');
		} else {
			echo "<script>alert('Silahkan login terlebih dahulu');</script>";
			redirect('login');
		}
	}

	public function riwayat()
	{
		if ($this->session->userdata('email_pelanggan')) {
		$data['pelanggan'] = $this->db->get_where('pelanggan', ['email_pelanggan' =>
		$this->session->userdata('email_pelanggan')])->row_array();
		//$data['detail'] = $this->Produk_model->getAllPembelian($id_pembelian_barusan);
		//$data['produk'] = $this->Produk_model->getAllPembelianproduk($id_pembelian_barusan);
		$this->load->view('templates/header', $data);
		$this->load->view('produk/riwayat', $data);
		$this->load->view('templates/footer');
		} else {
			echo "<script>alert('Silahkan login terlebih dahulu');</script>";
			redirect('login');
		}
	}

	public function lihat_pembayaran()
	{
		$data['id_pembelian'] =($this->uri->segment(3))?$this->uri->segment(3):0;
		$data['pelanggan'] = $this->db->get_where('pelanggan', ['email_pelanggan' =>
		$this->session->userdata('email_pelanggan')])->row_array();
		//$data['detailbayar'] = $this->Produk_model->getPembayaran($id_pembelian);
		//$data['produk'] = $this->Produk_model->getAllPembelianproduk($id_pembelian_barusan);
		$this->load->view('templates/header', $data);
		$this->load->view('produk/lihat_pembayaran', $data);
		$this->load->view('templates/footer');
	}

	public function pembayaran($id_pembelian)
	{
		$data['pelanggan'] = $this->db->get_where('pelanggan', ['email_pelanggan' =>
		$this->session->userdata('email_pelanggan')])->row_array();
		$data['detailpembelian'] = $this->Produk_model->getPembelian($id_pembelian);
		//$data['produk'] = $this->Produk_model->getAllPembelianproduk($id_pembelian_barusan);
		$this->load->view('templates/header', $data);
		$this->load->view('produk/pembayaran', $data);
		$this->load->view('templates/footer');

		if (isset($_POST["kirim"])) 
		{
			$namabukti = $_FILES["bukti"]["name"];
			$lokasibukti = $_FILES["bukti"]["tmp_name"];
			$namafiks = date("YmdHis").$namabukti;
			move_uploaded_file($lokasibukti, "img/$namafiks");
			
			$nama = $_POST["nama"];
			$bank = $_POST["bank"];
			$jumlah = $_POST["jumlah"];
			$tanggal = date("Y-m-d");

			$data = [
				"id_pembelian" => $id_pembelian,
				"nama" => $this->input->post('nama', true),
				"bank" => $this->input->post('bank', true),
				"jumlah" => $this->input->post('jumlah', true),
				"tanggal" => $tanggal,
				"bukti" => $namafiks
			];
			//1. menyimpan data ke tabel pembelian
			$this->db->insert('pembayaran', $data);

			$this->db->set('status_pembelian', 'status');
			$this->db->where('id_pembelian', $id_pembelian);
			$this->db->update('pembelian');
		
			echo "<script>alert('bukti pembayaran sukses terkirim');</script>";
			echo "<script>location='riwayat';</script>";
			exit();
		}
	}

	public function detail($id_produk)
	{
		$data['pelanggan'] = $this->db->get_where('pelanggan', ['email_pelanggan' =>
		$this->session->userdata('email_pelanggan')])->row_array();
		$data['detail'] = $this->Produk_model->getProdukById($id_produk);
		$data['produk'] = $this->Produk_model->getAllProduk();
		$data['popular'] = $this->Produk_model->popularProduk();
		$data['tipe'] = $this->Produk_model->kategoriProduk();

		$this->load->view('templates/header', $data);
		$this->load->view('produk/detail', $data);
		$this->load->view('templates/footer');
	}

	public function pencarian()
	{
		$keyword = $this->input->post('keyword');
		$data['pecah']=$this->Produk_model->get_product_keyword($keyword);
		$data['pelanggan'] = $this->db->get_where('pelanggan', ['email_pelanggan' =>
		$this->session->userdata('email_pelanggan')])->row_array();
		$data['produk'] = $this->Produk_model->getAllProduk();

		$this->load->view('templates/header', $data);
		$this->load->view('produk/pencarian', $data);
		$this->load->view('templates/footer');
	}

}