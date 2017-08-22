
<!DOCTYPE html>
<html>
<head>
	<title>Book Store</title>
	<link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="css/font-awesome.min.css">

</head>
<style type="text/css">
	.boom{
		margin-top:6%;
	}
	.logo-box{
		font-size:280px;
		padding-right: 40px;
		color: black
		height:300px;
	}
	
	.panel-konfirm p{
		font-size: 18px;
	}
	.panel-konfirm button{
		width: 60%;
	}

</style>
<?php
	session_start();
	$confirm = $_POST['buy'];
	$_SESSION['konfirmasi'] = $confirm;
	if (!isset($_SESSION['konfirmasi'])) {
		header("location:index.php");
	}
	
	include('config.php');
	$tanggal = date('d-m-Y',strtotime("+5 days"));
	$nama = $_POST['nama_pembeli'];
	$alamat = $_POST['address'];
	$notel = $_POST['notel'];
	$via = $_POST['via'];
	$jmlh = $_POST['jumlah-beli'];
	$jdl = $_POST['jdl'];
	$kode = $_POST['kodew'];
	$tutal = $_POST['total'];
	$sisa = $_POST['sisa'];

?>
<body>
	<div class="container-fluid">
		<div class="row">
			<div class="col-md-10 col-md-offset-1 row boom">
				<div class="col-md-6 logo-box">
					<center>
						<span class="fa fa-shopping-cart"></span>
					</center>
				</div>
				<div class="col-md-6 panel-konfirm">
					<b><h2>Konfirmasi Pembelian Anda</h2></b>	<br>
					
					<p>
						<b>Judul Buku</b> :<?php echo "$jdl"; ?><br>
						<b>Jumlah Buku</b> : <?php echo "$jmlh"; ?> buku<br>
						<b>Nama Pembeli</b> : <?php echo "$nama"; ?><br>
						<b>Alamat</b> : <?php echo "$alamat"; ?><br>
						<b>Nomor Telepon : </b><?php echo "$notel"?><br>
						<b>Via Bayar</b> : <?php echo "$via"; ?><br>
						<b>Total Pembayaran </b> : <?php echo "$tutal"; ?><br>
						<b>Batas Pembayaran</b> : <?php echo "$tanggal"; ?><br>
						<small><i>*Jika pembayaran dilakukan lebih dari batas tanggal, maka pembelian dianggap hangus</i></small><br><br>
						<form method="post" action="beli_proses.php">
						<input type="hidden" name="judul_book" value="<?php echo "$jdl"?>">
						<input type="hidden" name="jumlah_book" value="<?php echo "$jmlh"?>">
						<input type="hidden" name="nama_agan" value="<?php echo "$nama"?>">
						<input type="hidden" name="alamat_agan" value="<?php echo "$alamat"?>">
						<input type="hidden" name="notel_agan" value="<?php echo "$notel"?>">
						<input type="hidden" name="via_agan" value="<?php echo "$via"?>">
						<input type="hidden" name="total_book" value="<?php echo "$tutal"?>">
						<input type="hidden" name="batas_book" value="<?php echo "$tanggal"?>">
						<input type="hidden" name="kode_book" value="<?php echo "$kode"?>">
						<input type="hidden" name="sisa_book" value="<?php echo "$sisa"?>">


						<button class="btn btn-primary" type="submit">Setuju dan Beli</button>
						</form><br>
						<a href="index.php"><button class="btn btn-danger">Batalkan</button></a>
						<br>

					</p>
					
				</div>
			</div>
			
		</div>
		<form>
			<input type="hidden" name="judul_buku">
		</form>
	</div>
</body>
<script type="text/javascript" src="js/jQuery-2.1.4.min.js"></script>
<script type="text/javascript" src="js/bootstrap.min.js"></script>
</body>
</html>