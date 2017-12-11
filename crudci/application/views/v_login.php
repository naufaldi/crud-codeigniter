<?php 
defined('BASEPATH') OR exit('No direct script access allowed');
 ?>

 <!DOCTYPE html>
 <html>
 <head>
 	<title>Login</title>
 	<meta  name="viewport" content="width=device-width, initial-scale=1.0">
 	<link href="<?php echo site_url('assets/css/bootstrap.css')?>" rel="stylesheet">
 	<link href="<?php echo base_url('assets/css/bootstrap-responsive.css')?>" rel="stylesheet">
 </head>
 <body>
 	<div class="container">
 		<fieldset>
 			<legend>Login</legend>
 			<?php
 				if (isset($gagal)) {
 					echo (" <div class='alert alert-error'><strong>".$gagal."</strong></div>");
 					unset($gagal);
 				}

 			?>
 			<?=form_open('index.php/login/cek_login','class="form-inline"')?>
 			<input type="text" name="userid" class="input-small" placeholder="User ID" rel="tooltip" data-placement="top" title="Masukkan User ID Anda">
 			<input type="password" name="password" class="input-small" placeholder="password" rel="tooltip" placeholder="top" title="Masukkan password anda">
 			<button type="submit" name="login" class="btn btn-primary"><i class="icon icon-white"></i>Login</button>
 			</form>
 		</fieldset>
 		
 	</div>

 <script src="<?php echo base_url('assets/js/jquery.js')?>"></script>
 <script src="<?php echo base_url('assets/js/bootstrap.js')?>"></script>
 <script src="<?php echo base_url('assets/js/tooltip.js')?>"></script>
 </body>
 </html>