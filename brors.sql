-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 14, 2023 at 06:03 PM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `brors`
--

-- --------------------------------------------------------

--
-- Table structure for table `facilities`
--

CREATE TABLE `facilities` (
  `facility_id` int(11) NOT NULL,
  `facility_image` varchar(250) DEFAULT NULL,
  `facility_status` varchar(250) DEFAULT NULL,
  `facility_name` varchar(250) DEFAULT NULL,
  `facility_type` varchar(250) DEFAULT NULL,
  `facility_capacity` varchar(250) DEFAULT NULL,
  `facility_price` varchar(250) DEFAULT NULL,
  `img_1` varchar(250) DEFAULT NULL,
  `img_2` varchar(250) DEFAULT NULL,
  `img_3` varchar(250) DEFAULT NULL,
  `img_4` varchar(250) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `facilities`
--

INSERT INTO `facilities` (`facility_id`, `facility_image`, `facility_status`, `facility_name`, `facility_type`, `facility_capacity`, `facility_price`, `img_1`, `img_2`, `img_3`, `img_4`) VALUES
(16, 'facilities/IMG_20230615_132102_296.jpg', 'Available', 'Family Room 1', 'Room', '10', '5000', 'facilities/IMG_20230615_132036_040.jpg', 'facilities/IMG_20230615_132137_453.jpg', 'facilities/IMG_20230615_132151_564.jpg', 'facilities/IMG_20230615_132210_005.jpg'),
(17, 'facilities/IMG_20230615_140931_731.jpg', 'Available', 'Cottage 1', 'Cottage', '15', '1000', 'facilities/IMG_20230615_140955_971.jpg', 'facilities/IMG_20230615_141032_093.jpg', 'facilities/IMG_20230615_141131_922.jpg', 'facilities/IMG_20230615_141135_137.jpg'),
(18, 'facilities/IMG_20230615_134315_829.jpg', 'Available', 'Favillion Hall', 'Venue', '300', '50000', 'facilities/IMG_20230615_134356_347.jpg', 'facilities/IMG_20230615_134444_173.jpg', 'facilities/IMG_20230615_134459_393.jpg', 'facilities/IMG_20230615_134527_005.jpg'),
(19, 'facilities/IMG_20230615_130543_511.jpg', 'Available', 'Heritage 1', 'Room', '2', '3000', 'facilities/IMG_20230615_130616_106.jpg', 'facilities/IMG_20230615_130642_755.jpg', 'facilities/IMG_20230615_130706_971.jpg', 'facilities/IMG_20230615_130741_070.jpg'),
(20, 'facilities/IMG_20230615_141048_174.jpg', 'Available', 'Cottage 2', 'Cottage', '15', '1000', 'facilities/IMG_20230615_141107_953.jpg', 'facilities/IMG_20230615_141110_120.jpg', 'facilities/IMG_20230615_141126_611.jpg', 'facilities/IMG_20230615_141143_431.jpg'),
(21, 'facilities/IMG_20230615_135412_053.jpg', 'Available', 'Open Air Function Hall', 'Venue', '200', '25000', 'facilities/IMG_20230615_135421_029.jpg', 'facilities/IMG_20230615_135423_008.jpg', 'facilities/IMG_20230615_135457_633.jpg', 'facilities/IMG_20230615_135507_013.jpg'),
(22, 'facilities/IMG_20230615_131033_193.jpg', 'Available', 'Heritage 2', 'Room', '4', '6000', 'facilities/IMG_20230615_131049_262.jpg', 'facilities/IMG_20230615_131117_720.jpg', 'facilities/IMG_20230615_131149_706.jpg', 'facilities/IMG_20230615_131208_414.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `feedback`
--

CREATE TABLE `feedback` (
  `feedback_id` int(11) NOT NULL,
  `feedback_email` varchar(250) DEFAULT NULL,
  `feedback_comment` varchar(250) DEFAULT NULL,
  `feedback_date` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `feedback`
--

INSERT INTO `feedback` (`feedback_id`, `feedback_email`, `feedback_comment`, `feedback_date`) VALUES
(1, 'a@gmail.com', 'a@gmail.com', ''),
(2, 'a@gmail.com', 'dzgfsdfsdfsf', '23-07-04'),
(3, 'a@gmail.com', 'asfdasfasdcf', '23-07-04'),
(4, 'organism000@gmail.com', 'dsfsssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssss\r\ndsfsssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssss', '23-12-06');

-- --------------------------------------------------------

--
-- Table structure for table `gallery`
--

CREATE TABLE `gallery` (
  `gallery_id` int(11) NOT NULL,
  `gallery_status` varchar(250) DEFAULT NULL,
  `gallery_image` varchar(250) DEFAULT NULL,
  `gallery_name` varchar(250) DEFAULT NULL,
  `gallery_caption` varchar(250) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `gallery`
--

INSERT INTO `gallery` (`gallery_id`, `gallery_status`, `gallery_image`, `gallery_name`, `gallery_caption`) VALUES
(3, 'ACTIVE', 'gallery/atlas-mobile-legends-uhdpaper.com-4K-7.1379.jpg', ' atlas', ' xgxfgdf'),
(4, 'DISABLE', 'gallery/img001.jpg', '  xfc', '  cfdf');

-- --------------------------------------------------------

--
-- Table structure for table `gcash`
--

CREATE TABLE `gcash` (
  `gcash_id` int(11) NOT NULL,
  `gcash_image` varchar(250) DEFAULT NULL,
  `gcash_name` varchar(250) DEFAULT NULL,
  `gcash_number` varchar(250) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `gcash`
--

INSERT INTO `gcash` (`gcash_id`, `gcash_image`, `gcash_name`, `gcash_number`) VALUES
(4, 'gcash/Fast.PNG', '', '');

-- --------------------------------------------------------

--
-- Table structure for table `images`
--

CREATE TABLE `images` (
  `img_id` int(11) NOT NULL,
  `facility_id` int(11) DEFAULT NULL,
  `img` varchar(250) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `payment`
--

CREATE TABLE `payment` (
  `payment_id` int(11) NOT NULL,
  `reservation_id` int(11) DEFAULT NULL,
  `payment_status` varchar(250) DEFAULT NULL,
  `first_payment` varchar(250) DEFAULT NULL,
  `second_payment` varchar(250) DEFAULT NULL,
  `total_bills` varchar(250) DEFAULT NULL,
  `reservation_fee` varchar(250) DEFAULT NULL,
  `remaining_balance` varchar(250) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `payment`
--

INSERT INTO `payment` (`payment_id`, `reservation_id`, `payment_status`, `first_payment`, `second_payment`, `total_bills`, `reservation_fee`, `remaining_balance`) VALUES
(42, 55, 'For Approval', 'payment/img007.jpg', NULL, '5000', NULL, NULL),
(43, 56, 'For Approval', 'payment/img007.jpg', NULL, '5000', NULL, NULL),
(44, 57, 'Paid', 'payment/img001.jpg', NULL, '5000', '2500', '2500'),
(45, 58, 'Invalid Payment', 'payment/img007.jpg', NULL, '5000', NULL, NULL),
(46, 59, 'For Approval', 'payment/img001.jpg', NULL, '5000', NULL, NULL),
(47, 60, 'For Approval', 'payment/img007.jpg', NULL, '5000', NULL, NULL),
(48, 61, 'Paid', 'payment/img007.jpg', NULL, '1000', '500', '500');

-- --------------------------------------------------------

--
-- Table structure for table `reservation`
--

CREATE TABLE `reservation` (
  `reservation_id` int(11) NOT NULL,
  `facility_id` varchar(250) DEFAULT NULL,
  `facility_name` varchar(250) DEFAULT NULL,
  `facility_price` varchar(250) DEFAULT NULL,
  `reservation_status` varchar(250) DEFAULT NULL,
  `check_in` varchar(250) DEFAULT NULL,
  `check_out` varchar(250) DEFAULT NULL,
  `email` varchar(250) DEFAULT NULL,
  `mobile_number` varchar(250) DEFAULT NULL,
  `last_name` varchar(250) DEFAULT NULL,
  `first_name` varchar(250) DEFAULT NULL,
  `middle_name` varchar(250) DEFAULT NULL,
  `barangay` varchar(250) DEFAULT NULL,
  `city` varchar(250) DEFAULT NULL,
  `province` varchar(250) DEFAULT NULL,
  `total_guest` varchar(250) DEFAULT NULL,
  `remark` varchar(250) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `reservation`
--

INSERT INTO `reservation` (`reservation_id`, `facility_id`, `facility_name`, `facility_price`, `reservation_status`, `check_in`, `check_out`, `email`, `mobile_number`, `last_name`, `first_name`, `middle_name`, `barangay`, `city`, `province`, `total_guest`, `remark`) VALUES
(55, '16', 'Family Room 1', '5000', 'Cancelled', '2023-12-07', '2023-12-08', 'organism000@gmail.com', '56757676', 'nism', 'orga', 'vbh', 'vgbgf', 'calapn', 'bh', '7', 'voluntary cancelled'),
(56, '16', 'Family Room 1', '5000', 'Cancelled', '2023-12-07', '2023-12-08', 'organism000@gmail.com', '56757676', 'nism', 'orga', 'vbh', 'vgbgf', 'calapn', 'bh', '7', 'voluntary cancelled'),
(57, '16', 'Family Room 1', '5000', 'Cancelled', '2023-12-07', '2023-12-08', 'mendozajohneric467@gmail.com', '56757676', 'nism', 'orga', 'vbh', 'vgbgf', 'calapn', 'bh', '7', 'voluntary cancelled'),
(58, '16', 'Family Room 1', '5000', 'Invalid', '2023-12-07', '2023-12-08', 'mendozajohneric467@gmail.com', '56757676', 'nism', 'orga', 'vbh', 'vgbgf', 'calapn', 'bh', '7', NULL),
(59, '16', 'Family Room 1', '5000', 'Pending', '2023-12-10', '2023-12-11', 'organism000@gmail.com', '6546456', 'nism', 'orga', 'gfth', 'gf', 'calapn', 'gf', '56', NULL),
(60, '16', 'Family Room 1', '5000', 'Cancelled', '2023-12-13', '2023-12-14', 'organism000@gmail.com', '5443', 'nism', 'orga', 'dg', 'dg', 'calapn', 'xcfvd', '4', 'voluntary cancelled'),
(61, '17', 'Cottage 1', '1000', 'Reserved', '2023-12-11', '2023-12-12', 'sircedddie@gmail.com', '45645', 'Villegas', 'Cedrick', '.', 'guinobatan', 'Calapan City', 'oriental mindoro', '1', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `user_id` int(11) NOT NULL,
  `user_status` varchar(250) DEFAULT NULL,
  `name` varchar(250) DEFAULT NULL,
  `user_type` varchar(250) DEFAULT NULL,
  `user_name` varchar(250) DEFAULT NULL,
  `user_password` varchar(250) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`user_id`, `user_status`, `name`, `user_type`, `user_name`, `user_password`) VALUES
(1, 'ACTIVE', 'jhay marwin', 'Admin', 'admin', 'admin'),
(2, 'ACTIVE', 'Claudine', 'Cashier', 'cashier', 'cashier'),
(3, 'ACTIVE', 'jmvm', 'Admin', 'jhay', 'jhay'),
(4, 'ACTIVE', 'cashier', 'Cashier', 'cashiers', 'cashiers'),
(5, 'ACTIVE', 'noah', 'Receptionist', 'receptionist', 'receptionist');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `facilities`
--
ALTER TABLE `facilities`
  ADD PRIMARY KEY (`facility_id`);

--
-- Indexes for table `feedback`
--
ALTER TABLE `feedback`
  ADD PRIMARY KEY (`feedback_id`);

--
-- Indexes for table `gallery`
--
ALTER TABLE `gallery`
  ADD PRIMARY KEY (`gallery_id`);

--
-- Indexes for table `gcash`
--
ALTER TABLE `gcash`
  ADD PRIMARY KEY (`gcash_id`);

--
-- Indexes for table `images`
--
ALTER TABLE `images`
  ADD PRIMARY KEY (`img_id`);

--
-- Indexes for table `payment`
--
ALTER TABLE `payment`
  ADD PRIMARY KEY (`payment_id`);

--
-- Indexes for table `reservation`
--
ALTER TABLE `reservation`
  ADD PRIMARY KEY (`reservation_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `facilities`
--
ALTER TABLE `facilities`
  MODIFY `facility_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT for table `feedback`
--
ALTER TABLE `feedback`
  MODIFY `feedback_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `gallery`
--
ALTER TABLE `gallery`
  MODIFY `gallery_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `gcash`
--
ALTER TABLE `gcash`
  MODIFY `gcash_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `images`
--
ALTER TABLE `images`
  MODIFY `img_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `payment`
--
ALTER TABLE `payment`
  MODIFY `payment_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=49;

--
-- AUTO_INCREMENT for table `reservation`
--
ALTER TABLE `reservation`
  MODIFY `reservation_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=62;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
