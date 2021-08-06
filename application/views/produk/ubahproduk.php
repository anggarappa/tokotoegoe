<h2>Ubah Produk</h2>
<?php
$id = $_GET['id'];
$ambil = $this->db->FROM('produk')->WHERE('produk.id_produk', $id);
$pecah = $ambil->get()->row_array();

// echo "<prev>";
// print_r($pecah);
// echo "</prev>";
?>

<form method="post" enctype="multipart/form-data">
	<div class="form-group">
		<label>Nama Produk</label>
		<input type="text" name="nama" class="form-control" value="<?php echo $pecah['nama_produk']; ?>">
	</div>
	<div class="form-group">
		<label>Harga</label>
		<input type="number" name="harga" class="form-control" value="<?php echo $pecah['harga_produk']; ?>">
	</div>
	<div class="form-group">
		<label>Tipe</label>
		<input type="text" name="tipe" class="form-control" value="<?php echo $pecah['tipe_produk']; ?>">
	</div>
	<div class="form-group">
		<label>Stok</label>
		<input type="number" name="stok" class="form-control" min="1" value="<?php echo $pecah['stok_produk']; ?>">
	</div>
	<div class="form-group">
		<img src="../foto_produk/<?php echo $pecah['foto_produk'] ?>" width="200">
	</div>
	<div class="form-group">
		<label>Ganti Foto</label>
		<input type="file" name="foto" class="form-control">
	</div>
	<div class="form-group">
		<label>Deskripsi</label>
		<textarea name="deskripsi" class="form-control" rows="10"><?php echo $pecah['deskripsi_produk']; ?></textarea> 
	</div>
	<button class="btn btn-primary" name="ubah">Ubah</button>
</form>

<?php 
if (isset($_POST['ubah']))
{
	$namafoto=$_FILES['foto']['name'];
	$lokasifoto=$_FILES['foto']['tmp_name'];
	//jika foto dirubah
	if (!empty($lokasifoto))
	{
		move_uploaded_file($lokasifoto, "base_url()/foto_produk/$namafoto");
		$data = [
							'nama_produk' => $_POST['nama'],
							'harga_produk' => $_POST['harga'],
							'tipe_produk' => $_POST['tipe'],
							'stok_produk' => $_POST['stok'],
							'foto_produk' => $namafoto,
							'deskripsi_produk' => $_POST['deskripsi']
						];
						$where = array('id_produk' => $id);
						$this->db->update('produk', $data, $where);
	}
	else
	{
		$data = [
							'nama_produk' => $_POST['nama'],
							'harga_produk' => $_POST['harga'],
							'tipe_produk' => $_POST['tipe'],
							'stok_produk' => $_POST['stok'],
							//'foto_produk' => $namafoto,
							'deskripsi_produk' => $_POST['deskripsi']
						];

						$where = array('id_produk' => $id);
						$this->db->update('produk', $data, $where);
					$where = array('id_produk' => $id);
					$this->db->update('produk', $data, $where);
	}
	// echo "<script>alert('data produk telah diubah');</script>";
	redirect('admin/index?halaman=produk');
}
?>