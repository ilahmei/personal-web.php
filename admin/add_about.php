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
  <title>Tambah About</title> 
  <script src="https://cdn.tailwindcss.com"></script> 
  <script>
    tailwind.config = {
      darkMode: 'class'
    };
    if (localStorage.getItem("theme") === "dark") {
      document.documentElement.classList.add("dark");
    }
  </script>
</head> 
<body class="transition-all duration-300 bg-sky-100 dark:bg-gray-900 text-gray-900 dark:text-gray-200 min-h-screen font-sans"> 

  <!-- Header --> 
  <header class="bg-sky-500 dark:bg-gray-800 text-white text-center py-6 shadow-md relative"> 
    <h1 class="text-3xl font-bold">// TAMBAH DATA ABOUT //</h1> 
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
        <li><a href="data_gallery.php" class="block hover:underline">Kelola Gallery</a></li> 
        <li><a href="about.php" class="block underline font-bold">About</a></li> 
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
      <form action="proses_add_about.php" method="post" class="space-y-6"> 
        <div> 
          <label for="about" class="block text-sm font-semibold text-sky-800 dark:text-sky-300 mb-2">Isi About</label> 
          <textarea id="about" name="about" rows="6" required
            class="w-full p-3 border border-sky-300 dark:border-gray-600 rounded-lg bg-white dark:bg-gray-700 dark:text-white focus:outline-none focus:ring-2 focus:ring-sky-500 focus:border-sky-500 resize-none"></textarea> 
        </div> 
        <div class="flex justify-end space-x-4"> 
          <button type="submit"
            class="bg-sky-700 text-white px-5 py-2 rounded-lg hover:bg-sky-800 transition font-medium">Simpan</button> 
          <a href="about.php"
            class="bg-gray-300 dark:bg-gray-600 text-gray-800 dark:text-white px-5 py-2 rounded-lg hover:bg-gray-400 dark:hover:bg-gray-700 transition font-medium">Batal</a> 
        </div> 
      </form> 
    </main> 
  </div> 

  <!-- Footer --> 
  <footer class="bg-sky-500 dark:bg-gray-800 text-white text-center py-4 mt-10 shadow-inner"> 
    &copy; <?php echo date('Y'); ?> | Created by Ilah Meilan 
  </footer> 

  <!-- Script Toggle Dark Mode -->
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