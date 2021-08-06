<?php
if (!isset($pelanggan['id_pelanggan']) OR empty($pelanggan['id_pelanggan'])) 
{
	echo "<script>alert('silahkan login');</script>";
	echo "<script>location='login.php';</script>";
	exit();	
}
// mendapatkan id pelanggan yang beli
$id_pelanggan_beli = $detailpembelian["id_pelanggan"];
// mendapatkan id pelanggan yang login
$id_pelanggan_login = $pelanggan["id_pelanggan"];

if ($id_pelanggan_login !== $id_pelanggan_beli) 
{
	// echo "<script>alert('silahkan login');</script>";
	redirect('produk');
}

?>
	<div class="container"><br><br><br><br><br><br>
		<h2>Konfirmasi Pembayaran</h2><hr />
		<P>Kirim bukti pembayaran disini</P>
		<div class="alert alert-info">Total tagihan Anda <strong>Rp. <?php echo number_format($detailpembelian["total_pembelian"]) ?></strong></div>

		<form method="post" enctype="multipart/form-data">
			<div class="form-group">
				<label>Nama Penyetor</label>
				<input type="text" class="form-control" name="nama">
			</div>
			<div class="form-group">
				<label>Bank</label>
				<input type="text" class="form-control" name="bank">
			</div>
			<div class="form-group">
				<label>Jumlah</label>
				<input type="number" class="form-control" name="jumlah" min="1">
			</div>
			<div class="form-group">
				<label>Foto Bukti Pembayaran</label>
				<input type="file" class="form-control" name="bukti">
				<p class="text-danger">foto bukti maksimal 2MB</p>
			</div>
			<button class="btn btn-primary" name="kirim">Kirim</button>
		</form>
	</div><br><br><hr /><br>