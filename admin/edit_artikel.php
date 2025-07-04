<?php 
include('../koneksi.php'); 
session_start(); 
if (!isset($_SESSION['username'])) { 
  header('location:login.php'); 
  exit; 
} 

$id = $_GET['id_artikel']; 
$sql = "SELECT * FROM tbl_artikel WHERE id_artikel = '$id'"; 
$query = mysqli_query($db, $sql); 
$data = mysqli_fetch_array($query); 
?>

<!DOCTYPE html>
<html lang="en" id="html" class="">
<head>
  <meta charset="UTF-8">
  <title>Edit Artikel</title>
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
<body class="transition-all duration-300 bg-sky-100 dark:bg-gray-900 text-sky-900 dark:text-gray-200 min-h-screen font-sans">

  <!-- Header -->
  <header class="bg-sky-600 dark:bg-gray-800 text-white text-center py-6 shadow-md rounded-b-xl relative">
    <h1 class="text-3xl font-bold">Edit Artikel</h1>
    <div class="absolute top-4 right-6">
      <button onclick="toggleDarkMode()" id="modeBtn"
        class="bg-white text-black dark:bg-gray-600 dark:text-white px-4 py-1 rounded shadow hover:scale-105 transition">
        🌙 Dark
      </button>
    </div>
  </header>

  <div class="flex max-w-7xl mx-auto mt-8 px-4 gap-6">

    <!-- Sidebar -->
    <aside class="w-1/4 bg-sky-300 dark:bg-gray-800 rounded-xl shadow p-5">
      <h2 class="text-xl font-semibold text-white mb-4 text-center">MENU</h2>
      <ul class="space-y-2 text-white font-medium">
        <li><a href="beranda_admin.php" class="block hover:underline">Beranda</a></li>
        <li><a href="data_artikel.php" class="block font-bold underline">Kelola Artikel</a></li>
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
    <main class="w-3/4 bg-white dark:bg-gray-800 border border-sky-200 dark:border-gray-700 rounded-xl shadow p-6">
      <form action="proses_edit_artikel.php" method="post" class="space-y-6">
        <input type="hidden" name="id_artikel" value="<?php echo $data['id_artikel']; ?>">

        <div>
          <label for="nama_artikel" class="block text-sm font-medium mb-1 text-sky-800 dark:text-sky-300">Judul Artikel</label>
          <input type="text" id="nama_artikel" name="nama_artikel" required
            value="<?php echo htmlspecialchars($data['nama_artikel']); ?>"
            class="w-full p-2 border border-sky-300 dark:border-gray-600 rounded bg-white dark:bg-gray-700 focus:outline-none focus:ring focus:border-sky-500 dark:text-white">
        </div>

        <div>
          <label for="isi_artikel" class="block text-sm font-medium mb-1 text-sky-800 dark:text-sky-300">Isi Artikel</label>
          <textarea id="isi_artikel" name="isi_artikel" rows="8" required
            class="w-full p-2 border border-sky-300 dark:border-gray-600 rounded bg-white dark:bg-gray-700 focus:outline-none focus:ring focus:border-sky-500 dark:text-white"><?php echo htmlspecialchars($data['isi_artikel']); ?></textarea>
        </div>

        <div class="flex justify-end space-x-4">
          <button type="submit"
            class="bg-sky-700 text-white px-4 py-2 rounded hover:bg-sky-800 transition duration-200">Update</button>
          <a href="data_artikel.php"
            class="bg-gray-300 dark:bg-gray-600 text-gray-800 dark:text-white px-4 py-2 rounded hover:bg-gray-400 dark:hover:bg-gray-700 transition duration-200">Batal</a>
        </div>
      </form>
    </main>
  </div>

  <!-- Footer -->
  <footer class="bg-sky-500 dark:bg-gray-800 text-white text-center py-4 mt-10 rounded-t-xl">
    &copy; <?php echo date('Y'); ?> | Created by Ilah Meilan
  </footer>

  <!-- Toggle Dark Mode Script -->
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