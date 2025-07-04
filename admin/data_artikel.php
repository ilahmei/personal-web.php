<?php
include('../koneksi.php');
require_once('cek_akses.php');
hanyaAdminEditor(); // Hanya admin/editor yang boleh akses
?>
<!DOCTYPE html>
<html lang="en" id="html" class="">
<head>
  <meta charset="UTF-8">
  <title>Kelola Artikel</title>

  <!-- Tailwind CDN -->
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
  <h1 class="text-3xl font-bold">// HALAMAN ADMIN //</h1>
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
      <li><a href="data_artikel.php" class="block underline font-bold">Kelola Artikel</a></li>
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

  <!-- Main Content -->
  <main class="w-3/4 bg-white dark:bg-gray-800 rounded-2xl shadow-md p-6 ml-6">
    <div class="flex justify-between items-center mb-4">
      <h2 class="text-xl font-bold text-sky-800 dark:text-sky-300">Daftar Artikel</h2>
      <a href="add_artikel.php"
         class="bg-sky-700 text-white px-4 py-2 rounded hover:bg-sky-800 transition">
         + Tambah Artikel
      </a>
    </div>

    <div class="overflow-x-auto">
      <table class="min-w-full table-auto border border-sky-300 dark:border-gray-700 text-sm rounded overflow-hidden">
        <thead class="bg-sky-600 dark:bg-gray-700 text-white">
          <tr>
            <th class="p-3 border border-sky-300 dark:border-gray-600">No</th>
            <th class="p-3 border border-sky-300 dark:border-gray-600">Nama Artikel</th>
            <th class="p-3 border border-sky-300 dark:border-gray-600">Isi Artikel</th>
            <th class="p-3 border border-sky-300 dark:border-gray-600">Kategori</th>
            <th class="p-3 border border-sky-300 dark:border-gray-600">Aksi</th>
          </tr>
        </thead>
        <tbody>
          <?php
          $sql = "SELECT * FROM tbl_artikel";
          $query = mysqli_query($db, $sql);
          $no = 1;
          while ($data = mysqli_fetch_array($query)) {
              echo "<tr class='even:bg-sky-50 dark:even:bg-gray-800'>";
              echo "<td class='border border-sky-300 dark:border-gray-700 p-2 text-center'>" . $no++ . "</td>";
              echo "<td class='border border-sky-300 dark:border-gray-700 p-2'>" . htmlspecialchars($data['nama_artikel']) . "</td>";
              echo "<td class='border border-sky-300 dark:border-gray-700 p-2'>" . htmlspecialchars($data['isi_artikel']) . "</td>";
              echo "<td class='border border-sky-300 dark:border-gray-700 p-2'>" . htmlspecialchars($data['kategori']) . "</td>";
              echo "<td class='border border-sky-300 dark:border-gray-700 p-2 text-center space-y-1'>
                  <a href='edit_artikel.php?id_artikel={$data['id_artikel']}' class='text-sky-600 dark:text-sky-300 hover:underline'>Edit</a><br>
                  <a href='delete_artikel.php?id_artikel={$data['id_artikel']}' onclick='return confirm(\"Yakin ingin menghapus?\")' class='text-red-600 dark:text-red-300 hover:underline'>Hapus</a><br>
                  <a href='detail_artikel.php?id_artikel={$data['id_artikel']}' class='text-green-600 dark:text-green-300 hover:underline'>Lihat</a>
              </td>";
              echo "</tr>";
          }
          ?>
        </tbody>
      </table>
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