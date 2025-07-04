<?php 
session_start(); 
if (isset($_SESSION['username'])) { 
  header('location:beranda_admin.php'); 
  exit;
}
require_once("../koneksi.php"); 
?>
<!DOCTYPE html>
<html lang="en" id="html" class="">
<head>
  <meta charset="UTF-8">
  <title>Login Administrator</title>

  <!-- Tailwind CDN -->
  <script src="https://cdn.tailwindcss.com"></script>

  <!-- Tailwind Config (dimasukkan SETELAH CDN) -->
  <script>
    tailwind.config = {
      darkMode: 'class',
      theme: {
        extend: {
          colors: {
            primary: '#0ea5e9',
            darkbg: '#1f2937',
            lightbg: '#f1f5f9',
          }
        }
      }
    };
  </script>
</head>
<body class="transition-all duration-300 bg-sky-100 dark:bg-gray-900 text-gray-900 dark:text-gray-200 font-sans flex items-center justify-center min-h-screen">

  <!-- Tombol Dark Mode -->
  <div class="absolute top-5 right-5">
    <button onclick="toggleDarkMode()" id="modeBtn"
      class="bg-white text-black dark:bg-gray-700 dark:text-white px-4 py-1 rounded shadow hover:scale-105 transition">
      🌙 Dark
    </button>
  </div>

  <!-- Login Card -->
  <div class="bg-white dark:bg-gray-800 rounded-xl shadow-xl p-8 w-full max-w-md">
    <h2 class="text-2xl font-bold text-center text-sky-700 dark:text-sky-400 mb-6">Login Administrator</h2>

    <form action="cek_login.php" method="post" class="space-y-5">
      <div>
        <label for="username" class="block text-sm font-medium">Username</label>
        <input type="text" name="username" id="username" required
          class="mt-1 block w-full rounded-md bg-sky-100 dark:bg-gray-700 text-gray-900 dark:text-gray-200 border border-sky-300 dark:border-gray-600 focus:ring-sky-500 focus:border-sky-500">
      </div>

      <div>
        <label for="password" class="block text-sm font-medium">Password</label>
        <input type="password" name="password" id="password" required
          class="mt-1 block w-full rounded-md bg-sky-100 dark:bg-gray-700 text-gray-900 dark:text-gray-200 border border-sky-300 dark:border-gray-600 focus:ring-sky-500 focus:border-sky-500">
      </div>

      <div class="flex justify-between items-center">
        <input type="submit" name="login" value="Login"
          class="bg-sky-600 text-white px-4 py-2 rounded hover:bg-sky-700 cursor-pointer">
        <input type="reset" name="cancel" value="Batal"
          class="bg-sky-100 dark:bg-gray-600 text-sky-800 dark:text-white px-4 py-2 rounded hover:bg-sky-300 dark:hover:bg-gray-500 cursor-pointer">
      </div>
    </form>

    <div class="text-center text-sm text-sky-800 dark:text-gray-400 mt-6">
      &copy; <?php echo date('Y'); ?> - Ilah Meilan
    </div>
  </div>

  <!-- Script Dark Mode -->
  <script>
    const html = document.getElementById('html');
    const modeBtn = document.getElementById('modeBtn');

    // Saat halaman dibuka, cek preferensi dark mode
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