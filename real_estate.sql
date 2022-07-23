-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Jul 23, 2022 at 08:19 AM
-- Server version: 8.0.29
-- PHP Version: 8.1.7

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `real_estate`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `admin_id` int NOT NULL,
  `admin_full_name` varchar(50) COLLATE utf8mb4_general_ci NOT NULL,
  `admin_email` varchar(50) COLLATE utf8mb4_general_ci NOT NULL,
  `admin_gender` varchar(50) COLLATE utf8mb4_general_ci NOT NULL,
  `admin_mobile` varchar(50) COLLATE utf8mb4_general_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`admin_id`, `admin_full_name`, `admin_email`, `admin_gender`, `admin_mobile`) VALUES
(1, 'amdin', 'amdin@gmail.com', 'Male', '0888000099'),
(2, 'checking name', 'adminadmin@gmail.com', 'Female', '0788776655');

-- --------------------------------------------------------

--
-- Table structure for table `agent`
--

CREATE TABLE `agent` (
  `agent_id` int NOT NULL,
  `agent_full_names` varchar(50) COLLATE utf8mb4_general_ci NOT NULL,
  `agent_email` varchar(50) COLLATE utf8mb4_general_ci NOT NULL,
  `agent_phone_number` varchar(10) COLLATE utf8mb4_general_ci NOT NULL,
  `agent_gender` varchar(50) COLLATE utf8mb4_general_ci NOT NULL,
  `agent_home_address` varchar(5000) COLLATE utf8mb4_general_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `agent`
--

INSERT INTO `agent` (`agent_id`, `agent_full_names`, `agent_email`, `agent_phone_number`, `agent_gender`, `agent_home_address`) VALUES
(2, 'agent two', 'agenttwo@gmail.com', '0711221122', 'Male', 'second agent added');

-- --------------------------------------------------------

--
-- Table structure for table `book_visits`
--

CREATE TABLE `book_visits` (
  `visit_id` int NOT NULL,
  `visit_date` date NOT NULL,
  `visit_building_id` int NOT NULL,
  `visit_user_id` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `book_visits`
--

INSERT INTO `book_visits` (`visit_id`, `visit_date`, `visit_building_id`, `visit_user_id`) VALUES
(5, '2022-08-05', 3, 2);

-- --------------------------------------------------------

--
-- Table structure for table `building`
--

CREATE TABLE `building` (
  `buidling_id` int NOT NULL,
  `building_name` varchar(50) COLLATE utf8mb4_general_ci NOT NULL,
  `buidling_description` varchar(5000) COLLATE utf8mb4_general_ci NOT NULL,
  `building_rent` int NOT NULL,
  `building_images` varchar(500) COLLATE utf8mb4_general_ci NOT NULL,
  `building_location` varchar(5000) COLLATE utf8mb4_general_ci NOT NULL,
  `building_agent_id` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `building`
--

INSERT INTO `building` (`buidling_id`, `building_name`, `buidling_description`, `building_rent`, `building_images`, `building_location`, `building_agent_id`) VALUES
(2, 'dekemdekdkmd', 'this is the description', 1000, '62d9b3ebc8f098.32394056.jpeg', 'kileleshwa', 2),
(3, 'second hosuse', 'locomekdem', 8700, '62d9ca749bc424.61523693.jpeg', 'this is rhe', 2);

-- --------------------------------------------------------

--
-- Table structure for table `login`
--

CREATE TABLE `login` (
  `login_id` int NOT NULL,
  `login_username` varchar(50) COLLATE utf8mb4_general_ci NOT NULL,
  `login_password` varchar(50) COLLATE utf8mb4_general_ci NOT NULL,
  `login_agent_id` int DEFAULT NULL,
  `login_user_id` int DEFAULT NULL,
  `login_rank` varchar(50) COLLATE utf8mb4_general_ci NOT NULL,
  `login_admin_id` int DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `login`
--

INSERT INTO `login` (`login_id`, `login_username`, `login_password`, `login_agent_id`, `login_user_id`, `login_rank`, `login_admin_id`) VALUES
(3, 'adminupdated', 'f6fdffe48c908deb0f4c3bd36c032e72', NULL, NULL, 'admin', 1),
(4, 'agenttwoupdated', '5f4dcc3b5aa765d61d8327deb882cf99', 2, NULL, 'agent', NULL),
(5, 'testinguser', '5f4dcc3b5aa765d61d8327deb882cf99', NULL, 2, 'user', NULL),
(6, 'adminadminadmin', '5f4dcc3b5aa765d61d8327deb882cf99', NULL, NULL, 'admin', 2);

-- --------------------------------------------------------

--
-- Table structure for table `payment`
--

CREATE TABLE `payment` (
  `payment_id` int NOT NULL,
  `payment_amount` varchar(50) COLLATE utf8mb4_general_ci NOT NULL,
  `payment_mode` varchar(50) COLLATE utf8mb4_general_ci NOT NULL,
  `payment_code` varchar(50) COLLATE utf8mb4_general_ci NOT NULL,
  `payment_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `payment_building_id` int NOT NULL,
  `payment_user_id` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `payment`
--

INSERT INTO `payment` (`payment_id`, `payment_amount`, `payment_mode`, `payment_code`, `payment_date`, `payment_building_id`, `payment_user_id`) VALUES
(4, '1000', 'M-Pesa', 'kmjnmnbvgfc', '2022-07-21 22:21:05', 2, 2);

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `user_id` int NOT NULL,
  `user_full_names` varchar(50) COLLATE utf8mb4_general_ci NOT NULL,
  `user_email` varchar(50) COLLATE utf8mb4_general_ci NOT NULL,
  `user_phone_number` varchar(10) COLLATE utf8mb4_general_ci NOT NULL,
  `user_gender` varchar(50) COLLATE utf8mb4_general_ci NOT NULL,
  `user_home_address` varchar(50) COLLATE utf8mb4_general_ci NOT NULL,
  `user_id_number` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`user_id`, `user_full_names`, `user_email`, `user_phone_number`, `user_gender`, `user_home_address`, `user_id_number`) VALUES
(2, 'kdkcmdcdk', 'kkk@gmail.com', '0799001122', 'Male', 'chenene ', 99002121);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`admin_id`);

--
-- Indexes for table `agent`
--
ALTER TABLE `agent`
  ADD PRIMARY KEY (`agent_id`);

--
-- Indexes for table `book_visits`
--
ALTER TABLE `book_visits`
  ADD PRIMARY KEY (`visit_id`);

--
-- Indexes for table `building`
--
ALTER TABLE `building`
  ADD PRIMARY KEY (`buidling_id`),
  ADD KEY `building_agent_id` (`building_agent_id`);

--
-- Indexes for table `login`
--
ALTER TABLE `login`
  ADD PRIMARY KEY (`login_id`),
  ADD KEY `login_agent_id` (`login_agent_id`),
  ADD KEY `login_admin_id` (`login_admin_id`),
  ADD KEY `login_user_id` (`login_user_id`);

--
-- Indexes for table `payment`
--
ALTER TABLE `payment`
  ADD PRIMARY KEY (`payment_id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `admin_id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `agent`
--
ALTER TABLE `agent`
  MODIFY `agent_id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `book_visits`
--
ALTER TABLE `book_visits`
  MODIFY `visit_id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `building`
--
ALTER TABLE `building`
  MODIFY `buidling_id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `login`
--
ALTER TABLE `login`
  MODIFY `login_id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `payment`
--
ALTER TABLE `payment`
  MODIFY `payment_id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `user_id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `building`
--
ALTER TABLE `building`
  ADD CONSTRAINT `building_ibfk_1` FOREIGN KEY (`building_agent_id`) REFERENCES `agent` (`agent_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `login`
--
ALTER TABLE `login`
  ADD CONSTRAINT `login_ibfk_1` FOREIGN KEY (`login_agent_id`) REFERENCES `agent` (`agent_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `login_ibfk_2` FOREIGN KEY (`login_admin_id`) REFERENCES `admin` (`admin_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `login_ibfk_3` FOREIGN KEY (`login_user_id`) REFERENCES `user` (`user_id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
