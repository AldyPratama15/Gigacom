<?php

if ( isset($_POST['bayar']) ){

	$conn = mysql_connect("localhost", "root", "");
	$db = mysql_select_db("database");

			$id_transaksi = $_POST['id_transaksi'];
			$id_pegawai = $_POST['id_pegawai'];
			$id_barang = $_POST['id_barang'];
			$harga = $_POST['harga'];
			$jumlah = $_POST['jumlah'];
			$total = $_POST['total'];
			$tanggal = $_POST['tanggal'];
			$total_belanja = $_POST['total_belanja'];
			$pembayaran = $_POST['pembayaran'];
			$kembalian = $_POST['kembalian'];

			$sql = "INSERT INTO transaksi(id_transaksi, id_pegawai, id_barang, harga, jumlah, total, tanggal, total_belanja, pembayaran, kembalian)"." VALUES ('$id_transaksi', '$id_pegawai', '$id_barang', '$harga', '$jumlah', '$total', '$tanggal', '$total_belanja', '$pembayaran', '$kembalian')";

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

<!-- 
$query_tambah = "INSERT INTO transaksi(id_transaksi, id_pegawai, id_barang, harga, jumlah, total, tanggal, total_belanja, pembayaran, kembalian)"." VALUES ('$id_transaksi', '$id_pegawai', '$id_barang', '$harga', '$jumlah', '$total', '$tanggal', '$total_belanja', '$pembayaran', '$kembalian')";
	!-->




