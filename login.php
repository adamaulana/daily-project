<?php
	session_start();
	if(@$_SESSION['login']){
		header("location:admin_home.php");
	}
?>
<!DOCTYPE html>
<html>
<head>
	<title>Login - BookStore</title>
	<link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="css/font-awesome.min.css">
	<link rel="stylesheet" type="text/css" href="css/animate.css">
	<link rel="stylesheet" type="text/css" href="css/font-awesome.min.css">
</head>
<style type="text/css">
	body{
		background-color: #fafafa
	}
	.logo-box{
		background-color: black;
		height:100%;
	}
	.panel-login-box{
		margin-top:7%;
		height:400px;
		/*box-shadow: 0 0 10px rgb(215, 215, 215);*/
		padding:0px;
	}
	.form-login{
		margin:0px;
		background-color:#ffffff;
		height: 100%;
		padding:20px;
	}
	.form-login form{
		margin-left: 13%;
		margin-right: 13%;
	}
	.form-login form button{
		background-color: black;
		color:white;
		background-color:black;
		width:100%;
		text-align: center;
		padding: 10px;
	}
</style>
<body>
<div class="panel-login row">
	<div class="col-md-offset-2 col-md-8 row panel-login-box">
		<div class="col-md-6 logo-box">
			<center>
				<img src="img/logo/logow.png" style="margin:15%; width:40%;">
			</center>
		</div>
		<div class="col-md-6 form-login" style="border-right:5px solid black;">
		<center>
		<h1>LOGIN ADMIN</h1><br>
			<form method="post" action="login-proses.php">
				
					<br>
					<label><span class="fa fa-user"></span>&nbsp;Username</label>
					<input type="text" name="username" class="form-control"><br>
					<label><span class="fa fa-hashtag"></span>&nbsp;Password</label>
					<input type="password" name="pass" class="form-control"><br>
					<button type="submit" name="masuk"><span class="fa fa-location-arrow"></span>&nbsp;Masuk</button>
				</center>
			</form>
		</div>
		
		<?php
			if(@$_GET['login'] == 'gagal'){
		?>	

			<div class="col-md-12">
				<br>
				<div class="alert alert-danger">
				<center><h4><span class="fa fa-warning"></span>&nbsp;Username dan Password Salah</h4></center>
				</div>	
			</div>
		<?php
			}

		?>
		
		
	</div>
</div>


<script type="text/javascript" src="js/jQuery-2.1.4.min.js"></script>
<script type="text/javascript" src="js/bootstrap.min.js"></script>
</body>
</html>