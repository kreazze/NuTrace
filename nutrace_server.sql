-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Jul 25, 2023 at 04:14 PM
-- Server version: 10.6.12-MariaDB-cll-lve
-- PHP Version: 7.2.34

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `u158858399_nutrace_server`
--

-- --------------------------------------------------------

--
-- Table structure for table `forgot_password`
--

CREATE TABLE `forgot_password` (
  `id` int(11) NOT NULL,
  `email` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `forgot_password`
--

INSERT INTO `forgot_password` (`id`, `email`) VALUES
(17, 'krisannedelprado@gma'),
(18, 'abc@gmail.com'),
(19, 'abc@gmail.com'),
(20, ''),
(21, 'sample@y.com'),
(22, 'krisannedelprado@gma'),
(23, 'krisannedelprado@gma');

-- --------------------------------------------------------

--
-- Table structure for table `soil_nutrients`
--

CREATE TABLE `soil_nutrients` (
  `id` int(11) NOT NULL,
  `sn_date` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `sn_nitrogen` float NOT NULL,
  `sn_phosphorus` float NOT NULL,
  `sn_potassium` float NOT NULL,
  `sn_moisture` float NOT NULL,
  `sn_temperature` float NOT NULL,
  `sn_ph` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `soil_nutrients`
--

INSERT INTO `soil_nutrients` (`id`, `sn_date`, `sn_nitrogen`, `sn_phosphorus`, `sn_potassium`, `sn_moisture`, `sn_temperature`, `sn_ph`) VALUES
(1, '2023-07-25 05:20:13', 0, 0, 0, 0, 0, 0),
(2, '2023-07-25 05:20:45', 0, 0, 0, 0, 0, 0),
(3, '2023-07-25 05:21:15', 0, 0, 0, 0, 0, 0),
(4, '2023-07-25 05:21:16', 0, 0, 0, 0, 0, 0),
(5, '2023-07-25 05:25:44', 65535, 65535, 65535, 0, -127, 655.3),
(6, '2023-07-25 05:25:54', 65535, 65535, 65535, 0, -127, 655.3),
(7, '2023-07-25 05:26:05', 65535, 65535, 65535, 0, -127, 655.3),
(8, '2023-07-25 05:26:16', 65535, 65535, 65535, 0, -127, 655.3),
(9, '2023-07-25 05:26:26', 65535, 65535, 65535, 0, -127, 655.3),
(10, '2023-07-25 05:27:28', 0, 0, 0, 0, 0, 0),
(11, '2023-07-25 05:27:36', 0, 0, 0, 0, 0, 0),
(12, '2023-07-25 15:58:02', 65535, 65535, 65535, 0, -127, 655.3),
(13, '2023-07-25 15:58:13', 65535, 65535, 65535, 0, -127, 655.3),
(14, '2023-07-25 15:58:23', 65535, 65535, 65535, 0, -127, 655.3),
(15, '2023-07-25 15:58:32', 65535, 65535, 65535, 0, -127, 655.3),
(16, '2023-07-25 15:58:42', 65535, 65535, 65535, 0, -127, 655.3),
(17, '2023-07-25 15:58:52', 65535, 65535, 65535, 0, -127, 655.3),
(18, '2023-07-25 15:59:02', 65535, 65535, 65535, 0, -127, 655.3),
(19, '2023-07-25 15:59:12', 65535, 65535, 65535, 0, -127, 655.3),
(20, '2023-07-25 15:59:22', 65535, 65535, 65535, 0, -127, 655.3),
(21, '2023-07-25 15:59:31', 65535, 65535, 65535, 0, -127, 655.3),
(22, '2023-07-25 15:59:41', 65535, 65535, 65535, 1, -127, 655.3),
(23, '2023-07-25 15:59:51', 65535, 65535, 65535, 0, -127, 655.3),
(24, '2023-07-25 16:00:01', 65535, 65535, 65535, 0, -127, 655.3),
(25, '2023-07-25 16:00:35', 65535, 65535, 65535, 0, -127, 655.3),
(26, '2023-07-25 16:00:45', 65535, 65535, 65535, 0, -127, 655.3),
(27, '2023-07-25 16:00:55', 65535, 65535, 65535, 0, -127, 655.3),
(28, '2023-07-25 16:01:05', 65535, 65535, 65535, 0, -127, 655.3),
(29, '2023-07-25 16:01:15', 65535, 65535, 65535, 0, -127, 655.3),
(30, '2023-07-25 16:01:26', 65535, 65535, 65535, 1, -127, 655.3),
(31, '2023-07-25 16:01:36', 65535, 65535, 65535, 0, -127, 655.3),
(32, '2023-07-25 16:01:46', 65535, 65535, 65535, 0, -127, 655.3),
(33, '2023-07-25 16:01:57', 65535, 65535, 65535, 1, -127, 655.3),
(34, '2023-07-25 16:02:49', 65535, 65535, 65535, 27, -127, 655.3),
(35, '2023-07-25 16:02:59', 65535, 65535, 65535, 110, -127, 655.3),
(36, '2023-07-25 16:03:09', 65535, 65535, 65535, 110, -127, 655.3),
(37, '2023-07-25 16:03:18', 65535, 65535, 65535, 110, -127, 655.3),
(38, '2023-07-25 16:03:28', 65535, 65535, 65535, 110, -127, 655.3),
(39, '2023-07-25 16:03:38', 65535, 65535, 65535, 110, -127, 655.3),
(40, '2023-07-25 16:03:48', 65535, 65535, 65535, 110, -127, 655.3),
(41, '2023-07-25 16:03:58', 65535, 65535, 65535, 110, -127, 655.3),
(42, '2023-07-25 16:04:08', 65535, 65535, 65535, 110, -127, 655.3),
(43, '2023-07-25 16:04:18', 65535, 65535, 65535, 110, -127, 655.3),
(44, '2023-07-25 16:04:28', 65535, 65535, 65535, 110, -127, 655.3),
(45, '2023-07-25 16:04:38', 65535, 65535, 65535, 110, -127, 655.3),
(46, '2023-07-25 16:04:48', 65535, 65535, 65535, 110, -127, 655.3),
(47, '2023-07-25 16:04:58', 65535, 65535, 65535, 110, -127, 655.3),
(48, '2023-07-25 16:05:08', 65535, 65535, 65535, 110, -127, 655.3),
(49, '2023-07-25 16:05:17', 65535, 65535, 65535, 110, -127, 655.3),
(50, '2023-07-25 16:05:28', 65535, 65535, 65535, 110, -127, 655.3),
(51, '2023-07-25 16:05:38', 65535, 65535, 65535, 110, -127, 655.3),
(52, '2023-07-25 16:05:48', 65535, 65535, 65535, 110, -127, 655.3),
(53, '2023-07-25 16:05:57', 65535, 65535, 65535, 110, -127, 655.3),
(54, '2023-07-25 16:06:08', 65535, 65535, 65535, 110, -127, 655.3),
(55, '2023-07-25 16:06:18', 65535, 65535, 65535, 110, -127, 655.3),
(56, '2023-07-25 16:06:29', 65535, 65535, 65535, 110, -127, 655.3),
(57, '2023-07-25 16:06:39', 65535, 65535, 65535, 110, -127, 655.3),
(58, '2023-07-25 16:06:48', 65535, 65535, 65535, 110, -127, 655.3),
(59, '2023-07-25 16:06:58', 65535, 65535, 65535, 110, -127, 655.3),
(60, '2023-07-25 16:07:08', 65535, 65535, 65535, 110, -127, 655.3),
(61, '2023-07-25 16:07:18', 65535, 65535, 65535, 110, -127, 655.3),
(62, '2023-07-25 16:07:28', 65535, 65535, 65535, 110, -127, 655.3),
(63, '2023-07-25 16:07:38', 65535, 65535, 65535, 110, -127, 655.3),
(64, '2023-07-25 16:07:48', 65535, 65535, 65535, 110, -127, 655.3),
(65, '2023-07-25 16:07:58', 65535, 65535, 65535, 110, -127, 655.3),
(66, '2023-07-25 16:08:08', 65535, 65535, 65535, 110, -127, 655.3),
(67, '2023-07-25 16:08:18', 65535, 65535, 65535, 110, -127, 655.3),
(68, '2023-07-25 16:08:28', 65535, 65535, 65535, 110, -127, 655.3),
(69, '2023-07-25 16:08:38', 65535, 65535, 65535, 110, -127, 655.3),
(70, '2023-07-25 16:08:47', 65535, 65535, 65535, 110, -127, 655.3),
(71, '2023-07-25 16:08:57', 65535, 65535, 65535, 110, -127, 655.3),
(72, '2023-07-25 16:09:07', 65535, 65535, 65535, 110, -127, 655.3),
(73, '2023-07-25 16:09:18', 65535, 65535, 65535, 110, -127, 655.3),
(74, '2023-07-25 16:09:28', 65535, 65535, 65535, 110, -127, 655.3),
(75, '2023-07-25 16:09:37', 65535, 65535, 65535, 110, -127, 655.3),
(76, '2023-07-25 16:09:47', 65535, 65535, 65535, 110, -127, 655.3),
(77, '2023-07-25 16:09:57', 65535, 65535, 65535, 110, -127, 655.3),
(78, '2023-07-25 16:10:08', 65535, 65535, 65535, 110, -127, 655.3),
(79, '2023-07-25 16:10:18', 65535, 65535, 65535, 110, -127, 655.3),
(80, '2023-07-25 16:10:28', 65535, 65535, 65535, 110, -127, 655.3),
(81, '2023-07-25 16:10:37', 65535, 65535, 65535, 110, -127, 655.3),
(82, '2023-07-25 16:10:47', 65535, 65535, 65535, 110, -127, 655.3),
(83, '2023-07-25 16:10:57', 65535, 65535, 65535, 110, -127, 655.3),
(84, '2023-07-25 16:11:07', 65535, 65535, 65535, 110, -127, 655.3),
(85, '2023-07-25 16:11:17', 65535, 65535, 65535, 110, -127, 655.3),
(86, '2023-07-25 16:11:26', 65535, 65535, 65535, 110, -127, 655.3),
(87, '2023-07-25 16:11:37', 65535, 65535, 65535, 110, -127, 655.3),
(88, '2023-07-25 16:11:47', 65535, 65535, 65535, 110, -127, 655.3),
(89, '2023-07-25 16:11:56', 65535, 65535, 65535, 110, -127, 655.3),
(90, '2023-07-25 16:12:06', 65535, 65535, 65535, 110, -127, 655.3),
(91, '2023-07-25 16:12:16', 65535, 65535, 65535, 110, -127, 655.3),
(92, '2023-07-25 16:12:25', 65535, 65535, 65535, 110, -127, 655.3),
(93, '2023-07-25 16:12:35', 65535, 65535, 65535, 110, -127, 655.3),
(94, '2023-07-25 16:12:46', 65535, 65535, 65535, 110, -127, 655.3),
(95, '2023-07-25 16:12:56', 65535, 65535, 65535, 110, -127, 655.3),
(96, '2023-07-25 16:13:05', 65535, 65535, 65535, 110, -127, 655.3),
(97, '2023-07-25 16:13:15', 65535, 65535, 65535, 110, -127, 655.3),
(98, '2023-07-25 16:13:25', 65535, 65535, 65535, 110, -127, 655.3),
(99, '2023-07-25 16:13:35', 65535, 65535, 65535, 110, -127, 655.3),
(100, '2023-07-25 16:13:44', 65535, 65535, 65535, 110, -127, 655.3),
(101, '2023-07-25 16:13:54', 65535, 65535, 65535, 110, -127, 655.3),
(102, '2023-07-25 16:14:04', 65535, 65535, 65535, 110, -127, 655.3);

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

--
-- Dumping data for table `tbl_inventory`
--

INSERT INTO `tbl_inventory` (`id`, `date`, `croptype`, `quantity`, `harvester`, `status`, `action`) VALUES
(1, '2023-07-23', 'kamatis', 3, 'Juan Dela Cruz', 'Approved', ''),
(2, '2023-07-23', 'mais', 2, 'Admin User', 'Approved', ''),
(3, '2023-07-23', 'Patola', 1, 'Juan Dela Cruz', 'Pending', ''),
(4, '2023-07-23', 'kamatis', 1, '<b>Juan Dela Cruz</b', 'Declined', ''),
(5, '2023-07-23', 'kamatis', 1, '<marquee><b>Admin Us', 'Approved', '');

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
  `user_type` varchar(10) NOT NULL,
  `reset_token_hash` varchar(255) DEFAULT NULL,
  `reset_token_expires_at` datetime DEFAULT NULL,
  `reset_otp` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tbl_users`
--

INSERT INTO `tbl_users` (`id`, `fullname`, `contact`, `email`, `password`, `cpassword`, `user_type`, `reset_token_hash`, `reset_token_expires_at`, `reset_otp`) VALUES
(1, 'Sample', 9222222222, 'sample@y.com', '4e91b1cbe42b5c884de47d4c7fda0555', '4e91b1cbe42b5c884de4', 'admin', 'd1de5523bb5bf9b1a4471e24a7b75bbb5d7e7cc53683dd0926b5d76fa9e4ad2d', '2023-07-16 16:46:08', 0),
(2, 'Sample User', 9333333333, 'sampleuser@y.com', '4e91b1cbe42b5c884de47d4c7fda0555', '4e91b1cbe42b5c884de4', 'user', NULL, NULL, 0),
(3, 'kris', 9451322540, 'krisannedelprado@gmail.com', '4e91b1cbe42b5c884de47d4c7fda0555', '4e91b1cbe42b5c884de4', 'admin', '33b3199271754b981e27dd41cb325fbeb34b358b44866ee4a69ee848f80ef1bc', '2023-07-16 16:46:02', 0),
(4, 'sample', 9451322540, 'kreasedelprado@gmail.com', '4e91b1cbe42b5c884de47d4c7fda0555', '4e91b1cbe42b5c884de4', 'admin', '48b6eff67c1d7c44489a9c332944c7b7c40677a49da2add66c54c253dc26cd50', '2023-07-16 17:21:17', 0),
(5, 'User test', 9123456789, 'nu.trace@y.com', 'e4a7604f028ad5a4567cdb1482fd2a1a', 'e4a7604f028ad5a4567c', 'user', NULL, NULL, 0);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `forgot_password`
--
ALTER TABLE `forgot_password`
  ADD PRIMARY KEY (`id`);

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
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `reset_token_hash` (`reset_token_hash`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `forgot_password`
--
ALTER TABLE `forgot_password`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT for table `soil_nutrients`
--
ALTER TABLE `soil_nutrients`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=103;

--
-- AUTO_INCREMENT for table `tbl_inventory`
--
ALTER TABLE `tbl_inventory`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `tbl_task`
--
ALTER TABLE `tbl_task`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tbl_users`
--
ALTER TABLE `tbl_users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
