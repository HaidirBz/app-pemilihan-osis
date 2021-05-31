-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 31, 2021 at 03:51 PM
-- Server version: 10.4.17-MariaDB
-- PHP Version: 7.4.15

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `dbpemilihanosis`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id_admin` int(11) NOT NULL,
  `kode_admin` varchar(15) NOT NULL,
  `nama_admin` varchar(50) NOT NULL,
  `jk` enum('L','P') NOT NULL,
  `alamat` varchar(132) NOT NULL,
  `no_hp` varchar(13) NOT NULL,
  `email` varchar(50) NOT NULL,
  `foto` varchar(100) NOT NULL,
  `status` varchar(10) NOT NULL,
  `password` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id_admin`, `kode_admin`, `nama_admin`, `jk`, `alamat`, `no_hp`, `email`, `foto`, `status`, `password`) VALUES
(16, '12345', 'Siti Aina', 'P', 'JL.AMD V RT/RW:001/07 KEL. SAWAH KEC. CIPUTAT KOTA TANGSEL1', '0895320521571', 'Ina@gmail.com', 'ebd6c7ef5525f6b7f8b04ded4b1b4d03.jpg', 'Aktif', '$2y$10$uV9Y2uwBavuP1RBlNw2xKeljr3ZK67qfT53iGFa33sPoNBy6t5r86'),
(18, '12346', 'Haidir', 'L', 'JL.KESADARAN PD BENDA PAMULANG', '0895320521', 'haidir.bz.09@gmail.com', 'c5510b8db5734f8a1a260a305fbc24bc.jpg', 'Aktif', '$2y$10$66pu5jz0UDR42CI86w6DVu8yi0XFg1dStR8p2Kv3aBY/pwWiJDUb6');

-- --------------------------------------------------------

--
-- Table structure for table `kandidat`
--

CREATE TABLE `kandidat` (
  `id_kandidat` int(11) NOT NULL,
  `no_urut` varchar(2) NOT NULL,
  `nama_kandidat` varchar(50) NOT NULL,
  `nama_wakil_kandidat` varchar(50) NOT NULL,
  `foto` varchar(100) NOT NULL,
  `slogan` varchar(100) NOT NULL,
  `visi` varchar(100) NOT NULL,
  `misi` varchar(100) NOT NULL,
  `masa_jabatan` varchar(10) NOT NULL,
  `status` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `kandidat`
--

INSERT INTO `kandidat` (`id_kandidat`, `no_urut`, `nama_kandidat`, `nama_wakil_kandidat`, `foto`, `slogan`, `visi`, `misi`, `masa_jabatan`, `status`) VALUES
(68, '1', 'das', 'sda', '7ad0f6618a6b415db252275b18bbf8f5.jpg', 'ads', '<b>Kandidat Osis</b><br>Masukan Visi Ketua dan Wakil Kandidat Osis', '<b>Kandidat Osis</b><br>Masukan Misi Ketua dan Wakil Kandidat Osis', 'sda', 'Berjalan'),
(69, '2', 'das', 'asd', '0cd7ab9829fcd1a65ddcefd3a10d4f1e.jpg', 'ads', '<b>Kandidat Osis</b><br>Masukan Visi Ketua dan Wakil Kandidat Osis', '<b>Kandidat Osis</b><br>Masukan Misi Ketua dan Wakil Kandidat Osis', 'ads', 'Berjalan');

-- --------------------------------------------------------

--
-- Table structure for table `pemilih`
--

CREATE TABLE `pemilih` (
  `id_pemilih` int(11) NOT NULL,
  `nis` varchar(10) NOT NULL,
  `kelas` varchar(3) NOT NULL,
  `jurusan` varchar(32) NOT NULL,
  `nama_pemilih` varchar(50) NOT NULL,
  `jk` enum('L','P') NOT NULL,
  `status` varchar(10) NOT NULL,
  `foto` varchar(100) NOT NULL,
  `tgl_vot` date NOT NULL,
  `tahun_angkatan` varchar(10) NOT NULL,
  `password` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `voting`
--

CREATE TABLE `voting` (
  `id_voting` int(11) NOT NULL,
  `id_admin` int(11) NOT NULL,
  `id_kandidat` int(11) NOT NULL,
  `id_pemilih` int(11) NOT NULL,
  `tgl_vot` date NOT NULL,
  `voting` varchar(3) NOT NULL,
  `status` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id_admin`),
  ADD UNIQUE KEY `kode_admin` (`kode_admin`);

--
-- Indexes for table `kandidat`
--
ALTER TABLE `kandidat`
  ADD PRIMARY KEY (`id_kandidat`);

--
-- Indexes for table `pemilih`
--
ALTER TABLE `pemilih`
  ADD PRIMARY KEY (`id_pemilih`);

--
-- Indexes for table `voting`
--
ALTER TABLE `voting`
  ADD KEY `id_voting` (`id_voting`),
  ADD KEY `id_admin` (`id_admin`),
  ADD KEY `id_kandidat` (`id_kandidat`),
  ADD KEY `id_pemilih` (`id_pemilih`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id_admin` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=44;

--
-- AUTO_INCREMENT for table `kandidat`
--
ALTER TABLE `kandidat`
  MODIFY `id_kandidat` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=70;

--
-- AUTO_INCREMENT for table `pemilih`
--
ALTER TABLE `pemilih`
  MODIFY `id_pemilih` int(11) NOT NULL AUTO_INCREMENT;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `voting`
--
ALTER TABLE `voting`
  ADD CONSTRAINT `voting_ibfk_1` FOREIGN KEY (`id_admin`) REFERENCES `admin` (`id_admin`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `voting_ibfk_2` FOREIGN KEY (`id_kandidat`) REFERENCES `kandidat` (`id_kandidat`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `voting_ibfk_3` FOREIGN KEY (`id_pemilih`) REFERENCES `pemilih` (`id_pemilih`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
