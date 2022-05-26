<?php
include '../koneksi.php';
session_start();
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
  <link rel="shortcut icon" type="icon" href="../assets/images/favicon.ico" />
  <title>CAMARRO HOTEL | CHECKOUT</title>
  <link rel="icon" type="image/png" href="../assets/gambar/icon.png">

  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome Icons -->
  <link rel="stylesheet" href="../assets/plugins/fontawesome-free/css/all.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="../assets/dist/css/adminlte.min.css">
</head>

<body class="hold-transition sidebar-collapse layout-top-nav layout-navbar-fixed layout-footer-fixed" style= "background-color: #f8f9fa;">
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
            <a href="index.php" class="nav-link">Home</a>
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

    <!-- Main Sidebar Container -->
    <br /><br />
    <br /><br />
    <!-- Content Wrapper. Contains page content -->

  <div class="content">
    <div class="content-header">
      <div class="container">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0"> CAMARRO HOTEL | CHECKOUT</h1>
            <br />
          </div>
        </div>
      </div>
    </div>
    <div class="container">
      <div class="col-md-12">
        <div class="card" style="background-color: #DEDEDA; vertical-align: middle;">
          <div class="card-body">
            <br /><br>
            <?php
              include '../koneksi.php';
              $id_pesanan = $_GET['id_pesanan'];
              $data = mysqli_query($koneksi, "SELECT * FROM pesanan WHERE id_pesanan='$id_pesanan'");
              while ($d = mysqli_fetch_array($data)) {
            ?>

            <form action="proses_checkout.php" method="post">
              <div class="form-group">
                <label>Tanggal Check-in</label>
                <input type="text" name="id_pesanan" value="<?php echo $d['id_pesanan']; ?>" class="form-control" hidden>
                <input type="date" name="check_in" value="<?php echo $d['check_in']; ?>" class="form-control" required readonly>
              </div>
              <div class="form-group">
                <label>Tanggal Check-out</label>
                <input type="date" name="check_out" value="<?php echo $d['check_out']; ?>" class="form-control" required readonly>
              </div>
              <div class="form-group">
                <label>Jumlah Kamar</label>
                <input type="text" name="qty" class="form-control" placeholder="Jumlah Kamar" value="<?php echo $d['jml_kamar']; ?>" required readonly>
              </div>
              <div class="form-group">
                <label>Nama Pemesan</label>
                <input type="text" name="nama_pemesan" class="form-control" placeholder="Masukkan Nama Pemesan" value="<?php echo $d['nama_pemesan']; ?>" required readonly>
              </div>
              <div class="form-group">
                <label>Email Pemesan</label>
                <input type="text" name="email_pemesan" class="form-control" placeholder="Masukan Email Pemesan" value="<?php echo $d['email_pemesan']; ?>" required readonly>
              </div>
              <div class="form-group">
                <label>No. Handphone</label>
                <input type="text" name="hp_pemesan" class="form-control" placeholder="Masukan No. Handphone" value="<?php echo $d['hp_pemesan']; ?>" required readonly>
              </div>
              <div class="form-group">
                <label>Nama Tamu</label>
                <input type="text" name="nama_tamu" class="form-control" placeholder="Masukan Nama Tamu" value="<?php echo $d['nama_tamu']; ?>" required readonly>
              </div>
              <div class="form-group">
                <label>Tipe Kamar</label>
                <input type="hidden" name="id_pesanan" value="<?php echo $d['id_pesanan']; ?>">
                  <select name="id_kamar" class="form-control" readonly>
                    <option value = "">--- Pilih Kamar ---</option>
                    <?php
                      $kamar = mysqli_query($koneksi, "SELECT * FROM kamar");
                      while ($a = mysqli_fetch_array($kamar)) {
                          if ($a['id_kamar'] == $d['id_kamar']) { ?>
                      <option value="<?php echo $a['id_kamar']; ?>" selected>
                          <?php echo $a['tipe_kamar']; ?></option>;
                      <?php }else{?>
                      <option value="<?php echo $a['id_kamar']; ?>">
                          <?php echo $a['tipe_kamar']; ?></option>;
                    <?php }
                    }
                    ?>
                  </select>
              </div>
          </div>
            <div class="modal-footer justify-content-between">
              <button type="submit" class="btn btn-sm btn-info" name="tambahkamarcheckout">Checkout</button>
            </div>
        </div>
          </form>
          <?php } ?>
          <br>
      </div>
    </div>
  </div>
  <!-- REQUIRED SCRIPTS -->

  <!-- jQuery -->
  <script src="../assets/plugins/jquery/jquery.min.js"></script>
  <!-- Bootstrap 4 -->
  <script src="../assets/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
  <!-- AdminLTE App -->
  <script src="../assets/dist/js/adminlte.min.js"></script>
</body>

</html>