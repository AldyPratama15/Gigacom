<?php
session_start();

if ( isset($_POST['bayar']) ){

	$conn = mysql_connect("localhost", "root", "");
	$db = mysql_select_db("database");

	// Lihat jumlah_tersedia dahulu
	// $id_barang = $_POST['id_barang'];
	// $jumlah = $_POST['jumlah'];
	// $stok = $_POST['stok'];
	// // Lihat jumlah_tersedia dahulu
	// $res = mysql_query("SELECT stok FROM inventori WHERE id_barang='$id_barang'");
	// while($row = mysql_fetch_assoc($res)){
	// 	$stok = $row['stok'];
	// }	
	// $res = mysql_query("UPDATE inventori SET stok=$stok-$jumlah WHERE id_barang='$id_barang'");

	// Cek apakah sudah kosong
	
		$id_transaksi = $_POST['id_transaksi_2'];
		$total_belanja = $_POST['total_belanja'];
		$pembayaran = $_POST['pembayaran'];
		$kembalian = $_POST['kembalian'];
		$res = mysql_query("SELECT id_pegawai FROM pegawai WHERE username ='". $_SESSION['username']. "'");
		while ( $row = mysql_fetch_assoc($res) ){

				$id_pegawai = $row['id_pegawai'];
		}
		$tanggal = date("Y-m-d");
		// Lanjutkan update
		$insert = "INSERT INTO transaksi (id_transaksi, id_pegawai, tanggal, total_belanja, pembayaran, kembalian) Values ('$id_transaksi','$id_pegawai','$tanggal','$total_belanja','$pembayaran','$kembalian')";
		$res = mysql_query($insert, $conn);
		$query = mysql_query("SELECT * FROM transaksi_tmp");
		while ($q = mysql_fetch_assoc($query)) {
			# code...
			$id_barang = $q['id_barang'];
			$jumlah = $q['jumlah'];
			$subtotal = $q['subtotal'];

			$detail = "INSERT INTO detail_transaksi (id_transaksi, id_barang, jumlah, subtotal) Values ('$id_transaksi','$id_barang', '$jumlah', '$subtotal')";
			$res = mysql_query($detail, $conn);
		}
		$hapus = "DELETE FROM transaksi_tmp";
			$ser = mysql_query($hapus, $conn);	
	mysql_close();

	echo "<script>alert('Gagal !');</script>";
				header("location:../menu_transaksi.php");
}else{
	echo "<script>alert('Gagal !');</script>";
				header("location:../menu_transaksi.php");
}

?>