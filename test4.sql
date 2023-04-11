-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 06, 2023 at 11:30 AM
-- Server version: 10.4.27-MariaDB
-- PHP Version: 8.2.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `test4`
--

-- --------------------------------------------------------

--
-- Table structure for table `produk`
--

CREATE TABLE `produk` (
  `id_produk` int(11) NOT NULL,
  `nama_produk` varchar(255) NOT NULL,
  `jenis_produk` varchar(100) NOT NULL,
  `harga` int(15) NOT NULL,
  `foto` text DEFAULT NULL,
  `stok` int(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `produk`
--

INSERT INTO `produk` (`id_produk`, `nama_produk`, `jenis_produk`, `harga`, `foto`, `stok`) VALUES
(21, 'Laptop Acer M1', 'gamink', 1200000, 'tt-removebg-preview.png', 90),
(22, 'Laptop Acer M2', '12000', 10000, 'asus-removebg-preview.png', 70),
(23, 'Macbook ', 'Apple', 12000, 'dor-removebg-preview.png', 120),
(27, 'Macbook 110', 'aplle', 12000, 'oi-removebg-preview.png', 100),
(28, 'Macbook M2', 'Gamink', 10000, 'rr-removebg-preview.png', 120),
(29, 'Airpad', 'ko', 12000, 'll-removebg-preview.png', 120),
(30, 'Lenovo', 'Gamink', 1200000, 'rr-removebg-preview.png', 120);

-- --------------------------------------------------------

--
-- Table structure for table `transaksi`
--

CREATE TABLE `transaksi` (
  `id_transaksi` int(11) NOT NULL,
  `tgl_transaksi` date NOT NULL,
  `alamat` text NOT NULL,
  `no_whatapp` varchar(20) NOT NULL,
  `nama_penerima` varchar(100) NOT NULL,
  `nama_lengkap` varchar(255) NOT NULL,
  `nama_produk` varchar(100) NOT NULL,
  `harga` int(50) NOT NULL,
  `jmlh_barang` int(11) NOT NULL,
  `subtotal` int(50) NOT NULL,
  `foto` text DEFAULT NULL,
  `status` enum('Proses','Verifikasi','Ditolak') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `transaksi`
--

INSERT INTO `transaksi` (`id_transaksi`, `tgl_transaksi`, `alamat`, `no_whatapp`, `nama_penerima`, `nama_lengkap`, `nama_produk`, `harga`, `jmlh_barang`, `subtotal`, `foto`, `status`) VALUES
(9, '2023-04-06', '', '', '', 'haikal', 'Laptop Acer M1', 1200000, 0, 12000000, 'tt.jpg', 'Verifikasi'),
(10, '2023-04-06', '', '', '', 'haikal', 'Laptop Acer M2', 10000, 0, 200000, 'asus.jpg', 'Ditolak');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id_user` int(11) NOT NULL,
  `nama_lengkap` varchar(100) NOT NULL,
  `username` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  `foto` text NOT NULL,
  `roles` enum('Admin','Customer') NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `update_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id_user`, `nama_lengkap`, `username`, `password`, `foto`, `roles`, `created_at`, `update_at`) VALUES
(31, 'haikal', 'customer', '123', '', 'Customer', '2023-04-06 03:15:50', '2023-04-06 03:15:50'),
(32, 'haikal', 'haikal', '123', '', 'Admin', '2023-04-06 03:17:26', '2023-04-06 03:17:26'),
(33, 'haikal', 'kale', '123', '', 'Customer', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(34, 'haikal', 'kaleeee', '123', '', 'Customer', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(35, 'haikal', 'kaleeee', '12333', '', 'Customer', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(36, 'haikal', 'kaleeee', '12333', '', 'Customer', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(37, 'haikal', 'ilhamdoyok', '123', '', 'Customer', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(38, 'haikal', 'kale', '123', '', 'Customer', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(39, 'haikal', 'kusumoanjai', '123', '', 'Customer', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(41, 'haikal', 'ilhamdoyok', '123', '', 'Customer', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(42, 'haikal', 'ilhamrmdhn', '123', '', 'Customer', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(43, 'haikal', 'ilhamrmdhn', '123', '', 'Customer', '2023-04-05 20:02:52', '0000-00-00 00:00:00'),
(44, 'haikal', 'kusumoanjai', '123', '', 'Customer', '2023-04-05 17:00:00', '2023-04-05 17:00:00'),
(45, 'haikal', 'ilhamdoyok', '123', '', 'Customer', '2023-04-05 20:11:26', '2023-04-05 20:11:26'),
(46, 'haikal', 'ilhamdoyok', '123', '', 'Customer', '2023-04-05 20:11:26', '2023-04-05 20:11:26'),
(47, 'haikal', 'ilhamdoyok', '123', '', 'Customer', '2023-04-05 20:11:26', '2023-04-05 20:11:26'),
(48, 'haikal', 'ilhamdoyok', '123', '', 'Customer', '2023-04-05 20:39:49', '2023-04-05 20:39:49'),
(49, 'haikal', 'ilhamdoyok', '123', '', 'Customer', '2023-04-05 20:41:47', '2023-04-05 20:41:47'),
(50, 'haikal', 'kalekale', '123', '', 'Customer', '2023-04-05 20:44:34', '2023-04-05 20:44:34'),
(51, 'haikal', 'kalekale', '123', '', 'Customer', '2023-04-05 20:44:34', '2023-04-05 20:44:34'),
(52, 'haikal', 'haikal', '123', '', 'Customer', '2023-04-05 20:38:42', '2023-04-05 20:38:42'),
(53, 'haikal', 'customer', '123', '', 'Customer', '2023-04-05 20:50:01', '2023-04-05 20:50:01'),
(54, 'test', 'test', '123', '', 'Customer', '2023-04-05 20:51:03', '2023-04-05 20:51:03'),
(55, 'test', 'customer', '123', '', 'Customer', '2023-04-05 20:52:16', '2023-04-05 20:52:16'),
(56, 'test', 'test', '123', '', 'Customer', '2023-04-05 20:53:17', '2023-04-05 20:53:17'),
(57, 'test', 'test', '123', '', 'Customer', '2023-04-05 20:53:48', '2023-04-05 20:53:48'),
(58, 'test', 'test', '123', '', 'Customer', '2023-04-05 20:58:23', '2023-04-05 20:58:23'),
(59, 'test', 'test', '123', '', 'Customer', '2023-04-05 20:58:23', '2023-04-05 20:58:23'),
(60, 'test', 'kkk', '123', '', 'Customer', '2023-04-05 21:23:14', '2023-04-05 21:23:14'),
(61, 'test', 'kkk', '123', '', 'Customer', '2023-04-05 21:23:14', '2023-04-05 21:23:14');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `produk`
--
ALTER TABLE `produk`
  ADD PRIMARY KEY (`id_produk`);

--
-- Indexes for table `transaksi`
--
ALTER TABLE `transaksi`
  ADD PRIMARY KEY (`id_transaksi`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id_user`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `produk`
--
ALTER TABLE `produk`
  MODIFY `id_produk` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;

--
-- AUTO_INCREMENT for table `transaksi`
--
ALTER TABLE `transaksi`
  MODIFY `id_transaksi` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=62;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
