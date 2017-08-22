<html>
<head>
	<title>Detail Buku</title>
	<link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="css/font-awesome.min.css">
	<style type="text/css">
		.panel-detail{
			height: 55%;
			margin-top:5%;
		}
		.panel-detail img{
			
		}
		.photo-cover{
			padding:3%;
			padding-right: 5%;
		}
		.narasi p{
			font-size: 16px;
		}
		.narasi button{
			width:100%;
		}
	</style>
</head>
<body>
<?php
session_start();
include('config.php');
$det = $_GET['detail'];
$_SESSION['detil'] = $det;
if (!isset($_SESSION['detil'])) {
		header("location:index.php");
}

if(@$_GET['detail']){
	$query = mysql_query("SELECT * FROM bujku where id_buku =".$_GET['detail']) or die (mysql_error());
	$detil = mysql_fetch_array($query);


}
?>
<div class="container">
	<div class="row">
		<div class="col-md-10 col-md-offset-1 row panel-detail">
			<div class="col-md-6 photo-cover">
				<center><img src="img/<?php echo $detil['cover']?>" style="width:70%;"></center>
			</div>
			<div class="col-md-4 narasi">
				<center><h2>"<?php echo $detil['nama_buku']?>"</h2><br></center>
				<p>
					<b><span class="fa fa-user"></span>&nbsp; :</b> <?php echo $detil['pengarang']?><br><br>
					<b><span class="fa fa-heartbeat"></span>&nbsp;:</b> <?php echo $detil['genre']?><br><br>
					<b><span class="fa fa-send-o"></span>&nbsp; :</b> <?php echo $detil['tahun_terbit']?><br><br>
					<b><span class="fa fa-money"></span>&nbsp; :</b> Rp. <?php echo $detil['harga']?>,- /buku<br><br>
					<b>Stok Buku :</b><?php echo $detil['stok']?><br>
				</p><br>
				<a href="beli.php?beli=<?php echo $detil['id_buku']?>"><button class="btn btn-warning">Beli Buku Ini</button></a><br><br>
				<a href="index.php"><button class="btn btn-primary">Kembali</button></a>
			</div>
		</div>
	</div>
</div>	
</body>

</html>