
        </div>
            <div class="row wrapper border-bottom white-bg page-heading">
                <div class="col-lg-10">
                    <h2>Data Logistik</h2>
                    <ol class="breadcrumb">
                        <li>
                            <a href="index.html">Home</a>
                        </li>
                        <li>
                            <a>Data</a>
                        </li>
                        <li class="active">
                            <strong>Tambah Data</strong>
                        </li>
                    </ol>
                </div>
                <div class="col-lg-2">

                </div>
            </div>
        <div class="wrapper wrapper-content animated fadeInRight">
            <div class="row">
                <div class="col-lg-12">
                <div class="ibox float-e-margins">
                    <div class="ibox-title">
                        <h5>Tambah Data Logistik Barang </h5>
                        <div class="ibox-tools">
                            <a class="collapse-link">
                                <i class="fa fa-chevron-up"></i>
                            </a>
                            <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                                <i class="fa fa-wrench"></i>
                            </a>
                            <ul class="dropdown-menu dropdown-user">
                                <li><a href="#">Config option 1</a>
                                </li>
                                <li><a href="#">Config option 2</a>
                                </li>
                            </ul>
                            <a class="close-link">
                                <i class="fa fa-times"></i>
                            </a>
                        </div>
                    </div>
                    <div class="ibox-content">

                    <form action="<?php echo base_url(). "index.php/logistik/insert"; ?>" method="POST" class="form-horizontal">
                        <div class="form-group"><label class="col-sm-2 control-label">No Barang</label>
                            <div class="col-sm-2">
                            <input type="text" class="form-control" name="no_barang" placeholder="Masukkan No Barang"></div>
                        </div>
                        <div class="form-group"><label class="col-sm-2 control-label">Nama Barang</label>
                            <div class="col-sm-5">
                            <input type="text" class="form-control" name="nama_barang" placeholder="Masukkan Nama Barang">
                            </div>
                        </div>
                        <div class="form-group"><label class="col-sm-2 control-label">Jenis Barang</label>
                            <div class="col-sm-5">
                            <select name="no_jenis" data-placeholder="Pilih Jenis Barang" class="chosen-select" tabindex="2">
                                <option value="">Select</option>
                                <option value="1">Kaos</option>
                                <option value="2">Kemeja</option>
                                <option value="3">Celana </option>
                                <option value="4">Batik</option>
                                <option value="5">Kaos Polo</option>
                                <option value="6">Jeans</option>
                            </select>
                            </div>
                        </div>
                        <div class="form-group" id="data_1"><label class="col-sm-2 control-label">Tanggal Masuk</label>
                            <div class="col-sm-5">
                                <div class="input-group date">
                                <span class="input-group-addon"><i class="fa fa-calender"></i></span>
                                    <input type="text" class="form-control" name="tanggal_barang" value="03/04/2014">
                                </div>
                           
                            </div>
                        </div>
                        <div class="form-group"><label class="col-sm-2 control-label">Keterangan</label>
                            <div class="col-sm-5">
                            <input type="text" class="form-control" name="keterangan" placeholder="Masukkan Keterangan Barang">
                            </div>
                        </div>
                        <div class="form-group"><label class="col-sm-2 control-label">Jumlah</label>
                            <div class="col-sm-2">
                            <input type="text" class="form-control" name="jumlah" placeholder=" Jumlah Barang">
                            </div>
                        </div>
                       <div class="form-group">
                          <div class="col-sm-12">
                             <button class="btn btn-sm btn-primary pull-right " value="Submit" name="submit"> Submit</button>
                          </div>
                        </div>
                    </form>

                    </div>
                </div>
            </div>
            </div>
        </div>




