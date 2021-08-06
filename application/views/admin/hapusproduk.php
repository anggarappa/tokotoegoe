<?php 
$id = $_GET['id'];
$ambil = $this->db->FROM('produk')->WHERE('produk.id_produk', $id);
$pecah = $ambil->get()->row_array();
$fotoproduk = $pecah['foto_produk'];
if (file_exists("../foto_produk/$fotoproduk"))
{
	unlink("../foto_produk/$fotoproduk");
}

$where = array('id_produk' => $id);
$this->db->DELETE('produk', $where);


echo "<script>alert('produk terhapus');</script>";
redirect('admin/index?halaman=produk');
?>