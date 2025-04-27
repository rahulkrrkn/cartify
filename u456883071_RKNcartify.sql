-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Apr 27, 2025 at 07:58 AM
-- Server version: 10.11.10-MariaDB-log
-- PHP Version: 7.2.34

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `u456883071_RKNcartify`
--

-- --------------------------------------------------------

--
-- Table structure for table `Address`
--

CREATE TABLE `Address` (
  `SNo` int(11) NOT NULL,
  `UserSNo` int(11) NOT NULL,
  `PinCode` int(11) NOT NULL,
  `FullName` varchar(30) NOT NULL,
  `MobileNo` bigint(20) NOT NULL,
  `EmailID` varchar(50) DEFAULT NULL,
  `State` varchar(50) DEFAULT NULL,
  `District` varchar(50) DEFAULT NULL,
  `City` varchar(50) DEFAULT NULL,
  `HouseBuildingName` varchar(500) DEFAULT NULL,
  `RoadAreaColony` varchar(500) DEFAULT NULL,
  `Landmark` varchar(500) DEFAULT NULL,
  `SetDefault` enum('Yes','No') NOT NULL DEFAULT 'No',
  `Status` enum('Active','Deleted') NOT NULL,
  `Date` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `Address`
--

INSERT INTO `Address` (`SNo`, `UserSNo`, `PinCode`, `FullName`, `MobileNo`, `EmailID`, `State`, `District`, `City`, `HouseBuildingName`, `RoadAreaColony`, `Landmark`, `SetDefault`, `Status`, `Date`) VALUES
(1, 1, 812001, 'Rahul Kumar', 8877788288, 'rahulkrrkn@gmail.com', 'Bihar', 'Bhagalpur', 'Jagdishpur', 'Barari', 'Near Roop Vihar', '', 'Yes', 'Active', '2025-03-25 03:20:06'),
(2, 3, 812005, 'Anuj aryan', 8877788288, 'rahulkrrkn2@gmail.com', 'Bihar', 'Bhagalpur', 'Jagdishpur', 'Adfghkiyt', 'Sikandarpur', 'Bgp', 'No', 'Deleted', '2025-03-25 06:05:09'),
(3, 3, 812005, 'Anuj aryan', 8877788288, 'rahulkrrkn3@gmail.com', 'Bihar', 'Bhagalpur', 'Jagdishpur', 'Artgvdg', 'Saertjb', 'Bgp', 'No', 'Active', '2025-03-25 06:07:18'),
(4, 3, 812005, 'Anuj aryan', 8877788288, 'rahulkrrkn4@gmail.com', '', '', '', 'Artgvdg', 'Saertjb', 'Bgp', 'No', 'Active', '2025-03-25 06:10:07'),
(5, 4, 812002, 'Anupam', 8877788288, 'rahulkrrkn5@gmail.com', 'Bihar', 'Bhagalpur', 'Jagdishpur', 'Science Career', '2', '', 'No', 'Active', '2025-03-30 17:39:35'),
(6, 4, 812002, 'Anupam', 8877788288, 'rahulkrrkn6@gmail.com', 'Bihar', 'Bhagalpur', 'Jagdishpur', '8', '2', '', 'Yes', 'Active', '2025-03-30 17:40:24'),
(7, 3, 812005, 'Anujaryan', 8877788288, 'rahulkrrkn7@gmail.com', 'Bihar', 'Bhagalpur', 'Jagdishpur', 'Riya bhawan', 'Vidyauram colony', 'Sikandarpur', 'No', 'Active', '2025-04-01 06:06:21');

-- --------------------------------------------------------

--
-- Table structure for table `Admin`
--

CREATE TABLE `Admin` (
  `SNo` int(11) NOT NULL,
  `UserSNo` int(11) NOT NULL,
  `Verification` enum('Pending','Verified','Blocked') NOT NULL DEFAULT 'Pending',
  `Date` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `Admin`
--

INSERT INTO `Admin` (`SNo`, `UserSNo`, `Verification`, `Date`) VALUES
(1, 1, 'Verified', '2025-03-23 01:25:44'),
(2, 4, 'Verified', '2025-03-26 11:53:42');

-- --------------------------------------------------------

--
-- Table structure for table `Cart`
--

CREATE TABLE `Cart` (
  `SNo` int(11) NOT NULL,
  `UserSNo` int(11) NOT NULL,
  `ProductVariantSNo` int(11) NOT NULL,
  `Quantity` int(11) NOT NULL DEFAULT 1,
  `Status` enum('Saved','Deleted') NOT NULL,
  `Date` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `Cart`
--

INSERT INTO `Cart` (`SNo`, `UserSNo`, `ProductVariantSNo`, `Quantity`, `Status`, `Date`) VALUES
(1, 1, 1, 1, 'Deleted', '2025-03-24 09:51:29'),
(2, 2, 1, 1, 'Deleted', '2025-03-24 15:20:14'),
(3, 2, 1, 1, 'Saved', '2025-03-24 15:22:44'),
(4, 1, 1, 1, 'Deleted', '2025-03-25 03:19:32'),
(12, 3, 1, 1, 'Deleted', '2025-03-25 06:02:52'),
(15, 1, 2, 5, 'Deleted', '2025-03-29 01:14:34'),
(16, 1, 5, 4, 'Deleted', '2025-03-29 01:14:35'),
(17, 1, 8, 2, 'Deleted', '2025-03-29 01:14:42'),
(18, 1, 1, 1, 'Deleted', '2025-03-29 01:55:28'),
(19, 1, 1, 1, 'Deleted', '2025-03-29 01:55:33'),
(20, 1, 2, 1, 'Deleted', '2025-03-29 02:06:39'),
(21, 1, 8, 1, 'Deleted', '2025-03-29 02:34:17'),
(22, 1, 5, 1, 'Deleted', '2025-03-29 02:34:19'),
(23, 1, 2, 1, 'Deleted', '2025-03-29 02:34:21'),
(24, 1, 2, 1, 'Deleted', '2025-03-29 02:35:28'),
(25, 1, 5, 1, 'Deleted', '2025-03-29 02:35:30'),
(26, 1, 2, 1, 'Deleted', '2025-03-29 02:35:35'),
(27, 1, 8, 1, 'Deleted', '2025-03-29 02:35:38'),
(28, 1, 8, 1, 'Deleted', '2025-03-29 02:35:40'),
(29, 1, 5, 1, 'Deleted', '2025-03-29 02:35:41'),
(30, 1, 2, 1, 'Deleted', '2025-03-29 02:35:43'),
(31, 1, 2, 1, 'Deleted', '2025-03-29 02:37:13'),
(32, 1, 5, 1, 'Deleted', '2025-03-29 02:37:15'),
(33, 1, 8, 1, 'Deleted', '2025-03-29 02:37:16'),
(34, 1, 8, 1, 'Deleted', '2025-03-29 02:37:56'),
(35, 1, 8, 1, 'Deleted', '2025-03-29 02:37:59'),
(36, 1, 8, 1, 'Deleted', '2025-03-29 02:38:01'),
(37, 1, 8, 1, 'Deleted', '2025-03-29 02:38:15'),
(38, 1, 8, 1, 'Deleted', '2025-03-29 02:39:06'),
(39, 1, 8, 1, 'Deleted', '2025-03-29 02:39:09'),
(40, 1, 8, 1, 'Deleted', '2025-03-29 02:39:10'),
(41, 1, 8, 1, 'Deleted', '2025-03-29 02:39:12'),
(42, 1, 8, 2, 'Deleted', '2025-03-29 02:40:02'),
(43, 1, 8, 1, 'Deleted', '2025-03-29 02:40:18'),
(44, 1, 8, 1, 'Deleted', '2025-03-29 02:40:20'),
(45, 1, 8, 1, 'Deleted', '2025-03-29 02:42:35'),
(46, 1, 1, 1, 'Deleted', '2025-03-29 02:44:24'),
(47, 1, 8, 4, 'Deleted', '2025-03-29 02:53:22'),
(48, 1, 8, 1, 'Deleted', '2025-03-29 02:53:28'),
(49, 1, 8, 2, 'Deleted', '2025-03-29 02:53:29'),
(50, 1, 8, 4, 'Deleted', '2025-03-29 02:56:18'),
(51, 1, 8, 1, 'Deleted', '2025-03-29 02:58:29'),
(52, 1, 8, 1, 'Deleted', '2025-03-29 02:58:35'),
(53, 1, 8, 1, 'Deleted', '2025-03-29 02:58:43'),
(54, 1, 8, 2, 'Deleted', '2025-03-29 02:59:42'),
(55, 1, 8, 1, 'Deleted', '2025-03-29 02:59:47'),
(56, 1, 8, 1, 'Deleted', '2025-03-29 02:59:52'),
(57, 1, 8, 1, 'Deleted', '2025-03-29 02:59:55'),
(58, 1, 8, 1, 'Deleted', '2025-03-29 02:59:58'),
(59, 1, 8, 1, 'Deleted', '2025-03-29 03:00:00'),
(60, 1, 8, 1, 'Deleted', '2025-03-29 03:00:03'),
(61, 1, 8, 1, 'Deleted', '2025-03-29 03:10:37'),
(62, 1, 1, 1, 'Deleted', '2025-03-29 03:12:19'),
(63, 1, 1, 1, 'Deleted', '2025-03-29 03:12:20'),
(64, 1, 1, 1, 'Deleted', '2025-03-29 03:12:22'),
(65, 1, 6, 8, 'Deleted', '2025-03-29 03:41:17'),
(68, 1, 8, 1, 'Deleted', '2025-03-29 08:00:44'),
(69, 1, 6, 1, 'Deleted', '2025-03-29 08:00:46'),
(70, 1, 8, 1, 'Saved', '2025-03-29 08:00:57'),
(71, 1, 7, 4, 'Saved', '2025-03-29 08:01:54'),
(72, 1, 1, 1, 'Deleted', '2025-03-29 13:12:07'),
(73, 1, 1, 1, 'Saved', '2025-03-29 13:12:11'),
(75, 4, 1, 1, 'Deleted', '2025-03-30 17:06:28'),
(76, 4, 2, 1, 'Saved', '2025-03-30 17:25:36'),
(77, 4, 7, 1, 'Deleted', '2025-03-30 17:25:41'),
(78, 4, 8, 1, 'Deleted', '2025-03-30 17:25:43'),
(79, 4, 7, 1, 'Saved', '2025-03-30 17:26:13'),
(80, 4, 8, 1, 'Saved', '2025-03-30 17:26:23'),
(81, 1, 5, 10, 'Saved', '2025-04-01 06:02:39'),
(82, 1, 2, 1, 'Deleted', '2025-04-01 06:02:40'),
(83, 3, 2, 1, 'Saved', '2025-04-01 06:07:35'),
(84, 3, 14, 1, 'Saved', '2025-04-01 06:10:23'),
(85, 4, 5, 1, 'Deleted', '2025-04-01 06:19:46'),
(87, 1, 6, 1, 'Deleted', '2025-04-02 07:36:18'),
(88, 1, 12, 5, 'Saved', '2025-04-02 07:37:13'),
(89, 1, 6, 8, 'Saved', '2025-04-03 02:26:30');

-- --------------------------------------------------------

--
-- Table structure for table `Complaint`
--

CREATE TABLE `Complaint` (
  `SNo` int(11) NOT NULL,
  `UserSNoSendBy` int(11) NOT NULL,
  `UserSNoSolveBy` int(11) NOT NULL,
  `RecievedFrom` enum('Registration','User','UserOrder','UserPayment','SellerOrder','Seller','SellerProductAddition','Other') NOT NULL,
  `Status` enum('Pending','Solved','Transfer','Processing') NOT NULL,
  `Photo` varchar(50) NOT NULL,
  `DateOfSolve` datetime NOT NULL,
  `ParentComplaintNo` int(11) NOT NULL,
  `DateOfComplaint` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `DescriptionData`
--

CREATE TABLE `DescriptionData` (
  `SNo` int(11) NOT NULL,
  `DescriptionData` varchar(50) NOT NULL,
  `Date` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `DescriptionData`
--

INSERT INTO `DescriptionData` (`SNo`, `DescriptionData`, `Date`) VALUES
(1, 'RAM', '2025-03-23 03:34:25'),
(2, 'Storage', '2025-03-23 03:34:32'),
(3, 'Screen Sizes', '2025-03-23 03:34:44'),
(4, 'Charging Speeds', '2025-03-23 03:34:48'),
(5, 'Battery Capacity', '2025-03-23 03:34:52'),
(6, 'Refresh Rate', '2025-03-23 03:34:56'),
(7, 'Display Types', '2025-03-23 03:35:02'),
(8, 'Notification & Alerts', '2025-04-02 05:47:28'),
(9, 'Voice Assistant ', '2025-04-02 05:50:11'),
(10, 'Music Control ', '2025-04-02 05:50:27'),
(11, 'Custom Watch Faces', '2025-04-02 05:51:42'),
(12, 'Find My device', '2025-04-02 05:55:45'),
(13, 'Camera control ', '2025-04-02 05:58:58'),
(14, 'Dial Style ', '2025-04-02 07:16:29'),
(15, 'Premium Build', '2025-04-02 07:16:43'),
(16, 'Water resistance ', '2025-04-02 07:17:05'),
(17, 'Long Battery Life', '2025-04-02 07:17:16');

-- --------------------------------------------------------

--
-- Table structure for table `Favourite`
--

CREATE TABLE `Favourite` (
  `SNo` int(11) NOT NULL,
  `UserSNo` int(11) NOT NULL,
  `ProductVariantSNo` int(11) NOT NULL,
  `Status` enum('Saved','Deleted') NOT NULL,
  `Date` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `Favourite`
--

INSERT INTO `Favourite` (`SNo`, `UserSNo`, `ProductVariantSNo`, `Status`, `Date`) VALUES
(1, 1, 1, 'Deleted', '2025-03-24 09:49:10'),
(2, 1, 1, 'Deleted', '2025-03-24 09:51:09'),
(4, 4, 2, 'Deleted', '2025-03-30 17:06:25'),
(5, 4, 1, 'Deleted', '2025-03-30 17:06:32'),
(6, 4, 2, 'Saved', '2025-03-30 17:12:20'),
(7, 4, 5, 'Deleted', '2025-03-30 17:12:23'),
(8, 4, 5, 'Saved', '2025-04-01 05:56:54'),
(9, 1, 2, 'Saved', '2025-04-01 06:02:42'),
(10, 1, 5, 'Saved', '2025-04-01 06:02:43'),
(11, 3, 14, 'Saved', '2025-04-01 06:10:26'),
(12, 4, 1, 'Saved', '2025-04-01 06:11:17'),
(21, 1, 6, 'Saved', '2025-04-26 09:29:01'),
(22, 1, 13, 'Saved', '2025-04-26 09:29:04'),
(23, 1, 14, 'Saved', '2025-04-26 09:29:05'),
(24, 1, 9, 'Deleted', '2025-04-26 09:30:48'),
(25, 1, 9, 'Saved', '2025-04-26 09:30:50');

-- --------------------------------------------------------

--
-- Table structure for table `OrderItems`
--

CREATE TABLE `OrderItems` (
  `SNo` int(11) NOT NULL,
  `OrdersSNo` int(11) NOT NULL,
  `ProductVariantsSNo` int(11) NOT NULL,
  `Quantities` int(11) NOT NULL,
  `ProductCost` int(11) NOT NULL,
  `DeliveryCharge` int(11) NOT NULL,
  `DateOfDelivery` varchar(500) DEFAULT NULL,
  `DeliverdOn` datetime DEFAULT NULL,
  `OrderStatus` enum('Pending','Confirmed','InDispatch','Shipped','Delivered','Cancelled','CancelProcess','Returned','ReturnedOrdered','Failed') NOT NULL,
  `Date` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `OrderItems`
--

INSERT INTO `OrderItems` (`SNo`, `OrdersSNo`, `ProductVariantsSNo`, `Quantities`, `ProductCost`, `DeliveryCharge`, `DateOfDelivery`, `DeliverdOn`, `OrderStatus`, `Date`) VALUES
(1, 1, 1, 1, 89999, 0, '0000-00-00 00:00:00', NULL, 'Confirmed', 0),
(2, 4, 1, 1, 89999, 0, '0000-00-00 00:00:00', NULL, 'Confirmed', 0),
(3, 5, 1, 1, 89999, 0, '0000-00-00 00:00:00', NULL, 'Confirmed', 0),
(4, 6, 1, 1, 89999, 0, '0000-00-00 00:00:00', NULL, 'Confirmed', 0),
(5, 7, 1, 1, 89999, 0, '1970', NULL, 'Confirmed', 0),
(6, 8, 1, 1, 89999, 0, '1970', NULL, 'Confirmed', 0),
(7, 10, 10, 1, 1549, 0, '1970', NULL, 'Confirmed', 0),
(8, 11, 1, 1, 89999, 0, '9', NULL, 'Confirmed', 0),
(9, 11, 8, 10, 252000, 0, '8', NULL, 'Confirmed', 0),
(10, 11, 9, 5, 151950, 0, '8', NULL, 'Confirmed', 0),
(11, 12, 6, 1, 27970, 0, '8', NULL, 'Confirmed', 0),
(12, 12, 8, 1, 25200, 0, '8', NULL, 'Confirmed', 0),
(13, 13, 6, 8, 223760, 0, '8', NULL, 'Confirmed', 0),
(14, 13, 8, 10, 252000, 0, '8', NULL, 'Confirmed', 0),
(15, 14, 7, 1, 30829, 0, '8', NULL, 'Confirmed', 0),
(16, 14, 8, 1, 25200, 0, '8', NULL, 'Confirmed', 0),
(17, 15, 2, 1, 19990, 0, '8', NULL, 'Confirmed', 0),
(18, 16, 14, 1, 1313, 0, '1970', NULL, 'Confirmed', 0),
(19, 17, 2, 1, 19990, 0, '8', NULL, 'Confirmed', 0),
(20, 17, 14, 1, 1313, 0, '8', NULL, 'Confirmed', 0),
(21, 18, 30, 1, 299, 0, '1970', NULL, 'Confirmed', 0),
(22, 19, 2, 1, 19990, 0, '8', NULL, 'Confirmed', 0),
(23, 19, 7, 1, 30829, 0, '8', NULL, 'Confirmed', 0),
(24, 19, 8, 1, 25200, 0, '8', NULL, 'Confirmed', 0);

-- --------------------------------------------------------

--
-- Table structure for table `Orders`
--

CREATE TABLE `Orders` (
  `SNo` int(11) NOT NULL,
  `UserSNo` int(11) NOT NULL,
  `AddressSNo` int(11) NOT NULL,
  `ResivedPaymentSNo` int(11) DEFAULT NULL,
  `ordersCount` int(11) NOT NULL,
  `TotalProductCost` int(11) DEFAULT NULL,
  `TotalDeliveryCharge` int(11) DEFAULT NULL,
  `ModeOfPayment` enum('Online','COD') NOT NULL,
  `ModeOfDelivery` enum('HomeDelivery','PickupFromShop') NOT NULL DEFAULT 'HomeDelivery',
  `OrderStatus` enum('Pending','Confirmed','PaymentFailed','COD','Failed','PaymentSuccess') NOT NULL,
  `Date` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `Orders`
--

INSERT INTO `Orders` (`SNo`, `UserSNo`, `AddressSNo`, `ResivedPaymentSNo`, `ordersCount`, `TotalProductCost`, `TotalDeliveryCharge`, `ModeOfPayment`, `ModeOfDelivery`, `OrderStatus`, `Date`) VALUES
(1, 1, 1, NULL, 1, 89999, 0, 'COD', 'HomeDelivery', 'COD', '2025-03-25 07:45:29'),
(4, 1, 1, 16, 1, 89999, 0, 'Online', 'HomeDelivery', 'PaymentSuccess', '2025-03-25 08:21:45'),
(5, 1, 1, 17, 1, 89999, 0, 'Online', 'HomeDelivery', 'PaymentSuccess', '2025-03-25 08:33:29'),
(6, 1, 1, 18, 1, 89999, 0, 'Online', 'HomeDelivery', 'PaymentSuccess', '2025-03-25 08:34:52'),
(7, 1, 1, 19, 1, 89999, 0, 'Online', 'HomeDelivery', 'PaymentSuccess', '2025-03-25 08:35:55'),
(8, 1, 1, 21, 1, 89999, 0, 'Online', 'HomeDelivery', 'PaymentSuccess', '2025-03-25 08:37:22'),
(9, 1, 1, 22, 1, 89999, 0, 'Online', 'HomeDelivery', 'PaymentSuccess', '2025-03-25 08:38:49'),
(10, 1, 1, 23, 1, 1549, 0, 'Online', 'HomeDelivery', 'PaymentSuccess', '2025-03-29 01:06:33'),
(11, 1, 1, NULL, 3, 493949, 0, 'COD', 'HomeDelivery', 'COD', '2025-03-29 03:53:51'),
(12, 1, 1, 37, 2, 53170, 0, 'Online', 'HomeDelivery', 'PaymentSuccess', '2025-03-29 04:36:43'),
(13, 1, 1, NULL, 2, 475760, 0, 'COD', 'HomeDelivery', 'COD', '2025-03-29 04:37:23'),
(14, 1, 1, 39, 2, 56029, 0, 'Online', 'HomeDelivery', 'PaymentSuccess', '2025-03-29 08:02:41'),
(15, 3, 3, 40, 1, 19990, 0, 'Online', 'HomeDelivery', 'PaymentSuccess', '2025-04-01 06:08:20'),
(16, 3, 3, 41, 1, 1313, 0, 'Online', 'HomeDelivery', 'PaymentSuccess', '2025-04-01 06:10:58'),
(17, 3, 3, NULL, 2, 21303, 0, 'COD', 'HomeDelivery', 'COD', '2025-04-01 06:25:02'),
(18, 1, 1, NULL, 1, 299, 0, 'COD', 'HomeDelivery', 'COD', '2025-04-09 03:53:32'),
(19, 4, 6, 46, 3, 76019, 0, 'Online', 'HomeDelivery', 'PaymentSuccess', '2025-04-22 03:05:24');

-- --------------------------------------------------------

--
-- Table structure for table `ProductAttribute`
--

CREATE TABLE `ProductAttribute` (
  `SNo` int(11) NOT NULL,
  `MeasurementUnit` varchar(50) NOT NULL,
  `Unit1` varchar(50) DEFAULT NULL,
  `Unit2` varchar(50) DEFAULT NULL,
  `Unit3` varchar(50) DEFAULT NULL,
  `Unit4` varchar(50) DEFAULT NULL,
  `Unit5` varchar(50) DEFAULT NULL,
  `Unit6` varchar(50) DEFAULT NULL,
  `Unit7` varchar(50) DEFAULT NULL,
  `Unit8` varchar(50) DEFAULT NULL,
  `Unit9` varchar(50) DEFAULT NULL,
  `Unit10` varchar(50) DEFAULT NULL,
  `Unit11` varchar(50) DEFAULT NULL,
  `Unit12` varchar(50) DEFAULT NULL,
  `Unit13` varchar(50) DEFAULT NULL,
  `Unit14` varchar(50) DEFAULT NULL,
  `Unit15` varchar(50) DEFAULT NULL,
  `Date` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `ProductAttribute`
--

INSERT INTO `ProductAttribute` (`SNo`, `MeasurementUnit`, `Unit1`, `Unit2`, `Unit3`, `Unit4`, `Unit5`, `Unit6`, `Unit7`, `Unit8`, `Unit9`, `Unit10`, `Unit11`, `Unit12`, `Unit13`, `Unit14`, `Unit15`, `Date`) VALUES
(1, 'Color', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2025-03-23 03:28:05'),
(2, 'Storage', 'GB', 'TB', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2025-03-23 03:29:48'),
(3, 'RAM', 'GB', 'TB', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2025-03-23 03:30:02'),
(4, 'Display Type ', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2025-04-02 05:33:28'),
(5, 'Strap Material ', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2025-04-02 05:33:42'),
(6, 'Build Material ', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2025-04-02 05:35:13'),
(7, 'Dial Color', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2025-04-02 07:11:24');

-- --------------------------------------------------------

--
-- Table structure for table `ProductCategory`
--

CREATE TABLE `ProductCategory` (
  `SNo` int(11) NOT NULL,
  `Status` enum('Saved','Deleted') NOT NULL,
  `Verification` enum('Processing','Pending','Approved','NotApproved','Blocked') NOT NULL,
  `UserSNoAddedBy` int(11) DEFAULT NULL,
  `UserSNoApprovedBy` int(11) DEFAULT NULL,
  `MainCategory` varchar(150) DEFAULT NULL,
  `MainCategoryImg` varchar(150) DEFAULT NULL,
  `Category` varchar(150) DEFAULT NULL,
  `CategoryImg` varchar(150) DEFAULT NULL,
  `SubCategory` varchar(150) DEFAULT NULL,
  `SubCategoryImg` varchar(150) DEFAULT NULL,
  `AlreadySetInDescription1` int(11) DEFAULT NULL,
  `AlreadySetInDescription2` int(11) DEFAULT NULL,
  `AlreadySetInDescription3` int(11) DEFAULT NULL,
  `AlreadySetInDescription4` int(11) DEFAULT NULL,
  `AlreadySetInDescription5` int(11) DEFAULT NULL,
  `AlreadySetInDescription6` int(11) DEFAULT NULL,
  `AlreadySetInDescription7` int(11) DEFAULT NULL,
  `AlreadySetInDescription8` int(11) DEFAULT NULL,
  `AlreadySetInDescription9` int(11) DEFAULT NULL,
  `AlreadySetInDescription10` int(11) DEFAULT NULL,
  `AlreadySetInDescription11` int(11) DEFAULT NULL,
  `AlreadySetInDescription12` int(11) DEFAULT NULL,
  `AlreadySetInDescription13` int(11) DEFAULT NULL,
  `AlreadySetInDescription14` int(11) DEFAULT NULL,
  `AlreadySetInDescription15` int(11) DEFAULT NULL,
  `AlreadySetInDescription16` int(11) DEFAULT NULL,
  `AlreadySetInDescription17` int(11) DEFAULT NULL,
  `AlreadySetInDescription18` int(11) DEFAULT NULL,
  `AlreadySetInDescription19` int(11) DEFAULT NULL,
  `AlreadySetInDescription20` int(11) DEFAULT NULL,
  `AlreadySetInDescription21` int(11) DEFAULT NULL,
  `AlreadySetInDescription22` int(11) DEFAULT NULL,
  `AlreadySetInDescription23` int(11) DEFAULT NULL,
  `AlreadySetInDescription24` int(11) DEFAULT NULL,
  `AlreadySetInDescription25` int(11) DEFAULT NULL,
  `AlreadySetInDescription26` int(11) DEFAULT NULL,
  `AlreadySetInDescription27` int(11) DEFAULT NULL,
  `AlreadySetInDescription28` int(11) DEFAULT NULL,
  `AlreadySetInDescription29` int(11) DEFAULT NULL,
  `AlreadySetInDescription30` int(11) DEFAULT NULL,
  `AlreadySetInDescription31` int(11) DEFAULT NULL,
  `AlreadySetInDescription32` int(11) DEFAULT NULL,
  `AlreadySetInDescription33` int(11) DEFAULT NULL,
  `AlreadySetInDescription34` int(11) DEFAULT NULL,
  `AlreadySetInDescription35` int(11) DEFAULT NULL,
  `AlreadySetInDescription36` int(11) DEFAULT NULL,
  `AlreadySetInDescription37` int(11) DEFAULT NULL,
  `AlreadySetInDescription38` int(11) DEFAULT NULL,
  `AlreadySetInDescription39` int(11) DEFAULT NULL,
  `AlreadySetInDescription40` int(11) DEFAULT NULL,
  `Attribute1` int(11) DEFAULT NULL,
  `Attribute2` int(11) DEFAULT NULL,
  `Attribute3` int(11) DEFAULT NULL,
  `Attribute4` int(11) DEFAULT NULL,
  `Attribute5` int(11) DEFAULT NULL,
  `Attribute6` int(11) DEFAULT NULL,
  `Attribute7` int(11) DEFAULT NULL,
  `Attribute8` int(11) DEFAULT NULL,
  `Attribute9` int(11) DEFAULT NULL,
  `Attribute10` int(11) DEFAULT NULL,
  `Attribute11` int(11) DEFAULT NULL,
  `Attribute12` int(11) DEFAULT NULL,
  `Attribute13` int(11) DEFAULT NULL,
  `Attribute14` int(11) DEFAULT NULL,
  `Attribute15` int(11) DEFAULT NULL,
  `Date` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `ProductCategory`
--

INSERT INTO `ProductCategory` (`SNo`, `Status`, `Verification`, `UserSNoAddedBy`, `UserSNoApprovedBy`, `MainCategory`, `MainCategoryImg`, `Category`, `CategoryImg`, `SubCategory`, `SubCategoryImg`, `AlreadySetInDescription1`, `AlreadySetInDescription2`, `AlreadySetInDescription3`, `AlreadySetInDescription4`, `AlreadySetInDescription5`, `AlreadySetInDescription6`, `AlreadySetInDescription7`, `AlreadySetInDescription8`, `AlreadySetInDescription9`, `AlreadySetInDescription10`, `AlreadySetInDescription11`, `AlreadySetInDescription12`, `AlreadySetInDescription13`, `AlreadySetInDescription14`, `AlreadySetInDescription15`, `AlreadySetInDescription16`, `AlreadySetInDescription17`, `AlreadySetInDescription18`, `AlreadySetInDescription19`, `AlreadySetInDescription20`, `AlreadySetInDescription21`, `AlreadySetInDescription22`, `AlreadySetInDescription23`, `AlreadySetInDescription24`, `AlreadySetInDescription25`, `AlreadySetInDescription26`, `AlreadySetInDescription27`, `AlreadySetInDescription28`, `AlreadySetInDescription29`, `AlreadySetInDescription30`, `AlreadySetInDescription31`, `AlreadySetInDescription32`, `AlreadySetInDescription33`, `AlreadySetInDescription34`, `AlreadySetInDescription35`, `AlreadySetInDescription36`, `AlreadySetInDescription37`, `AlreadySetInDescription38`, `AlreadySetInDescription39`, `AlreadySetInDescription40`, `Attribute1`, `Attribute2`, `Attribute3`, `Attribute4`, `Attribute5`, `Attribute6`, `Attribute7`, `Attribute8`, `Attribute9`, `Attribute10`, `Attribute11`, `Attribute12`, `Attribute13`, `Attribute14`, `Attribute15`, `Date`) VALUES
(1, 'Saved', 'Approved', NULL, NULL, 'Mobile, Tablets & Accessories', 'Mobile, Tablets & Accessories_20250323044534.jpg', 'Mobile Phone', 'Mobile, Tablets & Accessories_Mobile Phone_20250323044534.jpg', 'Smartphone', 'Mobile, Tablets & Accessories_Mobile Phone_Smartphone_20250323044534.jpg', 5, 4, 7, 1, 6, 3, 2, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, 3, 2, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2025-03-23 03:45:21'),
(2, 'Saved', 'Approved', NULL, NULL, 'Mobile, Tablets & Accessories', 'Mobile,%20Tablets%20&%20Accessories_20250323044534.jpg', 'Mobile Phone', 'Mobile,%20Tablets%20&%20Accessories_Mobile%20Phone_20250323044534.jpg', 'Feature Phones', 'Mobile, Tablets & Accessories_Mobile Phone_Feature Phones_20250323044755.jpg', 5, 3, 2, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, 2, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2025-03-23 03:47:42'),
(3, 'Saved', 'Approved', NULL, NULL, 'Mobile, Tablets & Accessories', 'Mobile,%20Tablets%20&%20Accessories_20250323044534.jpg', 'Tablets', 'Mobile, Tablets & Accessories_Tablets_20250326121153.webp', 'Android Tablets', 'Mobile, Tablets & Accessories_Tablets_Android Tablets_20250326121153.webp', 5, 4, 7, 1, 6, 3, 2, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, 3, 2, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2025-03-26 12:11:53'),
(4, 'Saved', 'Approved', NULL, NULL, 'Mobile, Tablets & Accessories', 'Mobile,%20Tablets%20&%20Accessories_20250323044534.jpg', 'Tablets', 'Mobile,%20Tablets%20&%20Accessories_Tablets_20250326121153.webp', 'Apple iPads', 'Mobile, Tablets & Accessories_Tablets_Apple iPads_20250326121554.webp', 5, 4, 7, 1, 3, 2, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, 3, 2, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2025-03-26 12:15:54'),
(5, 'Saved', 'Approved', NULL, NULL, 'Watches ', 'Watches _20250402063826.png', 'Smart Watch ', 'Watches _Smart Watch _20250402063826.jpeg', 'Apple Watch Series ', 'Watches _Smart Watch _Apple Watch Series _20250402063826.jpeg', 13, 11, 7, 12, 10, 8, 9, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 6, 1, 4, 3, 5, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2025-04-02 06:38:26'),
(6, 'Saved', 'Approved', NULL, NULL, 'Watches ', 'Watches%20_20250402063826.png', 'Analog Watch ', 'Watches _Analog Watch _20250402071816.jpeg', 'Analog Watch ', 'Watches _Analog Watch _Analog Watch _20250402071816.jpg', 14, 7, 17, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 6, 1, 7, 4, 5, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2025-04-02 07:18:16');

-- --------------------------------------------------------

--
-- Table structure for table `ProductList`
--

CREATE TABLE `ProductList` (
  `SNo` int(11) NOT NULL,
  `UserSNo` int(11) NOT NULL,
  `CategorySNo` int(11) NOT NULL,
  `VaritySelectionSNo1` int(11) DEFAULT NULL,
  `VarityUnit1` varchar(50) DEFAULT NULL,
  `VaritySelectionSNo2` int(11) DEFAULT NULL,
  `VarityUnit2` varchar(50) DEFAULT NULL,
  `VaritySelectionSNo3` int(11) DEFAULT NULL,
  `VarityUnit3` varchar(50) DEFAULT NULL,
  `Verification` enum('Processing','Pending','Approved','NotApproved','Blocked') NOT NULL,
  `ProductName` varchar(100) NOT NULL,
  `Description` varchar(300) DEFAULT NULL,
  `AverageRating` float NOT NULL DEFAULT 4.5,
  `TotalRatings` int(11) NOT NULL DEFAULT 0,
  `TotalOrderd` int(11) NOT NULL DEFAULT 0,
  `Brand` varchar(30) DEFAULT NULL,
  `Keywords` varchar(150) DEFAULT NULL,
  `Status` enum('Saved','Deleted') NOT NULL DEFAULT 'Saved',
  `DispatchIn` int(11) NOT NULL,
  `SellOnLocalShop` enum('Yes','No') NOT NULL,
  `SellOnUniversal` enum('Yes','No') NOT NULL,
  `LocalDelivery` enum('Yes','No') NOT NULL,
  `LocalDeliveryCharge` int(11) NOT NULL,
  `ZonalDelivery` enum('Yes','No') NOT NULL,
  `ZonalDeliveryCharge` int(11) NOT NULL,
  `NationalDelivery` enum('Yes','No') NOT NULL,
  `NationalDeliveryCharge` int(11) NOT NULL,
  `Date` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `ProductList`
--

INSERT INTO `ProductList` (`SNo`, `UserSNo`, `CategorySNo`, `VaritySelectionSNo1`, `VarityUnit1`, `VaritySelectionSNo2`, `VarityUnit2`, `VaritySelectionSNo3`, `VarityUnit3`, `Verification`, `ProductName`, `Description`, `AverageRating`, `TotalRatings`, `TotalOrderd`, `Brand`, `Keywords`, `Status`, `DispatchIn`, `SellOnLocalShop`, `SellOnUniversal`, `LocalDelivery`, `LocalDeliveryCharge`, `ZonalDelivery`, `ZonalDeliveryCharge`, `NationalDelivery`, `NationalDeliveryCharge`, `Date`) VALUES
(1, 1, 1, 1, NULL, 3, NULL, 2, NULL, 'Processing', 'Xiaomi 14 Ultra', '\nExperience the utmost in peak performance and easily get through difficult times with the Xiaomi 14 Ultra smartphone. The Xiaomi 14 Ultra\'s Leica Summilux optical lens has excellent optical performance and a wide aperture. It has outstanding resolution, contrast, and colour reproduction in addition', 4.5, 0, 0, 'Xiaomi', 'Xiaomi,Redmi', 'Saved', 2, 'Yes', 'Yes', 'Yes', 0, 'Yes', 0, 'Yes', 0, '2025-03-24 09:05:43'),
(2, 3, 1, 1, NULL, 3, NULL, 2, NULL, 'Processing', 'Vivo Y73', 'The Vivo Y73 is a stylish smartphone featuring a 7.38 mm sleek design. Along with an AG Matte Glass finish surface, it offers a delicate yet premium touch. The rounded frame further offers a relaxed and comfortable grip.', 4.5, 0, 0, 'Vivo', 'Vivo, smartphone, android.. ', 'Saved', 1, 'Yes', 'Yes', 'Yes', 0, 'Yes', 0, 'Yes', 0, '2025-03-28 08:10:44'),
(3, 1, 1, 1, NULL, 3, NULL, 2, NULL, 'Processing', 'IQOO Neo 7 5G', 'Key Features\n• 8 GB RAM | 128 GB ROM\n• 17.22 cm (6.78 inch) Display\n• 64MP Rear Camera\n• 5000 mAh Battery\nGeneral\nIn The Box\n?Cell phone, Charger, USB cable, Earphone jack adapter, Eject tool, Quick start guide, Warranty card, Phone case.\nModel Number: 12214\nModel Name :Neo 7 5G\nColor :Interstellar ', 4.5, 0, 0, 'Iqoo', 'Iqoo, Vivo,oppo,SmartPhone, Android', 'Saved', 1, 'Yes', 'Yes', 'Yes', 0, 'Yes', 0, 'Yes', 0, '2025-03-28 14:30:02'),
(4, 3, 2, NULL, NULL, 1, NULL, 2, NULL, 'Processing', 'Nokia 105 terrakotta Red', 'Sporting basic functionality, this mobile includes essential functions like call records, SMS, and a removable battery for easy maintenance. It focuses on providing the key services and facilitating easy connection. The removable battery also allows convenient replacement or maintenance, ensuring lo', 4.5, 0, 0, 'Nokia ', 'Feature phone, nokia, keypad ', 'Saved', 1, 'Yes', 'Yes', 'Yes', 0, 'Yes', 0, 'Yes', 0, '2025-03-28 16:50:25'),
(5, 3, 4, 1, NULL, 3, NULL, 2, NULL, 'Processing', 'Apple iPad (10th gen)', 'iPad\n\nLovable.\n\nDrawable.\n\nMagical.\n\nJot it down. Type it up. Take it with you. iPad is made for all the activities you love.\n\nMeet the redesigned iPad.\n\nA colourful all-screen design with a 27.69-centimetre (10.9-inch) Liquid Retina display. And support for the new Magic Keyboard Folio and Apple Pe', 4.5, 0, 0, 'iPad os16', 'Apple, iPad, iphone tab.', 'Saved', 1, 'Yes', 'Yes', 'Yes', 0, 'Yes', 0, 'Yes', 0, '2025-03-29 14:36:41'),
(6, 3, 3, 1, NULL, 3, NULL, 2, NULL, 'Processing', 'Redmi pad SE', 'When surfing, shopping, watching films, or playing games, the huge 27.94 cm (11) FHD+ display with 16.7 million colours and a 90 Hz AdaptiveSync refresh rate of the Redmi Pad SE guarantees a clear and fluid visual experience.\n\n\n\nProfessional low blue light certification for eye protection\n\nA\n\nTUV th', 4.5, 0, 0, 'Redmi ', 'Android, redmi, tablet.', 'Saved', 1, 'Yes', 'Yes', 'Yes', 0, 'Yes', 0, 'Yes', 0, '2025-03-29 14:52:15'),
(7, 3, 2, NULL, NULL, 1, NULL, 2, NULL, 'Processing', 'itel it5262', 'Other Details\n\nNetwork Type\n\n2G\n\nSIM Type\n\nDual Sim\n\nExpandable Storage\n\nYes\n\nAudio Jack\n\nYes\n\nQuick Charging\n\nYes\n\nIn The Box\n\nHandset, Battery, Charger, Warranty Card, User Manual\n\nWarranty\n\nWarranty Summary\n\n1 Year Manufacturer Warranty', 4.5, 0, 0, 'itel', 'Keypad, feature phone.', 'Saved', 1, 'Yes', 'Yes', 'Yes', 0, 'Yes', 0, 'Yes', 0, '2025-04-01 05:51:39'),
(8, 3, 3, 1, NULL, 3, NULL, 2, NULL, 'Processing', 'SAMSUNG Galaxy Tab A9+', 'General\nModel Number\nSM-X216BDBEINS\nModel Name\nGalaxy Tab A9+\nIdeal Usage\nEntertainment, Gaming, Reading and Browsing, For Kids, Business\nColor\nNavy\nConnectivity\nWi-Fi+5G\nOS\nAndroid\nOperating System Version\n12\nRAM\n8 GB\nVoice Call\nYes\nDisplay Resolution Type\nWQXGA\nVideo Call\nYes\nSupported Network\n5G,', 4.5, 0, 0, 'samsung ', 'galaxy , android , tablet', 'Saved', 2, 'Yes', 'Yes', 'Yes', 0, 'Yes', 0, 'Yes', 0, '2025-04-01 07:03:33'),
(9, 3, 2, NULL, NULL, 1, NULL, 2, NULL, 'Processing', 'itel it5262', 'Other Details\n\nNetwork Type\n\n2G\n\nSIM Type\n\nDual Sim\n\nExpandable Storage\n\nYes\n\nAudio Jack\n\nYes\n\nQuick Charging\n\nYes\n\nIn The Box\n\nHandset, Battery, Charger, Warranty Card, User Manual\n\nWarranty\n\nWarranty Summary\n\n1 Year Manufacturer Warranty\n\nAll Details\n\n>', 4.5, 0, 0, 'itel', 'itel, feature phone,', 'Saved', 1, 'Yes', 'Yes', 'Yes', 0, 'Yes', 0, 'Yes', 0, '2025-04-01 08:00:19'),
(10, 3, 1, 1, NULL, 3, NULL, 2, NULL, 'Processing', 'MOTOROLA Edge 50 fusion ', 'Motorola edge 50 fusion is designed to capture its best shots at night with advanced features. The 50 MP main camera uses a powerful Sony LYTIA LYT-700C sensor to capture moments ultrafast with low noise even in dark environments. Who thought Night photography could get faster, accurate and focused.', 4.5, 0, 0, 'Motorola ', 'Motorola, android, edge 50, smartphone,', 'Saved', 1, 'Yes', 'Yes', 'Yes', 0, 'Yes', 0, 'Yes', 0, '2025-04-01 15:51:31'),
(11, 3, 4, 1, NULL, 3, NULL, 2, NULL, 'Processing', 'Apple iPad (10th gen)', 'Rear Camera: 12MP Wide camera, f/1.8 aperture, Digital zoom up to 5x, Five-element lens, Autofocus with Focus Pixels, Panorama (up to 63MP) ,Smart HDR 3, Photo geotagging, Auto image stabilisation, Burst mode, mage formats captured: HEIF and JPEG. Front Camera: Landscape 12MP Ultra Wide camera, 122°', 4.5, 0, 0, 'Apple iPad ', 'iPad, apple, tablet', 'Saved', 1, 'Yes', 'Yes', 'Yes', 0, 'Yes', 0, 'Yes', 0, '2025-04-01 16:21:21'),
(12, 3, 4, 1, NULL, 3, NULL, 2, NULL, 'Processing', 'Apple iPad pro (4th gen)', 'Full HD\n\nSupported Network\n\n5G, 4G LTE, UMTS, GSM\n\nProcessor Type\n\nApple M2 chip\n\nAdditional Features\n\nFour speaker audio, Five studio-quality microphones for calls, video recording and audio recording, Video Calling (FaceTime Video): iPad to Any FaceTime Enabled Device over Wi-Fi or Cellular, Audio', 4.5, 0, 0, 'iPad', 'iPad, apple, ipad pro, tablets ', 'Saved', 1, 'Yes', 'Yes', 'Yes', 0, 'Yes', 0, 'Yes', 0, '2025-04-01 16:35:45'),
(13, 3, 1, 1, NULL, 3, NULL, 2, NULL, 'Processing', 'Apple iphone 16 pro', 'Legal Disclaimers\n\nApple Intelligence: Apple Intelligence will be\n\navailable in beta on all iPhone 16 models, iPhone 15 Pro and iPhone 15 Pro Max, with Siri and device language set to US English, as an iOS 18 update in late 2024. Some features and support for additional languages, including Indian E', 4.5, 0, 0, 'iphone ', 'Apple, iphone, smartphone', 'Saved', 1, 'Yes', 'Yes', 'Yes', 0, 'Yes', 0, 'Yes', 0, '2025-04-01 17:01:55'),
(14, 3, 1, 1, NULL, 3, NULL, 2, NULL, 'Processing', 'Apple iphone 16 pro Max ', 'Super Retina XDR Display\n\nGPU\n\nNew 6 Core\n\nDisplay Type\n\nAll Screen OLED Display\n\nOther Display Features\n\nDynamic Island, Always On Display, ProMotion Technology with Adaptive Refresh Rates Upto 120Hz, HDR Display, True Tone, Wide Colour (P3), Haptic Touch, Contrast Ratio: 2,000,000:1 (Typical), 1,0', 4.5, 0, 0, 'iphone ', 'iphone, apple, smartphone ', 'Saved', 1, 'Yes', 'Yes', 'Yes', 0, 'Yes', 0, 'Yes', 0, '2025-04-01 17:32:29'),
(15, 3, 1, 1, NULL, 3, NULL, 2, NULL, 'Processing', 'Apple iPhone 16 plus', '17.02 cm (6.7 inch)\n\nResolution\n\n2796 x 1290 Pixels\n\nResolution Type\n\nSuper Retina XDR Display\n\nGPU\n\nNew 5 Core\n\nDisplay Type\n\nAll Screen OLED Display\n\nOther Display Features\n\nDynamic Island, HDR Display, True Tone, Wide Colour (P3), Haptic Touch, Contrast Ratio: 2,000,000:1 (Typical), 1,000 nits Ma', 4.5, 0, 0, 'iphone ', 'iphone, apple, smartphone ', 'Saved', 1, 'Yes', 'Yes', 'Yes', 0, 'Yes', 0, 'Yes', 0, '2025-04-02 02:57:18'),
(16, 3, 2, NULL, NULL, 1, NULL, 2, NULL, 'Processing', 'MOTOROLA  A10V DS', 'Motorola launches Moto A10V. Moto A10V comes with a 1.8\" screen and offer a powerfull 800 mAh battery that gives 4 days of battery backup to the consumers with a promise of 2 years replacement warranty. The handset is made of strong polycarbonate body which makes it durable and supports Dual sim, au', 4.5, 0, 0, 'Motorola ', 'Motorola, android, feature phone ', 'Saved', 1, 'Yes', 'Yes', 'Yes', 0, 'Yes', 0, 'Yes', 0, '2025-04-02 03:16:28'),
(17, 3, 3, 1, NULL, 3, NULL, 2, NULL, 'Processing', 'Lenovo Tab M11', 'Warranty\n\n1 Year Comprehensive Warranty\n\nCovered In Warranty\n\nManufacturing Defects\n\nNot Covered In Warranty\n\nPhysical Damage\n\nGeneric Name\n\nTablets\n\nCountry of Origin\n\nChina\n\nManufacturer\'s Details\n\n1. Lenovo India Pvt Ltd Ferns Icon Level 2\n\nDoddenakundi Village Marathalli Outer ring road\n\nKR Pura', 4.5, 0, 0, 'Lenovo ', 'Lenovo, android, tablet ', 'Saved', 1, 'Yes', 'Yes', 'Yes', 0, 'Yes', 0, 'Yes', 0, '2025-04-02 04:09:55'),
(18, 3, 2, NULL, NULL, 1, NULL, 2, NULL, 'Processing', 'Nokia 2660', '*Big buttons, big sound, and a big 2.8\" primary display *Zoom UI for easy use *Battery-life that lasts for weeks *Flip-functionality for answering or ending a call with a simple flip *Emergency button for contacting up to 5 people', 4.5, 0, 0, 'Nokia ', 'Android, feature phone, nokia, keypad ', 'Saved', 1, 'Yes', 'Yes', 'Yes', 0, 'Yes', 0, 'Yes', 0, '2025-04-02 04:23:03'),
(19, 3, 2, NULL, NULL, 1, NULL, 2, NULL, 'Processing', 'Nokia 2660', 'Warranty\n\n1YR BRAND WARRANTY ON HANDSET & 6 MONTHS WARRANTY ON ACCESSORIES\n\nCovered In Warranty\n\nNO WARRANTY\n\nNot Covered In Warranty\n\nNO WARRANTY\n\nGeneric Name\n\nCountry of Origin\n\nMobiles\n\nIndia\n\nManufacturer\'s Details\n\n1. Nokia, Pioneer Urban Square Complex, No 510 5th Floor, Tower C, Golf Course ', 4.5, 0, 0, 'Nokia ', 'Nokia, android, feature phone, keypad ', 'Saved', 1, 'Yes', 'Yes', 'Yes', 0, 'Yes', 0, 'Yes', 0, '2025-04-02 06:20:12'),
(20, 3, 2, NULL, NULL, 1, NULL, 2, NULL, 'Processing', 'SAMSUNG Metro B313E', 'This mobile phone comes with dual SIM support, allowing you to use two different numbers in one device. This feature can help you keep work and personal contacts separate without needing two phones. It also gives you the flexibility to choose different network providers, ensuring better connectivity', 4.5, 0, 0, 'Sumsung ', 'Sumsung, android feature phone, keypad ', 'Saved', 1, 'Yes', 'Yes', 'Yes', 0, 'Yes', 0, 'Yes', 0, '2025-04-02 06:25:03'),
(21, 3, 1, 1, NULL, 3, NULL, 2, NULL, 'Processing', 'OnePlus nord 4', 'Relevant product parameter descriptions have been addressed on the corresponding pages and will not be repeated here. For details, please refer to the specific instructions on each page. 2. The weight of the phone is 199.5g, and the weight of the screen protector may add an additional 3g. The size a', 4.5, 0, 0, 'OnePlus ', 'OnePlus nord, android, smartphone, touchscreen ', 'Saved', 1, 'Yes', 'Yes', 'Yes', 0, 'Yes', 0, 'Yes', 0, '2025-04-02 06:33:36'),
(22, 1, 6, 4, NULL, 1, NULL, NULL, NULL, 'Processing', 'Gun Metal Grey Day and Date Functioning Mesh Strap Quartz Analog Watch - For Men LS2974', 'Display Type: Analog\nStyle Code: LS2974\nSeries: Gun Metal Grey Day and Date Functioning Mesh Strap Quartz\nOccasion: Casual\nWatch Type: Wrist Watch\nPack of: 1\nMechanism: Quartz\nStrap Color: Grey\nNet Quantity: 1\nDial Color: Grey\nWarranty Period: 6 Months', 4.5, 0, 0, 'LIMESTONE ', 'Wrist Watch,Grey,LIMESTONE ,Analog', 'Saved', 2, 'Yes', 'Yes', 'Yes', 0, 'Yes', 0, 'Yes', 0, '2025-04-02 07:21:46');

-- --------------------------------------------------------

--
-- Table structure for table `ProductNewStocksDetail`
--

CREATE TABLE `ProductNewStocksDetail` (
  `SNo` int(11) NOT NULL,
  `ProductListSNo` int(11) NOT NULL,
  `ProductVariantsSNo` int(11) NOT NULL,
  `Quantity` int(11) NOT NULL,
  `Date` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `ProductNewStocksDetail`
--

INSERT INTO `ProductNewStocksDetail` (`SNo`, `ProductListSNo`, `ProductVariantsSNo`, `Quantity`, `Date`) VALUES
(1, 1, 1, 5, '2025-03-24 09:08:30'),
(2, 2, 2, 10, '2025-03-28 08:15:09'),
(3, 2, 5, 10, '2025-03-28 13:27:09'),
(4, 3, 6, 8, '2025-03-28 14:31:21'),
(5, 3, 7, 5, '2025-03-28 14:34:07'),
(6, 3, 8, 25, '2025-03-28 14:43:12'),
(7, 3, 9, 20, '2025-03-28 14:48:06'),
(8, 4, 10, 5, '2025-03-28 16:51:53'),
(9, 4, 10, 5, '2025-03-28 16:53:15'),
(10, 5, 12, 5, '2025-03-29 14:38:11'),
(11, 6, 13, 5, '2025-03-29 14:54:29'),
(12, 7, 14, 10, '2025-04-01 05:52:53'),
(13, 8, 15, 3, '2025-04-01 07:14:43'),
(14, 9, 16, 5, '2025-04-01 08:01:57'),
(15, 10, 17, 10, '2025-04-01 15:53:47'),
(16, 11, 18, 5, '2025-04-01 16:23:39'),
(17, 12, 19, 5, '2025-04-01 16:39:26'),
(18, 13, 20, 5, '2025-04-01 17:04:06'),
(19, 15, 22, 5, '2025-04-02 02:59:33'),
(20, 16, 23, 5, '2025-04-02 03:17:57'),
(21, 16, 24, 10, '2025-04-02 03:20:27'),
(22, 17, 25, 5, '2025-04-02 04:11:01'),
(23, 18, 26, 10, '2025-04-02 04:24:01'),
(24, 19, 27, 5, '2025-04-02 06:21:27'),
(25, 20, 28, 5, '2025-04-02 06:26:25'),
(26, 20, 28, 5, '2025-04-02 06:26:34'),
(27, 21, 29, 5, '2025-04-02 06:35:26'),
(28, 22, 30, 10, '2025-04-02 07:23:11');

-- --------------------------------------------------------

--
-- Table structure for table `ProductVariants`
--

CREATE TABLE `ProductVariants` (
  `SNo` int(11) NOT NULL,
  `ProductSNo` int(11) NOT NULL,
  `MRPPrice` int(11) DEFAULT NULL,
  `OfferPrice` int(11) DEFAULT NULL,
  `Stocks` int(11) DEFAULT NULL,
  `VarentTypeValue1` varchar(50) DEFAULT NULL,
  `VarentTypeValue2` varchar(50) DEFAULT NULL,
  `VarentTypeValue3` varchar(50) DEFAULT NULL,
  `VariantDescription` varchar(1000) NOT NULL,
  `AdditionalCharges` int(11) DEFAULT NULL,
  `Status` enum('Saved','Deleted') NOT NULL,
  `TotalSell` int(11) NOT NULL DEFAULT 0,
  `TotalOrderd` int(11) NOT NULL DEFAULT 0,
  `TotalCancel` int(11) NOT NULL DEFAULT 0,
  `ProductImage1` varchar(500) DEFAULT NULL,
  `ProductImage2` varchar(500) DEFAULT NULL,
  `ProductImage3` varchar(500) DEFAULT NULL,
  `ProductImage4` varchar(500) DEFAULT NULL,
  `ProductImage5` varchar(100) DEFAULT NULL,
  `ProductImage6` varchar(1000) DEFAULT NULL,
  `ProductImage7` varchar(1000) DEFAULT NULL,
  `ProductImage8` varchar(1000) DEFAULT NULL,
  `ProductImage9` varchar(1000) DEFAULT NULL,
  `ProductImage10` varchar(1000) DEFAULT NULL,
  `DescriptionKey1` varchar(100) DEFAULT NULL,
  `DescriptionValue1` varchar(100) DEFAULT NULL,
  `DescriptionKey2` varchar(100) DEFAULT NULL,
  `DescriptionValue2` varchar(100) DEFAULT NULL,
  `DescriptionKey3` varchar(100) DEFAULT NULL,
  `DescriptionValue3` varchar(100) DEFAULT NULL,
  `DescriptionKey4` varchar(100) DEFAULT NULL,
  `DescriptionValue4` varchar(100) DEFAULT NULL,
  `DescriptionKey5` varchar(100) DEFAULT NULL,
  `DescriptionValue5` varchar(100) DEFAULT NULL,
  `DescriptionKey6` varchar(100) DEFAULT NULL,
  `DescriptionValue6` varchar(100) DEFAULT NULL,
  `DescriptionKey7` varchar(100) DEFAULT NULL,
  `DescriptionValue7` varchar(100) DEFAULT NULL,
  `DescriptionKey8` varchar(100) DEFAULT NULL,
  `DescriptionValue8` varchar(100) DEFAULT NULL,
  `DescriptionKey9` varchar(100) DEFAULT NULL,
  `DescriptionValue9` varchar(100) DEFAULT NULL,
  `DescriptionKey10` varchar(100) DEFAULT NULL,
  `DescriptionValue10` varchar(100) DEFAULT NULL,
  `DescriptionKey11` varchar(100) DEFAULT NULL,
  `DescriptionValue11` varchar(100) DEFAULT NULL,
  `DescriptionKey12` varchar(100) DEFAULT NULL,
  `DescriptionValue12` varchar(100) DEFAULT NULL,
  `DescriptionKey13` varchar(100) DEFAULT NULL,
  `DescriptionValue13` varchar(100) DEFAULT NULL,
  `DescriptionKey14` varchar(100) DEFAULT NULL,
  `DescriptionValue14` varchar(100) DEFAULT NULL,
  `DescriptionKey15` varchar(100) DEFAULT NULL,
  `DescriptionValue15` varchar(100) DEFAULT NULL,
  `DescriptionKey16` varchar(100) DEFAULT NULL,
  `DescriptionValue16` varchar(100) DEFAULT NULL,
  `DescriptionKey17` varchar(100) DEFAULT NULL,
  `DescriptionValue17` varchar(100) DEFAULT NULL,
  `DescriptionKey18` varchar(100) DEFAULT NULL,
  `DescriptionValue18` varchar(100) DEFAULT NULL,
  `DescriptionKey19` varchar(100) DEFAULT NULL,
  `DescriptionValue19` varchar(100) DEFAULT NULL,
  `DescriptionKey20` varchar(100) DEFAULT NULL,
  `DescriptionValue20` varchar(100) DEFAULT NULL,
  `DescriptionKey21` varchar(100) DEFAULT NULL,
  `DescriptionValue21` varchar(100) DEFAULT NULL,
  `DescriptionKey22` varchar(100) DEFAULT NULL,
  `DescriptionValue22` varchar(100) DEFAULT NULL,
  `DescriptionKey23` varchar(100) DEFAULT NULL,
  `DescriptionValue23` varchar(100) DEFAULT NULL,
  `DescriptionKey24` varchar(100) DEFAULT NULL,
  `DescriptionValue24` varchar(100) DEFAULT NULL,
  `DescriptionKey25` varchar(100) DEFAULT NULL,
  `DescriptionValue25` varchar(100) DEFAULT NULL,
  `DescriptionKey26` varchar(100) DEFAULT NULL,
  `DescriptionValue26` varchar(100) DEFAULT NULL,
  `DescriptionKey27` varchar(100) DEFAULT NULL,
  `DescriptionValue27` varchar(100) DEFAULT NULL,
  `DescriptionKey28` varchar(100) DEFAULT NULL,
  `DescriptionValue28` varchar(100) DEFAULT NULL,
  `DescriptionKey29` varchar(100) DEFAULT NULL,
  `DescriptionValue29` varchar(100) DEFAULT NULL,
  `DescriptionKey30` varchar(100) DEFAULT NULL,
  `DescriptionValue30` varchar(100) DEFAULT NULL,
  `DescriptionKey31` varchar(100) DEFAULT NULL,
  `DescriptionValue31` varchar(100) DEFAULT NULL,
  `DescriptionKey32` varchar(100) DEFAULT NULL,
  `DescriptionValue32` varchar(100) DEFAULT NULL,
  `DescriptionKey33` varchar(100) DEFAULT NULL,
  `DescriptionValue33` varchar(100) DEFAULT NULL,
  `DescriptionKey34` varchar(100) DEFAULT NULL,
  `DescriptionValue34` varchar(100) DEFAULT NULL,
  `DescriptionKey35` varchar(100) DEFAULT NULL,
  `DescriptionValue35` varchar(100) DEFAULT NULL,
  `DescriptionKey36` varchar(100) DEFAULT NULL,
  `DescriptionValue36` varchar(100) DEFAULT NULL,
  `DescriptionKey37` varchar(100) DEFAULT NULL,
  `DescriptionValue37` varchar(100) DEFAULT NULL,
  `DescriptionKey38` varchar(100) DEFAULT NULL,
  `DescriptionValue38` varchar(100) DEFAULT NULL,
  `DescriptionKey39` varchar(100) DEFAULT NULL,
  `DescriptionValue39` varchar(100) DEFAULT NULL,
  `DescriptionKey40` varchar(100) DEFAULT NULL,
  `DescriptionValue40` varchar(100) DEFAULT NULL,
  `Date` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `ProductVariants`
--

INSERT INTO `ProductVariants` (`SNo`, `ProductSNo`, `MRPPrice`, `OfferPrice`, `Stocks`, `VarentTypeValue1`, `VarentTypeValue2`, `VarentTypeValue3`, `VariantDescription`, `AdditionalCharges`, `Status`, `TotalSell`, `TotalOrderd`, `TotalCancel`, `ProductImage1`, `ProductImage2`, `ProductImage3`, `ProductImage4`, `ProductImage5`, `ProductImage6`, `ProductImage7`, `ProductImage8`, `ProductImage9`, `ProductImage10`, `DescriptionKey1`, `DescriptionValue1`, `DescriptionKey2`, `DescriptionValue2`, `DescriptionKey3`, `DescriptionValue3`, `DescriptionKey4`, `DescriptionValue4`, `DescriptionKey5`, `DescriptionValue5`, `DescriptionKey6`, `DescriptionValue6`, `DescriptionKey7`, `DescriptionValue7`, `DescriptionKey8`, `DescriptionValue8`, `DescriptionKey9`, `DescriptionValue9`, `DescriptionKey10`, `DescriptionValue10`, `DescriptionKey11`, `DescriptionValue11`, `DescriptionKey12`, `DescriptionValue12`, `DescriptionKey13`, `DescriptionValue13`, `DescriptionKey14`, `DescriptionValue14`, `DescriptionKey15`, `DescriptionValue15`, `DescriptionKey16`, `DescriptionValue16`, `DescriptionKey17`, `DescriptionValue17`, `DescriptionKey18`, `DescriptionValue18`, `DescriptionKey19`, `DescriptionValue19`, `DescriptionKey20`, `DescriptionValue20`, `DescriptionKey21`, `DescriptionValue21`, `DescriptionKey22`, `DescriptionValue22`, `DescriptionKey23`, `DescriptionValue23`, `DescriptionKey24`, `DescriptionValue24`, `DescriptionKey25`, `DescriptionValue25`, `DescriptionKey26`, `DescriptionValue26`, `DescriptionKey27`, `DescriptionValue27`, `DescriptionKey28`, `DescriptionValue28`, `DescriptionKey29`, `DescriptionValue29`, `DescriptionKey30`, `DescriptionValue30`, `DescriptionKey31`, `DescriptionValue31`, `DescriptionKey32`, `DescriptionValue32`, `DescriptionKey33`, `DescriptionValue33`, `DescriptionKey34`, `DescriptionValue34`, `DescriptionKey35`, `DescriptionValue35`, `DescriptionKey36`, `DescriptionValue36`, `DescriptionKey37`, `DescriptionValue37`, `DescriptionKey38`, `DescriptionValue38`, `DescriptionKey39`, `DescriptionValue39`, `DescriptionKey40`, `DescriptionValue40`, `Date`) VALUES
(1, 1, 99999, 89999, 0, 'White', '16 GB', '512 GB', '', NULL, 'Saved', 0, 0, 0, 'ProductNo_000001_VarityNo_000001_Img01_Xiaomi 14 Ultra_20250324100843.webp', 'ProductNo_000001_VarityNo_000001_Img02_Xiaomi 14 Ultra_20250324100843.webp', 'ProductNo_000001_VarityNo_000001_Img03_Xiaomi 14 Ultra_20250324100843.webp', 'ProductNo_000001_VarityNo_000001_Img04_Xiaomi 14 Ultra_20250324100843.webp', 'ProductNo_000001_VarityNo_000001_Img05_Xiaomi 14 Ultra_20250324100843.webp', 'ProductNo_000001_VarityNo_000001_Img06_Xiaomi 14 Ultra_20250324100843.webp', 'ProductNo_000001_VarityNo_000001_Img07_Xiaomi 14 Ultra_20250324100843.webp', 'ProductNo_000001_VarityNo_000001_Img08_Xiaomi 14 Ultra_20250324100843.webp', 'ProductNo_000001_VarityNo_000001_Img09_Xiaomi 14 Ultra_20250324100843.webp', 'ProductNo_000001_VarityNo_000001_Img10_Xiaomi 14 Ultra_20250324100843.webp', 'Battery Capacity', '5000 mAh ', 'Charging Speeds', '120 W', 'Display Types', 'Amoled', 'RAM', '16 GB', 'Refresh Rate', '144 Hrz', 'Screen Sizes', '6.73 inch', 'Storage', '512 GB', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2025-03-24 09:05:44'),
(2, 2, 24990, 19990, 10, 'Dimond ', '8 GB', '128 GB', '', NULL, 'Saved', 0, 0, 0, 'ProductNo_000002_VarityNo_000002_Img01_Vivo Y73_20250328081509.jpg', 'ProductNo_000002_VarityNo_000002_Img02_Vivo Y73_20250328081509.jpg', 'ProductNo_000002_VarityNo_000002_Img03_Vivo Y73_20250328081509.jpg', 'ProductNo_000002_VarityNo_000002_Img04_Vivo Y73_20250328081509.jpg', 'ProductNo_000002_VarityNo_000002_Img05_Vivo Y73_20250328081509.jpg', NULL, NULL, NULL, NULL, NULL, 'Battery Capacity', '4000 mAh', 'Charging Speeds', 'Usb cable C type', 'Display Types', 'full HD+ display', 'RAM', '8 GB', 'Refresh Rate', NULL, 'Screen Sizes', '16.36 cm', 'Storage', '128 GB', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2025-03-28 08:10:44'),
(5, 2, 24990, 19990, 10, 'Roman Black', '8 GB', '128 GB', '', NULL, 'Saved', 0, 0, 0, 'ProductNo_000002_VarityNo_000005_Img01_Vivo Y73_20250328142724.webp', 'ProductNo_000002_VarityNo_000005_Img02_Vivo Y73_20250328142724.webp', 'ProductNo_000002_VarityNo_000005_Img03_Vivo Y73_20250328142724.webp', 'ProductNo_000002_VarityNo_000005_Img04_Vivo Y73_20250328142724.webp', 'ProductNo_000002_VarityNo_000005_Img05_Vivo Y73_20250328142724.webp', NULL, NULL, NULL, NULL, NULL, 'Battery Capacity', '4000 mAh', 'Charging Speeds', 'Usb cable C type', 'Display Types', 'full HD+ display', 'RAM', '8 GB', 'Refresh Rate', NULL, 'Screen Sizes', '16.36 cm', 'Storage', '128 GB', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2025-03-28 13:27:09'),
(6, 3, 34999, 27970, 8, 'Interstellar Black', '8 GB', '128 GB', '', NULL, 'Saved', 0, 0, 0, 'ProductNo_000003_VarityNo_000006_Img01_IQOO Neo 7 5G_20250328153136.webp', 'ProductNo_000003_VarityNo_000006_Img02_IQOO Neo 7 5G_20250328153136.webp', 'ProductNo_000003_VarityNo_000006_Img03_IQOO Neo 7 5G_20250328153136.webp', 'ProductNo_000003_VarityNo_000006_Img04_IQOO Neo 7 5G_20250328153136.webp', 'ProductNo_000003_VarityNo_000006_Img05_IQOO Neo 7 5G_20250328153136.webp', NULL, NULL, NULL, NULL, NULL, 'Battery Capacity', '5000 mAh', 'Charging Speeds', '120 W', 'Display Types', 'Amoled', 'RAM', '8GB ', 'Refresh Rate', '144 Hrz', 'Screen Sizes', '1.78 inch', 'Storage', '128 GB', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2025-03-28 14:30:02'),
(7, 3, 38999, 30829, 5, 'Interstellar Black', '12 GB', '256 GB', '', NULL, 'Saved', 0, 0, 0, 'ProductNo_000003_VarityNo_000008_Img01_IQOO Neo 7 5G_20250328153421.webp', 'ProductNo_000003_VarityNo_000008_Img02_IQOO Neo 7 5G_20250328153421.webp', 'ProductNo_000003_VarityNo_000008_Img03_IQOO Neo 7 5G_20250328153421.webp', 'ProductNo_000003_VarityNo_000008_Img04_IQOO Neo 7 5G_20250328153421.webp', 'ProductNo_000003_VarityNo_000008_Img05_IQOO Neo 7 5G_20250328153421.webp', NULL, NULL, NULL, NULL, NULL, NULL, '5000 mAh', 'Charging Speeds', '120 W', 'Display Types', 'Amoled', 'RAM', '12 GB', 'Refresh Rate', '144 Hrz', 'Screen Sizes', '1.78 inch', 'Storage', '256 GB', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2025-03-28 14:34:06'),
(8, 3, 34999, 25200, 25, 'Frost Blue', '8 GB', '128 GB', '', NULL, 'Saved', 0, 0, 0, 'ProductNo_000003_VarityNo_000008_Img01_IQOO Neo 7 5G_20250328154327.webp', 'ProductNo_000003_VarityNo_000008_Img02_IQOO Neo 7 5G_20250328154327.webp', 'ProductNo_000003_VarityNo_000008_Img03_IQOO Neo 7 5G_20250328154327.webp', 'ProductNo_000003_VarityNo_000008_Img04_IQOO Neo 7 5G_20250328154327.webp', 'ProductNo_000003_VarityNo_000008_Img05_IQOO Neo 7 5G_20250328154327.webp', NULL, NULL, NULL, NULL, NULL, 'Battery Capacity', '5000 mAh', 'Charging Speeds', '120 W', 'Display Types', 'Amoled', 'RAM', '8GB ', 'Refresh Rate', '144 Hrz', 'Screen Sizes', '1.78 inch', 'Storage', '128 GB', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2025-03-28 14:43:12'),
(9, 3, 38999, 30390, 20, 'Frost Blue', '12 GB', '256 GB', '', NULL, 'Saved', 0, 0, 0, 'ProductNo_000003_VarityNo_000009_Img01_IQOO Neo 7 5G_20250328154820.webp', 'ProductNo_000003_VarityNo_000009_Img02_IQOO Neo 7 5G_20250328154820.webp', 'ProductNo_000003_VarityNo_000009_Img03_IQOO Neo 7 5G_20250328154820.webp', 'ProductNo_000003_VarityNo_000009_Img04_IQOO Neo 7 5G_20250328154820.webp', 'ProductNo_000003_VarityNo_000009_Img05_IQOO Neo 7 5G_20250328154820.webp', NULL, NULL, NULL, NULL, NULL, 'Battery Capacity', '5000 mAh', 'Charging Speeds', '120 W', 'Display Types', 'Amoled', 'RAM', '12 GB ', 'Refresh Rate', '144 Hrz', 'Screen Sizes', '1.78 inch', 'Storage', '256 GB', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2025-03-28 14:48:04'),
(10, 4, 1699, 1549, 4, NULL, 'Terrakotta Red ', '32 GB', '', NULL, 'Saved', 0, 0, 0, 'ProductNo_000004_VarityNo_000010_Img01_Nokia 105 terrakotta Red_20250328165315.jpg', 'ProductNo_000004_VarityNo_000010_Img02_Nokia 105 terrakotta Red_20250328165315.jpg', 'ProductNo_000004_VarityNo_000010_Img03_Nokia 105 terrakotta Red_20250328165315.jpg', 'ProductNo_000004_VarityNo_000010_Img04_Nokia 105 terrakotta Red_20250328165315.jpg', 'ProductNo_000004_VarityNo_000010_Img05_Nokia 105 terrakotta Red_20250328165315.jpg', NULL, NULL, NULL, NULL, NULL, 'Battery Capacity', '5000 mAh', 'Screen Sizes', '1.77 ', 'Storage', '32 GB', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2025-03-28 16:50:25'),
(12, 5, 34900, 27900, 5, 'Blue ', '64', '64', '', NULL, 'Saved', 0, 0, 0, 'ProductNo_000005_VarityNo_000012_Img01_Apple iPad (10th gen)_20250329143811.jpg', 'ProductNo_000005_VarityNo_000012_Img02_Apple iPad (10th gen)_20250329143811.jpg', 'ProductNo_000005_VarityNo_000012_Img03_Apple iPad (10th gen)_20250329143811.jpg', 'ProductNo_000005_VarityNo_000012_Img04_Apple iPad (10th gen)_20250329143811.jpg', 'ProductNo_000005_VarityNo_000012_Img05_Apple iPad (10th gen)_20250329143811.jpg', 'ProductNo_000005_VarityNo_000012_Img06_Apple iPad (10th gen)_20250329143811.jpg', 'ProductNo_000005_VarityNo_000012_Img07_Apple iPad (10th gen)_20250329143811.jpg', NULL, NULL, NULL, 'Battery Capacity', '5000 mAh', 'Charging Speeds', 'Usb cable C type', 'Display Types', 'full HD+ display', 'RAM', '64 GB', 'Screen Sizes', '10.9 inches.', 'Storage', '64 GB', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2025-03-29 14:36:41'),
(13, 6, 14999, 12999, 5, 'Graphite grey', '4 GB', '128 GB', '', NULL, 'Saved', 0, 0, 0, 'ProductNo_000006_VarityNo_000013_Img01_Redmi pad SE_20250329145429.jpg', 'ProductNo_000006_VarityNo_000013_Img02_Redmi pad SE_20250329145429.jpg', 'ProductNo_000006_VarityNo_000013_Img03_Redmi pad SE_20250329145429.jpg', 'ProductNo_000006_VarityNo_000013_Img04_Redmi pad SE_20250329145429.jpg', 'ProductNo_000006_VarityNo_000013_Img05_Redmi pad SE_20250329145429.jpg', 'ProductNo_000006_VarityNo_000013_Img06_Redmi pad SE_20250329145429.jpg', 'ProductNo_000006_VarityNo_000013_Img07_Redmi pad SE_20250329145429.jpg', 'ProductNo_000006_VarityNo_000013_Img08_Redmi pad SE_20250329145429.jpg', 'ProductNo_000006_VarityNo_000013_Img09_Redmi pad SE_20250329145429.jpg', NULL, 'Battery Capacity', '8000 mAh', 'Charging Speeds', 'Usb cable C type', 'Display Types', 'full HD+ display', 'RAM', '4 GB', 'Refresh Rate', '1 sec', 'Screen Sizes', '11.0 inches', 'Storage', '128 GB', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2025-03-29 14:52:15'),
(14, 7, 1599, 1313, 9, NULL, 'Green ', '4 GB', '', NULL, 'Saved', 0, 0, 0, 'ProductNo_000007_VarityNo_000014_Img01_itel it5262_20250401055253.jpg', 'ProductNo_000007_VarityNo_000014_Img02_itel it5262_20250401055253.jpg', 'ProductNo_000007_VarityNo_000014_Img03_itel it5262_20250401055253.jpg', 'ProductNo_000007_VarityNo_000014_Img04_itel it5262_20250401055253.jpg', 'ProductNo_000007_VarityNo_000014_Img05_itel it5262_20250401055253.jpg', NULL, NULL, NULL, NULL, NULL, 'Battery Capacity', '2000 mAh', 'Screen Sizes', '2.4 inches', 'Storage', '4 GB', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2025-04-01 05:51:39'),
(15, 8, 32999, 24999, 3, 'graphite', '8 GB', '128 GB', '', NULL, 'Saved', 0, 0, 0, 'ProductNo_000008_VarityNo_000015_Img01_SAMSUNG Galaxy Tab A9+_20250401071443.webp', 'ProductNo_000008_VarityNo_000015_Img02_SAMSUNG Galaxy Tab A9+_20250401071443.webp', 'ProductNo_000008_VarityNo_000015_Img03_SAMSUNG Galaxy Tab A9+_20250401071443.webp', 'ProductNo_000008_VarityNo_000015_Img04_SAMSUNG Galaxy Tab A9+_20250401071443.webp', 'ProductNo_000008_VarityNo_000015_Img05_SAMSUNG Galaxy Tab A9+_20250401071443.webp', 'ProductNo_000008_VarityNo_000015_Img06_SAMSUNG Galaxy Tab A9+_20250401071443.webp', NULL, NULL, NULL, NULL, 'Battery Capacity', '7040 mAH', 'Charging Speeds', NULL, 'Display Types', 'full hd', 'RAM', '8 GB', 'Refresh Rate', '1', 'Screen Sizes', ' 27.94 cm (11.0 inch)', 'Storage', '128 GB', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2025-04-01 07:03:33'),
(16, 9, 1599, 1387, 5, NULL, 'Light Blue ', '4 GB', '', NULL, 'Saved', 0, 0, 0, 'ProductNo_000009_VarityNo_000016_Img01_itel it5262_20250401080157.jpg', 'ProductNo_000009_VarityNo_000016_Img02_itel it5262_20250401080157.jpg', 'ProductNo_000009_VarityNo_000016_Img03_itel it5262_20250401080157.jpg', 'ProductNo_000009_VarityNo_000016_Img04_itel it5262_20250401080157.jpg', 'ProductNo_000009_VarityNo_000016_Img05_itel it5262_20250401080157.jpg', NULL, NULL, NULL, NULL, NULL, 'Battery Capacity', '2000 mAh', 'Screen Sizes', '2.4', 'Storage', '4 GB', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2025-04-01 08:00:19'),
(17, 10, 25999, 22999, 10, 'Marshmallow blue', '8 GB', '128 GB', '', NULL, 'Saved', 0, 0, 0, 'ProductNo_000010_VarityNo_000017_Img01_MOTOROLA Edge 50 fusion _20250401155347.jpg', 'ProductNo_000010_VarityNo_000017_Img02_MOTOROLA Edge 50 fusion _20250401155347.jpg', 'ProductNo_000010_VarityNo_000017_Img03_MOTOROLA Edge 50 fusion _20250401155347.jpg', 'ProductNo_000010_VarityNo_000017_Img04_MOTOROLA Edge 50 fusion _20250401155347.jpg', 'ProductNo_000010_VarityNo_000017_Img05_MOTOROLA Edge 50 fusion _20250401155347.jpg', 'ProductNo_000010_VarityNo_000017_Img06_MOTOROLA Edge 50 fusion _20250401155347.jpg', 'ProductNo_000010_VarityNo_000017_Img07_MOTOROLA Edge 50 fusion _20250401155347.jpg', 'ProductNo_000010_VarityNo_000017_Img08_MOTOROLA Edge 50 fusion _20250401155347.jpg', 'ProductNo_000010_VarityNo_000017_Img09_MOTOROLA Edge 50 fusion _20250401155347.jpg', NULL, 'Battery Capacity', '5000 mAh', 'Charging Speeds', NULL, 'Display Types', 'full HD', 'RAM', '8 GB', 'Refresh Rate', '1', 'Screen Sizes', '7.6 inches ', 'Storage', '128 GB', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2025-04-01 15:51:31'),
(18, 11, 34900, 27900, 5, 'Pink', '64 GB', '64 GB', 'iPad\r\n\r\nLovable.\r\n\r\nDrawable.\r\n\r\nMagical.\r\n\r\nJot it down. Type it up. Take it with you. iPad is made for all the activities you love.\r\n\r\nMeet the redesigned iPad.\r\n\r\nA colourful all-screen design with a 27.69-centimetre (10.9-inch) Liquid Retina display. And support for the new Magic Keyboard Folio and Apple Pencil (1st generation). 0\r\n\r\nAdd to cart\r\n\r\nBuy now', NULL, 'Saved', 0, 0, 0, 'ProductNo_000011_VarityNo_000018_Img01_Apple iPad (10th gen)_20250401162339.jpg', 'ProductNo_000011_VarityNo_000018_Img02_Apple iPad (10th gen)_20250401162339.jpg', 'ProductNo_000011_VarityNo_000018_Img03_Apple iPad (10th gen)_20250401162339.jpg', 'ProductNo_000011_VarityNo_000018_Img04_Apple iPad (10th gen)_20250401162339.jpg', NULL, NULL, NULL, NULL, NULL, NULL, 'Battery Capacity', '8000 mAh', 'Charging Speeds', NULL, 'Display Types', 'full HD+ display', 'RAM', '64 GB', 'Screen Sizes', '27.69 cm (10.9 inch)', 'Storage', '64 GB', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2025-04-01 16:21:21'),
(19, 12, 164900, 128990, 5, 'Space grey', '16 GB', '1 tb', 'Astonishing performance.\r\n\r\nIncredibly advanced displays. Superfast wireless connectivity. Next-level Apple Pencil capabilities. Powerful new features in iPadOS. The ultimate iPad experience.\r\n\r\nPerformance\r\n\r\nM2 chip. Next-generation performance.\r\n\r\nMind-blowing speed, amazing graphics and all-day battery life. Crush tasks, create like a pro and play console-quality games.', NULL, 'Saved', 0, 0, 0, 'ProductNo_000012_VarityNo_000019_Img01_Apple iPad pro (4th gen)_20250401163926.jpg', 'ProductNo_000012_VarityNo_000019_Img02_Apple iPad pro (4th gen)_20250401163926.jpg', 'ProductNo_000012_VarityNo_000019_Img03_Apple iPad pro (4th gen)_20250401163926.jpg', 'ProductNo_000012_VarityNo_000019_Img04_Apple iPad pro (4th gen)_20250401163926.jpg', 'ProductNo_000012_VarityNo_000019_Img05_Apple iPad pro (4th gen)_20250401163926.jpg', 'ProductNo_000012_VarityNo_000019_Img06_Apple iPad pro (4th gen)_20250401163926.jpg', 'ProductNo_000012_VarityNo_000019_Img07_Apple iPad pro (4th gen)_20250401163926.jpg', 'ProductNo_000012_VarityNo_000019_Img08_Apple iPad pro (4th gen)_20250401163926.jpg', 'ProductNo_000012_VarityNo_000019_Img09_Apple iPad pro (4th gen)_20250401163926.jpg', NULL, 'Battery Capacity', '8000 mAh', 'Charging Speeds', NULL, 'Display Types', 'full HD+ display', 'RAM', '16 GB', 'Screen Sizes', '27.94 cm  (11.0 inches)', 'Storage', '1 tb', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2025-04-01 16:35:45'),
(20, 13, 169900, 162900, 5, 'White titanium ', '16 GB', '1 tb', '', NULL, 'Saved', 0, 0, 0, 'ProductNo_000013_VarityNo_000020_Img01_Apple iphone 16 pro_20250401170406.jpg', 'ProductNo_000013_VarityNo_000020_Img02_Apple iphone 16 pro_20250401170406.jpg', 'ProductNo_000013_VarityNo_000020_Img03_Apple iphone 16 pro_20250401170406.jpg', 'ProductNo_000013_VarityNo_000020_Img04_Apple iphone 16 pro_20250401170406.jpg', 'ProductNo_000013_VarityNo_000020_Img05_Apple iphone 16 pro_20250401170406.jpg', 'ProductNo_000013_VarityNo_000020_Img06_Apple iphone 16 pro_20250401170406.jpg', 'ProductNo_000013_VarityNo_000020_Img07_Apple iphone 16 pro_20250401170406.jpg', 'ProductNo_000013_VarityNo_000020_Img08_Apple iphone 16 pro_20250401170406.jpg', NULL, NULL, 'Battery Capacity', '8000 mAh', 'Charging Speeds', NULL, 'Display Types', 'All screen OLED display ', 'RAM', '16 GB', 'Refresh Rate', '0.5', 'Screen Sizes', '6.3 inches ', 'Storage', '1 tb', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2025-04-01 17:01:55'),
(22, 15, 119900, 114900, 5, 'Ultramarine', '16 GB', '512', 'iPhone 16 Plus. Built for Apple Intelligence.\r\n\r\nFeaturing Camera Control. 48 MP Fusion camera.\r\n\r\nFive vibrant colours. And A18 chip.', NULL, 'Saved', 0, 0, 0, 'ProductNo_000015_VarityNo_000022_Img01_Apple iPhone 16 plus_20250402025932.jpg', 'ProductNo_000015_VarityNo_000022_Img02_Apple iPhone 16 plus_20250402025932.jpg', 'ProductNo_000015_VarityNo_000022_Img03_Apple iPhone 16 plus_20250402025932.jpg', 'ProductNo_000015_VarityNo_000022_Img04_Apple iPhone 16 plus_20250402025932.jpg', 'ProductNo_000015_VarityNo_000022_Img05_Apple iPhone 16 plus_20250402025932.jpg', 'ProductNo_000015_VarityNo_000022_Img06_Apple iPhone 16 plus_20250402025932.jpg', 'ProductNo_000015_VarityNo_000022_Img07_Apple iPhone 16 plus_20250402025932.jpg', 'ProductNo_000015_VarityNo_000022_Img08_Apple iPhone 16 plus_20250402025932.jpg', 'ProductNo_000015_VarityNo_000022_Img09_Apple iPhone 16 plus_20250402025932.jpg', NULL, 'Battery Capacity', NULL, 'Charging Speeds', NULL, 'Display Types', 'Super retina XDR display ', 'RAM', '16 GB', 'Refresh Rate', '0.5', 'Screen Sizes', '17.02 cm', 'Storage', '512 GB', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2025-04-02 02:57:18'),
(23, 16, 1549, 1210, 5, NULL, 'Teal blue ', '0.03 GB', '', NULL, 'Saved', 0, 0, 0, 'ProductNo_000016_VarityNo_000023_Img01_MOTOROLA  A10V DS_20250402031757.jpg', 'ProductNo_000016_VarityNo_000023_Img02_MOTOROLA  A10V DS_20250402031757.jpg', 'ProductNo_000016_VarityNo_000023_Img03_MOTOROLA  A10V DS_20250402031757.jpg', 'ProductNo_000016_VarityNo_000023_Img04_MOTOROLA  A10V DS_20250402031757.jpg', 'ProductNo_000016_VarityNo_000023_Img05_MOTOROLA  A10V DS_20250402031757.jpg', NULL, NULL, NULL, NULL, NULL, 'Battery Capacity', '800 mAh', 'Screen Sizes', '1.8 inch', 'Storage', '4 GB', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2025-04-02 03:16:28'),
(24, 16, 1565, 1299, 10, NULL, 'Black ', '0.03 GB', 'Motorola launches Moto A10V. Moto A10V comes with a 1.8\" screen and offer a powerfull 800 mAh battery that gives 4 days of battery backup to the consumers with a promise of 2 years replacement warranty. The handset is made of strong polycarbonate body which makes it durable and supports Dual sim, auto call recording, wireless FM and bluetooth', NULL, 'Saved', 0, 0, 0, 'ProductNo_000016_VarityNo_000024_Img01_MOTOROLA  A10V DS_20250402032027.jpg', 'ProductNo_000016_VarityNo_000024_Img02_MOTOROLA  A10V DS_20250402032027.jpg', 'ProductNo_000016_VarityNo_000024_Img03_MOTOROLA  A10V DS_20250402032027.jpg', 'ProductNo_000016_VarityNo_000024_Img04_MOTOROLA  A10V DS_20250402032027.jpg', 'ProductNo_000016_VarityNo_000024_Img05_MOTOROLA  A10V DS_20250402032027.jpg', NULL, NULL, NULL, NULL, NULL, 'Battery Capacity', '800 mAh', 'Screen Sizes', '1.8 inch', 'Storage', '4 GB', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2025-04-02 03:20:27'),
(25, 17, 31000, 13999, 5, 'Seafoam green', '4 GB', '128 GB', '', NULL, 'Saved', 0, 0, 0, 'ProductNo_000017_VarityNo_000025_Img01_Lenovo Tab M11_20250402041101.jpg', 'ProductNo_000017_VarityNo_000025_Img02_Lenovo Tab M11_20250402041101.jpg', 'ProductNo_000017_VarityNo_000025_Img03_Lenovo Tab M11_20250402041101.jpg', 'ProductNo_000017_VarityNo_000025_Img04_Lenovo Tab M11_20250402041101.jpg', 'ProductNo_000017_VarityNo_000025_Img05_Lenovo Tab M11_20250402041101.jpg', 'ProductNo_000017_VarityNo_000025_Img06_Lenovo Tab M11_20250402041101.jpg', NULL, NULL, NULL, NULL, 'Battery Capacity', '7040 mAh', 'Charging Speeds', NULL, 'Display Types', 'WUXGA IPS LED', 'RAM', '4 GB', 'Refresh Rate', '1 ', 'Screen Sizes', '11.0 inches ', 'Storage', '128 GB', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2025-04-02 04:09:55'),
(26, 18, 5899, 4995, 10, NULL, 'Red', '0.125 GB', '', NULL, 'Saved', 0, 0, 0, 'ProductNo_000018_VarityNo_000026_Img01_Nokia 2660_20250402042401.jpg', 'ProductNo_000018_VarityNo_000026_Img02_Nokia 2660_20250402042401.jpg', 'ProductNo_000018_VarityNo_000026_Img03_Nokia 2660_20250402042401.jpg', 'ProductNo_000018_VarityNo_000026_Img04_Nokia 2660_20250402042401.jpg', 'ProductNo_000018_VarityNo_000026_Img05_Nokia 2660_20250402042401.jpg', NULL, NULL, NULL, NULL, NULL, 'Battery Capacity', '1450 mAh', 'Screen Sizes', '2.8 inches ', 'Storage', '0.125 GB', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2025-04-02 04:23:03'),
(27, 19, 5899, 4299, 5, NULL, 'Blue', '0.125', '', NULL, 'Saved', 0, 0, 0, 'ProductNo_000019_VarityNo_000027_Img01_Nokia 2660_20250402062127.jpg', 'ProductNo_000019_VarityNo_000027_Img02_Nokia 2660_20250402062127.jpg', 'ProductNo_000019_VarityNo_000027_Img03_Nokia 2660_20250402062127.jpg', 'ProductNo_000019_VarityNo_000027_Img04_Nokia 2660_20250402062127.jpg', 'ProductNo_000019_VarityNo_000027_Img05_Nokia 2660_20250402062127.jpg', NULL, NULL, NULL, NULL, NULL, 'Battery Capacity', '1450', 'Screen Sizes', '2.8 inches ', 'Storage', '0.125 GB', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2025-04-02 06:20:12'),
(28, 20, 2449, 1190, 5, NULL, 'White ', '10 MB', '', NULL, 'Saved', 0, 0, 0, 'ProductNo_000020_VarityNo_000028_Img01_SAMSUNG Metro B313E_20250402062634.jpg', 'ProductNo_000020_VarityNo_000028_Img02_SAMSUNG Metro B313E_20250402062634.jpg', 'ProductNo_000020_VarityNo_000028_Img03_SAMSUNG Metro B313E_20250402062634.jpg', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'Battery Capacity', '1000 mAh', 'Screen Sizes', '2 inches', 'Storage', '10 MB', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2025-04-02 06:25:03'),
(29, 21, 32999, 28390, 5, 'Oasis green', '8 GB', '256 GB', '', NULL, 'Saved', 0, 0, 0, 'ProductNo_000021_VarityNo_000029_Img01_OnePlus nord 4_20250402063526.jpg', 'ProductNo_000021_VarityNo_000029_Img02_OnePlus nord 4_20250402063526.jpg', 'ProductNo_000021_VarityNo_000029_Img03_OnePlus nord 4_20250402063526.jpg', 'ProductNo_000021_VarityNo_000029_Img04_OnePlus nord 4_20250402063526.jpg', 'ProductNo_000021_VarityNo_000029_Img05_OnePlus nord 4_20250402063526.jpg', NULL, NULL, NULL, NULL, NULL, 'Battery Capacity', '5500 mAh', 'Charging Speeds', NULL, 'Display Types', 'full HD+ display', 'RAM', '8 GB', 'Refresh Rate', '1 ', 'Screen Sizes', '6.74 inches ', 'Storage', '256 GB', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2025-04-02 06:33:36'),
(30, 22, 2499, 299, 9, 'Round', 'Grey', NULL, '', NULL, 'Saved', 0, 0, 0, 'ProductNo_000022_VarityNo_000030_Img01_Gun Metal Grey Day and Date Functioning Mesh Strap Quartz Analog Watch - For Men LS2974_20250402072311.jpeg', 'ProductNo_000022_VarityNo_000030_Img02_Gun Metal Grey Day and Date Functioning Mesh Strap Quartz Analog Watch - For Men LS2974_20250402072311.jpeg', 'ProductNo_000022_VarityNo_000030_Img03_Gun Metal Grey Day and Date Functioning Mesh Strap Quartz Analog Watch - For Men LS2974_20250402072311.jpeg', 'ProductNo_000022_VarityNo_000030_Img04_Gun Metal Grey Day and Date Functioning Mesh Strap Quartz Analog Watch - For Men LS2974_20250402072311.jpeg', 'ProductNo_000022_VarityNo_000030_Img05_Gun Metal Grey Day and Date Functioning Mesh Strap Quartz Ana', 'ProductNo_000022_VarityNo_000030_Img06_Gun Metal Grey Day and Date Functioning Mesh Strap Quartz Analog Watch - For Men LS2974_20250402072311.jpeg', 'ProductNo_000022_VarityNo_000030_Img07_Gun Metal Grey Day and Date Functioning Mesh Strap Quartz Analog Watch - For Men LS2974_20250402072311.jpeg', NULL, NULL, NULL, 'Dial Style ', 'Round', 'Display Types', NULL, 'Long Battery Life', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2025-04-02 07:21:46');

-- --------------------------------------------------------

--
-- Table structure for table `razorPay`
--

CREATE TABLE `razorPay` (
  `SNo` int(11) NOT NULL,
  `userSNo` int(11) NOT NULL,
  `amount` int(11) NOT NULL,
  `token` varchar(100) DEFAULT NULL,
  `paymentId` varchar(200) DEFAULT NULL,
  `signature` varchar(500) DEFAULT NULL,
  `Status` enum('error','success','pending') DEFAULT 'pending',
  `date` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `razorPay`
--

INSERT INTO `razorPay` (`SNo`, `userSNo`, `amount`, `token`, `paymentId`, `signature`, `Status`, `date`) VALUES
(1, 1, 89999, 'order_QAw2cdu8sNAvlh', NULL, NULL, 'pending', '2025-03-25 07:07:18'),
(2, 1, 89999, 'order_QAw31sKJiW6KFD', NULL, NULL, 'pending', '2025-03-25 07:07:43'),
(3, 1, 89999, 'order_QAwcgHdRI6LLTN', NULL, NULL, 'pending', '2025-03-25 07:41:27'),
(4, 1, 89999, 'order_QAwmbuPlMrkt98', NULL, NULL, 'pending', '2025-03-25 07:50:52'),
(5, 1, 89999, 'order_QAwnuogeqmPslu', NULL, NULL, 'pending', '2025-03-25 07:52:05'),
(6, 1, 89999, 'order_QAwqYpKHGJo86V', NULL, NULL, 'pending', '2025-03-25 07:54:35'),
(7, 1, 89999, 'order_QAwrqsxo9jS8gS', NULL, NULL, 'pending', '2025-03-25 07:55:49'),
(8, 1, 89999, 'order_QAwssrthLcCTdn', NULL, NULL, 'pending', '2025-03-25 07:56:47'),
(9, 1, 89999, 'order_QAwtFhITo0OcNt', NULL, NULL, 'pending', '2025-03-25 07:57:08'),
(10, 1, 89999, 'order_QAwwp7dPygabqf', NULL, NULL, 'pending', '2025-03-25 08:00:30'),
(11, 1, 89999, 'order_QAwxsicOR4R5Vm', NULL, NULL, 'pending', '2025-03-25 08:01:31'),
(12, 1, 89999, 'order_QAx24ipv7AHLfK', NULL, NULL, 'pending', '2025-03-25 08:05:29'),
(13, 1, 89999, 'order_QAx5sLuzDu2Zhl', NULL, NULL, 'pending', '2025-03-25 08:09:05'),
(14, 1, 89999, 'order_QAxB6kPtr1pp7B', 'pay_QAxBdnOs6gkl1j', '8b23efe1ac8221ed58f5d2f7cd765a05bc0aad7dcd4b162dc1517d89efad501e', 'success', '2025-03-25 08:14:02'),
(15, 1, 89999, 'order_QAxCLDr3cdiEvA', 'pay_QAxD1jSReqRM1c', '81af7a2f23b1e79eccac6dd6457c22642c8387b48f42c3a96276af61bcffabe8', 'success', '2025-03-25 08:15:12'),
(16, 1, 89999, 'order_QAxIb7ynYoMsMl', 'pay_QAxIrb8ZTm91NO', '96ca1d373dc9fab8c57108541ee08e17e01aa15b4e59b17f95cd8be17c2af403', 'success', '2025-03-25 08:21:07'),
(17, 1, 89999, 'order_QAxV5rfsAxR14J', 'pay_QAxVMMuLStAgNE', 'baf6889ff8cf1435aac5ed9a8ef83ac125479f936df3e0719a7d5f21c7138f03', 'success', '2025-03-25 08:32:58'),
(18, 1, 89999, 'order_QAxWasnwOkTnHd', 'pay_QAxWow17xRWp9R', '1b950c93711e8b4507a73af422510daec11dbe93f33844c81da18e247ca23d3d', 'success', '2025-03-25 08:34:23'),
(19, 1, 89999, 'order_QAxXgqKFqGf1lp', 'pay_QAxXwOoIciP4VY', 'e9e6d0e9d6f76ef304617d3962132813a6bf0c4b78049a58b45c402d40bfbefd', 'success', '2025-03-25 08:35:26'),
(20, 1, 179998, 'order_QAxZ543d6JKryA', NULL, NULL, 'pending', '2025-03-25 08:36:45'),
(21, 1, 89999, 'order_QAxZIJpBDEj4I5', 'pay_QAxZTgtOWFNk8c', '0af0b71d613a072c09e825cc4c612bf1064eaaf54c103e639fb9bb88f7bd9d41', 'success', '2025-03-25 08:36:57'),
(22, 1, 89999, 'order_QAxaX4KrM8lejK', 'pay_QAxaxhEddNOcUI', '457ac734ae1837da58a88ad5a01440a3a4e6206de2b1f42a54d9800e46ca8ac6', 'success', '2025-03-25 08:38:06'),
(23, 1, 1549, 'order_QCQ1bSMI4nHyLV', 'pay_QCQ1jemzmG3X1V', '4a3140e083d0a4e2a986e3725bfd716e27de7af549ae3484bdb531f78de87f4c', 'success', '2025-03-29 01:06:09'),
(24, 1, 369969, 'order_QCT0BJf1y69tWY', NULL, NULL, 'pending', '2025-03-29 04:00:52'),
(25, 1, 369969, 'order_QCT2fY6RVhOXM7', NULL, NULL, 'pending', '2025-03-29 04:03:14'),
(26, 1, 369969, 'order_QCTAJobG2J3hCn', NULL, NULL, 'pending', '2025-03-29 04:10:29'),
(27, 1, 369969, 'order_QCTB3mywYldIQe', NULL, NULL, 'pending', '2025-03-29 04:11:11'),
(28, 1, 279970, 'order_QCTCyxB3iZjOd5', NULL, NULL, 'pending', '2025-03-29 04:13:00'),
(29, 1, 279970, 'order_QCTKEGzLUm3hHz', NULL, NULL, 'pending', '2025-03-29 04:19:51'),
(30, 1, 279970, 'order_QCTM4lExVPobk2', NULL, NULL, 'pending', '2025-03-29 04:21:37'),
(31, 1, 279970, 'order_QCTNDweV4OJOlu', NULL, NULL, 'pending', '2025-03-29 04:22:42'),
(32, 1, 279970, 'order_QCTO2c9E9ZcHdH', NULL, NULL, 'pending', '2025-03-29 04:23:28'),
(33, 1, 279970, 'order_QCTWnctDqF0w9E', NULL, NULL, 'pending', '2025-03-29 04:31:45'),
(34, 1, 279970, 'order_QCTXiycpZZBPaQ', NULL, NULL, 'pending', '2025-03-29 04:32:37'),
(35, 1, 279970, 'order_QCTaRNjAXLY2X4', NULL, NULL, 'pending', '2025-03-29 04:35:13'),
(36, 1, 27970, 'order_QCTauqVmX6pNcJ', NULL, NULL, 'pending', '2025-03-29 04:35:40'),
(37, 1, 53170, 'order_QCTbOWas4PN7N2', 'pay_QCTbkLAojQNVLc', 'de7f6cf48bc9a4a8b7c11e6f7a6d53fdd9e9c37baf212fe87430c26cd619ff84', 'success', '2025-03-29 04:36:07'),
(38, 1, 25200, 'order_QCX6DlDIo4Td4j', NULL, NULL, 'pending', '2025-03-29 08:01:22'),
(39, 1, 56029, 'order_QCX6tmxA4builL', 'pay_QCX7I9Jcd2rOHp', '0c94cb09c1b2fab496de81d2212026eb91f92ff3557315c18ce22d9f243de146', 'success', '2025-03-29 08:02:02'),
(40, 3, 19990, 'order_QDglhxIQXNB2u3', 'pay_QDgltYLuu2Y1DN', '8e1a36bf533bbc2058184b2a5fe26043720d4c967cabe32d39ffe1117b22b338', 'success', '2025-04-01 06:07:53'),
(41, 3, 1313, 'order_QDgoWvvlukF4ar', 'pay_QDgofdfQgj8d80', '42c336dd5264df45434248905c98a48cf1bd13225edac48d476959763d2d912f', 'success', '2025-04-01 06:10:34'),
(42, 4, 19990, 'order_QDp96yWXQHj9oV', NULL, NULL, 'pending', '2025-04-01 14:19:35'),
(43, 4, 19990, 'order_QDp9Tf1u5i8cqb', NULL, NULL, 'pending', '2025-04-01 14:19:57'),
(44, 4, 19990, 'order_QE64jpity6i3IV', NULL, NULL, 'pending', '2025-04-02 06:53:14'),
(45, 3, 19990, 'order_QE7Wo9MTCVxHu5', NULL, NULL, 'pending', '2025-04-02 08:18:30'),
(46, 4, 76019, 'order_QLwr33c24VKDK0', 'pay_QLwsEEDt6kXtsz', 'f904b5372f4cc9f6ae592c6d4b7fd1930da3d01c419214eee598347dddf08404', 'success', '2025-04-22 03:04:00');

-- --------------------------------------------------------

--
-- Table structure for table `ResivedPayment`
--

CREATE TABLE `ResivedPayment` (
  `SNo` int(11) NOT NULL,
  `OrdersSNo` int(11) NOT NULL,
  `UserSNo` int(11) NOT NULL,
  `RazorpayPaymentId` varchar(100) NOT NULL,
  `RazorpayOrderId` varchar(100) DEFAULT NULL,
  `RazorpaySignature` varchar(100) DEFAULT NULL,
  `PaymentStatus` enum('Pending','Failed','Recieved') NOT NULL,
  `Date` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `Seller`
--

CREATE TABLE `Seller` (
  `SNo` int(11) NOT NULL,
  `UserSNo` int(11) NOT NULL,
  `ShopName` varchar(30) NOT NULL,
  `ShopPinCode` int(11) NOT NULL,
  `ShopFullAddress` varchar(200) NOT NULL,
  `ShopMobileNo` bigint(12) NOT NULL,
  `ShopEmail` varchar(25) NOT NULL,
  `GSTNo` varchar(20) NOT NULL,
  `BankAccountNo` bigint(20) NOT NULL,
  `IFSCCode` varchar(15) NOT NULL,
  `AadharNo` bigint(15) NOT NULL,
  `SellInlast7Days` int(11) NOT NULL,
  `SellInlast30Days` int(11) NOT NULL,
  `SellInlast365Days` int(11) NOT NULL,
  `Date` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `Seller`
--

INSERT INTO `Seller` (`SNo`, `UserSNo`, `ShopName`, `ShopPinCode`, `ShopFullAddress`, `ShopMobileNo`, `ShopEmail`, `GSTNo`, `BankAccountNo`, `IFSCCode`, `AadharNo`, `SellInlast7Days`, `SellInlast30Days`, `SellInlast365Days`, `Date`) VALUES
(1, 1, 'RahulKrRKN', 812001, 'Barari,Bhagalpur', 8877788288, 'rahulkrrkn@gmail.com', '', 0, '', 0, 0, 0, 0, '2025-03-23 01:25:05'),
(2, 3, 'Anuj', 812001, 'Barari,BGP', 8877788288, 'rahulkrrkn@gmail2.com', '', 0, '', 0, 0, 0, 0, '2025-03-25 08:51:56'),
(3, 4, 'Anupam Enterprises', 812002, 'Sarai Road, Bgp', 8877788288, 'rahulkrrkn@gmail3.com', '', 0, '', 0, 0, 0, 0, '2025-03-26 11:51:01');

-- --------------------------------------------------------

--
-- Table structure for table `Support`
--

CREATE TABLE `Support` (
  `SNo` int(11) NOT NULL,
  `UserSNo` int(11) NOT NULL,
  `AadharNo` bigint(20) NOT NULL,
  `Verification` enum('Pending','Verified','Blocked') NOT NULL,
  `Date` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `Support`
--

INSERT INTO `Support` (`SNo`, `UserSNo`, `AadharNo`, `Verification`, `Date`) VALUES
(1, 1, 0, 'Verified', '2025-03-23 01:25:27');

-- --------------------------------------------------------

--
-- Table structure for table `User`
--

CREATE TABLE `User` (
  `SNo` int(11) NOT NULL,
  `EmailID` varchar(50) NOT NULL,
  `MobileNo` bigint(12) DEFAULT NULL,
  `FName` varchar(10) DEFAULT NULL,
  `LName` varchar(10) DEFAULT NULL,
  `ProfilePhoto` varchar(100) DEFAULT NULL,
  `DOB` date DEFAULT NULL,
  `Password` varchar(30) DEFAULT NULL,
  `Gender` enum('Male','Female','Other') DEFAULT NULL,
  `Date` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `User`
--

INSERT INTO `User` (`SNo`, `EmailID`, `MobileNo`, `FName`, `LName`, `ProfilePhoto`, `DOB`, `Password`, `Gender`, `Date`) VALUES
(1, 'rahulkrrkn@gmail.com', 8877788288, NULL, NULL, NULL, NULL, 'RahulKrRKN2', NULL, '2025-03-23 01:21:02'),
(2, 'amitxx2002@gmail.com', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2025-03-24 15:18:38'),
(3, 'anujkumarak30112345@gmail.com', NULL, 'Anuj', 'aryan', 'https://lh3.googleusercontent.com/a/ACg8ocLH65EvZc6jyqA5lwCnpmrPViHxfv-FJ-vRfyI98v8FuyN99l8=s96-c', '2006-11-01', 'Anujkr@123', 'Male', '2025-03-25 05:51:27'),
(4, 'anupambrti@gmail.com', NULL, 'Rahul', 'Kumar', '0004_Rahul_20250422_030834.jpg', '2006-05-15', 'Anupam@cartify', 'Male', '2025-03-26 11:42:12'),
(5, 'nickykumarrahul@gmail.com', NULL, '', '', 'https://lh3.googleusercontent.com/a/ACg8ocL6cpdkp-GZ71O3pe5Vb1OB1eGVMEr7V0iAC2kOfDrciqZsvD_3=s96-c', NULL, NULL, NULL, '2025-04-02 07:37:45');

-- --------------------------------------------------------

--
-- Table structure for table `whatsapp_api`
--

CREATE TABLE `whatsapp_api` (
  `sNo` int(11) NOT NULL,
  `templateName` varchar(50) NOT NULL,
  `mobileNo` varchar(15) NOT NULL,
  `response` text NOT NULL,
  `responseId` varchar(500) DEFAULT NULL,
  `responseStatus` enum('success','error') NOT NULL,
  `date` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `whatsapp_api`
--

INSERT INTO `whatsapp_api` (`sNo`, `templateName`, `mobileNo`, `response`, `responseId`, `responseStatus`, `date`) VALUES
(1, 'cartify_otp_1', '8877788288', '{\"error\":{\"message\":\"(#132001) Template name does not exist in the translation\",\"type\":\"OAuthException\",\"code\":132001,\"error_data\":{\"messaging_product\":\"whatsapp\",\"details\":\"template name (cartify_otp_1) does not exist in en_US\"},\"fbtrace_id\":\"AWlfzeNMbu1giH7cCkgI3OF\"}}', NULL, 'error', '2025-03-23 01:21:51'),
(2, 'cartify_otp_1', '8877788288', '{\"error\":{\"message\":\"(#132001) Template name does not exist in the translation\",\"type\":\"OAuthException\",\"code\":132001,\"error_data\":{\"messaging_product\":\"whatsapp\",\"details\":\"template name (cartify_otp_1) does not exist in en_US\"},\"fbtrace_id\":\"AmzlggA1BXWAN_wV79vGbRI\"}}', NULL, 'error', '2025-03-23 01:22:08'),
(3, 'cartify_otp_1', '8875588288', '{\"messaging_product\":\"whatsapp\",\"contacts\":[{\"input\":\"918875588288\",\"wa_id\":\"918875588288\"}],\"messages\":[{\"id\":\"wamid.HBgMOTE4ODc1NTg4Mjg4FQIAERgSQjczM0QwOTAwMTAzM0UxOEQzAA==\",\"message_status\":\"accepted\"}]}', 'wamid.HBgMOTE4ODc1NTg4Mjg4FQIAERgSQjczM0QwOTAwMTAzM0UxOEQzAA==', 'success', '2025-03-23 01:29:56'),
(4, 'cartify_otp_1', '8877788288', '{\"messaging_product\":\"whatsapp\",\"contacts\":[{\"input\":\"918877788288\",\"wa_id\":\"918877788288\"}],\"messages\":[{\"id\":\"wamid.HBgMOTE4ODc3Nzg4Mjg4FQIAERgSOEVCNDhDMTIxREJDODQ0Qjc1AA==\",\"message_status\":\"accepted\"}]}', 'wamid.HBgMOTE4ODc3Nzg4Mjg4FQIAERgSOEVCNDhDMTIxREJDODQ0Qjc1AA==', 'success', '2025-03-23 01:30:55'),
(5, 'cartify_otp_1', '8544338749', '{\"messaging_product\":\"whatsapp\",\"contacts\":[{\"input\":\"918544338749\",\"wa_id\":\"918544338749\"}],\"messages\":[{\"id\":\"wamid.HBgMOTE4NTQ0MzM4NzQ5FQIAERgSMTlENjk4OTkxN0M3NTZGNzJDAA==\",\"message_status\":\"accepted\"}]}', 'wamid.HBgMOTE4NTQ0MzM4NzQ5FQIAERgSMTlENjk4OTkxN0M3NTZGNzJDAA==', 'success', '2025-03-25 05:52:43'),
(6, 'cartify_otp_1', '8877788288', '{\"error\":{\"message\":\"The token has expired on Monday, 31-Mar-25 05:30:10 PDT. The current time is Monday, 31-Mar-25 23:43:50 PDT.\",\"type\":\"OAuthException\",\"code\":190,\"fbtrace_id\":\"AIznxV-UrVVzxal1MIpapWu\"}}', NULL, 'error', '2025-04-01 06:43:37'),
(7, 'cartify_otp_1', '8877788288', '{\"error\":{\"message\":\"The token has expired on Monday, 31-Mar-25 05:30:10 PDT. The current time is Monday, 31-Mar-25 23:44:41 PDT.\",\"type\":\"OAuthException\",\"code\":190,\"fbtrace_id\":\"AjLyxdqcSkIkCUb0xlePtU5\"}}', NULL, 'error', '2025-04-01 06:44:26'),
(8, 'cartify_otp_1', '8877788288', '{\"error\":{\"message\":\"The token has expired on Monday, 31-Mar-25 05:30:10 PDT. The current time is Monday, 31-Mar-25 23:46:42 PDT.\",\"type\":\"OAuthException\",\"code\":190,\"fbtrace_id\":\"AU47YpNV_o-8r_P3OFYsCbj\"}}', NULL, 'error', '2025-04-01 06:46:27'),
(9, 'cartify_otp_1', '8875588288', '{\"error\":{\"message\":\"The token has expired on Monday, 31-Mar-25 05:30:10 PDT. The current time is Monday, 31-Mar-25 23:48:11 PDT.\",\"type\":\"OAuthException\",\"code\":190,\"fbtrace_id\":\"A11lXo-TcIl9Mg1uDEIfyud\"}}', NULL, 'error', '2025-04-01 06:47:56'),
(10, 'cartify_otp_1', '8877788288', '{\"error\":{\"message\":\"The token has expired on Monday, 31-Mar-25 05:30:10 PDT. The current time is Monday, 31-Mar-25 23:48:18 PDT.\",\"type\":\"OAuthException\",\"code\":190,\"fbtrace_id\":\"AGJkrTe46fMtvMJP-m2mif0\"}}', NULL, 'error', '2025-04-01 06:48:03'),
(11, 'cartify_otp_1', '8877788288', '{\"error\":{\"message\":\"The token has expired on Monday, 31-Mar-25 05:30:10 PDT. The current time is Monday, 31-Mar-25 23:49:24 PDT.\",\"type\":\"OAuthException\",\"code\":190,\"fbtrace_id\":\"AKLzHnT0iGof1EXATQWnpcX\"}}', NULL, 'error', '2025-04-01 06:49:10'),
(12, 'cartify_otp_1', '8877788288', '{\"error\":{\"message\":\"The token has expired on Monday, 31-Mar-25 05:30:10 PDT. The current time is Monday, 31-Mar-25 23:49:42 PDT.\",\"type\":\"OAuthException\",\"code\":190,\"fbtrace_id\":\"Ae1OeItSMYlLrXOpv6g3v-e\"}}', NULL, 'error', '2025-04-01 06:49:28'),
(13, 'cartify_otp_1', '8877788288', '{\"error\":{\"message\":\"(#132001) Template name does not exist in the translation\",\"type\":\"OAuthException\",\"code\":132001,\"error_data\":{\"messaging_product\":\"whatsapp\",\"details\":\"template name (cartify_otp_1) does not exist in en_US\"},\"fbtrace_id\":\"AjatxB_XEh6FCleBaaEs4SH\"}}', NULL, 'error', '2025-04-01 06:59:21'),
(14, 'cartify_otp_1', '8877788288', '{\"messaging_product\":\"whatsapp\",\"contacts\":[{\"input\":\"918877788288\",\"wa_id\":\"918877788288\"}],\"messages\":[{\"id\":\"wamid.HBgMOTE4ODc3Nzg4Mjg4FQIAERgSMkUwRjM5NEM1RTBEOTk2QTE2AA==\",\"message_status\":\"accepted\"}]}', 'wamid.HBgMOTE4ODc3Nzg4Mjg4FQIAERgSMkUwRjM5NEM1RTBEOTk2QTE2AA==', 'success', '2025-04-01 07:03:33'),
(15, 'cartify_otp_1', '8877788288', '{\"messaging_product\":\"whatsapp\",\"contacts\":[{\"input\":\"918877788288\",\"wa_id\":\"918877788288\"}],\"messages\":[{\"id\":\"wamid.HBgMOTE4ODc3Nzg4Mjg4FQIAERgSOEIyN0ZENDFGOEQzODgzOUFEAA==\",\"message_status\":\"accepted\"}]}', 'wamid.HBgMOTE4ODc3Nzg4Mjg4FQIAERgSOEIyN0ZENDFGOEQzODgzOUFEAA==', 'success', '2025-04-01 07:06:04'),
(16, 'cartify_otp_1', '8877788288', '{\"messaging_product\":\"whatsapp\",\"contacts\":[{\"input\":\"918877788288\",\"wa_id\":\"918877788288\"}],\"messages\":[{\"id\":\"wamid.HBgMOTE4ODc3Nzg4Mjg4FQIAERgSQzIxMzM4OTYwOTcyNkFBN0FGAA==\",\"message_status\":\"accepted\"}]}', 'wamid.HBgMOTE4ODc3Nzg4Mjg4FQIAERgSQzIxMzM4OTYwOTcyNkFBN0FGAA==', 'success', '2025-04-09 03:52:31');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `Address`
--
ALTER TABLE `Address`
  ADD PRIMARY KEY (`SNo`),
  ADD KEY `UserSNo` (`UserSNo`);

--
-- Indexes for table `Admin`
--
ALTER TABLE `Admin`
  ADD PRIMARY KEY (`SNo`),
  ADD KEY `UsersSNo` (`UserSNo`);

--
-- Indexes for table `Cart`
--
ALTER TABLE `Cart`
  ADD PRIMARY KEY (`SNo`),
  ADD KEY `UserSNo` (`UserSNo`),
  ADD KEY `SubProductSNo` (`ProductVariantSNo`);

--
-- Indexes for table `Complaint`
--
ALTER TABLE `Complaint`
  ADD PRIMARY KEY (`SNo`),
  ADD KEY `UserSNoSendBy` (`UserSNoSendBy`),
  ADD KEY `UserSNoSolveBy` (`UserSNoSolveBy`);

--
-- Indexes for table `DescriptionData`
--
ALTER TABLE `DescriptionData`
  ADD PRIMARY KEY (`SNo`);

--
-- Indexes for table `Favourite`
--
ALTER TABLE `Favourite`
  ADD PRIMARY KEY (`SNo`),
  ADD KEY `UserSNo` (`UserSNo`),
  ADD KEY `SubProductSNo` (`ProductVariantSNo`);

--
-- Indexes for table `OrderItems`
--
ALTER TABLE `OrderItems`
  ADD PRIMARY KEY (`SNo`),
  ADD KEY `OrdersSNo` (`OrdersSNo`),
  ADD KEY `ProductVariantsSNo` (`ProductVariantsSNo`);

--
-- Indexes for table `Orders`
--
ALTER TABLE `Orders`
  ADD PRIMARY KEY (`SNo`),
  ADD KEY `UserSNo` (`UserSNo`),
  ADD KEY `AddressSNo` (`AddressSNo`),
  ADD KEY `PaymentSNo` (`ResivedPaymentSNo`);

--
-- Indexes for table `ProductAttribute`
--
ALTER TABLE `ProductAttribute`
  ADD PRIMARY KEY (`SNo`);

--
-- Indexes for table `ProductCategory`
--
ALTER TABLE `ProductCategory`
  ADD PRIMARY KEY (`SNo`),
  ADD KEY `UserSNoAddedBy` (`UserSNoAddedBy`),
  ADD KEY `Category_ibfk_2` (`UserSNoApprovedBy`),
  ADD KEY `Attribute_fk1` (`Attribute1`),
  ADD KEY `Attribute_fk2` (`Attribute2`),
  ADD KEY `Attribute_fk3` (`Attribute3`),
  ADD KEY `Attribute_fk4` (`Attribute4`),
  ADD KEY `Attribute_fk5` (`Attribute5`),
  ADD KEY `Attribute_fk6` (`Attribute6`),
  ADD KEY `Attribute_fk7` (`Attribute7`),
  ADD KEY `Attribute_fk8` (`Attribute8`),
  ADD KEY `Attribute_fk9` (`Attribute9`),
  ADD KEY `Attribute_fk10` (`Attribute10`),
  ADD KEY `Attribute_fk11` (`Attribute11`),
  ADD KEY `Attribute_fk12` (`Attribute12`),
  ADD KEY `Attribute_fk13` (`Attribute13`),
  ADD KEY `Attribute_fk14` (`Attribute14`),
  ADD KEY `Attribute_fk15` (`Attribute15`),
  ADD KEY `DescriptionData_fk1` (`AlreadySetInDescription1`),
  ADD KEY `DescriptionData_fk2` (`AlreadySetInDescription2`),
  ADD KEY `DescriptionData_fk3` (`AlreadySetInDescription3`),
  ADD KEY `DescriptionData_fk4` (`AlreadySetInDescription4`),
  ADD KEY `DescriptionData_fk5` (`AlreadySetInDescription5`),
  ADD KEY `DescriptionData_fk6` (`AlreadySetInDescription6`),
  ADD KEY `DescriptionData_fk7` (`AlreadySetInDescription7`),
  ADD KEY `DescriptionData_fk8` (`AlreadySetInDescription8`),
  ADD KEY `DescriptionData_fk9` (`AlreadySetInDescription9`),
  ADD KEY `DescriptionData_fk10` (`AlreadySetInDescription10`),
  ADD KEY `DescriptionData_fk11` (`AlreadySetInDescription11`),
  ADD KEY `DescriptionData_fk12` (`AlreadySetInDescription12`),
  ADD KEY `DescriptionData_fk13` (`AlreadySetInDescription13`),
  ADD KEY `DescriptionData_fk14` (`AlreadySetInDescription14`),
  ADD KEY `DescriptionData_fk15` (`AlreadySetInDescription15`),
  ADD KEY `DescriptionData_fk16` (`AlreadySetInDescription16`),
  ADD KEY `DescriptionData_fk17` (`AlreadySetInDescription17`),
  ADD KEY `DescriptionData_fk18` (`AlreadySetInDescription18`),
  ADD KEY `DescriptionData_fk19` (`AlreadySetInDescription19`),
  ADD KEY `DescriptionData_fk20` (`AlreadySetInDescription20`),
  ADD KEY `DescriptionData_fk21` (`AlreadySetInDescription21`),
  ADD KEY `DescriptionData_fk22` (`AlreadySetInDescription22`),
  ADD KEY `DescriptionData_fk23` (`AlreadySetInDescription23`),
  ADD KEY `DescriptionData_fk24` (`AlreadySetInDescription24`),
  ADD KEY `DescriptionData_fk25` (`AlreadySetInDescription25`),
  ADD KEY `DescriptionData_fk26` (`AlreadySetInDescription26`),
  ADD KEY `DescriptionData_fk27` (`AlreadySetInDescription27`),
  ADD KEY `DescriptionData_fk28` (`AlreadySetInDescription28`),
  ADD KEY `DescriptionData_fk29` (`AlreadySetInDescription29`),
  ADD KEY `DescriptionData_fk30` (`AlreadySetInDescription30`),
  ADD KEY `DescriptionData_fk31` (`AlreadySetInDescription31`),
  ADD KEY `DescriptionData_fk32` (`AlreadySetInDescription32`),
  ADD KEY `DescriptionData_fk33` (`AlreadySetInDescription33`),
  ADD KEY `DescriptionData_fk34` (`AlreadySetInDescription34`),
  ADD KEY `DescriptionData_fk35` (`AlreadySetInDescription35`),
  ADD KEY `DescriptionData_fk36` (`AlreadySetInDescription36`),
  ADD KEY `DescriptionData_fk37` (`AlreadySetInDescription37`),
  ADD KEY `DescriptionData_fk38` (`AlreadySetInDescription38`),
  ADD KEY `DescriptionData_fk39` (`AlreadySetInDescription39`),
  ADD KEY `DescriptionData_fk40` (`AlreadySetInDescription40`);

--
-- Indexes for table `ProductList`
--
ALTER TABLE `ProductList`
  ADD PRIMARY KEY (`SNo`),
  ADD KEY `UserSNo` (`UserSNo`),
  ADD KEY `Product_ibfk_4` (`CategorySNo`),
  ADD KEY `VaritySelection1` (`VaritySelectionSNo1`),
  ADD KEY `VaritySelection2` (`VaritySelectionSNo2`),
  ADD KEY `VaritySelection3` (`VaritySelectionSNo3`);

--
-- Indexes for table `ProductNewStocksDetail`
--
ALTER TABLE `ProductNewStocksDetail`
  ADD PRIMARY KEY (`SNo`),
  ADD KEY `ProductSNo` (`ProductListSNo`),
  ADD KEY `VaritySNo` (`ProductVariantsSNo`);

--
-- Indexes for table `ProductVariants`
--
ALTER TABLE `ProductVariants`
  ADD PRIMARY KEY (`SNo`),
  ADD KEY `ProductSNo` (`ProductSNo`);

--
-- Indexes for table `razorPay`
--
ALTER TABLE `razorPay`
  ADD PRIMARY KEY (`SNo`);

--
-- Indexes for table `ResivedPayment`
--
ALTER TABLE `ResivedPayment`
  ADD PRIMARY KEY (`SNo`),
  ADD KEY `UserSNo` (`UserSNo`),
  ADD KEY `OrderSNo` (`OrdersSNo`);

--
-- Indexes for table `Seller`
--
ALTER TABLE `Seller`
  ADD PRIMARY KEY (`SNo`),
  ADD KEY `UserSNo` (`UserSNo`);

--
-- Indexes for table `Support`
--
ALTER TABLE `Support`
  ADD PRIMARY KEY (`SNo`),
  ADD KEY `UserSNo` (`UserSNo`);

--
-- Indexes for table `User`
--
ALTER TABLE `User`
  ADD PRIMARY KEY (`SNo`),
  ADD UNIQUE KEY `EmailID` (`EmailID`,`MobileNo`);

--
-- Indexes for table `whatsapp_api`
--
ALTER TABLE `whatsapp_api`
  ADD PRIMARY KEY (`sNo`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `Address`
--
ALTER TABLE `Address`
  MODIFY `SNo` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `Admin`
--
ALTER TABLE `Admin`
  MODIFY `SNo` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `Cart`
--
ALTER TABLE `Cart`
  MODIFY `SNo` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=101;

--
-- AUTO_INCREMENT for table `Complaint`
--
ALTER TABLE `Complaint`
  MODIFY `SNo` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `DescriptionData`
--
ALTER TABLE `DescriptionData`
  MODIFY `SNo` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `Favourite`
--
ALTER TABLE `Favourite`
  MODIFY `SNo` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT for table `OrderItems`
--
ALTER TABLE `OrderItems`
  MODIFY `SNo` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT for table `Orders`
--
ALTER TABLE `Orders`
  MODIFY `SNo` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `ProductAttribute`
--
ALTER TABLE `ProductAttribute`
  MODIFY `SNo` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `ProductCategory`
--
ALTER TABLE `ProductCategory`
  MODIFY `SNo` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `ProductList`
--
ALTER TABLE `ProductList`
  MODIFY `SNo` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT for table `ProductNewStocksDetail`
--
ALTER TABLE `ProductNewStocksDetail`
  MODIFY `SNo` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;

--
-- AUTO_INCREMENT for table `ProductVariants`
--
ALTER TABLE `ProductVariants`
  MODIFY `SNo` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;

--
-- AUTO_INCREMENT for table `razorPay`
--
ALTER TABLE `razorPay`
  MODIFY `SNo` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=47;

--
-- AUTO_INCREMENT for table `ResivedPayment`
--
ALTER TABLE `ResivedPayment`
  MODIFY `SNo` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `Seller`
--
ALTER TABLE `Seller`
  MODIFY `SNo` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `Support`
--
ALTER TABLE `Support`
  MODIFY `SNo` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `User`
--
ALTER TABLE `User`
  MODIFY `SNo` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `whatsapp_api`
--
ALTER TABLE `whatsapp_api`
  MODIFY `sNo` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `Address`
--
ALTER TABLE `Address`
  ADD CONSTRAINT `Address_ibfk_1` FOREIGN KEY (`UserSNo`) REFERENCES `User` (`SNo`);

--
-- Constraints for table `Admin`
--
ALTER TABLE `Admin`
  ADD CONSTRAINT `Admin_ibfk_1` FOREIGN KEY (`UserSNo`) REFERENCES `User` (`SNo`);

--
-- Constraints for table `Cart`
--
ALTER TABLE `Cart`
  ADD CONSTRAINT `Cart_ibfk_1` FOREIGN KEY (`UserSNo`) REFERENCES `User` (`SNo`),
  ADD CONSTRAINT `Cart_ibfk_2` FOREIGN KEY (`ProductVariantSNo`) REFERENCES `ProductVariants` (`SNo`);

--
-- Constraints for table `Complaint`
--
ALTER TABLE `Complaint`
  ADD CONSTRAINT `Complaint_ibfk_1` FOREIGN KEY (`UserSNoSendBy`) REFERENCES `User` (`SNo`),
  ADD CONSTRAINT `Complaint_ibfk_2` FOREIGN KEY (`UserSNoSolveBy`) REFERENCES `User` (`SNo`);

--
-- Constraints for table `Favourite`
--
ALTER TABLE `Favourite`
  ADD CONSTRAINT `Favourite_ibfk_1` FOREIGN KEY (`UserSNo`) REFERENCES `User` (`SNo`),
  ADD CONSTRAINT `Favourite_ibfk_2` FOREIGN KEY (`ProductVariantSNo`) REFERENCES `ProductVariants` (`SNo`);

--
-- Constraints for table `OrderItems`
--
ALTER TABLE `OrderItems`
  ADD CONSTRAINT `OrderItems_ibfk_2` FOREIGN KEY (`OrdersSNo`) REFERENCES `Orders` (`SNo`),
  ADD CONSTRAINT `OrderItems_ibfk_4` FOREIGN KEY (`ProductVariantsSNo`) REFERENCES `ProductVariants` (`SNo`);

--
-- Constraints for table `Orders`
--
ALTER TABLE `Orders`
  ADD CONSTRAINT `Orders_ibfk_1` FOREIGN KEY (`UserSNo`) REFERENCES `User` (`SNo`),
  ADD CONSTRAINT `Orders_ibfk_3` FOREIGN KEY (`AddressSNo`) REFERENCES `Address` (`SNo`);

--
-- Constraints for table `ProductCategory`
--
ALTER TABLE `ProductCategory`
  ADD CONSTRAINT `Attribute_fk1` FOREIGN KEY (`Attribute1`) REFERENCES `ProductAttribute` (`SNo`),
  ADD CONSTRAINT `Attribute_fk10` FOREIGN KEY (`Attribute10`) REFERENCES `ProductAttribute` (`SNo`),
  ADD CONSTRAINT `Attribute_fk11` FOREIGN KEY (`Attribute11`) REFERENCES `ProductAttribute` (`SNo`),
  ADD CONSTRAINT `Attribute_fk12` FOREIGN KEY (`Attribute12`) REFERENCES `ProductAttribute` (`SNo`),
  ADD CONSTRAINT `Attribute_fk13` FOREIGN KEY (`Attribute13`) REFERENCES `ProductAttribute` (`SNo`),
  ADD CONSTRAINT `Attribute_fk14` FOREIGN KEY (`Attribute14`) REFERENCES `ProductAttribute` (`SNo`),
  ADD CONSTRAINT `Attribute_fk15` FOREIGN KEY (`Attribute15`) REFERENCES `ProductAttribute` (`SNo`),
  ADD CONSTRAINT `Attribute_fk2` FOREIGN KEY (`Attribute2`) REFERENCES `ProductAttribute` (`SNo`),
  ADD CONSTRAINT `Attribute_fk3` FOREIGN KEY (`Attribute3`) REFERENCES `ProductAttribute` (`SNo`),
  ADD CONSTRAINT `Attribute_fk4` FOREIGN KEY (`Attribute4`) REFERENCES `ProductAttribute` (`SNo`),
  ADD CONSTRAINT `Attribute_fk5` FOREIGN KEY (`Attribute5`) REFERENCES `ProductAttribute` (`SNo`),
  ADD CONSTRAINT `Attribute_fk6` FOREIGN KEY (`Attribute6`) REFERENCES `ProductAttribute` (`SNo`),
  ADD CONSTRAINT `Attribute_fk7` FOREIGN KEY (`Attribute7`) REFERENCES `ProductAttribute` (`SNo`),
  ADD CONSTRAINT `Attribute_fk8` FOREIGN KEY (`Attribute8`) REFERENCES `ProductAttribute` (`SNo`),
  ADD CONSTRAINT `Attribute_fk9` FOREIGN KEY (`Attribute9`) REFERENCES `ProductAttribute` (`SNo`),
  ADD CONSTRAINT `DescriptionData_fk1` FOREIGN KEY (`AlreadySetInDescription1`) REFERENCES `DescriptionData` (`SNo`),
  ADD CONSTRAINT `DescriptionData_fk10` FOREIGN KEY (`AlreadySetInDescription10`) REFERENCES `DescriptionData` (`SNo`),
  ADD CONSTRAINT `DescriptionData_fk11` FOREIGN KEY (`AlreadySetInDescription11`) REFERENCES `DescriptionData` (`SNo`),
  ADD CONSTRAINT `DescriptionData_fk12` FOREIGN KEY (`AlreadySetInDescription12`) REFERENCES `DescriptionData` (`SNo`),
  ADD CONSTRAINT `DescriptionData_fk13` FOREIGN KEY (`AlreadySetInDescription13`) REFERENCES `DescriptionData` (`SNo`),
  ADD CONSTRAINT `DescriptionData_fk14` FOREIGN KEY (`AlreadySetInDescription14`) REFERENCES `DescriptionData` (`SNo`),
  ADD CONSTRAINT `DescriptionData_fk15` FOREIGN KEY (`AlreadySetInDescription15`) REFERENCES `DescriptionData` (`SNo`),
  ADD CONSTRAINT `DescriptionData_fk16` FOREIGN KEY (`AlreadySetInDescription16`) REFERENCES `DescriptionData` (`SNo`),
  ADD CONSTRAINT `DescriptionData_fk17` FOREIGN KEY (`AlreadySetInDescription17`) REFERENCES `DescriptionData` (`SNo`),
  ADD CONSTRAINT `DescriptionData_fk18` FOREIGN KEY (`AlreadySetInDescription18`) REFERENCES `DescriptionData` (`SNo`),
  ADD CONSTRAINT `DescriptionData_fk19` FOREIGN KEY (`AlreadySetInDescription19`) REFERENCES `DescriptionData` (`SNo`),
  ADD CONSTRAINT `DescriptionData_fk2` FOREIGN KEY (`AlreadySetInDescription2`) REFERENCES `DescriptionData` (`SNo`),
  ADD CONSTRAINT `DescriptionData_fk20` FOREIGN KEY (`AlreadySetInDescription20`) REFERENCES `DescriptionData` (`SNo`),
  ADD CONSTRAINT `DescriptionData_fk21` FOREIGN KEY (`AlreadySetInDescription21`) REFERENCES `DescriptionData` (`SNo`),
  ADD CONSTRAINT `DescriptionData_fk22` FOREIGN KEY (`AlreadySetInDescription22`) REFERENCES `DescriptionData` (`SNo`),
  ADD CONSTRAINT `DescriptionData_fk23` FOREIGN KEY (`AlreadySetInDescription23`) REFERENCES `DescriptionData` (`SNo`),
  ADD CONSTRAINT `DescriptionData_fk24` FOREIGN KEY (`AlreadySetInDescription24`) REFERENCES `DescriptionData` (`SNo`),
  ADD CONSTRAINT `DescriptionData_fk25` FOREIGN KEY (`AlreadySetInDescription25`) REFERENCES `DescriptionData` (`SNo`),
  ADD CONSTRAINT `DescriptionData_fk26` FOREIGN KEY (`AlreadySetInDescription26`) REFERENCES `DescriptionData` (`SNo`),
  ADD CONSTRAINT `DescriptionData_fk27` FOREIGN KEY (`AlreadySetInDescription27`) REFERENCES `DescriptionData` (`SNo`),
  ADD CONSTRAINT `DescriptionData_fk28` FOREIGN KEY (`AlreadySetInDescription28`) REFERENCES `DescriptionData` (`SNo`),
  ADD CONSTRAINT `DescriptionData_fk29` FOREIGN KEY (`AlreadySetInDescription29`) REFERENCES `DescriptionData` (`SNo`),
  ADD CONSTRAINT `DescriptionData_fk3` FOREIGN KEY (`AlreadySetInDescription3`) REFERENCES `DescriptionData` (`SNo`),
  ADD CONSTRAINT `DescriptionData_fk30` FOREIGN KEY (`AlreadySetInDescription30`) REFERENCES `DescriptionData` (`SNo`),
  ADD CONSTRAINT `DescriptionData_fk31` FOREIGN KEY (`AlreadySetInDescription31`) REFERENCES `DescriptionData` (`SNo`),
  ADD CONSTRAINT `DescriptionData_fk32` FOREIGN KEY (`AlreadySetInDescription32`) REFERENCES `DescriptionData` (`SNo`),
  ADD CONSTRAINT `DescriptionData_fk33` FOREIGN KEY (`AlreadySetInDescription33`) REFERENCES `DescriptionData` (`SNo`),
  ADD CONSTRAINT `DescriptionData_fk34` FOREIGN KEY (`AlreadySetInDescription34`) REFERENCES `DescriptionData` (`SNo`),
  ADD CONSTRAINT `DescriptionData_fk35` FOREIGN KEY (`AlreadySetInDescription35`) REFERENCES `DescriptionData` (`SNo`),
  ADD CONSTRAINT `DescriptionData_fk36` FOREIGN KEY (`AlreadySetInDescription36`) REFERENCES `DescriptionData` (`SNo`),
  ADD CONSTRAINT `DescriptionData_fk37` FOREIGN KEY (`AlreadySetInDescription37`) REFERENCES `DescriptionData` (`SNo`),
  ADD CONSTRAINT `DescriptionData_fk38` FOREIGN KEY (`AlreadySetInDescription38`) REFERENCES `DescriptionData` (`SNo`),
  ADD CONSTRAINT `DescriptionData_fk39` FOREIGN KEY (`AlreadySetInDescription39`) REFERENCES `DescriptionData` (`SNo`),
  ADD CONSTRAINT `DescriptionData_fk4` FOREIGN KEY (`AlreadySetInDescription4`) REFERENCES `DescriptionData` (`SNo`),
  ADD CONSTRAINT `DescriptionData_fk40` FOREIGN KEY (`AlreadySetInDescription40`) REFERENCES `DescriptionData` (`SNo`),
  ADD CONSTRAINT `DescriptionData_fk5` FOREIGN KEY (`AlreadySetInDescription5`) REFERENCES `DescriptionData` (`SNo`),
  ADD CONSTRAINT `DescriptionData_fk6` FOREIGN KEY (`AlreadySetInDescription6`) REFERENCES `DescriptionData` (`SNo`),
  ADD CONSTRAINT `DescriptionData_fk7` FOREIGN KEY (`AlreadySetInDescription7`) REFERENCES `DescriptionData` (`SNo`),
  ADD CONSTRAINT `DescriptionData_fk8` FOREIGN KEY (`AlreadySetInDescription8`) REFERENCES `DescriptionData` (`SNo`),
  ADD CONSTRAINT `DescriptionData_fk9` FOREIGN KEY (`AlreadySetInDescription9`) REFERENCES `DescriptionData` (`SNo`),
  ADD CONSTRAINT `ProductCategory_ibfk_1` FOREIGN KEY (`UserSNoAddedBy`) REFERENCES `User` (`SNo`),
  ADD CONSTRAINT `ProductCategory_ibfk_2` FOREIGN KEY (`UserSNoApprovedBy`) REFERENCES `Support` (`SNo`);

--
-- Constraints for table `ProductList`
--
ALTER TABLE `ProductList`
  ADD CONSTRAINT `ProductList_ibfk_1` FOREIGN KEY (`UserSNo`) REFERENCES `User` (`SNo`),
  ADD CONSTRAINT `ProductList_ibfk_4` FOREIGN KEY (`CategorySNo`) REFERENCES `ProductCategory` (`SNo`),
  ADD CONSTRAINT `ProductList_ibfk_5` FOREIGN KEY (`VaritySelectionSNo1`) REFERENCES `ProductAttribute` (`SNo`),
  ADD CONSTRAINT `ProductList_ibfk_6` FOREIGN KEY (`VaritySelectionSNo2`) REFERENCES `ProductAttribute` (`SNo`),
  ADD CONSTRAINT `ProductList_ibfk_7` FOREIGN KEY (`VaritySelectionSNo3`) REFERENCES `ProductAttribute` (`SNo`);

--
-- Constraints for table `ProductNewStocksDetail`
--
ALTER TABLE `ProductNewStocksDetail`
  ADD CONSTRAINT `ProductNewStocksDetail_ibfk_1` FOREIGN KEY (`ProductListSNo`) REFERENCES `ProductList` (`SNo`),
  ADD CONSTRAINT `ProductNewStocksDetail_ibfk_2` FOREIGN KEY (`ProductVariantsSNo`) REFERENCES `ProductVariants` (`SNo`);

--
-- Constraints for table `ProductVariants`
--
ALTER TABLE `ProductVariants`
  ADD CONSTRAINT `ProductVariants_ibfk_1` FOREIGN KEY (`ProductSNo`) REFERENCES `ProductList` (`SNo`);

--
-- Constraints for table `ResivedPayment`
--
ALTER TABLE `ResivedPayment`
  ADD CONSTRAINT `ResivedPayment_ibfk_1` FOREIGN KEY (`UserSNo`) REFERENCES `User` (`SNo`),
  ADD CONSTRAINT `ResivedPayment_ibfk_2` FOREIGN KEY (`OrdersSNo`) REFERENCES `Orders` (`SNo`);

--
-- Constraints for table `Seller`
--
ALTER TABLE `Seller`
  ADD CONSTRAINT `Seller_ibfk_1` FOREIGN KEY (`UserSNo`) REFERENCES `User` (`SNo`);

--
-- Constraints for table `Support`
--
ALTER TABLE `Support`
  ADD CONSTRAINT `Support_ibfk_1` FOREIGN KEY (`UserSNo`) REFERENCES `User` (`SNo`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
