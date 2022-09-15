-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 06, 2022 at 02:14 AM
-- Server version: 10.4.13-MariaDB
-- PHP Version: 7.4.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `rapot`
--

-- --------------------------------------------------------

--
-- Table structure for table `absen`
--

CREATE TABLE `absen` (
  `nis` varchar(50) NOT NULL,
  `nama_lengkap` varchar(100) NOT NULL,
  `kelas` varchar(50) NOT NULL,
  `sakit` varchar(50) NOT NULL,
  `izin` varchar(50) NOT NULL,
  `tk` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `absen`
--

INSERT INTO `absen` (`nis`, `nama_lengkap`, `kelas`, `sakit`, `izin`, `tk`) VALUES
('1272917921', 'Maimuna', '4A', '1', '1', '1');

-- --------------------------------------------------------

--
-- Table structure for table `guru`
--

CREATE TABLE `guru` (
  `id` varchar(50) NOT NULL,
  `id_guru` varchar(50) NOT NULL,
  `nip` varchar(50) NOT NULL,
  `nama_lengkap` varchar(100) NOT NULL,
  `tmpt_lhr` varchar(50) NOT NULL,
  `tnggl_lhr` varchar(50) NOT NULL,
  `jk` varchar(50) NOT NULL,
  `agama` varchar(50) NOT NULL,
  `alamat` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `guru`
--

INSERT INTO `guru` (`id`, `id_guru`, `nip`, `nama_lengkap`, `tmpt_lhr`, `tnggl_lhr`, `jk`, `agama`, `alamat`) VALUES
('999', '', '9817329713', 'Udin', 'mars', '1994-09-21', 'Laki-laki', 'Katolik', 'bal bla bla'),
('B1', 'B1', '817212921', 'Juminten', 'khonchiu', '1999-11-01', 'Perempuan', 'Budha', 'Mars'),
('B2', 'B2', '562812713', 'Jikawa', 'YNTKTS', '1992-12-31', 'Laki-laki', 'Konghucu', 'YNTKTS');

-- --------------------------------------------------------

--
-- Table structure for table `mapel`
--

CREATE TABLE `mapel` (
  `kd_mapel` varchar(50) NOT NULL,
  `mapel` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `mapel`
--

INSERT INTO `mapel` (`kd_mapel`, `mapel`) VALUES
('C1', 'Bahasa Indonesia'),
('C2', 'Bahasa Jepang'),
('C3', 'Tinju di balas tinju');

-- --------------------------------------------------------

--
-- Table structure for table `nilai`
--

CREATE TABLE `nilai` (
  `nis` varchar(20) NOT NULL,
  `nama_lengkap` varchar(100) NOT NULL,
  `kelas` varchar(11) NOT NULL,
  `mapel` varchar(20) NOT NULL,
  `nama` varchar(100) NOT NULL,
  `semester` varchar(2) NOT NULL,
  `kkm` varchar(4) NOT NULL,
  `nh` varchar(4) NOT NULL,
  `nh2` varchar(4) NOT NULL,
  `nh3` varchar(4) NOT NULL,
  `nh4` varchar(4) NOT NULL,
  `uts` varchar(4) NOT NULL,
  `uas` varchar(4) NOT NULL,
  `n_peng` varchar(4) NOT NULL,
  `predikat` varchar(4) NOT NULL,
  `deskrip` text NOT NULL,
  `np` varchar(4) NOT NULL,
  `np2` varchar(4) NOT NULL,
  `np3` varchar(4) NOT NULL,
  `np4` varchar(4) NOT NULL,
  `nketram` varchar(4) NOT NULL,
  `pred` varchar(4) NOT NULL,
  `deskripsi` text NOT NULL,
  `n_raport` int(4) NOT NULL,
  `sakit` varchar(50) NOT NULL,
  `izin` varchar(50) NOT NULL,
  `tk` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `pengajar`
--

CREATE TABLE `pengajar` (
  `id` varchar(50) NOT NULL,
  `nama_lengkap` varchar(100) NOT NULL,
  `kd_mapel` varchar(50) NOT NULL,
  `mapel` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `pengajar`
--

INSERT INTO `pengajar` (`id`, `nama_lengkap`, `kd_mapel`, `mapel`) VALUES
('999', 'Udin', 'C3', 'Tinju di balas tinju'),
('B1', 'Juminten', 'C1', 'Bahasa Indonesia'),
('B2', 'Jikawa', 'C2', 'Bahasa Jepang');

-- --------------------------------------------------------

--
-- Table structure for table `siswa`
--

CREATE TABLE `siswa` (
  `id` varchar(50) NOT NULL,
  `id_siswa` varchar(50) NOT NULL,
  `nis` varchar(50) NOT NULL,
  `nama_lengkap` varchar(100) NOT NULL,
  `kelas` varchar(50) NOT NULL,
  `tmpt_lhr` varchar(50) NOT NULL,
  `tnggl_lhr` varchar(50) NOT NULL,
  `jk` varchar(50) NOT NULL,
  `agama` varchar(50) NOT NULL,
  `alamat` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `siswa`
--

INSERT INTO `siswa` (`id`, `id_siswa`, `nis`, `nama_lengkap`, `kelas`, `tmpt_lhr`, `tnggl_lhr`, `jk`, `agama`, `alamat`) VALUES
('A1', 'A1', '1272917921', 'Maimuna', '4A', 'NGK TAU', '2001-01-17', 'Perempuan', 'Konghucu', 'YA NGK TAU'),
('A9', 'A9', '348841', 'vektor', '6B', 'school', '2000-01-13', 'Laki-laki', 'Katolik', 'erangel');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_login`
--

CREATE TABLE `tbl_login` (
  `id` varchar(50) NOT NULL,
  `nama_lengkap` varchar(100) NOT NULL,
  `username` varchar(100) NOT NULL,
  `password` varchar(75) NOT NULL,
  `stts` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_login`
--

INSERT INTO `tbl_login` (`id`, `nama_lengkap`, `username`, `password`, `stts`) VALUES
('1', 'Kifli', 'admin', '21232f297a57a5a743894a0e4a801fc3', 'admin'),
('999', 'Udin', '999', 'b706835de79a2b4e80506f582af3676a', 'guru'),
('A1', 'Maimuna', 'A1', '27f237e6b7f96587b6202ff3607ad88a', 'siswa'),
('A9', 'vektor', 'A9', '8650e375ee80b2277a84fc9b85375e36', 'siswa'),
('B1', 'Juminten', 'B1', 'c9512565ef6194ca664dc41ec0de7a53', 'guru'),
('B2', 'Jikawa', 'B2', 'bbd97b00c539801e32317ab550867ec4', 'guru');

-- --------------------------------------------------------

--
-- Table structure for table `walas`
--

CREATE TABLE `walas` (
  `id` varchar(50) NOT NULL,
  `nama_lengkap` varchar(100) NOT NULL,
  `kelas` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `walas`
--

INSERT INTO `walas` (`id`, `nama_lengkap`, `kelas`) VALUES
('B1', 'Juminten', '4A'),
('B2', 'Jikawa', '6B');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `absen`
--
ALTER TABLE `absen`
  ADD PRIMARY KEY (`nis`);

--
-- Indexes for table `guru`
--
ALTER TABLE `guru`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `mapel`
--
ALTER TABLE `mapel`
  ADD PRIMARY KEY (`kd_mapel`);

--
-- Indexes for table `nilai`
--
ALTER TABLE `nilai`
  ADD PRIMARY KEY (`nis`);

--
-- Indexes for table `pengajar`
--
ALTER TABLE `pengajar`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `siswa`
--
ALTER TABLE `siswa`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_login`
--
ALTER TABLE `tbl_login`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `walas`
--
ALTER TABLE `walas`
  ADD PRIMARY KEY (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
