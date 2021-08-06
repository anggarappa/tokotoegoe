
<div class="container"><br><br><br><br><br><br><br>
		<h3>Profile <?php echo $pelanggan['nama_pelanggan'] ?></h3><br>

			
			<div class="col-md-8">
              <div class="card mb-3">
                <div class="card-body">
                  <div class="row">
                    <div class="col-sm-3">
                      <h5 class="mb-0">Nama Lengkap</h5>
                    </div>
                    <div class="col-sm-9 text-secondary">
                      <h5><?php echo $pelanggan['nama_pelanggan']; ?></h5>
                    </div>
                  </div>
                  <hr>
                  <div class="row">
                    <div class="col-sm-3">
                      <h5 class="mb-0">Email</h5>
                    </div>
                    <div class="col-sm-9 text-secondary">
                      <h5><?php echo $pelanggan['email_pelanggan']; ?></h5>
                    </div>
                  </div>
                  <hr>
                  <!-- <div class="row">
                    <div class="col-sm-3">
                      <h5 class="mb-0">Password</h5>
                    </div>
                    <div class="col-sm-9 text-secondary">
                      <h5><?php // echo $pecah["pass_pelanggan"] ?></h5>
                    </div>
                  </div>
                  <hr> -->
                  <div class="row">
                    <div class="col-sm-3">
                      <h5 class="mb-0">Telepon</h5>
                    </div>
                    <div class="col-sm-9 text-secondary">
                      <h5><?php echo $pelanggan['telepon_pelanggan']; ?></h5>
                    </div>
                  </div>
                  <hr>
                  <div class="row">
                    <div class="col-sm-3">
                      <h5 class="mb-0">Alamat</h5>
                    </div>
                    <div class="col-sm-9 text-secondary">
                      <h5><?php echo $pelanggan['alamat_pelanggan']; ?></h5>
                    </div>
                  </div>
                  <hr>
                  <div class="row">
                    <div class="col-sm-12">
                      <a class="btn btn-info " href="<?= base_url('edit-profil/')?><?php echo $pelanggan['id_pelanggan']; ?>">Edit</a>
                    </div>
                  </div>
                </div>
              </div>
			
	</div>
</div>