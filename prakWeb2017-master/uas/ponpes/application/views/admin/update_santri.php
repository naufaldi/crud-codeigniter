<section class="content">
    <div class="container-fluid">
       <ol class="breadcrumb breadcrumb-bg-pink">
        <li><a href="javascript:void(0);"><i class="material-icons">home</i> Home</a></li>
        <li><a href="javascript:void(0);"><i class="material-icons">library_books</i> Santri</a></li>
        <li class="active"><i class="material-icons">archive</i> Data Santri</li>
    </ol>
    <div class="block-header">
    </div>
    <div class="row clearfix">
        <div class="col-md-12">
            <div class="card">
                <div class="header bg-pink">
                    <h2><b>DATA SANTRI MADIN PP.ANWARUL HUDA</b></h2>
                </div>
                <div class="body">

                    <div class="table-responsive">
                     <form class="form-horizontal" action="<?php echo base_url('admin/Santri/proses_ubah_santri');?>" method="POST">
                        <div class="row clearfix">
                            <div class="col-lg-2 col-md-2 col-sm-4 col-xs-5 form-control-label">
                                <label for="NIS">NIS</label>
                            </div>
                            <div class="col-lg-10 col-md-10 col-sm-8 col-xs-7">
                                <div class="form-group">
                                    <div class="form-line">
                                        <input type="text" id="NIS" name="NIS" class="form-control" placeholder="  NIS" value="<?=$data->NIS;?>" readonly>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row clearfix">
                            <div class="col-lg-2 col-md-2 col-sm-4 col-xs-5 form-control-label">
                                <label for="nama_santri">Nama Santri</label>
                            </div>
                            <div class="col-lg-10 col-md-10 col-sm-8 col-xs-7">
                                <div class="form-group">
                                    <div class="form-line">
                                        <input type="text" id="nama_santri" name="nama_santri" class="form-control" placeholder="  Nama Santri" value="<?=$data->nama_santri;?>">
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row clearfix">
                            <div class="col-lg-2 col-md-2 col-sm-4 col-xs-5 form-control-label">
                                <label for="gender">Jenis Kelamin</label>
                            </div>
                            <div class="col-lg-10 col-md-10 col-sm-8 col-xs-7">
                                <div class="form-group">
                                    <?php $get = $data->gender ?>
                                    <select class="form-control" name="gender" id="gender">
                                        <option disabled="disabled">--Selected--</option>
                                        <option <?=($get=='1')?'selected="selected"':''?> value="1">Laki-laki</option>
                                        <option <?=($get=='2')?'selected="selected"':''?> value="2">Perempuan</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="row clearfix">
                            <div class="col-lg-2 col-md-2 col-sm-4 col-xs-5 form-control-label">
                                <label for="status_aktif">Status</label>
                            </div>
                            <div class="col-lg-10 col-md-10 col-sm-8 col-xs-7">
                                <div class="form-group">
                                    <?php $get = $data->status_aktif ?>
                                    <select class="form-control" name="status_aktif" id="status_aktif">
                                        <option disabled="disabled">--Selected--</option>
                                        <option <?=($get=='1')?'selected="selected"':''?> value="1">Aktif</option>
                                        <option <?=($get=='2')?'selected="selected"':''?> value="2">Tidak Aktif</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="row clearfix">
                            <div class="col-lg-2 col-md-2 col-sm-4 col-xs-5 form-control-label">
                                <label for="nama_wali">Nama Wali</label>
                            </div>
                            <div class="col-lg-10 col-md-10 col-sm-8 col-xs-7">
                                <div class="form-group">
                                    <div class="form-line">
                                        <input type="text" id="nama_wali" name="nama_wali" class="form-control" placeholder="  Nama Wali" value="<?=$data->nama_wali;?>">
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row clearfix">
                            <div class="col-lg-2 col-md-2 col-sm-4 col-xs-5 form-control-label">
                                <label for="alamat">Alamat</label>
                            </div>
                            <div class="col-lg-10 col-md-10 col-sm-8 col-xs-7">
                                <div class="form-group">
                                    <div class="form-line">
                                        <input type="text" id="alamat" name="alamat" class="form-control" placeholder="  Alamat" value="<?=$data->alamat;?>">
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row clearfix">
                            <div class="col-lg-2 col-md-2 col-sm-4 col-xs-5 form-control-label">
                                <label for="tgl_masuk">Tgl Masuk</label>
                            </div>
                            <div class="col-lg-10 col-md-10 col-sm-8 col-xs-7">
                                <div class="form-group">
                                    <div class="form-line">
                                        <input type="date" id="tgl_masuk" name="tgl_masuk" class="form-control" placeholder="  Tgl Masuk" value="<?=$data->tgl_masuk;?>">
                                    </div>
                                </div>
                            </div>
                            </div>
                        <div class="row clearfix">
                            <div class="col-lg-2 col-md-2 col-sm-4 col-xs-5 form-control-label">
                                <label for="kamar">Kamar</label>
                            </div>
                            <div class="col-lg-10 col-md-10 col-sm-8 col-xs-7">
                                <div class="form-group">
                                    <div class="form-line">
                                        <input type="text" id="kamar" name="kamar" class="form-control" placeholder="  Kamar" value="<?=$data->kamar;?>">
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row clearfix">
                            <div class="col-lg-2 col-md-2 col-sm-4 col-xs-5 form-control-label">
                                <label for="tmp_lahir">Tempat Lahir</label>
                            </div>
                            <div class="col-lg-10 col-md-10 col-sm-8 col-xs-7">
                                <div class="form-group">
                                    <div class="form-line">
                                        <input type="text" id="tmp_lahir" name="tmp_lahir" class="form-control" placeholder="  Tempat Lahir" value="<?=$data->tmp_lahir;?>">
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row clearfix">
                            <div class="col-lg-2 col-md-2 col-sm-4 col-xs-5 form-control-label">
                                <label for="tgl_lahir">Tgl Lahir</label>
                            </div>
                            <div class="col-lg-10 col-md-10 col-sm-8 col-xs-7">
                                <div class="form-group">
                                    <div class="form-line">
                                        <input type="date" id="tgl_lahir" name="tgl_lahir" class="form-control" placeholder="  Tgl Lahir" value="<?=$data->tgl_lahir;?>">
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <div class="row clearfix jsdemo-notification-button">
                                <button type="submit" class="btn btn-primary " data-placement-from="top" data-placement-align="right" data-animate-enter="" data-animate-exit="" data-color-name="alert-success">SIMPAN</button>
                                <a href="<?php echo base_url('admin/santri');?>" class="btn btn-warning">CLOSE</a>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
</div>
</section>