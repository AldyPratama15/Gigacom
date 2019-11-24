<?php

if ( isset($_POST['tambahkan']) ){
	$conn = mysql_connect("localhost", "root", "");
	$db = mysql_select_db("database");

	$id_barang = $_POST['id_barang'];
	$nama_barang = $_POST['nama_barang'];
	$nama = $_POST['nama'];
	$stok = $_POST['stok'];
	$harga = $_POST['harga'];
	
	$sql = "INSERT INTO inventori(id_barang, nama_barang, nama, stok, harga)".
	" VALUE ('$id_barang', '$nama_barang', '$nama', '$stok', '$harga')";

	$result = mysql_query($sql, $conn);

	if ($result){
		header("location:../inventori_admin.php");
	}else {
		die ("Gagal");
	}

	mysql_close();
}

?>