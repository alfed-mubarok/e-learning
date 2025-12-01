-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Sep 11, 2025 at 04:15 PM
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
-- Database: `alfed_014`
--
CREATE DATABASE IF NOT EXISTS `alfed_014` DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci;
USE `alfed_014`;

-- --------------------------------------------------------

--
-- Table structure for table `diterima`
--
-- Error reading structure for table alfed_014.diterima: #1932 - Table &#039;alfed_014.diterima&#039; doesn&#039;t exist in engine
-- Error reading data for table alfed_014.diterima: #1064 - You have an error in your SQL syntax; check the manual that corresponds to your MariaDB server version for the right syntax to use near &#039;FROM `alfed_014`.`diterima`&#039; at line 1

-- --------------------------------------------------------

--
-- Table structure for table `jurusan`
--
-- Error reading structure for table alfed_014.jurusan: #1932 - Table &#039;alfed_014.jurusan&#039; doesn&#039;t exist in engine
-- Error reading data for table alfed_014.jurusan: #1064 - You have an error in your SQL syntax; check the manual that corresponds to your MariaDB server version for the right syntax to use near &#039;FROM `alfed_014`.`jurusan`&#039; at line 1

-- --------------------------------------------------------

--
-- Table structure for table `mahasiswa`
--
-- Error reading structure for table alfed_014.mahasiswa: #1932 - Table &#039;alfed_014.mahasiswa&#039; doesn&#039;t exist in engine
-- Error reading data for table alfed_014.mahasiswa: #1064 - You have an error in your SQL syntax; check the manual that corresponds to your MariaDB server version for the right syntax to use near &#039;FROM `alfed_014`.`mahasiswa`&#039; at line 1
--
-- Database: `dbkuliner`
--
CREATE DATABASE IF NOT EXISTS `dbkuliner` DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci;
USE `dbkuliner`;

-- --------------------------------------------------------

--
-- Table structure for table `kategori_makanan`
--
-- Error reading structure for table dbkuliner.kategori_makanan: #1932 - Table &#039;dbkuliner.kategori_makanan&#039; doesn&#039;t exist in engine
-- Error reading data for table dbkuliner.kategori_makanan: #1064 - You have an error in your SQL syntax; check the manual that corresponds to your MariaDB server version for the right syntax to use near &#039;FROM `dbkuliner`.`kategori_makanan`&#039; at line 1

-- --------------------------------------------------------

--
-- Table structure for table `lokasi`
--
-- Error reading structure for table dbkuliner.lokasi: #1932 - Table &#039;dbkuliner.lokasi&#039; doesn&#039;t exist in engine
-- Error reading data for table dbkuliner.lokasi: #1064 - You have an error in your SQL syntax; check the manual that corresponds to your MariaDB server version for the right syntax to use near &#039;FROM `dbkuliner`.`lokasi`&#039; at line 1

-- --------------------------------------------------------

--
-- Table structure for table `makanan`
--
-- Error reading structure for table dbkuliner.makanan: #1932 - Table &#039;dbkuliner.makanan&#039; doesn&#039;t exist in engine
-- Error reading data for table dbkuliner.makanan: #1064 - You have an error in your SQL syntax; check the manual that corresponds to your MariaDB server version for the right syntax to use near &#039;FROM `dbkuliner`.`makanan`&#039; at line 1

-- --------------------------------------------------------

--
-- Table structure for table `pengguna`
--
-- Error reading structure for table dbkuliner.pengguna: #1932 - Table &#039;dbkuliner.pengguna&#039; doesn&#039;t exist in engine
-- Error reading data for table dbkuliner.pengguna: #1064 - You have an error in your SQL syntax; check the manual that corresponds to your MariaDB server version for the right syntax to use near &#039;FROM `dbkuliner`.`pengguna`&#039; at line 1

-- --------------------------------------------------------

--
-- Table structure for table `ulasan`
--
-- Error reading structure for table dbkuliner.ulasan: #1932 - Table &#039;dbkuliner.ulasan&#039; doesn&#039;t exist in engine
-- Error reading data for table dbkuliner.ulasan: #1064 - You have an error in your SQL syntax; check the manual that corresponds to your MariaDB server version for the right syntax to use near &#039;FROM `dbkuliner`.`ulasan`&#039; at line 1
--
-- Database: `db_perpustakaan`
--
CREATE DATABASE IF NOT EXISTS `db_perpustakaan` DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci;
USE `db_perpustakaan`;

-- --------------------------------------------------------

--
-- Table structure for table `tb_admin`
--

