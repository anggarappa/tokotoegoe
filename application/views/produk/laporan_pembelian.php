<?php  
$tgl_mulai="-";
$tgl_selesai="-";
$pecah = array();
if (isset($_POST["kirim"])) 
{
	$tgl_mulai = $_POST["tglm"];
	$tgl_selesai = $_POST["tgls"];
	$ambil = $this->db->FROM('pembelian pm')->JOIN('pelanggan pl', 'pm.id_pelanggan=pl.id_pelanggan')->WHERE('tanggal_pembelian >=',$tgl_mulai, 'AND <=', $tgl_selesai);
	$pecah = $ambil->get()->result_array();
	// echo "<pre>";
	// print_r($semuadata);
	// echo "</pre>";
}

?>

<h2>Laporan Pembelian <br><?php echo $tgl_mulai ?> hingga <?php echo $tgl_selesai ?></h2>
<hr>

<form method="post">
	<div class="row">
		<div class="col-md-5">
			<div class="form-group">
				<label>Tanggal Mulai</label>
				<input type="date" class="form-control" name="tglm" value="<?php echo $tgl_mulai ?>">
			</div>
		</div>
		<div class="col-md-5">
			<div class="form-group">
				<label>Tanggal Selesai</label>
				<input type="date" class="form-control" name="tgls" value="<?php echo $tgl_selesai ?>">
			</div>
		</div>
		<div class="col-md-2">
			<label>&nbsp;</label><br>
			<button class="btn btn-primary" name="kirim">Lihat Laporan</button>
		</div>
	</div>
</form>



<table class="table table-bordered">
	<thead>
		<tr>
			<th>No</th>
			<th>Pelanggan</th>
			<th>Tanggal</th>
			<th>Jumlah</th>
			<th>Status</th>
		</tr>
	</thead>
	<tbody>
		<?php $total=0;
		$key = 0; ?>
		<?php foreach ($pecah as $value): ?>
		<?php $total+=$value['total_pembelian'] ?>
		<tr>
			<td><?php echo $key+1; ?></td>
			<td><?php echo $value["nama_pelanggan"] ?></td>
			<td><?php echo $value["tanggal_pembelian"] ?></td>
			<td>Rp. <?php echo number_format($value["total_pembelian"]); ?></td>
			<td><?php echo $value["status_pembelian"] ?></td>
		</tr>
		<?php endforeach ?>
	</tbody>
	<tfoot>
		<tr>
			<th colspan="3">Total</th>
			<th>Rp. <?php echo number_format($total) ?></th>
			<th></th>
		</tr>
	</tfoot>
</table>