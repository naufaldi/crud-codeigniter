<!DOCTYPE html>
<html>

<head>
	<meta charset="UTF-8">
	<meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
	<title>Sign In</title>
	<link rel="icon" href="<?=base_url('assets/images/favicon.ico')?>" type="image/x-icon">

	<link href="https://fonts.googleapis.com/css?family=Roboto:400,700&subset=latin,cyrillic-ext" rel="stylesheet" type="text/css">
	<link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet" type="text/css">

	<link href="<?=base_url('assets/plugins/bootstrap/css/bootstrap.css')?>" rel="stylesheet">
	<link href="<?php echo base_url('assets/plugins/bootstrap-select/css/bootstrap-select.css');?>" rel="stylesheet">
	<link href="<?=base_url('assets/plugins/node-waves/waves.css')?>" rel="stylesheet" />
	<link href="<?=base_url('assets/plugins/animate-css/animate.css')?>" rel="stylesheet" />
	<link href="<?=base_url('assets/css/style.css')?>" rel="stylesheet">
	<?php echo $script_captcha;?>
</head>

<body class="login-page">
	<div class="login-box">
		<div class="logo">
			<a href="javascript:void(0);">SI<b> Pesantren</b></a>
			<?php echo $this->session->flashdata('pesan');?></div>
		</div>
		<div class="card">
			<div class="body">
				<form id="sign_in" method="POST" action="<?php echo base_url('functLogin/prosesLogin') ?>">
					<div class="input-group">
						<span class="input-group-addon">
							<i class="material-icons">person</i>
						</span>
						<div class="form-line">
							<input type="text" class="form-control" name="username" placeholder="Username" required autofocus>
						</div>
					</div>
					<div class="input-group">
						<span class="input-group-addon">
							<i class="material-icons">lock</i>
						</span>
						<div class="form-line">
							<input type="password" class="form-control" name="password" placeholder="Password" required>
						</div>
					</div>
					<div class="input-group">
						<div class="col-sm-12">
							<select class="form-control show-tick" name="level" id="level">
								<option>-- Login Sebagai --</option>
								<option value="1">Admin</option>
								<option value="2">Ustadz</option>
								<option value="3">Santri</option>
							</select>
						</div>
					</div>
					<div class="col-sm-12" align="center">
						<?php echo $captcha;?>
					</div>
					<div class="row">
						<div class="col-xs-12">
							<button class="btn btn-block bg-pink waves-effect" type="submit">SIGN IN</button>
						</div>
					</div>
				</form>
			</div>
		</div>
	</div>

	<script src="<?=base_url('assets/plugins/jquery/jquery.min.js')?>"></script>
	<script type="text/javascript" src="<?php echo base_url()?>assets/js/jquery-2.1.4.min.js"></script>
	<script src="<?=base_url('assets/plugins/bootstrap/js/bootstrap.js')?>"></script>
	<script src="<?=base_url('assets/plugins/node-waves/waves.js')?>"></script>
	<script src="<?=base_url('assets/plugins/jquery-validation/jquery.validate.js')?>"></script>
	<script src="<?=base_url('assets/plugins/bootstrap-select/js/bootstrap-select.js')?>"></script>

	<script src="<?=base_url('assets/js/admin.js')?>"></script>
	<script src="<?=base_url('assets/js/pages/examples/sign-in.js')?>"></script>
</body>

</html>