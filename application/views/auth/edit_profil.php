	<div class="container"><br><br><br><br><br><br><br>
		<div class="row">
			<div class="col-md-8 col-md-offset-2">
				<div class="panel panel-default">
					<div class="panel-heading">
						<h3 class="panel-title">Edit Profil <?php echo $id_pelanggan = $pelanggan["nama_pelanggan"]; ?></h3>
					</div>
					<div class="panel-body">
						<form method="post" class="form-horizontal">
							<div class="form-group">
								<label class="control-label col-md-3">Nama</label>
								<div class="col-md-7">
									<input type="text" class="form-control" name="nama" value="<?php echo $pelanggan['nama_pelanggan']; ?>">
								</div>
							</div>
							<!-- <fieldset enable>
								<div class="form-group">
								<label class="control-label col-md-3">Email</label>
								<div class="col-md-7">
									<label for="disabledTextInput"></label>
									<input type="text" id="disabledTextInput" class="form-control" value="<?php //echo $pecah['email_pelanggan']; ?>">
								</div>
							</div>
							</fieldset> -->
							
							<div class="form-group">
								<label class="control-label col-md-3">Alamat</label>
								<div class="col-md-7">
									<textarea class="form-control" rows="4" name="alamat">
										<?php echo $pelanggan['alamat_pelanggan']; ?>
									</textarea>
								</div>
							</div>
							<div class="form-group">
								<label class="control-label col-md-3">Telp/HP</label>
								<div class="col-md-7">
									<input type="text" class="form-control" name="telepon" value="<?php echo $pelanggan['telepon_pelanggan']; ?>">
								</div>
							</div>
							<div class="form-group">
								<div class="col-md-7 col-md-offset-3">
									<button class="btn btn-primary" name="edit">Ubah</button>
								</div>
							</div>
						</form>
					</div>
				</div>
			</div>
		</div>
	</div>