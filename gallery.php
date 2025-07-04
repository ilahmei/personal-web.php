<?php include "koneksi.php"; ?>
<!DOCTYPE html>
<html lang="en" id="html" class="">
<head>
  <meta charset="UTF-8">
  <title>Gallery | Personal Web</title>

  <!-- Tailwind CDN -->
  <script src="https://cdn.tailwindcss.com"></script>

  <!-- Tailwind Dark Mode Config -->
  <script>
    tailwind.config = {
      darkMode: 'class',
      theme: {
        extend: {
          colors: {
            primary: '#0ea5e9',
            darkbg: '#1f2937',
            lightbg: '#f1f5f9'
          }
        }
      }
    }
  </script>
</head>
<body class="transition-all duration-300 bg-sky-100 text-gray-900 dark:bg-gray-900 dark:text-gray-200 font-sans">

  <!-- Header -->
  <header class="bg-sky-500 dark:bg-gray-800 text-white text-center p-6 text-2xl font-bold shadow-md">
    Gallery | Ilah Meilan
  </header>

  <!-- Navigation -->
  <nav class="relative bg-sky-400 dark:bg-gray-700 text-white py-3 shadow-sm">
    <ul class="flex justify-center space-x-10 font-medium text-lg">
      <li><a href="index.php" class="hover:underline">Artikel</a></li>
      <li><a href="gallery.php" class="hover:underline">Gallery</a></li>
      <li><a href="jadwal_kegiatan.php">Jadwal</a></li>
      <li><a href="about.php" class="hover:underline">About</a></li>
      <li><a href="kontak.php" class="hover:text-blue-500">Kontak</a></li>
      <li><a href="admin/login.php" class="hover:underline">Login</a></li>
    </ul>

    <!-- Tombol Dark Mode -->
    <div class="absolute right-6 top-3">
      <button onclick="toggleDarkMode()" id="modeBtn"
        class="bg-white text-black dark:bg-gray-600 dark:text-white px-4 py-1 rounded shadow hover:scale-105 transition">
        🌙 Dark
      </button>
    </div>
  </nav>

  <!-- Gallery Content -->
  <main class="max-w-6xl mx-auto p-6 mt-8">
    <h2 class="text-2xl font-bold mb-6 text-center text-sky-800 dark:text-sky-400">Galeri Foto</h2>
    <div class="grid grid-cols-2 md:grid-cols-4 gap-6">
      <?php
      $sql = "SELECT * FROM tbl_gallery ORDER BY id_gallery DESC";
      $query = mysqli_query($db, $sql);
      while ($data = mysqli_fetch_array($query)) {
        echo "<div class='bg-white dark:bg-gray-800 rounded shadow overflow-hidden'>";

        $file = 'images/' . $data['foto'];
        if (!empty($data['foto']) && file_exists($file)) {
          echo "<img src='$file' alt='Gallery Image' class='w-full h-48 object-cover'>";
        } else {
          echo "<div class='w-full h-48 flex items-center justify-center bg-gray-200 dark:bg-gray-700 text-gray-500 dark:text-gray-300'>Gambar tidak tersedia</div>";
        }

        echo "<div class='p-3 text-center text-gray-800 dark:text-gray-300 text-sm'>" . htmlspecialchars($data['judul']) . "</div>";
        echo "</div>";
      }
      ?>
    </div>
  </main>

  <?php
  $tanggal = date('Y-m-d');
  $query = mysqli_query($db, "SELECT COUNT(*) as total FROM statistik WHERE tanggal = '$tanggal'");
  $data = mysqli_fetch_assoc($query);
  $total_hari_ini = $data['total'];
  ?>

 <!-- Footer -->
