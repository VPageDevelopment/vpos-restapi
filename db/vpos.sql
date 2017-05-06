-- phpMyAdmin SQL Dump
-- version 4.6.5.2
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: May 06, 2017 at 06:55 AM
-- Server version: 10.1.21-MariaDB
-- PHP Version: 7.1.1

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
(1, 2, 'admin', '$2y$10$gedhMvDU5DpqCjrRATJyYeNokSyoaDoSgDGw48f4PxjDWMClYm39W', '2017-05-03 10:11:37', '2017-05-03 10:11:37'),
(2, 4, 'emp1', '$2y$10$W8L1CYXHM2HDmTnUIdvBVOUrWPqEUGznQ1.Yn5A62JMNlHbIuXOvq', '2017-05-05 12:26:29', '2017-05-05 12:26:29');

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
(1, 'Vpage Inc', 'Vpage logo', 'vpageince ,Ramakrishna Street ,Kodampakkam.chennai.', 'http://vpageinc.com', 'vpagedevelopment@gmail.com', 6399999, 'fax', 'no return until the product as bug in it when we provide to you...', '2017-05-03 12:39:32', '2017-05-04 04:58:10');

-- --------------------------------------------------------

--
-- Table structure for table `store_config_barcode`
--

CREATE TABLE `store_config_barcode` (
  `sc_barcode_id` int(11) NOT NULL,
  `barcode_type` varchar(20) NOT NULL,
  `barcode_quality` int(3) NOT NULL,
  `barcode_width` int(4) NOT NULL,
  `barcode_height` int(11) NOT NULL,
  `font_family` varchar(20) NOT NULL,
  `font_size` int(5) NOT NULL,
  `barcode_content` varchar(20) NOT NULL,
  `barcode_layout_row_1` varchar(20) NOT NULL,
  `barcode_layout_row_2` varchar(20) NOT NULL,
  `barcode_layout_row_3` varchar(20) NOT NULL,
  `num_in_row` int(3) NOT NULL,
  `display_page_width` int(3) NOT NULL,
  `dispaly_page_cellspacing` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `store_config_barcode`
--

INSERT INTO `store_config_barcode` (`sc_barcode_id`, `barcode_type`, `barcode_quality`, `barcode_width`, `barcode_height`, `font_family`, `font_size`, `barcode_content`, `barcode_layout_row_1`, `barcode_layout_row_2`, `barcode_layout_row_3`, `num_in_row`, `display_page_width`, `dispaly_page_cellspacing`, `created_at`, `updated_at`) VALUES
(1, 'code39', 200, 200, 10, 'ubuntu', 10, '1', 'row content 1', 'row content 2', 'row content 3', 2, 100, 12, '2017-05-04 06:57:54', '2017-05-04 07:05:24');

-- --------------------------------------------------------

--
-- Table structure for table `store_config_general`
--

CREATE TABLE `store_config_general` (
  `sc_general_id` int(11) NOT NULL,
  `theme` varchar(30) NOT NULL,
  `tax_one` int(11) NOT NULL,
  `tax_two` int(11) NOT NULL,
  `tax_included` enum('Y','N') NOT NULL,
  `default_sale_discount` int(11) NOT NULL,
  `calc_aveg_price` enum('Y','N') NOT NULL,
  `lines_per_page` int(11) NOT NULL,
  `notification_popup_position_one` varchar(10) NOT NULL,
  `notification_popup_position_two` varchar(10) NOT NULL,
  `send_statistic` enum('Y','N') NOT NULL,
  `custom_field_1` varchar(30) DEFAULT NULL,
  `custom_field_2` varchar(30) DEFAULT NULL,
  `custom_field_3` varchar(30) DEFAULT NULL,
  `custom_field_4` varchar(30) DEFAULT NULL,
  `custom_field_5` varchar(30) DEFAULT NULL,
  `custom_field_6` varchar(30) DEFAULT NULL,
  `custom_field_7` varchar(30) DEFAULT NULL,
  `custom_field_8` varchar(30) DEFAULT NULL,
  `custom_field_9` varchar(30) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `store_config_general`
--

INSERT INTO `store_config_general` (`sc_general_id`, `theme`, `tax_one`, `tax_two`, `tax_included`, `default_sale_discount`, `calc_aveg_price`, `lines_per_page`, `notification_popup_position_one`, `notification_popup_position_two`, `send_statistic`, `custom_field_1`, `custom_field_2`, `custom_field_3`, `custom_field_4`, `custom_field_5`, `custom_field_6`, `custom_field_7`, `custom_field_8`, `custom_field_9`, `created_at`, `updated_at`) VALUES
(1, 'theme One', 10, 10, 'Y', 10, 'Y', 10, 'top', 'left', 'N', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2017-05-04 05:57:19', '2017-05-04 05:57:27');

-- --------------------------------------------------------

--
-- Table structure for table `store_config_invoice`
--

CREATE TABLE `store_config_invoice` (
  `sc_invoice_id` int(11) NOT NULL,
  `enable_invoice` enum('Y','N') NOT NULL,
  `sales_invoice_formate` varchar(20) NOT NULL,
  `receiving_invoice_formate` varchar(20) NOT NULL,
  `default_invoice_comments` text NOT NULL,
  `invoice_email_template` text NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `store_config_invoice`
--

INSERT INTO `store_config_invoice` (`sc_invoice_id`, `enable_invoice`, `sales_invoice_formate`, `receiving_invoice_formate`, `default_invoice_comments`, `invoice_email_template`, `created_at`, `updated_at`) VALUES
(1, 'Y', '$COU', '$CO', 'text', 'text', '2017-05-04 08:39:09', '2017-05-03 20:53:06');

-- --------------------------------------------------------

--
-- Table structure for table `store_config_localisation`
--

CREATE TABLE `store_config_localisation` (
  `sc_local_id` int(11) NOT NULL,
  `localisation` varchar(30) NOT NULL,
  `thousands_seperator` enum('Y','N') NOT NULL,
  `currency_symbol` varchar(10) NOT NULL,
  `currency_decimals` int(2) NOT NULL,
  `tax_decimals` int(2) NOT NULL,
  `quantity_decimals` int(2) NOT NULL,
  `payment_option_order` varchar(50) NOT NULL,
  `country_code` varchar(10) NOT NULL,
  `language` varchar(20) NOT NULL,
  `timezone` varchar(60) NOT NULL,
  `data_format` varchar(16) NOT NULL,
  `time_format` varchar(16) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `store_config_localisation`
--

INSERT INTO `store_config_localisation` (`sc_local_id`, `localisation`, `thousands_seperator`, `currency_symbol`, `currency_decimals`, `tax_decimals`, `quantity_decimals`, `payment_option_order`, `country_code`, `language`, `timezone`, `data_format`, `time_format`, `created_at`, `updated_at`) VALUES
(1, 'en_US', 'Y', '$', 2, 2, 0, 'Cash / Debit Card / Credit Card', 'us', 'english', '(GMT+05:30) Chennai , Mumbai', 'dd/mm/yyyy', 'hh:mm:ss am/pm', '2017-05-04 06:34:12', '2017-05-04 06:36:38');

-- --------------------------------------------------------

--
-- Table structure for table `store_config_mail`
--

CREATE TABLE `store_config_mail` (
  `sc_mail_id` int(11) NOT NULL,
  `protocol` varchar(30) NOT NULL,
  `path_to_sendmail` varchar(60) NOT NULL,
  `smpt_server` varchar(60) NOT NULL,
  `smpt_port` int(6) NOT NULL,
  `smpt_encryption` varchar(10) NOT NULL,
  `smpt_timeout` int(5) NOT NULL,
  `smpt_username` varchar(30) NOT NULL,
  `smpt_password` varchar(30) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `store_config_mail`
--

INSERT INTO `store_config_mail` (`sc_mail_id`, `protocol`, `path_to_sendmail`, `smpt_server`, `smpt_port`, `smpt_encryption`, `smpt_timeout`, `smpt_username`, `smpt_password`, `created_at`, `updated_at`) VALUES
(1, '', '', '', 0, '', 0, '', '', '2017-05-04 08:41:30', '2017-05-03 21:01:12');

-- --------------------------------------------------------

--
-- Table structure for table `store_config_message`
--

CREATE TABLE `store_config_message` (
  `sc_message_id` int(11) NOT NULL,
  `sms_api_username` varchar(30) NOT NULL,
  `sms_api_password` varchar(30) NOT NULL,
  `sms_api_sender_id` varchar(20) NOT NULL,
  `saved_text_message` text NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `store_config_message`
--

INSERT INTO `store_config_message` (`sc_message_id`, `sms_api_username`, `sms_api_password`, `sms_api_sender_id`, `saved_text_message`, `created_at`, `updated_at`) VALUES
(1, 'vpage', 'vpagepassword', 'vpageapi ', 'text', '2017-05-04 08:42:23', '2017-05-04 08:42:23');

-- --------------------------------------------------------

--
-- Table structure for table `store_config_receipt`
--

CREATE TABLE `store_config_receipt` (
  `sc_receipt_id` int(11) NOT NULL,
  `receipt_template` varchar(25) NOT NULL,
  `show_taxes` enum('Y','N') NOT NULL,
  `show_desc` enum('Y','N') NOT NULL,
  `show_sno` enum('Y','N') NOT NULL,
  `show_print_dialog` enum('Y','N') NOT NULL,
  `print_browser_header` enum('Y','N') NOT NULL,
  `print_browser_footer` enum('Y','N') NOT NULL,
  `ticket_printer` varchar(20) NOT NULL,
  `invoice_printer` varchar(20) NOT NULL,
  `takings_printer` varchar(20) NOT NULL,
  `margin_top` int(4) NOT NULL,
  `margin_left` int(4) NOT NULL,
  `margin_bottom` int(4) NOT NULL,
  `margin_right` int(4) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `store_config_receipt`
--

INSERT INTO `store_config_receipt` (`sc_receipt_id`, `receipt_template`, `show_taxes`, `show_desc`, `show_sno`, `show_print_dialog`, `print_browser_header`, `print_browser_footer`, `ticket_printer`, `invoice_printer`, `takings_printer`, `margin_top`, `margin_left`, `margin_bottom`, `margin_right`, `created_at`, `updated_at`) VALUES
(1, 'short ', 'N', 'N', 'N', 'N', 'N', 'N', 'N/A', 'N/A', 'N/A', 0, 0, 0, 0, '2017-05-04 08:21:52', '2017-05-03 20:22:01');

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
-- Indexes for table `store_config_barcode`
--
ALTER TABLE `store_config_barcode`
  ADD PRIMARY KEY (`sc_barcode_id`);

--
-- Indexes for table `store_config_general`
--
ALTER TABLE `store_config_general`
  ADD PRIMARY KEY (`sc_general_id`);

--
-- Indexes for table `store_config_invoice`
--
ALTER TABLE `store_config_invoice`
  ADD PRIMARY KEY (`sc_invoice_id`);

--
-- Indexes for table `store_config_localisation`
--
ALTER TABLE `store_config_localisation`
  ADD PRIMARY KEY (`sc_local_id`);

--
-- Indexes for table `store_config_mail`
--
ALTER TABLE `store_config_mail`
  ADD PRIMARY KEY (`sc_mail_id`);

--
-- Indexes for table `store_config_message`
--
ALTER TABLE `store_config_message`
  ADD PRIMARY KEY (`sc_message_id`);

--
-- Indexes for table `store_config_receipt`
--
ALTER TABLE `store_config_receipt`
  ADD PRIMARY KEY (`sc_receipt_id`);

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
  MODIFY `employee_login_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `employee_permissions`
--
ALTER TABLE `employee_permissions`
  MODIFY `employee_permissions_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `gift_card`
--
ALTER TABLE `gift_card`
  MODIFY `gift_card_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
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
-- AUTO_INCREMENT for table `store_config_barcode`
--
ALTER TABLE `store_config_barcode`
  MODIFY `sc_barcode_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `store_config_general`
--
ALTER TABLE `store_config_general`
  MODIFY `sc_general_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `store_config_invoice`
--
ALTER TABLE `store_config_invoice`
  MODIFY `sc_invoice_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `store_config_localisation`
--
ALTER TABLE `store_config_localisation`
  MODIFY `sc_local_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `store_config_mail`
--
ALTER TABLE `store_config_mail`
  MODIFY `sc_mail_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `store_config_message`
--
ALTER TABLE `store_config_message`
  MODIFY `sc_message_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `store_config_receipt`
--
ALTER TABLE `store_config_receipt`
  MODIFY `sc_receipt_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
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
