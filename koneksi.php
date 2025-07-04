<?php
$host = "localhost";
$user = "root";
$password = "";
$nama_database = "ilahmeilan_d1a240008";

$db = mysqli_connect($host, $user, $password, $nama_database);
if (!$db) {
    die("Koneksi ke database gagal: " . mysqli_connect_error());
}
?>