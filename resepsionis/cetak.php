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
  <title>CAMARRO HOTEL | CETAK PRINT DATA</title>
  <link rel="icon" type="image/png" href="../assets/gambar/icon.png">

  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome Icons -->
  <link rel="stylesheet" href="../assets/plugins/fontawesome-free/css/all.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="../assets/dist/css/adminlte.min.css">
  <link rel="stylesheet" href="../assets/dist/css/style.css">
</head>
<link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" />

<div class="page-content container">
  <div class="container px-0">
    <div class="row mt-4">
      <div class="col-12 col-lg-12">
        <div class="row">
          <div class="col-12">
            <div class="text-center text-150">
              <!-- <i class="fa fa-book fa-2x text-success-m2 mr-1"></i> -->
              <img src="../assets/gambar/icon.png">
              <span class="text-default-d3">CETAK BUKTI RESERVASI | CAMARRO HOTEL</span>
              <!-- <h5 class="text-secondary-d1 px-4 mt-3 mt-lg-0">Thank you</h5> -->
            </div>
          </div>
        </div>
        <!-- .row -->
        <hr class="row brc-default-l1 mx-n1 mb-4" />
        <div class="mt-4">
          <div class="row text-600 text-white bgc-default-tp1 py-25">
            <div class="d-none d-sm-block col-1">NO</div>
            <div class="d-none d-sm-block col-2">Nama</div>
            <div class="d-none d-sm-block col-2">Check In</div>
            <div class="d-none d-sm-block col-2">Check Out</div>
            <div class="d-none d-sm-block col-2">Jumlah Kamar</div>
            <div class="d-none d-sm-block col-2">Tipe Kamar</div>
            <div class="d-none d-sm-block col-1">Harga</div>
          </div>
            <?php
              include '../koneksi.php';
              $no = 1;
              $id_pesanan = $_GET['id'];
              $data = mysqli_query($koneksi, "select * from pesanan inner join kamar on pesanan.id_kamar=kamar.id_kamar where pesanan.id_pesanan=$id_pesanan");
              while($d = mysqli_fetch_array($data)){
                $harga= $d['harga'] * $d['jml_kamar']
            ?>
            <div class="text-95 text-secondary-d3">
              <div class="row mb-2 mb-sm-0 py-25">
                <div class="d-none d-sm-block col-1"><?php echo $no++; ?></div>
                <div class="d-none d-sm-block col-2"><?php echo $d['nama_tamu']; ?></div>
                <div class="d-none d-sm-block col-2"><?php echo $d['check_in']; ?></div>
                <div class="d-none d-sm-block col-2"><?php echo $d['check_out']; ?></div>
                <div class="d-none d-sm-block col-2"><?php echo $d['jml_kamar']; ?></div>
                <div class="d-none d-sm-block col-2"><?php echo $d['tipe_kamar']; ?></div>
                <div class="d-none d-sm-block col-1">Rp. <?php echo $d['harga']; ?></div>
              </div>
            </div>
            <hr />
            <div class="row mt-3">
              <div class="col-12 col-sm-7 text-grey-d2 text-95 mt-2 mt-lg-0">
                <!-- Extra note such as company or payment information... -->
              </div>
                <div class="col-12 col-sm-5 text-grey text-90 order-first order-sm-last">
                  <div class="row my-2">
                      <div class="col-7 text-right">
                        Total :
                      </div>
                      <div class="col-5">
                        <span class="text-120 text-secondary-d1">Rp. <?php echo $harga; ?></span>
                      </div>
                  </div>
                </div>
            </div>
            <div class="text-center text-250">
              <h6 class="text-secondary-d1 px-4 mt-4">"Print halaman ini dan tunjukkan kepada resepsionis saat akan check-in." </h6>
            </div>
            <div class="text-center text-150">
              <h6 class="text-secondary-d1 px-4 mt-5">Terima kasih telah memilih hotel kami sebagai tempat tinggal Bapak/Ibu dan kami tunggu kedatangan Bapak/Ibu kembali di Camarro Hotel. </h6>
            </div>
            <?php 
              } 
            ?>
        </div>
      </div>
    </div>
  </div>
  <div>
    <!-- <span class="text-secondary-d1 px-4 float-right mt-3 mt-lg-0">Thank you</span> -->
    <a href="pesanan.php" class="btn btn-sm btn-info btn-bold-d1 mt-5 text-105"><i class="fa fa-arrow-left" aria-hidden="true"></i> Back</a>
  </div>
</div>
  <script>
		window.print();
	</script>

<!-- REQUIRED SCRIPTS -->

<!-- jQuery -->
<script src="../assets/plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap 4 -->
<script src="../assets/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- AdminLTE App -->
<script src="../assets/dist/js/adminlte.min.js"></script>
</body>
</html>