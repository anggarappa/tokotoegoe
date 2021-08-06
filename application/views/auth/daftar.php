<!doctype html>
<html lang="en">
  <head>
  	<title>Register</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

	<link href="https://fonts.googleapis.com/css?family=Lato:300,400,700,900&display=swap" rel="stylesheet">

	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
	
	<link rel="stylesheet" href="<?= base_url();?>assets2/css/style.css">

	</head>
	<body>
	<section class="ftco-section">
		<div class="container">
			<div class="row justify-content-center">
				<div class="col-md-6 text-center mb-5">
					<h2 class="heading-section">Register</h2>
				</div>
			</div>
			<div class="row justify-content-center">
				<div class="col-md-12 col-lg-10">
					<div class="wrap d-md-flex">
						<div class="text-wrap p-4 p-lg-5 text-center d-flex align-items-center order-md-last">
							<div class="text w-100">
								<h2>Welcome to Register</h2>
								<p>Already have an account?</p>
								<a href="<?= base_url('auth/login'); ?>" class="btn btn-white btn-outline-white">Sign In</a>
							</div>
			      </div>
						<div class="login-wrap p-4 p-lg-5">
			      	<div class="d-flex">
			      		<div class="w-100">
			      			<h3 class="mb-4">Sign Up</h3>
			      			<?= $this->session->flashdata('message'); ?>
			      		</div>
			      	</div>
							<form method="post" action="<?= base_url('auth/register') ?>" class="signin-form">
						<div class="form-group mb-3">
			      			<label class="label" for="name">Nama</label>
			      			<input type="text" name="nama" class="form-control" placeholder="Nama" value="<?= set_value('nama'); ?>" required>
                      <?= form_error('nama', '<small class="text-danger pl-3">', '</small>');?> 
			      		</div>
			      		<div class="form-group mb-3">
			      			<label class="label" for="name">Email</label>
			      			<input type="text" name="email" class="form-control" placeholder="Email@gmail.com" value="<?= set_value('email'); ?>" required>
                      <?= form_error('email', '<small class="text-danger pl-3">', '</small>');?> 
			      		</div>
		            <div class="form-group mb-3">
		            	<label class="label" for="password">Password</label>
		              <input type="password" name="password" class="form-control" placeholder="Password" required>
		            </div>
		            <div class="form-group mb-3">
			      			<label class="label" for="alamat">Alamat</label>
			      			<input type="text" name="alamat" class="form-control" placeholder="Alamat" value="<?= set_value('alamat'); ?>" required>
                      <?= form_error('alamat', '<small class="text-danger pl-3">', '</small>');?> 
			      		</div>
			      		<div class="form-group mb-3">
			      			<label class="label" for="name">Telp/HP</label>
			      			<input type="text" name="telepon" class="form-control" placeholder="+62" value="<?= set_value('telepon'); ?>" required>
                      <?= form_error('telepon', '<small class="text-danger pl-3">', '</small>');?> 
			      		</div>
		            <div class="form-group">
		            	<button type="submit" name="daftar" class="form-control btn btn-primary submit px-3">Sign Up</button>
		            </div>
		          </form>
		        </div>
		      </div>
				</div>
			</div>
		</div>
	</section>

	<script src="<?= base_url();?>assets2/js/jquery.min.js"></script>
  <script src="<?= base_url();?>assets2/js/popper.js"></script>
  <script src="<?= base_url();?>assets2/js/bootstrap.min.js"></script>
  <script src="<?= base_url();?>assets2/js/main.js"></script>

	</body>
</html>

