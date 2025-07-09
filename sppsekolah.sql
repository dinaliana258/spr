-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 15, 2025 at 01:06 PM
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
-- Database: `sppsekolah`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `idadmin` int(5) NOT NULL,
  `username` varchar(20) DEFAULT NULL,
  `password` varchar(200) DEFAULT NULL,
  `namalengkap` varchar(40) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`idadmin`, `username`, `password`, `namalengkap`) VALUES
(1, 'admin', 'd033e22ae348aeb5660fc2140aec35850c4da997', 'ATMA PRASAJA'),
(6, 'admin', '7b2e9f54cdff413fcde01f330af6896c3cd7e6cd', 'Dina Liana');

-- --------------------------------------------------------

--
-- Table structure for table `guru`
--

CREATE TABLE `guru` (
  `idguru` int(5) NOT NULL,
  `namaguru` varchar(40) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `guru`
--

INSERT INTO `guru` (`idguru`, `namaguru`) VALUES
(1, 'RUMAH TANGGA'),
(2, 'PABRIK INDUSTRI'),
(3, 'JASA USAHA'),
(4, 'MINI MARKET'),
(5, 'SUPERMARKET'),
(44, 'PERKANTORAN'),
(46, 'DEALER MOTOR/MOBIL'),
(47, 'PEDAGANG IVENT INSIDENTIAL'),
(48, 'PEDAGANG KAKI LIMA'),
(49, 'EVENT ORGANIZER'),
(50, 'PERKANTORAN DAN SEKOLAH'),
(51, 'RESTORAN/RUMAH MAKAN'),
(52, 'HOTEL/LOSMEN/PENGINAPAN'),
(53, 'OBYEK PARIWISATA'),
(54, 'PEDAGANG KiOS/TOKO'),
(55, 'RUMAH SAKIT'),
(56, 'PERBENGKELAN PERTUKANGAN'),
(58, 'ASRAMA'),
(59, 'WARUNG MAKAN');

-- --------------------------------------------------------

--
-- Table structure for table `siswa`
--

CREATE TABLE `siswa` (
  `idsiswa` int(10) NOT NULL,
  `nis` varchar(10) DEFAULT NULL,
  `namasiswa` varchar(40) DEFAULT NULL,
  `kelas` varchar(50) NOT NULL,
  `tahunajaran` varchar(10) DEFAULT NULL,
  `biaya` int(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `siswa`
--

INSERT INTO `siswa` (`idsiswa`, `nis`, `namasiswa`, `kelas`, `tahunajaran`, `biaya`) VALUES
(48, '12', '182828', 'Asrama Mahasiswa Blok A', '2024', 250000),
(49, '12', '182828', 'Krandegan RT5/RW5', '2024', 250000),
(50, '100', '5000', 'Laundry Express A', '2025', 250000);

-- --------------------------------------------------------

--
-- Table structure for table `spp`
--

CREATE TABLE `spp` (
  `idspp` int(5) NOT NULL,
  `idsiswa` int(10) DEFAULT NULL,
  `jatuhtempo` date DEFAULT NULL,
  `bulan` varchar(20) DEFAULT NULL,
  `nobayar` varchar(10) DEFAULT NULL,
  `tglbayar` date DEFAULT NULL,
  `jumlah` int(20) DEFAULT NULL,
  `ket` varchar(20) DEFAULT NULL,
  `idadmin` int(5) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `spp`
--

INSERT INTO `spp` (`idspp`, `idsiswa`, `jatuhtempo`, `bulan`, `nobayar`, `tglbayar`, `jumlah`, `ket`, `idadmin`) VALUES
(289, 48, '2025-10-10', 'Oktober 2025', '2506080000', '2025-06-08', 250000, 'LUNAS', 1),
(290, 48, '2025-11-10', 'November 2025', NULL, NULL, 250000, NULL, NULL),
(291, 48, '2025-12-10', 'Desember 2025', NULL, NULL, 250000, NULL, NULL),
(292, 48, '2026-01-10', 'Januari 2026', NULL, NULL, 250000, NULL, NULL),
(293, 48, '2026-02-10', 'Februari 2026', NULL, NULL, 250000, NULL, NULL),
(294, 48, '2026-03-10', 'Maret 2026', NULL, NULL, 250000, NULL, NULL),
(295, 48, '2026-04-10', 'April 2026', NULL, NULL, 250000, NULL, NULL),
(296, 48, '2026-05-10', 'Mei 2026', NULL, NULL, 250000, NULL, NULL),
(297, 48, '2026-06-10', 'Juni 2026', NULL, NULL, 250000, NULL, NULL),
(298, 48, '2026-07-10', 'Juli 2026', NULL, NULL, 250000, NULL, NULL),
(299, 48, '2026-08-10', 'Agustus 2026', NULL, NULL, 250000, NULL, NULL),
(300, 48, '2026-09-10', 'September 2026', NULL, NULL, 250000, NULL, NULL),
(301, 49, '2025-10-10', 'Oktober 2025', NULL, NULL, 250000, NULL, NULL),
(302, 49, '2025-11-10', 'November 2025', NULL, NULL, 250000, NULL, NULL),
(303, 49, '2025-12-10', 'Desember 2025', NULL, NULL, 250000, NULL, NULL),
(304, 49, '2026-01-10', 'Januari 2026', NULL, NULL, 250000, NULL, NULL),
(305, 49, '2026-02-10', 'Februari 2026', NULL, NULL, 250000, NULL, NULL),
(306, 49, '2026-03-10', 'Maret 2026', NULL, NULL, 250000, NULL, NULL),
(307, 49, '2026-04-10', 'April 2026', NULL, NULL, 250000, NULL, NULL),
(308, 49, '2026-05-10', 'Mei 2026', NULL, NULL, 250000, NULL, NULL),
(309, 49, '2026-06-10', 'Juni 2026', NULL, NULL, 250000, NULL, NULL),
(310, 49, '2026-07-10', 'Juli 2026', NULL, NULL, 250000, NULL, NULL),
(311, 49, '2026-08-10', 'Agustus 2026', NULL, NULL, 250000, NULL, NULL),
(312, 49, '2026-09-10', 'September 2026', NULL, NULL, 250000, NULL, NULL),
(313, 50, '2025-10-10', 'Oktober 2025', NULL, NULL, 250000, NULL, NULL),
(314, 50, '2025-11-10', 'November 2025', NULL, NULL, 250000, NULL, NULL),
(315, 50, '2025-12-10', 'Desember 2025', NULL, NULL, 250000, NULL, NULL),
(316, 50, '2026-01-10', 'Januari 2026', NULL, NULL, 250000, NULL, NULL),
(317, 50, '2026-02-10', 'Februari 2026', NULL, NULL, 250000, NULL, NULL),
(318, 50, '2026-03-10', 'Maret 2026', NULL, NULL, 250000, NULL, NULL),
(319, 50, '2026-04-10', 'April 2026', NULL, NULL, 250000, NULL, NULL),
(320, 50, '2026-05-10', 'Mei 2026', NULL, NULL, 250000, NULL, NULL),
(321, 50, '2026-06-10', 'Juni 2026', NULL, NULL, 250000, NULL, NULL),
(322, 50, '2026-07-10', 'Juli 2026', NULL, NULL, 250000, NULL, NULL),
(323, 50, '2026-08-10', 'Agustus 2026', NULL, NULL, 250000, NULL, NULL),
(324, 50, '2026-09-10', 'September 2026', NULL, NULL, 250000, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `walikelas`
--

CREATE TABLE `walikelas` (
  `kelas` varchar(50) NOT NULL,
  `idguru` int(5) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `walikelas`
--

INSERT INTO `walikelas` (`kelas`, `idguru`) VALUES
('Desa Krandegan RT 01/RW 01', 1),
('Desa Krandegan RT 02/RW 01', 1),
('Krandegan RT5/RW5', 1),
('Pabrik Baja A', 2),
('Pabrik Tekstil B', 2),
('Laundry Express A', 3),
('Salon Cantika B', 3),
('Mini Market Indah', 4),
('Mini Market Makmur', 4),
('Supermarket Sejahtera', 5),
('Supermarket Sentosa', 5),
('Kantor Hukum Rama', 44),
('Kantor Notaris Adi', 44),
('Dealer Yamaha Satria', 46),
('Pedagang Event Car Free Day', 47),
('Pedagang Event Pasar Malam', 47),
('PKL Kuliner Alun-alun', 48),
('PKL Perabotan Samping Pasar', 48),
('EO Konser Musik', 49),
('EO Wedding Meilia', 49),
('Kantor Desa Gumiwang', 50),
('Sekolah TK Pertiwi', 50),
('E', 51),
('RM Padang Permai', 51),
('RM Sederhana', 51),
('Hotel Melati 2', 52),
('Losmen Amanah', 52),
('Wisata Alam Curug', 53),
('Wisata Pemandian Air Panas', 53),
('Kios Sembako Bu Darmi', 54),
('Toko Elektronik Jaya', 54),
('Klinik Pratama Sehat', 55),
('RSUD Kranggan', 55),
('Bengkel Motor Wahyu', 56),
('Tukang Las Mandiri', 56),
('Asrama Mahasiswa Blok A', 58),
('Warung Bakso Bu Retno', 59),
('Warung Soto Pak Kumis', 59);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`idadmin`);

--
-- Indexes for table `guru`
--
ALTER TABLE `guru`
  ADD PRIMARY KEY (`idguru`);

--
-- Indexes for table `siswa`
--
ALTER TABLE `siswa`
  ADD PRIMARY KEY (`idsiswa`),
  ADD KEY `fk_kelas` (`kelas`);

--
-- Indexes for table `spp`
--
ALTER TABLE `spp`
  ADD PRIMARY KEY (`idspp`),
  ADD KEY `fk_admin` (`idadmin`),
  ADD KEY `fk_siswa` (`idsiswa`);

--
-- Indexes for table `walikelas`
--
ALTER TABLE `walikelas`
  ADD PRIMARY KEY (`kelas`),
  ADD KEY `fk_guru` (`idguru`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `idadmin` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `guru`
--
ALTER TABLE `guru`
  MODIFY `idguru` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=61;

--
-- AUTO_INCREMENT for table `siswa`
--
ALTER TABLE `siswa`
  MODIFY `idsiswa` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=51;

--
-- AUTO_INCREMENT for table `spp`
--
ALTER TABLE `spp`
  MODIFY `idspp` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=325;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `siswa`
--
ALTER TABLE `siswa`
  ADD CONSTRAINT `fk_kelas` FOREIGN KEY (`kelas`) REFERENCES `walikelas` (`kelas`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `spp`
--
ALTER TABLE `spp`
  ADD CONSTRAINT `fk_admin` FOREIGN KEY (`idadmin`) REFERENCES `admin` (`idadmin`) ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_siswa` FOREIGN KEY (`idsiswa`) REFERENCES `siswa` (`idsiswa`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `walikelas`
--
ALTER TABLE `walikelas`
  ADD CONSTRAINT `fk_guru` FOREIGN KEY (`idguru`) REFERENCES `guru` (`idguru`) ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
