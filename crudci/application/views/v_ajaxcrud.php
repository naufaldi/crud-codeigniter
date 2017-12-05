<?php 
defined('BASEPATH') OR exit('No direct script access allowed');?>

<!DOCTYPE html>
<html>
<head>
	<title></title>
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
 	<link href="<?php echo site_url('assets/css/bootstrap.css')?>" rel="stylesheet">
 	<link href="<?php echo base_url('assets/css/bootstrap-responsive.css')?>" rel="stylesheet">
 	<link href="<?php echo base_url('assets/css/bootstrap-editable.css')?>" rel="stylesheet">
</head>
<body>
<div class="container">
	<fieldset>
		<legend>Tambah Mahasiswa</legend>
		<form action="" id="form" class="form-horizontal">
			<table>
				<tr>
				<td>NIM</td><td>: <input type="text" id="nim" placeholder="NIM" required="required"/></td></tr>
				<tr>
				<td>Nama</td><td>: <input type="text" id="nama" placeholder="Nama" required="required"/></td></tr>
				<tr><td><button type="submit" id="simpan" class="btn btn-primary"><i class="icon-ok icon-white"></i>Simpan</button> </td></tr>
				
				
			</table>
		</form>
		<hr/>

		<legend>Daftar Mahasiswa</legend>
		<div id="daftar_mahasiswa"><?php echo $daftar_mhs?></div>
	</fieldset>

</div>
<script src="<?php echo base_url('assets/js/jquery.js')?>"></script>
 <script src="<?php echo base_url('assets/js/bootstrap.js')?>"></script>
 <script src="<?php echo base_url('assets/js/tooltip.js')?>"></script>
 <script src="<?php echo base_url('assets/js/bootstrap-editable.js')?>"></script>

 <script type="text/javascript">
 	$.fn.editable.defaults.mode = 'popup';

 	$(document).ready(function(){
 		$('.xedit').editable({
 			url: '<?php echo base_url('ajaxcrud/ubah_mahasiswa') ?>'
 		});

 		$("#simpan").click(function(event){
 			if ($('#nim').val() == '' || $('#nama').val() == '') {
 				alert('Lengkapi Isian Form Anda!');
 			}else{
 				event.preventDefault();
 				jQuery.ajax({
 					type: "POST",
 					url: "<?php echo base_url('ajaxcrud/tambah_mahasiswa');?>",
 					dataType: 'json',
 					data: {
 						nim2: $("#nim").val(),
 						nama2: $("#nama").val()
 					},
 					success: function(json){
 						try{
 							$('#daftar_mahasiswa').html('');
 							$('#daftar_mahasiswa').html(json);
 							jQuery('#daftar_mahasiswa').show();
 							$("#nim").val();
 							$("#nama").val();
 							$('.xedit').editable({
 								url: '<?php echo base_url('ajaxcrud/ubah_mahasiswa') ?>'
 							});

 						}catch(e){
 							alert('Exception while request..');
 						}
 					},
 					error: function(){
 						alert('Error While request..')
 					}
 				});
 			}
 		});
 	});

 	function hapus(id){
 		if (confirm('Apakah anda yakin ingin menghapus data ini ?')) {
 			jQuery.ajax({
 					type: "POST",
 					url: "<?php echo base_url('ajaxcrud/hapus_mahasiswa')?>/"+id,
 					dataType: 'json',
 					success: function(json){
 						try{
 							$('#daftar_mahasiswa').html('');
 							$('#daftar_mahasiswa').html(json);
 							jQuery('#daftar_mahasiswa').show();
 							$('.xedit').editable({
 								url: '<?php echo base_url('ajaxcrud/ubah_mahasiswa')?>'
 							});

 						}catch(e){
 							alert('Exception while request..');
 						}
 					},
 					error: function(){
 						alert('Error hapus data..')
 					}
 					
 			});
 		}
 	}

 </script>

</body>
</html>
<?php 
unset($daftar_mhs)
 ?>