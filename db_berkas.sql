-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 06, 2021 at 05:59 PM
-- Server version: 10.4.14-MariaDB
-- PHP Version: 7.2.33

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_berkas`
--

-- --------------------------------------------------------

--
-- Table structure for table `tbl_dep`
--

CREATE TABLE `tbl_dep` (
  `id_dep` int(11) NOT NULL,
  `nama_dep` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_dep`
--

INSERT INTO `tbl_dep` (`id_dep`, `nama_dep`) VALUES
(10, 'Dosen D4 Teknik Informatika'),
(11, 'Kaprodi D4 Teknik Informatika'),
(13, 'Staff D4 Teknik Informatika');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_file`
--

CREATE TABLE `tbl_file` (
  `id_file` int(11) NOT NULL,
  `id_kategori` int(11) DEFAULT NULL,
  `no_file` varchar(15) DEFAULT NULL,
  `nama_file` varchar(255) DEFAULT NULL,
  `pengirim` varchar(255) DEFAULT NULL,
  `tujuan` varchar(255) DEFAULT NULL,
  `no_surat` varchar(100) DEFAULT NULL,
  `deskripsi` text DEFAULT NULL,
  `tgl_surat` date DEFAULT NULL,
  `tgl_diterima` date DEFAULT NULL,
  `tipe_file` varchar(255) DEFAULT NULL,
  `namapdf` varchar(100) DEFAULT NULL,
  `id_dep` int(11) DEFAULT NULL,
  `id_user` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_file`
--

INSERT INTO `tbl_file` (`id_file`, `id_kategori`, `no_file`, `nama_file`, `pengirim`, `tujuan`, `no_surat`, `deskripsi`, `tgl_surat`, `tgl_diterima`, `tipe_file`, `namapdf`, `id_dep`, `id_user`) VALUES
(45, 15, '31190121-0MSmd', 'Koordinasi Kegiatan', 'Prodi D3 Akuntansi', 'Prodi D4 Teknik Infomatika', '123/KL/VI/2020', 'Bimbingan Teknis Audit Mutu Internal bagi PTS di Lingkungan LLDIKTI Wilayah IV sebagai lanjutan dari Bimbingan Teknis Penyusunan Dokumen SPMI dan Bimbingan Teknis Evaluasi Pelaksanaan SPMI yang telah kami selenggarakan beberapa waktu yang lalu, dengan ini kami mohon bantuan Saudara untuk menugaskan kembali nama terlampir', '2021-01-19', '2021-01-19', '1611062784_c0477ac85c67db930fa7.pdf', 'Sambutan-Sambutan.pdf', 10, 18),
(46, 15, '15190121-CoiGB', 'Laporan Akademik', 'Prodi D4 Akuntansi', 'Prodi D4 Teknik Informatika', '26.GP.20', 'Pengunggahan Lap IPK dan Penyerahan Berkas Mahasiswa Penerima Bidikmisi Tahun 2019', '2021-01-19', '2021-01-19', '1611062749_33e3bef0e445b082e1a4.pdf', 'Contoh Nilai Ujian MTA.pdf', 10, 18),
(48, 16, '44190121-ZVGiL', 'Surat Edaran', 'Prodi D4 Teknik Informatika', 'Peserta Internship 1', '04/Prodi-D4TI/PPI/01/2021', 'Tentang Ketentuan Peserta Sidang Pertanggungjawaban Hasil Kegiatan Internship 1 Mahasiswa D4 Teknik Informatika Politeknik POS Indonesia', '2021-01-19', '2021-01-19', '1611066220_2712f51a5e83341499fd.pdf', 'SURAT EDARAN INTERNSHIP1 KAPRODI.pdf', 10, 18),
(49, 16, '29190121-J3muX', 'Surat Pengantar UTS 2020/2021', 'BAAK', 'MAHASISWA', '034/BAAK/PPI/XI/2020', 'Surat Pengantar Penyelenggaraan UTS Semester Ganjil 2020 dan Jadwal UTS Semester Ganjil 2020', '2021-01-19', '2021-01-19', '1611112250_5e61473cf70e3ae1f020.pdf', 'Pengantar Penyelenggaraan UTS Ganjil 2020 2021 dan Jadwal.pdf', 10, 18),
(59, 16, '25200121-7cfan', 'Program Internship I', 'Prodi D4 Teknik Infomatika', 'Prodi D3 Logistik Bisnis', '53-037/Internship/Prodi-DIVTI/PPI/09/2020', 'Surat Edaran Internship I untuk Mahasiswa', '2021-02-25', '2021-03-04', '1611138521_a4ee7c8c0e161054969d.pdf', 'Surat Internship dari Kampus.pdf', 11, 16),
(78, 15, '51020221-E94iw', 'Surar Edaran', 'DIREKTUR', 'Prodi D4 Teknik Informatika', '2313', 'Surat Edaran', '2021-02-03', '2021-01-31', '1612288651_fbdcac14d4e9fe3fd972.pdf', 'SURAT EDARAN INTERNSHIP1 KAPRODI.pdf', 11, 16);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_kategori`
--

CREATE TABLE `tbl_kategori` (
  `id_kategori` int(11) NOT NULL,
  `nama_kategori` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_kategori`
--

INSERT INTO `tbl_kategori` (`id_kategori`, `nama_kategori`) VALUES
(15, 'Surat Masuk'),
(16, 'Surat Keluar');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_user`
--

CREATE TABLE `tbl_user` (
  `id_user` int(11) NOT NULL,
  `nama_user` varchar(255) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `password` varchar(255) DEFAULT NULL,
  `level` int(1) DEFAULT NULL,
  `foto` varchar(255) DEFAULT NULL,
  `id_dep` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_user`
--

INSERT INTO `tbl_user` (`id_user`, `nama_user`, `email`, `password`, `level`, `foto`, `id_dep`) VALUES
(16, 'De Gea', 'kaprodi@gmail.com', '123', 1, '1611062934_e62658661301967133c2.jpg', 11),
(17, 'Bruno Fernandez', 'admin@gmail.com', '123', 2, '1611486179_6b99b2f4a46f450ab271.jpg', 13),
(32, 'Luke Shaw', 'Dosen@gmail.com', '123', 3, '1612279350_4f74a8367469483cf2ad.jpg', 10),
(38, 'Paul Pogba', 'pogba@gmail.com', '123', 3, '1612280279_6dc183a9bf7f7e6b1492.jpg', 10);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tbl_dep`
--
ALTER TABLE `tbl_dep`
  ADD PRIMARY KEY (`id_dep`);

--
-- Indexes for table `tbl_file`
--
ALTER TABLE `tbl_file`
  ADD PRIMARY KEY (`id_file`),
  ADD UNIQUE KEY `id_file_3` (`id_file`),
  ADD KEY `id_file` (`id_file`),
  ADD KEY `id_file_2` (`id_file`);

--
-- Indexes for table `tbl_kategori`
--
ALTER TABLE `tbl_kategori`
  ADD PRIMARY KEY (`id_kategori`);

--
-- Indexes for table `tbl_user`
--
ALTER TABLE `tbl_user`
  ADD PRIMARY KEY (`id_user`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tbl_dep`
--
ALTER TABLE `tbl_dep`
  MODIFY `id_dep` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `tbl_file`
--
ALTER TABLE `tbl_file`
  MODIFY `id_file` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=79;

--
-- AUTO_INCREMENT for table `tbl_kategori`
--
ALTER TABLE `tbl_kategori`
  MODIFY `id_kategori` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `tbl_user`
--
ALTER TABLE `tbl_user`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=39;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
