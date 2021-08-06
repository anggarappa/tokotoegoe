<div class="container"><br><br><br><br><br><br><br><br><br>
				<!-- copas dari detail.php -->
				<h2>Detail Pembelian</h2><br><hr />

				<div class="row">
				<?php 
				$ambil = $this->db->select('*')->from('pembelian')->join('pelanggan', 'pelanggan.id_pelanggan = pembelian.id_pelanggan')->where('pembelian.id_pembelian', $id_pembelian_barusan);
				$detail = $ambil->get()->row_array();
				?>
				<?php  
				// medapatkan id pelanggan yang beli
				$idpelangganbeli = $detail['id_pelanggan'];

				// mendapatkan id pelanggan yang login
				$idpelangganlogin = $pelanggan['id_pelanggan'];

				if ($idpelangganbeli!==$idpelangganlogin) 
				{
					// echo "<script>alert('silahkan login')</script>";
					redirect('riwayat');
					exit();
				}
				?>
					<div class="col-md-4">
						<h3>Pembelian</h3>
						<strong>No. Pembelian: <?php echo $detail['id_pembelian']; ?></strong> <br>
						Tanggal : <?php echo $detail['tanggal_pembelian']; ?> <br>
						Total : <?php echo $detail['total_pembelian']; ?> 
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
						<strong><?php echo $detail['nama_kota'] ?></strong> <br>
						Ongkos Kirim: Rp. <?php echo number_format($detail['tarif']) ; ?><br>
						Alamat: <?php echo $detail['alamat_pengiriman'] ?> 
					</div>
				</div>

				<table class="table table-bordered">
					<thead>
						<tr>
							<th>No</th>
							<th>Nama</th>
							<th>Harga</th>
							<th>Tipe</th>
							<th>Jumlah</th>
							<th>Subtotal</th>
						</tr>
					</thead>
					<tbody>
						<?php $nomor=1; ?>
						<?php $ambil = $this->db->select('*')->from('pembelian_produk')->where('pembelian_produk.id_pembelian',$id_pembelian_barusan); ?>
						<?php $pecah = $ambil->get()->result_array(); ?>
						<?php foreach ($pecah as $pecah) { ?>
							<tr>
								<td><?php echo $nomor; ?></td>
								<td><?php echo $pecah['nama']; ?></td>
								<td>Rp. <?php echo number_format($pecah['harga']); ?></td>
								<td><?php echo $pecah['tipe']; ?></td>
								<td><?php echo $pecah['jumlah']; ?></td>
								
								<td>Rp. <?php echo number_format($pecah['subharga']); ?></td>
							</tr>
							<?php $nomor++; ?>
						<?php } ?>
					</tbody>
				</table>

				<div class="row">
					<div class="col-md-7">
						<div class="alert alert-info">
							<p>
							Silahkan melakukan pembayaran Rp. <?php echo number_format($detail['total_pembelian']); ?> ke <br>
							<strong>BANK MANDIRI xxxxxxxxxxxx A.N. XXXXXX XXXXXXX</strong>
						</p>
						</div>
					</div>
				</div>

			</div><br><br><hr /><br>
