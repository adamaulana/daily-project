<!DOCTYPE html>
<html>
<head>
	<title>Book Store</title>
	<link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="css/font-awesome.min.css">

</head>
<style type="text/css">
	body{
		background-color: rgb(255, 255, 255);
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
		position:absolute;
		left:0px;
		right:0px;
		margin:auto;
		top:10%;
		width:70%;
		min-height: 300px;
		padding-bottom:30px;

	}

	.formulir{
		width:60%;
		margin-left:20%;
	}

	.input-group{
		width:100%;
	}
	.dangerous{
		width:100%;
		text-align: center;
		color:white;
		background-color:rgb(256, 96, 69);
		padding: 6px;
		border:4px solid rgb(204, 76, 51);
		margin:10px;
	}

	

</style>
<body>
<?php
include 'config.php';
$beli = $_GET['beli'];
$_SESSION['buy'] = $beli;
if (!isset($_SESSION['buy'])) {
		header("location:index.php");
}
if(@$_GET['beli']){
	$query = mysql_query("SELECT * FROM bujku where id_buku=".$beli);
	$data = mysql_fetch_array($query);
}
?>
	<div class="konten">
		<center><img src="img/<?php echo $data['cover']?>" style="width:30%;"></center>
		<center><h3>"<?php echo $data['nama_buku']?>"</h3> <h3>Rp.<span id="harga-awal"><?php echo $data['harga']?></span>,-</h3></center>
		
		<div class="formulir">

		<form action="beli_confirm.php" method="post">
			<input type="hidden" name="kodew" value="<?php echo $data['id_buku']?>">
			<input type="hidden" name="jdl" value="<?php echo $data['nama_buku']; ?>">
			<div class="input-group">
			<span class="input-group-btn"><button class="btn btn-danger"><span class="fa fa-user"></span>&nbsp;Nama Anda</button></span>
			<input type="text" name="nama_pembeli" class="form-control">
		</div><br>
		
		
		<div class="input-group">
			<span class="input-group-btn"><button class="btn btn-danger"><span class="fa fa-map-marker"></span>&nbsp;Alamat</button></span>
			<input type="text" name="address" class="form-control">
		</div><br>

		<div class="input-group">
			<span class="input-group-btn"><button class="btn btn-danger"><span class="fa fa-phone"></span>&nbsp;Nomor Telepon</button></span>
			<input type="text" name="notel" class="form-control">
		</div><br>

		<div class="input-group">
			<span class="input-group-btn"><button class="btn btn-danger"><span class="fa fa-money"></span>&nbsp;Via Bayar</button></span>
			<select class="form-control" name="via">
				<option>ATM</option>
				<option>Indomart</option>
				<option>Alfamart</option>
				<option>Kartu Kredit</option>
				<option>POS</option>
			</select>
		</div><br>
		
		
		<div class="input-group">
			<span class="input-group-btn"><button class="btn btn-danger"><span class="fa fa-book"></span>&nbsp;Jumlah Buku</button></span>

			<input type="number" class="form-control" name="jumlah-beli" id="harga-beli"
			>
			<input type="hidden" class="form-control" id="harga-stok" value="<?php echo $data['stok']?>">
			<input type="hidden" class="form-control" id="stok-hidden" name="sisa">
			<input type="hidden" name="total" class="form-control" id="total-hidden">
		</div><br>
		
		<h4>Harga Total = Rp. <span id="harga-total"></span>,-</h4> 

		<h4>Sisa Stok = <span id="stok"><?php echo $data['stok']?></span></h4>
		<div class="dangerous">
			<h4>Maaf Stok Tidak Mencukupi</h4>
		</div>
		<button class="btn btn-success tumbul-beli" type="submit" name="buy">&nbsp;&nbsp;&nbsp;&nbsp;<span class="fa fa-money"></span>&nbsp;Beli&nbsp;&nbsp;&nbsp;&nbsp;</button>
		</form><br>
		<a href="index.php"><button class="btn btn-danger"><span class="fa fa-arrow-left"></span>&nbsp;Batal</button></a>
		</div>	
		
	</div>
</body>
<script type="text/javascript" src="js/jQuery-2.1.4.min.js"></script>
<script type="text/javascript" src="js/bootstrap.min.js"></script>
<script type="text/javascript">


	$(document).ready(function(){
		$("#harga-beli").bind('input',function(){
			var hargaawal = parseInt($("#harga-awal").text());
			var jumlah = parseInt($("#harga-beli").val());
			
			hasil = hargaawal * jumlah;
			if ($('#harga-beli').val()=="") {
				hasil = 0;
			}

			$("#harga-total").text(hasil);
			$("#total-hidden").val(hasil);
		});
		$('#harga-beli').change(function(){
			if ($('#harga-beli').val() <'2') {
				$('#harga-beli').val('1');
			}
		});
		$(".dangerous").hide();
		$("#harga-beli").bind('input',function(){
			var hargastok = parseInt($("#harga-stok").val());
			var jumlah = parseInt($("#harga-beli").val());
			
			hasile = hargastok - jumlah;
			if ($('#harga-beli').val()=="") {
				hasile = hargastok;
			}

			$("#stok-hidden").val(hasile);
			$("#stok").text(hasile);
			if(hargastok < jumlah){
				$(".tumbul-beli").fadeOut();
				$(".dangerous").fadeIn();
				$("#stok").text('0');
			}
			else {
				$(".tumbul-beli").fadeIn();
				$(".dangerous").fadeOut();
			}
		});
	});
</script>
</body>
</html>