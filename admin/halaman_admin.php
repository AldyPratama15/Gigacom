<!DOCTYPE html>
<html lang="en">

<?php
session_start();
if ( !isset($_SESSION['username']) ){
    header("location:login.php");
}else {
    header("location:menu_pasien_admin.php");
}
?>

<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Admin | SIRINA</title>

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
                        <li><a class="active" href="halaman_admin.php"><i class="fa fa-home fa-fw"></i> Home</a></li>
                        <li><a href="menu_pasien_admin.php"><i class="fa fa-child fa-fw"></i> Pasien</a></li>
                        <li><a href="menu_kamar_admin.php"><i class="fa fa-bed fa-fw"></i> Kamar</a></li>
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
                    <h1 class="page-header">Halaman Admin</h1>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-12">
                    
                </div>
            </div>
        </div>
    </div>
</body>
</html>
