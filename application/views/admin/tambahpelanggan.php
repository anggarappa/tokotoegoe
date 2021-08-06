<h2>Tambah Pelanggan</h2>

<form method="post" enctype="multipart/form-data">
	<div class="form-group">
		<label>Nama</label>
		<input type="text" class="form-control" name="nama">
	</div>
	<div class="form-group">
		<label>Email</label>
		<input type="text" class="form-control" name="email">
	</div>
	<div class="form-group">
		<label>Telepon</label>
		<input type="number" class="form-control" name="telepon">
	</div>
	<button class="btn btn-primary" name="save">Simpan</button>
</form>
<?php 
if (isset($_POST['save']))
{
	 $data = [
        'nama_pelanggan' => htmlspecialchars($this->input->post('nama', true)),
        'email_pelanggan' => $this->input->post('email', true),
        'telepon_pelanggan' => htmlspecialchars($this->input->post('telepon', true)),
        'alamat_pelanggan' => htmlspecialchars($this->input->post('alamat', true))
      ];
        $this->db->insert('pelanggan', $data);

	echo "<div class='alert alert-info'>Data Tersimpan</div>";
	redirect('admin/index?halaman=pelanggan');
}
?>
