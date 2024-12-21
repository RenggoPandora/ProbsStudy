-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Dec 21, 2024 at 03:36 AM
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
  `tanggal` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `chart_image` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `laporan_eksponensial`
--

INSERT INTO `laporan_eksponensial` (`id_laporan`, `username`, `hasil`, `tanggal`, `chart_image`) VALUES
('LEK01', 'renggo', '86.5% 1.8% 11.7%', '2024-12-21 10:24:36', 'images/LEK01.jpg'),
('LEK02', 'renggo', '82.0% 13.5% 4.5%', '2024-12-21 10:26:21', 'images/LEK02.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `laporan_frekuensi`
--

CREATE TABLE `laporan_frekuensi` (
  `id_laporan` varchar(5) NOT NULL,
  `username` varchar(25) NOT NULL,
  `hasil` varchar(255) NOT NULL,
  `tanggal` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `chart_image` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `laporan_frekuensi`
--

INSERT INTO `laporan_frekuensi` (`id_laporan`, `username`, `hasil`, `tanggal`, `chart_image`) VALUES
('LFR01', 'renggo', '', '2024-12-21 10:28:39', 'images/LFR01.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `laporan_poisson`
--

CREATE TABLE `laporan_poisson` (
  `id_laporan` varchar(5) NOT NULL,
  `username` varchar(25) NOT NULL,
  `hasil` varchar(255) NOT NULL,
  `tanggal` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `chart_image` varchar(255) DEFAULT NULL
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
('LRG01', 'renggo', 'y = 1.4x + 0.8', '2024-12-20 08:52:29', 'images/LRG01.jpg'),
('LRG02', 'renggo', 'y = 1.4x + 0.8', '2024-12-20 18:34:27', 'images/LRG02.jpg'),
('LRG03', 'renggo', 'y = 5x + 40', '2024-12-20 23:26:57', 'images/LRG03.jpg'),
('LRG04', 'renggo', 'y = 1.4x + 0.8', '2024-12-20 23:29:33', 'images/LRG04.jpg'),
('LRG05', 'renggo', 'y = 5x + 55', '2024-12-20 23:31:10', 'images/LRG05.jpg'),
('LRG06', 'renggo', 'y = 5x + 5', '2024-12-20 23:41:05', 'images/LRG06.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `laporan_square`
--

CREATE TABLE `laporan_square` (
  `id_laporan` varchar(5) NOT NULL,
  `username` varchar(25) NOT NULL,
  `hasil` varchar(255) NOT NULL,
  `tanggal` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `chart_image` varchar(255) DEFAULT NULL
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

--
-- Dumping data for table `soal_frekuensi`
--

INSERT INTO `soal_frekuensi` (`id_soal`, `soal`, `jawaban`) VALUES
('SFR01', 'Data hasil ujian akhir Mata Kuliah Statistika dari 60 orang mahasiswa:\r\n23, 60, 79, 32, 57, 74, 52, 70, 82, 36,\r\n80, 77, 81, 95, 41, 85, 67, 65, 61, 75,\r\n52, 62, 70, 78, 85, 83, 98, 88, 64, 90,\r\n41, 71, 83, 54, 64, 72, 94, 45, 84, 63,\r\n60, 78, 89, 79, 86, 87, 85, 85, 95, 94,\r\n34, 67, 17, 82, 69, 74, 63, 83, 85, 61.', '1. Urutkan Data\r\nUrutkan data dari nilai terkecil ke nilai terbesar:\r\n10, 32, 43, 55, 62, 67, 72, 76, 79, 81, 84, 89, dst.\r\n\r\n2. Hitung Jangkauan (R)\r\n𝑅=Data max−Data min\r\n𝑅=98−10\r\n=88\r\n\r\n3. Tentukan Banyak Kelas (k)\r\nMenggunakan rumus:\r\n𝑘=1+3,3log⁡𝑛\r\n𝑘=1+3,3log60=6,8≈7\r\n(Catatan: Pembulatan selalu ke atas.)\r\n\r\n4. Hitung Lebar Interval Kelas (i)\r\nMenggunakan rumus:\r\n𝑖=Jangkauan\r\nBanyak Kelas\r\ni=88/7\r\n=12,5\r\n≈13(Catatan: Pembulatan selalu ke atas.)\r\n\r\nTabel Distribusi Frekuensi\r\nNilai	Frekuensi (f)\r\n10 - 23	3\r\n36 - 48	5\r\n49 - 61	8\r\n62 - 74	14\r\n75 - 87	20\r\n88 - 100	'),
('SFR02', 'Dari hasil pengukuran diameter pipa-pipa yang dibuat oleh sebuah mesin (dalam mm terdekat), diperoleh data sebagai berikut:\r\n78, 72, 74, 79, 74, 71, 75, 74, 72, 68\r\n72, 73, 72, 74, 75, 74, 73, 74, 65, 72\r\n66, 75, 80, 69, 82, 73, 74, 72, 79, 71\r\n70, 75, 71, 70, 70, 70, 75, 76, 77, 67', 'a. Urutan data:\r\n65, 66, 67, 68, 69, 70, 70, 70, 70, 71\r\n71, 71, 72, 72, 72, 72, 72, 72, 73, 73\r\n73, 74, 74, 74, 74, 74, 74, 75, 75, 75\r\n75, 76, 77, 78, 79, 79, 80, 82\r\n\r\nb. Jangkauan (R) = 82 − 65 = 17\r\n\r\nc. Banyaknya kelas (k) adalah\r\nk = 1 + 3.3 log 40\r\n= 1 + 5.3 = 6.3 ≈ 6\r\n\r\nd. Panjang interval kelas (i) adalah\r\ni = 17/6 = 2.8 ≈ 3\r\n\r\ne. Batas kelas pertama adalah 65 (data terkecil)\r\n\r\nf. Tabel:\r\n\r\nDiameter	Turus	Frekuensi\r\n65 – 67	III	3\r\n68 – 70	IIIII I	6\r\n71 – 73	IIIII IIIII II	12\r\n74 – 76	IIIII IIIII III	13\r\n77 – 79	III	4\r\n80 – 82	II	2\r\nJumlah: 40');

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
('SRG01', 'seorang peneliti mencatat data hubungan antara jumlah produk terjual (x) dan pendapatan (y) sebagai beriku. nilai x1-x5 berturut turut bernilai 1,3,5,7,9. y1-y5 berturut turut bernilai 10,20,30,40,50. Hitung persamaan regresi linear sederhana untuk x=6', 'y= 5x + 5'),
('SRG02', 'Seorang peneliti mencatat data hubungan antara suhu (x) dan waktu memasak (y) sebagai berikut. x1-x5 berturut turut 1,2,3,4,5. y1-y5 berturtu turut bernilai 10,20,30,40,50. Hitung persamaan regresi linear seedrhana untuk x=7', 'y=10x'),
('SRG03', 'Seorang peneliti mencatat data hubungan antara panjang kayu (x) dan berat kayu (y) sebagai berikut.x1-x5 berturut turut 2,4,6,8,10. y1-y5 berturut-turut bernilai 1,2,3,4,5,. hitug persamaan regresi linear seerhana untuk x= 12', 'y = 0.5x');

-- --------------------------------------------------------

--
-- Table structure for table `soal_square`
--

CREATE TABLE `soal_square` (
  `id_soal` varchar(5) NOT NULL,
  `soal` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `jawaban` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `soal_square`
--

INSERT INTO `soal_square` (`id_soal`, `soal`, `jawaban`) VALUES
('SSQ01', 'Sebuah penelitian ingin menguji apakah ada hubungan antara preferensi pendidikan (SD, SMP, SMA) dan usia responden. Data dari 300 responden direkam, di mana 120 responden berusia 20-30 tahun memilih SD, 100 responden berusia 31-40 tahun memilih SMP, dan 80 responden berusia 41-50 tahun memilih SMA.\r\nLakukan uji Chi Square untuk menguji signifikansi hubungan antara preferensi pendidikan dan usia responden dengan tingkat kepercayaan 95%.\r\n', 'Berdasarkan hasil analisis Chi Square, terdapat korelasi yang signifikan antara preferensi pendidikan dan usia responden (χ² = 43.05, df = 4, p < 0.05). Ini menunjukkan bahwa preferensi pendidikan bervariasi secara substansial berdasarkan kelompok usia responden.'),
('SSQ02', 'Sebuah survei dilakukan terhadap 200 orang untuk menguji hubungan antara jenis kelamin dan preferensi film (aksi, komedi, drama). \r\nHasilnya adalah 80 responden pria memilih film aksi, 50 responden pria memilih film komedi, 70 responden wanita memilih film aksi, 40 responden wanita memilih film komedi, dan sisanya memilih film drama. \r\nLakukan uji Chi Square untuk mengetahui apakah ada hubungan antara jenis kelamin dan preferensi film dengan tingkat kepercayaan 95%.', 'Analisis Chi Square menunjukkan adanya asosiasi yang signifikan antara jenis kelamin dan preferensi film (χ² = 26.91, df = 2, p < 0.05). Dengan demikian, terdapat perbedaan yang nyata dalam preferensi film antara pria dan wanita.'),
('SSQ03', 'Sebuah penelitian dilakukan untuk mengetahui apakah terdapat hubungan antara tingkat pendidikan (SD, SMP, SMA) dan tingkat pendapatan (rendah, sedang, tinggi) di suatu wilayah. \r\nDengan mengumpulkan data responden berdasarkan tingkat pendidikan dan pendapatan mereka, uji Chi Square dapat digunakan untuk menilai apakah terdapat hubungan yang signifikan antara kedua variabel tersebut.\r\n', 'Dari hasil uji Chi Square, terlihat bahwa terdapat keterkaitan yang signifikan antara tingkat pendidikan dan tingkat pendapatan (χ² = 36.74, df = 4, p < 0.05). Ini menandakan bahwa tingkat pendidikan berpengaruh pada tingkat pendapatan di wilayah tersebut.');

-- --------------------------------------------------------

--
-- Table structure for table `umpanbalik`
--

CREATE TABLE `umpanbalik` (
  `id` int NOT NULL,
  `umpan_balik` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `status` varchar(25) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `umpanbalik`
--

INSERT INTO `umpanbalik` (`id`, `umpan_balik`, `status`) VALUES
(1, 'bagus', 'Selesai'),
(2, 'Mantap', 'Diproses');

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
-- Indexes for table `umpanbalik`
--
ALTER TABLE `umpanbalik`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`username`),
  ADD UNIQUE KEY `email` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `umpanbalik`
--
ALTER TABLE `umpanbalik`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
