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
  <title>Transaksi Keluar | SIRINA</title>
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
        Tip 1: You can change the color of the sidebar using: data-color="purple | azure | green | orange | danger"
        Tip 2: you can also add an image using data-image tag-->
      <div class="logo">
        <a class="simple-text logo-normal">
          <i class="fa fa-th-list fa-fw"></i>
          MENU
        </a>
      </div>
      <div class="sidebar-wrapper">
        <ul class="nav">
          <li class="nav-item  ">
            <a class="nav-link" href="index.php">
              <i class="fa fa-th-large fa-fw"></i>
              <center><p>BERANDA</p></center>
            </a>
          </li>
          <li class="nav-item active ">
            <a class="nav-link" href="menu_transaksi.php">
              <i class="fa fa-bar-chart-o fa-fw"></i>
              <center><p>TRANSAKSI</p></center>
            </a>
          </li>
          <li class="nav-item ">
            <a class="nav-link" href="menu_pasien.php">
              <i class="fa fa-tasks fa-fw"></i>
              <center><p>PASIEN</p></center>
            </a>
          </li>
          <li class="nav-item ">
            <a class="nav-link" href="menu_lihat_kamar.php">
              <i class="fa fa-briefcase fa-fw"></i>
              <center><p>KAMAR</p></center>
            </a>
          </li>
          <li class="nav-item ">
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
          <div class="navbar-wrapper">
            <a class="navbar-brand" href="#">SIRINA - SISTEM INFORMASI RAWAT INAP</a>
          </div>
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
                  <h4 class="card-title">Transaksi Keluar</h4>
                  <p class="card-category">Untuk Transaksi Pasien Keluar / Sembuh</p>
                </div>
                <div class="card-body">
                  <form method="POST" action="php/transaksiKeluar.php" id="formbayar">
<?php
include "php/koneksi.php";

if ( isset($_GET['id']) ){
$res = mysql_query("SELECT * FROM tabel_transaksi WHERE id_transaksi = '". $_GET['id']. "'");
while ( $row = mysql_fetch_assoc($res) ) {
?>
                  <table class="table table-bordered">
                      <tr>
                          <td>Id Transaksi</td>
                          <td>
                              <?php echo $row['id_transaksi'];?>
                              <input type="hidden" name="id_transaksi" id="id_transaksi" value="<?php echo $row['id_transaksi'];?>">
                          </td>
                      </tr>
                      <tr>
                          <td>NIK Pasien</td>
                          <td>
                              <?php echo $row['id_pasien'];?>
                              <input type="hidden" name="id_pasien" value="<?php echo $row['id_pasien'];?>">
                          </td>
                      </tr>
                      <tr>
                          <td>No Kamar</td>
                          <td>
                              <?php echo $row['id_kamar'];?>
                              <input type="hidden" name="id_kamar" id="id_kamar" value="<?php echo $row['id_kamar'];?>">
                          </td>
                      </tr>
                      <tr>
                          <td>NIP Pegawai</td>
                          <td>
                              <?php echo $row['id_pegawai'];?>
                              <input type="hidden" name="id_pegawai" value="<?php echo $row['id_pegawai'];?>">
                          </td>
                      </tr>
                      <tr>
                          <td>Tanggal Masuk</td>
                          <td>
                              <?php echo $row['tanggal_masuk'];?>
                              <input type="hidden" name="tgl_masuk" id="tgl_masuk" value="<?php echo $row['tanggal_masuk'];?>">
                          </td>
                      </tr>
                      <tr>
                          <td>Tanggal Keluar</td>
                          <td>
                              <input class="form-control" type="date" name="tgl_keluar" title="Tanggal Keluar" id="tgl_keluar">
                          </td>
                      </tr>
                      <tr>
                          <td>Biaya Total</td>
                          <td>
                              <input class="form-control biaya" type="text" id="biaya" placeholder="Biaya" disabled>
                              <input type="hidden" name="biaya" class="biaya" id="biaya">
                          </td>
                      </tr>
                      <tr>
                          <td>Bayar</td>
                          <td>
                              <input class="form-control" type="text" id="bayar" name="bayar" placeholder="Bayar">
                          </td>
                      </tr>
                      <tr>
                          <td>Kembalian</td>
                          <td>
                              <input class="form-control kembalian" type="text" id="kembalian" placeholder="Kembalian" disabled>
                              <input type="hidden" name="kembalian" class="kembalian" id="kembalian">
                          </td>
                      </tr>
                  </table><br>
                  <button class="btn btn-success" type="submit" id="konfirmasi" name="konfirmasi" disabled>Konfirmasi</button>
                  <a class="btn btn-danger" href="menu_transaksi.php"><i class="fa fa-left-arrow"></i> Batal</a>
<?php
}
mysql_close();
}
?>
                  </form>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
    
  <!--   Core JS Files   -->
  <script src="libs/assets/js/core/jquery.min.js"></script>
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
    function pembayaran(){
      totalBiaya = $(".biaya").val();
      bayar = $("#bayar").val();
      kembalian = bayar - totalBiaya;

      $(".kembalian").val(kembalian);
      if (bayar >= totalBiaya && kembalian >= 0){
        $("#konfirmasi").prop('disabled', false);
      }else {
        $("#konfirmasi").prop('disabled', true);
      }
    }

    function jumlahBiayaHari(){
      no_kamar_pasien = $("#id_kamar").val();

      tg_masuk = new Date($("#tgl_masuk").val());
      tg_keluar = new Date($("#tgl_keluar").val());
      // Waktu milisecond dalam sehari
      sehari = 24*60*60*1000;
      jumlah_hari = Math.round((tg_keluar.getTime() - tg_masuk.getTime()) / sehari);

      // Ajax untuk mengirim tanggal keluar melalui id_transaksi
      $.ajax({
        type : 'post',
        url : 'php/lihatBiaya.php',
        data :  'noka='+ no_kamar_pasien,
        success : function(data){
          // Jika proses berhasil, langsung masukkan ke form biaya
          // Enable "biaya" terlebih dahulu
          jumlahBiaya = data * jumlah_hari;
          $(".biaya").val(jumlahBiaya);
        }
      });
    }

    $(document).ready(function() {

      $("#tgl_keluar").change(function() {
        jumlahBiayaHari();
        if($('#bayar').val() != ""){
          pembayaran();
        }
      });

      $("#bayar").on("keyup", function(){
        pembayaran();
        //jumlahBiayaHari();
      });

    });
  </script>
</body>

</html>
