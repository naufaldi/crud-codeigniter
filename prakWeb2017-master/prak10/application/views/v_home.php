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
	<title>CI - CODEIGNITER</title>
</head>
<body>
	<div class="container">
		<fieldset>
			<legend>Aplikasi CodeIgniter</legend>
			Selamat datang di aplikasi CodeIgniter<br/><h2>14650013 - IQBAL FAUZI - KELAS D</h2></br>
			<h4><a href="<?=base_url('Aplikasi/kalkulator_view');?>"><i class="glyphicon glyphicon-ok"></i> Aplikasi Kalkulator</a></h4>
			<h4><a href="<?=base_url('aplikasi/mhs_view');?>"><i class="glyphicon glyphicon-download"></i> Input Mahasiswa</a></h4>
		</fieldset>
		<br/><br/><br/>
	</div>
</body>
<script type="text/javascript" src="<?=base_url('assets/js/jquery.js')?>"></script>
<script type="text/javascript" src="<?=base_url('assets/js/bootstrap.js')?>"></script>
</html>