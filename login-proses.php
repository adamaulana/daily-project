<?php
session_start();
include("config.php");
$uss = $_POST['username'];
$pass = $_POST['pass'];
$sql = "SELECT * FROM admin WHERE nama_admin = '".$uss."' AND password = '".$pass."';";
$query = mysql_query($sql) or die (mysql_error());
if(mysql_num_rows($query) == 0 ){
header("location:login.php?login=gagal");
}else{
header("location:admin_home.php");
$_SESSION['login'] = $uss;
}
?>