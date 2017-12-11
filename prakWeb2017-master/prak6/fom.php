<!DOCTYPE html>
<html>
<head>
	<title>Form pendaftaran</title>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" type="text/css" href="css/bootstrap.css">
	<script type="text/javascript" src="js/jquery.js"></script>
	<script type="text/javascript" src="js/bootstrap.js"></script>
</head>
<body>
	<div class="container-fluid">
		<header class="jumbotron">
			<h4><span class="glyphicon glyphicon-plus-sign"></span> Form Pendaftaran</h4>
			<p>Teknik Informatika UIN Maulana Malik Ibrahim Malang</p>
		</header>
		<div class="row">
			<div class="col-md-8">
				<form class="form-horizontal" method="post" action="<?php echo base_url() ?>admin/updateUser">
					<div class="box-body">
						<div class="form-group">
							<label for="nama" class="col-sm-2 control-label">Nama Lengkap</label>
							<div class="input-group col-sm-8">
								<input type="text" class="form-control" id="nama" placeholder="Nama Lengkap">
								<span class="input-group-addon">
									<i class="glyphicon glyphicon-user"></i>
								</span>
							</div>
						</div>
						<div class="form-group">
							<label for="tempatLahir" class="col-sm-2 control-label">Tempat Lahir</label>
							<div class="input-group col-sm-8">
								<input type="text" class="form-control" id="tempatLahir" placeholder="Tempat Lahir">
								<span class="input-group-addon">
									<i class="glyphicon glyphicon-home"></i>
								</span>
							</div>
						</div>
						<div class="form-group">
							<label for="tglLahir" class="col-sm-2 control-label">Tgl Lahir</label>
							<div class="input-group col-sm-8">
								<input type="date" class="form-control" id="tglLahir" placeholder="Tanggal Lahir">
								<span class="input-group-addon">
									<i class="glyphicon glyphicon-calendar"></i>
								</span>
							</div>
						</div>
						<div class="form-group">
							<label for="noTelp" class="col-sm-2 control-label">No Telp</label>
							<div class="input-group col-sm-8">
								<input type="text" class="form-control" id="noTelp" placeholder="Nomor Telephone">
								<span class="input-group-addon">
									<i class="glyphicon glyphicon-tags"></i>
								</span>
							</div>
						</div>
						<div class="form-group">
							<label for="alamat" class="col-sm-2 control-label">Alamat</label>
							<div class="input-group col-sm-8">
								<textarea class="form-control" rows="5" id="alamat"></textarea>
								<span class="input-group-addon">
									<i class="glyphicon glyphicon-book"></i>
								</span>
							</div>
						</div>
						<div class="form-group">
							<label for="noTelp" class="col-sm-2 control-label">Jumlah saudara</label>
							<div class="col-sm-8">
								<select class="form-control" name="jumlah_saudara">
									<option value="1">1</option>
									<option value="2">2</option>
									<option value="3">3</option>
								</select>
							</div>
						</div>
					</div>
					<div class="box-footer" style="padding-left: 120px">
						<button class="btn btn-danger"><i class="glyphicon glyphicon-remove"></i> Batal</button>
						<button class="btn btn-info"><i class="glyphicon glyphicon-plus-sign"></i> Simpan</button>
						<button type="reset" class="btn btn-primary"><i class="glyphicon glyphicon-refresh"></i> Reset</button>
					</div>
				</form>
			</div>
			<div class="col-md-4">
				<h1><i class="glyphicon glyphicon-th"></i> Menu</h1>
				<div class="list-group">
					<a href="index.html" class="list-group-item"><span class="glyphicon glyphicon-home"></span> Home</a>
					<a href="fom.html" class="list-group-item"><span class="glyphicon glyphicon-plus"></span> Forms</a>
					<a href="about.html" class="list-group-item"><span class="glyphicon glyphicon-user"></span> About</a>
				</div>
			</div>
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