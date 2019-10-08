-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 07, 2019 at 12:51 PM
-- Server version: 10.4.6-MariaDB
-- PHP Version: 7.3.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `billingsystem`
--

-- --------------------------------------------------------

--
-- Table structure for table `custdetails`
--

CREATE TABLE `custdetails` (
  `cId` int(11) NOT NULL,
  `cName` varchar(40) NOT NULL,
  `cPhoNo` varchar(15) NOT NULL,
  `cEmail` varchar(40) NOT NULL,
  `cAddress` varchar(40) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `custdetails`
--

INSERT INTO `custdetails` (`cId`, `cName`, `cPhoNo`, `cEmail`, `cAddress`) VALUES
(1, 'Chandrakant', '8805224360', 'chinulakhani@gmail.com', 'Amravati'),
(2, 'Rucha', '7588402939', 'rvisal87@gmail.com', 'Patna'),
(4, 'Mayank', '8208546023', 'mayank@gmail.com', 'Pune'),
(7, 'darsh', '11425251425', 'abc@gmail.com', 'pune');

-- --------------------------------------------------------

--
-- Table structure for table `inventory`
--

CREATE TABLE `inventory` (
  `prodId` int(11) NOT NULL,
  `qty` int(11) NOT NULL,
  `mrp` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `inventory`
--

INSERT INTO `inventory` (`prodId`, `qty`, `mrp`) VALUES
(23, 45, 10),
(24, 1992, 6),
(24, 80, 7),
(25, 11, 10),
(26, 52, 60000),
(27, -20, 10),
(27, 60, 20),
(29, 13, 20),
(39, 45, 30);

-- --------------------------------------------------------

--
-- Table structure for table `login`
--

CREATE TABLE `login` (
  `USERNAME` varchar(50) NOT NULL,
  `PASSWORD` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `login`
--

INSERT INTO `login` (`USERNAME`, `PASSWORD`) VALUES
('admin@gmail.com', '1234'),
('mayur@gmail.com', '123'),
('darshil@gmail.com', '123'),
('adya.hrishi@gmail.com', '12321'),
('dhanesh@gmail.com', '1234');

-- --------------------------------------------------------

--
-- Table structure for table `proddetails`
--

CREATE TABLE `proddetails` (
  `prodId` int(10) NOT NULL,
  `pName` varchar(20) DEFAULT NULL,
  `minQty` int(11) NOT NULL,
  `maxQty` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `proddetails`
--

INSERT INTO `proddetails` (`prodId`, `pName`, `minQty`, `maxQty`) VALUES
(5, 'Sugar', 10, 50),
(6, 'Dairy Milk', 50, 100),
(13, 'Trimax Pen', 15, 23),
(14, 'Wheat', 10, 50),
(21, 'Lux Soap', 50, 150),
(22, 'Rin Soap', 10, 60),
(23, 'Bisleri Water', 10, 20),
(24, 'Eggs', 12, 1000),
(25, 'Lays Massala', 50, 200),
(26, 'Samsung s10+', 5, 20),
(27, 'Oreo', 1, 10),
(28, 'Salt', 20, 60),
(29, 'Bourbon', 5, 20),
(32, 'ThumsUp', 50, 300),
(39, 'Nivea Cream 250gm', 25, 75),
(41, 'pen', 10, 30);

-- --------------------------------------------------------

--
-- Table structure for table `purchaseinvoice`
--

CREATE TABLE `purchaseinvoice` (
  `pInvNo` int(11) NOT NULL,
  `pInvDate` date NOT NULL,
  `sId` int(11) NOT NULL,
  `pInvAmt` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `purchaseinvoice`
--

INSERT INTO `purchaseinvoice` (`pInvNo`, `pInvDate`, `sId`, `pInvAmt`) VALUES
(14, '2019-09-23', 7, 2250000),
(16, '2019-09-23', 7, 225000),
(17, '2019-09-23', 7, 450000),
(18, '2019-09-23', 5, 80),
(19, '2019-09-23', 5, 80),
(20, '2019-09-23', 6, 450000),
(21, '2019-09-23', 0, 600),
(22, '2019-09-23', 7, 2000),
(23, '2019-09-23', 5, 400),
(24, '2019-09-23', 5, 500),
(25, '2019-09-24', 10, 2250000),
(26, '2019-09-24', 10, 2250000),
(27, '2019-09-24', 7, 75),
(28, '2019-09-24', 10, 2250000),
(29, '2019-09-26', 10, 900000),
(30, '2019-09-28', 7, 2000),
(31, '2019-09-28', 7, 6800),
(32, '2019-09-28', 7, 360),
(33, '2019-09-30', 7, 1410),
(34, '2019-10-05', 5, 1440);

-- --------------------------------------------------------

--
-- Table structure for table `puritem`
--

CREATE TABLE `puritem` (
  `pInvNo` int(11) NOT NULL,
  `prodId` int(11) NOT NULL,
  `pInvQty` int(11) NOT NULL,
  `pItemRate` int(11) NOT NULL,
  `itemMrp` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `puritem`
--

INSERT INTO `puritem` (`pInvNo`, `prodId`, `pInvQty`, `pItemRate`, `itemMrp`) VALUES
(14, 26, 50, 45000, 60000),
(16, 26, 5, 45000, 60000),
(17, 26, 10, 45000, 60000),
(18, 23, 10, 8, 10),
(19, 23, 10, 8, 10),
(20, 26, 10, 45000, 60000),
(21, 23, 50, 12, 15),
(22, 24, 500, 4, 6),
(23, 24, 100, 4, 6),
(24, 24, 100, 5, 7),
(25, 26, 50, 45000, 60000),
(26, 26, 5, 450000, 60000),
(27, 24, 15, 5, 7),
(28, 26, 5, 450000, 60000),
(29, 26, 20, 45000, 60000),
(30, 24, 500, 4, 6),
(31, 24, 1700, 4, 6),
(32, 29, 20, 18, 20),
(33, 39, 50, 25, 30),
(33, 25, 20, 8, 10),
(34, 23, 45, 8, 10),
(34, 27, 60, 18, 20);

-- --------------------------------------------------------

--
-- Table structure for table `saleinv`
--

CREATE TABLE `saleinv` (
  `sInvNo` int(11) NOT NULL,
  `sInvDate` date NOT NULL,
  `cId` int(11) NOT NULL,
  `sInvAmount` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `saleinv`
--

INSERT INTO `saleinv` (`sInvNo`, `sInvDate`, `cId`, `sInvAmount`) VALUES
(5, '2019-09-23', 1, 600),
(6, '2019-09-23', 1, 175),
(7, '2019-09-24', 1, 600000),
(8, '2019-09-24', 1, 300000),
(9, '2019-09-24', 1, 300000),
(10, '2019-09-26', 4, 480070),
(11, '2019-09-28', 1, 4200),
(12, '2019-09-28', 2, 98),
(13, '2019-09-30', 4, 240),
(14, '2019-10-01', 1, 100),
(15, '2019-10-01', 2, 200);

-- --------------------------------------------------------

--
-- Table structure for table `saleitem`
--

CREATE TABLE `saleitem` (
  `sInvNo` int(11) NOT NULL,
  `prodId` int(11) NOT NULL,
  `sInvQty` int(11) NOT NULL,
  `itemMrp` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `saleitem`
--

INSERT INTO `saleitem` (`sInvNo`, `prodId`, `sInvQty`, `itemMrp`) VALUES
(5, 24, 100, 6),
(6, 24, 25, 7),
(7, 26, 10, 60000),
(8, 26, 5, 60000),
(9, 26, 5, 60000),
(10, 26, 8, 60000),
(10, 24, 10, 7),
(11, 24, 700, 6),
(12, 29, 2, 20),
(12, 24, 8, 6),
(13, 39, 5, 30),
(13, 25, 9, 10),
(14, 29, 5, 20),
(15, 27, 20, 10);

-- --------------------------------------------------------

--
-- Table structure for table `suppdetails`
--

CREATE TABLE `suppdetails` (
  `sId` int(10) NOT NULL,
  `sName` varchar(20) DEFAULT NULL,
  `sPhoNum` varchar(10) NOT NULL,
  `sEmail` varchar(20) NOT NULL,
  `sAddress` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `suppdetails`
--

INSERT INTO `suppdetails` (`sId`, `sName`, `sPhoNum`, `sEmail`, `sAddress`) VALUES
(5, 'Lalit Enterprises', '9370836688', 'lalit@gmail.com', 'Pune'),
(7, 'Om Enterprises', '9923120760', 'om@gmail.com', 'Pune');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `custdetails`
--
ALTER TABLE `custdetails`
  ADD PRIMARY KEY (`cId`),
  ADD UNIQUE KEY `cPhoNo` (`cPhoNo`),
  ADD UNIQUE KEY `cEmail` (`cEmail`);

--
-- Indexes for table `inventory`
--
ALTER TABLE `inventory`
  ADD PRIMARY KEY (`prodId`,`mrp`);

--
-- Indexes for table `proddetails`
--
ALTER TABLE `proddetails`
  ADD PRIMARY KEY (`prodId`),
  ADD UNIQUE KEY `pName` (`pName`);

--
-- Indexes for table `purchaseinvoice`
--
ALTER TABLE `purchaseinvoice`
  ADD PRIMARY KEY (`pInvNo`);

--
-- Indexes for table `puritem`
--
ALTER TABLE `puritem`
  ADD KEY `pInvNo` (`pInvNo`),
  ADD KEY `prodId` (`prodId`);

--
-- Indexes for table `saleinv`
--
ALTER TABLE `saleinv`
  ADD PRIMARY KEY (`sInvNo`),
  ADD KEY `cId` (`cId`);

--
-- Indexes for table `saleitem`
--
ALTER TABLE `saleitem`
  ADD KEY `sInvNo` (`sInvNo`),
  ADD KEY `prodId` (`prodId`);

--
-- Indexes for table `suppdetails`
--
ALTER TABLE `suppdetails`
  ADD PRIMARY KEY (`sId`),
  ADD UNIQUE KEY `sPhoNum` (`sPhoNum`),
  ADD UNIQUE KEY `sEmail` (`sEmail`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `custdetails`
--
ALTER TABLE `custdetails`
  MODIFY `cId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `proddetails`
--
ALTER TABLE `proddetails`
  MODIFY `prodId` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=43;

--
-- AUTO_INCREMENT for table `purchaseinvoice`
--
ALTER TABLE `purchaseinvoice`
  MODIFY `pInvNo` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=35;

--
-- AUTO_INCREMENT for table `saleinv`
--
ALTER TABLE `saleinv`
  MODIFY `sInvNo` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `suppdetails`
--
ALTER TABLE `suppdetails`
  MODIFY `sId` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `inventory`
--
ALTER TABLE `inventory`
  ADD CONSTRAINT `inventory_ibfk_1` FOREIGN KEY (`prodId`) REFERENCES `proddetails` (`prodId`);

--
-- Constraints for table `puritem`
--
ALTER TABLE `puritem`
  ADD CONSTRAINT `puritem_ibfk_1` FOREIGN KEY (`pInvNo`) REFERENCES `purchaseinvoice` (`pInvNo`),
  ADD CONSTRAINT `puritem_ibfk_2` FOREIGN KEY (`prodId`) REFERENCES `proddetails` (`prodId`);

--
-- Constraints for table `saleinv`
--
ALTER TABLE `saleinv`
  ADD CONSTRAINT `saleinv_ibfk_1` FOREIGN KEY (`cId`) REFERENCES `custdetails` (`cId`);

--
-- Constraints for table `saleitem`
--
ALTER TABLE `saleitem`
  ADD CONSTRAINT `saleitem_ibfk_2` FOREIGN KEY (`sInvNo`) REFERENCES `saleinv` (`sInvNo`),
  ADD CONSTRAINT `saleitem_ibfk_3` FOREIGN KEY (`prodId`) REFERENCES `proddetails` (`prodId`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
