<!DOCTYPE html>
<html lang="en">

<head>
	<title>Struk Pembayaran</title>

	<link href="../libs/bootstrap/css/bootstrap.min.css" rel="stylesheet">
	<script src="../libs/jquery/jquery-3.3.1.min.js"></script>
    <script src="../libs/bootstrap/js/bootstrap.min.js"></script>

</head>
<body>
<?php
include "koneksi.php";

if (isset($_POST['konfirmasi'])){
	$no_kamar = $_POST['id_kamar'];

	// Lihat jumlah_tersedia dahulu
	$res = mysql_query("SELECT unit_tersedia, jumlah FROM tabel_kamar WHERE no_kamar='$no_kamar'");
	while( $row = mysql_fetch_assoc($res) ){
		$unit_tersedia = $row['unit_tersedia'];
		$jumlah = $row['jumlah'];
	}

	// Cek apakah sudah penuh
	if ($unit_tersedia == $jumlah) {

		// Jika penuh maka begini
		echo "<script>alert('Unit sudah tersedia!');</script>";
		echo "<a href='../menu_transaksi.php'>Kembali</a>";

	}else{
		// Lanjutkan update
		$res = mysql_query("UPDATE tabel_kamar SET unit_tersedia=$unit_tersedia+1 WHERE no_kamar='$no_kamar'");
		if ($res) {
			// echo "<script>alert('Sukses!');</script>";

$id_transaksi = $_POST['id_transaksi'];
// echo $_POST['id_transaksi'];
// echo $_POST['id_pegawai'];
$tgl_keluar = $_POST['tgl_keluar'];
$biayaTotal = $_POST['biaya'];

if ($biayaTotal == 0 || $biayaTotal == ""){
	echo "Biaya Total Masih Kosong";
}else{
	$res = mysql_query("UPDATE tabel_transaksi SET tanggal_keluar='$tgl_keluar', biaya='$biayaTotal' WHERE id_transaksi='$id_transaksi'");

	if($res){
		$res = mysql_query("
SELECT tabel_transaksi.id_transaksi, tabel_transaksi.id_pasien, tabel_pasien.nama_pasien, tabel_pasien.umur, tabel_transaksi.id_kamar, tabel_kamar.biaya as biaya_kamar, tabel_pegawai.nama_pegawai, tabel_transaksi.tanggal_masuk, tabel_transaksi.tanggal_keluar, tabel_transaksi.biaya
FROM tabel_transaksi
INNER JOIN tabel_pasien ON tabel_pasien.nik = tabel_transaksi.id_pasien
INNER JOIN tabel_kamar ON tabel_kamar.no_kamar = tabel_transaksi.id_kamar
INNER JOIN tabel_pegawai ON tabel_pegawai.nip = tabel_transaksi.id_pegawai
WHERE tabel_transaksi.id_transaksi = $id_transaksi
ORDER BY tabel_transaksi.id_transaksi
		");

	while ( $row = mysql_fetch_assoc($res) ){
?>

	<div class="container">
		<div class="row">
			<div class="col-md-12">
				<table class="table table-bordered">
					<thead>
						<tr>
							<th colspan="4"><center>STRUK PEMBAYARAN RAWAT INAP</center></th>
						</tr>
					</thead>
					<tbody>
						<tr>
							<td width="25%">Nama Pasien: </td>
							<td width="25%"><?php echo $row['nama_pasien'];?></td>
							<td width="25%">NIK: </td>
							<td width="25%"><?php echo $row['id_pasien'];?></td>
						</tr>
						<tr>
							<td>Umur: </td>
							<td><?php echo $row['umur'];?></td>
							<td>No Kamar: </td>
							<td><?php echo $row['id_kamar'];?></td>
						</tr>
						<tr>
							<td>Tanggal Masuk: </td>
							<td><div id="tgl_masuk"><?php echo $row['tanggal_masuk'];?></div></td>
							<td>Tanggal Keluar: </td>
							<td><div id="tgl_keluar"><?php echo $row['tanggal_keluar'];?></div></td>
						</tr>
						<tr>
							<td>Biaya Kamar Perhari: </td>
							<td><?php echo $row['biaya_kamar'];?></td>
							<td>Jumlah Hari: </td>
							<td>
								<div id="jumhari"></div>
							<script type="text/javascript">
								tg_masuk = new Date($("#tgl_masuk").html());
					            tg_keluar = new Date($("#tgl_keluar").html());
					            // Waktu milisecond dalam sehari
					            sehari = 24*60*60*1000;
					            jumlah_hari = Math.round((tg_keluar.getTime() - tg_masuk.getTime()) / sehari);
					            $("#jumhari").html(jumlah_hari);
							</script>
							</td>
						</tr>
						<tr>
							<td rowspan="2"></td>
							<td rowspan="2"><b></b></td>
							<td><b>Total Biaya: </b></td>
							<td>Rp <?php echo $row['biaya'];?></td>
						</tr>
						<tr>
							<!-- <td colspan="2"></td> -->
							<td><b>Bayar: </b></td>
							<td>Rp <?php echo $_POST['bayar'];?></td>
						</tr>
						<tr>
							<td>Pegawai: <?php echo $row['nama_pegawai'];?></td>
							<td></td>
							<td><b>Kembalian: </b></td>
							<td>Rp <?php echo $_POST['kembalian'];?></td>
						</tr>
					</tbody>
				</table>
				<a href="../menu_transaksi.php">Kembali</a>
			</div>
		</div>
	</div>
<?php
		}
		// header("location: ../menu_transaksi_masuk.php");
		echo "<script>window.print();</script>";
	}else{
		echo "Transaksi gagal<br>";
		echo "<a href='../menu_transaksi.php'>Kembali</a>";
	}
}
mysql_close();

		}else{
			echo "<script>alert('Gagal ubah!');</script>";
			echo "<a href='../menu_transaksi.php'>Kembali</a>";
		}

	}
}
?>
</body>

</html>