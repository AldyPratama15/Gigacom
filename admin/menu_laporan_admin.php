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

    <title>Laporan | SIRINA</title>

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
                        <li><a href="menu_kamar_admin.php"><i class="fa fa-bed fa-fw"></i> Kamar</a></li>
                        <li><a class="active" href="menu_laporan_admin.php"><i class="fa fa-book fa-fw"></i> Laporan</a></li>
                        <li><a href="menu_pegawai.php"><i class="fa fa-group fa-fw"></i> Pegawai</a></li>
                    </ul>
                </div>
            </div>
        </nav>

        <!-- Page Content -->
        <div id="page-wrapper">
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">Laporan</h1>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-12">
                  <div class="panel panel-default">
                        <div class="panel-heading">Laporan Transaksi
                            <input type="text" id="cari" placeholder="Cari ..." style="width: 200px; padding: 5px;">
                        </div>
                        <div class="panel-body">
                            <table class="table table-hover table-striped">
                                <thead>
                                    <tr>
                                        <th>ID TRANSAKSI</th>
                                        <th>NAMA PASIEN</th>
                                        <th>NO KAMAR</th>
                                        <th>NAMA PEGAWAI</th>
                                        <th>TGL MASUK</th>
                                        <th>TGL KELUAR</th>
                                        <th>BIAYA</th>
                                    </tr>
                                </thead>
                                <tbody id="tabelLaporan">
<?php
include "php/koneksi.php";

$sql = "
SELECT tabel_transaksi.id_transaksi, tabel_pasien.nama_pasien, tabel_kamar.no_kamar, tabel_pegawai.nama_pegawai, tabel_transaksi.tanggal_masuk, tabel_transaksi.tanggal_keluar, tabel_transaksi.biaya
FROM tabel_transaksi
INNER JOIN tabel_pasien ON tabel_pasien.nik = tabel_transaksi.id_pasien
INNER JOIN tabel_kamar ON tabel_kamar.no_kamar = tabel_transaksi.id_kamar
INNER JOIN tabel_pegawai ON tabel_pegawai.nip = tabel_transaksi.id_pegawai
WHERE tabel_transaksi.biaya <> 0
ORDER BY tabel_transaksi.id_transaksi";

$res = mysql_query($sql);

while ( $row = mysql_fetch_assoc($res)){
?>
                                    <tr>
                                        <td><?php echo $row['id_transaksi']; ?></td>
                                        <td><?php echo $row['nama_pasien']; ?></td>
                                        <td><?php echo $row['no_kamar']; ?></td>
                                        <td><?php echo $row['nama_pegawai']; ?></td>
                                        <td><?php echo $row['tanggal_masuk']; ?></td>
                                        <td><?php echo $row['tanggal_keluar']; ?></td>
                                        <td><?php echo $row['biaya']; ?></td>
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

    <script type="text/javascript">
        $(document).ready(function() {

            $("#cari").on("keyup", function(){
                //Ambil data dari input dgn id="cari"
                var value = $(this).val().toLowerCase();

                $("#tabelLaporan tr").filter(function() {

                    //Jika tidak sesuai, maka toggle (hide)
                    //Jika sesuai, maka toggle (show)
                    $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1);
                });
            });
        });
    </script>

</body>
</html>
