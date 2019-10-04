<?php
    if( isset($_POST['idx'])) {
        $id = $_POST['idx'];

        include "koneksi.php";

        $sql = "SELECT * FROM tabel_pasien WHERE nik = '$id'";
        $res = mysql_query($sql);

        while ( $row = mysql_fetch_assoc($res) ){

            echo "<input type='hidden' name='nik_awal' value=". $row['nik']."><br>";
            echo "<input type='text' class='form-control' name='nik' value=". $row['nik']. "><br>";
            echo "<input type='text' class='form-control' name='nama_pasien' value='". $row['nama_pasien']. "'><br>";
            echo "<input type='text' class='form-control' name='no_asuransi' value=". $row['no_asuransi']. "><br>";
            echo "<input type='text' class='form-control' name='alamat' value='". $row['alamat']. "'><br>";
            echo "<input type='date' class='form-control' name='tanggal_lahir' value=". $row['tanggal_lahir']. "><br>";
            echo "<input type='text' class='form-control' name='umur' value=". $row['umur']. ">";
        }

        mysql_close();
    }
?>