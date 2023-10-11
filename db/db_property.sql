-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 10 Okt 2023 pada 04.23
-- Versi server: 10.4.27-MariaDB
-- Versi PHP: 7.4.33

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
-- Struktur dari tabel `tb_customer`
--

CREATE TABLE `tb_customer` (
  `id_customer` int(11) NOT NULL,
  `nama_customer` varchar(128) NOT NULL,
  `nik` varchar(20) NOT NULL,
  `jenis_kelamin` char(1) NOT NULL,
  `alamat` text NOT NULL,
  `pekerjaan` varchar(30) DEFAULT NULL,
  `no_hp` varchar(20) NOT NULL DEFAULT '+62',
  `email` varchar(128) DEFAULT '@gmail.com',
  `waktu_pendaftaran` timestamp NOT NULL DEFAULT current_timestamp(),
  `level_member` int(11) NOT NULL,
  `username` varchar(64) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `tb_customer`
--

INSERT INTO `tb_customer` (`id_customer`, `nama_customer`, `nik`, `jenis_kelamin`, `alamat`, `pekerjaan`, `no_hp`, `email`, `waktu_pendaftaran`, `level_member`, `username`) VALUES
(2, 'ubai', '160809', 'L', 'Palembang', 'honor', '+62', '@gmail.com', '2023-10-08 10:53:47', 1, NULL);

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_gambar`
--

CREATE TABLE `tb_gambar` (
  `id_gambar` int(11) NOT NULL,
  `gambar` text NOT NULL,
  `jenis_gambar` int(11) NOT NULL,
  `gambar_for` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_jenis_gamb`
--

CREATE TABLE `tb_jenis_gamb` (
  `id_jenis_gambar` int(11) NOT NULL,
  `nama_jenis_gambar` varchar(32) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `tb_jenis_gamb`
--

INSERT INTO `tb_jenis_gamb` (`id_jenis_gambar`, `nama_jenis_gambar`) VALUES
(1, 'customer'),
(2, 'property');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_lv_member`
--

CREATE TABLE `tb_lv_member` (
  `id_member` int(11) NOT NULL,
  `member` varchar(64) NOT NULL,
  `keuntungan` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `tb_lv_member`
--

INSERT INTO `tb_lv_member` (`id_member`, `member`, `keuntungan`) VALUES
(1, 'common', 'tidak ada'),
(2, 'silver', 'dapat potongan 5%'),
(3, 'gold', 'dapat potongan 10%');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_lv_user`
--

CREATE TABLE `tb_lv_user` (
  `id_lv_user` int(11) NOT NULL,
  `jabatan` varchar(64) NOT NULL,
  `deskripsi` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `tb_lv_user`
--

INSERT INTO `tb_lv_user` (`id_lv_user`, `jabatan`, `deskripsi`) VALUES
(1, 'owner', 'pemilik bisa melakukan semua'),
(2, 'superadmin', 'aprove transaksi'),
(3, 'admin', 'input konsumen'),
(4, 'konsumen', 'tidak bisa login');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_pembayaran`
--

CREATE TABLE `tb_pembayaran` (
  `id_pembayaran` int(11) NOT NULL,
  `metode` varchar(32) NOT NULL,
  `deskripsi` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `tb_pembayaran`
--

INSERT INTO `tb_pembayaran` (`id_pembayaran`, `metode`, `deskripsi`) VALUES
(1, 'cash', 'bayar di tempat'),
(2, 'transfer', 'rekening 1111111111');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_property`
--

CREATE TABLE `tb_property` (
  `id_property` int(11) NOT NULL,
  `nama_property` varchar(50) DEFAULT 'NamaProperty',
  `deskripsi` text DEFAULT NULL,
  `jenis` int(11) NOT NULL,
  `harga` varchar(128) NOT NULL,
  `terjual` tinyint(1) NOT NULL,
  `waktu_tersedia` timestamp NULL DEFAULT current_timestamp(),
  `waktu_terjual` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `tb_property`
--

INSERT INTO `tb_property` (`id_property`, `nama_property`, `deskripsi`, `jenis`, `harga`, `terjual`, `waktu_tersedia`, `waktu_terjual`) VALUES
(8, 'Rumah blok e', 'qw', 1, '1200000000', 1, '2023-10-09 17:54:03', '2023-10-09 19:08:33'),
(9, 'Rumah blok eb', 'rumah kecil', 7, '111111111111', 0, '2023-10-10 01:53:27', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_tipe_unit`
--

CREATE TABLE `tb_tipe_unit` (
  `id_tipe` int(11) NOT NULL,
  `nama_tipe` varchar(128) DEFAULT 'NamaJenis'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `tb_tipe_unit`
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
-- Struktur dari tabel `tb_transaksi`
--

CREATE TABLE `tb_transaksi` (
  `id_transaksi` int(11) NOT NULL,
  `customer` int(11) NOT NULL,
  `property` int(11) NOT NULL,
  `status` tinyint(1) NOT NULL,
  `metode_pembayaran` int(11) NOT NULL,
  `waktu_mulai` timestamp NULL DEFAULT current_timestamp(),
  `waktu_akhir` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `tb_transaksi`
--

INSERT INTO `tb_transaksi` (`id_transaksi`, `customer`, `property`, `status`, `metode_pembayaran`, `waktu_mulai`, `waktu_akhir`) VALUES
(6, 2, 9, 0, 1, '2023-10-10 01:54:17', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_user`
--

CREATE TABLE `tb_user` (
  `username` varchar(64) NOT NULL,
  `password` text NOT NULL,
  `level` int(11) NOT NULL,
  `aktif` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `tb_user`
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
-- Indeks untuk tabel `tb_customer`
--
ALTER TABLE `tb_customer`
  ADD PRIMARY KEY (`id_customer`),
  ADD KEY `fk_user` (`username`),
  ADD KEY `fk_member` (`level_member`);

--
-- Indeks untuk tabel `tb_gambar`
--
ALTER TABLE `tb_gambar`
  ADD PRIMARY KEY (`id_gambar`),
  ADD KEY `fk_jns_gbr` (`jenis_gambar`);

--
-- Indeks untuk tabel `tb_jenis_gamb`
--
ALTER TABLE `tb_jenis_gamb`
  ADD PRIMARY KEY (`id_jenis_gambar`);

--
-- Indeks untuk tabel `tb_lv_member`
--
ALTER TABLE `tb_lv_member`
  ADD PRIMARY KEY (`id_member`);

--
-- Indeks untuk tabel `tb_lv_user`
--
ALTER TABLE `tb_lv_user`
  ADD PRIMARY KEY (`id_lv_user`);

--
-- Indeks untuk tabel `tb_pembayaran`
--
ALTER TABLE `tb_pembayaran`
  ADD PRIMARY KEY (`id_pembayaran`);

--
-- Indeks untuk tabel `tb_property`
--
ALTER TABLE `tb_property`
  ADD PRIMARY KEY (`id_property`),
  ADD KEY `fk_jenis` (`jenis`);

--
-- Indeks untuk tabel `tb_tipe_unit`
--
ALTER TABLE `tb_tipe_unit`
  ADD PRIMARY KEY (`id_tipe`);

--
-- Indeks untuk tabel `tb_transaksi`
--
ALTER TABLE `tb_transaksi`
  ADD PRIMARY KEY (`id_transaksi`),
  ADD KEY `fk_customer` (`customer`),
  ADD KEY `fk_property` (`property`),
  ADD KEY `fk_pembayaran` (`metode_pembayaran`);

--
-- Indeks untuk tabel `tb_user`
--
ALTER TABLE `tb_user`
  ADD PRIMARY KEY (`username`),
  ADD KEY `fk_level` (`level`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `tb_customer`
--
ALTER TABLE `tb_customer`
  MODIFY `id_customer` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT untuk tabel `tb_gambar`
--
ALTER TABLE `tb_gambar`
  MODIFY `id_gambar` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `tb_jenis_gamb`
--
ALTER TABLE `tb_jenis_gamb`
  MODIFY `id_jenis_gambar` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT untuk tabel `tb_lv_member`
--
ALTER TABLE `tb_lv_member`
  MODIFY `id_member` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT untuk tabel `tb_lv_user`
--
ALTER TABLE `tb_lv_user`
  MODIFY `id_lv_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT untuk tabel `tb_pembayaran`
--
ALTER TABLE `tb_pembayaran`
  MODIFY `id_pembayaran` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT untuk tabel `tb_property`
--
ALTER TABLE `tb_property`
  MODIFY `id_property` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT untuk tabel `tb_tipe_unit`
--
ALTER TABLE `tb_tipe_unit`
  MODIFY `id_tipe` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT untuk tabel `tb_transaksi`
--
ALTER TABLE `tb_transaksi`
  MODIFY `id_transaksi` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `tb_customer`
--
ALTER TABLE `tb_customer`
  ADD CONSTRAINT `fk_member` FOREIGN KEY (`level_member`) REFERENCES `tb_lv_member` (`id_member`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `tb_gambar`
--
ALTER TABLE `tb_gambar`
  ADD CONSTRAINT `fk_jns_gbr` FOREIGN KEY (`jenis_gambar`) REFERENCES `tb_jenis_gamb` (`id_jenis_gambar`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `tb_property`
--
ALTER TABLE `tb_property`
  ADD CONSTRAINT `fk_jenis` FOREIGN KEY (`jenis`) REFERENCES `tb_tipe_unit` (`id_tipe`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `tb_transaksi`
--
ALTER TABLE `tb_transaksi`
  ADD CONSTRAINT `fk_customer` FOREIGN KEY (`customer`) REFERENCES `tb_customer` (`id_customer`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_pembayaran` FOREIGN KEY (`metode_pembayaran`) REFERENCES `tb_pembayaran` (`id_pembayaran`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_property` FOREIGN KEY (`property`) REFERENCES `tb_property` (`id_property`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `tb_user`
--
ALTER TABLE `tb_user`
  ADD CONSTRAINT `fk_level` FOREIGN KEY (`level`) REFERENCES `tb_lv_user` (`id_lv_user`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
