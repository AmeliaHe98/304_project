-- phpMyAdmin SQL Dump
-- version 4.9.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Nov 21, 2019 at 08:54 AM
-- Server version: 10.4.8-MariaDB
-- PHP Version: 7.1.32

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `carrental`
--

-- --------------------------------------------------------

--
-- Table structure for table `branch`
--

CREATE TABLE `branch` (
  `LOCATION_ID` varchar(40) NOT NULL,
  `CITY` varchar(40) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `CarStatus`
--

CREATE TABLE `CarStatus` (
  `STATUS_ID` int(11) NOT NULL,
  `CAR_STATUS` char(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `Customer`
--

CREATE TABLE `Customer` (
  `DLICENSE` int(13) NOT NULL,
  `CELLPHONE` int(13) DEFAULT NULL,
  `NAME_ID` varchar(40) DEFAULT NULL,
  `ADDRESS_ID` varchar(40) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `Equipment`
--

CREATE TABLE `Equipment` (
  `EID` int(13) NOT NULL,
  `ETNAME` varchar(40) NOT NULL,
  `VTNAME` varchar(40) NOT NULL,
  `STATUS_ID` varchar(40) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `GasType`
--

CREATE TABLE `GasType` (
  `GASTYPE_ID` int(11) NOT NULL,
  `GASTYPE` char(32) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `Reservation`
--

CREATE TABLE `Reservation` (
  `CONFNO` int(13) NOT NULL,
  `VTNAME` varchar(40) NOT NULL,
  `DLICENSE` varchar(40) NOT NULL,
  `FROMDATE` date NOT NULL,
  `FROMTIME` time NOT NULL,
  `TODATE` date NOT NULL,
  `TOTIME` time NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `Vehicle`
--

CREATE TABLE `Vehicle` (
  `VID` int(13) NOT NULL,
  `VLICENSE` int(13) NOT NULL,
  `MAKE` varchar(40) NOT NULL,
  `MODEL` varchar(40) NOT NULL,
  `YEAR` year(4) NOT NULL,
  `COLOR` varchar(40) NOT NULL,
  `ODOMETER` int(11) NOT NULL,
  `STATUS_ID` varchar(40) NOT NULL,
  `VTNAME` varchar(40) NOT NULL,
  `LOCATION_ID` varchar(40) DEFAULT NULL,
  `CITY` varchar(40) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `VehicleType`
--

CREATE TABLE `VehicleType` (
  `VTNAME` varchar(40) NOT NULL,
  `FEATURES` varchar(40) DEFAULT NULL,
  `WRATE` int(11) DEFAULT NULL,
  `DRATE` int(11) DEFAULT NULL,
  `HRATE` int(11) DEFAULT NULL,
  `WIRATE` int(11) DEFAULT NULL,
  `DIRATE` int(11) DEFAULT NULL,
  `HIRATE` int(11) DEFAULT NULL,
  `KRATE` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `branch`
--
ALTER TABLE `branch`
  ADD PRIMARY KEY (`LOCATION_ID`,`CITY`);

--
-- Indexes for table `CarStatus`
--
ALTER TABLE `CarStatus`
  ADD PRIMARY KEY (`STATUS_ID`);

--
-- Indexes for table `Customer`
--
ALTER TABLE `Customer`
  ADD PRIMARY KEY (`DLICENSE`);

--
-- Indexes for table `Equipment`
--
ALTER TABLE `Equipment`
  ADD PRIMARY KEY (`EID`),
  ADD UNIQUE KEY `VTNAME` (`VTNAME`);

--
-- Indexes for table `GasType`
--
ALTER TABLE `GasType`
  ADD PRIMARY KEY (`GASTYPE_ID`);

--
-- Indexes for table `Reservation`
--
ALTER TABLE `Reservation`
  ADD PRIMARY KEY (`CONFNO`),
  ADD UNIQUE KEY `VTNAME` (`VTNAME`),
  ADD UNIQUE KEY `DLICENSE` (`DLICENSE`);

--
-- Indexes for table `Vehicle`
--
ALTER TABLE `Vehicle`
  ADD PRIMARY KEY (`VID`),
  ADD UNIQUE KEY `VLICENSE` (`VLICENSE`),
  ADD UNIQUE KEY `VTNAME` (`VTNAME`);

--
-- Indexes for table `VehicleType`
--
ALTER TABLE `VehicleType`
  ADD PRIMARY KEY (`VTNAME`);

--
-- Constraints for dumped tables
--

--
-- Constraints for table `Vehicle`
--
ALTER TABLE `Vehicle`
  ADD CONSTRAINT `vehicle_ibfk_1` FOREIGN KEY (`VTNAME`) REFERENCES `VehicleType` (`VTNAME`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
