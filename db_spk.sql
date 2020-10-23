-- phpMyAdmin SQL Dump
-- version 4.9.5
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Waktu pembuatan: 23 Okt 2020 pada 07.26
-- Versi server: 5.7.24
-- Versi PHP: 7.2.19

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_spk`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `beasiswa`
--

CREATE TABLE `beasiswa` (
  `id` int(3) NOT NULL,
  `nama` varchar(50) NOT NULL,
  `vendor` varchar(50) NOT NULL,
  `file` varchar(60) NOT NULL,
  `kuota` int(50) NOT NULL,
  `jumlah_peserta` int(4) NOT NULL,
  `periode_awal` date NOT NULL,
  `periode_akhir` date NOT NULL,
  `status` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `beasiswa`
--

INSERT INTO `beasiswa` (`id`, `nama`, `vendor`, `file`, `kuota`, `jumlah_peserta`, `periode_awal`, `periode_akhir`, `status`) VALUES
(1, 'PPA', 'MENDIKBUD', 'CV6.pdf', 50, 0, '2020-10-21', '2020-10-22', 0),
(2, 'BAWAKU', 'WALIKOTA BDG', 'transkip.pdf', 20, 3, '2020-10-22', '2020-10-23', 0);

-- --------------------------------------------------------

--
-- Struktur dari tabel `kriteria`
--

CREATE TABLE `kriteria` (
  `id` int(3) NOT NULL,
  `nama_kriteria` varchar(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `kriteria`
--

INSERT INTO `kriteria` (`id`, `nama_kriteria`) VALUES
(3, 'IPK'),
(4, 'Penghasilan Ortu'),
(5, 'Prestasi Akademik'),
(7, 'Prestasi Non Akademik');

-- --------------------------------------------------------

--
-- Struktur dari tabel `kriteria_nilai`
--

CREATE TABLE `kriteria_nilai` (
  `id` int(3) NOT NULL,
  `kriteria_id_from` int(3) NOT NULL,
  `kriteria_id_to` int(3) NOT NULL,
  `nilai` double NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `kriteria_nilai`
--

INSERT INTO `kriteria_nilai` (`id`, `kriteria_id_from`, `kriteria_id_to`, `nilai`) VALUES
(681, 3, 4, 0.33),
(682, 3, 5, 0.2),
(683, 3, 7, 0.14),
(684, 4, 4, 1),
(685, 4, 3, 3),
(686, 4, 5, 0.33),
(687, 4, 7, 0.2),
(688, 5, 3, 5),
(689, 5, 5, 1),
(690, 5, 7, 0.33),
(691, 7, 3, 7),
(692, 7, 4, 5),
(693, 7, 7, 1),
(694, 5, 4, 3),
(695, 7, 5, 3),
(696, 3, 3, 1);

-- --------------------------------------------------------

--
-- Struktur dari tabel `kriteria_prioritas`
--

CREATE TABLE `kriteria_prioritas` (
  `id` int(3) NOT NULL,
  `kriteria_id` int(3) NOT NULL,
  `prioritas` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `kriteria_prioritas`
--

INSERT INTO `kriteria_prioritas` (`id`, `kriteria_id`, `prioritas`) VALUES
(109, 4, 0.26),
(110, 3, 0.56),
(111, 7, 0.06),
(112, 5, 0.12);

-- --------------------------------------------------------

--
-- Struktur dari tabel `nilai_kategori`
--

CREATE TABLE `nilai_kategori` (
  `id` int(3) NOT NULL,
  `nama_nilai` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `nilai_kategori`
--

INSERT INTO `nilai_kategori` (`id`, `nama_nilai`) VALUES
(1, 'Sangat Baik'),
(2, 'Baik'),
(3, 'Cukup'),
(4, 'Kurang');

-- --------------------------------------------------------

--
-- Struktur dari tabel `nilai_pasang`
--

CREATE TABLE `nilai_pasang` (
  `id` int(3) NOT NULL,
  `nilai_id_from` int(3) NOT NULL,
  `nilai_id_to` int(3) NOT NULL,
  `nilai_pasangan` double NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `nilai_pasang`
--

INSERT INTO `nilai_pasang` (`id`, `nilai_id_from`, `nilai_id_to`, `nilai_pasangan`) VALUES
(33, 1, 2, 0.33),
(34, 1, 3, 0.2),
(35, 1, 4, 0.14),
(36, 2, 2, 1),
(37, 2, 3, 0.33),
(38, 2, 4, 0.2),
(39, 2, 1, 3),
(40, 1, 1, 1),
(41, 3, 4, 0.33),
(42, 3, 3, 1),
(43, 4, 1, 7),
(44, 4, 2, 5),
(45, 4, 3, 3),
(46, 3, 1, 5),
(47, 3, 2, 3),
(48, 4, 4, 1);

-- --------------------------------------------------------

--
-- Struktur dari tabel `nilai_prioritas`
--

CREATE TABLE `nilai_prioritas` (
  `id` int(3) NOT NULL,
  `nilai_id` int(3) NOT NULL,
  `prioritas` double NOT NULL,
  `subprioritas` double NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `nilai_prioritas`
--

INSERT INTO `nilai_prioritas` (`id`, `nilai_id`, `prioritas`, `subprioritas`) VALUES
(13, 4, 0.06, 0.11),
(14, 3, 0.12, 0.21),
(15, 2, 0.26, 0.46),
(16, 1, 0.56, 1);

-- --------------------------------------------------------

--
-- Struktur dari tabel `persyaratan`
--

CREATE TABLE `persyaratan` (
  `id` int(3) NOT NULL,
  `beasiswa_id` int(3) NOT NULL,
  `kriteria_id` int(3) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struktur dari tabel `peserta`
--

CREATE TABLE `peserta` (
  `id` int(3) NOT NULL,
  `user_id` int(3) NOT NULL,
  `beasiswa_id` int(3) NOT NULL,
  `status` int(1) NOT NULL,
  `total` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `peserta`
--

INSERT INTO `peserta` (`id`, `user_id`, `beasiswa_id`, `status`, `total`) VALUES
(3, 17, 2, 1, 0.5038),
(4, 18, 2, 1, 0.7204),
(5, 19, 2, 1, 0.4094);

-- --------------------------------------------------------

--
-- Struktur dari tabel `subkriteria`
--

CREATE TABLE `subkriteria` (
  `id` int(3) NOT NULL,
  `kriteria_id` int(3) NOT NULL,
  `nama_subkriteria` varchar(100) NOT NULL,
  `nilai_id` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `subkriteria`
--

INSERT INTO `subkriteria` (`id`, `kriteria_id`, `nama_subkriteria`, `nilai_id`) VALUES
(1, 3, '4.00', 1),
(3, 3, '3.60 - 3.99', 2),
(4, 3, '3.00 - 3.59', 3),
(5, 3, '> 2.99', 4),
(6, 4, '<= 1.000.000', 1),
(7, 4, '1.100.000 - 2.000.000', 2),
(8, 4, '2.100.000 - 3.000.000', 3),
(9, 4, '> 3.000.000', 4),
(10, 5, 'Nasional', 1),
(11, 5, 'Provinsi', 2),
(12, 5, 'Kota / Kabupaten', 3),
(13, 5, 'Kampus', 4),
(14, 7, 'Nasional', 1),
(15, 7, 'Provinsi', 2),
(16, 7, 'Kota / Kabupaten', 3),
(17, 7, 'Kampus', 4);

-- --------------------------------------------------------

--
-- Struktur dari tabel `user`
--

CREATE TABLE `user` (
  `id` int(3) NOT NULL,
  `nama` varchar(50) NOT NULL,
  `npm` varchar(15) DEFAULT NULL,
  `email` varchar(30) NOT NULL,
  `fakultas` varchar(50) DEFAULT NULL,
  `jurusan` varchar(50) DEFAULT NULL,
  `photo` varchar(100) NOT NULL,
  `password` text NOT NULL,
  `jenis_kelamin` varchar(10) NOT NULL,
  `status` int(1) NOT NULL,
  `level` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `user`
--

INSERT INTO `user` (`id`, `nama`, `npm`, `email`, `fakultas`, `jurusan`, `photo`, `password`, `jenis_kelamin`, `status`, `level`) VALUES
(16, 'Aku Admin', NULL, 'admin@example.com', NULL, NULL, 'admin.png', '$2y$10$Uy4G8LVLd2puhFt4YDaM.uju3stshs6pCpOU/5M7HF.42kXYFU/cy', 'Pria', 1, 0),
(17, 'User', '41155050160021', 'aman.agustian12@gmail.com', 'Teknik', 'Informatika', 'default-avatar.png', '$2y$10$kGIDM0qzzTy61QcMYPIacupfCBYMOMAu7EBDG3jfeLQ/X9VhMF6Ta', 'Pria', 1, 1),
(18, 'Hendrik', '41155050160020', 'hherdiansyah6@gmail.com', 'Teknik', 'Informatika', 'default-avatar1.png', '$2y$10$.B1Yq8zyYxtCJ4.BkfhaKOY0gWBsPAcqmWrgnRBZbusweg4pSDeQS', 'Pria', 1, 1),
(19, 'Albert', '41155050160023', 'hendrikherdiansyah22@gmail.com', 'Teknik', 'Informatika', '1.jpg', '$2y$10$8KGn5.uRxPFGFB8lEIAx7eqR29JrAHDlChaLR2llfShTn18HjC0B6', 'Pria', 1, 1);

-- --------------------------------------------------------

--
-- Struktur dari tabel `user_persyaratan`
--

CREATE TABLE `user_persyaratan` (
  `id` int(3) NOT NULL,
  `user_id` int(3) NOT NULL,
  `kriteria_id` int(2) NOT NULL,
  `subkriteria_id` int(2) NOT NULL,
  `photo` varchar(150) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `user_persyaratan`
--

INSERT INTO `user_persyaratan` (`id`, `user_id`, `kriteria_id`, `subkriteria_id`, `photo`) VALUES
(13, 17, 3, 3, 'default-avatar2.png'),
(14, 17, 4, 7, 'admin2.png'),
(15, 17, 5, 10, 'logo_aja_FA2.png'),
(16, 17, 7, 17, 'LOGO_FA11.png'),
(17, 18, 3, 1, 'default-avatar3.png'),
(18, 18, 4, 7, 'logo_aja_FA3.png'),
(19, 18, 5, 13, 'LOGO_FA12.png'),
(20, 18, 7, 15, 'LOGO_FA21.png'),
(21, 19, 3, 4, '1.png'),
(22, 19, 4, 6, '2.png'),
(23, 19, 5, 12, '3.png'),
(24, 19, 7, 17, '4.png');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `beasiswa`
--
ALTER TABLE `beasiswa`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `kriteria`
--
ALTER TABLE `kriteria`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `kriteria_nilai`
--
ALTER TABLE `kriteria_nilai`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `kriteria_prioritas`
--
ALTER TABLE `kriteria_prioritas`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `nilai_kategori`
--
ALTER TABLE `nilai_kategori`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `nilai_pasang`
--
ALTER TABLE `nilai_pasang`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `nilai_prioritas`
--
ALTER TABLE `nilai_prioritas`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `persyaratan`
--
ALTER TABLE `persyaratan`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `peserta`
--
ALTER TABLE `peserta`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `subkriteria`
--
ALTER TABLE `subkriteria`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `user_persyaratan`
--
ALTER TABLE `user_persyaratan`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `beasiswa`
--
ALTER TABLE `beasiswa`
  MODIFY `id` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT untuk tabel `kriteria`
--
ALTER TABLE `kriteria`
  MODIFY `id` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT untuk tabel `kriteria_nilai`
--
ALTER TABLE `kriteria_nilai`
  MODIFY `id` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=697;

--
-- AUTO_INCREMENT untuk tabel `kriteria_prioritas`
--
ALTER TABLE `kriteria_prioritas`
  MODIFY `id` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=113;

--
-- AUTO_INCREMENT untuk tabel `nilai_kategori`
--
ALTER TABLE `nilai_kategori`
  MODIFY `id` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT untuk tabel `nilai_pasang`
--
ALTER TABLE `nilai_pasang`
  MODIFY `id` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=49;

--
-- AUTO_INCREMENT untuk tabel `nilai_prioritas`
--
ALTER TABLE `nilai_prioritas`
  MODIFY `id` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT untuk tabel `persyaratan`
--
ALTER TABLE `persyaratan`
  MODIFY `id` int(3) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `peserta`
--
ALTER TABLE `peserta`
  MODIFY `id` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT untuk tabel `subkriteria`
--
ALTER TABLE `subkriteria`
  MODIFY `id` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT untuk tabel `user`
--
ALTER TABLE `user`
  MODIFY `id` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT untuk tabel `user_persyaratan`
--
ALTER TABLE `user_persyaratan`
  MODIFY `id` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
