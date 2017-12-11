<?php 
defined('BASEPATH') OR exit('No direct script access allowed');
 if ($this->session->userdata('userid') and $this->session->userdata('pass')) {
  ?>

 <!DOCTYPE html>
 <html>
 <head>
 	<title></title>
 	<meta charset="utf-8">
 	<meta name="viewport" content="width=device-width, initial-scale=1.0">
 	<link href="<?php echo site_url('assets/css/bootstrap.css')?>" rel="stylesheet">
 	<link href="<?php echo base_url('assets/css/bootstrap-responsive.css')?>" rel="stylesheet">
 </head>
 <body>
 <div class="container">
 	<fieldset>
 	<?php
 	if ((isset($page))and ($page == 'tambah_mahasiswa')) { ?>
 		<legend>Tambah mahasiswa</legend>
 		<?php echo form_open('index.php/aplikasi/proses_tambah_mahasiswa', 'class="form-horizontal"')?>
 		<table>
 			<tr>
 				<td>Nim</td>
 				<td>: <input type="text" name="nim" placeholder="NIM"/></td>
 			</tr>
 			<tr>
 				<td>Nama</td>
 				<td>: <input type="text" name="nama" placeholder="Nama"/>	</td>
 			</tr>
 			<tr>
 				<td>
 					<button type="submit" name="simpan" class="btn btn-primary"><i class="icon-ok icon-white"></i>Simpan</button>
 				</td>
 			</tr>
 		</table>
 		</form>
 	<?php
 	}else if((isset($page)) and ($page == 'ubah_mahasiswa')) { ?>
 		<legend>Ubah Mahasiswa</legend>
 		<?php echo form_open('index.php/aplikasi/proses_ubah_mahasiswa', 'class="form-horizontal"')?>
 		<input type="hidden" name="nim" value="<?php echo $mhs->nim ?>">

 		<table>
 			<tr>
 				<td>Nim</td>
 				<td>: <input type="text" name="nim" value="<?php echo $mhs->nim?>" disabled/></td>
 			</tr>
 			<tr>
 				<td>Nama</td>
 				<td>: <input type="text" name="nama" value="<?php echo $mhs->nama?>"/></td>
 			</tr>
 			<tr>
 				<td>
 					<button type="submit" name="ubah" class="btn btn-primary"><i class="icon-ok icon-white"></i>Ubah</button>
 				</td>
 			</tr>
 		</table>
 		</form>
 		<?php
 		unset($mhs);
 	}else if ((isset($page)) and ($page == 'daftar_mahasiswa')) { ?>
 		<legend>Daftar Mahasiwa</legend>
 		<table><tr>
 			<form action="<?php echo base_url('index.php/aplikasi/daftar_mahasiswa')?>" class="form-horizontal" method="post" accept-charset="utf-8">
 			<td><input type="text" name="cari" placeholder="Pencarian"/>
 			<button type="submit" name="simpan" class="btn btn-primary"><i class="icon-search icon-white"></i>Cari</button>
 			</td>
 			</form>
 			<td> <a href="<?php echo base_url('index.php/aplikasi/daftar_mahasiswa')?>">
 			<button type="button" name="daftardata" class="btn btn-primary"><i class="icon-ok icon-white"></i>Semu Data</button></a>
 			</td>
 			<td><a href="<?php echo base_url('index.php/EXCEL_data');?>">
 			<button type="button" name="daftardata" class="btn btn-primary"><i class="icon-download icon-white"></i>Data Excel</button>
 			</a></td>
 			<td><a href="<?php echo base_url('index.php/PDF_data');?>">
 			<button type="button" name="daftardata" class="btn btn-primary"><i class="icon-download icon-white"></i>Data PDF</button>
 			</a></td>
 		</tr>
 		</table>
 		<?php if (!empty($cari)) {
 			if ($jumlah > 0) {
 				echo "<div class='alert alert-success'>Ditemukan".$jumlah."data</div>";
 			}else{
 				echo "<div class='alert alert-error'>Data Tidak Ditemukan</div>";
 			}
 		} 
 		?>

 		<table class="table table-bordered">
 			<tr>
	 			<td width="10%"><center>NIM</center></td>
	 			<td width="60%"><center>Nama</center></td>
	 			<td colspan="2"><center>Aksi</center></td>
 			</tr>

 			<?php foreach ($daftar_mhs as $r) {
 				echo "<tr><td>".$r->nim."</td><td>".$r->nama."</td><td><center><a href='".base_url('index.php/aplikasi/ubah_mahasiswa/'.$r->nim)."'><i class='icon-edit'></i>Ubah</a></center>
 					</td>
 					<td><center><a href='".base_url('index.php/aplikasi/hapus_mahasiswa/'.$r->nim)."' onclick=\"return confirm('Apakah Anda Ingin Hapus data ini?')\"><i class='icon-remove'></i>Hapus</a></center></td></tr>";
 			}

 			?>
 		</table>
 		<br/>
 		<a href="<?php echo base_url('index.php/aplikasi/tambah_mahasiswa');?>"><i class="icon-plus-sign"></i>Tambah Mahasiswa</a>

 		<?php
 		unset($daftar,$mhs);
 		}else{
 		?>
 		<legend>Home</legend>
 		hai <?php echo $this->session->userdata('nama')?>, selamat datang di aplikasi CRUD CI. <br/><br/>	
 		<a href="<?php echo base_url('index.php/aplikasi/daftar_mahasiswa');?>"><i class="icon-hand-right"></i>Daftar Mahasiswa</a>
 		<?php
 		}
 		?>
 		<hr/>
 		<a href="<?php echo base_url('index.php/aplikasi');?>"><i class="icon-home"></i>Home</a> || <a href="<?=base_url('index.php/aplikasi/logout');?>" onClick ="return confirm('Apakah anda ingin keluar?')"><i class="icon-off">Keluar</i></a><br/>
 		<?php unset($page);
 		?> 		
 	</fieldset>

 </div>
 <script src="<?php echo base_url('assets/js/jquery.js')?>"></script>
 <script src="<?php echo base_url('assets/js/bootstrap.js')?>"></script>
 <script src="<?php echo base_url('assets/js/tooltip.js')?>"></script>
 </body>

 </html>
 <?php } ?>