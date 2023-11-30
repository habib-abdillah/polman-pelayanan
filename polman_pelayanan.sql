-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 30, 2023 at 02:48 PM
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
('fsafsdfsdfsfse', 'FCWBB', 'Fotocopy Warna BB', '2000', 'contoh212', '1', '000', 'YVs16UFKkXbQy', '2023-11-01', '2023-11-30', '2023-11-01 02:19:36'),
('kjasdfjhasdjsah', 'FCWW', 'Fotocopy Warna', '3000', 'contoh', '1', '000', '1', '2023-10-31', '2023-11-15', '2023-10-31 02:31:58'),
('QKGEONfw1bl5j', 'SCB', 'Scan Berkas', '1000', '', '1', 'YVs16UFKkXbQy', 'YVs16UFKkXbQy', '2023-11-30', '2023-11-30', '2023-11-30 03:10:27');

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
('23090031', '4000', '8cxHJ92vgOwae', 'YVs16UFKkXbQy', 'Tunai', '2023-09-30', '0000-00-00', '2023-09-30 07:17:43'),
('23090032', '2000', '8cxHJ92vgOwae', 'YVs16UFKkXbQy', 'Tunai', '2023-09-30', '0000-00-00', '2023-09-30 07:17:46'),
('23090033', '2000', '8cxHJ92vgOwae', 'YVs16UFKkXbQy', 'Tunai', '2023-09-30', '0000-00-00', '2023-09-30 07:17:49'),
('23090034', '4000', '8cxHJ92vgOwae', 'YVs16UFKkXbQy', 'Tunai', '2023-09-30', '0000-00-00', '2023-09-30 07:17:52'),
('23090035', '4000', '8cxHJ92vgOwae', 'YVs16UFKkXbQy', 'Tunai', '2023-09-30', '0000-00-00', '2023-09-30 07:17:56'),
('23090036', '6000', '8cxHJ92vgOwae', 'YVs16UFKkXbQy', 'Tunai', '2023-09-30', '0000-00-00', '2023-09-30 07:17:59'),
('23090037', '4000', '8cxHJ92vgOwae', 'YVs16UFKkXbQy', 'Tunai', '2023-09-30', '0000-00-00', '2023-09-30 07:18:01'),
('23090038', '4000', '8cxHJ92vgOwae', 'YVs16UFKkXbQy', 'Tunai', '2023-09-30', '0000-00-00', '2023-09-30 07:18:05'),
('23090039', '2000', '8cxHJ92vgOwae', 'YVs16UFKkXbQy', 'Tunai', '2023-09-30', '0000-00-00', '2023-09-30 07:18:07'),
('23090040', '4000', '8cxHJ92vgOwae', 'YVs16UFKkXbQy', 'Tunai', '2023-09-30', '0000-00-00', '2023-09-30 07:18:10'),
('23090041', '4000', '8cxHJ92vgOwae', 'YVs16UFKkXbQy', 'Tunai', '2023-09-30', '0000-00-00', '2023-09-30 07:18:14'),
('23090042', '4000', '8cxHJ92vgOwae', 'YVs16UFKkXbQy', 'Tunai', '2023-09-30', '0000-00-00', '2023-09-30 07:18:18'),
('23090043', '8000', '8cxHJ92vgOwae', 'YVs16UFKkXbQy', 'Tunai', '2023-09-30', '0000-00-00', '2023-09-30 07:18:22'),
('23100022', '44000', '8cxHJ92vgOwae', 'YVs16UFKkXbQy', 'Tunai', '2023-10-30', '0000-00-00', '2023-10-30 07:16:36'),
('23100023', '44000', '8cxHJ92vgOwae', 'YVs16UFKkXbQy', 'Tunai', '2023-10-30', '0000-00-00', '2023-10-30 07:16:39'),
('23100024', '24242000', '8cxHJ92vgOwae', 'YVs16UFKkXbQy', 'Tunai', '2023-10-30', '0000-00-00', '2023-10-30 07:16:55'),
('23100025', '22000', '8cxHJ92vgOwae', 'YVs16UFKkXbQy', 'Tunai', '2023-10-30', '0000-00-00', '2023-10-30 07:17:07'),
('23100026', '2000', '8cxHJ92vgOwae', 'YVs16UFKkXbQy', 'Tunai', '2023-10-30', '0000-00-00', '2023-10-30 07:17:11'),
('23100027', '2000', '8cxHJ92vgOwae', 'YVs16UFKkXbQy', 'Tunai', '2023-10-30', '0000-00-00', '2023-10-30 07:17:14'),
('23100028', '2000', '8cxHJ92vgOwae', 'YVs16UFKkXbQy', 'Tunai', '2023-10-30', '0000-00-00', '2023-10-30 07:17:17'),
('23100029', '2000', '8cxHJ92vgOwae', 'YVs16UFKkXbQy', 'Tunai', '2023-10-30', '0000-00-00', '2023-10-30 07:17:20'),
('23100030', '2000', '8cxHJ92vgOwae', 'YVs16UFKkXbQy', 'Tunai', '2023-10-30', '0000-00-00', '2023-10-30 07:17:22'),
('23110001', '33002', '8cxHJ92vgOwae', 'YVs16UFKkXbQy', 'Tunai', '2023-11-30', '0000-00-00', '2023-11-30 04:28:27'),
('23110002', '1000', '8cxHJ92vgOwae', 'YVs16UFKkXbQy', 'Tunai', '2023-11-30', '0000-00-00', '2023-11-30 06:28:23'),
('23110003', '24', '8cxHJ92vgOwae', 'YVs16UFKkXbQy', 'Tunai', '2023-11-30', '0000-00-00', '2023-11-30 06:35:34'),
('23110004', '14022', '8cxHJ92vgOwae', 'YVs16UFKkXbQy', 'Tunai', '2023-11-30', '0000-00-00', '2023-11-30 06:35:44'),
('23110005', '2000', '8cxHJ92vgOwae', 'YVs16UFKkXbQy', 'Tunai', '2023-11-30', '0000-00-00', '2023-11-30 07:02:12'),
('23110006', '2000', '8cxHJ92vgOwae', 'YVs16UFKkXbQy', 'Tunai', '2023-11-30', '0000-00-00', '2023-11-30 07:03:08'),
('23110007', '2000', '8cxHJ92vgOwae', 'YVs16UFKkXbQy', 'Tunai', '2023-11-30', '0000-00-00', '2023-11-30 07:10:07'),
('23110008', '4000', '8cxHJ92vgOwae', 'YVs16UFKkXbQy', 'Tunai', '2023-12-01', '0000-00-00', '2023-11-30 07:10:22'),
('23110009', '159000', '8cxHJ92vgOwae', 'YVs16UFKkXbQy', 'Tunai', '2023-12-01', '0000-00-00', '2023-11-30 07:10:53'),
('23110010', '371000', '8cxHJ92vgOwae', 'YVs16UFKkXbQy', 'Tunai', '2023-12-02', '0000-00-00', '2023-11-30 07:11:08'),
('23120011', '2000', '8cxHJ92vgOwae', 'YVs16UFKkXbQy', 'Tunai', '2023-12-30', '0000-00-00', '2023-12-30 07:12:25'),
('23120012', '4000', '8cxHJ92vgOwae', 'YVs16UFKkXbQy', 'Tunai', '2023-12-30', '0000-00-00', '2023-12-30 07:12:28'),
('23120013', '44000', '8cxHJ92vgOwae', 'YVs16UFKkXbQy', 'Tunai', '2023-12-30', '0000-00-00', '2023-12-30 07:12:33'),
('23120014', '4000', '8cxHJ92vgOwae', 'YVs16UFKkXbQy', 'Tunai', '2023-12-30', '0000-00-00', '2023-12-30 07:12:36'),
('23120015', '4000', '8cxHJ92vgOwae', 'YVs16UFKkXbQy', 'Tunai', '2023-12-30', '0000-00-00', '2023-12-30 07:12:39'),
('23120016', '4000', '8cxHJ92vgOwae', 'YVs16UFKkXbQy', 'Tunai', '2023-12-30', '0000-00-00', '2023-12-30 07:12:42'),
('23120017', '2000', '8cxHJ92vgOwae', 'YVs16UFKkXbQy', 'Tunai', '2023-12-30', '0000-00-00', '2023-12-30 07:12:45'),
('23120018', '4000', '8cxHJ92vgOwae', 'YVs16UFKkXbQy', 'Tunai', '2023-12-30', '0000-00-00', '2023-12-30 07:12:50'),
('23120019', '4000', '8cxHJ92vgOwae', 'YVs16UFKkXbQy', 'Tunai', '2023-12-30', '0000-00-00', '2023-12-30 07:12:53'),
('23120020', '1998000', '8cxHJ92vgOwae', 'YVs16UFKkXbQy', 'Tunai', '2023-12-30', '0000-00-00', '2023-12-30 07:16:11'),
('23120021', '4000', '8cxHJ92vgOwae', 'YVs16UFKkXbQy', 'Tunai', '2023-12-30', '0000-00-00', '2023-10-30 07:16:30');

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
('gjoGanWpDVIO6', 'Operator', 'operator', '$2y$10$LssgLbz.4D4iSTD3jfOTvufsRdr0wEpSsSTpReHbXki.mXu2n1bjy', '2', '', '1', 'YVs16UFKkXbQy', 'YVs16UFKkXbQy', '2023-11-30', '2023-11-30', '2023-11-30 02:48:15'),
('YVs16UFKkXbQy', 'Habib Abdillah', 'admin', '$2y$10$CKX3JQ0/YTliB2Pg49TEGOWqUI9LdTL7HZkKbVTkYvzis8wdpS6M.', '1', '', '1', 'YVs16UFKkXbQy', 'YVs16UFKkXbQy', '2023-11-30', '2023-11-30', '2023-11-30 02:47:00');

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
('23vD6msMXeluT', 'admin', '::1', '2023-09-30 07:18:10', 'INPUT DATA TRANSAKSI', '23090040', 'BERHASIL'),
('2NpfPGYMaiLXe', 'admin', '::1', '2023-12-30 07:12:39', 'INPUT DATA TRANSAKSI', '23120015', 'BERHASIL'),
('2zX74TVEfCKhW', 'admin', '::1', '2023-11-30 07:26:04', 'LOGIN USER', 'YVs16UFKkXbQy', 'BERHASIL'),
('4M162cWjCdRnu', 'admin', '::1', '2023-11-30 07:31:00', 'LOGIN USER', 'YVs16UFKkXbQy', 'BERHASIL'),
('8ZmpcgwxCQFEn', 'admin', '::1', '2023-10-30 07:17:07', 'INPUT DATA TRANSAKSI', '23100025', 'BERHASIL'),
('9D2ljgW8J7VvI', 'admin', '::1', '2023-12-30 07:16:11', 'INPUT DATA TRANSAKSI', '23120020', 'BERHASIL'),
('9OQAntrMWYe4o', 'admin', '::1', '2023-09-30 07:17:52', 'INPUT DATA TRANSAKSI', '23090034', 'BERHASIL'),
('BEsY2Nc3FtapC', 'admin', '::1', '2023-10-30 07:16:39', 'INPUT DATA TRANSAKSI', '23100023', 'BERHASIL'),
('c7g2yZfHYuOG6', 'admin', '::1', '2023-10-30 07:17:14', 'INPUT DATA TRANSAKSI', '23100027', 'BERHASIL'),
('cHhMWGd8UsRtx', 'admin', '::1', '2023-11-30 06:59:41', 'INPUT DATA TRANSAKSI', '23110005', 'BERHASIL'),
('DSjHOvCkpaUKn', 'admin', '::1', '2023-12-30 07:12:42', 'INPUT DATA TRANSAKSI', '23120016', 'BERHASIL'),
('DvzUxJNf0Femo', 'admin', '::1', '2023-11-30 07:02:12', 'INPUT DATA TRANSAKSI', '23110005', 'BERHASIL'),
('ER9DJYedvs8zj', 'admin', '::1', '2023-09-30 07:18:02', 'INPUT DATA TRANSAKSI', '23090037', 'BERHASIL'),
('F6g7XDUE98Tkb', 'admin', '::1', '2023-12-30 07:12:36', 'INPUT DATA TRANSAKSI', '23120014', 'BERHASIL'),
('fHa2e1qcJYtzo', 'admin', '::1', '2023-11-30 06:35:44', 'INPUT DATA TRANSAKSI', '23110004', 'BERHASIL'),
('FJoYuPRXvMyIz', 'admin', '::1', '2023-11-30 04:28:18', 'LOGIN USER', 'YVs16UFKkXbQy', 'BERHASIL'),
('FkgTdpbafcSQx', 'admin', '::1', '2023-10-30 07:17:22', 'INPUT DATA TRANSAKSI', '23100030', 'BERHASIL'),
('g3o8vTHlfbrMY', 'admin', '::1', '2023-12-30 07:12:53', 'INPUT DATA TRANSAKSI', '23120019', 'BERHASIL'),
('haigETG9YykRO', 'admin', '::1', '2023-11-30 04:28:27', 'INPUT DATA TRANSAKSI', '23110001', 'BERHASIL'),
('hal8Gmw4JUrfQ', 'admin', '::1', '2023-11-30 06:50:57', 'INPUT DATA TRANSAKSI', '23110006', 'BERHASIL'),
('HrCUpa7BVjy2x', 'admin', '::1', '2023-11-30 06:43:25', 'LOGIN USER', 'YVs16UFKkXbQy', 'BERHASIL'),
('hu4XSnQgbTa3e', 'admin', '::1', '2023-11-30 07:11:08', 'INPUT DATA TRANSAKSI', '23110010', 'BERHASIL'),
('ICdmE4DF8LSYl', 'admin', '::1', '2023-11-30 07:02:21', 'INPUT DATA TRANSAKSI', '23110006', 'BERHASIL'),
('iF2IDE0Rhr9LW', 'admin', '::1', '2023-11-30 06:45:06', 'INPUT DATA TRANSAKSI', '23110006', 'BERHASIL'),
('itefsmnGhRApb', 'admin', '::1', '2023-09-30 07:18:18', 'INPUT DATA TRANSAKSI', '23090042', 'BERHASIL'),
('jf6giz3RM7yqE', 'admin', '::1', '2023-12-30 07:11:53', 'LOGIN USER', 'YVs16UFKkXbQy', 'BERHASIL'),
('jIxVkRUcA2FrG', 'admin', '::1', '2023-11-30 06:40:32', 'INPUT DATA TRANSAKSI', '23110005', 'BERHASIL'),
('KhCJE1nSyQY36', 'admin', '::1', '2023-10-30 07:17:11', 'INPUT DATA TRANSAKSI', '23100026', 'BERHASIL'),
('KLPYoVvtR1mQy', 'operator', '::1', '2023-11-30 06:33:34', 'LOGIN USER', 'gjoGanWpDVIO6', 'GAGAL'),
('KQrqTcgzMahDA', 'admin', '::1', '2023-09-30 07:18:14', 'INPUT DATA TRANSAKSI', '23090041', 'BERHASIL'),
('KRl5S2YDwvtns', 'admin', '::1', '2023-09-30 07:17:43', 'INPUT DATA TRANSAKSI', '23090031', 'BERHASIL'),
('m54pfSv1blheo', 'admin', '::1', '2023-11-30 06:57:38', 'INPUT DATA TRANSAKSI', '23110008', 'BERHASIL'),
('mpZnQKeTkIF4b', 'admin', '::1', '2023-11-30 07:10:07', 'INPUT DATA TRANSAKSI', '23110007', 'BERHASIL'),
('nENaVTyPGc59x', 'admin', '::1', '2023-11-30 07:03:35', 'INPUT DATA TRANSAKSI', '23110008', 'BERHASIL'),
('NHwxzGdTc4gK8', 'admin', '::1', '2023-10-30 07:17:20', 'INPUT DATA TRANSAKSI', '23100029', 'BERHASIL'),
('nLCi3q9WyDEz4', 'admin', '::1', '2023-11-30 07:10:22', 'INPUT DATA TRANSAKSI', '23110008', 'BERHASIL'),
('O10FGnbjlcpUm', 'admin', '::1', '2023-11-30 06:55:28', 'INPUT DATA TRANSAKSI', '23110007', 'BERHASIL'),
('Obmeajt7WfdC0', 'admin', '::1', '2023-09-30 07:17:46', 'INPUT DATA TRANSAKSI', '23090032', 'BERHASIL'),
('OGbeJ3CRnoINK', 'admin', '::1', '2023-12-30 07:12:28', 'INPUT DATA TRANSAKSI', '23120012', 'BERHASIL'),
('OgBulA42iWZ6K', 'admin', '::1', '2023-09-30 07:18:05', 'INPUT DATA TRANSAKSI', '23090038', 'BERHASIL'),
('OlDUzAcjs5For', 'admin', '::1', '2023-11-30 06:33:41', 'LOGIN USER', 'YVs16UFKkXbQy', 'BERHASIL'),
('Q9KCwjcf2nLop', 'admin', '::1', '2023-11-30 06:35:34', 'INPUT DATA TRANSAKSI', '23110003', 'BERHASIL'),
('qEFngraGvxjQw', 'admin', '::1', '2023-12-30 07:12:45', 'INPUT DATA TRANSAKSI', '23120017', 'BERHASIL'),
('R7Uyeo4nlMHL6', 'operator', '::1', '2023-11-30 06:34:00', 'LOGIN USER', 'gjoGanWpDVIO6', 'BERHASIL'),
('rFWLjauXJb0t2', 'admin', '::1', '2023-09-30 07:17:56', 'INPUT DATA TRANSAKSI', '23090035', 'BERHASIL'),
('s3SVNAOv6kW59', 'admin', '::1', '2023-11-28 11:18:03', 'INPUT DATA TRANSAKSI', 'M0026', 'BERHASIL'),
('S3z6wYrsThj4b', 'admin', '::1', '2023-11-28 22:40:32', 'LOGIN USER', 'KBOHCAc0YibP2', 'BERHASIL'),
('sBnASeXjVcgPy', 'admin1', '::1', '2023-11-27 01:54:31', 'INPUT DATA TRANSAKSI', '23424234234', 'BERHASIL'),
('sFuLM7jZPqgHx', 'admin1', '::1', '2023-11-27 02:19:56', 'INPUT DATA TRANSAKSI', '23424234234', 'BERHASIL'),
('sot6p14D0NrQ5', 'admin', '::1', '2023-11-30 06:35:18', 'LOGIN USER', 'YVs16UFKkXbQy', 'BERHASIL'),
('srf0qAOXQ2lbg', 'admin1', '::1', '2023-11-24 03:37:05', 'INPUT DATA TRANSAKSI', '23424234234', 'BERHASIL'),
('SuIvsObA9mh71', 'admin1', '::1', '2023-11-24 06:46:16', 'INPUT DATA TRANSAKSI', '23424234234', 'BERHASIL'),
('sVm7Gfdj0XbAO', 'admin1', '::1', '2023-11-27 02:45:20', 'INPUT DATA PEMBAYARAN', '23424234234', 'BERHASIL'),
('sw9aqBC8fyDun', 'admin1', '::1', '2023-11-27 21:37:58', 'INPUT DATA PEMBAYARAN', '23424234234', 'BERHASIL'),
('SWLQeXzpkuGUg', 'admin', '::1', '2023-12-30 07:12:50', 'INPUT DATA TRANSAKSI', '23120018', 'BERHASIL'),
('t3COBwi9yemfr', 'admin1', '::1', '2023-11-27 01:59:04', 'INPUT DATA TRANSAKSI', '23424234234', 'BERHASIL'),
('T7ofy0n8GImXg', 'admin1', '::1', '2023-11-24 03:55:32', 'INPUT DATA TRANSAKSI', '23424234234', 'BERHASIL'),
('T9cnpgtMuZI8Y', 'admin1', '::1', '2023-11-27 12:32:02', 'INPUT DATA USER', '23424234234', 'BERHASIL'),
('TFd2XMxB7OfYC', 'admin1', '::1', '2023-11-28 01:49:44', 'INPUT DATA PELAYANAN', '23424234234', 'BERHASIL'),
('TgqFK8JGfjBWC', 'admin', '::1', '2023-12-30 01:31:34', 'INPUT DATA TRANSAKSI', 'M0037', 'BERHASIL'),
('tiNDhUMV6TFdo', 'admin1', '::1', '2023-11-27 21:12:27', 'INPUT DATA TRANSAKSI', '23424234234', 'BERHASIL'),
('TIwyJtV9b4lLS', 'admin1', '::1', '2023-11-27 02:44:53', 'INPUT DATA PEMBAYARAN', '23424234234', 'BERHASIL'),
('TlMpeQHLAjtrS', 'admin', '::1', '2023-10-30 07:16:36', 'INPUT DATA TRANSAKSI', '23100022', 'BERHASIL'),
('TMWGt4IdP9BHp', 'admin', '::1', '2023-11-30 02:30:18', 'LOGIN USER', 'KBOHCAc0YibP2', 'GAGAL'),
('TNAOztK8dqFUr', 'admin1', '::1', '2023-11-24 08:26:32', 'LOGIN USER', '23424234234', 'BERHASIL'),
('TslQI1jVyznSt', 'admin', '::1', '2023-09-30 07:17:59', 'INPUT DATA TRANSAKSI', '23090036', 'BERHASIL'),
('TSPwRy2K3vAbn', 'admin1', '::1', '2023-11-27 02:03:07', 'INPUT DATA TRANSAKSI', '23424234234', 'BERHASIL'),
('TtHAocV9QRkd6', 'admin1', '::1', '2023-11-28 01:49:47', 'HAPUS DATA PELAYANAN', '23424234234', 'BERHASIL'),
('TtWia5CwofUp2', 'admin', '::1', '2023-11-30 02:32:47', 'HAPUS DATA PEMBAYARAN', 'KBOHCAc0YibP2', 'BERHASIL'),
('TWuGILApVad7h', 'admin1', '::1', '2023-11-24 03:55:30', 'INPUT DATA TRANSAKSI', '23424234234', 'BERHASIL'),
('u0TCwNe5GqAW9', 'admin1', '::1', '2023-11-27 13:12:49', 'RUBAH PASSWORD USER', '23424234234', 'BERHASIL'),
('UdBAOHYgS1yhu', 'admin', '::1', '2023-11-30 02:46:03', 'EDIT DATA USER', 'KBOHCAc0YibP2', 'BERHASIL'),
('UDmW8aFswqHXL', 'admin', '::1', '2023-11-30 06:33:51', 'RUBAH PASSWORD USER', 'YVs16UFKkXbQy', 'BERHASIL'),
('uHMBo5p7UXT1t', 'admin', '::1', '2023-11-30 06:55:46', 'EDIT DATA PELAYANAN', 'YVs16UFKkXbQy', 'BERHASIL'),
('uIVGpjTeRJEdZ', 'admin', '::1', '2023-11-30 02:45:46', 'EDIT DATA USER', 'KBOHCAc0YibP2', 'BERHASIL'),
('umpKFHjCO4hZq', 'admin1', '::1', '2023-11-26 23:50:37', 'EDIT DATA PEMBAYARAN', '23424234234', 'BERHASIL'),
('us5rCikIJtSgH', 'admin1', '::1', '2023-11-24 03:36:45', 'INPUT DATA TRANSAKSI', '23424234234', 'BERHASIL'),
('uTeCUwtRy8W5L', 'admin1', '::1', '2023-11-27 12:23:40', 'HAPUS DATA PEMBAYARAN', '23424234234', 'BERHASIL'),
('v05bQTGOSjWRd', 'admin', '::1', '2023-09-30 07:18:07', 'INPUT DATA TRANSAKSI', '23090039', 'BERHASIL'),
('V13LliagW2Y7w', 'admin1', '::1', '2023-11-24 01:52:24', 'INPUT DATA TRANSAKSI', '23424234234', 'BERHASIL'),
('vA8I5NLoitE2Z', 'admin1', '::1', '2023-11-27 01:58:02', 'INPUT DATA TRANSAKSI', '23424234234', 'BERHASIL'),
('VAH0KgfbTd5h1', 'admin', '::1', '2023-11-30 07:10:53', 'INPUT DATA TRANSAKSI', '23110009', 'BERHASIL'),
('VbxaUcnI1COtu', 'admin', '::1', '2023-10-30 07:16:30', 'INPUT DATA TRANSAKSI', '23120021', 'BERHASIL'),
('vi5udr7BIwUxl', 'admin1', '::1', '2023-11-27 01:58:33', 'INPUT DATA TRANSAKSI', '23424234234', 'BERHASIL'),
('vkG6alwMpq1sO', 'admin1', '::1', '2023-11-27 02:59:54', 'INPUT DATA TRANSAKSI', '23424234234', 'BERHASIL'),
('VkvHPRUzSMc0j', 'admin1', '::1', '2023-11-27 11:47:24', 'LOGIN USER', '23424234234', 'BERHASIL'),
('vothpi3YLfBTl', 'admin1', '::1', '2023-11-28 01:49:37', 'EDIT DATA PELAYANAN', '23424234234', 'BERHASIL'),
('vT3kgYPbfJGNl', 'admin1', '::1', '2023-11-27 13:13:22', 'HAPUS DATA PEMBAYARAN', '23424234234', 'BERHASIL'),
('VucOmeQzwZCrN', 'admin', '::1', '2023-11-24 04:12:25', 'LOGIN USER', 'KBOHCAc0YibP2', 'BERHASIL'),
('VXpndGhcxlkm6', 'admin', '::1', '2023-12-30 07:12:33', 'INPUT DATA TRANSAKSI', '23120013', 'BERHASIL'),
('VZkRMUIf6OrWN', 'admin1', '::1', '2023-11-24 02:03:50', 'INPUT DATA TRANSAKSI', '23424234234', 'BERHASIL'),
('w42MTsBcYO0a1', 'admin', '::1', '2023-09-30 07:18:22', 'INPUT DATA TRANSAKSI', '23090043', 'BERHASIL'),
('wbKM4kTrPxAt5', 'admin1', '::1', '2023-11-24 02:03:50', 'INPUT DATA TRANSAKSI', '23424234234', 'BERHASIL'),
('wbKt17oYCpAe6', 'admin1', '::1', '2023-11-24 03:29:57', 'INPUT DATA TRANSAKSI', '23424234234', 'BERHASIL'),
('WBRv6h7a8dxIb', 'admin1', '::1', '2023-11-28 01:55:20', 'INPUT DATA USER', '23424234234', 'BERHASIL'),
('whA7PngJBWtZr', 'admin1', '::1', '2023-11-24 03:36:44', 'INPUT DATA TRANSAKSI', '23424234234', 'BERHASIL'),
('wjEOme794HpqX', 'admin1', '::1', '2023-11-27 02:01:49', 'INPUT DATA TRANSAKSI', '23424234234', 'BERHASIL'),
('wJSQ8Maxe7shG', 'admin', '::1', '2023-11-30 06:28:23', 'INPUT DATA TRANSAKSI', '23110002', 'BERHASIL'),
('wM9FH2D6lTO4C', 'admin', '::1', '2023-11-30 04:11:27', 'INPUT DATA TRANSAKSI', 'M0045', 'BERHASIL'),
('wOgiX1p2TNYue', 'admin1', '::1', '2023-11-27 12:59:40', 'INPUT DATA USER', '23424234234', 'BERHASIL'),
('WqgNxZlIebSfC', 'admin1', '::1', '2023-11-27 13:13:03', 'EDIT DATA PELANGGAN', '23424234234', 'BERHASIL'),
('WqhVoCi2v85cN', 'admin', '::1', '2023-11-30 03:10:57', 'INPUT DATA TRANSAKSI', 'M0042', 'BERHASIL'),
('wRpOekLJAu8Vv', 'admin1', '::1', '2023-11-27 01:54:55', 'INPUT DATA TRANSAKSI', '23424234234', 'BERHASIL'),
('XF6tnw4vmgdxk', 'admin', '::1', '2023-11-30 02:25:36', 'INPUT DATA TRANSAKSI', 'M0039', 'BERHASIL'),
('xKBZUbWL28Rsa', 'admin', '::1', '2023-10-29 02:55:15', 'INPUT DATA TRANSAKSI', 'M0034', 'BERHASIL'),
('xKjEe0W7g4XwC', 'admin', '::1', '2023-11-24 04:23:12', 'LOGIN USER', 'KBOHCAc0YibP2', 'BERHASIL'),
('XmjFnoCI5hBNs', 'admin', '::1', '2023-12-30 07:12:25', 'INPUT DATA TRANSAKSI', '23120011', 'BERHASIL'),
('xniB4AhUDoCbY', 'admin', '::1', '2023-11-30 07:03:14', 'INPUT DATA TRANSAKSI', '23110007', 'BERHASIL'),
('xnw1crPklijXq', 'admin1', '::1', '2023-11-26 23:09:10', 'INPUT DATA PELANGGAN', '23424234234', 'BERHASIL'),
('xoGdkMTfbECaB', 'admin1', '::1', '2023-11-27 02:21:05', 'INPUT DATA TRANSAKSI', '23424234234', 'BERHASIL'),
('xrVTdI32yptA0', 'admin', '::1', '2023-10-30 07:16:55', 'INPUT DATA TRANSAKSI', '23100024', 'BERHASIL'),
('XsSLAhmCaQY3B', 'admin', '::1', '2023-11-30 07:03:08', 'INPUT DATA TRANSAKSI', '23110006', 'BERHASIL'),
('XwMYbtODcu4pS', 'admin1', '::1', '2023-11-26 23:44:01', 'INPUT DATA PEMBAYARAN', '23424234234', 'BERHASIL'),
('y1z69hCnMckXa', 'admin1', '::1', '2023-11-24 01:34:07', 'INPUT DATA TRANSAKSI', '23424234234', 'BERHASIL'),
('y3MHoDGn5aimX', 'admin1', '::1', '2023-11-27 13:03:00', 'EDIT DATA USER', '23424234234', 'BERHASIL'),
('Y916Djqgiu8oO', 'admin', '::1', '2023-11-30 06:36:16', 'INPUT DATA TRANSAKSI', '23110005', 'BERHASIL'),
('yfVaoErBUlYpJ', 'admin1', '::1', '2023-11-27 02:20:05', 'INPUT DATA TRANSAKSI', '23424234234', 'BERHASIL'),
('ygbF4H7fErzVI', 'admin1', '::1', '2023-11-27 02:00:57', 'INPUT DATA TRANSAKSI', '23424234234', 'BERHASIL'),
('Yieg6y0dsoIM3', 'admin1', '::1', '2023-11-27 02:03:48', 'INPUT DATA TRANSAKSI', '23424234234', 'BERHASIL'),
('YlaI7S3vtmAJj', 'admin1', '::1', '2023-11-27 02:20:21', 'INPUT DATA TRANSAKSI', '23424234234', 'BERHASIL'),
('YmyEdA95ZOh0b', 'admin', '::1', '2023-10-30 07:17:17', 'INPUT DATA TRANSAKSI', '23100028', 'BERHASIL'),
('YodKOpeQqRJB3', 'admin', '::1', '2023-11-28 14:42:29', 'LOGIN USER', 'KBOHCAc0YibP2', 'BERHASIL'),
('YOKJiW35ftQ07', 'admin1', '::1', '2023-11-25 16:42:13', 'LOGIN USER', '23424234234', 'BERHASIL'),
('yps5BtfrEmhlk', 'admin', '::1', '2023-09-30 07:17:49', 'INPUT DATA TRANSAKSI', '23090033', 'BERHASIL'),
('yrPYDqBQjtp7A', 'operator1', '::1', '2023-11-27 04:14:27', 'INPUT DATA TRANSAKSI', '234242342333', 'BERHASIL'),
('YWXfxZpnK5AH3', 'admin1', '::1', '2023-11-26 23:26:41', 'EDIT DATA PELANGGAN', '23424234234', 'BERHASIL'),
('yx2tQ4UhvNcFw', 'admin1', '::1', '2023-11-24 08:31:15', 'LOGIN USER', '23424234234', 'BERHASIL'),
('Z39Y06ULbad5H', 'admin1', '::1', '2023-11-21 22:58:00', 'LOGIN USER', '23424234234', 'BERHASIL'),
('z4lsOhdB1YQmf', 'admin1', '::1', '2023-11-23 22:31:40', 'INPUT DATA TRANSAKSI', '23424234234', 'BERHASIL'),
('Z4vWd5OVyksTM', 'admin', '::1', '2023-11-30 02:32:05', 'HAPUS DATA PELANGGAN', 'KBOHCAc0YibP2', 'BERHASIL'),
('zaK61qfwXehF5', 'admin', '::1', '2023-09-30 01:37:06', 'LOGIN USER', 'KBOHCAc0YibP2', 'BERHASIL'),
('zb43v8NFsUj0R', 'admin1', '::1', '2023-11-26 23:52:05', 'HAPUS DATA PEMBAYARAN', '23424234234', 'BERHASIL'),
('zbyQtPLhr6D0g', 'admin', '::1', '2023-11-30 01:39:03', 'LOGIN USER', 'KBOHCAc0YibP2', 'BERHASIL'),
('zDWPYS0QJ2ORU', 'admin1', '::1', '2023-11-27 21:38:01', 'HAPUS DATA PEMBAYARAN', '23424234234', 'BERHASIL'),
('zETBdJMcrntvp', 'admin1', '::1', '2023-11-24 01:31:37', 'INPUT DATA TRANSAKSI', '23424234234', 'BERHASIL'),
('ZjdCwpQfH6RxL', 'admin1', '::1', '2023-11-27 13:13:05', 'HAPUS DATA PELANGGAN', '23424234234', 'BERHASIL'),
('zjSlDoEau1WRJ', 'admin', '::1', '2023-11-28 07:38:56', 'LOGIN USER', 'KBOHCAc0YibP2', 'BERHASIL'),
('zrhPsRkHC3EnN', 'admin1', '::1', '2023-11-24 01:56:01', 'INPUT DATA TRANSAKSI', '23424234234', 'BERHASIL'),
('zw3tHXJ8MfU5A', 'admin', '::1', '2023-11-30 06:28:38', 'HAPUS DATA PELAYANAN', 'YVs16UFKkXbQy', 'BERHASIL');

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
('23110001', 'fsafsdfsdfsfse', 'Fotocopy Warna BB', '2', '1', '2', '2023-11-30', '2023-11-30', '2023-11-30 04:28:27'),
('23110001', 'kjasdfjhasdjsah', 'Fotocopy Warna', '3000', '11', '33000', '2023-11-30', '2023-11-30', '2023-11-30 04:28:27'),
('23110002', 'QKGEONfw1bl5j', 'Scan Berkas', '1000', '1', '1000', '2023-11-30', '2023-11-30', '2023-11-30 06:28:23'),
('23110003', 'fsafsdfsdfsfse', 'Fotocopy Warna BB', '2', '12', '24', '2023-11-30', '2023-11-30', '2023-11-30 06:35:34'),
('23110004', 'kjasdfjhasdjsah', 'Fotocopy Warna', '3000', '1', '3000', '2023-11-30', '2023-11-30', '2023-11-30 06:35:44'),
('23110004', 'QKGEONfw1bl5j', 'Scan Berkas', '1000', '11', '11000', '2023-11-30', '2023-11-30', '2023-11-30 06:35:44'),
('23110004', 'fsafsdfsdfsfse', 'Fotocopy Warna BB', '2', '11', '22', '2023-11-30', '2023-11-30', '2023-11-30 06:35:44'),
('23110005', 'fsafsdfsdfsfse', 'Fotocopy Warna BB', '2000', '1', '2000', '2023-11-30', '2023-11-30', '2023-11-30 07:02:12'),
('23110006', 'fsafsdfsdfsfse', 'Fotocopy Warna BB', '2000', '1', '2000', '2023-11-30', '2023-11-30', '2023-11-30 07:03:08'),
('23110007', 'fsafsdfsdfsfse', 'Fotocopy Warna BB', '2000', '1', '2000', '2023-11-30', '2023-11-30', '2023-11-30 07:10:07'),
('23110008', 'fsafsdfsdfsfse', 'Fotocopy Warna BB', '2000', '2', '4000', '2023-11-30', '2023-11-30', '2023-11-30 07:10:21'),
('23110009', 'fsafsdfsdfsfse', 'Fotocopy Warna BB', '2000', '1', '2000', '2023-11-30', '2023-11-30', '2023-11-30 07:10:53'),
('23110009', 'kjasdfjhasdjsah', 'Fotocopy Warna', '3000', '12', '36000', '2023-11-30', '2023-11-30', '2023-11-30 07:10:53'),
('23110009', 'QKGEONfw1bl5j', 'Scan Berkas', '1000', '121', '121000', '2023-11-30', '2023-11-30', '2023-11-30 07:10:53'),
('23110010', 'fsafsdfsdfsfse', 'Fotocopy Warna BB', '2000', '1', '2000', '2023-11-30', '2023-11-30', '2023-11-30 07:11:08'),
('23110010', 'kjasdfjhasdjsah', 'Fotocopy Warna', '3000', '122', '366000', '2023-11-30', '2023-11-30', '2023-11-30 07:11:08'),
('23110010', 'QKGEONfw1bl5j', 'Scan Berkas', '1000', '3', '3000', '2023-11-30', '2023-11-30', '2023-11-30 07:11:08'),
('23120011', 'fsafsdfsdfsfse', 'Fotocopy Warna BB', '2000', '1', '2000', '2023-12-30', '2023-12-30', '2023-12-30 07:12:25'),
('23120012', 'fsafsdfsdfsfse', 'Fotocopy Warna BB', '2000', '2', '4000', '2023-12-30', '2023-12-30', '2023-12-30 07:12:28'),
('23120013', 'fsafsdfsdfsfse', 'Fotocopy Warna BB', '2000', '22', '44000', '2023-12-30', '2023-12-30', '2023-12-30 07:12:33'),
('23120014', 'fsafsdfsdfsfse', 'Fotocopy Warna BB', '2000', '2', '4000', '2023-12-30', '2023-12-30', '2023-12-30 07:12:36'),
('23120015', 'fsafsdfsdfsfse', 'Fotocopy Warna BB', '2000', '2', '4000', '2023-12-30', '2023-12-30', '2023-12-30 07:12:39'),
('23120016', 'fsafsdfsdfsfse', 'Fotocopy Warna BB', '2000', '2', '4000', '2023-12-30', '2023-12-30', '2023-12-30 07:12:42'),
('23120017', 'fsafsdfsdfsfse', 'Fotocopy Warna BB', '2000', '1', '2000', '2023-12-30', '2023-12-30', '2023-12-30 07:12:45'),
('23120018', 'fsafsdfsdfsfse', 'Fotocopy Warna BB', '2000', '2', '4000', '2023-12-30', '2023-12-30', '2023-12-30 07:12:50'),
('23120019', 'fsafsdfsdfsfse', 'Fotocopy Warna BB', '2000', '2', '4000', '2023-12-30', '2023-12-30', '2023-12-30 07:12:53'),
('23120020', 'fsafsdfsdfsfse', 'Fotocopy Warna BB', '2000', '999', '1998000', '2023-12-30', '2023-12-30', '2023-12-30 07:16:11'),
('23120021', 'fsafsdfsdfsfse', 'Fotocopy Warna BB', '2000', '2', '4000', '2023-10-30', '2023-10-30', '2023-10-30 07:16:30'),
('23100022', 'fsafsdfsdfsfse', 'Fotocopy Warna BB', '2000', '22', '44000', '2023-10-30', '2023-10-30', '2023-10-30 07:16:36'),
('23100023', 'fsafsdfsdfsfse', 'Fotocopy Warna BB', '2000', '22', '44000', '2023-10-30', '2023-10-30', '2023-10-30 07:16:39'),
('23100024', 'fsafsdfsdfsfse', 'Fotocopy Warna BB', '2000', '12121', '24242000', '2023-10-30', '2023-10-30', '2023-10-30 07:16:55'),
('23100025', 'fsafsdfsdfsfse', 'Fotocopy Warna BB', '2000', '11', '22000', '2023-10-30', '2023-10-30', '2023-10-30 07:17:07'),
('23100026', 'fsafsdfsdfsfse', 'Fotocopy Warna BB', '2000', '1', '2000', '2023-10-30', '2023-10-30', '2023-10-30 07:17:11'),
('23100027', 'fsafsdfsdfsfse', 'Fotocopy Warna BB', '2000', '1', '2000', '2023-10-30', '2023-10-30', '2023-10-30 07:17:14'),
('23100028', 'fsafsdfsdfsfse', 'Fotocopy Warna BB', '2000', '1', '2000', '2023-10-30', '2023-10-30', '2023-10-30 07:17:17'),
('23100029', 'fsafsdfsdfsfse', 'Fotocopy Warna BB', '2000', '1', '2000', '2023-10-30', '2023-10-30', '2023-10-30 07:17:20'),
('23100030', 'fsafsdfsdfsfse', 'Fotocopy Warna BB', '2000', '1', '2000', '2023-10-30', '2023-10-30', '2023-10-30 07:17:22'),
('23090031', 'fsafsdfsdfsfse', 'Fotocopy Warna BB', '2000', '2', '4000', '2023-09-30', '2023-09-30', '2023-09-30 07:17:43'),
('23090032', 'fsafsdfsdfsfse', 'Fotocopy Warna BB', '2000', '1', '2000', '2023-09-30', '2023-09-30', '2023-09-30 07:17:46'),
('23090033', 'fsafsdfsdfsfse', 'Fotocopy Warna BB', '2000', '1', '2000', '2023-09-30', '2023-09-30', '2023-09-30 07:17:49'),
('23090034', 'fsafsdfsdfsfse', 'Fotocopy Warna BB', '2000', '2', '4000', '2023-09-30', '2023-09-30', '2023-09-30 07:17:52'),
('23090035', 'fsafsdfsdfsfse', 'Fotocopy Warna BB', '2000', '2', '4000', '2023-09-30', '2023-09-30', '2023-09-30 07:17:55'),
('23090036', 'fsafsdfsdfsfse', 'Fotocopy Warna BB', '2000', '3', '6000', '2023-09-30', '2023-09-30', '2023-09-30 07:17:59'),
('23090037', 'fsafsdfsdfsfse', 'Fotocopy Warna BB', '2000', '2', '4000', '2023-09-30', '2023-09-30', '2023-09-30 07:18:01'),
('23090038', 'fsafsdfsdfsfse', 'Fotocopy Warna BB', '2000', '2', '4000', '2023-09-30', '2023-09-30', '2023-09-30 07:18:05'),
('23090039', 'fsafsdfsdfsfse', 'Fotocopy Warna BB', '2000', '1', '2000', '2023-09-30', '2023-09-30', '2023-09-30 07:18:07'),
('23090040', 'fsafsdfsdfsfse', 'Fotocopy Warna BB', '2000', '2', '4000', '2023-09-30', '2023-09-30', '2023-09-30 07:18:10'),
('23090041', 'fsafsdfsdfsfse', 'Fotocopy Warna BB', '2000', '2', '4000', '2023-09-30', '2023-09-30', '2023-09-30 07:18:14'),
('23090042', 'fsafsdfsdfsfse', 'Fotocopy Warna BB', '2000', '2', '4000', '2023-09-30', '2023-09-30', '2023-09-30 07:18:18'),
('23090043', 'fsafsdfsdfsfse', 'Fotocopy Warna BB', '2000', '4', '8000', '2023-09-30', '2023-09-30', '2023-09-30 07:18:22');

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
