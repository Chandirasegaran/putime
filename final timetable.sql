-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 16, 2024 at 08:49 AM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.2.12

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
('evenIBSC'),
('evenIIIMSCINT'),
('evenIIMSCINT'),
('evenIIMTECHCSE'),
('evenIIMTECHNIS'),
('evenIMCAB1'),
('evenIMCAB2'),
('evenIMSCB1'),
('evenIMSCB2'),
('evenIMTECHCSE'),
('evenIMTECHNIS');

-- --------------------------------------------------------

--
-- Table structure for table `adminodd`
--

CREATE TABLE `adminodd` (
  `COURSE` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `evenibsc`
--

CREATE TABLE `evenibsc` (
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
-- Dumping data for table `evenibsc`
--

INSERT INTO `evenibsc` (`ORDER`, `DAY`, `9_30`, `10_30`, `11_30`, `12_30`, `1_30`, `2_30`, `3_30`, `4_30`) VALUES
(1, 'MONDAY', 'CS2MI02', 'CS2MJ02', '', '', '', 'CS2MI02L', 'CS2MI02L', ''),
(2, 'TUESDAY', 'CS2MJ02', 'CS2MJ02', 'CS1SE02E1L', 'CS1SE02E1L', '', '', '', ''),
(3, 'WEDNESDAY', 'CS1SE02E1', 'CS1SE02E1', 'CS2MI02', '', '', '', '', ''),
(4, 'THURSDAY', '', 'CS2VA04', 'CS2VA04', '', '', 'CS2MJ02L', 'CS2MJ02L', ''),
(5, 'FRIDAY', 'CS2VA04', 'CS2MI02', '', '', '', '', '', '');

-- --------------------------------------------------------

--
-- Table structure for table `evenibsc_subjects`
--

CREATE TABLE `evenibsc_subjects` (
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
-- Dumping data for table `evenibsc_subjects`
--

INSERT INTO `evenibsc_subjects` (`subjectCode`, `subjectName`, `hoursRequired`, `hoursRequiredDup`, `lab`, `staffName`, `labStaffName`, `stype`) VALUES
('CS1SE02E1', 'PROGRAMMING FOR MOBILE DEVICES', 2, 2, 'no', 'Dr_M_SATHYA', NULL, 'hc'),
('CS1SE02E1L', 'PRG FOR MOBILE DEVICE LAB', 2, 2, '2', 'Dr_M_SATHYA', 'Nil', 'hc'),
('CS2MI02', 'MICROCONTROLLER PROGRAMMING-THEORY', 3, 3, 'no', 'Dr_M_SATHYA', NULL, 'hc'),
('CS2MI02L', 'MICROCONTROLLER PROGRAMMING LAB', 2, 2, '2', 'Dr_M_SATHYA', 'Nil', 'hc'),
('CS2MJ02', 'PROBLEM SOLVING & PROGRAMMING FUNDAMENTALS', 3, 3, 'no', 'Dr_V_UMA', NULL, 'hc'),
('CS2MJ02L', 'PROBLEM SOLVING & PROGRAMMING FUNDAMENTALS-LAB', 2, 2, '2', 'Dr_V_UMA', 'Nil', 'hc'),
('CS2VA04', 'DIGITAL TECHNOLOGIES', 3, 3, 'no', 'Dr_YAZHINI', NULL, 'hc');

-- --------------------------------------------------------

--
-- Table structure for table `eveniiimscint`
--

CREATE TABLE `eveniiimscint` (
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
-- Dumping data for table `eveniiimscint`
--

INSERT INTO `eveniiimscint` (`ORDER`, `DAY`, `9_30`, `10_30`, `11_30`, `12_30`, `1_30`, `2_30`, `3_30`, `4_30`) VALUES
(1, 'MONDAY', '', '', '', '', 'CSIG362', 'CSIG362', '', ''),
(2, 'TUESDAY', 'CSIG364', 'CSIG364', '', '', 'CSIG362', 'CSIG362', '', ''),
(3, 'WEDNESDAY', 'CSIG363', 'CSIG363', 'CSIG363', '', 'CSIG364', '', '', ''),
(4, 'THURSDAY', '', 'CSIG361', 'CSIG361', '', '', '', '', ''),
(5, 'FRIDAY', 'CSIG364', '', 'CSIG361', 'CSIG361', '', '', '', '');

-- --------------------------------------------------------

--
-- Table structure for table `eveniiimscint_subjects`
--

CREATE TABLE `eveniiimscint_subjects` (
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
-- Dumping data for table `eveniiimscint_subjects`
--

INSERT INTO `eveniiimscint_subjects` (`subjectCode`, `subjectName`, `hoursRequired`, `hoursRequiredDup`, `lab`, `staffName`, `labStaffName`, `stype`) VALUES
('CSIG361', 'JAVA PROGRAMMING ', 4, 4, 'no', 'Dr_T_SIVAKUMAR', NULL, 'hc'),
('CSIG362', 'WEB TECHNOLOGY', 4, 4, 'no', 'Dr_SL_JAYALAKSHMI', NULL, 'hc'),
('CSIG363', 'WEB TECHNOLOGY LAB', 3, 3, '3', 'Dr_SL_JAYALAKSHMI', 'Nil', 'hc'),
('CSIG364', 'MINI PROJECT', 4, 4, 'no', 'Dr_T_SIVAKUMAR', NULL, 'hc');

-- --------------------------------------------------------

--
-- Table structure for table `eveniimscint`
--

CREATE TABLE `eveniimscint` (
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
-- Dumping data for table `eveniimscint`
--

INSERT INTO `eveniimscint` (`ORDER`, `DAY`, `9_30`, `10_30`, `11_30`, `12_30`, `1_30`, `2_30`, `3_30`, `4_30`) VALUES
(1, 'MONDAY', '', '', '', '', '', 'CSIG242', 'CSIG242', ''),
(2, 'TUESDAY', '', '', '', '', '', 'CSIG241', 'CSIG242', 'CSIG242'),
(3, 'WEDNESDAY', '', '', '', '', '', 'CSIG241', '', ''),
(4, 'THURSDAY', '', '', '', '', '', 'CSIG243', 'CSIG243', 'CSIG243'),
(5, 'FRIDAY', '', '', '', '', 'CSIG241', 'CSIG241', '', '');

-- --------------------------------------------------------

--
-- Table structure for table `eveniimscint_subjects`
--

CREATE TABLE `eveniimscint_subjects` (
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
-- Dumping data for table `eveniimscint_subjects`
--

INSERT INTO `eveniimscint_subjects` (`subjectCode`, `subjectName`, `hoursRequired`, `hoursRequiredDup`, `lab`, `staffName`, `labStaffName`, `stype`) VALUES
('CSIG241', 'OPERATING SYSTEM AND SYSTEM SOFTWARE', 4, 4, 'no', 'Dr_P_SHANTHI_BALA', NULL, 'hc'),
('CSIG242', 'INTRODUCTION TO DATABASE CONCEPTS', 4, 4, 'no', 'DR_G_KRISHNAPRIYA', NULL, 'hc'),
('CSIG243', 'DBMS LAB', 3, 3, '3', 'DR_G_KRISHNAPRIYA', 'Dr_SL_JAYALAKSHMI', 'hc');

-- --------------------------------------------------------

--
-- Table structure for table `eveniimtechcse`
--

CREATE TABLE `eveniimtechcse` (
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
-- Dumping data for table `eveniimtechcse`
--

INSERT INTO `eveniimtechcse` (`ORDER`, `DAY`, `9_30`, `10_30`, `11_30`, `12_30`, `1_30`, `2_30`, `3_30`, `4_30`) VALUES
(1, 'MONDAY', '', '', '', '', '', 'CSCE811', '', ''),
(2, 'TUESDAY', '', '', 'CSCE811', '', '', 'CSCE721', 'CSCE721', 'CSCE721'),
(3, 'WEDNESDAY', '', '', '', '', '', '', '', ''),
(4, 'THURSDAY', '', '', '', '', '', 'CSCE811', 'CSCE811', ''),
(5, 'FRIDAY', '', '', '', '', '', 'CSCE721', 'CSCE721', 'CSCE721');

-- --------------------------------------------------------

--
-- Table structure for table `eveniimtechcse_subjects`
--

CREATE TABLE `eveniimtechcse_subjects` (
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
-- Dumping data for table `eveniimtechcse_subjects`
--

INSERT INTO `eveniimtechcse_subjects` (`subjectCode`, `subjectName`, `hoursRequired`, `hoursRequiredDup`, `lab`, `staffName`, `labStaffName`, `stype`) VALUES
('CSCE721', 'PROJECT WORK', 6, 6, 'no', 'PROJECT_GUIDE', NULL, 'hc'),
('CSCE811', 'Big Data Technologies', 4, 4, 'no', 'DR_SUKHVINDER_SINGH', NULL, 'sc');

-- --------------------------------------------------------

--
-- Table structure for table `eveniimtechnis`
--

CREATE TABLE `eveniimtechnis` (
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
-- Dumping data for table `eveniimtechnis`
--

INSERT INTO `eveniimtechnis` (`ORDER`, `DAY`, `9_30`, `10_30`, `11_30`, `12_30`, `1_30`, `2_30`, `3_30`, `4_30`) VALUES
(1, 'MONDAY', '', '', '', '', '', 'CSNS721', 'CSNS721', 'CSNS721'),
(2, 'TUESDAY', '', 'CSNS826', 'CSNS826', '', '', '', '', ''),
(3, 'WEDNESDAY', '', '', '', '', '', 'CSNS721', 'CSNS721', 'CSNS721'),
(4, 'THURSDAY', '', '', 'CSNS826', 'CSNS826', '', '', '', ''),
(5, 'FRIDAY', '', '', '', '', '', '', '', '');

-- --------------------------------------------------------

--
-- Table structure for table `eveniimtechnis_subjects`
--

CREATE TABLE `eveniimtechnis_subjects` (
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
-- Dumping data for table `eveniimtechnis_subjects`
--

INSERT INTO `eveniimtechnis_subjects` (`subjectCode`, `subjectName`, `hoursRequired`, `hoursRequiredDup`, `lab`, `staffName`, `labStaffName`, `stype`) VALUES
('CSNS721', 'PROJECT WORK', 6, 6, 'no', 'PROJECT_SUPERVISOR', NULL, 'hc'),
('CSNS826', 'Intrusion Detection Systems and Firewall', 4, 4, 'no', 'Dr_SKV_JAYAKUMAR', NULL, 'sc');

-- --------------------------------------------------------

--
-- Table structure for table `evenimcab1`
--

CREATE TABLE `evenimcab1` (
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
-- Dumping data for table `evenimcab1`
--

INSERT INTO `evenimcab1` (`ORDER`, `DAY`, `9_30`, `10_30`, `11_30`, `12_30`, `1_30`, `2_30`, `3_30`, `4_30`) VALUES
(1, 'MONDAY', 'CSEL581', 'CSEL581', 'CSEL448', 'CSCA423', '', 'CSCA424', 'CSCA424', 'CSCA424'),
(2, 'TUESDAY', 'CSCA422', 'CSEL581', 'CSCE851', 'CSEL581', '', 'CSCA421', 'CSCA423', ''),
(3, 'WEDNESDAY', 'CSEL448', 'CSCA422', 'CSCA422', 'CSCE851', '', 'CSEL448', 'CSCE851', ''),
(4, 'THURSDAY', 'CSCA421', '', '', 'CSEL448', '', 'CSCA425', 'CSCA425', 'CSCA425'),
(5, 'FRIDAY', 'CSCA423', 'CSCA423', 'CSCA421', 'CSCA421', '', 'CSCE851', 'CSCA422', '');

-- --------------------------------------------------------

--
-- Table structure for table `evenimcab1_subjects`
--

CREATE TABLE `evenimcab1_subjects` (
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
-- Dumping data for table `evenimcab1_subjects`
--

INSERT INTO `evenimcab1_subjects` (`subjectCode`, `subjectName`, `hoursRequired`, `hoursRequiredDup`, `lab`, `staffName`, `labStaffName`, `stype`) VALUES
('CSCA421', 'COMPUTER NETWORK ', 4, 4, 'no', 'DR_R_LAKSHMI', NULL, 'hc'),
('CSCA422', 'OPERATING SYSTEMS', 4, 4, 'no', 'Dr_YAZHINI', NULL, 'hc'),
('CSCA423', 'COMMUNICATION SKILLS', 4, 4, 'no', 'Dr_R_SUNITHA', NULL, 'hc'),
('CSCA424', 'COMPUTER NETWORKS LAB', 3, 3, '1', 'DR_R_LAKSHMI', 'Dr_T_CHITHRALEKHA', 'hc'),
('CSCA425', 'OPERATING SYSTEM LAB', 3, 3, '1', 'Dr_R_SUBRAMANIAN', 'Dr_T_VENGATTARAMAN', 'hc'),
('CSCE851', 'Automata Computability and Complexity', 4, 4, 'no', 'Dr_R_SUNITHA', NULL, 'sc'),
('CSEL448', 'Ethical_Hacking_(Level_3)', 4, 4, 'no', 'Dr_T_CHITHRALEKHA', NULL, 'sc'),
('CSEL581', 'Introduction_to_A.I._and_Expert_Systems_(Level_1)', 4, 4, 'no', 'DR_G_KRISHNAPRIYA', NULL, 'sc');

-- --------------------------------------------------------

--
-- Table structure for table `evenimcab2`
--

CREATE TABLE `evenimcab2` (
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
-- Dumping data for table `evenimcab2`
--

INSERT INTO `evenimcab2` (`ORDER`, `DAY`, `9_30`, `10_30`, `11_30`, `12_30`, `1_30`, `2_30`, `3_30`, `4_30`) VALUES
(1, 'MONDAY', 'CSCA421', 'CSCA422', 'CSEL581', 'CSCE875', '', '', '', ''),
(2, 'TUESDAY', 'CSCA423', 'CSCA423', 'CSCA421', '', 'CSCA422', 'CSCA422', 'CSCE875', ''),
(3, 'WEDNESDAY', '', 'CSCA421', 'CSCA423', '', '', 'CSCA425', 'CSCA425', 'CSCA425'),
(4, 'THURSDAY', 'CSEL581', '', 'CSCA421', 'CSCA423', '', 'CSCA422', 'CSCE875', ''),
(5, 'FRIDAY', 'CSCA424', 'CSCA424', 'CSCA424', 'CSCE875', '', 'CSEL581', 'CSEL581', '');

-- --------------------------------------------------------

--
-- Table structure for table `evenimcab2_subjects`
--

CREATE TABLE `evenimcab2_subjects` (
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
-- Dumping data for table `evenimcab2_subjects`
--

INSERT INTO `evenimcab2_subjects` (`subjectCode`, `subjectName`, `hoursRequired`, `hoursRequiredDup`, `lab`, `staffName`, `labStaffName`, `stype`) VALUES
('CSCA421', 'COMPUTER NETWORKS', 4, 4, 'no', 'DR_R_LAKSHMI', NULL, 'hc'),
('CSCA422', 'OPERATING SYSTEMS', 4, 4, 'no', 'Dr_YAZHINI', NULL, 'hc'),
('CSCA423', 'COMMUNICATION SKILLS', 4, 4, 'no', 'Dr_KS_KUPPUSAMY', NULL, 'hc'),
('CSCA424', 'COMPUTER NETWORKS LAB', 3, 3, '1', 'Dr_S_RAVI', 'Dr_P_SHANTHI_BALA', 'hc'),
('CSCA425', 'OPERATING SYSTEM LAB', 3, 3, '1', 'Dr_K_SURESH_JOSEPH', 'Dr_V_UMA', 'hc'),
('CSCE875', 'Biometric Security', 4, 4, 'no', 'Dr_S_RAVI', NULL, 'sc'),
('CSEL581', 'Introduction_to_A.I._and_Expert_Systems_(Level_1)', 4, 4, 'no', 'Dr_SL_JAYALAKSHMI', NULL, 'sc');

-- --------------------------------------------------------

--
-- Table structure for table `evenimscb1`
--

CREATE TABLE `evenimscb1` (
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
-- Dumping data for table `evenimscb1`
--

INSERT INTO `evenimscb1` (`ORDER`, `DAY`, `9_30`, `10_30`, `11_30`, `12_30`, `1_30`, `2_30`, `3_30`, `4_30`) VALUES
(1, 'MONDAY', 'CSSC421', 'CSSC421', 'CSSC433', 'CSSC433', '', 'CSEL584', 'CSEL584', ''),
(2, 'TUESDAY', 'CSSC433', 'CSSC422', 'CSSC421', 'CSEL585', '', 'CSSC424', 'CSSC424', 'CSSC424'),
(3, 'WEDNESDAY', 'CSSC423', 'CSSC423', 'CSSC423', 'CSSC433', '', 'CSEL585', 'CSEL585', ''),
(4, 'THURSDAY', 'CSSC422', 'CSSC421', 'CSEL535', 'CSEL584', '', 'CSEL585', 'CSEL584', ''),
(5, 'FRIDAY', 'CSEL535', 'CSEL535', 'CSSC422', 'CSSC422', '', '', '', '');

-- --------------------------------------------------------

--
-- Table structure for table `evenimscb1_subjects`
--

CREATE TABLE `evenimscb1_subjects` (
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
-- Dumping data for table `evenimscb1_subjects`
--

INSERT INTO `evenimscb1_subjects` (`subjectCode`, `subjectName`, `hoursRequired`, `hoursRequiredDup`, `lab`, `staffName`, `labStaffName`, `stype`) VALUES
('CSEL535', 'Python Programming', 3, 3, 'no', 'Dr_V_UMA', NULL, 'sc'),
('CSEL584', 'Decision_Support_Systems_(Level_2)', 4, 4, 'no', 'Dr_K_SURESH_JOSEPH', NULL, 'sc'),
('CSEL585', 'Introduction_to_Machine_Learning_(Level_3)', 4, 4, 'no', 'Dr_POTHULA_SUJATHA', NULL, 'sc'),
('CSSC421', 'MODERN OPERATING SYSTEM', 4, 4, 'no', 'Mr_SEENIVASAN_R_P', NULL, 'hc'),
('CSSC422', 'ADVANCED DATABASE SYSTEMS', 4, 4, 'no', 'DR_SUKHVINDER_SINGH', NULL, 'hc'),
('CSSC423', 'OPERATING SYSTEM LAB', 3, 3, '1', 'Mr_SEENIVASAN_R_P', 'Dr_SKV_JAYAKUMAR', 'hc'),
('CSSC424', 'DATABASE SYSTEM LAB', 3, 3, '1', 'Dr_POTHULA_SUJATHA', 'DR_SUKHVINDER_SINGH', 'hc'),
('CSSC433', 'OPTIMIZATION TECHNIQUES', 4, 4, 'no', 'Dr_R_SUBRAMANIAN', NULL, 'hc');

-- --------------------------------------------------------

--
-- Table structure for table `evenimscb2`
--

CREATE TABLE `evenimscb2` (
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
-- Dumping data for table `evenimscb2`
--

INSERT INTO `evenimscb2` (`ORDER`, `DAY`, `9_30`, `10_30`, `11_30`, `12_30`, `1_30`, `2_30`, `3_30`, `4_30`) VALUES
(1, 'MONDAY', 'CSSC422', 'CSSC422', 'CSEL581', '', '', '', 'CSEL581', ''),
(2, 'TUESDAY', 'CSEL548', 'CSEL581', 'CSCE835', 'CSCE835', '', 'CSSC421', 'CSSC433', ''),
(3, 'WEDNESDAY', 'CSCE835', 'CSEL581', 'CSSC422', 'CSSC422', '', 'CSCE835', 'CSSC433', ''),
(4, 'THURSDAY', 'CSSC423', 'CSSC423', 'CSSC423', 'CSSC433', '', 'CSSC421', 'CSSC421', ''),
(5, 'FRIDAY', 'CSSC433', 'CSEL548', 'CSEL548', 'CSSC421', '', 'CSSC424', 'CSSC424', 'CSSC424');

-- --------------------------------------------------------

--
-- Table structure for table `evenimscb2_subjects`
--

CREATE TABLE `evenimscb2_subjects` (
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
-- Dumping data for table `evenimscb2_subjects`
--

INSERT INTO `evenimscb2_subjects` (`subjectCode`, `subjectName`, `hoursRequired`, `hoursRequiredDup`, `lab`, `staffName`, `labStaffName`, `stype`) VALUES
('CSCE835', 'Natural Language Processing', 4, 4, 'no', 'Dr_S_SIVA_SATHYA', NULL, 'sc'),
('CSEL548', 'Internet_of_Things_(IoT)_Tools', 3, 3, 'no', 'Dr_T_VENGATTARAMAN', NULL, 'se'),
('CSEL581', 'Introduction_to_A.I._and_Expert_Systems_(Level_1)', 4, 4, 'no', 'Dr_M_NANDHINI', NULL, 'sc'),
('CSSC421', 'MODERN OPERATING SYSTEM', 4, 4, 'no', 'Mr_SEENIVASAN_R_P', NULL, 'hc'),
('CSSC422', 'ADVANCED DATABASE SYSTEMS', 4, 4, 'no', 'DR_SUKHVINDER_SINGH', NULL, 'hc'),
('CSSC423', 'OPERATING SYSTEMS LAB', 3, 3, '1', 'Dr_R_SUNITHA', 'Dr_M_NANDHINI', 'hc'),
('CSSC424', 'DATABASE SYSTEMS LAB', 3, 3, '1', 'Dr_S_SIVA_SATHYA', 'Dr_KS_KUPPUSAMY', 'hc'),
('CSSC433', 'OPTIMISATION TECHNIQUES', 4, 4, 'no', 'Dr_R_SUBRAMANIAN', NULL, 'hc');

-- --------------------------------------------------------

--
-- Table structure for table `evenimtechcse`
--

CREATE TABLE `evenimtechcse` (
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
-- Dumping data for table `evenimtechcse`
--

INSERT INTO `evenimtechcse` (`ORDER`, `DAY`, `9_30`, `10_30`, `11_30`, `12_30`, `1_30`, `2_30`, `3_30`, `4_30`) VALUES
(1, 'MONDAY', 'CSCE621', 'CSCE623', 'CSCE843', 'CSCE624', '', 'CSCE843', 'CSCE843', ''),
(2, 'TUESDAY', 'CSCE623', 'CSCE621', 'CSCE625', 'CSCE625', '', 'CSCE862', '', ''),
(3, 'WEDNESDAY', 'CSCE624', 'CSCE624', 'CSCE621', 'CSCE623', '', 'CSCE628', 'CSCE628', 'CSCE628'),
(4, 'THURSDAY', 'CSCE625', 'CSCE843', 'CSCE623', 'CSCE621', '', 'CSCE862', 'CSCE862', ''),
(5, 'FRIDAY', 'CSCE627', 'CSCE627', 'CSCE627', 'CSCE862', '', 'CSCE624', 'CSCE625', '');

-- --------------------------------------------------------

--
-- Table structure for table `evenimtechcse_subjects`
--

CREATE TABLE `evenimtechcse_subjects` (
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
-- Dumping data for table `evenimtechcse_subjects`
--

INSERT INTO `evenimtechcse_subjects` (`subjectCode`, `subjectName`, `hoursRequired`, `hoursRequiredDup`, `lab`, `staffName`, `labStaffName`, `stype`) VALUES
('CSCE621', 'GRAPH THEORY WITH APPLICATION TO ENGINEERING', 4, 4, 'no', 'Dr_P_SHANTHI_BALA', NULL, 'hc'),
('CSCE623', 'DATA MINING AND BIG DATA', 4, 4, 'no', 'Dr_POTHULA_SUJATHA', NULL, 'hc'),
('CSCE624', 'MOBILE & PERVASIVE COMPUTING', 4, 4, 'no', 'Dr_T_VENGATTARAMAN', NULL, 'hc'),
('CSCE625', 'ADVANCED OPERATING SYSTEM', 4, 4, 'no', 'Dr_K_SURESH_JOSEPH', NULL, 'hc'),
('CSCE627', 'DATA MINING LAB', 3, 3, '2', 'Dr_POTHULA_SUJATHA', 'Nil', 'hc'),
('CSCE628', 'PERVASIVE COMPUTING LAB', 3, 3, '2', 'Dr_T_VENGATTARAMAN', 'Nil', 'hc'),
('CSCE843', 'Web Accessibility', 4, 4, 'no', 'Dr_KS_KUPPUSAMY', NULL, 'sc'),
('CSCE862', 'Evolutionary Algorithms', 4, 4, 'no', 'Dr_M_SATHYA', NULL, 'sc');

-- --------------------------------------------------------

--
-- Table structure for table `evenimtechnis`
--

CREATE TABLE `evenimtechnis` (
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
-- Dumping data for table `evenimtechnis`
--

INSERT INTO `evenimtechnis` (`ORDER`, `DAY`, `9_30`, `10_30`, `11_30`, `12_30`, `1_30`, `2_30`, `3_30`, `4_30`) VALUES
(1, 'MONDAY', 'CSNS621', 'CSNS623', 'CSNS624', 'CSNS624', '', 'CSNS854', 'CSNS854', ''),
(2, 'TUESDAY', 'CSNS622', 'CSNS622', 'CSNS623', 'CSNS854', '', 'CSNS627', 'CSNS627', 'CSNS627'),
(3, 'WEDNESDAY', 'CSNS623', 'CSNS623', 'CSNS622', 'CSNS625', '', 'CSNS621', 'CSNS854', ''),
(4, 'THURSDAY', 'CSNS624', 'CSNS622', 'CSNS625', 'CSNS625', '', '', '', ''),
(5, 'FRIDAY', 'CSNS625', 'CSNS621', 'CSNS621', 'CSNS624', '', 'CSNS626', 'CSNS626', 'CSNS626');

-- --------------------------------------------------------

--
-- Table structure for table `evenimtechnis_subjects`
--

CREATE TABLE `evenimtechnis_subjects` (
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
-- Dumping data for table `evenimtechnis_subjects`
--

INSERT INTO `evenimtechnis_subjects` (`subjectCode`, `subjectName`, `hoursRequired`, `hoursRequiredDup`, `lab`, `staffName`, `labStaffName`, `stype`) VALUES
('CSNS621', 'RESOURCE MANAGEMENT TECHNIQUES', 4, 4, 'no', 'Dr_M_NANDHINI', NULL, 'hc'),
('CSNS622', 'NETWORK SECURITY', 4, 4, 'no', 'Dr_T_CHITHRALEKHA', NULL, 'hc'),
('CSNS623', 'DISTRIBUTED SYSTEM AND SECURITY', 4, 4, 'no', 'Dr_S_RAVI', NULL, 'hc'),
('CSNS624', 'NETWORK PROTOCOLS ', 4, 4, 'no', 'Dr_SKV_JAYAKUMAR', NULL, 'hc'),
('CSNS625', 'WIRELESS COMMUNICATION', 4, 4, 'no', 'Dr_S_SIVA_SATHYA', NULL, 'hc'),
('CSNS626', 'NETWORK SECURITY LAB', 3, 3, '2', 'Dr_T_CHITHRALEKHA', 'Nil', 'hc'),
('CSNS627', 'NETWORK PROTOCOL LAB', 3, 3, '2', 'Dr_SKV_JAYAKUMAR', 'Nil', 'hc'),
('CSNS854', 'Ad Hoc Mobile Networks', 4, 4, 'no', 'Dr_T_SIVAKUMAR', NULL, 'sc');

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
(1, 'Dr_M_SATHYA', NULL, 'hc', 'CS1SE02E1 - PROGRAMMING FOR MOBILE DEVICES', 'no'),
(2, 'Dr_M_SATHYA', 'Nil', 'hc', 'CS1SE02E1L - PRG FOR MOBILE DEVICE LAB', '2'),
(3, 'Dr_M_SATHYA', NULL, 'hc', 'CS2MI02 - MICROCONTROLLER PROGRAMMING-THEORY', 'no'),
(4, 'Dr_M_SATHYA', 'Nil', 'hc', 'CS2MI02L - MICROCONTROLLER PROGRAMMING LAB', '2'),
(5, 'Dr_V_UMA', NULL, 'hc', 'CS2MJ02 - PROBLEM SOLVING & PROGRAMMING FUNDAMENTALS', 'no'),
(6, 'Dr_V_UMA', 'Nil', 'hc', 'CS2MJ02L - PROBLEM SOLVING & PROGRAMMING FUNDAMENTALS-LAB', '2'),
(7, 'Dr_YAZHINI', NULL, 'hc', 'CS2VA04 - DIGITAL TECHNOLOGIES', 'no'),
(8, 'Dr_T_SIVAKUMAR', NULL, 'hc', 'CSIG361 - JAVA PROGRAMMING ', 'no'),
(9, 'Dr_SL_JAYALAKSHMI', NULL, 'hc', 'CSIG362 - WEB TECHNOLOGY', 'no'),
(10, 'Dr_SL_JAYALAKSHMI', 'Nil', 'hc', 'CSIG363 - WEB TECHNOLOGY LAB', '3'),
(11, 'Dr_T_SIVAKUMAR', NULL, 'hc', 'CSIG364 - MINI PROJECT', 'no'),
(15, 'Dr_P_SHANTHI_BALA', NULL, 'hc', 'CSIG241 - OPERATING SYSTEM AND SYSTEM SOFTWARE', 'no'),
(16, 'DR_G_KRISHNAPRIYA', NULL, 'hc', 'CSIG242 - INTRODUCTION TO DATABASE CONCEPTS', 'no'),
(17, 'DR_G_KRISHNAPRIYA', 'Dr_SL_JAYALAKSHMI', 'hc', 'CSIG243 - DBMS LAB', '3'),
(18, 'PROJECT_GUIDE', NULL, 'hc', 'CSCE721 - PROJECT WORK', 'no'),
(19, 'DR_SUKHVINDER_SINGH', NULL, 'sc', 'CSCE811 - Big Data Technologies', 'no'),
(21, 'PROJECT_SUPERVISOR', NULL, 'hc', 'CSNS721 - PROJECT WORK', 'no'),
(22, 'Dr_SKV_JAYAKUMAR', NULL, 'sc', 'CSNS826 - Intrusion Detection Systems and Firewall', 'no'),
(24, 'DR_R_LAKSHMI', NULL, 'hc', 'CSCA421 - COMPUTER NETWORK ', 'no'),
(25, 'Dr_YAZHINI', NULL, 'hc', 'CSCA422 - OPERATING SYSTEMS', 'no'),
(26, 'Dr_R_SUNITHA', NULL, 'hc', 'CSCA423 - COMMUNICATION SKILLS', 'no'),
(27, 'DR_R_LAKSHMI', 'Dr_T_CHITHRALEKHA', 'hc', 'CSCA424 - COMPUTER NETWORKS LAB', '1'),
(28, 'Dr_R_SUBRAMANIAN', 'Dr_T_VENGATTARAMAN', 'hc', 'CSCA425 - OPERATING SYSTEM LAB', '1'),
(29, 'Dr_R_SUNITHA', NULL, 'sc', 'CSCE851 - Automata Computability and Complexity', 'no'),
(30, 'Dr_T_CHITHRALEKHA', NULL, 'sc', 'CSEL448 - Ethical_Hacking_(Level_3)', 'no'),
(31, 'DR_G_KRISHNAPRIYA', NULL, 'sc', 'CSEL581 - Introduction_to_A.I._and_Expert_Systems_(Level_1)', 'no'),
(39, 'DR_R_LAKSHMI', NULL, 'hc', 'CSCA421 - COMPUTER NETWORKS', 'no'),
(40, 'Dr_YAZHINI', NULL, 'hc', 'CSCA422 - OPERATING SYSTEMS', 'no'),
(41, 'Dr_KS_KUPPUSAMY', NULL, 'hc', 'CSCA423 - COMMUNICATION SKILLS', 'no'),
(42, 'Dr_S_RAVI', 'Dr_P_SHANTHI_BALA', 'hc', 'CSCA424 - COMPUTER NETWORKS LAB', '1'),
(43, 'Dr_K_SURESH_JOSEPH', 'Dr_V_UMA', 'hc', 'CSCA425 - OPERATING SYSTEM LAB', '1'),
(44, 'Dr_S_RAVI', NULL, 'sc', 'CSCE875 - Biometric Security', 'no'),
(45, 'Dr_SL_JAYALAKSHMI', NULL, 'sc', 'CSEL581 - Introduction_to_A.I._and_Expert_Systems_(Level_1)', 'no'),
(46, 'Dr_V_UMA', NULL, 'sc', 'CSEL535 - Python Programming', 'no'),
(47, 'Dr_K_SURESH_JOSEPH', NULL, 'sc', 'CSEL584 - Decision_Support_Systems_(Level_2)', 'no'),
(48, 'Dr_POTHULA_SUJATHA', NULL, 'sc', 'CSEL585 - Introduction_to_Machine_Learning_(Level_3)', 'no'),
(49, 'Mr_SEENIVASAN_R_P', NULL, 'hc', 'CSSC421 - MODERN OPERATING SYSTEM', 'no'),
(50, 'DR_SUKHVINDER_SINGH', NULL, 'hc', 'CSSC422 - ADVANCED DATABASE SYSTEMS', 'no'),
(51, 'Mr_SEENIVASAN_R_P', 'Dr_SKV_JAYAKUMAR', 'hc', 'CSSC423 - OPERATING SYSTEM LAB', '1'),
(52, 'Dr_POTHULA_SUJATHA', 'DR_SUKHVINDER_SINGH', 'hc', 'CSSC424 - DATABASE SYSTEM LAB', '1'),
(53, 'Dr_R_SUBRAMANIAN', NULL, 'hc', 'CSSC433 - OPTIMIZATION TECHNIQUES', 'no'),
(61, 'Dr_S_SIVA_SATHYA', NULL, 'sc', 'CSCE835 - Natural Language Processing', 'no'),
(62, 'Dr_T_VENGATTARAMAN', NULL, 'se', 'CSEL548 - Internet_of_Things_(IoT)_Tools', 'no'),
(63, 'Dr_M_NANDHINI', NULL, 'sc', 'CSEL581 - Introduction_to_A.I._and_Expert_Systems_(Level_1)', 'no'),
(64, 'Mr_SEENIVASAN_R_P', NULL, 'hc', 'CSSC421 - MODERN OPERATING SYSTEM', 'no'),
(65, 'DR_SUKHVINDER_SINGH', NULL, 'hc', 'CSSC422 - ADVANCED DATABASE SYSTEMS', 'no'),
(66, 'Dr_R_SUNITHA', 'Dr_M_NANDHINI', 'hc', 'CSSC423 - OPERATING SYSTEMS LAB', '1'),
(67, 'Dr_S_SIVA_SATHYA', 'Dr_KS_KUPPUSAMY', 'hc', 'CSSC424 - DATABASE SYSTEMS LAB', '1'),
(68, 'Dr_R_SUBRAMANIAN', NULL, 'hc', 'CSSC433 - OPTIMISATION TECHNIQUES', 'no'),
(76, 'Dr_P_SHANTHI_BALA', NULL, 'hc', 'CSCE621 - GRAPH THEORY WITH APPLICATION TO ENGINEERING', 'no'),
(77, 'Dr_POTHULA_SUJATHA', NULL, 'hc', 'CSCE623 - DATA MINING AND BIG DATA', 'no'),
(78, 'Dr_T_VENGATTARAMAN', NULL, 'hc', 'CSCE624 - MOBILE & PERVASIVE COMPUTING', 'no'),
(79, 'Dr_K_SURESH_JOSEPH', NULL, 'hc', 'CSCE625 - ADVANCED OPERATING SYSTEM', 'no'),
(80, 'Dr_POTHULA_SUJATHA', 'Nil', 'hc', 'CSCE627 - DATA MINING LAB', '2'),
(81, 'Dr_T_VENGATTARAMAN', 'Nil', 'hc', 'CSCE628 - PERVASIVE COMPUTING LAB', '2'),
(82, 'Dr_KS_KUPPUSAMY', NULL, 'sc', 'CSCE843 - Web Accessibility', 'no'),
(83, 'Dr_M_SATHYA', NULL, 'sc', 'CSCE862 - Evolutionary Algorithms', 'no'),
(91, 'Dr_M_NANDHINI', NULL, 'hc', 'CSNS621 - RESOURCE MANAGEMENT TECHNIQUES', 'no'),
(92, 'Dr_T_CHITHRALEKHA', NULL, 'hc', 'CSNS622 - NETWORK SECURITY', 'no'),
(93, 'Dr_S_RAVI', NULL, 'hc', 'CSNS623 - DISTRIBUTED SYSTEM AND SECURITY', 'no'),
(94, 'Dr_SKV_JAYAKUMAR', NULL, 'hc', 'CSNS624 - NETWORK PROTOCOLS ', 'no'),
(95, 'Dr_S_SIVA_SATHYA', NULL, 'hc', 'CSNS625 - WIRELESS COMMUNICATION', 'no'),
(96, 'Dr_T_CHITHRALEKHA', 'Nil', 'hc', 'CSNS626 - NETWORK SECURITY LAB', '2'),
(97, 'Dr_SKV_JAYAKUMAR', 'Nil', 'hc', 'CSNS627 - NETWORK PROTOCOL LAB', '2'),
(98, 'Dr_T_SIVAKUMAR', NULL, 'sc', 'CSNS854 - Ad Hoc Mobile Networks', 'no');

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
(20, 'DR_R_LAKSHMI'),
(21, 'PROJECT_GUIDE'),
(22, 'PROJECT_SUPERVISOR'),
(23, 'Dr_YAZHINI');

-- --------------------------------------------------------

--
-- Table structure for table `work_flow`
--

CREATE TABLE `work_flow` (
  `serialNo` int(11) NOT NULL,
  `facultyName` varchar(255) DEFAULT NULL,
  `stype` varchar(255) DEFAULT NULL,
  `theory` varchar(255) DEFAULT NULL,
  `hours` int(11) DEFAULT NULL,
  `lab` varchar(10) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `work_flow`
--

INSERT INTO `work_flow` (`serialNo`, `facultyName`, `stype`, `theory`, `hours`, `lab`) VALUES
(1, 'Dr_M_SATHYA', 'hc', 'CS1SE02E1 - PROGRAMMING FOR MOBILE DEVICES', 2, 'no'),
(2, 'Dr_M_SATHYA', 'hc', 'CS1SE02E1L - PRG FOR MOBILE DEVICE LAB', 2, '2'),
(3, 'Dr_M_SATHYA', 'hc', 'CS2MI02 - MICROCONTROLLER PROGRAMMING-THEORY', 3, 'no'),
(4, 'Dr_M_SATHYA', 'hc', 'CS2MI02L - MICROCONTROLLER PROGRAMMING LAB', 2, '2'),
(5, 'Dr_V_UMA', 'hc', 'CS2MJ02 - PROBLEM SOLVING & PROGRAMMING FUNDAMENTALS', 3, 'no'),
(6, 'Dr_V_UMA', 'hc', 'CS2MJ02L - PROBLEM SOLVING & PROGRAMMING FUNDAMENTALS-LAB', 2, '2'),
(7, 'Dr_YAZHINI', 'hc', 'CS2VA04 - DIGITAL TECHNOLOGIES', 3, 'no'),
(8, 'Dr_T_SIVAKUMAR', 'hc', 'CSIG361 - JAVA PROGRAMMING ', 4, 'no'),
(9, 'Dr_SL_JAYALAKSHMI', 'hc', 'CSIG362 - WEB TECHNOLOGY', 4, 'no'),
(10, 'Dr_SL_JAYALAKSHMI', 'hc', 'CSIG363 - WEB TECHNOLOGY LAB', 3, '3'),
(11, 'Dr_T_SIVAKUMAR', 'hc', 'CSIG364 - MINI PROJECT', 4, 'no'),
(15, 'Dr_P_SHANTHI_BALA', 'hc', 'CSIG241 - OPERATING SYSTEM AND SYSTEM SOFTWARE', 4, 'no'),
(16, 'DR_G_KRISHNAPRIYA', 'hc', 'CSIG242 - INTRODUCTION TO DATABASE CONCEPTS', 4, 'no'),
(17, 'DR_G_KRISHNAPRIYA', 'hc', 'CSIG243 - DBMS LAB', 3, '3'),
(18, 'Dr_SL_JAYALAKSHMI', 'hc', 'CSIG243 - DBMS LAB', 3, '3'),
(19, 'PROJECT_GUIDE', 'hc', 'CSCE721 - PROJECT WORK', 6, 'no'),
(20, 'DR_SUKHVINDER_SINGH', 'sc', 'CSCE811 - Big Data Technologies', 4, 'no'),
(22, 'PROJECT_SUPERVISOR', 'hc', 'CSNS721 - PROJECT WORK', 6, 'no'),
(23, 'Dr_SKV_JAYAKUMAR', 'sc', 'CSNS826 - Intrusion Detection Systems and Firewall', 4, 'no'),
(25, 'DR_R_LAKSHMI', 'hc', 'CSCA421 - COMPUTER NETWORK ', 4, 'no'),
(26, 'Dr_YAZHINI', 'hc', 'CSCA422 - OPERATING SYSTEMS', 4, 'no'),
(27, 'Dr_R_SUNITHA', 'hc', 'CSCA423 - COMMUNICATION SKILLS', 4, 'no'),
(28, 'DR_R_LAKSHMI', 'hc', 'CSCA424 - COMPUTER NETWORKS LAB', 3, '1'),
(29, 'Dr_R_SUBRAMANIAN', 'hc', 'CSCA425 - OPERATING SYSTEM LAB', 3, '1'),
(30, 'Dr_R_SUNITHA', 'sc', 'CSCE851 - Automata Computability and Complexity', 4, 'no'),
(31, 'Dr_T_CHITHRALEKHA', 'sc', 'CSEL448 - Ethical_Hacking_(Level_3)', 4, 'no'),
(32, 'DR_G_KRISHNAPRIYA', 'sc', 'CSEL581 - Introduction_to_A.I._and_Expert_Systems_(Level_1)', 4, 'no'),
(40, 'Dr_T_CHITHRALEKHA', 'hc', 'CSCA424 - COMPUTER NETWORKS LAB', 3, '1'),
(41, 'Dr_T_VENGATTARAMAN', 'hc', 'CSCA425 - OPERATING SYSTEM LAB', 3, '1'),
(43, 'DR_R_LAKSHMI', 'hc', 'CSCA421 - COMPUTER NETWORKS', 4, 'no'),
(44, 'Dr_YAZHINI', 'hc', 'CSCA422 - OPERATING SYSTEMS', 4, 'no'),
(45, 'Dr_KS_KUPPUSAMY', 'hc', 'CSCA423 - COMMUNICATION SKILLS', 4, 'no'),
(46, 'Dr_S_RAVI', 'hc', 'CSCA424 - COMPUTER NETWORKS LAB', 3, '1'),
(47, 'Dr_K_SURESH_JOSEPH', 'hc', 'CSCA425 - OPERATING SYSTEM LAB', 3, '1'),
(48, 'Dr_S_RAVI', 'sc', 'CSCE875 - Biometric Security', 4, 'no'),
(49, 'Dr_SL_JAYALAKSHMI', 'sc', 'CSEL581 - Introduction_to_A.I._and_Expert_Systems_(Level_1)', 4, 'no'),
(50, 'Dr_P_SHANTHI_BALA', 'hc', 'CSCA424 - COMPUTER NETWORKS LAB', 3, '1'),
(51, 'Dr_V_UMA', 'hc', 'CSCA425 - OPERATING SYSTEM LAB', 3, '1'),
(53, 'Dr_V_UMA', 'sc', 'CSEL535 - Python Programming', 3, 'no'),
(54, 'Dr_K_SURESH_JOSEPH', 'sc', 'CSEL584 - Decision_Support_Systems_(Level_2)', 4, 'no'),
(55, 'Dr_POTHULA_SUJATHA', 'sc', 'CSEL585 - Introduction_to_Machine_Learning_(Level_3)', 4, 'no'),
(56, 'Mr_SEENIVASAN_R_P', 'hc', 'CSSC421 - MODERN OPERATING SYSTEM', 4, 'no'),
(57, 'DR_SUKHVINDER_SINGH', 'hc', 'CSSC422 - ADVANCED DATABASE SYSTEMS', 4, 'no'),
(58, 'Mr_SEENIVASAN_R_P', 'hc', 'CSSC423 - OPERATING SYSTEM LAB', 3, '1'),
(59, 'Dr_POTHULA_SUJATHA', 'hc', 'CSSC424 - DATABASE SYSTEM LAB', 3, '1'),
(60, 'Dr_R_SUBRAMANIAN', 'hc', 'CSSC433 - OPTIMIZATION TECHNIQUES', 4, 'no'),
(68, 'Dr_SKV_JAYAKUMAR', 'hc', 'CSSC423 - OPERATING SYSTEM LAB', 3, '1'),
(69, 'DR_SUKHVINDER_SINGH', 'hc', 'CSSC424 - DATABASE SYSTEM LAB', 3, '1'),
(71, 'Dr_S_SIVA_SATHYA', 'sc', 'CSCE835 - Natural Language Processing', 4, 'no'),
(72, 'Dr_T_VENGATTARAMAN', 'se', 'CSEL548 - Internet_of_Things_(IoT)_Tools', 3, 'no'),
(73, 'Dr_M_NANDHINI', 'sc', 'CSEL581 - Introduction_to_A.I._and_Expert_Systems_(Level_1)', 4, 'no'),
(74, 'Mr_SEENIVASAN_R_P', 'hc', 'CSSC421 - MODERN OPERATING SYSTEM', 4, 'no'),
(75, 'DR_SUKHVINDER_SINGH', 'hc', 'CSSC422 - ADVANCED DATABASE SYSTEMS', 4, 'no'),
(76, 'Dr_R_SUNITHA', 'hc', 'CSSC423 - OPERATING SYSTEMS LAB', 3, '1'),
(77, 'Dr_S_SIVA_SATHYA', 'hc', 'CSSC424 - DATABASE SYSTEMS LAB', 3, '1'),
(78, 'Dr_R_SUBRAMANIAN', 'hc', 'CSSC433 - OPTIMISATION TECHNIQUES', 4, 'no'),
(86, 'Dr_M_NANDHINI', 'hc', 'CSSC423 - OPERATING SYSTEMS LAB', 3, '1'),
(87, 'Dr_KS_KUPPUSAMY', 'hc', 'CSSC424 - DATABASE SYSTEMS LAB', 3, '1'),
(89, 'Dr_P_SHANTHI_BALA', 'hc', 'CSCE621 - GRAPH THEORY WITH APPLICATION TO ENGINEERING', 4, 'no'),
(90, 'Dr_POTHULA_SUJATHA', 'hc', 'CSCE623 - DATA MINING AND BIG DATA', 4, 'no'),
(91, 'Dr_T_VENGATTARAMAN', 'hc', 'CSCE624 - MOBILE & PERVASIVE COMPUTING', 4, 'no'),
(92, 'Dr_K_SURESH_JOSEPH', 'hc', 'CSCE625 - ADVANCED OPERATING SYSTEM', 4, 'no'),
(93, 'Dr_POTHULA_SUJATHA', 'hc', 'CSCE627 - DATA MINING LAB', 3, '2'),
(94, 'Dr_T_VENGATTARAMAN', 'hc', 'CSCE628 - PERVASIVE COMPUTING LAB', 3, '2'),
(95, 'Dr_KS_KUPPUSAMY', 'sc', 'CSCE843 - Web Accessibility', 4, 'no'),
(96, 'Dr_M_SATHYA', 'sc', 'CSCE862 - Evolutionary Algorithms', 4, 'no'),
(104, 'Dr_M_NANDHINI', 'hc', 'CSNS621 - RESOURCE MANAGEMENT TECHNIQUES', 4, 'no'),
(105, 'Dr_T_CHITHRALEKHA', 'hc', 'CSNS622 - NETWORK SECURITY', 4, 'no'),
(106, 'Dr_S_RAVI', 'hc', 'CSNS623 - DISTRIBUTED SYSTEM AND SECURITY', 4, 'no'),
(107, 'Dr_SKV_JAYAKUMAR', 'hc', 'CSNS624 - NETWORK PROTOCOLS ', 4, 'no'),
(108, 'Dr_S_SIVA_SATHYA', 'hc', 'CSNS625 - WIRELESS COMMUNICATION', 4, 'no'),
(109, 'Dr_T_CHITHRALEKHA', 'hc', 'CSNS626 - NETWORK SECURITY LAB', 3, '2'),
(110, 'Dr_SKV_JAYAKUMAR', 'hc', 'CSNS627 - NETWORK PROTOCOL LAB', 3, '2'),
(111, 'Dr_T_SIVAKUMAR', 'sc', 'CSNS854 - Ad Hoc Mobile Networks', 4, 'no');

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
-- Indexes for table `evenibsc`
--
ALTER TABLE `evenibsc`
  ADD PRIMARY KEY (`ORDER`);

--
-- Indexes for table `evenibsc_subjects`
--
ALTER TABLE `evenibsc_subjects`
  ADD PRIMARY KEY (`subjectCode`);

--
-- Indexes for table `eveniiimscint`
--
ALTER TABLE `eveniiimscint`
  ADD PRIMARY KEY (`ORDER`);

--
-- Indexes for table `eveniiimscint_subjects`
--
ALTER TABLE `eveniiimscint_subjects`
  ADD PRIMARY KEY (`subjectCode`);

--
-- Indexes for table `eveniimscint`
--
ALTER TABLE `eveniimscint`
  ADD PRIMARY KEY (`ORDER`);

--
-- Indexes for table `eveniimscint_subjects`
--
ALTER TABLE `eveniimscint_subjects`
  ADD PRIMARY KEY (`subjectCode`);

--
-- Indexes for table `eveniimtechcse`
--
ALTER TABLE `eveniimtechcse`
  ADD PRIMARY KEY (`ORDER`);

--
-- Indexes for table `eveniimtechcse_subjects`
--
ALTER TABLE `eveniimtechcse_subjects`
  ADD PRIMARY KEY (`subjectCode`);

--
-- Indexes for table `eveniimtechnis`
--
ALTER TABLE `eveniimtechnis`
  ADD PRIMARY KEY (`ORDER`);

--
-- Indexes for table `eveniimtechnis_subjects`
--
ALTER TABLE `eveniimtechnis_subjects`
  ADD PRIMARY KEY (`subjectCode`);

--
-- Indexes for table `evenimcab1`
--
ALTER TABLE `evenimcab1`
  ADD PRIMARY KEY (`ORDER`);

--
-- Indexes for table `evenimcab1_subjects`
--
ALTER TABLE `evenimcab1_subjects`
  ADD PRIMARY KEY (`subjectCode`);

--
-- Indexes for table `evenimcab2`
--
ALTER TABLE `evenimcab2`
  ADD PRIMARY KEY (`ORDER`);

--
-- Indexes for table `evenimcab2_subjects`
--
ALTER TABLE `evenimcab2_subjects`
  ADD PRIMARY KEY (`subjectCode`);

--
-- Indexes for table `evenimscb1`
--
ALTER TABLE `evenimscb1`
  ADD PRIMARY KEY (`ORDER`);

--
-- Indexes for table `evenimscb1_subjects`
--
ALTER TABLE `evenimscb1_subjects`
  ADD PRIMARY KEY (`subjectCode`);

--
-- Indexes for table `evenimscb2`
--
ALTER TABLE `evenimscb2`
  ADD PRIMARY KEY (`ORDER`);

--
-- Indexes for table `evenimscb2_subjects`
--
ALTER TABLE `evenimscb2_subjects`
  ADD PRIMARY KEY (`subjectCode`);

--
-- Indexes for table `evenimtechcse`
--
ALTER TABLE `evenimtechcse`
  ADD PRIMARY KEY (`ORDER`);

--
-- Indexes for table `evenimtechcse_subjects`
--
ALTER TABLE `evenimtechcse_subjects`
  ADD PRIMARY KEY (`subjectCode`);

--
-- Indexes for table `evenimtechnis`
--
ALTER TABLE `evenimtechnis`
  ADD PRIMARY KEY (`ORDER`);

--
-- Indexes for table `evenimtechnis_subjects`
--
ALTER TABLE `evenimtechnis_subjects`
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
-- Indexes for table `work_flow`
--
ALTER TABLE `work_flow`
  ADD PRIMARY KEY (`serialNo`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `merged_table`
--
ALTER TABLE `merged_table`
  MODIFY `serialNo` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=106;

--
-- AUTO_INCREMENT for table `staff`
--
ALTER TABLE `staff`
  MODIFY `REGNO` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT for table `work_flow`
--
ALTER TABLE `work_flow`
  MODIFY `serialNo` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=112;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
