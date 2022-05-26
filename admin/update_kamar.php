<?php
include '../koneksi.php';
$id_kamar = $_POST['id_kamar'];
$tipe_kamar = $_POST['tipe_kamar'];
$fasilitas = $_POST['fasilitas'];
$harga = $_POST['harga'];
$foto = $_FILES['foto']['name'];
$qty = $_POST['qty'];

if($foto != "") {
  $ekstensi_diperbolehkan = array('png','jpg');
  $x = explode('.', $foto);
  $ekstensi = strtolower(end($x));
  $file_tmp = $_FILES['foto']['tmp_name'];   
  $angka_acak = rand(1,999);
  $nama_gambar_baru = $angka_acak.'-'.$foto;
  if(in_array($ekstensi, $ekstensi_diperbolehkan) === true)  {
    move_uploaded_file($file_tmp, 'gambar/'.$nama_gambar_baru);
    $query = "UPDATE kamar SET tipe_kamar = '$tipe_kamar', fasilitas = '$fasilitas', harga = '$harga', foto = '$nama_gambar_baru'";
    $query .= "WHERE id_kamar = '$id_kamar'";
    $result = mysqli_query($koneksi, $query);
    if(!$result){
      die ("Query gagal dijalankan: ".mysqli_errno($koneksi).
       " - ".mysqli_error($koneksi));
    } else {
      echo "<script>alert('Data berhasil diubah.');window.location='kamar.php';</script>";
    }
  } else {
    echo "<script>alert('Ekstensi gambar yang boleh hanya jpg atau png.');window.location='tambah_produk.php';</script>";
  }
} else {
  $query  = "UPDATE kamar SET tipe_kamar = '$tipe_kamar', fasilitas = '$fasilitas', harga = '$harga'";
  $query .= "WHERE id_kamar = '$id_kamar'";
  $result = mysqli_query($koneksi, $query);
      // periska query apakah ada error
  if(!$result){
    die ("Query gagal dijalankan: ".mysqli_errno($koneksi).
     " - ".mysqli_error($koneksi));
  } else {
    echo "<script>alert('Data berhasil diubah.');window.location='kamar.php';</script>";
  }
}

if(isset($_POST['tambahkamar'])){
  $id_kamar = $_POST['id_kamar'];
  $tipe_kamar = $_POST['tipe_kamar'];

  $cekstocksekarang = mysqli_query($koneksi, "SELECT * FROM kamar WHERE id_kamar='$id_kamar'");
  $ambildata = mysqli_fetch_array($cekstocksekarang);

  $stocksekarang = $ambildata['stock'];
  $tambahkanstocksekarangdenganquantity = $stocksekarang+$qty;

  $addtotambahkamar = mysqli_query($koneksi,"INSERT INTO tambah_kamar (id_kamar,qty) VALUES ('$id_kamar','$qty')");
  $updatestockkamar = mysqli_query($koneksi,"UPDATE kamar set stock = '$tambahkanstocksekarangdenganquantity' where id_kamar='$id_kamar'");

  if ($addtotambahkamar&&$updatestockkamar) {
      echo "<script>alert('Stock berhasil ditambah.');window.location='kamar.php';</script>";
  } else {
      echo "<script>alert('Stock gagal ditambah.');window.location='kamar.php';</script>";
  }
}