<!DOCTYPE html>
<html lang="en">

<?php
session_start();
if ( !isset($_SESSION['username']) ){
    header("location:login.php");
}

// $status = "";

// if ( isset($_POST["ganti"]) ){
//     include "php/koneksi.php";

//     $username = $_POST['username_ganti'];
//     $pass_lama = $_POST['password_lama'];
//     $pass_baru = $_POST['password_baru'];

//     $res = mysql_query("SELECT password FROM user WHERE username='$username'");
//     if( $row = mysql_fetch_assoc($res) ){
//         if($pass_lama == $row['password']){
//             $res = mysql_query("UPDATE user SET password='$pass_baru' WHERE username='$username'", $koneksi);
//             if($res){
//                 $status = "Password berhasil diubah";
//             }else {
//                 $status = "Gagal ubah password!";
//             }
//         }else {
//             $status = "Password lama tidak sesuai";
//         }
//     }else {
//         $status = "Username tidak ditemukan!";
//     }
//     unset($_POST["ganti"]);
//     mysql_close();
// }
?>

<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Pegawai |GigaCom</title>

    <link href="libs/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link href="libs/metisMenu/metisMenu.min.css" rel="stylesheet">
    <link href="libs/sb-admin/css/sb-admin-2.css" rel="stylesheet">
    <link href="libs/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">

    <script src="libs/jquery/jquery-3.3.1.min.js"></script>
    <script src="libs/bootstrap/js/bootstrap.min.js"></script>
    <script src="libs/metisMenu/metisMenu.min.js"></script>
    <script src="libs/sb-admin/js/sb-admin-2.js"></script>

</head>

<body>

    <div id="wrapper">

        <!-- Navigation -->
        <nav class="navbar navbar-inverse navbar-static-top" role="navigation" style="margin-bottom: 0;">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="#">ADMIN GIGACOM</a>
            </div>

            <ul class="nav navbar-top-links navbar-right">
                <li class="disabled"><a href="#">Hanya untuk admin</a></li>
                <li class="dropdown">
                    <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                        <i class="fa fa-user fa-fw"></i> <i class="fa fa-caret-down"></i>
                    </a>
                    <ul class="dropdown-menu dropdown-user">
                        <li><a href="php/logout.php"><i class="fa fa-sign-out fa-fw"></i> Logout</a>
                        </li>
                    </ul>
                </li>
            </ul>

            <div class="navbar-default sidebar" role="navigation">
                <div class="sidebar-nav navbar-collapse">
                    <ul class="nav" id="side-menu">
                        <!-- <li><a href="halaman_admin.php"><i class="fa fa-home fa-fw"></i> Home</a></li> -->
                        <li><a href="menu_pasien_admin.php"><i class="fa fa-child fa-fw"></i> Pasien</a></li>
                        <li><a href="menu_kamar_admin.php"><i class="fa fa-bed fa-fw"></i> Inventori</a></li>
                        <li><a href="menu_laporan_admin.php"><i class="fa fa-book fa-fw"></i> Laporan</a></li>
                        <li><a class="active" href="menu_pegawai.php"><i class="fa fa-group fa-fw"></i> Pegawai</a></li>
                    </ul>
                </div>
            </div>
        </nav>

        <!-- Page Content -->
        <div id="page-wrapper">
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">Menu Pegawai</h1>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-12">
<!-- <?php
if ($status != ""){
?>
<div class="alert alert-info alert-dismissable"><strong>Info!</strong><?php echo $status; ?></div>
<?php
$status = "";
}
?> -->
                    <p><a href="#modalTambah" class="btn btn-success" data-toggle="modal" aria-hidden="true">Tambah Pegawai</a></p>
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            Data Pegawai
                            <input type="text" id="cari" placeholder="Cari ..." style="width: 200px; padding: 5px;">
                        </div>
                        <div class="panel-body">
                            <table class="table table-striped table table-hover">
                                <thead>
                                    <tr>
                                        
                                        <th>Nama Pegawai</th>
                                        <th>Alamat</th>
                                        <th>Telp</th>
                                        <th>Username</th>
                                        <th width="4%"></th>
                                        <th width="4%"></th>
                                        <th width="4%"></th>
                                    </tr>
                                </thead>
                                <tbody id="tableViewPegawai">
<?php
include "php/koneksi.php";

