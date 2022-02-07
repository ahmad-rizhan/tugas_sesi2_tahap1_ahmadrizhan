-- phpMyAdmin SQL Dump
-- version 4.7.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: 07 Feb 2022 pada 00.39
-- Versi Server: 10.1.22-MariaDB
-- PHP Version: 7.1.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_klinik`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `bayar`
--

CREATE TABLE `bayar` (
  `id_bayar` int(11) NOT NULL,
  `id_pasien` int(11) NOT NULL,
  `id_dokter` int(11) NOT NULL,
  `tanggal_bayar` date NOT NULL,
  `tarif` varchar(20) NOT NULL,
  `biaya_resep` varchar(30) NOT NULL,
  `keluhan` text NOT NULL,
  `diagnosa` text NOT NULL,
  `resep` text NOT NULL,
  `total_bayar` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `bayar`
--

INSERT INTO `bayar` (`id_bayar`, `id_pasien`, `id_dokter`, `tanggal_bayar`, `tarif`, `biaya_resep`, `keluhan`, `diagnosa`, `resep`, `total_bayar`) VALUES
(61, 4, 5, '2022-02-06', '50000', '54000', 'kurang makan', 'parak dah', 'ksks', '104000'),
(62, 7, 6, '2022-02-07', '40000', '33500', 'Menderita Gangguan Pada Suhu Badan', 'dr.imam supardi', 'dr. Imam Supardi', '73500');

-- --------------------------------------------------------

--
-- Struktur dari tabel `dokter`
--

CREATE TABLE `dokter` (
  `id_dokter` int(11) NOT NULL,
  `nama_dokter` varchar(50) NOT NULL,
  `lahir_dokter` date NOT NULL,
  `alamat` text NOT NULL,
  `telepon` varchar(20) NOT NULL,
  `tarif` varchar(20) NOT NULL,
  `spesialis` varchar(50) NOT NULL,
  `keterangan` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `dokter`
--

INSERT INTO `dokter` (`id_dokter`, `nama_dokter`, `lahir_dokter`, `alamat`, `telepon`, `tarif`, `spesialis`, `keterangan`) VALUES
(5, 'Dr. Habibie', '1987-04-13', 'Jl. Soekarno-Hatta Jakarta Selatan', '087634431221', '50000', 'Umum', ''),
(6, 'dr. Imam Supardi', '1976-04-03', '', '087654321990', '40000', 'Dokter Anak ', '');

-- --------------------------------------------------------

--
-- Struktur dari tabel `obat`
--

CREATE TABLE `obat` (
  `id_obat` int(11) NOT NULL,
  `nama_obat` varchar(50) NOT NULL,
  `kategori` enum('Kapsul','Pil','Sirup','Tetes','Antibiotik') NOT NULL,
  `harga_obat` varchar(20) NOT NULL,
  `stok` int(11) NOT NULL,
  `keterangan` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `obat`
--

INSERT INTO `obat` (`id_obat`, `nama_obat`, `kategori`, `harga_obat`, `stok`, `keterangan`) VALUES
(1, 'UltraFlu', 'Kapsul', '18000', 8, 'Meredakan Flu, deman, sakit kepala, sakit gigi'),
(2, 'Promag', 'Kapsul', '500', 23, 'Meredakan sakit perut seperti Maag dll\r\n'),
(3, 'Alleterol', 'Kapsul', '13500', 9, 'Obat untuk mengatasi gatal gatal pada mata karena debu '),
(6, 'Paracetamol', 'Kapsul', '1000', 98, 'Obat untuk meringankan demam'),
(7, 'Revannol', 'Kapsul', '12000', 5, 'Antibiotik pada luka');

-- --------------------------------------------------------

--
-- Struktur dari tabel `pasien`
--

CREATE TABLE `pasien` (
  `id_pasien` int(11) NOT NULL,
  `nama_pasien` varchar(50) NOT NULL,
  `lahir_pasien` date NOT NULL,
  `keluarga_pasien` varchar(50) NOT NULL,
  `alamat_pasien` text NOT NULL,
  `jk_pasien` enum('L','P') NOT NULL,
  `telepon_pasien` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `pasien`
--

INSERT INTO `pasien` (`id_pasien`, `nama_pasien`, `lahir_pasien`, `keluarga_pasien`, `alamat_pasien`, `jk_pasien`, `telepon_pasien`) VALUES
(4, 'Sangkuriang', '2011-02-01', 'Utuh Banua', 'Martaputa', 'L', '082145368787'),
(7, 'Shinta permatasari', '1991-12-12', 'Amat Jumblu', 'Banjarbaru', 'P', '08555544443');

-- --------------------------------------------------------

--
-- Struktur dari tabel `pelayanan`
--

CREATE TABLE `pelayanan` (
  `id_pelayanan` int(11) NOT NULL,
  `nama_pelayanan` varchar(50) NOT NULL,
  `biaya_pelayanan` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `pelayanan`
--

INSERT INTO `pelayanan` (`id_pelayanan`, `nama_pelayanan`, `biaya_pelayanan`) VALUES
(1, 'suntik injek', ' 17000'),
(2, 'Suntik Varises', '25000'),
(3, 'Cek Up Mingguan', '20000');

-- --------------------------------------------------------

--
-- Struktur dari tabel `pembayaran_layanan`
--

CREATE TABLE `pembayaran_layanan` (
  `id_pembayaran_layanan` int(11) NOT NULL,
  `id_bayar` int(11) NOT NULL,
  `id_pelayanan` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `pembayaran_layanan`
--

INSERT INTO `pembayaran_layanan` (`id_pembayaran_layanan`, `id_bayar`, `id_pelayanan`) VALUES
(3, 54, 1),
(4, 57, 1),
(5, 57, 1),
(6, 57, 1),
(7, 59, 1),
(8, 59, 1),
(9, 61, 1),
(10, 61, 1),
(11, 62, 1);

-- --------------------------------------------------------

--
-- Struktur dari tabel `pembayaran_obat`
--

CREATE TABLE `pembayaran_obat` (
  `id_pembayaran_obat` int(11) NOT NULL,
  `id_bayar` int(11) NOT NULL,
  `id_obat` int(11) NOT NULL,
  `jumlah` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `pembayaran_obat`
--

INSERT INTO `pembayaran_obat` (`id_pembayaran_obat`, `id_bayar`, `id_obat`, `jumlah`) VALUES
(41, 30, 6, 13),
(42, 30, 3, 2),
(43, 36, 2, 10),
(44, 37, 1, 2),
(45, 38, 1, 1),
(46, 38, 6, 13),
(47, 39, 3, 1),
(48, 39, 2, 1),
(52, 40, 1, 1),
(53, 40, 3, 1),
(54, 41, 1, 1),
(55, 42, 2, 1),
(56, 42, 1, 1),
(57, 42, 3, 1),
(58, 43, 2, 1),
(59, 43, 3, 1),
(60, 44, 1, 1),
(61, 44, 2, 1),
(62, 45, 2, 1),
(63, 0, 1, 1),
(64, 0, 6, 1),
(65, 0, 3, 1),
(66, 46, 6, 1),
(67, 47, 1, 2),
(68, 48, 1, 10),
(69, 49, 2, 50),
(70, 50, 7, 2),
(71, 50, 6, 10),
(72, 51, 3, 1),
(73, 52, 1, 1),
(74, 52, 2, 12),
(75, 53, 1, 1),
(76, 53, 7, 3),
(77, 54, 1, 10),
(78, 55, 3, 1),
(80, 55, 1, 12),
(81, 56, 1, 1),
(82, 57, 1, 1),
(83, 58, 1, 40),
(84, 59, 1, 1),
(85, 59, 2, 3),
(86, 60, 1, 1),
(87, 60, 2, 12),
(88, 61, 1, 3),
(89, 62, 1, 1),
(90, 62, 6, 2),
(91, 62, 3, 1);

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_lvl`
--

