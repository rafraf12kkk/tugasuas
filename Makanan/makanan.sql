-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 24, 2024 at 04:43 PM
-- Server version: 10.1.29-MariaDB
-- PHP Version: 7.1.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `makanan`
--

-- --------------------------------------------------------

--
-- Table structure for table `kategori`
--

CREATE TABLE `kategori` (
  `id` int(11) NOT NULL,
  `nama` varchar(250) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `kategori`
--

INSERT INTO `kategori` (`id`, `nama`) VALUES
(5, 'Donat'),
(6, 'Martabak');

-- --------------------------------------------------------

--
-- Table structure for table `produk`
--

CREATE TABLE `produk` (
  `id` int(11) NOT NULL,
  `kategori_id` int(11) DEFAULT NULL,
  `nama` varchar(255) NOT NULL,
  `harga` varchar(100) DEFAULT NULL,
  `foto` varchar(255) DEFAULT NULL,
  `detai` text,
  `stok` varchar(3) NOT NULL,
  `gambar` blob
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `produk`
--

INSERT INTO `produk` (`id`, `kategori_id`, `nama`, `harga`, `foto`, `detai`, `stok`, `gambar`) VALUES
(10, NULL, 'Beli Lokal Anomali Coffee Donat Frozen', '35000', NULL, '1PCS 14Donat', '20', 0x696d675f36356231326262366234373137342e36343134353537332e6a7067),
(12, NULL, 'DONAT ROTI TANIA coklat', '5000', NULL, '1pcs', '15', 0x696d675f36356231326333613932393266372e37363034393839332e6a7067),
(13, NULL, 'Donat Durian', '15000', NULL, '7pcs', '13', 0x696d675f36356231326336323033633339332e39363839343739322e6a7067),
(14, NULL, 'Martabak Manis Kacang', '15000', NULL, '1pcs', '25', 0x696d675f36356231326337383631373730332e39373638353333372e6a7067),
(15, NULL, 'Martabak Manis Cokelat', '17000', NULL, '1PCS', '13', 0x696d675f36356231326433633934356532322e30383935333630372e6a7067),
(16, NULL, 'Donat Paha Ayam', '14000', NULL, '1pcs 1Buah', '30', 0x696d675f36356231326462323665363234302e32353331303333372e6a7067);

-- --------------------------------------------------------

--
-- Table structure for table `user_tbl`
--

CREATE TABLE `user_tbl` (
  `userID` int(5) UNSIGNED NOT NULL,
  `username` varchar(30) NOT NULL,
  `password` varchar(50) NOT NULL,
  `nama` varchar(255) DEFAULT NULL,
  `no_hp` varchar(15) DEFAULT NULL,
  `profile_image` varchar(255) DEFAULT 'default_image.jpg'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user_tbl`
--

INSERT INTO `user_tbl` (`userID`, `username`, `password`, `nama`, `no_hp`, `profile_image`) VALUES
(0, 'rafly', '123', 'rafly', 'rafly', 'default_image.jpg');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `kategori`
--
ALTER TABLE `kategori`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `produk`
--
ALTER TABLE `produk`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user_tbl`
--
ALTER TABLE `user_tbl`
  ADD PRIMARY KEY (`userID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `kategori`
--
ALTER TABLE `kategori`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `produk`
--
ALTER TABLE `produk`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
