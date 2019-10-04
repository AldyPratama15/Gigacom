<?php
include "koneksi.php";

$res = mysql_query("UPDATE tabel_pasien SET umur=( year(now()) - year(tanggal_lahir) )");
if ($res){
	echo "Berhasil";
}else {
	echo "gagal";
}
mysql_close();
?>