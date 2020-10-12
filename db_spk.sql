-- phpMyAdmin SQL Dump
-- version 4.9.5
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Waktu pembuatan: 12 Okt 2020 pada 11.15
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
  `beasiswa_id` int(3) NOT NULL,
  `kriteria_id_from` int(3) NOT NULL,
  `kriteria_id_to` int(3) NOT NULL,
  `nilai` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struktur dari tabel `kriteria_prioritas`
--

CREATE TABLE `kriteria_prioritas` (
  `id` int(3) NOT NULL,
  `beasiswa_id` int(3) NOT NULL,
  `kriteria_id` int(3) NOT NULL,
  `prioritas` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

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
  `nilai_pasangan` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struktur dari tabel `nilai_prioritas`
--

CREATE TABLE `nilai_prioritas` (
  `id` int(3) NOT NULL,
  `nilai_id` int(3) NOT NULL,
  `nilai_pasangan_id` int(1) NOT NULL,
  `prioritas` float NOT NULL,
  `nilai_sub_kriteria` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

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

-- --------------------------------------------------------

--
-- Struktur dari tabel `subkriteria`
--

CREATE TABLE `subkriteria` (
  `id` int(3) NOT NULL,
  `kriteria_id` int(3) NOT NULL,
  `nama_subkriteria` varchar(100) NOT NULL,
  `tipe` varchar(5) NOT NULL,
  `nilai_minumum` float DEFAULT NULL,
  `nilai_maksimum` float DEFAULT NULL,
  `op_min` varchar(2) DEFAULT NULL,
  `op_max` varchar(2) DEFAULT NULL,
  `nilai_id` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `subkriteria`
--

INSERT INTO `subkriteria` (`id`, `kriteria_id`, `nama_subkriteria`, `tipe`, `nilai_minumum`, `nilai_maksimum`, `op_min`, `op_max`, `nilai_id`) VALUES
(1, 1, '4.00', 'text', NULL, NULL, NULL, NULL, 1);

-- --------------------------------------------------------

--
-- Struktur dari tabel `user`
--

CREATE TABLE `user` (
  `id` int(3) NOT NULL,
  `nama` varchar(50) NOT NULL,
  `npm` int(15) DEFAULT NULL,
  `email` varchar(30) NOT NULL,
  `fakultas` varchar(50) DEFAULT NULL,
  `jurusan` varchar(50) DEFAULT NULL,
  `photo` varchar(100) NOT NULL,
  `password` text NOT NULL,
  `jenis_kelamin` varchar(10) NOT NULL,
  `level` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `user`
--

INSERT INTO `user` (`id`, `nama`, `npm`, `email`, `fakultas`, `jurusan`, `photo`, `password`, `jenis_kelamin`, `level`) VALUES
(1, 'Aku Admin', NULL, 'admin@example.com', NULL, NULL, 'admin.png', '$2y$10$tg8JjEAHfdradgzpXJtw/.sHbI0gc9A2y5tMW2jef3pyNybACSN/e', 'Pria', 0),
(2, 'Test 1', NULL, 'admin2@example.com', NULL, NULL, 'default-avatar1.png', '$2y$10$mjsG.erJfQiOLBV7rHVCO.4CGB0J45ytwevKDUi8ou0gqsV5cjbc6', 'Wanita', 0);

-- --------------------------------------------------------

--
-- Struktur dari tabel `user_persyaratan`
--

CREATE TABLE `user_persyaratan` (
  `id` int(3) NOT NULL,
  `user_id` int(3) NOT NULL,
  `ipk` int(2) DEFAULT NULL,
  `ipk_photo` varchar(150) DEFAULT NULL,
  `penghasilan_ortu` int(2) DEFAULT NULL,
  `penghasilan_ortu_photo` varchar(150) DEFAULT NULL,
  `prestasi_akademik` int(2) DEFAULT NULL,
  `prestasi_akademik_photo` varchar(150) DEFAULT NULL,
  `prestatsi_non_akademik` int(2) DEFAULT NULL,
  `prestasi_non_akademik_photo` varchar(150) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

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
  MODIFY `id` int(3) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `kriteria`
--
ALTER TABLE `kriteria`
  MODIFY `id` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT untuk tabel `kriteria_nilai`
--
ALTER TABLE `kriteria_nilai`
  MODIFY `id` int(3) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `kriteria_prioritas`
--
ALTER TABLE `kriteria_prioritas`
  MODIFY `id` int(3) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `nilai_kategori`
--
ALTER TABLE `nilai_kategori`
  MODIFY `id` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT untuk tabel `nilai_pasang`
--
ALTER TABLE `nilai_pasang`
  MODIFY `id` int(3) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `nilai_prioritas`
--
ALTER TABLE `nilai_prioritas`
  MODIFY `id` int(3) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `persyaratan`
--
ALTER TABLE `persyaratan`
  MODIFY `id` int(3) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `peserta`
--
ALTER TABLE `peserta`
  MODIFY `id` int(3) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `subkriteria`
--
ALTER TABLE `subkriteria`
  MODIFY `id` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT untuk tabel `user`
--
ALTER TABLE `user`
  MODIFY `id` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT untuk tabel `user_persyaratan`
--
ALTER TABLE `user_persyaratan`
  MODIFY `id` int(3) NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
