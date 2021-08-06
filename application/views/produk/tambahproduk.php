<h2>Tambah Produk</h2>

<form method="post" enctype="multipart/form-data">
	<div class="form-group">
		<label>Nama</label>
		<input type="text" class="form-control" name="nama">
	</div>
	<div class="form-group">
		<label>Harga</label>
		<input type="number" class="form-control" name="harga">
	</div>
	<div class="form-group">
		<label>Tipe</label>
		<input type="text" class="form-control" name="tipe">
	</div>
	<div class="form-group">
		<label>Deskripsi</label>
		<textarea class="form-control" name="deskripsi" rows="10"></textarea>
	</div>
	<div class="form-group">
		<label>Foto Produk</label>
		<input type="file" class="form-control" name="foto">
	</div>
	<button class="btn btn-primary" name="save">Simpan</button>
</form>
<?php 
if (isset($_POST['save']))
{
	$nama = $_FILES['foto']['name'];
	$lokasi = $_FILES['foto']['tmp_name'];
	move_uploaded_file($lokasi, "foto_produk/".$nama);
	$data = [
							'nama_produk' => $_POST['nama'],
							'harga_produk' => $_POST['harga'],
							'tipe_produk' => $_POST['tipe'],
							'foto_produk' => $nama,
							'deskripsi_produk' => $_POST['deskripsi']
						];
					
						$this->db->insert('produk', $data);
	echo "<div class='alert alert-info'>Data Tersimpan</div>";
	redirect('admin/index?halaman=produk');
}
?>