CREATE TABLE `tbl_lvl` (
  `id_level` int(11) NOT NULL,
  `level_user` enum('admin','user') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tbl_lvl`
--

INSERT INTO `tbl_lvl` (`id_level`, `level_user`) VALUES
(1, 'admin'),
(2, 'user');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_user`
--

CREATE TABLE `tbl_user` (
  `id_user` int(11) NOT NULL,
  `id_level` int(11) NOT NULL,
  `first_name` varchar(50) NOT NULL,
  `last_name` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `phone` varchar(20) NOT NULL,
  `user` varchar(20) NOT NULL,
  `pass` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tbl_user`
--

INSERT INTO `tbl_user` (`id_user`, `id_level`, `first_name`, `last_name`, `email`, `phone`, `user`, `pass`) VALUES
(1, 1, 'admin', '', 'admin@gmail.com', '', '@admin', 'admin123'),
(2, 2, 'user', '', 'user@gmail.com', '', '@user', 'user123');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `bayar`
--
ALTER TABLE `bayar`
  ADD PRIMARY KEY (`id_bayar`),
  ADD KEY `id_pasien` (`id_pasien`),
  ADD KEY `id_dokter` (`id_dokter`);

--
-- Indexes for table `dokter`
--
ALTER TABLE `dokter`
  ADD PRIMARY KEY (`id_dokter`);

--
-- Indexes for table `obat`
--
ALTER TABLE `obat`
  ADD PRIMARY KEY (`id_obat`);

--
-- Indexes for table `pasien`
--
ALTER TABLE `pasien`
  ADD PRIMARY KEY (`id_pasien`);

--
-- Indexes for table `pelayanan`
--
ALTER TABLE `pelayanan`
  ADD PRIMARY KEY (`id_pelayanan`);

--
-- Indexes for table `pembayaran_layanan`
--
ALTER TABLE `pembayaran_layanan`
  ADD PRIMARY KEY (`id_pembayaran_layanan`),
  ADD KEY `id_pelayanan` (`id_pelayanan`);

--
-- Indexes for table `pembayaran_obat`
--
ALTER TABLE `pembayaran_obat`
  ADD PRIMARY KEY (`id_pembayaran_obat`),
  ADD KEY `id_obat` (`id_obat`);

--
-- Indexes for table `tbl_lvl`
--
ALTER TABLE `tbl_lvl`
  ADD PRIMARY KEY (`id_level`);

--
-- Indexes for table `tbl_user`
--
ALTER TABLE `tbl_user`
  ADD PRIMARY KEY (`id_user`),
  ADD KEY `id_level` (`id_level`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `bayar`
--
ALTER TABLE `bayar`
  MODIFY `id_bayar` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=63;
--
-- AUTO_INCREMENT for table `dokter`
--
ALTER TABLE `dokter`
  MODIFY `id_dokter` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT for table `obat`
--
ALTER TABLE `obat`
  MODIFY `id_obat` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT for table `pasien`
--
ALTER TABLE `pasien`
  MODIFY `id_pasien` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;
--
-- AUTO_INCREMENT for table `pelayanan`
--
ALTER TABLE `pelayanan`
  MODIFY `id_pelayanan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `pembayaran_layanan`
--
ALTER TABLE `pembayaran_layanan`
  MODIFY `id_pembayaran_layanan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;
--
-- AUTO_INCREMENT for table `pembayaran_obat`
--
ALTER TABLE `pembayaran_obat`
  MODIFY `id_pembayaran_obat` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=92;
--
-- AUTO_INCREMENT for table `tbl_lvl`
--
ALTER TABLE `tbl_lvl`
  MODIFY `id_level` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `tbl_user`
--
ALTER TABLE `tbl_user`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `bayar`
--
ALTER TABLE `bayar`
  ADD CONSTRAINT `bayar_ibfk_1` FOREIGN KEY (`id_pasien`) REFERENCES `pasien` (`id_pasien`),
  ADD CONSTRAINT `bayar_ibfk_2` FOREIGN KEY (`id_dokter`) REFERENCES `dokter` (`id_dokter`);

--
-- Ketidakleluasaan untuk tabel `pembayaran_layanan`
--
ALTER TABLE `pembayaran_layanan`
  ADD CONSTRAINT `pembayaran_layanan_ibfk_1` FOREIGN KEY (`id_pelayanan`) REFERENCES `pelayanan` (`id_pelayanan`);

--
-- Ketidakleluasaan untuk tabel `pembayaran_obat`
--
ALTER TABLE `pembayaran_obat`
  ADD CONSTRAINT `pembayaran_obat_ibfk_2` FOREIGN KEY (`id_obat`) REFERENCES `obat` (`id_obat`);

--
-- Ketidakleluasaan untuk tabel `tbl_user`
--
ALTER TABLE `tbl_user`
  ADD CONSTRAINT `tbl_user_ibfk_1` FOREIGN KEY (`id_level`) REFERENCES `tbl_lvl` (`id_level`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
