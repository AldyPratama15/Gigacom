<?php

if ( isset($_POST['tambahkan']) ){

	$conn = mysql_connect("localhost", "root", "");
	$db = mysql_select_db("rawat_inap");

	$no_kamar = $_POST['id_kamar'];

	// Lihat jumlah_tersedia dahulu
	$res = mysql_query("SELECT unit_tersedia FROM tabel_kamar WHERE no_kamar='$no_kamar'");
	while($row = mysql_fetch_assoc($res)){
		$unit_tersedia = $row['unit_tersedia'];
	}

	// Cek apakah sudah kosong
	if ($unit_tersedia == 0) {

		// Jika sudah kosong
		echo "<script>alert('Unit tersedia = 0');</script>";
		echo "<a href='../menu_transaksi.php'>Kembali</a>";
		
	}else{

		// Lanjutkan update
		$res = mysql_query("UPDATE tabel_kamar SET unit_tersedia=$unit_tersedia-1 WHERE no_kamar='$no_kamar'");

		if ($res) {
			$id_transaksi = $_POST['id_transaksi'];
			$id_pegawai = $_POST['id_pegawai'];
			$id_pasien = $_POST['id_pasien'];
			$id_kamar = $_POST['id_kamar'];
			$tanggal_masuk = $_POST['tgl_masuk'];

			$sql = "INSERT INTO tabel_transaksi(id_transaksi, id_pegawai, id_pasien, id_kamar, tanggal_masuk, tanggal_keluar, biaya)".
			" VALUES ('$id_transaksi', '$id_pegawai', '$id_pasien', '$id_kamar', '$tanggal_masuk', NULL, 0)";

			$res = mysql_query($sql, $conn);

			if ($res){
				echo "<script>alert('Sukses!');</script>";
				header("location:../menu_transaksi.php");
			}else {
				die ("gagal");
				echo "<a href='../menu_transaksi.php'>Kembali</a>";
			}
		}else{
			echo "<script>alert('Gagal kurangi stok kamar!');</script>";
			echo "<a href='../menu_transaksi.php'>Kembali</a>";
		}
	}
	mysql_close();
}

?>