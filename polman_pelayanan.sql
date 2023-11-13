-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 14, 2023 at 12:16 AM
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
('1i3RKgVA8meFJ', 'JDKA', 'KJASDJA', '672.313', 'JASDASD', '1', '1', '1', '2023-11-13', '2023-11-13', '2023-11-13 02:31:56'),
('fsafsdfsdfsfse', 'FCWBB', 'Fotocopy Warna BB', '1500', '', '1', '000', '', '2023-11-01', '0000-00-00', '2023-11-01 02:19:36'),
('kjasdfjhasdjsah', 'FCWW', 'Fotocopy Warna', '1.000', '', '1', '000', '1', '2023-10-31', '2023-11-07', '2023-10-31 02:31:58'),
('Pxopm7jnR1', 'fsd', 'dsfdsf', '4.355.345', 'fefwefwfaaa', '1', '1', '1', '2023-11-07', '2023-11-12', '2023-11-07 08:19:47'),
('sgsgsdfg', 'FCHP', 'Fotocopy Hitam Putih', '500', 'ajhdadl', '1', '000', '1', '2023-10-31', '2023-11-13', '2023-11-01 02:19:36');

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
  `id` varchar(100) NOT NULL,
  `total` varchar(100) NOT NULL,
  `keterangan` varchar(100) NOT NULL,
  `id_pelanggan` varchar(100) NOT NULL,
  `created_at` date NOT NULL,
  `updated_at` date NOT NULL,
  `timestamp` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

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
('234242342333', 'Habib Abdillah', 'operator1', '$2y$10$J/5dpBrApznwXcxTv6.aku0wiwcwLN9L40zgwX43YtG/2t3N3YR1i', '2', '-', '0', '000', '', '2023-10-24', '0000-00-00', '2023-10-23 18:38:41'),
('23424234234', 'BIBSSS', 'admin1', '$2y$10$3Vkk4nhaw4RK7EBR0I3CQ.5gEf5PfhusEdxW3Jz38Q6C7zhMpFVy2', '1', '-', '1', '000', '', '2023-10-24', '0000-00-00', '2023-10-23 18:36:28'),
('j49PH5IWlLu3f', 'Chika', 'chikaa', '$2y$10$J6p.AuSDj7ifuGiqr00Nvusj6HGQpHtieqI4upVvvW1EJ88ywlPe6', '1', '123', '1', '1', '1', '2023-11-12', '2023-11-12', '2023-11-12 22:48:23');

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
('19yXtDuovzE7U', 'chikaa', '::1', '2023-11-13 10:19:44', 'EDIT DATA PELAYANAN', 'j49PH5IWlLu3f', 'BERHASIL'),
('1x4CXNhY9zwS8', 'admin1', '::1', '2023-11-13 02:31:56', 'INPUT DATA PELAYANAN', '23424234234', 'BERHASIL'),
('3bg4H0XQvqizV', 'admin1', '::1', '2023-11-13 02:09:50', 'LOGIN USER', '23424234234', 'BERHASIL'),
('5ebBgrvk4yn3Z', 'admin1', '::1', '2023-11-13 02:20:18', 'INPUT DATA USER', '23424234234', 'BERHASIL'),
('at9NuDESwOHPd', 'admin1', '::1', '2023-11-13 02:20:41', 'HAPUS DATA USER', '23424234234', 'BERHASIL'),
('B7mclJa9iGoK8', 'admin1', '::1', '2023-11-13 02:31:30', 'LOGIN USER', '23424234234', 'BERHASIL'),
('edArchJTZ4Dx8', 'chikaa', '::1', '2023-11-13 10:19:22', 'LOGIN USER', 'j49PH5IWlLu3f', 'BERHASIL'),
('fX6ZzY1wS4DA3', 'operator1', '::1', '2023-11-13 02:32:20', 'INPUT DATA PELAYANAN', '234242342333', 'GAGAL'),
('nXsI3mO2iR5vp', 'admin1', '::1', '2023-11-13 14:35:59', 'LOGIN USER', '23424234234', 'BERHASIL'),
('p47hxk9Jwe2HV', 'operator1', '::1', '2023-11-13 01:51:23', 'Login user', '234242342333', 'Gagal'),
('PeJgIyU1qCAmV', 'admin1', '::1', '2023-11-13 03:17:57', 'LOGIN USER', '23424234234', 'BERHASIL'),
('S6x95w2yhKpEC', 'chikaa', '::1', '2023-11-13 01:40:33', 'Login user', 'j49PH5IWlLu3f', 'Berhasil'),
('saiKIELPF7dgc', 'chikaa', '::1', '2023-11-13 02:32:28', 'LOGIN USER', 'j49PH5IWlLu3f', 'BERHASIL'),
('sov4pBzt86wTO', 'admin1', '::1', '2023-11-13 02:17:06', 'EDIT DATA PELAYANAN', '23424234234', 'BERHASIL'),
('tIvzGg21OBCu3', 'admin1', '::1', '2023-11-13 02:17:19', 'HAPUS DATA PELAYANAN', '23424234234', 'BERHASIL'),
('tzJ6EH9lNCbIZ', 'admin1', '::1', '2023-11-13 01:50:28', 'Login user', '23424234234', 'Gagal'),
('w48PfUKcJoxvR', 'admin1', '::1', '2023-11-13 01:54:01', 'Login user', '23424234234', 'Berhasil'),
('zY6lg94ad1jZw', 'admin1', '::1', '2023-11-13 02:20:36', 'EDIT DATA USER', '23424234234', 'BERHASIL');

-- --------------------------------------------------------

--
-- Table structure for table `trs_detail`
--

CREATE TABLE `trs_detail` (
  `id` varchar(100) NOT NULL,
  `id_transaksi` varchar(100) NOT NULL,
  `id_pelayanan` varchar(100) NOT NULL,
  `id_pelanggan` varchar(100) NOT NULL,
  `harga` varchar(100) NOT NULL,
  `qty` varchar(100) NOT NULL,
  `created_at` date NOT NULL,
  `updated_at` date NOT NULL,
  `timestamp` timestamp NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `ms_pelayanan`
--
ALTER TABLE `ms_pelayanan`
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
  ADD PRIMARY KEY (`id`);

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
  ADD PRIMARY KEY (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
