<?php
    if( isset($_POST['idx'])) {
        $id = $_POST['idx'];

        include "koneksi.php";

        $sql = "SELECT * FROM kategori WHERE nama = '$id'";
        $res = mysql_query($sql);

        while ( $row = mysql_fetch_assoc($res) ){
            

            
        echo "<input type='text' class='form-control' title='Nama Kategori' name='nama' value=". $row['nama']. "><br>";
       
        }

        mysql_close();
    }
?>