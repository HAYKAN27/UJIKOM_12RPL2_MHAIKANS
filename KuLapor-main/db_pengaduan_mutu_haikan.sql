-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Feb 27, 2026 at 12:46 PM
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
  `nis` varchar(225) NOT NULL,
  `id_kategori` int NOT NULL,
  `lokasi` varchar(225) NOT NULL,
  `ket` varchar(225) NOT NULL,
  `status` enum('menunggu','proses','selesai') NOT NULL DEFAULT 'menunggu',
  `feedback` varchar(225) DEFAULT NULL,
  `tanggal` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `input_aspirasi`
--

INSERT INTO `input_aspirasi` (`id_pelapor`, `nis`, `id_kategori`, `lokasi`, `ket`, `status`, `feedback`, `tanggal`) VALUES
(41, '009', 2, 'RPL 2', 'najus', 'selesai', 'aman', '2026-02-17'),
(42, '009', 2, 'diaid', 'ahashd', 'selesai', 'aman', '2026-02-17'),
(45, '009', 9, 'Ruang guru', 'beberapa fasilitas seperti p', 'selesai', 'aman terkendali ', '2026-02-19'),
(47, '009', 9, 'Lab RPL', 'ucak', 'menunggu', '', '2026-02-25'),
(48, '009', 8, 'iy', 'tai', 'menunggu', '', '2026-02-16');

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
(1, 'Fasilitas '),
(2, 'kebersihan'),
(8, 'Lingkungan '),
(9, 'Sanitasi');

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
(1, 'atmin', '$2y$10$FWc39QVxraaeavL6gUtLUe263qSS80qDLLpn6pJFUeEHFYo2P2Vq6', 'admin', NULL, NULL),
(31, 'Fauzaan ', '$2y$10$IKjJiOnzzwKf3iza.9LXVerw8iZXhBrFaZrm4PjG/AMRjQxJOh6yy', 'siswa', '1111', '12 TKJ'),
(34, 'Falaq', '$2y$10$HK38exJNALC.VIGjdNwWtup5CQN/lhSoQ2ixZsmPmX6heMjrY/LIm', 'siswa', '0089005906', 'XII RPL 2'),
(45, 'RENO', '$2y$10$SKZ/5oYrnZDLts51phqsveHbUjOoK01ms3gecx/z089w1deR0ymke', 'siswa', '007790464', '12 TP 4'),
(47, 'superadmin', 'admin123', 'admin', NULL, NULL),
(48, 'Bayu', '$2y$10$Iyn4SEyk.rotQ3B.M0rR3.QoW/I1JxYbEdp0SarGu6yJ6d114I3SC', 'siswa', '089069686', '12TKJ4'),
(49, 'haykan', '123', 'siswa', '87968945', '12 RPL 2'),
(50, 'rehan', '$2y$10$ag5ZZrsYneImWVtr20Pc0eo8Ym5v89X4anpJkB1G41Osz6xkjY9XS', 'siswa', '0088957547', '12 RPL3'),
(51, 'HAYKEL', '', 'siswa', '08690769', '12 TKJ 2'),
(61, 'deduy', 'password', 'siswa', '009', '12 RPL 1'),
(64, 'MUHAMMAD SUBEL', 'password123', 'siswa', '0896058', '12 TKJ SAMSUNG');

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
  MODIFY `id_pelapor` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=49;

--
-- AUTO_INCREMENT for table `kategori`
--
ALTER TABLE `kategori`
  MODIFY `id_kategori` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=66;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `input_aspirasi`
--
ALTER TABLE `input_aspirasi`
  ADD CONSTRAINT `input_aspirasi_ibfk_1` FOREIGN KEY (`id_kategori`) REFERENCES `kategori` (`id_kategori`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `input_aspirasi_ibfk_2` FOREIGN KEY (`nis`) REFERENCES `user` (`nis`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
