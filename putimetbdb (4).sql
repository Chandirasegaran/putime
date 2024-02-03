-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Feb 03, 2024 at 06:19 PM
-- Server version: 8.0.33
-- PHP Version: 8.0.28

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
-- Table structure for table `admineven`
--

CREATE TABLE `admineven` (
  `COURSE` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `admineven`
--

INSERT INTO `admineven` (`COURSE`) VALUES
('evenBSC'),
('evenD1'),
('evenD2'),
('evenD3'),
('evenMCA1'),
('evenMCA1B2'),
('evenMSC1'),
('evenMSC1B2'),
('evenMSCINT2'),
('evenMSCINT3'),
('evenMTECHCSE1'),
('evenMTECHNIS1');

-- --------------------------------------------------------

--
-- Table structure for table `adminodd`
--

CREATE TABLE `adminodd` (
  `COURSE` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Table structure for table `evenbsc`
--

CREATE TABLE `evenbsc` (
  `ORDER` int NOT NULL,
  `DAY` varchar(10) DEFAULT NULL,
  `9_30` varchar(30) DEFAULT NULL,
  `10_30` varchar(30) DEFAULT NULL,
  `11_30` varchar(30) DEFAULT NULL,
  `12_30` varchar(30) DEFAULT NULL,
  `1_30` varchar(30) DEFAULT NULL,
  `2_30` varchar(30) DEFAULT NULL,
  `3_30` varchar(30) DEFAULT NULL,
  `4_30` varchar(30) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `evenbsc`
--

INSERT INTO `evenbsc` (`ORDER`, `DAY`, `9_30`, `10_30`, `11_30`, `12_30`, `1_30`, `2_30`, `3_30`, `4_30`) VALUES
(1, 'MONDAY', '', '', '', '', '', '', '', ''),
(2, 'TUESDAY', '', '', '', '', '', '', '', ''),
(3, 'WEDNESDAY', '', '', '', '', '', '', '', ''),
(4, 'THURSDAY', '', '', '', '', '', '', '', ''),
(5, 'FRIDAY', '', '', '', '', '', '', '', '');

-- --------------------------------------------------------

--
-- Table structure for table `evenbsc_subjects`
--

CREATE TABLE `evenbsc_subjects` (
  `subjectCode` varchar(8) NOT NULL,
  `subjectName` varchar(255) DEFAULT NULL,
  `hoursRequired` int DEFAULT NULL,
  `hoursRequiredDup` int DEFAULT NULL,
  `lab` varchar(10) DEFAULT NULL,
  `staffName` varchar(255) DEFAULT NULL,
  `stype` varchar(10) DEFAULT NULL,
  `labStaffName` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `evenbsc_subjects`
--

INSERT INTO `evenbsc_subjects` (`subjectCode`, `subjectName`, `hoursRequired`, `hoursRequiredDup`, `lab`, `staffName`, `stype`, `labStaffName`) VALUES
('CS2MI02', 'MICROCONTROLLER PROGRAMMING', 4, 4, 'no', 'DR_G_KRISHNAPRIYA', 'sc', NULL),
('CS2MI02L', 'MICROCONTROLLER PRORAMMING LAB', 3, 3, '2', 'Dr_T_CHITHRALEKHA', 'sc', ''),
('CS2MJ02', 'PROBLEM SOLVING & PROGRAMMING FUNDAMENTALS', 4, 4, 'no', 'Dr_V_UMA', 'hc', NULL),
('CS2MJ02L', 'PROBLEM SOLVING & PROGRAMMING FUNDAMENTALS', 3, 3, '2', 'Dr_K_SURESH_JOSEPH', 'hc', 'Dr_K_SURESH_JOSEPH'),
('CS2VA04', 'DIGITAL TECHNOLOGIES', 4, 4, 'no', 'Guest_Faculty_2', 'hc', NULL),
('MLD', 'MLD1', 4, 4, 'no', 'Dr_R_SUBRAMANIAN', 'hc', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `evend1`
--

CREATE TABLE `evend1` (
  `ORDER` int NOT NULL,
  `DAY` varchar(10) DEFAULT NULL,
  `9_30` varchar(30) DEFAULT NULL,
  `10_30` varchar(30) DEFAULT NULL,
  `11_30` varchar(30) DEFAULT NULL,
  `12_30` varchar(30) DEFAULT NULL,
  `1_30` varchar(30) DEFAULT NULL,
  `2_30` varchar(30) DEFAULT NULL,
  `3_30` varchar(30) DEFAULT NULL,
  `4_30` varchar(30) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `evend1`
--

INSERT INTO `evend1` (`ORDER`, `DAY`, `9_30`, `10_30`, `11_30`, `12_30`, `1_30`, `2_30`, `3_30`, `4_30`) VALUES
(1, 'MONDAY', '', '', '', '', '', '', '', ''),
(2, 'TUESDAY', '', 'd1', '', '', '', '', '', ''),
(3, 'WEDNESDAY', 'd1', 'd1', '', 'd2', 'd2', 'd2', '', ''),
(4, 'THURSDAY', '', '', '', '', '', '', '', ''),
(5, 'FRIDAY', '', '', '', '', '', '', '', '');

-- --------------------------------------------------------

--
-- Table structure for table `evend1_subjects`
--

CREATE TABLE `evend1_subjects` (
  `subjectCode` varchar(8) NOT NULL,
  `subjectName` varchar(255) DEFAULT NULL,
  `hoursRequired` int DEFAULT NULL,
  `hoursRequiredDup` int DEFAULT NULL,
  `lab` varchar(10) DEFAULT NULL,
  `staffName` varchar(255) DEFAULT NULL,
  `labStaffName` varchar(255) DEFAULT NULL,
  `stype` varchar(10) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `evend1_subjects`
--

INSERT INTO `evend1_subjects` (`subjectCode`, `subjectName`, `hoursRequired`, `hoursRequiredDup`, `lab`, `staffName`, `labStaffName`, `stype`) VALUES
('d1', 'd1', 3, 3, '1', 'Dr_T_SIVAKUMAR', 'Dr_KS_KUPPUSAMY', 'hc'),
('d2', 'd2', 3, 3, 'no', 'Dr_KS_KUPPUSAMY', NULL, 'hc');

-- --------------------------------------------------------

--
-- Table structure for table `evend2`
--

CREATE TABLE `evend2` (
  `ORDER` int NOT NULL,
  `DAY` varchar(10) DEFAULT NULL,
  `9_30` varchar(30) DEFAULT NULL,
  `10_30` varchar(30) DEFAULT NULL,
  `11_30` varchar(30) DEFAULT NULL,
  `12_30` varchar(30) DEFAULT NULL,
  `1_30` varchar(30) DEFAULT NULL,
  `2_30` varchar(30) DEFAULT NULL,
  `3_30` varchar(30) DEFAULT NULL,
  `4_30` varchar(30) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `evend2`
--

INSERT INTO `evend2` (`ORDER`, `DAY`, `9_30`, `10_30`, `11_30`, `12_30`, `1_30`, `2_30`, `3_30`, `4_30`) VALUES
(1, 'MONDAY', '', '', '', '', '', '', '', ''),
(2, 'TUESDAY', '', '', '', '', '', '', '', ''),
(3, 'WEDNESDAY', '', '', '', '', '', '', '', ''),
(4, 'THURSDAY', '', '', '', '', '', '', '', ''),
(5, 'FRIDAY', '', '', '', '', '', '', '', '');

-- --------------------------------------------------------

--
-- Table structure for table `evend2_subjects`
--

CREATE TABLE `evend2_subjects` (
  `subjectCode` varchar(8) NOT NULL,
  `subjectName` varchar(255) DEFAULT NULL,
  `hoursRequired` int DEFAULT NULL,
  `hoursRequiredDup` int DEFAULT NULL,
  `lab` varchar(10) DEFAULT NULL,
  `staffName` varchar(255) DEFAULT NULL,
  `labStaffName` varchar(255) DEFAULT NULL,
  `stype` varchar(10) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `evend2_subjects`
--

INSERT INTO `evend2_subjects` (`subjectCode`, `subjectName`, `hoursRequired`, `hoursRequiredDup`, `lab`, `staffName`, `labStaffName`, `stype`) VALUES
('d2', 'd2', 1, 1, 'no', 'Dr_T_CHITHRALEKHA', NULL, 'hc');

-- --------------------------------------------------------

--
-- Table structure for table `evend3`
--

CREATE TABLE `evend3` (
  `ORDER` int NOT NULL,
  `DAY` varchar(10) DEFAULT NULL,
  `9_30` varchar(30) DEFAULT NULL,
  `10_30` varchar(30) DEFAULT NULL,
  `11_30` varchar(30) DEFAULT NULL,
  `12_30` varchar(30) DEFAULT NULL,
  `1_30` varchar(30) DEFAULT NULL,
  `2_30` varchar(30) DEFAULT NULL,
  `3_30` varchar(30) DEFAULT NULL,
  `4_30` varchar(30) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `evend3`
--

INSERT INTO `evend3` (`ORDER`, `DAY`, `9_30`, `10_30`, `11_30`, `12_30`, `1_30`, `2_30`, `3_30`, `4_30`) VALUES
(1, 'MONDAY', '', '', '', '', '', '', '', ''),
(2, 'TUESDAY', '', '', '', '', '', '', '', ''),
(3, 'WEDNESDAY', '', '', '', '', '', '', '', ''),
(4, 'THURSDAY', '', '', '', '', '', '', '', ''),
(5, 'FRIDAY', '', '', '', '', '', '', '', '');

-- --------------------------------------------------------

--
-- Table structure for table `evend3_subjects`
--

CREATE TABLE `evend3_subjects` (
  `subjectCode` varchar(8) NOT NULL,
  `subjectName` varchar(255) DEFAULT NULL,
  `hoursRequired` int DEFAULT NULL,
  `hoursRequiredDup` int DEFAULT NULL,
  `lab` varchar(10) DEFAULT NULL,
  `staffName` varchar(255) DEFAULT NULL,
  `labStaffName` varchar(255) DEFAULT NULL,
  `stype` varchar(10) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `evend3_subjects`
--

INSERT INTO `evend3_subjects` (`subjectCode`, `subjectName`, `hoursRequired`, `hoursRequiredDup`, `lab`, `staffName`, `labStaffName`, `stype`) VALUES
('d3', 'd3', 1, 1, 'no', 'Dr_KS_KUPPUSAMY', NULL, 'hc');

-- --------------------------------------------------------

--
-- Table structure for table `evenmca1`
--

CREATE TABLE `evenmca1` (
  `ORDER` int NOT NULL,
  `DAY` varchar(10) DEFAULT NULL,
  `9_30` varchar(30) DEFAULT NULL,
  `10_30` varchar(30) DEFAULT NULL,
  `11_30` varchar(30) DEFAULT NULL,
  `12_30` varchar(30) DEFAULT NULL,
  `1_30` varchar(30) DEFAULT NULL,
  `2_30` varchar(30) DEFAULT NULL,
  `3_30` varchar(30) DEFAULT NULL,
  `4_30` varchar(30) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `evenmca1`
--

INSERT INTO `evenmca1` (`ORDER`, `DAY`, `9_30`, `10_30`, `11_30`, `12_30`, `1_30`, `2_30`, `3_30`, `4_30`) VALUES
(1, 'MONDAY', '', '', '', '', '', '', '', ''),
(2, 'TUESDAY', '', '', '', '', '', '', '', ''),
(3, 'WEDNESDAY', '', '', '', '', '', '', '', ''),
(4, 'THURSDAY', '', '', '', '', '', '', '', ''),
(5, 'FRIDAY', '', '', '', '', '', '', '', '');

-- --------------------------------------------------------

--
-- Table structure for table `evenmca1b2`
--

CREATE TABLE `evenmca1b2` (
  `ORDER` int NOT NULL,
  `DAY` varchar(10) DEFAULT NULL,
  `9_30` varchar(30) DEFAULT NULL,
  `10_30` varchar(30) DEFAULT NULL,
  `11_30` varchar(30) DEFAULT NULL,
  `12_30` varchar(30) DEFAULT NULL,
  `1_30` varchar(30) DEFAULT NULL,
  `2_30` varchar(30) DEFAULT NULL,
  `3_30` varchar(30) DEFAULT NULL,
  `4_30` varchar(30) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `evenmca1b2`
--

INSERT INTO `evenmca1b2` (`ORDER`, `DAY`, `9_30`, `10_30`, `11_30`, `12_30`, `1_30`, `2_30`, `3_30`, `4_30`) VALUES
(1, 'MONDAY', '', '', '', '', '', 'CSEL569', 'CSEL569', ''),
(2, 'TUESDAY', '', '', 'CSCA421', 'CSCA421', 'CSCA421', '', 'CSEL569', 'CSEL569'),
(3, 'WEDNESDAY', 'CSCA422', 'CSCA422', 'CSCA423', 'CSCA424', 'CSCA422', 'CSCA421', 'CSCA425', 'CSCA425'),
(4, 'THURSDAY', 'CSCA423', 'CSCA423', 'CSCA423', 'CSCA422', 'CSCA424', 'CSCA424', 'CSCA425', ''),
(5, 'FRIDAY', 'CSEL581', 'CSEL581', 'CSEL581', 'CSEL581', '', '', '', '');

-- --------------------------------------------------------

--
-- Table structure for table `evenmca1b2_subjects`
--

CREATE TABLE `evenmca1b2_subjects` (
  `subjectCode` varchar(8) NOT NULL,
  `subjectName` varchar(255) DEFAULT NULL,
  `hoursRequired` int DEFAULT NULL,
  `hoursRequiredDup` int DEFAULT NULL,
  `lab` varchar(10) DEFAULT NULL,
  `staffName` varchar(255) DEFAULT NULL,
  `stype` varchar(10) DEFAULT NULL,
  `labStaffName` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `evenmca1b2_subjects`
--

INSERT INTO `evenmca1b2_subjects` (`subjectCode`, `subjectName`, `hoursRequired`, `hoursRequiredDup`, `lab`, `staffName`, `stype`, `labStaffName`) VALUES
('CSCA421', 'COMPUTER NETWORK', 4, 4, 'no', 'DR_R_LAKSHMI', 'hc', NULL),
('CSCA422', 'OPERTATING SYSTEMS', 4, 4, 'no', 'Guest_Faculty', 'hc', NULL),
('CSCA423', 'COMMUNICATION SKILLS', 4, 4, 'no', 'Dr_KS_KUPPUSAMY', 'hc', NULL),
('CSCA424', 'COMPUTER NETWORKS LAB', 3, 3, '1', 'Dr_S_RAVI', 'hc', NULL),
('CSCA425', 'OPERATING SYSTEM LAB', 3, 3, '1', 'Dr_K_SURESH_JOSEPH', 'hc', NULL),
('CSEL569', 'Video_Processing_and_Analytics_(Level_3)', 4, 4, 'no', 'Dr_S_RAVI', 'sc', NULL),
('CSEL581', 'Introduction_to_A.I._and_Expert_Systems_(Level_1)', 4, 4, 'no', 'Dr_SL_JAYALAKSHMI', 'sc', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `evenmca1_subjects`
--

CREATE TABLE `evenmca1_subjects` (
  `subjectCode` varchar(8) NOT NULL,
  `subjectName` varchar(255) DEFAULT NULL,
  `hoursRequired` int DEFAULT NULL,
  `hoursRequiredDup` int DEFAULT NULL,
  `lab` varchar(10) DEFAULT NULL,
  `staffName` varchar(255) DEFAULT NULL,
  `stype` varchar(10) DEFAULT NULL,
  `labStaffName` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `evenmca1_subjects`
--

INSERT INTO `evenmca1_subjects` (`subjectCode`, `subjectName`, `hoursRequired`, `hoursRequiredDup`, `lab`, `staffName`, `stype`, `labStaffName`) VALUES
('CSCA421', 'COMPUTER NETWORK', 4, 4, 'no', 'DR_R_LAKSHMI', 'hc', NULL),
('CSCA422', 'OPERTATING SYSTEMS', 4, 4, 'no', 'Guest_Faculty', 'hc', NULL),
('CSCA423', 'COMMUNICATION SKILLS', 4, 4, 'no', 'Dr_R_SUNITHA', 'hc', NULL),
('CSCA424', 'COMPUTER NETWORKS LAB', 3, 3, '1', 'DR_R_LAKSHMI', 'hc', 'DR_G_KRISHNAPRIYA'),
('CSCA425', 'OPERATING SYSTEM LAB', 3, 3, '1', 'Dr_R_SUBRAMANIAN', 'hc', ''),
('CSCE851', 'Automata Computability and Complexity', 4, 4, 'no', 'Dr_R_SUNITHA', 'sc', NULL),
('CSEL448', 'Ethical_Hacking_(Level_3)', 4, 4, 'no', 'Dr_T_CHITHRALEKHA', 'sc', NULL),
('CSEL581', 'Introduction_to_A.I._and_Expert_Systems_(Level_1)', 4, 4, 'no', 'DR_G_KRISHNAPRIYA', 'sc', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `evenmsc1`
--

CREATE TABLE `evenmsc1` (
  `ORDER` int NOT NULL,
  `DAY` varchar(10) DEFAULT NULL,
  `9_30` varchar(30) DEFAULT NULL,
  `10_30` varchar(30) DEFAULT NULL,
  `11_30` varchar(30) DEFAULT NULL,
  `12_30` varchar(30) DEFAULT NULL,
  `1_30` varchar(30) DEFAULT NULL,
  `2_30` varchar(30) DEFAULT NULL,
  `3_30` varchar(30) DEFAULT NULL,
  `4_30` varchar(30) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `evenmsc1`
--

INSERT INTO `evenmsc1` (`ORDER`, `DAY`, `9_30`, `10_30`, `11_30`, `12_30`, `1_30`, `2_30`, `3_30`, `4_30`) VALUES
(1, 'MONDAY', '', '', '', '', '', '', '', ''),
(2, 'TUESDAY', '', '', '', '', '', '', '', ''),
(3, 'WEDNESDAY', '', '', '', '', '', '', '', ''),
(4, 'THURSDAY', '', '', '', '', '', '', '', ''),
(5, 'FRIDAY', '', '', '', '', '', '', '', '');

-- --------------------------------------------------------

--
-- Table structure for table `evenmsc1b2`
--

CREATE TABLE `evenmsc1b2` (
  `ORDER` int NOT NULL,
  `DAY` varchar(10) DEFAULT NULL,
  `9_30` varchar(30) DEFAULT NULL,
  `10_30` varchar(30) DEFAULT NULL,
  `11_30` varchar(30) DEFAULT NULL,
  `12_30` varchar(30) DEFAULT NULL,
  `1_30` varchar(30) DEFAULT NULL,
  `2_30` varchar(30) DEFAULT NULL,
  `3_30` varchar(30) DEFAULT NULL,
  `4_30` varchar(30) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `evenmsc1b2`
--

INSERT INTO `evenmsc1b2` (`ORDER`, `DAY`, `9_30`, `10_30`, `11_30`, `12_30`, `1_30`, `2_30`, `3_30`, `4_30`) VALUES
(1, 'MONDAY', '', '', '', '', '', '', '', ''),
(2, 'TUESDAY', '', '', '', '', '', '', '', ''),
(3, 'WEDNESDAY', '', '', '', '', '', '', '', ''),
(4, 'THURSDAY', '', '', '', '', '', '', '', ''),
(5, 'FRIDAY', '', '', '', '', '', '', '', '');

-- --------------------------------------------------------

--
-- Table structure for table `evenmsc1b2_subjects`
--

CREATE TABLE `evenmsc1b2_subjects` (
  `subjectCode` varchar(8) NOT NULL,
  `subjectName` varchar(255) DEFAULT NULL,
  `hoursRequired` int DEFAULT NULL,
  `hoursRequiredDup` int DEFAULT NULL,
  `lab` varchar(10) DEFAULT NULL,
  `staffName` varchar(255) DEFAULT NULL,
  `stype` varchar(10) DEFAULT NULL,
  `labStaffName` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `evenmsc1b2_subjects`
--

INSERT INTO `evenmsc1b2_subjects` (`subjectCode`, `subjectName`, `hoursRequired`, `hoursRequiredDup`, `lab`, `staffName`, `stype`, `labStaffName`) VALUES
('CSEL548', 'Internet_of_Things_(IoT)_Tools', 3, 3, 'no', 'Dr_T_VENGATTARAMAN', 'se', NULL),
('CSEL565', 'Social_Network_Analytics_(Level_2)', 4, 4, 'no', 'Dr_S_SIVA_SATHYA', 'sc', NULL),
('CSEL581', 'Introduction_to_A.I._and_Expert_Systems_(Level_1)', 4, 4, 'no', 'Dr_M_NANDHINI', 'sc', NULL),
('CSSC421', 'MODERN OPERATING SYSTEM', 4, 4, 'no', 'Mr_SEENIVASAN_R_P', 'hc', NULL),
('CSSC422', 'ADVANCED DATABASE SYSTEM', 4, 4, 'no', 'DR_SUKHVINDER_SINGH', 'hc', NULL),
('CSSC423', 'OPERATING SYSTEM LAB', 3, 3, '1', 'Dr_R_SUNITHA', 'hc', NULL),
('CSSC424', 'DATABASE SYSTEM LAB', 3, 3, '1', 'Dr_S_SIVA_SATHYA', 'hc', NULL),
('CSSC433', 'OPTIMIZATION TECHNIQUES', 4, 4, 'no', 'Dr_R_SUBRAMANIAN', 'hc', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `evenmsc1_subjects`
--

CREATE TABLE `evenmsc1_subjects` (
  `subjectCode` varchar(8) NOT NULL,
  `subjectName` varchar(255) DEFAULT NULL,
  `hoursRequired` int DEFAULT NULL,
  `hoursRequiredDup` int DEFAULT NULL,
  `lab` varchar(10) DEFAULT NULL,
  `staffName` varchar(255) DEFAULT NULL,
  `stype` varchar(10) DEFAULT NULL,
  `labStaffName` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `evenmsc1_subjects`
--

INSERT INTO `evenmsc1_subjects` (`subjectCode`, `subjectName`, `hoursRequired`, `hoursRequiredDup`, `lab`, `staffName`, `stype`, `labStaffName`) VALUES
('CSEL535', 'Python Programming', 3, 3, 'no', 'Dr_V_UMA', 'se', NULL),
('CSEL584', 'Decision_Support_Systems_(Level_2)', 4, 4, 'no', 'Dr_K_SURESH_JOSEPH', 'sc', NULL),
('CSEL585', 'Introduction_to_Machine_Learning_(Level_3)', 4, 4, 'no', 'Dr_POTHULA_SUJATHA', 'sc', NULL),
('CSSC421', 'MODERN OPERATING SYSTEM', 4, 4, 'no', 'Mr_SEENIVASAN_R_P', 'hc', NULL),
('CSSC422', 'ADVANCED DATABASE SYSTEM', 4, 4, 'no', 'DR_SUKHVINDER_SINGH', 'hc', NULL),
('CSSC423', 'OPERATING SYSTEM LAB', 3, 3, '1', 'Mr_SEENIVASAN_R_P', 'hc', 'Dr_R_SUBRAMANIAN'),
('CSSC424', 'DATABASE SYSTEM LAB', 3, 3, '1', 'Dr_POTHULA_SUJATHA', 'hc', 'DR_G_KRISHNAPRIYA'),
('CSSC433', 'OPTIMIZATION TECHNIQUES', 4, 4, 'no', 'Dr_R_SUBRAMANIAN', 'hc', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `evenmscint2`
--

CREATE TABLE `evenmscint2` (
  `ORDER` int NOT NULL,
  `DAY` varchar(10) DEFAULT NULL,
  `9_30` varchar(30) DEFAULT NULL,
  `10_30` varchar(30) DEFAULT NULL,
  `11_30` varchar(30) DEFAULT NULL,
  `12_30` varchar(30) DEFAULT NULL,
  `1_30` varchar(30) DEFAULT NULL,
  `2_30` varchar(30) DEFAULT NULL,
  `3_30` varchar(30) DEFAULT NULL,
  `4_30` varchar(30) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `evenmscint2`
--

INSERT INTO `evenmscint2` (`ORDER`, `DAY`, `9_30`, `10_30`, `11_30`, `12_30`, `1_30`, `2_30`, `3_30`, `4_30`) VALUES
(1, 'MONDAY', '', '', '', '', '', 'CSIG-242', 'CSIG-242', ''),
(2, 'TUESDAY', '', '', '', '', '', 'CSIG-241', 'CSIG-242', 'CSIG-242'),
(3, 'WEDNESDAY', '', '', '', '', '', 'CSIG-241', '', ''),
(4, 'THURSDAY', '', '', '', '', '', 'CSIG-243', 'CSIG-243', 'CSIG-243'),
(5, 'FRIDAY', '', '', '', '', 'CSIG-241', 'CSIG-241', '', '');

-- --------------------------------------------------------

--
-- Table structure for table `evenmscint2_subjects`
--

CREATE TABLE `evenmscint2_subjects` (
  `subjectCode` varchar(8) NOT NULL,
  `subjectName` varchar(255) DEFAULT NULL,
  `hoursRequired` int DEFAULT NULL,
  `hoursRequiredDup` int DEFAULT NULL,
  `lab` varchar(10) DEFAULT NULL,
  `staffName` varchar(255) DEFAULT NULL,
  `stype` varchar(10) DEFAULT NULL,
  `labStaffName` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `evenmscint2_subjects`
--

INSERT INTO `evenmscint2_subjects` (`subjectCode`, `subjectName`, `hoursRequired`, `hoursRequiredDup`, `lab`, `staffName`, `stype`, `labStaffName`) VALUES
('CSIG-241', 'OPERATING SYSTEM ', 4, 4, 'no', 'Dr_P_SHANTHI_BALA', 'hc', NULL),
('CSIG-242', 'INTRODUCTION TO DATABASE CONCEPTS', 4, 4, 'no', 'DR_G_KRISHNAPRIYA', 'hc', NULL),
('CSIG-243', 'DBMS LAB', 3, 3, '2', 'DR_G_KRISHNAPRIYA', 'hc', 'Dr_SL_JAYALAKSHMI');

-- --------------------------------------------------------

--
-- Table structure for table `evenmscint3`
--

CREATE TABLE `evenmscint3` (
  `ORDER` int NOT NULL,
  `DAY` varchar(10) DEFAULT NULL,
  `9_30` varchar(30) DEFAULT NULL,
  `10_30` varchar(30) DEFAULT NULL,
  `11_30` varchar(30) DEFAULT NULL,
  `12_30` varchar(30) DEFAULT NULL,
  `1_30` varchar(30) DEFAULT NULL,
  `2_30` varchar(30) DEFAULT NULL,
  `3_30` varchar(30) DEFAULT NULL,
  `4_30` varchar(30) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `evenmscint3`
--

INSERT INTO `evenmscint3` (`ORDER`, `DAY`, `9_30`, `10_30`, `11_30`, `12_30`, `1_30`, `2_30`, `3_30`, `4_30`) VALUES
(1, 'MONDAY', '', '', '', '', 'CSIG-362', 'CSIG-362', '', ''),
(2, 'TUESDAY', '', '', '', '', 'CSIG-362', 'CSIG-362', '', ''),
(3, 'WEDNESDAY', 'CSIG-363', 'CSIG-363', 'CSIG-363', '', '', '', '', ''),
(4, 'THURSDAY', '', 'CSIG-361', 'CSIG-361', '', '', '', '', ''),
(5, 'FRIDAY', '', '', 'CSIG-361', 'CSIG-361', '', '', '', '');

-- --------------------------------------------------------

--
-- Table structure for table `evenmscint3_subjects`
--

CREATE TABLE `evenmscint3_subjects` (
  `subjectCode` varchar(8) NOT NULL,
  `subjectName` varchar(255) DEFAULT NULL,
  `hoursRequired` int DEFAULT NULL,
  `hoursRequiredDup` int DEFAULT NULL,
  `lab` varchar(10) DEFAULT NULL,
  `staffName` varchar(255) DEFAULT NULL,
  `stype` varchar(10) DEFAULT NULL,
  `labStaffName` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `evenmscint3_subjects`
--

INSERT INTO `evenmscint3_subjects` (`subjectCode`, `subjectName`, `hoursRequired`, `hoursRequiredDup`, `lab`, `staffName`, `stype`, `labStaffName`) VALUES
('CSIG-361', 'JAVA PROGRAMMING', 4, 4, 'no', 'Dr_T_SIVAKUMAR', 'hc', NULL),
('CSIG-362', 'WEB TECHNOLOGY', 4, 4, 'no', 'Dr_SL_JAYALAKSHMI', 'hc', NULL),
('CSIG-363', 'WEB TECHNOLOGY LAB', 3, 3, '2', 'Dr_SL_JAYALAKSHMI', 'hc', NULL),
('CSIG-364', 'MINI PROJECT', 4, 4, 'no', 'Dr_T_SIVAKUMAR', 'hc', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `evenmtechcse1`
--

CREATE TABLE `evenmtechcse1` (
  `ORDER` int NOT NULL,
  `DAY` varchar(10) DEFAULT NULL,
  `9_30` varchar(30) DEFAULT NULL,
  `10_30` varchar(30) DEFAULT NULL,
  `11_30` varchar(30) DEFAULT NULL,
  `12_30` varchar(30) DEFAULT NULL,
  `1_30` varchar(30) DEFAULT NULL,
  `2_30` varchar(30) DEFAULT NULL,
  `3_30` varchar(30) DEFAULT NULL,
  `4_30` varchar(30) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `evenmtechcse1`
--

INSERT INTO `evenmtechcse1` (`ORDER`, `DAY`, `9_30`, `10_30`, `11_30`, `12_30`, `1_30`, `2_30`, `3_30`, `4_30`) VALUES
(1, 'MONDAY', 'CSCE621', '', '', '', '', 'CSCE628', 'CSCE628', 'CSCE628'),
(2, 'TUESDAY', 'CSCE623', '', '', '', '', 'CSCE627', 'CSCE627', 'CSCE627'),
(3, 'WEDNESDAY', 'CSCE624', '', '', '', '', '', '', ''),
(4, 'THURSDAY', 'CSCE625', '', '', '', '', '', '', ''),
(5, 'FRIDAY', 'CSCE621', '', '', '', '', '', '', '');

-- --------------------------------------------------------

--
-- Table structure for table `evenmtechcse1_subjects`
--

CREATE TABLE `evenmtechcse1_subjects` (
  `subjectCode` varchar(8) NOT NULL,
  `subjectName` varchar(255) DEFAULT NULL,
  `hoursRequired` int DEFAULT NULL,
  `hoursRequiredDup` int DEFAULT NULL,
  `lab` varchar(10) DEFAULT NULL,
  `staffName` varchar(255) DEFAULT NULL,
  `stype` varchar(10) DEFAULT NULL,
  `labStaffName` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `evenmtechcse1_subjects`
--

INSERT INTO `evenmtechcse1_subjects` (`subjectCode`, `subjectName`, `hoursRequired`, `hoursRequiredDup`, `lab`, `staffName`, `stype`, `labStaffName`) VALUES
('CSCE621', 'GRAPH THEORY WITH APPLICATION TO ENGINEERING', 4, 4, 'no', 'Dr_P_SHANTHI_BALA', 'hc', NULL),
('CSCE623', 'DATA MINING AND BIG DATA', 4, 4, 'no', 'Dr_POTHULA_SUJATHA', 'hc', NULL),
('CSCE624', 'MOBILE & PERVASICE COMPUTING', 4, 4, 'no', 'Dr_T_VENGATTARAMAN', 'hc', NULL),
('CSCE625', 'ADVANCED OPERATING SYSTEM', 4, 4, 'no', 'Dr_K_SURESH_JOSEPH', 'hc', NULL),
('CSCE627', 'DATA MINING LAB', 3, 3, 'no', 'Dr_POTHULA_SUJATHA', 'hc', NULL),
('CSCE628', 'PERVASIVE COMPUTING LAB', 3, 3, 'no', 'Dr_T_VENGATTARAMAN', 'hc', NULL),
('CSCE843', 'Web Accessibility', 4, 4, 'no', 'Dr_KS_KUPPUSAMY', 'sc', NULL),
('CSCE862', 'Evolutionary Algorithms', 4, 4, 'no', 'Dr_M_SATHYA', 'sc', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `evenmtechnis1`
--

CREATE TABLE `evenmtechnis1` (
  `ORDER` int NOT NULL,
  `DAY` varchar(10) DEFAULT NULL,
  `9_30` varchar(30) DEFAULT NULL,
  `10_30` varchar(30) DEFAULT NULL,
  `11_30` varchar(30) DEFAULT NULL,
  `12_30` varchar(30) DEFAULT NULL,
  `1_30` varchar(30) DEFAULT NULL,
  `2_30` varchar(30) DEFAULT NULL,
  `3_30` varchar(30) DEFAULT NULL,
  `4_30` varchar(30) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `evenmtechnis1`
--

INSERT INTO `evenmtechnis1` (`ORDER`, `DAY`, `9_30`, `10_30`, `11_30`, `12_30`, `1_30`, `2_30`, `3_30`, `4_30`) VALUES
(1, 'MONDAY', '', '', '', '', '', '', '', ''),
(2, 'TUESDAY', '', '', '', '', '', '', '', ''),
(3, 'WEDNESDAY', '', '', '', '', '', 'CSNS626', 'CSNS626', 'CSNS626'),
(4, 'THURSDAY', '', '', '', '', '', '', '', ''),
(5, 'FRIDAY', '', '', '', '', '', 'CSNS627', 'CSNS627', 'CSNS627');

-- --------------------------------------------------------

--
-- Table structure for table `evenmtechnis1_subjects`
--

CREATE TABLE `evenmtechnis1_subjects` (
  `subjectCode` varchar(8) NOT NULL,
  `subjectName` varchar(255) DEFAULT NULL,
  `hoursRequired` int DEFAULT NULL,
  `hoursRequiredDup` int DEFAULT NULL,
  `lab` varchar(10) DEFAULT NULL,
  `staffName` varchar(255) DEFAULT NULL,
  `stype` varchar(10) DEFAULT NULL,
  `labStaffName` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `evenmtechnis1_subjects`
--

INSERT INTO `evenmtechnis1_subjects` (`subjectCode`, `subjectName`, `hoursRequired`, `hoursRequiredDup`, `lab`, `staffName`, `stype`, `labStaffName`) VALUES
('CSNS621', 'RESOURCE MANAGEMENT TECHNIQUES', 4, 4, 'no', 'Dr_M_NANDHINI', 'hc', NULL),
('CSNS622', 'NETWORK SECURITY', 4, 4, 'no', 'Dr_T_CHITHRALEKHA', 'hc', NULL),
('CSNS623', 'DISTRIBUTED SYSTEMS AND SECURITY', 4, 4, 'no', 'Dr_S_RAVI', 'hc', NULL),
('CSNS624', 'NETWORK PROTOCOLS', 4, 4, 'no', 'Dr_SKV_JAYAKUMAR', 'hc', NULL),
('CSNS625', 'WIRELESS COMMUNICATION NETWORKS', 4, 4, 'no', 'Dr_S_SIVA_SATHYA', 'hc', NULL),
('CSNS626', 'NETWORK SECURITY LAB', 3, 3, '2', 'Dr_T_CHITHRALEKHA', 'hc', NULL),
('CSNS627', 'NETWORK PROTOCOL LAB', 3, 3, '2', 'Dr_SKV_JAYAKUMAR', 'hc', NULL),
('CSNS854', 'Ad Hoc Mobile Networks', 4, 4, 'no', 'Dr_T_SIVAKUMAR', 'sc', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `merged_table`
--

CREATE TABLE `merged_table` (
  `serialNo` int NOT NULL,
  `facultyName` varchar(255) DEFAULT NULL,
  `stype` varchar(255) DEFAULT NULL,
  `theory` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `merged_table`
--

INSERT INTO `merged_table` (`serialNo`, `facultyName`, `stype`, `theory`) VALUES
(1, 'DR_G_KRISHNAPRIYA', 'sc', 'CS2MI02 - MICROCONTROLLER PROGRAMMING'),
(2, 'Dr_T_CHITHRALEKHA', 'sc', 'CS2MI02L - MICROCONTROLLER PRORAMMING LAB'),
(3, 'Dr_V_UMA', 'hc', 'CS2MJ02 - PROBLEM SOLVING & PROGRAMMING FUNDAMENTALS'),
(4, 'Dr_K_SURESH_JOSEPH', 'hc', 'CS2MJ02L - PROBLEM SOLVING & PROGRAMMING FUNDAMENTALS'),
(5, 'Guest_Faculty_2', 'hc', 'CS2VA04 - DIGITAL TECHNOLOGIES'),
(6, 'Dr_R_SUBRAMANIAN', 'hc', 'MLD - MLD1'),
(8, NULL, 'sc', 'CS2MI02 - MICROCONTROLLER PROGRAMMING'),
(9, '', 'sc', 'CS2MI02L - MICROCONTROLLER PRORAMMING LAB'),
(10, NULL, 'hc', 'CS2MJ02 - PROBLEM SOLVING & PROGRAMMING FUNDAMENTALS'),
(11, 'Dr_K_SURESH_JOSEPH', 'hc', 'CS2MJ02L - PROBLEM SOLVING & PROGRAMMING FUNDAMENTALS'),
(12, NULL, 'hc', 'CS2VA04 - DIGITAL TECHNOLOGIES'),
(13, NULL, 'hc', 'MLD - MLD1'),
(15, 'Dr_T_SIVAKUMAR', 'hc', 'd1 - d1'),
(16, 'Dr_KS_KUPPUSAMY', 'hc', 'd2 - d2'),
(18, 'Dr_KS_KUPPUSAMY', 'hc', 'd1 - d1'),
(19, NULL, 'hc', 'd2 - d2'),
(21, 'Dr_T_CHITHRALEKHA', 'hc', 'd2 - d2'),
(22, NULL, 'hc', 'd2 - d2'),
(23, 'Dr_KS_KUPPUSAMY', 'hc', 'd3 - d3'),
(24, NULL, 'hc', 'd3 - d3'),
(25, 'DR_R_LAKSHMI', 'hc', 'CSCA421 - COMPUTER NETWORK'),
(26, 'Guest_Faculty', 'hc', 'CSCA422 - OPERTATING SYSTEMS'),
(27, 'Dr_R_SUNITHA', 'hc', 'CSCA423 - COMMUNICATION SKILLS'),
(28, 'DR_R_LAKSHMI', 'hc', 'CSCA424 - COMPUTER NETWORKS LAB'),
(29, 'Dr_R_SUBRAMANIAN', 'hc', 'CSCA425 - OPERATING SYSTEM LAB'),
(30, 'Dr_R_SUNITHA', 'sc', 'CSCE851 - Automata Computability and Complexity'),
(31, 'Dr_T_CHITHRALEKHA', 'sc', 'CSEL448 - Ethical_Hacking_(Level_3)'),
(32, 'DR_G_KRISHNAPRIYA', 'sc', 'CSEL581 - Introduction_to_A.I._and_Expert_Systems_(Level_1)'),
(40, NULL, 'hc', 'CSCA421 - COMPUTER NETWORK'),
(41, NULL, 'hc', 'CSCA422 - OPERTATING SYSTEMS'),
(42, NULL, 'hc', 'CSCA423 - COMMUNICATION SKILLS'),
(43, 'DR_G_KRISHNAPRIYA', 'hc', 'CSCA424 - COMPUTER NETWORKS LAB'),
(44, '', 'hc', 'CSCA425 - OPERATING SYSTEM LAB'),
(45, NULL, 'sc', 'CSCE851 - Automata Computability and Complexity'),
(46, NULL, 'sc', 'CSEL448 - Ethical_Hacking_(Level_3)'),
(47, NULL, 'sc', 'CSEL581 - Introduction_to_A.I._and_Expert_Systems_(Level_1)'),
(55, 'DR_R_LAKSHMI', 'hc', 'CSCA421 - COMPUTER NETWORK'),
(56, 'Guest_Faculty', 'hc', 'CSCA422 - OPERTATING SYSTEMS'),
(57, 'Dr_KS_KUPPUSAMY', 'hc', 'CSCA423 - COMMUNICATION SKILLS'),
(58, 'Dr_S_RAVI', 'hc', 'CSCA424 - COMPUTER NETWORKS LAB'),
(59, 'Dr_K_SURESH_JOSEPH', 'hc', 'CSCA425 - OPERATING SYSTEM LAB'),
(60, 'Dr_S_RAVI', 'sc', 'CSEL569 - Video_Processing_and_Analytics_(Level_3)'),
(61, 'Dr_SL_JAYALAKSHMI', 'sc', 'CSEL581 - Introduction_to_A.I._and_Expert_Systems_(Level_1)'),
(62, NULL, 'hc', 'CSCA421 - COMPUTER NETWORK'),
(63, NULL, 'hc', 'CSCA422 - OPERTATING SYSTEMS'),
(64, NULL, 'hc', 'CSCA423 - COMMUNICATION SKILLS'),
(65, NULL, 'hc', 'CSCA424 - COMPUTER NETWORKS LAB'),
(66, NULL, 'hc', 'CSCA425 - OPERATING SYSTEM LAB'),
(67, NULL, 'sc', 'CSEL569 - Video_Processing_and_Analytics_(Level_3)'),
(68, NULL, 'sc', 'CSEL581 - Introduction_to_A.I._and_Expert_Systems_(Level_1)'),
(69, 'Dr_V_UMA', 'se', 'CSEL535 - Python Programming'),
(70, 'Dr_K_SURESH_JOSEPH', 'sc', 'CSEL584 - Decision_Support_Systems_(Level_2)'),
(71, 'Dr_POTHULA_SUJATHA', 'sc', 'CSEL585 - Introduction_to_Machine_Learning_(Level_3)'),
(72, 'Mr_SEENIVASAN_R_P', 'hc', 'CSSC421 - MODERN OPERATING SYSTEM'),
(73, 'DR_SUKHVINDER_SINGH', 'hc', 'CSSC422 - ADVANCED DATABASE SYSTEM'),
(74, 'Mr_SEENIVASAN_R_P', 'hc', 'CSSC423 - OPERATING SYSTEM LAB'),
(75, 'Dr_POTHULA_SUJATHA', 'hc', 'CSSC424 - DATABASE SYSTEM LAB'),
(76, 'Dr_R_SUBRAMANIAN', 'hc', 'CSSC433 - OPTIMIZATION TECHNIQUES'),
(84, NULL, 'se', 'CSEL535 - Python Programming'),
(85, NULL, 'sc', 'CSEL584 - Decision_Support_Systems_(Level_2)'),
(86, NULL, 'sc', 'CSEL585 - Introduction_to_Machine_Learning_(Level_3)'),
(87, NULL, 'hc', 'CSSC421 - MODERN OPERATING SYSTEM'),
(88, NULL, 'hc', 'CSSC422 - ADVANCED DATABASE SYSTEM'),
(89, 'Dr_R_SUBRAMANIAN', 'hc', 'CSSC423 - OPERATING SYSTEM LAB'),
(90, 'DR_G_KRISHNAPRIYA', 'hc', 'CSSC424 - DATABASE SYSTEM LAB'),
(91, NULL, 'hc', 'CSSC433 - OPTIMIZATION TECHNIQUES'),
(99, 'Dr_T_VENGATTARAMAN', 'se', 'CSEL548 - Internet_of_Things_(IoT)_Tools'),
(100, 'Dr_S_SIVA_SATHYA', 'sc', 'CSEL565 - Social_Network_Analytics_(Level_2)'),
(101, 'Dr_M_NANDHINI', 'sc', 'CSEL581 - Introduction_to_A.I._and_Expert_Systems_(Level_1)'),
(102, 'Mr_SEENIVASAN_R_P', 'hc', 'CSSC421 - MODERN OPERATING SYSTEM'),
(103, 'DR_SUKHVINDER_SINGH', 'hc', 'CSSC422 - ADVANCED DATABASE SYSTEM'),
(104, 'Dr_R_SUNITHA', 'hc', 'CSSC423 - OPERATING SYSTEM LAB'),
(105, 'Dr_S_SIVA_SATHYA', 'hc', 'CSSC424 - DATABASE SYSTEM LAB'),
(106, 'Dr_R_SUBRAMANIAN', 'hc', 'CSSC433 - OPTIMIZATION TECHNIQUES'),
(114, NULL, 'se', 'CSEL548 - Internet_of_Things_(IoT)_Tools'),
(115, NULL, 'sc', 'CSEL565 - Social_Network_Analytics_(Level_2)'),
(116, NULL, 'sc', 'CSEL581 - Introduction_to_A.I._and_Expert_Systems_(Level_1)'),
(117, NULL, 'hc', 'CSSC421 - MODERN OPERATING SYSTEM'),
(118, NULL, 'hc', 'CSSC422 - ADVANCED DATABASE SYSTEM'),
(119, NULL, 'hc', 'CSSC423 - OPERATING SYSTEM LAB'),
(120, NULL, 'hc', 'CSSC424 - DATABASE SYSTEM LAB'),
(121, NULL, 'hc', 'CSSC433 - OPTIMIZATION TECHNIQUES'),
(129, 'Dr_P_SHANTHI_BALA', 'hc', 'CSIG-241 - OPERATING SYSTEM '),
(130, 'DR_G_KRISHNAPRIYA', 'hc', 'CSIG-242 - INTRODUCTION TO DATABASE CONCEPTS'),
(131, 'DR_G_KRISHNAPRIYA', 'hc', 'CSIG-243 - DBMS LAB'),
(132, NULL, 'hc', 'CSIG-241 - OPERATING SYSTEM '),
(133, NULL, 'hc', 'CSIG-242 - INTRODUCTION TO DATABASE CONCEPTS'),
(134, 'Dr_SL_JAYALAKSHMI', 'hc', 'CSIG-243 - DBMS LAB'),
(135, 'Dr_T_SIVAKUMAR', 'hc', 'CSIG-361 - JAVA PROGRAMMING'),
(136, 'Dr_SL_JAYALAKSHMI', 'hc', 'CSIG-362 - WEB TECHNOLOGY'),
(137, 'Dr_SL_JAYALAKSHMI', 'hc', 'CSIG-363 - WEB TECHNOLOGY LAB'),
(138, 'Dr_T_SIVAKUMAR', 'hc', 'CSIG-364 - MINI PROJECT'),
(142, NULL, 'hc', 'CSIG-361 - JAVA PROGRAMMING'),
(143, NULL, 'hc', 'CSIG-362 - WEB TECHNOLOGY'),
(144, NULL, 'hc', 'CSIG-363 - WEB TECHNOLOGY LAB'),
(145, NULL, 'hc', 'CSIG-364 - MINI PROJECT'),
(149, 'Dr_P_SHANTHI_BALA', 'hc', 'CSCE621 - GRAPH THEORY WITH APPLICATION TO ENGINEERING'),
(150, 'Dr_POTHULA_SUJATHA', 'hc', 'CSCE623 - DATA MINING AND BIG DATA'),
(151, 'Dr_T_VENGATTARAMAN', 'hc', 'CSCE624 - MOBILE & PERVASICE COMPUTING'),
(152, 'Dr_K_SURESH_JOSEPH', 'hc', 'CSCE625 - ADVANCED OPERATING SYSTEM'),
(153, 'Dr_POTHULA_SUJATHA', 'hc', 'CSCE627 - DATA MINING LAB'),
(154, 'Dr_T_VENGATTARAMAN', 'hc', 'CSCE628 - PERVASIVE COMPUTING LAB'),
(155, 'Dr_KS_KUPPUSAMY', 'sc', 'CSCE843 - Web Accessibility'),
(156, 'Dr_M_SATHYA', 'sc', 'CSCE862 - Evolutionary Algorithms'),
(164, NULL, 'hc', 'CSCE621 - GRAPH THEORY WITH APPLICATION TO ENGINEERING'),
(165, NULL, 'hc', 'CSCE623 - DATA MINING AND BIG DATA'),
(166, NULL, 'hc', 'CSCE624 - MOBILE & PERVASICE COMPUTING'),
(167, NULL, 'hc', 'CSCE625 - ADVANCED OPERATING SYSTEM'),
(168, NULL, 'hc', 'CSCE627 - DATA MINING LAB'),
(169, NULL, 'hc', 'CSCE628 - PERVASIVE COMPUTING LAB'),
(170, NULL, 'sc', 'CSCE843 - Web Accessibility'),
(171, NULL, 'sc', 'CSCE862 - Evolutionary Algorithms'),
(179, 'Dr_M_NANDHINI', 'hc', 'CSNS621 - RESOURCE MANAGEMENT TECHNIQUES'),
(180, 'Dr_T_CHITHRALEKHA', 'hc', 'CSNS622 - NETWORK SECURITY'),
(181, 'Dr_S_RAVI', 'hc', 'CSNS623 - DISTRIBUTED SYSTEMS AND SECURITY'),
(182, 'Dr_SKV_JAYAKUMAR', 'hc', 'CSNS624 - NETWORK PROTOCOLS'),
(183, 'Dr_S_SIVA_SATHYA', 'hc', 'CSNS625 - WIRELESS COMMUNICATION NETWORKS'),
(184, 'Dr_T_CHITHRALEKHA', 'hc', 'CSNS626 - NETWORK SECURITY LAB'),
(185, 'Dr_SKV_JAYAKUMAR', 'hc', 'CSNS627 - NETWORK PROTOCOL LAB'),
(186, 'Dr_T_SIVAKUMAR', 'sc', 'CSNS854 - Ad Hoc Mobile Networks'),
(194, NULL, 'hc', 'CSNS621 - RESOURCE MANAGEMENT TECHNIQUES'),
(195, NULL, 'hc', 'CSNS622 - NETWORK SECURITY'),
(196, NULL, 'hc', 'CSNS623 - DISTRIBUTED SYSTEMS AND SECURITY'),
(197, NULL, 'hc', 'CSNS624 - NETWORK PROTOCOLS'),
(198, NULL, 'hc', 'CSNS625 - WIRELESS COMMUNICATION NETWORKS'),
(199, NULL, 'hc', 'CSNS626 - NETWORK SECURITY LAB'),
(200, NULL, 'hc', 'CSNS627 - NETWORK PROTOCOL LAB'),
(201, NULL, 'sc', 'CSNS854 - Ad Hoc Mobile Networks');

-- --------------------------------------------------------

--
-- Table structure for table `setb`
--

CREATE TABLE `setb` (
  `subjectCode` varchar(8) NOT NULL,
  `subjectName` varchar(255) DEFAULT NULL,
  `hoursRequired` int DEFAULT NULL,
  `lab` varchar(10) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `setb`
--

INSERT INTO `setb` (`subjectCode`, `subjectName`, `hoursRequired`, `lab`) VALUES
('CSEL530', 'Online / Certification Courses', 2, 'no'),
('CSEL531', 'Simulation and Modeling Tools (SCI Lab)', 2, 'yes'),
('CSEL532', 'Mobile Application Development', 2, 'yes'),
('CSEL533', 'Software Testing Tools', 2, 'yes'),
('CSEL534', 'Multimedia Tools', 2, 'yes'),
('CSEL535', 'Python Programming', 2, 'yes'),
('CSEL541', 'Statistical_Tools', 3, 'no'),
('CSEL542', 'Web_Designing', 3, 'no'),
('CSEL543', 'Network_Management_Tools', 3, 'no'),
('CSEL544', 'Data_Mining_Tools', 3, 'no'),
('CSEL545', 'Data_Visualization_Tools', 3, 'no'),
('CSEL546', 'Cloud_Computing_Tools', 3, 'no'),
('CSEL547', 'Big_Data_Tools', 3, 'no'),
('CSEL548', 'Internet_of_Things_(IoT)_Tools', 3, 'no');

-- --------------------------------------------------------

--
-- Table structure for table `softcoretb`
--

CREATE TABLE `softcoretb` (
  `subjectCode` varchar(8) NOT NULL,
  `subjectName` varchar(255) DEFAULT NULL,
  `hoursRequired` int DEFAULT NULL,
  `lab` varchar(10) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `softcoretb`
--

INSERT INTO `softcoretb` (`subjectCode`, `subjectName`, `hoursRequired`, `lab`) VALUES
('CSCE811', 'Big Data Technologies', 4, 'no'),
('CSCE812', 'Statistics for Data Analytics', 4, 'no'),
('CSCE813', 'Multivariate Techniques for Data', 4, 'no'),
('CSCE814', 'Data Mining and Data Analysis', 4, 'no'),
('CSCE815', 'Machine Learning', 4, 'no'),
('CSCE816', 'Deep Learning', 4, 'no'),
('CSCE821', 'Software Testing', 4, 'no'),
('CSCE822', 'Agile Software Process', 4, 'no'),
('CSCE823', 'Software Risk Management and Maintenance', 4, 'no'),
('CSCE824', 'Software Project Management', 4, 'no'),
('CSCE825', 'Software Architecture', 4, 'no'),
('CSCE826', 'Software Quality Assurance', 4, 'no'),
('CSCE831', 'Cognitive Science', 4, 'no'),
('CSCE832', 'Knowledge Representation and Reasoning', 4, 'no'),
('CSCE833', 'Computational Intelligence', 4, 'no'),
('CSCE834', 'Artificial Intelligence for Automation', 4, 'no'),
('CSCE835', 'Natural Language Processing', 4, 'no'),
('CSCE836', 'Introduction to Robotics', 4, 'no'),
('CSCE841', 'Introduction to Human Computer Interaction', 4, 'no'),
('CSCE842', 'Principles of Interaction Design', 4, 'no'),
('CSCE843', 'Web Accessibility', 4, 'no'),
('CSCE844', 'Context Aware Computing', 4, 'no'),
('CSCE845', 'Data Visualization', 4, 'no'),
('CSCE846', 'Social Computing Systems', 4, 'no'),
('CSCE851', 'Automata Computability and Complexity', 4, 'no'),
('CSCE852', 'Mathematical Logic for Computer Science', 4, 'no'),
('CSCE853', 'Complexity Theory', 4, 'no'),
('CSCE854', 'Computability Theory', 4, 'no'),
('CSCE855', 'Advanced Compiler Design', 4, 'no'),
('CSCE861', 'Design of Modern Heuristics', 4, 'no'),
('CSCE862', 'Evolutionary Algorithms', 4, 'no'),
('CSCE863', 'Linear Optimization', 4, 'no'),
('CSCE864', 'Nature Inspired Algorithms', 4, 'no'),
('CSCE871', 'Advances in Computer Graphics', 4, 'no'),
('CSCE872', 'Digital Image Processing', 4, 'no'),
('CSCE873', 'Pattern Recognition', 4, 'no'),
('CSCE874', 'Steganography and Digital Watermarking', 4, 'no'),
('CSCE875', 'Biometric Security', 4, 'no'),
('CSCE876', 'Content Based Information Retrieval', 4, 'no'),
('CSEL411', 'Fundamentals_of_Cryptography_(Level_1)', 4, 'no'),
('CSEL441', 'Fundamentals of Cryptography (Level 1)', 4, 'no'),
('CSEL442', 'Database_and_Application_Security_(Level_2)', 4, 'no'),
('CSEL443', 'Mobile_and_Digital_Forensics_(Level_2)', 4, 'no'),
('CSEL444', 'Malware_Analysis_(Level_2)', 4, 'no'),
('CSEL445', 'Information_System_Audit_(Level_3)', 4, 'no'),
('CSEL446', 'Information_Security_Management_(Level_3)', 4, 'no'),
('CSEL447', 'Cloud_Security_(Level_3)', 4, 'no'),
('CSEL448', 'Ethical_Hacking_(Level_3)', 4, 'no'),
('CSEL451', 'Object_Oriented_System_Design_(Level_1)', 4, 'no'),
('CSEL452', 'Software_Architecture_(Level_1)', 4, 'no'),
('CSEL453', 'Software_Project_Management_(Level_2)', 4, 'no'),
('CSEL454', 'Software_Testing_(Level_2)', 4, 'no'),
('CSEL455', 'Software_Quality_Assurance_(Level_3)', 4, 'no'),
('CSEL456', 'Software_Risk_Management_and_Maintenance_(Level_3)', 4, 'no'),
('CSEL457', 'AGILE_Software_Process_(Level_3)', 4, 'no'),
('CSEL461', 'Foundations_of_Human_Computer_Interaction_(Level_1)', 4, 'no'),
('CSEL462', 'Introduction_to_Web_Accessibility_(Level_1)', 4, 'no'),
('CSEL463', 'Introduction_to_Mobile_Accessibility_(Level_1)', 4, 'no'),
('CSEL464', 'Fundamentals_of_Context_Aware_Computing_(Level_2)', 4, 'no'),
('CSEL465', 'Digital_Accessibility_Audit_(Level_2)', 4, 'no'),
('CSEL466', 'User_Interface_Engineering_(Level_3)', 4, 'no'),
('CSEL467', 'Computer_Vision_and_Applications_(Level_3)', 4, 'no'),
('CSEL561', 'Big_Data_(Level_1)', 4, 'no'),
('CSEL562', 'Python_Programming_for_Data_Analytics_(Level_1)', 4, 'no'),
('CSEL563', 'Statistics_for_Business_Analytics_(Level_1)', 4, 'no'),
('CSEL564', 'Marketing_Analytics_(Level_2)', 4, 'no'),
('CSEL565', 'Social_Network_Analytics_(Level_2)', 4, 'no'),
('CSEL566', 'Risk_Analytics_(Level_2)', 4, 'no'),
('CSEL567', 'Database_Systems_in_Big_Data_(Level_3)', 4, 'no'),
('CSEL568', 'Streaming_Analytics_(Level_3)', 4, 'no'),
('CSEL569', 'Video_Processing_and_Analytics_(Level_3)', 4, 'no'),
('CSEL571', 'Principles_of_Distributed_Computing_(Level_1)', 4, 'no'),
('CSEL572', 'Introduction_to_Parallel_Computing_(Level_2)', 4, 'no'),
('CSEL573', 'Network_Design_and_Management_(Level_2)', 4, 'no'),
('CSEL574', 'Web_Services_Computing_(Level_2)', 4, 'no'),
('CSEL575', 'Pervasive_and_Ubiquitous_Computing_(Level_3)', 4, 'no'),
('CSEL576', 'Cloud_Computing_(Level_3)', 4, 'no'),
('CSEL577', 'Internet_of_Things_(Level_3)', 4, 'no'),
('CSEL581', 'Introduction_to_A.I._and_Expert_Systems_(Level_1)', 4, 'no'),
('CSEL582', 'Neural_Networks_(Level_2)', 4, 'no'),
('CSEL583', 'Fuzzy_Logic_(Level_2)', 4, 'no'),
('CSEL584', 'Decision_Support_Systems_(Level_2)', 4, 'no'),
('CSEL585', 'Introduction_to_Machine_Learning_(Level_3)', 4, 'no'),
('CSEL586', 'Introduction_to_Robotics_(Level_3)', 4, 'no'),
('CSEL587', 'Soft_Computing_(Level_3)', 4, 'no'),
('CSNS811', 'Cloud Computing Architecture', 4, 'no'),
('CSNS812', 'Cloud Storage Infrastructure', 4, 'no'),
('CSNS813', 'Principles of Security in Cloud Computing', 4, 'no'),
('CSNS814', 'Converged Networks', 4, 'no'),
('CSNS815', 'Enterprise Storage Systems', 4, 'no'),
('CSNS816', 'Data Centre Virtualization', 4, 'no'),
('CSNS817', 'Data Centre Networking', 4, 'no'),
('CSNS821', 'Cyber Forensics', 4, 'no'),
('CSNS822', 'Block Chain Technology', 4, 'no'),
('CSNS823', 'Pattern Recognition Techniques in Cyber Crime', 4, 'no'),
('CSNS824', 'Cyber Laws and Security Policies', 4, 'no'),
('CSNS825', 'Information Security and Risk Management', 4, 'no'),
('CSNS826', 'Intrusion Detection Systems and Firewall', 4, 'no'),
('CSNS827', 'Multimedia Security and Forensics', 4, 'no'),
('CSNS831', 'Software Defined Networks', 4, 'no'),
('CSNS832', 'Cloud Orchestration and NFV', 4, 'no'),
('CSNS833', 'Software Defined Optical Networks', 4, 'no'),
('CSNS834', 'SDN for Real Networks', 4, 'no'),
('CSNS835', 'Software Defined Radios', 4, 'no'),
('CSNS841', 'Internet - of -Things', 4, 'no'),
('CSNS842', 'IoT Architecture and Protocols', 4, 'no'),
('CSNS843', 'Embedded Systems', 4, 'no'),
('CSNS844', 'Privacy and Security in IoT', 4, 'no'),
('CSNS845', 'Big Data Analytics for IoT', 4, 'no'),
('CSNS846', 'Fog Computing', 4, 'no'),
('CSNS847', 'Wireless Sensor Protocols and Programming', 4, 'no'),
('CSNS851', 'Radio Network Planning and Optimization', 4, 'no'),
('CSNS852', 'Advanced Wireless Networks', 4, 'no'),
('CSNS853', 'Mobile Communication Networks', 4, 'no'),
('CSNS854', 'Ad Hoc Mobile Networks', 4, 'no'),
('CSNS855', 'Advanced Mobile Computing', 4, 'no'),
('CSNS856', 'High Speed Networks', 4, 'no');

-- --------------------------------------------------------

--
-- Table structure for table `staff`
--

CREATE TABLE `staff` (
  `REGNO` int NOT NULL,
  `NAME` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `staff`
--

INSERT INTO `staff` (`REGNO`, `NAME`) VALUES
(1, 'Dr_R_SUBRAMANIAN'),
(2, 'Dr_T_CHITHRALEKHA'),
(3, 'Dr_S_SIVA_SATHYA'),
(4, 'Dr_SKV_JAYAKUMAR'),
(5, 'Dr_K_SURESH_JOSEPH'),
(6, 'Dr_S_RAVI'),
(7, 'Dr_M_NANDHINI'),
(8, 'Dr_T_VENGATTARAMAN'),
(9, 'Dr_POTHULA_SUJATHA'),
(10, 'Dr_P_SHANTHI_BALA'),
(11, 'Dr_V_UMA'),
(12, 'Dr_KS_KUPPUSAMY'),
(13, 'Dr_T_SIVAKUMAR'),
(14, 'Dr_R_SUNITHA'),
(15, 'Dr_M_SATHYA'),
(16, 'Dr_SL_JAYALAKSHMI'),
(17, 'DR_G_KRISHNAPRIYA'),
(18, 'DR_SUKHVINDER_SINGH'),
(19, 'Mr_SEENIVASAN_R_P'),
(20, 'Guest_Faculty'),
(21, 'DR_R_LAKSHMI'),
(22, 'Guest_Faculty_2');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admineven`
--
ALTER TABLE `admineven`
  ADD PRIMARY KEY (`COURSE`);

--
-- Indexes for table `adminodd`
--
ALTER TABLE `adminodd`
  ADD PRIMARY KEY (`COURSE`);

--
-- Indexes for table `evenbsc`
--
ALTER TABLE `evenbsc`
  ADD PRIMARY KEY (`ORDER`);

--
-- Indexes for table `evenbsc_subjects`
--
ALTER TABLE `evenbsc_subjects`
  ADD PRIMARY KEY (`subjectCode`);

--
-- Indexes for table `evend1`
--
ALTER TABLE `evend1`
  ADD PRIMARY KEY (`ORDER`);

--
-- Indexes for table `evend1_subjects`
--
ALTER TABLE `evend1_subjects`
  ADD PRIMARY KEY (`subjectCode`);

--
-- Indexes for table `evend2`
--
ALTER TABLE `evend2`
  ADD PRIMARY KEY (`ORDER`);

--
-- Indexes for table `evend2_subjects`
--
ALTER TABLE `evend2_subjects`
  ADD PRIMARY KEY (`subjectCode`);

--
-- Indexes for table `evend3`
--
ALTER TABLE `evend3`
  ADD PRIMARY KEY (`ORDER`);

--
-- Indexes for table `evend3_subjects`
--
ALTER TABLE `evend3_subjects`
  ADD PRIMARY KEY (`subjectCode`);

--
-- Indexes for table `evenmca1`
--
ALTER TABLE `evenmca1`
  ADD PRIMARY KEY (`ORDER`);

--
-- Indexes for table `evenmca1b2`
--
ALTER TABLE `evenmca1b2`
  ADD PRIMARY KEY (`ORDER`);

--
-- Indexes for table `evenmca1b2_subjects`
--
ALTER TABLE `evenmca1b2_subjects`
  ADD PRIMARY KEY (`subjectCode`);

--
-- Indexes for table `evenmca1_subjects`
--
ALTER TABLE `evenmca1_subjects`
  ADD PRIMARY KEY (`subjectCode`);

--
-- Indexes for table `evenmsc1`
--
ALTER TABLE `evenmsc1`
  ADD PRIMARY KEY (`ORDER`);

--
-- Indexes for table `evenmsc1b2`
--
ALTER TABLE `evenmsc1b2`
  ADD PRIMARY KEY (`ORDER`);

--
-- Indexes for table `evenmsc1b2_subjects`
--
ALTER TABLE `evenmsc1b2_subjects`
  ADD PRIMARY KEY (`subjectCode`);

--
-- Indexes for table `evenmsc1_subjects`
--
ALTER TABLE `evenmsc1_subjects`
  ADD PRIMARY KEY (`subjectCode`);

--
-- Indexes for table `evenmscint2`
--
ALTER TABLE `evenmscint2`
  ADD PRIMARY KEY (`ORDER`);

--
-- Indexes for table `evenmscint2_subjects`
--
ALTER TABLE `evenmscint2_subjects`
  ADD PRIMARY KEY (`subjectCode`);

--
-- Indexes for table `evenmscint3`
--
ALTER TABLE `evenmscint3`
  ADD PRIMARY KEY (`ORDER`);

--
-- Indexes for table `evenmscint3_subjects`
--
ALTER TABLE `evenmscint3_subjects`
  ADD PRIMARY KEY (`subjectCode`);

--
-- Indexes for table `evenmtechcse1`
--
ALTER TABLE `evenmtechcse1`
  ADD PRIMARY KEY (`ORDER`);

--
-- Indexes for table `evenmtechcse1_subjects`
--
ALTER TABLE `evenmtechcse1_subjects`
  ADD PRIMARY KEY (`subjectCode`);

--
-- Indexes for table `evenmtechnis1`
--
ALTER TABLE `evenmtechnis1`
  ADD PRIMARY KEY (`ORDER`);

--
-- Indexes for table `evenmtechnis1_subjects`
--
ALTER TABLE `evenmtechnis1_subjects`
  ADD PRIMARY KEY (`subjectCode`);

--
-- Indexes for table `merged_table`
--
ALTER TABLE `merged_table`
  ADD PRIMARY KEY (`serialNo`);

--
-- Indexes for table `setb`
--
ALTER TABLE `setb`
  ADD PRIMARY KEY (`subjectCode`);

--
-- Indexes for table `softcoretb`
--
ALTER TABLE `softcoretb`
  ADD PRIMARY KEY (`subjectCode`);

--
-- Indexes for table `staff`
--
ALTER TABLE `staff`
  ADD PRIMARY KEY (`REGNO`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `merged_table`
--
ALTER TABLE `merged_table`
  MODIFY `serialNo` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=209;

--
-- AUTO_INCREMENT for table `staff`
--
ALTER TABLE `staff`
  MODIFY `REGNO` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
