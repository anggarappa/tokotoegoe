	<div class="container"><br><br><br><br><br>
		<h3>Riwayat Belanja <?php echo $pelanggan['nama_pelanggan'] ?></h3><br><hr />

		<table class="table table-bordered">
			<thead>
				<tr>
					<th>No</th>
					<th>Tanggal</th>
					<th>Status</th>
					<th>Total</th>
					<th>Opsi</th>
				</tr>
			</thead>
			<tbody>
				<?php 
				$nomor = 1;
				// mendapatkan id pelanggan yang login dari session
				$id_pelanggan = $pelanggan['id_pelanggan'];
				$ambil = $this->db->select('*')->from('pembelian')->where('pembelian.id_pelanggan',$id_pelanggan);
						$pecah = $ambil->get()->result_array(); 
						foreach ($pecah as $pecah) { 
				?>
				<tr>
					<td><?php echo $nomor; ?></td>
					<td><?php echo $pecah["tanggal_pembelian"] ?></td>
					<td>
						<?php echo $pecah["status_pembelian"] ?> <br><br> 
						<?php if (!empty($pecah['resi_pengiriman'])): ?>
							Resi : <br> <?php echo $pecah['resi_pengiriman']; ?>

						<?php endif ?>
					</td>
					<td>Rp. <?php echo number_format($pecah["total_pembelian"]) ?></td>
					<td>
						<a href="<?= base_url('nota/'); ?><?php echo $pecah["id_pembelian"] ?>" class="btn btn-info">Nota</a>

						<?php if ($pecah['status_pembelian']=="pending"): ?>
						<a href="<?= base_url('produk/pembayaran/');?><?php echo $pecah["id_pembelian"]; ?>" class="btn btn-success">Pembayaran</a>
						<?php else: ?>
							<a href="<?= base_url('produk/lihat_pembayaran/'); ?><?php echo $pecah['id_pembelian']; ?>" class="btn btn-warning">
								Lihat Pembayaran
							</a>
						<?php endif ?>


					</td>
				</tr>
				<?php $nomor++; ?>
				<?php } ?>
			</tbody>
		</table>
	</div>
</section>

</body>
</html>