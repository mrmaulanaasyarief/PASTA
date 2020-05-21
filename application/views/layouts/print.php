<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <title>Pasta</title>
        <!-- Tell the browser to be responsive to screen width -->
        <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
        <!-- Bootstrap 3.3.6 -->
        <link rel="stylesheet" href="<?php echo site_url('resources/css/bootstrap.min.css');?>">
        <!-- Font Awesome -->
        <link rel="stylesheet" href="<?php echo site_url('resources/css/font-awesome.min.css');?>">
        <!-- Ionicons -->
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/ionicons/2.0.1/css/ionicons.min.css">
        <!-- DataTables -->
        <link rel="stylesheet" href="<?php echo site_url('resources/datatables/dataTables.bootstrap.css');?>">
        <!-- Datetimepicker -->
        <link rel="stylesheet" href="<?php echo site_url('resources/css/bootstrap-datetimepicker.min.css');?>">
        <!-- Theme style -->
        <link rel="stylesheet" href="<?php echo site_url('resources/css/AdminLTE.min.css');?>">
        <!-- AdminLTE Skins. Choose a skin from the css/skins
             folder instead of downloading all of them to reduce the load. -->
        <link rel="stylesheet" href="<?php echo site_url('resources/css/_all-skins.min.css');?>">
    </head>
    
    <body onload="window.print();" class="hold-transition skin-blue layout-top-nav">
    <div class="wrapper">

    <header class="main-header">
    <nav class="navbar navbar-static-top">
        <div class="container">
        <div class="navbar-header">
            <a href="<?php echo site_url('home/index');?>" class="navbar-brand"><b>PASTA</b></a>
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar-collapse">
            <i class="fa fa-bars"></i>
            </button>
        </div>

        <!-- Collect the nav links, forms, and other content for toggling -->
        <div class="collapse navbar-collapse pull-left" id="navbar-collapse">
            <ul class="nav navbar-nav">
                <li><a href="<?php echo site_url('home/index');?>">Home <span class="sr-only">(current)</span></a></li>
                <li><a href="<?php echo site_url('home/info_harga');?>">Daftar Harga</a></li>
                <li><a href="<?php echo site_url('home/pesan/'.$this->session->userdata('user_id'));?>">PESAN SEKARANG</a></li>
            </ul>
        </div>
        <!-- /.navbar-collapse -->
        <!-- Navbar Right Menu -->
        <?php if($this->session->userdata('user_id')){?>
        <div class="navbar-custom-menu">
            <ul class="nav navbar-nav">
            <!-- Messages: style can be found in dropdown.less-->
            <li class="dropdown messages-menu">
                <!-- Menu toggle button -->
                <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                <i class="fa fa-shopping-cart"></i>
                <span class="label label-success">4</span>
                </a>
                <ul class="dropdown-menu">
                <li class="header">You have 4 messages</li>
                <li>
                    <!-- inner menu: contains the messages -->
                    <ul class="menu">
                    <li><!-- start message -->
                        <a href="#">
                        <div class="pull-left">
                            <!-- User Image -->
                            <img src="<?php echo site_url('resources/img/user2-160x160.jpg');?>" class="img-circle" alt="User Image">
                        </div>
                        <!-- Message title and timestamp -->
                        <h4>
                            Support Team
                            <small><i class="fa fa-clock-o"></i> 5 mins</small>
                        </h4>
                        <!-- The message -->
                        <p>Why not buy a new awesome theme?</p>
                        </a>
                    </li>
                    <!-- end message -->
                    </ul>
                    <!-- /.menu -->
                </li>
                <li class="footer"><a href="#">See All Messages</a></li>
                </ul>
            </li>
            <!-- /.messages-menu -->

            <!-- Notifications Menu -->
            <li class="dropdown notifications-menu">
                <!-- Menu toggle button -->
                <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                <i class="fa fa-credit-card"></i>
                <span class="label label-warning">10</span>
                </a>
                <ul class="dropdown-menu">
                <li class="header">You have 10 notifications</li>
                <li>
                    <!-- Inner Menu: contains the notifications -->
                    <ul class="menu">
                    <li><!-- start notification -->
                        <a href="#">
                        <i class="fa fa-users text-aqua"></i> 5 new members joined today
                        </a>
                    </li>
                    <!-- end notification -->
                    </ul>
                </li>
                <li class="footer"><a href="#">View all</a></li>
                </ul>
            </li>
            <!-- Tasks Menu -->
            <li class="dropdown tasks-menu">
                <!-- Menu Toggle Button -->
                <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                <i class="fa fa-envelope"></i>
                <span class="label label-danger">9</span>
                </a>
                <ul class="dropdown-menu">
                <li class="header">You have 9 tasks</li>
                <li>
                    <!-- Inner menu: contains the tasks -->
                    <ul class="menu">
                    <li><!-- Task item -->
                        <a href="#">
                        <!-- Task title and progress text -->
                        <h3>
                            Design some buttons
                            <small class="pull-right">20%</small>
                        </h3>
                        <!-- The progress bar -->
                        <div class="progress xs">
                            <!-- Change the css width attribute to simulate progress -->
                            <div class="progress-bar progress-bar-aqua" style="width: 20%" role="progressbar" aria-valuenow="20" aria-valuemin="0" aria-valuemax="100">
                            <span class="sr-only">20% Complete</span>
                            </div>
                        </div>
                        </a>
                    </li>
                    <!-- end task item -->
                    </ul>
                </li>
                <li class="footer">
                    <a href="#">View all tasks</a>
                </li>
                </ul>
            </li>
            <!-- User Account Menu -->
            <li class="dropdown user user-menu">
                <!-- Menu Toggle Button -->
                <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                <!-- The user image in the navbar-->
                <img src="<?php echo site_url('resources/img/user2-160x160.jpg');?>" class="user-image" alt="User Image">
                <!-- hidden-xs hides the username on small devices so only the image appears. -->
                <span class="hidden-xs"><?=$this->session->userdata('user_name')?></span>
                </a>
                <ul class="dropdown-menu">
                <!-- The user image in the menu -->
                <li class="user-header">
                    <img src="<?php echo site_url('resources/img/user2-160x160.jpg');?>" class="img-circle" alt="User Image">

                    <p>
                    <?=$this->session->userdata('user_name')?>
                    </p>
                </li>
                <!-- Menu Footer-->
                <li class="user-footer">
                    <div class="pull-left">
                    <a href="#" class="btn btn-default btn-flat">Profile</a>
                    </div>
                    <div class="pull-right">
                    <a href="<?php echo base_url() ?>user/aksiLogoutUser" class="btn btn-default btn-flat">Sign out</a>
                    </div>
                </li>
                </ul>
            </li>
            </ul>
        </div>    
        <?php } ?>
        
        <!-- /.navbar-custom-menu -->
        </div>
        <!-- /.container-fluid -->
    </nav>
    </header>
    <!-- Full Width Column -->
    <div class="content-wrapper">
    <div class="container">
        <!-- Main content -->
        <section class="content">
            <?php                    
            if(isset($_view) && $_view)
                $this->load->view($_view);
            ?>                    
        </section>
        <!-- /.content -->
    </div>
    <!-- /.container -->
    </div>
    <!-- /.content-wrapper -->
    <footer class="main-footer">
    <div class="container">
        <strong>PASTA</a></strong>
    </div>
    <!-- /.container -->
    </footer>
    </div>
    <!-- ./wrapper -->

        <!-- jQuery 2.2.3 -->
        <script src="<?php echo site_url('resources/js/jquery-2.2.3.min.js');?>"></script>
        <!-- Bootstrap 3.3.6 -->
        <script src="<?php echo site_url('resources/js/bootstrap.min.js');?>"></script>
        <!-- DataTables -->
        <script src="<?php echo site_url('resources/datatables/jquery.dataTables.min.js');?>"></script>
        <script src="<?php echo site_url('resources/datatables/dataTables.bootstrap.min.js');?>"></script>
        <!-- SlimScroll -->
        <script src="<?php echo site_url('resources/slimScroll/jquery.slimscroll.min.js');?>"></script>
        <!-- FastClick -->
        <script src="<?php echo site_url('resources/js/fastclick.js');?>"></script>
        <!-- AdminLTE App -->
        <script src="<?php echo site_url('resources/js/app.min.js');?>"></script>
        <!-- AdminLTE for demo purposes -->
        <script src="<?php echo site_url('resources/js/demo.js');?>"></script>
        <!-- DatePicker -->
        <script src="<?php echo site_url('resources/js/moment.js');?>"></script>
        <script src="<?php echo site_url('resources/js/bootstrap-datetimepicker.min.js');?>"></script>
        <script src="<?php echo site_url('resources/js/global.js');?>"></script>
    </body>
</html>
