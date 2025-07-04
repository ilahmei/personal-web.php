# 🌐 Personal Web – Website Artikel Pribadi

![Screenshot Website](https://raw.githubusercontent.com/ilahmei/personal-web.php/main/screenshot-home.jpg) <!-- Ganti link gambar sesuai upload kamu -->

## 📖 Deskripsi Proyek

Website ini merupakan projek website artikel pribadi yang dibuat menggunakan *PHP* dan *Tailwind CSS*. Website ini berfungsi sebagai media untuk menampilkan berbagai artikel, galeri gambar, informasi kegiatan, serta menyediakan form kontak bagi pengunjung.

Selain tampilan publik, website juga memiliki *halaman admin* untuk mengelola konten artikel dan data lainnya. Fitur *dark mode, **statistik pengunjung, dan **form buku tamu* juga ditambahkan untuk memberikan kesan modern dan interaktif.

📌 Cocok digunakan untuk:
- Portfolio pribadi
- Media berbagi tulisan
- Sarana belajar membuat website dinamis

---

## ✨ Fitur-Fitur Website

1. *Manajemen Artikel*  
   Admin bisa menambahkan, mengedit, dan menghapus artikel.  
   Artikel ditampilkan otomatis di halaman utama dari database.

2. *Login Admin*  
   Sistem login agar hanya admin yang dapat mengakses halaman pengelolaan.  
   Mencegah orang asing mengubah isi website.

3. *Dark Mode*  
   Pengunjung bisa mengaktifkan mode gelap untuk kenyamanan membaca.  
   Mode disimpan menggunakan localStorage.

4. *Galeri Gambar*  
   Halaman khusus untuk menampilkan foto dokumentasi, desain, atau portofolio visual.

5. *Form Kontak & Buku Tamu*  
   Pengunjung dapat mengirim pesan/feedback lewat form.  
   Pesan tersimpan di database dan bisa dibaca admin.

6. *Statistik Pengunjung*  
   Mencatat kunjungan berdasarkan IP address, user agent, dan tanggal.  
   Berguna untuk melihat seberapa sering website dikunjungi.

7. *Jadwal Kegiatan / Timeline*  
   Menampilkan list agenda atau event berdasarkan tanggal.

8. *Dashboard Admin*  
   Tampilan khusus untuk mengelola semua data (artikel, galeri, kontak, jadwal).  
   User-friendly dan terorganisir.

---

## 🛠 Teknologi yang Digunakan

| Teknologi       | Keterangan                                                                 |
|-----------------|-----------------------------------------------------------------------------|
| *HTML5*       | Struktur halaman web                                                       |
| *Tailwind CSS*| Styling modern, responsif, dan mendukung dark mode                         |
| *JavaScript*  | Interaktivitas seperti toggle dark mode dan validasi ringan                |
| *PHP (Native)*| Backend untuk proses form, login, CRUD data                                |
| *MySQL*       | Sistem basis data utama                                                    |
| *phpMyAdmin*  | GUI untuk mengelola database                                               |
| *XAMPP*       | Local server (Apache + MySQL)                                              |
| *Git*         | Version control dan tracking perubahan                                     |
| *GitHub*      | Menyimpan dan membagikan source code                                       |

---

## 🏠 Halaman Home / Artikel

- Menampilkan *daftar artikel terbaru* secara dinamis dari tabel tbl_artikel.
- Tiap artikel berisi: *judul, **tanggal, **deskripsi singkat, dan tombol **“Baca Selengkapnya”*.
- Ditampilkan menggunakan *PHP + Tailwind CSS*.
- Mendukung tampilan *Dark Mode*.

---

## 🚀 Cara Menjalankan Proyek

1. Clone repo ini:
   ```bash
   git clone https://github.com/ilahmei/personal-web.php.git
