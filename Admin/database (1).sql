-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 04, 2020 at 02:54 PM
-- Server version: 10.4.6-MariaDB
-- PHP Version: 7.3.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `database`
--

-- --------------------------------------------------------

--
-- Table structure for table `category_product`
--

CREATE TABLE `category_product` (
  `id_category_product` varchar(15) NOT NULL,
  `name_category_product` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `category_product`
--

INSERT INTO `category_product` (`id_category_product`, `name_category_product`) VALUES
('1', 'AQUA'),
('2', 'AKE'),
('3', 'CLUB'),
('4', 'DEPOT');

-- --------------------------------------------------------

--
-- Table structure for table `customer_feedback`
--

CREATE TABLE `customer_feedback` (
  `id_customer_feedback` int(10) NOT NULL,
  `customer_feedback` varchar(500) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `customer_order`
--

CREATE TABLE `customer_order` (
  `id_cust_order` int(10) NOT NULL,
  `date_order` datetime NOT NULL DEFAULT current_timestamp(),
  `date_order_paid` datetime NOT NULL DEFAULT current_timestamp(),
  `status_order` int(10) NOT NULL,
  `total_price_order` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `customer_order`
--

INSERT INTO `customer_order` (`id_cust_order`, `date_order`, `date_order_paid`, `status_order`, `total_price_order`) VALUES
(1, '2020-03-12 21:16:47', '2020-03-12 21:16:47', 3, 29888);

-- --------------------------------------------------------

--
-- Table structure for table `location`
--

CREATE TABLE `location` (
  `id_location` int(10) NOT NULL,
  `latitude_location` varchar(20) NOT NULL,
  `longitude_location` varchar(20) NOT NULL,
  `user_id` int(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `order`
--

CREATE TABLE `order` (
  `id_order` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `id_service` int(11) NOT NULL,
  `id_shopcart` int(11) NOT NULL,
  `payment_date` datetime NOT NULL,
  `note` varchar(1024) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `order_cancellation`
--

CREATE TABLE `order_cancellation` (
  `id_order_cancellation` int(15) NOT NULL,
  `time_order_cancellation` datetime NOT NULL,
  `void_order_cancellation` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `order_history`
--

CREATE TABLE `order_history` (
  `id_order_history` int(10) NOT NULL,
  `id_order` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `order_history`
--

INSERT INTO `order_history` (`id_order_history`, `id_order`) VALUES
(220010101, 220010101),
(220010101, 220010101),
(220010101, 220010101),
(220010101, 220010101),
(220010101, 220010101),
(220010101, 220010101);

-- --------------------------------------------------------

--
-- Table structure for table `payment`
--

CREATE TABLE `payment` (
  `id_payment` int(11) NOT NULL,
  `nominal` int(11) NOT NULL,
  `payment_date` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `product`
--

CREATE TABLE `product` (
  `id_product` int(5) NOT NULL,
  `name_product` varchar(30) NOT NULL,
  `expired_date` date NOT NULL,
  `product_pic` varchar(100) NOT NULL,
  `quantity` int(10) NOT NULL,
  `price` int(20) NOT NULL,
  `id_category_product` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `product`
--

INSERT INTO `product` (`id_product`, `name_product`, `expired_date`, `product_pic`, `quantity`, `price`, `id_category_product`) VALUES
(1101, 'Air Galon Aqua', '2020-05-01', '', 20, 17500, ''),
(1102, 'Air Galon Ake', '2020-05-01', '', 15, 15000, ''),
(1103, 'Air Galon Aqua + Galon', '2020-05-01', '', 25, 90000, ''),
(1104, 'Air galon isi', '2020-05-12', 'Logo 2.png', 25, 500000, ''),
(1105, 'Alfamidi', '2020-05-01', '', 500, 500099, ''),
(1108, 'keode', '2020-05-13', 'Logo.rar', 2, 2, '');

-- --------------------------------------------------------

--
-- Table structure for table `promotion`
--

CREATE TABLE `promotion` (
  `id_promotion` int(10) NOT NULL,
  `name_promotion` varchar(10) NOT NULL,
  `from_promotion` datetime NOT NULL,
  `to_promotion` datetime NOT NULL,
  `content_promotion` varchar(100) NOT NULL,
  `amount_promotion` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `rating`
--

CREATE TABLE `rating` (
  `id_rating` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `id_service` int(11) NOT NULL,
  `rating_range` int(11) NOT NULL,
  `comment` varchar(1024) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `service`
--

CREATE TABLE `service` (
  `id_service` int(15) NOT NULL,
  `name_service` varchar(30) NOT NULL,
  `provider_service` varchar(30) NOT NULL,
  `provider_type_service` varchar(30) NOT NULL,
  `time_booking_service` time(6) NOT NULL,
  `duration_service` time(6) NOT NULL,
  `price_service` int(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `service`
--

INSERT INTO `service` (`id_service`, `name_service`, `provider_service`, `provider_type_service`, `time_booking_service`, `duration_service`, `price_service`) VALUES
(11101, 'Make Up', '202100001', '11', '00:00:00.000000', '00:00:00.000000', 50000),
(12102, 'Blow', '202100002', '21', '00:00:00.000000', '00:00:00.000000', 75000);

-- --------------------------------------------------------

--
-- Table structure for table `service_type`
--

CREATE TABLE `service_type` (
  `id_service_type` int(15) NOT NULL,
  `name_service_type` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `shopping_cart`
--

CREATE TABLE `shopping_cart` (
  `id_shopcart` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `id_service_product` int(11) NOT NULL,
  `shopcart_qty` int(11) NOT NULL DEFAULT 0,
  `shopcart_price` int(11) NOT NULL,
  `shopping_cart_status` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `shopping_cart`
--

INSERT INTO `shopping_cart` (`id_shopcart`, `id_user`, `id_service_product`, `shopcart_qty`, `shopcart_price`, `shopping_cart_status`) VALUES
(2913, 111111, 1212121, 1, 10000, 1),
(9000, 111111, 1212121, 0, 0, 1),
(29138, 111111, 1212121, 1, 10000, 1),
(123456, 111111, 2468, 0, 0, 1),
(987654, 22222, 3579, 0, 0, 1),
(2147483647, 2020001, 12102, 1, 75000, 1);

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `user_id` int(50) NOT NULL,
  `user_first_name` varchar(20) NOT NULL,
  `user_name` varchar(200) NOT NULL,
  `user_password` varchar(200) NOT NULL,
  `date_in` date NOT NULL,
  `user_number` varchar(15) NOT NULL,
  `user_pic` varchar(100) NOT NULL,
  `user_balance` int(20) NOT NULL,
  `user_type` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`user_id`, `user_first_name`, `user_name`, `user_password`, `date_in`, `user_number`, `user_pic`, `user_balance`, `user_type`) VALUES
(2201003, 'Ryan Supit', 'ryansupit25@gmail.com', 'kucingkucing', '2020-05-03', '08992133125', 'logo.png', 25000, 2),
(202504001, 'ryan', 'ryan2', '$2y$10$RE99KDavAQ.5of/Djhu1Heb4sWSrrvU2v19AvlHpSOnZ7TRKJanZe', '2020-04-25', '08992133125', '', 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `user_type`
--

CREATE TABLE `user_type` (
  `id_user_type` int(11) NOT NULL,
  `name_user_type` varchar(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user_type`
--

INSERT INTO `user_type` (`id_user_type`, `name_user_type`) VALUES
(1, 'customer'),
(2, 'vendor'),
(3, 'admin');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `category_product`
--
ALTER TABLE `category_product`
  ADD PRIMARY KEY (`id_category_product`);

--
-- Indexes for table `customer_feedback`
--
ALTER TABLE `customer_feedback`
  ADD PRIMARY KEY (`id_customer_feedback`);

--
-- Indexes for table `customer_order`
--
ALTER TABLE `customer_order`
  ADD PRIMARY KEY (`id_cust_order`);

--
-- Indexes for table `location`
--
ALTER TABLE `location`
  ADD PRIMARY KEY (`id_location`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `order_cancellation`
--
ALTER TABLE `order_cancellation`
  ADD PRIMARY KEY (`id_order_cancellation`);

--
-- Indexes for table `payment`
--
ALTER TABLE `payment`
  ADD PRIMARY KEY (`id_payment`);

--
-- Indexes for table `product`
--
ALTER TABLE `product`
  ADD PRIMARY KEY (`id_product`),
  ADD KEY `id_category_product` (`id_category_product`);

--
-- Indexes for table `promotion`
--
ALTER TABLE `promotion`
  ADD PRIMARY KEY (`id_promotion`);

--
-- Indexes for table `rating`
--
ALTER TABLE `rating`
  ADD PRIMARY KEY (`id_rating`);

--
-- Indexes for table `service`
--
ALTER TABLE `service`
  ADD PRIMARY KEY (`id_service`);

--
-- Indexes for table `service_type`
--
ALTER TABLE `service_type`
  ADD PRIMARY KEY (`id_service_type`);

--
-- Indexes for table `shopping_cart`
--
ALTER TABLE `shopping_cart`
  ADD PRIMARY KEY (`id_shopcart`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`user_id`);

--
-- Indexes for table `user_type`
--
ALTER TABLE `user_type`
  ADD PRIMARY KEY (`id_user_type`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `customer_order`
--
ALTER TABLE `customer_order`
  MODIFY `id_cust_order` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `user_type`
--
ALTER TABLE `user_type`
  MODIFY `id_user_type` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `location`
--
ALTER TABLE `location`
  ADD CONSTRAINT `location_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `user` (`user_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
