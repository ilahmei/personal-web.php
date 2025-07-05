🌐 Personal Web – Website Artikel Pribadi

## 📖 Deskripsi Proyek

Website ini merupakan projek website artikel pribadi yang dibuat menggunakan PHP dan Tailwind CSS. Website ini berfungsi sebagai media untuk menampilkan berbagai artikel, galeri gambar, informasi kegiatan, serta menyediakan form kontak bagi pengunjung.

Selain tampilan publik, website juga memiliki halaman admin untuk mengelola konten artikel dan data lainnya.  
Fitur dark mode, **statistik pengunjung, dan **form buku tamu juga ditambahkan untuk memberikan kesan modern dan interaktif.

🎯 Cocok digunakan untuk:
- Portfolio pribadi
- Media berbagi tulisan
- Sarana belajar pengembangan website dinamis

---

## ✨ Fitur-Fitur Website

1. Manajemen Artikel  
   Tambah, edit, dan hapus artikel oleh admin. Artikel tampil otomatis dari database.

2. Login Admin  
   Sistem login agar hanya admin yang bisa mengakses panel pengelolaan.

3. Dark Mode  
   Tampilan gelap yang nyaman di mata, disimpan dengan localStorage.

4. Galeri Gambar  
   Halaman untuk menampilkan dokumentasi atau portofolio visual.

5. Form Kontak & Buku Tamu  
   Pengunjung dapat mengirim pesan yang tersimpan di database.

6. Statistik Pengunjung  
   Mencatat data kunjungan: IP, device, waktu kunjungan.

7. Jadwal Kegiatan / Timeline  
   Menampilkan event atau agenda yang akan datang.

8. Dashboard Admin  
   Panel admin yang memudahkan pengelolaan data secara terpusat.

---

## 📂 Struktur Folder & File

```bash
📁 Personal_Ilah_D1A240008
├── 📁 admin
│   ├── about.php
│   ├── add_about.php
│   ├── add_artikel.php
│   ├── add_gallery.php
│   ├── beranda_admin.php
│   ├── cek_akses.php
│   ├── cek_login.php
│   ├── data_artikel.php
│   ├── data_gallery.php
│   ├── data_kontak.php
│   ├── delete_about.php
│   ├── delete_artikel.php
│   ├── delete_gallery.php
│   ├── detail_artikel.php
│   ├── edit_about.php
│   ├── edit_artikel.php
│   ├── edit_gallery.php
│   ├── login.php
│   ├── logout.php
│   ├── proses_add_about.php
│   ├── proses_add_artikel.php
│   ├── proses_add_gallery.php
│   ├── proses_edit_about.php
│   ├── proses_edit_artikel.php
│   ├── proses_edit_gallery.php
│   ├── proses_komentar.php
│   ├── proses_kontak.php
│   ├── statistik.php
│   └── kontak.php
├── 📁 images
│   └── (Berisi gambar galeri & artikel)
├── about.php
├── form_kegiatan.php
├── gallery.php
├── index.php
├── jadwal_kegiatan.php
├── koneksi.php
├── kontak.php
├── proses_kegiatan.php
└── tailwind.config.js
