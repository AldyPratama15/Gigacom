<?php

if ( isset($_POST['tambahkan']) ){
	$conn = mysql_connect("localhost", "root", "");
	$db = mysql_select_db("database");

	$nama = $_POST['nama'];
	
	
	$sql = "INSERT INTO kategori(nama)".
	" VALUE ('$nama')";

	$result = mysql_query($sql, $conn);

	if ($result){
		header("location:../kategori_admin.php");
	}else {
		die ("Gagal");
	}

	mysql_close();
}

?>