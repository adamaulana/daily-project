
<!DOCTYPE html>
<html>
<head>
	<title>Book Store</title>
	<link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="css/font-awesome.min.css">
	<link rel="stylesheet" type="text/css" href="css/animate.css">

</head>
<style type="text/css">
	body{
		background-color: rgb(245, 245, 245);
		padding: 0px;
		margin: 0px;
	}
	.hider{
		position: fixed;
		left:0px;
		right:0px;
		top:0px;
		width:100%;
		min-height:80px;
		background-color: #ffffff;
		box-shadow: 0 2px 5px rgb(215, 215, 215);
		z-index: 1000;
	}
	.book-box{
		background-color: #ffffff;
		height:100%;
		width:100%;
		box-shadow: 0 0 10px rgb(215, 215, 215);
		padding:10px;

	}
	.picture-box{
		width:100%;
		height:300px;
		overflow:hidden;
	}
	.picture-box img{
		width: 100%;
	}
	.book-body{
		min-height: 450px;
		padding:10px;
	}
	.konten{
		position: relative;
		top:70px;
		padding: 20px;

	}
	.hider img{
		width:40px;
		margin:10px;
	}
	.notif-berhasil{
		width:40%;
		height:30%;
		background-color: rgb(56, 187, 107);
		position: fixed;
		right:0px;bottom:10px;
		
	}
	.logo-trans span{
		font-size:150px;
		color: white;
		padding:2%;
	}

</style>
<body>
	<div class="hider">
		<div class="col-md-1">
		<center><a href="index.php"><img src="img/logo/logo.png"></a></center>
		</div>
		<div class=" col-md-5">
		<form method="post">
			<div class="input-group" style="margin-top:20px;">
            <input type="text" name="cari" class="form-control" placeholder="Cari nama buku.....">
            	<span class="input-group-btn">
              	<button class="btn btn-primary" name="search" type="submit"><span class="fa fa-search"></span></button>	
            	</span>
        	</div>
        </form>
        </div>
        <div class="col-md-offset-4 col-md-2">
        	<center><a href="login.php"><button class="btn btn-primary" style="margin:20px;">Log In Admin</button></a></center>
        </div>
	</div>
	<div class="row konten">

	<?php
	include ("config.php");
	session_start();

	if(isset($_POST['search'])){
		if($_POST['cari'] == ''){
				$kueri = mysql_query("SELECT * FROM bujku ORDER BY id_buku") or die (mysql_error());
				header("location:index.php");
			}else{
		$kueri = mysql_query("SELECT * FRoM bujku WHERE nama_buku LIKE '%".$_POST['cari']."%'") or die (mysql_error());
			header("location:index.php");

		}
	}else{
		$kueri = mysql_query("SELECT * FROM bujku ORDER BY id_buku") or die (mysql_error());
	}

		if (mysql_num_rows($kueri) == 0){
			echo "tidak ada data";
		}else{
			while ($data = mysql_fetch_array($kueri)) {
	?>
		<div class="col-md-3 col-sm-6 col-xs-12 book-body animated fadeInDown">
			<div class="book-box">
				<div class="picture-box">
					<img src="img/<?php echo $data['cover']?>">
				</div>
				<center><h3>"<?php echo $data['nama_buku']?>"</h3></center>
				<center><h5><span class="fa fa-money"></span>&nbsp;<?php echo $data['harga']?></h5></center>
				<center><a href="beli.php?beli=<?php echo $data['id_buku']?>"><button class="btn btn-warning">&nbsp;&nbsp;&nbsp;Beli&nbsp;&nbsp;&nbsp;</button></a>&nbsp;
				<a href="detail_buku.php?detail=<?php echo $data['id_buku']?>"><button class="btn btn-primary">&nbsp;&nbsp;&nbsp;Detail&nbsp;&nbsp;&nbsp;</button></a></center>
			</div>
		</div>
	<?php
		}
	}
	?>		
	</div>
	<?php
		if (@$_GET['transaksi'] == 'berhasil') {
	?>
	<div class="notif-berhasil row animated fadeInUp">
		<div class="logo-trans col-md-3">
			<span class="fa fa-gift"></span>
		</div>
		<div class="col-md-8" style="color: white;"><br><br>
			<center><h4><b>Terima Kasih Telah Membeli</b><br>
			<small style="color: white;">Segera lakukan pembayaran agar buku cepat terkirim</small>
			</h4>
			<button class="btn btn-warning"  id="diss" style="width: 60%;">OK</button>
			</center>
		</div>
	</div>

	<?php
		}
	?>

<script type="text/javascript" src="js/jQuery-2.1.4.min.js"></script>
<script type="text/javascript" src="js/bootstrap.min.js"></script>
<script type="text/javascript">
	$(document).ready(function(){
		$("#diss").click(function(){
			$(".notif-berhasil").removeClass('slideInRight');
			$(".notif-berhasil").addClass('fadeOutDown');
		});
	});
</script>
</body>
</html>