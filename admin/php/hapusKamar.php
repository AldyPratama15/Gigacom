<?php
include "koneksi.php";
$id = $_GET['id'];
$sql = "DELETE FROM tabel_kamar WHERE no_kamar='$id'";
$res = mysql_query($sql);

if ($res){
	echo "Berhasil hapus";
	header("Location: ../menu_kamar_admin.php");
}else{
	echo "Gagal hapus";
}
?>