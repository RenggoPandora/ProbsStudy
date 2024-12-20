-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Dec 20, 2024 at 06:52 AM
-- Server version: 8.0.30
-- PHP Version: 8.1.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `probsstudy`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `username` varchar(25) NOT NULL,
  `password` varbinary(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`username`, `password`) VALUES
('admin1', 0x24327924313024786a7544646d69362e59533864504c706d30577a6a4f43414430375667477370466d47736835782f58696446395a6f784e7a732e61);

-- --------------------------------------------------------

--
-- Table structure for table `laporan_eksponensial`
--

CREATE TABLE `laporan_eksponensial` (
  `id_laporan` varchar(5) NOT NULL,
  `username` varchar(25) NOT NULL,
  `hasil` varchar(255) NOT NULL,
  `tanggal` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Table structure for table `laporan_frekuensi`
--

CREATE TABLE `laporan_frekuensi` (
  `id_laporan` varchar(5) NOT NULL,
  `username` varchar(25) NOT NULL,
  `hasil` varchar(255) NOT NULL,
  `tanggal` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Table structure for table `laporan_poisson`
--

CREATE TABLE `laporan_poisson` (
  `id_laporan` varchar(5) NOT NULL,
  `username` varchar(25) NOT NULL,
  `hasil` varchar(255) NOT NULL,
  `tanggal` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Table structure for table `laporan_regresi`
--

CREATE TABLE `laporan_regresi` (
  `id_laporan` varchar(10) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `username` varchar(25) NOT NULL,
  `hasil` varchar(255) NOT NULL,
  `tanggal` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `chart_image` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `laporan_regresi`
--

INSERT INTO `laporan_regresi` (`id_laporan`, `username`, `hasil`, `tanggal`, `chart_image`) VALUES
('LRG01', 'renggo', 'y = 1.4x + 0.8', '2024-12-17 06:17:43', 'images/LRG01.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `laporan_square`
--

CREATE TABLE `laporan_square` (
  `id_laporan` varchar(5) NOT NULL,
  `username` varchar(25) NOT NULL,
  `hasil` varchar(255) NOT NULL,
  `tanggal` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Table structure for table `owner`
--

CREATE TABLE `owner` (
  `username` varchar(25) NOT NULL,
  `password` varbinary(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `owner`
--

INSERT INTO `owner` (`username`, `password`) VALUES
('owner1', 0x243279243130244b634a5768675552637430384b6e396631507a6850753474452e4a4d362e68634d7a664971637453615a494e616561316e5756346d);

-- --------------------------------------------------------

--
-- Table structure for table `soal_eksponensial`
--

CREATE TABLE `soal_eksponensial` (
  `id_soal` varchar(5) NOT NULL,
  `soal` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `jawaban1` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `jawaban2` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `jawaban3` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Table structure for table `soal_frekuensi`
--

CREATE TABLE `soal_frekuensi` (
  `id_soal` varchar(5) NOT NULL,
  `soal` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `jawaban` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Table structure for table `soal_poisson`
--

CREATE TABLE `soal_poisson` (
  `id_soal` varchar(5) NOT NULL,
  `soal` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `jawaban` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Table structure for table `soal_regresi`
--

CREATE TABLE `soal_regresi` (
  `id_soal` varchar(5) NOT NULL,
  `soal` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `jawaban` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `soal_regresi`
--

INSERT INTO `soal_regresi` (`id_soal`, `soal`, `jawaban`) VALUES
('SRG01', 'Diberikan data pengamatan berikut tentang jumlah iklan (X) dan jumlah penjualan (Y) dalam satu bulan:\r\nIklan (X): 1, 2, 3, 4, 5\r\nPenjualan (Y): 2, 4, 5, 6, 8 Hitunglah persamaan regresi linear sederhana dari data tersebut!', 'Persamaan regresi sederhana adalah Y = a + bX, di mana:\r\na adalah intercept, dan\r\nb adalah koefisien regresi.\r\nBerdasarkan perhitungan, didapatkan:\r\na = 0.8, b = 1.4 Maka, persamaan regresinya adalah: Y = 0.8 + 1.4X.');

-- --------------------------------------------------------

--
-- Table structure for table `soal_square`
--

CREATE TABLE `soal_square` (
  `id_soal` varchar(5) NOT NULL,
  `soal` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `jawaban` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `username` varchar(25) NOT NULL,
  `email` varchar(50) NOT NULL,
  `password` varbinary(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`username`, `email`, `password`) VALUES
('renggo', 'renggo@gmail.com', 0x243279243130246b4c4b4e43506a393355554d6232523975664e534f2e47717131557a594666464248495238747a64316d4c6f74516d576f31344b53);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`username`);

--
-- Indexes for table `laporan_eksponensial`
--
ALTER TABLE `laporan_eksponensial`
  ADD PRIMARY KEY (`id_laporan`);

--
-- Indexes for table `laporan_frekuensi`
--
ALTER TABLE `laporan_frekuensi`
  ADD PRIMARY KEY (`id_laporan`);

--
-- Indexes for table `laporan_poisson`
--
ALTER TABLE `laporan_poisson`
  ADD PRIMARY KEY (`id_laporan`);

--
-- Indexes for table `laporan_regresi`
--
ALTER TABLE `laporan_regresi`
  ADD PRIMARY KEY (`id_laporan`);

--
-- Indexes for table `laporan_square`
--
ALTER TABLE `laporan_square`
  ADD PRIMARY KEY (`id_laporan`);

--
-- Indexes for table `owner`
--
ALTER TABLE `owner`
  ADD PRIMARY KEY (`username`);

--
-- Indexes for table `soal_eksponensial`
--
ALTER TABLE `soal_eksponensial`
  ADD PRIMARY KEY (`id_soal`);

--
-- Indexes for table `soal_frekuensi`
--
ALTER TABLE `soal_frekuensi`
  ADD PRIMARY KEY (`id_soal`);

--
-- Indexes for table `soal_poisson`
--
ALTER TABLE `soal_poisson`
  ADD PRIMARY KEY (`id_soal`);

--
-- Indexes for table `soal_regresi`
--
ALTER TABLE `soal_regresi`
  ADD PRIMARY KEY (`id_soal`);

--
-- Indexes for table `soal_square`
--
ALTER TABLE `soal_square`
  ADD PRIMARY KEY (`id_soal`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`username`),
  ADD UNIQUE KEY `email` (`email`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
