<?php
include('koneksi.php');
$sql = 'select * from daftar';
$query = mysqli_query($db_link,$sql);
?>
<table class="table table-striped">
	<tr class="success">
		<td>NIS</td>
		<td>Nama</td>
		<td>Tempat Lahir</td>
		<td>Tanggal Lahir</td>
		<td>Telephone</td>
		<td>Alamat</td>
		<td>Jumlah Saudara</td>
		<td>Tambah</a></td></tr>
		<?php
		while ($data = mysqli_fetch_array($query)) {
			?>
			<tr class="primary">
				<td p align="center" bgcolor="#FFFFFF"><?php echo $data['nis'];?></td>
				<td p align="center" bgcolor="#FFFFFF"><?php echo $data['nama'];?></td>
				<td p align="center" bgcolor="#FFFFFF"><?php echo $data['tempat'];?></td>
				<td p align="center" bgcolor="#FFFFFF"><?php echo $data['tanggal'];?></td>
				<td p align="center" bgcolor="#FFFFFF"><?php echo $data['telp'];?></td>
				<td p align="center" bgcolor="#FFFFFF"><?php echo $data['alamat'];?></td>
				<td p align="center" bgcolor="#FFFFFF"><?php echo $data['saudara'];?></td>
				<td p align="center" bgcolor="#FFFFFF">
					<a href="?Laman=edit&ni=<?php echo $data['nis'];?>" title="Edit siswa ini" class="btn btn-warning">Edit</a>
					<a href="delete.php?ni=<?php echo $data['nis'];?>" onclick="return confirm('Yakin data akan dihapus?');" class="btn btn-danger">Hapus </a>
				</td>
			</tr>
			<?php
		}
		?>
	</table>