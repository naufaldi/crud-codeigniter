<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
<!DOCTYPE html>
<html>
<head>
	<title>Login CI</title>
	<meta charset="utf-8" name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="stylesheet" type="text/css" href="<?=site_url('assets/css/bootstrap.css')?>">
	<link rel="stylesheet" type="text/css" href="<?=base_url('assets/css/bootstrap-responsive.css')?>">
</head>
<body>
	<div class="container">
		<fieldset>
			<legend>Login CI - (14650013) IQBAL FAUZI</legend>
			<?php
			if(isset($gagal))
			{
				echo ("<div class='alert alert-error'>
					<strong>".$gagal."</strong>
				</div>
				");
				unset($gagal);
			}
			?>
			<?=form_open('login/ceklogin','class="form-inline"')?>
			<input type="text" name="userid" class="input-small" placeholder="User ID" rel="tooltip" data-placement="top" title="Masukkan User Id">
			<input type="password" name="password" class="input-small" placeholder="Password" rel="tooltip" data-placement="top" title="Masukkan Password">
			<button type="submit" name="login" class="btn btn-primary"><i class="icon-lock icon-white"></i>Login</button>
		</form>
	</fieldset>
</div>
<script type="text/javascript" src="<?=site_url('assets/js/jquery.js')?>"></script>
<script type="text/javascript" src="<?=base_url('assets/js/bootstrap.js')?>"></script>
<script type="text/javascript" src="<?=base_url('assets/js/bootstrap-tooltip.js')?>"></script>
</body>
</html>