-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Apr 06, 2026 at 06:38 PM
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
-- Database: `db_pengaduan_mutu_haikan`
--

-- --------------------------------------------------------

--
-- Table structure for table `input_aspirasi`
--

CREATE TABLE `input_aspirasi` (
  `id_pelapor` int NOT NULL,
  `nis` varchar(225) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci DEFAULT NULL,
  `id_kategori` int NOT NULL,
  `lokasi` varchar(225) NOT NULL,
  `ket` varchar(225) NOT NULL,
  `status` enum('menunggu','proses','selesai','ditolak') CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL DEFAULT 'menunggu',
  `feedback` varchar(225) DEFAULT NULL,
  `tanggal` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `input_aspirasi`
--

INSERT INTO `input_aspirasi` (`id_pelapor`, `nis`, `id_kategori`, `lokasi`, `ket`, `status`, `feedback`, `tanggal`) VALUES
(58, '0082020', 9, 'Lab Mesin', 'ada kerusakan di berbagai PC ', 'proses', 'Baik lagi Di proses oleh tekniksi MUTU', '2026-03-08'),
(59, '0092020', 8, 'Depan TU ', 'bagus', 'ditolak', 'Buat pengaduan dengan jelas!!', '2026-03-08'),
(60, '0102020', 10, 'Bengkel Mesin', 'Konslet di ruangan mesin ', 'menunggu', NULL, '2026-03-08'),
(61, '007890890', 2, 'WC Lantai 3', 'kurangnya kesadaran siswa untuk memelihara fasilitas sekolah sehingga KOTOR', 'selesai', 'Okei Wc Sudah di bersihkan', '2026-03-08'),
(62, '0092020', 11, '12 RPL 2', 'bangku ,meja,dan fasilitas pendingin yaitu AC tidak berjalan dengan normal tolong diperbaiki ok!', 'menunggu', NULL, '2026-03-09'),
(63, '0092020', 9, 'Hubin', 'gtw', 'menunggu', NULL, '2026-03-10'),
(64, '0082020', 11, 'Halte MUTU', 'ada yang membuat aksi vandalisme di bangku ', 'menunggu', NULL, '2026-03-13'),
(65, '0082020', 11, 'Ruang Guru ', 'Pintu Masuk Rusak', 'menunggu', NULL, '2026-03-30');

-- --------------------------------------------------------

--
-- Table structure for table `kategori`
--

CREATE TABLE `kategori` (
  `id_kategori` int NOT NULL,
  `ket_kategori` varchar(225) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `kategori`
--

INSERT INTO `kategori` (`id_kategori`, `ket_kategori`) VALUES
(2, 'kebersihan'),
(8, 'Lingkungan '),
(9, 'Sanitasi'),
(10, 'Elektronik'),
(11, 'Fasilitas ');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` int NOT NULL,
  `Username` varchar(100) NOT NULL,
  `password` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `role` enum('admin','siswa') NOT NULL DEFAULT 'siswa',
  `nis` varchar(100) DEFAULT NULL,
  `kelas` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `Username`, `password`, `role`, `nis`, `kelas`) VALUES
(72, 'admin', '$2y$10$hrTr98EFI0a4b/trdMKv9etLPhelwbOfKTZ0BVsXAHZAKKpQ.YrC.', 'admin', NULL, NULL),
(74, 'MUHAMMAD HAIKAN SYAHPUTRA', '$2y$10$Td0cO8cTHQJuWn.4KXZZV.tf4XhibSqtEyD9cQ2aSoJ1fHhbty8We', 'siswa', '0082020', '12 RPL 2'),
(75, 'Falaq Annahri', '$2y$10$ZJf.1F1NpgxHlrhMwci/0e2qfiH5UmYY3jEI0G6Hext9wG4QCDd9W', 'siswa', '0092020', '12 RPL 2'),
(76, 'Ahmad Fadli', '$2y$10$yHOODXONnxOaPnWTc5JQReDMVTjmAZv9EUVnms14NXpgXDqzoaiVe', 'siswa', '0102020', '12 TKJ 3'),
(77, 'Malik Nonchlant', '$2y$10$2hK6KEKZOidhbAzqyERJceDYgSMAVbKJBaNHjTpLJ4wPkyaxr5cxC', 'siswa', '007890890', '12 RPL 2'),
(78, 'Rayka Hidayat', '$2y$10$VbxjJH92ezpfNL9.UAROvufR.33/XLY4rBflE5Mafn9ixpMo8rkSm', 'siswa', '70703030', '12 TKJ 1'),
(79, 'Muhammad Fauzaan', '$2y$10$4KFvYxqq1mKncgg1zG7etehb/FB933PD5HmOLx7oYC3Oyce8EkmJu', 'siswa', '0079090', '12 RPL 1');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `input_aspirasi`
--
ALTER TABLE `input_aspirasi`
  ADD PRIMARY KEY (`id_pelapor`),
  ADD KEY `id_kategori` (`id_kategori`),
  ADD KEY `nis` (`nis`) USING BTREE;

--
-- Indexes for table `kategori`
--
ALTER TABLE `kategori`
  ADD PRIMARY KEY (`id_kategori`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`),
  ADD KEY `nis` (`nis`) USING BTREE;

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `input_aspirasi`
--
ALTER TABLE `input_aspirasi`
  MODIFY `id_pelapor` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=66;

--
-- AUTO_INCREMENT for table `kategori`
--
ALTER TABLE `kategori`
  MODIFY `id_kategori` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=80;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `input_aspirasi`
--
ALTER TABLE `input_aspirasi`
  ADD CONSTRAINT `input_aspirasi_ibfk_1` FOREIGN KEY (`id_kategori`) REFERENCES `kategori` (`id_kategori`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `input_aspirasi_ibfk_2` FOREIGN KEY (`nis`) REFERENCES `user` (`nis`) ON DELETE SET NULL ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
