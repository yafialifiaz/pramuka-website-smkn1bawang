-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 21, 2024 at 09:12 AM
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
-- Database: `pramuka_web`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `idadmin` int(15) NOT NULL,
  `username` varchar(225) NOT NULL,
  `password` varchar(225) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`idadmin`, `username`, `password`) VALUES
(1, 'admin', '123'),
(2, 'yafi', 'admin');

-- --------------------------------------------------------

--
-- Table structure for table `tbberita`
--

CREATE TABLE `tbberita` (
  `id` int(11) NOT NULL,
  `judulberita` varchar(50) NOT NULL,
  `isiberita` text NOT NULL,
  `tanggal` date NOT NULL,
  `foto` varchar(225) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tbberita`
--

INSERT INTO `tbberita` (`id`, `judulberita`, `isiberita`, `tanggal`, `foto`) VALUES
(4, 'Upacara Pembukaan Kegiatan PPG Tahun 2024', 'Upacara Pembukaan PPG 2024 menandai dimulainya program pendidikan profesi bagi calon guru di seluruh Indonesia. Acara ini dihadiri oleh perwakilan Kementerian Pendidikan, dosen, dan peserta PPG.                                                              Sambutan inspiratif disampaikan untuk memotivasi peserta agar siap mengikuti proses pembelajaran intensif. Penutupan acara diwarnai dengan penyematan pin simbolis sebagai tanda dimulainya perjalanan pendidikan mereka.', '2024-11-18', 'upacarapembukaanPPG.JPG');

-- --------------------------------------------------------

--
-- Table structure for table `tbpendaftaran`
--

CREATE TABLE `tbpendaftaran` (
  `id` int(11) NOT NULL,
  `namapendaftar` varchar(50) NOT NULL,
  `notelp` varchar(15) NOT NULL,
  `kelas` varchar(10) NOT NULL,
  `jeniskelamin` enum('Laki-laki','Perempuan') NOT NULL,
  `alamat` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tbpendaftaran`
--

INSERT INTO `tbpendaftaran` (`id`, `namapendaftar`, `notelp`, `kelas`, `jeniskelamin`, `alamat`) VALUES
(1, 'Zahra', '098765432111123', 'XI RPL', 'Perempuan', 'Depok'),
(2, 'Yafi', '22222222222', 'XI RPL', 'Laki-laki', 'Banjar'),
(3, 'Widiatri', '098765432111123', 'XI RPL', 'Perempuan', 'bANJAR'),
(4, 'Yafi', '22222222222', 'XII AKL', 'Perempuan', 'MAndiraja'),
(5, 'Inez', '0987654321234', 'XII AP', 'Perempuan', 'Kutabanjar'),
(6, 'Yafi', '098765432111123', 'XII AKL', 'Laki-laki', 'BAwang'),
(7, 'Okta', '3333333333', 'XII TE', 'Laki-laki', 'Blambangan'),
(8, 'Putra', '098765432111123', 'XII TE', 'Laki-laki', 'Blambangan'),
(9, 'Putra', '098765432111123', 'XII TE', 'Laki-laki', 'Blambangan'),
(12, 'Migge', '0826735897', 'X PPLG', 'Laki-laki', 'Sigaluh'),
(13, 'Putra', '098765432111123', 'XII TE', 'Laki-laki', 'Bawang'),
(14, 'Okta', '3333333333', 'XII AP', 'Perempuan', 'ijssj'),
(15, 'Widiatri', '3333333333', 'X PM', 'Perempuan', 'Bawang\r\n'),
(16, 'Widiatri', '675432', 'X PM', 'Perempuan', 'Bawang\r\n'),
(18, 'Inez', '098765432', 'XI RPL', 'Perempuan', 'Banjar'),
(19, 'Yafi', '098765432111123', 'XI RPL', 'Laki-laki', 'jxusnxskw'),
(20, 'Wiwin Purwanti', '08123456789', 'XI RPL', 'Perempuan', 'Pucungbedug'),
(21, 'wiwinnn', '082136554461', 'XI RPL', 'Laki-laki', 'banjarnegara'),
(22, 'Yafi Alifia', '08213655446', 'XI RPL', 'Laki-laki', 'Banjarnegara');

-- --------------------------------------------------------

--
-- Table structure for table `tbstruktur`
--

CREATE TABLE `tbstruktur` (
  `id` int(11) NOT NULL,
  `jabatan` varchar(50) NOT NULL,
  `nama` varchar(50) NOT NULL,
  `foto` varchar(225) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tbstruktur`
--

INSERT INTO `tbstruktur` (`id`, `jabatan`, `nama`, `foto`) VALUES
(2, 'Ketan', 'Inez', '1174722894_logo.jpg');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`idadmin`);

--
-- Indexes for table `tbberita`
--
ALTER TABLE `tbberita`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbpendaftaran`
--
ALTER TABLE `tbpendaftaran`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbstruktur`
--
ALTER TABLE `tbstruktur`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `idadmin` int(15) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `tbberita`
--
ALTER TABLE `tbberita`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `tbpendaftaran`
--
ALTER TABLE `tbpendaftaran`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT for table `tbstruktur`
--
ALTER TABLE `tbstruktur`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
