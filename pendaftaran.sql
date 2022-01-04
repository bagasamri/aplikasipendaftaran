-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 23, 2021 at 09:42 AM
-- Server version: 10.4.18-MariaDB
-- PHP Version: 7.4.18

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `pendaftaran`
--

-- --------------------------------------------------------

--
-- Table structure for table `dokter`
--

CREATE TABLE `dokter` (
  `id` int(11) NOT NULL,
  `nama` varchar(125) NOT NULL,
  `nama_lengkap` varchar(125) NOT NULL,
  `dokter` varchar(125) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `dokter`
--

INSERT INTO `dokter` (`id`, `nama`, `nama_lengkap`, `dokter`) VALUES
(1, 'Amri', 'Amri Bagas Permana', 'Umum'),
(3, 'ssss', '', ''),
(4, 'test', 'testt', 'tsst');

-- --------------------------------------------------------

--
-- Table structure for table `obat`
--

CREATE TABLE `obat` (
  `id_obat` int(11) NOT NULL,
  `nama_obat` varchar(125) NOT NULL,
  `jenis_obat` varchar(125) NOT NULL,
  `jumlah_obat` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `obat`
--

INSERT INTO `obat` (`id_obat`, `nama_obat`, `jenis_obat`, `jumlah_obat`) VALUES
(1, 'Parasetamol', 'abc', 50),
(2, 'abc', '223', 12),
(3, 'ada', 'nanan', 123);

-- --------------------------------------------------------

--
-- Table structure for table `pembayaran`
--

CREATE TABLE `pembayaran` (
  `id_pembayaran` int(11) NOT NULL,
  `id_pengguna` int(11) NOT NULL,
  `kd_pembayaran` int(11) NOT NULL,
  `tgl_byr` date NOT NULL,
  `tarif` int(11) NOT NULL,
  `status` varchar(125) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `pembayaran`
--

INSERT INTO `pembayaran` (`id_pembayaran`, `id_pengguna`, `kd_pembayaran`, `tgl_byr`, `tarif`, `status`) VALUES
(1, 10, 2021062101, '2021-06-21', 50000, 'Belum Bayar');

-- --------------------------------------------------------

--
-- Table structure for table `rekam_medis`
--

CREATE TABLE `rekam_medis` (
  `id_rekam` int(11) NOT NULL,
  `id_pasien` int(11) NOT NULL,
  `id_dokter` int(11) NOT NULL,
  `no_rm` int(11) NOT NULL,
  `berat` int(11) NOT NULL,
  `tinggi` int(11) NOT NULL,
  `keluhan` varchar(125) NOT NULL,
  `diagnosa` varchar(125) NOT NULL,
  `tgl_pemeriksaan` date NOT NULL,
  `keterangan` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `rekam_medis`
--

INSERT INTO `rekam_medis` (`id_rekam`, `id_pasien`, `id_dokter`, `no_rm`, `berat`, `tinggi`, `keluhan`, `diagnosa`, `tgl_pemeriksaan`, `keterangan`) VALUES
(1, 10, 1, 1, 120, 120, 'Badan Merasa Panas', 'Kelelahan', '2021-06-19', 'Banyak minum air putihh'),
(2, 10, 1, 324242, 12, 12, 'asdad', 'asdad', '2021-06-21', 'asdadsa');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `name` varchar(128) NOT NULL,
  `email` varchar(128) NOT NULL,
  `image` varchar(128) NOT NULL,
  `password` varchar(256) NOT NULL,
  `role_id` int(11) NOT NULL,
  `is_active` int(1) NOT NULL,
  `date_created` int(11) NOT NULL,
  `no_identitas` int(15) NOT NULL,
  `tgl_lahir` date DEFAULT NULL,
  `jenis_kelamin` varchar(15) DEFAULT NULL,
  `alamat` varchar(255) DEFAULT NULL,
  `no_tlp` int(13) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `name`, `email`, `image`, `password`, `role_id`, `is_active`, `date_created`, `no_identitas`, `tgl_lahir`, `jenis_kelamin`, `alamat`, `no_tlp`) VALUES
(6, 'qwerty', 'joniwalker877@gmail.com', 'wep.jpg', '$2y$10$Q2LI/aDgfu18jWEpai7tMe7OQ/iAs8553nTRKhxmf.cnWd0UGnX4i', 1, 1, 1623683980, 0, NULL, NULL, NULL, NULL),
(8, 'amri bagas', 'bagas.amri7@gmail.com', 'wep.jpg', '$2y$10$b6.oybGY1.9GI1EcR59iw.Bn/iGA0f3Xz2EYhoM/TmvI2Ejwi/87K', 3, 1, 1623750677, 0, NULL, NULL, NULL, NULL),
(9, 'Yogi', 'yogisugi123@gmail.com', 'wep.jpg', '$2y$10$UDgP2uGSgJt2p0rE4.C2Q.6hFTds4hXWeY/YLimYhxsqMkakrX4pS', 4, 1, 1623936928, 0, NULL, NULL, NULL, NULL),
(10, 'Member', 'member@gmail.com', 'wep.jpg', '$2y$10$trlhigPnNvI1uLA83NOcQewLD6JHqbg5kj3/JtTI6CTuAdppl4DHm', 2, 1, 1624018482, 345666, '2021-06-18', 'perempuan', 'Jl.wulluh 3', 9880),
(11, 'dimas adii', 'dimas@gmail.com', 'wep.jpg', '$2y$10$HVYhnYxmBpa0FcTkNgvpMenTUt8uED4bHTx0sBRn.YRgOjNy3KyAa', 2, 1, 1624023607, 1234567890, '2021-06-18', '--Select--', 'jl.wwww', 332222222);

-- --------------------------------------------------------

--
-- Table structure for table `user_access_menu`
--

CREATE TABLE `user_access_menu` (
  `id` int(11) NOT NULL,
  `role_id` int(11) NOT NULL,
  `menu_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user_access_menu`
--

INSERT INTO `user_access_menu` (`id`, `role_id`, `menu_id`) VALUES
(1, 1, 1),
(2, 1, 2),
(3, 2, 2),
(4, 1, 3),
(5, 3, 6),
(6, 4, 5),
(9, 3, 7),
(10, 3, 8),
(11, 3, 9),
(12, 4, 10),
(14, 2, 11);

-- --------------------------------------------------------

--
-- Table structure for table `user_menu`
--

CREATE TABLE `user_menu` (
  `id` int(11) NOT NULL,
  `menu` varchar(128) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user_menu`
--

INSERT INTO `user_menu` (`id`, `menu`) VALUES
(1, 'Admin'),
(2, 'User'),
(3, 'Menu'),
(5, 'Apoteker'),
(6, 'Dokter'),
(7, 'Master'),
(8, 'Transaksi'),
(9, 'Laporan'),
(10, 'Transaksi Apoteker'),
(11, 'Transaksi User');

-- --------------------------------------------------------

--
-- Table structure for table `user_role`
--

CREATE TABLE `user_role` (
  `id` int(11) NOT NULL,
  `role` varchar(128) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user_role`
--

INSERT INTO `user_role` (`id`, `role`) VALUES
(1, 'Admin'),
(2, 'member'),
(3, 'dokter'),
(4, 'apoteker'),
(7, 'ttess');

-- --------------------------------------------------------

--
-- Table structure for table `user_sub_menu`
--

CREATE TABLE `user_sub_menu` (
  `id` int(11) NOT NULL,
  `menu_id` int(11) NOT NULL,
  `title` varchar(128) NOT NULL,
  `url` varchar(128) NOT NULL,
  `icon` varchar(128) NOT NULL,
  `is_active` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user_sub_menu`
--

INSERT INTO `user_sub_menu` (`id`, `menu_id`, `title`, `url`, `icon`, `is_active`) VALUES
(1, 1, 'Dashboard', 'admin', 'fas fa-fw fa-tachometer-alt', 1),
(2, 2, 'My Profile', 'user', 'fas fa-fw fa-user', 1),
(3, 2, 'Edit Profile', 'user/edit', 'fas fa-fw fa-user-edit', 1),
(4, 3, 'Menu Management', 'menu', 'fas fa-fw fa-folder', 1),
(5, 3, 'SubMenu Management', 'menu/submenu', 'fas fa-fw fa-folder-open', 1),
(7, 1, 'Role', 'admin/role', 'fa fa-fw fa-user-tie', 1),
(8, 2, 'Change Password', 'user/changepassword', 'fa fa-fw fa-key', 1),
(9, 6, 'Edit Profile Dokter', 'dokter/edit', 'fa fa-fw fa-user-edit', 1),
(10, 5, 'Edit Profile Apotik', 'apoteker/edit', 'fa fa-fw fa-user-edit', 1),
(11, 6, 'Change Password Dokter', 'dokter/changepassword', 'fa fa-fw fa-key', 1),
(12, 5, 'Change Password Apotik', 'apoteker/changepassword', 'fa fa-fw fa-key', 1),
(13, 8, 'Rekam Medis', 'dokter/rekamedis', 'fas fa-fw  fa-notes-medical', 1),
(14, 7, 'Data Pengguna', 'dokter/datapenguna', 'fas fa-fw fa-users', 1),
(15, 7, 'Data Obat', 'dokter/dataobat', 'fas fa-fw fa-tablets', 1),
(16, 9, 'Laporan Pembayaran', 'dokter/lapbayar', 'fas fa-fw fa-file-medical-alt', 1),
(17, 10, 'Data Obat', 'apoteker/dataobat', 'fas fa-fw fa-tablets', 1),
(18, 10, 'Pembayaran', 'apoteker/pembayaran', 'fas fa-fw fa-money-check-alt', 1),
(19, 1, 'Data User', 'admin/datauser', 'fas fa-fw fa-users', 1),
(20, 1, 'Data Dokter', 'admin/datadokter', 'fas fa-fw fa-users', 1),
(21, 11, 'Pembayaran', 'user/pembayaran', 'fas fa-fw fa-file-invoice', 1);

-- --------------------------------------------------------

--
-- Table structure for table `user_token`
--

CREATE TABLE `user_token` (
  `id` int(11) NOT NULL,
  `email` varchar(128) NOT NULL,
  `token` varchar(129) NOT NULL,
  `date_created` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user_token`
--

INSERT INTO `user_token` (`id`, `email`, `token`, `date_created`) VALUES
(2, 'bagas.amri7@gmail.com', '6C554Ia50RyvQ8WJtTaWtXGo8X2Y8JGpkfGKYooeDw8=', 1623811565),
(3, 'yogisugi123@gmail.com', 'GfHuRZHj7KypN1NfKssrZV+qsKdwFJnZxZjMn8AXxeY=', 1623936928),
(4, 'yogisugi123@gmail.com', 'WEgbJgK3sFvnM01paRIsexAboaTIogRjsJBu3K4w5IY=', 1623937189),
(5, 'member@gmail.com', '5Rqwb8OlIdd4ZTFIHDKco8R+/6CeFSxBuBtulu2D98k=', 1624018482),
(6, 'dimas@gmail.com', '212LRarS+8GvsRFP4TzozsFxNJrNsvCXf/XBYITJgzI=', 1624023607);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `dokter`
--
ALTER TABLE `dokter`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `obat`
--
ALTER TABLE `obat`
  ADD PRIMARY KEY (`id_obat`);

--
-- Indexes for table `pembayaran`
--
ALTER TABLE `pembayaran`
  ADD PRIMARY KEY (`id_pembayaran`);

--
-- Indexes for table `rekam_medis`
--
ALTER TABLE `rekam_medis`
  ADD PRIMARY KEY (`id_rekam`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user_access_menu`
--
ALTER TABLE `user_access_menu`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user_menu`
--
ALTER TABLE `user_menu`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user_role`
--
ALTER TABLE `user_role`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user_sub_menu`
--
ALTER TABLE `user_sub_menu`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user_token`
--
ALTER TABLE `user_token`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `dokter`
--
ALTER TABLE `dokter`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `obat`
--
ALTER TABLE `obat`
  MODIFY `id_obat` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `pembayaran`
--
ALTER TABLE `pembayaran`
  MODIFY `id_pembayaran` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `rekam_medis`
--
ALTER TABLE `rekam_medis`
  MODIFY `id_rekam` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `user_access_menu`
--
ALTER TABLE `user_access_menu`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `user_menu`
--
ALTER TABLE `user_menu`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `user_role`
--
ALTER TABLE `user_role`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `user_sub_menu`
--
ALTER TABLE `user_sub_menu`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT for table `user_token`
--
ALTER TABLE `user_token`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
