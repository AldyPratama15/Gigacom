<?php
include "koneksi.php";
$nama = $_GET['nama'];
$sql = "DELETE FROM kategori WHERE nama='$nama'";
$res = mysql_query($sql);

if ($res){
	echo "Berhasil hapus";
	header("Location: ../kategori_admin.php");
}else{
	echo "Gagal hapus";
}
?>