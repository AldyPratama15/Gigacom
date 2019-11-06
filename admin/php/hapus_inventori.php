<?php
include "koneksi.php";
$id = $_GET['id'];
$sql = "DELETE FROM inventori WHERE id_barang='$id'";
$res = mysql_query($sql);

if ($res){
	echo "Berhasil hapus";
	header("Location: ../inventori_admin.php");
}else{
	echo "Gagal hapus";
}
?>