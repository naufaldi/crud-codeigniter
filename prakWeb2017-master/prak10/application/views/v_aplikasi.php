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
	<title>CI - Kalkulator</title>
</head>
<body>
	<div class="container">
		<fieldset>
			<legend>Aplikasi Kalkulator</legend>
			<form method="post" action="<?=base_url('aplikasi/kalkulator')?>">
				<input type="text" name="angka1" rel="tooltip" data-placement="right" title="Angka 1"><br /><br/>
				<input type="text" name="angka2" rel="tooltip" data-placement="right" title="Angka 2"><br /><br/>
				<select name="pilih-hitung">
					<option value="+">+</option>
					<option value="-">-</option>
					<option value="*">*</option>
					<option value="/">/</option>
				</select><br/><br/>
				<button type="submit" name="hitung" class="btn btn-primary"><i class="glyphicon glyphicon-plus"></i> Hitung</button>
				<a href="<?=base_url('aplikasi')?>" name="hitung" class="btn btn-primary"><i class="glyphicon glyphicon-home"></i> Home</a>
			</form>
			<?php if(isset($angka1) and isset($angka2))
			{
				echo "<hr>".$angka1." ".$pilih_hitung." ".$angka2." = ".$hasil_hitung;
			}

			?>
		</fieldset>
		<br/><br/><br/>
	</div>
</body>
<script type="text/javascript" src="<?=base_url('assets/js/jquery.js')?>"></script>
<script type="text/javascript" src="<?=base_url('assets/js/bootstrap.js')?>"></script>
</html>