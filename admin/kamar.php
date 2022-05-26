<?php
include '../koneksi.php';
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
  <title>CAMARRO HOTEL | DATA KAMAR</title>
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
      <a href="" class="navbar-brand">
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
            <a href="kamar.php" class="nav-link">Kamar</a>
          </li>
          <!-- <li class="nav-item">
            <a href="fasilitas.php" class="nav-link">Fasilitas Kamar</a>
          </li> -->
          <li class="nav-item">
            <a href="galeri.php" class="nav-link">Fasilitas Hotel</a>
          </li>
          <li class="nav-item">
            <a href="users.php" class="nav-link">Users</a>
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
            <h1 class="m-0">Data Kamar</h1>
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
            <div class="card-header">
              <button class="btn btn-sm btn-info" data-toggle="modal" data-target="#tambah">Tambah</button>
            </div>
            <div class="card-body">  
              <table class="table table-bordered">
                <thead>
                  <tr>
                    <th style="width: 10px">NO</th>
                    <th>Tipe Kamar</th>
                    <th>Fasilitas</th>
                    <th>Harga</th>
                    <th>Stok Kamar</th>
                    <th>Foto</th>
                    <th>Aksi</th>
                  </tr>
                </thead>
                <tbody>
                  <?php
                  $query = "SELECT * FROM kamar ORDER BY id_kamar ASC";
                  $result = mysqli_query($koneksi, $query);
                  if (!$result) {
                    die("Query Error: ".mysqli_errno($koneksi). " - ".mysqli_error($koneksi));
                  }

                  $no = 1;

                  while ($row = mysqli_fetch_assoc($result)) { 
                  ?>
                  <tr>
                    <td><?php echo "$no"; ?></td>
                    <td><?php echo $row['tipe_kamar']; ?></td>
                    <td><?php echo $row['fasilitas']; ?></td>
                    <td>Rp. <?php echo $row['harga']; ?></td>
                    <td><?php echo $row['stock']; ?></td>
                    <td>
                      <img class="d-block" src="gambar/<?php echo $row['foto']; ?>" width="300">
                    </td>
                    <td>
                      <a href="edit_kamar.php?id_kamar=<?php echo $row['id_kamar']; ?>" class="btn btn-sm btn-warning mb-2">Edit</a>
                      <a href="hapus_kamar.php?id_kamar=<?php echo $row['id_kamar']; ?>" class="btn btn-sm btn-danger" onclick="return confirm('Anda yakin akan menghapus data ini?')">Hapus</a>
                    </td>
                  </tr>
                  <?php $no++; } ?>
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

  <div class="modal fade" id="tambah">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h4 class="modal-title">Tambah Data Kamar</h4>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          <form method="post" action="tambah_kamar.php" enctype="multipart/form-data">
            <div class="form-group">
              <label>Tipe Kamar</label>
              <input type="text" class="form-control" name="tipe_kamar" placeholder="Tipe Kamar">
            </div>
            <div class="form-group">
              <label>Fasilitas</label>
              <input type="text" class="form-control" name="fasilitas" placeholder="Fasilitas">
            </div>
            <div class="form-group">
              <label>Harga</label>
              <input type="text" name="harga" class="form-control" placeholder="Harga">
            </div>
            <div class="form-group">
              <label>Foto Kamar</label>
              <input type="file" name="foto" class="form-control">
            </div> 
        </div>
            <div class="modal-footer justify-content-between">
              <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
              <button type="submit" class="btn btn-info">Simpan</button>
            </div>
          </form>
      </div>
      <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
  </div>
</body>
</html> 