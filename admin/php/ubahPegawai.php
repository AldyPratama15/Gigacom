<?php

if ( isset($_POST['ubahkan']) ){
	include "koneksi.php";
	
	$id_pegawai = $_POST['id_pegawai'];
	$nama = $_POST['nama'];
	$alamat = $_POST['alamat'];
	$telp = $_POST['telp'];
	

	$sql = "UPDATE pegawai SET nama='$nama', alamat='$alamat', telp='$telp' WHERE id_pegawai='$id_pegawai'";
	$res = mysql_query($sql);
	if ($res){
		echo "Berhasil ubah";
		header("location:../menu_pegawai.php");
	}else {
		echo "gagal ubah";
		header("location:../menu_pegawai.php");
	}
}
?>