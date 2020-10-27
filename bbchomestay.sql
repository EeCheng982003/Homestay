-- phpMyAdmin SQL Dump
-- version 4.9.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 27, 2020 at 12:38 PM
-- Server version: 10.4.10-MariaDB
-- PHP Version: 7.3.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `bbchomestay`
--

-- --------------------------------------------------------

--
-- Table structure for table `alamat`
--

CREATE TABLE `alamat` (
  `namaPelanggan` varchar(30) NOT NULL,
  `alamat` text NOT NULL,
  `poskod` int(5) NOT NULL,
  `negeri` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `alamat`
--

INSERT INTO `alamat` (`namaPelanggan`, `alamat`, `poskod`, `negeri`) VALUES
('Choo Chen Zhung', 'Ur house', 11970, 'Penang'),
('idTike', 'My house', 12311, 'Penang'),
('nucleus-jumphost', 'Ur house', 11970, 'Penang');

-- --------------------------------------------------------

--
-- Table structure for table `bilik`
--

CREATE TABLE `bilik` (
  `IDbilik` varchar(5) NOT NULL,
  `harga` int(5) NOT NULL,
  `saizBilik` int(5) NOT NULL,
  `jumlahBilik` int(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `pelanggan`
--

CREATE TABLE `pelanggan` (
  `IDpelanggan` varchar(5) NOT NULL,
  `namaPelanggan` text NOT NULL,
  `No. KP` int(12) NOT NULL,
  `No. h/p` int(12) NOT NULL,
  `IDbilik` varchar(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `pelanggan`
--

INSERT INTO `pelanggan` (`IDpelanggan`, `namaPelanggan`, `No. KP`, `No. h/p`, `IDbilik`) VALUES
('A004', 'idTike', 2147483647, 127657761, 'H1457'),
('E3211', 'Choo Chen Zhung', 2147483647, 2147483647, 'H1456'),
('F7001', 'Choo Chen Zhung', 2147483647, 2147483647, 'H1455');

-- --------------------------------------------------------

--
-- Table structure for table `pengguna`
--

CREATE TABLE `pengguna` (
  `IDpekerja` varchar(5) NOT NULL,
  `namaPekerja` text NOT NULL,
  `katalaluan` varchar(30) NOT NULL,
  `namaPengurus` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `pengguna`
--

INSERT INTO `pengguna` (`IDpekerja`, `namaPekerja`, `katalaluan`, `namaPengurus`) VALUES
('D1111', 'Wh', '123', 'Cz'),
('D2344', 'Chen', '123', 'Zhung'),
('D6788', 'Ee', '123', 'Cheng'),
('D6789', 'Shu', '123', 'Yi'),
('D8900', 'Zi', '123', 'XU');

-- --------------------------------------------------------

--
-- Table structure for table `tempahan`
--

CREATE TABLE `tempahan` (
  `IDtempahan` varchar(5) NOT NULL,
  `tarikhJualan` date NOT NULL,
  `tempoh` int(11) NOT NULL,
  `IDbilik` varchar(5) NOT NULL,
  `IDpekerja` varchar(5) NOT NULL,
  `bayaran` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tempahan`
--

INSERT INTO `tempahan` (`IDtempahan`, `tarikhJualan`, `tempoh`, `IDbilik`, `IDpekerja`, `bayaran`) VALUES
('G204', '2020-10-27', 3, 'H1456', 'D1111', 600),
('G501', '2020-10-27', 2, 'H1455', 'D1111', 200),
('G619', '2020-10-27', 3, 'H1457', 'D1111', 1500),
('G862', '2020-10-27', 2, 'H1455', 'D1111', 200),
('G946', '2020-10-27', 3, 'H1455', 'D1111', 300);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `alamat`
--
ALTER TABLE `alamat`
  ADD PRIMARY KEY (`namaPelanggan`);

--
-- Indexes for table `bilik`
--
ALTER TABLE `bilik`
  ADD PRIMARY KEY (`IDbilik`);

--
-- Indexes for table `pelanggan`
--
ALTER TABLE `pelanggan`
  ADD PRIMARY KEY (`IDpelanggan`);

--
-- Indexes for table `pengguna`
--
ALTER TABLE `pengguna`
  ADD PRIMARY KEY (`IDpekerja`);

--
-- Indexes for table `tempahan`
--
ALTER TABLE `tempahan`
  ADD PRIMARY KEY (`IDtempahan`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
