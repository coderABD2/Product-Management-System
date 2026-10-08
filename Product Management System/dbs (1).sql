-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 08, 2026 at 09:21 AM
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
-- Database: `dbs`
--

-- --------------------------------------------------------

--
-- Table structure for table `menu`
--

CREATE TABLE `menu` (
  `id` int(11) NOT NULL,
  `image` varchar(255) DEFAULT NULL,
  `name` varchar(100) DEFAULT NULL,
  `disc` varchar(244) DEFAULT NULL,
  `price` decimal(10,2) DEFAULT NULL,
  `category` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `menu`
--

INSERT INTO `menu` (`id`, `image`, `name`, `disc`, `price`, `category`) VALUES
(6, 'headphone.jpg', 'Wireless Headphones	', 'High-quality bass over-ear wireless Bluetooth headphones.', 499.00, 'electronic'),
(7, 'shose.jpg', '  Nike Running Shoes', 'Lightweight, comfortable sports shoes designed with soft cushioning and high grip', 5999.00, 'Footwear'),
(8, 'watch.jpg', 'Smart Watch', 'Modern smartwatch featuring fitness tracking, heart rate monitor, and HD display.', 530.00, 'Electronics'),
(9, 'bottle.jpg', '   Stainless Steel Bottle', 'Eco-friendly, insulated leak-proof water bottle that keeps drinks cold or hot.', 200.00, 'Kitchen & Home'),
(10, 'perfume.jpg', ' Luxury Perfume', 'Long-lasting premium fragrance with a floral and woody scent profile.', 8000.00, 'Fragrance'),
(13, 'piza.jpg', 'Delicious Pizza	', 'Freshly baked, cheese-loaded Italian pizza topped with fresh ingredients.', 504.00, 'Food & Beverage'),
(14, 'cloth', 'Designer Frock', 'Elegant and comfortable cotton designer frock suitable for casual and party wear.', 5039.00, 'Clothing / Fashion');

-- --------------------------------------------------------

--
-- Table structure for table `register`
--
-- Error reading structure for table dbs.register: #1932 - Table &#039;dbs.register&#039; doesn&#039;t exist in engine
-- Error reading data for table dbs.register: #1064 - You have an error in your SQL syntax; check the manual that corresponds to your MariaDB server version for the right syntax to use near &#039;FROM `dbs`.`register`&#039; at line 1

-- --------------------------------------------------------

--
-- Table structure for table `registers`
--

CREATE TABLE `registers` (
  `id` int(11) NOT NULL,
  `username` varchar(50) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `password` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `registers`
--

INSERT INTO `registers` (`id`, `username`, `email`, `password`) VALUES
(1, 'tom', 'tom@gmail.com', '$2y$10$zxbfE0/oYhBllh5BiEsVVejardo2t0sAOTvdoRv3M7loVipBiwQaa'),
(2, 'jery', 'tom@gmail.com', '$2y$10$6DsUsbYKO4abr0CQdcK2/.ZtfzngIVpkj6wvuFwtF8cmOOxTcCWy2');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `booktitle` varchar(50) DEFAULT NULL,
  `authorname` varchar(40) DEFAULT NULL,
  `genre` varchar(79) DEFAULT NULL,
  `totalcopy` int(11) DEFAULT NULL,
  `availablcopy` int(11) DEFAULT NULL,
  `image` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `booktitle`, `authorname`, `genre`, `totalcopy`, `availablcopy`, `image`) VALUES
(2, 'php', 'nikshta', 'self hel', 10, 4, NULL),
(3, 'js', 'covina', 'fiction', 29, 10, NULL),
(4, 'c', 'hems', 'self help', 40, 34, NULL),
(5, 'java', 'gooble', 'fiction', 49, 12, NULL),
(7, 'jav', 'slsl', 'slls', 20, 12, NULL),
(8, 'q', 'sa', 'ew', 20, 12, NULL),
(9, 'f', 'dd', 'f', 12, 12, NULL),
(10, 'w', 'e', 'e', 13, 12, NULL),
(11, 'q', 'ws', 's', 12, 12, NULL),
(12, 'q', 'e', 'd', 13, 12, NULL),
(13, 'd', 'f', 'f', 21, 12, 'alexa.jpg'),
(14, 'j', 'j', 'j', 12, 21, 'zebra.jpg'),
(15, '', '', '', 0, 0, 'birds.jpg'),
(16, '', '', '', 0, 0, ''),
(17, 'piza', 'dkks', '32', 34, 12, 'piza.jpg');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `menu`
--
ALTER TABLE `menu`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `registers`
--
ALTER TABLE `registers`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `menu`
--
ALTER TABLE `menu`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `registers`
--
ALTER TABLE `registers`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
