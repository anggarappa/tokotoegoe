<h2>Data Pembayaran</h2>

<?php  
// mendapatkan id pembelian dari url
$id_pembelian = $_GET['id'];

// mengambil data pembayaran berdasarkan id_pembelian
$get = $this->db->FROM('pembayaran')->WHERE('id_pembelian', $id_pembelian);
$detail = $get->get()->row_array();


// echo "<pre>";
// print_r($detail);
// echo "</pre>";

?>

<div class="row">
	<div class="col-md-6">
		<table class="table">
			<tr>
				<th>Nama</th>
				<td><?php echo $detail['nama'] ?></td>
			</tr>
			<tr>
				<th>Bank</th>
				<td><?php echo $detail['bank'] ?></td>
			</tr>
			<tr>
				<th>Jumlah</th>
				<td> Rp. <?php echo number_format($detail['jumlah']) ?></td>
			</tr>
			<tr>
				<th>Tanggal</th>
				<td><?php echo $detail['tanggal'] ?></td>
			</tr>
		</table>
	</div>
	<div class="col-md-6">
		<img src="<?=base_url('img/')?><?php echo $detail["bukti"] ?>" alt="" class="img-responsive">
		<!-- <img src="../bukti_pembayaran/<?php //secho $detail['bukti'] ?>" alt="" class="img-responsive"> -->
	</div>
</div>

<form method="post">
	<div class="form-group">
		<label>No Resi Pengiriman</label>
		<input type="text" class="form-control" name="resi">
	</div>
	<div class="form-group">
		<label>Status</label>
		<select class="form-control" name="status">
			<option value="Selesai/Lunas">Selesai/Lunas</option>
			<option value="Dikirim">Dikirim</option>
			<option value="Batal">Batal</option>
		</select>
	</div>
	<button class="btn btn-primary" name="proses">Proses</button>
</form>

<?php 
if (isset($_POST["proses"])) 
{
	$resi = $_POST["resi"];
	$status = $_POST["status"];
	$data = ['resi_pengiriman' => $_POST['resi'], 'status_pembelian' => $_POST['status']];
	$where = array('id_pembelian' => $id_pembelian);
	$this->db->update('pembelian', $data, $where);

	echo "<script>alert('data pembelian terupdate');</script>";
	redirect('admin/index?halaman=pembelian');
}
?>