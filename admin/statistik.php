<?php
include "../koneksi.php"; // karena sekarang file ini di dalam folder admin

// Ambil data IP dan user agent
$ip      = $_SERVER['REMOTE_ADDR'];
$agent   = $_SERVER['HTTP_USER_AGENT'];
$tanggal = date('Y-m-d');
$waktu   = date('H:i:s');

// Cek apakah IP ini sudah tercatat hari ini
$cek = mysqli_query($db, "SELECT * FROM statistik WHERE ip_address = '$ip' AND tanggal = '$tanggal'");
if (mysqli_num_rows($cek) == 0) {
    // Jika belum tercatat, simpan ke database
    mysqli_query($db, "INSERT INTO statistik (ip_address, user_agent, tanggal, waktu)
                       VALUES ('$ip', '$agent', '$tanggal', '$waktu')");
}

// Ambil total pengunjung hari ini
$query = mysqli_query($db, "SELECT COUNT(*) as total FROM statistik WHERE tanggal = '$tanggal'");
$data = mysqli_fetch_assoc($query);
$total_hari_ini = $data['total'];
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Statistik Pengunjung</title>
  <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100 text-center p-10 font-sans">
  <div class="bg-white shadow-md rounded p-6 max-w-md mx-auto">
    <h1 class="text-2xl font-bold mb-4 text-blue-600">Statistik Pengunjung</h1>
    <p class="text-lg">👁 Total Pengunjung Hari Ini:</p>
    <p class="text-4xl font-bold text-green-600 mt-2"><?php echo $total_hari_ini; ?></p>
  </div>
</body>
</html>