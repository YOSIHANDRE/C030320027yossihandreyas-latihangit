-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 14, 2023 at 02:21 AM
-- Server version: 10.4.18-MariaDB
-- PHP Version: 8.0.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `beasiswa`
--

-- --------------------------------------------------------

--
-- Table structure for table `beasiswa`
--

CREATE TABLE `beasiswa` (
  `id_beasiswa` int(11) NOT NULL,
  `nama_beasiswa` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `beasiswa`
--

INSERT INTO `beasiswa` (`id_beasiswa`, `nama_beasiswa`) VALUES
(101, 'KIP'),
(102, 'SDM'),
(103, 'LG');

-- --------------------------------------------------------

--
-- Table structure for table `mahasiswa`
--

CREATE TABLE `mahasiswa` (
  `nim` varchar(50) NOT NULL,
  `nama_mahasiswa` varchar(255) NOT NULL,
  `alamat_mahasiswa` varchar(255) NOT NULL,
  `id_beasiswa` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `mahasiswa`
--

INSERT INTO `mahasiswa` (`nim`, `nama_mahasiswa`, `alamat_mahasiswa`, `id_beasiswa`) VALUES
('101010', 'Ijul', 'Mahanggg', 101),
('101011', 'Rama', 'Banjar', 102),
('101012', 'Kopex', 'Paringin', 103),
('101013', 'Stepen', 'Barabai', 101);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `id_level` tinyint(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`username`, `password`, `id_level`) VALUES
('admin', '21232f297a57a5a743894a0e4a801fc3', 1),
('akademik', '0b5652714faf87700d60a912f753cc55', 2);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `beasiswa`
--
ALTER TABLE `beasiswa`
  ADD PRIMARY KEY (`id_beasiswa`);

--
-- Indexes for table `mahasiswa`
--
ALTER TABLE `mahasiswa`
  ADD PRIMARY KEY (`nim`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`username`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
