<?php
// Panggil koneksi (karena file ini ada di admin, koneksi di ../)
include('../koneksi.php');

// Ambil data dari form
$id_artikel = $_POST['id_artikel'];
$nama       = $_POST['nama'];
$isi        = $_POST['isi'];

// Simpan ke database
$sql = "INSERT INTO tbl_komentar (id_artikel, nama, isi) VALUES ('$id_artikel', '$nama', '$isi')";
$insert = mysqli_query($db, $sql);

// Cek apakah berhasil
if ($insert) {
    echo "<script>
    alert('Komentar berhasil ditambahkan!');
    window.location.href = 'detail_artikel.php?id_artikel=$id_artikel';
    </script>";
} else {
    echo "<script>
    alert('Gagal menambahkan komentar!');
    window.location.href = 'detail_artikel.php?id_artikel=$id_artikel';
    </script>";
}
?>