<?php include('../koneksi.php'); ?>
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
<body class="transition-all duration-300 bg-sky-100 dark:bg-gray-900 text-gray-900 dark:text-gray-200 min-h-screen p-6 font-sans">

  <!-- Header -->
  <header class="bg-sky-500 dark:bg-gray-800 text-white text-center py-6 shadow-md relative">
    <h1 class="text-2xl font-bold">Form Kontak / Buku Tamu</h1>
    <div class="absolute top-4 right-6">
      <button onclick="toggleDarkMode()" id="modeBtn"
        class="bg-white text-black dark:bg-gray-600 dark:text-white px-4 py-1 rounded shadow hover:scale-105 transition">
        🌙 Dark
      </button>
    </div>
  </header>

  <!-- Konten Form -->
  <div class="max-w-xl mx-auto bg-white dark:bg-gray-800 p-6 mt-8 rounded shadow">
    <form action="proses_kontak.php" method="post" class="space-y-4">
      <div>
        <label class="block font-medium text-gray-700 dark:text-gray-300">Nama:</label>
        <input type="text" name="nama" required
               class="w-full p-2 border border-gray-300 dark:border-gray-600 rounded bg-white dark:bg-gray-700 text-gray-900 dark:text-white focus:outline-none focus:ring focus:border-sky-500">
      </div>
      <div>
        <label class="block font-medium text-gray-700 dark:text-gray-300">Email:</label>
        <input type="email" name="email" required
               class="w-full p-2 border border-gray-300 dark:border-gray-600 rounded bg-white dark:bg-gray-700 text-gray-900 dark:text-white focus:outline-none focus:ring focus:border-sky-500">
      </div>
      <div>
        <label class="block font-medium text-gray-700 dark:text-gray-300">Pesan:</label>
        <textarea name="pesan" rows="4" required
                  class="w-full p-2 border border-gray-300 dark:border-gray-600 rounded bg-white dark:bg-gray-700 text-gray-900 dark:text-white focus:outline-none focus:ring focus:border-sky-500"></textarea>
      </div>
      <div class="flex justify-end">
        <button type="submit"
                class="bg-sky-600 hover:bg-sky-700 text-white px-5 py-2 rounded transition">Kirim</button>
      </div>
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