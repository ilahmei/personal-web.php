<?php
include('../koneksi.php'); // naik 1 folder karena koneksi.php ada di luar admin

$nama  = $_POST['nama'];
$email = $_POST['email'];
$pesan = $_POST['pesan'];

$sql = "INSERT INTO tbl_kontak (nama, email, pesan) VALUES ('$nama', '$email', '$pesan')";
$insert = mysqli_query($db, $sql);

if ($insert) {
    echo "<script>
    alert('Pesan berhasil dikirim!');
    window.location.href = '../kontak.php';
    </script>";
} else {
    echo "<script>
    alert('Gagal mengirim pesan!');
    window.location.href = '../kontak.php';
    </script>";
}
?>