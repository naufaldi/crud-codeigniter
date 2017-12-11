<section class="content">
    <div class="container-fluid">
     <ol class="breadcrumb breadcrumb-bg-pink">
        <li><a href="javascript:void(0);"><i class="material-icons">home</i> Home</a></li>
        <li><a href="javascript:void(0);"><i class="material-icons">library_books</i> Kitab</a></li>
        <li class="active"><i class="material-icons">archive</i> Data Kitab</li>
    </ol>
    <div class="block-header">
    </div>
    <div class="row clearfix">
        <div class="col-md-12">
            <div class="card">
                <div class="header bg-pink">
                    <h2><b>DATA KITAB MADIN PP.ANWARUL HUDA</b></h2>
                </div>
                <div class="body">
                    <div class="table-responsive">
                       <form class="form-horizontal" action="<?php echo base_url('admin/Kitab/proses_ubah_kitab');?>" method="POST">
                        <div class="row clearfix">
                            <div class="col-lg-2 col-md-2 col-sm-4 col-xs-5 form-control-label">
                                <label for="kode_pelajaran">Kode Pelajaran</label>
                            </div>
                            <div class="col-lg-10 col-md-10 col-sm-8 col-xs-7">
                                <div class="form-group">
                                    <div class="form-line">
                                        <input type="text" id="kode_pelajaran" name="kode_pelajaran" class="form-control" placeholder="  Kode Pelajaran" value="<?=$data->kode_pelajaran;?>" readonly>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row clearfix">
                            <div class="col-lg-2 col-md-2 col-sm-4 col-xs-5 form-control-label">
                                <label for="nama_pelajaran">Nama Pelajaran</label>
                            </div>
                            <div class="col-lg-10 col-md-10 col-sm-8 col-xs-7">
                                <div class="form-group">
                                    <div class="form-line">
                                        <input type="text" id="nama_pelajaran" name="nama_pelajaran" class="form-control" placeholder="  Nama Pelajaran" value="<?=$data->nama_pelajaran;?>">
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row clearfix">
                            <div class="col-lg-2 col-md-2 col-sm-4 col-xs-5 form-control-label">
                                <label for="kitab">Kitab</label>
                            </div>
                            <div class="col-lg-10 col-md-10 col-sm-8 col-xs-7">
                                <div class="form-group">
                                    <div class="form-line">
                                        <input type="text" id="kitab" name="kitab" class="form-control" placeholder="  Kitab" value="<?=$data->kitab;?>">
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row clearfix">
                            <div class="col-lg-2 col-md-2 col-sm-4 col-xs-5 form-control-label">
                                <label for="grade">Kelas</label>
                            </div>
                            <div class="col-lg-10 col-md-10 col-sm-8 col-xs-7">
                                <div class="form-group">
                                    <?php $get = $data->grade ?>
                                    <select class="form-control" name="grade" id="grade">
                                        <option disabled="disabled">--Selected--</option>
                                        <option <?=($get=='1 Awaliyah')?'selected="selected"':''?> value="1 Awaliyah">1 Awaliyah</option>
                                        <option <?=($get=='2 Awaliyah')?'selected="selected"':''?> value="2 Awaliyah">2 Awaliyah</option>
                                        <option <?=($get=='1 Wustho')?'selected="selected"':''?> value="1 Wustho">1 Wustho</option>
                                        <option <?=($get=='2 Wustho')?'selected="selected"':''?> value="2 Wustho">2 Wustho</option>
                                        <option <?=($get=='1 Ulya')?'selected="selected"':''?> value="1 Ulya">1 Ulya</option>
                                        <option <?=($get=='2 Ulya')?'selected="selected"':''?> value="2 Ulya">2 Ulya</option>
                                        <option <?=($get=='Mutakhorrijin')?'selected="selected"':''?> value="Mutakhorrijin">Mutakhorrijin</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <div class="row clearfix jsdemo-notification-button">
                                <button type="submit" class="btn btn-primary " data-placement-from="top" data-placement-align="right" data-animate-enter="" data-animate-exit="" data-color-name="alert-success">SIMPAN</button>
                                <a href="<?php echo base_url('admin/kitab');?>" class="btn btn-warning">CLOSE</a>
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