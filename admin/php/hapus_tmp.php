<?php
include "koneksi.php";
$id_transaksi = $_GET['id_transaksi'];
$sql = "DELETE FROM transaksi_tmp WHERE id_transaksi='$id_transaksi'";
$res = mysql_query($sql);

if ($res){
	echo "Berhasil hapus";
	header("Location: ../menu_transaksi.php");
}else{
	echo "Gagal hapus";
}
?>