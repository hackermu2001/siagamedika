-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 12, 2023 at 06:48 AM
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
('BRND548', 'Polytron', '2023-08-08'),
('BRND581', 'ABN', '2023-08-08'),
('BRND653', 'Serenity', '2023-08-08'),
('BRND722', 'GEA', '2023-08-08'),
('BRND800', 'Bistos', '2023-08-11');

-- --------------------------------------------------------

--
-- Table structure for table `kategori`
--

CREATE TABLE `kategori` (
  `kode_kategori` varchar(300) NOT NULL,
  `NamaKategori` varchar(100) CHARACTER SET utf8mb4 NOT NULL,
  `Tanggal` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf32;

--
-- Dumping data for table `kategori`
--

INSERT INTO `kategori` (`kode_kategori`, `NamaKategori`, `Tanggal`) VALUES
('CAT209', 'ICU/HCU', '2023-08-10'),
('CAT258', 'WARD', '2023-08-10'),
('CAT291', 'Diagnostic', '2023-08-10'),
('CAT357', 'Laundry', '2023-08-08'),
('CAT589', 'NICU/PICU', '2023-08-08'),
('CAT702', 'CSSD', '2023-08-08'),
('CAT814', 'Operating Theater', '2023-08-08'),
('CAT883', 'Laboratory', '2023-08-08'),
('CAT885', 'Medical Equipment', '2023-08-11');

-- --------------------------------------------------------

--
-- Table structure for table `produk`
--

CREATE TABLE `produk` (
  `KodeProduk` int(11) NOT NULL,
  `NamaProduk` varchar(150) CHARACTER SET utf8mb4 NOT NULL,
  `kode_kategori` varchar(300) CHARACTER SET utf32 NOT NULL,
  `SKU_BRND` varchar(200) CHARACTER SET utf32 NOT NULL,
  `Harga` double NOT NULL,
  `Gambar` varchar(350) CHARACTER SET utf8mb4 NOT NULL,
  `Keterangan` text CHARACTER SET utf32 DEFAULT NULL,
  `Tokopedia` varchar(300) COLLATE utf32_bin DEFAULT NULL,
  `Blibli` varchar(300) CHARACTER SET utf32 DEFAULT NULL,
  `Shopee` varchar(300) CHARACTER SET utf32 DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf32 COLLATE=utf32_bin;

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
  MODIFY `KodeProduk` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=63;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `KodeUser` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
