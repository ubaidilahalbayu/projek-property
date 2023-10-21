-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Oct 21, 2023 at 09:58 PM
-- Server version: 8.0.34-0ubuntu0.22.04.1
-- PHP Version: 7.4.33

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_property`
--

-- --------------------------------------------------------

--
-- Table structure for table `tb_customer`
--

CREATE TABLE `tb_customer` (
  `id_customer` int NOT NULL,
  `nama_customer` varchar(128) COLLATE utf8mb4_general_ci NOT NULL,
  `nik` varchar(20) COLLATE utf8mb4_general_ci NOT NULL,
  `jenis_kelamin` char(1) COLLATE utf8mb4_general_ci NOT NULL,
  `alamat` text COLLATE utf8mb4_general_ci NOT NULL,
  `pekerjaan` varchar(30) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `no_hp` varchar(20) COLLATE utf8mb4_general_ci NOT NULL DEFAULT '+62',
  `email` varchar(128) COLLATE utf8mb4_general_ci DEFAULT '@gmail.com',
  `waktu_pendaftaran` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `level_member` int NOT NULL,
  `username` varchar(64) COLLATE utf8mb4_general_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tb_customer`
--

INSERT INTO `tb_customer` (`id_customer`, `nama_customer`, `nik`, `jenis_kelamin`, `alamat`, `pekerjaan`, `no_hp`, `email`, `waktu_pendaftaran`, `level_member`, `username`) VALUES
(2, 'ubai', '160809', 'L', 'Palembang', 'honor', '+62', '@gmail.com', '2023-10-08 10:53:47', 1, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `tb_gambar`
--

CREATE TABLE `tb_gambar` (
  `id_gambar` int NOT NULL,
  `gambar` text COLLATE utf8mb4_general_ci NOT NULL,
  `jenis_gambar` int NOT NULL,
  `gambar_for` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `tb_jenis_gamb`
--

CREATE TABLE `tb_jenis_gamb` (
  `id_jenis_gambar` int NOT NULL,
  `nama_jenis_gambar` varchar(32) COLLATE utf8mb4_general_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tb_jenis_gamb`
--

INSERT INTO `tb_jenis_gamb` (`id_jenis_gambar`, `nama_jenis_gambar`) VALUES
(1, 'customer'),
(2, 'property');

-- --------------------------------------------------------

--
-- Table structure for table `tb_lv_member`
--

CREATE TABLE `tb_lv_member` (
  `id_member` int NOT NULL,
  `member` varchar(64) COLLATE utf8mb4_general_ci NOT NULL,
  `keuntungan` text COLLATE utf8mb4_general_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tb_lv_member`
--

INSERT INTO `tb_lv_member` (`id_member`, `member`, `keuntungan`) VALUES
(1, 'common', 'tidak ada'),
(2, 'silver', 'dapat potongan 5%'),
(3, 'gold', 'dapat potongan 10%');

-- --------------------------------------------------------

--
-- Table structure for table `tb_lv_user`
--

CREATE TABLE `tb_lv_user` (
  `id_lv_user` int NOT NULL,
  `jabatan` varchar(64) COLLATE utf8mb4_general_ci NOT NULL,
  `deskripsi` text COLLATE utf8mb4_general_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tb_lv_user`
--

INSERT INTO `tb_lv_user` (`id_lv_user`, `jabatan`, `deskripsi`) VALUES
(1, 'owner', 'pemilik bisa melakukan semua'),
(2, 'superadmin', 'aprove transaksi'),
(3, 'admin', 'input konsumen'),
(4, 'konsumen', 'tidak bisa login');

-- --------------------------------------------------------

--
-- Table structure for table `tb_pembayaran`
--

CREATE TABLE `tb_pembayaran` (
  `id_pembayaran` int NOT NULL,
  `metode` varchar(32) COLLATE utf8mb4_general_ci NOT NULL,
  `deskripsi` text COLLATE utf8mb4_general_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tb_pembayaran`
--

INSERT INTO `tb_pembayaran` (`id_pembayaran`, `metode`, `deskripsi`) VALUES
(1, 'cash', 'bayar di tempat'),
(2, 'transfer', 'rekening 1111111111');

-- --------------------------------------------------------

--
-- Table structure for table `tb_property`
--

CREATE TABLE `tb_property` (
  `id_property` int NOT NULL,
  `nama_property` varchar(50) COLLATE utf8mb4_general_ci DEFAULT 'NamaProperty',
  `deskripsi_property` text CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci,
  `stock` int NOT NULL,
  `terjual` int NOT NULL,
  `update_stock` timestamp NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tb_property`
--

INSERT INTO `tb_property` (`id_property`, `nama_property`, `deskripsi_property`, `stock`, `terjual`, `update_stock`) VALUES
(1, 'Alamanda', '{\"jenis_property\": 2, \"luas_tanah\": 84, \"luas_bangunan\": 60, \"hpp_tanah\": 6600000, \"hpp_bangunan\": 3300000, \"infrastruktur\": 957987, \"ajb\": 5000000}', 9, 1, '2023-10-19 18:17:14'),
(2, 'Amrilis', '{\"jenis_property\": 2, \"luas_tanah\": 84, \"luas_bangunan\": 63, \"hpp_tanah\": 2176000, \"hpp_bangunan\": 4200000, \"infrastruktur\": 937572, \"ajb\": 5000000}', 10, 0, '2023-10-19 13:51:19'),
(3, 'Aster', '{\"jenis_property\": 2, \"luas_tanah\": 84, \"luas_bangunan\": 60, \"hpp_tanah\": 6600000, \"hpp_bangunan\": 3300000, \"infrastruktur\": 957987, \"ajb\": 5000000}', 10, 0, '2023-10-19 13:51:22'),
(4, 'Bluebell', '{\"jenis_property\": 2, \"luas_tanah\": 84, \"luas_bangunan\": 60, \"hpp_tanah\": 6600000, \"hpp_bangunan\": 3300000, \"infrastruktur\": 957987, \"ajb\": 5000000}', 10, 0, '2023-10-19 13:52:50'),
(5, 'Brassicca', '{\"jenis_property\": 2, \"luas_tanah\": 84, \"luas_bangunan\": 60, \"hpp_tanah\": 6600000, \"hpp_bangunan\": 3300000, \"infrastruktur\": 957987, \"ajb\": 5000000}', 10, 0, '2023-10-19 13:56:35'),
(6, 'Watercress', '{\"jenis_property\": 2, \"luas_tanah\": 84, \"luas_bangunan\": 60, \"hpp_tanah\": 6600000, \"hpp_bangunan\": 3300000, \"infrastruktur\": 957987, \"ajb\": 5000000}', 10, 0, '2023-10-19 13:56:36'),
(7, 'Willow', '{\"jenis_property\": 2, \"luas_tanah\": 84, \"luas_bangunan\": 60, \"hpp_tanah\": 6600000, \"hpp_bangunan\": 3300000, \"infrastruktur\": 957987, \"ajb\": 5000000}', 10, 0, '2023-10-19 13:56:37'),
(8, 'Kavling', '{\"jenis_property\": 1, \"luas_tanah\": 84, \"hpp_tanah\": 6600000, \"ajb\": 5000000}', 10, 0, '2023-10-19 13:58:49');

-- --------------------------------------------------------

--
-- Table structure for table `tb_tipe_unit`
--

CREATE TABLE `tb_tipe_unit` (
  `id_tipe` int NOT NULL,
  `nama_tipe` varchar(128) COLLATE utf8mb4_general_ci DEFAULT 'NamaJenis'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tb_tipe_unit`
--

INSERT INTO `tb_tipe_unit` (`id_tipe`, `nama_tipe`) VALUES
(1, 'Alamanda'),
(2, 'Amarilis'),
(3, 'Aster'),
(4, 'Bluebell'),
(5, 'Brassica'),
(6, 'Watercress'),
(7, 'Willow'),
(8, 'Kavling');

-- --------------------------------------------------------

--
-- Table structure for table `tb_transaksi`
--

CREATE TABLE `tb_transaksi` (
  `id_transaksi` int NOT NULL,
  `customer` int NOT NULL,
  `property` int NOT NULL,
  `harga_buka` int NOT NULL,
  `status` tinyint(1) NOT NULL,
  `metode_pembayaran` int NOT NULL,
  `waktu_mulai` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `waktu_akhir` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tb_transaksi`
--

INSERT INTO `tb_transaksi` (`id_transaksi`, `customer`, `property`, `harga_buka`, `status`, `metode_pembayaran`, `waktu_mulai`, `waktu_akhir`) VALUES
(11, 2, 1, 300000000, 1, 1, '2023-10-19 18:17:04', '2023-10-19 18:17:14'),
(12, 2, 2, 994950000, 0, 1, '2023-10-21 14:43:30', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `tb_user`
--

CREATE TABLE `tb_user` (
  `username` varchar(64) COLLATE utf8mb4_general_ci NOT NULL,
  `password` text COLLATE utf8mb4_general_ci NOT NULL,
  `level` int NOT NULL,
  `aktif` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tb_user`
--

INSERT INTO `tb_user` (`username`, `password`, `level`, `aktif`) VALUES
('admin', '21232f297a57a5a743894a0e4a801fc3', 3, 0),
('adminnn', '1235', 2, 1),
('new admin', '91ec1f9324753048c0096d036a694f86', 3, 1),
('non-user', 'a7481cd839a1bff1e3c0d11190db9e36', 4, 0),
('owner', '72122ce96bfec66e2396d2e25225d70a', 1, 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tb_customer`
--
ALTER TABLE `tb_customer`
  ADD PRIMARY KEY (`id_customer`),
  ADD KEY `fk_user` (`username`),
  ADD KEY `fk_member` (`level_member`);

--
-- Indexes for table `tb_gambar`
--
ALTER TABLE `tb_gambar`
  ADD PRIMARY KEY (`id_gambar`),
  ADD KEY `fk_jns_gbr` (`jenis_gambar`);

--
-- Indexes for table `tb_jenis_gamb`
--
ALTER TABLE `tb_jenis_gamb`
  ADD PRIMARY KEY (`id_jenis_gambar`);

--
-- Indexes for table `tb_lv_member`
--
ALTER TABLE `tb_lv_member`
  ADD PRIMARY KEY (`id_member`);

--
-- Indexes for table `tb_lv_user`
--
ALTER TABLE `tb_lv_user`
  ADD PRIMARY KEY (`id_lv_user`);

--
-- Indexes for table `tb_pembayaran`
--
ALTER TABLE `tb_pembayaran`
  ADD PRIMARY KEY (`id_pembayaran`);

--
-- Indexes for table `tb_property`
--
ALTER TABLE `tb_property`
  ADD PRIMARY KEY (`id_property`),
  ADD KEY `fk_jenis` (`stock`);

--
-- Indexes for table `tb_tipe_unit`
--
ALTER TABLE `tb_tipe_unit`
  ADD PRIMARY KEY (`id_tipe`);

--
-- Indexes for table `tb_transaksi`
--
ALTER TABLE `tb_transaksi`
  ADD PRIMARY KEY (`id_transaksi`),
  ADD KEY `fk_customer` (`customer`),
  ADD KEY `fk_property` (`property`),
  ADD KEY `fk_pembayaran` (`metode_pembayaran`);

--
-- Indexes for table `tb_user`
--
ALTER TABLE `tb_user`
  ADD PRIMARY KEY (`username`),
  ADD KEY `fk_level` (`level`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tb_customer`
--
ALTER TABLE `tb_customer`
  MODIFY `id_customer` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `tb_gambar`
--
ALTER TABLE `tb_gambar`
  MODIFY `id_gambar` int NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tb_jenis_gamb`
--
ALTER TABLE `tb_jenis_gamb`
  MODIFY `id_jenis_gambar` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `tb_lv_member`
--
ALTER TABLE `tb_lv_member`
  MODIFY `id_member` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `tb_lv_user`
--
ALTER TABLE `tb_lv_user`
  MODIFY `id_lv_user` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `tb_pembayaran`
--
ALTER TABLE `tb_pembayaran`
  MODIFY `id_pembayaran` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `tb_property`
--
ALTER TABLE `tb_property`
  MODIFY `id_property` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `tb_tipe_unit`
--
ALTER TABLE `tb_tipe_unit`
  MODIFY `id_tipe` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `tb_transaksi`
--
ALTER TABLE `tb_transaksi`
  MODIFY `id_transaksi` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `tb_customer`
--
ALTER TABLE `tb_customer`
  ADD CONSTRAINT `fk_member` FOREIGN KEY (`level_member`) REFERENCES `tb_lv_member` (`id_member`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `tb_gambar`
--
ALTER TABLE `tb_gambar`
  ADD CONSTRAINT `fk_jns_gbr` FOREIGN KEY (`jenis_gambar`) REFERENCES `tb_jenis_gamb` (`id_jenis_gambar`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `tb_transaksi`
--
ALTER TABLE `tb_transaksi`
  ADD CONSTRAINT `fk_customer` FOREIGN KEY (`customer`) REFERENCES `tb_customer` (`id_customer`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_pembayaran` FOREIGN KEY (`metode_pembayaran`) REFERENCES `tb_pembayaran` (`id_pembayaran`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_property` FOREIGN KEY (`property`) REFERENCES `tb_property` (`id_property`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `tb_user`
--
ALTER TABLE `tb_user`
  ADD CONSTRAINT `fk_level` FOREIGN KEY (`level`) REFERENCES `tb_lv_user` (`id_lv_user`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
