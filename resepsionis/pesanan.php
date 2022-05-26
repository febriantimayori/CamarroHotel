<?php 
  session_start();
    // cek apakah yang mengakses halaman ini sudah login
  if($_SESSION['level']==""){
    header("location:index.php?pesan=gagal");
  }
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
  <title>CAMARRO HOTEL | DATA PESANAN</title>
  <link rel="icon" type="image/png" href="../assets/gambar/icon.png">

  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome Icons -->
  <link rel="stylesheet" href="../assets/plugins/fontawesome-free/css/all.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="../assets/dist/css/adminlte.min.css">
</head>
<body class="hold-transition layout-top-nav layout-navbar-fixed">
<div class="wrapper">

  <!-- Navbar -->
  <nav class="main-header navbar navbar-expand-md navbar-light navbar-white">
    <div class="container">
      <a href="index.php" class="navbar-brand">
        <img src="../assets/gambar/icon.png">
        <span class="brand-text font-weight-light">CAMARRO HOTEL</span>
      </a>

      <button class="navbar-toggler order-1" type="button" data-toggle="collapse" data-target="#navbarCollapse" aria-controls="navbarCollapse" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>

      <div class="collapse navbar-collapse order-3" id="navbarCollapse">
        <!-- Left navbar links -->
        <ul class="navbar-nav">
          <li class="nav-item">
            <a href="index.php" class="nav-link">Dashboard</a>
          </li>
          <li class="nav-item">
            <a href="pesanan.php" class="nav-link">Pesanan</a>
          </li>
        </ul>
        <div class="navbar-nav ml-auto">
          <ul class="navbar-nav">
            <li class="nav-item">
              <a href="logout.php" class="nav-link" onclick="return confirm('Yakin ingin Logout?')">Logout</a>
            </li>
          </ul>
        </div>
      </div>
    </div>
  </nav>
  <!-- /.navbar -->

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Data Pesanan</h1>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <div class="content">
      <div class="container">
        <div class="col-md-12">
          <div class="card card-outline card-info">
            <div class="card-body">
              <table class="table table-bordered">
                <ol class="breadcrumb float-sm-right" style="background-color: #fff;">
                  <li class="breadcrumb-item">
                    <form class="form-inline ml-0 ml-md-3">
                      <div class="input-group input-group-sm">
                        <input class="form-control form-control-navbar" id="myInput" type="search" placeholder="Cari" aria-label="Search">
                        <div class="input-group-append">
                          <button class="btn btn-sm btn-dark" type="submit"><i class="fas fa-search"></i></button>
                        </div>
                      </div>
                    </form>
                  </li>
                </ol>
                <thead>
                <tr>
                  <th style="width: 10px">NO</th>
                  <th>Nama Tamu</th>
                  <th>Tanggal Check In</th>
                  <th>Tanggal Check Out</th>
                  <th>Jumlah Kamar</th>
                  <th>Tipe Kamar</th>
                  <th>Status</th>
                  <th>Aksi</th>
                </tr>
                </thead>
                <tbody id="myTable">
                  <?php 
                    include '../koneksi.php';
                    $no = 1;
                    $data = mysqli_query($koneksi, "select * from pesanan");
                    while($d = mysqli_fetch_array($data)){
                  ?>
                    <tr>
                      <td><?php echo $no++; ?></td>
                      <td><?php echo $d['nama_tamu']; ?></td>
                      <td><?php echo $d['check_in']; ?></td>
                      <td><?php echo $d['check_out']; ?></td>
                      <td><?php echo $d['jml_kamar']; ?></td>
                    <td>
                        <?php
                        $kamar = mysqli_query($koneksi, "select * from kamar");
                        while ($a = mysqli_fetch_array($kamar)) {
                          if ($a['id_kamar'] == $d['id_kamar']) { ?>
                            <?php echo $a['tipe_kamar']; ?>
                            <?php
                          }
                        }
                        ?>
                      </td>
                      <td>
                        <?php
                        if ($d['status'] == 1) { ?>
                          <span class="badge bg-warning">Belum di Konfirmasi</span>
                        <?php } else { ?>
                          <span class="badge bg-success">Sudah di Konfirmasi</span>
                        <?php } ?>
                      </td>
                      <td>
                        <form action="aksi_konfirmasi.php" method="POST">
                          <input type="hidden" name="id_pesanan" value="<?php echo $d['id_pesanan']; ?>">
                          <input type="hidden" name="status" value="2">
                          <button class="btn btn-sm btn-info mb-2">Konfirmasi</button>
                        </form>
                        <a href="checkout.php?id_pesanan=<?php echo $d['id_pesanan'];?>" class="btn btn-sm btn-secondary">Check out</a>
                      </td>
                    </tr>
                  <?php 
                  } 
                  ?>
                </tbody>
                
              </table> 
            </div>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->

  <!-- Control Sidebar -->
  <aside class="control-sidebar control-sidebar-dark">
    <!-- Control sidebar content goes here -->
  </aside>
  <!-- /.control-sidebar -->
</div>
<!-- ./wrapper -->

<!-- REQUIRED SCRIPTS -->

<!-- jQuery -->
<script src="../assets/plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap 4 -->
<script src="../assets/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- AdminLTE App -->
<script src="../assets/dist/js/adminlte.min.js"></script>

<script>
  $(document).ready(function(){
    $("#myInput").on("keyup", function() {
      var value = $(this).val().toLowerCase();
      $("#myTable tr").filter(function() {
        $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
      });
    });
  });
  </script>
</body>
</html>