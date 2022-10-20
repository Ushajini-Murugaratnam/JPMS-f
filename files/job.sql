-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 20, 2022 at 11:32 AM
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

-- --------------------------------------------------------

--
-- Table structure for table `tbl_job_cat`
--

CREATE TABLE `tbl_job_cat` (
  `cat_id` int(10) NOT NULL,
  `category_name` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;


-- --------------------------------------------------------

--
-- Table structure for table `tbl_job_type`
--

CREATE TABLE `tbl_job_type` (
  `type_id` int(10) NOT NULL,
  `job_type` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `message`
--
ALTER TABLE `message`
  MODIFY `id` int(200) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `tbl_aboutus`
--
ALTER TABLE `tbl_aboutus`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `tbl_admin`
--
ALTER TABLE `tbl_admin`
  MODIFY `ad_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT for table `tbl_company`
--
ALTER TABLE `tbl_company`
  MODIFY `company_id` int(200) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `tbl_job`
--
ALTER TABLE `tbl_job`
  MODIFY `job_id` int(200) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `tbl_job_application`
--
ALTER TABLE `tbl_job_application`
  MODIFY `ap_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=37;

--
-- AUTO_INCREMENT for table `tbl_job_cat`
--
ALTER TABLE `tbl_job_cat`
  MODIFY `cat_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT for table `tbl_job_type`
--
ALTER TABLE `tbl_job_type`
  MODIFY `type_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT for table `tbl_seeker`
--
ALTER TABLE `tbl_seeker`
  MODIFY `seeker_id` int(200) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=59;

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
