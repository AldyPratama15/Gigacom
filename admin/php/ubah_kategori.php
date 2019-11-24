<!-- <?php
if ( isset($_POST['ubahdata']) ){
    include "koneksi.php";


    $nama= $_POST['nama'];
   

    $sql = mysql_query("UPDATE kategori SET nama='$nama' WHERE nama='$nama'");

    if ($sql) {
        //jika  berhasil tampil ini
        echo "Data Berhasil Diubah"."</br>";
        echo "<script>document.location='../kategori_admin.php'</script>";
    } else {
        // jika gagal tampil ini
        echo "Gagal Melakukan Perubahan: ";
    }
}
?> -->