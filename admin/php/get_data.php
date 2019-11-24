<?php 
include('koneksi.php');
$id_barang=$_POST['id_barang'];
$query=mysql_query("select harga from inventori where id_barang=".$id_barang);
$fe=mysql_fetch_assoc($query);
$harga=$fe['harga'];
 
echo $harga;

 
?>