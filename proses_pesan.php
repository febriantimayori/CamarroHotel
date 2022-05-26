<?php 
//Tambahkan Koneksi Databases
include 'koneksi.php';

//menerima data dari form
if(isset($_POST['kamardipesan'])) {
$check_in = $_POST['check_in'];
$check_out = $_POST['check_out'];
$jml_kamar = $_POST['jml_kamar'];
$nama_pemesan = $_POST['nama_pemesan'];
$email_pemesan = $_POST['email_pemesan'];
$hp_pemesan = $_POST['hp_pemesan'];
$nama_tamu = $_POST['nama_tamu'];
$id_kamar = $_POST['id_kamar'];

$cekstocksekarang = mysqli_query($koneksi, "SELECT * FROM kamar WHERE id_kamar='$id_kamar'");
  $ambildata = mysqli_fetch_array($cekstocksekarang);

  $stocksekarang = $ambildata['stock'];

  if ($stocksekarang >= $jml_kamar)    {
    $tambahkanstocksekarangdenganquantity = $stocksekarang-$jml_kamar;
    //mengirim ke databases
    $addtotambahkamar = mysqli_query($koneksi, "insert into pesanan values('','$check_in','$check_out','$jml_kamar','$nama_pemesan','$email_pemesan','$hp_pemesan','$nama_tamu','$id_kamar', '1')");
    $updatestockkamar = mysqli_query($koneksi,"UPDATE kamar set stock = '$tambahkanstocksekarangdenganquantity' where id_kamar='$id_kamar'");

    if ($addtotambahkamar&&$updatestockkamar) {
      echo "<script>window.location='buku.php?nama_pemesan=$nama_pemesan'</script>";

      } else {
      //Sesudah Menginput Di alihkan Ke halaman index
      header("location:index.php");
      }   
  }else{
    echo "<script>alert('Kamar Sudah Full !!'); window.location='index.php';</script>";
  }

    $ambildata = mysqli_fetch_array($cekstocksekarang);
}
?>