<?php 
session_start();
if (!isset($_SESSION['username'])) {
    header('location:login.php');
    exit;
}
require_once("../koneksi.php");

$username = $_SESSION['username'];
$sql = "SELECT * FROM tbl_user WHERE username = '$username'";
$query = mysqli_query($db, $sql);
$hasil = mysqli_fetch_array($query);

$jumlah_artikel = mysqli_num_rows(mysqli_query($db, "SELECT id_artikel FROM tbl_artikel"));
$jumlah_gallery = mysqli_num_rows(mysqli_query($db, "SELECT id_gallery FROM tbl_gallery"));
?>
<!DOCTYPE html>
<html lang="en" id="html" class="">
<head>
  <meta charset="UTF-8" />
  <title>Dashboard Admin</title>

  <!-- Tailwind CDN -->
  <script src="https://cdn.tailwindcss.com"></script>

  <!-- Konfigurasi Dark Mode -->
  <script>
    tailwind.config = {
      darkMode: 'class'
    };
  </script>

  <!-- Aktifkan dark mode saat halaman diload jika ada di localStorage -->
  <script>
    if (localStorage.getItem("theme") === "dark") {
      document.documentElement.classList.add("dark");
    }
  </script>
</head>

<body class="transition-all duration-300 bg-sky-100 text-gray-900 dark:bg-gray-900 dark:text-gray-200 min-h-screen font-sans">

  <!-- Header -->
  <header class="bg-sky-500 dark:bg-gray-800 text-white text-center py-6 shadow-md relative">
    <h1 class="text-3xl font-bold">Halaman Administrator</h1>
    <div class="absolute top-4 right-6">
      <button onclick="toggleDarkMode()" id="modeBtn"
        class="bg-white text-black dark:bg-gray-600 dark:text-white px-4 py-1 rounded shadow hover:scale-105 transition">
        🌙 Dark
      </button>
    </div>
  </header>

  <!-- Container -->
  <div class="flex max-w-7xl mx-auto mt-8 px-4">

    <!-- Sidebar -->
    <aside class="w-1/4 bg-sky-300 dark:bg-gray-800 rounded-2xl shadow-md p-4">
      <h2 class="text-xl font-semibold text-white mb-4 text-center">MENU</h2>
      <ul class="space-y-2 text-white font-medium">
        <li><a href="beranda_admin.php" class="block hover:underline">Beranda</a></li>
        <li><a href="data_artikel.php" class="block hover:underline">Kelola Artikel</a></li>
        <li><a href="data_gallery.php" class="block hover:underline">Kelola Gallery</a></li>
        <li><a href="about.php" class="block hover:underline">About</a></li>
        <li><a href="kontak.php" class="block hover:underline">Form Kontak</a></li>
        <li><a href="data_kontak.php" class="block hover:underline">Data Kontak</a></li>
        <li>
          <a href="logout.php" onclick="return confirm('Apakah anda yakin ingin keluar?');"
            class="block text-red-200 hover:underline font-semibold">Logout</a>
        </li>
      </ul>
    </aside>

    <!-- Main -->
    <main class="w-3/4 bg-white dark:bg-gray-800 rounded-2xl shadow-md p-6 ml-6">
      <div class="text-lg text-sky-800 dark:text-sky-300 mb-4">
        Halo, <strong class="text-sky-700 dark:text-sky-200"><?php echo $_SESSION['username']; ?></strong>! Apa kabar? 😊
      </div>
      <p class="text-sm text-sky-600 dark:text-gray-400">Silakan gunakan menu di samping untuk mengelola data.</p>

      <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6 mt-6">
        <div class="bg-white dark:bg-gray-900 shadow rounded-2xl p-4 text-center border-t-4 border-sky-600">
          <h3 class="text-xl font-semibold text-sky-700 dark:text-sky-300">Artikel</h3>
          <p class="text-3xl font-bold text-sky-900 dark:text-white"><?php echo $jumlah_artikel; ?></p>
        </div>

        <div class="bg-white dark:bg-gray-900 shadow rounded-2xl p-4 text-center border-t-4 border-green-600">
          <h3 class="text-xl font-semibold text-green-700 dark:text-green-300">Gallery</h3>
          <p class="text-3xl font-bold text-sky-900 dark:text-white"><?php echo $jumlah_gallery; ?></p>
        </div>
      </div>
    </main>
  </div>

  <!-- Footer -->
  <footer class="bg-sky-500 dark:bg-gray-800 text-white text-center py-4 mt-10 shadow-inner">
    &copy; <?php echo date('Y'); ?> | Created by Ilah Meilan
  </footer>

  <!-- Script Tombol Toggle Dark -->
  <script>
    function toggleDarkMode() {
      const html = document.getElementById("html");
      const modeBtn = document.getElementById("modeBtn");
      const isDark = html.classList.toggle("dark");
      localStorage.setItem("theme", isDark ? "dark" : "light");
      modeBtn.innerHTML = isDark ? "☀ Light" : "🌙 Dark";
    }

    document.addEventListener("DOMContentLoaded", () => {
      const html = document.getElementById("html");
      const modeBtn = document.getElementById("modeBtn");
      modeBtn.innerHTML = html.classList.contains("dark") ? "☀ Light" : "🌙 Dark";
    });
  </script>

</body>
</html>