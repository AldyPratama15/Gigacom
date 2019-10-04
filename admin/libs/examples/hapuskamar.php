<?php 
include 'koneksi.php';
$no = $_GET['no'];
mysql_query("DELETE FROM tabel_kamar WHERE no='$no'")or die(mysql_error());
 
header("location:user.php?pesan=hapus");
?>