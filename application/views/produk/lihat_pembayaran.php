<?php
$get =$this->db->select('*')->from('pembelian')->join('pembayaran', 'pembayaran.id_pembelian = pembelian.id_pembelian')->where('pembelian.id_pembelian', $id_pembelian);
$detailbayar = $this->db->get()->row_array();

// jika belum ada data pembayaran
if (empty($detailbayar)) 
{
	echo "<script>alert('data pembayaran tidak ada')</script>";
	echo "<script>location='produk/riwayat';</script>";
	exit();
}

// jika data pelanggan yang bayar tidak sesuai dengan yang login
// echo "<pre>";
// print_r($_SESSION);
// echo "</pre>";

if ($pelanggan['id_pelanggan'] !==$detailbayar["id_pelanggan"]) 
{
	echo "<script>alert('data pembayaran bukan milik anda')</script>";
	echo "<script>location='produk/riwayat';</script>";
	exit();
}
?>
	<div class="container"><br><br><br><br><br><br><br><br>

		<h3>Lihat Pembayaran</h3><hr />
		<div class="row">
			<div class="col-md-6">
				<table class="table">
					<tr>
						<th>Nama</th>
						<td><?php echo $detailbayar['nama'] ?></td>
					</tr>
					<tr>
						<th>Bank</th>
						<td><?php echo $detailbayar['bank'] ?></td>
					</tr>
					<tr>
						<th>Tanggal</th>
						<td><?php echo $detailbayar['tanggal'] ?></td>
					</tr>
					<tr>
						<th>Jumlah</th>
						<td>Rp. <?php echo number_format($detailbayar['jumlah']); ?></td>
					</tr>

				</table>
			</div>
			<div class="col-md-6">
				<img src="<?=base_url('img/')?><?php echo $detailbayar["bukti"] ?>" alt="" class="img-responsive">
			</div>
		</div>
	</div><br><br><hr /> <br><br>