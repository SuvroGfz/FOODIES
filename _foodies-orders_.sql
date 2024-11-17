-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 30, 2022 at 08:04 PM
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
-- Table structure for table `table_orders`
--

CREATE TABLE `table_orders` (
  `order_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `food_id` int(11) NOT NULL,
  `rider_id` int(11) NOT NULL,
  `quantity` int(11) NOT NULL,
  `total` int(200) NOT NULL,
  `restaurant_name` varchar(50) NOT NULL,
  `date` date NOT NULL,
  `delivery_notes` varchar(100) NOT NULL,
  `status` varchar(30) NOT NULL,
  `customer_name` varchar(30) NOT NULL,
  `phone` varchar(30) NOT NULL,
  `location` varchar(40) NOT NULL,
  `road` varchar(20) NOT NULL,
  `house` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `table_orders`
--

INSERT INTO `table_orders` (`order_id`, `user_id`, `food_id`, `rider_id`, `quantity`, `total`, `restaurant_name`, `date`, `delivery_notes`, `status`, `customer_name`, `phone`, `location`, `road`, `house`) VALUES
(1, 1, 8, 0, 3, 200, 'Burger Lab', '2022-08-29', 'Hello', 'ordered', 'Gazi Fardin Zafor Suvro', '01636308036', 'Dhanmondi', 'Mirpur Road', '3'),
(2, 1, 8, 0, 1, 200, 'Burger Lab', '2022-08-29', 'Panir Pump', 'ordered', 'Gfz Niloy', '01636308036', 'Mirpur', 'Mirpur Road', '605/1'),
(3, 1, 3, 0, 1, 0, 'Pizzaburg', '2022-08-29', 'Gorur Farm', 'Ordered', 'Gfz Suvro', '01636308036', 'Mirpur', 'Road - 1210 East mon', 'Sayeeda Neer'),
(5, 1, 7, 0, 5, 200, 'Gfzs Kitchen', '2022-08-29', 'Kathal Tola', 'ordered', 'Gazi Fardin Zafor Suvro', '01636308036', 'Mirpur', 'Mirpur Road', '2'),
(6, 1, 4, 0, 6, 0, 'Gfzs Kitchen', '2022-08-29', 'Kathaltola Gorur Farm', 'Ordered', 'Gazi Zafor', '01711339387', 'Mirpur', 'Road No-1210 / Block', '1090/1'),
(7, 1, 9, 0, 2, 300, 'Khanas', '0000-00-00', 'Panir Pump', 'Ordered', 'Food Lover', '0123456', 'Mirpur-2', 'Adosho Road', '886'),
(8, 1, 10, 0, 1, 600, 'Khanas', '0000-00-00', 'kisuna', 'Ordered', 'Gazi Fardin Zafor Suvro', '01636308036', 'Mirpur', 'Road No-1210 / Block', '#1090/1');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `table_orders`
--
ALTER TABLE `table_orders`
  ADD PRIMARY KEY (`order_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `table_orders`
--
ALTER TABLE `table_orders`
  MODIFY `order_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
