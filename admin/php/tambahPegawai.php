<?php
if ( isset($_POST['tambahkan'])){
	include "koneksi.php";
	$id_pegawai = $_POST['id_pegawai'];
	$nama = $_POST['nama'];
	$alamat = $_POST['alamat'];
	$telp = $_POST['telp'];
	$jabatan= $_POST['jabatan'];
	$username = $_POST['username'];
	$password = $_POST['password'];

	// Menambah user
	$sql1 = "INSERT INTO user(username, password, jabatan) VALUES ('$username', '$password', '$jabatan')";
	$res = mysql_query($sql1);
	if ($res) {
		// Menambahkan Pegawai
		$sql2 = "INSERT INTO pegawai(id_pegawai, nama, alamat, telp, username) VALUES ('$id_pegawai', '$nama', '$alamat', '$telp', '$username')";
		$res = mysql_query($sql2);
		if($res){
			echo "Berhasil";
			header("location:../menu_pegawai.php");
		}
	}
}
?>