<?php
include('koneksi.php');

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
  $nama = mysqli_real_escape_string($db, $_POST['nama']);
  $tanggal = $_POST['tanggal'];
  $deskripsi = mysqli_real_escape_string($db, $_POST['deskripsi']);

  $sql = "INSERT INTO tbl_kegiatan (nama_kegiatan, tanggal_kegiatan, deskripsi)
          VALUES ('$nama', '$tanggal', '$deskripsi')";
  if (mysqli_query($db, $sql)) {
    header('Location: jadwal_kegiatan.php');
    exit;
  } else {
    echo "Gagal menyimpan kegiatan: " . mysqli_error($db);
  }
} else {
  header('Location: jadwal_kegiatan.php');
  exit;
}
?>