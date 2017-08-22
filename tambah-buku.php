<?php
include 'config.php';
 if(isset($_POST['add'])){
 	$nama = $_POST['nama-buku'];
 	$harga = $_POST['harga-buku'];
 	$pengarang = $_POST['pengarang'];
 	$tahun = $_POST['terbit'];
 	$genre = $_POST['genre'];
 	$stok = $_POST['stok'];

 	$ekstensiboleh = array('png','jpg');
 	$foto = $_FILES['file']['name'];
 	$x = explode('.',$foto);
 	$ekstensi = strtolower(end($x));
 	$ukuran = $_FILES['file']['size'];
 	$file_tmp = $_FILES['file']['tmp_name'];
 	if(in_array($ekstensi,$ekstensiboleh) === true){
 		move_uploaded_file($file_tmp,'img/'.$foto);
 		$query = mysql_query("INSERT INTO bujku VALUES (NULL,'$nama','$pengarang','$harga','$tahun','$genre','$foto','$stok')");
 		if($query){
 			header('location:admin_home.php');
 		}else{
 			echo "File gagal di upload";
 		}
 	}else{
 		echo 'ekstensi file tak didukung';
 	}
 }
?>