<?php
include "koneksi.php";
	$id = $_GET['id'];
	$sql = "DELETE FROM tabel_transaksi WHERE id_transaksi='$id'";
	$res = mysql_query($sql);

	if ($res){
		echo "Berhasil hapus";
		header("Location: ../menu_transaksi.php");
	}else{
		echo "Gagal hapus";
	}
?>