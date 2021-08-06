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
					<th>Aksi</th>
				</tr>
			</thead>
			<tbody>
				<?php
				// Create form and send all values in "shopping/update_cart" function.
				$grand_total = 0;
				$total = 0;
				$i = 1;
 
				foreach ($cart as $item):
				$grand_total = $grand_total + $item['subtotal'];
				$total = $total+$grand_total;
				?>

				<tr>
					<td><?php echo $i++; ?></td>
					<td><?php echo $item['name']; ?></td>
					<td>Rp. <?php echo number_format($item['price']); ?></td>
					<td><?php echo $item['qty']; ?></td>
					<td>Rp. <?php echo number_format($item['subtotal']); ?></td>
					<td>
						<a href="<?=base_url()?>hapus-keranjang/<?= $item['rowid']; ?>" class="btn btn-danger btn-xs">Hapus</a>
					</td>
				</tr>
				<?php endforeach ?>
			</tbody>
		</table>

		<a href="<?= base_url('produk')?>" class="btn btn-default">Lanjutkan Belanja</a>
		<a href="<?= base_url('checkout') ?>" class="btn btn-primary">Checkout</a><br><br><hr /><br><br>
	</div>
	<?php 
	} else {
		echo "<script>alert('Keranjang kosong');</script>";
		//redirect('produk');
	} ?>
</div>
</div><br><br><hr /><br>