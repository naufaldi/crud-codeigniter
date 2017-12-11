<?php
include('koneksi.php');
if(isset($_POST['ttambah'])){ //['ttambah'] merupakan name dari button di form tambah
$nis = $_POST['nis'];
$nama = $_POST['nama'];
$tempat =$_POST['tempatLahir'];
$tanggal =$_POST['tglLahir'];
$telp =$_POST['noTelp'];
$alamat =$_POST['alamat'];
$jml =$_POST['jumlah_saudara'];

$sql = 'insert into daftar (nis,nama,tempat,tanggal,telp,alamat,saudara) values ("'.$nis.'","'.$nama.'","'.$tempat.'","'.$tanggal.'","'.$telp.'","'.$alamat.'","'.$jml.'")';
$query = mysqli_query($db_link,$sql);
if($query){
header('location: index.php?Laman=daftarSiswa'); //kode ini supaya jika data setelah ditambahkan form kembali menuju tabel data siswa
}
else{
	echo 'Gagal';
}
}
if(isset($_POST['tedit'])){
	$nis = $_POST['nis'];
	$nama = $_POST['nama'];
	$tempat =$_POST['tempatLahir'];
	$tanggal =$_POST['tglLahir'];
	$telp =$_POST['noTelp'];
	$alamat =$_POST['alamat'];
	$jml =$_POST['jumlah_saudara'];

	$sql = 'update daftar set nama="'.$nama.'", tempat="'.$tempat.'",
	tanggal="'.$tanggal.'",telp="'.$telp.'",alamat="'.$alamat.'",saudara="'.$jml.'" where nis="'.$nis.'"';
	$query = mysqli_query($db_link,$sql);
	if($query){
		header('location: index.php?Laman=daftarSiswa');
	}
	else{
		echo 'Gagal';
	}
}
?>