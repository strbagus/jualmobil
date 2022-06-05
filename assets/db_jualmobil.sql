-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Jun 05, 2022 at 04:28 PM
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
-- Database: `db_jualmobil`
--

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

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tb_mobil`
--
ALTER TABLE `tb_mobil`
  ADD PRIMARY KEY (`mobil_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tb_mobil`
--
ALTER TABLE `tb_mobil`
  MODIFY `mobil_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
