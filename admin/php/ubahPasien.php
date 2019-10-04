<?php

if ( isset($_POST['ubahdata']) ){
	include "koneksi.php";
	$nik_awal = $_POST['nik_awal'];
	$nik = $_POST['nik'];
	$nama_pasien = $_POST['nama_pasien'];
	$no_asuransi = $_POST['no_asuransi'];
	$alamat = $_POST['alamat'];
	$tanggal_lahir = $_POST['tanggal_lahir'];
	$umur = $_POST['umur'];

	$sql = "UPDATE tabel_pasien SET nik='$nik', nama_pasien='$nama_pasien', no_asuransi='$no_asuransi', alamat='$alamat', tanggal_lahir='$tanggal_lahir', umur=$umur WHERE nik = $nik_awal";
	$res = mysql_query($sql);
	if ($res){
		echo "Berhasil ubah";
		header("location:../menu_pasien.php");
	}else {
		echo "gagal ubah";
		header("location:../menu_pasien.php");
	}
}
?>