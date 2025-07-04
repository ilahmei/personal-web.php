<?php
include('../koneksi.php');

$judul     = mysqli_real_escape_string($db, $_POST['nama_artikel']);
$isi       = mysqli_real_escape_string($db, $_POST['isi_artikel']);
$kategori  = mysqli_real_escape_string($db, $_POST['kategori']);

$sql = "INSERT INTO tbl_artikel (nama_artikel, isi_artikel, kategori)
        VALUES ('$judul', '$isi', '$kategori')";

$query = mysqli_query($db, $sql);

if ($query) {
    echo "<script>alert('Artikel berhasil disimpan!'); window.location='data_artikel.php';</script>";
} else {
    echo "<script>alert('Gagal menyimpan artikel: " . mysqli_error($db) . "'); history.back();</script>";
}
?>