<?php
defined('BASEPATH') OR exit('No direct script access allowed');?>
<!DOCTYPE html>
<html>
<head>
	<title>Ajax Crud</title>
	<meta charset="utf-8" name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/css/bootstrap.css')?>">
	<link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/css/bootstrap-responsive.css')?>">
	<link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/css/bootstrap-editable.css')?>">
</head>
<body>
	<div class="container">
		<fieldset>
			<legend>Tambah Mahasiswa</legend>
			<form action="" id="form" class="form-horizontal">
				<tr><td>NIM</td><td><input type="text" id="nim" placeholder="NIM" required></td></tr>
				<tr><td>Nama</td><td><input type="text" id="nama" placeholder="Nama" required></td></tr>
				<tr><td><button type="submit" id="simpan" class="btn btn-primary"><i class="glyphicon glyphicon-plus"></i></button></td></tr>
			</form>
			<hr/>
			<legend>Daftar Mahasiswa</legend>
			<div id="daftar_mahasiswa"><?php echo $daftar_mhs?></div>
			<legend>
				<a href="<?php echo base_url('Mahasiswa')?>" class="btn btn-primary btn-flat"><span glyphicon glyphicon-home></span>&nbsp;Home</a>
			</legend>	
		</fieldset>		
	</div>
	<script type="text/javascript" src="<?php echo base_url('assets/js/jquery.js')?>"></script>
	<script type="text/javascript" src="<?php echo base_url('assets/js/bootstrap.js')?>"></script>
	<script type="text/javascript" src="<?php echo base_url('assets/js/bootstrap-editable.js')?>"></script>
	<script type="text/javascript">
		$.fn.editable.defaults.mode = 'popup';
		$(document).ready(function(){
			$('.xedit').editable({
				url : '<?php echo base_url('ajaxcrud/ubah_mahasiswa')?>'
			});

			$('#simpan').click(function(event){
				if($('#nim').val()==''||$('#nama').val()==''){
					alert('Lengkapi Isian Form Anda');

				}else{
					event.preventDefault();
					jQuery.ajax({
						type: "POST",
						url: "<?php echo base_url('ajaxcrud/tambah_mahasiswa')?>",
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
								$("#nim").val('');
								$("#nama").val('');
								$('.xedit').editable({
				url : '<?php echo base_url('ajaxcrud/ubah_mahasiswa')?>'
			});
							}catch(e){
								alert('Exception While Request');
							}
						},
						error: function(){
							alert('Error While Request');
						}
					});
				}
			});
		});

		function hapus(id){
			if (confirm('Apakah Anda Yakin Ingin Menghapus Data ini?')) {
					jQuery.ajax({
						type: "POST",
						url: "<?php echo base_url('ajaxcrud/hapus_mahasiswa/')?>"+id,
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
								$('.xedit').editable({
				url : '<?php echo base_url('ajaxcrud/ubah_mahasiswa')?>'
			});
							}catch(e){
								alert('Exception While Request');
							}
						},
						error: function(){
							alert('Error While Request');
						}
					});
			}
		}
	</script>

</body>
</html>