-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 01, 2025 at 06:53 PM
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
  `id_siswa` varchar(50) NOT NULL,
  `nama_proyek` varchar(255) NOT NULL,
  `gambar` varchar(255) NOT NULL,
  `link` text NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

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
  `timestamp` datetime DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `tb_absensi`
--

CREATE TABLE `tb_absensi` (
  `id_absensi` int(11) NOT NULL,
  `id_siswa` varchar(50) DEFAULT NULL,
  `foto_siswa` varchar(255) DEFAULT NULL,
  `tanggal_absensi` datetime DEFAULT NULL,
  `keterangan` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

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

-- --------------------------------------------------------

--
-- Table structure for table `tb_guru`
--

CREATE TABLE `tb_guru` (
  `id_guru` varchar(50) NOT NULL,
  `nama_guru` varchar(100) NOT NULL,
  `jabatan` varchar(100) DEFAULT NULL,
  `foto` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tb_guru`
--

INSERT INTO `tb_guru` (`id_guru`, `nama_guru`, `jabatan`, `foto`) VALUES
('G002', 'Guru Default', 'Guru', NULL);

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
('G002', '$2y$10$2Nj/Z4YedcoFqaQ/MK0R2eFj4Oczb7WERXvdiynz.MfH3E/nY14QO', 'guru');

-- --------------------------------------------------------

--
-- Table structure for table `tb_mapel`
--

CREATE TABLE `tb_mapel` (
  `id_mapel` int(10) UNSIGNED NOT NULL,
  `nama_mapel` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

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
  `semester` enum('Ganjil','Genap') NOT NULL,
  `kelas` varchar(50) DEFAULT NULL,
  `deskripsi` text NOT NULL,
  `video_link` text DEFAULT NULL,
  `video_file` varchar(255) DEFAULT NULL,
  `gambar_json` text DEFAULT NULL,
  `file_materi` varchar(255) DEFAULT NULL,
  `created_at` datetime DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `tb_pengumpulan`
--

CREATE TABLE `tb_pengumpulan` (
  `id` int(11) UNSIGNED NOT NULL,
  `id_tugas` int(10) UNSIGNED NOT NULL,
  `id_siswa` varchar(50) NOT NULL,
  `file_tugas` varchar(255) DEFAULT NULL,
  `link_jawaban` text DEFAULT NULL,
  `nilai` int(3) DEFAULT NULL,
  `komentar` text DEFAULT NULL,
  `waktu_kumpul` datetime DEFAULT NULL,
  `dinilai_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

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
-- Indexes for dumped tables
--

--
-- Indexes for table `proyek_siswa`
--
ALTER TABLE `proyek_siswa`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_siswa` (`id_siswa`);

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
  ADD KEY `fk_pengumpulan_tugas` (`id_tugas`),
  ADD KEY `fk_pengumpulan_siswa` (`id_siswa`);

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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `riwayat_kelas`
--
ALTER TABLE `riwayat_kelas`
  MODIFY `id_riwayat` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tb_absensi`
--
ALTER TABLE `tb_absensi`
  MODIFY `id_absensi` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tb_diskusi`
--
ALTER TABLE `tb_diskusi`
  MODIFY `id_diskusi` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tb_diskusi_terbaca`
--
ALTER TABLE `tb_diskusi_terbaca`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tb_mapel`
--
ALTER TABLE `tb_mapel`
  MODIFY `id_mapel` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tb_materi`
--
ALTER TABLE `tb_materi`
  MODIFY `id_materi` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tb_pengumpulan`
--
ALTER TABLE `tb_pengumpulan`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tb_referensi`
--
ALTER TABLE `tb_referensi`
  MODIFY `id_referensi` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tb_tugas`
--
ALTER TABLE `tb_tugas`
  MODIFY `id_tugas` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `proyek_siswa`
--
ALTER TABLE `proyek_siswa`
  ADD CONSTRAINT `fk_proyek_siswa` FOREIGN KEY (`id_siswa`) REFERENCES `tb_siswa` (`id_siswa`) ON DELETE CASCADE ON UPDATE CASCADE;

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
  ADD CONSTRAINT `tb_diskusi_ibfk_1` FOREIGN KEY (`id_materi`) REFERENCES `tb_materi` (`id_materi`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `tb_guru`
--
ALTER TABLE `tb_guru`
  ADD CONSTRAINT `fk_guru_login` FOREIGN KEY (`id_guru`) REFERENCES `tb_login` (`id_user`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `tb_materi`
--
ALTER TABLE `tb_materi`
  ADD CONSTRAINT `fk_materi_guru` FOREIGN KEY (`id_guru`) REFERENCES `tb_guru` (`id_guru`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_materi_mapel` FOREIGN KEY (`id_mapel`) REFERENCES `tb_mapel` (`id_mapel`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `tb_pengumpulan`
--
ALTER TABLE `tb_pengumpulan`
  ADD CONSTRAINT `fk_pengumpulan_siswa` FOREIGN KEY (`id_siswa`) REFERENCES `tb_siswa` (`id_siswa`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_pengumpulan_tugas` FOREIGN KEY (`id_tugas`) REFERENCES `tb_tugas` (`id_tugas`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `tb_referensi`
--
ALTER TABLE `tb_referensi`
  ADD CONSTRAINT `fk_materi_ref` FOREIGN KEY (`id_materi`) REFERENCES `tb_materi` (`id_materi`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `tb_tugas`
--
ALTER TABLE `tb_tugas`
  ADD CONSTRAINT `tb_tugas_ibfk_1` FOREIGN KEY (`id_materi`) REFERENCES `tb_materi` (`id_materi`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
