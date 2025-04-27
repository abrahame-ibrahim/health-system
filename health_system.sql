-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 27, 2025 at 06:21 PM
-- Server version: 10.4.27-MariaDB
-- PHP Version: 8.2.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `health_system`
--

-- --------------------------------------------------------

--
-- Table structure for table `clients`
--

CREATE TABLE `clients` (
  `id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `email` varchar(100) DEFAULT NULL,
  `phone` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `clients`
--

INSERT INTO `clients` (`id`, `name`, `email`, `phone`) VALUES
(1, 'Abraham Mwangi', 'abrahameibrahim@gmail.com', '0728251935'),
(2, 'Abraham Mwangi', 'abrahameibrahim@gmail.com', '0728251935'),
(3, 'Abraham Mwangi', 'abrahameibrahim@gmail.com', '0723456789'),
(4, 'Abraham Mwangi', 'abrahameibrahim@gmail.com', '0723456789'),
(5, 'Abraham Mwangi', 'abrahameibrahim@gmail.com', '0723456789'),
(6, 'Abraham Mwangi', 'abrahameibrahim@gmail.com', '0723456789'),
(7, 'Abraham Mwangi', 'abrahameibrahim@gmail.com', '0723456789'),
(8, 'Abraham Mwangi', 'abrahameibrahim@gmail.com', '0723456789'),
(9, 'Abraham Mwangi', 'abrahameibrahim@gmail.com', '0723456789'),
(10, 'luxe', 'luxe@gmail.com', '0723456789'),
(11, 'luxe', 'luxe@gmail.com', '0723456789'),
(12, 'Abraham Mwangi', 'abrahameibrahim@gmail.com', '0723456789'),
(13, 'mine', 'mine@gmail.com', '0710173991'),
(14, 'Abraham Mwangi', NULL, NULL),
(15, 'Abraham Mwangi', 'abrahameibrahim@gmail.com', '0723456789'),
(16, 'Abraham Mwangi', 'abrahameibrahim@gmail.com', '0723456789'),
(17, 'Abraham Mwangi', 'abrahameibrahim@gmail.com', '0723456789'),
(18, 'Abraham Mwangi', 'abrahameibrahim@gmail.com', '0723456789'),
(19, 'zayne', 'zayne@gmail.com', '0711945678'),
(20, 'Abraham Mwangi', 'abrahameibrahim@gmail.com', '0723456789'),
(21, 'Abraham Mwangi', 'abrahameibrahim@gmail.com', '0723456789'),
(22, '', '', ''),
(23, '', '', ''),
(24, 'Abraham Mwangi', 'abrahameibrahim@gmail.com', '0723456789'),
(25, 'Abraham Mwangi', 'abrahameibrahim@gmail.com', '0723456789');

-- --------------------------------------------------------

--
-- Table structure for table `client_programs`
--

CREATE TABLE `client_programs` (
  `client_id` int(11) DEFAULT NULL,
  `program_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `client_programs`
--

INSERT INTO `client_programs` (`client_id`, `program_id`) VALUES
(1, 1),
(1, 1),
(1, 1),
(2, 1),
(2, 1),
(2, 1),
(2, 1),
(2, 4),
(2, 4),
(2, 5),
(4, 6),
(1, 4),
(1, 5),
(1, 5),
(1, 5),
(5, 1),
(8, 1),
(6, 1),
(1, 2),
(10, 2),
(1, 2),
(1, 2),
(1, 2),
(11, 3),
(1, 3),
(1, 4),
(1, 2);

-- --------------------------------------------------------

--
-- Table structure for table `doctors`
--

CREATE TABLE `doctors` (
  `id` int(11) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `doctors`
--

INSERT INTO `doctors` (`id`, `username`, `password`) VALUES
(1, 'mimo', '81dc9bdb52d04dc20036dbd8313ed055');

-- --------------------------------------------------------

--
-- Table structure for table `programs`
--

CREATE TABLE `programs` (
  `id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `programs`
--

INSERT INTO `programs` (`id`, `name`) VALUES
(1, 'Malaria'),
(2, 'Malaria'),
(3, 'TB'),
(4, 'Hepatitis'),
(5, 'Chlamydia'),
(6, 'Syphilis');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `clients`
--
ALTER TABLE `clients`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `client_programs`
--
ALTER TABLE `client_programs`
  ADD KEY `client_id` (`client_id`),
  ADD KEY `program_id` (`program_id`);

--
-- Indexes for table `doctors`
--
ALTER TABLE `doctors`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `username` (`username`);

--
-- Indexes for table `programs`
--
ALTER TABLE `programs`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `clients`
--
ALTER TABLE `clients`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT for table `doctors`
--
ALTER TABLE `doctors`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `programs`
--
ALTER TABLE `programs`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `client_programs`
--
ALTER TABLE `client_programs`
  ADD CONSTRAINT `client_programs_ibfk_1` FOREIGN KEY (`client_id`) REFERENCES `clients` (`id`),
  ADD CONSTRAINT `client_programs_ibfk_2` FOREIGN KEY (`program_id`) REFERENCES `programs` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
