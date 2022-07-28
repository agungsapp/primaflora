-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 28, 2022 at 12:38 PM
-- Server version: 10.4.22-MariaDB
-- PHP Version: 8.0.13

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_primabeta`
--

-- --------------------------------------------------------

--
-- Table structure for table `cart`
--

CREATE TABLE `cart` (
  `idcart` int(11) NOT NULL,
  `orderid` varchar(100) NOT NULL,
  `userid` int(11) NOT NULL,
  `tglorder` timestamp NOT NULL DEFAULT current_timestamp(),
  `status` varchar(10) NOT NULL DEFAULT 'Cart'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `cart`
--

INSERT INTO `cart` (`idcart`, `orderid`, `userid`, `tglorder`, `status`) VALUES
(56, '16KWBKD/d7OZI', 10, '2022-07-28 04:48:12', 'Selesai'),
(57, '16kueTTc/oUP2', 10, '2022-07-28 04:52:52', 'Selesai'),
(59, '16Ympl3NJfscg', 10, '2022-07-28 04:55:03', 'Selesai'),
(60, '16yt7tZWyRNng', 10, '2022-07-28 04:55:51', 'Selesai'),
(61, '16HoVngcyUoRU', 10, '2022-07-28 04:57:30', 'Selesai');

-- --------------------------------------------------------

--
-- Table structure for table `detailorder`
--

CREATE TABLE `detailorder` (
  `detailid` int(11) NOT NULL,
  `orderid` varchar(100) NOT NULL,
  `idproduk` int(11) NOT NULL,
  `userid` int(11) NOT NULL,
  `tglmulai` date NOT NULL,
  `tglselesai` date NOT NULL,
  `lamaorder` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `detailorder`
--

INSERT INTO `detailorder` (`detailid`, `orderid`, `idproduk`, `userid`, `tglmulai`, `tglselesai`, `lamaorder`) VALUES
(111, '16KWBKD/d7OZI', 5, 10, '2022-07-24', '2022-07-30', 6),
(112, '16kueTTc/oUP2', 6, 10, '2022-07-24', '2022-07-30', 6),
(113, '16Ympl3NJfscg', 7, 10, '2022-07-31', '2022-08-06', 6),
(114, '16yt7tZWyRNng', 8, 10, '2022-07-31', '2022-08-05', 5),
(115, '16HoVngcyUoRU', 5, 10, '2022-07-31', '2022-08-06', 6),
(116, '16HoVngcyUoRU', 6, 10, '2022-07-31', '2022-08-06', 6);

-- --------------------------------------------------------

--
-- Table structure for table `kategori`
--

CREATE TABLE `kategori` (
  `idkategori` int(11) NOT NULL,
  `namakategori` varchar(20) NOT NULL,
  `tgldibuat` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `kategori`
--

INSERT INTO `kategori` (`idkategori`, `namakategori`, `tgldibuat`) VALUES
(6, 'Standar', '2022-06-09 01:57:42'),
(7, 'Premium', '2022-06-09 01:58:06');

-- --------------------------------------------------------

--
-- Table structure for table `konfirmasi`
--

CREATE TABLE `konfirmasi` (
  `idkonfirmasi` int(11) NOT NULL,
  `orderid` varchar(100) NOT NULL,
  `userid` int(11) NOT NULL,
  `payment` varchar(10) NOT NULL,
  `namarekening` varchar(25) NOT NULL,
  `tglbayar` date NOT NULL,
  `tglsubmit` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `login`
--

CREATE TABLE `login` (
  `userid` int(11) NOT NULL,
  `namalengkap` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `password` varchar(150) NOT NULL,
  `notelp` varchar(15) NOT NULL,
  `alamat` varchar(100) NOT NULL,
  `tgljoin` timestamp NOT NULL DEFAULT current_timestamp(),
  `role` varchar(7) NOT NULL DEFAULT 'Member',
  `lastlogin` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `login`
--

INSERT INTO `login` (`userid`, `namalengkap`, `email`, `password`, `notelp`, `alamat`, `tgljoin`, `role`, `lastlogin`) VALUES
(4, 'agung', 'agung.dni19@gmail.com', '$2y$10$J.DTHRdOeX15qgc/QHcmqOTGSmJ0FtPpE0X3F.zJi.3z9ImNK438m', '081373939116', 'Jl. ZA. Pagar Alam No.93, Gedong Meneng, Kec. Rajabasa, Kota Bandar Lampung, Lampung, Jl. ZA. Pagar ', '2022-04-10 12:28:47', 'Member', NULL),
(7, 'user', 'user@user', '$2y$10$UnjO2uX5WMIIfPQCiEmyvecFMG9HUYEu2lihX80YqcsUxxHpqi4xG', '08', 'balam', '2022-05-17 03:11:34', 'Member', NULL),
(8, 'user', 'user@user', '$2y$10$UiHUj.R/TeD7X4/WqZVlEeYgE0AAlvhkeK025jr48MuRkdiDjQi0S', '085709330853', 'Banding, Rajabasa, Kabupaten Lampung Selatan, Lampung', '2022-05-23 17:32:47', 'Member', NULL),
(9, 'agung saputra', 'agung@admin.com', '$2y$10$nIIb6pvc4rRo8y7ZYdkgAOOqOTpAS/PBD1cAY49KLo/c7nTQRtOxO', '081373939116', 'Jl. ZA. Pagar Alam No.93, Gedong Meneng, Kec. Rajabasa, Kota Bandar Lampung, Lampung, Jl. ZA. Pagar ', '2022-06-04 05:23:56', 'Member', NULL),
(10, 'admin', 'admin@gmail.com', '$2y$10$3f7M183pVUerYuc7a79ScelIOXtyaVRxU7Bv.JDHemDp.5Sm5gN6m', '080808080808', 'krajan', '2022-06-04 08:06:10', 'Member', NULL),
(12, 'agung1', 'admin1@gmail.com', '$2y$10$vraS4Z66wIC.yOqdPkjVq.YdC5fe/yJ/8xpPH7vxpCVlE1.cadoL.', '085709330853', 'Banding, Rajabasa, Kabupaten Lampung Selatan, Lampung', '2022-07-15 14:09:51', 'Member', NULL),
(13, 'yura', 'yura@gmail.com', '$2y$10$OmcqZNjcUV6s.bfTNUYQlO0sYlLERp2XVKMFsE3QdayiqsAY4QGvm', '12345678', 'dsgfj', '2022-07-27 04:13:12', 'Member', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `pembayaran`
--

CREATE TABLE `pembayaran` (
  `no` int(11) NOT NULL,
  `metode` varchar(25) NOT NULL,
  `norek` varchar(25) NOT NULL,
  `logo` text DEFAULT NULL,
  `an` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `pembayaran`
--

INSERT INTO `pembayaran` (`no`, `metode`, `norek`, `logo`, `an`) VALUES
(5, 'Bank muamalat', '355 000 1531', 'muamalat.jpg', 'Kholid D Suseno'),
(6, 'Bank BRI ', '0699 0100 0332 501', 'bri.png', 'Kholid D Suseno'),
(7, 'Bank BNI Syariah', '0334 005 704', 'bni.png', 'Kholid D Suseno'),
(8, 'Bank Mandiri Syariah', '7080730904', 'mandiri.jpg', 'Kholid D Suseno');

-- --------------------------------------------------------

--
-- Table structure for table `produk`
--

CREATE TABLE `produk` (
  `idproduk` int(11) NOT NULL,
  `idkategori` int(11) NOT NULL,
  `namaproduk` varchar(30) NOT NULL,
  `gambar` varchar(100) NOT NULL,
  `deskripsi` varchar(200) NOT NULL,
  `rate` int(11) NOT NULL,
  `hargabefore` int(11) NOT NULL,
  `hargaafter` int(11) NOT NULL,
  `tgldibuat` timestamp NOT NULL DEFAULT current_timestamp(),
  `status` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `produk`
--

INSERT INTO `produk` (`idproduk`, `idkategori`, `namaproduk`, `gambar`, `deskripsi`, `rate`, `hargabefore`, `hargaafter`, `tgldibuat`, `status`) VALUES
(5, 7, 'paket A', 'produk/16G6xwafmUB3M.jpg', 'lorem', 5, 20000, 15000, '2022-06-09 02:01:24', 'tersedia'),
(6, 7, 'Paket B', 'produk/16Skh8zdtB3gg.jpg', 'lorem ipsum', 5, 25000, 20000, '2022-06-09 02:02:15', 'tersedia'),
(7, 6, 'paket C', 'produk/16mL6BfLQv4Hk.jpg', 'lorem ipsum', 4, 20000, 15000, '2022-06-09 02:02:49', 'tersedia'),
(8, 6, 'paket D', 'produk/169dDA3EJtsco.jpg', 'lorem', 4, 20000, 15000, '2022-06-09 02:03:59', 'tersedia');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `cart`
--
ALTER TABLE `cart`
  ADD PRIMARY KEY (`idcart`),
  ADD UNIQUE KEY `orderid` (`orderid`),
  ADD KEY `orderid_2` (`orderid`);

--
-- Indexes for table `detailorder`
--
ALTER TABLE `detailorder`
  ADD PRIMARY KEY (`detailid`),
  ADD KEY `orderid` (`orderid`),
  ADD KEY `idproduk` (`idproduk`);

--
-- Indexes for table `kategori`
--
ALTER TABLE `kategori`
  ADD PRIMARY KEY (`idkategori`);

--
-- Indexes for table `konfirmasi`
--
ALTER TABLE `konfirmasi`
  ADD PRIMARY KEY (`idkonfirmasi`),
  ADD KEY `userid` (`userid`);

--
-- Indexes for table `login`
--
ALTER TABLE `login`
  ADD PRIMARY KEY (`userid`);

--
-- Indexes for table `pembayaran`
--
ALTER TABLE `pembayaran`
  ADD PRIMARY KEY (`no`);

--
-- Indexes for table `produk`
--
ALTER TABLE `produk`
  ADD PRIMARY KEY (`idproduk`),
  ADD KEY `idkategori` (`idkategori`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `cart`
--
ALTER TABLE `cart`
  MODIFY `idcart` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=62;

--
-- AUTO_INCREMENT for table `detailorder`
--
ALTER TABLE `detailorder`
  MODIFY `detailid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=117;

--
-- AUTO_INCREMENT for table `kategori`
--
ALTER TABLE `kategori`
  MODIFY `idkategori` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `konfirmasi`
--
ALTER TABLE `konfirmasi`
  MODIFY `idkonfirmasi` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- AUTO_INCREMENT for table `login`
--
ALTER TABLE `login`
  MODIFY `userid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `pembayaran`
--
ALTER TABLE `pembayaran`
  MODIFY `no` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `produk`
--
ALTER TABLE `produk`
  MODIFY `idproduk` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `detailorder`
--
ALTER TABLE `detailorder`
  ADD CONSTRAINT `idproduk` FOREIGN KEY (`idproduk`) REFERENCES `produk` (`idproduk`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `orderid` FOREIGN KEY (`orderid`) REFERENCES `cart` (`orderid`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `konfirmasi`
--
ALTER TABLE `konfirmasi`
  ADD CONSTRAINT `userid` FOREIGN KEY (`userid`) REFERENCES `login` (`userid`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `produk`
--
ALTER TABLE `produk`
  ADD CONSTRAINT `idkategori` FOREIGN KEY (`idkategori`) REFERENCES `kategori` (`idkategori`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
