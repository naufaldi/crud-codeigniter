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
			<form class="form-vertical" method="post" action="<?php echo base_url('Biodata/addMhs')?>">
					<div class="form-group">
						<label>NIS</label>
							<input type="text" name="nim" class="form-control" placeholder="NIS">
					</div>
					<div class="form-group">
						<label>Nama</label>
							<input type="text" name="nama" placeholder="Nama" class="form-control">
					</div>
					<div class="form-group">
						<label>Tempat Lahir</label>
							<input type="text" name="tempatLahir" placeholder="Nama" class="form-control">
					</div>
					<div class="form-group">
						<label>Tanggal Lahir</label>
							<input type="text" name="tanggalLahir" placeholder="Nama" class="form-control">
					</div>
					<div class="form-group">
						<label>Jenis Kelamin</label>
						<select class="form-control" name="jenis_kelamin">
							<option value="L">Laki-Laki</option>
							<option value="P">Perempuan</option>
						
						</select>
					</div>
								<div class="form-group">
						<label>Alamat</label>
							<textarea class="form-control" placeholder="alamat lengkap" name="alamat"></textarea>
					</div>
					<div class="form-group">
						<input type="submit" name="tbtambah" value="TAMBAH" class="btn btn-primary">
						<button class="btn btn-danger"><i class="glyphicon glyphicon-remove"></i> Batal</button>
						
					</div>
				</form>

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