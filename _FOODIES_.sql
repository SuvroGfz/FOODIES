-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 28, 2022 at 07:40 PM
-- Server version: 10.4.24-MariaDB
-- PHP Version: 8.1.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `foodies`
--

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `title` varchar(50) NOT NULL,
  `active` varchar(10) NOT NULL,
  `popular` varchar(10) NOT NULL,
  `image_name` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`title`, `active`, `popular`, `image_name`) VALUES
('Biriyani', 'Yes', 'Yes', 'Category_Biriyani_109.jpg'),
('Burger', 'No', 'No', 'Category_Burger_496.jpg'),
('Dessert', 'No', 'Yes', 'Category_Dessert_918.jpg'),
('Drinks and Beverages', 'Yes', 'Yes', 'Category_Drinks and Beverages_645.png'),
('Kabab', 'No', 'No', 'Category_Kabab_238.jpg'),
('Momo', 'Yes', 'No', 'Category_Momo_374.jpg'),
('Naan', 'Yes', 'No', 'Category_Naan_444.jpg'),
('Pizza', 'No', 'No', 'Category_Pizza_320.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `dbl_admin`
--

CREATE TABLE `dbl_admin` (
  `id` int(11) NOT NULL,
  `full_name` varchar(50) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `dbl_admin`
--

INSERT INTO `dbl_admin` (`id`, `full_name`, `username`, `password`) VALUES
(1, 'Amirul Islam Alif', 'Alif15', '827ccb0eea8a706c4c34a16891f84e7b'),
(2, 'Gazi Fardin Zafor Suvro', 'GFZ20', '827ccb0eea8a706c4c34a16891f84e7b'),
(3, 'New', 'new12', '827ccb0eea8a706c4c34a16891f84e7b');

-- --------------------------------------------------------

--
-- Table structure for table `restaurants`
--

CREATE TABLE `restaurants` (
  `menu_id` int(11) NOT NULL,
  `restaurant_name` varchar(40) NOT NULL,
  `location` varchar(40) NOT NULL,
  `credits` int(11) NOT NULL,
  `password` varchar(100) NOT NULL,
  `active` tinyint(1) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `restaurants`
--

INSERT INTO `restaurants` (`menu_id`, `restaurant_name`, `location`, `credits`, `password`, `active`) VALUES
(2, 'Supreme Diners', 'Mirpur', 1030, '827ccb0eea8a706c4c34a16891f84e7b', 0),
(3, 'Burger Shop', 'Dhanmondi', 5000, '827ccb0eea8a706c4c34a16891f84e7b', 0),
(4, 'Pizzaburg', 'Dhanmondi', 3000, '827ccb0eea8a706c4c34a16891f84e7b', 0),
(5, 'Khanas', 'Dhanmondi', 2000, '827ccb0eea8a706c4c34a16891f84e7b', 0),
(6, 'Burger Lab', 'Uttara', 5000, '827ccb0eea8a706c4c34a16891f84e7b', 0),
(7, 'Gfzs Kitchen', 'Mirpur', 1000, '827ccb0eea8a706c4c34a16891f84e7b', 0),
(8, 'Golden Park', 'Mirpur', 1234, '827ccb0eea8a706c4c34a16891f84e7b', 0);

-- --------------------------------------------------------

--
-- Table structure for table `riders`
--

CREATE TABLE `riders` (
  `rider_id` int(11) NOT NULL,
  `full_name` varchar(30) NOT NULL,
  `password` varchar(40) NOT NULL,
  `location` varchar(30) NOT NULL,
  `current_location` varchar(30) NOT NULL,
  `active` varchar(10) NOT NULL DEFAULT 'No',
  `current_order` int(11) DEFAULT NULL,
  `vehicle` varchar(20) NOT NULL,
  `email` varchar(40) NOT NULL,
  `phone` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `riders`
--

INSERT INTO `riders` (`rider_id`, `full_name`, `password`, `location`, `current_location`, `active`, `current_order`, `vehicle`, `email`, `phone`) VALUES
(11, 'Gazi Fardin Zafor Suvro', '827ccb0eea8a706c4c34a16891f84e7b', 'Dhanmondi', 'Dhanmondi', 'No', NULL, 'Cycle', 'gazisn870@gmail.com', '01636308036'),
(13, 'Amirul Islam Alif', '827ccb0eea8a706c4c34a16891f84e7b', 'Mirpur', 'Mirpur', 'No', NULL, 'Cycle', 'alif@rider', '01636308036'),
(14, 'new', '827ccb0eea8a706c4c34a16891f84e7b', 'Mirpur', 'Mirpur', 'No', NULL, 'Bike', 'new@rider', '01234560123'),
(15, 'aaa', '827ccb0eea8a706c4c34a16891f84e7b', 'Gulshan', 'Gulshan', 'No', NULL, 'Bike', 'aaa@gmail.com', '123654'),
(16, 'abc', '827ccb0eea8a706c4c34a16891f84e7b', 'aaa', 'aaa', 'No', NULL, 'Cycle', 'abc@def', '12309543534'),
(17, 'poiuy', '827ccb0eea8a706c4c34a16891f84e7b', 'asdfg', 'asdfg', 'No', NULL, 'Bike', 'poi@abc', '3564563456'),
(18, 'Topu', '827ccb0eea8a706c4c34a16891f84e7b', 'asdfg', 'asdfg', 'No', NULL, 'Bike', 'topu@yahoo', '123654');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `full_name` varchar(100) NOT NULL,
  `password` int(255) NOT NULL,
  `credits` int(11) NOT NULL,
  `phone` varchar(20) NOT NULL,
  `email` varchar(30) NOT NULL,
  `location` varchar(30) NOT NULL,
  `road` varchar(30) NOT NULL,
  `house` varchar(30) NOT NULL,
  `active` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`title`);

--
-- Indexes for table `dbl_admin`
--
ALTER TABLE `dbl_admin`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `restaurants`
--
ALTER TABLE `restaurants`
  ADD PRIMARY KEY (`menu_id`);

--
-- Indexes for table `riders`
--
ALTER TABLE `riders`
  ADD PRIMARY KEY (`rider_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `dbl_admin`
--
ALTER TABLE `dbl_admin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `restaurants`
--
ALTER TABLE `restaurants`
  MODIFY `menu_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `riders`
--
ALTER TABLE `riders`
  MODIFY `rider_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
