<?php
include("config.php");
$judul = $_POST['judul_book'];
$jumlah = $_POST['jumlah_book'];
$namagan = $_POST['nama_agan'];
$alamat = $_POST['alamat_agan'];
$notel = $_POST['notel_agan'];
$via = $POST['via_agan'];
$total = $_POST['total_book'];
$limit = $_POST['batas_book'];
$kode = $_POST['kode_book'];
$sisa = $_POST['sisa_book'];

$query= mysql_query("INSERT INTO pesan VALUES(NULL,'$namagan','$judul','$jumlah','$alamat','$notel','$via','$limit','$total','$kode')");
mysql_query("UPDATE bujku SET stok = '$sisa' WHERE id_buku = '$kode'");

if($query){
	header('location:index.php?transaksi=berhasil');
}else{
	echo "Gagal beli";
}



?>