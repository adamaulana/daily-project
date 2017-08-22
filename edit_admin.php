<!DOCTYPE html>
<!--
This is a starter template page. Use this page to start your new project from
scratch. This page gets rid of all links and provides the needed markup only.
-->
<html>
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Admin Toko Buku</title>
    <!-- Tell the browser to be responsive to screen width -->
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <!-- Bootstrap 3.3.5 -->
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="css/font-awesome.min.css">
    <link rel="stylesheet" type="text/css" href="css/component.css">
    <!-- Ionicons -->
    <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
    <!-- Theme style -->
    <link rel="stylesheet" href="css/AMDadmin.min.css">
    <!-- AdminLTE Skins. We have chosen the skin-blue for this starter
          page. However, you can choose any other skin. Make sure you
          apply the skin class to the body tag so the changes take effect.
    -->
    <link rel="stylesheet" href="css/skin-blue.min.css">

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
        <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
  </head>
  <body class="hold-transition skin-blue sidebar-mini">
    <div class="wrapper">

        <!-- Main Header -->
      <header class="main-header" style="position: fixed; width:100%;">

        <!-- Logo -->
        <a href="index2.html" class="logo" style="background-color:black; font-size:12px;">
          <!-- mini logo for sidebar mini 50x50 pixels -->
          <span class="logo-mini" style="font-size:10px;"><b></b></span>
          <!-- logo for regular state and mobile devices -->
          <span class="logo-lg"></span>
        </a>

        <!-- Header Navbar -->
        <nav class="navbar navbar-static-top" role="navigation" style="background-color:black; width: 100%; position: fixed;">
          <!-- Sidebar toggle button-->
          <a href="#" class="sidebar-toggle" data-toggle="offcanvas" role="button">
            <span class="sr-only">Toggle navigation</span>
          </a>
          <!-- Navbar Right Menu -->
        </nav>
      </header>
      <!-- Left side column. contains the logo and sidebar -->
      <aside class="main-sidebar" style="background-color:black; position: fixed;">

        <!-- sidebar: style can be found in sidebar.less -->
        <section class="sidebar">
          <div class="user-panel">
            <div class="pull-left image"">
              <img src="img/logo/logow.png">
            </div>
            <div class="pull-left info">
              <center><h4><b>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;AMD</b></h4>
              <small>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Book Store</small></center>
            </div>
          </div>
          

          <!-- Sidebar Menu -->
          <ul class="sidebar-menu">
            <li class="header" style="color:white;">Admin : <?php echo $_SESSION['login']?></li>
            <!-- Optionally, you can add icons to the links -->
            <li class="active"><a href="admin_home.php"><i class="fa fa-home"></i> <span>Data Buku</span></a></li>
            <li><a href="data_admin.php"><i class="fa fa-user"></i> <span>Admin</span></a></li>
            <li><a href="order.php"><i class="fa fa-ticket"></i> <span>Order</span></a></li>
            <li><a href="logout.php"><i class="fa fa-sign-out"></i> <span>Log Out</span></a></li>

          </ul><!-- /.sidebar-menu -->
        </section>
        <!-- /.sidebar -->
      </aside>

      <!-- Content Wrapper. Contains page content -->
      <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
          <h1>
            Book Store
          </h1>
          <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Level</a></li>
            <li class="active">Here</li>
          </ol>
        </section>
        <?php
        include('config.php');
          $id = $_GET['id'];
          $show = mysql_query("SELECT * FROM admin WHERE id_admin=".$_GET['id']);
          if(mysql_num_rows($show) == 0){

          }else{
            $data = mysql_fetch_array($show);
          }

        ?>
        <div class="box box-default">
        <div class="row">
        <br><br>
          <div class="box-body col-md-6 col-md-offset-3">

            <center><h3>Edit Akun Admin</h3></center>
            <form method="post" action="edit_admin_proses.php">
            <input type="hidden" name="id" value="<?php echo $data['id_admin']?>">
            <label>Nama Admin</label>
            <input type="text" name="uss" class="form-control" value="<?php echo $data['nama_admin']?>"><br>
            <label>Password</label>
            <input type="text" name="pass" class="form-control" value="<?php echo $data['password']?>"><br><br>
            <center><button class="btn btn-primary" type="submit" name="update" style="width:80%">Simpan</button><br><br></center>
            </form>
            <center><a href="data_admin.php"><button class="btn btn-danger" style="width:80%">Batal</button></center></a>  
            <br><br>
          </div>
        </div>
        </div>
        

        <!-- Main content -->
        <section class="content">
        
        </section><!-- /.content -->
      </div><!-- /.content-wrapper -->

      <!-- Main Footer -->
      <footer class="main-footer">
        <!-- To the right -->
        <div class="pull-right hidden-xs">
          Temukan Hal Menarik Lain
        </div>
        <!-- Default to the left -->
        <strong>Copyright &copy; 2016 <a href="#">RPL 6th</a>.</strong> All rights reserved.
      </footer>
            
      </aside><!-- /.control-sidebar -->
      <!-- Add the sidebar's background. This div must be placed
           immediately after the control sidebar -->
      <div class="control-sidebar-bg"></div>
    </div><!-- ./wrapper -->

    <!-- REQUIRED JS SCRIPTS -->

    <!-- jQuery 2.1.4 -->
    <script src="js/jQuery-2.1.4.min.js"></script>
    <!-- Bootstrap 3.3.5 -->
    <script src="js/bootstrap.min.js"></script>
    <!-- AdminLTE App -->
    <script src="js/app.min.js"></script>

    <!-- Optionally, you can add Slimscroll and FastClick plugins.
         Both of these plugins are recommended to enhance the
         user experience. Slimscroll is required when using the
         fixed layout. -->
  </body>
</html>
