-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 23, 2024 at 01:32 PM
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
-- Database: `webassignmentdatabase`
--
CREATE DATABASE IF NOT EXISTS `webassignmentdatabase` DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci;
USE `webassignmentdatabase`;

-- --------------------------------------------------------

--
-- Table structure for table `coupon`
--

CREATE TABLE `coupon` (
  `coupon_id` int(11) NOT NULL,
  `Customer_ID` int(11) NOT NULL,
  `coupon_name` varchar(100) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `coupon_discount` int(11) NOT NULL,
  `coupon_cap` int(11) NOT NULL,
  `coupon_status` varchar(100) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `coupon`
--

INSERT INTO `coupon` (`coupon_id`, `Customer_ID`, `coupon_name`, `coupon_discount`, `coupon_cap`, `coupon_status`) VALUES
(54, 17, 'OMEGADEAL', 50, 500, 'UNUSED'),
(55, 17, 'WHOMP', 10, 200, 'UNUSED'),
(56, 17, 'WHOMP1', 10, 200, 'UNUSED'),
(57, 1, 'OMEGADEAL', 50, 500, 'UNUSED');

-- --------------------------------------------------------

--
-- Table structure for table `coupon_creation`
--

CREATE TABLE `coupon_creation` (
  `C_ID` int(11) NOT NULL,
  `coupon_cap` int(11) NOT NULL,
  `coupon_discount` int(11) NOT NULL,
  `coupon_code` text CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `coupon_creation`
--

INSERT INTO `coupon_creation` (`C_ID`, `coupon_cap`, `coupon_discount`, `coupon_code`) VALUES
(13, 200, 10, 'WHOMP'),
(14, 200, 10, 'WHOMP1'),
(15, 200, 20, 'BEST'),
(16, 500, 50, 'OMEGADEAL');

-- --------------------------------------------------------

--
-- Table structure for table `creditcard`
--

CREATE TABLE `creditcard` (
  `cardID` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `bank_card` int(11) NOT NULL,
  `card_holder` varchar(11) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `card_date` date NOT NULL,
  `card_number` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `creditcard`
--

INSERT INTO `creditcard` (`cardID`, `user_id`, `bank_card`, `card_holder`, `card_date`, `card_number`) VALUES
(65, 1, 2147483647, '311411', '2024-10-09', 13131),
(66, 17, 31311441, 'YUMMERS', '2024-10-02', 121),
(67, 1, 14141414, 'chong', '2024-10-04', 13131),
(68, 1, 1331411, 'TEST', '2024-10-10', 1211);

-- --------------------------------------------------------

--
-- Table structure for table `customers`
--

CREATE TABLE `customers` (
  `Customer_ID` int(11) NOT NULL,
  `Customer_name` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `Customer_email` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `Customer_password` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `customers`
--

INSERT INTO `customers` (`Customer_ID`, `Customer_name`, `Customer_email`, `Customer_password`) VALUES
(1, 'BOB', 'chongjunmeng99@gmail.com', 'bobbyboo'),
(2, 'wafaw', 'chongjunmeng99@gmail.com', 'fawfaw'),
(3, 'fwafaw', 'chongjunmeng99@gmail.com', 'fawfaw'),
(4, 'ffaw', 'chongjunmeng99@gmail.com', 'fawfaw'),
(5, 'ffaw', 'chongjunmeng99@gmail.com', 'fawfaw'),
(6, 'ffaw', 'chongjunmeng99@gmail.com', 'fawfaw'),
(7, 'ffaw', 'chongjunmeng99@gmail.com', 'fawfaw'),
(8, 'ffaw', 'chongjunmeng99@gmail.com', 'fawfaw'),
(9, 'WFAWF', 'chongjunmeng99@gmail.com', 'fawfaw'),
(10, 'John', 'johnwick@gmail.com', 'sheesh'),
(11, 'gagwagwa', 'rwrww@gmail.com', 'wrararw'),
(12, '42252', 'junmeng@gmail.com', 'wfaawgwgaw'),
(13, '5252252', 'bob@gmail.com', 'CHONG'),
(14, 'fwfwa', 'chongjunmeng99@gmail.com', 'junmeng88'),
(16, 'YAP', 'yapmeiyen76@gmail.com', 'ymy291176'),
(17, 'GIAWGWG', 'wamp@gmail.com', 'boboboyadmin'),
(18, 'BRUH', 'chongjunmeng@gmail.com', 'wampabbdaamweriwrn'),
(19, 'ghie', 'virgie995@gmail.com', 'ghie1977');

-- --------------------------------------------------------

--
-- Table structure for table `packages`
--

CREATE TABLE `packages` (
  `P_ID` int(11) NOT NULL,
  `region` varchar(100) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `package_name` varchar(100) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `package_details` varchar(100) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `package_price` int(11) NOT NULL,
  `package_image` varchar(100) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `hotel_image` varchar(100) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `location_image` varchar(100) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `bus_image` varchar(100) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `plane_image` varchar(100) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `hotel_details` varchar(100) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `location_details` varchar(100) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `bus_details` varchar(100) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `plane_details` varchar(100) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `packages`
--

INSERT INTO `packages` (`P_ID`, `region`, `package_name`, `package_details`, `package_price`, `package_image`, `hotel_image`, `location_image`, `bus_image`, `plane_image`, `hotel_details`, `location_details`, `bus_details`, `plane_details`) VALUES
(30, 'West_Malaysia', 'PACKAGE 1', '4 DAYS 3 NIGHTS', 1200, 'buddha.jpg', 'hotel19.jpg', 'tioman.jpg', 'bus20.jpg', 'plane18.jpg', 'HOTEL IS COOL', 'HOT PLACE', 'EXPENSIVE BUS', 'EXPENSIVE PLANE'),
(31, 'West_Malaysia', 'PACKAGE 2', '4 DAYS 3 NIGHTS', 100, 'default.jpg', 'hotel20.jpg', 'boston.jpg', 'bus15.jpg', 'plane17.jpg', 'HOTEL IS COOL', 'HOT PLACE', 'BUS IS WEAK', 'PLANE NICE'),
(32, 'West_Malaysia', 'PACKAGE 3', '4 DAYS 3 NIGHTS', 200, 'gold-5-stars.png', 'hotel19.jpg', 'Cambodia.jpg', 'bus20.jpg', 'plane16.jpg', 'HOTEL IS MID', 'NOT COOL', 'STRONG BUS', 'BIG PLANE'),
(34, 'East_Malaysia', 'PACKAGE 4', '7 days 6 nights', 500, '5-stars-blue.png', 'hotel18.jpg', 'tioman.jpg', 'bus14.jpg', 'airplane2.webp', 'NICE HOTEL', 'NICE PLACE', 'BUG BUS', 'BIG PLANE'),
(35, 'West_Malaysia', 'PACKAGE 5', '3 DAYS 2 NIGHTS', 300, 'gold-5-stars.png', 'hotel13.jpg', 'boston.jpg', 'bus4.jpg', 'plane18.jpg', 'small hotel', 'nice place', 'new bus', 'big plane'),
(36, 'East_Malaysia', 'PACKAGE 6', '5 DAYS 4 NIGHTS', 121, '5-stars-blue.png', 'hotel2.jpg', 'Vietname.jpg', 'bus9.jpg', 'plane5.jpg', 'BIG HOTEL', 'SMALL PLACE', 'BIG BUS', 'PLANE NICE'),
(37, 'America', 'PACKAGE 7', '4 DAYS 3 NIGHTS', 200, 'image3.jpg', 'hotel.jpg', 'Thailand.jpg', 'bus7.jpg', 'plane16.jpg', 'BIG HOTEL', 'NICE PLACE', 'BIG BUS', 'BIG PLANE'),
(40, 'East_Malaysia', 'PACKAGE 11', '5 DAYS 4 NIGHTS', 600, 'image1.png', 'hotel4.jpg', 'Cambodia.jpg', 'bus10.jpg', 'plane15.jpg', 'BIG HOTEL', 'COLD PLACE', 'NEW BUS', 'OLD PLANE'),
(41, 'Europe', 'NICE PACKAGE', '7 days 6 nights', 1200, 'image1.png', 'hotel10.jpg', 'melaka.jpg', 'bus18.jpg', 'plane3.jpg', 'BIG HOTEL', 'HOT PLACE', 'SMALL BUS', 'TINY PLANE'),
(42, 'Europe', 'PACKAGE 12', '4 DAYS 5 NIGHTS', 400, 'image3.jpg', 'hotel16.jpg', 'tioman.jpg', 'bus9.jpg', 'plane17.jpg', 'NICE HOTEL', 'HOT PLACE', 'BIG BUS', 'BIG PLANE'),
(43, 'Europe', 'PACKAGE 15', '7 days 6 nights', 300, 'image2.jpg', 'hotel6.jpg', 'boston.jpg', 'bus9.jpg', 'plane6.jpg', 'BIG HOTEL', 'NICE PLACE', 'BIG BUS', 'PLANE NICE'),
(44, 'East_Asia', 'PACAKAGE 13', '7 days 6 nights', 10, 'image1.png', 'hotel18.jpg', 'Houston.jpg', 'bus19.jpg', 'plane17.jpg', 'BIG HOTEL', 'NICE PLACE', 'BIG BUS', 'BIG PLANE'),
(45, 'East_Asia', 'PACKAGE 16', '4 DAYS 5 NIGHTS', 1231, 'image1.png', 'hotel12.jpg', 'Atlanta.jpg', 'bus18.jpg', 'plane18.jpg', 'NICE HOTEL', 'NICE PLACE', 'BIG BUS', 'BIG PLANE'),
(46, 'East_Asia', 'PACKAGE 18', '4 DAYS 3 NIGHTS', 1432, 'image3.jpg', 'hotel3.jpg', 'melaka.jpg', 'bus18.jpg', 'plane14.jpg', 'BIG HOTEL', 'NICE PLACE', 'BIG BUS', 'BIG PLANE'),
(47, 'America', 'GRAB', '5 DAYS 4 NIGHTS', 200, 'image2.jpg', 'hotel18.jpg', 'Atlanta.jpg', 'bus20.jpg', 'plane18.jpg', 'HOTEL IS COOL', 'NICE PLACE', 'BIG BUS', 'BIG PLANE'),
(48, 'America', 'HEAT PACAKGE', '4 DAYS 5 NIGHTS', 500, 'image1.png', 'hotel.jpg', 'boston.jpg', 'bus13.jpg', 'plane16.jpg', 'BIG HOTEL', 'NICE PLACE', 'BUG BUS', 'NICE PLANE');

-- --------------------------------------------------------

--
-- Table structure for table `purchased`
--

CREATE TABLE `purchased` (
  `Purchase_ID` int(11) NOT NULL,
  `Customer_ID` int(11) NOT NULL,
  `P_ID` int(11) NOT NULL,
  `Total_price` int(11) NOT NULL,
  `package_name` varchar(100) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `package_details` varchar(100) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `hotel_pic` varchar(100) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `location_pic` varchar(100) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `plane_pic` varchar(100) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `bus_pic` varchar(100) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `package_pic` varchar(100) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `coupon_name` varchar(100) CHARACTER SET latin1 COLLATE latin1_swedish_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `purchased`
--

INSERT INTO `purchased` (`Purchase_ID`, `Customer_ID`, `P_ID`, `Total_price`, `package_name`, `package_details`, `hotel_pic`, `location_pic`, `plane_pic`, `bus_pic`, `package_pic`, `coupon_name`) VALUES
(50, 1, 32, 200, 'PACKAGE 3', '4 DAYS 3 NIGHTS', 'hotel19.jpg', 'Cambodia.jpg', 'plane16.jpg', 'bus20.jpg', 'gold-5-stars.png', NULL),
(51, 17, 36, 121, 'PACKAGE 6', '5 DAYS 4 NIGHTS', 'hotel2.jpg', 'Vietname.jpg', 'plane5.jpg', 'bus9.jpg', '5-stars-blue.png', NULL),
(52, 1, 41, 1200, 'NICE PACKAGE', '7 days 6 nights', 'hotel10.jpg', 'melaka.jpg', 'plane3.jpg', 'bus18.jpg', 'image1.png', NULL),
(53, 1, 42, 400, 'PACKAGE 12', '4 DAYS 5 NIGHTS', 'hotel16.jpg', 'tioman.jpg', 'plane17.jpg', 'bus9.jpg', 'image3.jpg', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `wishlist`
--

CREATE TABLE `wishlist` (
  `wishlist_id` int(11) NOT NULL,
  `Customer_ID` int(11) NOT NULL,
  `P_ID` int(1) NOT NULL,
  `package_name` varchar(100) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `package_picture` varchar(100) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `wishlist`
--

INSERT INTO `wishlist` (`wishlist_id`, `Customer_ID`, `P_ID`, `package_name`, `package_picture`) VALUES
(40, 1, 30, 'PACKAGE 1', 'buddha.jpg'),
(41, 1, 31, 'PACKAGE 2', 'default.jpg'),
(43, 17, 31, 'PACKAGE 2', 'default.jpg'),
(44, 17, 32, 'PACKAGE 3', 'gold-5-stars.png');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `coupon`
--
ALTER TABLE `coupon`
  ADD PRIMARY KEY (`coupon_id`);

--
-- Indexes for table `coupon_creation`
--
ALTER TABLE `coupon_creation`
  ADD PRIMARY KEY (`C_ID`);

--
-- Indexes for table `creditcard`
--
ALTER TABLE `creditcard`
  ADD PRIMARY KEY (`cardID`);

--
-- Indexes for table `customers`
--
ALTER TABLE `customers`
  ADD PRIMARY KEY (`Customer_ID`);

--
-- Indexes for table `packages`
--
ALTER TABLE `packages`
  ADD PRIMARY KEY (`P_ID`);

--
-- Indexes for table `purchased`
--
ALTER TABLE `purchased`
  ADD PRIMARY KEY (`Purchase_ID`);

--
-- Indexes for table `wishlist`
--
ALTER TABLE `wishlist`
  ADD PRIMARY KEY (`wishlist_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `coupon`
--
ALTER TABLE `coupon`
  MODIFY `coupon_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=62;

--
-- AUTO_INCREMENT for table `coupon_creation`
--
ALTER TABLE `coupon_creation`
  MODIFY `C_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `creditcard`
--
ALTER TABLE `creditcard`
  MODIFY `cardID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=69;

--
-- AUTO_INCREMENT for table `customers`
--
ALTER TABLE `customers`
  MODIFY `Customer_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `packages`
--
ALTER TABLE `packages`
  MODIFY `P_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=49;

--
-- AUTO_INCREMENT for table `purchased`
--
ALTER TABLE `purchased`
  MODIFY `Purchase_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=54;

--
-- AUTO_INCREMENT for table `wishlist`
--
ALTER TABLE `wishlist`
  MODIFY `wishlist_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=45;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
