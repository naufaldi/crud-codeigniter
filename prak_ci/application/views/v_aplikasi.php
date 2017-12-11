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
	<title>Kalkulator Codeigniter</title>
</head>
<body>
	<div class="container">
		<fieldset>
			<legend>
				<form method="post" action="<?php echo base_url('aplikasi/Kalkulator')?>">
					<input type="text" name="angka1" rel="tooltip" data-placement="right" title="Angka 1"><br/><br/>
					<input type="text" name="angka2" rel="tooltip" data-placement="right" title="Angka 2"><br/><br/>
					<select name="operator">
						<option value="+">+</option>
						<option value="-">-</option>
						<option value="*">*</option>
						<option value="/">/</option>
					</select><br/><br/>
					<button type="submit" name="hitung" class="btn btn-primary">Hitung</button>
				</form>

				<?php
					if (isset($angka1) and isset($angka2) and isset($hasil)) {
						echo $angka1.$operator.$angka2."=".$hasil;
					}
				?>
			</legend>
		</fieldset>
	</div>
</body>
<script type="text/javascript" src="<?php echo base_url('assets/js/jquery.js') ?>"></script>
<script type="text/javascript" src="<?php echo base_url('assets/js/bootstrap.js') ?>"></script>
</html>

