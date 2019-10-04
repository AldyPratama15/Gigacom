<html>

<?php
include "koneksi.php";

// Jika yang ditekan "Tambahkan"
if ( isset($_POST['tambahkan']) ) {
	$no_kamar = $_POST['no_kamar'];

	// Lihat jumlah_tersedia dahulu
	$res = mysql_query("SELECT unit_tersedia, jumlah FROM tabel_kamar WHERE no_kamar='$no_kamar'");
	while( $row = mysql_fetch_assoc($res) ){
		$unit_tersedia = $row['unit_tersedia'];
		$jumlah = $row['jumlah'];
	}

	// Cek apakah sudah penuh
	if ($unit_tersedia == $jumlah) {

		// Jika penuh maka begini
		echo "<script>alert('Gak muat bos!');</script>";

	}else{
		// Lanjutkan update
		$res = mysql_query("UPDATE tabel_kamar SET unit_tersedia=$unit_tersedia+1 WHERE no_kamar='$no_kamar'");
		if ($res) {
			echo "<script>alert('Sukses!');</script>";
		}else{
			echo "<script>alert('Gagal ubah!');</script>";
		}

	}

// Jika yang ditekan "Kurangi"
}else if( isset($_POST['kurangi']) ){
	$no_kamar = $_POST['no_kamar'];

	// Lihat jumlah_tersedia dahulu
	$res = mysql_query("SELECT unit_tersedia FROM tabel_kamar WHERE no_kamar='$no_kamar'");
	while($row=mysql_fetch_assoc($res)){
		$unit_tersedia = $row['unit_tersedia'];
	}

	// Cek apakah sudah kosong
	if ($unit_tersedia == 0) {

		// Jika sudah kosong
		echo "<script>alert('Sudah kosong bos!');</script>";
		
	}else{

		// Lanjutkan update
		$res = mysql_query("UPDATE tabel_kamar SET unit_tersedia=$unit_tersedia-1 WHERE no_kamar='$no_kamar'");
		if ($res) {
			echo "<script>alert('Sukses!');</script>";
		}else{
			echo "<script>alert('Gagal ubah!');</script>";
		}

	}
}
?>

<head>
	<title>Cuma test update</title>
</head>
<body>
	
	<table border="1">
		<thead>
			<tr>
				<th>No Kamar</th>
				<th>Kelas</th>
				<th>Unit Tersedia</th>
				<th>Jumlah</th>
				<th>Biaya</th>
				<th></th>
				<th></th>
			</tr>
		</thead>
		<tbody>
<?php
$res = mysql_query("SELECT * FROM tabel_kamar ORDER BY no_kamar");
while ( $row = mysql_fetch_assoc($res) ){
?>
			<tr>
				<form method="POST" action="test_updatekamar.php">
				<td><?php echo $row['no_kamar'];?><input type="hidden" name="no_kamar" value="<?php echo $row['no_kamar'];?>"></td>
				<td><?php echo $row['kelas'];?></td>
				<td><?php echo $row['unit_tersedia'];?></td>
				<td><?php echo $row['jumlah'];?></td>
				<td><?php echo $row['biaya'];?></td>
				<td><input type="submit" name="tambahkan" value="Tambah"></td>
				<td><input type="submit" name="kurangi" value="Kurang"></td>
				</form>
			</tr>
<?php
}
mysql_close();
?>
		</tbody>
	</table>
</body>
</html>