<?php
include "koneksi.php";
	$id = $_GET['id'];
	$sql = "DELETE FROM tabel_pasien WHERE nik=$id";
	$res = mysql_query($sql);

	if ($res){
		echo "Berhasil hapus";
		header("Location: ../menu_pasien.php");
	}else{
		echo "Gagal hapus";
	}
?>