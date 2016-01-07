-- phpMyAdmin SQL Dump
-- version 3.4.5
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Apr 22, 2012 at 11:51 AM
-- Server version: 5.5.16
-- PHP Version: 5.3.8

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `rekwebkoko`
--

-- --------------------------------------------------------

--
-- Table structure for table `pengguna`
--

CREATE TABLE IF NOT EXISTS `pengguna` (
  `id_pengguna` int(128) NOT NULL AUTO_INCREMENT,
  `nama` varchar(30) NOT NULL,
  `pass` varchar(60) NOT NULL,
  `nama_asli` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `akses` varchar(60) NOT NULL DEFAULT '1679091c5a880faf6fb5e6087eb1b2dc',
  PRIMARY KEY (`id_pengguna`),
  UNIQUE KEY `nama` (`nama`),
  UNIQUE KEY `nama_2` (`nama`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=12 ;

--
-- Dumping data for table `pengguna`
--

INSERT INTO `pengguna` (`id_pengguna`, `nama`, `pass`, `nama_asli`, `email`, `akses`) VALUES
(1, 'admin', '202cb962ac59075b964b07152d234b70', 'gainza dengan level admin', 'koko.ro.no.bo@gmail.coms', 'eccbc87e4b5ce2fe28308fd9f2a7baf3'),
(6, 'member', '202cb962ac59075b964b07152d234b70', 'just another members', '123@gmail.com', '1679091c5a880faf6fb5e6087eb1b2dc'),
(8, 'barusaja', '202cb962ac59075b964b07152d234b70', 'barusaja', 'barusaja@yahoo.com', '1679091c5a880faf6fb5e6087eb1b2dc'),
(9, 'syem', '81dc9bdb52d04dc20036dbd8313ed055', 'samsul', 'soel.mj@gmail.com', '1679091c5a880faf6fb5e6087eb1b2dc'),
(10, 'soel', '81dc9bdb52d04dc20036dbd8313ed055', 'syamsul', 'syem@gmail.com', 'eccbc87e4b5ce2fe28308fd9f2a7baf3'),
(11, 'userbaru', '81dc9bdb52d04dc20036dbd8313ed055', 'userbaru', 'userbaru@gmail.com', '1679091c5a880faf6fb5e6087eb1b2dc');

-- --------------------------------------------------------

--
-- Table structure for table `pesanan`
--

CREATE TABLE IF NOT EXISTS `pesanan` (
  `id_pesanan` int(128) NOT NULL AUTO_INCREMENT,
  `id_produk` int(128) NOT NULL,
  `id_pengguna` int(128) NOT NULL,
  `nama_produk` varchar(128) NOT NULL,
  `nama_pemesan` varchar(128) NOT NULL,
  `jumlah` int(128) NOT NULL,
  `harga_satuan` varchar(128) NOT NULL,
  `total_harga_pesanan` varchar(255) NOT NULL,
  `status` varchar(60) NOT NULL,
  `tanggal` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id_pesanan`),
  KEY `id_produk` (`id_produk`,`id_pengguna`),
  KEY `id_pengguna` (`id_pengguna`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=16 ;

--
-- Dumping data for table `pesanan`
--

INSERT INTO `pesanan` (`id_pesanan`, `id_produk`, `id_pengguna`, `nama_produk`, `nama_pemesan`, `jumlah`, `harga_satuan`, `total_harga_pesanan`, `status`, `tanggal`) VALUES
(1, 15, 6, 'topi kuning', 'member', 25, '12345', '308625', 'Success', '2011-12-22 12:37:26'),
(2, 14, 6, 'penggaris', 'member', 10, '12000', '120000', 'Success', '2011-12-22 12:37:26'),
(3, 14, 8, 'penggaris', 'barusaja', 2, '12000', '24000', 'Success', '2011-12-22 12:52:38'),
(4, 15, 8, 'topi kuning', 'barusaja', 12, '12345', '148140', 'Success', '2011-12-22 12:52:38'),
(5, 14, 6, 'penggaris', 'member', 50, '12000', '600000', 'Success', '2011-12-22 16:00:32'),
(6, 15, 9, 'topi kuning', 'syem', 4, '12345', '49380', 'Success', '2011-12-25 11:49:43'),
(7, 15, 0, 'topi kuning', '0', 6, '12345', '74070', 'Success', '2011-12-25 18:13:26'),
(8, 15, 9, 'topi kuning', 'syem', 5, '12345', '61725', 'Awaiting Confirmation', '2011-12-29 00:32:07'),
(9, 15, 9, 'topi kuning', 'syem', 6, '12345', '74070', 'Awaiting Confirmation', '2011-12-29 00:32:35'),
(10, 20, 9, 'Kaos Orange', 'syem', 1, '26000', '26000', 'Awaiting Confirmation', '2011-12-29 01:54:35'),
(11, 18, 9, 'Kaos Hijau', 'syem', 3, '25000', '75000', 'Awaiting Confirmation', '2011-12-29 01:54:35'),
(12, 16, 9, 'Kaos Hitam', 'syem', 1, '2400', '2400', 'Awaiting Confirmation', '2011-12-29 01:57:49'),
(13, 16, 9, 'Kaos Hitam', 'syem', 2, '2400', '4800', 'Awaiting Confirmation', '2011-12-29 02:04:21'),
(14, 20, 9, 'Kaos Orange', 'syem', 1, '26000', '26000', 'Awaiting Confirmation', '2011-12-29 06:02:20'),
(15, 18, 11, 'Kaos Hijau', 'userbaru', 3, '25000', '75000', 'Awaiting Confirmation', '2011-12-29 06:43:51');

-- --------------------------------------------------------

--
-- Table structure for table `produk`
--

CREATE TABLE IF NOT EXISTS `produk` (
  `id_produk` int(128) NOT NULL AUTO_INCREMENT,
  `nama_produk` varchar(255) NOT NULL,
  `harga` varchar(255) NOT NULL,
  `gambar` varchar(60) NOT NULL,
  `kategori` varchar(60) NOT NULL,
  PRIMARY KEY (`id_produk`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=26 ;

--
-- Dumping data for table `produk`
--

INSERT INTO `produk` (`id_produk`, `nama_produk`, `harga`, `gambar`, `kategori`) VALUES
(16, 'Kaos Hitam', '2400', 'produk_oblonk1.jpg', 'V-Neck'),
(18, 'Kaos Hijau', '25000', 'produk_oblonk1.png', 'O-Neck'),
(19, 'Kaos Biry', '22000', 'produk_oblonk3.jpg', 'V-Neck'),
(20, 'Kaos Orange', '26000', 'produk_oblonk2.png', 'Short Sleeves'),
(21, 'Baju Kuning', '22000', 'produk_oblonk4.jpg', 'O-Neck'),
(24, 'Baju Coklat', '23000', 'produk_oblonk.jpg', 'V-Neck'),
(25, 'Kaos Hijau', '21000', 'produk_oblonk2.jpg', 'V-Neck');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
