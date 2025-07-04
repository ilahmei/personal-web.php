<?php
include('../koneksi.php');

// Ambil ID artikel dari URL
$id = $_GET['id_artikel'];

// Ambil data artikel
$artikel = mysqli_query($db, "SELECT * FROM tbl_artikel WHERE id_artikel = '$id'");
$data = mysqli_fetch_assoc($artikel);
?>

<!DOCTYPE html>
<html lang="id" id="html" class="">
<head>
  <meta charset="UTF-8">
  <title><?php echo $data['nama_artikel']; ?></title>
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
<body class="transition-all duration-300 bg-sky-50 dark:bg-gray-900 text-gray-900 dark:text-gray-200 min-h-screen p-6 font-sans">

  <!-- Header -->
  <header class="bg-sky-500 dark:bg-gray-800 text-white text-center py-6 shadow-md relative">
    <h1 class="text-2xl font-bold">Detail Artikel</h1>
    <div class="absolute top-4 right-6">
      <button onclick="toggleDarkMode()" id="modeBtn"
        class="bg-white text-black dark:bg-gray-600 dark:text-white px-4 py-1 rounded shadow hover:scale-105 transition">
        🌙 Dark
      </button>
    </div>
  </header>

  <div class="max-w-3xl mx-auto mt-8 bg-white dark:bg-gray-800 p-6 rounded shadow">

    <!-- Artikel -->
    <h2 class="text-2xl font-bold mb-2 text-sky-800 dark:text-sky-300"><?php echo $data['nama_artikel']; ?></h2>
    <p class="text-sm text-gray-600 dark:text-gray-400 italic mb-1">Kategori: <?php echo $data['kategori']; ?></p>
    <div class="mt-2 mb-6 leading-relaxed text-gray-800 dark:text-gray-100">
      <?php echo nl2br(htmlspecialchars($data['isi_artikel'])); ?>
    </div>

    <!-- Komentar -->
    <h3 class="text-xl font-semibold mt-6 mb-2 text-sky-700 dark:text-sky-400">Komentar</h3>
    <div class="space-y-4 mb-6">
      <?php
      $komentar = mysqli_query($db, "SELECT * FROM tbl_komentar WHERE id_artikel = '$id' ORDER BY tanggal DESC");
      if (mysqli_num_rows($komentar) > 0) {
        while ($k = mysqli_fetch_assoc($komentar)) {
          echo "<div class='border-t border-gray-300 dark:border-gray-700 pt-3'>";
          echo "<p class='font-bold text-sky-800 dark:text-sky-300'>" . htmlspecialchars($k['nama']) . "</p>";
          echo "<p class='text-gray-700 dark:text-gray-300'>" . htmlspecialchars($k['isi']) . "</p>";
          echo "<p class='text-xs text-gray-500 dark:text-gray-400'>" . $k['tanggal'] . "</p>";
          echo "</div>";
        }
      } else {
        echo "<p class='text-gray-500 italic dark:text-gray-400'>Belum ada komentar.</p>";
      }
      ?>
    </div>

    <!-- Form Komentar -->
    <h4 class="text-lg font-semibold mb-2 text-sky-700 dark:text-sky-400">Tulis Komentar</h4>
    <form action="proses_komentar.php" method="post" class="space-y-4">
      <input type="hidden" name="id_artikel" value="<?php echo $id; ?>">
      <div>
        <label class="block text-sm font-medium text-gray-700 dark:text-gray-300">Nama:</label>
        <input type="text" name="nama" required
               class="w-full p-2 border border-gray-300 dark:border-gray-600 rounded bg-white dark:bg-gray-700 text-gray-900 dark:text-white focus:outline-none focus:ring focus:border-sky-500">
      </div>
      <div>
        <label class="block text-sm font-medium text-gray-700 dark:text-gray-300">Komentar:</label>
        <textarea name="isi" rows="4" required
                  class="w-full p-2 border border-gray-300 dark:border-gray-600 rounded bg-white dark:bg-gray-700 text-gray-900 dark:text-white focus:outline-none focus:ring focus:border-sky-500"></textarea>
      </div>
      <button type="submit"
              class="bg-sky-600 hover:bg-sky-700 text-white px-4 py-2 rounded transition">Kirim</button>
    </form>
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