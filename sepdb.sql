-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 06, 2021 at 09:47 AM
-- Server version: 10.4.18-MariaDB
-- PHP Version: 8.0.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `sepdb`
--

-- --------------------------------------------------------

--
-- Table structure for table `customers`
--

CREATE TABLE `customers` (
  `CustomerID` int(11) NOT NULL,
  `Cust_Password` varchar(20) NOT NULL,
  `Cust_Name` varchar(50) NOT NULL,
  `Cust_Phone` int(12) NOT NULL,
  `Cust_Address` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `customers`
--

INSERT INTO `customers` (`CustomerID`, `Cust_Password`, `Cust_Name`, `Cust_Phone`, `Cust_Address`) VALUES
(1, 'halo', 'Latasha', 189744128, 'Setapak Air Panas'),
(2, 'halo', 'Nigel', 189744125, 'Danau Kota KL');

-- --------------------------------------------------------

--
-- Table structure for table `delivery`
--

CREATE TABLE `delivery` (
  `DeliveryID` int(11) NOT NULL,
  `CustomerID` int(11) NOT NULL,
  `RiderID` int(11) NOT NULL,
  `RequestID` int(11) NOT NULL,
  `Delivery_Type` varchar(50) NOT NULL,
  `Delivery_Status` varchar(50) NOT NULL,
  `Delivery_Time` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `invoice`
--

CREATE TABLE `invoice` (
  `InvoiceID` int(11) NOT NULL,
  `InvoiceDate` date NOT NULL,
  `PaymentTotal` float NOT NULL,
  `CustomerID` int(11) NOT NULL,
  `RequestID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `payment`
--

CREATE TABLE `payment` (
  `PaymentID` int(11) NOT NULL,
  `CustomerID` varchar(20) NOT NULL,
  `RequestID` int(11) NOT NULL,
  `Cust_Name` varchar(50) NOT NULL,
  `Cust_PhoneNo` int(12) NOT NULL,
  `Cust_Address` varchar(50) NOT NULL,
  `PaymentType` varchar(50) NOT NULL,
  `Time` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `request`
--

CREATE TABLE `request` (
  `RequestID` int(11) NOT NULL,
  `CustomerID` int(11) NOT NULL,
  `StaffID` int(11) NOT NULL,
  `Request_Time` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `Device_Type` varchar(20) NOT NULL,
  `Device_Model` varchar(50) NOT NULL,
  `Defect_Type` varchar(20) NOT NULL,
  `Message` varchar(100) NOT NULL,
  `Request_Status` varchar(50) NOT NULL,
  `Reason` varchar(100) NOT NULL,
  `Estimate_Cost` float NOT NULL,
  `Delivery_Status` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `request`
--

INSERT INTO `request` (`RequestID`, `CustomerID`, `StaffID`, `Request_Time`, `Device_Type`, `Device_Model`, `Defect_Type`, `Message`, `Request_Status`, `Reason`, `Estimate_Cost`, `Delivery_Status`) VALUES
(1, 1, 52, '2021-06-06 07:41:05', 'phone', 'P40 pro', 'idk', 'Its not working well', 'Processing', 'Your Request is Approved.', 100, 'Accepted'),
(2, 2, 1, '2021-06-06 07:46:42', 'phone', 'P40 pro', 'idk really', 'HUHHUHUHUUH', 'Processing', 'HUHUHUHUBBHBH', 1000, 'Requested');

-- --------------------------------------------------------

--
-- Table structure for table `rider`
--

CREATE TABLE `rider` (
  `RiderID` int(11) NOT NULL,
  `Rider_Password` varchar(20) NOT NULL,
  `Rider_Name` varchar(50) NOT NULL,
  `Rider_PhoneNo` int(12) NOT NULL,
  `Rider_LicenseNo` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `rider`
--

INSERT INTO `rider` (`RiderID`, `Rider_Password`, `Rider_Name`, `Rider_PhoneNo`, `Rider_LicenseNo`) VALUES
(1, 'halo', 'nigel', 152648452, '5263148');

-- --------------------------------------------------------

--
-- Table structure for table `staff`
--

CREATE TABLE `staff` (
  `StaffID` int(11) NOT NULL,
  `Staff_Password` varchar(20) NOT NULL,
  `Staff_Name` varchar(50) NOT NULL,
  `Staff_PhoneNo` int(12) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `staff`
--

INSERT INTO `staff` (`StaffID`, `Staff_Password`, `Staff_Name`, `Staff_PhoneNo`) VALUES
(1, 'halo', 'Staff1', 125263987);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `customers`
--
ALTER TABLE `customers`
  ADD PRIMARY KEY (`CustomerID`);

--
-- Indexes for table `delivery`
--
ALTER TABLE `delivery`
  ADD PRIMARY KEY (`DeliveryID`);

--
-- Indexes for table `invoice`
--
ALTER TABLE `invoice`
  ADD PRIMARY KEY (`InvoiceID`);

--
-- Indexes for table `payment`
--
ALTER TABLE `payment`
  ADD PRIMARY KEY (`PaymentID`);

--
-- Indexes for table `request`
--
ALTER TABLE `request`
  ADD PRIMARY KEY (`RequestID`);

--
-- Indexes for table `rider`
--
ALTER TABLE `rider`
  ADD PRIMARY KEY (`RiderID`);

--
-- Indexes for table `staff`
--
ALTER TABLE `staff`
  ADD PRIMARY KEY (`StaffID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `customers`
--
ALTER TABLE `customers`
  MODIFY `CustomerID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `delivery`
--
ALTER TABLE `delivery`
  MODIFY `DeliveryID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=105;

--
-- AUTO_INCREMENT for table `invoice`
--
ALTER TABLE `invoice`
  MODIFY `InvoiceID` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `payment`
--
ALTER TABLE `payment`
  MODIFY `PaymentID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `request`
--
ALTER TABLE `request`
  MODIFY `RequestID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `rider`
--
ALTER TABLE `rider`
  MODIFY `RiderID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `staff`
--
ALTER TABLE `staff`
  MODIFY `StaffID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