$res = mysql_query("SELECT * FROM pegawai WHERE username <> 'Owner' ORDER BY nama ASC");
while ( $row = mysql_fetch_assoc($res) ){
?>
                                    <tr>
                                      
                                        <td><?php echo $row['nama'];?></td>
                                        <td><?php echo $row['alamat'];?></td>
                                        <td><?php echo $row['telp'];?></td>
                                        <td><?php echo $row['username'];?></td>
                                        <td><a href="#modalUbahData" class="btn btn-primary" data-toggle="modal" title="Ubah Data" data-id="<?php echo $row['id_pegawai'];?>"><i class="fa fa-pencil"></i></a></td>
                                       <!--  <td><a href="#modalGantiPassword" class="btn btn-primary" data-toggle="modal" title="Ganti Password" data-id="<?php echo $row['username'];?>"><i class="fa fa-gear"></i></a></td> -->
                                        <td><a href="php/hapusUser.php?id=<?php echo $row['username']; ?>" class="btn btn-danger" title="Hapus Pegawai"><i class="fa fa-trash"></i></a></td>
                                   
                                    </tr>
<?php
}
mysql_close();
?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="modal fade" id="modalTambah" tabindex="-1" aria-labelledby="modalTambahLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <form method="POST" action="php/tambahPegawai.php">
                    <div class="modal-header">
                        <h3 class="modal-title" id="modalTambahLabel">Tambah Pegawai</h3>
                    </div>
                    <div class="modal-body">
                       <!--  <input class="form-control" type="text" name="id_pegawai" id="id_pegawai" placeholder="Nomor" onkeyup="cek_form_tambah()"><br> -->
                        <input class="form-control" type="text" name="nama" id="nama" placeholder="Nama Pegawai" onkeyup="cek_form_tambah()"><br>
                        <input class="form-control" type="text" name="alamat" id="alamat" placeholder="Alamat" onkeyup="cek_form_tambah()"><br>
                        <input class="form-control" type="text" name="telp" id="telp" placeholder="Telp" onkeyup="cek_form_tambah()"><br>
                         
                         <select class="form-control" name="jabatan" onkeyup="cek_form_tambah()">
                         <option value="">Pilih Jabatan :</option>
                        <option value="Owner">Owner</option>
                        <option value="Karyawan">Karyawan</option> 
                    </select><br>
                       <!--  <input class="form-control" type="text" name="jabatan" id="jabatan" placeholder="Jabatan" onkeyup="cek_form_tambah()"><br> -->

                        


                        <input class="form-control" type="text" name="username" id="username" placeholder="Username" onkeyup="cek_form_tambah()"><br>

                        <input class="form-control" type="password" name="password" id="password" placeholder="Password" onkeyup="cek_form_tambah()"><br>
                       <!--  <input class="form-control" type="password" id="" placeholder="Konfirmasi Password" onkeyup="cek_form_tambah()"> -->
                    </div>
                    <div class="modal-footer">
                        <input class="btn btn-success" type="submit" name="tambahkan" id="tambahkan" value="Tambah">
                        <input class="btn btn-danger" type="reset" data-dismiss="modal" value="Batal">
                    </div>
                </form>
            </div>
        </div>
    </div>

    <div class="modal fade" id="modalUbahData" tabindex="-1" aria-labelledby="modalUbahDataLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <form method="POST" action="php/ubahPegawai.php">
                    <div class="modal-header">
                        <h3 class="modal-title" id="modalUbahDataLabel">Ubah Data</h3>
                    </div>
                    <div class="modal-body">
                        <div class="hasil-data"></div>
                    </div>
                    <div class="modal-footer">
                        <input class="btn btn-primary" type="submit" name="ubahkan" value="Ubah Data">
                        <input class="btn btn-danger" type="reset" data-dismiss="modal" value="Batal">
                    </div>
                </form>
            </div>
        </div>
    </div>

    <div class="modal fade" id="modalGantiPassword" tabindex="-1" aria-labelledby="modalGantiLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <form method="POST" action="menu_pegawai.php">
                    <div class="modal-header">
                        <h3 class="modal-title" id="modalGantiLabel">Ganti Password</h3>
                    </div>
                    <div class="modal-body">
                        <input class="form-control" type="text" name="username_ganti" id="username_ganti" placeholder="Username" onkeyup="cek_ganti_password()"><br>
                        <input class="form-control" type="password" name="password_lama" id="password_lama" placeholder="Password Lama" onkeyup="cek_ganti_password()"><br>
                        <input class="form-control" type="password" name="password_baru" id="password_baru" placeholder="Password Baru" onkeyup="cek_ganti_password()"><br>
                        <input class="form-control" type="password" name="password_konfirmasi" id="password_konfirmasi" placeholder="Konfirmasi Password Baru" onkeyup="cek_ganti_password()">
                    </div>
                    <div class="modal-footer">
                        <input class="btn btn-success" type="submit" name="ganti" id="tombol_ganti" value="Ubah" disabled>
                        <input class="btn btn-danger" type="reset" data-dismiss="modal" name="reset" value="Batal">
                    </div>
                </form>
            </div>
        </div>
    </div>

    <script type="text/javascript">
        function cek_form_tambah(){
            id_pegawai = $("#id_pegawai").val();
            namai = $("#nama").val();
            alamat = $("#alamat").val();
            telp = $("#telp").val();
            jabatan = $("#jabatan").val();
            username = $("#username").val();
            password = $("#password").val();
            //  = $("#").val();

            if (id_pegawai != "" && nama != "" && alamat != "" && telp != "" &&jabatan != "" && username != "" && password!= ""){
                // if (password == ){
                //     $("#tambahkan").prop("disabled", false);
                // }else{
                //     $("#tambahkan").prop("disabled", true);
                // }
            }
        }

        function cek_ganti_password(){
            user = $("#username_ganti").val();
            pass_lama = $("#password_lama").val();
            pass_baru = $("#password_baru").val();
            konf_pass = $("#password_konfirmasi").val();

            if(user != "" && pass_lama != "" && pass_baru != "" && konf_pass != ""){
                
                $("#tombol_ganti").prop("disabled", false);
            }else {
                $("#tombol_ganti").prop("disabled", true);
            }
        }

        $(document).ready(function() {

            $("#cari").on("keyup", function(){

                //Ambil data dari input dgn id="cari"
                var value = $(this).val().toLowerCase();

                $("#tableViewPegawai tr").filter(function() {

                    //Jika tidak sesuai, maka toggle (hide)
                    //Jika sesuai, maka toggle (show)
                    $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
                    
                });
            });

            $("#modalUbahData").on("show.bs.modal", function(e){
                var idx = $(e.relatedTarget).data("id");

                $.ajax({
                    type : "post",
                    url : "php/detailPegawai.php",
                    data : "idx=" + idx,
                    success : function(data){
                        $(".hasil-data").html(data);
                    }
                });
            });

            $("#modalGantiPassword").on("show.bs.modal", function(e){
                var idx = $(e.relatedTarget).data("id");
                $("#username_ganti").val(idx);
            });
        });
    </script>

</body>
</html>

