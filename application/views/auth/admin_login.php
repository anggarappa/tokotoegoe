<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
	<meta charset="utf-8" />
	<meta name="viewport" content="width=device-width, initial-scale=1.0" />
	<title>Admin</title>
	<link rel="stylesheet" href="<?= base_url();?>/assets/css/bootstrap.css" />
</head>
<body>
	<div class="container">
		<div class="row text-center">
			<div class="col-md-12">
				<br /><br />
				<h2>Admin : Login</h2>

				<h5>( Login yourself to get access )</h5>
				<br />
			</div>
		</div>
	</div>
	<div class="row ">
		<div class="col-md-4 col-md-offset-4 col-sm-6 col-sm-offset-3 col-xs-10 col-xs-offset-1">
			<div class="panel panel-default">
				<div class="panel-heading">
					<strong> Enter Details To Login </strong>
				</div>
				<div class="panel-body">
					<form role="form" method="post">
						<br />
						<div class="form-group input-group">
							<span class="input-group-addon"><i class="fa fa-tag" ></i></span>
							<input type="text" class="form-control" name="user" />
						</div>
						<div class="form-group input-group">
							<span class="input-group-addon"><i class="fa fa-lock" ></i></span>
							<input type="password" class="form-control" name="pass">
						</div>
						<div class="form-group">
							<label class="checkbox-inline">
								<input type="checkbox" /> Remember me
							</label>
							<span class="pull-right">
								<a href="#" >Forget password</a>
							</span>
						</div>

						<button class="btn btn-primary" name="login">Login</button>
						<hr />
						Not registered ? <a href="registeration.html">click here</a>
					</form>
				</div>
			</div>
		</div>
	</div>
	<script src="<?= base_url();?>/assets/js/jquery-1.10.2.js"></script>
	<script src="<?= base_url();?>/assets/js/bootstrap.min.js"></script>
	<script src="<?= base_url();?>/assets/js/jquery.metisMenu.js"></script>
	<script src="<?= base_url();?>/assets/js/custom.js"></script>
</body>
</html>