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
	<div class="container-fluid">
	<nav class="navbar navbar-inverse">
  <div class="container-fluid">
    <div class="navbar-header">
      <a class="navbar-brand" href="#">
        <img src="img/logo.png" width="2.5%">
      </a>
    </div>
  </div>
</nav>
	<div class="row">
		<div class="col-md-8">		
			<a href="<?php echo base_url('Biodata/tambah')?>" class="btn btn-primary"><span class="glyphicon glyphicon-plus"></span>Tambah Mahasiswa</a>
<table class="table table-responsive" style="margin-top: 20px;">
	<tr>
		<td>NIM</td>
		<td>Nama</td>
		<td>Tempat Lahir</td>
		<td>Tanggal Lahir</td>
		<td>Jenis Kelamin</td>
		<td>Alamat</td>
	</tr>
	<?php foreach($mhs as $m):?>
		<tr>
			<td><?php echo $m['nim']?></td>
			<td><?php echo $m['nama']?></td>
			<td><?php echo $m['tempat_lahir']?></td>
			<td><?php echo $m['tgl_lahir']?></td>
			<td><?php echo $m['jenis_kelamin']?></td>
			<td><?php echo $m['alamat']?></td>
		</tr>
	<?php endforeach;?>
</table>

			</div>
		<div class="col-md-4">
			<h1><i class="glyphicon glyphicon-th"></i> Menu</h1>
			<div class="list-group">
				<a href="<?php echo base_url('Biodata')?>" class="list-group-item"><span class="glyphicon glyphicon-home"></span> Home</a>
				<a href="<?php echo base_url('Biodata/tambah')?>" class="list-group-item"><span class="glyphicon glyphicon-user"></span> Tambah Mahasiswa</a>
			</div>
		</div>
	</div>
	<footer class="bg-info">
		<div class="container">
			<div class="row">
			<h3 style="text-align: center;"><strong>Copyright @Ozora</strong></h3>
		</div>
		</div>
	</footer>
</div>
</body>
<script type="text/javascript" src="<?php echo base_url('assets/js/jquery.js') ?>"></script>
<script type="text/javascript" src="<?php echo base_url('assets/js/bootstrap.js') ?>"></script>
</html>