<?php
include('../koneksi.php');
require_once('cek_akses.php');
hanyaAdmin(); // Hanya admin yang bisa akses
?>
<!DOCTYPE html>
<html lang="en" id="html" class="">
<head>
  <meta charset="UTF-8">
  <title>Kelola Gallery</title>
  <script src="https://cdn.tailwindcss.com"></script>

  <!-- Konfigurasi Dark Mode -->
  <script>
    tailwind.config = {
      darkMode: 'class'
    };
    if (localStorage.getItem("theme") === "dark") {
      document.documentElement.classList.add("dark");
    }
  </script>
</head>
<body class="transition-all duration-300 bg-sky-100 text-gray-900 dark:bg-gray-900 dark:text-gray-200 min-h-screen font-sans">

<!-- Header -->
<header class="bg-sky-500 dark:bg-gray-800 text-white text-center py-6 shadow-md relative">
  <h1 class="text-3xl font-bold">Kelola Gallery</h1>
  <div class="absolute top-4 right-6">
    <button onclick="toggleDarkMode()" id="modeBtn"
      class="bg-white text-black dark:bg-gray-600 dark:text-white px-4 py-1 rounded shadow hover:scale-105 transition">
      🌙 Dark
    </button>
  </div>
</header>

<div class="flex max-w-7xl mx-auto mt-8 px-4">

  <!-- Sidebar -->
  <aside class="w-1/4 bg-sky-300 dark:bg-gray-800 rounded-2xl shadow-md p-4">
    <h2 class="text-xl font-semibold text-white mb-4 text-center">MENU</h2>
    <ul class="space-y-2 text-white font-medium">
      <li><a href="beranda_admin.php" class="block hover:underline">Beranda</a></li>
      <li><a href="data_artikel.php" class="block hover:underline">Kelola Artikel</a></li>
      <li><a href="data_gallery.php" class="block underline font-bold">Kelola Gallery</a></li>
      <li><a href="about.php" class="block hover:underline">About</a></li>
      <li><a href="kontak.php" class="block hover:underline">Form Kontak</a></li>
      <li><a href="data_kontak.php" class="block hover:underline">Data Kontak</a></li>
      <li>
        <a href="logout.php" onclick="return confirm('Apakah anda yakin ingin keluar?');"
           class="block text-red-200 hover:underline font-semibold">Logout</a>
      </li>
    </ul>
  </aside>

  <!-- Main Content -->
  <main class="w-3/4 bg-white dark:bg-gray-800 rounded-2xl shadow-md p-6 ml-6">
    <div class="flex justify-between items-center mb-4">
      <h2 class="text-xl font-bold text-sky-800 dark:text-sky-300">Daftar Gallery</h2>
      <a href="add_gallery.php"
         class="bg-sky-700 text-white px-4 py-2 rounded hover:bg-sky-800 transition">
         + Tambah Gambar
      </a>
    </div>

    <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 gap-6">
      <?php
      $sql = "SELECT * FROM tbl_gallery";
      $query = mysqli_query($db, $sql);
      while ($data = mysqli_fetch_array($query)) {
          echo "<div class='bg-sky-50 dark:bg-gray-900 border border-sky-200 dark:border-gray-700 rounded-lg shadow-md overflow-hidden'>";
          echo "<img src='../images/{$data['foto']}' class='w-full h-48 object-cover hover:scale-105 transition-transform duration-300'>";
          echo "<div class='p-4'>";
          echo "<p class='font-semibold text-sky-800 dark:text-sky-300 mb-2'>" . htmlspecialchars($data['judul']) . "</p>";
          echo "<div class='flex justify-between text-sm'>";
          echo "<a href='edit_gallery.php?id_gallery={$data['id_gallery']}' class='text-sky-600 dark:text-sky-300 hover:underline'>Edit</a>";
          echo "<a href='delete_gallery.php?id_gallery={$data['id_gallery']}' onclick='return confirm(\"Yakin ingin menghapus?\")' class='text-red-600 dark:text-red-300 hover:underline'>Hapus</a>";
          echo "</div>";
          echo "</div></div>";
      }
      ?>
    </div>
  </main>
</div>

<!-- Footer -->
<footer class="bg-sky-500 dark:bg-gray-800 text-white text-center py-4 mt-10 shadow-inner">
  &copy; <?php echo date('Y'); ?> | Created by Ilah Meilan
</footer>

<!-- Script Toggle Dark Mode -->
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