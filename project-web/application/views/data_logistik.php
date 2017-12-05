<?php 
defined('BASEPATH') OR exit('No direct script access allowed');
  ?>

<!DOCTYPE html>
<html>
<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Data Logistic</title>

    <link href="<?php  echo base_url('assets/css/bootstrap.min.css') ?>" rel="stylesheet">
    <link href="<?php  echo base_url('assets/font-awesome/css/font-awesome.css') ?>" rel="stylesheet">

    <link href="<?php  echo base_url('assets/css/plugins/dataTables/datatables.min.css') ?>" rel="stylesheet">

    <link href="<?php  echo base_url('assets/css/animate.css') ?>" rel="stylesheet">
    <link href="<?php  echo base_url('assets/css/style.css') ?>" rel="stylesheet">

</head>

<body>

    <div id="wrapper">

    <nav class="navbar-default navbar-static-side" role="navigation">
        <div class="sidebar-collapse">
            <ul class="nav metismenu" id="side-menu">
                <li class="nav-header">
                    <div class="dropdown profile-element"> <span>
                            <img alt="image" class="img-circle" src="<?php  echo base_url('assets/img/profile_small.jpg')?>" />
                             </span>
                        <a data-toggle="dropdown" class="dropdown-toggle" href="#">
                            <span class="clear"> <span class="block m-t-xs"> <strong class="font-bold">Naufaldi Rafif</strong>
                             </span> <span class="text-muted text-xs block">Admin Logistik </span> </span> </a>
                    </div>
                    <div class="logo-element">
                        IN+
                    </div>
                </li>

                <li class="active">
                    <a href="<?php echo base_url()."index.php/logistik/";?>"><i class="fa fa-archive"></i> <span class="nav-label">List Data</span></a>
                </li>
                <li>
                    <a href="<?php echo base_url()."index.php/logistik/add_data";?>"><i class="fa fa-pencil"></i> <span class="nav-label">Tambah Data</span></a>
                </li>

            </ul>

        </div>
    </nav>

        <div id="page-wrapper" class="gray-bg">
        <div class="row border-bottom">
        <nav class="navbar navbar-static-top" role="navigation" style="margin-bottom: 0">
        <div class="navbar-header">
            <a class="navbar-minimalize minimalize-styl-2 btn btn-primary " href="#"><i class="fa fa-bars"></i> </a>
            <form role="search" class="navbar-form-custom" action="search_results.html">
                <div class="form-group">
                    <input type="text" placeholder="Search for something..." class="form-control" name="top-search" id="top-search">
                </div>
            </form>
        </div>
            <ul class="nav navbar-top-links navbar-right">
                <li>
                    <span class="m-r-sm text-muted welcome-message">Welcome to Logistic Admin Template.</span>
                </li>
                <li>
                    <a href="login.html">
                        <i class="fa fa-sign-out"></i> Log out
                    </a>
                </li>
            </ul>

        </nav>
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
                            <strong>List Data</strong>
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
                            <td> <?php echo $logistik['jenis_barang']; ?> </td>
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
        <div class="footer">
            
            <div>
                <strong>Copyright</strong> Batavia Hack Town &copy; 2014-2017
            </div>
        </div>

        </div>
        </div>



    <!-- Mainly scripts -->
    <script src="<?php  echo base_url('assets/js/jquery-3.1.1.min.js')?>"></script>
    <script src="<?php  echo base_url('assets/js/bootstrap.min.js')?>"></script>
    <script src="<?php  echo base_url('assets/js/plugins/metisMenu/jquery.metisMenu.js')?>"></script>
    <script src="<?php  echo base_url('assets/"js/plugins/slimscroll/jquery.slimscroll.min.js')?>"></script>

    <script src="<?php  echo base_url('assets/js/plugins/dataTables/datatables.min.js')?>"></script>

    <!-- Custom and plugin javascript -->
    <script src="<?php  echo base_url('assets/js/inspinia.js')?>"></script>
    <script src="<?php  echo base_url('assets/js/plugins/pace/pace.min.js')?>"></script>

    <!-- Page-Level Scripts -->
    <script>
        $(document).ready(function(){
            $('.dataTables-example').DataTable({
                pageLength: 25,
                responsive: true,
                dom: '<"html5buttons"B>lTfgitp',
                buttons: [
            
                ]

            });

        });

    </script>

</body>

</html>
