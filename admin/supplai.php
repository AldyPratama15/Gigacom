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
  <title>Suplai | Gigacom</title>
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
          <li class="nav-item ">
            <a class="nav-link" href="menu_transaksi.php">
              <i class="fa fa-bar-chart-o fa-fw"></i>
              <center><p>TRANSAKSI</p></center>
            </a>
          </li>
          <li class="nav-item active ">
            <a class="nav-link" href="supplai.php">
              <i class="fa fa-tasks fa-fw"></i>
              <center><p>SUPLAI</p></center>
            </a>
          </li>
          <li class="nav-item ">
            <a class="nav-link" href="lihat_inventori.php">
              <i class="fa fa-briefcase fa-fw"></i>
              <center><p>INVENTORI</p></center>
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
            <a class="navbar-brand" href="#">SISTEM INFORMASI INVENTORI</a>
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
                  <h4 class="card-title ">Data Suplai</h4>
                  <p class="card-category">Tambah Suplai untuk stok update</p>
                </div>
                <div class="card-body">
                  <button type="button" class="btn btn-success pull-left" data-toggle="modal" data-target="#modalTambah">
                      <i class="fa fa-plus fa-fw"></i>
                      Tambah Data
                  </button>
                  <div class="table-responsive">
                    <input type="text" id="cari" placeholder="Cari Data . . ." class="form-control" style="width: 200px; margin-top:7px; margin-left:0px;">
                    <table class="table table-hover">
                      <thead class=" text-primary">
                        <tr>
                          <th>Id</th>
                          <th>Nama Barang</th>
                          <th>Stok</th>
                          <th>Tanggal beli</th>
                          <th>Penanggung Jawab</th>
                         
                     
                        </tr>
                      </thead>
                      <tbody id="tabelPasien">
<?php
include "php/koneksi.php";

$res = mysql_query("SELECT * FROM viewsupplai ORDER BY id_supplai ASC");
                

while ($row = mysql_fetch_array($res)){
?>
                        <tr>
                          <td><?php echo $row['id_supplai'];?></td>
                          <td><?php echo $row['namabarang'];?></td>
                          <td><?php echo $row['stokbarang'];?></td>
                           <td><?php echo $row['tanggalbeli'];?></td>
                          <td><?php echo $row['namapegawai'];?></td>
                        
                          
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

  <div class="modal fade" id="modalTambah" tabindex="-1" aria-labelledby="modalTambahLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <form method="POST" action="php/tambah_supplai.php">
          <div class="modal-header"><b>Tambah Suplai</b></div>
          <div class="modal-body">
            <!-- <div class="form-group">
              <label>Id</label>
              <input class="form-control" type="text" name="id">
            </div> -->
             <div class="form-group">
              <label>Pilih Barang</label>
              <select class="form-control" name="id_barang">
             <?php
             include "php/koneksi.php";
              $res = mysql_query("SELECT * FROM inventori ORDER BY id_barang");
              echo $res;
              while ( $row = mysql_fetch_assoc($res) ){
              ?>
                <option value="<?php echo $row['id_barang'];?>"><?php echo $row['stok']. " : ". $row['nama_barang'];?></option>
              <?php
              }
              ?>
              </select>
            </div><br>
          
            <div class="form-group">
              <label>Stok</label>
              <input class="form-control" type="number" name="stok" required>
            </div>
            <br>
              <div class="form-group">
              <label>Tanggal Beli</label><br>
              <input class="form-control" type="text" name="tanggal" value="<?php echo date('Y-m-d');?>" readonly>
            </div><br>
              <div class="form-group">
              <label>Penanggung Jawab</label><br>
<?php
$res = mysql_query("SELECT id_pegawai FROM pegawai WHERE username ='". $_SESSION['username']. "'");
while ( $row = mysql_fetch_assoc($res) ){
?>
          <input class="form-control" name="id_pegawai" type="text" value="<?php echo $row['id_pegawai'];?>" readonly>
<!--                 <input type="hidden" name="id_pegawai" value="<?php echo $row['nip'];?>">
 --><?php
}
mysql_close();
?>
            </div>
          </div>
          <div class="modal-footer">
            <input class="btn btn-success" type="submit" name="tambahkan" value="Tambah">
            <input class="btn btn-danger" type="reset" data-dismiss="modal" value="Batal">
           
          </div>
        </form>
      </div>
    </div>
  </div>

  <div class="modal fade" id="modalUbah" tabindex="-1" aria-labelledby="modalUbahLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <form method="POST" action="php/ubahPasien.php">
          <div class="modal-header">
            <b class="modal-title" id="modalUbahLabel">Ubah Data</b>
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

          $("#tabelPasien tr").filter(function() {

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
              url : 'php/detailPasien.php',
              data :  'idx='+ idx,
              success : function(data){
              $('.hasil-data').html(data);//menampilkan data ke dalam modal
              }
          });

        });
			});
    </script>
  </body>

</html>
