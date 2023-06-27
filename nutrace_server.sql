-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 27, 2023 at 12:50 PM
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
-- Database: `nutrace_server`
--

-- --------------------------------------------------------

--
-- Table structure for table `soil_nutrients`
--

CREATE TABLE `soil_nutrients` (
  `id` int(11) NOT NULL,
  `sn_date` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `sn_nitrogen` int(11) NOT NULL,
  `sn_phosphorus` int(11) NOT NULL,
  `sn_potassium` int(11) NOT NULL,
  `sn_moisture` int(11) NOT NULL,
  `sn_temperature` int(11) NOT NULL,
  `sn_ph` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `soil_nutrients`
--

INSERT INTO `soil_nutrients` (`id`, `sn_date`, `sn_nitrogen`, `sn_phosphorus`, `sn_potassium`, `sn_moisture`, `sn_temperature`, `sn_ph`) VALUES
(1, '2023-06-26 19:43:58', 0, 0, 0, 0, 0, 0),
(2, '2023-06-26 19:50:38', 0, 0, 0, 0, 0, 0),
(3, '2023-06-26 19:50:44', 0, 0, 0, 0, 0, 0),
(4, '2023-06-26 19:50:49', 0, 0, 0, 0, 0, 0),
(5, '2023-06-26 19:51:08', 0, 0, 0, 0, 0, 0),
(6, '2023-06-26 19:51:42', 0, 0, 0, 0, 0, 0),
(7, '2023-06-26 19:51:44', 0, 0, 0, 0, 0, 0),
(8, '2023-06-26 19:54:42', 0, 0, 0, 0, 0, 0),
(9, '2023-06-26 19:55:17', 0, 0, 0, 0, 0, 0),
(10, '2023-06-26 20:24:14', 0, 0, 0, 0, 0, 0),
(11, '2023-06-26 20:26:43', 0, 0, 0, 0, 0, 0),
(12, '2023-06-26 20:28:02', 0, 0, 0, 0, 0, 0),
(13, '2023-06-26 20:29:49', 0, 0, 0, 0, 0, 0),
(14, '2023-06-26 20:32:03', 0, 0, 0, 0, 0, 0),
(15, '2023-06-26 20:35:42', 0, 0, 0, 0, 0, 0),
(16, '2023-06-26 20:40:15', 0, 0, 0, 0, 0, 0),
(17, '2023-06-26 20:43:46', 0, 0, 0, 0, 0, 0),
(18, '2023-06-26 20:46:48', 0, 0, 0, 0, 0, 0),
(19, '2023-06-26 20:56:06', 0, 0, 0, 0, 0, 0),
(20, '2023-06-26 20:56:16', 0, 0, 0, 0, 0, 0),
(21, '2023-06-26 21:01:36', 0, 0, 0, 0, 0, 0),
(22, '2023-06-26 21:04:15', 0, 0, 0, 0, 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_inventory`
--

CREATE TABLE `tbl_inventory` (
  `id` int(11) NOT NULL,
  `date` date NOT NULL,
  `croptype` varchar(50) NOT NULL,
  `quantity` int(20) NOT NULL,
  `harvester` varchar(20) NOT NULL,
  `status` varchar(20) NOT NULL,
  `action` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_task`
--

CREATE TABLE `tbl_task` (
  `id` int(11) NOT NULL,
  `user` varchar(20) NOT NULL,
  `event_name` varchar(150) NOT NULL,
  `event_time_from` varchar(150) NOT NULL,
  `event_time_to` varchar(150) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_users`
--

CREATE TABLE `tbl_users` (
  `id` int(11) NOT NULL,
  `fullname` varchar(50) NOT NULL,
  `contact` bigint(11) NOT NULL,
  `email` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  `cpassword` varchar(20) NOT NULL,
  `user_type` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tbl_users`
--

INSERT INTO `tbl_users` (`id`, `fullname`, `contact`, `email`, `password`, `cpassword`, `user_type`) VALUES
(1, 'Sample', 9222222222, 'sample@y.com', '4e91b1cbe42b5c884de47d4c7fda0555', '4e91b1cbe42b5c884de4', 'admin'),
(2, 'Sample User', 9333333333, 'sampleuser@y.com', '4e91b1cbe42b5c884de47d4c7fda0555', '4e91b1cbe42b5c884de4', 'user');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `soil_nutrients`
--
ALTER TABLE `soil_nutrients`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_inventory`
--
ALTER TABLE `tbl_inventory`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_task`
--
ALTER TABLE `tbl_task`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_users`
--
ALTER TABLE `tbl_users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `soil_nutrients`
--
ALTER TABLE `soil_nutrients`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT for table `tbl_inventory`
--
ALTER TABLE `tbl_inventory`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tbl_task`
--
ALTER TABLE `tbl_task`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tbl_users`
--
ALTER TABLE `tbl_users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
