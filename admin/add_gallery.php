<?php 
include('../koneksi.php'); 
session_start(); 
if (!isset($_SESSION['username'])) { 
  header('location:login.php'); 
  exit; 
} 
?> 

<!DOCTYPE html>
<html lang="en" id="html" class="">
<head>
  <meta charset="UTF-8">
  <title>Tambah Gambar</title>
  <script src="https://cdn.tailwindcss.com"></script>

  <!-- Konfigurasi Tailwind Dark Mode -->
  <script>
    tailwind.config = {
      darkMode: 'class'
    };
    if (localStorage.getItem("theme") === "dark") {
      document.documentElement.classList.add("dark");
    }
  </script>
</head>
<body class="transition-all duration-300 bg-sky-100 text-sky-900 dark:bg-gray-900 dark:text-gray-200 min-h-screen font-sans">

  <!-- Header -->
  <header class="bg-sky-500 dark:bg-gray-800 text-white text-center py-6 shadow-md relative">
    <h1 class="text-3xl font-bold">// TAMBAH GAMBAR GALLERY //</h1>
    <div class="absolute top-4 right-6">
      <button onclick="toggleDarkMode()" id="modeBtn"
        class="bg-white text-black dark:bg-gray-600 dark:text-white px-4 py-1 rounded shadow hover:scale-105 transition">
        🌙 Dark
      </button>
    </div>
  </header>

  <div class="flex max-w-7xl mx-auto mt-8 px-4 gap-6">

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
    <main class="w-3/4 bg-white dark:bg-gray-800 rounded-2xl shadow-md p-6">
      <form action="proses_add_gallery.php" method="post" enctype="multipart/form-data" class="space-y-6">
        
        <!-- Judul -->
        <div>
          <label for="judul" class="block text-sm font-medium text-sky-900 dark:text-sky-200 mb-1">Judul Gambar</label>
          <input type="text" id="judul" name="judul" required
            class="w-full p-2 border border-sky-300 rounded focus:outline-none focus:ring focus:border-sky-500 dark:bg-gray-700 dark:border-gray-600 dark:text-white">
        </div>

        <!-- Upload Gambar -->
        <div>
          <label for="foto" class="block text-sm font-medium text-sky-900 dark:text-sky-200 mb-1">Pilih Gambar</label>
          <input type="file" id="foto" name="foto" accept="image/*" required
            class="block w-full text-sm text-gray-600 dark:text-gray-200 file:mr-4 file:py-2 file:px-4 
                   file:rounded-full file:border-0 file:text-sm file:font-semibold 
                   file:bg-sky-100 dark:file:bg-gray-600 file:text-sky-700 dark:file:text-white hover:file:bg-sky-200 dark:hover:file:bg-gray-500">
        </div>

        <!-- Tombol -->
        <div class="flex justify-end space-x-4">
          <button type="submit"
            class="bg-sky-700 text-white px-4 py-2 rounded-lg hover:bg-sky-800 transition duration-200">Simpan</button>
          <a href="data_gallery.php"
            class="bg-gray-300 dark:bg-gray-600 text-gray-700 dark:text-white px-4 py-2 rounded-lg hover:bg-gray-400 dark:hover:bg-gray-500 transition duration-200">Batal</a>
        </div>

      </form>
    </main>
  </div>

  <!-- Footer -->
  <footer class="bg-sky-500 dark:bg-gray-800 text-white text-center py-4 mt-10 shadow-inner">
    &copy; <?php echo date('Y'); ?> | Created by Ilah Meilan
  </footer>

  <!-- Dark Mode Script -->
  <script>
    const html = document.getElementById("html");
    const modeBtn = document.getElementById("modeBtn");

    function toggleDarkMode() {
      const isDark = html.classList.toggle("dark");
      localStorage.setItem("theme", isDark ? "dark" : "light");
      modeBtn.innerHTML = isDark ? "☀ Light" : "🌙 Dark";
    }

    document.addEventListener("DOMContentLoaded", () => {
      modeBtn.innerHTML = html.classList.contains("dark") ? "☀ Light" : "🌙 Dark";
    });
  </script>

</body>
</html>