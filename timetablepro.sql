-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 19, 2023 at 04:45 PM
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
-- Database: `timetablepro`
--

-- --------------------------------------------------------

--
-- Table structure for table `assign`
--

CREATE TABLE `assign` (
  `assign_id` int(11) NOT NULL,
  `course_code` varchar(255) NOT NULL,
  `course_name` varchar(255) NOT NULL,
  `sem_type` varchar(10) NOT NULL,
  `course_core` varchar(255) NOT NULL,
  `department` varchar(255) NOT NULL,
  `lab` enum('yes','no') NOT NULL,
  `credit` int(11) NOT NULL,
  `priority` int(11) NOT NULL,
  `staff_name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `assign`
--

INSERT INTO `assign` (`assign_id`, `course_code`, `course_name`, `sem_type`, `course_core`, `department`, `lab`, `credit`, `priority`, `staff_name`) VALUES
(6, 'com-201', 'c++', 'odd', '', 'msc', 'yes', 1, 3, 'uma'),
(7, 'coms-231', 'java', 'odd', '', 'mca', 'yes', 1, 0, 'uma'),
(8, 'coms-101', 'fundamentals of pc', 'odd', '', 'mca', 'yes', 1, 0, 'kuppusamy'),
(9, '611', 'maths for network engineering', 'odd', '', 'M.TECH [NIS]', 'no', 3, 1, 'subramaniyan'),
(10, 'IV', 'elective', 'odd', '', 'M.TECH [CSE]', 'yes', 3, 1, 'subramaniyan'),
(11, '612', 'modern cryptography', 'odd', '', 'M.TECH [NIS]', 'no', 1, 3, 'chitralekha'),
(12, 'dum-01', 'dum', 'even', '', 'M.TECH [CSE]', 'yes', 1, 3, 'subramaniyan'),
(13, 'coms-110', 'jdbc', 'odd', 'hardcore', 'M.TECH [CSE]', 'yes', 1, 0, 'subramaniyan'),
(14, 'coims-204', 'elective-2', 'odd', 'softcore', 'M.SC.', 'no', 1, 0, 'subramaniyan');

-- --------------------------------------------------------

--
-- Table structure for table `course`
--

CREATE TABLE `course` (
  `course_id` int(11) NOT NULL,
  `course_code` varchar(50) NOT NULL,
  `course_name` varchar(255) NOT NULL,
  `sem_type` varchar(10) NOT NULL,
  `course_core` varchar(50) NOT NULL,
  `department` varchar(50) NOT NULL,
  `lab` int(11) NOT NULL,
  `credit` int(11) NOT NULL,
  `priority` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `course`
--

INSERT INTO `course` (`course_id`, `course_code`, `course_name`, `sem_type`, `course_core`, `department`, `lab`, `credit`, `priority`) VALUES
(6, '611', 'maths for network engineering', 'odd', '', 'M.TECH [NIS]', 2, 3, 1),
(7, 'IV', 'elective', 'odd', '', 'M.TECH [CSE]', 1, 3, 1),
(8, '612', 'modern cryptography', 'odd', '', 'M.TECH [NIS]', 2, 1, 3),
(9, 'dum-01', 'dum', 'even', '', 'M.TECH [CSE]', 1, 1, 3),
(10, 'coms-110', 'jdbc', 'odd', 'hardcore', 'M.TECH [CSE]', 1, 1, 0),
(11, 'coims-204', 'elective-2', 'odd', 'softcore', 'M.SC.', 2, 1, 0),
(14, 'coms-101', 'fundamentals of pc', 'odd', 'hardcore', 'M.TECH [CSE]', 0, 1, 0),
(15, 'fdgdf', 'sdfasd', 'odd', 'hardcore', 'M.TECH [CSE]', 0, 1, 0);

-- --------------------------------------------------------

--
-- Table structure for table `department`
--

CREATE TABLE `department` (
  `sno` int(11) NOT NULL,
  `dept` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `department`
--

INSERT INTO `department` (`sno`, `dept`) VALUES
(7, 'M.TECH [CSE]'),
(8, 'M.TECH [NIS]'),
(9, 'M.SC.');

-- --------------------------------------------------------

--
-- Table structure for table `staff`
--

CREATE TABLE `staff` (
  `regno` int(11) NOT NULL,
  `name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `staff`
--

INSERT INTO `staff` (`regno`, `name`) VALUES
(1, 'subramaniyan'),
(2, 'chitralekha');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `assign`
--
ALTER TABLE `assign`
  ADD PRIMARY KEY (`assign_id`);

--
-- Indexes for table `course`
--
ALTER TABLE `course`
  ADD PRIMARY KEY (`course_id`);

--
-- Indexes for table `department`
--
ALTER TABLE `department`
  ADD PRIMARY KEY (`sno`);

--
-- Indexes for table `staff`
--
ALTER TABLE `staff`
  ADD PRIMARY KEY (`regno`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `assign`
--
ALTER TABLE `assign`
  MODIFY `assign_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `course`
--
ALTER TABLE `course`
  MODIFY `course_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `department`
--
ALTER TABLE `department`
  MODIFY `sno` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `staff`
--
ALTER TABLE `staff`
  MODIFY `regno` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
