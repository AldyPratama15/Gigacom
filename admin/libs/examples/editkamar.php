<?php
//include('dbconnected.php');
include('koneksi.php');

$no = $_GET['no'];
    $kelas = $_GET['kelas'];
	$jumlah = $_GET['jumlah'];
	$tersedia = $_GET['tersedia'];
	$biaya = $_GET['biaya'];

//query update

mysql_query("UPDATE tabel_kamar SET kelas='$kelas', jumlah='$jumlah',tersedia='$tersedia', biaya='$biaya' WHERE no='$no'");
 
header("location:user.php?pesan=update");
?>

