-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Nov 07, 2017 at 04:16 AM
-- Server version: 10.1.16-MariaDB
-- PHP Version: 7.0.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `ci14650013`
--

-- --------------------------------------------------------

--
-- Table structure for table `kalkulator`
--

CREATE TABLE `kalkulator` (
  `id_kalkulator` int(5) NOT NULL,
  `angka1` int(7) DEFAULT NULL,
  `angka2` int(7) DEFAULT NULL,
  `operator` char(1) DEFAULT NULL,
  `hasil` int(7) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `kalkulator`
--

INSERT INTO `kalkulator` (`id_kalkulator`, `angka1`, `angka2`, `operator`, `hasil`) VALUES
(1, 1, 2, '+', 3),
(2, 5, 9, '+', 14),
(3, 9, 9, '*', 81),
(4, NULL, NULL, NULL, 0),
(5, NULL, NULL, NULL, 0),
(6, NULL, NULL, NULL, 0),
(7, 5, 5, '+', 10);

-- --------------------------------------------------------

--
-- Table structure for table `mhs`
--

CREATE TABLE `mhs` (
  `nim` int(10) NOT NULL,
  `nama` varchar(50) DEFAULT NULL,
  `tempat` varchar(50) DEFAULT NULL,
  `tgl` date DEFAULT NULL,
  `jk` varchar(50) DEFAULT NULL,
  `alamat` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `mhs`
--

INSERT INTO `mhs` (`nim`, `nama`, `tempat`, `tgl`, `jk`, `alamat`) VALUES
(1, NULL, NULL, NULL, NULL, NULL),
(2, NULL, NULL, NULL, NULL, NULL),
(3, NULL, NULL, NULL, NULL, NULL),
(4, NULL, NULL, NULL, NULL, NULL),
(5, NULL, NULL, NULL, NULL, NULL),
(6, '', '', '0000-00-00', 'Laki-Laki', ''),
(7, '', '', '0000-00-00', 'Laki-Laki', ''),
(14, 'qw', 'qw', '2017-11-01', '1', 'mn'),
(14650013, 'FAUZI', 'malang', '2017-11-08', '1', 'malang'),
(14650014, NULL, NULL, NULL, NULL, NULL),
(14650015, NULL, NULL, NULL, NULL, NULL),
(14650016, NULL, NULL, NULL, NULL, NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `kalkulator`
--
ALTER TABLE `kalkulator`
  ADD PRIMARY KEY (`id_kalkulator`);

--
-- Indexes for table `mhs`
--
ALTER TABLE `mhs`
  ADD PRIMARY KEY (`nim`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `kalkulator`
--
ALTER TABLE `kalkulator`
  MODIFY `id_kalkulator` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT for table `mhs`
--
ALTER TABLE `mhs`
  MODIFY `nim` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14650017;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
