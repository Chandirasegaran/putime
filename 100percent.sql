-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 11, 2024 at 05:27 AM
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
-- Table structure for table `admineven`
--

CREATE TABLE `admineven` (
  `COURSE` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `admineven`
--

INSERT INTO `admineven` (`COURSE`) VALUES
('evenBSC'),
('evenMCA1'),
('evenMCA1B2'),
('evenMSC1'),
('evenMSC1B2'),
('evenMSCINT2'),
('evenMSCINT3'),
('evenMTECHCSE1'),
('evenMTECHCSE2'),
('evenMTECHNIS1'),
('evenMTECHNIS2');

-- --------------------------------------------------------

--
-- Table structure for table `evenbsc`
--

CREATE TABLE `evenbsc` (
  `ORDER` int(11) NOT NULL,
  `DAY` varchar(10) DEFAULT NULL,
  `9_30` varchar(30) DEFAULT NULL,
  `10_30` varchar(30) DEFAULT NULL,
  `11_30` varchar(30) DEFAULT NULL,
  `12_30` varchar(30) DEFAULT NULL,
  `1_30` varchar(30) DEFAULT NULL,
  `2_30` varchar(30) DEFAULT NULL,
  `3_30` varchar(30) DEFAULT NULL,
  `4_30` varchar(30) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

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
  `subjectCode` varchar(15) NOT NULL,
  `subjectName` varchar(255) DEFAULT NULL,
  `hoursRequired` int(11) DEFAULT NULL,
  `hoursRequiredDup` int(11) DEFAULT NULL,
  `lab` varchar(10) DEFAULT NULL,
  `staffName` varchar(255) DEFAULT NULL,
  `labStaffName` varchar(255) DEFAULT NULL,
  `stype` varchar(10) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `evenbsc_subjects`
--

INSERT INTO `evenbsc_subjects` (`subjectCode`, `subjectName`, `hoursRequired`, `hoursRequiredDup`, `lab`, `staffName`, `labStaffName`, `stype`) VALUES
('CS2MI02', 'MICROCONTROLLER PROGRAMMING-THEORY', 4, 4, 'no', NULL, NULL, 'hc'),
('CS2MI02L', 'MICROCONTROLLER PROGRAMMING-LAB', 3, 3, '2', NULL, NULL, 'hc'),
('CS2MJ02', 'PROBLEM SOLVING & PROGRAMMING FUNDAMENTALS', 4, 4, 'no', NULL, NULL, 'hc');

-- --------------------------------------------------------

--
-- Table structure for table `evenlab1`
--

CREATE TABLE `evenlab1` (
  `ORDER` int(11) NOT NULL,
  `DAY` varchar(10) DEFAULT NULL,
  `9_30` varchar(30) DEFAULT NULL,
  `10_30` varchar(30) DEFAULT NULL,
  `11_30` varchar(30) DEFAULT NULL,
  `12_30` varchar(30) DEFAULT NULL,
  `1_30` varchar(30) DEFAULT NULL,
  `2_30` varchar(30) DEFAULT NULL,
  `3_30` varchar(30) DEFAULT NULL,
  `4_30` varchar(30) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `evenlab1`
--

INSERT INTO `evenlab1` (`ORDER`, `DAY`, `9_30`, `10_30`, `11_30`, `12_30`, `1_30`, `2_30`, `3_30`, `4_30`) VALUES
(1, 'MONDAY', '', '', '', '', '', '', '', ''),
(2, 'TUESDAY', '', '', '', '', '', '', '', ''),
(3, 'WEDNESDAY', '', '', '', '', '', '', '', ''),
(4, 'THURSDAY', '', '', '', '', '', '', '', ''),
(5, 'FRIDAY', '', '', '', '', '', '', '', '');

-- --------------------------------------------------------

--
-- Table structure for table `evenlab1_subjects`
--

CREATE TABLE `evenlab1_subjects` (
  `subjectCode` varchar(25) NOT NULL,
  `subjectName` varchar(255) DEFAULT NULL,
  `hoursRequired` int(11) DEFAULT NULL,
  `hoursRequiredDup` int(11) DEFAULT NULL,
  `lab` varchar(10) DEFAULT NULL,
  `staffName` varchar(255) DEFAULT NULL,
  `labStaffName` varchar(255) DEFAULT NULL,
  `stype` varchar(10) DEFAULT NULL,
  `coursename` varchar(30) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `evenlab2`
--

CREATE TABLE `evenlab2` (
  `ORDER` int(11) NOT NULL,
  `DAY` varchar(10) DEFAULT NULL,
  `9_30` varchar(30) DEFAULT NULL,
  `10_30` varchar(30) DEFAULT NULL,
  `11_30` varchar(30) DEFAULT NULL,
  `12_30` varchar(30) DEFAULT NULL,
  `1_30` varchar(30) DEFAULT NULL,
  `2_30` varchar(30) DEFAULT NULL,
  `3_30` varchar(30) DEFAULT NULL,
  `4_30` varchar(30) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `evenlab2`
--

INSERT INTO `evenlab2` (`ORDER`, `DAY`, `9_30`, `10_30`, `11_30`, `12_30`, `1_30`, `2_30`, `3_30`, `4_30`) VALUES
(1, 'MONDAY', '', '', '', '', '', '', '', ''),
(2, 'TUESDAY', '', '', '', '', '', '', '', ''),
(3, 'WEDNESDAY', '', '', '', '', '', '', '', ''),
(4, 'THURSDAY', '', '', '', '', '', '', '', ''),
(5, 'FRIDAY', '', '', '', '', '', '', '', '');

-- --------------------------------------------------------

--
-- Table structure for table `evenlab2_subjects`
--

CREATE TABLE `evenlab2_subjects` (
  `subjectCode` varchar(25) NOT NULL,
  `subjectName` varchar(255) DEFAULT NULL,
  `hoursRequired` int(11) DEFAULT NULL,
  `hoursRequiredDup` int(11) DEFAULT NULL,
  `lab` varchar(10) DEFAULT NULL,
  `staffName` varchar(255) DEFAULT NULL,
  `labStaffName` varchar(255) DEFAULT NULL,
  `stype` varchar(10) DEFAULT NULL,
  `coursename` varchar(30) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `evenlab3`
--

CREATE TABLE `evenlab3` (
  `ORDER` int(11) NOT NULL,
  `DAY` varchar(10) DEFAULT NULL,
  `9_30` varchar(30) DEFAULT NULL,
  `10_30` varchar(30) DEFAULT NULL,
  `11_30` varchar(30) DEFAULT NULL,
  `12_30` varchar(30) DEFAULT NULL,
  `1_30` varchar(30) DEFAULT NULL,
  `2_30` varchar(30) DEFAULT NULL,
  `3_30` varchar(30) DEFAULT NULL,
  `4_30` varchar(30) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `evenlab3`
--

INSERT INTO `evenlab3` (`ORDER`, `DAY`, `9_30`, `10_30`, `11_30`, `12_30`, `1_30`, `2_30`, `3_30`, `4_30`) VALUES
(1, 'MONDAY', '', '', '', '', '', '', '', ''),
(2, 'TUESDAY', '', '', '', '', '', '', '', ''),
(3, 'WEDNESDAY', '', '', '', '', '', '', '', ''),
(4, 'THURSDAY', '', '', '', '', '', '', '', ''),
(5, 'FRIDAY', '', '', '', '', '', '', '', '');

-- --------------------------------------------------------

--
-- Table structure for table `evenlab3_subjects`
--

CREATE TABLE `evenlab3_subjects` (
  `subjectCode` varchar(25) NOT NULL,
  `subjectName` varchar(255) DEFAULT NULL,
  `hoursRequired` int(11) DEFAULT NULL,
  `hoursRequiredDup` int(11) DEFAULT NULL,
  `lab` varchar(10) DEFAULT NULL,
  `staffName` varchar(255) DEFAULT NULL,
  `labStaffName` varchar(255) DEFAULT NULL,
  `stype` varchar(10) DEFAULT NULL,
  `coursename` varchar(30) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `evenlab4`
--

CREATE TABLE `evenlab4` (
  `ORDER` int(11) NOT NULL,
  `DAY` varchar(10) DEFAULT NULL,
  `9_30` varchar(30) DEFAULT NULL,
  `10_30` varchar(30) DEFAULT NULL,
  `11_30` varchar(30) DEFAULT NULL,
  `12_30` varchar(30) DEFAULT NULL,
  `1_30` varchar(30) DEFAULT NULL,
  `2_30` varchar(30) DEFAULT NULL,
  `3_30` varchar(30) DEFAULT NULL,
  `4_30` varchar(30) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `evenlab4`
--

INSERT INTO `evenlab4` (`ORDER`, `DAY`, `9_30`, `10_30`, `11_30`, `12_30`, `1_30`, `2_30`, `3_30`, `4_30`) VALUES
(1, 'MONDAY', '', '', '', '', '', '', '', ''),
(2, 'TUESDAY', '', '', '', '', '', '', '', ''),
(3, 'WEDNESDAY', '', '', '', '', '', '', '', ''),
(4, 'THURSDAY', '', '', '', '', '', '', '', ''),
(5, 'FRIDAY', '', '', '', '', '', '', '', '');

-- --------------------------------------------------------

--
-- Table structure for table `evenlab4_subjects`
--

CREATE TABLE `evenlab4_subjects` (
  `subjectCode` varchar(25) NOT NULL,
  `subjectName` varchar(255) DEFAULT NULL,
  `hoursRequired` int(11) DEFAULT NULL,
  `hoursRequiredDup` int(11) DEFAULT NULL,
  `lab` varchar(10) DEFAULT NULL,
  `staffName` varchar(255) DEFAULT NULL,
  `labStaffName` varchar(255) DEFAULT NULL,
  `stype` varchar(10) DEFAULT NULL,
  `coursename` varchar(30) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `evenmca1`
--

CREATE TABLE `evenmca1` (
  `ORDER` int(11) NOT NULL,
  `DAY` varchar(10) DEFAULT NULL,
  `9_30` varchar(30) DEFAULT NULL,
  `10_30` varchar(30) DEFAULT NULL,
  `11_30` varchar(30) DEFAULT NULL,
  `12_30` varchar(30) DEFAULT NULL,
  `1_30` varchar(30) DEFAULT NULL,
  `2_30` varchar(30) DEFAULT NULL,
  `3_30` varchar(30) DEFAULT NULL,
  `4_30` varchar(30) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

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
  `ORDER` int(11) NOT NULL,
  `DAY` varchar(10) DEFAULT NULL,
  `9_30` varchar(30) DEFAULT NULL,
  `10_30` varchar(30) DEFAULT NULL,
  `11_30` varchar(30) DEFAULT NULL,
  `12_30` varchar(30) DEFAULT NULL,
  `1_30` varchar(30) DEFAULT NULL,
  `2_30` varchar(30) DEFAULT NULL,
  `3_30` varchar(30) DEFAULT NULL,
  `4_30` varchar(30) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `evenmca1b2`
--

INSERT INTO `evenmca1b2` (`ORDER`, `DAY`, `9_30`, `10_30`, `11_30`, `12_30`, `1_30`, `2_30`, `3_30`, `4_30`) VALUES
(1, 'MONDAY', '', '', '', '', '', '', '', ''),
(2, 'TUESDAY', '', '', '', '', '', '', '', ''),
(3, 'WEDNESDAY', '', '', '', '', '', '', '', ''),
(4, 'THURSDAY', '', '', '', '', '', '', '', ''),
(5, 'FRIDAY', '', '', '', '', '', '', '', '');

-- --------------------------------------------------------

--
-- Table structure for table `evenmca1b2_subjects`
--

CREATE TABLE `evenmca1b2_subjects` (
  `subjectCode` varchar(15) NOT NULL,
  `subjectName` varchar(255) DEFAULT NULL,
  `hoursRequired` int(11) DEFAULT NULL,
  `hoursRequiredDup` int(11) DEFAULT NULL,
  `lab` varchar(10) DEFAULT NULL,
  `staffName` varchar(255) DEFAULT NULL,
  `labStaffName` varchar(255) DEFAULT NULL,
  `stype` varchar(10) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `evenmca1b2_subjects`
--

INSERT INTO `evenmca1b2_subjects` (`subjectCode`, `subjectName`, `hoursRequired`, `hoursRequiredDup`, `lab`, `staffName`, `labStaffName`, `stype`) VALUES
('CSCA421', 'COMPUTER NETWORK', 4, 4, 'no', 'DR_R_LAKSHMI', NULL, 'hc'),
('CSCA422', 'OPERTATING SYSTEMS', 4, 4, 'no', '', NULL, 'hc'),
('CSCA423', 'COMMUNICATION SKILLS', 4, 4, 'no', 'Dr_KS_KUPPUSAMY', NULL, 'hc'),
('CSCA424', 'COMPUTER NETWORKS LAB', 3, 3, '1', 'Dr_S_RAVI', 'Dr_P_SHANTHI_BALA', 'hc'),
('CSCA425', 'OPERATING SYSTEM LAB', 3, 3, '1', 'Dr_K_SURESH_JOSEPH', 'Guest_Faculty', 'hc'),
('CSCE834', 'Artificial Intelligence for Automation', 4, 4, 'no', 'Dr_SL_JAYALAKSHMI', NULL, 'hc'),
('CSNS843', 'Embedded Systems', 4, 4, 'no', 'Dr_S_RAVI', NULL, 'sc');

-- --------------------------------------------------------

--
-- Table structure for table `evenmca1_subjects`
--

CREATE TABLE `evenmca1_subjects` (
  `subjectCode` varchar(15) NOT NULL,
  `subjectName` varchar(255) DEFAULT NULL,
  `hoursRequired` int(11) DEFAULT NULL,
  `hoursRequiredDup` int(11) DEFAULT NULL,
  `lab` varchar(10) DEFAULT NULL,
  `staffName` varchar(255) DEFAULT NULL,
  `labStaffName` varchar(255) DEFAULT NULL,
  `stype` varchar(10) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `evenmca1_subjects`
--

INSERT INTO `evenmca1_subjects` (`subjectCode`, `subjectName`, `hoursRequired`, `hoursRequiredDup`, `lab`, `staffName`, `labStaffName`, `stype`) VALUES
('CSCA421', 'COMPUTER NETWORK', 4, 4, 'no', 'DR_R_LAKSHMI', NULL, 'hc'),
('CSCA422', 'OPERTATING SYSTEMS', 4, 4, 'no', '', NULL, 'hc'),
('CSCA423', 'COMMUNICATION SKILLS', 4, 4, 'no', 'Dr_R_SUNITHA', NULL, 'hc'),
('CSCA424', 'COMPUTER NETWORKS LAB', 3, 3, '1', 'DR_R_LAKSHMI', 'Nil', 'hc'),
('CSCA425', 'OPERATING SYSTEM LAB', 3, 3, '1', 'Dr_R_SUBRAMANIAN', 'Dr_T_VENGATTARAMAN', 'hc'),
('CSCE834', 'Artificial Intelligence for Automation', 4, 4, 'no', 'DR_G_KRISHNAPRIYA', NULL, 'hc'),
('CSCE851', 'Automata Computability and Complexity', 4, 4, 'no', 'Dr_R_SUNITHA', NULL, 'sc'),
('CSEL448', 'Ethical_Hacking_(Level_3)', 4, 4, 'no', 'Dr_T_CHITHRALEKHA', NULL, 'sc');

-- --------------------------------------------------------

--
-- Table structure for table `evenmsc1`
--

CREATE TABLE `evenmsc1` (
  `ORDER` int(11) NOT NULL,
  `DAY` varchar(10) DEFAULT NULL,
  `9_30` varchar(30) DEFAULT NULL,
  `10_30` varchar(30) DEFAULT NULL,
  `11_30` varchar(30) DEFAULT NULL,
  `12_30` varchar(30) DEFAULT NULL,
  `1_30` varchar(30) DEFAULT NULL,
  `2_30` varchar(30) DEFAULT NULL,
  `3_30` varchar(30) DEFAULT NULL,
  `4_30` varchar(30) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

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
  `ORDER` int(11) NOT NULL,
  `DAY` varchar(10) DEFAULT NULL,
  `9_30` varchar(30) DEFAULT NULL,
  `10_30` varchar(30) DEFAULT NULL,
  `11_30` varchar(30) DEFAULT NULL,
  `12_30` varchar(30) DEFAULT NULL,
  `1_30` varchar(30) DEFAULT NULL,
  `2_30` varchar(30) DEFAULT NULL,
  `3_30` varchar(30) DEFAULT NULL,
  `4_30` varchar(30) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

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
  `subjectCode` varchar(15) NOT NULL,
  `subjectName` varchar(255) DEFAULT NULL,
  `hoursRequired` int(11) DEFAULT NULL,
  `hoursRequiredDup` int(11) DEFAULT NULL,
  `lab` varchar(10) DEFAULT NULL,
  `staffName` varchar(255) DEFAULT NULL,
  `labStaffName` varchar(255) DEFAULT NULL,
  `stype` varchar(10) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `evenmsc1b2_subjects`
--

INSERT INTO `evenmsc1b2_subjects` (`subjectCode`, `subjectName`, `hoursRequired`, `hoursRequiredDup`, `lab`, `staffName`, `labStaffName`, `stype`) VALUES
('CSSC421', 'MODERN OPERATING SYSTEMS', 4, 4, 'no', NULL, NULL, 'hc'),
('CSSC422', 'ADVANCED DATABASE SYSTEMS', 4, 4, 'no', NULL, NULL, 'hc'),
('CSSC423', 'OPERATING SYSTEM LAB', 3, 3, '1', NULL, NULL, 'hc'),
('CSSC424', 'DATABASE SYSTEM LAB', 3, 3, '1', NULL, NULL, 'hc'),
('CSSC433', 'OPTIMIZATION TECHNIQUES', 4, 4, 'no', NULL, NULL, 'hc');

-- --------------------------------------------------------

--
-- Table structure for table `evenmsc1_subjects`
--

CREATE TABLE `evenmsc1_subjects` (
  `subjectCode` varchar(15) NOT NULL,
  `subjectName` varchar(255) DEFAULT NULL,
  `hoursRequired` int(11) DEFAULT NULL,
  `hoursRequiredDup` int(11) DEFAULT NULL,
  `lab` varchar(10) DEFAULT NULL,
  `staffName` varchar(255) DEFAULT NULL,
  `labStaffName` varchar(255) DEFAULT NULL,
  `stype` varchar(10) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `evenmsc1_subjects`
--

INSERT INTO `evenmsc1_subjects` (`subjectCode`, `subjectName`, `hoursRequired`, `hoursRequiredDup`, `lab`, `staffName`, `labStaffName`, `stype`) VALUES
('CSCE851', 'Automata Computability and Complexity', 4, 4, 'no', 'Dr_POTHULA_SUJATHA', NULL, 'sc'),
('CSEL584', 'Decision_Support_Systems_(Level_2)', 4, 4, 'no', 'Dr_K_SURESH_JOSEPH', NULL, 'sc'),
('CSSC421', 'MODERN OPERATING SYSTEMS', 4, 4, 'no', 'Mr_SEENIVASAN_R_P', NULL, 'hc'),
('CSSC422', 'ADVANCED DATABASE SYSTEMS', 4, 4, 'no', 'DR_SUKHVINDER_SINGH', NULL, 'hc'),
('CSSC423', 'OPERATING SYSTEM LAB', 3, 3, '1', 'Mr_SEENIVASAN_R_P', 'Dr_SKV_JAYAKUMAR', 'hc'),
('CSSC424', 'DATABASE SYSTEM LAB', 3, 3, '1', 'Dr_POTHULA_SUJATHA', 'DR_SUKHVINDER_SINGH', 'hc'),
('CSSC433', 'OPTIMIZATION TECHNIQUES', 4, 4, 'no', 'Dr_R_SUBRAMANIAN', NULL, 'hc');

-- --------------------------------------------------------

--
-- Table structure for table `evenmscint2`
--

CREATE TABLE `evenmscint2` (
  `ORDER` int(11) NOT NULL,
  `DAY` varchar(10) DEFAULT NULL,
  `9_30` varchar(30) DEFAULT NULL,
  `10_30` varchar(30) DEFAULT NULL,
  `11_30` varchar(30) DEFAULT NULL,
  `12_30` varchar(30) DEFAULT NULL,
  `1_30` varchar(30) DEFAULT NULL,
  `2_30` varchar(30) DEFAULT NULL,
  `3_30` varchar(30) DEFAULT NULL,
  `4_30` varchar(30) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `evenmscint2`
--

INSERT INTO `evenmscint2` (`ORDER`, `DAY`, `9_30`, `10_30`, `11_30`, `12_30`, `1_30`, `2_30`, `3_30`, `4_30`) VALUES
(1, 'MONDAY', '', '', '', '', '', 'CSIG242', 'CSIG242', ''),
(2, 'TUESDAY', '', '', '', '', '', 'CSIG241', 'CSIG242', 'CSIG242'),
(3, 'WEDNESDAY', '', '', '', '', '', 'CSIG241', '', ''),
(4, 'THURSDAY', '', '', '', '', '', 'CSIG243', 'CSIG243', 'CSIG243'),
(5, 'FRIDAY', '', '', '', '', '', 'CSIG241', 'CSIG241', '');

-- --------------------------------------------------------

--
-- Table structure for table `evenmscint2_subjects`
--

CREATE TABLE `evenmscint2_subjects` (
  `subjectCode` varchar(15) NOT NULL,
  `subjectName` varchar(255) DEFAULT NULL,
  `hoursRequired` int(11) DEFAULT NULL,
  `hoursRequiredDup` int(11) DEFAULT NULL,
  `lab` varchar(10) DEFAULT NULL,
  `staffName` varchar(255) DEFAULT NULL,
  `labStaffName` varchar(255) DEFAULT NULL,
  `stype` varchar(10) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `evenmscint2_subjects`
--

INSERT INTO `evenmscint2_subjects` (`subjectCode`, `subjectName`, `hoursRequired`, `hoursRequiredDup`, `lab`, `staffName`, `labStaffName`, `stype`) VALUES
('CSIG241', 'OPERATING SYSTEM AND SYSTEM SOFTWARE', 4, 4, 'no', 'Dr_P_SHANTHI_BALA', NULL, 'hc'),
('CSIG242', 'INTRODUCTION TO DATABASE CONCEPTS', 4, 4, 'no', 'DR_G_KRISHNAPRIYA', NULL, 'hc'),
('CSIG243', 'DBMS LAB', 3, 3, '2', 'DR_G_KRISHNAPRIYA', 'Dr_SL_JAYALAKSHMI', 'hc');

-- --------------------------------------------------------

--
-- Table structure for table `evenmscint3`
--

CREATE TABLE `evenmscint3` (
  `ORDER` int(11) NOT NULL,
  `DAY` varchar(10) DEFAULT NULL,
  `9_30` varchar(30) DEFAULT NULL,
  `10_30` varchar(30) DEFAULT NULL,
  `11_30` varchar(30) DEFAULT NULL,
  `12_30` varchar(30) DEFAULT NULL,
  `1_30` varchar(30) DEFAULT NULL,
  `2_30` varchar(30) DEFAULT NULL,
  `3_30` varchar(30) DEFAULT NULL,
  `4_30` varchar(30) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `evenmscint3`
--

INSERT INTO `evenmscint3` (`ORDER`, `DAY`, `9_30`, `10_30`, `11_30`, `12_30`, `1_30`, `2_30`, `3_30`, `4_30`) VALUES
(1, 'MONDAY', '', '', '', '', 'CSIG362', 'CSIG362', '', 'CSIG364'),
(2, 'TUESDAY', '', '', '', '', 'CSIG362', 'CSIG362', '', 'CSIG364'),
(3, 'WEDNESDAY', 'CSIG363', 'CSIG363', 'CSIG363', '', '', '', '', 'CSIG364'),
(4, 'THURSDAY', '', 'CSIG361', 'CSIG361', '', '', '', '', 'CSIG364'),
(5, 'FRIDAY', '', '', 'CSIG361', 'CSIG361', '', '', '', '');

-- --------------------------------------------------------

--
-- Table structure for table `evenmscint3_subjects`
--

CREATE TABLE `evenmscint3_subjects` (
  `subjectCode` varchar(15) NOT NULL,
  `subjectName` varchar(255) DEFAULT NULL,
  `hoursRequired` int(11) DEFAULT NULL,
  `hoursRequiredDup` int(11) DEFAULT NULL,
  `lab` varchar(10) DEFAULT NULL,
  `staffName` varchar(255) DEFAULT NULL,
  `labStaffName` varchar(255) DEFAULT NULL,
  `stype` varchar(10) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `evenmscint3_subjects`
--

INSERT INTO `evenmscint3_subjects` (`subjectCode`, `subjectName`, `hoursRequired`, `hoursRequiredDup`, `lab`, `staffName`, `labStaffName`, `stype`) VALUES
('CSIG361', 'JAVA PROGRAMMING', 4, 4, 'no', 'Dr_T_SIVAKUMAR', NULL, 'hc'),
('CSIG362', 'WEB TECHNOLOGY', 4, 4, 'no', 'Dr_SL_JAYALAKSHMI', NULL, 'hc'),
('CSIG363', 'WEB TECHNOLOGY LAB', 3, 3, '2', 'Dr_SL_JAYALAKSHMI', 'Nil', 'hc'),
('CSIG364', 'MINI PROJECT', 4, 4, 'no', 'Dr_T_SIVAKUMAR', NULL, 'hc');

-- --------------------------------------------------------

--
-- Table structure for table `evenmtechcse1`
--

CREATE TABLE `evenmtechcse1` (
  `ORDER` int(11) NOT NULL,
  `DAY` varchar(10) DEFAULT NULL,
  `9_30` varchar(30) DEFAULT NULL,
  `10_30` varchar(30) DEFAULT NULL,
  `11_30` varchar(30) DEFAULT NULL,
  `12_30` varchar(30) DEFAULT NULL,
  `1_30` varchar(30) DEFAULT NULL,
  `2_30` varchar(30) DEFAULT NULL,
  `3_30` varchar(30) DEFAULT NULL,
  `4_30` varchar(30) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `evenmtechcse1`
--

INSERT INTO `evenmtechcse1` (`ORDER`, `DAY`, `9_30`, `10_30`, `11_30`, `12_30`, `1_30`, `2_30`, `3_30`, `4_30`) VALUES
(1, 'MONDAY', 'CSCE621', 'CSCE623', 'CSCE624', 'CSCE625', '', 'CSCE627', 'CSCE627', 'CSCE627'),
(2, 'TUESDAY', 'CSCE623', 'CSCE621', 'CSCE624', 'CSCE625', '', 'CSCE628', 'CSCE628', 'CSCE628'),
(3, 'WEDNESDAY', 'CSCE624', 'CSCE623', 'CSCE621', 'CSCE862', '', 'CSCE843', 'CSCE862', ''),
(4, 'THURSDAY', 'CSCE625', 'CSCE843', 'CSCE623', 'CSCE621', '', 'CSCE862', '', ''),
(5, 'FRIDAY', 'CSCE843', 'CSCE624', 'CSCE625', 'CSCE862', '', 'CSCE843', '', '');

-- --------------------------------------------------------

--
-- Table structure for table `evenmtechcse1_subjects`
--

CREATE TABLE `evenmtechcse1_subjects` (
  `subjectCode` varchar(15) NOT NULL,
  `subjectName` varchar(255) DEFAULT NULL,
  `hoursRequired` int(11) DEFAULT NULL,
  `hoursRequiredDup` int(11) DEFAULT NULL,
  `lab` varchar(10) DEFAULT NULL,
  `staffName` varchar(255) DEFAULT NULL,
  `labStaffName` varchar(255) DEFAULT NULL,
  `stype` varchar(10) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `evenmtechcse1_subjects`
--

INSERT INTO `evenmtechcse1_subjects` (`subjectCode`, `subjectName`, `hoursRequired`, `hoursRequiredDup`, `lab`, `staffName`, `labStaffName`, `stype`) VALUES
('CSCE621', 'GRAPH THEORY WITH APPLICATION TO ENGINEERING', 4, 4, 'no', 'Dr_P_SHANTHI_BALA', NULL, 'hc'),
('CSCE623', 'DATA MINING AND BIG DATA', 4, 4, 'no', 'Dr_POTHULA_SUJATHA', NULL, 'hc'),
('CSCE624', 'MOBILE & PERVASICE COMPUTING', 4, 4, 'no', 'Dr_T_VENGATTARAMAN', NULL, 'hc'),
('CSCE625', 'ADVANCED OPERATING SYSTEM', 4, 4, 'no', 'Dr_K_SURESH_JOSEPH', NULL, 'hc'),
('CSCE627', 'DATA MINING LAB', 3, 3, '2', 'Dr_POTHULA_SUJATHA', 'Nil', 'hc'),
('CSCE628', 'PERVASIVE COMPUTING LAB', 3, 3, '2', 'Dr_T_VENGATTARAMAN', 'Nil', 'hc'),
('CSCE843', 'Web Accessibility', 4, 4, 'no', 'Dr_KS_KUPPUSAMY', NULL, 'sc'),
('CSCE862', 'Evolutionary Algorithms', 4, 4, 'no', 'Dr_M_SATHYA', NULL, 'sc');

-- --------------------------------------------------------

--
-- Table structure for table `evenmtechcse2`
--

CREATE TABLE `evenmtechcse2` (
  `ORDER` int(11) NOT NULL,
  `DAY` varchar(10) DEFAULT NULL,
  `9_30` varchar(30) DEFAULT NULL,
  `10_30` varchar(30) DEFAULT NULL,
  `11_30` varchar(30) DEFAULT NULL,
  `12_30` varchar(30) DEFAULT NULL,
  `1_30` varchar(30) DEFAULT NULL,
  `2_30` varchar(30) DEFAULT NULL,
  `3_30` varchar(30) DEFAULT NULL,
  `4_30` varchar(30) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `evenmtechcse2`
--

INSERT INTO `evenmtechcse2` (`ORDER`, `DAY`, `9_30`, `10_30`, `11_30`, `12_30`, `1_30`, `2_30`, `3_30`, `4_30`) VALUES
(1, 'MONDAY', '', 'CSCE811', '', '', '', 'CSCE721', 'CSCE721', 'CSCE721'),
(2, 'TUESDAY', '', 'CSCE811', '', '', '', '', '', ''),
(3, 'WEDNESDAY', '', 'CSCE811', '', '', '', 'CSCE721', 'CSCE721', 'CSCE721'),
(4, 'THURSDAY', '', 'CSCE811', '', '', '', '', '', ''),
(5, 'FRIDAY', '', '', '', '', '', '', '', '');

-- --------------------------------------------------------

--
-- Table structure for table `evenmtechcse2_subjects`
--

CREATE TABLE `evenmtechcse2_subjects` (
  `subjectCode` varchar(15) NOT NULL,
  `subjectName` varchar(255) DEFAULT NULL,
  `hoursRequired` int(11) DEFAULT NULL,
  `hoursRequiredDup` int(11) DEFAULT NULL,
  `lab` varchar(10) DEFAULT NULL,
  `staffName` varchar(255) DEFAULT NULL,
  `labStaffName` varchar(255) DEFAULT NULL,
  `stype` varchar(10) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `evenmtechcse2_subjects`
--

INSERT INTO `evenmtechcse2_subjects` (`subjectCode`, `subjectName`, `hoursRequired`, `hoursRequiredDup`, `lab`, `staffName`, `labStaffName`, `stype`) VALUES
('CSCE721', 'PROJECT WORK', 6, 6, 'no', 'PROJECT_GUIDE', NULL, 'hc'),
('CSCE811', 'Big Data Technologies', 4, 4, 'no', 'DR_SUKHVINDER_SINGH', NULL, 'sc');

-- --------------------------------------------------------

--
-- Table structure for table `evenmtechnis1`
--

CREATE TABLE `evenmtechnis1` (
  `ORDER` int(11) NOT NULL,
  `DAY` varchar(10) DEFAULT NULL,
  `9_30` varchar(30) DEFAULT NULL,
  `10_30` varchar(30) DEFAULT NULL,
  `11_30` varchar(30) DEFAULT NULL,
  `12_30` varchar(30) DEFAULT NULL,
  `1_30` varchar(30) DEFAULT NULL,
  `2_30` varchar(30) DEFAULT NULL,
  `3_30` varchar(30) DEFAULT NULL,
  `4_30` varchar(30) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `evenmtechnis1`
--

INSERT INTO `evenmtechnis1` (`ORDER`, `DAY`, `9_30`, `10_30`, `11_30`, `12_30`, `1_30`, `2_30`, `3_30`, `4_30`) VALUES
(1, 'MONDAY', 'CSNS621', 'CSNS622', 'CSNS623', 'CSNS624', '', 'CSNS854', 'CSNS854', ''),
(2, 'TUESDAY', 'CSNS622', 'CSNS621', 'CSNS623', 'CSNS625', '', 'CSNS854', 'CSNS854', ''),
(3, 'WEDNESDAY', 'CSNS623', 'CSNS625', 'CSNS621', 'CSNS624', '', 'CSNS626', 'CSNS626', 'CSNS626'),
(4, 'THURSDAY', 'CSNS624', 'CSNS625', 'CSNS622', 'CSNS621', '', '', '', ''),
(5, 'FRIDAY', 'CSNS625', 'CSNS623', 'CSNS624', 'CSNS622', '', 'CSNS627', 'CSNS627', 'CSNS627');

-- --------------------------------------------------------

--
-- Table structure for table `evenmtechnis1_subjects`
--

CREATE TABLE `evenmtechnis1_subjects` (
  `subjectCode` varchar(15) NOT NULL,
  `subjectName` varchar(255) DEFAULT NULL,
  `hoursRequired` int(11) DEFAULT NULL,
  `hoursRequiredDup` int(11) DEFAULT NULL,
  `lab` varchar(10) DEFAULT NULL,
  `staffName` varchar(255) DEFAULT NULL,
  `labStaffName` varchar(255) DEFAULT NULL,
  `stype` varchar(10) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `evenmtechnis1_subjects`
--

INSERT INTO `evenmtechnis1_subjects` (`subjectCode`, `subjectName`, `hoursRequired`, `hoursRequiredDup`, `lab`, `staffName`, `labStaffName`, `stype`) VALUES
('CSNS621', 'RESOURCE MANAGEMENT TECHNIQUES', 4, 4, 'no', 'Dr_M_NANDHINI', NULL, 'hc'),
('CSNS622', 'NETWORK SECURITY', 4, 4, 'no', 'Dr_T_CHITHRALEKHA', NULL, 'hc'),
('CSNS623', 'DISTRIBUTED SYSTEMS AND SECURITY', 4, 4, 'no', 'Dr_S_RAVI', NULL, 'hc'),
('CSNS624', 'NETWORK PROTOCOLS', 4, 4, 'no', 'Dr_SKV_JAYAKUMAR', NULL, 'hc'),
('CSNS625', 'WIRELESS COMMUNICATION NETWORKS', 4, 4, 'no', 'Dr_S_SIVA_SATHYA', NULL, 'hc'),
('CSNS626', 'NETWORK SECURITY LAB', 3, 3, '2', 'Dr_T_CHITHRALEKHA', 'Nil', 'hc'),
('CSNS627', 'NETWORK PROTOCOL LAB', 3, 3, '2', 'Dr_SKV_JAYAKUMAR', 'Nil', 'hc'),
('CSNS854', 'Ad Hoc Mobile Networks', 4, 4, 'no', 'Dr_T_SIVAKUMAR', NULL, 'sc');

-- --------------------------------------------------------

--
-- Table structure for table `evenmtechnis2`
--

CREATE TABLE `evenmtechnis2` (
  `ORDER` int(11) NOT NULL,
  `DAY` varchar(10) DEFAULT NULL,
  `9_30` varchar(30) DEFAULT NULL,
  `10_30` varchar(30) DEFAULT NULL,
  `11_30` varchar(30) DEFAULT NULL,
  `12_30` varchar(30) DEFAULT NULL,
  `1_30` varchar(30) DEFAULT NULL,
  `2_30` varchar(30) DEFAULT NULL,
  `3_30` varchar(30) DEFAULT NULL,
  `4_30` varchar(30) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `evenmtechnis2`
--

INSERT INTO `evenmtechnis2` (`ORDER`, `DAY`, `9_30`, `10_30`, `11_30`, `12_30`, `1_30`, `2_30`, `3_30`, `4_30`) VALUES
(1, 'MONDAY', '', 'CSNS811', '', '', '', 'CSNS721', 'CSNS721', 'CSNS721'),
(2, 'TUESDAY', '', 'CSNS811', '', '', '', '', '', ''),
(3, 'WEDNESDAY', '', 'CSNS811', '', '', '', 'CSNS721', 'CSNS721', 'CSNS721'),
(4, 'THURSDAY', '', 'CSNS811', '', '', '', '', '', ''),
(5, 'FRIDAY', '', '', '', '', '', '', '', '');

-- --------------------------------------------------------

--
-- Table structure for table `evenmtechnis2_subjects`
--

CREATE TABLE `evenmtechnis2_subjects` (
  `subjectCode` varchar(15) NOT NULL,
  `subjectName` varchar(255) DEFAULT NULL,
  `hoursRequired` int(11) DEFAULT NULL,
  `hoursRequiredDup` int(11) DEFAULT NULL,
  `lab` varchar(10) DEFAULT NULL,
  `staffName` varchar(255) DEFAULT NULL,
  `labStaffName` varchar(255) DEFAULT NULL,
  `stype` varchar(10) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `evenmtechnis2_subjects`
--

INSERT INTO `evenmtechnis2_subjects` (`subjectCode`, `subjectName`, `hoursRequired`, `hoursRequiredDup`, `lab`, `staffName`, `labStaffName`, `stype`) VALUES
('CSNS721', 'PROJECT WORK', 6, 6, 'no', 'PROJECT_SUPERVISOR', NULL, 'hc'),
('CSNS811', 'Cloud Computing Architecture', 4, 4, 'no', 'Dr_SKV_JAYAKUMAR', NULL, 'sc');

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

-- --------------------------------------------------------

--
-- Table structure for table `merged_table`
--

CREATE TABLE `merged_table` (
  `serialNo` int(11) NOT NULL,
  `facultyName` varchar(255) DEFAULT NULL,
  `facultyName2` varchar(255) DEFAULT NULL,
  `stype` varchar(255) DEFAULT NULL,
  `theory` varchar(255) DEFAULT NULL,
  `lab` varchar(10) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `merged_table`
--

INSERT INTO `merged_table` (`serialNo`, `facultyName`, `facultyName2`, `stype`, `theory`, `lab`) VALUES
(1, NULL, NULL, 'hc', 'CS2MI02 - MICROCONTROLLER PROGRAMMING-THEORY', 'no'),
(2, NULL, NULL, 'hc', 'CS2MI02L - MICROCONTROLLER PROGRAMMING-LAB', '2'),
(3, NULL, NULL, 'hc', 'CS2MJ02 - PROBLEM SOLVING & PROGRAMMING FUNDAMENTALS', 'no'),
(4, 'DR_R_LAKSHMI', NULL, 'hc', 'CSCA421 - COMPUTER NETWORK', 'no'),
(5, '', NULL, 'hc', 'CSCA422 - OPERTATING SYSTEMS', 'no'),
(6, 'Dr_R_SUNITHA', NULL, 'hc', 'CSCA423 - COMMUNICATION SKILLS', 'no'),
(7, 'DR_R_LAKSHMI', 'Nil', 'hc', 'CSCA424 - COMPUTER NETWORKS LAB', '1'),
(8, 'Dr_R_SUBRAMANIAN', 'Dr_T_VENGATTARAMAN', 'hc', 'CSCA425 - OPERATING SYSTEM LAB', '1'),
(9, 'DR_G_KRISHNAPRIYA', NULL, 'hc', 'CSCE834 - Artificial Intelligence for Automation', 'no'),
(10, 'Dr_R_SUNITHA', NULL, 'sc', 'CSCE851 - Automata Computability and Complexity', 'no'),
(11, 'Dr_T_CHITHRALEKHA', NULL, 'sc', 'CSEL448 - Ethical_Hacking_(Level_3)', 'no'),
(19, 'DR_R_LAKSHMI', NULL, 'hc', 'CSCA421 - COMPUTER NETWORK', 'no'),
(20, '', NULL, 'hc', 'CSCA422 - OPERTATING SYSTEMS', 'no'),
(21, 'Dr_KS_KUPPUSAMY', NULL, 'hc', 'CSCA423 - COMMUNICATION SKILLS', 'no'),
(22, 'Dr_S_RAVI', 'Dr_P_SHANTHI_BALA', 'hc', 'CSCA424 - COMPUTER NETWORKS LAB', '1'),
(23, 'Dr_K_SURESH_JOSEPH', 'Guest_Faculty', 'hc', 'CSCA425 - OPERATING SYSTEM LAB', '1'),
(24, 'Dr_SL_JAYALAKSHMI', NULL, 'hc', 'CSCE834 - Artificial Intelligence for Automation', 'no'),
(25, 'Dr_S_RAVI', NULL, 'sc', 'CSNS843 - Embedded Systems', 'no'),
(26, 'Dr_POTHULA_SUJATHA', NULL, 'sc', 'CSCE851 - Automata Computability and Complexity', 'no'),
(27, 'Dr_K_SURESH_JOSEPH', NULL, 'sc', 'CSEL584 - Decision_Support_Systems_(Level_2)', 'no'),
(28, 'Mr_SEENIVASAN_R_P', NULL, 'hc', 'CSSC421 - MODERN OPERATING SYSTEMS', 'no'),
(29, 'DR_SUKHVINDER_SINGH', NULL, 'hc', 'CSSC422 - ADVANCED DATABASE SYSTEMS', 'no'),
(30, 'Mr_SEENIVASAN_R_P', 'Dr_SKV_JAYAKUMAR', 'hc', 'CSSC423 - OPERATING SYSTEM LAB', '1'),
(31, 'Dr_POTHULA_SUJATHA', 'DR_SUKHVINDER_SINGH', 'hc', 'CSSC424 - DATABASE SYSTEM LAB', '1'),
(32, 'Dr_R_SUBRAMANIAN', NULL, 'hc', 'CSSC433 - OPTIMIZATION TECHNIQUES', 'no'),
(33, NULL, NULL, 'hc', 'CSSC421 - MODERN OPERATING SYSTEMS', 'no'),
(34, NULL, NULL, 'hc', 'CSSC422 - ADVANCED DATABASE SYSTEMS', 'no'),
(35, NULL, NULL, 'hc', 'CSSC423 - OPERATING SYSTEM LAB', '1'),
(36, NULL, NULL, 'hc', 'CSSC424 - DATABASE SYSTEM LAB', '1'),
(37, NULL, NULL, 'hc', 'CSSC433 - OPTIMIZATION TECHNIQUES', 'no'),
(40, 'Dr_P_SHANTHI_BALA', NULL, 'hc', 'CSIG241 - OPERATING SYSTEM AND SYSTEM SOFTWARE', 'no'),
(41, 'DR_G_KRISHNAPRIYA', NULL, 'hc', 'CSIG242 - INTRODUCTION TO DATABASE CONCEPTS', 'no'),
(42, 'DR_G_KRISHNAPRIYA', 'Dr_SL_JAYALAKSHMI', 'hc', 'CSIG243 - DBMS LAB', '2'),
(43, 'Dr_T_SIVAKUMAR', NULL, 'hc', 'CSIG361 - JAVA PROGRAMMING', 'no'),
(44, 'Dr_SL_JAYALAKSHMI', NULL, 'hc', 'CSIG362 - WEB TECHNOLOGY', 'no'),
(45, 'Dr_SL_JAYALAKSHMI', 'Nil', 'hc', 'CSIG363 - WEB TECHNOLOGY LAB', '2'),
(46, 'Dr_T_SIVAKUMAR', NULL, 'hc', 'CSIG364 - MINI PROJECT', 'no'),
(50, 'Dr_P_SHANTHI_BALA', NULL, 'hc', 'CSCE621 - GRAPH THEORY WITH APPLICATION TO ENGINEERING', 'no'),
(51, 'Dr_POTHULA_SUJATHA', NULL, 'hc', 'CSCE623 - DATA MINING AND BIG DATA', 'no'),
(52, 'Dr_T_VENGATTARAMAN', NULL, 'hc', 'CSCE624 - MOBILE & PERVASICE COMPUTING', 'no'),
(53, 'Dr_K_SURESH_JOSEPH', NULL, 'hc', 'CSCE625 - ADVANCED OPERATING SYSTEM', 'no'),
(54, 'Dr_POTHULA_SUJATHA', 'Nil', 'hc', 'CSCE627 - DATA MINING LAB', '2'),
(55, 'Dr_T_VENGATTARAMAN', 'Nil', 'hc', 'CSCE628 - PERVASIVE COMPUTING LAB', '2'),
(56, 'Dr_KS_KUPPUSAMY', NULL, 'sc', 'CSCE843 - Web Accessibility', 'no'),
(57, 'Dr_M_SATHYA', NULL, 'sc', 'CSCE862 - Evolutionary Algorithms', 'no'),
(65, 'PROJECT_GUIDE', NULL, 'hc', 'CSCE721 - PROJECT WORK', 'no'),
(66, 'DR_SUKHVINDER_SINGH', NULL, 'sc', 'CSCE811 - Big Data Technologies', 'no'),
(68, 'Dr_M_NANDHINI', NULL, 'hc', 'CSNS621 - RESOURCE MANAGEMENT TECHNIQUES', 'no'),
(69, 'Dr_T_CHITHRALEKHA', NULL, 'hc', 'CSNS622 - NETWORK SECURITY', 'no'),
(70, 'Dr_S_RAVI', NULL, 'hc', 'CSNS623 - DISTRIBUTED SYSTEMS AND SECURITY', 'no'),
(71, 'Dr_SKV_JAYAKUMAR', NULL, 'hc', 'CSNS624 - NETWORK PROTOCOLS', 'no'),
(72, 'Dr_S_SIVA_SATHYA', NULL, 'hc', 'CSNS625 - WIRELESS COMMUNICATION NETWORKS', 'no'),
(73, 'Dr_T_CHITHRALEKHA', 'Nil', 'hc', 'CSNS626 - NETWORK SECURITY LAB', '2'),
(74, 'Dr_SKV_JAYAKUMAR', 'Nil', 'hc', 'CSNS627 - NETWORK PROTOCOL LAB', '2'),
(75, 'Dr_T_SIVAKUMAR', NULL, 'sc', 'CSNS854 - Ad Hoc Mobile Networks', 'no'),
(83, 'PROJECT_SUPERVISOR', NULL, 'hc', 'CSNS721 - PROJECT WORK', 'no'),
(84, 'Dr_SKV_JAYAKUMAR', NULL, 'sc', 'CSNS811 - Cloud Computing Architecture', 'no');

-- --------------------------------------------------------

--
-- Table structure for table `setb`
--

CREATE TABLE `setb` (
  `subjectCode` varchar(15) NOT NULL,
  `subjectName` varchar(255) DEFAULT NULL,
  `hoursRequired` int(11) DEFAULT NULL,
  `lab` varchar(10) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

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
  `subjectCode` varchar(15) NOT NULL,
  `subjectName` varchar(255) DEFAULT NULL,
  `hoursRequired` int(11) DEFAULT NULL,
  `lab` varchar(10) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `softcoretb`
--

INSERT INTO `softcoretb` (`subjectCode`, `subjectName`, `hoursRequired`, `lab`) VALUES
('CS1SE02E1', 'PROGRAMMING FOR MOBILE DEVICES', 4, 'no'),
('CS1SE02E2', 'VISUAL PROGRAMMING USING C#', 4, 'no'),
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
  `REGNO` int(11) NOT NULL,
  `NAME` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

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
(22, 'Guest_Faculty_2'),
(23, 'PROJECT_GUIDE'),
(24, 'PROJECT_SUPERVISOR');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admineven`
--
ALTER TABLE `admineven`
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
-- Indexes for table `evenlab1`
--
ALTER TABLE `evenlab1`
  ADD PRIMARY KEY (`ORDER`);

--
-- Indexes for table `evenlab1_subjects`
--
ALTER TABLE `evenlab1_subjects`
  ADD PRIMARY KEY (`subjectCode`);

--
-- Indexes for table `evenlab2`
--
ALTER TABLE `evenlab2`
  ADD PRIMARY KEY (`ORDER`);

--
-- Indexes for table `evenlab2_subjects`
--
ALTER TABLE `evenlab2_subjects`
  ADD PRIMARY KEY (`subjectCode`);

--
-- Indexes for table `evenlab3`
--
ALTER TABLE `evenlab3`
  ADD PRIMARY KEY (`ORDER`);

--
-- Indexes for table `evenlab3_subjects`
--
ALTER TABLE `evenlab3_subjects`
  ADD PRIMARY KEY (`subjectCode`);

--
-- Indexes for table `evenlab4`
--
ALTER TABLE `evenlab4`
  ADD PRIMARY KEY (`ORDER`);

--
-- Indexes for table `evenlab4_subjects`
--
ALTER TABLE `evenlab4_subjects`
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
-- Indexes for table `evenmtechcse2`
--
ALTER TABLE `evenmtechcse2`
  ADD PRIMARY KEY (`ORDER`);

--
-- Indexes for table `evenmtechcse2_subjects`
--
ALTER TABLE `evenmtechcse2_subjects`
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
-- Indexes for table `evenmtechnis2`
--
ALTER TABLE `evenmtechnis2`
  ADD PRIMARY KEY (`ORDER`);

--
-- Indexes for table `evenmtechnis2_subjects`
--
ALTER TABLE `evenmtechnis2_subjects`
  ADD PRIMARY KEY (`subjectCode`);

--
-- Indexes for table `hardcoretb`
--
ALTER TABLE `hardcoretb`
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
  MODIFY `serialNo` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=86;

--
-- AUTO_INCREMENT for table `staff`
--
ALTER TABLE `staff`
  MODIFY `REGNO` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
