-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Jun 06, 2022 at 05:20 PM
-- Server version: 5.7.33
-- PHP Version: 8.0.17

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_test`
--

-- --------------------------------------------------------

--
-- Table structure for table `tb_merk`
--

CREATE TABLE `tb_merk` (
  `merk_id` int(11) NOT NULL,
  `merk_nama` varchar(25) NOT NULL,
  `merk_gambar` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `tb_mobil`
--

CREATE TABLE `tb_mobil` (
  `mobil_id` int(11) NOT NULL,
  `mobil_tahun` int(4) NOT NULL,
  `mobil_merk` int(11) NOT NULL,
  `mobil_type` enum('SUV','MPV','HatchBack','Sedan','Pickup') NOT NULL,
  `mobil_transmisi` enum('Manual','Matic') NOT NULL,
  `mobil_warna` varchar(25) NOT NULL,
  `mobil_bahanbakar` enum('Bensin','Solar') NOT NULL,
  `mobil_jarak` varchar(25) NOT NULL,
  `mobil_kapmesin` varchar(20) NOT NULL,
  `mobil_nama` varchar(35) NOT NULL,
  `mobil_deskripsi` varchar(50) DEFAULT NULL,
  `mobil_harga` int(15) NOT NULL,
  `mobil_diskon` int(15) DEFAULT NULL,
  `mobil_tawar` int(15) DEFAULT NULL,
  `mobil_status` enum('Tersedia','Booking','Terjual') NOT NULL DEFAULT 'Tersedia'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `tb_mobil_gambar`
--

CREATE TABLE `tb_mobil_gambar` (
  `mg_id` int(11) NOT NULL,
  `mg_filename` varchar(100) NOT NULL,
  `mg_mobil` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `tb_tema`
--

CREATE TABLE `tb_tema` (
  `tema_id` int(11) NOT NULL,
  `tema_nama` varchar(15) NOT NULL,
  `tema_filename` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf32;

--
-- Dumping data for table `tb_tema`
--

INSERT INTO `tb_tema` (`tema_id`, `tema_nama`, `tema_filename`) VALUES
(1, 'Favicon', 'favicon.svg'),
(2, 'Logo', 'logo.svg'),
(3, 'Banner', 'banner.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `tb_user`
--

CREATE TABLE `tb_user` (
  `user_id` int(11) NOT NULL,
  `user_username` varchar(15) NOT NULL,
  `user_password` varchar(35) NOT NULL,
  `user_nama` varchar(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tb_user`
--

INSERT INTO `tb_user` (`user_id`, `user_username`, `user_password`, `user_nama`) VALUES
(1, 'admin', 'ad556d63e9333734ab1fd7e76f753269', 'Administrator');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tb_merk`
--
ALTER TABLE `tb_merk`
  ADD PRIMARY KEY (`merk_id`);

--
-- Indexes for table `tb_mobil`
--
ALTER TABLE `tb_mobil`
  ADD PRIMARY KEY (`mobil_id`);

--
-- Indexes for table `tb_mobil_gambar`
--
ALTER TABLE `tb_mobil_gambar`
  ADD PRIMARY KEY (`mg_id`),
  ADD KEY `gambar_mobil` (`mg_mobil`);

--
-- Indexes for table `tb_tema`
--
ALTER TABLE `tb_tema`
  ADD PRIMARY KEY (`tema_id`);

--
-- Indexes for table `tb_user`
--
ALTER TABLE `tb_user`
  ADD PRIMARY KEY (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tb_merk`
--
ALTER TABLE `tb_merk`
  MODIFY `merk_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tb_mobil`
--
ALTER TABLE `tb_mobil`
  MODIFY `mobil_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tb_mobil_gambar`
--
ALTER TABLE `tb_mobil_gambar`
  MODIFY `mg_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tb_tema`
--
ALTER TABLE `tb_tema`
  MODIFY `tema_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `tb_user`
--
ALTER TABLE `tb_user`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `tb_mobil_gambar`
--
ALTER TABLE `tb_mobil_gambar`
  ADD CONSTRAINT `gambar_mobil` FOREIGN KEY (`mg_mobil`) REFERENCES `tb_mobil` (`mobil_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
