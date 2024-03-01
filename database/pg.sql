-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 27, 2024 at 08:46 AM
-- Server version: 10.4.22-MariaDB
-- PHP Version: 7.4.27

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `playground2`
--

-- --------------------------------------------------------

--
-- Table structure for table `pajak`
--

CREATE TABLE `pajak` (
  `id_pajak` int(11) NOT NULL,
  `persen_pajak` int(3) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `pajak`
--

INSERT INTO `pajak` (`id_pajak`, `persen_pajak`) VALUES
(1, 10);

-- --------------------------------------------------------

--
-- Table structure for table `pegawai`
--

CREATE TABLE `pegawai` (
  `id_pegawai` int(4) NOT NULL,
  `id_pegawai_user` int(4) NOT NULL,
  `nama_pegawai` varchar(255) NOT NULL,
  `no_telp` varchar(13) NOT NULL,
  `maker_pegawai` int(4) NOT NULL,
  `tanggal_pegawai` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `pegawai`
--

INSERT INTO `pegawai` (`id_pegawai`, `id_pegawai_user`, `nama_pegawai`, `no_telp`, `maker_pegawai`, `tanggal_pegawai`) VALUES
(1, 3, 'naruto', '42342342', 3, '2024-02-20 16:57:51'),
(4, 6, 'kakashi', '423423223', 3, '2024-02-21 13:26:56');

-- --------------------------------------------------------

--
-- Table structure for table `pengeluaran`
--

CREATE TABLE `pengeluaran` (
  `id_pengeluaran` int(20) NOT NULL,
  `tujuan_pengeluaran` varchar(255) NOT NULL,
  `jumlah_pengeluaran` int(255) NOT NULL,
  `maker_pengeluaran` int(10) NOT NULL,
  `tanggal_pengeluaran` date NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `pengeluaran`
--

INSERT INTO `pengeluaran` (`id_pengeluaran`, `tujuan_pengeluaran`, `jumlah_pengeluaran`, `maker_pengeluaran`, `tanggal_pengeluaran`) VALUES
(2, 'gaji', 2000000, 3, '2024-02-26');

-- --------------------------------------------------------

--
-- Table structure for table `permainan`
--

CREATE TABLE `permainan` (
  `id_permainan` int(4) NOT NULL,
  `nama_permainan` varchar(255) NOT NULL,
  `harga_permainan` text NOT NULL,
  `maker_permainan` int(4) NOT NULL,
  `tanggal_permainan` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `permainan`
--

INSERT INTO `permainan` (`id_permainan`, `nama_permainan`, `harga_permainan`, `maker_permainan`, `tanggal_permainan`) VALUES
(1, 'bouncy castle', '10000', 3, '2024-02-20 17:58:23'),
(2, 'kolam bol', '20000', 3, '2024-02-20 17:58:47');

-- --------------------------------------------------------

--
-- Table structure for table `playground`
--

CREATE TABLE `playground` (
  `id_playground` int(4) NOT NULL,
  `id_permainan_playground` int(4) NOT NULL,
  `nama_anak` varchar(255) NOT NULL,
  `nama_ortu` varchar(255) NOT NULL,
  `durasi` varchar(24) NOT NULL,
  `jam_mulai` time NOT NULL DEFAULT current_timestamp(),
  `jam_selesai` time NOT NULL,
  `total_harga` text NOT NULL,
  `status` int(1) NOT NULL,
  `maker_playground` int(4) NOT NULL,
  `tanggal_playground` datetime NOT NULL DEFAULT current_timestamp(),
  `tanggal_laporan` date NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `playground`
--

INSERT INTO `playground` (`id_playground`, `id_permainan_playground`, `nama_anak`, `nama_ortu`, `durasi`, `jam_mulai`, `jam_selesai`, `total_harga`, `status`, `maker_playground`, `tanggal_playground`, `tanggal_laporan`) VALUES
(18, 2, 'tes', '', '1', '17:42:01', '18:46:01', '20000', 2, 3, '2024-02-21 17:42:01', '2024-02-21'),
(19, 1, 'tes2', '', '1', '17:42:07', '18:47:07', '10000', 2, 3, '2024-02-21 17:42:07', '2024-02-21'),
(20, 2, 'halo', '', '1', '01:51:38', '02:36:38', '20.000', 2, 3, '2024-02-23 01:51:38', '2024-02-23'),
(21, 2, 'naruto', 'minato', '2', '10:55:34', '12:55:34', '40.000', 2, 3, '2024-02-27 10:55:34', '2024-02-27'),
(22, 2, 'sakura', 'haruno', '1', '10:56:15', '11:56:15', '20.000', 2, 3, '2024-02-26 10:56:15', '2024-02-26'),
(23, 2, 'rede', 'red', '1', '12:36:35', '13:36:35', '22.000', 2, 3, '2024-02-27 12:36:35', '2024-02-27'),
(24, 2, 'naruto', 'haruno', '1', '12:37:24', '13:37:24', '22000', 2, 3, '2024-02-27 12:37:24', '2024-02-27');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id_user` int(4) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `level` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id_user`, `username`, `password`, `level`) VALUES
(3, 'admin', '21232f297a57a5a743894a0e4a801fc3', 1),
(6, 'petugas', '095e3a1cb5cbb579195f0a6eacc84483', 2);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `pajak`
--
ALTER TABLE `pajak`
  ADD PRIMARY KEY (`id_pajak`);

--
-- Indexes for table `pegawai`
--
ALTER TABLE `pegawai`
  ADD PRIMARY KEY (`id_pegawai`),
  ADD UNIQUE KEY `NO_TELP` (`no_telp`);

--
-- Indexes for table `pengeluaran`
--
ALTER TABLE `pengeluaran`
  ADD PRIMARY KEY (`id_pengeluaran`);

--
-- Indexes for table `permainan`
--
ALTER TABLE `permainan`
  ADD PRIMARY KEY (`id_permainan`),
  ADD UNIQUE KEY `NAMA_PERMAINAN` (`nama_permainan`);

--
-- Indexes for table `playground`
--
ALTER TABLE `playground`
  ADD PRIMARY KEY (`id_playground`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id_user`),
  ADD UNIQUE KEY `USERNAME` (`username`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `pajak`
--
ALTER TABLE `pajak`
  MODIFY `id_pajak` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `pegawai`
--
ALTER TABLE `pegawai`
  MODIFY `id_pegawai` int(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `pengeluaran`
--
ALTER TABLE `pengeluaran`
  MODIFY `id_pengeluaran` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `permainan`
--
ALTER TABLE `permainan`
  MODIFY `id_permainan` int(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `playground`
--
ALTER TABLE `playground`
  MODIFY `id_playground` int(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id_user` int(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
