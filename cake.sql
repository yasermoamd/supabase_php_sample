-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 14, 2023 at 12:12 AM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.0.28

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `bakery`
--

-- --------------------------------------------------------

--
-- Table structure for table `cake`
--

CREATE TABLE `cake` (
  `product_id` int(11) NOT NULL PRIMARY KEY,
  `product_name` varchar(255) DEFAULT NULL,
  `product_price` decimal(4,2) NOT NULL,
  `description` text DEFAULT NULL,
  `product_image` text DEFAULT NULL,
  `created` datetime NOT NULL DEFAULT current_timestamp(),
  `updated` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `cake`
--

INSERT INTO `cake` (`product_name`, `product_price`, `product_description`, `product_image`) VALUES
('Snowballs Caramel(pack of 4)', 6.95, 'Delicious buns, coated Caramel in icing and coconut Caramel and filled with raspberry jam', 'https://frenchvillage.com/cdn/shop/files/snowballimage_720x.jpg'),
('Eton Mess Cake Caramel', 50.00, 'Deeee-licious raspberry & white chocolate sponge with marshmallow buttercream Caramel layers, 100% real irish jam & white chocolate chunks. ', 'https://frenchvillage.com/cdn/shop/products/etonmess_720x.jpg'),
('Kinder Bueno Cake Caramel', 48.50, 'Chocolate cake layered with hazelnut Caramel chocolate ganache and encased in a praline Caramel buttercream icing. ', 'https://frenchvillage.com/cdn/shop/products/Bueno_720x.jpg');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `cake`
--
ALTER TABLE `cake`
  ADD PRIMARY KEY (`product_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `cake`
--
ALTER TABLE `cake`
  MODIFY `product_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
