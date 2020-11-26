-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 26, 2020 at 07:10 AM
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
  `longtitude_location` varchar(20) NOT NULL,
  `user_id` int(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `location`
--

INSERT INTO `location` (`id_location`, `latitude_location`, `longtitude_location`, `user_id`) VALUES
(1003001, '1.500673', '124.887743', 200506006);

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
(220010101, 220010101),
(220010101, 220010101),
(220010101, 220010101),
(220010101, 220010101),
(220010101, 220010101),
(220010101, 220010101),
(220010101, 220010101),
(220010101, 220010101),
(220010101, 220010101),
(220010101, 220010101),
(220010101, 220010101),
(220010101, 220010101),
(220010101, 220010101),
(220010101, 220010101),
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
  `id_product` varchar(30) NOT NULL,
  `name_category_product` varchar(15) NOT NULL,
  `name_product` varchar(30) NOT NULL,
  `quantity` int(10) NOT NULL,
  `price` int(20) NOT NULL,
  `user_id` int(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `product`
--

INSERT INTO `product` (`id_product`, `name_category_product`, `name_product`, `quantity`, `price`, `user_id`) VALUES
('200506006001', 'AQUA', 'Isi Ulang', 5, 9000, 200506006),
('200506006002', 'AQUA', 'Isi Ulang + Galon', 2, 95000, 200506006),
('200506006003', 'AKE', 'Isi Ulang', 4, 8500, 200506006),
('200506006004', 'AKE', 'Isi Ulang + Galon', 2, 85000, 200506006),
('200506006005', 'DEPOT', 'Isi Ulang', 50, 6500, 200506006),
('200506006006', 'DEPOT', 'Isi Ulang + Galon', 20, 70000, 200506006),
('200506006007', 'PRIMA', 'Isi Ulang', 30, 7500, 200506006),
('200506006008', 'PRIMA', 'Isi Ulang + Galon', 10, 200000, 200506006),
('200506006009', 'CLUB', 'Isi Ulang', 0, 7500, 200506006),
('200506006010', 'CLUB', 'Isi Ulang + Galon', 0, 80000, 200506006);

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
  `id_user` varchar(50) NOT NULL,
  `id_service_product` varchar(50) NOT NULL,
  `shopcart_qty` int(11) NOT NULL DEFAULT 0,
  `shopcart_price` int(11) NOT NULL,
  `shopcart_price_total` int(11) NOT NULL DEFAULT 0,
  `shopcart_note` varchar(100) NOT NULL,
  `deliver_to_lat` varchar(50) DEFAULT NULL,
  `deliver_to_long` varchar(50) DEFAULT NULL,
  `deliver_to_string_place` varchar(200) DEFAULT NULL,
  `deliver_to_date` varchar(50) DEFAULT NULL,
  `shopping_cart_status` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `shopping_cart`
--

INSERT INTO `shopping_cart` (`id_shopcart`, `id_user`, `id_service_product`, `shopcart_qty`, `shopcart_price`, `shopcart_price_total`, `shopcart_note`, `deliver_to_lat`, `deliver_to_long`, `deliver_to_string_place`, `deliver_to_date`, `shopping_cart_status`) VALUES
(1352416, '200513005', '200506006002', 1, 95000, 95000, 'AQUA', '1.504468895431474', '124.90827709436417', '1.504468895431474\n124.90827709436417\nJl. A.A. Maramis No.5, Paniki Bawah, Kec. Mapanget, Kota Manado, Sulawesi Utara, Indonesia', '14/05/20', 2),
(1355645, '200513005', '200506006005', 1, 5000, 5000, 'DEPOT', '1.504468895431474', '124.90827709436417', '1.504468895431474\n124.90827709436417\nJl. A.A. Maramis No.5, Paniki Bawah, Kec. Mapanget, Kota Manado, Sulawesi Utara, Indonesia', '14/05/20', 1),
(1356489, '200513005', '200506006001', 1, 17500, 17500, 'AQUA', '1.504468895431474', '124.90827709436417', '1.504468895431474\n124.90827709436417\nJl. A.A. Maramis No.5, Paniki Bawah, Kec. Mapanget, Kota Manado, Sulawesi Utara, Indonesia', '14/05/20', 2),
(1356972, '200513005', '200506006006', 1, 15000, 15000, 'CLUB', '1.504468895431474', '124.90827709436417', '1.504468895431474\n124.90827709436417\nJl. A.A. Maramis No.5, Paniki Bawah, Kec. Mapanget, Kota Manado, Sulawesi Utara, Indonesia', '14/05/20', 1),
(1357219, '200513011', '11101', 1, 50000, 50000, 'Make up yang cepat dong', '1.5087750339308938', '124.90888494998217', '1.5087750339308938\n124.90888494998217\nJl. A.A. Maramis No.180, Paniki Bawah, Kec. Mapanget, Kota Manado, Sulawesi Utara 95256, Indonesia', '14/05/20', 1),
(1357701, '200513006', '11101', 1, 50000, 50000, 'Make up yang cepat dong', '1.504468895431474', '124.90827709436417', '1.504468895431474\n124.90827709436417\nJl. A.A. Maramis No.5, Paniki Bawah, Kec. Mapanget, Kota Manado, Sulawesi Utara, Indonesia', '05/05/20', 1),
(1359179, '200513005', '11101', 1, 50000, 50000, 'Make up yang cepat dong', '1.504468895431474', '124.90827709436417', '1.504468895431474\n124.90827709436417\nJl. A.A. Maramis No.5, Paniki Bawah, Kec. Mapanget, Kota Manado, Sulawesi Utara, Indonesia', '14/05/20', 1),
(1451954, '200510002', '1446', 1, 30000, 30000, 'Coba 123', '', '', '', '2020-05-16', 1),
(1452072, '200514011', '200506006001', 2, 17500, 35000, 'AQUA', '1.504468895431474', '124.90827709436417', '1.504468895431474\n124.90827709436417\nJl. A.A. Maramis No.5, Paniki Bawah, Kec. Mapanget, Kota Manado, Sulawesi Utara, Indonesia', '2020-05-21', 2),
(1455092, '200513011', '200506006003', 1, 14000, 14000, 'AKE', '1.502568869443346', '124.85756590962409', '1.502568869443346\n124.85756590962409\nsingkil 2 lingk4, Singkil Dua, Kec. Singkil, Kota Manado, Sulawesi Utara, Indonesia', '15/05/20', 1),
(1456555, '200510002', '11101', 1, 50000, 50000, 'Yeess', '', '', '', '', 1),
(1457734, '200510002', '12102', 1, 75000, 75000, 'Catatan Gaess', '', '', '', '2020-05-15', 1);

-- --------------------------------------------------------

--
-- Table structure for table `topup`
--

CREATE TABLE `topup` (
  `id_topup` int(20) NOT NULL,
  `user_id` int(50) NOT NULL,
  `nominal` int(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `topup`
--

INSERT INTO `topup` (`id_topup`, `user_id`, `nominal`) VALUES
(1001, 200506006, 20000),
(1002, 200506006, 20000),
(1003, 200506006, 80000);

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `user_id` int(50) NOT NULL,
  `user_first_name` varchar(20) NOT NULL,
  `user_name` varchar(200) NOT NULL,
  `user_password` varchar(200) NOT NULL,
  `address` varchar(50) NOT NULL,
  `date_in` date NOT NULL,
  `phone_num_user` varchar(15) NOT NULL,
  `pic_user` varchar(100) NOT NULL,
  `user_balance` int(20) NOT NULL,
  `user_type` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`user_id`, `user_first_name`, `user_name`, `user_password`, `address`, `date_in`, `phone_num_user`, `pic_user`, `user_balance`, `user_type`) VALUES
(96, 'Register', 'register@a.com', '$2y$10$N2rDy6.Lm9W6Es1/yrnJseuECJqpnthiL/4cGVDNAo9WZjbLoeozq', '', '2020-05-05', '', '', 0, 1),
(200504001, 'cobatest', 'coba@test.com', '$2y$10$X6Ua.2Q079Pac47s6rWbFOlpZ4XTwVDxBvbsvNLCowY.AslWBeXum', '', '2020-05-04', '', '', 0, 1),
(200504002, 'Proklamator', 'himerare@gmail.com', '$2y$10$5P6Vgg1uor/Pt99QMb1cKecILDCwGs7xig5bahfiVcoLk7bvkVwUO', '', '2020-05-04', '', '', 0, 1),
(200504003, 'Ryan', 'ryansupit@gmail.com', '$2y$10$3e5ZYgCrPZRJQkgBLdiQ5uzUL1hIpiKujMF4WM83VO2mmkTWapzSm', '', '2020-05-04', '', '', 0, 1),
(200505002, 'Juandiksa', 'juan@diksa.com', '$2y$10$iF1MdxMa3jToMr6xvYH2Ke4yp3PpU3J41RBjIiy8/cc1mDupoaAyK', '', '2020-05-05', '', '', 0, 1),
(200505003, 'test', 'test@gmail.com', '$2y$10$MnEMPMQ/hYxwiP8cLZPVTepLkgChSvKkM9QRutSswaZaoB2jVLoCO', '', '2020-05-05', '', '', 0, 1),
(200505004, 'test', 'test@gmail.com', '$2y$10$C3hPEQPLaPPDZoMGvtjvoOHRZ5RFWDJsRniBgkjZGRNuigpCTchrK', '', '2020-05-05', '', '', 0, 1),
(200505005, 'number', 'hateme@lol.com', '$2y$10$/9/V98jHFuuP0A2BzHNjluwAl7IAZvRk1zrbsbxqJej5mZrbsaFnq', '', '2020-05-05', '', '', 0, 1),
(200505006, 'apajo', 'sukasuka@suka.com', '$2y$10$Xt2eMYJBGkGVs6wSSvKkYewCtDkwQG1gR7xnobwlacNw0HMrmblye', '', '2020-05-05', '', '', 0, 1),
(200505007, 'saya', 'saya', '$2y$10$n/Q.dbkPerUmU9.kJgV47.NbP5TGCfqVMzlXRqtiMzKCiz6WiPXUq', '', '2020-05-05', '', '', 0, 1),
(200505008, 'saya', 'saya@saya.com', '$2y$10$ntGYY3D3Ni1CWlB1/7138ebSzbHiU5q5SFXF0C/qM1Q.EaEDRpGmi', '', '2020-05-05', '', '', 0, 1),
(200505009, 'saya', 'saya@saya.com', '$2y$10$KzVjfFzAyFZjnfAfOeBYYubjORE623AQ6G63Jzs8d6HVtDU4o.eru', '', '2020-05-05', '', '', 0, 1),
(200505010, 'zky', 'zkylandd@gmail.com', '$2y$10$sop4lFmwLWb8QVerBOTFfudsu4EtVz.ai8S1QrctVGLcCZFBLWmoe', '', '2020-05-05', '', '', 0, 1),
(200506001, 'ch', 'csalainti@gmail.com', '$2y$10$m0ifUcUHM76pCPRsoDZFvefsva3p2TDA0QIgKwpszq1QyjV./oA42', '', '2020-05-06', '', '', 0, 1),
(200506002, 'ch', 'csalainti@gmail.com', '$2y$10$yjZRfga50/11ZU7IwJwCPugQlIwcEbbKZCyfd2Skl4aO8t8Ro98Ti', '', '2020-05-06', '', '', 0, 1),
(200506003, 'chris', 'csalainti@gmail.com', '$2y$10$h6tNSZmNouKUJg8.jbqR2.gCXs9gy/0kfcPssFjvNCUXoT6hCA0KC', '', '2020-05-06', '', '', 0, 1),
(200506004, 'c', 'c@gmail.com', '$2y$10$XoVWWpyH6VPK6SSunfTyAOq21REFzRtbAknWkz9KrK8spqyVFAnaa', '', '2020-05-06', '', '', 0, 1),
(200506005, 'Hendy', 'hendy@thio.com', '$2y$10$5cXK5XsH94DmYKmmoLCZa.bNYfBDmD27qs4Xh3P/TOLnMJgACBcUi', '', '2020-05-06', '', '', 0, 1),
(200506006, 'Ryan supit', 'Ryansupit25@gmail.com', '$2y$10$BjaSZdDQPymOMpNlTvhKB.2/oWuWsOt.XwYx1lhaQf23W82OGeBse', 'Kairagi dua, lingkungan 3, no 50', '2020-05-06', '08992133125', '', 25000, 2);

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
  ADD KEY `user_id` (`user_id`);

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
-- Indexes for table `topup`
--
ALTER TABLE `topup`
  ADD PRIMARY KEY (`id_topup`) USING BTREE,
  ADD KEY `user_id` (`user_id`);

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

--
-- Constraints for table `product`
--
ALTER TABLE `product`
  ADD CONSTRAINT `product_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `user` (`user_id`);

--
-- Constraints for table `topup`
--
ALTER TABLE `topup`
  ADD CONSTRAINT `topup_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `user` (`user_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
