-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 02, 2018 at 09:52 PM
-- Server version: 10.1.29-MariaDB
-- PHP Version: 7.1.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `typing_test`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `admin_ID` int(10) NOT NULL,
  `admin_name` varchar(200) NOT NULL,
  `admin_email` varchar(300) NOT NULL,
  `admin_pass` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`admin_ID`, `admin_name`, `admin_email`, `admin_pass`) VALUES
(1, 'Mohammad Sajjad', 'admin@comtech4all.com', 'admin1214'),
(2, 'Mansarim Tabassum', 'mansarim@comtech4all.com', 'mansarim1214'),
(5, 'Kashif Ali', 'kashifali@comtech4all.com', 'kashif1214');

-- --------------------------------------------------------

--
-- Table structure for table `login`
--

CREATE TABLE `login` (
  `id` int(11) NOT NULL,
  `Student_ID` varchar(50) NOT NULL,
  `Student_Name` varchar(50) NOT NULL,
  `Password` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `login`
--

INSERT INTO `login` (`id`, `Student_ID`, `Student_Name`, `Password`) VALUES
(2, 'Ali123455tgt5gt', 'Shahnaz Abidi', '1234'),
(3, 'mashaar121454', 'Kashif1214', 'Kashif1214kjhjkhkhkhh');

-- --------------------------------------------------------

--
-- Table structure for table `result`
--

CREATE TABLE `result` (
  `res_id` int(11) NOT NULL,
  `Student_ID` varchar(50) NOT NULL,
  `Student_Name` varchar(200) NOT NULL,
  `wpm` float NOT NULL,
  `Accuracy` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `result`
--

INSERT INTO `result` (`res_id`, `Student_ID`, `Student_Name`, `wpm`, `Accuracy`) VALUES
(33, 'Ali1214', 'Mohammad Ali', 1, 2.31092),
(34, 'Ghayaas1214', 'Mohammad Ghayaas', 0.6, 1.71123),
(35, 'Kashif1214', 'Kashif Ali', 4.2, 21.5534),
(36, 'Sana1214', 'Sana Arooj', 1.6, 9.92761),
(37, 'Daniyal1214', 'Mohamamd Daniyal', 1, 5.47368);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`admin_ID`);

--
-- Indexes for table `login`
--
ALTER TABLE `login`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `result`
--
ALTER TABLE `result`
  ADD PRIMARY KEY (`res_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `admin_ID` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `login`
--
ALTER TABLE `login`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `result`
--
ALTER TABLE `result`
  MODIFY `res_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=38;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
