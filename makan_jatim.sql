-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 20, 2025 at 03:02 PM
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
-- Database: `makan_jatim`
--

-- --------------------------------------------------------

--
-- Table structure for table `places`
--

CREATE TABLE `places` (
  `id` int(11) NOT NULL,
  `name` varchar(150) NOT NULL,
  `city` varchar(50) NOT NULL,
  `address` varchar(255) NOT NULL,
  `specialty` varchar(255) NOT NULL,
  `hours` varchar(100) NOT NULL,
  `phone` varchar(50) DEFAULT NULL,
  `image` varchar(500) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `places`
--

INSERT INTO `places` (`id`, `name`, `city`, `address`, `specialty`, `hours`, `phone`, `image`) VALUES
(13, 'Rawon Nguling Restaurant', 'Malang', 'Jl. Zainul Arifin No.62, Kota Malang', 'Rawon daging, empal, sate sapi', '07:00–14:00', '+62 0341324684', 'Foto/depot-rawon-nguling-malang.jpg'),
(14, 'Rawon Kalkulator', 'Surabaya', 'Sentra PKL Tamam Bungkul, Jl. Raya Darmo, Surabaya', 'Rawon daging, empal', '09:00–15:00', '+62 0315661784', 'Foto/rawon-kalkulator.jpg'),
(15, 'Rujak Cingur TVRI', 'Surabaya', 'Jl. Raya Dukuh Kupang No.214, Surabaya', 'Rujak Cingur, Sate', '11:30–17:00', '+62 085962389412', 'Foto/rujak.jpg'),
(16, 'Nasi Pecel 99', 'Madiun', 'Jl. Cokroaminoto No.99, Kota Madiun', 'Nasi Pecel', '05:30–12:00', '+62 082333230597', 'Foto/nasipecel99.jpg'),
(17, 'Gudeg Bu Harman', 'Sidoarjo', 'Jl. Pepelegi Indah No.18, Pepe, Kabupaten Sidoarjo', 'Gudeg, Sate', '07:00–17:30', '+62 081235540033', 'Foto/gudegbuharman.jpg'),
(18, 'Sartika Soto Ayam Lamongan', 'Sidoarjo', 'Jl. Brigjend Katamso No.27, Kabupaten Sidoarjo', 'Soto Ayam, Ayam Goreng', '00:00–24:00', '+62 03177284415', 'Foto/soto_ayam_sartika_3.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `username` varchar(50) DEFAULT NULL,
  `password` varchar(255) DEFAULT NULL,
  `role` enum('admin','user') DEFAULT 'user'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `password`, `role`) VALUES
(1, 'admin1', '$2y$10$089NVFA0hgqCRwd53RZRJORdsAqFkR1Dyu3QEs3L2e9WSbmHYbLTO', 'admin'),
(2, 'Wasa1', '$2y$10$Z57JV3QzRGzhfI2HJPRPOOudNdJX7FIHu.MICXs6wtAQwuXcgNsU.', 'user');

-- --------------------------------------------------------

--
-- Table structure for table `user_sessions`
--

CREATE TABLE `user_sessions` (
  `id` int(11) NOT NULL,
  `user_id` int(11) DEFAULT NULL,
  `last_activity` datetime DEFAULT NULL,
  `is_active` tinyint(1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `user_sessions`
--

INSERT INTO `user_sessions` (`id`, `user_id`, `last_activity`, `is_active`) VALUES
(10, 1, '2025-12-20 20:54:15', 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `places`
--
ALTER TABLE `places`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `username` (`username`);

--
-- Indexes for table `user_sessions`
--
ALTER TABLE `user_sessions`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `unique_user` (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `places`
--
ALTER TABLE `places`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `user_sessions`
--
ALTER TABLE `user_sessions`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `user_sessions`
--
ALTER TABLE `user_sessions`
  ADD CONSTRAINT `user_sessions_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
