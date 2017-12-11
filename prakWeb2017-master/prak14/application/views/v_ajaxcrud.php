<?php
defined('BASEPATH') OR exit('No direct script access allowed');?>
<!DOCTYPE html>
<html>
<head>
	<title>Login CI</title>
	<meta charset="utf-8" name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="stylesheet" type="text/css" href="<?=base_url('assets/css/bootstrap.css')?>">
	<link rel="stylesheet" type="text/css" href="<?=base_url('assets/css/bootstrap-responsive.css')?>">
	<link rel="stylesheet" type="text/css" href="<?=base_url('assets/css/bootstrap-editable.css')?>">
	<script type="text/javascript" src="<?=base_url('assets/js/jquery.js')?>"></script>
</head>
<body>
	<div class="container">
		<fieldset>
			<legend>Tambah Mahasiswa</legend>
			<form action="" id="form" class="form-horizontal">
				<div class="box-body">
					<div class="form-group">
						<label for="nama" class="col-sm-2 control-label">NIM</label>
						<div class="input-group col-sm-8">
							<input type="text" class="form-control" name="nim" id="nim" placeholder="NIS" required="required">
							<span class="input-group-addon">
								<i class="glyphicon glyphicon-user"></i>
							</span>
						</div>
					</div>
					<div class="form-group">
						<label for="nama" class="col-sm-2 control-label">Nama Lengkap</label>
						<div class="input-group col-sm-8">
							<input type="text" class="form-control" name="nama" id="nama" placeholder="Nama Lengkap" required="required">
							<span class="input-group-addon">
								<i class="glyphicon glyphicon-user"></i>
							</span>
						</div>
					</div>
				</div>
				<div class="box-footer" style="padding-left: 120px">
					<button type="submit" name="ttambah" id="simpan" class="btn btn-primary"><i class="glyphicon glyphicon-plus-sign"></i> Simpan</button>
					<button type="reset" class="btn btn-info"><i class="glyphicon glyphicon-refresh"></i> Reset</button>
				</div>
			</form>
			<legend>Daftar Mahasiswa</legend>
			<div id="daftar_mahasiswa"><?=$daftar_mhs;?></div>
		</fieldset>
	</div>
	
	<script type="text/javascript" src="<?=base_url('assets/js/bootstrap.js')?>"></script>
	<script type="text/javascript" src="<?=base_url('assets/js/bootstrap-tooltip.js')?>"></script>
	<script type="text/javascript" src="<?=base_url('assets/js/bootstrap-editable.js')?>"></script>
	<script type="text/javascript">
		$.fn.editable.defaults.mode ='popup';
		
		$(document).ready(function(){
			$('.xedit').editable({
				url :'<?=base_url('Ajaxcrud/ubah_mahasiswa')?>'
			});
			$('#simpan').click(function(event)
				{	if ( $('#nim').val()=='' || $('#nama').val()=='') 
				{ alert('Lengkapi isisan');
			}else
			{	event.preventDefault();
				jQuery.ajax({
					type:"POST",
					url :'<?=base_url('Ajaxcrud/tambah_mahasiswa')?>',
					dataType :'json',
					data :{
						nim2: $("#nim").val(),
						nama2: $("#nama").val()
					},
					success:function(json)
					{
						try
						{
							$('#daftar_mahasiswa').html('');
							$('#daftar_mahasiswa').html(json);
							jQuery('#daftar_mahasiswa').show();
							$('#nim').val('');
							$('#nama').val('');
							$('.xedit').editable({
								url :'<?=base_url('Ajaxcrud/ubah_mahasiswa')?>'
							});
						}catch(e){
							alert('Exception request');
						}
					},
					error:function(){
						alert('Error Exception request');
					}
				});
			}
		});
		});
		function hapus(id)
		{
			if(confirm('Yakin ingin hapus?'))
			{
				jQuery.ajax({
					type:"POST",
					url :"<?=base_url('Ajaxcrud/hapus_mahasiswa')?>/"+id,
					dataType :'json',
					success:function(json)
					{
						try
						{
							$('#daftar_mahasiswa').html('');
							$('#daftar_mahasiswa').html(json);
							jQuery('#daftar_mahasiswa').show();
							$('#nim').val('');
							$('#nama').val('');
							$('.xedit').editable({
								url :'<?=base_url('Ajaxcrud/ubah_mahasiswa')?>'
							});
						}catch(e){
							alert('Exception request');
						}
					},
					error:function(){
						alert('Error Exception request');
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