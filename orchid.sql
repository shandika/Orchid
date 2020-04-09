-- phpMyAdmin SQL Dump
-- version 5.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 09, 2020 at 11:43 AM
-- Server version: 10.4.11-MariaDB
-- PHP Version: 7.2.28

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `orchid`
--

-- --------------------------------------------------------

--
-- Table structure for table `customer`
--

CREATE TABLE `customer` (
  `ktp` varchar(16) NOT NULL,
  `nama` varchar(50) NOT NULL,
  `alamat` varchar(100) NOT NULL,
  `password` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `customer`
--

INSERT INTO `customer` (`ktp`, `nama`, `alamat`, `password`) VALUES
('16111125', 'Shandika Eka Putra', 'Sumedang', 'c19b30441b22d7b97d3ff9117495caffd1058528');

-- --------------------------------------------------------

--
-- Table structure for table `list_project`
--

CREATE TABLE `list_project` (
  `ID_list_project` varchar(11) NOT NULL,
  `ID_project` varchar(10) NOT NULL,
  `nomor` varchar(5) NOT NULL,
  `type` int(100) NOT NULL,
  `luas_tanah` int(11) NOT NULL,
  `luas_bangunan` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `list_project`
--

INSERT INTO `list_project` (`ID_list_project`, `ID_project`, `nomor`, `type`, `luas_tanah`, `luas_bangunan`) VALUES
('AS0001', 'PJ0001', 'A1', 98, 2000, 2000),
('AS0002', 'PJ0001', 'A2', 60, 1500, 1050);

-- --------------------------------------------------------

--
-- Table structure for table `marketing`
--

CREATE TABLE `marketing` (
  `ktp` varchar(16) NOT NULL,
  `nama` varchar(50) NOT NULL,
  `alamat` varchar(100) NOT NULL,
  `password` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `marketing`
--

INSERT INTO `marketing` (`ktp`, `nama`, `alamat`, `password`) VALUES
('16111105', 'Roni', 'Tasik', '313ffd9a24d50c11cd742ee14bc31b27621c9558');

-- --------------------------------------------------------

--
-- Table structure for table `pm`
--

CREATE TABLE `pm` (
  `ktp` varchar(16) NOT NULL,
  `nama` varchar(50) NOT NULL,
  `alamat` varchar(100) NOT NULL,
  `password` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `pm`
--

INSERT INTO `pm` (`ktp`, `nama`, `alamat`, `password`) VALUES
('15111099', 'Octavian', 'Bandung', '2e0ecdbe839a9682cc92dc8e521b774c44978328');

-- --------------------------------------------------------

--
-- Table structure for table `project`
--

CREATE TABLE `project` (
  `ID_project` varchar(10) NOT NULL,
  `nama` varchar(255) NOT NULL,
  `alamat` varchar(255) NOT NULL,
  `deskripsi` text NOT NULL,
  `jumlah_unit` int(11) NOT NULL,
  `unit_terjual` int(11) NOT NULL,
  `unit_ready` int(11) NOT NULL,
  `ID_catatan_keuangan` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `project`
--

INSERT INTO `project` (`ID_project`, `nama`, `alamat`, `deskripsi`, `jumlah_unit`, `unit_terjual`, `unit_ready`, `ID_catatan_keuangan`) VALUES
('PJ0001', 'Alam Sutra', 'Jalan dimana aja we lah', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Quisque aliquet erat justo, in sollicitudin orci tempor quis. Integer lacinia ipsum eu erat elementum, eu auctor lectus mattis. Nullam mi urna, imperdiet eget lorem ac, mollis vehicula sapien. Fusce magna risus, aliquam eget luctus vel, eleifend in diam. Mauris eros justo, congue sit amet diam ac, porta venenatis tortor. Vivamus ut tempor nisi, eget auctor nibh. Morbi eget velit eget velit viverra consectetur et at dolor.', 100, 0, 100, '');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `ID` int(11) NOT NULL,
  `username` varchar(15) DEFAULT NULL,
  `password` varchar(256) DEFAULT NULL,
  `status` tinyint(1) DEFAULT NULL,
  `nama` varchar(50) DEFAULT NULL,
  `no_telp` varchar(15) DEFAULT NULL,
  `jabatan` varchar(20) DEFAULT NULL,
  `alamat` varchar(100) DEFAULT NULL,
  `no_ktp` varchar(20) DEFAULT NULL,
  `email` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`ID`, `username`, `password`, `status`, `nama`, `no_telp`, `jabatan`, `alamat`, `no_ktp`, `email`) VALUES
(1, 'admin', '$2y$10$o69kh/fAUIpxAXCkm6Fq4ecweSbUmAmHyMJWvN0MPf3.k3lfzEdRC', 1, NULL, NULL, 'Marketing', NULL, '3273172510970001', 'octav@gmail.com'),
(2, 'Octav', '$2y$10$0CZj8/UuaXFYD8MCtTN.Dei6WjuPd.bybaClVrfPc8BcVoITCC17.', 1, NULL, NULL, 'Purchasing', NULL, '31245', 'octa@gmail.com');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `customer`
--
ALTER TABLE `customer`
  ADD PRIMARY KEY (`ktp`);

--
-- Indexes for table `list_project`
--
ALTER TABLE `list_project`
  ADD PRIMARY KEY (`ID_list_project`),
  ADD KEY `ID_project` (`ID_project`);

--
-- Indexes for table `marketing`
--
ALTER TABLE `marketing`
  ADD PRIMARY KEY (`ktp`);

--
-- Indexes for table `pm`
--
ALTER TABLE `pm`
  ADD PRIMARY KEY (`ktp`);

--
-- Indexes for table `project`
--
ALTER TABLE `project`
  ADD PRIMARY KEY (`ID_project`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`ID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `list_project`
--
ALTER TABLE `list_project`
  ADD CONSTRAINT `list_project_ibfk_1` FOREIGN KEY (`ID_project`) REFERENCES `project` (`ID_project`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
