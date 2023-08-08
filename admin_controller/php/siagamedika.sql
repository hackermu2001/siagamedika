-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 08, 2023 at 09:24 AM
-- Server version: 10.4.22-MariaDB
-- PHP Version: 8.1.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `siagamedika`
--

-- --------------------------------------------------------

--
-- Table structure for table `brand`
--

CREATE TABLE `brand` (
  `SKU_BRND` varchar(300) COLLATE utf32_bin NOT NULL,
  `NamaBrand` varchar(250) COLLATE utf32_bin NOT NULL,
  `Tanggal` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf32 COLLATE=utf32_bin;

--
-- Dumping data for table `brand`
--

INSERT INTO `brand` (`SKU_BRND`, `NamaBrand`, `Tanggal`) VALUES
('BRND525', 'Solida', '2023-08-08'),
('BRND581', 'ABN', '2023-08-08'),
('BRND653', 'Serenity', '2023-08-08'),
('BRND722', 'GEA', '2023-08-08');

-- --------------------------------------------------------

--
-- Table structure for table `kategori`
--

CREATE TABLE `kategori` (
  `NamaKategori` varchar(100) NOT NULL,
  `kode_kategori` varchar(300) NOT NULL,
  `Tanggal` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `kategori`
--

INSERT INTO `kategori` (`NamaKategori`, `kode_kategori`, `Tanggal`) VALUES
('ICU/HCU', 'CAT209', '2023-08-08'),
('WARD', 'CAT258', '2023-08-08'),
('Diagnostic', 'CAT291', '2023-08-08'),
('Laundry', 'CAT357', '2023-08-08'),
('NICU/PICU', 'CAT589', '2023-08-08'),
('CSSD', 'CAT702', '2023-08-08'),
('Operating Theater', 'CAT814', '2023-08-08'),
('Laboratory', 'CAT883', '2023-08-08');

-- --------------------------------------------------------

--
-- Table structure for table `produk`
--

CREATE TABLE `produk` (
  `KodeProduk` int(11) NOT NULL,
  `NamaProduk` varchar(150) CHARACTER SET utf8mb4 NOT NULL,
  `KodeKategori` int(11) NOT NULL,
  `KodeBrand` int(11) NOT NULL,
  `Harga` double NOT NULL,
  `Gambar` varchar(350) CHARACTER SET utf8mb4 NOT NULL,
  `Keterangan` varchar(500) DEFAULT NULL,
  `TokoPedia` varchar(300) DEFAULT NULL,
  `Blibli` varchar(300) DEFAULT NULL,
  `Shoppee` varchar(300) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf32;

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `KodeUser` int(11) NOT NULL,
  `NamaUser` varchar(45) NOT NULL,
  `Username` varchar(250) NOT NULL,
  `Password` varchar(350) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `brand`
--
ALTER TABLE `brand`
  ADD PRIMARY KEY (`SKU_BRND`);

--
-- Indexes for table `kategori`
--
ALTER TABLE `kategori`
  ADD PRIMARY KEY (`kode_kategori`);

--
-- Indexes for table `produk`
--
ALTER TABLE `produk`
  ADD PRIMARY KEY (`KodeProduk`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`KodeUser`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `produk`
--
ALTER TABLE `produk`
  MODIFY `KodeProduk` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `KodeUser` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
