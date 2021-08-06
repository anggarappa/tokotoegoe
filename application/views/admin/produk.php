<h2>Data Produk</h2>

<table class="table table-bordered">
	<thead>
		<tr>
			<th>No</th>
			<th>Nama</th>
			<th>Harga</th>
			<th>Tipe</th>
			<th>Stok</th>
			<th>Foto</th>
			<th>Aksi</th>
		</tr>
	</thead>
	<tbody>
		<?php $nomor=1; 
		$ambil=$this->db->get('produk')->result_array(); 
		foreach($ambil as $pecah) { ?>
		<tr>
			<td><?php echo $nomor; ?></td>
			<td><?php echo $pecah['nama_produk']; ?></td>
			<td><?php echo $pecah['harga_produk']; ?></td>
			<td><?php echo $pecah['tipe_produk']; ?></td>
			<td><?php echo $pecah['stok_produk']; ?></td>
			<td>
				<img src="<?= base_url(); ?>/foto_produk/<?php echo $pecah['foto_produk']; ?>" width="150">
			</td>
			<td>
				<a href="<?= base_url(); ?>admin/index?halaman=hapusproduk&id=<?php echo $pecah['id_produk']; ?>" class="btn-danger btn">hapus</a>
				<a href="<?= base_url(); ?>admin/index?halaman=ubahproduk&id=<?php echo $pecah['id_produk']; ?>" class="btn btn-warning">ubah</a>
			</td>
		</tr>
		<?php $nomor++; ?>
		<?php } ?>

	</tbody>
</table>

<a href="<?= base_url(); ?>/admin/index?halaman=tambahproduk" class="btn btn-primary">Tambah Data</a>