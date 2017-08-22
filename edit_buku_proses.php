<?php
include('config.php');
if(isset($_POST['update'])){
	$id = $_POST['id'];
	$judul = $_POST	['buku'];
	$harga = $_POST['harga'];
	$pengarang = $_POST['pengarang'];
	$terbit = $_POST['terbit'];
	$genre = $_POST['genre'];
	$stok = $_POST['stok'];

		$ekstensiboleh = array('png','jpg');
 		$foto = $_FILES['file']['name'];
 		$x = explode('.',$foto);
 		$ekstensi = strtolower(end($x));
 		$ukuran = $_FILES['file']['size'];
 		$file_tmp = $_FILES['file']['tmp_name'];

 		$move = move_uploaded_file($file_tmp,'img/'.$foto);
 		if($move){
 			$img = mysql_query("SELECT * FROM bujku WHERE id_buku = '$id'");
			if ($img === false){
				die(mysql_error());
			}else{
				$row = mysql_fetch_array($img);
				$hapusgambar = unlink("img/".$row['cover']);
 				$update = mysql_query("UPDATE bujku SET nama_buku = '$judul',pengarang = '$pengarang',harga = '$harga',tahun_terbit = '$terbit',genre = '$genre',cover = '$foto',stok = '$stok' WHERE id_buku = '$id'") or die (mysql_error());

				if ($update){
					header("location:admin_home.php");
					}else{
					echo "Data Gagal Di edit";
					}
			}
			

 			}else{
 				mysql_query("UPDATE bujku SET nama_buku = '$judul',pengarang = '$pengarang',harga = '$harga',tahun_terbit = '$terbit',genre = '$genre', stok = '$stok'WHERE id_buku = '$id'") or die (mysql_error());
 				header("location:admin_home.php");
 			}
		
	}	
?>