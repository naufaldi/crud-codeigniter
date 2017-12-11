<?php
defined('BASEPATH') OR exit('No direct script access allowed');
if ($this->session->userdata('userid') and $this->session->userdata('pass')) {
	
?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width-device-width, initial-scale=1.0">
	<link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/css/bootstrap.css')?>">
	<link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/css/bootstrao-responsive.css')?>">
	<title>CRUD Mahasiswa Codeigniter</title>
</head>
<body>
	<div class="container">
		<fieldset>
			<?php if((isset($page)) and ($page == 'tambah_mahasiswa')){?>
				<legend>Tambah Mahasiswa</legend>
				<?php echo form_open('mahasiswa/proses_tambah_mahasiswa', 'class="form-horizontal"')?>
				<div class="form-group">
						<label>NIM</label>
							<input type="text" name="nim" class="form-control" placeholder="NIM">
					</div>
					<div class="form-group">
						<label>Nama</label>
							<input type="text" name="nama" placeholder="Nama" class="form-control">
					</div>
					<div class="form-group">
						<input type="submit" name="simpan" value="TAMBAH" class="btn btn-primary">
						<button class="btn btn-danger"></i> Batal</button>
						
					</div>
			<?php } else if ((isset($page)) and ($page == 'ubah_mahasiswa')) {?>
				<legend>Ubah Mahasiswa</legend>
				<?php echo form_open('mahasiswa/proses_ubah_mahasiswa', 'class="form-horizontal"')?>
				<input type="hidden" name="nim" value="<?php echo $mhs->nim?>">
				<div class="form-group">
						<label>NIM</label>
							<input type="text" name="nim" class="form-control" value="<?php echo $mhs->nim?>" disabled>
					</div>
					<div class="form-group">
						<label>Nama</label>
							<input type="text" name="nama" value="<?php echo $mhs->nama?>" class="form-control">
					</div>
					<div class="form-group">
						<input type="submit" name="ubah" value="Edit" class="btn btn-primary">
						<button class="btn btn-danger"><i class="glyphicon glyphicon-plus"></i> Batal</button>
						
					</div>

			<?php unset($mhs);} else if((isset($page)) and ($page == 'daftar_mahasiswa')){?>
				<legend>Daftar Mahasiswa</legend>
				<form action="<?php echo base_url('mahasiswa/daftar_mahasiswa')?>" class="form-horizontal" method="post" accept-charset="utf-8">
<!-- 					<div class="form-group"> -->
							<input type="text" name="cari" placeholder="Prncarian">
							<button type="submit" name="simpan" class="btn btn-primary"><i class="glyphicon glyphicon-search"></i>Cari</button>&nbsp;
<!-- 					</div> -->
				</form>
				<br>
					<a href="<?php echo base_url('mahasiswa/daftar_mahasiswa')?>"><button type="button" name="daftardata" class="btn btn-primary"><i class="glyphicon glyphicon-ok"></i>&nbsp;Semua Data</button></a> &nbsp;&nbsp;
					<a href="<?php echo base_url('EXCEL_data')?>"><button type="button" name="daftardata" class="btn btn-success"><i class="glyphicon glyphicon-download-alt"></i>&nbsp;Data Excel</button></a>
					<a href="<?php echo base_url('PDF_data')?>"><button type="button" name="daftardata" class="btn btn-warning"><i class="glyphicon glyphicon-download-alt"></i>&nbsp;Data PDF</button></a>
					<a href="<?php echo base_url('AjaxCrud')?>"><button type="button" name="daftardata" class="btn btn-info"><i class="glyphicon glyphicon-download-info"></i>&nbsp;Crud Ajax</button></a>  
					<br>
					<?php if (!empty($cari)) {
						if ($jumlah > 0) {
							echo "<div class='alert alert-success'>Ditemukan ".$jumlah."data</div>";
						}else{
							echo "<div class='alert alert-error'>Data tidak ditemukan</div>";
						}
					} ?>

				<table class="table table-bordered" style="margin-top: 10px">
					<tr>

						<td width="10%"><center>NIM</center></td>
						<td width="60%"><center>Nama</center></td>
						<td colspan="2"><center>Aksi</center></td>
					</tr>
					<?php 
						foreach ($daftar_mhs as $r) {
							echo "<tr><td>".$r->nim."</td><td>".$r->nama."</td><td><center><a href='".base_url('mahasiswa/ubah_mahasiswa/'.$r->nim)."' class='btn btn-xs btn-warning'><i class='glyphicon glyphicon-pencil'></i>Ubah</a></center>
								</td>
								<td><center><a href='".base_url('mahasiswa/hapus_mahasiswa/'.$r->nim)."' onClick=\"return confirm('Apakah anda yakin ingin menghapus data ini?')\" class='btn btn-xs btn-danger'><i class='glyphicon glyphicon-remove'></i>Hapus</a></center>
								</td></tr>";
						}
					?>
				</table>
				<br/>
				<a href="<?php echo base_url('mahasiswa/tambah_mahasiswa')?>"><i class="glyphicon glyphicon-plus"></i>Tambah Mahasiswa</a>
			<?php unset($daftar_mhs, $r); } else {?>
				<legend>Home</legend>
				Selamat Datang <?php echo $this->session->userdata('nama')?> di Aplikasi CRUD Codeigniter
				<a href="<?php echo base_url('mahasiswa/daftar_mahasiswa')?>"><i class="glyphicon glyphicon-user"></i>Daftar Mahasiswa</a>
			<?php }?>
			<hr/>
			<a href="<?php echo base_url('mahasiswa')?>"><i class="glyphicon glyphicon-home"></i>Home</a>||<a href="<?php echo base_url('mahasiswa/logout')?>" onClick="return confirm('Apakah anda yakin ingin keluar?')"><i class="glyphicon glyphicon-user"></i>Logout</a>
			<?php unset($page); ?>
		</fieldset>	
	</div>

</div>
</body>
<script type="text/javascript" src="<?php echo base_url('assets/js/jquery.js') ?>"></script>
<script type="text/javascript" src="<?php echo base_url('assets/js/bootstrap.js') ?>"></script>
</html>
<?php }?>