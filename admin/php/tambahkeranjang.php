<?php

if ( isset($_POST['tambahkan']) ){

	$conn = mysql_connect("localhost", "root", "");
	$db = mysql_select_db("database");

	$id_barang = $_POST['id_barang'];
	$jumlah = $_POST['jumlah'];
	$stok = $_POST['stok'];
	// Lihat jumlah_tersedia dahulu
	$res = mysql_query("SELECT stok FROM inventori WHERE id_barang='$id_barang'");
	while($row = mysql_fetch_assoc($res)){
		$stok = $row['stok'];
	}

	// Cek apakah sudah kosong
	if ($stok <= 0) {

		// Jika sudah kosong
		echo "<script>alert('Stok = 0');</script>";
		echo "<a href='../menu_transaksi.php'>Kembali</a>";
		
	}else{

		// Lanjutkan update
		$res = mysql_query("UPDATE inventori SET stok=$stok-$jumlah WHERE id_barang='$id_barang'");

		if ($res) {
			$id_transaksi = $_POST['id_transaksi'];
			$id_pegawai = $_POST['id_pegawai'];
			$id_barang = $_POST['id_barang'];
			$harga = $_POST['harga'];
			$jumlah = $_POST['jumlah'];
			$total = $_POST['total'];
			$tanggal = $_POST['tanggal'];

			$sql = "INSERT INTO transaksi_tmp(id_transaksi, id_pegawai, id_barang, harga, jumlah, total, tanggal)".
			" VALUES ('$id_transaksi', '$id_pegawai', '$id_barang', '$harga', '$jumlah', '$total', '$tanggal')";

			$res = mysql_query($sql, $conn);

			if ($res){
				echo "<script>alert('Sukses!');</script>";
				header("location:../menu_transaksi.php");
			}else {
				die ("gagal");
				echo "<a href='../menu_transaksi.php'>Kembali</a>";
			}
		}else{
			echo "<script>alert('Gagal kurangi stok Barang!');</script>";
			echo "<a href='../menu_transaksi.php'>Kembali</a>";
		}
	}
	mysql_close();
}

?>