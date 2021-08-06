<?php

class Produk_model extends CI_model 
{
	public function getAllProduk() 
	{
		return $this->db->get('produk')->result_array();
	}

	public function limitProduk() 
	{
	$this->db->limit(4); //100 Data yang akan muncul
        $query =  $this->db->get('produk');
        return $query->result_array();
    }

    public function popularProduk() 
	{
	$this->db->limit(4); //100 Data yang akan muncul
        $query =  $this->db->order_by('stok_produk','ASC')->get('produk');
        return $query->result_array();
    }

    public function getProdukById($id_produk)
    {
        return $this->db->from('produk p')->where('p.id_produk',$id_produk)->get()->result_array();

    }

    public function kategoriProduk() 
	{
       	$this->db->select('tipe_produk');
		$this->db->distinct();
		$query = $this->db->get('produk');
        return $query->result_array();
    }

    public function getOngkir() 
    {
        return $this->db->get('ongkir')->result_array();
    }

    public function getOngkirById($id_ongkir)
    {
        return $this->db->from('ongkir o')->where('o.id_ongkir',$id_ongkir)->get()->row_array();

    }

    public function pembelian_produk($data)
    {
        $this->db->insert('pembelian_produk', $data);
    }


    public function getPembelian($id_pembelian) 
    {
        return $this->db->from('pembelian')->where('pembelian.id_pembelian',$id_pembelian)->get()->row_array();
    }

    public function get_product_keyword($keyword){
        $this->db->select('*');
        $this->db->from('produk');
        $this->db->like('nama_produk',$keyword);
        $this->db->or_like('harga_produk',$keyword);
        $this->db->or_like('deskripsi_produk',$keyword);
        return $this->db->get()->result_array();
    }

    public function getProduk($limit, $start) 
    {
        $query = $this->db->get('produk', $limit, $start)->result_array();
        return $query;
    }

}