CREATE TABLE `tb_admin` (
  `id_admin` varchar(8) NOT NULL,
  `password` varchar(32) NOT NULL,
  `nama` varchar(30) NOT NULL,
  `alamat` varchar(30) NOT NULL,
  `no_hp` char(13) NOT NULL,
  `img` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

-- --------------------------------------------------------

--
-- Table structure for table `tb_agama`
--

CREATE TABLE `tb_agama` (
  `id_agama` int(2) NOT NULL,
  `agama` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `tb_agama`
--

INSERT INTO `tb_agama` (`id_agama`, `agama`) VALUES
(2, 'Islam'),
(3, 'Konghucu'),
(4, 'Budha'),
(5, 'Katholik'),
(6, 'Hindu');

-- --------------------------------------------------------

--
-- Table structure for table `tb_anggota`
--

CREATE TABLE `tb_anggota` (
  `id_anggota` varchar(11) NOT NULL,
  `nama` varchar(100) NOT NULL,
  `id_kelas` int(2) NOT NULL,
  `id_agama` int(2) NOT NULL,
  `jenis_kelamin` enum('L','P') NOT NULL,
  `hp` varchar(15) NOT NULL,
  `alamat` text NOT NULL,
  `ket` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `tb_anggota`
--

INSERT INTO `tb_anggota` (`id_anggota`, `nama`, `id_kelas`, `id_agama`, `jenis_kelamin`, `hp`, `alamat`, `ket`) VALUES
('ANGG000001', 'Irham', 22, 2, 'L', '0123445', 'ada', ''),
('ANGG000002', 'Budi', 23, 2, 'L', '1111', 'JL. Lintas', ''),
('ANGG000003', 'Rini', 25, 2, 'P', '1111', 'Jl. Merdeka', '');

-- --------------------------------------------------------

--
-- Table structure for table `tb_buku`
--

CREATE TABLE `tb_buku` (
  `id_buku` char(15) NOT NULL,
  `ISBN` varchar(20) NOT NULL,
  `judul` varchar(100) NOT NULL,
  `id_kategori` int(3) NOT NULL,
  `id_penerbit` int(3) NOT NULL,
  `id_pengarang` int(3) NOT NULL,
  `no_rak` int(2) NOT NULL,
  `thn_terbit` year(4) NOT NULL,
  `stok` int(3) NOT NULL,
  `ket` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `tb_buku`
--

INSERT INTO `tb_buku` (`id_buku`, `ISBN`, `judul`, `id_kategori`, `id_penerbit`, `id_pengarang`, `no_rak`, `thn_terbit`, `stok`, `ket`) VALUES
('1', '132142', 'Ekonomi Negara', 1, 5, 4, 1, '2010', 6, ''),
('2', '1213451', 'Sok Hok Gie', 3, 4, 6, 3, '2009', 2, ''),
('3', '131414', 'Machine Learning', 5, 4, 2, 5, '2017', 1, ''),
('4', '67322', 'Pesantren Impian', 2, 1, 5, 2, '2010', 3, ''),
('5', '24522', 'Tuntunan Shalat', 4, 6, 6, 4, '2019', 6, 'Donasi Siswa'),
('6', '096525', 'Mohammad Ali', 3, 6, 1, 3, '2012', 1, 'Donasi Guru'),
('650', '00000', 'Teknologi Jaringan Berbasis Luas', 6, 1, 1, 5, '2018', 0, ''),
('8', '111111', 'Belajar Menggambar', 1, 1, 2, 1, '2000', 30, ''),
('9', '111111', 'Cara Membuat Kue', 1, 4, 4, 1, '1999', 5, 'HIBAH');

-- --------------------------------------------------------

--
-- Table structure for table `tb_denda`
--

CREATE TABLE `tb_denda` (
  `id_denda` int(6) NOT NULL,
  `denda` int(6) NOT NULL,
  `status` enum('A','N') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `tb_denda`
--

INSERT INTO `tb_denda` (`id_denda`, `denda`, `status`) VALUES
(6, 500, 'N'),
(7, 1000, 'A');

-- --------------------------------------------------------

--
-- Table structure for table `tb_detail_buku`
--

CREATE TABLE `tb_detail_buku` (
  `id_detail_buku` int(11) NOT NULL,
  `id_buku` char(15) NOT NULL,
  `no_buku` int(4) NOT NULL,
  `status` char(1) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `tb_detail_buku`
--

INSERT INTO `tb_detail_buku` (`id_detail_buku`, `id_buku`, `no_buku`, `status`) VALUES
(71, '1', 1, '0'),
(72, '1', 2, '0'),
(73, '1', 3, '0'),
(74, '1', 4, '1'),
(75, '1', 5, '0'),
(76, '1', 6, '1'),
(77, '2', 1, '0'),
(78, '2', 2, '1'),
(81, '3', 1, '1'),
(82, '4', 1, '1'),
(83, '4', 2, '0'),
(84, '4', 3, '0'),
(85, '5', 1, '1'),
(86, '5', 2, '1'),
(87, '5', 3, '1'),
(88, '5', 4, '0'),
(89, '5', 5, '1'),
(90, '5', 6, '1'),
(91, '6', 1, '1'),
(102, '8', 1, '1'),
(103, '8', 2, '1'),
(104, '8', 3, '1'),
(105, '8', 4, '1'),
(106, '8', 5, '1'),
(107, '8', 6, '1'),
(108, '8', 7, '1'),
(109, '8', 8, '1'),
(110, '8', 9, '1'),
(111, '8', 10, '1'),
(112, '8', 11, '1'),
(113, '8', 12, '1'),
(114, '8', 13, '1'),
(115, '8', 14, '1'),
(116, '8', 15, '1'),
(117, '8', 16, '1'),
(118, '8', 17, '1'),
(119, '8', 18, '1'),
(120, '8', 19, '1'),
(121, '8', 20, '1'),
(122, '8', 21, '1'),
(123, '8', 22, '1'),
(124, '8', 23, '1'),
(125, '8', 24, '1'),
(126, '8', 25, '1'),
(127, '8', 26, '1'),
(128, '8', 27, '1'),
(129, '8', 28, '1'),
(130, '8', 29, '1'),
(131, '8', 30, '1'),
(132, '9', 1, '1'),
(133, '9', 2, '1'),
(134, '9', 3, '1'),
(135, '9', 4, '1'),
(136, '9', 5, '1');

-- --------------------------------------------------------

--
-- Table structure for table `tb_detail_pinjam`
--

CREATE TABLE `tb_detail_pinjam` (
  `id_detail_pinjam` int(11) NOT NULL,
  `id_pinjam` int(11) NOT NULL,
  `id_buku` char(15) NOT NULL,
  `no_buku` int(4) NOT NULL,
  `flag` int(1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `tb_detail_pinjam`
--

INSERT INTO `tb_detail_pinjam` (`id_detail_pinjam`, `id_pinjam`, `id_buku`, `no_buku`, `flag`) VALUES
(103, 92, '4', 2, 0),
(104, 93, '5', 6, 1),
(105, 94, '8', 1, 1),
(106, 95, '9', 5, 1);

-- --------------------------------------------------------

--
-- Table structure for table `tb_kategori`
--

CREATE TABLE `tb_kategori` (
  `id_kategori` int(3) NOT NULL,
  `kategori` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `tb_kategori`
--

INSERT INTO `tb_kategori` (`id_kategori`, `kategori`) VALUES
(1, 'SOSIAL'),
(2, 'NOVEL'),
(3, 'BIOGRAFI'),
(4, 'RELIGI'),
(5, 'MATEMATIKA'),
(6, 'KOMPUTER'),
(7, 'BUDAYA'),
(8, 'MAKANAN');

-- --------------------------------------------------------

--
-- Table structure for table `tb_kelas`
--

CREATE TABLE `tb_kelas` (
  `id_kelas` int(2) NOT NULL,
  `kelas` varchar(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `tb_kelas`
--

INSERT INTO `tb_kelas` (`id_kelas`, `kelas`) VALUES
(22, 'X MIPA TAHFIDZ'),
(23, 'X MIPA Excellent 1'),
(24, 'X MIPA Excellent 2'),
(25, 'X MIPA 1'),
(26, 'X MIPA 2'),
(27, 'X MIPA 3'),
(28, 'X IPS Excellent 1'),
(29, 'X IPS 1');

-- --------------------------------------------------------

--
-- Table structure for table `tb_kembali`
--

CREATE TABLE `tb_kembali` (
  `id_kembali` int(11) NOT NULL,
  `id_pinjam` int(11) NOT NULL,
  `tgl_dikembalikan` date NOT NULL,
  `terlambat` int(2) NOT NULL,
  `id_denda` int(6) NOT NULL,
  `denda` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `tb_kembali`
--

INSERT INTO `tb_kembali` (`id_kembali`, `id_pinjam`, `tgl_dikembalikan`, `terlambat`, `id_denda`, `denda`) VALUES
(202, 93, '2021-09-10', 0, 6, 0),
(203, 94, '2021-09-11', 0, 6, 0),
(204, 95, '2021-09-11', 0, 6, 0);

-- --------------------------------------------------------

--
-- Table structure for table `tb_login`
--

CREATE TABLE `tb_login` (
  `username` varchar(15) NOT NULL,
  `password` varchar(75) NOT NULL,
  `stts` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `tb_login`
--

INSERT INTO `tb_login` (`username`, `password`, `stts`) VALUES
('123', '202cb962ac59075b964b07152d234b70', 'petugas'),
('admin', '21232f297a57a5a743894a0e4a801fc3', 'admin');

-- --------------------------------------------------------

--
-- Table structure for table `tb_penerbit`
--

CREATE TABLE `tb_penerbit` (
  `id_penerbit` int(3) NOT NULL,
  `nama_penerbit` varchar(50) NOT NULL,
  `id_provinsi` int(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `tb_penerbit`
--

INSERT INTO `tb_penerbit` (`id_penerbit`, `nama_penerbit`, `id_provinsi`) VALUES
(1, 'Erlangga', 1),
(4, 'Andi', 2),
(5, 'Gramedia', 8),
(6, 'HGS', 2),
(7, 'Quantum', 7);

-- --------------------------------------------------------

--
-- Table structure for table `tb_pengarang`
--

CREATE TABLE `tb_pengarang` (
  `id_pengarang` int(3) NOT NULL,
  `nama_pengarang` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `tb_pengarang`
--

INSERT INTO `tb_pengarang` (`id_pengarang`, `nama_pengarang`) VALUES
(1, 'Susanto Sunaryo'),
(2, 'Tere Liye'),
(3, 'Graha Mulia'),
(4, 'Boy Candra'),
(5, 'Asma Nadia'),
(6, 'Bambang Kunaryo'),
(8, 'Supriyanto');

-- --------------------------------------------------------

--
-- Table structure for table `tb_petugas`
--

CREATE TABLE `tb_petugas` (
  `id_petugas` char(10) NOT NULL,
  `nama` varchar(100) NOT NULL,
  `img` varchar(50) NOT NULL,
  `jenis_kelamin` enum('L','P') NOT NULL,
  `alamat` text NOT NULL,
  `password` varchar(50) NOT NULL,
  `id_agama` int(2) NOT NULL,
  `hp` varchar(15) NOT NULL,
  `ket` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `tb_petugas`
--

INSERT INTO `tb_petugas` (`id_petugas`, `nama`, `img`, `jenis_kelamin`, `alamat`, `password`, `id_agama`, `hp`, `ket`) VALUES
('123', 'Irham', 'LT3FUSABVHGQZ710N89KXM6CD52ERWPJIYO4.png', 'L', 'Jl. Merdeka', '123', 2, '0123445', ''),
('admin', 'Admin', 'G981H6QF3574DOTMSXCUP0WZ2JERLIVAYNBK.jpg', 'L', 'Gudang', 'admin', 2, '053244252522', '');

-- --------------------------------------------------------

--
-- Table structure for table `tb_pinjam`
--

CREATE TABLE `tb_pinjam` (
  `id_pinjam` int(11) NOT NULL,
  `tgl_pinjam` date NOT NULL,
  `id_anggota` varchar(11) NOT NULL,
  `tgl_kembali` date NOT NULL,
  `total_buku` int(4) NOT NULL,
  `status` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `tb_pinjam`
--

INSERT INTO `tb_pinjam` (`id_pinjam`, `tgl_pinjam`, `id_anggota`, `tgl_kembali`, `total_buku`, `status`) VALUES
(92, '2021-09-10', 'ANGG000001', '2021-09-11', 1, 0),
(93, '2021-09-10', 'ANGG000001', '2021-09-11', 1, 1),
(94, '2021-09-11', 'ANGG000002', '2021-09-13', 1, 1),
(95, '2021-09-11', 'ANGG000003', '2021-09-11', 1, 1);

-- --------------------------------------------------------

--
-- Table structure for table `tb_provinsi`
--

CREATE TABLE `tb_provinsi` (
  `id_provinsi` int(2) NOT NULL,
  `nama_provinsi` varchar(50) NOT NULL,
  `kota` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `tb_provinsi`
--

INSERT INTO `tb_provinsi` (`id_provinsi`, `nama_provinsi`, `kota`) VALUES
(1, 'Sumatera Selatan', 'Palembang'),
(2, 'D.I.Y Yogyakarta', 'Yogya'),
(4, 'Jambi', 'Jambi Kota'),
(6, 'Pekan Baru', 'Riau'),
(7, 'Jakarta', 'Jakarta'),
(8, 'Jawa Barat', 'Bandung'),
(9, 'Sulawesi Selatan', 'Makassar'),
(10, 'Sulawesi Selatan', 'WAJO');

-- --------------------------------------------------------

--
-- Table structure for table `tb_rak`
--

CREATE TABLE `tb_rak` (
  `no_rak` int(2) NOT NULL,
  `nama_rak` varchar(50) NOT NULL,
  `id_kategori` int(3) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `tb_rak`
--

INSERT INTO `tb_rak` (`no_rak`, `nama_rak`, `id_kategori`) VALUES
(1, '1-150 SSL', 1),
(2, '150-300 NVL', 2),
(3, '300-370 BGF', 3),
(4, '390-500 RLG', 4),
(5, '500-567 MTK', 5),
(6, '568-600 BDY', 7),
(7, '601-650 MKN', 8);

-- --------------------------------------------------------

--
-- Table structure for table `test`
--

CREATE TABLE `test` (
  `kode` varchar(12) NOT NULL,
  `nama` varchar(100) NOT NULL,
  `mboh` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `test`
--

INSERT INTO `test` (`kode`, `nama`, `mboh`) VALUES
('', 'ari', ''),
('Kode000001', 'ari2', ''),
('Kode000002', 'ari2', ''),
('Kode000003', 'Ariandi AS', '');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tb_admin`
--
ALTER TABLE `tb_admin`
  ADD PRIMARY KEY (`id_admin`),
  ADD KEY `id_admin` (`id_admin`,`password`,`nama`,`alamat`,`no_hp`),
  ADD KEY `id_admin_2` (`id_admin`,`password`,`nama`,`alamat`,`no_hp`,`img`);

--
-- Indexes for table `tb_agama`
--
ALTER TABLE `tb_agama`
  ADD PRIMARY KEY (`id_agama`);

--
-- Indexes for table `tb_anggota`
--
ALTER TABLE `tb_anggota`
  ADD PRIMARY KEY (`id_anggota`),
  ADD KEY `id_agama` (`id_agama`),
  ADD KEY `id_kelas` (`id_kelas`);

--
-- Indexes for table `tb_buku`
--
ALTER TABLE `tb_buku`
  ADD PRIMARY KEY (`id_buku`),
  ADD KEY `id_kategori` (`id_kategori`),
  ADD KEY `id_penerbit` (`id_penerbit`),
  ADD KEY `id_pengarang` (`id_pengarang`),
  ADD KEY `no_rak` (`no_rak`),
  ADD KEY `id_buku` (`id_buku`,`ISBN`,`judul`,`id_kategori`,`id_penerbit`,`id_pengarang`,`no_rak`,`thn_terbit`,`stok`);

--
-- Indexes for table `tb_denda`
--
ALTER TABLE `tb_denda`
  ADD PRIMARY KEY (`id_denda`);

--
-- Indexes for table `tb_detail_buku`
--
ALTER TABLE `tb_detail_buku`
  ADD KEY `id_detail_buku` (`id_detail_buku`,`id_buku`,`no_buku`,`status`),
  ADD KEY `id_buku` (`id_buku`);

--
-- Indexes for table `tb_detail_pinjam`
--
ALTER TABLE `tb_detail_pinjam`
  ADD PRIMARY KEY (`id_detail_pinjam`),
  ADD KEY `id_anggota` (`id_pinjam`),
  ADD KEY `id_detail_pinjam` (`id_detail_pinjam`,`id_pinjam`,`id_buku`,`no_buku`),
  ADD KEY `id_buku` (`id_buku`);

--
-- Indexes for table `tb_kategori`
--
ALTER TABLE `tb_kategori`
  ADD PRIMARY KEY (`id_kategori`);

--
-- Indexes for table `tb_kelas`
--
ALTER TABLE `tb_kelas`
  ADD PRIMARY KEY (`id_kelas`);

--
-- Indexes for table `tb_kembali`
--
ALTER TABLE `tb_kembali`
  ADD PRIMARY KEY (`id_kembali`),
  ADD KEY `id_detail` (`id_pinjam`),
  ADD KEY `id_kembali` (`id_kembali`,`id_pinjam`,`tgl_dikembalikan`,`terlambat`,`id_denda`);

--
-- Indexes for table `tb_login`
--
ALTER TABLE `tb_login`
  ADD PRIMARY KEY (`username`),
  ADD KEY `username` (`username`,`password`,`stts`);

--
-- Indexes for table `tb_penerbit`
--
ALTER TABLE `tb_penerbit`
  ADD PRIMARY KEY (`id_penerbit`),
  ADD KEY `id_penerbit` (`id_penerbit`,`nama_penerbit`,`id_provinsi`),
  ADD KEY `id_provinsi` (`id_provinsi`);

--
-- Indexes for table `tb_pengarang`
--
ALTER TABLE `tb_pengarang`
  ADD PRIMARY KEY (`id_pengarang`);

--
-- Indexes for table `tb_petugas`
--
ALTER TABLE `tb_petugas`
  ADD PRIMARY KEY (`id_petugas`),
  ADD KEY `id_agama` (`id_agama`);

--
-- Indexes for table `tb_pinjam`
--
ALTER TABLE `tb_pinjam`
  ADD PRIMARY KEY (`id_pinjam`),
  ADD KEY `id_detail` (`tgl_kembali`),
  ADD KEY `id_buku` (`id_anggota`),
  ADD KEY `id_pinjam` (`id_pinjam`,`tgl_pinjam`,`id_anggota`,`tgl_kembali`,`total_buku`);

--
-- Indexes for table `tb_provinsi`
--
ALTER TABLE `tb_provinsi`
  ADD PRIMARY KEY (`id_provinsi`);

--
-- Indexes for table `tb_rak`
--
ALTER TABLE `tb_rak`
  ADD PRIMARY KEY (`no_rak`),
  ADD KEY `id_kategori` (`id_kategori`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tb_agama`
--
ALTER TABLE `tb_agama`
  MODIFY `id_agama` int(2) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `tb_denda`
--
ALTER TABLE `tb_denda`
  MODIFY `id_denda` int(6) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `tb_detail_buku`
--
ALTER TABLE `tb_detail_buku`
  MODIFY `id_detail_buku` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=137;

--
-- AUTO_INCREMENT for table `tb_detail_pinjam`
--
ALTER TABLE `tb_detail_pinjam`
  MODIFY `id_detail_pinjam` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=107;

--
-- AUTO_INCREMENT for table `tb_kategori`
--
ALTER TABLE `tb_kategori`
  MODIFY `id_kategori` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `tb_kelas`
--
ALTER TABLE `tb_kelas`
  MODIFY `id_kelas` int(2) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;

--
-- AUTO_INCREMENT for table `tb_kembali`
--
ALTER TABLE `tb_kembali`
  MODIFY `id_kembali` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=205;

--
-- AUTO_INCREMENT for table `tb_penerbit`
--
ALTER TABLE `tb_penerbit`
  MODIFY `id_penerbit` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `tb_pengarang`
--
ALTER TABLE `tb_pengarang`
  MODIFY `id_pengarang` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `tb_pinjam`
--
ALTER TABLE `tb_pinjam`
  MODIFY `id_pinjam` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=96;

--
-- AUTO_INCREMENT for table `tb_provinsi`
--
ALTER TABLE `tb_provinsi`
  MODIFY `id_provinsi` int(2) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `tb_rak`
--
ALTER TABLE `tb_rak`
  MODIFY `no_rak` int(2) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `tb_anggota`
--
ALTER TABLE `tb_anggota`
  ADD CONSTRAINT `tb_anggota_ibfk_1` FOREIGN KEY (`id_agama`) REFERENCES `tb_agama` (`id_agama`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `tb_anggota_ibfk_2` FOREIGN KEY (`id_kelas`) REFERENCES `tb_kelas` (`id_kelas`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `tb_buku`
--
ALTER TABLE `tb_buku`
  ADD CONSTRAINT `tb_buku_ibfk_1` FOREIGN KEY (`id_kategori`) REFERENCES `tb_kategori` (`id_kategori`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `tb_buku_ibfk_2` FOREIGN KEY (`id_penerbit`) REFERENCES `tb_penerbit` (`id_penerbit`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `tb_buku_ibfk_3` FOREIGN KEY (`id_pengarang`) REFERENCES `tb_pengarang` (`id_pengarang`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `tb_buku_ibfk_4` FOREIGN KEY (`no_rak`) REFERENCES `tb_rak` (`no_rak`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `tb_detail_buku`
--
ALTER TABLE `tb_detail_buku`
  ADD CONSTRAINT `tb_detail_buku_ibfk_1` FOREIGN KEY (`id_buku`) REFERENCES `tb_buku` (`id_buku`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `tb_detail_pinjam`
--
ALTER TABLE `tb_detail_pinjam`
  ADD CONSTRAINT `tb_detail_pinjam_ibfk_1` FOREIGN KEY (`id_pinjam`) REFERENCES `tb_pinjam` (`id_pinjam`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `tb_detail_pinjam_ibfk_2` FOREIGN KEY (`id_buku`) REFERENCES `tb_buku` (`id_buku`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `tb_kembali`
--
ALTER TABLE `tb_kembali`
  ADD CONSTRAINT `tb_kembali_ibfk_1` FOREIGN KEY (`id_pinjam`) REFERENCES `tb_pinjam` (`id_pinjam`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `tb_penerbit`
--
ALTER TABLE `tb_penerbit`
  ADD CONSTRAINT `tb_penerbit_ibfk_1` FOREIGN KEY (`id_provinsi`) REFERENCES `tb_provinsi` (`id_provinsi`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `tb_petugas`
--
ALTER TABLE `tb_petugas`
  ADD CONSTRAINT `tb_petugas_ibfk_1` FOREIGN KEY (`id_agama`) REFERENCES `tb_agama` (`id_agama`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `tb_pinjam`
--
ALTER TABLE `tb_pinjam`
  ADD CONSTRAINT `tb_pinjam_ibfk_1` FOREIGN KEY (`id_anggota`) REFERENCES `tb_anggota` (`id_anggota`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `tb_rak`
--
ALTER TABLE `tb_rak`
  ADD CONSTRAINT `tb_rak_ibfk_1` FOREIGN KEY (`id_kategori`) REFERENCES `tb_kategori` (`id_kategori`) ON DELETE CASCADE ON UPDATE CASCADE;
--
-- Database: `e-learning`
--
CREATE DATABASE IF NOT EXISTS `e-learning` DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci;
USE `e-learning`;

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
--
-- Database: `phpmyadmin`
--
CREATE DATABASE IF NOT EXISTS `phpmyadmin` DEFAULT CHARACTER SET utf8 COLLATE utf8_bin;
USE `phpmyadmin`;

-- --------------------------------------------------------

--
-- Table structure for table `pma__bookmark`
--

CREATE TABLE `pma__bookmark` (
  `id` int(10) UNSIGNED NOT NULL,
  `dbase` varchar(255) NOT NULL DEFAULT '',
  `user` varchar(255) NOT NULL DEFAULT '',
  `label` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL DEFAULT '',
  `query` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='Bookmarks';

-- --------------------------------------------------------

--
-- Table structure for table `pma__central_columns`
--

CREATE TABLE `pma__central_columns` (
  `db_name` varchar(64) NOT NULL,
  `col_name` varchar(64) NOT NULL,
  `col_type` varchar(64) NOT NULL,
  `col_length` text DEFAULT NULL,
  `col_collation` varchar(64) NOT NULL,
  `col_isNull` tinyint(1) NOT NULL,
  `col_extra` varchar(255) DEFAULT '',
  `col_default` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='Central list of columns';

-- --------------------------------------------------------

--
-- Table structure for table `pma__column_info`
--

CREATE TABLE `pma__column_info` (
  `id` int(5) UNSIGNED NOT NULL,
  `db_name` varchar(64) NOT NULL DEFAULT '',
  `table_name` varchar(64) NOT NULL DEFAULT '',
  `column_name` varchar(64) NOT NULL DEFAULT '',
  `comment` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL DEFAULT '',
  `mimetype` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL DEFAULT '',
  `transformation` varchar(255) NOT NULL DEFAULT '',
  `transformation_options` varchar(255) NOT NULL DEFAULT '',
  `input_transformation` varchar(255) NOT NULL DEFAULT '',
  `input_transformation_options` varchar(255) NOT NULL DEFAULT ''
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='Column information for phpMyAdmin';

-- --------------------------------------------------------

--
-- Table structure for table `pma__designer_settings`
--

CREATE TABLE `pma__designer_settings` (
  `username` varchar(64) NOT NULL,
  `settings_data` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='Settings related to Designer';

-- --------------------------------------------------------

--
-- Table structure for table `pma__export_templates`
--

CREATE TABLE `pma__export_templates` (
  `id` int(5) UNSIGNED NOT NULL,
  `username` varchar(64) NOT NULL,
  `export_type` varchar(10) NOT NULL,
  `template_name` varchar(64) NOT NULL,
  `template_data` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='Saved export templates';

--
-- Dumping data for table `pma__export_templates`
--

INSERT INTO `pma__export_templates` (`id`, `username`, `export_type`, `template_name`, `template_data`) VALUES
(1, 'root', 'server', 'database keseluruhan', '{\"quick_or_custom\":\"quick\",\"what\":\"sql\",\"db_select[]\":[\"alfed_014\",\"dbkuliner\",\"db_perpustakaan\",\"e-learning\",\"phpmyadmin\",\"rentalmobil\",\"sekolah\",\"siakad\",\"sisip_gambar\",\"test\",\"tokoabalabal\",\"universitas\",\"web_login\"],\"aliases_new\":\"\",\"output_format\":\"sendit\",\"filename_template\":\"@SERVER@\",\"remember_template\":\"on\",\"charset\":\"utf-8\",\"compression\":\"none\",\"maxsize\":\"\",\"codegen_structure_or_data\":\"data\",\"codegen_format\":\"0\",\"csv_separator\":\",\",\"csv_enclosed\":\"\\\"\",\"csv_escaped\":\"\\\"\",\"csv_terminated\":\"AUTO\",\"csv_null\":\"NULL\",\"csv_columns\":\"something\",\"csv_structure_or_data\":\"data\",\"excel_null\":\"NULL\",\"excel_columns\":\"something\",\"excel_edition\":\"win\",\"excel_structure_or_data\":\"data\",\"json_structure_or_data\":\"data\",\"json_unicode\":\"something\",\"latex_caption\":\"something\",\"latex_structure_or_data\":\"structure_and_data\",\"latex_structure_caption\":\"Structure of table @TABLE@\",\"latex_structure_continued_caption\":\"Structure of table @TABLE@ (continued)\",\"latex_structure_label\":\"tab:@TABLE@-structure\",\"latex_relation\":\"something\",\"latex_comments\":\"something\",\"latex_mime\":\"something\",\"latex_columns\":\"something\",\"latex_data_caption\":\"Content of table @TABLE@\",\"latex_data_continued_caption\":\"Content of table @TABLE@ (continued)\",\"latex_data_label\":\"tab:@TABLE@-data\",\"latex_null\":\"\\\\textit{NULL}\",\"mediawiki_structure_or_data\":\"data\",\"mediawiki_caption\":\"something\",\"mediawiki_headers\":\"something\",\"htmlword_structure_or_data\":\"structure_and_data\",\"htmlword_null\":\"NULL\",\"ods_null\":\"NULL\",\"ods_structure_or_data\":\"data\",\"odt_structure_or_data\":\"structure_and_data\",\"odt_relation\":\"something\",\"odt_comments\":\"something\",\"odt_mime\":\"something\",\"odt_columns\":\"something\",\"odt_null\":\"NULL\",\"pdf_report_title\":\"\",\"pdf_structure_or_data\":\"data\",\"phparray_structure_or_data\":\"data\",\"sql_include_comments\":\"something\",\"sql_header_comment\":\"\",\"sql_use_transaction\":\"something\",\"sql_compatibility\":\"NONE\",\"sql_structure_or_data\":\"structure_and_data\",\"sql_create_table\":\"something\",\"sql_auto_increment\":\"something\",\"sql_create_view\":\"something\",\"sql_create_trigger\":\"something\",\"sql_backquotes\":\"something\",\"sql_type\":\"INSERT\",\"sql_insert_syntax\":\"both\",\"sql_max_query_size\":\"50000\",\"sql_hex_for_binary\":\"something\",\"sql_utc_time\":\"something\",\"texytext_structure_or_data\":\"structure_and_data\",\"texytext_null\":\"NULL\",\"yaml_structure_or_data\":\"data\",\"\":null,\"as_separate_files\":null,\"csv_removeCRLF\":null,\"excel_removeCRLF\":null,\"json_pretty_print\":null,\"htmlword_columns\":null,\"ods_columns\":null,\"sql_dates\":null,\"sql_relation\":null,\"sql_mime\":null,\"sql_disable_fk\":null,\"sql_views_as_tables\":null,\"sql_metadata\":null,\"sql_drop_database\":null,\"sql_drop_table\":null,\"sql_if_not_exists\":null,\"sql_simple_view_export\":null,\"sql_view_current_user\":null,\"sql_or_replace_view\":null,\"sql_procedure_function\":null,\"sql_truncate\":null,\"sql_delayed\":null,\"sql_ignore\":null,\"texytext_columns\":null}');

-- --------------------------------------------------------

--
-- Table structure for table `pma__favorite`
--

CREATE TABLE `pma__favorite` (
  `username` varchar(64) NOT NULL,
  `tables` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='Favorite tables';

-- --------------------------------------------------------

--
-- Table structure for table `pma__history`
--

CREATE TABLE `pma__history` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `username` varchar(64) NOT NULL DEFAULT '',
  `db` varchar(64) NOT NULL DEFAULT '',
  `table` varchar(64) NOT NULL DEFAULT '',
  `timevalue` timestamp NOT NULL DEFAULT current_timestamp(),
  `sqlquery` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='SQL history for phpMyAdmin';

-- --------------------------------------------------------

--
-- Table structure for table `pma__navigationhiding`
--

CREATE TABLE `pma__navigationhiding` (
  `username` varchar(64) NOT NULL,
  `item_name` varchar(64) NOT NULL,
  `item_type` varchar(64) NOT NULL,
  `db_name` varchar(64) NOT NULL,
  `table_name` varchar(64) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='Hidden items of navigation tree';

-- --------------------------------------------------------

--
-- Table structure for table `pma__pdf_pages`
--

CREATE TABLE `pma__pdf_pages` (
  `db_name` varchar(64) NOT NULL DEFAULT '',
  `page_nr` int(10) UNSIGNED NOT NULL,
  `page_descr` varchar(50) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL DEFAULT ''
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='PDF relation pages for phpMyAdmin';

-- --------------------------------------------------------

--
-- Table structure for table `pma__recent`
--

CREATE TABLE `pma__recent` (
  `username` varchar(64) NOT NULL,
  `tables` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='Recently accessed tables';

--
-- Dumping data for table `pma__recent`
--

INSERT INTO `pma__recent` (`username`, `tables`) VALUES
('root', '[{\"db\":\"db_perpustakaan\",\"table\":\"tb_anggota\"},{\"db\":\"db_perpustakaan\",\"table\":\"tb_buku\"},{\"db\":\"db_perpustakaan\",\"table\":\"tb_agama\"},{\"db\":\"db_perpustakaan\",\"table\":\"tb_admin\"},{\"db\":\"e-learning\",\"table\":\"tb_absensi\"},{\"db\":\"e-learning\",\"table\":\"riwayat_kelas\"},{\"db\":\"e-learning\",\"table\":\"tb_siswa\"},{\"db\":\"e-learning\",\"table\":\"tb_materi\"},{\"db\":\"e-learning\",\"table\":\"tb_tugas\"},{\"db\":\"e-learning\",\"table\":\"tb_pengumpulan\"}]');

-- --------------------------------------------------------

--
-- Table structure for table `pma__relation`
--

CREATE TABLE `pma__relation` (
  `master_db` varchar(64) NOT NULL DEFAULT '',
  `master_table` varchar(64) NOT NULL DEFAULT '',
  `master_field` varchar(64) NOT NULL DEFAULT '',
  `foreign_db` varchar(64) NOT NULL DEFAULT '',
  `foreign_table` varchar(64) NOT NULL DEFAULT '',
  `foreign_field` varchar(64) NOT NULL DEFAULT ''
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='Relation table';

-- --------------------------------------------------------

--
-- Table structure for table `pma__savedsearches`
--

CREATE TABLE `pma__savedsearches` (
  `id` int(5) UNSIGNED NOT NULL,
  `username` varchar(64) NOT NULL DEFAULT '',
  `db_name` varchar(64) NOT NULL DEFAULT '',
  `search_name` varchar(64) NOT NULL DEFAULT '',
  `search_data` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='Saved searches';

-- --------------------------------------------------------

--
-- Table structure for table `pma__table_coords`
--

CREATE TABLE `pma__table_coords` (
  `db_name` varchar(64) NOT NULL DEFAULT '',
  `table_name` varchar(64) NOT NULL DEFAULT '',
  `pdf_page_number` int(11) NOT NULL DEFAULT 0,
  `x` float UNSIGNED NOT NULL DEFAULT 0,
  `y` float UNSIGNED NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='Table coordinates for phpMyAdmin PDF output';

-- --------------------------------------------------------

--
-- Table structure for table `pma__table_info`
--

CREATE TABLE `pma__table_info` (
  `db_name` varchar(64) NOT NULL DEFAULT '',
  `table_name` varchar(64) NOT NULL DEFAULT '',
  `display_field` varchar(64) NOT NULL DEFAULT ''
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='Table information for phpMyAdmin';

-- --------------------------------------------------------

--
-- Table structure for table `pma__table_uiprefs`
--

CREATE TABLE `pma__table_uiprefs` (
  `username` varchar(64) NOT NULL,
  `db_name` varchar(64) NOT NULL,
  `table_name` varchar(64) NOT NULL,
  `prefs` text NOT NULL,
  `last_update` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='Tables'' UI preferences';

-- --------------------------------------------------------

--
-- Table structure for table `pma__tracking`
--

CREATE TABLE `pma__tracking` (
  `db_name` varchar(64) NOT NULL,
  `table_name` varchar(64) NOT NULL,
  `version` int(10) UNSIGNED NOT NULL,
  `date_created` datetime NOT NULL,
  `date_updated` datetime NOT NULL,
  `schema_snapshot` text NOT NULL,
  `schema_sql` text DEFAULT NULL,
  `data_sql` longtext DEFAULT NULL,
  `tracking` set('UPDATE','REPLACE','INSERT','DELETE','TRUNCATE','CREATE DATABASE','ALTER DATABASE','DROP DATABASE','CREATE TABLE','ALTER TABLE','RENAME TABLE','DROP TABLE','CREATE INDEX','DROP INDEX','CREATE VIEW','ALTER VIEW','DROP VIEW') DEFAULT NULL,
  `tracking_active` int(1) UNSIGNED NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='Database changes tracking for phpMyAdmin';

-- --------------------------------------------------------

--
-- Table structure for table `pma__userconfig`
--

CREATE TABLE `pma__userconfig` (
  `username` varchar(64) NOT NULL,
  `timevalue` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `config_data` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='User preferences storage for phpMyAdmin';

--
-- Dumping data for table `pma__userconfig`
--

INSERT INTO `pma__userconfig` (`username`, `timevalue`, `config_data`) VALUES
('root', '2025-09-11 14:10:32', '{\"Console\\/Mode\":\"collapse\"}');

-- --------------------------------------------------------

--
-- Table structure for table `pma__usergroups`
--

CREATE TABLE `pma__usergroups` (
  `usergroup` varchar(64) NOT NULL,
  `tab` varchar(64) NOT NULL,
  `allowed` enum('Y','N') NOT NULL DEFAULT 'N'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='User groups with configured menu items';

-- --------------------------------------------------------

--
-- Table structure for table `pma__users`
--

CREATE TABLE `pma__users` (
  `username` varchar(64) NOT NULL,
  `usergroup` varchar(64) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='Users and their assignments to user groups';

--
-- Indexes for dumped tables
--

--
-- Indexes for table `pma__bookmark`
--
ALTER TABLE `pma__bookmark`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `pma__central_columns`
--
ALTER TABLE `pma__central_columns`
  ADD PRIMARY KEY (`db_name`,`col_name`);

--
-- Indexes for table `pma__column_info`
--
ALTER TABLE `pma__column_info`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `db_name` (`db_name`,`table_name`,`column_name`);

--
-- Indexes for table `pma__designer_settings`
--
ALTER TABLE `pma__designer_settings`
  ADD PRIMARY KEY (`username`);

--
-- Indexes for table `pma__export_templates`
--
ALTER TABLE `pma__export_templates`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `u_user_type_template` (`username`,`export_type`,`template_name`);

--
-- Indexes for table `pma__favorite`
--
ALTER TABLE `pma__favorite`
  ADD PRIMARY KEY (`username`);

--
-- Indexes for table `pma__history`
--
ALTER TABLE `pma__history`
  ADD PRIMARY KEY (`id`),
  ADD KEY `username` (`username`,`db`,`table`,`timevalue`);

--
-- Indexes for table `pma__navigationhiding`
--
ALTER TABLE `pma__navigationhiding`
  ADD PRIMARY KEY (`username`,`item_name`,`item_type`,`db_name`,`table_name`);

--
-- Indexes for table `pma__pdf_pages`
--
ALTER TABLE `pma__pdf_pages`
  ADD PRIMARY KEY (`page_nr`),
  ADD KEY `db_name` (`db_name`);

--
-- Indexes for table `pma__recent`
--
ALTER TABLE `pma__recent`
  ADD PRIMARY KEY (`username`);

--
-- Indexes for table `pma__relation`
--
ALTER TABLE `pma__relation`
  ADD PRIMARY KEY (`master_db`,`master_table`,`master_field`),
  ADD KEY `foreign_field` (`foreign_db`,`foreign_table`);

--
-- Indexes for table `pma__savedsearches`
--
ALTER TABLE `pma__savedsearches`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `u_savedsearches_username_dbname` (`username`,`db_name`,`search_name`);

--
-- Indexes for table `pma__table_coords`
--
ALTER TABLE `pma__table_coords`
  ADD PRIMARY KEY (`db_name`,`table_name`,`pdf_page_number`);

--
-- Indexes for table `pma__table_info`
--
ALTER TABLE `pma__table_info`
  ADD PRIMARY KEY (`db_name`,`table_name`);

--
-- Indexes for table `pma__table_uiprefs`
--
ALTER TABLE `pma__table_uiprefs`
  ADD PRIMARY KEY (`username`,`db_name`,`table_name`);

--
-- Indexes for table `pma__tracking`
--
ALTER TABLE `pma__tracking`
  ADD PRIMARY KEY (`db_name`,`table_name`,`version`);

--
-- Indexes for table `pma__userconfig`
--
ALTER TABLE `pma__userconfig`
  ADD PRIMARY KEY (`username`);

--
-- Indexes for table `pma__usergroups`
--
ALTER TABLE `pma__usergroups`
  ADD PRIMARY KEY (`usergroup`,`tab`,`allowed`);

--
-- Indexes for table `pma__users`
--
ALTER TABLE `pma__users`
  ADD PRIMARY KEY (`username`,`usergroup`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `pma__bookmark`
--
ALTER TABLE `pma__bookmark`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `pma__column_info`
--
ALTER TABLE `pma__column_info`
  MODIFY `id` int(5) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `pma__export_templates`
--
ALTER TABLE `pma__export_templates`
  MODIFY `id` int(5) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `pma__history`
--
ALTER TABLE `pma__history`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `pma__pdf_pages`
--
ALTER TABLE `pma__pdf_pages`
  MODIFY `page_nr` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `pma__savedsearches`
--
ALTER TABLE `pma__savedsearches`
  MODIFY `id` int(5) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- Database: `rentalmobil`
--
CREATE DATABASE IF NOT EXISTS `rentalmobil` DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci;
USE `rentalmobil`;

-- --------------------------------------------------------

--
-- Table structure for table `menyewa`
--
-- Error reading structure for table rentalmobil.menyewa: #1932 - Table &#039;rentalmobil.menyewa&#039; doesn&#039;t exist in engine
-- Error reading data for table rentalmobil.menyewa: #1064 - You have an error in your SQL syntax; check the manual that corresponds to your MariaDB server version for the right syntax to use near &#039;FROM `rentalmobil`.`menyewa`&#039; at line 1

-- --------------------------------------------------------

--
-- Table structure for table `mobil`
--
-- Error reading structure for table rentalmobil.mobil: #1932 - Table &#039;rentalmobil.mobil&#039; doesn&#039;t exist in engine
-- Error reading data for table rentalmobil.mobil: #1064 - You have an error in your SQL syntax; check the manual that corresponds to your MariaDB server version for the right syntax to use near &#039;FROM `rentalmobil`.`mobil`&#039; at line 1

-- --------------------------------------------------------

--
-- Table structure for table `pemilik`
--
-- Error reading structure for table rentalmobil.pemilik: #1932 - Table &#039;rentalmobil.pemilik&#039; doesn&#039;t exist in engine
-- Error reading data for table rentalmobil.pemilik: #1064 - You have an error in your SQL syntax; check the manual that corresponds to your MariaDB server version for the right syntax to use near &#039;FROM `rentalmobil`.`pemilik`&#039; at line 1

-- --------------------------------------------------------

--
-- Table structure for table `penyewa`
--
-- Error reading structure for table rentalmobil.penyewa: #1932 - Table &#039;rentalmobil.penyewa&#039; doesn&#039;t exist in engine
-- Error reading data for table rentalmobil.penyewa: #1064 - You have an error in your SQL syntax; check the manual that corresponds to your MariaDB server version for the right syntax to use near &#039;FROM `rentalmobil`.`penyewa`&#039; at line 1
--
-- Database: `sekolah`
--
CREATE DATABASE IF NOT EXISTS `sekolah` DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci;
USE `sekolah`;

-- --------------------------------------------------------

--
-- Table structure for table `datasiswa`
--
-- Error reading structure for table sekolah.datasiswa: #1932 - Table &#039;sekolah.datasiswa&#039; doesn&#039;t exist in engine
-- Error reading data for table sekolah.datasiswa: #1064 - You have an error in your SQL syntax; check the manual that corresponds to your MariaDB server version for the right syntax to use near &#039;FROM `sekolah`.`datasiswa`&#039; at line 1
--
-- Database: `siakad`
--
CREATE DATABASE IF NOT EXISTS `siakad` DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci;
USE `siakad`;

-- --------------------------------------------------------

--
-- Table structure for table `login`
--
-- Error reading structure for table siakad.login: #1932 - Table &#039;siakad.login&#039; doesn&#039;t exist in engine
-- Error reading data for table siakad.login: #1064 - You have an error in your SQL syntax; check the manual that corresponds to your MariaDB server version for the right syntax to use near &#039;FROM `siakad`.`login`&#039; at line 1
--
-- Database: `sisip_gambar`
--
CREATE DATABASE IF NOT EXISTS `sisip_gambar` DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci;
USE `sisip_gambar`;

-- --------------------------------------------------------

--
-- Table structure for table `gambar`
--
-- Error reading structure for table sisip_gambar.gambar: #1932 - Table &#039;sisip_gambar.gambar&#039; doesn&#039;t exist in engine
-- Error reading data for table sisip_gambar.gambar: #1064 - You have an error in your SQL syntax; check the manual that corresponds to your MariaDB server version for the right syntax to use near &#039;FROM `sisip_gambar`.`gambar`&#039; at line 1
--
-- Database: `test`
--
CREATE DATABASE IF NOT EXISTS `test` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci;
USE `test`;
--
-- Database: `tokoabalabal`
--
CREATE DATABASE IF NOT EXISTS `tokoabalabal` DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci;
USE `tokoabalabal`;

-- --------------------------------------------------------

--
-- Table structure for table `barang`
--
-- Error reading structure for table tokoabalabal.barang: #1932 - Table &#039;tokoabalabal.barang&#039; doesn&#039;t exist in engine
-- Error reading data for table tokoabalabal.barang: #1064 - You have an error in your SQL syntax; check the manual that corresponds to your MariaDB server version for the right syntax to use near &#039;FROM `tokoabalabal`.`barang`&#039; at line 1

-- --------------------------------------------------------

--
-- Table structure for table `karyawan`
--
-- Error reading structure for table tokoabalabal.karyawan: #1932 - Table &#039;tokoabalabal.karyawan&#039; doesn&#039;t exist in engine
-- Error reading data for table tokoabalabal.karyawan: #1064 - You have an error in your SQL syntax; check the manual that corresponds to your MariaDB server version for the right syntax to use near &#039;FROM `tokoabalabal`.`karyawan`&#039; at line 1

-- --------------------------------------------------------

--
-- Table structure for table `membeli`
--
-- Error reading structure for table tokoabalabal.membeli: #1932 - Table &#039;tokoabalabal.membeli&#039; doesn&#039;t exist in engine
-- Error reading data for table tokoabalabal.membeli: #1064 - You have an error in your SQL syntax; check the manual that corresponds to your MariaDB server version for the right syntax to use near &#039;FROM `tokoabalabal`.`membeli`&#039; at line 1

-- --------------------------------------------------------

--
-- Table structure for table `pembeli`
--
-- Error reading structure for table tokoabalabal.pembeli: #1932 - Table &#039;tokoabalabal.pembeli&#039; doesn&#039;t exist in engine
-- Error reading data for table tokoabalabal.pembeli: #1064 - You have an error in your SQL syntax; check the manual that corresponds to your MariaDB server version for the right syntax to use near &#039;FROM `tokoabalabal`.`pembeli`&#039; at line 1
--
-- Database: `universitas`
--
CREATE DATABASE IF NOT EXISTS `universitas` DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci;
USE `universitas`;

-- --------------------------------------------------------

--
-- Table structure for table `mahasiswa`
--
-- Error reading structure for table universitas.mahasiswa: #1932 - Table &#039;universitas.mahasiswa&#039; doesn&#039;t exist in engine
-- Error reading data for table universitas.mahasiswa: #1064 - You have an error in your SQL syntax; check the manual that corresponds to your MariaDB server version for the right syntax to use near &#039;FROM `universitas`.`mahasiswa`&#039; at line 1

-- --------------------------------------------------------

--
-- Table structure for table `matakuliah`
--
-- Error reading structure for table universitas.matakuliah: #1932 - Table &#039;universitas.matakuliah&#039; doesn&#039;t exist in engine
-- Error reading data for table universitas.matakuliah: #1064 - You have an error in your SQL syntax; check the manual that corresponds to your MariaDB server version for the right syntax to use near &#039;FROM `universitas`.`matakuliah`&#039; at line 1

-- --------------------------------------------------------

--
-- Table structure for table `mengambil`
--
-- Error reading structure for table universitas.mengambil: #1932 - Table &#039;universitas.mengambil&#039; doesn&#039;t exist in engine
-- Error reading data for table universitas.mengambil: #1064 - You have an error in your SQL syntax; check the manual that corresponds to your MariaDB server version for the right syntax to use near &#039;FROM `universitas`.`mengambil`&#039; at line 1
--
-- Database: `web_login`
--
CREATE DATABASE IF NOT EXISTS `web_login` DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci;
USE `web_login`;

-- --------------------------------------------------------

--
-- Table structure for table `pengguna`
--
-- Error reading structure for table web_login.pengguna: #1932 - Table &#039;web_login.pengguna&#039; doesn&#039;t exist in engine
-- Error reading data for table web_login.pengguna: #1064 - You have an error in your SQL syntax; check the manual that corresponds to your MariaDB server version for the right syntax to use near &#039;FROM `web_login`.`pengguna`&#039; at line 1
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
