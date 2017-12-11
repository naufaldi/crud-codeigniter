<form class="form-horizontal" method="post" action="aksi.php">
	<div class="box-body">
		<div class="form-group">
			<label for="nama" class="col-sm-2 control-label">NIS</label>
			<div class="input-group col-sm-8">
				<input type="text" class="form-control" name="nis" id="nis" placeholder="NIS">
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
				<input type="text" class="form-control" name="tempatLahir" id="tempatLahir" placeholder="Tempat Lahir">
				<span class="input-group-addon">
					<i class="glyphicon glyphicon-home"></i>
				</span>
			</div>
		</div>
		<div class="form-group">
			<label for="tglLahir" class="col-sm-2 control-label">Tgl Lahir</label>
			<div class="input-group col-sm-8">
				<input type="date" class="form-control" name="tglLahir" id="tglLahir" placeholder="Tanggal Lahir">
				<span class="input-group-addon">
					<i class="glyphicon glyphicon-calendar"></i>
				</span>
			</div>
		</div>
		<div class="form-group">
			<label for="noTelp" class="col-sm-2 control-label">No Telp</label>
			<div class="input-group col-sm-8">
				<input type="text" class="form-control" name="noTelp" id="noTelp" placeholder="Nomor Telephone">
				<span class="input-group-addon">
					<i class="glyphicon glyphicon-tags"></i>
				</span>
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
		<div class="form-group">
			<label for="noTelp" class="col-sm-2 control-label">Jumlah saudara</label>
			<div class="col-sm-8">
				<select class="form-control" name="jumlah_saudara">
					<option selected="selected">--Pilih--</option>
					<option>1</option>
					<option>2</option>
					<option>3</option>
				</select>
			</div>
		</div>
	</div>
	<div class="box-footer" style="padding-left: 120px">
		<button class="btn btn-danger"><i class="glyphicon glyphicon-remove"></i> Batal</button>
		<button type="submit" name="ttambah" class="btn btn-info"><i class="glyphicon glyphicon-plus-sign"></i> Simpan</button>
		<button type="reset" class="btn btn-primary"><i class="glyphicon glyphicon-refresh"></i> Reset</button>
	</div>
</form>