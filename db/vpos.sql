-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Apr 28, 2017 at 09:17 AM
-- Server version: 10.1.19-MariaDB
-- PHP Version: 7.0.13

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `vpos`
--

-- --------------------------------------------------------

--
-- Table structure for table `customer`
--

CREATE TABLE `customer` (
  `customer_id` int(11) NOT NULL,
  `first_name` varchar(60) NOT NULL,
  `last_name` varchar(60) NOT NULL,
  `gender` enum('M','F') NOT NULL,
  `email` varchar(255) NOT NULL,
  `phone_number` bigint(20) NOT NULL,
  `address_one` varchar(255) NOT NULL,
  `address_two` varchar(255) NOT NULL,
  `city` varchar(100) NOT NULL,
  `state` varchar(60) NOT NULL,
  `zip` int(11) NOT NULL,
  `country` varchar(150) NOT NULL,
  `comments` text NOT NULL,
  `company` varchar(255) NOT NULL,
  `account` bigint(20) NOT NULL,
  `total` int(11) NOT NULL,
  `discount` int(3) NOT NULL,
  `taxable` enum('Y','N') NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `customer`
--

INSERT INTO `customer` (`customer_id`, `first_name`, `last_name`, `gender`, `email`, `phone_number`, `address_one`, `address_two`, `city`, `state`, `zip`, `country`, `comments`, `company`, `account`, `total`, `discount`, `taxable`, `created_at`, `updated_at`) VALUES
(3, 'surendar', 'dreamchaser', 'M', 'dreamchaser@gmail.com', 9659869830, 'no 123 main street', 'no 123 main street', 'villupuram', 'tamil nadu', 605652, 'india', 'awesome  customer', 'vpage', 46516165161, 5161, 50, 'N', '2017-04-24 10:59:29', '2017-04-24 10:58:53');

-- --------------------------------------------------------

--
-- Table structure for table `items`
--

CREATE TABLE `items` (
  `item_id` int(11) NOT NULL,
  `upc_ean_isbn` bigint(20) NOT NULL,
  `item_name` varchar(255) NOT NULL,
  `category` varchar(120) NOT NULL,
  `supplier_fk` int(11) NOT NULL,
  `cost_price` int(11) NOT NULL,
  `retail_price` int(11) NOT NULL,
  `tax_one` int(11) NOT NULL,
  `tax-two` int(11) NOT NULL,
  `quantity_stock` int(11) NOT NULL,
  `receiving_quantity` int(11) NOT NULL,
  `description` text NOT NULL,
  `avatar` varchar(255) NOT NULL,
  `allow_alt_description` enum('Y','N') NOT NULL DEFAULT 'Y',
  `item_has_serial_number` enum('Y','N') NOT NULL DEFAULT 'Y',
  `deleted` enum('Y','N') NOT NULL DEFAULT 'Y'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `items`
--

INSERT INTO `items` (`item_id`, `upc_ean_isbn`, `item_name`, `category`, `supplier_fk`, `cost_price`, `retail_price`, `tax_one`, `tax-two`, `quantity_stock`, `receiving_quantity`, `description`, `avatar`, `allow_alt_description`, `item_has_serial_number`, `deleted`) VALUES
(1, 468511615, 'water bottle', 'water', 1, 455, 500, 10, 10, 1, 1, 'awesome ', '', 'Y', 'Y', 'Y');

-- --------------------------------------------------------

--
-- Table structure for table `supplier`
--

CREATE TABLE `supplier` (
  `supplier_id` int(11) NOT NULL,
  `company_name` varchar(100) NOT NULL,
  `agency_name` varchar(100) DEFAULT NULL,
  `first_name` varchar(60) NOT NULL,
  `last_name` varchar(60) NOT NULL,
  `gender` enum('M','F') DEFAULT NULL,
  `email` varchar(100) DEFAULT NULL,
  `phone_number` bigint(20) DEFAULT NULL,
  `address_one` varchar(255) DEFAULT NULL,
  `address_two` varchar(255) DEFAULT NULL,
  `city` varchar(150) DEFAULT NULL,
  `state` varchar(120) DEFAULT NULL,
  `zip` int(11) DEFAULT NULL,
  `country` varchar(120) DEFAULT NULL,
  `comments` text,
  `account` bigint(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `supplier`
--

INSERT INTO `supplier` (`supplier_id`, `company_name`, `agency_name`, `first_name`, `last_name`, `gender`, `email`, `phone_number`, `address_one`, `address_two`, `city`, `state`, `zip`, `country`, `comments`, `account`) VALUES
(1, 'Sure Water Resources', 'Sure Water Resources', 'surendar', 'kalyanam', 'M', 'surea17@yahoo.com', 9659869830, 'No 123 Main street', 'No 123 Sub Main street', 'villupuram', 'Tamil Nadu', 605652, 'India', 'Awesome Supplier', 489461684644848),
(2, 'sure ', 'sure ', 'sure', 'k', 'M', 'sure17@gmail.com', 9659869830, 'no 123 main street', 'no 123 sub main street', 'villupuram', 'tamil nadu', 605652, 'india', 'awesome supplier again..', 5681949499484),
(3, 'vijay builders', 'vijay builders', 'vijay', 'cse', 'M', 'vijaytest@gmail.com', 9659869830, 'no 123 Main street ', 'no 123 sub main street', 'villupuram', 'tamil nadu', 605652, 'india', 'another awesome supplier', 1841984894984),
(4, 'vpage ', 'Vpage', 'surendar', 'kalyanam', 'M', 'surea17@yahoo.com', 9659869830, 'No 123 Main street', 'No 123 Sub Main street', 'villupuram', 'Tamil Nadu', 605652, 'India', 'Awesome Supplier', 489461684644848);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `customer`
--
ALTER TABLE `customer`
  ADD PRIMARY KEY (`customer_id`);

--
-- Indexes for table `items`
--
ALTER TABLE `items`
  ADD PRIMARY KEY (`item_id`),
  ADD KEY `supplier_id` (`supplier_fk`);

--
-- Indexes for table `supplier`
--
ALTER TABLE `supplier`
  ADD PRIMARY KEY (`supplier_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `customer`
--
ALTER TABLE `customer`
  MODIFY `customer_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `items`
--
ALTER TABLE `items`
  MODIFY `item_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `supplier`
--
ALTER TABLE `supplier`
  MODIFY `supplier_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `items`
--
ALTER TABLE `items`
  ADD CONSTRAINT `items_supplier_fk` FOREIGN KEY (`supplier_fk`) REFERENCES `supplier` (`supplier_id`) ON UPDATE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
