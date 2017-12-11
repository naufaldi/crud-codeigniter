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
                        <strong>Edit Data</strong>
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
                    <h5>Edit Data Logistik Barang </h5>
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

                <form action="<?php echo base_url()."index.php/logistik/update_data"; ?>" method="POST" class="form-horizontal">
                    <div class="form-group"><label class="col-sm-2 control-label">No Barang</label>
                        <div class="col-sm-2">
                        <input type="text" class="form-control" name="no_barang" value="<?php echo $no_barang; ?>" readonly="" ></div>
                    </div>
                    <div class="form-group"><label class="col-sm-2 control-label">Nama Barang</label>
                        <div class="col-sm-5">
                        <input type="text" class="form-control" name="nama_barang" value="<?php echo $nama_barang; ?>">
                        </div>
                    </div>
                    <div class="form-group"><label class="col-sm-2 control-label">Jenis Barang</label>
                        <div class="col-sm-5">
                        <select name="no_jenis" data-placeholder="Pilih Jenis Barang" class="chosen-select" tabindex="2">
                            <option value=<?php echo $no_jenis; ?>""><?php echo $no_jenis; ?></option>
                            <option value="">Select</option>
                            <option value="Kemeja">Kemeja</option>
                            <option value="Celana">Celana</option>
                            <option value="Celana Dalam">Celana Dalam</option>
                            <option value="Kaos">Kaos</option>
                            <option value="Kaos Polo">Kaos Polo</option>
                            <option value="Batik">Batik</option>
                        </select>
                        </div>
                    </div>
                    <div class="form-group" id="data_1"><label class="col-sm-2 control-label">Tanggal Masuk</label>
                        <div class="col-sm-5">
                            <div class="input-group date">
                            <span class="input-group-addon"><i class="fa fa-calender"></i></span>
                                <input type="text" class="form-control" name="tanggal_barang" value="<?php echo $tanggal_barang; ?>">
                            </div>
                        
                        </div>
                    </div>
                    <div class="form-group"><label class="col-sm-2 control-label">Keterangan</label>
                        <div class="col-sm-5">
                        <input type="text" class="form-control" name="keterangan"  value="<?php echo $keterangan; ?>">
                        </div>
                    </div>
                    <div class="form-group"><label class="col-sm-2 control-label">Jumlah</label>
                        <div class="col-sm-2">
                        <input type="number" class="form-control" name="jumlah"  value="<?php echo $jumlah; ?>">
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="col-sm-12">
                            <button class="btn btn-sm btn-primary pull-right " value="Submit" name="submit"> Update</button>
                        </div>
                    </div>
                </form>

                </div>
            </div>
        </div>
        </div>
    </div>
