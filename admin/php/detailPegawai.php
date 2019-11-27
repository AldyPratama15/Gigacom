<?php
if( isset($_POST['idx'])) {
    $id = $_POST['idx'];

    include "koneksi.php";

    $sql = "SELECT * FROM pegawai WHERE id_pegawai = '$id'";
    $res = mysql_query($sql);

    while ( $row = mysql_fetch_assoc($res) ){

        echo "<input type='' class='form-control' name='id_pegawai' readonly value=". $row['id_pegawai']."><br>";
        echo "<input type='text' class='form-control' name='nama' required placeholder='Nama' value='". $row['nama']. "'><br>";
        echo "<input type='text' class='form-control' required placeholder='alamat' name='alamat' value='". $row['alamat']. "'><br>";
         echo "<input type='number' class='form-control' required placeholder='Telp' name='telp' value='". $row['telp']. "'><br>";
        
    }

    mysql_close();
}
?>