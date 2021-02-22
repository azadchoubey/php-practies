-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 22, 2021 at 05:57 PM
-- Server version: 10.1.40-MariaDB
-- PHP Version: 7.3.5

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `upsc`
--

-- --------------------------------------------------------

--
-- Table structure for table `joining`
--

CREATE TABLE `joining` (
  `id` int(11) NOT NULL,
  `Name` text NOT NULL,
  `Gender` text NOT NULL,
  `DOB` date NOT NULL,
  `Father` text NOT NULL,
  `Mother` text NOT NULL,
  `Nationality` text NOT NULL,
  `Marital` text NOT NULL,
  `Physically` text NOT NULL,
  `Community` varchar(20) NOT NULL,
  `Qualification` varchar(25) NOT NULL,
  `Addline1` varchar(65) NOT NULL,
  `Addline2` varchar(65) NOT NULL,
  `Addline3` varchar(65) NOT NULL,
  `City` varchar(25) NOT NULL,
  `State` text NOT NULL,
  `Pincode` int(10) NOT NULL,
  `Mobile` int(10) NOT NULL,
  `Email` varchar(20) NOT NULL,
  `Submitdate` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `joining`
--

INSERT INTO `joining` (`id`, `Name`, `Gender`, `DOB`, `Father`, `Mother`, `Nationality`, `Marital`, `Physically`, `Community`, `Qualification`, `Addline1`, `Addline2`, `Addline3`, `City`, `State`, `Pincode`, `Mobile`, `Email`, `Submitdate`) VALUES
(2, 'azad choubey', 'Male', '1997-08-15', 'Vijay choubey', 'reeta devi', 'indian', 'Unmarried', 'Yes', 'Yes', 'Grauation ', 'Ludhiana', '', '', 'ludhiana', 'Punjab', 141015, 2147483647, 'choubeyazad@gmail.co', '2021-02-22 21:29:32'),
(18, 'azad choubey', 'Male', '2021-02-22', 'AZA', 'AZAD', 'indian', 'Married', 'Yes', 'No', 'Grauation ', 'AZAD', 'AZAD', 'AZAD', 'asdsad', 'Andaman and Nicobar Islands', 14101, 2147483647, 'azad@gmail.com', '2021-02-22 22:23:20'),
(22, 'AZAD CHOUBEY', 'Male', '1995-08-15', 'choubey', 'choubey', 'indian', 'Unmarried', 'Yes', 'Yes', '10+2 ', 'HN.05 VILL MUNDIAN TIBBA , MUN', 'NEAR FORTIS HOSPITAL', 'azad', 'LUDHIANA', 'Andaman and Nicobar Islands', 141015, 2147483647, 'choubeyazad7@gmail.c', '2021-02-22 22:27:04');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `joining`
--
ALTER TABLE `joining`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `Email` (`Email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `joining`
--
ALTER TABLE `joining`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
