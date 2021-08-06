<?php 
$id = $_GET['id'];

$where = array('id_pelanggan' => $id);
$this->db->DELETE('pelanggan', $where);

echo "<script>alert('data pelanggan terhapus');</script>";
redirect('admin/index?halaman=pelanggan');
?>