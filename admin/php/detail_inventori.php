<?php
    if( isset($_POST['idx'])) {
        $id = $_POST['idx'];

        include "koneksi.php";

        $sql = "SELECT * FROM inventori WHERE id_barang = '$id'";
        $res = mysql_query($sql);

        while ( $row = mysql_fetch_assoc($res) ){
            

            
            echo "<input type='text' class='form-control' title='Id Barang' name='id_barang' readonly value=". $row['id_barang']. "><br>";
        echo "<input required placeholder='Nama Barang' type='text' class='form-control' name='nama_barang' value='". $row['nama_barang']. "'><br>";
           

    
             echo "<select required name='nama' class='form-control'>";

             $sql = "SELECT * FROM kategori ORDER BY nama ASC";
            $res = mysql_query($sql);

            while ( $rownama = mysql_fetch_assoc($res) ){
                if($rownama["nama"]==$row["nama"]){
                    echo '<option value="'. $rownama["nama"]. '" selected>'.$rownama['nama'].'</option>';
                }else{
                    echo '<option value="'. $rownama["nama"]. '">'.$rownama['nama'].'</option>';
                }
            }
             echo "</select><br>";


          
            
            echo "<input required placeholder='Stok' type='number' required class='form-control' title='Stok' name='stok' value=". $row['stok']. "><br>";
            echo "<input required placeholder='Harga' type='number' required class='form-control' title='Harga' name='harga' value=". $row['harga']. "><br>";
        }

        mysql_close();
    }
?>