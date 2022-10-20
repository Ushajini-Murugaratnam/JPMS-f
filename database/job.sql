-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 20, 2022 at 12:54 PM
-- Server version: 10.4.22-MariaDB
-- PHP Version: 8.0.13

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `job`
--

-- --------------------------------------------------------

--
-- Table structure for table `contact_us`
--

CREATE TABLE `contact_us` (
  `id` int(11) NOT NULL,
  `first_name` varchar(50) NOT NULL,
  `last_name` varchar(50) NOT NULL,
  `email` varchar(200) NOT NULL,
  `phone` varchar(11) NOT NULL,
  `message` text NOT NULL,
  `tittle` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `contact_us`
--

INSERT INTO `contact_us` (`id`, `first_name`, `last_name`, `email`, `phone`, `message`, `tittle`) VALUES
(7, 'usha', 'murugaratnam', 'ushamurugaratnam94@gmail.com', '1111111111', '1', '1'),
(8, '1', '1', 'ushamurugaratnam94@gmail.com', '1111111111', '11', '11'),
(9, '1', '1', 'ushamurugaratnam94@gmail.com', '1111111111', '11', '11'),
(10, 'usha1', 'murugaratnam', 'ushamurugaratnam94@gmail.com', '1111111111', '1', '11');

-- --------------------------------------------------------

--
-- Table structure for table `message`
--

CREATE TABLE `message` (
  `id` int(200) NOT NULL,
  `company_id` int(200) NOT NULL,
  `seeker_id` int(200) NOT NULL,
  `seeker_email` varchar(200) NOT NULL,
  `send_email` varchar(200) NOT NULL,
  `message` varchar(500) NOT NULL,
  `job_tittle` varchar(200) NOT NULL,
  `mobile` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `message`
--

INSERT INTO `message` (`id`, `company_id`, `seeker_id`, `seeker_email`, `send_email`, `message`, `job_tittle`, `mobile`) VALUES
(6, 16, 59, 'jobusha94@gmail.com', 'ushamurugaratnam94@gmail.com', '2', '20', '2222222222');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_aboutus`
--

CREATE TABLE `tbl_aboutus` (
  `id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `uplod_image` varchar(100) NOT NULL,
  `desingnation` varchar(100) NOT NULL,
  `tittle` varchar(200) DEFAULT NULL,
  `description` varchar(1000) NOT NULL,
  `link` varchar(200) DEFAULT NULL,
  `create_time` datetime DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_aboutus`
--

INSERT INTO `tbl_aboutus` (`id`, `name`, `uplod_image`, `desingnation`, `tittle`, `description`, `link`, `create_time`) VALUES
(7, 'usha', '1.PNG', 'hr', 'news1', 'a', 'a', '2022-10-20 12:29:36');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_admin`
--

CREATE TABLE `tbl_admin` (
  `ad_id` int(10) NOT NULL,
  `fullname` varchar(200) NOT NULL,
  `username` varchar(100) NOT NULL,
  `email` varchar(200) NOT NULL,
  `password` varchar(10) NOT NULL,
  `verify_token` varchar(200) NOT NULL,
  `verify_status` tinyint(4) NOT NULL DEFAULT 0,
  `create_time` datetime NOT NULL DEFAULT current_timestamp(),
  `update_time` datetime NOT NULL DEFAULT current_timestamp(),
  `mobile` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_admin`
--

INSERT INTO `tbl_admin` (`ad_id`, `fullname`, `username`, `email`, `password`, `verify_token`, `verify_status`, `create_time`, `update_time`, `mobile`) VALUES
(1, '1', '1', 'ushamurugaratnam94@gmail.com', '1', '0978453d46fc08fe4a8410bd4c741090', 1, '2022-10-20 12:28:13', '2022-10-20 15:58:13', '1111111111');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_company`
--

CREATE TABLE `tbl_company` (
  `company_id` int(200) NOT NULL,
  `company_name` varchar(200) NOT NULL,
  `web` varchar(200) NOT NULL,
  `mobile` varchar(10) NOT NULL,
  `country` varchar(200) NOT NULL,
  `address` varchar(200) NOT NULL,
  `email` varchar(200) NOT NULL,
  `password` varchar(10) NOT NULL,
  `verify_token` varchar(200) NOT NULL,
  `verify_status` tinyint(4) NOT NULL DEFAULT 0,
  `create_time` datetime NOT NULL DEFAULT current_timestamp(),
  `update_time` datetime NOT NULL DEFAULT current_timestamp(),
  `filename` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_company`
--

INSERT INTO `tbl_company` (`company_id`, `company_name`, `web`, `mobile`, `country`, `address`, `email`, `password`, `verify_token`, `verify_status`, `create_time`, `update_time`, `filename`) VALUES
(16, '1', '1', '1111111111', '1', '1', 'ushamurugaratnam94@gmail.com', '1', 'c751442049b898deaa84324cc2b2daa4', 1, '2022-10-20 12:32:59', '2022-10-20 16:02:59', 'c.PNG'),
(17, '2', '2', '2222222222', '2', '2', 'jobusha94@gmail.com', '1', '01bda828c72e9c0121f8e39cc15bfd34', 0, '2022-10-20 12:41:42', '2022-10-20 16:11:42', '1.PNG');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_job`
--

CREATE TABLE `tbl_job` (
  `job_id` int(200) NOT NULL,
  `company_id` int(200) NOT NULL,
  `type_id` int(20) NOT NULL,
  `cat_id` int(20) NOT NULL,
  `job_tittle` varchar(100) NOT NULL,
  `job_desc` varchar(200) NOT NULL,
  `job_salary` int(200) NOT NULL,
  `contact_name` varchar(200) NOT NULL,
  `email` varchar(200) NOT NULL,
  `mobile` varchar(10) NOT NULL,
  `post_date` datetime NOT NULL,
  `end_date` datetime NOT NULL,
  `apStatus` tinyint(2) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_job`
--

INSERT INTO `tbl_job` (`job_id`, `company_id`, `type_id`, `cat_id`, `job_tittle`, `job_desc`, `job_salary`, `contact_name`, `email`, `mobile`, `post_date`, `end_date`, `apStatus`) VALUES
(20, 16, 25, 24, '1', '1', 1, '1', 'jobusha94@gmail.com', '1111111111', '1111-11-11 00:00:00', '1111-11-11 00:00:00', 1),
(21, 16, 25, 24, '1111', '1111', 1111, '111', 'ushamurugaratnam94@gmail.com', '1111111111', '2022-10-19 00:00:00', '2022-10-22 00:00:00', 1),
(22, 17, 25, 24, '21', '12', 12, '12', 'ushamurugaratnam94@gmail.com', '1222222222', '2121-12-12 00:00:00', '0012-12-21 00:00:00', 1);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_job_application`
--

CREATE TABLE `tbl_job_application` (
  `ap_id` int(11) NOT NULL,
  `job_id` int(11) NOT NULL,
  `seeker_id` int(11) DEFAULT NULL,
  `seeker_fname` varchar(100) NOT NULL,
  `seeker_lname` varchar(100) DEFAULT NULL,
  `job_tittle` varchar(100) NOT NULL,
  `email` varchar(100) DEFAULT NULL,
  `company_email` varchar(100) DEFAULT NULL,
  `mobile` int(15) DEFAULT NULL,
  `status` varchar(10) NOT NULL DEFAULT 'pending'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_job_application`
--

INSERT INTO `tbl_job_application` (`ap_id`, `job_id`, `seeker_id`, `seeker_fname`, `seeker_lname`, `job_tittle`, `email`, `company_email`, `mobile`, `status`) VALUES
(37, 20, 59, 'e', 'e', '1', 'jobusha94@gmail.com', 'jobusha94@gmail.com', 2147483647, '1'),
(38, 21, 59, 'e', 'e', '1111', 'jobusha94@gmail.com', 'ushamurugaratnam94@gmail.com', 2147483647, 'pending'),
(39, 20, 59, 'e', 'e', '1', 'jobusha94@gmail.com', 'jobusha94@gmail.com', 2147483647, '1'),
(40, 21, 59, 'wwwwwwwww', 'wwwwwww', '1111', 'jobusha94@gmail.com', 'ushamurugaratnam94@gmail.com', 2147483647, 'pending'),
(41, 22, 59, 'e', 'e', '21', 'jobusha94@gmail.com', 'ushamurugaratnam94@gmail.com', 2147483647, 'pending');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_job_cat`
--

CREATE TABLE `tbl_job_cat` (
  `cat_id` int(10) NOT NULL,
  `category_name` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_job_cat`
--

INSERT INTO `tbl_job_cat` (`cat_id`, `category_name`) VALUES
(24, 'w');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_job_type`
--

CREATE TABLE `tbl_job_type` (
  `type_id` int(10) NOT NULL,
  `job_type` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_job_type`
--

INSERT INTO `tbl_job_type` (`type_id`, `job_type`) VALUES
(25, 'fulltime'),
(26, 'parttime');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_seeker`
--

CREATE TABLE `tbl_seeker` (
  `seeker_id` int(200) NOT NULL,
  `seeker_fname` varchar(200) NOT NULL,
  `seeker_lname` varchar(200) NOT NULL,
  `email` varchar(200) NOT NULL,
  `mobile` varchar(10) NOT NULL,
  `password` varchar(10) NOT NULL,
  `filename` varchar(200) NOT NULL,
  `verify_token` varchar(200) NOT NULL,
  `verify_status` tinyint(4) NOT NULL DEFAULT 0,
  `create_time` datetime NOT NULL DEFAULT current_timestamp(),
  `update_time` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_seeker`
--

INSERT INTO `tbl_seeker` (`seeker_id`, `seeker_fname`, `seeker_lname`, `email`, `mobile`, `password`, `filename`, `verify_token`, `verify_status`, `create_time`, `update_time`) VALUES
(59, 'e', 'e', 'jobusha94@gmail.com', '3222222222', 'e', 'job.sql', 'c629eb62ea3e07822be599aeaa3b4562', 1, '2022-10-20 12:11:30', '2022-10-20 15:41:30');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `contact_us`
--
ALTER TABLE `contact_us`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `message`
--
ALTER TABLE `message`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_aboutus`
--
ALTER TABLE `tbl_aboutus`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_admin`
--
ALTER TABLE `tbl_admin`
  ADD PRIMARY KEY (`ad_id`),
  ADD UNIQUE KEY `email` (`email`);

--
-- Indexes for table `tbl_company`
--
ALTER TABLE `tbl_company`
  ADD PRIMARY KEY (`company_id`),
  ADD UNIQUE KEY `email` (`email`);

--
-- Indexes for table `tbl_job`
--
ALTER TABLE `tbl_job`
  ADD PRIMARY KEY (`job_id`),
  ADD KEY `cat` (`cat_id`),
  ADD KEY `type` (`type_id`),
  ADD KEY `company` (`company_id`);

--
-- Indexes for table `tbl_job_application`
--
ALTER TABLE `tbl_job_application`
  ADD PRIMARY KEY (`ap_id`),
  ADD KEY `job` (`job_id`),
  ADD KEY `seeker` (`seeker_id`);

--
-- Indexes for table `tbl_job_cat`
--
ALTER TABLE `tbl_job_cat`
  ADD PRIMARY KEY (`cat_id`),
  ADD UNIQUE KEY `category_name` (`category_name`);

--
-- Indexes for table `tbl_job_type`
--
ALTER TABLE `tbl_job_type`
  ADD PRIMARY KEY (`type_id`),
  ADD UNIQUE KEY `category_name` (`job_type`);

--
-- Indexes for table `tbl_seeker`
--
ALTER TABLE `tbl_seeker`
  ADD PRIMARY KEY (`seeker_id`),
  ADD UNIQUE KEY `email` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `contact_us`
--
ALTER TABLE `contact_us`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `message`
--
ALTER TABLE `message`
  MODIFY `id` int(200) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `tbl_aboutus`
--
ALTER TABLE `tbl_aboutus`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `tbl_admin`
--
ALTER TABLE `tbl_admin`
  MODIFY `ad_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `tbl_company`
--
ALTER TABLE `tbl_company`
  MODIFY `company_id` int(200) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `tbl_job`
--
ALTER TABLE `tbl_job`
  MODIFY `job_id` int(200) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT for table `tbl_job_application`
--
ALTER TABLE `tbl_job_application`
  MODIFY `ap_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=42;

--
-- AUTO_INCREMENT for table `tbl_job_cat`
--
ALTER TABLE `tbl_job_cat`
  MODIFY `cat_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT for table `tbl_job_type`
--
ALTER TABLE `tbl_job_type`
  MODIFY `type_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- AUTO_INCREMENT for table `tbl_seeker`
--
ALTER TABLE `tbl_seeker`
  MODIFY `seeker_id` int(200) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=60;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `tbl_job`
--
ALTER TABLE `tbl_job`
  ADD CONSTRAINT `cat` FOREIGN KEY (`cat_id`) REFERENCES `tbl_job_cat` (`cat_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `company` FOREIGN KEY (`company_id`) REFERENCES `tbl_company` (`company_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `type` FOREIGN KEY (`type_id`) REFERENCES `tbl_job_type` (`type_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `tbl_job_application`
--
ALTER TABLE `tbl_job_application`
  ADD CONSTRAINT `job` FOREIGN KEY (`job_id`) REFERENCES `tbl_job` (`job_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `seeker` FOREIGN KEY (`seeker_id`) REFERENCES `tbl_seeker` (`seeker_id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
