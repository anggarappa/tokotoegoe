<h2>Detail Pembelian</h2>
<?php 
$id = $_GET['id'];
$ambil = $this->db->FROM('pembelian')->JOIN('pelanggan', 'pembelian.id_pelanggan=pelanggan.id_pelanggan')->WHERE('pembelian.id_pembelian', $id);
$detail = $ambil->get()->row_array();
?>
<!-- <pre><?php // print_r($detail); ?></pre> -->


<div class="row">
	<div class="col-md-4">
		<h3>Pembelian</h3>
		<p>
			Tanggal : <?php echo $detail['tanggal_pembelian']; ?> <br>
			Total : Rp. <?php echo number_format($detail['total_pembelian']); ?> <br>
			Status : <?php echo $detail['status_pembelian']; ?>
		</p>	
	</div>
	<div class="col-md-4">
		<h3>Pelanggan</h3>
		<strong><?php echo $detail['nama_pelanggan']; ?></strong> <br>
		<p>
			<?php echo $detail['telepon_pelanggan']; ?><br>
			<?php echo $detail['email_pelanggan']; ?>
		</p>
	</div>
	<div class="col-md-4">
		<h3>Pengiriman</h3>
		<strong><?php echo $detail['nama_kota']; ?></strong><br>
		<p>
			Ongkos Kirim : Rp. <?php echo number_format($detail['tarif']); ?><br>
			Alamat : <?php echo $detail['alamat_pengiriman']; ?>
		</p>
	</div>
</div>

<table class="table table-bordered">
	<thead>
		<tr>
			<th>No</th>
			<th>Nama Produk</th>
			<th>Harga</th>
			<th>Jumlah</th>
			<th>Subtotal</th>
		</tr>
	</thead>
	<tbody>
		<?php $nomor=1;
		$ambil = $this->db->FROM('pembelian_produk')->JOIN('produk', 'pembelian_produk.id_produk=produk.id_produk')->WHERE('pembelian_produk.id_pembelian', $id);
		$pecah = $ambil->get()->result_array();
		foreach($pecah as $pecah) { ?>
		<tr>
			<td><?php echo $nomor; ?></td>
			<td><?php echo $pecah['nama_produk']; ?></td>
			<td>Rp. <?php echo number_format($pecah['harga_produk']); ?></td>
			<td><?php echo $pecah['jumlah']; ?></td>
			<td>
				Rp. <?php echo number_format($pecah['harga_produk']*$pecah['jumlah']); ?>
			</td>
		</tr>
		<?php $nomor++; ?>
		<?php } ?>
	</tbody>
</table>