-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: May 03, 2017 at 02:41 PM
-- Server version: 10.1.19-MariaDB
-- PHP Version: 7.0.13

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `vposs`
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
-- Table structure for table `employee`
--

CREATE TABLE `employee` (
  `employee_id` int(11) NOT NULL,
  `first_name` varchar(60) NOT NULL,
  `last_name` varchar(60) NOT NULL,
  `gender` enum('M','F') NOT NULL,
  `email` varchar(255) NOT NULL,
  `phone_number` varchar(255) NOT NULL,
  `address_one` varchar(160) NOT NULL,
  `address_two` varchar(160) NOT NULL,
  `city` varchar(100) NOT NULL,
  `state` text NOT NULL,
  `zip` int(11) NOT NULL,
  `country` varchar(160) NOT NULL,
  `comments` text NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `employee`
--

INSERT INTO `employee` (`employee_id`, `first_name`, `last_name`, `gender`, `email`, `phone_number`, `address_one`, `address_two`, `city`, `state`, `zip`, `country`, `comments`, `created_at`, `updated_at`) VALUES
(2, 'surendar', 'k', 'M', 'surea17@yahoo.com', '9659869830', 'no 123 main street,', 'vikkravandi', 'villupuram', 'Tamil Nadu', 605652, 'india', 'awesome employee', '2017-05-03 06:54:22', '2017-05-03 06:54:22'),
(4, 'arun', 'k', 'M', 'surea17@yahoo.com', '9659869830', 'no 123 main street,', 'vikkravandi', 'villupuram', 'Tamil Nadu', 605652, 'india', 'awesome employee', '2017-05-03 07:31:05', '2017-05-03 07:31:05'),
(5, 'arun', 's', 'M', 'surea17@yahoo.com', '9659869830', 'no 123 main street,', 'vikkravandi', 'villupuram', 'Tamil Nadu', 605652, 'india', 'awesome employee', '2017-05-03 07:31:05', '2017-05-02 19:31:47');

-- --------------------------------------------------------

--
-- Table structure for table `employee_login`
--

CREATE TABLE `employee_login` (
  `employee_login_id` int(11) NOT NULL,
  `employee_fk` int(11) NOT NULL,
  `user_name` varchar(60) NOT NULL,
  `password` varchar(60) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `employee_login`
--

INSERT INTO `employee_login` (`employee_login_id`, `employee_fk`, `user_name`, `password`, `created_at`, `updated_at`) VALUES
(1, 2, 'admin', 'password', '2017-05-03 10:11:37', '2017-05-03 10:11:37');

-- --------------------------------------------------------

--
-- Table structure for table `employee_permissions`
--

CREATE TABLE `employee_permissions` (
  `employee_permissions_id` int(11) NOT NULL,
  `employee_fk` int(11) NOT NULL,
  `customer` enum('Y','N') NOT NULL DEFAULT 'N',
  `items` enum('Y','N') NOT NULL DEFAULT 'N',
  `items_stock` enum('Y','N') NOT NULL DEFAULT 'N',
  `supplier` enum('Y','N') NOT NULL DEFAULT 'N',
  `reports` enum('Y','N') NOT NULL DEFAULT 'N',
  `reports_categories` enum('Y','N') NOT NULL DEFAULT 'N',
  `reports_customer` enum('Y','N') NOT NULL DEFAULT 'N',
  `reports_discount` enum('Y','N') NOT NULL DEFAULT 'N',
  `reports_employee` enum('Y','N') NOT NULL DEFAULT 'N',
  `reports_inventory` enum('Y','N') NOT NULL DEFAULT 'N',
  `reports_items` enum('Y','N') NOT NULL DEFAULT 'N',
  `reports_payments` enum('Y','N') NOT NULL DEFAULT 'N',
  `reports_recivings` enum('Y','N') NOT NULL DEFAULT 'N',
  `reports_sales` enum('Y','N') NOT NULL DEFAULT 'N',
  `reports_suppiler` enum('Y','N') NOT NULL DEFAULT 'N',
  `reports_taxes` enum('Y','N') NOT NULL DEFAULT 'N',
  `recivings` enum('Y','N') NOT NULL DEFAULT 'N',
  `recivings_stock` enum('Y','N') NOT NULL DEFAULT 'N',
  `sales` enum('Y','N') NOT NULL DEFAULT 'N',
  `sales_stock` enum('Y','N') NOT NULL DEFAULT 'N',
  `employee` enum('Y','N') NOT NULL DEFAULT 'N',
  `gift_cards` enum('Y','N') DEFAULT 'N',
  `messages` enum('Y','N') NOT NULL DEFAULT 'N',
  `store_config` enum('Y','N') NOT NULL DEFAULT 'N',
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `employee_permissions`
--

INSERT INTO `employee_permissions` (`employee_permissions_id`, `employee_fk`, `customer`, `items`, `items_stock`, `supplier`, `reports`, `reports_categories`, `reports_customer`, `reports_discount`, `reports_employee`, `reports_inventory`, `reports_items`, `reports_payments`, `reports_recivings`, `reports_sales`, `reports_suppiler`, `reports_taxes`, `recivings`, `recivings_stock`, `sales`, `sales_stock`, `employee`, `gift_cards`, `messages`, `store_config`, `created_at`, `updated_at`) VALUES
(1, 2, 'Y', 'Y', 'N', 'N', 'N', 'N', 'N', 'N', 'N', 'N', 'N', 'N', 'N', 'N', 'N', 'N', 'N', 'N', 'N', 'N', 'N', 'N', 'N', 'N', '2017-05-03 10:53:55', '2017-05-02 23:36:14');

-- --------------------------------------------------------

--
-- Table structure for table `gift_card`
--

CREATE TABLE `gift_card` (
  `gift_card_id` int(11) NOT NULL,
  `gift_card_number` bigint(20) NOT NULL,
  `gc_value` int(11) NOT NULL,
  `customer_fk` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `gift_card`
--

INSERT INTO `gift_card` (`gift_card_id`, `gift_card_number`, `gc_value`, `customer_fk`, `created_at`, `updated_at`) VALUES
(1, 1234569877888888, 100, 3, '2017-05-03 06:18:08', '2017-05-03 06:18:08'),
(2, 445555663333555, 200, 3, '2017-05-03 06:18:08', '2017-05-03 06:18:08'),
(3, 333333377888888, 300, 3, '2017-05-03 06:18:08', '2017-05-03 06:18:08');

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
  `tax_two` int(11) NOT NULL,
  `quantity_stock` int(11) NOT NULL,
  `receiving_quantity` int(11) NOT NULL,
  `description` text NOT NULL,
  `avatar` varchar(255) NOT NULL,
  `allow_alt_description` enum('Y','N') NOT NULL DEFAULT 'Y',
  `item_has_serial_number` enum('Y','N') NOT NULL DEFAULT 'Y',
  `deleted` enum('Y','N') NOT NULL DEFAULT 'Y',
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `items`
--

INSERT INTO `items` (`item_id`, `upc_ean_isbn`, `item_name`, `category`, `supplier_fk`, `cost_price`, `retail_price`, `tax_one`, `tax_two`, `quantity_stock`, `receiving_quantity`, `description`, `avatar`, `allow_alt_description`, `item_has_serial_number`, `deleted`, `created_at`, `updated_at`) VALUES
(4, 468511615, 'water Bottle 4', 'water', 1, 0, 500, 10, 10, 1, 1, 'awesome ', '', 'Y', 'Y', 'Y', '2017-05-03 06:19:30', '2017-05-03 06:39:01'),
(5, 468511615, 'water Bottle 2 ', 'water', 1, 0, 500, 10, 10, 1, 1, 'awesome ', '', 'Y', 'Y', 'Y', '2017-05-03 06:19:30', '2017-05-03 06:19:30'),
(7, 468511615, 'water Bottle 3 ', 'water', 1, 0, 500, 10, 10, 1, 1, 'awesome ', '', 'Y', 'Y', 'Y', '2017-05-03 06:19:30', '2017-05-03 06:19:30'),
(8, 468511615, 'water Bottle 3 ', 'water', 1, 0, 500, 10, 10, 1, 1, 'awesome ', '', 'Y', 'Y', 'Y', '2017-05-03 06:19:30', '2017-05-03 06:19:30');

-- --------------------------------------------------------

--
-- Table structure for table `item_kits`
--

CREATE TABLE `item_kits` (
  `item_kit_id` int(11) NOT NULL,
  `item_kit_name` varchar(255) NOT NULL,
  `item_kit_desc` text NOT NULL,
  `item_fk` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `update_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `item_kits`
--

INSERT INTO `item_kits` (`item_kit_id`, `item_kit_name`, `item_kit_desc`, `item_fk`, `created_at`, `update_at`) VALUES
(9, 'item kit name 2', 'item kit des 2', 4, '2017-05-03 06:20:24', '2017-05-03 06:20:24');

-- --------------------------------------------------------

--
-- Table structure for table `sales`
--

CREATE TABLE `sales` (
  `sales_id` int(11) NOT NULL,
  `customer_fk` int(11) NOT NULL,
  `item_fk` int(11) NOT NULL,
  `amount_due` int(11) NOT NULL,
  `amount_tendered` int(11) NOT NULL,
  `change_due` int(11) DEFAULT NULL,
  `type` varchar(255) NOT NULL,
  `invoice` text NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `sales`
--

INSERT INTO `sales` (`sales_id`, `customer_fk`, `item_fk`, `amount_due`, `amount_tendered`, `change_due`, `type`, `invoice`, `created_at`, `updated_at`) VALUES
(1, 3, 4, 100, 100, 10, 'cash 10', 'random text ...', '2017-05-03 06:21:36', '2017-05-03 06:21:36'),
(2, 3, 4, 20, 10000, 20, 'cash 20', 'random text 2', '2017-05-03 06:21:36', '2017-05-03 06:21:36');

-- --------------------------------------------------------

--
-- Table structure for table `store_config`
--

CREATE TABLE `store_config` (
  `store_config_info_id` int(11) NOT NULL,
  `company_name` varchar(255) NOT NULL,
  `company_logo` varchar(255) NOT NULL,
  `company_address` text NOT NULL,
  `website` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `company_phonenumber` bigint(20) NOT NULL,
  `fax` varchar(255) NOT NULL,
  `return_policy` text NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `store_config`
--

INSERT INTO `store_config` (`store_config_info_id`, `company_name`, `company_logo`, `company_address`, `website`, `email`, `company_phonenumber`, `fax`, `return_policy`, `created_at`, `updated_at`) VALUES
(1, 'Vpage ', 'Vpage logo', 'vpage ,\r\nRamakrishna Street,\r\nKodampakkam.\r\nchennai.', 'http://vpageinc.com', 'vpagedevelopment@gmail.com', 6399999, 'fax', 'no return until the product as bug in it when we provide to you...', '2017-05-03 12:39:32', '2017-05-03 12:39:32');

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
  `account` bigint(20) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `supplier`
--

INSERT INTO `supplier` (`supplier_id`, `company_name`, `agency_name`, `first_name`, `last_name`, `gender`, `email`, `phone_number`, `address_one`, `address_two`, `city`, `state`, `zip`, `country`, `comments`, `account`, `created_at`, `updated_at`) VALUES
(1, 'Sure Water Resources', 'Sure Water Resources', 'surendar', 'kalyanam', 'M', 'surea17@yahoo.com', 9659869830, 'No 123 Main street', 'No 123 Sub Main street', 'villupuram', 'Tamil Nadu', 605652, 'India', 'Awesome Supplier', 489461684644848, '2017-05-03 06:22:32', '2017-05-03 06:22:32'),
(2, 'sure ', 'sure ', 'sure', 'k', 'M', 'sure17@gmail.com', 9659869830, 'no 123 main street', 'no 123 sub main street', 'villupuram', 'tamil nadu', 605652, 'india', 'awesome supplier again..', 5681949499484, '2017-05-03 06:22:32', '2017-05-03 06:22:32'),
(3, 'vijay builders', 'vijay builders', 'vijay', 'cse', 'M', 'vijaytest@gmail.com', 9659869830, 'no 123 Main street ', 'no 123 sub main street', 'villupuram', 'tamil nadu', 605652, 'india', 'another awesome supplier', 1841984894984, '2017-05-03 06:22:32', '2017-05-03 06:22:32'),
(4, 'vpage ', 'Vpage', 'surendar', 'kalyanam', 'M', 'surea17@yahoo.com', 9659869830, 'No 123 Main street', 'No 123 Sub Main street', 'villupuram', 'Tamil Nadu', 605652, 'India', 'Awesome Supplier', 489461684644848, '2017-05-03 06:22:32', '2017-05-03 06:22:32');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `customer`
--
ALTER TABLE `customer`
  ADD PRIMARY KEY (`customer_id`);

--
-- Indexes for table `employee`
--
ALTER TABLE `employee`
  ADD PRIMARY KEY (`employee_id`);

--
-- Indexes for table `employee_login`
--
ALTER TABLE `employee_login`
  ADD PRIMARY KEY (`employee_login_id`),
  ADD KEY `employee_fk` (`employee_fk`);

--
-- Indexes for table `employee_permissions`
--
ALTER TABLE `employee_permissions`
  ADD PRIMARY KEY (`employee_permissions_id`),
  ADD KEY `employee_fk` (`employee_fk`);

--
-- Indexes for table `gift_card`
--
ALTER TABLE `gift_card`
  ADD PRIMARY KEY (`gift_card_id`),
  ADD KEY `customer_fk` (`customer_fk`);

--
-- Indexes for table `items`
--
ALTER TABLE `items`
  ADD PRIMARY KEY (`item_id`),
  ADD KEY `supplier_fk` (`supplier_fk`);

--
-- Indexes for table `item_kits`
--
ALTER TABLE `item_kits`
  ADD PRIMARY KEY (`item_kit_id`),
  ADD KEY `item_fk` (`item_fk`);

--
-- Indexes for table `sales`
--
ALTER TABLE `sales`
  ADD PRIMARY KEY (`sales_id`),
  ADD KEY `customer_fk` (`customer_fk`),
  ADD KEY `item_fk` (`item_fk`);

--
-- Indexes for table `store_config`
--
ALTER TABLE `store_config`
  ADD PRIMARY KEY (`store_config_info_id`);

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
-- AUTO_INCREMENT for table `employee`
--
ALTER TABLE `employee`
  MODIFY `employee_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `employee_login`
--
ALTER TABLE `employee_login`
  MODIFY `employee_login_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
--
-- AUTO_INCREMENT for table `employee_permissions`
--
ALTER TABLE `employee_permissions`
  MODIFY `employee_permissions_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `gift_card`
--
ALTER TABLE `gift_card`
  MODIFY `gift_card_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `items`
--
ALTER TABLE `items`
  MODIFY `item_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
--
-- AUTO_INCREMENT for table `item_kits`
--
ALTER TABLE `item_kits`
  MODIFY `item_kit_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
--
-- AUTO_INCREMENT for table `sales`
--
ALTER TABLE `sales`
  MODIFY `sales_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `store_config`
--
ALTER TABLE `store_config`
  MODIFY `store_config_info_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `supplier`
--
ALTER TABLE `supplier`
  MODIFY `supplier_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `employee_login`
--
ALTER TABLE `employee_login`
  ADD CONSTRAINT `employee_fk` FOREIGN KEY (`employee_fk`) REFERENCES `employee` (`employee_id`);

--
-- Constraints for table `employee_permissions`
--
ALTER TABLE `employee_permissions`
  ADD CONSTRAINT `permission_employee_fk` FOREIGN KEY (`employee_fk`) REFERENCES `employee` (`employee_id`);

--
-- Constraints for table `gift_card`
--
ALTER TABLE `gift_card`
  ADD CONSTRAINT `customer_gift_fk` FOREIGN KEY (`customer_fk`) REFERENCES `customer` (`customer_id`) ON UPDATE CASCADE;

--
-- Constraints for table `items`
--
ALTER TABLE `items`
  ADD CONSTRAINT `supplier_of _item_fk` FOREIGN KEY (`supplier_fk`) REFERENCES `supplier` (`supplier_id`) ON DELETE NO ACTION ON UPDATE CASCADE;

--
-- Constraints for table `item_kits`
--
ALTER TABLE `item_kits`
  ADD CONSTRAINT `item_kit_fk` FOREIGN KEY (`item_fk`) REFERENCES `items` (`item_id`) ON DELETE NO ACTION ON UPDATE CASCADE;

--
-- Constraints for table `sales`
--
ALTER TABLE `sales`
  ADD CONSTRAINT `sales_customer_fk` FOREIGN KEY (`customer_fk`) REFERENCES `customer` (`customer_id`) ON DELETE NO ACTION ON UPDATE CASCADE,
  ADD CONSTRAINT `sales_item_fk` FOREIGN KEY (`item_fk`) REFERENCES `items` (`item_id`) ON DELETE NO ACTION ON UPDATE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
