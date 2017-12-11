<?php
defined('BASEPATH') OR exit('No direct script access allowed');
if ($this->session->userdata('userid') and $this->session->userdata('pass')) {
	?>
	<!DOCTYPE html>
	<html>
	<head>
		<title>Login CI</title>
		<meta charset="utf-8" name="viewport" content="width=device-width, initial-scale=1.0">
		<link rel="stylesheet" type="text/css" href="<?=site_url('assets/css/bootstrap.css')?>">
		<link rel="stylesheet" type="text/css" href="<?=base_url('assets/css/bootstrap-responsive.css')?>">
	</head>
	<body>
		<div class="container">
			<fieldset>
				<?php
				if((isset($page)) and ($page=='Tambah Mahasiswa')){?>
				<legend>Tambah Mahasiswa</legend>
				<?=form_open('aplikasi/proses_tambah_mahasiswa','class="form-horizontal"')?>
				<!-- <table>
					<tr><td>Nim</td><td>: <input type="text" name="nim" placeholder="NIM"></td></tr>
					<tr><td>Nama</td><td>: <input type="text" name="nama" placeholder="Nama"></td></tr>
					<tr><td><button type="submit" name="simpan" class="btn btn-primary"><i class="icon-ok icon-white"></i>Simpan</button></td></tr>
				</table> -->
				<div class="box-body">
					<div class="form-group">
						<label for="nama" class="col-sm-2 control-label">NIM</label>
						<div class="input-group col-sm-8">
							<input type="text" class="form-control" name="nim" id="nim" placeholder="NIS">
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
				</div>
				<div class="box-footer" style="padding-left: 120px">
					<button type="submit" name="ttambah" class="btn btn-primary"><i class="glyphicon glyphicon-plus-sign"></i> Simpan</button>
					<button type="reset" class="btn btn-info"><i class="glyphicon glyphicon-refresh"></i> Reset</button>
				</div>
			</form>

			<?php
		}else if ((isset($page)) and ($page=='Ubah Mahasiswa')){?>
		<legend>Ubah Mahasiswa</legend>
		<?=form_open('aplikasi/proses_ubah_mahasiswa','class="form-horizontal"')?>
		<input type="hidden" name="nim" value="<?=$mhs->nim?>" placeholder="NIM">
		<!-- <table>
			<tr><td>Nim</td><td>: <input type="text" name="nim" placeholder="NIM" value="<?=$mhs->nim?>"></td></tr>
			<tr><td>Nama</td><td>: <input type="text" name="nama" placeholder="Nama" value="<?=$mhs->nama?>"></td></tr>
			<tr><td><button type="submit" name="ubah" class="btn btn-warning"><i class="icon-ok icon-white"></i>Ubah</button></td></tr>
		</table> -->
		<div class="box-body">
					<div class="form-group">
						<label for="nama" class="col-sm-2 control-label">NIM</label>
						<div class="input-group col-sm-8">
							<input type="text" class="form-control" name="nim" id="nim" placeholder="NIS" value="<?=$mhs->nim?>">
							<span class="input-group-addon">
								<i class="glyphicon glyphicon-user"></i>
							</span>
						</div>
					</div>
					<div class="form-group">
						<label for="nama" class="col-sm-2 control-label">Nama Lengkap</label>
						<div class="input-group col-sm-8">
							<input type="text" class="form-control" name="nama" id="nama" placeholder="Nama Lengkap" value="<?=$mhs->nama?>">
							<span class="input-group-addon">
								<i class="glyphicon glyphicon-user"></i>
							</span>
						</div>
					</div>
				</div>
				<div class="box-footer" style="padding-left: 120px">
					<button type="submit" name="ttambah" class="btn btn-primary"><i class="glyphicon glyphicon-plus-sign"></i> Simpan</button>
					<button type="reset" name="ubah" class="btn btn-info"><i class="glyphicon glyphicon-refresh"></i> Reset</button>
				</div>
	</form>
	<?php
	unset($mhs);
}else if ((isset($page)) and ($page=='Daftar Mahasiswa')){?>
<legend>Daftar Mahasiswa</legend>
<!-- Pencarian -->
<table class="table table-bordered">
	<tr>
		<form action="<?php base_url('aplikasi/daftar_mahasiswa');?>" class="form-horizontal" method="POST" accept-charset="utf-8">
			<td><input type="text" name="cari" placeholder="Pencarian">
				<button type="submit" name="simpan" class="btn btn-primary"><i class="glyphicon glyphicon-search"></i> Cari</button>
			</td>
		</form>
		<td><a href="<?php base_url('aplikasi/daftar_mahasiswa');?>">
			<button type="button" name="daftardata" class="btn btn-success"><i class="glyphicon glyphicon-ok"></i> Semua Data</button>
		</a></td>
		<td><a href="<?=base_url('EXCEL_data');?>">
			<button type="button" name="daftardata" class="btn btn-success"><i class="glyphicon glyphicon-download"></i> Data Excell</button>
		</a></td>
		<td><a href="<?=base_url('PDF_data');?>">
			<button type="button" name="daftardata" class="btn btn-success"><i class="glyphicon glyphicon-download"></i> Data PDF</button>
		</a>
	</td>
</tr>
</table>
<?php
if (!empty($cari)) {
	if ($jumlah>0) {
		echo "<div class='alert alert-success'>Ditemukan ".$jumlah." data </div>";
	}else{
		echo "<div class='alert alert-error'>Data tidak ditemukan</div>";
	}
}
?>
<table class="table table-bordered">
	<tr>
		<td width="10%"><center>NIM</center></td>
		<td width="60%"><center>Nama</center></td>
		<td colspan="2"><center>Aksi</center></td>
	</tr>
	<?php 
	foreach ($daftar_mhs as $row) {
		echo "<tr><td>".$row->nim."</td>
		<td>".$row->nama."</td>
		<td><center><a href='".base_url('aplikasi/ubah_mahasiswa/'.$row->nim)."'><i class='glyphicon glyphicon-edit'></i> Ubah</a></center>
		</td>
		<td><center><a href='".base_url('aplikasi/hapus_mahasiswa/'.$row->nim)."' onClick=\"return confirm('Apakah anda ingin menghapus data ini??')\"><i class='glyphicon glyphicon-remove'></i> Hapus</a></center>
		</td>
	</tr>";
}
?>
</table>
<br/>
<a href="<?=base_url('aplikasi/tambah_mahasiswa');?>"><i class='glyphicon glyphicon-plus'></i> Tambah Mahasiswa</a>
<?php
unset($daftar_mhs,$row);
}else{
	?>
	<legend>Home </legend>
	Hai <?=$this->session->userdata('nama')?>, Selamat datang di aplikasi CRUD menggunakan CodeIgniter<br/><h2>(14650013) IQBAL FAUZI</h2><br/>
	<a href="<?=base_url('aplikasi/daftar_mahasiswa');?>"><i class='icon-hand-right'></i>Daftar Mahasiswa</a>
	<?php
}
?>
<hr/>
<a href="<?=base_url('aplikasi');?>"><i class='glyphicon glyphicon-home'></i> Home</a> || <a href="<?=base_url('aplikasi/logout');?>" onClick="return confirm('Apakah anda ingin Logout??')"><i class='glyphicon glyphicon-off'></i> Logout</a><br/>
<?php 
unset($page);
?>
</fieldset>
</div>
<script type="text/javascript" src="<?=site_url('assets/js/jquery.js')?>"></script>
<script type="text/javascript" src="<?=base_url('assets/js/bootstrap.js')?>"></script>
<script type="text/javascript" src="<?=base_url('assets/js/bootstrap-tooltip.js')?>"></script>
</body>
</html>
<?php
}
?>