-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 28, 2023 at 08:59 AM
-- Server version: 10.4.17-MariaDB
-- PHP Version: 7.2.34

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `polman_pelayanan`
--

-- --------------------------------------------------------

--
-- Table structure for table `ms_pelanggan`
--

CREATE TABLE `ms_pelanggan` (
  `id` varchar(50) NOT NULL,
  `nama` varchar(100) NOT NULL,
  `instansi` varchar(100) NOT NULL,
  `keterangan` varchar(100) NOT NULL,
  `status_aktif` varchar(100) NOT NULL,
  `user_id_buat` varchar(50) NOT NULL,
  `user_id_ubah` varchar(50) NOT NULL,
  `created_at` date NOT NULL,
  `updated_at` date NOT NULL,
  `timestamp` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `ms_pelanggan`
--

INSERT INTO `ms_pelanggan` (`id`, `nama`, `instansi`, `keterangan`, `status_aktif`, `user_id_buat`, `user_id_ubah`, `created_at`, `updated_at`, `timestamp`) VALUES
('8cxHJ92vgOwae', 'Abdillah', 'Polman', '123', '1', '1', '1', '2023-11-27', '2023-11-27', '2023-11-26 23:29:51'),
('C2pHrf3KytWZE', 'QORI', 'Polman', 'baru', '1', '1', '1', '2023-11-27', '2023-11-27', '2023-11-26 23:09:10'),
('OrQuhCo54PIqD', 'Mamat', 'Polman', '1231\r\n', '1', '1', '1', '2023-11-27', '2023-11-28', '2023-11-26 23:41:57');

-- --------------------------------------------------------

--
-- Table structure for table `ms_pelayanan`
--

CREATE TABLE `ms_pelayanan` (
  `id` varchar(30) NOT NULL,
  `kode_pelayanan` varchar(30) NOT NULL,
  `nama_pelayanan` varchar(300) NOT NULL,
  `harga` varchar(100) NOT NULL,
  `keterangan` varchar(500) NOT NULL,
  `status_aktif` enum('0','1','') NOT NULL,
  `user_id_buat` varchar(50) NOT NULL,
  `user_id_ubah` varchar(50) NOT NULL,
  `created_at` date NOT NULL,
  `updated_at` date NOT NULL,
  `timestamp` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `ms_pelayanan`
--

INSERT INTO `ms_pelayanan` (`id`, `kode_pelayanan`, `nama_pelayanan`, `harga`, `keterangan`, `status_aktif`, `user_id_buat`, `user_id_ubah`, `created_at`, `updated_at`, `timestamp`) VALUES
('fsafsdfsdfsfse', 'FCWBB', 'Fotocopy Warna BB', '2.000', 'contoh212', '1', '000', '1', '2023-11-01', '2023-11-28', '2023-11-01 02:19:36'),
('kjasdfjhasdjsah', 'FCWW', 'Fotocopy Warna', '3000', 'contoh', '1', '000', '1', '2023-10-31', '2023-11-15', '2023-10-31 02:31:58'),
('sgsgsdfg', 'FCHP', 'Fotocopy Hitam Putih', '400', 'ajhdadlasdasddasdpp1111', '1', '000', '1', '2023-10-31', '2023-11-28', '2023-11-01 02:19:36');

-- --------------------------------------------------------

--
-- Table structure for table `ms_pembayaran`
--

CREATE TABLE `ms_pembayaran` (
  `id` varchar(50) NOT NULL,
  `jenis_pembayaran` varchar(100) NOT NULL,
  `status_aktif` enum('0','1') NOT NULL,
  `keterangan` varchar(100) DEFAULT NULL,
  `user_id_buat` varchar(50) NOT NULL,
  `user_id_ubah` varchar(50) NOT NULL,
  `created_at` date NOT NULL,
  `updated_at` date NOT NULL,
  `timestamp` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `ms_pembayaran`
--

INSERT INTO `ms_pembayaran` (`id`, `jenis_pembayaran`, `status_aktif`, `keterangan`, `user_id_buat`, `user_id_ubah`, `created_at`, `updated_at`, `timestamp`) VALUES
('12312312ijnda', 'Tunai', '1', '11111', '000', '1', '2023-11-20', '2023-11-27', '2023-11-19 21:41:31'),
('hkhaskjdhiwhoqhdjas', 'Qris', '1', '2', '000', '1', '2023-11-20', '2023-11-28', '2023-11-19 21:41:54');

-- --------------------------------------------------------

--
-- Table structure for table `ms_role`
--

CREATE TABLE `ms_role` (
  `id_role` int(50) NOT NULL,
  `kode_role` varchar(50) NOT NULL,
  `nama_role` varchar(50) NOT NULL,
  `keterangan` varchar(500) NOT NULL,
  `status_aktif` enum('0','1','') NOT NULL,
  `user_id_buat` varchar(50) NOT NULL,
  `user_id_ubah` varchar(50) NOT NULL,
  `tanggal_buat` date NOT NULL,
  `tanggal_ubah` date NOT NULL,
  `timestamp` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `ms_role`
--

INSERT INTO `ms_role` (`id_role`, `kode_role`, `nama_role`, `keterangan`, `status_aktif`, `user_id_buat`, `user_id_ubah`, `tanggal_buat`, `tanggal_ubah`, `timestamp`) VALUES
(1, 'ADM', 'administrator', '-', '1', '000', '', '2023-10-24', '2023-10-24', '2023-10-23 18:29:45'),
(2, 'OPR', 'operator', '-', '1', '000', '', '2023-10-24', '2023-10-24', '2023-10-23 18:30:20');

-- --------------------------------------------------------

--
-- Table structure for table `ms_transaksi`
--

CREATE TABLE `ms_transaksi` (
  `id_transaksi` varchar(100) NOT NULL,
  `total` varchar(100) DEFAULT NULL,
  `id_pelanggan` varchar(100) NOT NULL,
  `id_admin` varchar(100) NOT NULL,
  `metode_pembayaran` varchar(100) NOT NULL,
  `created_at` date NOT NULL,
  `updated_at` date NOT NULL,
  `timestamp` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `ms_transaksi`
--

INSERT INTO `ms_transaksi` (`id_transaksi`, `total`, `id_pelanggan`, `id_admin`, `metode_pembayaran`, `created_at`, `updated_at`, `timestamp`) VALUES
('', '1000', '', '23424234234', '', '2023-11-28', '2023-11-28', '2023-11-27 21:11:05'),
('M0001', NULL, '', '', '', '0000-00-00', '0000-00-00', '2023-11-27 02:19:05'),
('M0002', '15222', '124', '23424234234', 'Tunai', '2023-11-27', '2023-11-27', '2023-11-27 01:19:05'),
('M0003', '35400', '124', '23424234234', 'Tunai', '2023-11-27', '2023-11-27', '2023-11-27 02:19:38'),
('M0004', '82500', '124', '23424234234', 'Tunai', '2023-11-27', '2023-11-27', '2023-11-27 02:19:48'),
('M0005', '6800', '124', '23424234234', 'Tunai', '2023-11-27', '2023-11-27', '2023-11-27 02:19:56'),
('M0006', '148164', '124', '23424234234', 'Tunai', '2023-11-27', '2023-11-27', '2023-11-27 02:20:05'),
('M0007', '24400', '124', '23424234234', 'Tunai', '2023-11-27', '2023-11-27', '2023-11-27 02:20:13'),
('M0008', '27000', '124', '23424234234', 'Tunai', '2023-11-27', '2023-11-27', '2023-11-27 02:20:21'),
('M0009', '113500', '124', '23424234234', 'Tunai', '2023-11-27', '2023-11-27', '2023-11-27 02:20:38'),
('M0010', '11000', '124', '23424234234', 'Tunai', '2023-11-27', '2023-11-27', '2023-11-27 02:20:47'),
('M0011', '16400', '124', '23424234234', 'Tunai', '2023-11-27', '2023-11-27', '2023-11-27 02:21:05'),
('M0012', '219964', '124', '23424234234', 'Tunai', '2023-11-27', '2023-11-27', '2023-11-27 02:21:35'),
('M0013', '11000', '124', '23424234234', 'Tunai', '2023-11-27', '2023-11-27', '2023-11-27 02:59:54'),
('M0014', '0', '124', '23424234234', 'Tunai', '2023-11-27', '2023-11-27', '2023-11-27 03:00:02'),
('M0015', '1000', '124', '23424234234', 'Tunai', '2023-11-27', '2023-11-27', '2023-11-27 03:45:21'),
('M0016', '68000', '124', '234242342333', 'Tunai', '2023-11-27', '2023-11-27', '2023-11-27 04:14:27'),
('M0017', '24000', '124', '23424234234', 'Tunai', '2023-11-27', '2023-11-27', '2023-11-27 04:16:56'),
('M0018', '1000', '124', '23424234234', 'Tunai', '2023-11-28', '2023-11-28', '2023-11-27 21:11:49'),
('M0019', '1000', '124', '23424234234', 'Tunai', '2023-11-28', '2023-11-28', '2023-11-27 21:12:06'),
('M0020', '1000', '124', '23424234234', 'Tunai', '2023-11-28', '2023-11-28', '2023-11-27 21:12:27'),
('M0021', '1000', '124', '23424234234', 'Tunai', '2023-11-28', '2023-11-28', '2023-11-27 21:15:03'),
('M0022', '2000', '8cxHJ92vgOwae', '23424234234', 'Tunai', '2023-11-28', '2023-11-28', '2023-11-28 01:48:51');

-- --------------------------------------------------------

--
-- Table structure for table `ms_users`
--

CREATE TABLE `ms_users` (
  `id` varchar(50) NOT NULL,
  `nama_user` varchar(50) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(200) NOT NULL,
  `id_role` varchar(50) NOT NULL,
  `keterangan` varchar(500) NOT NULL,
  `status_aktif` enum('0','1','') NOT NULL,
  `user_id_buat` varchar(50) NOT NULL,
  `user_id_ubah` varchar(50) NOT NULL,
  `created_at` date NOT NULL,
  `updated_at` date NOT NULL,
  `timestamp` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `ms_users`
--

INSERT INTO `ms_users` (`id`, `nama_user`, `username`, `password`, `id_role`, `keterangan`, `status_aktif`, `user_id_buat`, `user_id_ubah`, `created_at`, `updated_at`, `timestamp`) VALUES
('234242342333', 'Habib Abdillah', 'operator1', '$2y$10$puXfrarO.J4uCxbA4QNz.OxC13ZJDAOHoUJVwgSxVMmu3fk31awUy', '2', 'asdasaaaaaaaaaaa1', '1', '000', '1', '2023-10-24', '2023-11-28', '2023-10-23 18:38:41'),
('KBOHCAc0YibP2', 'Habib', 'admin', '$2y$10$a3vjF.5fYMdUzTgQ5LGSaeQ8AJtBGzlcJcFi85dTnJgGFMsGLe0R6', '1', 'pass = admin\r\n', '1', '1', '1', '2023-11-28', '2023-11-28', '2023-11-28 01:55:20');

-- --------------------------------------------------------

--
-- Table structure for table `sys_track`
--

CREATE TABLE `sys_track` (
  `id` varchar(50) NOT NULL,
  `username` varchar(100) NOT NULL,
  `pc_name` varchar(100) NOT NULL,
  `timestamp` timestamp NOT NULL DEFAULT current_timestamp(),
  `activity` varchar(100) NOT NULL,
  `header_reference` varchar(50) NOT NULL,
  `detail_reference` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `sys_track`
--

INSERT INTO `sys_track` (`id`, `username`, `pc_name`, `timestamp`, `activity`, `header_reference`, `detail_reference`) VALUES
('', '', '', '2023-11-28 01:55:29', '', '', ''),
('045tg96YTGWun', 'admin1', '::1', '2023-11-27 01:53:40', 'INPUT DATA TRANSAKSI', '23424234234', 'BERHASIL'),
('09FuLrMDmVYJS', 'admin1', '::1', '2023-11-27 03:45:21', 'INPUT DATA TRANSAKSI', '23424234234', 'BERHASIL'),
('0tUGE46eJlPoR', 'admin1', '::1', '2023-11-27 12:24:01', 'HAPUS DATA PEMBAYARAN', '23424234234', 'BERHASIL'),
('0za5xQDuOZ84l', 'admin1', '::1', '2023-11-27 01:54:35', 'INPUT DATA TRANSAKSI', '23424234234', 'BERHASIL'),
('1huGnR4Vl0FDt', 'admin1', '::1', '2023-11-27 02:20:47', 'INPUT DATA TRANSAKSI', '23424234234', 'BERHASIL'),
('1lYPCRXzmw6IG', 'admin1', '::1', '2023-11-27 12:51:15', 'EDIT DATA USER', '23424234234', 'BERHASIL'),
('1mhLZe9iGCVHR', 'admin1', '::1', '2023-11-27 02:19:05', 'INPUT DATA TRANSAKSI', '23424234234', 'BERHASIL'),
('1SAeLcv8hkVDr', 'admin1', '::1', '2023-11-27 21:37:34', 'HAPUS DATA PELANGGAN', '23424234234', 'BERHASIL'),
('1xCevnjEJhto9', 'admin1', '::1', '2023-11-27 01:56:57', 'INPUT DATA TRANSAKSI', '23424234234', 'BERHASIL'),
('21TZiFfmSvnxJ', 'admin1', '::1', '2023-11-24 02:02:07', 'INPUT DATA TRANSAKSI', '23424234234', 'BERHASIL'),
('2GsqNU5a1KZTl', 'admin1', '::1', '2023-11-27 13:12:59', 'INPUT DATA PELANGGAN', '23424234234', 'BERHASIL'),
('2mhdZfz9QtjMn', 'admin1', '::1', '2023-11-22 09:07:16', 'LOGIN USER', '23424234234', 'BERHASIL'),
('3CFtjPrYBbNlx', 'admin1', '::1', '2023-11-24 01:55:30', 'INPUT DATA TRANSAKSI', '23424234234', 'BERHASIL'),
('3jRc6ugKHwb1E', 'admin1', '::1', '2023-11-27 13:02:31', 'EDIT DATA USER', '23424234234', 'BERHASIL'),
('3uv2t1pheRZkU', 'admin1', '::1', '2023-11-27 21:10:58', 'LOGIN USER', '23424234234', 'BERHASIL'),
('3y1PdHKupJGWa', 'admin', '::1', '2023-11-28 01:56:32', 'LOGIN USER', 'KBOHCAc0YibP2', 'BERHASIL'),
('4JYteqvaABrwI', 'admin1', '::1', '2023-11-24 02:20:57', 'INPUT DATA TRANSAKSI', '23424234234', 'BERHASIL'),
('4ZMGtsXx52bWJ', 'admin1', '::1', '2023-11-27 01:56:29', 'INPUT DATA TRANSAKSI', '23424234234', 'BERHASIL'),
('5BEYDTgJucyXl', 'admin1', '::1', '2023-11-27 21:37:37', 'HAPUS DATA PELANGGAN', '23424234234', 'BERHASIL'),
('5CBwXRWqrdLgF', 'admin1', '::1', '2023-11-27 02:45:16', 'INPUT DATA PEMBAYARAN', '23424234234', 'BERHASIL'),
('6kI87mAVOFYN0', 'admin1', '::1', '2023-11-27 21:36:55', 'HAPUS DATA PELAYANAN', '23424234234', 'BERHASIL'),
('6x3KQs0JrWFgL', 'admin1', '::1', '2023-11-27 13:09:20', 'LOGIN USER', '23424234234', 'BERHASIL'),
('6zkD5BYpymNQR', 'admin1', '::1', '2023-11-27 03:00:02', 'INPUT DATA TRANSAKSI', '23424234234', 'BERHASIL'),
('7ArXaBmxw1EiO', 'admin1', '::1', '2023-11-23 22:39:26', 'INPUT DATA PELAYANAN', '23424234234', 'BERHASIL'),
('7QITKVEropJ9X', 'admin1', '::1', '2023-11-27 01:32:10', 'INPUT DATA TRANSAKSI', '23424234234', 'BERHASIL'),
('7vi6n4jubS2wm', 'admin1', '::1', '2023-11-26 23:29:30', 'HAPUS DATA PELANGGAN', '23424234234', 'BERHASIL'),
('8Sae06T1OYLND', 'operator1', '::1', '2023-11-27 11:59:06', 'LOGIN USER', '234242342333', 'BERHASIL'),
('9Nadtlzqeb8OW', 'admin1', '::1', '2023-11-30 01:36:43', 'INPUT DATA PEMBAYARAN', '23424234234', 'BERHASIL'),
('a1wt6FB7ipnjq', 'admin1', '::1', '2023-11-26 23:26:32', 'EDIT DATA PELANGGAN', '23424234234', 'BERHASIL'),
('A8CdfIVH4USch', 'admin1', '::1', '2023-11-20 08:41:22', 'EDIT DATA PELAYANAN', '23424234234', 'BERHASIL'),
('aAViJ6X9jZfq2', 'admin1', '::1', '2023-11-27 13:12:52', 'HAPUS DATA USER', '23424234234', 'BERHASIL'),
('afsPv60je4Fiq', 'admin1', '::1', '2023-11-24 02:03:44', 'INPUT DATA TRANSAKSI', '23424234234', 'BERHASIL'),
('an9OEAUkWBKFP', 'admin1', '::1', '2023-11-24 01:27:15', 'INPUT DATA TRANSAKSI', '23424234234', 'BERHASIL'),
('Atx7vM9WGhiTc', 'admin1', '::1', '2023-11-20 08:39:55', 'INPUT DATA TRANSAKSI', '23424234234', 'BERHASIL'),
('AyVB1uoFnK7rZ', 'admin1', '::1', '2023-11-24 03:36:41', 'INPUT DATA TRANSAKSI', '23424234234', 'BERHASIL'),
('BAsu2GiD6kxZd', 'admin1', '::1', '2023-11-27 04:16:56', 'INPUT DATA TRANSAKSI', '23424234234', 'BERHASIL'),
('bCoBRY0sLwcU2', 'admin1', '::1', '2023-11-26 23:50:29', 'EDIT DATA PEMBAYARAN', '23424234234', 'BERHASIL'),
('BCq2XxzdDtVu3', 'admin1', '::1', '2023-11-22 03:07:10', 'LOGIN USER', '23424234234', 'BERHASIL'),
('BDeAuMP5rlqj0', 'admin1', '::1', '2023-11-27 01:51:47', 'INPUT DATA TRANSAKSI', '23424234234', 'BERHASIL'),
('bGT89Sta06kZm', 'admin1', '::1', '2023-11-27 01:30:36', 'INPUT DATA TRANSAKSI', '23424234234', 'BERHASIL'),
('bmndy3QlKaDAe', 'admin1', '::1', '2023-11-27 01:59:50', 'INPUT DATA TRANSAKSI', '23424234234', 'BERHASIL'),
('BNkXjTVgEe7JO', 'admin1', '::1', '2023-11-27 02:01:39', 'INPUT DATA TRANSAKSI', '23424234234', 'BERHASIL'),
('bVtwn25WeDA4j', 'admin1', '::1', '2023-11-24 02:04:46', 'INPUT DATA TRANSAKSI', '23424234234', 'BERHASIL'),
('c6Q3gHRWTbkSv', 'admin1', '::1', '2023-11-27 12:23:52', 'HAPUS DATA PEMBAYARAN', '23424234234', 'BERHASIL'),
('c9jszOiMHYewb', 'admin1', '::1', '2023-11-20 04:01:51', 'INPUT DATA TRANSAKSI', '23424234234', 'BERHASIL'),
('cf217yp6MarwB', 'admin1', '::1', '2023-11-27 01:32:11', 'INPUT DATA TRANSAKSI', '23424234234', 'BERHASIL'),
('CJXevnUHpb26f', 'admin1', '::1', '2023-11-27 13:08:39', 'LOGIN USER', '23424234234', 'GAGAL'),
('crW4eqoyFkp2h', 'admin1', '::1', '2023-11-27 01:53:09', 'INPUT DATA TRANSAKSI', '23424234234', 'BERHASIL'),
('CxMNzyEXv1FaR', 'admin1', '::1', '2023-11-27 13:02:35', 'HAPUS DATA USER', '23424234234', 'BERHASIL'),
('Da4t3xWlghe1K', 'admin1', '::1', '2023-11-24 06:45:49', 'LOGIN USER', '23424234234', 'BERHASIL'),
('dAh2aIyGKBXZt', 'admin1', '::1', '2023-11-27 13:12:16', 'EDIT DATA PELAYANAN', '23424234234', 'BERHASIL'),
('dEwoOnx9H4SM1', 'admin1', '::1', '2023-11-24 02:03:48', 'INPUT DATA TRANSAKSI', '23424234234', 'BERHASIL'),
('DEzFaO3j5NW7V', 'admin1', '::1', '2023-11-24 01:56:08', 'INPUT DATA TRANSAKSI', '23424234234', 'BERHASIL'),
('djZKnrlUkSf1x', 'admin1', '::1', '2023-11-23 22:24:50', 'LOGIN USER', '23424234234', 'BERHASIL'),
('dpCJISgxqV8Oj', 'admin1', '::1', '2023-11-20 03:00:23', 'INPUT DATA TRANSAKSI', '23424234234', 'BERHASIL'),
('dwAHJjufDoY1r', 'admin1', '::1', '2023-11-27 12:23:49', 'HAPUS DATA PEMBAYARAN', '23424234234', 'BERHASIL'),
('DxPEnAZMUiyto', 'admin1', '::1', '2023-11-27 02:19:48', 'INPUT DATA TRANSAKSI', '23424234234', 'BERHASIL'),
('E4HGcCPezv38n', 'admin1', '::1', '2023-11-27 02:45:12', 'INPUT DATA PEMBAYARAN', '23424234234', 'BERHASIL'),
('e7VXqk5LiUZSW', 'admin1', '::1', '2023-11-27 21:36:52', 'HAPUS DATA PELAYANAN', '23424234234', 'BERHASIL'),
('e90DwXCGbSYuN', 'admin1', '::1', '2023-11-20 04:04:56', 'INPUT DATA TRANSAKSI', '23424234234', 'BERHASIL'),
('EFYTwOHDBPK96', 'admin1', '::1', '2023-11-27 12:23:46', 'HAPUS DATA PEMBAYARAN', '23424234234', 'BERHASIL'),
('emfUz4SCokBXV', 'admin1', '::1', '2023-11-27 01:54:14', 'INPUT DATA TRANSAKSI', '23424234234', 'BERHASIL'),
('fFQTm0ednzHPu', 'admin1', '::1', '2023-11-27 13:13:19', 'INPUT DATA PEMBAYARAN', '23424234234', 'BERHASIL'),
('FJ2Sk3QO7VaZi', 'admin1', '::1', '2023-11-24 01:13:08', 'INPUT DATA TRANSAKSI', '23424234234', 'BERHASIL'),
('FJ8Yf6tDIinsU', 'admin1', '::1', '2023-11-27 13:08:42', 'LOGIN USER', '23424234234', 'GAGAL'),
('FQad2VGYqyEPr', 'admin1', '::1', '2023-11-27 01:23:25', 'INPUT DATA TRANSAKSI', '23424234234', 'BERHASIL'),
('GFr1UMbEfCVdH', 'admin1', '::1', '2023-11-27 12:23:43', 'HAPUS DATA PEMBAYARAN', '23424234234', 'BERHASIL'),
('GPjiOxHrRe2mL', 'admin1', '::1', '2023-11-28 01:48:51', 'INPUT DATA TRANSAKSI', 'M0022', 'BERHASIL'),
('gwsRWUuKtAXpj', 'admin1', '::1', '2023-11-27 02:20:38', 'INPUT DATA TRANSAKSI', '23424234234', 'BERHASIL'),
('gX9bypGPvsCQZ', 'admin1', '::1', '2023-11-27 21:37:24', 'EDIT DATA USER', '23424234234', 'BERHASIL'),
('Gz37QNrFgYBdK', 'admin1', '::1', '2023-11-27 11:58:32', 'LOGIN USER', '23424234234', 'BERHASIL'),
('Hpa9sCU8JZXPN', 'admin1', '::1', '2023-11-27 02:04:08', 'INPUT DATA TRANSAKSI', '23424234234', 'BERHASIL'),
('hxblZv9kdyD1P', 'admin1', '::1', '2023-11-27 21:36:58', 'HAPUS DATA PELAYANAN', '23424234234', 'BERHASIL'),
('I3WmgjxKa4cEy', 'admin1', '::1', '2023-11-27 01:59:23', 'INPUT DATA TRANSAKSI', '23424234234', 'BERHASIL'),
('ibZl3hQXoYpCm', 'admin1', '::1', '2023-11-27 21:09:54', 'LOGIN USER', '23424234234', 'GAGAL'),
('IdRzGrH1hfoqZ', 'admin1', '::1', '2023-11-20 02:56:09', 'LOGIN USER', '23424234234', 'BERHASIL'),
('iEQJ4LWhKdrvf', 'admin1', '::1', '2023-11-27 01:59:29', 'INPUT DATA TRANSAKSI', '23424234234', 'BERHASIL'),
('Ig01qEcmSjVWp', 'admin1', '::1', '2023-11-27 01:40:43', 'LOGIN USER', '23424234234', 'BERHASIL'),
('iI8wC0HZsWjBP', 'admin1', '::1', '2023-11-24 02:01:19', 'INPUT DATA TRANSAKSI', '23424234234', 'BERHASIL'),
('ilm9R8tjDKoCs', 'admin1', '::1', '2023-11-24 01:50:33', 'INPUT DATA TRANSAKSI', '23424234234', 'BERHASIL'),
('jfgUwHcknW1OI', 'admin1', '::1', '2023-11-27 04:14:36', 'LOGIN USER', '23424234234', 'BERHASIL'),
('jLBUHrVQwpJim', 'admin1', '::1', '2023-11-20 08:39:48', 'LOGIN USER', '23424234234', 'BERHASIL'),
('JMYIAqskF45Gg', 'admin1', '::1', '2023-11-27 12:23:58', 'HAPUS DATA PEMBAYARAN', '23424234234', 'BERHASIL'),
('Ju0ci41oRMCza', 'admin1', '::1', '2023-11-27 01:28:13', 'INPUT DATA TRANSAKSI', '23424234234', 'BERHASIL'),
('JUHOnu0tPL2eC', 'admin1', '::1', '2023-11-25 08:33:50', 'LOGIN USER', '23424234234', 'BERHASIL'),
('K0WvX6J9HN1BI', 'admin1', '::1', '2023-11-27 12:55:51', 'EDIT DATA USER', '23424234234', 'BERHASIL'),
('Kfgpb2JL8siVP', 'admin1', '::1', '2023-11-27 21:37:54', 'EDIT DATA PEMBAYARAN', '23424234234', 'BERHASIL'),
('knjGuetc1z2d9', 'admin1', '::1', '2023-11-27 01:40:47', 'INPUT DATA TRANSAKSI', '23424234234', 'BERHASIL'),
('Ko5n9Q6TEDuVr', 'admin1', '::1', '2023-11-27 01:53:46', 'INPUT DATA TRANSAKSI', '23424234234', 'BERHASIL'),
('kswDbo5pNIdLY', 'admin1', '::1', '2023-11-27 21:36:49', 'HAPUS DATA PELAYANAN', '23424234234', 'BERHASIL'),
('KVWmFszGEy4qX', 'admin1', '::1', '2023-11-27 01:11:06', 'LOGIN USER', '23424234234', 'BERHASIL'),
('KZ75Ho4w1aTsS', 'admin1', '::1', '2023-11-27 02:45:04', 'INPUT DATA PEMBAYARAN', '23424234234', 'BERHASIL'),
('LfoNjdZ2U7sBI', 'admin1', '::1', '2023-11-27 02:00:33', 'INPUT DATA TRANSAKSI', '23424234234', 'BERHASIL'),
('LG3EiC5ldtQky', 'admin1', '::1', '2023-11-27 02:19:38', 'INPUT DATA TRANSAKSI', '23424234234', 'BERHASIL'),
('lIAHPYbdko3G9', 'admin1', '::1', '2023-11-27 12:23:55', 'HAPUS DATA PEMBAYARAN', '23424234234', 'BERHASIL'),
('lLkV8UsBDfKm6', 'admin1', '::1', '2023-11-24 02:46:38', 'LOGIN USER', '23424234234', 'BERHASIL'),
('loQ3L6AWveGsy', 'admin1', '::1', '2023-11-24 01:58:51', 'INPUT DATA TRANSAKSI', '23424234234', 'BERHASIL'),
('ltEG1XbwvSDYy', 'admin1', '::1', '2023-11-27 01:54:52', 'INPUT DATA TRANSAKSI', '23424234234', 'BERHASIL'),
('lUfc1BPhQO4ip', 'admin1', '::1', '2023-11-27 13:12:34', 'EDIT DATA USER', '23424234234', 'BERHASIL'),
('M3ApKZc5Paju4', 'admin1', '::1', '2023-11-27 21:37:42', 'EDIT DATA PELANGGAN', '23424234234', 'BERHASIL'),
('m9ZACVx6woaj2', 'admin1', '::1', '2023-11-27 02:21:35', 'INPUT DATA TRANSAKSI', '23424234234', 'BERHASIL'),
('ME5YAv48qLkiK', 'admin1', '::1', '2023-11-27 21:10:01', 'LOGIN USER', '23424234234', 'GAGAL'),
('mNWjlv2UBs7YH', 'admin1', '::1', '2023-11-24 01:49:39', 'INPUT DATA TRANSAKSI', '23424234234', 'BERHASIL'),
('MpD8o4W6Qg0NJ', 'admin1', '::1', '2023-11-27 21:15:03', 'INPUT DATA TRANSAKSI', 'M0021', 'BERHASIL'),
('MqWyYl8v5E1xI', 'admin1', '::1', '2023-11-26 23:29:51', 'INPUT DATA PELANGGAN', '23424234234', 'BERHASIL'),
('MRasUJbVGdgXr', 'admin1', '::1', '2023-11-24 02:24:18', 'LOGIN USER', '23424234234', 'BERHASIL'),
('MSD0br9lTnft1', 'admin1', '::1', '2023-11-24 02:03:51', 'INPUT DATA TRANSAKSI', '23424234234', 'BERHASIL'),
('msFxaDvnMZyrz', 'admin1', '::1', '2023-11-27 02:02:03', 'INPUT DATA TRANSAKSI', '23424234234', 'BERHASIL'),
('MZ08VOwmRJpch', 'operator1', '::1', '2023-11-20 08:45:07', 'LOGIN USER', '234242342333', 'BERHASIL'),
('n0VHbTfJ8My2d', 'admin1', '::1', '2023-11-24 01:49:05', 'INPUT DATA TRANSAKSI', '23424234234', 'BERHASIL'),
('n8wCcoTlqm3K6', 'admin1', '::1', '2023-11-27 13:12:24', 'INPUT DATA PELAYANAN', '23424234234', 'BERHASIL'),
('Nc4SAP1lfVCtx', 'admin1', '::1', '2023-11-27 13:08:46', 'LOGIN USER', '23424234234', 'GAGAL'),
('NDa2WxlrBzAbq', 'admin1', '::1', '2023-11-20 08:31:24', 'LOGIN USER', '23424234234', 'BERHASIL'),
('NeZThoFyV9BlL', 'admin1', '::1', '2023-11-27 13:12:28', 'HAPUS DATA PELAYANAN', '23424234234', 'BERHASIL'),
('NS4FRmZoXi06Q', 'admin1', '::1', '2023-11-27 02:44:57', 'INPUT DATA PEMBAYARAN', '23424234234', 'BERHASIL'),
('nuYxN1Vwy6LT0', 'admin1', '::1', '2023-11-24 02:33:34', 'INPUT DATA TRANSAKSI', '23424234234', 'BERHASIL'),
('nwuWY1KRroTp4', 'admin1', '::1', '2023-11-27 01:25:23', 'INPUT DATA TRANSAKSI', '23424234234', 'BERHASIL'),
('nXKENvwaO5FYo', 'operator1', '::1', '2023-11-27 04:14:21', 'LOGIN USER', '234242342333', 'BERHASIL'),
('O1a3kVzWo6dSM', 'admin1', '::1', '2023-11-27 12:24:03', 'HAPUS DATA PEMBAYARAN', '23424234234', 'BERHASIL'),
('OA8IxLGkcyt1e', 'admin1', '::1', '2023-11-20 02:58:43', 'INPUT DATA TRANSAKSI', '23424234234', 'BERHASIL'),
('OePLAF01Itwof', 'admin1', '::1', '2023-11-27 11:59:41', 'LOGIN USER', '23424234234', 'BERHASIL'),
('oMfaYD9X1vBSC', 'admin1', '::1', '2023-11-27 01:49:26', 'INPUT DATA TRANSAKSI', '23424234234', 'BERHASIL'),
('Os6baIl0eZK1p', 'admin1', '::1', '2023-11-26 23:41:57', 'INPUT DATA PELANGGAN', '23424234234', 'BERHASIL'),
('OUWkYb2NtGQrj', 'admin1', '::1', '2023-11-27 21:37:21', 'HAPUS DATA USER', '23424234234', 'BERHASIL'),
('owjWUCSL8mVlk', 'admin1', '::1', '2023-11-20 08:45:21', 'LOGIN USER', '23424234234', 'BERHASIL'),
('oyHS8LCpkr2t7', 'admin1', '::1', '2023-11-27 01:33:08', 'INPUT DATA TRANSAKSI', '23424234234', 'BERHASIL'),
('pGNJLI4w1SOHR', 'admin1', '::1', '2023-11-24 14:37:44', 'LOGIN USER', '23424234234', 'BERHASIL'),
('PsWXNIvQ7eR41', 'admin1', '::1', '2023-11-27 12:51:03', 'EDIT DATA USER', '23424234234', 'BERHASIL'),
('Q05Ih2d1OMxYK', 'admin1', '::1', '2023-11-27 02:45:08', 'INPUT DATA PEMBAYARAN', '23424234234', 'BERHASIL'),
('q3TJDKwEMhgtl', 'admin1', '::1', '2023-11-26 22:05:51', 'LOGIN USER', '23424234234', 'BERHASIL'),
('QhLprsZSFvJeC', 'admin1', '::1', '2023-11-27 02:20:13', 'INPUT DATA TRANSAKSI', '23424234234', 'BERHASIL'),
('QiRLVIHDn83Um', 'admin1', '::1', '2023-11-27 21:12:06', 'INPUT DATA TRANSAKSI', '23424234234', 'BERHASIL'),
('qjwuO6NgfKFr5', 'admin1', '::1', '2023-11-24 03:38:12', 'INPUT DATA TRANSAKSI', '23424234234', 'BERHASIL'),
('qlmKZzXUe3goA', 'admin1', '::1', '2023-11-27 13:13:14', 'EDIT DATA PEMBAYARAN', '23424234234', 'BERHASIL'),
('QlPqopkaGKsRy', 'admin1', '::1', '2023-11-27 01:59:17', 'INPUT DATA TRANSAKSI', '23424234234', 'BERHASIL'),
('qWb68cfPLKr0w', 'admin1', '::1', '2023-11-23 22:32:31', 'INPUT DATA TRANSAKSI', '23424234234', 'BERHASIL'),
('QXWn9fPlHFsr5', 'admin1', '::1', '2023-11-27 07:20:15', 'LOGIN USER', '23424234234', 'BERHASIL'),
('qZEjKivho2H07', 'admin1', '::1', '2023-11-24 01:55:48', 'INPUT DATA TRANSAKSI', '23424234234', 'BERHASIL'),
('R5Aw340BVDxml', 'admin1', '::1', '2023-11-27 13:12:42', 'INPUT DATA USER', '23424234234', 'BERHASIL'),
('R8YzL1wvEr4u9', 'admin1', '::1', '2023-11-27 01:55:11', 'INPUT DATA TRANSAKSI', '23424234234', 'BERHASIL'),
('RCfsZwWKLvhbB', 'admin1', '::1', '2023-11-27 01:49:49', 'INPUT DATA TRANSAKSI', '23424234234', 'BERHASIL'),
('rKDHeYZk9Tpbg', 'admin1', '::1', '2023-11-27 12:36:58', 'HAPUS DATA USER', '23424234234', 'BERHASIL'),
('rL7H9ufcVdYZz', 'admin1', '::1', '2023-11-20 08:36:15', 'LOGIN USER', '23424234234', 'BERHASIL'),
('ro1GulT9tzAZJ', 'admin1', '::1', '2023-11-27 01:59:45', 'INPUT DATA TRANSAKSI', '23424234234', 'BERHASIL'),
('RPC6OsT02bE7A', 'admin1', '::1', '2023-11-27 02:45:00', 'INPUT DATA PEMBAYARAN', '23424234234', 'BERHASIL'),
('rVXWzMj8hg3Tl', 'admin1', '::1', '2023-11-24 02:30:24', 'INPUT DATA TRANSAKSI', '23424234234', 'BERHASIL'),
('RWQrzbGY4oFLO', 'admin1', '::1', '2023-11-27 01:33:49', 'INPUT DATA TRANSAKSI', '23424234234', 'BERHASIL'),
('s2YnZEMdefTub', 'admin1', '::1', '2023-11-27 21:36:43', 'EDIT DATA PELAYANAN', '23424234234', 'BERHASIL'),
('sBnASeXjVcgPy', 'admin1', '::1', '2023-11-27 01:54:31', 'INPUT DATA TRANSAKSI', '23424234234', 'BERHASIL'),
('sFuLM7jZPqgHx', 'admin1', '::1', '2023-11-27 02:19:56', 'INPUT DATA TRANSAKSI', '23424234234', 'BERHASIL'),
('srf0qAOXQ2lbg', 'admin1', '::1', '2023-11-24 03:37:05', 'INPUT DATA TRANSAKSI', '23424234234', 'BERHASIL'),
('SuIvsObA9mh71', 'admin1', '::1', '2023-11-24 06:46:16', 'INPUT DATA TRANSAKSI', '23424234234', 'BERHASIL'),
('sVm7Gfdj0XbAO', 'admin1', '::1', '2023-11-27 02:45:20', 'INPUT DATA PEMBAYARAN', '23424234234', 'BERHASIL'),
('sw9aqBC8fyDun', 'admin1', '::1', '2023-11-27 21:37:58', 'INPUT DATA PEMBAYARAN', '23424234234', 'BERHASIL'),
('t3COBwi9yemfr', 'admin1', '::1', '2023-11-27 01:59:04', 'INPUT DATA TRANSAKSI', '23424234234', 'BERHASIL'),
('T7ofy0n8GImXg', 'admin1', '::1', '2023-11-24 03:55:32', 'INPUT DATA TRANSAKSI', '23424234234', 'BERHASIL'),
('T9cnpgtMuZI8Y', 'admin1', '::1', '2023-11-27 12:32:02', 'INPUT DATA USER', '23424234234', 'BERHASIL'),
('TFd2XMxB7OfYC', 'admin1', '::1', '2023-11-28 01:49:44', 'INPUT DATA PELAYANAN', '23424234234', 'BERHASIL'),
('tiNDhUMV6TFdo', 'admin1', '::1', '2023-11-27 21:12:27', 'INPUT DATA TRANSAKSI', '23424234234', 'BERHASIL'),
('TIwyJtV9b4lLS', 'admin1', '::1', '2023-11-27 02:44:53', 'INPUT DATA PEMBAYARAN', '23424234234', 'BERHASIL'),
('TNAOztK8dqFUr', 'admin1', '::1', '2023-11-24 08:26:32', 'LOGIN USER', '23424234234', 'BERHASIL'),
('TSPwRy2K3vAbn', 'admin1', '::1', '2023-11-27 02:03:07', 'INPUT DATA TRANSAKSI', '23424234234', 'BERHASIL'),
('TtHAocV9QRkd6', 'admin1', '::1', '2023-11-28 01:49:47', 'HAPUS DATA PELAYANAN', '23424234234', 'BERHASIL'),
('TWuGILApVad7h', 'admin1', '::1', '2023-11-24 03:55:30', 'INPUT DATA TRANSAKSI', '23424234234', 'BERHASIL'),
('u0TCwNe5GqAW9', 'admin1', '::1', '2023-11-27 13:12:49', 'RUBAH PASSWORD USER', '23424234234', 'BERHASIL'),
('umpKFHjCO4hZq', 'admin1', '::1', '2023-11-26 23:50:37', 'EDIT DATA PEMBAYARAN', '23424234234', 'BERHASIL'),
('us5rCikIJtSgH', 'admin1', '::1', '2023-11-24 03:36:45', 'INPUT DATA TRANSAKSI', '23424234234', 'BERHASIL'),
('uTeCUwtRy8W5L', 'admin1', '::1', '2023-11-27 12:23:40', 'HAPUS DATA PEMBAYARAN', '23424234234', 'BERHASIL'),
('V13LliagW2Y7w', 'admin1', '::1', '2023-11-24 01:52:24', 'INPUT DATA TRANSAKSI', '23424234234', 'BERHASIL'),
('vA8I5NLoitE2Z', 'admin1', '::1', '2023-11-27 01:58:02', 'INPUT DATA TRANSAKSI', '23424234234', 'BERHASIL'),
('vi5udr7BIwUxl', 'admin1', '::1', '2023-11-27 01:58:33', 'INPUT DATA TRANSAKSI', '23424234234', 'BERHASIL'),
('vkG6alwMpq1sO', 'admin1', '::1', '2023-11-27 02:59:54', 'INPUT DATA TRANSAKSI', '23424234234', 'BERHASIL'),
('VkvHPRUzSMc0j', 'admin1', '::1', '2023-11-27 11:47:24', 'LOGIN USER', '23424234234', 'BERHASIL'),
('vothpi3YLfBTl', 'admin1', '::1', '2023-11-28 01:49:37', 'EDIT DATA PELAYANAN', '23424234234', 'BERHASIL'),
('vT3kgYPbfJGNl', 'admin1', '::1', '2023-11-27 13:13:22', 'HAPUS DATA PEMBAYARAN', '23424234234', 'BERHASIL'),
('VZkRMUIf6OrWN', 'admin1', '::1', '2023-11-24 02:03:50', 'INPUT DATA TRANSAKSI', '23424234234', 'BERHASIL'),
('wbKM4kTrPxAt5', 'admin1', '::1', '2023-11-24 02:03:50', 'INPUT DATA TRANSAKSI', '23424234234', 'BERHASIL'),
('wbKt17oYCpAe6', 'admin1', '::1', '2023-11-24 03:29:57', 'INPUT DATA TRANSAKSI', '23424234234', 'BERHASIL'),
('WBRv6h7a8dxIb', 'admin1', '::1', '2023-11-28 01:55:20', 'INPUT DATA USER', '23424234234', 'BERHASIL'),
('whA7PngJBWtZr', 'admin1', '::1', '2023-11-24 03:36:44', 'INPUT DATA TRANSAKSI', '23424234234', 'BERHASIL'),
('wjEOme794HpqX', 'admin1', '::1', '2023-11-27 02:01:49', 'INPUT DATA TRANSAKSI', '23424234234', 'BERHASIL'),
('wOgiX1p2TNYue', 'admin1', '::1', '2023-11-27 12:59:40', 'INPUT DATA USER', '23424234234', 'BERHASIL'),
('WqgNxZlIebSfC', 'admin1', '::1', '2023-11-27 13:13:03', 'EDIT DATA PELANGGAN', '23424234234', 'BERHASIL'),
('wRpOekLJAu8Vv', 'admin1', '::1', '2023-11-27 01:54:55', 'INPUT DATA TRANSAKSI', '23424234234', 'BERHASIL'),
('xnw1crPklijXq', 'admin1', '::1', '2023-11-26 23:09:10', 'INPUT DATA PELANGGAN', '23424234234', 'BERHASIL'),
('xoGdkMTfbECaB', 'admin1', '::1', '2023-11-27 02:21:05', 'INPUT DATA TRANSAKSI', '23424234234', 'BERHASIL'),
('XwMYbtODcu4pS', 'admin1', '::1', '2023-11-26 23:44:01', 'INPUT DATA PEMBAYARAN', '23424234234', 'BERHASIL'),
('y1z69hCnMckXa', 'admin1', '::1', '2023-11-24 01:34:07', 'INPUT DATA TRANSAKSI', '23424234234', 'BERHASIL'),
('y3MHoDGn5aimX', 'admin1', '::1', '2023-11-27 13:03:00', 'EDIT DATA USER', '23424234234', 'BERHASIL'),
('yfVaoErBUlYpJ', 'admin1', '::1', '2023-11-27 02:20:05', 'INPUT DATA TRANSAKSI', '23424234234', 'BERHASIL'),
('ygbF4H7fErzVI', 'admin1', '::1', '2023-11-27 02:00:57', 'INPUT DATA TRANSAKSI', '23424234234', 'BERHASIL'),
('Yieg6y0dsoIM3', 'admin1', '::1', '2023-11-27 02:03:48', 'INPUT DATA TRANSAKSI', '23424234234', 'BERHASIL'),
('YlaI7S3vtmAJj', 'admin1', '::1', '2023-11-27 02:20:21', 'INPUT DATA TRANSAKSI', '23424234234', 'BERHASIL'),
('YOKJiW35ftQ07', 'admin1', '::1', '2023-11-25 16:42:13', 'LOGIN USER', '23424234234', 'BERHASIL'),
('yrPYDqBQjtp7A', 'operator1', '::1', '2023-11-27 04:14:27', 'INPUT DATA TRANSAKSI', '234242342333', 'BERHASIL'),
('YWXfxZpnK5AH3', 'admin1', '::1', '2023-11-26 23:26:41', 'EDIT DATA PELANGGAN', '23424234234', 'BERHASIL'),
('yx2tQ4UhvNcFw', 'admin1', '::1', '2023-11-24 08:31:15', 'LOGIN USER', '23424234234', 'BERHASIL'),
('Z39Y06ULbad5H', 'admin1', '::1', '2023-11-21 22:58:00', 'LOGIN USER', '23424234234', 'BERHASIL'),
('z4lsOhdB1YQmf', 'admin1', '::1', '2023-11-23 22:31:40', 'INPUT DATA TRANSAKSI', '23424234234', 'BERHASIL'),
('zb43v8NFsUj0R', 'admin1', '::1', '2023-11-26 23:52:05', 'HAPUS DATA PEMBAYARAN', '23424234234', 'BERHASIL'),
('zDWPYS0QJ2ORU', 'admin1', '::1', '2023-11-27 21:38:01', 'HAPUS DATA PEMBAYARAN', '23424234234', 'BERHASIL'),
('zETBdJMcrntvp', 'admin1', '::1', '2023-11-24 01:31:37', 'INPUT DATA TRANSAKSI', '23424234234', 'BERHASIL'),
('ZjdCwpQfH6RxL', 'admin1', '::1', '2023-11-27 13:13:05', 'HAPUS DATA PELANGGAN', '23424234234', 'BERHASIL'),
('zrhPsRkHC3EnN', 'admin1', '::1', '2023-11-24 01:56:01', 'INPUT DATA TRANSAKSI', '23424234234', 'BERHASIL');

-- --------------------------------------------------------

--
-- Table structure for table `trs_detail`
--

CREATE TABLE `trs_detail` (
  `id_transaksi` varchar(100) NOT NULL,
  `id_pelayanan` varchar(100) NOT NULL,
  `nama_pelayanan` varchar(100) NOT NULL,
  `harga` varchar(100) NOT NULL,
  `qty` varchar(100) NOT NULL,
  `subtotal` varchar(100) DEFAULT NULL,
  `created_at` date NOT NULL,
  `updated_at` date NOT NULL,
  `timestamp` timestamp NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `trs_detail`
--

INSERT INTO `trs_detail` (`id_transaksi`, `id_pelayanan`, `nama_pelayanan`, `harga`, `qty`, `subtotal`, `created_at`, `updated_at`, `timestamp`) VALUES
('M0002', '2rcMI8yiqwBkd', 'dasd', '1500', '2', '3000', '2023-11-27', '2023-11-27', '2023-11-27 02:19:05'),
('M0002', 'qEvtP7ogidOC5', 'asdasd', '12222', '1', '12222', '2023-11-27', '2023-11-27', '2023-11-27 02:19:05'),
('M0003', '1i3RKgVA8meFJ', 'KJASDJA', '1000', '1', '1000', '2023-11-27', '2023-11-27', '2023-11-27 02:19:38'),
('M0003', 'Pxopm7jnR1', 'dsfdsf', '2500', '12', '30000', '2023-11-27', '2023-11-27', '2023-11-27 02:19:38'),
('M0003', 'sgsgsdfg', 'Fotocopy Hitam Putih', '400', '11', '4400', '2023-11-27', '2023-11-27', '2023-11-27 02:19:38'),
('M0004', '2rcMI8yiqwBkd', 'dasd', '1500', '11', '16500', '2023-11-27', '2023-11-27', '2023-11-27 02:19:48'),
('M0004', 'kjasdfjhasdjsah', 'Fotocopy Warna', '3000', '22', '66000', '2023-11-27', '2023-11-27', '2023-11-27 02:19:48'),
('M0005', 'sgsgsdfg', 'Fotocopy Hitam Putih', '400', '2', '800', '2023-11-27', '2023-11-27', '2023-11-27 02:19:56'),
('M0005', 'kjasdfjhasdjsah', 'Fotocopy Warna', '3000', '2', '6000', '2023-11-27', '2023-11-27', '2023-11-27 02:19:56'),
('M0006', '2rcMI8yiqwBkd', 'dasd', '1500', '1', '1500', '2023-11-27', '2023-11-27', '2023-11-27 02:20:05'),
('M0006', 'qEvtP7ogidOC5', 'asdasd', '12222', '12', '146664', '2023-11-27', '2023-11-27', '2023-11-27 02:20:05'),
('M0007', 'sgsgsdfg', 'Fotocopy Hitam Putih', '400', '1', '400', '2023-11-27', '2023-11-27', '2023-11-27 02:20:13'),
('M0007', 'fsafsdfsdfsfse', 'Fotocopy Warna BB', '2000', '12', '24000', '2023-11-27', '2023-11-27', '2023-11-27 02:20:13'),
('M0008', 'kjasdfjhasdjsah', 'Fotocopy Warna', '3000', '1', '3000', '2023-11-27', '2023-11-27', '2023-11-27 02:20:21'),
('M0008', 'fsafsdfsdfsfse', 'Fotocopy Warna BB', '2000', '12', '24000', '2023-11-27', '2023-11-27', '2023-11-27 02:20:21'),
('M0009', 'kjasdfjhasdjsah', 'Fotocopy Warna', '3000', '37', '111000', '2023-11-27', '2023-11-27', '2023-11-27 02:20:38'),
('M0009', 'Pxopm7jnR1', 'dsfdsf', '2500', '1', '2500', '2023-11-27', '2023-11-27', '2023-11-27 02:20:38'),
('M0010', 'Pxopm7jnR1', 'dsfdsf', '2500', '2', '5000', '2023-11-27', '2023-11-27', '2023-11-27 02:20:47'),
('M0010', 'kjasdfjhasdjsah', 'Fotocopy Warna', '3000', '2', '6000', '2023-11-27', '2023-11-27', '2023-11-27 02:20:47'),
('M0011', 'kjasdfjhasdjsah', 'Fotocopy Warna', '3000', '4', '12000', '2023-11-27', '2023-11-27', '2023-11-27 02:21:05'),
('M0011', 'sgsgsdfg', 'Fotocopy Hitam Putih', '400', '6', '2400', '2023-11-27', '2023-11-27', '2023-11-27 02:21:05'),
('M0011', '1i3RKgVA8meFJ', 'KJASDJA', '1000', '2', '2000', '2023-11-27', '2023-11-27', '2023-11-27 02:21:05'),
('M0012', '1i3RKgVA8meFJ', 'KJASDJA', '1000', '1', '1000', '2023-11-27', '2023-11-27', '2023-11-27 02:21:35'),
('M0012', '2rcMI8yiqwBkd', 'dasd', '1500', '1', '1500', '2023-11-27', '2023-11-27', '2023-11-27 02:21:35'),
('M0012', 'kjasdfjhasdjsah', 'Fotocopy Warna', '3000', '12', '36000', '2023-11-27', '2023-11-27', '2023-11-27 02:21:35'),
('M0012', 'Pxopm7jnR1', 'dsfdsf', '2500', '12', '30000', '2023-11-27', '2023-11-27', '2023-11-27 02:21:35'),
('M0012', 'qEvtP7ogidOC5', 'asdasd', '12222', '12', '146664', '2023-11-27', '2023-11-27', '2023-11-27 02:21:35'),
('M0012', 'sgsgsdfg', 'Fotocopy Hitam Putih', '400', '12', '4800', '2023-11-27', '2023-11-27', '2023-11-27 02:21:35'),
('M0013', '1i3RKgVA8meFJ', 'KJASDJA', '1000', '11', '11000', '2023-11-27', '2023-11-27', '2023-11-27 02:59:54'),
('M0015', '1i3RKgVA8meFJ', 'KJASDJA', '1000', '1', '1000', '2023-11-27', '2023-11-27', '2023-11-27 03:45:21'),
('M0016', '1i3RKgVA8meFJ', 'KJASDJA', '1000', '2', '2000', '2023-11-27', '2023-11-27', '2023-11-27 04:14:27'),
('M0016', 'kjasdfjhasdjsah', 'Fotocopy Warna', '3000', '22', '66000', '2023-11-27', '2023-11-27', '2023-11-27 04:14:27'),
('M0017', '1i3RKgVA8meFJ', 'KJASDJA', '1000', '24', '24000', '2023-11-27', '2023-11-27', '2023-11-27 04:16:56'),
('M0018', 'sgsgsdfg', 'Fotocopy Hitam Putih', '400', '2', '800', '2023-11-27', '2023-11-27', '2023-11-27 13:46:00'),
('M0018', 'sgsgsdfg', 'Fotocopy Hitam Putih', '400', '2', '800', '2023-11-27', '2023-11-27', '2023-11-27 13:46:03'),
('M0018', 'sgsgsdfg', 'Fotocopy Hitam Putih', '400', '2', '800', '2023-11-27', '2023-11-27', '2023-11-27 13:46:22'),
('M0019', '1i3RKgVA8meFJ', 'KJASDJA', '1000', '1', '1000', '2023-11-28', '2023-11-28', '2023-11-27 21:12:06'),
('M0020', '1i3RKgVA8meFJ', 'KJASDJA', '1000', '1', '1000', '2023-11-28', '2023-11-28', '2023-11-27 21:12:27'),
('M0021', '1i3RKgVA8meFJ', 'KJASDJA', '1000', '1', '1000', '2023-11-28', '2023-11-28', '2023-11-27 21:15:03'),
('M0022', 'fsafsdfsdfsfse', 'Fotocopy Warna BB', '2000', '1', '2000', '2023-11-28', '2023-11-28', '2023-11-28 01:48:51');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `ms_pelanggan`
--
ALTER TABLE `ms_pelanggan`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `ms_pelayanan`
--
ALTER TABLE `ms_pelayanan`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `ms_pembayaran`
--
ALTER TABLE `ms_pembayaran`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `ms_role`
--
ALTER TABLE `ms_role`
  ADD PRIMARY KEY (`id_role`);

--
-- Indexes for table `ms_transaksi`
--
ALTER TABLE `ms_transaksi`
  ADD PRIMARY KEY (`id_transaksi`);

--
-- Indexes for table `ms_users`
--
ALTER TABLE `ms_users`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sys_track`
--
ALTER TABLE `sys_track`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `trs_detail`
--
ALTER TABLE `trs_detail`
  ADD KEY `id_transaksi` (`id_transaksi`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
