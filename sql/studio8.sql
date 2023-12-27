-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 28, 2023 at 07:10 PM
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
-- Database: `studio8`
--

-- --------------------------------------------------------

--
-- Table structure for table `customer`
--

CREATE TABLE `customer` (
  `CustomerID` int(11) NOT NULL,
  `Name` varchar(256) NOT NULL,
  `Lastname` varchar(256) NOT NULL,
  `Email` varchar(256) NOT NULL,
  `Tel` varchar(256) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

INSERT INTO `customer` (`CustomerID`, `Name`, `Lastname`, `Email`, `Tel`) VALUES
(118811, 'Alfred', 'Evans','Alfrined.Eve@filevino.com','0819754512'),
(118812, 'Jordin', 'Alexander','JordAlex@mail.com','0893526236'),
(118813, 'Wayne', 'Peters', 'Way.Pete@catlover.com','0920510310'),
(118814, 'Keith', 'Coleman', 'Keith@hotmail.com','0946009284'),
(118815, 'Richard', 'Howell', 'tafkrin@outlook.com','0888072330'),
(118816, 'Paul', 'Brown', 'PoulBrown@gmail.com','0986504716'),
(118817, 'Steve', 'Mcgee', 'MCcreeOW@blizz.net','0898974902'),
(118818, 'Hero', 'Dominguez', 'Hero.Dom@gmail.com','0916607667'),
(118819, 'Jade', 'Hoffman', 'HoffmanJ@hotmail.com','0921854299');

-- --------------------------------------------------------

--
-- Table structure for table `customeraddress`
--

CREATE TABLE `customeraddress` (
  `CustomerID` int(20) NOT NULL,
  `AddressNo` int(20) NOT NULL,
  `CustomerAddress` text NOT NULL
  ) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

INSERT INTO `customeraddress` (`CustomerID`, `AddressNo`, `CustomerAddress`) VALUES
(118811, '1', '984/4-5 Rama Vi Thanon Petchburi Ratcha Thewi Bangkok 10400'),
(118811, '2', '3143 Leverton Cove Road Springfield Massachusetts 01103'),
(118812, '1', '99 Phetkasem Bang Khae Bangkhae Bangkok 10160'),
(118813, '1', 'Khanna Yao Khannayao Khannayao Bangkok 10230'),
(118814, '1', '729/52-53 Trok Watchannai Ratchadapisek Road Bangpongpang Yannawa Bangkok 10120'),
(118814, '2', '4689 Rainbow Road Goodyear Arizona 85338'),
(118814, '3', 'Ramkhamhaeng Rd. Huamak Bangkapi Bangkok 10240'),
(118815, '1', '21/70 Soi Chompol Ladprao Lardyao Bangkok 10900');

-- --------------------------------------------------------


--
-- Table structure for table `delivery`
--

CREATE TABLE `delivery` (
  `order_ID` int(11) NOT NULL,
  `weight` double NOT NULL,
  `d_status` tinyint(1) NOT NULL,
  `track_no` text DEFAULT NULL,
  `due_date` date NOT NULL,
  `got_date` date NOT NULL,
  `employee_ID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `delivery`
--

INSERT INTO `delivery` (`order_ID`, `weight`, `d_status`, `track_no`, `due_date`, `got_date`, `employee_ID`) VALUES
(881021, 6.6, 1, 'STV392F9A', '2023-05-14', '2023-05-16', 111102),
(881022, 2.4, 1, 'ST24MKGP4Q', '2023-05-04', '2023-05-06', 111101),
(881023, 0.9, 0, 'ST0123145', '2023-04-29', '0000-00-00', 111104),
(881024, 1.2, 0, 'ST956A243', '0000-00-00', '0000-00-00', 111106),
(881025, 1.6, 1, 'ST123RG4W', '2023-05-01', '2023-05-05', 111102),
(881026, 2.6, 0, 'ST148R13A', '0000-00-00', '0000-00-00', 111103),
(881027, 0.4, 1, 'ST213FE342', '2023-04-13', '2023-04-14', 111106),
(881028, 4.5,	0, 'ST123RRG4W', '2023-05-30', '2023-05-31', 111106);

-- --------------------------------------------------------

--
-- Table structure for table `employee`
--

CREATE TABLE `employee` (
  `employee_ID` int(11) NOT NULL,
  `role_ID` int(11) NOT NULL,
  `role` text NOT NULL,
  `name` text NOT NULL,
  `lastname` text NOT NULL,
  `email` text NOT NULL,
  `tel` text NOT NULL,
  `status` tinyint(1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `employee`
--

INSERT INTO `employee` (`employee_ID`, `role_ID`, `role`, `name`, `lastname`, `email`, `tel`, `status`) VALUES
(111100, 100, 'Owner', 'Inggie', 'Jordan', 'IggeJ@gmail.com', '0889268119', 1),
(111101, 101, 'Admin', 'Adam', 'Ryan', 'RyanRenold@gmail.com', '0884443333', 0),
(111103, 101, 'Admin', 'Phitchayada', 'Songrak', 'bonuswiie@hotmail.com', '0887881234', 0),
(111104, 104, 'Customer Service', 'Gorgie', 'Beckham', 'ggbh@mailmail.com', '0884638168', 0),
(111105, 105, 'Employee Manager', 'Siripob', 'Chonbana', 'ChoChill@gmail.com', '0885236116', 1),
(111106, 106, 'Employee', 'Adam', 'Floyd', 'floydwiie@hotmail.com', '0889268134', 0),
(111107, 105, 'Employee Manager', 'Adam', 'Floyd', 'notthatadamfloyd@mail.com', '0835635416', 0);

-- --------------------------------------------------------

--
-- Table structure for table `order`
--

CREATE TABLE `order` (
  `order_id` int(11) NOT NULL,
  `customer_id` int(11) NOT NULL,
  `customer_name` varchar(64) NOT NULL,
  `employee_id` int(11) NOT NULL,
  `amount` double NOT NULL,
  `point_redeem` double NOT NULL,
  `total` float NOT NULL,
  `transaction_status` tinyint(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `order`
--

INSERT INTO `order` (`order_id`, `customer_id`, `customer_name`, `employee_id`, `amount`, `point_redeem`, `total`, `transaction_status`) VALUES
(881021, 118811, 'Alfred', 111101, 2, 100, 9345, 1),
(881022, 118812, 'Jordin', 111102, 1, 0, 4500, 1),
(881023, 118813, 'Wayne', 111102, 1, 500, 1000, 1),
(881024, 118814, 'Keith', 0, 2, 200, 1000, 0),
(881025, 118815, 'Richard', 0, 1, 400, 2000, 1),
(881026, 118816, 'Paul', 0, 2, 500, 5000, 1),
(881027, 118817, 'Steve', 111104, 1, 300, 500, 1),
(881028, 111818, 'Hero', 111107, 1, 100, 3500, 0),
(881029, 111819, 'Jade', 111107, 1, 100, 5000, 0),
(881030, 111818, 'Hero', 111106, 2, 100, 7000, 1),
(881031, 111811, 'Alfred', 111106, 1, 50, 35000, 1);

--
-- Table structure for table `orderin`
--

CREATE TABLE `orderin` (
  `order_id` int(20) NOT NULL,
  `ItemNo` int(20) NOT NULL,
  `product_id` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `orderin`
--

INSERT INTO `orderin` (`order_id`, `ItemNo`, `product_id`) VALUES
(881021, 1, '142352'),
(881021, 2, '142361'),
(881021, 3, '142356'),
(881022, 1, '142353'),
(881023, 1, '142353'),
(881024, 1, '142353'),
(881025, 1, '142352'),
(881027, 1, '142353');

-- --------------------------------------------------------

--
-- Table structure for table `product`
--

CREATE TABLE `product` (
  `product_id` int(11) NOT NULL,
  `category_id` int(11) NOT NULL,
  `category` varchar(255) NOT NULL,
  `product_name` varchar(64) NOT NULL,
  `product_color` varchar(64) NOT NULL,
  `memory_capacity` int(11) NOT NULL,
  `in_stock` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `product`
--

INSERT INTO `product` (`product_id`, `category_id`, `category`, `product_name`, `product_color`, `memory_capacity`, `in_stock`) VALUES
(142351, 220111, 'Phone', 'GG-Phone 14', 'RoseGold', 128, 13),
(142352, 220111, 'Phone', 'GG-Phone 14', 'SpaceBlack', 128, 6),
(142353, 220111, 'Phone', 'GG-Phone 14 Pro', 'RoseGold', 128, 11),
(142354, 220111, 'Phone', 'GG-Phone 14 Pro Max', 'RoseGold', 128, 1),
(142355, 220111, 'Phone', 'GG-Phone 14 Pro MAX	', 'Black', 64, 5),
(142356, 220111, 'Phone', 'GG-Phone 14 Pro MAX', 'Black', 128, 7),
(142357, 220111, 'Phone', 'GG-Phone 14 Pro	', 'Black', 64, 11),
(142358, 220111, 'Phone', 'GG-Phone 14 Pro', 'Black', 128, 9),
(142360, 220111, 'Phone', 'GG-Phone 14', 'Black', 64, 9),
(142361, 220112, 'Notebook/Tablet', 'GG-Pad 9', 'GraphiteGray', 128, 2),
(142362, 220112, 'Notebook/Tablet', 'GG-Pad 9 Pro', 'GraphiteGray', 256, 5),
(142363, 220112, 'Notebook/Tablet', 'JaneBook', 'Gold', 1024, 9),
(142364, 220112, 'Notebook/Tablet', 'ExBook', 'Dark', 16384, 5),
(142365, 220112, 'Notebook/Tablet', 'U-Pad', 'Gold', 64, 7);
--
-- Indexes for dumped tables
--

--
-- Indexes for table `customer`
--
ALTER TABLE `customer`
  ADD PRIMARY KEY (`CustomerID`);

ALTER TABLE `customeraddress` 
  ADD PRIMARY KEY (`CustomerID`, `AddressNo`);

--
-- Indexes for table `delivery`
--
ALTER TABLE `delivery`
  ADD PRIMARY KEY (`order_ID`);

--
-- Indexes for table `employee`
--
ALTER TABLE `employee`
  ADD PRIMARY KEY (`employee_ID`);

--
-- Indexes for table `order`
--
ALTER TABLE `order`
  ADD PRIMARY KEY (`order_id`);

--
-- Indexes for table `orderin`
--
ALTER TABLE `orderin`
  ADD PRIMARY KEY (`order_id`,`ItemNo`);

--
-- Indexes for table `product`
--
ALTER TABLE `product`
  ADD PRIMARY KEY (`product_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `customer`
--
ALTER TABLE `customer`
  MODIFY `CustomerID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=231240;

--
-- AUTO_INCREMENT for table `delivery`
--
ALTER TABLE `delivery`
  MODIFY `order_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=881028;

--
-- AUTO_INCREMENT for table `employee`
--
ALTER TABLE `employee`
  MODIFY `employee_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=345265;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
