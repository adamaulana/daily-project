<?php
  include('head.php');
?>
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
    <link rel="stylesheet" href="css/animate.css">
    
    <link rel="stylesheet" href="css/skin-blue.min.css">
    <style type="text/css">
      .cari-atas{
        padding-left:20px;
      }
    </style>
  </head>
  <body class="hold-transition skin-blue sidebar-mini">
    <div class="wrapper">

        <!-- Main Header -->
      <header class="main-header" style="position: fixed; width: 100%;">

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
            <li><a href="admin_home.php"><i class="fa fa-book"></i> <span>Data Buku</span></a></li>
            <li><a href="data_admin.php"><i class="fa fa-user"></i> <span>Admin</span></a></li>
            <li  class="active"><a href="order.php"><i class="fa fa-ticket"></i> <span>Order</span></a></li>
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
        
        <div class="box box-default">
          <div class="box-body">
          <br>
          <div class="row cari-atas">
              <div class="col-md-8">
                  <form method="post">
                      <div class="input-group" style="width:100%">
                        <input type="text" name="find" class="form-control" placeholder="Cari nama pembeli.....">
                        <span class="input-group-btn">
                          <button class="btn btn-danger" type="submit" name="postfind"><span class="fa fa-search"></span></button>
                        </span>
                      </div>
                    </form>
              </div>
              
            </div><br>
            <table class="table">
              <th>Nama Pembeli</th>
              <th>Alamat</th>
              <th>Judul Buku (jumlah)</th>
              <th>No. Telepon</th>
              <th>Batas Bayar</th>
              <th>Total Harga</th>
              <th width="5%">opsi</th>

              <?php
              include 'config.php';
              if(@$_GET['lunas']){
                mysql_query("DELETE FROM pesan WHERE id_pelangggan =".$_GET['lunas']);
              }
              if(@$_GET['hangus']){
                $pesan = mysql_query("SELECT * FROM pesan where id_pelangggan =".$_GET['hangus']) or die (mysql_error());
                $c = mysql_fetch_array($pesan);
                      $j = $c['jml_buku'];
                      $k = $c['kode_buku'];
                $kwer = mysql_query("SELECT * FROM bujku WHERE id_buku = $k") or die (mysql_error()); 
                $d =  mysql_fetch_array($kwer);
                  $stok = $d['stok'];
                  $stokakhir = $stok + $j;
                  $hangusgan = mysql_query("UPDATE bujku SET stok = $stokakhir WHERE id_buku = $k");
                  if($hangusgan){
                      mysql_query("DELETE FROM pesan WHERE id_pelangggan = ".$_GET['hangus']);
                  }
              }


            if(isset($_POST['postfind'])){
                if($_POST['find'] == ''){
                  $query = mysql_query("SELECT * FROM pesan") or die (mysql_error());
                }else{
                  $query = mysql_query("SELECT * FROM pesan WHERE nama_pembeli LIKE '%".$_POST['find']."%'") or die (mysql_error());
                      }
            }else{
                  $query = mysql_query("SELECT * FROM pesan") or die (mysql_error());
              }

                if(mysql_num_rows($query) == 0){
                  echo '<tr><td colspan="5"><center>Tidak Ada Data<center></td></tr>';
                }else{
                  while($b = mysql_fetch_array($query))
                  {
              ?>
                  <tr class="animated fadeIn">
                  <td><?php echo $b['nama_pembeli'];?></td>
                  <td><?php echo $b['alamat']?></td>
                  <td><?php echo $b['judul_buku']?>&nbsp;(<?php echo $b['jml_buku']?>)</td>
                  <td><?php echo $b['notel']?></td>
                  <td><?php echo $b['batas_bayar']?></td>
                  <td><?php echo $b['total_bayar']?></td>
                  <td>
                    <a href="?hangus=<?php echo $b['id_pelangggan']?>"><button class="btn btn-danger"><span class="fa fa-fire"></span>&nbsp;Hanguskan</button></a>
                    <a href="?lunas=<?php echo $b['id_pelangggan']?>"><button class="btn btn-success"><span class="fa fa-check-square-o"></span>&nbsp;Lunas</button></a>
                  </td>
                  </tr>
               <?php     
                  }
                }
              ?>
            </table>


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
