<?php
include "koneksi.php";
$id_tmp = $_GET['id_tmp'];
$sql = "DELETE FROM transaksi_tmp WHERE id_tmp='$id_tmp'";
$res = mysql_query($sql);

if ($res){
	echo "Berhasil hapus";
	header("Location: ../menu_transaksi.php");
}else{
	echo "Gagal hapus";
}
?>