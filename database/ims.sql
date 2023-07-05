-- phpMyAdmin SQL Dump
-- version 4.9.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Apr 26, 2021 at 02:46 PM
-- Server version: 8.0.18
-- PHP Version: 7.4.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `ims`
--

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

DROP TABLE IF EXISTS `category`;
CREATE TABLE IF NOT EXISTS `category` (
  `Cat_ID` int(10) NOT NULL,
  `Cat_name` varchar(10) DEFAULT NULL,
  `Description` varchar(40) DEFAULT NULL,
  PRIMARY KEY (`Cat_ID`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `category`
--

INSERT INTO `category` (`Cat_ID`, `Cat_name`, `Description`) VALUES
(1, 'CPU compon', 'System Electronics'),
(2, 'General El', 'General electronics');

-- --------------------------------------------------------

--
-- Table structure for table `departments`
--

DROP TABLE IF EXISTS `departments`;
CREATE TABLE IF NOT EXISTS `departments` (
  `dept_no` int(4) NOT NULL,
  `dept_name` varchar(40) NOT NULL,
  PRIMARY KEY (`dept_no`),
  UNIQUE KEY `dept_name` (`dept_name`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `departments`
--

INSERT INTO `departments` (`dept_no`, `dept_name`) VALUES
(1, 'IN'),
(2, 'ST'),
(3, 'OUT');

-- --------------------------------------------------------

--
-- Table structure for table `dept_manager`
--

DROP TABLE IF EXISTS `dept_manager`;
CREATE TABLE IF NOT EXISTS `dept_manager` (
  `dept_no` int(11) NOT NULL,
  `emp_no` int(11) NOT NULL,
  `passcode` varchar(10) NOT NULL,
  `from_date` date NOT NULL,
  PRIMARY KEY (`emp_no`,`dept_no`),
  UNIQUE KEY `uniques` (`emp_no`,`passcode`) USING BTREE
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `dept_manager`
--

INSERT INTO `dept_manager` (`dept_no`, `emp_no`, `passcode`, `from_date`) VALUES
(2, 102, 'ST102', '2012-01-01'),
(1, 105, 'IN105', '2012-05-01'),
(3, 106, 'OUT106', '2012-06-05');

-- --------------------------------------------------------

--
-- Table structure for table `employees`
--

DROP TABLE IF EXISTS `employees`;
CREATE TABLE IF NOT EXISTS `employees` (
  `emp_no` int(11) NOT NULL,
  `passcode` varchar(20) NOT NULL,
  `birth_date` date NOT NULL,
  `Name` varchar(14) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `gender` enum('M','F') NOT NULL,
  `hire_date` date NOT NULL,
  `dept` int(11) DEFAULT NULL,
  PRIMARY KEY (`emp_no`),
  KEY `dept` (`dept`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `employees`
--

INSERT INTO `employees` (`emp_no`, `passcode`, `birth_date`, `Name`, `gender`, `hire_date`, `dept`) VALUES
(101, 'IN101', '1990-01-01', 'Ram', 'M', '2011-03-01', 1),
(102, 'ST102', '1992-00-00', 'Sasi', 'M', '2011-01-03', 2),
(103, 'ST103', '1994-05-02', 'Kumar', 'M', '2012-04-02', 2),
(104, 'OUT104', '1994-02-09', 'Lily', 'F', '2012-01-02', 3),
(105, 'IN105', '1993-07-15', 'Rani', 'F', '2012-05-01', 1),
(106, 'OUT106', '1990-09-01', 'Gokul', 'M', '2011-01-30', 3);

-- --------------------------------------------------------

--
-- Table structure for table `outward`
--

DROP TABLE IF EXISTS `outward`;
CREATE TABLE IF NOT EXISTS `outward` (
  `product_id` int(11) NOT NULL,
  `product` varchar(50) NOT NULL,
  `quantity` int(11) NOT NULL,
  `transaction_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `outward`
--

INSERT INTO `outward` (`product_id`, `product`, `quantity`, `transaction_id`) VALUES
(302, 'Monitors', 1, 5991920),
(999, 'Charger', 1, 7090281),
(1, 'Boat_headset', 1, 1823894);

-- --------------------------------------------------------

--
-- Table structure for table `product`
--

DROP TABLE IF EXISTS `product`;
CREATE TABLE IF NOT EXISTS `product` (
  `product_ID` varchar(40) NOT NULL,
  `product_Name` varchar(16) NOT NULL,
  `Quantity` int(3) NOT NULL,
  `product_Status` int(10) DEFAULT NULL,
  `product_desc` varchar(40) DEFAULT NULL,
  `sup_ID` int(10) DEFAULT NULL,
  `Category_ID` int(10) DEFAULT NULL,
  PRIMARY KEY (`product_ID`),
  KEY `sup_ID` (`sup_ID`),
  KEY `Category_ID` (`Category_ID`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `product`
--

INSERT INTO `product` (`product_ID`, `product_Name`, `Quantity`, `product_Status`, `product_desc`, `sup_ID`, `Category_ID`) VALUES
('201', 'CPU', 8, 2, 'Central Processing Unit expensive', 401, 1),
('302', 'Monitors', 7, 2, 'Monitors', 2, 2),
('466', 'GPU', 4, 1, 'RTX 2070', 2, 1),
('505', 'camera', 7, 2, '108MP camera', 1, 1),
('999', 'Charger', 6, 2, '27W charger', 1, 2),
('606', 'wifi', 4, 2, '2.4ghz', 2, 2),
('1', 'Boat_headset', 5, 2, 'electronics', 2, 1);

-- --------------------------------------------------------

--
-- Table structure for table `supplier`
--

DROP TABLE IF EXISTS `supplier`;
CREATE TABLE IF NOT EXISTS `supplier` (
  `sup_no` int(11) NOT NULL,
  `name` varchar(16) NOT NULL,
  `phone` int(10) DEFAULT NULL,
  PRIMARY KEY (`sup_no`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `supplier`
--

INSERT INTO `supplier` (`sup_no`, `name`, `phone`) VALUES
(1, 'ABC electronics', 999999),
(2, 'RETro', 989898);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
