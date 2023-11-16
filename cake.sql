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

CREATE TABLE customers (
    customerID INT AUTO_INCREMENT PRIMARY KEY,
    firstName VARCHAR(50) NOT NULL,
    lastName VARCHAR(50) NOT NULL,
    email VARCHAR(100) NOT NULL,
    password VARCHAR(255) NOT NULL
);

CREATE TABLE categories (
    `categoryID` INT AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(50) NOT NULL
);

CREATE TABLE products (
    productID INT AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(255) NOT NULL,
    price DECIMAL(10, 2) NOT NULL,
    categoryID INT NOT NULL,
    FOREIGN KEY (categoryID) REFERENCES categories(categoryID)
);
/*The "orders" table stores information about orders made by customers, including the customer's ID, and the date of the order.*/
CREATE TABLE orders (
    orderID INT AUTO_INCREMENT PRIMARY KEY,
    customerID INT NOT NULL,
    orderDate DATE NOT NULL,
    FOREIGN KEY (customerID) REFERENCES customers(customerID)
);

/*The "orderDetails" table stores information about the products included in each order, including the order ID, product ID, and quantity.*/
CREATE TABLE orderDetails (
    orderID INT NOT NULL,
    productID INT NOT NULL,
    quantity INT NOT NULL,
    PRIMARY KEY (orderID, productID),
    FOREIGN KEY (orderID) REFERENCES orders(orderID),
    FOREIGN KEY (productID) REFERENCES products(productID)
);
--
-- Dumping data for table `cake`
--

INSERT INTO `products` (`productID`, `name`, `price`, `categoryID`, `description`, `image`) VALUES
(1, 'Snowballs (pack of 4)', 6.95, 1 ,'Delicious buns, coated in icing and coconut and filled with raspberry jam',  'https://frenchvillage.com/cdn/shop/files/snowballimage_720x.jpg'),
(2, 'Eton Mess Cake', 50.00, 2 ,'Deeee-licious raspberry & white chocolate sponge with marshmallow buttercream layers, 100% real irish jam & white chocolate chunks. ', 'https://frenchvillage.com/cdn/shop/products/etonmess_720x.jpg'),
(3, 'Kinder Bueno Cake', 48.50, 1 ,'Chocolate cake layered with hazelnut chocolate ganache and encased in a praline buttercream icing. ', 'https://frenchvillage.com/cdn/shop/products/Bueno_720x.jpg');

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
