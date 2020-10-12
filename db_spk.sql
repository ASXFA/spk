-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Oct 02, 2020 at 03:24 PM
-- Server version: 10.1.13-MariaDB
-- PHP Version: 7.0.5

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
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
-- Table structure for table `beasiswa`
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
-- Table structure for table `kriteria`
--

CREATE TABLE `kriteria` (
  `id` int(3) NOT NULL,
  `beasiswa_id` int(3) NOT NULL,
  `nama_kriteria` int(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `kriteria_nilai`
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
-- Table structure for table `kriteria_prioritas`
--

CREATE TABLE `kriteria_prioritas` (
  `id` int(3) NOT NULL,
  `beasiswa_id` int(3) NOT NULL,
  `kriteria_id` int(3) NOT NULL,
  `prioritas` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `nilai_kategori`
--

CREATE TABLE `nilai_kategori` (
  `id` int(3) NOT NULL,
  `nama_nilai` varchar(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `nilai_pasang`
--

CREATE TABLE `nilai_pasang` (
  `id` int(3) NOT NULL,
  `nilai_id_from` int(3) NOT NULL,
  `nilai_id_to` int(3) NOT NULL,
  `nilai_pasangan` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `nilai_prioritas`
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
-- Table structure for table `peserta`
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
-- Table structure for table `subkriteria`
--

CREATE TABLE `subkriteria` (
  `id` int(3) NOT NULL,
  `beasiswa_id` int(3) NOT NULL,
  `kriteria_id` int(3) NOT NULL,
  `nama_subkriteria` varchar(100) NOT NULL,
  `tipe` varchar(5) NOT NULL,
  `nilai_minumum` float DEFAULT NULL,
  `nilai_maksimum` float DEFAULT NULL,
  `op_min` varchar(2) DEFAULT NULL,
  `op_max` varchar(2) DEFAULT NULL,
  `nilai_id` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` int(3) NOT NULL,
  `nama` int(50) NOT NULL,
  `npm` int(15) DEFAULT NULL,
  `email` varchar(30) NOT NULL,
  `fakultas` varchar(50) DEFAULT NULL,
  `jurusan` varchar(50) DEFAULT NULL,
  `IPK` double DEFAULT NULL,
  `prestasi_akademik` varchar(11) DEFAULT NULL,
  `prestasi_non_akademik` varchar(11) DEFAULT NULL,
  `penghasilan_ortu` int(7) DEFAULT NULL,
  `photo` varchar(100) NOT NULL,
  `password` text NOT NULL,
  `jenis_kelamin` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `beasiswa`
--
ALTER TABLE `beasiswa`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `kriteria`
--
ALTER TABLE `kriteria`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `kriteria_nilai`
--
ALTER TABLE `kriteria_nilai`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `kriteria_prioritas`
--
ALTER TABLE `kriteria_prioritas`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `nilai_pasang`
--
ALTER TABLE `nilai_pasang`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `nilai_prioritas`
--
ALTER TABLE `nilai_prioritas`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `peserta`
--
ALTER TABLE `peserta`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `subkriteria`
--
ALTER TABLE `subkriteria`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `beasiswa`
--
ALTER TABLE `beasiswa`
  MODIFY `id` int(3) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `kriteria`
--
ALTER TABLE `kriteria`
  MODIFY `id` int(3) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `kriteria_nilai`
--
ALTER TABLE `kriteria_nilai`
  MODIFY `id` int(3) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `kriteria_prioritas`
--
ALTER TABLE `kriteria_prioritas`
  MODIFY `id` int(3) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `nilai_pasang`
--
ALTER TABLE `nilai_pasang`
  MODIFY `id` int(3) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `nilai_prioritas`
--
ALTER TABLE `nilai_prioritas`
  MODIFY `id` int(3) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `peserta`
--
ALTER TABLE `peserta`
  MODIFY `id` int(3) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `subkriteria`
--
ALTER TABLE `subkriteria`
  MODIFY `id` int(3) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(3) NOT NULL AUTO_INCREMENT;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;