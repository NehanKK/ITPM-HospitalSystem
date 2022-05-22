-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Sep 07, 2021 at 11:33 AM
-- Server version: 10.4.18-MariaDB
-- PHP Version: 7.3.27

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `interview_app`
--

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `title` char(5) NOT NULL,
  `f_name` char(50) NOT NULL,
  `l_name` char(50) NOT NULL,
  `mobile` char(15) NOT NULL,
  `email` char(100) NOT NULL,
  `birthday` date DEFAULT NULL,
  `password` varchar(512) NOT NULL,
  `role` char(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`title`, `f_name`, `l_name`, `mobile`, `email`, `birthday`, `password`, `role`) VALUES
('Mr', 'Charith', 'Bandara', '0777222444', 'charith@gmail.com', '0000-00-00', '$2y$10$If0L6QT7uH3k9Ha2Hg1aceRRNUh/cMFtLTn6Khzb516ZK7Y1ZF8ke', 'user'),
('Mr', 'Hasantha', 'Gimhana', '0777222333', 'hasantha@gmail.com', '0000-00-00', '$2y$10$a1Mcbu66ZbKtIIgfqFONEevNtaEiOCXY8DmzTtGiozPuw7MG0ByBu', 'user'),
('Mr', 'Umayanga', 'Madushan', '0777328632', 'umayangamadushan@gmail.com', '0000-00-00', '$2y$10$ZkpU1acglbbhYgfZqu8/UenD03BtTEKx8PGqFzVk09Jk69H6UxTNu', 'user');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`email`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
