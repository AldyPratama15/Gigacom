<?php
include "koneksi.php";

if ( isset($_POST['noka']) ){
	$noka = $_POST['noka'];

	$res = mysql_query("SELECT biaya FROM tabel_kamar WHERE no_kamar = '$noka'");
	while ( $row = mysql_fetch_assoc($res) ){
		echo $row['biaya'];
	}

	mysql_close();
}
?>