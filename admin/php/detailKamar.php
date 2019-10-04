<?php
    if( isset($_POST['idx'])) {
        $id = $_POST['idx'];

        include "koneksi.php";

        $sql = "SELECT * FROM tabel_kamar WHERE no_kamar = '$id'";
        $res = mysql_query($sql);

        while ( $row = mysql_fetch_assoc($res) ){
            $kelas = $row['kelas'];

            echo "<input type='hidden' name='no_kamar_awal' value=". $row['no_kamar']."><br>";
            echo "<input type='text' class='form-control' title='No Kamar' name='no_kamar' value=". $row['no_kamar']. "><br>";
            echo "<input type='text' class='form-control' title='Kelas' name='kelas' value='$kelas'><br>";
            echo "<input type='text' class='form-control' title='Jumlah' name='jumlah' value=". $row['jumlah']. "><br>";
            echo "<input type='text' class='form-control' title='Biaya' name='biaya' value=". $row['biaya']. "><br>";
        }

        mysql_close();
    }
?>