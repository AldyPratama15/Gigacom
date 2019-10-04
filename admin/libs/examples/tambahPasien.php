<?php

if ( isset($_POST['tambahkan']) ){
	$conn = mysql_connect("localhost", "root", "");
	$db = mysql_select_db("rs");

	$nik = $_POST['nik'];
	$nama_pasien = $_POST['nama_pasien'];
	$no_asuransi = $_POST['no_asuransi'];
	$alamat = $_POST['alamat'];
	$tgl_lahir = $_POST['tgl_lahir'];
	$umur = $_POST['umur'];
	
	
	
	$sql = "INSERT INTO tabel_pasien(nik, nama_pasien, no_asuransi, alamat, tanggal_lahir, umur)".
	" VALUES ('$nik', '$nama_pasien', '$no_asuransi', '$alamat', '$tgl_lahir', '$umur')";

	$result = mysql_query($sql, $conn);

	if ($result){
		header("location:typography.php");
	}else {
		die ("Gagal");
	}

	mysql_close();
}

?>