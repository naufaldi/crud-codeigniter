<!DOCTYPE html>
<html>

<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Logistik | Login </title>

    <link href="<?php  echo base_url('assets/css/bootstrap.min.css')?>" rel="stylesheet">
    <link href="<?php  echo base_url('assets/font-awesome/css/font-awesome.css')?>" rel="stylesheet">

    <link href="<?php  echo base_url('assets/css/animate.css')?>" rel="stylesheet">
    <link href="<?php  echo base_url('assets/css/style.css')?>" rel="stylesheet">

</head>

<body class="gray-bg">

    <div class="loginColumns animated fadeInDown">
        <div class="row">

            <div class="col-md-6">
                <h2 class="font-bold">Welcome to Logistik</h2>

                <p>
                   Logistik is place for you to manage your logistik since its come with new feature
                </p>

            </div>
            <div class="col-md-6">
                <div class="ibox-content">
                    <form class="m-t" role="form" action="<?php echo base_url('index.php/login/proses'); ?>" method="post">
                            <?php if (validation_errors() || $this->session->flashdata('result_login')) { ?> 
                                    <div class="alert alert-danger animated fadeInDown" role="alert">
                                        <button type="button" class="close" data-dismiss="alert">&times;</button>
                                        <strong>Peringatan!</strong>
                                        <?php echo validation_errors(); ?>
                                        <?php echo $this->session->flashdata('result_login'); ?>
                                    </div>
                            <?php } ?>
                        <div class="form-group">
                            <input type="text" class="form-control" placeholder="Username" required="" name="username">
                        </div>
                        <div class="form-group">
                            <input type="password" class="form-control" placeholder="Password" required="" name="password">
                        </div>
                        <button type="submit" class="btn btn-primary block full-width m-b">Login</button>
                    </form>
                    <p class="m-t">
                        <small>Logistik Admin Panel &copy; 2017</small>
                    </p>
                </div>
            </div>
        </div>
        <hr/>
        <div class="row">
            <div class="col-md-6">
                Copyright Batavia Hack Town
            </div>
            <div class="col-md-6 text-right">
               <small>© 2017</small>
            </div>
        </div>
    </div>
<!-- jQuery 2.2.3 -->
<script src="<?php echo base_url('assets/js/plugins/jquery-2.1.1.min.js')?>"></script>
<!-- Bootstrap 3.3.6 -->
<script src="<?php echo base_url('assets/js/bootstrap/bootstrap.min.js')?>"></script>

</body>

</html>
