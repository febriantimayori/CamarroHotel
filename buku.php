<?php
include 'koneksi.php';
?>
<!DOCTYPE html>
<!--
This is a starter template page. Use this page to start your new project from
scratch. This page gets rid of all links and provides the needed markup only.
-->
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="shortcut icon" type="icon" href="assets/images/favicon.ico" />
  <title>CAMARRO HOTEL | BOOKING</title>
  <link rel="icon" type="image/png" href="assets/gambar/icon.png">

  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome Icons -->
  <link rel="stylesheet" href="assets/plugins/fontawesome-free/css/all.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="assets/dist/css/adminlte.min.css">
</head>

<body class="hold-transition sidebar-collapse layout-top-nav layout-navbar-fixed layout-footer-fixed" style= "background-color: #f8f9fa;">
  <div class="wrapper">
  <!-- Navbar -->
  <nav class="main-header navbar navbar-expand-md navbar-light navbar-white">
    <div class="container">
      <a href="index.php" class="navbar-brand">
        <img src="assets/gambar/icon.png">
        <span class="brand-text font-weight-light">CAMARRO HOTEL</span>
      </a>

      <button class="navbar-toggler order-1" type="button" data-toggle="collapse" data-target="#navbarCollapse" aria-controls="navbarCollapse" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>

      <div class="collapse navbar-collapse order-3" id="navbarCollapse">
        <!-- Left navbar links -->
        <ul class="navbar-nav">
          <li class="nav-item">
            <a href="index.php" class="nav-link">Home</a>
          </li>
          <li class="nav-item">
            <a href="kamar.php" class="nav-link">Kamar</a>
          </li>
          <li class="nav-item">
            <a href="fasilitas.php" class="nav-link">Fasilitas Hotel</a>
          </li>
        </ul>
      </div>
    </div>
  </nav>
  <!-- /.navbar -->

    <!-- Main Sidebar Container -->
    <br /><br />
    <br /><br />
    <!-- Content Wrapper. Contains page content -->

  <div class="content">
    <div class="content-header">
      <div class="container">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0"> CAMARRO HOTEL | BOOKING</h1>
            <br />
          </div>
        </div>
      </div>
    </div>
    <div class="container">
      <div class="col-md-12">
        <div class="card" style="background-color: #DEDEDA;">
          <div class="card-body">
            <div class="row">
              <?php
                if (isset($_GET['nama_pemesan'])) {
                  $nama_pemesan = ($_GET['nama_pemesan']);
                  $query = "SELECT * FROM pesanan WHERE nama_pemesan='$nama_pemesan'";
                  $hasil = mysqli_query($koneksi, $query);
                  if (!$hasil) {
                    die("Query Error: ".mysqli_error($koneksi). "-".mysqli_error($koneksi));
                  }
                    $no=1;
                }
                  while ($row = mysqli_fetch_assoc($hasil)) {
              ?>
                <div class="col-sm-12">
                  <div class="card" style="color: #46433b;">
                    <div class="card-body">
                      <p>Nama Pemesan : <?php echo $row['nama_pemesan']; ?></p>
                      <p>Email Pemesan : <?php echo $row['email_pemesan']; ?></p>
                      <p>Hp Pemesan : <?php echo $row['hp_pemesan']; ?></p>
                      <p>Nama Tamu : <?php echo $row['nama_tamu']; ?></p>
                      <p>Tipe Kamar :
                        <?php 
                          $kamar = mysqli_query($koneksi, "select * from kamar");
                          while ($a = mysqli_fetch_array($kamar)) {
                            if ($a['id_kamar'] == $row['id_kamar']) { 
                        ?>
                        <?php echo $a['tipe_kamar']; ?>
                        <?php
                          }
                        }?>
                      </p>
                      <a href="cetak.php?id_pesanan=<?php echo $row['id_pesanan']; ?>" class="btn btn-sm btn-info" style="color:white; float:right;">
                        <i class="fa fa-sticky-note"></i> &nbsp Check Details</a>
                    </div>
                  </div>
                </div>
              <?php $no++; } ?>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  <!-- REQUIRED SCRIPTS -->

  <!-- jQuery -->
  <script src="assets/plugins/jquery/jquery.min.js"></script>
  <!-- Bootstrap 4 -->
  <script src="assets/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
  <!-- AdminLTE App -->
  <script src="assets/dist/js/adminlte.min.js"></script>
</body>

</html>