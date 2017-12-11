
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
                            <strong>List Data | <?php echo $this->session->flashdata('success'); ?> </strong>
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
                        <h5>Data Logistik Barang </h5>
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

                        <div class="table-responsive">
                    <table class="table table-striped table-bordered table-hover dataTables-example" >
                    <thead>
                    <tr>
                        <th>No</th>
                        <th>No Barang</th>
                        <th>Nama Barang</th>
                        <th>Jenis Barang</th>
                        <th>Tanggal Masuk</th>
                        <th>Keterangan</th>
                        <th>Jumlah</th>
                        <th>Action</th>
                    </tr>
                    </thead>
                    <tbody>
                    <?php
                    $no = 1;
                    foreach ($data as $logistik) { ?>
                        <tr>
                            <td><?php echo $no++ ;?></td>
                            <td><?php echo $logistik['no_barang']; ?> </td>
                            <td><?php echo $logistik['nama_barang']; ?></td> 
                            <td> <?php echo $logistik['macam_barang']; ?> </td>
                            <td> <?php echo $logistik['tanggal_barang']; ?> </td>
                            <td> <?php echo $logistik['keterangan']; ?> </td>
                            <td> <?php echo $logistik['jumlah']; ?> </td>
                            <td> 
                            <a href="<?php echo base_url()."index.php/logistik/edit_data/".$logistik['no_barang']; ?>"><button class="btn btn-primary" >Edit</button></a>
                            <a href="<?php echo base_url()."index.php/logistik/delete_data/".$logistik['no_barang']; ?>"><button class="btn btn-warning">Delete</button></a>
                            </td>
                            
                         </tr>
                      <?php } ?>
                
                    </tfoot>
                    </table>
                        </div>

                    </div>
                </div>
            </div>
            </div>
        </div>
 
