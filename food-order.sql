-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 17, 2021 at 02:42 PM
-- Server version: 10.4.20-MariaDB
-- PHP Version: 7.3.29

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `food-order`
--

-- --------------------------------------------------------

--
-- Table structure for table `tbl_admin`
--

CREATE TABLE `tbl_admin` (
  `id` int(10) UNSIGNED NOT NULL,
  `full_name` varchar(100) NOT NULL,
  `username` varchar(100) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tbl_admin`
--

INSERT INTO `tbl_admin` (`id`, `full_name`, `username`, `password`) VALUES
(10, 'jay Thapa', 'vijaythapa', 'f3ed11bbdb94fd9ebdefbaf646ab94d3'),
(12, 'Administrator', 'admin', '21232f297a57a5a743894a0e4a801fc3'),
(13, 'kinjal', 'kinjal.suryavanshi', '202cb962ac59075b964b07152d234b70'),
(14, 'kinjal suryavanshi', 'kinjal.suryavanshi', '202cb962ac59075b964b07152d234b70'),
(19, 'kinjal suryavanshi', 'sfdg@sd', 'd10906c3dac1172d4f60bd41f224ae75'),
(22, 'kinjal', 'sfdg@sd', 'adcaec3805aa912c0d0b14a81bedb6ff'),
(23, 'upasana jani', 'upa45', 'd10906c3dac1172d4f60bd41f224ae75'),
(25, 'hetanshi puraniya', 'hetanshi.puraniya', '3f0e62adc3b7399bcbafe9675564972b'),
(26, 'sakshi', 'sakshi.bachharya', 'e10adc3949ba59abbe56e057f20f883e'),
(27, 'tiru', 'tiru1', '202cb962ac59075b964b07152d234b70'),
(28, 'kinjal suryavanshi', 'kinjal.suryavanshi', '202cb962ac59075b964b07152d234b70'),
(29, 'khyati jani', 'khyati21', '827ccb0eea8a706c4c34a16891f84e7b'),
(30, 'khyati jani', 'khyati21', '1234'),
(31, 'admin', 'admin', '21232f297a57a5a743894a0e4a801fc3'),
(32, 'kinjal', 'kinjal.suryavanshi', '827ccb0eea8a706c4c34a16891f84e7b');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_category`
--

CREATE TABLE `tbl_category` (
  `id` int(10) UNSIGNED NOT NULL,
  `title` varchar(100) NOT NULL,
  `image_name` varchar(255) NOT NULL,
  `featured` varchar(10) NOT NULL,
  `active` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tbl_category`
--

INSERT INTO `tbl_category` (`id`, `title`, `image_name`, `featured`, `active`) VALUES
(18, 'golgappaa\'', 'food_category_194.jpg', 'yes', 'yes'),
(19, 'cake pie', 'food_category_240.jpg', 'no', 'yes'),
(21, 'Snakes', 'food_category_103.jpg', 'no', 'yes'),
(22, 'Punjabi', 'food_category_339.jpg', 'no', 'yes'),
(23, 'South Indian', 'food_category_151.jpg', 'yes', 'yes'),
(24, 'cake', 'food_category_221.jpg', 'no', 'yes'),
(25, 'Kathiyawadi', 'food_category_671.jpg', 'yes', 'yes'),
(26, 'cake', 'food_category_473.jpg', 'no', 'yes');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_food`
--

CREATE TABLE `tbl_food` (
  `id` int(10) UNSIGNED NOT NULL,
  `title` varchar(100) NOT NULL,
  `description` text NOT NULL,
  `price` decimal(10,2) NOT NULL,
  `image_name` varchar(255) NOT NULL,
  `category_id` int(10) UNSIGNED NOT NULL,
  `featured` varchar(10) NOT NULL,
  `active` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tbl_food`
--

INSERT INTO `tbl_food` (`id`, `title`, `description`, `price`, `image_name`, `category_id`, `featured`, `active`) VALUES
(3, 'Dumplings Specials', 'Chicken Dumpling with herbs from Mountains', '5.00', 'food_name_886.jpg', 6, 'yes', 'yes'),
(4, 'Best Burger', 'Burger with Ham, Pineapple and lots of Cheese.', '4.00', 'food_name_527.jpg', 5, 'yes', 'no'),
(11, 'pie', 'too tasty', '30.00', 'food_name_446.jpg', 19, 'yes', 'yes'),
(12, 'noodles', 'yum', '30.00', 'food_name_69.jpg', 17, 'yes', 'no'),
(13, 'fruit salad', 'this is cold', '80.00', 'food_name_445.jpg', 21, 'no', 'yes'),
(14, 'fruit salad', 'this is cold', '80.00', 'food_name_796.jpg', 24, 'yes', 'yes');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_order`
--

CREATE TABLE `tbl_order` (
  `id` int(10) UNSIGNED NOT NULL,
  `food` varchar(150) NOT NULL,
  `price` decimal(10,2) NOT NULL,
  `qty` int(11) NOT NULL,
  `total` decimal(10,2) NOT NULL,
  `order_date` datetime NOT NULL,
  `status` varchar(50) NOT NULL,
  `customer_name` varchar(150) NOT NULL,
  `customer_contact` varchar(20) NOT NULL,
  `customer_email` varchar(150) NOT NULL,
  `customer_address` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tbl_order`
--

INSERT INTO `tbl_order` (`id`, `food`, `price`, `qty`, `total`, `order_date`, `status`, `customer_name`, `customer_contact`, `customer_email`, `customer_address`) VALUES
(1, 'Sadeko Momo', '6.00', 3, '18.00', '2020-11-30 03:49:48', 'Delivered', 'Bradley Farrel', '+1 (576) 504-4657', 'zuhafiq@mailinator.com', 'Duis aliqua Qui lor'),
(2, 'Best Burger', '4.00', 4, '16.00', '2020-11-30 03:52:43', 'Delivered', 'Kelly Dillard', '+1 (908) 914-3106', 'fexekihor@mailinator.com', 'Incidunt ipsum ad d'),
(3, 'Mixed Pizza', '10.00', 2, '20.00', '2020-11-30 04:07:17', 'Delivered', 'Jana Bush', '+1 (562) 101-2028', 'tydujy@mailinator.com', 'Minima iure ducimus'),
(4, 'noodles', '30.00', 1, '30.00', '2021-08-17 12:22:38', 'Ordered', 'kinjal suryavanshi', '8866622758', 'kinjal.suryavanshi@theonetechnologies.co.in', 'vastrapur'),
(5, 'fruit salad', '80.00', 3, '240.00', '2021-08-17 12:23:18', 'Ordered', 'kinjal suryavanshi\'\'', '8866622758', 'chips@dfgg.com', 'vastrapur'),
(6, 'fruit salad', '80.00', 1, '80.00', '2021-08-17 12:24:30', 'Ordered', 'ritu jani', '8976345672', 'rutvika@123.com', 'puna');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tbl_admin`
--
ALTER TABLE `tbl_admin`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_category`
--
ALTER TABLE `tbl_category`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_food`
--
ALTER TABLE `tbl_food`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_order`
--
ALTER TABLE `tbl_order`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tbl_admin`
--
ALTER TABLE `tbl_admin`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;

--
-- AUTO_INCREMENT for table `tbl_category`
--
ALTER TABLE `tbl_category`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- AUTO_INCREMENT for table `tbl_food`
--
ALTER TABLE `tbl_food`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `tbl_order`
--
ALTER TABLE `tbl_order`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