<footer class="bg-sky-600 dark:bg-gray-900 text-white text-center py-6 mt-10">
  <p class="text-sm">&copy; <?php echo date('Y'); ?> | Created by Ilah Meilan</p>
  <div class="text-sm mt-1">👁 Total Pengunjung Hari Ini: <?php echo $total_hari_ini; ?></div>

  <!-- 🌐 Sosial Media Icons -->
  <div class="mt-4 flex justify-center gap-5 text-white dark:text-gray-300">
    <!-- Instagram -->
    <a href="https://www.instagram.com/ilaahhha_?igsh=Znc2NHQwOWU2ZjA3" target="_blank" class="hover:text-pink-400 transition">
      <svg class="w-6 h-6" fill="currentColor" viewBox="0 0 24 24">
        <path d="M7.75 2C5.68 2 4 3.68 4 5.75V18.25C4 20.32 5.68 22 7.75 22H16.25C18.32 22 20 20.32 20 18.25V5.75C20 3.68 18.32 2 16.25 2H7.75ZM12 7C14.2 7 16 8.79 16 11C16 13.21 14.2 15 12 15C9.79 15 8 13.21 8 11C8 8.79 9.79 7 12 7ZM17 6.25C17 6.66 16.66 7 16.25 7C15.83 7 15.5 6.66 15.5 6.25C15.5 5.83 15.83 5.5 16.25 5.5C16.66 5.5 17 5.83 17 6.25Z"/>
      </svg>
    </a>

    <!-- TikTok -->
    <a href="https://www.tiktok.com/@nakkechill_?_t=ZS-8xkegf9jU8O&_r=1" target="_blank" class="hover:text-white transition">
      <svg class="w-6 h-6" fill="currentColor" viewBox="0 0 24 24">
        <path d="M12.36 2H15.11C15.11 3.4 15.4 4.19 15.9 4.8C16.4 5.41 17.3 5.79 18.64 5.93V8.93C17.26 8.94 15.91 8.52 14.79 7.75C14.79 11.38 14.79 14.93 14.79 18.39C14.79 21.25 12.57 23 10 23C7.43 23 5.21 21.25 5.21 18.39C5.21 15.54 7.43 13.79 10 13.79C10.43 13.79 10.85 13.83 11.25 13.93V16.86C11.07 16.82 10.89 16.79 10.71 16.79C9.59 16.79 8.64 17.68 8.64 18.79C8.64 19.89 9.59 20.79 10.71 20.79C11.68 20.79 12.29 20.07 12.36 18.82C12.36 13.86 12.36 8.93 12.36 2Z"/>
      </svg>
    </a>

    <!-- YouTube -->
    <a href="https://youtube.com/@ilaaaha?si=bh7fdK7zd4mrZmfc" target="_blank" class="hover:text-red-400 transition">
      <svg class="w-6 h-6" fill="currentColor" viewBox="0 0 24 24">
        <path d="M10 15L15.19 12L10 9V15ZM22 12C22 12 22 8.92 21.64 7.38C21.42 6.44 20.71 5.73 19.77 5.51C18.23 5.15 12 5.15 12 5.15C12 5.15 5.77 5.15 4.23 5.51C3.29 5.73 2.58 6.44 2.36 7.38C2 8.92 2 12 2 12C2 12 2 15.08 2.36 16.62C2.58 17.56 3.29 18.27 4.23 18.49C5.77 18.85 12 18.85 12 18.85C12 18.85 18.23 18.85 19.77 18.49C20.71 18.27 21.42 17.56 21.64 16.62C22 15.08 22 12 22 12Z"/>
      </svg>
    </a>
  </div>
</footer>

  <!-- Script Dark Mode -->
  <script>
    const html = document.getElementById('html');
    const modeBtn = document.getElementById('modeBtn');

    if (localStorage.getItem('theme') === 'dark') {
      html.classList.add('dark');
      modeBtn.innerHTML = '☀ Light';
    } else {
      html.classList.remove('dark');
      modeBtn.innerHTML = '🌙 Dark';
    }

    function toggleDarkMode() {
      const isDark = html.classList.toggle('dark');
      localStorage.setItem('theme', isDark ? 'dark' : 'light');
      modeBtn.innerHTML = isDark ? '☀ Light' : '🌙 Dark';
    }
  </script>

</body>
</html>