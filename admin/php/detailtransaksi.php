<?php
    if( isset($_POST['idx'])) {
        $id_barang = $_POST['idx'];

        include "koneksi.php";

        $sql = "SELECT harga FROM inventori WHERE id_barang = '$id_barang'";
        $res = mysql_query($sql);

        while ( $row = mysql_fetch_assoc($res) ){
           

          
            echo "<input type='text' class='form-control' title='Harga' name='harga' value=". $row['harga']. "><br>";
        }

        mysql_close();
    }
?>