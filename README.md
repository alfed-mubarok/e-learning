📘 E-LEARNING SMK NEGERI 1 KAMAL — CodeIgniter 4

Sistem e-learning berbasis website untuk mendukung pembelajaran DKV di SMK Negeri 1 Kamal.
Dibangun menggunakan CodeIgniter 4, dengan fitur lengkap:

Manajemen materi

Tugas & pengumpulan

Referensi

Proyek siswa

Diskusi & notifikasi

Absensi

Sistem kelas & semester

Dashboard guru dan siswa

📦 Fitur Utama

CRUD Materi (video, gambar, file, ringkasan)

CRUD Tugas (deadlines, upload file, nilai)

Diskusi per-materi

Notifikasi real-time sederhana

Proyek siswa (gambar + link)

Rekap absensi

Sistem kenaikan kelas

Sidebar dinamis berdasarkan guru–kelas–semester

🚀 Cara Install di Lokal
1️⃣ Clone Repository
git clone https://github.com/alfed-mubarok/e-learning.git
cd e-learning

2️⃣ Install Dependencies
composer install

3️⃣ Buat File .env dari Template
cp env.example .env

4️⃣ Konfigurasi .env
Base URL Lokal:
app.baseURL = 'http://localhost:8080'

Database Lokal:
database.default.hostname = localhost
database.default.database = e-learning
database.default.username = root
database.default.password =
database.default.DBDriver = MySQLi
database.default.port = 3306

Encryption Key:
encryption.key = base64:f8hjK8JYt1h0kP9u7Q1zN3yS8Bt1v4c2n0Q5zA2s4Wk=

5️⃣ Import Database

Buka phpMyAdmin

Buat database dengan nama: e-learning

Import file SQL schema

6️⃣ Jalankan Server
php spark serve


Akses:

http://localhost:8080

🔑 Akun Login Default
Guru
ID User  : G002
Password : admin


Guru dapat:

Tambah siswa

Tambah materi

Tambah tugas

Lihat rekap tugas

Tambah referensi

Kelola proyek siswa

🌐 Panduan Hosting (Untuk Server / Kakak Tingkat)

Clone repo ke server:

git clone https://github.com/alfed-mubarok/e-learning.git


Jalankan:

composer install


Copy env.example menjadi .env

Isi database hosting:

database.default.hostname = SQL_HOST
database.default.database = NAMA_DATABASE
database.default.username = USER_DB
database.default.password = PASSWORD_DB


Generate encryption key jika perlu:

php spark key:generate


Pastikan folder public/ dijadikan webroot (public_html)

Set permission folder writable:

chmod -R 775 writable/


Import database SQL

Jalankan website

Selesai 🎉

📚 Teknologi

CodeIgniter 4

PHP 8+

MySQL

Bootstrap 5

jQuery

📄 Lisensi

Project ini digunakan untuk keperluan akademik SMK Negeri 1 Kamal.

🧑‍💻 Pengembang

Alfed Mubarok
