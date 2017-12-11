<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width-device-width, initial-scale=1.0">
	<link rel="stylesheet" href="<?=site_url('assets/css/bootstrap.css')?>">
	<link rel="stylesheet" href="<?=site_url('assets/css/bootstrap-responsive.css')?>"> 
	<title>Belajar CI</title>
</head>
<body>
<div class="container">
	<fieldset>
		<legend>Penjumlahan CodeIgniter <?php echo $oke; ?></legend>

		<?php if(isset($angka1) and isset($angka2) and isset($hasil))
		{
			echo $angka1." + ".$angka2." = ".$hasil;
		}

		?>
	</fieldset>
</div>
</body>
<script type="text/javascript" src="<?=base_url('assets/js/jquery.js')?>"></script>
<script type="text/javascript" src="<?=base_url('assets/js/bootstrap.js')?>"></script>
</html>