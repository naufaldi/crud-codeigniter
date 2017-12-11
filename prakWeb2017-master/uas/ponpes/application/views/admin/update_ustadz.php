<section class="content">
    <div class="container-fluid">
       <ol class="breadcrumb breadcrumb-bg-pink">
        <li><a href="javascript:void(0);"><i class="material-icons">home</i> Home</a></li>
        <li><a href="javascript:void(0);"><i class="material-icons">library_books</i> Ustadz</a></li>
        <li class="active"><i class="material-icons">archive</i> Data Ustadz</li>
    </ol>
    <div class="block-header">
    </div>
    <div class="row clearfix">
        <div class="col-md-12">
            <div class="card">
                <div class="header bg-pink">
                    <h2><b>DATA USTADZ MADIN PP.ANWARUL HUDA</b></h2>
                </div>
                <div class="body">
                    <div class="table-responsive">
                     <form class="form-horizontal" action="<?php echo base_url('admin/C_admin/proses_ubah_ustadz');?>" method="POST">
                        <div class="row clearfix">
                            <div class="col-lg-2 col-md-2 col-sm-4 col-xs-5 form-control-label">
                                <label for="kode_ustadz">Kode Ustadz</label>
                            </div>
                            <div class="col-lg-10 col-md-10 col-sm-8 col-xs-7">
                                <div class="form-group">
                                    <div class="form-line">
                                        <input type="text" id="kode_ustadz" name="kode_ustadz" class="form-control" placeholder="  Kode Ustadz" value="<?=$ust->kode_ustadz;?>" readonly>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row clearfix">
                            <div class="col-lg-2 col-md-2 col-sm-4 col-xs-5 form-control-label">
                                <label for="nama_ustadz">Nama Ustadz</label>
                            </div>
                            <div class="col-lg-10 col-md-10 col-sm-8 col-xs-7">
                                <div class="form-group">
                                    <div class="form-line">
                                        <input type="text" id="nama_ustadz" name="nama_ustadz" class="form-control" placeholder="  Nama Ustadz" value="<?=$ust->nama_ustadz;?>">
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
                                    <?php $get = $ust->gender ?>
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
                                    <?php $get = $ust->status_aktif ?>
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
                                <label for="alamat">Alamat</label>
                            </div>
                            <div class="col-lg-10 col-md-10 col-sm-8 col-xs-7">
                                <div class="form-group">
                                    <div class="form-line">
                                        <input type="text" id="alamat" name="alamat" class="form-control" placeholder="  Alamat" value="<?=$ust->alamat;?>">
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
                                        <input type="date" id="tgl_lahir" name="tgl_lahir" class="form-control" placeholder="  Tgl Lahir" value="<?=$ust->tgl_lahir;?>">
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row clearfix">
                            <div class="col-lg-2 col-md-2 col-sm-4 col-xs-5 form-control-label">
                                <label for="no_telp">No Telp</label>
                            </div>
                            <div class="col-lg-10 col-md-10 col-sm-8 col-xs-7">
                                <div class="form-group">
                                    <div class="form-line">
                                        <input type="text" id="no_telp" name="no_telp" class="form-control" placeholder="  No Telp" value="<?=$ust->no_telp;?>">
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <div class="row clearfix jsdemo-notification-button">
                                <button type="submit" class="btn btn-primary " data-placement-from="top" data-placement-align="right" data-animate-enter="" data-animate-exit="" data-color-name="alert-success">SIMPAN</button>
                                <a href="<?php echo base_url('admin/ustadz');?>" class="btn btn-warning">CLOSE</a>
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