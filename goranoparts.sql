-- phpMyAdmin SQL Dump
-- version 5.0.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 12, 2021 at 04:26 PM
-- Server version: 10.4.14-MariaDB
-- PHP Version: 7.4.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `goranoparts`
--

-- --------------------------------------------------------

--
-- Table structure for table `parts`
--

CREATE TABLE `parts` (
  `id` int(11) NOT NULL,
  `date` date NOT NULL,
  `name` varchar(100) NOT NULL,
  `price` decimal(10,2) NOT NULL,
  `model` varchar(100) NOT NULL,
  `status` varchar(50) NOT NULL,
  `note` varchar(1000) DEFAULT NULL,
  `user_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `purchase_equipment`
--

CREATE TABLE `purchase_equipment` (
  `id` int(11) NOT NULL,
  `date` date NOT NULL,
  `equipment_type` varchar(50) NOT NULL,
  `title` varchar(50) NOT NULL,
  `quantity` int(11) NOT NULL,
  `supplier` varchar(50) NOT NULL,
  `price` decimal(10,0) NOT NULL,
  `note` varchar(1000) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `purchase_parts`
--

CREATE TABLE `purchase_parts` (
  `id` int(11) NOT NULL,
  `date` date NOT NULL,
  `model` varchar(50) NOT NULL,
  `fuel` varchar(50) NOT NULL,
  `product_year` int(10) NOT NULL,
  `side_wheel` varchar(50) NOT NULL,
  `seller` varchar(100) NOT NULL,
  `price` decimal(10,2) NOT NULL,
  `note` varchar(1000) DEFAULT NULL,
  `user_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `service`
--

CREATE TABLE `service` (
  `id` int(11) NOT NULL,
  `date` date NOT NULL,
  `model` varchar(50) NOT NULL,
  `customer` varchar(50) NOT NULL,
  `vehicle` varchar(50) NOT NULL,
  `payment_status` varchar(50) NOT NULL,
  `price_bruto` decimal(10,0) NOT NULL,
  `price_neto` decimal(10,0) NOT NULL,
  `parts_property` varchar(50) NOT NULL,
  `note` varchar(1000) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `small_service`
--

CREATE TABLE `small_service` (
  `id` int(11) NOT NULL,
  `date` date NOT NULL,
  `model` varchar(50) NOT NULL,
  `customer` varchar(50) NOT NULL,
  `vehicle` varchar(50) NOT NULL,
  `payment_status` varchar(50) NOT NULL,
  `price_bruto` decimal(10,0) NOT NULL,
  `price_neto` decimal(10,0) NOT NULL,
  `changed_filters` varchar(255) NOT NULL,
  `oil_type` varchar(50) NOT NULL,
  `oil_quantity` decimal(10,0) NOT NULL,
  `kilometers_now` int(11) NOT NULL,
  `kilometers_next` int(11) DEFAULT NULL,
  `note` varchar(1000) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `tyre_service`
--

CREATE TABLE `tyre_service` (
  `id` int(11) NOT NULL,
  `date` date NOT NULL,
  `size_R` varchar(50) NOT NULL,
  `quantity` int(11) NOT NULL,
  `type_of_service` varchar(50) NOT NULL,
  `customer` varchar(50) NOT NULL,
  `vehicle` varchar(50) NOT NULL,
  `payment_status` varchar(50) NOT NULL,
  `price` decimal(10,0) NOT NULL,
  `note` varchar(1000) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `last_name` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `phone` varchar(20) NOT NULL,
  `username` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  `role` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `parts`
--
ALTER TABLE `parts`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `purchase_equipment`
--
ALTER TABLE `purchase_equipment`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `purchase_parts`
--
ALTER TABLE `purchase_parts`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `service`
--
ALTER TABLE `service`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `small_service`
--
ALTER TABLE `small_service`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tyre_service`
--
ALTER TABLE `tyre_service`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `parts`
--
ALTER TABLE `parts`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `purchase_equipment`
--
ALTER TABLE `purchase_equipment`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `purchase_parts`
--
ALTER TABLE `purchase_parts`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `service`
--
ALTER TABLE `service`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `small_service`
--
ALTER TABLE `small_service`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tyre_service`
--
ALTER TABLE `tyre_service`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `parts`
--
ALTER TABLE `parts`
  ADD CONSTRAINT `parts_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);

--
-- Constraints for table `purchase_parts`
--
ALTER TABLE `purchase_parts`
  ADD CONSTRAINT `purchase_parts_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
