

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
                    <a href="<?php echo base_url('index.php/logistik/logout'); ?>">
                        <i class="fa fa-sign-out"></i> Log out
                    </a>
                </li>
            </ul>

        </nav>