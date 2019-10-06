<?php
if ( isset($_POST['ubahdata']) ){
    include "koneksi.php";


    $id_barang = $_POST['id_barang'];
    $nama_barang = $_POST['nama_barang'];
    $kategori = $_POST['kategori'];
    $stok = $_POST['stok'];
    $harga = $_POST['harga'];

    $sql = mysql_query("UPDATE inventori SET nama_barang='$nama_barang', kategori='$kategori', stok='$stok', harga='$harga' WHERE id_barang='$id_barang'");

    if ($sql) {
        //jika  berhasil tampil ini
        echo "Data Berhasil Diubah"."</br>";
        echo "<script>document.location='../menu_kamar_admin.php'</script>";
    } else {
        // jika gagal tampil ini
        echo "Gagal Melakukan Perubahan: ";
    }
}
?>