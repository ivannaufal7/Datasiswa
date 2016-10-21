-- phpMyAdmin SQL Dump
-- version 4.3.11
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Oct 08, 2016 at 01:44 AM
-- Server version: 5.6.24
-- PHP Version: 5.5.24

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `db_siswa`
--

-- --------------------------------------------------------

--
-- Table structure for table `t_bidang_lomba`
--

CREATE TABLE IF NOT EXISTS `t_bidang_lomba` (
  `id_bidang_lomba` int(11) NOT NULL,
  `nama_bidang_lomba` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `t_kelas`
--

CREATE TABLE IF NOT EXISTS `t_kelas` (
  `id_kelas` int(11) NOT NULL,
  `nama_kelas` varchar(15) DEFAULT NULL,
  `jurusan` varchar(50) DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `t_kelas`
--

INSERT INTO `t_kelas` (`id_kelas`, `nama_kelas`, `jurusan`) VALUES
(2, 'XI-RPL2', 'Rekayasa Perangkat Lunak'),
(5, 'XI-RPL1', 'Rekayasa Perangkat Lunak'),
(6, 'XI - TKJ 1', 'Teknik Komputer Jaringan'),
(7, 'XI - TKJ 12', 'Teknik Komputer Jaringan');

-- --------------------------------------------------------

--
-- Table structure for table `t_login`
--

CREATE TABLE IF NOT EXISTS `t_login` (
  `id_login` int(11) NOT NULL,
  `username` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  `level` tinyint(1) NOT NULL DEFAULT '0'
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `t_login`
--

INSERT INTO `t_login` (`id_login`, `username`, `password`, `level`) VALUES
(1, 'admin', 'd033e22ae348aeb5660fc2140aec35850c4da997', 1),
(2, 'ivan', 'a15f8b81a160b4eebe5c84e9e3b65c87b9b2f18e', 0);

-- --------------------------------------------------------

--
-- Table structure for table `t_perolehan`
--

CREATE TABLE IF NOT EXISTS `t_perolehan` (
  `id_perolehan` int(11) NOT NULL,
  `nama_lengkap` varchar(100) NOT NULL,
  `jenis_kelamin` varchar(10) NOT NULL,
  `id_bidang_lomba` int(11) NOT NULL,
  `score` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `t_siswa`
--

CREATE TABLE IF NOT EXISTS `t_siswa` (
  `nis` varchar(10) NOT NULL,
  `nama_lengkap` varchar(50) NOT NULL,
  `jenis_kelamin` enum('Laki-laki','Perempuan') NOT NULL,
  `alamat` text NOT NULL,
  `no_telp` varchar(20) NOT NULL,
  `id_kelas` int(11) NOT NULL,
  `file` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `t_siswa`
--

INSERT INTO `t_siswa` (`nis`, `nama_lengkap`, `jenis_kelamin`, `alamat`, `no_telp`, `id_kelas`, `file`) VALUES
('1415115720', 'asdasd', 'Laki-laki', 'asdasdasd', 'asdasdasd', 2, 'berry.jpg');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `t_bidang_lomba`
--
ALTER TABLE `t_bidang_lomba`
  ADD PRIMARY KEY (`id_bidang_lomba`);

--
-- Indexes for table `t_kelas`
--
ALTER TABLE `t_kelas`
  ADD PRIMARY KEY (`id_kelas`);

--
-- Indexes for table `t_login`
--
ALTER TABLE `t_login`
  ADD PRIMARY KEY (`id_login`);

--
-- Indexes for table `t_perolehan`
--
ALTER TABLE `t_perolehan`
  ADD PRIMARY KEY (`id_perolehan`);

--
-- Indexes for table `t_siswa`
--
ALTER TABLE `t_siswa`
  ADD PRIMARY KEY (`nis`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `t_bidang_lomba`
--
ALTER TABLE `t_bidang_lomba`
  MODIFY `id_bidang_lomba` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `t_kelas`
--
ALTER TABLE `t_kelas`
  MODIFY `id_kelas` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT for table `t_login`
--
ALTER TABLE `t_login`
  MODIFY `id_login` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `t_perolehan`
--
ALTER TABLE `t_perolehan`
  MODIFY `id_perolehan` int(11) NOT NULL AUTO_INCREMENT;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
