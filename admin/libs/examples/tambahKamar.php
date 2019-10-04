<?php

if ( isset($_POST['tambahkan']) ){
	$conn = mysql_connect("localhost", "root", "");
	$db = mysql_select_db("rs");

	$no = $_POST['no'];
	$kelas = $_POST['kelas'];
	
	$jumlah = $_POST['jumlah'];
	$biaya = $_POST['biaya'];
	
	
	
	$sql = "INSERT INTO tabel_kamar(no, kelas, jumlah,tersedia, biaya)".
	" VALUES ('$no', '$kelas', '$jumlah','$tersedia', '$biaya')";

	$result = mysql_query($sql, $conn);

	if ($result){
		header("location:user.php");
	}else {
		die ("Gagal");
	}

	mysql_close();
}

?>