<?php

if ( isset($_POST['tambahkan']) ){
	
	$conn = mysql_connect("localhost", "root", "");
	$db = mysql_select_db("database");

	$id = $_POST['id'];
	$id_barang = $_POST['id_barang'];
	$stok = $_POST['stok'];
	$tanggal = $_POST['tanggal'];
	$id_pegawai = $_POST['id_pegawai'];
	
	$sql = "INSERT INTO inventori_masuk(id, id_barang, stok, tanggal, id_pegawai)".
	" VALUES ('$id', '$id_barang', '$stok', '$tanggal', '$id_pegawai')";

	$result = mysql_query($sql, $conn);

	if ($result){
		header("location:../supplai.php");
	}else {
		die ("Gagal");
	}

	mysql_close();
}

?>