<?php
include "koneksi.php";

$id = $_GET['id'];

$sql = "DELETE FROM pegawai WHERE username='$id'";
$res = mysql_query($sql);
if ($res){
	$sql = "DELETE FROM user WHERE username='$id'";
	$res = mysql_query($sql);

	if ($res){
		echo "Berhasil hapus";
		header("Location: ../menu_pegawai.php");
	}else{
		echo "Gagal hapus";
	}
}else {
	
}

?>