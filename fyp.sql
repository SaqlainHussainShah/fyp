-- phpMyAdmin SQL Dump
-- version 4.1.14
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Sep 19, 2016 at 04:03 PM
-- Server version: 5.6.17
-- PHP Version: 5.5.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `fyp`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE IF NOT EXISTS `admin` (
  `admin_id` int(11) NOT NULL AUTO_INCREMENT,
  `admin_email` varchar(30) NOT NULL,
  `admin_contact` varchar(15) NOT NULL,
  `admin_password` varchar(30) NOT NULL,
  PRIMARY KEY (`admin_id`),
  UNIQUE KEY `admin_email` (`admin_email`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`admin_id`, `admin_email`, `admin_contact`, `admin_password`) VALUES
(1, 'saqlaingardezi86@gmail.com', '+923421793893', 'gardan1216');

-- --------------------------------------------------------

--
-- Table structure for table `client`
--

CREATE TABLE IF NOT EXISTS `client` (
  `client_id` int(11) NOT NULL AUTO_INCREMENT,
  `client_name` varchar(20) NOT NULL,
  `client_email` varchar(30) NOT NULL,
  `client_contact` varchar(15) NOT NULL,
  `client_password` varchar(30) NOT NULL,
  `client_confirm` int(11) NOT NULL DEFAULT '0',
  `client_confirm_code` int(30) NOT NULL,
  PRIMARY KEY (`client_id`),
  UNIQUE KEY `client_email` (`client_email`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `client`
--

INSERT INTO `client` (`client_id`, `client_name`, `client_email`, `client_contact`, `client_password`, `client_confirm`, `client_confirm_code`) VALUES
(1, 'Nabeel', 'nabeel@gmail.com', '923475475230', 'mubarak', 0, 30758),
(2, 'Shah G', 'saqlaingardezi86@gmail.com', '923065484168', 'pakistankashmir', 0, 8256);

-- --------------------------------------------------------

--
-- Table structure for table `food`
--

CREATE TABLE IF NOT EXISTS `food` (
  `food_id` int(11) NOT NULL AUTO_INCREMENT,
  `food_name` varchar(20) NOT NULL,
  `food_serving` int(11) NOT NULL,
  `food_availability` text NOT NULL,
  `food_price` int(11) NOT NULL,
  `hotel_id` int(11) NOT NULL,
  `food_location` varchar(25) NOT NULL,
  `food_image` int(11) NOT NULL,
  PRIMARY KEY (`food_id`),
  KEY `food_ibfk_1` (`hotel_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=5 ;

--
-- Dumping data for table `food`
--

INSERT INTO `food` (`food_id`, `food_name`, `food_serving`, `food_availability`, `food_price`, `hotel_id`, `food_location`, `food_image`) VALUES
(2, 'Fast food', 6, 'Yes', 234, 1, 'new city', 14588),
(3, 'Italian', 23, 'Yes', 98798, 1, 'new city', 5300),
(4, 'kashmiri', 2, 'Yes', 87687, 1, 'new city', 22749);

-- --------------------------------------------------------

--
-- Table structure for table `hotel`
--

CREATE TABLE IF NOT EXISTS `hotel` (
  `hotel_id` int(11) NOT NULL AUTO_INCREMENT,
  `hotel_name` varchar(20) NOT NULL,
  `hotel_email` varchar(30) NOT NULL,
  `hotel_contact` varchar(15) NOT NULL,
  `hotel_password` varchar(30) NOT NULL,
  `hotel_location` varchar(20) NOT NULL,
  `hotel_main_image` varchar(25) NOT NULL,
  `hotel_confirm` int(2) NOT NULL DEFAULT '0',
  `hotel_confirm_code` int(30) NOT NULL,
  PRIMARY KEY (`hotel_id`),
  UNIQUE KEY `hotel_email` (`hotel_email`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=15 ;

--
-- Dumping data for table `hotel`
--

INSERT INTO `hotel` (`hotel_id`, `hotel_name`, `hotel_email`, `hotel_contact`, `hotel_password`, `hotel_location`, `hotel_main_image`, `hotel_confirm`, `hotel_confirm_code`) VALUES
(1, 'Hotel1', 'saqlaingardezi86@gmail.com', '923421793893', 'mubarak', 'new city', '12939', 0, 3944),
(14, 'New City', 'saqlaingardezi93@gmail.com', '923065484168', '12345', 'mirpur kalyal', '17330', 0, 16131);

-- --------------------------------------------------------

--
-- Table structure for table `images`
--

CREATE TABLE IF NOT EXISTS `images` (
  `hotel_id` int(11) NOT NULL,
  `image_id` int(11) NOT NULL AUTO_INCREMENT,
  `product_id` int(11) NOT NULL,
  `image_name` varchar(30) NOT NULL,
  PRIMARY KEY (`image_id`),
  KEY `hotel_id` (`hotel_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `main_image`
--

CREATE TABLE IF NOT EXISTS `main_image` (
  `main_image_id` int(11) NOT NULL AUTO_INCREMENT,
  `product_id` int(11) NOT NULL,
  `main_image_name` varchar(30) NOT NULL,
  PRIMARY KEY (`main_image_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `order_food`
--

CREATE TABLE IF NOT EXISTS `order_food` (
  `order_id` int(11) NOT NULL AUTO_INCREMENT,
  `hotel_id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `client_id` int(11) NOT NULL,
  `product_quantity` int(11) NOT NULL,
  `order_total` int(11) NOT NULL,
  `order_price` int(11) NOT NULL,
  PRIMARY KEY (`order_id`),
  KEY `hotel_id` (`hotel_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=64 ;

--
-- Dumping data for table `order_food`
--

INSERT INTO `order_food` (`order_id`, `hotel_id`, `product_id`, `client_id`, `product_quantity`, `order_total`, `order_price`) VALUES
(1, 1, 1, 1, 1, 32, 32),
(2, 1, 2, 1, 3, 702, 234),
(3, 1, 2, 1, 2, 468, 234),
(4, 1, 3, 1, 2, 197596, 98798),
(5, 1, 3, 1, 2, 197596, 98798),
(6, 1, 3, 1, 2, 197596, 98798),
(7, 1, 3, 1, 2, 197596, 98798),
(8, 1, 2, 1, 1, 234, 234),
(9, 1, 3, 1, 1, 98798, 98798),
(10, 1, 3, 1, 1, 98798, 98798),
(11, 1, 3, 1, 1, 98798, 98798),
(12, 1, 3, 1, 1, 98798, 98798),
(13, 1, 3, 1, 1, 98798, 98798),
(14, 1, 3, 1, 1, 98798, 98798),
(15, 1, 3, 1, 1, 98798, 98798),
(16, 1, 3, 1, 1, 98798, 98798),
(17, 1, 3, 1, 1, 98798, 98798),
(18, 1, 3, 1, 1, 98798, 98798),
(19, 1, 3, 1, 1, 98798, 98798),
(20, 1, 3, 1, 1, 98798, 98798),
(21, 1, 3, 1, 1, 98798, 98798),
(22, 1, 3, 1, 1, 98798, 98798),
(23, 1, 3, 1, 1, 98798, 98798),
(24, 1, 3, 1, 1, 98798, 98798),
(25, 1, 3, 1, 1, 98798, 98798),
(26, 1, 3, 1, 1, 98798, 98798),
(27, 1, 3, 1, 1, 98798, 98798),
(28, 1, 3, 1, 1, 98798, 98798),
(29, 1, 3, 1, 1, 98798, 98798),
(30, 1, 3, 1, 1, 98798, 98798),
(31, 1, 3, 1, 1, 98798, 98798),
(32, 1, 3, 1, 1, 98798, 98798),
(33, 1, 3, 1, 1, 98798, 98798),
(34, 1, 3, 1, 1, 98798, 98798),
(35, 1, 2, 1, 4, 936, 234),
(36, 1, 2, 1, 4, 936, 234),
(37, 1, 2, 1, 4, 936, 234),
(38, 1, 2, 1, 4, 936, 234),
(39, 1, 2, 1, 4, 936, 234),
(40, 1, 2, 1, 4, 936, 234),
(41, 1, 2, 1, 4, 936, 234),
(42, 1, 2, 1, 4, 936, 234),
(43, 1, 2, 1, 4, 936, 234),
(44, 1, 2, 1, 4, 936, 234),
(45, 1, 2, 1, 4, 936, 234),
(46, 1, 2, 1, 4, 936, 234),
(47, 1, 1, 1, 3, 96, 32),
(48, 1, 2, 1, 2, 468, 234),
(49, 1, 2, 2, 1, 234, 234),
(50, 1, 3, 6, 1, 98798, 98798),
(51, 1, 2, 6, 1, 234, 234),
(53, 1, 3, 1, 2, 197596, 98798),
(54, 1, 3, 1, 2, 197596, 98798),
(55, 1, 3, 2, 1, 98798, 98798),
(56, 1, 2, 2, 3, 702, 234),
(57, 1, 1, 2, 1, 32, 32),
(58, 1, 1, 2, 1, 32, 32),
(59, 1, 2, 2, 1, 234, 234),
(60, 1, 3, 2, 1, 98798, 98798),
(61, 1, 2, 1, 2, 468, 234),
(62, 1, 2, 1, 1, 234, 234),
(63, 1, 2, 2, 2, 468, 234);

-- --------------------------------------------------------

--
-- Table structure for table `order_room`
--

CREATE TABLE IF NOT EXISTS `order_room` (
  `order_id` int(11) NOT NULL AUTO_INCREMENT,
  `hotel_id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `client_id` int(11) NOT NULL,
  `product_quantity` int(11) NOT NULL,
  `order_total` int(11) NOT NULL,
  `order_price` int(11) NOT NULL,
  PRIMARY KEY (`order_id`),
  KEY `hotel_id` (`hotel_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=17 ;

--
-- Dumping data for table `order_room`
--

INSERT INTO `order_room` (`order_id`, `hotel_id`, `product_id`, `client_id`, `product_quantity`, `order_total`, `order_price`) VALUES
(1, 1, 2, 1, 3, 36996, 12332),
(2, 1, 4, 1, 3, 296394, 98798),
(3, 1, 5, 1, 6, 1392, 232),
(4, 1, 2, 1, 1, 12332, 12332),
(5, 1, 5, 1, 1, 232, 232),
(6, 1, 5, 1, 1, 232, 232),
(7, 1, 5, 1, 1, 232, 232),
(8, 1, 5, 1, 1, 232, 232),
(9, 1, 5, 1, 1, 232, 232),
(10, 1, 5, 1, 5, 1160, 232),
(11, 1, 4, 1, 4, 395192, 98798),
(12, 1, 4, 1, 3, 296394, 98798),
(13, 1, 5, 1, 4, 928, 232),
(14, 1, 4, 6, 1, 98798, 98798),
(16, 1, 4, 2, 1, 98798, 98798);

-- --------------------------------------------------------

--
-- Table structure for table `room`
--

CREATE TABLE IF NOT EXISTS `room` (
  `room_id` int(11) NOT NULL AUTO_INCREMENT,
  `hotel_id` int(11) NOT NULL,
  `room_type` varchar(20) NOT NULL,
  `room_location` varchar(30) NOT NULL,
  `room_availability` varchar(10) NOT NULL,
  `room_price` varchar(10) NOT NULL,
  `room_image` int(11) NOT NULL,
  PRIMARY KEY (`room_id`),
  KEY `hotel_id` (`hotel_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=7 ;

--
-- Dumping data for table `room`
--

INSERT INTO `room` (`room_id`, `hotel_id`, `room_type`, `room_location`, `room_availability`, `room_price`, `room_image`) VALUES
(3, 1, 'single', 'lahore', 'yes', '234', 7198),
(5, 1, 'double', 'attock', 'yes', '232', 25947),
(6, 14, 'single', 'Nakyal', 'yes', '2300', 2471);

--
-- Constraints for dumped tables
--

--
-- Constraints for table `food`
--
ALTER TABLE `food`
  ADD CONSTRAINT `food_ibfk_1` FOREIGN KEY (`hotel_id`) REFERENCES `hotel` (`hotel_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `images`
--
ALTER TABLE `images`
  ADD CONSTRAINT `images_ibfk_1` FOREIGN KEY (`hotel_id`) REFERENCES `hotel` (`hotel_id`);

--
-- Constraints for table `order_food`
--
ALTER TABLE `order_food`
  ADD CONSTRAINT `order_food_ibfk_1` FOREIGN KEY (`hotel_id`) REFERENCES `hotel` (`hotel_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `order_room`
--
ALTER TABLE `order_room`
  ADD CONSTRAINT `order_room_ibfk_1` FOREIGN KEY (`hotel_id`) REFERENCES `hotel` (`hotel_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `room`
--
ALTER TABLE `room`
  ADD CONSTRAINT `room_ibfk_1` FOREIGN KEY (`hotel_id`) REFERENCES `hotel` (`hotel_id`) ON DELETE CASCADE ON UPDATE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
