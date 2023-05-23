-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: localhost:8111
-- Generation Time: May 23, 2023 at 03:38 PM
-- Server version: 10.4.27-MariaDB
-- PHP Version: 8.2.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `perpustakaan`
--

-- --------------------------------------------------------

--
-- Table structure for table `buku`
--

CREATE TABLE `buku` (
  `kodeBuku` char(5) NOT NULL,
  `judul` varchar(50) NOT NULL,
  `penulis` varchar(50) NOT NULL,
  `penerbit` varchar(50) NOT NULL,
  `tahunTerbit` char(4) NOT NULL,
  `jumlahHalaman` char(10) NOT NULL,
  `kategori` varchar(50) NOT NULL,
  `sampul` text NOT NULL,
  `stok` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `buku`
--

INSERT INTO `buku` (`kodeBuku`, `judul`, `penulis`, `penerbit`, `tahunTerbit`, `jumlahHalaman`, `kategori`, `sampul`, `stok`) VALUES
('12B', 'The Album', 'Teddy', 'YG', '2020', '100', 'Music', 'ec40afb993e18d035bee50c143f5dfd4-adse2023-e4020ff8-e0ad-4f98-8cab-bcc9e9df6146.jpg', 0),
('13B', 'The Album', 'Teddy', 'YG', '2020', '100', 'Fiksi', '68f488c4c00c8a90d10515d9506e3721-vbg.png', 0),
('14B', 'Hujan', 'Tere Liye', 'Pustaka buku', '2017', '250', 'Fiksi', '19e7677e9406dc1b803da737285c7990-2979676_5048cb58-12ec-471a-807f-d3a6859eb9ac.png', 0),
('15B', 'Meteor', 'Tere Liye', 'Pustaka buku', '2015', '350', 'Fiksi', 'be97df59e9fc6239b184492034c49540-49_20191121_WhatsApp_Image_2019-11-08_at_18.35.32.jpeg', 0),
('18B', 'Meteor', 'Tere Liye', 'Pustaka buku', '2017', '300', 'Music', '', 0);

-- --------------------------------------------------------

--
-- Table structure for table `mahasiswa`
--

CREATE TABLE `mahasiswa` (
  `npm` varchar(20) NOT NULL,
  `namaMahasiswa` varchar(100) NOT NULL,
  `jenisKelamin` varchar(20) NOT NULL,
  `jurusan` varchar(50) NOT NULL,
  `noTelepon` varchar(13) NOT NULL,
  `alamat` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `mahasiswa`
--

INSERT INTO `mahasiswa` (`npm`, `namaMahasiswa`, `jenisKelamin`, `jurusan`, `noTelepon`, `alamat`) VALUES
('21081010048', 'Sabrina Putri Aulia', 'Perempuan', 'Informatika', '08999813032', 'SURABAYA'),
('21081010191', 'Najwa Laila', 'Perempuan', 'Informatika', '08988198423', 'Nganjuk');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `buku`
--
ALTER TABLE `buku`
  ADD PRIMARY KEY (`kodeBuku`);

--
-- Indexes for table `mahasiswa`
--
ALTER TABLE `mahasiswa`
  ADD PRIMARY KEY (`npm`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
