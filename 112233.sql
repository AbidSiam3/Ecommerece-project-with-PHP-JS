-- phpMyAdmin SQL Dump
-- version 4.8.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 29, 2018 at 08:34 PM
-- Server version: 10.1.32-MariaDB
-- PHP Version: 7.2.5

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `112233`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `adminid` int(10) NOT NULL,
  `adminusername` varchar(20) NOT NULL,
  `adminpassword` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `brands`
--

CREATE TABLE `brands` (
  `brand_id` int(100) NOT NULL,
  `brand_title` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `brands`
--

INSERT INTO `brands` (`brand_id`, `brand_title`) VALUES
(1, 'Pran'),
(2, 'Loreal'),
(3, 'Pampers'),
(4, 'Nestle'),
(5, 'Colgate'),
(6, 'Wheel'),
(7, 'Harpic'),
(8, 'Sunlite'),
(9, 'Fevicol');

-- --------------------------------------------------------

--
-- Table structure for table `cart`
--

CREATE TABLE `cart` (
  `id` int(10) NOT NULL,
  `p_id` int(10) NOT NULL,
  `ip_add` varchar(250) NOT NULL,
  `user_id` int(10) NOT NULL,
  `product_title` varchar(200) NOT NULL,
  `product_image` varchar(200) NOT NULL,
  `qty` int(10) NOT NULL,
  `price` int(10) NOT NULL,
  `total_amt` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `cart`
--

INSERT INTO `cart` (`id`, `p_id`, `ip_add`, `user_id`, `product_title`, `product_image`, `qty`, `price`, `total_amt`) VALUES
(1, 3, '0', 6, 'Pran Hot Tomato Sauce', '1532880279_01.jpg', 1, 156, 156),
(2, 4, '0', 1, 'Pran Hot Tomato Sauce', '1532880570_01.jpg', 1, 24254, 24254),
(5, 4, '0', 2, 'Pran Hot Tomato Sauce', '1532880570_01.jpg', 6, 24254, 145524),
(6, 6, '0', 2, 'All Time French Bun', '1532881270_all_time_french_bun.png', 1, 4545, 4545),
(7, 8, '0', 1, 'Harpic Liquid Toilet Cleaner', '1532885842_harpic-toilet-cleaner-500x500.jpg', 1, 90, 90);

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `cat_id` int(100) NOT NULL,
  `cat_title` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`cat_id`, `cat_title`) VALUES
(1, 'Food'),
(2, 'Home & Cleaning'),
(3, 'Office Products'),
(4, 'Baby Care'),
(5, 'Beauty & Health'),
(6, 'Pet Care'),
(7, 'Home Appliances');

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `id` int(10) NOT NULL,
  `p_id` int(10) NOT NULL,
  `ip_add` varchar(250) NOT NULL,
  `user_id` int(10) NOT NULL,
  `product_title` varchar(200) NOT NULL,
  `product_image` varchar(200) NOT NULL,
  `qty` int(10) NOT NULL,
  `price` int(10) NOT NULL,
  `total_amt` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `product_id` int(100) NOT NULL,
  `product_cat` int(100) NOT NULL,
  `product_brand` int(100) NOT NULL,
  `product_title` varchar(255) NOT NULL,
  `product_price` int(100) NOT NULL,
  `product_desc` text NOT NULL,
  `product_image` text NOT NULL,
  `product_qty` int(100) NOT NULL,
  `product_keywords` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`product_id`, `product_cat`, `product_brand`, `product_title`, `product_price`, `product_desc`, `product_image`, `product_qty`, `product_keywords`) VALUES
(3, 1, 1, 'Pran Hot Tomato Sauce', 156, 'dafgagasdgasdgads', '1532880279_01.jpg', 63, 'Pran Hot Tomato Sauce'),
(4, 1, 1, 'Pran Hot Tomato Sauce', 24254, 'asfasfas', '1532880570_01.jpg', 541, 'asfasfasf'),
(6, 1, 1, 'All Time French Bun', 4545, 'fgsgsdgs', '1532881270_all_time_french_bun.png', 13, 'pran alltime french bun food'),
(7, 2, 6, 'Wheel Washing Powder', 60, 'Wheel 2-in-1 Clean & Fresh cleans clothes thoroughly and removes strong malodor.', '1532885139_active_wheel_lemon__jasmine1.jpg', 5, 'Wheel washing powder'),
(8, 2, 7, 'Harpic Liquid Toilet Cleaner', 90, 'Harpic is a complete cleaning solution for your Toilet. It cleans from the rim to the u bend, cleans tough stains, kills 99.9% germs and leaves the bowl smelling fresh and sparkling clean.', '1532885842_harpic-toilet-cleaner-500x500.jpg', 2, 'harpic liquid toilet cleaner'),
(9, 3, 8, 'AA Extra Heavy Duty', 24, 'Sunlite AA Extra Heavy Duty is a 1.5V AA battery.', '1532886293_Sunlight_AAA.jpg', 0, 'Sunlite AA extra heavy duty'),
(10, 3, 9, 'Fevicol Super Glue ', 20, ' Fevicol Super Glue can be used to fix broken glass, wood, ceramic and plastic.   ', '1532886773_fevicol.jpg', 12, 'Fevicol super glue');

-- --------------------------------------------------------

--
-- Table structure for table `user_info`
--

CREATE TABLE `user_info` (
  `user_id` int(10) NOT NULL,
  `first_name` varchar(100) NOT NULL,
  `last_name` varchar(100) NOT NULL,
  `email` varchar(300) NOT NULL,
  `password` varchar(300) NOT NULL,
  `mobile` varchar(10) NOT NULL,
  `address1` varchar(300) NOT NULL,
  `address2` varchar(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user_info`
--

INSERT INTO `user_info` (`user_id`, `first_name`, `last_name`, `email`, `password`, `mobile`, `address1`, `address2`) VALUES
(1, 'Naima', 'Hassan', 'n@n.com', 'dcddb75469b4b4875094e14561e573d8', '0182580960', 'khilgaon', ''),
(2, 'Naima', 'Hassan', 'naima@gmail.com', '827ccb0eea8a706c4c34a16891f84e7b', '0167016722', 'Khilgaon', '');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`adminid`);

--
-- Indexes for table `brands`
--
ALTER TABLE `brands`
  ADD PRIMARY KEY (`brand_id`);

--
-- Indexes for table `cart`
--
ALTER TABLE `cart`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`cat_id`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`product_id`);

--
-- Indexes for table `user_info`
--
ALTER TABLE `user_info`
  ADD PRIMARY KEY (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `brands`
--
ALTER TABLE `brands`
  MODIFY `brand_id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `cart`
--
ALTER TABLE `cart`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `cat_id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `product_id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `user_info`
--
ALTER TABLE `user_info`
  MODIFY `user_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
