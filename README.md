# 📘 E-LEARNING SMK NEGERI 1 KAMAL

Sistem e-learning berbasis website untuk mendukung pembelajaran DKV di SMK Negeri 1 Kamal. Dibangun menggunakan **CodeIgniter 4**.

---

<p align="center">
  <img src="https://img.shields.io/badge/CodeIgniter-4.x-orange?logo=codeigniter&logoColor=white" />
  <img src="https://img.shields.io/badge/PHP-8+-777BB4?logo=php&logoColor=white" />
  <img src="https://img.shields.io/badge/MySQL-8.0-4479A1?logo=mysql&logoColor=white" />
  <img src="https://img.shields.io/badge/Status-Active-success" />
</p>

---

## 📑 Tabel Konten

* [✨ Overview](#-overview)
* [🚀 Fitur Utama](#-fitur-utama)
* [🛠️ Instalasi di Lokal](#️-instalasi-di-lokal)
* [🔧 Konfigurasi File ENV](#-konfigurasi-file-env)
* [🗄️ Import Database](#️-import-database)
* [▶️ Menjalankan Server Lokal](#️-menjalankan-server-lokal)
* [🔑 Akun Login Default](#-akun-login-default)
* [🌐 Panduan Hosting](#-panduan-hosting)
* [🧩 Teknologi](#-teknologi)
* [📄 Lisensi](#-lisensi)

---

## ✨ Overview

Aplikasi e-learning untuk mendukung pembelajaran DKV di SMK Negeri 1 Kamal. Menyediakan fitur lengkap mulai dari materi, tugas, absensi, diskusi, hingga notifikasi.

---

## 🚀 Fitur Utama

### 👨‍🏫 Untuk Guru

* Manajemen materi (video, gambar, file, ringkasan)
* Manajemen tugas & penilaian
* Manajemen referensi
* Proyek siswa (gambar + link)
* Rekap absensi
* Diskusi per materi
* Notifikasi komentar baru
* Sistem kenaikan kelas
* Dashboard analitik sederhana

### 🧑‍🎓 Untuk Siswa

* Melihat materi berdasarkan guru, kelas, dan semester
* Mengirim tugas
* Melihat nilai
* Mengikuti diskusi
* Melihat referensi
* Melihat proyek
* Mendapatkan notifikasi

---

## 🛠️ Instalasi di Lokal

### 1️⃣ Clone Repository

```
git clone https://github.com/alfed-mubarok/e-learning.git
cd e-learning
```

### 2️⃣ Install Dependencies

```
composer install
```

### 3️⃣ Buat File .env

```
cp env.example .env
```

---

## 🔧 Konfigurasi File ENV

### Base URL Lokal

```
app.baseURL = 'http://localhost:8080'
```

### Database Lokal

```
database.default.hostname = localhost
database.default.database = e-learning
database.default.username = root
database.default.password =
database.default.DBDriver = MySQLi
database.default.port = 3306
```

### Encryption Key

```
Setelah membuat file .env, jalankan perintah berikut untuk menghasilkan encryption key:
php spark key:generate
```

---

## 🗄️ Import Database

1. Buka phpMyAdmin
2. Buat database baru:

```
e-learning
```

3. Import file SQL schema

---

## ▶️ Menjalankan Server Lokal

```
php spark serve
```

Akses:

```
http://localhost:8080
```

---

## 🔑 Akun Login Default

### 👨‍🏫 Guru

```
ID User  : G002
Password : admin
```

---

## 🌐 Panduan Hosting

### 1️⃣ Clone ke server

```
git clone https://github.com/alfed-mubarok/e-learning.git
```

### 2️⃣ Install dependencies

```
composer install
```

### 3️⃣ Copy env.example → .env

Isi database hosting.

### 4️⃣ Jadikan folder public sebagai web root

```
Jika menggunakan hosting cPanel, pindahkan isi folder /public ke folder /public_html/
atau atur document-root agar mengarah ke /public.
```

### 5️⃣ Set permission writable

```
chmod -R 775 writable/
```

### 6️⃣ Import database SQL

---

## 🧩 Teknologi

* CodeIgniter 4
* PHP 8+
* MySQL
* Bootstrap 5
* jQuery
* Composer

---

## 📄 Lisensi

Untuk keperluan akademik SMK Negeri 1 Kamal.
