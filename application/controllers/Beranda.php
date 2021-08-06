<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Beranda extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->library('form_validation');
		$this->load->model('Produk_model');
		$this->load->model('Pelanggan_model');
		$this->load->helper('form');
        $this->load->helper('url_helper');
	}

	public function index()
	{
		$data['pelanggan'] = $this->db->get_where('pelanggan', ['email_pelanggan' =>
		$this->session->userdata('email_pelanggan')])->row_array();
		$data['produk'] = $this->Produk_model->limitProduk();
		$data['popular'] = $this->Produk_model->popularProduk();
		$data['tipe'] = $this->Produk_model->kategoriProduk();
		$this->load->view('templates/header', $data);
		$this->load->view('beranda/index', $data);
		$this->load->view('templates/footer');
	}
}
