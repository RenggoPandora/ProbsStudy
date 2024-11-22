-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Nov 22, 2024 at 11:03 AM
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
  `id_laporan` varchar(5) NOT NULL,
  `username` varchar(25) NOT NULL,
  `hasil` varchar(255) NOT NULL,
  `tanggal` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

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
-- Table structure for table `soal_eksponensial`
--

CREATE TABLE `soal_eksponensial` (
  `id_soal` varchar(5) NOT NULL,
  `soal` varchar(255) NOT NULL,
  `jawaban1` varchar(255) NOT NULL,
  `jawaban2` varchar(255) NOT NULL,
  `jawaban3` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Table structure for table `soal_frekuensi`
--

CREATE TABLE `soal_frekuensi` (
  `id_soal` varchar(5) NOT NULL,
  `soal` varchar(255) NOT NULL,
  `jawaban` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Table structure for table `soal_poisson`
--

CREATE TABLE `soal_poisson` (
  `id_soal` varchar(5) NOT NULL,
  `soal` varchar(255) NOT NULL,
  `jawaban` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Table structure for table `soal_regresi`
--

CREATE TABLE `soal_regresi` (
  `id_soal` varchar(5) NOT NULL,
  `soal` varchar(255) NOT NULL,
  `jawaban` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Table structure for table `soal_square`
--

CREATE TABLE `soal_square` (
  `id_soal` varchar(5) NOT NULL,
  `soal` varchar(255) NOT NULL,
  `jawaban` varchar(255) NOT NULL
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
