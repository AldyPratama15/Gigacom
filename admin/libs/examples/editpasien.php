<?php
    include "koneksi.php";

  
    $nik = $_POST['nik'];
    $nama_pasien = $_POST['nama_pasien'];
    $no_asuransi = $_POST['no_asuransi'];
	$alamat = $_POST['alamat'];
	$tanggal_lahir = $_POST['tanggal_lahir'];
	$umur = $_POST['umur'];


    $sql = mysql_query("UPDATE tabel_pasien SET nama_pasien = '$nama_pasien', no_asuransi = '$no_asuransi', alamat = '$alamat', tanggal_lahir = '$tanggal_lahir', umur = '$umur' WHERE nik =$nik");

    if ($sql) {
        //jika  berhasil tampil ini
        
        echo "<script>document.location='typography.php'</script>";
    } else {
        // jika gagal tampil ini
        echo "Gagal Melakukan Perubahan: ";
    }



   
?>