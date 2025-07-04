<?php include('koneksi.php'); ?>
<!DOCTYPE html>
<html lang="en" id="html" class="">
<head>
  <meta charset="UTF-8">
  <title>Jadwal Kegiatan</title>
  <meta name="viewport" content="width=device-width, initial-scale=1">
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
<body class="bg-gradient-to-br from-sky-100 to-sky-300 dark:from-gray-900 dark:to-gray-800 text-sky-900 dark:text-white min-h-screen p-6 transition-colors duration-300">

  <div class="max-w-4xl mx-auto">
    <!-- Header -->
    <div class="flex justify-between items-center mb-6">
      <h1 class="text-3xl font-bold">📅 Timeline Kegiatan</h1>
      <div class="flex gap-2">
        <a href="form_kegiatan.php" class="bg-sky-600 text-white px-4 py-2 rounded hover:bg-sky-700 transition">+ Tambah Kegiatan</a>
        <button onclick="toggleDark()" id="modeBtn" class="bg-sky-200 dark:bg-gray-700 px-4 py-2 rounded transition text-sky-900 dark:text-white">
          🌙 Dark
        </button>
      </div>
    </div>

    <!-- List Kegiatan -->
    <?php
    $sql = "SELECT * FROM tbl_kegiatan ORDER BY tanggal_kegiatan DESC";
    $result = mysqli_query($db, $sql);
    if (mysqli_num_rows($result) > 0) {
      while($row = mysqli_fetch_assoc($result)) {
    ?>
      <div class="mb-4 bg-white dark:bg-gray-800 border border-sky-200 dark:border-gray-700 p-4 rounded-xl shadow">
        <h2 class="text-xl font-semibold"><?= htmlspecialchars($row['nama_kegiatan']) ?></h2>
        <p class="text-sm text-sky-600 dark:text-gray-400 italic"><?= date('d M Y', strtotime($row['tanggal_kegiatan'])) ?></p>
        <p class="mt-2"><?= nl2br(htmlspecialchars($row['deskripsi'])) ?></p>
      </div>
    <?php } } else { ?>
      <p class="text-sky-600 dark:text-gray-400 italic">Belum ada kegiatan yang tercatat.</p>
    <?php } ?>
  </div>

  <!-- Script Toggle Dark Mode -->
  <script>
    function toggleDark() {
      const html = document.getElementById('html');
      const isDark = html.classList.toggle('dark');
      localStorage.setItem("theme", isDark ? "dark" : "light");
      document.getElementById('modeBtn').innerHTML = isDark ? "☀ Light" : "🌙 Dark";
    }

    document.addEventListener("DOMContentLoaded", () => {
      const html = document.getElementById("html");
      document.getElementById("modeBtn").innerHTML = html.classList.contains("dark") ? "☀ Light" : "🌙 Dark";
    });
  </script>

</body>
</html>