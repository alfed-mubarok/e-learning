-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Sep 11, 2025 at 04:12 PM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `e-learning`
--

-- --------------------------------------------------------

--
-- Table structure for table `proyek_siswa`
--

CREATE TABLE `proyek_siswa` (
  `id` int(11) NOT NULL,
  `nama_proyek` varchar(255) NOT NULL,
  `gambar` varchar(255) NOT NULL,
  `link` text NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `proyek_siswa`
--

INSERT INTO `proyek_siswa` (`id`, `nama_proyek`, `gambar`, `link`, `created_at`) VALUES
(4, 'Fotografi', '1749995273_6cedfbf5ba3683ba8471.jpg', 'https://drive.google.com/drive/folders/1spEoXpg-U5D67DwFGQwqFQ9itO3yzjvM?usp=sharing', '2025-06-15 13:47:53');

-- --------------------------------------------------------

--
-- Table structure for table `riwayat_kelas`
--

CREATE TABLE `riwayat_kelas` (
  `id_riwayat` int(11) NOT NULL,
  `id_siswa` varchar(50) NOT NULL,
  `kelas` varchar(10) NOT NULL,
  `semester` enum('Ganjil','Genap') NOT NULL,
  `tahun_ajaran` varchar(9) NOT NULL,
  `timestamp` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `riwayat_kelas`
--

INSERT INTO `riwayat_kelas` (`id_riwayat`, `id_siswa`, `kelas`, `semester`, `tahun_ajaran`, `timestamp`) VALUES
(4, '098765', '10', 'Ganjil', '2024', '2025-07-07 05:12:59'),
(5, '123456', '10', 'Ganjil', '2021', '2025-07-07 05:13:12'),
(6, '654321', '11', 'Ganjil', '2021', '2025-07-07 05:15:43'),
(7, '210631100014', '11', 'Genap', '2025/2026', '2025-07-07 06:19:36'),
(8, '210631100014', '11', 'Ganjil', '2025/2026', '2025-07-07 06:20:24'),
(9, '210631100014', '11', 'Ganjil', '2025/2026', '2025-07-07 06:24:46');

-- --------------------------------------------------------

--
-- Table structure for table `tb_absensi`
--

CREATE TABLE `tb_absensi` (
  `id_absensi` int(11) NOT NULL,
  `id_siswa` varchar(50) DEFAULT NULL,
  `foto_siswa` varchar(255) DEFAULT NULL,
  `tanggal_absensi` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tb_absensi`
--

INSERT INTO `tb_absensi` (`id_absensi`, `id_siswa`, `foto_siswa`, `tanggal_absensi`) VALUES
(1, '123456', '685808169025a.png', '2025-06-22 13:41:42'),
(2, '098765', '6858499f26bfc.png', '2025-06-22 18:21:19'),
(3, '098765', '685849edde560.png', '2025-06-22 18:22:37'),
(4, '098765', '6858505d138ee.png', '2025-06-23 01:50:05'),
(5, '123456', '685e3aec4fa35.png', '2025-06-27 13:32:12'),
(6, '123456', '685e3fcb077f1.png', '2025-06-27 13:52:59'),
(7, '098765', '685e6261e4bf4.png', '2025-06-27 16:20:33'),
(8, '098765', '685e70231eb29.png', '2025-06-27 17:19:15'),
(9, '098765', '685e7e80113d8.png', '2025-06-27 18:20:32'),
(11, '098765', '685e862c28ab1.png', '2025-06-27 18:53:16'),
(12, '098765', '685e867967c9e.png', '2025-06-27 18:54:33'),
(13, '098765', '6867ba0264890.png', '2025-07-04 18:24:50'),
(14, '098765', '6867ba09930a7.png', '2025-07-04 18:24:57');

-- --------------------------------------------------------

--
-- Table structure for table `tb_diskusi`
--

CREATE TABLE `tb_diskusi` (
  `id_diskusi` int(11) NOT NULL,
  `id_materi` int(10) UNSIGNED NOT NULL,
  `id_user` varchar(50) NOT NULL,
  `role` enum('murid','guru') NOT NULL,
  `isi_pesan` text NOT NULL,
  `created_at` datetime DEFAULT current_timestamp(),
  `status` enum('belum_dibaca','sudah_dibaca') DEFAULT 'belum_dibaca'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tb_diskusi`
--

INSERT INTO `tb_diskusi` (`id_diskusi`, `id_materi`, `id_user`, `role`, `isi_pesan`, `created_at`, `status`) VALUES
(59, 2, 'admin', 'guru', 'ini untuk testing', '2025-06-29 14:03:27', 'sudah_dibaca'),
(60, 2, 'admin', 'guru', 'p', '2025-06-29 14:05:59', 'sudah_dibaca'),
(61, 2, 'admin', 'guru', 'ini untuk testing kesekian kalinya', '2025-06-29 14:09:51', 'sudah_dibaca'),
(62, 2, 'admin', 'guru', 'ini untuk testing kesekian kalinya', '2025-06-29 14:11:15', 'sudah_dibaca'),
(63, 2, 'admin', 'guru', 'p', '2025-06-29 14:11:26', 'sudah_dibaca'),
(64, 2, 'admin', 'guru', 'p', '2025-06-29 14:20:05', 'sudah_dibaca'),
(65, 2, '098765', 'murid', 'halo pak sudah aman kah?', '2025-06-29 14:20:30', 'sudah_dibaca'),
(66, 2, 'admin', 'guru', 'sudah', '2025-06-29 14:20:45', 'sudah_dibaca'),
(67, 4, '098765', 'murid', 'halo bapak', '2025-07-04 17:58:36', 'sudah_dibaca'),
(68, 4, 'admin', 'guru', 'iya halo', '2025-07-04 18:01:47', 'sudah_dibaca');

-- --------------------------------------------------------

--
-- Table structure for table `tb_diskusi_terbaca`
--

CREATE TABLE `tb_diskusi_terbaca` (
  `id` int(11) NOT NULL,
  `id_user` varchar(50) NOT NULL,
  `id_materi` int(11) NOT NULL,
  `terakhir_dibuka` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tb_diskusi_terbaca`
--

INSERT INTO `tb_diskusi_terbaca` (`id`, `id_user`, `id_materi`, `terakhir_dibuka`) VALUES
(1, 'admin', 2, '2025-06-30 14:38:15'),
(2, 'admin', 4, '2025-07-04 18:01:47');

-- --------------------------------------------------------

--
-- Table structure for table `tb_guru`
--

CREATE TABLE `tb_guru` (
  `id_guru` varchar(50) NOT NULL,
  `nama_guru` varchar(100) NOT NULL,
  `mapel_diampu` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tb_guru`
--

INSERT INTO `tb_guru` (`id_guru`, `nama_guru`, `mapel_diampu`) VALUES
('admin', 'Bapak Salman Al-Farisi', 'Fotografi');

-- --------------------------------------------------------

--
-- Table structure for table `tb_login`
--

CREATE TABLE `tb_login` (
  `id_user` varchar(50) NOT NULL,
  `password` varchar(255) NOT NULL,
  `status` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tb_login`
--

INSERT INTO `tb_login` (`id_user`, `password`, `status`) VALUES
('098765', '$2y$10$MXnDWZzMTLeFeUcjqORDHuQDfjPjX.FZJU39dyZg8R6YOlipkd.vW', 'murid'),
('123456', '$2y$10$j1GajyskeoMtGpVyjvEeKOXYaMmrEiJoHy9e5/rasfNEg7SSqoTYi', 'murid'),
('210631100014', '$2y$10$EZ4IBvHdW/87R7o2Zoq6VumaRvTgL8gOMxUmEXdwaHdwHPBVgVlnu', 'murid'),
('654321', '$2y$10$8FBuM6Qkk/cRI9DKstN32Oyv5OTckGWVPHxMUa5bXgm9YtLSSKO/O', 'murid'),
('admin', '$2y$10$2Nj/Z4YedcoFqaQ/MK0R2eFj4Oczb7WERXvdiynz.MfH3E/nY14QO', 'guru'),
('siswa', '$2y$10$ZAlkdzvzZw3BLjHsmz8fFev6pNWRPIFqUmzKOpC3cU5.oT9MoPwf.', 'murid');

-- --------------------------------------------------------

--
-- Table structure for table `tb_mapel`
--

CREATE TABLE `tb_mapel` (
  `id_mapel` int(10) UNSIGNED NOT NULL,
  `nama_mapel` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tb_mapel`
--

INSERT INTO `tb_mapel` (`id_mapel`, `nama_mapel`) VALUES
(1, 'Dasar-Dasar Desain Grafis'),
(2, 'Fotografi'),
(3, 'Animasi 2D'),
(4, 'Multimedia'),
(5, 'Videografi'),
(6, 'Web Desain'),
(7, 'Desain Komunikasi Visual'),
(8, 'Motion Graphic'),
(9, 'Ilustrasi Digital');

-- --------------------------------------------------------

--
-- Table structure for table `tb_materi`
--

CREATE TABLE `tb_materi` (
  `id_materi` int(10) UNSIGNED NOT NULL,
  `id_guru` varchar(50) NOT NULL,
  `id_mapel` int(10) UNSIGNED NOT NULL,
  `nomor_materi` int(11) NOT NULL,
  `judul` varchar(255) NOT NULL,
  `tahun_target` varchar(10) NOT NULL,
  `semester` enum('ganjil','genap') NOT NULL,
  `kelas` varchar(50) DEFAULT NULL,
  `deskripsi` text NOT NULL,
  `video_link` text DEFAULT NULL,
  `video_file` varchar(255) DEFAULT NULL,
  `gambar_json` text DEFAULT NULL,
  `file_materi` varchar(255) DEFAULT NULL,
  `created_at` datetime DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tb_materi`
--

INSERT INTO `tb_materi` (`id_materi`, `id_guru`, `id_mapel`, `nomor_materi`, `judul`, `tahun_target`, `semester`, `kelas`, `deskripsi`, `video_link`, `video_file`, `gambar_json`, `file_materi`, `created_at`) VALUES
(2, 'admin', 2, 1, 'dasar fotografi', '2024', 'ganjil', '10', 'ini uji coba kedua untuk diedit', '', NULL, '[\"1750687575_4c01397239195087bcf0.jpg\",\"1750691756_f83d96f53f82df9b4556.jpg\"]', NULL, '2025-06-23 21:06:15'),
(3, 'admin', 2, 2, 'fotografi profesional', '2024', 'ganjil', '10', 'ini uji coba untuk referensi', '', NULL, '[]', '1751028691_5a8f756231d28a374f9b.pdf', '2025-06-24 23:22:09'),
(4, 'admin', 1, 3, 'Typografi', '2024', 'ganjil', '10', 'Apa Itu Tipografi \r\nPengertian tipografi merujuk pada seni memilih dan mengatur huruf atau teks sebagai elemen visual dalam suatu desain. Dalam konteks ini, teknik tipografi tidak hanya mempertimbangkan penampilan dan kesan visual, tetapi juga memperhatikan aspek daya tarik, pemahaman pembaca serta maksud pesan yang ingin disampaikan.  \r\n\r\nTipografi bukan hanya seni, tetapi ilmu yang memiliki peran penting dalam memperlancar komunikasi visual. Dengan pengaturan yang tepat, pesan dapat lebih mudah dipahami dan disampaikan secara efektif. Proses penerapan tipografi memiliki tujuan untuk membangkitkan emosi dan menyampaikan pesan tertentu melalui tampilan huruf dan teks. \r\n\r\nContoh tipografi sering ditemui dalam berbagai konteks visual, seperti pada poster film yang memanfaatkan tipografi untuk mengekspresikan nuansa dan tema. Lalu kemasan produk juga menggunakan tipografi untuk menciptakan identitas merek yang khas dan menarik perhatian konsumen. Bahkan kamu bisa menemukannya dalam sebuah logo wordmark, logo sebuah merek berbentuk teks yang menjadi identitas ikonik. \r\n\r\nTipografi ada dimana-mana, kehadirannya ada di berbagai media termasuk lingkungan, UI gadget, cetakan, dan tentunya ranah digital. Kamu bisa mengeksplor banyak referensi dari sana. Dengan memperkaya pengetahuanmu akan referensi tipografi, kamu bisa menambahkan value di setiap karya desainmu.', '', NULL, '[\"1751024816_1e5d1047143ce494aaa9.jpg\"]', NULL, '2025-06-27 18:46:56'),
(5, 'admin', 1, 4, 'Dasar Desain Grafis', '2024', '', '10', 'Dasar desain grafis mencakup prinsip-prinsip dan elemen-elemen yang membentuk komunikasi visual yang efektif. Prinsip-prinsip tersebut meliputi kesatuan, keseimbangan, proporsi, penekanan, irama, dan ruang. Elemen-elemen dasar desain grafis meliputi garis, bentuk, warna, tekstur, dan tipografi. \r\nPrinsip Dasar Desain Grafis:\r\nKesatuan (Unity):\r\nElemen-elemen desain saling terkait dan membentuk satu kesatuan yang harmonis. \r\nKeseimbangan (Balance):\r\nDistribusi visual elemen-elemen desain agar tidak ada satu bagian yang terasa lebih berat dari bagian lain. Keseimbangan bisa simetris atau asimetris. \r\nProporsi (Proportion):\r\nHubungan ukuran dan skala antar elemen dalam desain. Proporsi yang baik menciptakan hierarki visual yang jelas. \r\nPenekanan (Emphasis):\r\nElemen yang ingin ditonjolkan agar menjadi pusat perhatian. Penekanan dapat dicapai melalui perbedaan ukuran, warna, atau posisi. \r\nIrama (Rhythm):\r\nPengulangan elemen-elemen desain yang teratur untuk menciptakan kesan pergerakan atau keteraturan. \r\nRuang (Space):\r\nPenggunaan ruang kosong (negative space) untuk memberikan kejelasan dan keseimbangan pada desain. \r\nElemen Dasar Desain Grafis:\r\nGaris (Line):\r\nElemen dasar yang menghubungkan dua titik, digunakan untuk membuat bentuk, garis luar, dan memberikan arah pada desain. \r\nBentuk (Shape):\r\nTerbentuk dari garis yang saling terhubung, bisa geometris (kotak, lingkaran) atau organik (bebas, natural). \r\nWarna (Color):\r\nElemen penting yang memberikan kesan visual dan emosional pada desain. Pemilihan warna yang tepat dapat meningkatkan pesan yang ingin disampaikan. \r\nTekstur (Texture):\r\nMemberikan kesan permukaan pada desain, bisa terasa kasar, halus, atau mengkilap. \r\nTipografi:\r\nPemilihan dan pengaturan huruf untuk menyampaikan pesan secara visual. Pemilihan font yang tepat akan mempengaruhi kesan desain. \r\nDengan memahami prinsip dan elemen dasar ini, desainer pemula dapat menciptakan desain grafis yang efektif dan menarik secara visual. ', 'https://www.youtube.com/embed/-5Tpw5fXeVo', NULL, '[]', NULL, '2025-06-27 19:03:30'),
(6, 'admin', 2, 5, 'Rule Of Third', '2021', '', '10', 'Rule of Thirds, atau Aturan Sepertiga, adalah prinsip komposisi dalam fotografi (dan juga bidang desain lainnya) yang menyarankan untuk membagi bidang gambar menjadi sembilan bagian yang sama dengan dua garis horizontal dan dua garis vertikal yang sejajar, membentuk kisi-kisi. Elemen penting dalam gambar, seperti subjek utama, sebaiknya ditempatkan di sepanjang garis-garis ini atau pada titik-titik perpotongan garis tersebut, bukan di tengah gambar. \r\nCara Kerja Rule of Thirds:\r\n1. Bayangkan kisi:\r\nBayangkan gambar Anda terbagi menjadi sembilan bagian yang sama oleh dua garis horizontal dan dua garis vertikal. \r\n2. Tempatkan elemen penting:\r\nPosisikan elemen-elemen penting dalam foto Anda, seperti subjek utama, di sepanjang garis-garis atau pada titik-titik perpotongan ini. \r\n3. Hindari tengah:\r\nAlih-alih menempatkan subjek tepat di tengah, aturan ini menyarankan untuk memposisikannya di salah satu area sepertiga gambar. ', '', NULL, '[]', '1751028262_d984a88ab9ff9eeab9b1.pdf', '2025-06-27 19:24:08');

-- --------------------------------------------------------

--
-- Table structure for table `tb_pengumpulan`
--

CREATE TABLE `tb_pengumpulan` (
  `id` int(11) UNSIGNED NOT NULL,
  `id_tugas` int(10) UNSIGNED NOT NULL,
  `id_siswa` varchar(20) NOT NULL,
  `file_tugas` varchar(255) DEFAULT NULL,
  `link_jawaban` text DEFAULT NULL,
  `nilai` int(3) DEFAULT NULL,
  `komentar` text DEFAULT NULL,
  `waktu_kumpul` datetime DEFAULT NULL,
  `dinilai_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tb_pengumpulan`
--

INSERT INTO `tb_pengumpulan` (`id`, `id_tugas`, `id_siswa`, `file_tugas`, `link_jawaban`, `nilai`, `komentar`, `waktu_kumpul`, `dinilai_at`) VALUES
(14, 1, '098765', '1751260948_68727044617f4c60a990.pdf', NULL, 80, 'jelek', '2025-06-30 12:22:28', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `tb_referensi`
--

CREATE TABLE `tb_referensi` (
  `id_referensi` int(10) UNSIGNED NOT NULL,
  `id_materi` int(10) UNSIGNED NOT NULL,
  `nama_referensi` varchar(255) NOT NULL,
  `link` text DEFAULT NULL,
  `file` varchar(255) DEFAULT NULL,
  `created_at` datetime DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tb_referensi`
--

INSERT INTO `tb_referensi` (`id_referensi`, `id_materi`, `nama_referensi`, `link`, `file`, `created_at`) VALUES
(4, 2, 'buku karya alfed 3', '', '1750784448_3e6b90b1fdbda97c0fc4.pdf', '2025-06-25 00:00:48'),
(5, 2, 'desain grafis', 'https://www.ruangguru.com/blog/unsur-dan-prinsip-dasar-desain-grafis', NULL, '2025-07-01 14:11:48');

-- --------------------------------------------------------

--
-- Table structure for table `tb_siswa`
--

CREATE TABLE `tb_siswa` (
  `id_siswa` varchar(50) NOT NULL,
  `nama` varchar(100) NOT NULL,
  `kelas` varchar(50) NOT NULL,
  `kelas_sekarang` varchar(10) NOT NULL,
  `no_absen` int(11) NOT NULL,
  `tahun_masuk` year(4) NOT NULL,
  `foto` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tb_siswa`
--

INSERT INTO `tb_siswa` (`id_siswa`, `nama`, `kelas`, `kelas_sekarang`, `no_absen`, `tahun_masuk`, `foto`) VALUES
('098765', 'yesi', '10', '10', 13, '2024', '1750615659_7a5549b72b1665795e29.png'),
('123456', 'alfed', '10', '10', 10, '2021', '1751012562_c820b8d6c8513ccee6ff.png'),
('210631100014', 'hendro', '10', '10', 1, '2024', '1751863454_bbd165a7a63ce9873d14.jpg'),
('654321', 'hendra', '11', '11', 11, '2021', '1750001961_fd6dde64681b725126e7.png');

-- --------------------------------------------------------

--
-- Table structure for table `tb_tugas`
--

CREATE TABLE `tb_tugas` (
  `id_tugas` int(10) UNSIGNED NOT NULL,
  `id_materi` int(10) UNSIGNED NOT NULL,
  `headline` varchar(255) NOT NULL,
  `deskripsi` text NOT NULL,
  `deadline` datetime NOT NULL,
  `file_pendukung` varchar(255) DEFAULT NULL,
  `kelas_target` varchar(50) NOT NULL,
  `tahun_target` varchar(10) NOT NULL,
  `semester` enum('Ganjil','Genap') DEFAULT NULL,
  `created_at` datetime DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tb_tugas`
--

INSERT INTO `tb_tugas` (`id_tugas`, `id_materi`, `headline`, `deskripsi`, `deadline`, `file_pendukung`, `kelas_target`, `tahun_target`, `semester`, `created_at`) VALUES
(1, 2, 'merangkum', 'rangkum halaman 1-50 buku karya alfed', '2025-06-28 23:59:00', NULL, '10', '2024', 'Ganjil', '2025-06-25 22:12:46'),
(2, 3, 'Merangkum Lagi', 'Siswa diminta untuk membuat rangkuman tertulis berdasarkan materi yang telah dipelajari mengenai dasar-dasar fotografi. Rangkuman ini bertujuan untuk mengukur pemahaman siswa terhadap konsep dasar fotografi, serta melatih kemampuan meresume informasi secara sistematis.\r\n\r\nRangkuman harus mencakup setidaknya tiga poin utama, yaitu:\r\n\r\nPengertian dan tujuan fotografi.\r\n\r\nJenis-jenis kamera beserta fungsinya secara umum.\r\n\r\nElemen-elemen penting dalam teknik pencahayaan (lighting) dalam fotografi.\r\n\r\nRangkuman diketik rapi menggunakan software pengolah kata, dengan panjang minimal 300 kata, disimpan dalam format PDF, dan diunggah melalui sistem.\r\n\r\nTugas ini harus dikerjakan secara individu dan dikumpulkan paling lambat sesuai dengan tanggal deadline yang telah ditentukan. Penilaian didasarkan pada kelengkapan isi, ketepatan informasi, dan kerapihan penulisan.', '2025-06-29 14:09:00', NULL, '10', '2024', 'Ganjil', '2025-06-30 14:09:47'),
(3, 4, 'merangkum', 'rangkum aja terus', '2025-07-06 21:23:00', NULL, '10', '2024', 'Ganjil', '2025-07-06 21:23:16');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `proyek_siswa`
--
ALTER TABLE `proyek_siswa`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `riwayat_kelas`
--
ALTER TABLE `riwayat_kelas`
  ADD PRIMARY KEY (`id_riwayat`),
  ADD KEY `id_siswa` (`id_siswa`);

--
-- Indexes for table `tb_absensi`
--
ALTER TABLE `tb_absensi`
  ADD PRIMARY KEY (`id_absensi`),
  ADD KEY `id_siswa` (`id_siswa`);

--
-- Indexes for table `tb_diskusi`
--
ALTER TABLE `tb_diskusi`
  ADD PRIMARY KEY (`id_diskusi`),
  ADD KEY `id_materi` (`id_materi`);

--
-- Indexes for table `tb_diskusi_terbaca`
--
ALTER TABLE `tb_diskusi_terbaca`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `id_user` (`id_user`,`id_materi`);

--
-- Indexes for table `tb_guru`
--
ALTER TABLE `tb_guru`
  ADD PRIMARY KEY (`id_guru`);

--
-- Indexes for table `tb_login`
--
ALTER TABLE `tb_login`
  ADD PRIMARY KEY (`id_user`);

--
-- Indexes for table `tb_mapel`
--
ALTER TABLE `tb_mapel`
  ADD PRIMARY KEY (`id_mapel`);

--
-- Indexes for table `tb_materi`
--
ALTER TABLE `tb_materi`
  ADD PRIMARY KEY (`id_materi`),
  ADD KEY `fk_guru` (`id_guru`),
  ADD KEY `fk_mapel` (`id_mapel`);

--
-- Indexes for table `tb_pengumpulan`
--
ALTER TABLE `tb_pengumpulan`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_pengumpulan_tugas` (`id_tugas`);

--
-- Indexes for table `tb_referensi`
--
ALTER TABLE `tb_referensi`
  ADD PRIMARY KEY (`id_referensi`),
  ADD KEY `fk_materi_ref` (`id_materi`);

--
-- Indexes for table `tb_siswa`
--
ALTER TABLE `tb_siswa`
  ADD PRIMARY KEY (`id_siswa`);

--
-- Indexes for table `tb_tugas`
--
ALTER TABLE `tb_tugas`
  ADD PRIMARY KEY (`id_tugas`),
  ADD KEY `id_materi` (`id_materi`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `proyek_siswa`
--
ALTER TABLE `proyek_siswa`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `riwayat_kelas`
--
ALTER TABLE `riwayat_kelas`
  MODIFY `id_riwayat` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `tb_absensi`
--
ALTER TABLE `tb_absensi`
  MODIFY `id_absensi` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `tb_diskusi`
--
ALTER TABLE `tb_diskusi`
  MODIFY `id_diskusi` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=69;

--
-- AUTO_INCREMENT for table `tb_diskusi_terbaca`
--
ALTER TABLE `tb_diskusi_terbaca`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `tb_mapel`
--
ALTER TABLE `tb_mapel`
  MODIFY `id_mapel` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `tb_materi`
--
ALTER TABLE `tb_materi`
  MODIFY `id_materi` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `tb_pengumpulan`
--
ALTER TABLE `tb_pengumpulan`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `tb_referensi`
--
ALTER TABLE `tb_referensi`
  MODIFY `id_referensi` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `tb_tugas`
--
ALTER TABLE `tb_tugas`
  MODIFY `id_tugas` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `riwayat_kelas`
--
ALTER TABLE `riwayat_kelas`
  ADD CONSTRAINT `riwayat_kelas_ibfk_1` FOREIGN KEY (`id_siswa`) REFERENCES `tb_siswa` (`id_siswa`) ON DELETE CASCADE;

--
-- Constraints for table `tb_absensi`
--
ALTER TABLE `tb_absensi`
  ADD CONSTRAINT `tb_absensi_ibfk_1` FOREIGN KEY (`id_siswa`) REFERENCES `tb_siswa` (`id_siswa`);

--
-- Constraints for table `tb_diskusi`
--
ALTER TABLE `tb_diskusi`
  ADD CONSTRAINT `tb_diskusi_ibfk_1` FOREIGN KEY (`id_materi`) REFERENCES `tb_materi` (`id_materi`);

--
-- Constraints for table `tb_materi`
--
ALTER TABLE `tb_materi`
  ADD CONSTRAINT `fk_guru` FOREIGN KEY (`id_guru`) REFERENCES `tb_guru` (`id_guru`),
  ADD CONSTRAINT `fk_mapel` FOREIGN KEY (`id_mapel`) REFERENCES `tb_mapel` (`id_mapel`);

--
-- Constraints for table `tb_pengumpulan`
--
ALTER TABLE `tb_pengumpulan`
  ADD CONSTRAINT `fk_pengumpulan_tugas` FOREIGN KEY (`id_tugas`) REFERENCES `tb_tugas` (`id_tugas`) ON DELETE CASCADE;

--
-- Constraints for table `tb_referensi`
--
ALTER TABLE `tb_referensi`
  ADD CONSTRAINT `fk_materi_ref` FOREIGN KEY (`id_materi`) REFERENCES `tb_materi` (`id_materi`) ON DELETE CASCADE;

--
-- Constraints for table `tb_tugas`
--
ALTER TABLE `tb_tugas`
  ADD CONSTRAINT `tb_tugas_ibfk_1` FOREIGN KEY (`id_materi`) REFERENCES `tb_materi` (`id_materi`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
