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
	<title>CI - Mahasiswa</title>
</head>
<body>
	<div class="container">
		<fieldset>
			<legend>MAHASISWA</legend>
			<form class="form-horizontal" method="post" action="<?=base_url('aplikasi/mhs')?>">
			<!-- 	<input type="text" name="nim" rel="tooltip" data-placement="right" title="NIM"><br /><br/>
				<input type="text" name="nama" rel="tooltip" data-placement="right" title="Nama"><br /><br/>
				<input type="text" name="tempat" rel="tooltip" data-placement="right" title="Tempat Lahir"><br /><br/>
				<input type="text" name="tgl" rel="tooltip" data-placement="right" title="Tanggal Lahir"><br /><br/>
				<select name="jk">
					<option value="Laki-Laki">Laki-laki</option>
					<option value="Perempuan">Perempuan</option>
				</select><br/><br/>
				<input type="text" name="alamat" rel="tooltip" data-placement="right" title="Alamat"><br /><br/>
				<button type="submit" name="hitung" class="btn btn-primary">Hitung</button> -->

				<div class="box-body">
					<div class="form-group">
						<label for="nama" class="col-sm-2 control-label">NIM</label>
						<div class="input-group col-sm-8">
							<input type="text" class="form-control" name="nim" id="nim" placeholder="NIM">
							<span class="input-group-addon">
								<i class="glyphicon glyphicon-user"></i>
							</span>
						</div>
					</div>
					<div class="form-group">
						<label for="nama" class="col-sm-2 control-label">Nama Lengkap</label>
						<div class="input-group col-sm-8">
							<input type="text" class="form-control" name="nama" id="nama" placeholder="Nama Lengkap">
							<span class="input-group-addon">
								<i class="glyphicon glyphicon-user"></i>
							</span>
						</div>
					</div>
					<div class="form-group">
						<label for="tempatLahir" class="col-sm-2 control-label">Tempat Lahir</label>
						<div class="input-group col-sm-8">
							<input type="text" class="form-control" name="tempat" id="tempat" placeholder="Tempat Lahir">
							<span class="input-group-addon">
								<i class="glyphicon glyphicon-home"></i>
							</span>
						</div>
					</div>
					<div class="form-group">
						<label for="tglLahir" class="col-sm-2 control-label">Tgl Lahir</label>
						<div class="input-group col-sm-8">
							<input type="date" class="form-control" name="tgl" id="tgl" placeholder="Tanggal Lahir">
							<span class="input-group-addon">
								<i class="glyphicon glyphicon-calendar"></i>
							</span>
						</div>
					</div>
					<div class="form-group">
						<label for="noTelp" class="col-sm-2 control-label">Jenis Kelamin</label>
						<div class="col-sm-8">
							<select class="form-control" name="jk">
								<option disabled="selected">--Pilih--</option>
								<option value="1">Laki-Laki</option>
								<option value="2">Perempuan</option>
							</select>
						</div>
					</div>
					<div class="form-group">
						<label for="alamat" class="col-sm-2 control-label">Alamat</label>
						<div class="input-group col-sm-8">
							<textarea class="form-control" rows="5" name="alamat" id="alamat"></textarea>
							<span class="input-group-addon">
								<i class="glyphicon glyphicon-book"></i>
							</span>
						</div>
					</div>
				</div>
				<div class="box-footer" style="padding-left: 120px">
					<button class="btn btn-danger"><i class="glyphicon glyphicon-remove"></i> Batal</button>
					<button type="submit" name="ttambah" class="btn btn-info"><i class="glyphicon glyphicon-plus-sign"></i> Simpan</button>
					<button type="reset" class="btn btn-primary"><i class="glyphicon glyphicon-refresh"></i> Reset</button>
					<a href="<?=base_url('aplikasi')?>" name="hitung" class="btn btn-primary"><i class="glyphicon glyphicon-home"></i> Home</a>
				</div>
			</form>
		</fieldset>
		<br/><br/><br/>
	</div>
</body>
<script type="text/javascript" src="<?=base_url('assets/js/jquery.js')?>"></script>
<script type="text/javascript" src="<?=base_url('assets/js/bootstrap.js')?>"></script>
</html>