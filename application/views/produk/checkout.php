<div class="container"><br><br><br><br><br><br><br><br><br>
		<h1>Keranjang Belanja</h1><hr /><br>
		<?php
    	if ($cart = $this->cart->contents())
        {
 		?>
		<table class="table table-bordered">
			<thead>
				<tr>
					<th>No</th>
					<th>Produk</th>
					<th>Harga</th>
					<th>Jumlah</th>
					<th>Subharga</th>
				</tr>
			</thead>
			<tbody>
				<?php
				// Create form and send all values in "shopping/update_cart" function.
				$grand_total = 0;
				$totalbelanja = 0;
				$total = 0;
				$i = 1;
 
				foreach ($cart as $item):
				$totalbelanja =  $totalbelanja + $item['subtotal'];
				?>

				<tr>
					<td><?php echo $i++; ?></td>
					<td><?php echo $item['name']; ?></td>
					<td>Rp. <?php echo number_format($item['price']); ?></td>
					<td><?php echo $item['qty']; ?></td>
					<td>Rp. <?php echo number_format($item['subtotal']); ?></td>
				</tr>
				<?php endforeach ?>
			</tbody>
			<tfoot>
				<tr>
					<th colspan="4">Total Belanja</th>
					<th>Rp. <?php echo number_format($totalbelanja) ?></th>
				</tr>
			</tfoot>
		</table>

		<form method="post" action="<?= base_url('checkout');?>">

			<div class="row">
				<div class="col-md-4">
					<div class="form-group">
						<input type="hidden" name="id_pelanggan" value="<?php echo $pelanggan['id_pelanggan'] ?>" class="form-control">
						<input type="text" readonly name="nama_pelanggan" value="<?php echo $pelanggan['nama_pelanggan'] ?>" class="form-control">
					</div>
				</div>
				<div class="col-md-4">
					<div class="form-group">
				<input type="text" readonly value="<?php echo $pelanggan['telepon_pelanggan'] ?>" class="form-control">
				<input type="hidden" value="<?= $totalbelanja ?>" name="totalbelanja" class="form-control">
			</div>
				</div>
				<div class="col-md-4">
					<select class="form-control" name="id_ongkir" id="id_ongkir">
						<option value="">Pilih Ongkos Kirim</option>
						<?php 
						foreach ($ongkir as $perongkir) {
						?>
						<option value="<?= $perongkir['id_ongkir'] ?>">
							<?php echo $perongkir['nama_kota'] ?> -
							Rp. <?php echo number_format($perongkir['tarif']) ?>
						</option>
						<?php } ?>
					</select>
				</div>
			</div>
			<div class="form-group">
				<label>Alamat Lengkap Pengiriman</label>
				<textarea class="form-control" name="alamat_pengiriman" placeholder="masukan alamat lengkap"></textarea>
			</div>
			<button class="btn btn-primary" name="checkout">Checkout</button>
		</form>

	</div>
	<?php 
	} else {
		echo "<script>alert('Keranjang kosong');</script>";
		redirect('produk');
	} ?>
</div>
<br><br><hr /><br><br>
</div>