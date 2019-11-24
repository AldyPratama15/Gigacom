<?php
include "koneksi.php";

if ( isset($_POST['idba']) ){
	$noka = $_POST['idba'];

	$res = mysql_query("SELECT harga FROM inventori WHERE id_barang = 'idba'");
	while ( $row = mysql_fetch_assoc($res) ){
		echo $row['harga'];
	}

	mysql_close();
}
?>