<!DOCTYPE html>
<?php
session_start();
if ( !isset($_SESSION['username']) ){
    header("location:login.php");
}
?>
<html lang="en">

<head>
  <meta charset="utf-8" />
  <link rel="apple-touch-icon" sizes="76x76" href="libs/assets/img/apple-icon.png">
  
  <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
  <title>Laporan | Gigacom</title>
  <meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0, shrink-to-fit=no' name='viewport' />
  <!--     Fonts and icons     -->
  <link rel="stylesheet" type="text/css" href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700|Roboto+Slab:400,700|Material+Icons" />
  <link rel="stylesheet" href="libs/font-awesome/css/font-awesome.min.css">
  <!-- CSS Files -->
  <link href="libs/assets/css/material-dashboard.css?v=2.1.1" rel="stylesheet" />
  <!-- CSS Just for demo purpose, don't include it in your project -->
  <link href="libs/assets/demo/demo.css" rel="stylesheet" />
</head>

<body class="">
  <div class="wrapper ">
    <div class="sidebar" data-color="purple" data-background-color="white" data-image="libs/assets/img/sidebar-1.jpg">
      <!--
        Tip 1: Change the sidebar color using: data-color="purple | azure | green | orange | danger"
        Tip 2: Add an image using data-image tag-->
      <div class="logo">
        <a class="simple-text logo-normal">
        <i class="fa fa-th-list fa-fw"></i>
        MENU
        </a>
      </div>
      <div class="sidebar-wrapper">
        <ul class="nav">
          <li class="nav-item">
            <a class="nav-link" href="index.php">
              <i class="fa fa-th-large fa-fw"></i>
              <center><p>BERANDA</p></center>
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="menu_transaksi.php">
              <i class="fa fa-bar-chart-o fa-fw"></i>
              <center><p>TRANSAKSI</p></center>
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="supplai.php">
              <i class="fa fa-tasks fa-fw"></i>
              <center><p>SUPLAI</p></center>
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="lihat_inventori.php">
              <i class="fa fa-briefcase fa-fw"></i>
              <center><p>INVENTORI</p></center>
            </a>
          </li>
          <li class="nav-item active ">
            <a class="nav-link" href="menu_lihat_laporan.php">
              <i class="fa fa-file-text fa-fw"></i>
              <center><p>LAPORAN</p></center>
            </a>
          </li>
         
          <li class="nav-item ">
            <a class="nav-link" href="menu_lihat_pegawai.php">
              <i class="fa fa-user fa-fw"></i>
              <center><p>PEGAWAI</p></center>
            </a>
          </li>
        
        </ul>
      </div>
    </div>

    <div class="main-panel">
      <!-- Navbar -->
      <nav class="navbar navbar-expand-lg navbar-transparent navbar-absolute fixed-top ">
        <div class="container-fluid">
          <div class="navbar-wrapper"><a class="navbar-brand" href="#">SISTEM INFORMASI INVENTORI</a></div>
         
          <div class="collapse navbar-collapse justify-content-end">         
            <div class="input-group no-border"></div>
            <ul class="navbar-nav">
              <li><?php echo $_SESSION['username'];?></li>
              <li class="nav-item dropdown">
                <a class="nav-link" href="#" id="navbarDropdownProfile" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                  <i class="fa fa-user fa-fw"></i> 
                </a>
                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdownProfile">
                  <a class="dropdown-item" href="php/logout.php">Log out</a>
                </div>
              </li>
            </ul>
          </div>
        </div>
      </nav>
      <!-- End Navbar -->
      <div class="content">
        <div class="container-fluid">
          <div class="row">
            <div class="col-md-12">
              <div class="card">
                <div class="card-header card-header-primary">
                  <h4 class="card-title ">Laporan Transaksi</h4>
                  <p class="card-category">Kumpulan Data Transaksi</p>
                </div>
                <div class="panel-heading">
                <div class="card-body">
                  <div class="form-group">
                    <label>Filter Berdasarkan</label><br>        
                    <select class="form-control" name="filter" id="filter" style="width: 200px;">
                    <option value="">Pilih</option>            
                    <option value="1">Per Tanggal</option>            
                    <option value="2">Per Bulan</option>            
                    <option value="3">Per Tahun</option>        
                  </select>      

                   <div id="form-tanggal" class="form-group">            
                    <label>Tanggal</label><br>            
                    <select class="form-control" name="tanggal" style="width: 70px;">               
                    <option value="">Pilih</option>                
                    <option value="1">1</option>                
                    <option value="2">2</option>                
                    <option value="3">3</option>                
                    <option value="4">4</option>                
                    <option value="5">5</option>                
                    <option value="6">6</option>                
                    <option value="7">7</option>                
                    <option value="8">8</option>                
                    <option value="9">9</option>                
                    <option value="10">10</option>                
                    <option value="11">11</option>                
                    <option value="12">12</option> 
                    <option value="13">13</option>                
                    <option value="14">14</option>                
                    <option value="15">15</option>                
                    <option value="16">16</option>                
                    <option value="17">17</option>                
                    <option value="18">18</option>                
                    <option value="19">19</option>                
                    <option value="20">20</option>                
                    <option value="21">21</option>                
                    <option value="22">22</option>                
                    <option value="23">23</option>                
                    <option value="24">24</option> 
                    <option value="25">25</option>                
                    <option value="26">26</option>                
                    <option value="27">27</option>                
                    <option value="28">28</option>                
                    <option value="29">29</option>                
                    <option value="30">30</option>                
                    <option value="31">31</option>                                  
                  </select>     
                </div>      

                  <div id="form-bulan" class="form-group">            
                    <label>Bulan</label><br>            
                    <select name="bulan" class="form-control" style="width: 100px; ">               
                    <option value="">Pilih</option>                
                    <option value="1">Januari</option>                
                    <option value="2">Februari</option>                
                    <option value="3">Maret</option>                
                    <option value="4">April</option>                
                    <option value="5">Mei</option>                
                    <option value="6">Juni</option>                
                    <option value="7">Juli</option>                
                    <option value="8">Agustus</option>                
                    <option value="9">September</option>                
                    <option value="10">Oktober</option>                
                    <option value="11">November</option>                
                    <option value="12">Desember</option>            
                  </select>     
                </div>
              </div>

                  <!-- <input type="text" id="cari" placeholder="Cari Data . . ." class="form-control" style="width: 200px; margin-top:7px; margin-left:0px;"> -->
                 <!--    <table class="table table-hover">
                      <thead class=" text-primary">
                        <tr>
                          <th>Id Transaksi</th>
                        	<th>Nama Pasien</th>
                          <th>No Kamar</th>
                          <th>Nama Pegawai</th>
                          <th>Tanggal Masuk</th>
                          <th>Tanggal Keluar</th>
                        	<th>Biaya</th>
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
while ($tampil = mysql_fetch_array($res)){
?>   
                        <tr>
                   			  <td><?php echo $tampil['id_transaksi']; ?></td>
                          <td><?php echo $tampil['nama_pasien']; ?></td>
                          <td><?php echo $tampil['no_kamar']; ?></td>
                          <td><?php echo $tampil['nama_pegawai']; ?></td>
                          <td><?php echo $tampil['tanggal_masuk']; ?></td>
                          <td><?php echo $tampil['tanggal_keluar']; ?></td>
                          <td><?php echo $tampil['biaya']; ?></td>
                        </tr>
<?php 
}
mysql_close();
?>
                      </tbody>
                    </table> -->
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
     
  <!--   Core JS Files   -->
  <script src="libs/assets/js/jquery-3.3.1.min.js"></script>
  <script src="libs/assets/js/core/popper.min.js"></script>
  <script src="libs/assets/js/core/bootstrap-material-design.min.js"></script>
  <script src="libs/assets/js/plugins/perfect-scrollbar.jquery.min.js"></script>
  <!-- Plugin for the momentJs  -->
  <script src="libs/assets/js/plugins/moment.min.js"></script>
  <!--  Plugin for Sweet Alert -->
  <script src="libs/assets/js/plugins/sweetalert2.js"></script>
  <!-- Forms Validations Plugin -->
  <script src="libs/assets/js/plugins/jquery.validate.min.js"></script>
  <!-- Plugin for the Wizard, full documentation here: https://github.com/VinceG/twitter-bootstrap-wizard -->
  <script src="libs/assets/js/plugins/jquery.bootstrap-wizard.js"></script>
  <!--	Plugin for Select, full documentation here: http://silviomoreto.github.io/bootstrap-select -->
  <script src="libs/assets/js/plugins/bootstrap-selectpicker.js"></script>
  <!--  Plugin for the DateTimePicker, full documentation here: https://eonasdan.github.io/bootstrap-datetimepicker/ -->
  <script src="libs/assets/js/plugins/bootstrap-datetimepicker.min.js"></script>
  <!--  DataTables.net Plugin, full documentation here: https://datatables.net/  -->
  <script src="libs/assets/js/plugins/jquery.dataTables.min.js"></script>
  <!--	Plugin for Tags, full documentation here: https://github.com/bootstrap-tagsinput/bootstrap-tagsinputs  -->
  <script src="libs/assets/js/plugins/bootstrap-tagsinput.js"></script>
  <!-- Plugin for Fileupload, full documentation here: http://www.jasny.net/bootstrap/javascript/#fileinput -->
  <script src="libs/assets/js/plugins/jasny-bootstrap.min.js"></script>
  <!--  Full Calendar Plugin, full documentation here: https://github.com/fullcalendar/fullcalendar    -->
  <script src="libs/assets/js/plugins/fullcalendar.min.js"></script>
  <!-- Vector Map plugin, full documentation here: http://jvectormap.com/documentation/ -->
  <script src="libs/assets/js/plugins/jquery-jvectormap.js"></script>
  <!--  Plugin for the Sliders, full documentation here: http://refreshless.com/nouislider/ -->
  <script src="libs/assets/js/plugins/nouislider.min.js"></script>
  <!-- Include a polyfill for ES6 Promises (optional) for IE11, UC Browser and Android browser support SweetAlert -->
  <script src="https://cdnjs.cloudflare.com/ajax/libs/core-js/2.4.1/core.js"></script>
  <!-- Library for adding dinamically elements -->
  <script src="libs/assets/js/plugins/arrive.min.js"></script>
  <!--  Google Maps Plugin    -->
  <script src="https://maps.googleapis.com/maps/api/js?key=YOUR_KEY_HERE"></script>
  <!-- Chartist JS -->
  <script src="libs/assets/js/plugins/chartist.min.js"></script>
  <!--  Notifications Plugin    -->
  <script src="libs/assets/js/plugins/bootstrap-notify.js"></script>
  <!-- Control Center for Material Dashboard: parallax effects, scripts for the example pages etc -->
  <script src="libs/assets/js/material-dashboard.js?v=2.1.1" type="text/javascript"></script>
  <!-- Material Dashboard DEMO methods, don't include it in your project! -->
  <script src="libs/assets/demo/demo.js"></script>
  <script type="text/javascript">
    $(document).ready(function() {

      $("#cari").on("keyup", function(){

        //Ambil data dari input dgn id="cari"
        var value = $(this).val().toLowerCase();

        $("#tabelLaporan tr").filter(function() {

            //Jika tidak sesuai, maka toggle (hide)
            //Jika sesuai, maka toggle (show)
            $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)

        });
      });
		});
  </script>
</body>

</html>
