<?php
    if( isset($_POST['idx'])) {
        $id = $_POST['idx'];

        include "koneksi.php";

        $sql = "SELECT * FROM inventori WHERE id_barang = '$id'";
        $res = mysql_query($sql);

        while ( $row = mysql_fetch_assoc($res) ){
            

            
            echo "<input type='text' class='form-control' title='Id Barang' name='id_barang' readonly value=". $row['id_barang']. "><br>";
        echo "<input placeholder='Nama Barang' type='text' class='form-control' name='nama_barang' value='". $row['nama_barang']. "'><br>";
           

    
             echo "<select name='nama' class='form-control'>";
            echo '<option>'.$row['nama'].'</option>';   
             echo "</select><br>";


          
            
            echo "<input placeholder='Stok' type='number' required class='form-control' title='Stok' name='stok' value=". $row['stok']. "><br>";
            echo "<input placeholder='Harga' type='number' required class='form-control' title='Harga' name='harga' value=". $row['harga']. "><br>";
        }

        mysql_close();
    }
?>