<?php
    if( isset($_POST['idx'])) {
        $id = $_POST['idx'];

        include "koneksi.php";

        $sql = "SELECT * FROM inventori WHERE id_barang = '$id'";
        $res = mysql_query($sql);

        while ( $row = mysql_fetch_assoc($res) ){
            

            
            echo "<input type='text' class='form-control' title='Id Barang' name='id_barang' readonly value=". $row['id_barang']. "><br>";
            echo "<input type='text' class='form-control' title='Nama Barang' name='nama_barang' value=". $row['nama_barang']. "><br>";

             echo "<select name='kategori' class='form-control'>";
              echo "<option value=''> Pilih Kategori </option>";
            echo "<option value='A'> A </option>";
            echo "<option value='B'> B </option>";
            echo "<option value='C'> C </option>";
            echo "<option value='D'> D </option>";
             echo "</select><br>";

            // echo "<input class='form-control' title='Kategori' name='kategori' value=". $row['kategori']."><br>";
            
            echo "<input type='text' class='form-control' title='Stok' name='stok' value=". $row['stok']. "><br>";
            echo "<input type='text' class='form-control' title='Harga' name='harga' value=". $row['harga']. "><br>";
        }

        mysql_close();
    }
?>