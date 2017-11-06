-- phpMyAdmin SQL Dump
-- version 3.5.2
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Nov 06, 2017 at 02:40 AM
-- Server version: 5.5.25a
-- PHP Version: 5.4.4

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `ezcarcaredb`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE IF NOT EXISTS `admin` (
  `adminID` int(3) NOT NULL AUTO_INCREMENT,
  `userName` varchar(50) NOT NULL,
  `password` varchar(30) NOT NULL,
  PRIMARY KEY (`adminID`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=3 ;

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

CREATE TABLE IF NOT EXISTS `customer` (
  `customerID` int(5) NOT NULL AUTO_INCREMENT,
  `userName` varchar(50) NOT NULL,
  `password` varchar(30) NOT NULL,
  `telNo` varchar(15) NOT NULL,
  `address` varchar(100) NOT NULL,
  `state` varchar(20) NOT NULL,
  `email` varchar(30) NOT NULL,
  `carModel1` varchar(50) NOT NULL,
  `carModel2` varchar(50) NOT NULL,
  `carModel3` varchar(50) NOT NULL,
  PRIMARY KEY (`customerID`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=6 ;

--
-- Dumping data for table `customer`
--

INSERT INTO `customer` (`customerID`, `userName`, `password`, `telNo`, `address`, `state`, `email`, `carModel1`, `carModel2`, `carModel3`) VALUES
(1, 'Axe', '1234', '0123456789', '10, Jalan Perdana 3, Taman Indah Water, 52100', 'WP Kuala Lumpur', 'axe@gmail.com', 'Proton Saga', 'Perodua Myvi', 'Nissan Grand Livina'),
(2, 'TestUser', '12345678', '0126666666', '66,Jalan 6, Taman 6', 'Negeri Sembilan', 'testuser@gmail.com', '', 'Lamborghini', ''),
(3, 'Kitty', '1234', '0127151234', '20,Jalan Sepang', 'Selangor', 'kitty123@gmail.com', 'Wira', 'Jazz', ''),
(4, 'Jacky', '1234', '0124875823', '2, Jalan Duta, Taman Rambutan, 42152', 'WP Kuala Lumpur', 'jacky666@gmail.com', 'Range Rover', 'Avanza', 'Honda Civic'),
(5, 'Strange', '1234', '0125321634', '18, Jalan US, Taman Rich, 52357', 'Pahang', 'strange@gmail.com', 'BMW', 'Audi', 'Ferrari');

-- --------------------------------------------------------

--
-- Table structure for table `request`
--

CREATE TABLE IF NOT EXISTS `request` (
  `requestID` int(5) NOT NULL AUTO_INCREMENT,
  `description` varchar(200) NOT NULL,
  `dateTime` varchar(20) NOT NULL,
  `carModel` varchar(50) NOT NULL,
  `requestAddress` varchar(100) NOT NULL,
  `requestState` varchar(20) NOT NULL,
  `status` varchar(15) NOT NULL,
  `serviceID` int(3) NOT NULL,
  `techID` int(3) DEFAULT NULL,
  `customerID` int(5) NOT NULL,
  `adminID` int(3) DEFAULT NULL,
  PRIMARY KEY (`requestID`),
  KEY `techID` (`techID`),
  KEY `serviceID` (`serviceID`),
  KEY `customerID` (`customerID`),
  KEY `adminID` (`adminID`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=21 ;

--
-- Dumping data for table `request`
--

INSERT INTO `request` (`requestID`, `description`, `dateTime`, `carModel`, `requestAddress`, `requestState`, `status`, `serviceID`, `techID`, `customerID`, `adminID`) VALUES
(13, 'The front bumper has been broken and need to be replaced by a new one.', '2017-11-17T10:00', 'Nissan Grand Livina', '10, Jalan Perdana 3, Taman Indah Water, 52100', 'WP Kuala Lumpur', 'In-progress', 27, 27, 1, 1),
(14, 'The front bumper has been broken and need to be replaced by a new one.', '2017-11-17T10:00', 'Nissan Grand Livina', '5, Jalan 8, Taman 10, 57295', 'Melaka', 'Pending', 27, NULL, 1, NULL),
(15, 'I want to polish my car', '2017-11-17T14:30', 'Jazz', '20,Jalan Sepang', 'Selangor', 'In-progress', 19, 19, 3, 1),
(16, 'I want to check my car tyre.', '2017-11-18T15:00', 'Honda Civic', '2, Jalan Duta, Taman Rambutan, 42152', 'WP Kuala Lumpur', 'In-progress', 15, 33, 4, 1),
(17, 'I want to wash my car.', '2017-11-20T16:00', 'Range Rover', '33, Jalan Melaka, Taman Melaka, 66143', 'Melaka', 'In-progress', 16, 32, 4, 1),
(18, 'There is a weird sound when driving.', '2017-11-20T10:00', 'Wira', '20,Jalan Sepang', 'Selangor', 'In-progress', 20, 36, 3, 1),
(19, 'There is a weird sound when driving.', '2017-11-20T10:00', 'Wira', '34, Jalan Kepong, Taman Kep, 52011', 'WP Kuala Lumpur', 'In-progress', 20, 37, 3, 1),
(20, 'I wish to polish my car.', '2017-11-21T10:00', 'Wira', '20,Jalan Sepang', 'Selangor', 'In-progress', 19, 19, 3, 1);

-- --------------------------------------------------------

--
-- Table structure for table `services`
--

CREATE TABLE IF NOT EXISTS `services` (
  `serviceID` int(3) NOT NULL AUTO_INCREMENT,
  `serviceName` varchar(50) NOT NULL,
  `serviceType` varchar(30) NOT NULL,
  `fees` int(5) NOT NULL,
  PRIMARY KEY (`serviceID`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=28 ;

--
-- Dumping data for table `services`
--

INSERT INTO `services` (`serviceID`, `serviceName`, `serviceType`, `fees`) VALUES
(13, 'Check battery Pro', 'Maintenance', 200),
(15, 'Check Tyre Pro', 'Service', 400),
(16, 'Car Washing Pro', 'Maintenance', 250),
(17, 'Vehicle Air Cond. Repair', 'Service', 600),
(18, 'Accessories Install', 'Service', 400),
(19, 'Vehicle Polishing', 'Maintenance', 350),
(20, 'Vehicle Interior Repair', 'Service', 700),
(21, 'Vehicle Exterior Repair', 'Service', 800),
(22, 'Under Bonet Checking', 'Service', 200),
(23, 'Brake Checking', 'Maintenance', 150),
(24, 'Service Item Replacement', 'Service', 500),
(25, 'Overall Vehicle Checking', 'Service', 650),
(26, 'Vehicle Cushion Maintenance', 'Maintenance', 375),
(27, 'Bumper Repair', 'Service', 640);

-- --------------------------------------------------------

--
-- Table structure for table `technician`
--

CREATE TABLE IF NOT EXISTS `technician` (
  `techID` int(3) NOT NULL AUTO_INCREMENT,
  `techName` varchar(50) NOT NULL,
  `techTelNo` varchar(15) NOT NULL,
  `techAddress` varchar(100) NOT NULL,
  `techState` varchar(20) NOT NULL,
  `techEmail` varchar(30) NOT NULL,
  `specialty` varchar(50) NOT NULL,
  PRIMARY KEY (`techID`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=38 ;

--
-- Dumping data for table `technician`
--

INSERT INTO `technician` (`techID`, `techName`, `techTelNo`, `techAddress`, `techState`, `techEmail`, `specialty`) VALUES
(3, 'Abu Bakar', '60123456789', '2, Jalan 3, Taman 4', 'Sabah', 'AbuB@hotmail.com', 'car air cond. expert'),
(15, 'Mohammad Ali', '0127896584', '39, Jalan Hang Tuah, Taman Rainbow, 52234', 'Perlis', 'MohmAli@gmail.com', 'Check Tyre Expert'),
(16, 'Lee Hong Kee', '0125486936', '4, Jalan 2, Taman 3, 47205', 'Kedah', 'LHK@hotmail.com', 'Check Battery Expert'),
(17, 'Leong Kin Peng', '0145879652', '6, Jalan 3, Taman 9, 65251', 'Pulau Pinang', 'LKP123@gmail.com', 'Car Washing '),
(18, 'Alibaba ', '0168794584', '55, Jalan 92, Taman 9, 56251', 'Perak', 'alibaba666@hotmail.com', 'Accessories Install'),
(19, 'David Beckham', '0158889653', '17, Jalan 4, Taman 66, 67215', 'Selangor', 'davidB@gmail.com', 'Car polishing'),
(20, 'Lee Chong Wei', '0126358749', '22, Jalan 5, Taman 7, 77777', 'Negeri Sembilan', 'LCW123@gmail.com', 'Vehicle interior repair'),
(21, 'Yap Choi Kwong', '0178592632', '5, Jalan 1, Taman 2, 52133', 'Melaka', 'YCK@yahoo.com', 'Vehicle Exterior Expert'),
(22, 'Mohammad Obama', '0132548763', '3, Jalan 3, Taman 4, 52111', 'Johor', 'MObama@yahoo.com', 'Under Bonet Checking Expert'),
(23, 'Wong Jun Wei', '0125487774', '6, Jalan 66, Taman 666, 57284', 'Pahang', 'WJW@hotmail.com', 'Brake Repair Expert'),
(24, 'Abu Yusof', '01116587496', '4, Jalan 6, Taman 1, 83391', 'Terengganu', 'AbuYusof@hotmail.com', 'Service Item Replacement Expert'),
(25, 'Leonardo Messi', '0187954682', '7, Jalan 4, Taman 2, 52118', 'Kelantan', 'MessiBL@gmail.com', 'Overall Vehicle Checking Expert'),
(26, 'Kimberly Cheng', '0169858887', '88, Jalan 7, Taman 99, 42821', 'Sarawak', 'KimberlyCheng@gmail.com', 'Cushion Cleaning and Exchange'),
(27, 'Goh Ban Huat', '0132548752', '8, Jalan 3, Taman 5, 57293', 'WP Kuala Lumpur', 'GBH@hotmail.com', 'Bumper Repair Expert'),
(28, 'Jackson Loo', '0158742235', '5, Jalan 5, Taman 5, 47195', 'WP Kuala Lumpur', 'JacksonLoo@outlook.com', 'Check Tyre Expert'),
(29, 'Benedict Cumberbatch', '0165845658', '43, Jalan 4, Taman 77, 52592', 'WP Kuala Lumpur', 'BC666@outlook.com', 'Car Polishing'),
(30, 'Tony Stark', '01154875263', '4, Jalan 1, Taman 5, 77811', 'Labuan', 'Ironman@gmail.com', 'Vehicle Exterior Expert'),
(31, 'Doctor Strange', '0136587458', '9, Jalan 8, Taman 8, 56282', 'Putrajaya', 'Dr.Strange@gmail.com', 'Car Tyre Exchange'),
(32, 'Donald Trump', '0154874523', '5, Jalan 4, Taman 6, 55927', 'Melaka', 'DT879@gmail.com', 'Car Washing'),
(33, 'Sherlock Holmes', '0154236987', '3, Baker Street, Taman Metropoliton, 49184', 'WP Kuala Lumpur', 'sherlock@gmail.com', 'Check Tyre Master'),
(35, 'Siti Nor', '0156896584', '12, Jalan Mewah, Taman Setia, 52200', 'Sabah', 'Siti@gmail.com', 'Check Interior Expert'),
(36, 'Low Hiat', '0125689854', '23, Jalan 4, Taman 47, 54875', 'Selangor', 'low@gmail.com', 'Check Interior Expert'),
(37, 'Holly', '0158459685', '8, Jalan 23, Taman Huat, 54125', 'WP Kuala Lumpur', 'holly@gmail.com', 'Check Interior Expert');

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

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
