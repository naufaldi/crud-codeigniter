<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width-device-width, initial-scale=1.0">
	<link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/css/bootstrap.css')?>">
	<link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/css/bootstrao-responsive.css')?>">
	<title>Login Mahasiswa</title>
</head>
<body>
	<div class="container">
		<fieldset>
			<legend>Login</legend>
			<?php
				if (isset($gagal)){
					echo "<div class='alert alert-error'><strong>".$gagal."</strong></div>";
				}
				unset($gagal);
			?>

			<?php echo form_open('login/cek_login', 'class="form-inline"')?>
			<input type="text" name="userid" class="input-small" placeholder="User ID" rel="tooltip" title="Masukkan User ID Anda">
			<input type="password" name="password" class="input-small" placeholder="Password" rel="tooltip" title="Masukkan Password Anda">
			<button type="submit" name="login" class="btn btn-primary"><i class="icon-lock icon-white"></i>Login</button>
		</form>
		</fieldset>
	</div>
</body>
<script type="text/javascript" src="<?php echo base_url('assets/js/jquery.js') ?>"></script>
<script type="text/javascript" src="<?php echo base_url('assets/js/bootstrap.js') ?>"></script>
</html>