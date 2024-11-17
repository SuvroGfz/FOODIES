-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 29, 2022 at 12:31 PM
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
-- Table structure for table `foods`
--

CREATE TABLE `foods` (
  `id` int(11) NOT NULL,
  `title` varchar(40) NOT NULL,
  `restaurant` varchar(40) NOT NULL,
  `category` varchar(40) NOT NULL,
  `image_name` varchar(40) NOT NULL,
  `price` int(11) NOT NULL,
  `popular` varchar(20) NOT NULL,
  `active` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `foods`
--

INSERT INTO `foods` (`id`, `title`, `restaurant`, `category`, `image_name`, `price`, `popular`, `active`) VALUES
(1, 'Chicken Burger', 'Burgerista', 'Burger', 'chicken_burger.jpg', 200, 'Yes', 'Yes'),
(2, 'Double Patty Burger', 'Gfzs Kitchen', 'Burger', 'double_patty_burger.jpg', 500, 'Yes', 'No'),
(3, 'Meatball Pizza', 'Pizzaburg', 'Pizza', 'meatball_pizza.jpg', 500, 'No', 'Yes'),
(4, 'Masalla Dosa', 'Gfzs Kitchen', 'Dosa', 'dosa_platter.jpg', 200, 'Yes', 'Yes'),
(5, 'Beef Burger', 'Pizzaburg', 'Burger', 'beef_burger.jpg', 200, 'Yes', 'Yes'),
(6, 'Fish Burger', 'Pizzaburg', 'Burger', 'fish_burger.jpg', 100, 'Yes', 'Yes'),
(7, 'Mushroom Burger', 'Gfzs Kitchen', 'Burger', 'mushroom_burger.jpg', 200, 'Yes', 'Yes'),
(8, 'American HamBurger', 'Burger Lab', 'Burger', 'american_hamburger.jpg', 200, 'Yes', 'Yes');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `foods`
--
ALTER TABLE `foods`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `foods`
--
ALTER TABLE `foods`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
