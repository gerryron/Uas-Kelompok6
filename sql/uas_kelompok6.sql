-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 09, 2021 at 01:12 PM
-- Server version: 10.4.18-MariaDB
-- PHP Version: 8.0.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `uas_kelompok6`
--
CREATE DATABASE IF NOT EXISTS `uas_kelompok6` DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci;
USE `uas_kelompok6`;

-- --------------------------------------------------------

--
-- Table structure for table `faskes`
--

CREATE TABLE IF NOT EXISTS `faskes` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_wilayah` int(11) NOT NULL,
  `nama_faskes` varchar(100) NOT NULL,
  `jenis_faskes` varchar(50) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `faskes`
--

INSERT INTO `faskes` (`id`, `id_wilayah`, `nama_faskes`, `jenis_faskes`) VALUES
(1, 2, 'Sari Asih', 'RSUD'),
(2, 4, 'Omni', 'RSUD'),
(3, 5, 'Harapan Kita', 'Puskesmas');

-- --------------------------------------------------------

--
-- Table structure for table `pasien`
--

CREATE TABLE IF NOT EXISTS `pasien` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `provinsi` varchar(100) NOT NULL,
  `kota` varchar(100) NOT NULL,
  `kecamatan` varchar(100) NOT NULL,
  `jenis_faskes` varchar(100) NOT NULL,
  `faskes` varchar(100) NOT NULL,
  `nik` char(16) NOT NULL,
  `nama` varchar(150) NOT NULL,
  `jenis_kelamin` varchar(10) NOT NULL,
  `umur` smallint(6) NOT NULL,
  `tanggal_lahir` date NOT NULL,
  `nomer_hp` varchar(15) NOT NULL,
  `alamat` varchar(255) DEFAULT NULL,
  `password` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `pasien`
--

INSERT INTO `pasien` (`id`, `provinsi`, `kota`, `kecamatan`, `jenis_faskes`, `faskes`, `nik`, `nama`, `jenis_kelamin`, `umur`, `tanggal_lahir`, `nomer_hp`, `alamat`, `password`) VALUES
(1, 'provinsi banten', 'Kota Tangerang', 'Serpong Utara', 'puskesmas', 'Harapan Kita', '12', '12', 'Laki laki', 16, '2004-02-10', '081213301956', '', '$2y$10$mpJDYqbrlXyL6m/eIP6pQOIKy7LlEao4P8JGiHgUtie7Bu5kQ8S1G'),
(2, 'provinsi banten', 'Kota Tangerang', 'Serpong Utara', 'rsud', 'Sari Asih', '36781294123', 'Gebbyron', 'Perempuan', 19, '2021-04-05', '081213301958', 'Sangiang', '$2y$10$zr2YFcyMDKoNwu5rk.meVuTt50USQJDRdKrhOXJnJ.7TSrtPZMqxS');

-- --------------------------------------------------------

--
-- Table structure for table `wilayah`
--

CREATE TABLE IF NOT EXISTS `wilayah` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `level` smallint(6) NOT NULL,
  `nama_wilayah` varchar(100) NOT NULL,
  `parent_id` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `wilayah`
--

INSERT INTO `wilayah` (`id`, `level`, `nama_wilayah`, `parent_id`) VALUES
(1, 1, 'provinsi banten', NULL),
(3, 2, 'Kota Tangerang', 1),
(4, 2, 'Tangerang Selatan', 1),
(5, 3, 'Serpong Utara', 4),
(6, 1, 'Jawa Tengah', NULL),
(7, 2, 'Temanggung', 6);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
