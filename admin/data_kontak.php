<?php
include('../koneksi.php');
require_once('cek_akses.php');
hanyaAdminEditor(); // Boleh admin/editor yang akses
?>
<!DOCTYPE html>
<html lang="en" id="html" class="">
<head>
  <meta charset="UTF-8">
  <title>Data Kontak / Buku Tamu</title>
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
    <h1 class="text-3xl font-bold">// HALAMAN ADMIN //</h1>
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
        <li><a href="about.php" class="block hover:underline">About</a></li>
        <li><a href="kontak.php" class="block hover:underline">Form Kontak</a></li>
        <li><a href="data_kontak.php" class="block underline font-bold">Data Kontak</a></li>
        <li>
          <a href="logout.php" onclick="return confirm('Apakah anda yakin ingin keluar?');"
             class="block text-red-200 hover:underline font-semibold">Logout</a>
        </li>
      </ul>
    </aside>

    <!-- Konten -->
    <main class="w-3/4 bg-white dark:bg-gray-800 rounded-2xl shadow-md p-6">
      <h2 class="text-xl font-bold text-sky-800 dark:text-sky-300 mb-4">Pesan Kontak / Buku Tamu</h2>

      <div class="overflow-x-auto">
        <table class="min-w-full table-auto border border-sky-300 dark:border-gray-700 text-sm rounded overflow-hidden">
          <thead class="bg-sky-600 dark:bg-gray-700 text-white">
            <tr>
              <th class="p-3 border border-sky-300 dark:border-gray-600">No</th>
              <th class="p-3 border border-sky-300 dark:border-gray-600">Nama</th>
              <th class="p-3 border border-sky-300 dark:border-gray-600">Email</th>
              <th class="p-3 border border-sky-300 dark:border-gray-600">Pesan</th>
            </tr>
          </thead>
          <tbody>
            <?php
            $sql = "SELECT * FROM tbl_kontak ORDER BY id_kontak DESC";
            $query = mysqli_query($db, $sql);
            $no = 1;
            while ($row = mysqli_fetch_assoc($query)) {
              echo "<tr class='even:bg-sky-50 dark:even:bg-gray-800'>";
              echo "<td class='border border-sky-300 dark:border-gray-700 p-2 text-center'>{$no}</td>";
              echo "<td class='border border-sky-300 dark:border-gray-700 p-2'>" . htmlspecialchars($row['nama']) . "</td>";
              echo "<td class='border border-sky-300 dark:border-gray-700 p-2'>" . htmlspecialchars($row['email']) . "</td>";
              echo "<td class='border border-sky-300 dark:border-gray-700 p-2'>" . nl2br(htmlspecialchars($row['pesan'])) . "</td>";
              echo "</tr>";
              $no++;
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