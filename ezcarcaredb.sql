-- phpMyAdmin SQL Dump
-- version 4.7.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 30, 2017 at 10:04 AM
-- Server version: 10.1.25-MariaDB
-- PHP Version: 7.1.7

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `ezcarcaredb`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `adminID` int(3) NOT NULL,
  `userName` varchar(50) NOT NULL,
  `password` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`adminID`, `userName`, `password`) VALUES
(1, 'Bankai2212', '1234'),
(2, 'Holelee', '5678');

-- --------------------------------------------------------

--
-- Table structure for table `customer`
--

CREATE TABLE `customer` (
  `customerID` int(5) NOT NULL,
  `userName` varchar(50) NOT NULL,
  `password` varchar(30) NOT NULL,
  `telNo` varchar(15) NOT NULL,
  `address` varchar(100) NOT NULL,
  `state` varchar(20) NOT NULL,
  `email` varchar(30) NOT NULL,
  `carModel1` varchar(50) NOT NULL,
  `carModel2` varchar(50) NOT NULL,
  `carModel3` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `customer`
--

INSERT INTO `customer` (`customerID`, `userName`, `password`, `telNo`, `address`, `state`, `email`, `carModel1`, `carModel2`, `carModel3`) VALUES
(1, 'Axe', '1234', '0123456789', '10, Jalan Perdana 3, Taman Indah Water, 52100', 'WP Kuala Lumpur', 'axe@gmail.com', 'Proton Saga', 'Perodua Myvi', 'Nissan Grand Livina');

-- --------------------------------------------------------

--
-- Table structure for table `request`
--

CREATE TABLE `request` (
  `requestID` int(5) NOT NULL,
  `description` varchar(200) NOT NULL,
  `dateTime` varchar(20) NOT NULL,
  `carModel` varchar(50) NOT NULL,
  `requestAddress` varchar(100) NOT NULL,
  `requestState` varchar(20) NOT NULL,
  `status` varchar(15) NOT NULL,
  `serviceID` int(3) NOT NULL,
  `techID` int(3) DEFAULT NULL,
  `customerID` int(5) NOT NULL,
  `adminID` int(3) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `request`
--

INSERT INTO `request` (`requestID`, `description`, `dateTime`, `carModel`, `requestAddress`, `requestState`, `status`, `serviceID`, `techID`, `customerID`, `adminID`) VALUES
(10, 'Test date and time', '2017-10-30T17:01', 'Proton Saga', '10, Jalan Perdana 3, Taman Indah Water, 52100', 'WP Kuala Lumpur', 'Pending', 13, NULL, 1, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `services`
--

CREATE TABLE `services` (
  `serviceID` int(3) NOT NULL,
  `serviceName` varchar(50) NOT NULL,
  `serviceType` varchar(30) NOT NULL,
  `fees` int(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `services`
--

INSERT INTO `services` (`serviceID`, `serviceName`, `serviceType`, `fees`) VALUES
(13, 'Check battery Pro', 'Maintenance', 200),
(14, 'TestService', 'Maintenance', 300);

-- --------------------------------------------------------

--
-- Table structure for table `technician`
--

CREATE TABLE `technician` (
  `techID` int(3) NOT NULL,
  `techName` varchar(50) NOT NULL,
  `techTelNo` varchar(15) NOT NULL,
  `techAddress` varchar(100) NOT NULL,
  `techState` varchar(20) NOT NULL,
  `techEmail` varchar(30) NOT NULL,
  `specialty` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `technician`
--

INSERT INTO `technician` (`techID`, `techName`, `techTelNo`, `techAddress`, `techState`, `techEmail`, `specialty`) VALUES
(3, 'Abu Bakar', '60123456789', '2, Jalan 3, Taman 4', 'Sabah', 'AbuB@hotmail.com', 'car air cond. expert'),
(4, 'h', 'd', 'h', 'Labuan', 'h@gmail.com', 'h'),
(5, 'lol', 'dededd', 'frffr', 'Sarawak', '3@gmail.com', 'frfrf'),
(6, 'gtgtg', 'tgtgg', 'tgtgt', 'Sabah', 'gtgtgtg@h', 'gtgtgtg'),
(7, 'hyhyh', 'hyh', 'yhyhyh', 'Sabah', 'yhyh@f', 'yhyh'),
(8, 'xedx', 'ses2222', 'sw', 'Sabah', 'ww@dd', 'eseew'),
(9, 'xedx', 'ses2222', 'sw', 'Sabah', 'ww@dd', 'eseew'),
(10, 'dde', 'ed2222', 'dxdx', 'Sarawak', '22@s', 'zs'),
(11, 'rfrf', '333444444', 'frff', 'Terengganu', 'frf@sss', '4rf3f'),
(12, 'TestTechnician', '0122025106', '31, Jalan Proton 12, Taman Indah Proton, 52222', 'Melaka', 'Test@gmail.com', 'Test specialty');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`adminID`);

--
-- Indexes for table `customer`
--
ALTER TABLE `customer`
  ADD PRIMARY KEY (`customerID`);

--
-- Indexes for table `request`
--
ALTER TABLE `request`
  ADD PRIMARY KEY (`requestID`),
  ADD KEY `techID` (`techID`),
  ADD KEY `serviceID` (`serviceID`),
  ADD KEY `customerID` (`customerID`),
  ADD KEY `adminID` (`adminID`);

--
-- Indexes for table `services`
--
ALTER TABLE `services`
  ADD PRIMARY KEY (`serviceID`);

--
-- Indexes for table `technician`
--
ALTER TABLE `technician`
  ADD PRIMARY KEY (`techID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `adminID` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `customer`
--
ALTER TABLE `customer`
  MODIFY `customerID` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `request`
--
ALTER TABLE `request`
  MODIFY `requestID` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
--
-- AUTO_INCREMENT for table `services`
--
ALTER TABLE `services`
  MODIFY `serviceID` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;
--
-- AUTO_INCREMENT for table `technician`
--
ALTER TABLE `technician`
  MODIFY `techID` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `request`
--
ALTER TABLE `request`
  ADD CONSTRAINT `request_ibfk_1` FOREIGN KEY (`techID`) REFERENCES `technician` (`techID`),
  ADD CONSTRAINT `request_ibfk_2` FOREIGN KEY (`serviceID`) REFERENCES `services` (`serviceID`),
  ADD CONSTRAINT `request_ibfk_3` FOREIGN KEY (`customerID`) REFERENCES `customer` (`customerID`),
  ADD CONSTRAINT `request_ibfk_4` FOREIGN KEY (`adminID`) REFERENCES `admin` (`adminID`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
