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
			<legend> Penjumlahan - Codeigniter
				<?php
					if (isset($angka1) and isset($angka2) and isset($hasil)) {
						echo $angka1."+".$angka2."=".$hasil;
					}
				?>
			</legend>
		</fieldset>
	</div>
</body>
<script type="text/javascript" src="<?php echo base_url('assets/js/jquery.js') ?>"></script>
<script type="text/javascript" src="<?php echo base_url('assets/js/bootstrap.js') ?>"></script>
</html>