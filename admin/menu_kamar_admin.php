<!DOCTYPE html>
<html lang="en">

<?php
session_start();
if ( !isset($_SESSION['username']) ){
    header("location:login.php");
}
?>

<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Kamar | SIRINA</title>

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
                <a class="navbar-brand" href="#">Admin SIRINA</a>
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
                        <li><a class="active" href="menu_kamar_admin.php"><i class="fa fa-bed fa-fw"></i> Kamar</a></li>
                        <li><a href="menu_laporan_admin.php"><i class="fa fa-book fa-fw"></i> Laporan</a></li>
                        <li><a href="menu_pegawai.php"><i class="fa fa-group fa-fw"></i> Pegawai</a></li>
                    </ul>
                </div>
            </div>
        </nav>

        <!-- Page Content -->
        <div id="page-wrapper">
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">Menu Kamar</h1>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-12">
                    <p><a class="btn btn-success" href="#modalTambah" data-toggle="modal">Tambah Kamar</a></p>
                    <div class="panel panel-default">
                        <div class="panel-heading">Tabel Kamar
                            <input type="text" id="cari" placeholder="Cari ..." style="width: 200px; padding: 5px;">
                        </div>
                        <div class="panel-body">
                            <table class="table table-hover table-striped">
                                <thead>
                                    <tr>
                                        <th>ID Barang</th>
                                        <th>Nama Barang</th>
                                        <th>Kategori</th>
                                        <th>Stok</th>
                                        <th>Harga</th>
                                        <th width="5%"></th>
                                        <th width="5%"></th>
                                    </tr>
                                </thead>
                                <tbody id="tabelViewKamar">
<?php
include "php/koneksi.php";

$res = mysql_query("SELECT * FROM inventori ORDER BY id_barang");
while ( $row = mysql_fetch_assoc($res) ){
?>
                                    <tr>
                                        <td><?php echo $row['id_barang'];?></td>
                                        <td><?php echo $row['nama_barang'];?></td>
                                        <td><?php echo $row['kategori'];?></td>
                                        <td><?php echo $row['stok'];?></td>
                                        <td><?php echo $row['harga'];?></td>
                                        <td><a href="#modalUbah" class="btn btn-primary" data-toggle="modal" data-id="<?php echo $row['id_barang'];?>"><i class="fa fa-pencil"></i></td>
                                        <td><a href="php/hapusKamar.php?id=<?php echo $row['id_barang'];?>" onclick="return confirm('Yakin hapus data?')" class="btn btn-danger"><i class="fa fa-trash"></i></a></td>
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

    <div class="modal fade" tabindex="-1" role="dialog" id="modalTambah" aria-labelledby="modalTambahLabel">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <form action="php/tambahKamar.php" method="POST">
                <div class="modal-header">
                    <h2 class="modal-title" id="modalTambahLabel">Tambah Pasien</h2>
                </div>
                <div class="modal-body">
                    <input class="form-control" type="text" name="no_kamar" placeholder="No Kamar"><br>
                    <input class="form-control" type="text" name="kelas" placeholder="Kelas"><br>
                    <input class="form-control" type="text" name="jumlah" id="jumlah" placeholder="Jumlah unit"><br>
                    <input class="form-control" type="text" name="biaya" placeholder="Biaya">
                </div>
                <div class="modal-footer">
                    <input class="btn btn-primary" type="submit" name="tambahkan" value="Tambah">
                    <input class="btn btn-danger" data-dismiss="modal" type="reset" value="Batal">
                </div>
                </form>
            </div>
        </div>
    </div>

    <div class="modal fade" id="modalUbah" tabindex="-1" aria-labelledby="modalUbahLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <form method="POST" action="php/ubahKamar.php">
                    <div class="modal-header">
                        <h3 class="modal-title" id="modalUbahLabel">Ubah Data</h3>
                    </div>
                    <div class="modal-body">
                        <!-- Data ubah ada disini -->
                        <div class="hasil-data"></div>
                    </div>
                    <div class="modal-footer">
                        <input class="btn btn-primary" type="submit" name="ubahdata" value="Ubah">
                        <input class="btn btn-danger" data-dismiss="modal" type="reset" value="Batal">
                    </div>
                </form>
            </div>
        </div>
    </div>

    <script type="text/javascript">
        $(document).ready(function() {

            $("#cari").on("keyup", function(){

                //Ambil data dari input dgn id="cari"
                var value = $(this).val().toLowerCase();

                $("#tabelViewKamar tr").filter(function() {

                    //Jika tidak sesuai, maka toggle (hide)
                    //Jika sesuai, maka toggle (show)
                    $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)

                });

            });

            $('#modalUbah').on('show.bs.modal', function (e) {
                var idx = $(e.relatedTarget).data('id');
                //menggunakan fungsi ajax untuk pengambilan data
                $.ajax({
                    type : 'post',
                    url : 'php/detailKamar.php',
                    data :  'idx='+ idx,
                    success : function(data){
                    $('.hasil-data').html(data); //menampilkan data ke dalam modal
                    }
                });
            });

        });
    </script>
</body>
</html>
