-- phpMyAdmin SQL Dump
-- version 4.8.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 14, 2020 at 05:14 PM
-- Server version: 10.1.34-MariaDB
-- PHP Version: 7.0.31

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `hudson_export`
--

-- --------------------------------------------------------

--
-- Table structure for table `state`
--

CREATE TABLE `state` (
  `id` int(11) NOT NULL,
  `country_id` int(11) NOT NULL,
  `name` varchar(60) NOT NULL,
  `status` enum('Active','Inactive') NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `state`
--

INSERT INTO `state` (`id`, `country_id`, `name`, `status`, `created_at`, `updated_at`) VALUES
(1, 1, 'California', 'Active', '2020-08-04 05:03:49', '2020-08-04 12:04:16'),
(2, 2, 'Delhi', 'Active', '2020-08-04 05:03:49', '2020-08-04 12:04:06');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_admin_login`
--

CREATE TABLE `tbl_admin_login` (
  `id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `mobile_no` varchar(20) NOT NULL,
  `email` varchar(50) NOT NULL,
  `password` text NOT NULL,
  `status` enum('Active','Inactive') NOT NULL,
  `verify_status` enum('1','0') NOT NULL DEFAULT '0' COMMENT '1- verified, 0 - not verified',
  `company_name` varchar(50) NOT NULL,
  `country` int(11) NOT NULL,
  `role` enum('superadmin','seller') NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_admin_login`
--

INSERT INTO `tbl_admin_login` (`id`, `name`, `mobile_no`, `email`, `password`, `status`, `verify_status`, `company_name`, `country`, `role`, `created_at`, `updated_at`) VALUES
(1, 'Hudson Export', '7987482833', 'info@hudsonventures.com', 'e10adc3949ba59abbe56e057f20f883e', 'Active', '1', 'Hudson Agile ventures ', 1, 'seller', '2020-07-25 06:23:46', '2020-10-13 10:09:45');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_brands`
--

CREATE TABLE `tbl_brands` (
  `id` int(10) NOT NULL,
  `tbl_brand_name` text NOT NULL,
  `icon` text NOT NULL,
  `status` enum('Active','Inactive') NOT NULL COMMENT '0 for active and 1 for non active',
  `tbl_brand_deleted` varchar(1) NOT NULL DEFAULT '0' COMMENT '0 for not deleted and 1 for deleted',
  `created_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_brands`
--

INSERT INTO `tbl_brands` (`id`, `tbl_brand_name`, `icon`, `status`, `tbl_brand_deleted`, `created_at`, `updated_at`) VALUES
(1, 'apple', 'images\\2020\\sep\\18\\homebanner1.jpg', 'Active', '0', '2020-07-25 05:43:48', '2020-10-03 08:08:47'),
(2, 'Samsung', 'images/2020/jul/25/brnd_a33528e10f331bdc5e1a9abc1d255744.png', 'Active', '0', '2020-07-25 06:17:42', '2020-07-25 13:17:42');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_cart`
--

CREATE TABLE `tbl_cart` (
  `id` int(11) NOT NULL,
  `tbl_user_id` int(11) DEFAULT NULL,
  `tbl_product_id` int(11) DEFAULT NULL,
  `seller_id` int(11) NOT NULL,
  `color_id` int(11) NOT NULL,
  `size` varchar(255) NOT NULL,
  `tbl_quantity` varchar(255) DEFAULT NULL,
  `tbl_added_date` datetime DEFAULT NULL,
  `tbl_order_id` int(10) NOT NULL DEFAULT '0',
  `tbl_cart_status` varchar(3) NOT NULL DEFAULT '0' COMMENT 'Starting from 1,if status is 1 then product is in cart,if status is 2 then order is placed and order id is generated.',
  `tbl_product_price` decimal(10,2) NOT NULL DEFAULT '0.00',
  `total_price` float DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_cart`
--

INSERT INTO `tbl_cart` (`id`, `tbl_user_id`, `tbl_product_id`, `seller_id`, `color_id`, `size`, `tbl_quantity`, `tbl_added_date`, `tbl_order_id`, `tbl_cart_status`, `tbl_product_price`, `total_price`) VALUES
(4, 1, 2, 1, 0, '0', '1', '2020-08-17 18:23:54', 0, '0', '6.00', 6),
(5, 3, 3, 1, 0, '0', '1', '2020-09-30 14:24:00', 0, '0', '6.00', 6),
(6, 4, 4, 1, 0, '0', '', '2020-10-01 16:51:59', 0, '0', '6.00', 0),
(9, 6, 2, 1, 0, '0', '', '2020-10-10 18:33:19', 0, '0', '6.00', 0),
(10, 6, 4, 1, 0, '0', '2', '2020-10-10 18:48:41', 0, '0', '6.00', 12),
(12, 8, 4, 1, 0, '0', '', '2020-10-13 15:02:29', 0, '0', '6.00', 0);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_category`
--

CREATE TABLE `tbl_category` (
  `id` int(11) NOT NULL,
  `category_name` varchar(50) NOT NULL,
  `img` varchar(255) DEFAULT NULL,
  `status` enum('Active','Inactive') NOT NULL DEFAULT 'Active',
  `created_at` datetime NOT NULL,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `created_by` int(11) NOT NULL,
  `updated_by` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_category`
--

INSERT INTO `tbl_category` (`id`, `category_name`, `img`, `status`, `created_at`, `updated_at`, `created_by`, `updated_by`) VALUES
(1, 'Other Collections', 'images/2020/oct/12/cat_ccdccd7ce2307eee038b674d3317cce9.jpg', 'Active', '2020-07-23 04:36:08', '2020-10-11 22:19:14', 1, 1),
(2, 'Decor', 'images/2020/oct/12/cat_68b3efca3b47aad3f615ec3b3ec65562.jpeg', 'Active', '2020-07-23 04:36:08', '2020-10-11 22:18:52', 1, 1),
(3, 'Accessories', 'images/2020/oct/12/cat_bb9e6a443887c96a29ef84a5686da269.jpg', 'Active', '2020-07-23 04:36:08', '2020-10-11 22:17:37', 1, 1),
(4, 'Tools', 'images/2020/oct/12/cat_edbf6a6f0d84fdaddf7979c0dad39420.jpg', 'Active', '2020-07-23 04:36:08', '2020-10-11 22:18:05', 1, 1),
(5, 'Mask', 'images/2020/oct/12/cat_6bb8b0d0a78c76c5ed9676203640c41f.jpg', 'Active', '2020-10-12 03:41:51', '2020-10-11 22:16:41', 1, 1),
(6, 'Kid\'s Collection', 'images/2020/oct/12/cat_9ec67a1a0a8e4b9736ce5886c48b2218.jpg', 'Active', '2020-10-12 03:42:36', '2020-10-11 22:16:20', 1, 1),
(7, 'Men\'s Collection', 'images/2020/oct/12/cat_ba6fc30cd2ae61a7824a36859e55addb.jpg', 'Active', '2020-10-12 03:43:01', '2020-10-11 22:15:35', 1, 1),
(8, 'Womens Collection', 'images/2020/oct/12/cat_445fd97be7a5d7a1cfa9c5df7aa54289.jpg', 'Active', '2020-10-12 03:43:24', '2020-10-11 22:14:46', 1, 1);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_color`
--

CREATE TABLE `tbl_color` (
  `id` int(11) NOT NULL,
  `color_name` varchar(50) NOT NULL,
  `status` enum('Active','Inactive') NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_color`
--

INSERT INTO `tbl_color` (`id`, `color_name`, `status`, `created_at`, `updated_at`) VALUES
(1, 'Red', 'Active', '2020-07-25 06:28:33', '2020-10-03 09:00:06');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_country`
--

CREATE TABLE `tbl_country` (
  `id` int(11) NOT NULL,
  `name` varchar(60) NOT NULL,
  `status` enum('Active','Inactive') NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_country`
--

INSERT INTO `tbl_country` (`id`, `name`, `status`, `created_at`, `updated_at`) VALUES
(1, 'USA', 'Active', '2020-08-04 05:00:43', '2020-08-04 12:00:58'),
(2, 'India', 'Active', '2020-08-04 05:01:26', '2020-08-04 12:01:39');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_customer`
--

CREATE TABLE `tbl_customer` (
  `id` int(11) NOT NULL,
  `full_name` varchar(100) NOT NULL,
  `mobile_no` varchar(20) NOT NULL,
  `password` varchar(255) NOT NULL,
  `email` varchar(100) NOT NULL,
  `address_1` text NOT NULL,
  `address_2` text NOT NULL,
  `country` int(11) NOT NULL,
  `state` int(11) NOT NULL,
  `city` varchar(100) NOT NULL,
  `pincode` varchar(20) DEFAULT NULL,
  `landmark` varchar(50) DEFAULT NULL,
  `latitude` varchar(50) DEFAULT NULL,
  `longitude` varchar(50) DEFAULT NULL,
  `ip` varchar(30) NOT NULL,
  `last_updated_ip` varchar(30) NOT NULL,
  `status` enum('Active','Inactive') NOT NULL DEFAULT 'Active',
  `otp_code` varchar(50) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `last_activity` datetime NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_customer`
--

INSERT INTO `tbl_customer` (`id`, `full_name`, `mobile_no`, `password`, `email`, `address_1`, `address_2`, `country`, `state`, `city`, `pincode`, `landmark`, `latitude`, `longitude`, `ip`, `last_updated_ip`, `status`, `otp_code`, `created_at`, `last_activity`) VALUES
(1, 'Hudson User', '9039958007', 'e10adc3949ba59abbe56e057f20f883e', 'hudson@gmail.com', 'vasant vihar', '', 2, 2, 'Delhi', '490011', NULL, NULL, NULL, '::1', '::1', 'Active', '99180', '2020-08-13 06:56:40', '2020-07-31 18:27:35'),
(3, 'nishu', '08105638402', '81dc9bdb52d04dc20036dbd8313ed055', 'nishu@gmail.com', 'null', '', 0, 0, '', NULL, NULL, NULL, NULL, '::1', '::1', 'Active', '46571', '2020-09-30 07:52:56', '2020-09-30 13:22:56'),
(4, 'NischithaMA', '08015638402', '81dc9bdb52d04dc20036dbd8313ed055', 'nishu@gmail.com', 'null', '', 0, 0, '', NULL, NULL, NULL, NULL, '::1', '::1', 'Active', '66160', '2020-10-01 11:29:35', '2020-10-01 16:59:35'),
(5, 'ramya divstyle', '9632308011', 'e10adc3949ba59abbe56e057f20f883e', 'ramyas2795@gmail.com', 'null', '', 0, 0, '', NULL, NULL, NULL, NULL, '::1', '::1', 'Active', '10624', '2020-10-03 10:22:02', '2020-10-03 15:24:54'),
(6, 'NischithaMA', '7987482833', '81dc9bdb52d04dc20036dbd8313ed055', 'nishu@gmail.com', 'null', '', 0, 0, '', NULL, NULL, NULL, NULL, '::1', '::1', 'Active', '37331', '2020-10-10 12:24:19', '2020-10-10 17:54:19'),
(7, 'NischithaMA ', '8015638402', '827ccb0eea8a706c4c34a16891f84e7b', 'nishu@gmail.com', 'null', '', 0, 0, '', NULL, NULL, NULL, NULL, '::1', '::1', 'Active', '93208', '2020-10-12 06:00:17', '2020-10-12 11:18:05'),
(8, 'nishu', '8105638402', '25f9e794323b453885f5181f1b624d0b', 'nishu@gmail.com', 'Chintamani', 'Kgn school', 1, 1, 'Town', '563125', NULL, NULL, NULL, '::1', '::1', 'Active', '91278', '2020-10-13 08:24:19', '2020-10-13 13:52:54');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_customer_address`
--

CREATE TABLE `tbl_customer_address` (
  `id` int(10) NOT NULL,
  `tbl_user_id` int(10) NOT NULL COMMENT 'id from tbl_customer',
  `order_id` int(11) DEFAULT NULL,
  `tbl_full_name` text,
  `tbl_city` text NOT NULL,
  `tbl_address_line` text NOT NULL,
  `addres_line2` text,
  `tbl_zipcode` varchar(15) NOT NULL,
  `tbl_state` text NOT NULL,
  `tbl_country` text,
  `tbl_shipping_address1` text,
  `tbl_shipping_address2` text,
  `tbl_shipping_country` int(11) DEFAULT NULL,
  `tbl_shipping_state` int(11) DEFAULT NULL,
  `tbl_shipping_city` varchar(60) DEFAULT NULL,
  `tbl_shipping_postalcode` varchar(20) DEFAULT NULL,
  `tbl_shipping_fullname` varchar(60) DEFAULT NULL,
  `tbl_address_active_status` int(1) DEFAULT NULL,
  `tbl_default_address` int(1) DEFAULT NULL,
  `delivery_address` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_customer_address`
--

INSERT INTO `tbl_customer_address` (`id`, `tbl_user_id`, `order_id`, `tbl_full_name`, `tbl_city`, `tbl_address_line`, `addres_line2`, `tbl_zipcode`, `tbl_state`, `tbl_country`, `tbl_shipping_address1`, `tbl_shipping_address2`, `tbl_shipping_country`, `tbl_shipping_state`, `tbl_shipping_city`, `tbl_shipping_postalcode`, `tbl_shipping_fullname`, `tbl_address_active_status`, `tbl_default_address`, `delivery_address`) VALUES
(1, 1, 0, 'AAkib jilani', 'Dhamtari', 'Near bus stand', '', '490012', '2', '2', '', '', 0, 0, '', '', '', NULL, NULL, 1),
(2, 1, NULL, 'AAkib  jilani', 'bhilai', 'bhilai', '', '490011', '2', '2', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1),
(3, 1, NULL, 'AAkib  jilani', 'Delhi', 'Chandni Chowk', '', '110001', '2', '2', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_enquiry`
--

CREATE TABLE `tbl_enquiry` (
  `id` int(11) NOT NULL,
  `seller_id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `mobile` varchar(20) NOT NULL,
  `email` varchar(100) DEFAULT NULL,
  `message` text NOT NULL,
  `required_quantity` varchar(50) DEFAULT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_enquiry`
--

INSERT INTO `tbl_enquiry` (`id`, `seller_id`, `product_id`, `name`, `mobile`, `email`, `message`, `required_quantity`, `created_at`, `updated_at`) VALUES
(1, 1, 1, 'shubham singh', '9039878008', 'shubham88210@gmail.com', 'Demo', '1', '2020-08-08 05:05:18', '2020-08-08 12:05:18'),
(2, 1, 18, 'Nischitha M A', '8015638402', 'nischitha660@gmail.com', 'send me product', '1', '2020-10-13 01:51:06', '2020-10-12 20:21:06');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_featured_product`
--

CREATE TABLE `tbl_featured_product` (
  `id` int(11) NOT NULL,
  `cat_id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `status` enum('Active','Inactive') NOT NULL DEFAULT 'Active',
  `created_at` datetime NOT NULL,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_featured_product`
--

INSERT INTO `tbl_featured_product` (`id`, `cat_id`, `product_id`, `status`, `created_at`, `updated_at`) VALUES
(1, 1, 1, 'Active', '2020-07-30 05:01:06', '2020-07-30 11:31:39'),
(2, 4, 2, 'Active', '2020-07-30 05:01:06', '2020-08-10 15:20:53'),
(3, 2, 3, 'Active', '2020-08-10 08:21:02', '2020-08-10 15:21:02'),
(4, 3, 4, 'Active', '2020-08-10 08:21:13', '2020-08-10 15:21:13');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_features_img`
--

CREATE TABLE `tbl_features_img` (
  `id` int(11) NOT NULL,
  `img_link` text NOT NULL,
  `status` enum('Active','Inactive') NOT NULL DEFAULT 'Active',
  `created_at` datetime NOT NULL,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_new_arrival`
--

CREATE TABLE `tbl_new_arrival` (
  `id` int(20) NOT NULL,
  `product_name` varchar(80) NOT NULL,
  `product_rate` varchar(80) NOT NULL,
  `product_price` varchar(80) NOT NULL,
  `status` varchar(20) DEFAULT 'Inactive',
  `created_date` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `update_date` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `product_image` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_new_arrival`
--

INSERT INTO `tbl_new_arrival` (`id`, `product_name`, `product_rate`, `product_price`, `status`, `created_date`, `update_date`, `product_image`) VALUES
(1, 'Knitted Jumper', '', '30.00', 'Active', '2020-10-11 19:39:28', '2020-10-11 19:39:28', 'arrival1.png'),
(2, 'Full Slive T-Shirt', '', '30.00', 'Active', '2020-10-11 19:39:28', '2020-10-11 19:39:28', 'arrival7.png'),
(3, 'Sneakers', '', '30.00', 'Active', '2020-10-11 19:39:28', '2020-10-11 19:39:28', 'arrival8.png'),
(4, 'Plain T-Shirt', '', '30.00', 'Active', '2020-10-11 19:39:28', '2020-10-11 19:39:28', 'arrival5.png'),
(5, 'Checks Shirt', '', '30.00', 'Active', '2020-10-11 19:39:28', '2020-10-11 19:39:28', 'arrival4.png'),
(6, 'Sun Glasses', '', '30.00', 'Active', '2020-10-11 19:39:28', '2020-10-11 19:39:28', 'arrival6.png'),
(7, 'Scarf', '', '30.00', 'Active', '2020-10-11 19:39:28', '2020-10-11 19:39:28', 'arrival2.png'),
(8, 'Plain Shirt', '', '30.00', 'Active', '2020-10-11 19:39:28', '2020-10-11 19:39:28', 'arrival3.png');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_order`
--

CREATE TABLE `tbl_order` (
  `id` int(11) NOT NULL,
  `tbl_display_order_id` varchar(15) NOT NULL,
  `tbl_product_id` int(11) DEFAULT NULL,
  `seller_id` int(11) NOT NULL,
  `color_id` int(11) DEFAULT NULL,
  `size` varchar(255) DEFAULT NULL,
  `tbl_order_quantity` int(11) DEFAULT NULL,
  `tbl_product_base_price` int(10) NOT NULL,
  `tbl_product_discount_percentage` int(3) DEFAULT NULL,
  `tbl_product_discount_amount` int(10) DEFAULT NULL,
  `tbl_product_delivery_charges` varchar(10) DEFAULT NULL,
  `tbl_total_amount` varchar(10) NOT NULL,
  `tbl_user_id` int(11) DEFAULT NULL,
  `tbl_delivery_address` text NOT NULL,
  `delivery_full_name` varchar(50) NOT NULL,
  `tbl_date_order` datetime DEFAULT CURRENT_TIMESTAMP,
  `tbl_delivery_date` date DEFAULT NULL COMMENT 'estimated',
  `tbl_order_status` varchar(255) DEFAULT 'Processing',
  `tbl_order_payment_mode` varchar(50) NOT NULL,
  `tbl_order_payment_transaction_id` varchar(255) DEFAULT NULL,
  `tbl_order_payment_status` varchar(25) DEFAULT NULL COMMENT 'Pending,Completed,Cancelled',
  `tbl_order_deleted` varchar(1) NOT NULL COMMENT '0 for non deleted and 1 for deleted',
  `customernote` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_order`
--

INSERT INTO `tbl_order` (`id`, `tbl_display_order_id`, `tbl_product_id`, `seller_id`, `color_id`, `size`, `tbl_order_quantity`, `tbl_product_base_price`, `tbl_product_discount_percentage`, `tbl_product_discount_amount`, `tbl_product_delivery_charges`, `tbl_total_amount`, `tbl_user_id`, `tbl_delivery_address`, `delivery_full_name`, `tbl_date_order`, `tbl_delivery_date`, `tbl_order_status`, `tbl_order_payment_mode`, `tbl_order_payment_transaction_id`, `tbl_order_payment_status`, `tbl_order_deleted`, `customernote`) VALUES
(1, 'Order_663782882', 2, 1, 0, '0', 12, 6, NULL, NULL, '0', '72', 1, 'Chandni Chowk <br>Delhi<br>Delhi<br>110001 India', 'AAkib  jilani', '2020-08-12 06:38:56', NULL, 'Processing', 'Cash on delivery', 'fa0faf0afc0e661857fc', 'Pending', '0', 'Special Order'),
(2, 'Order_77416294', 4, 1, 0, '0', 1, 6, NULL, NULL, '0', '6', 1, 'bhilai <br>bhilai<br>Delhi 490011 India', 'shalini singh', '2020-08-13 12:32:08', NULL, 'Processing', 'Cash on delivery', '257622f5a3f35c4bfdb1', 'Pending', '0', ''),
(3, 'Order_529499699', 2, 1, 0, '0', 1, 6, NULL, NULL, '0', '12', 1, 'bhilai <br>bhilai<br>Delhi 490011 India', 'shalini singh', '2020-08-13 12:32:08', NULL, 'Processing', 'Cash on delivery', '257622f5a3f35c4bfdb1', 'Pending', '0', ''),
(4, 'Order_502440785', 1, 1, 0, '0', 2, 12, NULL, NULL, '500', '24', 6, 'Chintamani Kgn school<br>Town<br>Delhi 563125 India', 'Nischitha MA', '2020-10-10 06:13:02', NULL, 'Processing', 'Direct Bank Transfer', 'e0a5399e4d84d06d5693', 'Pending', '0', ''),
(5, 'Order_208800210', 4, 1, 0, '0', 2, 6, NULL, NULL, '0', '12', 6, 'Chintamani Kgn school<br>Town<br>Delhi 563125 India', 'Nischitha MA', '2020-10-10 06:13:02', NULL, 'Processing', 'Direct Bank Transfer', 'e0a5399e4d84d06d5693', 'Pending', '0', ''),
(6, 'Order_107286809', 4, 1, 0, '0', 0, 6, NULL, NULL, '0', '0', 8, 'Chintamani Kgn school<br>Town<br>California 563125 USA', 'nishu reddy', '2020-10-13 01:54:18', NULL, 'Processing', 'Cash on delivery', 'd15aa383a77ace83a16d', 'Pending', '0', '');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_product`
--

CREATE TABLE `tbl_product` (
  `id` int(11) NOT NULL,
  `cat_id` int(11) NOT NULL,
  `subcat_id` int(11) DEFAULT NULL,
  `seller_id` int(11) NOT NULL,
  `brand_id` int(11) DEFAULT NULL,
  `product_name` varchar(50) NOT NULL,
  `product_code` varchar(255) NOT NULL,
  `product_price` varchar(50) NOT NULL,
  `product_pic` text NOT NULL,
  `product_full_description` text NOT NULL,
  `short_description` text NOT NULL,
  `search_keywords` text NOT NULL,
  `product_stock_availablity` enum('0','1') NOT NULL DEFAULT '1' COMMENT '1 - available , 0-out of stock',
  `status` enum('Active','Inactive') NOT NULL DEFAULT 'Active',
  `created_at` datetime NOT NULL,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_product`
--

INSERT INTO `tbl_product` (`id`, `cat_id`, `subcat_id`, `seller_id`, `brand_id`, `product_name`, `product_code`, `product_price`, `product_pic`, `product_full_description`, `short_description`, `search_keywords`, `product_stock_availablity`, `status`, `created_at`, `updated_at`) VALUES
(1, 1, 0, 1, 0, 'Kappa raincoat', '001', '12', 'images/2020/oct/12/pro_2da51aec8ab2673b3d92de16062fe452.jpg', '<h4 class=\"card-title\" style=\"box-sizing: border-box; margin-top: 0px; margin-bottom: 0.75rem; font-weight: 500; line-height: 1.2; font-size: 1.5rem; color: #212529; font-family: -apple-system, BlinkMacSystemFont, \'Segoe UI\', Roboto, \'Helvetica Neue\', Arial, \'Noto Sans\', sans-serif, \'Apple Color Emoji\', \'Segoe UI Emoji\', \'Segoe UI Symbol\', \'Noto Color Emoji\';\">Kappa raincoat</h4>', 'gud', 'raincoat,men', '1', 'Active', '2020-07-25 03:57:12', '2020-10-11 23:08:04'),
(3, 2, 0, 1, 0, 'Saree', '003', '6', 'images/2020/aug/10/pro_8efbaea39e2cf4fc4f3b0cd77098236c.jpg', '<p><strong>Indian tradition women wear</strong></p>', 'Indian tradition women wear', 'women,saree,green,traditional', '1', 'Active', '2020-08-10 06:15:59', '2020-08-10 12:45:59'),
(4, 6, 0, 1, 0, 'Lotto kids shirt', '004', '6', 'images/2020/oct/12/pro_359b069fa0246ad1236b37a74999538e.jpg', '<h4 class=\"card-title\" style=\"box-sizing: border-box; margin-top: 0px; margin-bottom: 0.75rem; font-weight: 500; line-height: 1.2; font-size: 1.5rem; color: #212529; font-family: -apple-system, BlinkMacSystemFont, \'Segoe UI\', Roboto, \'Helvetica Neue\', Arial, \'Noto Sans\', sans-serif, \'Apple Color Emoji\', \'Segoe UI Emoji\', \'Segoe UI Symbol\', \'Noto Color Emoji\';\">Lotto kids shirt</h4>', 'nice', 'kids,shirt,white shirt', '1', 'Active', '2020-08-10 06:18:11', '2020-10-11 22:23:34'),
(2, 5, 0, 1, 0, 'Adjustable mask', '002', '6', 'images/2020/aug/10/pro_23745f6b1a315787cf7f626fdf110999.jpeg', '<p>Adjustable earhook</p>\r\n<p>dustprrof</p>\r\n<p>anti droplets</p>\r\n<p>pollen</p>', 'nice', 'mask,adjustable mask,dustproof,pollen', '1', 'Active', '2020-08-10 06:04:12', '2020-10-11 22:24:31'),
(5, 6, 0, 1, 0, 'Skirt', '1521548', '7', 'images/2020/oct/12/pro_994b6146509db5d56e09a3395dce3744.jpg', '<p>Nice Product</p>', 'nice', 'Kids', '1', 'Active', '2020-10-12 11:10:15', '2020-10-11 22:23:16'),
(6, 8, 0, 1, 0, 'kanchi sarees ', '123', '25', 'images/2020/oct/12/pro_932625a299542f0cdffe9811d371b3b5.jpeg', '<p>good product</p>', 'nice', 'women collection,shop', '1', 'Active', '2020-10-12 12:25:54', '2020-10-11 22:22:56'),
(7, 8, 0, 1, 0, 'skirt', '123', '5', 'images/2020/oct/12/pro_f150a45f3091c511ab94f00e5cd3e8f4.jpeg', '<p>good</p>', 'nice', 'women collection,shop', '1', 'Active', '2020-10-12 02:02:22', '2020-10-11 22:22:40'),
(8, 8, 0, 1, 0, 'skirt', '123', '5', 'images/2020/oct/12/pro_ef776a9e117e171879d33ad1b3ac66db.jpg', '<p>good</p>', 'nice', 'women collection,shop', '1', 'Active', '2020-10-12 02:02:22', '2020-10-11 22:22:23'),
(12, 5, 0, 1, 0, 'Mask', '25', '2', 'images/2020/oct/12/pro_2c2ee15c586ff7dd3ae5a31f51660c1f.jpg', '<p>Good</p>', 'Nice', 'Mask,Shop', '1', 'Active', '2020-10-12 03:59:12', '2020-10-12 10:29:12'),
(9, 7, 0, 1, 0, 'Blazer', '23', '12', 'images/2020/oct/12/pro_a597af9c4b296cdd124137cb64a71677.jpg', '<p>good</p>', 'nice', 'shop    ,men collection', '1', 'Active', '2020-10-12 02:09:31', '2020-10-11 22:22:06'),
(10, 7, 0, 1, 0, 'jackets', '12', '2', 'images/2020/oct/12/pro_68f8d62c80733aca25a36f4216fefb68.jpg', '<p>good</p>', 'nice', 'men collection  shop', '1', 'Active', '2020-10-12 02:11:22', '2020-10-11 22:21:45'),
(11, 7, 0, 1, 0, 'T-shirt', '12', '23', 'images/2020/oct/12/pro_c5a84fca768ff55125def226a6ff08b8.jpg', '<p>nice</p>', 'nice', 'Mens Collection', '1', 'Active', '2020-10-12 02:14:32', '2020-10-11 22:21:26'),
(13, 5, 0, 1, 0, 'Mask', '1111', '20', 'images/2020/oct/12/pro_ce3e88bb5dbc3a7ea9fd13dc1eadccd0.jpg', '<p>Nice Produc</p>', 'Nish Mask', 'Mask,Shop', '1', 'Active', '2020-10-12 04:01:46', '2020-10-12 10:31:46'),
(14, 4, 0, 1, 0, 'Drone', '1212', '200', 'images/2020/oct/12/pro_ccd22bedd447f5c7bef6df57b4bb77c5.png', '<p>Good</p>', 'Super Drone', 'Drone,tools', '1', 'Active', '2020-10-12 04:05:28', '2020-10-12 10:35:28'),
(15, 4, 0, 1, 0, 'Spray machine', '1', '30', 'images/2020/oct/12/pro_4f36f66e9966e5156f43915824c63010.jpg', '<p>good</p>', 'nice', 'tools', '1', 'Active', '2020-10-12 04:08:40', '2020-10-12 10:38:40'),
(16, 3, 0, 1, 0, 'Speaker', '2', '34', 'images/2020/oct/12/pro_a7e714989d460c7913d3b7476df7e773.jpg', '<p>good</p>', 'nice', 'accessories', '1', 'Active', '2020-10-12 04:10:17', '2020-10-12 10:40:17'),
(17, 3, 0, 1, 0, 'alexa', '2', '23', 'images/2020/oct/12/pro_0ff403276ccc0e12e7bd3731aa64e6b2.jpg', '<p>productt</p>', 'nice', 'accessories', '1', 'Active', '2020-10-12 04:11:46', '2020-10-12 10:41:46'),
(18, 2, 0, 1, 0, 'Wall clock', '3', '30', 'images/2020/oct/12/pro_e36ed7c154e9ef857acaa11f58dfb7b0.jpeg', '<p>good</p>', 'nice', 'decor', '1', 'Active', '2020-10-12 04:13:31', '2020-10-12 10:43:31'),
(19, 2, 0, 1, 0, 'vase', '2', '8', 'images/2020/oct/12/pro_a864028bea2b88b3316b1d7efe6bf252.jpg', '<p>good</p>', 'good', 'decor', '1', 'Active', '2020-10-12 04:14:56', '2020-10-12 10:44:56'),
(20, 1, 0, 1, 0, 'product', '2', '23', 'images/2020/oct/12/pro_ea49bdcdc9cc44a002577f994f8f18f5.jpg', '<p>good</p>', 'nice', 'othercollections', '1', 'Active', '2020-10-12 04:16:31', '2020-10-12 10:46:31');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_product_color`
--

CREATE TABLE `tbl_product_color` (
  `id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `color_id` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_product_images`
--

CREATE TABLE `tbl_product_images` (
  `id` int(10) NOT NULL,
  `tbl_product_id` int(10) NOT NULL,
  `admin_id` int(11) NOT NULL,
  `tbl_product_image_type` varchar(15) DEFAULT NULL COMMENT 'Product Image Type will be ''base'',''searchable'',''gallery'',''default''',
  `tbl_product_500_500` text NOT NULL,
  `tbl_350_350` text NOT NULL,
  `tbl_66_66` text NOT NULL,
  `tbl_product_image_status` enum('Active','Inactive') NOT NULL DEFAULT 'Active',
  `tbl_product_images_deleted` varchar(1) NOT NULL COMMENT '0 for not deleted and 1 for deleted',
  `created_at` datetime NOT NULL,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_product_images`
--

INSERT INTO `tbl_product_images` (`id`, `tbl_product_id`, `admin_id`, `tbl_product_image_type`, `tbl_product_500_500`, `tbl_350_350`, `tbl_66_66`, `tbl_product_image_status`, `tbl_product_images_deleted`, `created_at`, `updated_at`) VALUES
(4, 2, 1, NULL, 'images/2020/aug/10/pro_23745f6b1a315787cf7f626fdf110999.jpeg', 'images/2020/aug/10/pro_23745f6b1a315787cf7f626fdf110999.jpeg', 'images/2020/aug/10/pro_23745f6b1a315787cf7f626fdf110999.jpeg', 'Active', '0', '2020-08-10 06:04:12', '2020-08-10 13:04:12'),
(6, 3, 1, NULL, 'images/2020/aug/10/pro_8efbaea39e2cf4fc4f3b0cd77098236c.jpg', 'images/2020/aug/10/pro_8efbaea39e2cf4fc4f3b0cd77098236c.jpg', 'images/2020/aug/10/pro_8efbaea39e2cf4fc4f3b0cd77098236c.jpg', 'Active', '0', '2020-08-10 06:15:59', '2020-08-10 13:15:59'),
(9, 4, 1, NULL, 'images/2020/oct/12/pro_359b069fa0246ad1236b37a74999538e.jpg', 'images/2020/oct/12/pro_359b069fa0246ad1236b37a74999538e.jpg', 'images/2020/oct/12/pro_359b069fa0246ad1236b37a74999538e.jpg', 'Active', '0', '2020-10-12 11:14:17', '2020-10-12 05:44:17'),
(10, 5, 1, NULL, 'images/2020/oct/12/pro_994b6146509db5d56e09a3395dce3744.jpg', 'images/2020/oct/12/pro_994b6146509db5d56e09a3395dce3744.jpg', 'images/2020/oct/12/pro_994b6146509db5d56e09a3395dce3744.jpg', 'Active', '0', '2020-10-12 11:15:50', '2020-10-12 05:45:50'),
(11, 6, 1, NULL, 'images/2020/oct/12/pro_932625a299542f0cdffe9811d371b3b5.jpeg', 'images/2020/oct/12/pro_932625a299542f0cdffe9811d371b3b5.jpeg', 'images/2020/oct/12/pro_932625a299542f0cdffe9811d371b3b5.jpeg', 'Active', '0', '2020-10-12 12:25:55', '2020-10-12 06:55:55'),
(13, 8, 1, NULL, 'images/2020/oct/12/pro_ef776a9e117e171879d33ad1b3ac66db.jpg', 'images/2020/oct/12/pro_ef776a9e117e171879d33ad1b3ac66db.jpg', 'images/2020/oct/12/pro_ef776a9e117e171879d33ad1b3ac66db.jpg', 'Active', '0', '2020-10-12 02:02:22', '2020-10-11 20:32:22'),
(14, 7, 1, NULL, 'images/2020/oct/12/pro_f150a45f3091c511ab94f00e5cd3e8f4.jpeg', 'images/2020/oct/12/pro_f150a45f3091c511ab94f00e5cd3e8f4.jpeg', 'images/2020/oct/12/pro_f150a45f3091c511ab94f00e5cd3e8f4.jpeg', 'Active', '0', '2020-10-12 02:06:13', '2020-10-11 20:36:13'),
(15, 9, 1, NULL, 'images/2020/oct/12/pro_a597af9c4b296cdd124137cb64a71677.jpg', 'images/2020/oct/12/pro_a597af9c4b296cdd124137cb64a71677.jpg', 'images/2020/oct/12/pro_a597af9c4b296cdd124137cb64a71677.jpg', 'Active', '0', '2020-10-12 02:09:31', '2020-10-11 20:39:31'),
(16, 10, 1, NULL, 'images/2020/oct/12/pro_68f8d62c80733aca25a36f4216fefb68.jpg', 'images/2020/oct/12/pro_68f8d62c80733aca25a36f4216fefb68.jpg', 'images/2020/oct/12/pro_68f8d62c80733aca25a36f4216fefb68.jpg', 'Active', '0', '2020-10-12 02:11:22', '2020-10-11 20:41:22'),
(17, 11, 1, NULL, 'images/2020/oct/12/pro_c5a84fca768ff55125def226a6ff08b8.jpg', 'images/2020/oct/12/pro_c5a84fca768ff55125def226a6ff08b8.jpg', 'images/2020/oct/12/pro_c5a84fca768ff55125def226a6ff08b8.jpg', 'Active', '0', '2020-10-12 02:14:32', '2020-10-11 20:44:32'),
(18, 12, 1, NULL, 'images/2020/oct/12/pro_2c2ee15c586ff7dd3ae5a31f51660c1f.jpg', 'images/2020/oct/12/pro_2c2ee15c586ff7dd3ae5a31f51660c1f.jpg', 'images/2020/oct/12/pro_2c2ee15c586ff7dd3ae5a31f51660c1f.jpg', 'Active', '0', '2020-10-12 03:59:12', '2020-10-11 22:29:12'),
(19, 13, 1, NULL, 'images/2020/oct/12/pro_ce3e88bb5dbc3a7ea9fd13dc1eadccd0.jpg', 'images/2020/oct/12/pro_ce3e88bb5dbc3a7ea9fd13dc1eadccd0.jpg', 'images/2020/oct/12/pro_ce3e88bb5dbc3a7ea9fd13dc1eadccd0.jpg', 'Active', '0', '2020-10-12 04:01:46', '2020-10-11 22:31:46'),
(20, 14, 1, NULL, 'images/2020/oct/12/pro_ccd22bedd447f5c7bef6df57b4bb77c5.png', 'images/2020/oct/12/pro_ccd22bedd447f5c7bef6df57b4bb77c5.png', 'images/2020/oct/12/pro_ccd22bedd447f5c7bef6df57b4bb77c5.png', 'Active', '0', '2020-10-12 04:05:28', '2020-10-11 22:35:28'),
(21, 15, 1, NULL, 'images/2020/oct/12/pro_4f36f66e9966e5156f43915824c63010.jpg', 'images/2020/oct/12/pro_4f36f66e9966e5156f43915824c63010.jpg', 'images/2020/oct/12/pro_4f36f66e9966e5156f43915824c63010.jpg', 'Active', '0', '2020-10-12 04:08:40', '2020-10-11 22:38:40'),
(22, 16, 1, NULL, 'images/2020/oct/12/pro_a7e714989d460c7913d3b7476df7e773.jpg', 'images/2020/oct/12/pro_a7e714989d460c7913d3b7476df7e773.jpg', 'images/2020/oct/12/pro_a7e714989d460c7913d3b7476df7e773.jpg', 'Active', '0', '2020-10-12 04:10:17', '2020-10-11 22:40:17'),
(23, 17, 1, NULL, 'images/2020/oct/12/pro_0ff403276ccc0e12e7bd3731aa64e6b2.jpg', 'images/2020/oct/12/pro_0ff403276ccc0e12e7bd3731aa64e6b2.jpg', 'images/2020/oct/12/pro_0ff403276ccc0e12e7bd3731aa64e6b2.jpg', 'Active', '0', '2020-10-12 04:11:46', '2020-10-11 22:41:46'),
(24, 18, 1, NULL, 'images/2020/oct/12/pro_e36ed7c154e9ef857acaa11f58dfb7b0.jpeg', 'images/2020/oct/12/pro_e36ed7c154e9ef857acaa11f58dfb7b0.jpeg', 'images/2020/oct/12/pro_e36ed7c154e9ef857acaa11f58dfb7b0.jpeg', 'Active', '0', '2020-10-12 04:13:31', '2020-10-11 22:43:31'),
(25, 19, 1, NULL, 'images/2020/oct/12/pro_a864028bea2b88b3316b1d7efe6bf252.jpg', 'images/2020/oct/12/pro_a864028bea2b88b3316b1d7efe6bf252.jpg', 'images/2020/oct/12/pro_a864028bea2b88b3316b1d7efe6bf252.jpg', 'Active', '0', '2020-10-12 04:14:56', '2020-10-11 22:44:56'),
(26, 20, 1, NULL, 'images/2020/oct/12/pro_ea49bdcdc9cc44a002577f994f8f18f5.jpg', 'images/2020/oct/12/pro_ea49bdcdc9cc44a002577f994f8f18f5.jpg', 'images/2020/oct/12/pro_ea49bdcdc9cc44a002577f994f8f18f5.jpg', 'Active', '0', '2020-10-12 04:16:31', '2020-10-11 22:46:31');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_product_price`
--

CREATE TABLE `tbl_product_price` (
  `id` int(10) NOT NULL,
  `tbl_product_id` int(10) NOT NULL,
  `tbl_product_base_price` int(10) NOT NULL,
  `tbl_product_is_discountable` varchar(2) NOT NULL COMMENT 'To Set weather this product is discountable or not',
  `tbl_product_discount_type` varchar(10) DEFAULT NULL COMMENT 'To Give Discount once aur recurrsive',
  `tbl_product_discount_start_date` date DEFAULT NULL,
  `tbl_product_discount_end_date` date DEFAULT NULL,
  `tbl_product_discount_percentage` varchar(50) DEFAULT NULL,
  `tbl_product_price_after_discount` varchar(50) DEFAULT NULL,
  `tbl_product_is_new` varchar(2) NOT NULL COMMENT '1 for yes and 0 for no',
  `tbl_product_new_start_date` datetime DEFAULT NULL,
  `tbl_product_new_end_date` datetime DEFAULT NULL,
  `tbl_product_delivery_charges` int(10) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_product_price`
--

INSERT INTO `tbl_product_price` (`id`, `tbl_product_id`, `tbl_product_base_price`, `tbl_product_is_discountable`, `tbl_product_discount_type`, `tbl_product_discount_start_date`, `tbl_product_discount_end_date`, `tbl_product_discount_percentage`, `tbl_product_price_after_discount`, `tbl_product_is_new`, `tbl_product_new_start_date`, `tbl_product_new_end_date`, `tbl_product_delivery_charges`) VALUES
(1, 1, 5000, '1', NULL, '2020-07-25', '2020-08-08', '2', '4900', '1', NULL, NULL, 500),
(2, 2, 6, '0', NULL, '1970-01-01', '1970-01-01', '', '', '1', NULL, NULL, 0),
(3, 1, 12, '0', NULL, '0001-01-01', '0001-01-01', '', 'NaN', '1', NULL, NULL, 0),
(4, 3, 6, '0', NULL, '1970-01-01', '1970-01-01', '', '', '1', NULL, NULL, 0),
(5, 4, 6, '0', NULL, '1970-01-01', '1970-01-01', '', '', '1', NULL, NULL, 0),
(6, 5, 7, '1', NULL, '2020-10-12', '1970-01-01', '20', '6', '1', NULL, NULL, 2),
(7, 4, 6, '0', NULL, '1970-01-01', '1970-01-01', '', '', '1', NULL, NULL, 0),
(8, 4, 6, '0', NULL, '1970-01-01', '1970-01-01', '', '', '1', NULL, NULL, 0),
(9, 5, 7, '1', NULL, '2020-10-12', '1970-01-01', '20', '6', '1', NULL, NULL, 2),
(10, 6, 25, '1', NULL, '2020-10-23', '1970-01-01', '1', '25', '1', NULL, NULL, 2),
(11, 7, 5, '1', NULL, '2021-02-02', '1970-01-01', '-12', '5', '1', NULL, NULL, 2),
(12, 8, 5, '1', NULL, '2021-02-02', '1970-01-01', '-12', '5', '1', NULL, NULL, 2),
(13, 7, 5, '1', NULL, '2021-02-02', '1970-01-01', '-12', '5', '1', NULL, NULL, 2),
(14, 7, 5, '1', NULL, '2021-02-02', '1970-01-01', '-12', '5', '1', NULL, NULL, 2),
(15, 9, 12, '1', NULL, '2020-01-22', '1970-01-01', '1', '12', '1', NULL, NULL, 2),
(16, 10, 2, '1', NULL, '2020-02-03', '1970-01-01', '1', '2', '1', NULL, NULL, 3),
(17, 11, 23, '1', NULL, '2020-02-02', '1970-01-01', '-5', '23', '1', NULL, NULL, 1),
(18, 5, 7, '1', NULL, '2020-10-12', '1970-01-01', '20', '6', '1', NULL, NULL, 2),
(19, 11, 23, '1', NULL, '2020-02-02', '1970-01-01', '-5', '23', '1', NULL, NULL, 1),
(20, 10, 2, '1', NULL, '2020-02-03', '1970-01-01', '1', '2', '1', NULL, NULL, 3),
(21, 9, 12, '1', NULL, '2020-01-22', '1970-01-01', '1', '12', '1', NULL, NULL, 2),
(22, 8, 5, '1', NULL, '2021-02-02', '1970-01-01', '-12', '5', '1', NULL, NULL, 2),
(23, 7, 5, '1', NULL, '2021-02-02', '1970-01-01', '-12', '5', '1', NULL, NULL, 2),
(24, 6, 25, '1', NULL, '2020-10-23', '1970-01-01', '1', '25', '1', NULL, NULL, 2),
(25, 5, 7, '1', NULL, '2020-10-12', '1970-01-01', '20', '6', '1', NULL, NULL, 2),
(26, 4, 6, '0', NULL, '1970-01-01', '1970-01-01', '', '', '1', NULL, NULL, 0),
(27, 2, 6, '0', NULL, '1970-01-01', '1970-01-01', '', '', '1', NULL, NULL, 0),
(28, 12, 2, '1', NULL, '2020-10-15', '1970-01-01', '10', '2', '1', NULL, NULL, 2),
(29, 13, 20, '1', NULL, '2020-10-10', '1970-01-01', '7', '18', '1', NULL, NULL, 2),
(30, 14, 200, '1', NULL, '2020-10-01', '1970-01-01', '10', '180', '1', NULL, NULL, 5),
(31, 15, 30, '1', NULL, '2020-10-14', '1970-01-01', '2', '30', '1', NULL, NULL, 2),
(32, 16, 34, '1', NULL, '2020-10-02', '1970-01-01', '2', '34', '1', NULL, NULL, 2),
(33, 17, 23, '1', NULL, '2020-10-31', '1970-01-01', '1', '23', '1', NULL, NULL, 2),
(34, 18, 30, '1', NULL, '2020-10-28', '1970-01-01', '20', '24', '1', NULL, NULL, 2),
(35, 19, 8, '1', NULL, '2020-10-30', '1970-01-01', '2', '8', '1', NULL, NULL, 2),
(36, 20, 23, '1', NULL, '2020-10-30', '1970-01-01', '23', '18', '1', NULL, NULL, 3),
(37, 1, 12, '0', NULL, '1970-01-01', '1970-01-01', '', 'NaN', '1', NULL, NULL, 0),
(38, 1, 12, '0', NULL, '1970-01-01', '1970-01-01', '', 'NaN', '1', NULL, NULL, 0),
(39, 1, 12, '0', NULL, '1970-01-01', '1970-01-01', '', 'NaN', '1', NULL, NULL, 0),
(40, 1, 12, '0', NULL, '1970-01-01', '1970-01-01', '', 'NaN', '1', NULL, NULL, 0),
(41, 1, 12, '0', NULL, '1970-01-01', '1970-01-01', '', 'NaN', '1', NULL, NULL, 0);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_product_related_products`
--

CREATE TABLE `tbl_product_related_products` (
  `tbl_product_related_products_id` int(10) NOT NULL,
  `tbl_product_id` int(10) NOT NULL COMMENT 'Main Product Id to which we are relating other products',
  `tbl_related_product_id` int(10) NOT NULL COMMENT 'Related product id'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_product_reviews`
--

CREATE TABLE `tbl_product_reviews` (
  `id` int(10) NOT NULL,
  `tbl_product_id` int(10) NOT NULL,
  `tbl_user_id` int(10) NOT NULL,
  `seller_id` int(11) NOT NULL,
  `tbl_product_review_rating` varchar(10) NOT NULL,
  `tbl_product_review_name` varbinary(50) NOT NULL,
  `tbl_product_review_description` text NOT NULL,
  `email` varchar(60) NOT NULL,
  `status` enum('Active','Inactive') NOT NULL DEFAULT 'Active',
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_product_reviews`
--

INSERT INTO `tbl_product_reviews` (`id`, `tbl_product_id`, `tbl_user_id`, `seller_id`, `tbl_product_review_rating`, `tbl_product_review_name`, `tbl_product_review_description`, `email`, `status`, `created_at`) VALUES
(1, 2, 1, 1, '3', 0x487564736f6e2055736572, 'product is good', 'hudson@gmail.com', 'Active', '2020-08-13 07:13:26'),
(2, 4, 7, 1, '4', 0x4e69736368697468614d41, 'good', 'nish@gmail.com', 'Inactive', '2020-10-12 05:49:13');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_sellers_details`
--

CREATE TABLE `tbl_sellers_details` (
  `tbl_seller_id` int(10) NOT NULL,
  `tbl_seller_name` varchar(255) NOT NULL,
  `tbl_seller_email` varchar(255) NOT NULL,
  `tbl_seller_mobile_country_code` varchar(10) NOT NULL,
  `tbl_seller_mobile` varchar(12) NOT NULL,
  `tbl_seller_address` varchar(255) NOT NULL,
  `tbl_seller_country` varchar(50) NOT NULL,
  `tbl_seller_pincode` varchar(10) NOT NULL,
  `tbl_seller_email_verified` varchar(2) NOT NULL,
  `tbl_seller_email_verified_date` datetime DEFAULT NULL,
  `tbl_seller_email_verification_code` text,
  `tbl_seller_email_verification_code_expiry_date_time` datetime DEFAULT NULL,
  `tbl_seller_email_verification_code_expired` enum('Yes','No') NOT NULL DEFAULT 'No',
  `tbl_seller_email_verification_mail_sent` varchar(1) NOT NULL DEFAULT '0' COMMENT '0 for verification mail not sent and 1 for mail already sent once',
  `tbl_seller_profile_image` varchar(255) DEFAULT NULL,
  `tbl_seller_profile_image_mobile_icon` varchar(255) DEFAULT NULL,
  `tbl_seller_password` varchar(255) NOT NULL,
  `tbl_seller_longitude` varchar(25) NOT NULL DEFAULT '0',
  `tbl_seller_latitude` varchar(25) NOT NULL DEFAULT '0',
  `tbl_seller_active_status` varchar(2) NOT NULL,
  `tbl_seller_active_status_show` enum('Active','Inactive') NOT NULL COMMENT 'This field will be shown in sellers details list',
  `tbl_seller_approved_status` enum('Pending','Approved','Rejected') NOT NULL COMMENT 'This is for when seller applied for becoming seller in this portal',
  `tbl_seller_details_deleted` varchar(1) NOT NULL COMMENT '0 for non deletede and 1 for deleted'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_slider`
--

CREATE TABLE `tbl_slider` (
  `id` int(11) NOT NULL,
  `tbl_slider_link` text NOT NULL,
  `status` enum('Active','Inactive','','') NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_slider`
--

INSERT INTO `tbl_slider` (`id`, `tbl_slider_link`, `status`, `created_at`, `updated_at`) VALUES
(1, 'images/2020/sep/18/homebanner3.jpg', 'Active', '2020-07-23 06:50:43', '2020-10-03 08:19:00'),
(2, 'images/2020/sep/18/homebanner2.jpg', 'Active', '2020-07-23 06:50:52', '2020-10-03 08:17:08'),
(3, 'images/2020/sep/18/homebanner1.jpg', 'Active', '2020-08-10 08:28:17', '2020-10-03 08:18:47');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_stock_management`
--

CREATE TABLE `tbl_stock_management` (
  `id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `color_id` int(11) DEFAULT NULL,
  `size` varchar(100) DEFAULT NULL,
  `stock` varchar(100) NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_stock_management`
--

INSERT INTO `tbl_stock_management` (`id`, `product_id`, `color_id`, `size`, `stock`, `created_at`, `updated_at`) VALUES
(33, 2, 0, '0', '37', '2020-10-12 03:54:31', '2020-10-11 22:24:31'),
(10, 3, 0, '0', '49', '2020-08-10 06:15:59', '2020-08-10 15:41:44'),
(32, 4, 0, '0', '47', '2020-10-12 03:53:34', '2020-10-11 22:23:34'),
(31, 5, 1, 'S M L', '3', '2020-10-12 03:53:16', '2020-10-11 22:23:16'),
(30, 6, 1, 'S M L', '3', '2020-10-12 03:52:56', '2020-10-11 22:22:56'),
(29, 7, 1, 'S M L', '3', '2020-10-12 03:52:40', '2020-10-11 22:22:40'),
(28, 8, 1, 'S M L', '3', '2020-10-12 03:52:23', '2020-10-11 22:22:23'),
(27, 9, 0, 'S M L', '9', '2020-10-12 03:52:06', '2020-10-11 22:22:06'),
(26, 10, 0, 'S M L', '3', '2020-10-12 03:51:45', '2020-10-11 22:21:45'),
(25, 11, 1, 'S M L', '10', '2020-10-12 03:51:26', '2020-10-11 22:21:26'),
(34, 12, 0, 'S M L', '10', '2020-10-12 03:59:12', '2020-10-11 22:29:12'),
(35, 13, 0, 'S M L', '5', '2020-10-12 04:01:46', '2020-10-11 22:31:46'),
(36, 14, 0, 'S M L', '5', '2020-10-12 04:05:28', '2020-10-11 22:35:28'),
(37, 15, 0, 'S M L', '9', '2020-10-12 04:08:40', '2020-10-11 22:38:40'),
(38, 16, 0, 'S M L', '9', '2020-10-12 04:10:17', '2020-10-11 22:40:17'),
(39, 17, 0, 'S M L', '3', '2020-10-12 04:11:46', '2020-10-11 22:41:46'),
(40, 18, 0, '2', '22', '2020-10-12 04:13:31', '2020-10-11 22:43:31'),
(41, 19, 0, 'S M L', '37', '2020-10-12 04:14:56', '2020-10-11 22:44:56'),
(42, 20, 0, 'S M L', '47', '2020-10-12 04:16:31', '2020-10-11 22:46:31');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_subcategory`
--

CREATE TABLE `tbl_subcategory` (
  `id` int(11) NOT NULL,
  `category_id` int(11) NOT NULL,
  `subcategory_name` varchar(50) NOT NULL,
  `status` enum('Active','Inactive') NOT NULL DEFAULT 'Active',
  `created_at` datetime NOT NULL,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `created_by` int(11) NOT NULL,
  `updated_by` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_subcategory`
--

INSERT INTO `tbl_subcategory` (`id`, `category_id`, `subcategory_name`, `status`, `created_at`, `updated_at`, `created_by`, `updated_by`) VALUES
(1, 1, 'Electronic cemra', 'Active', '2020-07-23 06:11:35', '2020-07-23 12:46:33', 1, 1);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_wishlist`
--

CREATE TABLE `tbl_wishlist` (
  `id` int(10) NOT NULL,
  `tbl_user_id` int(10) NOT NULL,
  `tbl_product_id` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_wishlist`
--

INSERT INTO `tbl_wishlist` (`id`, `tbl_user_id`, `tbl_product_id`) VALUES
(1, 1, 4),
(2, 3, 3);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `state`
--
ALTER TABLE `state`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_admin_login`
--
ALTER TABLE `tbl_admin_login`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_brands`
--
ALTER TABLE `tbl_brands`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_cart`
--
ALTER TABLE `tbl_cart`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_category`
--
ALTER TABLE `tbl_category`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_color`
--
ALTER TABLE `tbl_color`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_country`
--
ALTER TABLE `tbl_country`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_customer`
--
ALTER TABLE `tbl_customer`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_customer_address`
--
ALTER TABLE `tbl_customer_address`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_enquiry`
--
ALTER TABLE `tbl_enquiry`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_featured_product`
--
ALTER TABLE `tbl_featured_product`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_features_img`
--
ALTER TABLE `tbl_features_img`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_new_arrival`
--
ALTER TABLE `tbl_new_arrival`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_order`
--
ALTER TABLE `tbl_order`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_product`
--
ALTER TABLE `tbl_product`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_product_images`
--
ALTER TABLE `tbl_product_images`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_product_price`
--
ALTER TABLE `tbl_product_price`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_product_reviews`
--
ALTER TABLE `tbl_product_reviews`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_slider`
--
ALTER TABLE `tbl_slider`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_stock_management`
--
ALTER TABLE `tbl_stock_management`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_subcategory`
--
ALTER TABLE `tbl_subcategory`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_wishlist`
--
ALTER TABLE `tbl_wishlist`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `state`
--
ALTER TABLE `state`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `tbl_admin_login`
--
ALTER TABLE `tbl_admin_login`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `tbl_brands`
--
ALTER TABLE `tbl_brands`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `tbl_cart`
--
ALTER TABLE `tbl_cart`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `tbl_category`
--
ALTER TABLE `tbl_category`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `tbl_color`
--
ALTER TABLE `tbl_color`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `tbl_country`
--
ALTER TABLE `tbl_country`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `tbl_customer`
--
ALTER TABLE `tbl_customer`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `tbl_customer_address`
--
ALTER TABLE `tbl_customer_address`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `tbl_enquiry`
--
ALTER TABLE `tbl_enquiry`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `tbl_featured_product`
--
ALTER TABLE `tbl_featured_product`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `tbl_features_img`
--
ALTER TABLE `tbl_features_img`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tbl_new_arrival`
--
ALTER TABLE `tbl_new_arrival`
  MODIFY `id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `tbl_order`
--
ALTER TABLE `tbl_order`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `tbl_product`
--
ALTER TABLE `tbl_product`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `tbl_product_images`
--
ALTER TABLE `tbl_product_images`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- AUTO_INCREMENT for table `tbl_product_price`
--
ALTER TABLE `tbl_product_price`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=42;

--
-- AUTO_INCREMENT for table `tbl_product_reviews`
--
ALTER TABLE `tbl_product_reviews`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `tbl_slider`
--
ALTER TABLE `tbl_slider`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `tbl_stock_management`
--
ALTER TABLE `tbl_stock_management`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=47;

--
-- AUTO_INCREMENT for table `tbl_subcategory`
--
ALTER TABLE `tbl_subcategory`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `tbl_wishlist`
--
ALTER TABLE `tbl_wishlist`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
