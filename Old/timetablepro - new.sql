-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Dec 29, 2023 at 06:07 PM
-- Server version: 8.2.0
-- PHP Version: 8.2.12

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
  `assign_id` int NOT NULL,
  `course_code` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  `course_name` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  `sem_type` varchar(10) COLLATE utf8mb4_general_ci NOT NULL,
  `course_core` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  `department` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  `lab` enum('yes','no') COLLATE utf8mb4_general_ci NOT NULL,
  `credit` int NOT NULL,
  `priority` int NOT NULL,
  `staff_name` varchar(255) COLLATE utf8mb4_general_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `assign`
--

INSERT INTO `assign` (`assign_id`, `course_code`, `course_name`, `sem_type`, `course_core`, `department`, `lab`, `credit`, `priority`, `staff_name`) VALUES
(15, 'CSSC 411', 'Design and Analysis of Algorithms ', 'odd', 'hardcore', 'msc first year batch 1', '', 3, 0, 'Dr. V. UMA'),
(16, 'CSSC 412', 'Advanced Computer Architecture', 'odd', 'hardcore', 'msc first year batch 1', '', 3, 0, 'Dr. S. RAVI'),
(17, 'CSSC 413', 'Automata Theory and Formal Languages', 'odd', 'hardcore', 'msc first year batch 1', '', 3, 0, 'Dr. R. SUBRAMANIAN'),
(18, 'CSSC 414', 'Practical I – Algorithms Lab', 'odd', 'hardcore', 'msc first year batch 1', 'no', 2, 0, 'Dr. T. CHITHRALEKHA');

-- --------------------------------------------------------

--
-- Table structure for table `courses`
--

CREATE TABLE `courses` (
  `sno` int NOT NULL,
  `dept` varchar(255) COLLATE utf8mb4_general_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `courses`
--

INSERT INTO `courses` (`sno`, `dept`) VALUES
(16, 'msc first year batch 1'),
(17, 'msc first year batch 2'),
(18, 'mca first year batch 1'),
(19, 'mca first year batch 2'),
(20, 'mtech first year batch 1'),
(21, 'mtech first year batch 2'),
(22, 'msc second year batch 1'),
(23, 'msc second year batch 2'),
(24, 'mca second year batch 1'),
(25, 'mca second year batch 2'),
(26, 'mtech second year batch 1'),
(27, 'mtech second year batch 2');

-- --------------------------------------------------------

--
-- Table structure for table `staff`
--

CREATE TABLE `staff` (
  `regno` int NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_general_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `staff`
--

INSERT INTO `staff` (`regno`, `name`) VALUES
(1, 'Dr. R. SUBRAMANIAN'),
(2, 'Dr. T. CHITHRALEKHA'),
(3, 'Dr. S. SIVA SATHYA'),
(4, 'Dr. S.K.V. JAYAKUMAR'),
(5, 'Dr. K. SURESH JOSEPH'),
(6, 'Dr. S. RAVI'),
(7, 'Dr. M. NANDHINI'),
(8, 'Dr. T. VENGATTARAMAN'),
(9, 'Dr. POTHULA SUJATHA'),
(10, 'Dr. P. SHANTHI BALA'),
(11, 'Dr. V. UMA'),
(12, 'Dr. K.S. KUPPUSAMY'),
(13, 'Dr. T. SIVAKUMAR'),
(14, 'Dr. R. SUNITHA'),
(15, 'Dr. M. SATHYA'),
(16, 'Dr. S.L. JAYALAKSHMI'),
(17, 'DR.G.KRISHNAPRIYA'),
(18, 'DR. SUKHVINDER SINGH');

-- --------------------------------------------------------

--
-- Table structure for table `subjects`
--

CREATE TABLE `subjects` (
  `course_id` int NOT NULL,
  `course_code` varchar(50) COLLATE utf8mb4_general_ci NOT NULL,
  `course_name` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  `sem_type` varchar(10) COLLATE utf8mb4_general_ci NOT NULL,
  `course_core` varchar(50) COLLATE utf8mb4_general_ci NOT NULL,
  `department` varchar(50) COLLATE utf8mb4_general_ci NOT NULL,
  `lab` int NOT NULL,
  `credit` int NOT NULL,
  `priority` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `subjects`
--

INSERT INTO `subjects` (`course_id`, `course_code`, `course_name`, `sem_type`, `course_core`, `department`, `lab`, `credit`, `priority`) VALUES
(16, 'CSSC 411', 'Design and Analysis of Algorithms ', 'odd', 'hardcore', 'msc first year batch 1', 0, 3, 0),
(17, 'CSSC 412', 'Advanced Computer Architecture', 'odd', 'hardcore', 'msc first year batch 1', 0, 3, 0),
(18, 'CSSC 413', 'Automata Theory and Formal Languages', 'odd', 'hardcore', 'msc first year batch 1', 0, 3, 0),
(20, 'CSSC 414', 'Practical I – Algorithms Lab', 'odd', 'hardcore', 'msc first year batch 1', 2, 2, 0),
(21, 'CSSC 434', ' Probability and Statistics', 'odd', 'hardcore', 'msc first year batch 1', 0, 3, 0),
(22, 'CSSC 415', 'Practical II – Computer Architecture Lab', 'odd', 'hardcore', 'msc first year batch 1', 2, 2, 0),
(23, 'CSSC 421', 'Modern Operating Systems', 'even', 'hardcore', 'msc first year batch 1', 0, 3, 0),
(24, 'CSSC 422', 'Advanced Database Systems', 'even', 'hardcore', 'msc first year batch 1', 0, 3, 0),
(25, 'CSSC 433', 'Optimization Techniques', 'even', 'hardcore', 'msc first year batch 1', 0, 3, 0),
(27, 'CSSC 424', 'Practical IV – Database System Lab', 'even', 'hardcore', 'msc first year batch 1', 2, 2, 0),
(28, 'CSSC 423', 'Practical III – Operating System Lab ', 'even', 'hardcore', 'msc first year batch 1', 2, 2, 0),
(29, 'CSSC 511', 'Advanced Computer Networks', 'odd', 'hardcore', 'msc second year batch 1', 0, 3, 0),
(30, 'CSSC 512', 'Web Technology', 'odd', 'hardcore', 'msc second year batch 1', 0, 3, 0),
(31, 'CSSC 434', 'Linear Programming', 'odd', 'hardcore', 'msc second year batch 1', 0, 3, 0),
(34, 'CSSC 513', 'Practical V – Web Technology and Computer Networks Lab', 'odd', 'hardcore', 'msc second year batch 1', 2, 2, 0);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `assign`
--
ALTER TABLE `assign`
  ADD PRIMARY KEY (`assign_id`);

--
-- Indexes for table `courses`
--
ALTER TABLE `courses`
  ADD PRIMARY KEY (`sno`);

--
-- Indexes for table `staff`
--
ALTER TABLE `staff`
  ADD PRIMARY KEY (`regno`);

--
-- Indexes for table `subjects`
--
ALTER TABLE `subjects`
  ADD PRIMARY KEY (`course_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `assign`
--
ALTER TABLE `assign`
  MODIFY `assign_id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `courses`
--
ALTER TABLE `courses`
  MODIFY `sno` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;

--
-- AUTO_INCREMENT for table `staff`
--
ALTER TABLE `staff`
  MODIFY `regno` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `subjects`
--
ALTER TABLE `subjects`
  MODIFY `course_id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=36;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
