<?php
    include "koneksi.php";

    $no_kamar_awal = $_POST['no_kamar_awal'];
    $no_kamar = $_POST['no_kamar'];
    $kelas = $_POST['kelas'];
    $jumlah = $_POST['jumlah'];
    $biaya = $_POST['biaya'];

    $sql = mysql_query("UPDATE tabel_kamar SET no_kamar='$no_kamar', kelas='$kelas', jumlah=$jumlah, biaya=$biaya WHERE no_kamar='$no_kamar_awal'");

    if ($sql) {
        //jika  berhasil tampil ini
        echo "Data Berhasil Diubah"."</br>";
        echo "<script>document.location='../menu_kamar.php'</script>";
    } else {
        // jika gagal tampil ini
        echo "Gagal Melakukan Perubahan: ";
    }

?>