-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 12, 2023 at 08:32 AM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_rent_rooms`
--

-- --------------------------------------------------------

--
-- Table structure for table `break_items`
--

CREATE TABLE `break_items` (
  `id` int(11) NOT NULL,
  `username` varchar(150) NOT NULL,
  `name` varchar(150) NOT NULL,
  `floor` int(12) NOT NULL,
  `room` int(12) NOT NULL,
  `broken_pillow` varchar(150) NOT NULL,
  `light_bulb` varchar(150) NOT NULL,
  `desk` varchar(150) NOT NULL,
  `chairy` varchar(150) NOT NULL,
  `cabinet` varchar(150) NOT NULL,
  `air_conditioner` varchar(150) NOT NULL,
  `trash_can` varchar(150) NOT NULL,
  `window` varchar(150) NOT NULL,
  `message` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `history_payment`
--

CREATE TABLE `history_payment` (
  `id` int(11) NOT NULL,
  `name` varchar(150) NOT NULL,
  `bank` varchar(150) NOT NULL,
  `payment` varchar(150) NOT NULL,
  `payment_date` datetime NOT NULL,
  `year_date` datetime NOT NULL,
  `expire_payment` datetime NOT NULL,
  `proof_payment` varchar(150) NOT NULL,
  `description` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `identity`
--

CREATE TABLE `identity` (
  `id` int(11) NOT NULL,
  `full_name` varchar(150) NOT NULL,
  `ktp_image` text NOT NULL,
  `street_address` text NOT NULL,
  `city` varchar(150) NOT NULL,
  `region` varchar(150) NOT NULL,
  `postal_code` int(12) NOT NULL,
  `country` varchar(150) NOT NULL,
  `phone_number` varchar(150) NOT NULL,
  `start_move_in` datetime NOT NULL,
  `floor` int(12) NOT NULL,
  `room` int(12) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `income`
--

CREATE TABLE `income` (
  `id` int(11) NOT NULL,
  `income_permonth` varchar(150) NOT NULL,
  `income_peryear` varchar(150) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `notification`
--

CREATE TABLE `notification` (
  `id` int(12) NOT NULL,
  `username` varchar(150) NOT NULL,
  `fullname` varchar(150) NOT NULL,
  `gender` varchar(150) NOT NULL,
  `floor` int(12) NOT NULL,
  `room` int(12) NOT NULL,
  `message` text NOT NULL,
  `status` varchar(150) NOT NULL,
  `date` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `room_female`
--

CREATE TABLE `room_female` (
  `id` int(11) NOT NULL,
  `username` varchar(150) NOT NULL,
  `fist_name` varchar(150) NOT NULL,
  `last_name` varchar(150) NOT NULL,
  `street_address` text NOT NULL,
  `city` varchar(150) NOT NULL,
  `region` varchar(150) NOT NULL,
  `postal_code` int(12) NOT NULL,
  `country` varchar(150) NOT NULL,
  `phone_number` varchar(150) NOT NULL,
  `start_move_in` datetime NOT NULL,
  `floor` int(12) NOT NULL,
  `room` int(12) NOT NULL,
  `expire` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `room_male`
--

CREATE TABLE `room_male` (
  `id` int(11) NOT NULL,
  `username` varchar(150) NOT NULL,
  `first_name` varchar(150) NOT NULL,
  `last_name` varchar(150) NOT NULL,
  `street_address` text NOT NULL,
  `city` varchar(150) NOT NULL,
  `region` varchar(150) NOT NULL,
  `postal_code` int(12) NOT NULL,
  `country` varchar(150) NOT NULL,
  `phone_number` varchar(150) NOT NULL,
  `start_move_in` datetime NOT NULL,
  `floor` int(12) NOT NULL,
  `room` int(12) NOT NULL,
  `expiry` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `username` varchar(150) NOT NULL,
  `password` text NOT NULL,
  `email` varchar(150) NOT NULL,
  `gender` varchar(150) NOT NULL,
  `age` int(12) NOT NULL,
  `hometown` varchar(150) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `break_items`
--
ALTER TABLE `break_items`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `history_payment`
--
ALTER TABLE `history_payment`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `identity`
--
ALTER TABLE `identity`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `income`
--
ALTER TABLE `income`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `notification`
--
ALTER TABLE `notification`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `room_female`
--
ALTER TABLE `room_female`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `room_male`
--
ALTER TABLE `room_male`
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
-- AUTO_INCREMENT for table `break_items`
--
ALTER TABLE `break_items`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `history_payment`
--
ALTER TABLE `history_payment`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `identity`
--
ALTER TABLE `identity`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `income`
--
ALTER TABLE `income`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `notification`
--
ALTER TABLE `notification`
  MODIFY `id` int(12) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `room_female`
--
ALTER TABLE `room_female`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `room_male`
--
ALTER TABLE `room_male`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
