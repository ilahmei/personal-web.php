<?php
include('../koneksi.php');
session_start();

$username = mysqli_real_escape_string($db, $_POST['username']);
$password = mysqli_real_escape_string($db, $_POST['password']);

// Cek data user di database
$sql = "SELECT * FROM tbl_user WHERE username='$username' AND password='$password'";
$query = mysqli_query($db, $sql);
$user = mysqli_fetch_assoc($query); // ambil data usernya

if ($user) {
    $_SESSION['username'] = $user['username'];
    $_SESSION['role'] = $user['role']; // Tambahkan role ke session

    header('Location: beranda_admin.php');
} else {
    echo "<script>alert('Login gagal! Username atau password salah.');window.location='login.php';</script>";
}
?>