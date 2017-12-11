<?php
include('koneksi.php');
$ni = $_GET['ni'];
$sql = 'delete from daftar where nis="'.$ni.'"';
$query = mysqli_query($db_link,$sql);
header('location: index.php?Laman=daftarSiswa');
?>