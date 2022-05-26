<?php
include '../koneksi.php';

$tipe_kamar = $_POST['tipe_kamar'];
$fasilitas = $_POST['fasilitas'];
$harga = $_POST['harga'];
$foto = $_FILES['foto']['name'];
$stock = $_POST['stock'];

if ($foto !="") {
  $ekstensi_diperbolehkan = array('png', 'jpg', 'jpeg');
  $x = explode('.', $foto);
  $extensi = strtolower(end($x));
  $file_tmp = $_FILES['foto']['tmp_name'];
  $angka_acak = rand(1,999);
  $nama_gambar_baru = $angka_acak.'-'.$foto;
  if (in_array($extensi, $ekstensi_diperbolehkan) === true) {
    move_uploaded_file($file_tmp, 'gambar/'.$nama_gambar_baru);
    $query = "INSERT INTO kamar (tipe_kamar, fasilitas, harga, stock, foto) VALUES ('$tipe_kamar', '$fasilitas', '$harga', '$stock', '$nama_gambar_baru')";
    $result = mysqli_query($koneksi, $query);
    
    if (!$result) {
      die("Query gagal dijalankan : ".mysqli_errno($koneksi)."-".mysqli_error($koneksi));
    } else {
      echo "<script>alert('Data berhasil ditambah.');window.location='kamar.php';</script>";
    }
    
  } else {
    echo "<script>alert('Extensi gambar harus png atau jpg.');window.location='kamar.php';</script>";
  }
    
} else {
  $query = "INSERT INTO kamar (tipe_kamar, fasilitas, harga, stock, foto) VALUES ('$tipe_kamar', '$fasilitas', '$harga', '$stock' null)";
  $result = mysqli_query($koneksi, $query);

  if (!$result) {
    die("Query gagal dijalankan : ".mysqli_errno($koneksi)."-".mysqli_error($koneksi));
  } else {
    echo "<script>alert('Data berhasil ditambah.');window.location='kamar.php';</script>";
  } 
}

?>