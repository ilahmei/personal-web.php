<?php 
include "koneksi.php"; 
?>
<!DOCTYPE html>
<html lang="id" id="html" class="">
<head>
  <meta charset="UTF-8">
  <title>Form Kontak</title>
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
<body class="transition-all duration-300 bg-gradient-to-br from-sky-100 to-sky-300 dark:from-gray-900 dark:to-gray-800 text-sky-900 dark:text-white p-8 font-sans min-h-screen">

  <!-- Header -->
  <header class="bg-sky-600 dark:bg-gray-800 text-white text-center py-5 shadow-md relative rounded-b-xl">
    <h1 class="text-2xl font-bold">Form Kontak / Buku Tamu</h1>
    <div class="absolute top-4 right-6">
      <button onclick="toggleDarkMode()" id="modeBtn"
        class="bg-sky-200 dark:bg-gray-600 text-sky-900 dark:text-white px-4 py-1 rounded shadow hover:scale-105 transition">
        🌙 Dark
      </button>
    </div>
  </header>

  <!-- Form -->
  <div class="max-w-xl mx-auto bg-white dark:bg-gray-800 mt-10 p-6 rounded-xl shadow border border-sky-200 dark:border-gray-700">
    <form action="" method="POST" class="space-y-4">
      <input type="text" name="nama" placeholder="Nama Anda" required
        class="w-full px-4 py-2 border border-sky-300 dark:border-gray-600 rounded bg-white dark:bg-gray-700 text-sky-900 dark:text-white">
      <input type="email" name="email" placeholder="Email Anda" required
        class="w-full px-4 py-2 border border-sky-300 dark:border-gray-600 rounded bg-white dark:bg-gray-700 text-sky-900 dark:text-white">
      <textarea name="pesan" placeholder="Pesan Anda..." required rows="5"
        class="w-full px-4 py-2 border border-sky-300 dark:border-gray-600 rounded bg-white dark:bg-gray-700 text-sky-900 dark:text-white resize-none"></textarea>
      <button type="submit" name="submit"
        class="bg-sky-600 hover:bg-sky-700 text-white px-6 py-2 rounded transition shadow">Kirim Pesan</button>
    </form>

    <!-- PHP Feedback -->
    <?php
    if (isset($_POST['submit'])) {
      $nama  = mysqli_real_escape_string($db, $_POST['nama']);
      $email = mysqli_real_escape_string($db, $_POST['email']);
      $pesan = mysqli_real_escape_string($db, $_POST['pesan']);

      $sql = "INSERT INTO tbl_kontak (nama, email, pesan) VALUES ('$nama', '$email', '$pesan')";
      if (mysqli_query($db, $sql)) {
        echo "<p class='mt-4 text-green-600 dark:text-green-400'>Pesan berhasil dikirim. Terima kasih!</p>";
      } else {
        echo "<p class='mt-4 text-red-600 dark:text-red-400'>Gagal mengirim pesan. Coba lagi nanti.</p>";
      }
    }
    ?>
  </div>

  <!-- Footer -->
  <footer class="bg-sky-600 dark:bg-gray-800 text-white text-center py-4 mt-10 shadow-inner rounded-t-xl">
    &copy; <?php echo date('Y'); ?> | Created by Ilah Meilan
  </footer>

  <!-- Toggle Dark Mode -->
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