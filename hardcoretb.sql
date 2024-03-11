-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 11, 2024 at 05:26 AM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.0.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `putimetbdb`
--

-- --------------------------------------------------------

--
-- Table structure for table `hardcoretb`
--

CREATE TABLE `hardcoretb` (
  `subjectCode` varchar(25) NOT NULL,
  `subjectName` varchar(255) DEFAULT NULL,
  `hoursRequired` int(11) DEFAULT NULL,
  `lab` varchar(10) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `hardcoretb`
--

INSERT INTO `hardcoretb` (`subjectCode`, `subjectName`, `hoursRequired`, `lab`) VALUES
('CSCA_411', 'Data Structures and Algorithms', 4, 'no'),
('CSCA_412', 'Object Oriented Programming', 4, 'no'),
('CSCA_413', 'Database Management Systems', 4, 'no'),
('CSCA_414', 'Data Structures and Algorithms Lab', 4, '1'),
('CSCA_415', 'Object Oriented Programming Lab', 3, '1'),
('CSCA_416', 'Database Management Systems Lab', 3, '1'),
('CSCA_421', 'Computer Networks', 4, 'no'),
('CSCA_422', 'Operating Systems', 4, 'no'),
('CSCA_423', 'Communication Skills', 4, 'no'),
('CSCA_424', 'Computer Networks Lab', 3, '1'),
('CSCA_425', 'Operating Systems Lab', 3, '1'),
('CSCA_511', 'Software Engineering', 4, 'no'),
('CSCA_512', 'Internet and Web Technologies', 4, 'no'),
('CSCA_513', 'Mini Project', 4, 'no'),
('CSCA_514', 'Internet and Web Technologies Lab', 3, '1'),
('CSCA_521', 'Project Work', 4, 'no'),
('CSCA_522', 'Project Seminar', 4, 'no'),
('CSCA_523', 'Project Report And Viva-voce', 4, 'no'),
('CSCE_611', 'Mathematics for Computer Science  and Engineering', 4, 'no'),
('CSCE_612', 'Applied Probability and Statistics  for Engineers', 4, 'no'),
('CSCE_613', 'Network Configuration and  Management', 4, 'no'),
('CSCE_614', 'Advanced Data Structures and  Algorithms', 4, 'no'),
('CSCE_615', 'Internet and Web Technologies', 4, 'no'),
('CSCE_616', 'Network Management Lab', 3, '2'),
('CSCE_617', 'Web Technology Lab', 3, '2'),
('CSCE_621', 'Graph Theory with  Applications to Engineering', 4, 'no'),
('CSCE_623', 'Data Mining and Big Data', 4, 'no'),
('CSCE_624', 'Mobile & Pervasive Computing', 4, 'no'),
('CSCE_625', 'Advanced Operating System', 4, 'no'),
('CSCE_627', 'Data mining Lab', 3, '2'),
('CSCE_628', 'Pervasive computing Lab', 3, '2'),
('CSCE_711', 'Directed Study', 4, 'no'),
('CSCE_712', 'Project Work Phase 1', 4, 'no'),
('CSCE_721', 'Project work Phase 2', 4, 'no'),
('CSCE_722', 'Project report and Viva voce', 4, 'no'),
('CSIG361', 'Java Programming', 4, 'no'),
('CSIG_111', 'Programming in C', 4, 'no'),
('CSIG_112', 'Practical I - C Lab', 3, '2'),
('CSIG_121', 'Problem solving with Data Structures and  Algorithms', 4, 'no'),
('CSIG_122', 'Practical II – DS Lab', 3, '2'),
('CSIG_231', 'Fundamentals of Digital logic and Microprocessors', 4, 'no'),
('CSIG_232', 'Introduction to OOP and Programming in C++', 4, 'no'),
('CSIG_233', 'Practical III - C++ Lab', 3, '2'),
('CSIG_241', 'Operating System and System Software', 4, 'no'),
('CSIG_242', 'Introduction to Database Concepts', 4, 'no'),
('CSIG_243', 'Practical IV - DBMS Lab', 4, '2'),
('CSIG_351', 'Event driven programming', 4, 'no'),
('CSIG_352', 'System Analysis and Design', 4, 'no'),
('CSIG_353', 'Computer Networks', 4, 'no'),
('CSIG_354', 'Practical V VB Lab', 4, 'no'),
('CSIG_362', 'Web Technology', 4, 'no'),
('CSIG_363', 'Practical VI –Web Technology Lab', 3, '3'),
('CSIG_364', 'Mini project using Java', 4, 'no'),
('CSNS_611', 'Mathematics for Network Engineering', 4, 'no'),
('CSNS_612', 'Principles of Modern Cryptography', 4, 'no'),
('CSNS_613', 'Operating Systems: Administration And  Security', 4, 'no'),
('CSNS_614', 'Network Management', 4, 'no'),
('CSNS_615', 'Foundations of Modern Networking', 4, 'no'),
('CSNS_616', 'Cryptography Lab', 3, '2'),
('CSNS_617', 'OS Lab', 3, '2'),
('CSNS_621', 'Resource Management Techniques', 4, 'no'),
('CSNS_622', 'Network Security', 4, 'no'),
('CSNS_623', 'Distributed Systems and Security', 4, 'no'),
('CSNS_624', 'Network Protocols', 4, 'no'),
('CSNS_625', 'Wireless Communication Networks', 4, 'no'),
('CSNS_626', 'Network Security Lab', 3, '2'),
('CSNS_627', 'Network Protocol Lab', 3, '2'),
('CSNS_711', 'Project Work Phase – 1 ', 4, 'no'),
('CSNS_712', 'Information Security Management and  Standards', 4, 'no'),
('CSSC_411', 'Design and Analysis of Algorithms', 4, 'no'),
('CSSC_412', 'Advanced Computer Architecture', 4, 'no'),
('CSSC_413', 'Automata Theory and Formal  Languages', 4, 'no'),
('CSSC_414', 'Practical I –Algorithms Lab', 3, '1'),
('CSSC_415', 'Practical II –Computer Architecture Lab', 3, '1'),
('CSSC_421', 'Modern Operating Systems', 4, 'no'),
('CSSC_422', 'Advanced Database Systems', 4, 'no'),
('CSSC_423', 'Practical III – Operating System Lab', 3, '1'),
('CSSC_424', 'Practical IV – Database System Lab', 3, '1'),
('CSSC_432', 'Probability and Statistics', 4, 'no'),
('CSSC_433', 'Optimization Techniques', 4, 'no'),
('CSSC_434', 'Linear Programming', 4, 'no'),
('CSSC_511', 'Advanced Computer Networks', 4, 'no'),
('CSSC_512', 'Web Technology', 4, 'no'),
('CSSC_513', 'Practical V – Web Technology and  Computer Network', 3, 'no'),
('CSSC_514', 'Outreach Programme', 4, 'no'),
('CSSC_521', 'Project Seminar', 4, 'no'),
('CSSC_522', 'Project Work', 4, 'no'),
('CSSC_523', 'Project Report & Viva-Voce', 4, 'no');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `hardcoretb`
--
ALTER TABLE `hardcoretb`
  ADD PRIMARY KEY (`subjectCode`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
