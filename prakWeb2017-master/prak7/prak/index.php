<!DOCTYPE html>
<html>
<head>
	<title>Belajar Bootstrap</title>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" type="text/css" href="css/bootstrap.css">
	<script type="text/javascript" src="js/jquery.js"></script>
	<script type="text/javascript" src="js/bootstrap.js"></script>
</head>
<body>
	<div class="container-fluid">
		<header class="jumbotron">
			<b><h3 style="text-align: center;"> <span class="glyphicon glyphicon-asterisk"></span> Praktikum Pemrograman Web 2017 <span class="glyphicon glyphicon-asterisk"></span></h3></b>
			<p style="text-align: center;" class="text-info">Teknik Informatika UIN Maulana Malik Ibrahim Malang</p>
		</header>
		<div class="row">
		<div class="col-md-8">
				<?php 
					if (isset($_GET['Laman']) and $_GET['Laman']=='pendaftaran'){
						include "pendaftaran.php";
					}
					elseif(isset($_GET['Laman']) and $_GET['Laman']=='daftarSiswa'){
						include "daftarSiswa.php";
					}elseif(isset($_GET['Laman']) and $_GET['Laman']=='edit'){
						include "edit.php";
					}else{
						include "home.php";
					}
				;?>
			</div>
			<div class="col-md-4">
				<h1><i class="glyphicon glyphicon-th-large"></i> Menu</h1>
				<div class="list-group">
					<a href="?Laman=home" class="list-group-item"><span class="glyphicon glyphicon-home"></span> Home</a>
					<a href="?Laman=daftarSiswa" class="list-group-item"><span class="glyphicon glyphicon-list"></span> Daftar Siswa</a>
					<a href="?Laman=pendaftaran" class="list-group-item"><span class="glyphicon glyphicon-plus"></span> Tambah Siswa</a>
				</div>
			</div>
		</div><div class="col-md-12">
	</div>
	<div>
		<br/>
		<br/>
	</div>
	<footer class="bg-primary">
		<div class="container">
			<div class="row">
				<div class="col-md-5">
					<h5></h5>
					<p><span class="glyphicon glyphicon-info-sign"></span> Iqbal Fauzi<br>
					</p>
					<p>Copyright &copy; by Iqbal Fauzi</p>
				</div>
			</div>
		</div>
	</footer>
</div>
</body>
</html>