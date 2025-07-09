-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 10, 2024 at 05:24 AM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `tourist`
--

-- --------------------------------------------------------

--
-- Table structure for table `booking`
--

CREATE TABLE `booking` (
  `FullName` varchar(100) NOT NULL,
  `Age` int(100) NOT NULL,
  `Phone` varchar(100) NOT NULL,
  `Email` varchar(100) NOT NULL,
  `Date` varchar(100) NOT NULL,
  `Number_Of_People` int(100) NOT NULL,
  `Pick_Up` varchar(100) NOT NULL,
  `Gender` varchar(100) NOT NULL,
  `Destination` varchar(100) NOT NULL,
  `TotalAmount` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `booking`
--

INSERT INTO `booking` (`FullName`, `Age`, `Phone`, `Email`, `Date`, `Number_Of_People`, `Pick_Up`, `Gender`, `Destination`, `TotalAmount`) VALUES
('yash', 19, '8866473303', 'udaybediya19@gmail.com', '10/14/2024', 5, 'Rajkot', 'Male', 'Saputara - Adventure Camp', '₹16000.00');

-- --------------------------------------------------------

--
-- Table structure for table `contact`
--

CREATE TABLE `contact` (
  `sr_no` int(100) NOT NULL,
  `Name` varchar(100) NOT NULL,
  `Email` varchar(100) NOT NULL,
  `Phone` varchar(100) NOT NULL,
  `Company_Name` varchar(100) NOT NULL,
  `Message` varchar(500) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `contact`
--

INSERT INTO `contact` (`sr_no`, `Name`, `Email`, `Phone`, `Company_Name`, `Message`) VALUES
(1, 'parth ', 'hpgadhiyaparth@gmail.com', '2147483647', 'Abc', 'hii how are You?'),
(2, 'parth abc', 'hpgadhiyaparth@gmail.com', '2147483647', 'cchs', 'asodjehjheicec'),
(3, 'parth abc', 'hpgadhiyaparth@gmail.com', '2147483647', 'cchs', 'asodjehjheicec'),
(4, 'abhii', 'abhii19@gmail.com', '2147483647', 'infinity', 'Hello, Give me your information.'),
(5, 'parth abc', 'hpgadhiyaparth@gmail.com', '2147483647', '', 'efhwehdsjfgfcusdcho9uchewgujsdjcjsdchcscsdcsc'),
(6, 'uday', 'udaybediya19@gmail.com', '8866473303', 'Bediya Interprice', ' hal hal hal hal hal');

-- --------------------------------------------------------

--
-- Table structure for table `regi`
--

CREATE TABLE `regi` (
  `Username` varchar(100) NOT NULL,
  `Email` varchar(100) NOT NULL,
  `Mobile_Number` varchar(15) DEFAULT NULL,
  `type` varchar(100) DEFAULT 'tourist',
  `Password` varchar(100) NOT NULL,
  `id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `regi`
--

INSERT INTO `regi` (`Username`, `Email`, `Mobile_Number`, `type`, `Password`, `id`) VALUES
('admin', 'udaybediya19@gmail.com', '1234567890', 'admin', 'admin123', 1),
('uday', 'udaybediya19@gmail.com', '8866473303', 'tourist', '123', 2);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `contact`
--
ALTER TABLE `contact`
  ADD PRIMARY KEY (`sr_no`);

--
-- Indexes for table `regi`
--
ALTER TABLE `regi`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `contact`
--
ALTER TABLE `contact`
  MODIFY `sr_no` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `regi`
--
ALTER TABLE `regi`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
