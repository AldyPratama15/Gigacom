<?php
if ( isset($_POST['ubahdata']) ){
    include "koneksi.php";


    $id_barang = $_POST['id_barang'];
    $nama_barang = $_POST['nama_barang'];
    $nama = $_POST['nama'];
    $stok = $_POST['stok'];
    $harga = $_POST['harga'];

    $sql = mysql_query("UPDATE inventori SET nama_barang='$nama_barang', nama='$nama', stok='$stok', harga='$harga' WHERE id_barang='$id_barang'");

    if ($sql) {
        //jika  berhasil tampil ini
        echo "Data Berhasil Diubah"."</br>";
        echo "<script>document.location='../inventori_admin.php'</script>";
    } else {
        // jika gagal tampil ini
        echo "Gagal Melakukan Perubahan: ";
    }
}
?>