-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Feb 07, 2024 at 07:50 AM
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
)  ;

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
)  ;

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
  `subjectCode` varchar(15)   NOT NULL,
  `subjectName` varchar(255) DEFAULT NULL,
  `hoursRequired` int DEFAULT NULL,
  `hoursRequiredDup` int DEFAULT NULL,
  `lab` varchar(10) DEFAULT NULL,
  `staffName` varchar(255) DEFAULT NULL,
  `labStaffName` varchar(255) DEFAULT NULL,
  `stype` varchar(10) DEFAULT NULL
)  ;

--
-- Dumping data for table `evenbsc_subjects`
--

INSERT INTO `evenbsc_subjects` (`subjectCode`, `subjectName`, `hoursRequired`, `hoursRequiredDup`, `lab`, `staffName`, `labStaffName`, `stype`) VALUES
('CS2MI02', 'MICROCONTROLLER PROGRAMMING-THEORY', 4, 4, 'no', NULL, NULL, 'hc'),
('CS2MI02L', 'MICROCONTROLLER PROGRAMMING-LAB', 3, 3, '2', NULL, NULL, 'hc'),
('CS2MJ02', 'PROBLEM SOLVING & PROGRAMMING FUNDAMENTALS', 4, 4, 'no', NULL, NULL, 'hc');

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
)  ;

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
)  ;

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
  `hoursRequired` int DEFAULT NULL,
  `hoursRequiredDup` int DEFAULT NULL,
  `lab` varchar(10) DEFAULT NULL,
  `staffName` varchar(255) DEFAULT NULL,
  `labStaffName` varchar(255) DEFAULT NULL,
  `stype` varchar(10) DEFAULT NULL
)  ;

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
  `hoursRequired` int DEFAULT NULL,
  `hoursRequiredDup` int DEFAULT NULL,
  `lab` varchar(10) DEFAULT NULL,
  `staffName` varchar(255) DEFAULT NULL,
  `labStaffName` varchar(255) DEFAULT NULL,
  `stype` varchar(10) DEFAULT NULL
)  ;

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
)  ;

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
)  ;

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
  `hoursRequired` int DEFAULT NULL,
  `hoursRequiredDup` int DEFAULT NULL,
  `lab` varchar(10) DEFAULT NULL,
  `staffName` varchar(255) DEFAULT NULL,
  `labStaffName` varchar(255) DEFAULT NULL,
  `stype` varchar(10) DEFAULT NULL
)  ;

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
  `hoursRequired` int DEFAULT NULL,
  `hoursRequiredDup` int DEFAULT NULL,
  `lab` varchar(10) DEFAULT NULL,
  `staffName` varchar(255) DEFAULT NULL,
  `labStaffName` varchar(255) DEFAULT NULL,
  `stype` varchar(10) DEFAULT NULL
)  ;

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
)  ;

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
  `subjectCode` varchar(15)   NOT NULL,
  `subjectName` varchar(255) DEFAULT NULL,
  `hoursRequired` int DEFAULT NULL,
  `hoursRequiredDup` int DEFAULT NULL,
  `lab` varchar(10) DEFAULT NULL,
  `staffName` varchar(255) DEFAULT NULL,
  `labStaffName` varchar(255) DEFAULT NULL,
  `stype` varchar(10) DEFAULT NULL
)  ;

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
)  ;

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
  `subjectCode` varchar(15)   NOT NULL,
  `subjectName` varchar(255) DEFAULT NULL,
  `hoursRequired` int DEFAULT NULL,
  `hoursRequiredDup` int DEFAULT NULL,
  `lab` varchar(10) DEFAULT NULL,
  `staffName` varchar(255) DEFAULT NULL,
  `labStaffName` varchar(255) DEFAULT NULL,
  `stype` varchar(10) DEFAULT NULL
)  ;

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
)  ;

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
  `subjectCode` varchar(15)   NOT NULL,
  `subjectName` varchar(255) DEFAULT NULL,
  `hoursRequired` int DEFAULT NULL,
  `hoursRequiredDup` int DEFAULT NULL,
  `lab` varchar(10) DEFAULT NULL,
  `staffName` varchar(255) DEFAULT NULL,
  `labStaffName` varchar(255) DEFAULT NULL,
  `stype` varchar(10) DEFAULT NULL
)  ;

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
)  ;

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
  `hoursRequired` int DEFAULT NULL,
  `hoursRequiredDup` int DEFAULT NULL,
  `lab` varchar(10) DEFAULT NULL,
  `staffName` varchar(255) DEFAULT NULL,
  `labStaffName` varchar(255) DEFAULT NULL,
  `stype` varchar(10) DEFAULT NULL
)  ;

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
)  ;

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
  `subjectCode` varchar(15)   NOT NULL,
  `subjectName` varchar(255) DEFAULT NULL,
  `hoursRequired` int DEFAULT NULL,
  `hoursRequiredDup` int DEFAULT NULL,
  `lab` varchar(10) DEFAULT NULL,
  `staffName` varchar(255) DEFAULT NULL,
  `labStaffName` varchar(255) DEFAULT NULL,
  `stype` varchar(10) DEFAULT NULL
)  ;

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
)  ;

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
  `hoursRequired` int DEFAULT NULL,
  `hoursRequiredDup` int DEFAULT NULL,
  `lab` varchar(10) DEFAULT NULL,
  `staffName` varchar(255) DEFAULT NULL,
  `labStaffName` varchar(255) DEFAULT NULL,
  `stype` varchar(10) DEFAULT NULL
)  ;

--
-- Dumping data for table `evenmtechnis2_subjects`
--

INSERT INTO `evenmtechnis2_subjects` (`subjectCode`, `subjectName`, `hoursRequired`, `hoursRequiredDup`, `lab`, `staffName`, `labStaffName`, `stype`) VALUES
('CSNS721', 'PROJECT WORK', 6, 6, 'no', 'PROJECT_SUPERVISOR', NULL, 'hc'),
('CSNS811', 'Cloud Computing Architecture', 4, 4, 'no', 'Dr_SKV_JAYAKUMAR', NULL, 'sc');

-- --------------------------------------------------------

--
-- Table structure for table `merged_table`
--

CREATE TABLE `merged_table` (
  `serialNo` int NOT NULL,
  `facultyName` varchar(255) DEFAULT NULL,
  `stype` varchar(255) DEFAULT NULL,
  `theory` varchar(255) DEFAULT NULL
)  ;

--
-- Dumping data for table `merged_table`
--

INSERT INTO `merged_table` (`serialNo`, `facultyName`, `stype`, `theory`) VALUES
(1, NULL, 'hc', 'CS2MI02 - MICROCONTROLLER PROGRAMMING-THEORY'),
(2, NULL, 'hc', 'CS2MI02L - MICROCONTROLLER PROGRAMMING-LAB'),
(3, NULL, 'hc', 'CS2MJ02 - PROBLEM SOLVING & PROGRAMMING FUNDAMENTALS'),
(4, NULL, 'hc', 'CS2MI02 - MICROCONTROLLER PROGRAMMING-THEORY'),
(5, NULL, 'hc', 'CS2MI02L - MICROCONTROLLER PROGRAMMING-LAB'),
(6, NULL, 'hc', 'CS2MJ02 - PROBLEM SOLVING & PROGRAMMING FUNDAMENTALS'),
(7, NULL, 'hc', 'CSCA421 - COMPUTER NETWORK'),
(8, NULL, 'hc', 'CSCA422 - OPERTATING SYSTEMS'),
(9, NULL, 'hc', 'CSCA423 - COMMUNICATION SKILLS'),
(10, NULL, 'hc', 'CSCA424 - COMPUTER NETWORKS LAB'),
(11, NULL, 'hc', 'CSCA425 - OPERATING SYSTEM LAB'),
(12, NULL, 'sc', 'CSCE834 - Artificial Intelligence for Automation'),
(14, NULL, 'hc', 'CSCA421 - COMPUTER NETWORK'),
(15, NULL, 'hc', 'CSCA422 - OPERTATING SYSTEMS'),
(16, NULL, 'hc', 'CSCA423 - COMMUNICATION SKILLS'),
(17, NULL, 'hc', 'CSCA424 - COMPUTER NETWORKS LAB'),
(18, NULL, 'hc', 'CSCA425 - OPERATING SYSTEM LAB'),
(19, NULL, 'sc', 'CSCE834 - Artificial Intelligence for Automation'),
(21, NULL, 'sc', 'CSCE834 - Artificial Intelligence for Automation'),
(22, NULL, 'sc', 'CSNS843 - Embedded Systems'),
(23, NULL, 'hc', 'CSSC421 - MODERN OPERATING SYSTEMS'),
(24, NULL, 'hc', 'CSSC422 - ADVANCED DATABASE SYSTEMS'),
(25, NULL, 'hc', 'CSSC423 - PRATICAL III-OPERATING SYSTEM LAB'),
(26, NULL, 'hc', 'CSSC424 - PRATICAL IV-DATABASE SYSTEM LAB'),
(27, NULL, 'hc', 'CSSC433 - OPTIMIZATION TECHNIQUES (SUPPORTIVE CORE-III)'),
(28, NULL, 'sc', 'CSCE834 - Artificial Intelligence for Automation'),
(29, NULL, 'sc', 'CSNS843 - Embedded Systems'),
(30, NULL, 'hc', 'CSSC421 - MODERN OPERATING SYSTEMS'),
(31, NULL, 'hc', 'CSSC422 - ADVANCED DATABASE SYSTEMS'),
(32, NULL, 'hc', 'CSSC423 - PRATICAL III-OPERATING SYSTEM LAB'),
(33, NULL, 'hc', 'CSSC424 - PRATICAL IV-DATABASE SYSTEM LAB'),
(34, NULL, 'hc', 'CSSC433 - OPTIMIZATION TECHNIQUES (SUPPORTIVE CORE-III)'),
(35, 'Dr_P_SHANTHI_BALA', 'hc', 'CSIG241 - OPERATING SYSTEM AND SYSTEM SOFTWARE'),
(36, 'DR_G_KRISHNAPRIYA', 'hc', 'CSIG242 - INTRODUCTION TO DATABASE CONCEPTS'),
(37, 'DR_G_KRISHNAPRIYA', 'hc', 'CSIG243 - DBMS LAB'),
(38, NULL, 'hc', 'CSIG241 - OPERATING SYSTEM AND SYSTEM SOFTWARE'),
(39, NULL, 'hc', 'CSIG242 - INTRODUCTION TO DATABASE CONCEPTS'),
(40, 'Dr_SL_JAYALAKSHMI', 'hc', 'CSIG243 - DBMS LAB'),
(41, 'Dr_T_SIVAKUMAR', 'hc', 'CSIG361 - JAVA PROGRAMMING'),
(42, 'Dr_SL_JAYALAKSHMI', 'hc', 'CSIG362 - WEB TECHNOLOGY'),
(43, 'Dr_SL_JAYALAKSHMI', 'hc', 'CSIG363 - WEB TECHNOLOGY LAB'),
(44, 'Dr_T_SIVAKUMAR', 'hc', 'CSIG364 - MINI PROJECT'),
(48, NULL, 'hc', 'CSIG361 - JAVA PROGRAMMING'),
(49, NULL, 'hc', 'CSIG362 - WEB TECHNOLOGY'),
(50, 'Nil', 'hc', 'CSIG363 - WEB TECHNOLOGY LAB'),
(51, NULL, 'hc', 'CSIG364 - MINI PROJECT'),
(55, 'Dr_P_SHANTHI_BALA', 'hc', 'CSCE621 - GRAPH THEORY WITH APPLICATION TO ENGINEERING'),
(56, 'Dr_POTHULA_SUJATHA', 'hc', 'CSCE623 - DATA MINING AND BIG DATA'),
(57, 'Dr_T_VENGATTARAMAN', 'hc', 'CSCE624 - MOBILE & PERVASICE COMPUTING'),
(58, 'Dr_K_SURESH_JOSEPH', 'hc', 'CSCE625 - ADVANCED OPERATING SYSTEM'),
(59, 'Dr_POTHULA_SUJATHA', 'hc', 'CSCE627 - DATA MINING LAB'),
(60, 'Dr_T_VENGATTARAMAN', 'hc', 'CSCE628 - PERVASIVE COMPUTING LAB'),
(61, 'Dr_KS_KUPPUSAMY', 'sc', 'CSCE843 - Web Accessibility'),
(62, 'Dr_M_SATHYA', 'sc', 'CSCE862 - Evolutionary Algorithms'),
(70, NULL, 'hc', 'CSCE621 - GRAPH THEORY WITH APPLICATION TO ENGINEERING'),
(71, NULL, 'hc', 'CSCE623 - DATA MINING AND BIG DATA'),
(72, NULL, 'hc', 'CSCE624 - MOBILE & PERVASICE COMPUTING'),
(73, NULL, 'hc', 'CSCE625 - ADVANCED OPERATING SYSTEM'),
(74, 'Nil', 'hc', 'CSCE627 - DATA MINING LAB'),
(75, 'Nil', 'hc', 'CSCE628 - PERVASIVE COMPUTING LAB'),
(76, NULL, 'sc', 'CSCE843 - Web Accessibility'),
(77, NULL, 'sc', 'CSCE862 - Evolutionary Algorithms'),
(85, 'PROJECT_GUIDE', 'hc', 'CSCE721 - PROJECT WORK'),
(86, 'DR_SUKHVINDER_SINGH', 'sc', 'CSCE811 - Big Data Technologies'),
(88, NULL, 'hc', 'CSCE721 - PROJECT WORK'),
(89, NULL, 'sc', 'CSCE811 - Big Data Technologies'),
(91, 'Dr_M_NANDHINI', 'hc', 'CSNS621 - RESOURCE MANAGEMENT TECHNIQUES'),
(92, 'Dr_T_CHITHRALEKHA', 'hc', 'CSNS622 - NETWORK SECURITY'),
(93, 'Dr_S_RAVI', 'hc', 'CSNS623 - DISTRIBUTED SYSTEMS AND SECURITY'),
(94, 'Dr_SKV_JAYAKUMAR', 'hc', 'CSNS624 - NETWORK PROTOCOLS'),
(95, 'Dr_S_SIVA_SATHYA', 'hc', 'CSNS625 - WIRELESS COMMUNICATION NETWORKS'),
(96, 'Dr_T_CHITHRALEKHA', 'hc', 'CSNS626 - NETWORK SECURITY LAB'),
(97, 'Dr_SKV_JAYAKUMAR', 'hc', 'CSNS627 - NETWORK PROTOCOL LAB'),
(98, 'Dr_T_SIVAKUMAR', 'sc', 'CSNS854 - Ad Hoc Mobile Networks'),
(106, NULL, 'hc', 'CSNS621 - RESOURCE MANAGEMENT TECHNIQUES'),
(107, NULL, 'hc', 'CSNS622 - NETWORK SECURITY'),
(108, NULL, 'hc', 'CSNS623 - DISTRIBUTED SYSTEMS AND SECURITY'),
(109, NULL, 'hc', 'CSNS624 - NETWORK PROTOCOLS'),
(110, NULL, 'hc', 'CSNS625 - WIRELESS COMMUNICATION NETWORKS'),
(111, 'Nil', 'hc', 'CSNS626 - NETWORK SECURITY LAB'),
(112, 'Nil', 'hc', 'CSNS627 - NETWORK PROTOCOL LAB'),
(113, NULL, 'sc', 'CSNS854 - Ad Hoc Mobile Networks'),
(121, 'PROJECT_SUPERVISOR', 'hc', 'CSNS721 - PROJECT WORK'),
(122, 'Dr_SKV_JAYAKUMAR', 'sc', 'CSNS811 - Cloud Computing Architecture'),
(124, NULL, 'hc', 'CSNS721 - PROJECT WORK'),
(125, NULL, 'sc', 'CSNS811 - Cloud Computing Architecture');

-- --------------------------------------------------------

--
-- Table structure for table `setb`
--

CREATE TABLE `setb` (
  `subjectCode` varchar(15)   NOT NULL,
  `subjectName` varchar(255) DEFAULT NULL,
  `hoursRequired` int DEFAULT NULL,
  `lab` varchar(10) DEFAULT NULL
)  ;

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
  `subjectCode` varchar(15)   NOT NULL,
  `subjectName` varchar(255) DEFAULT NULL,
  `hoursRequired` int DEFAULT NULL,
  `lab` varchar(10) DEFAULT NULL
)  ;

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
  `REGNO` int NOT NULL,
  `NAME` varchar(50) DEFAULT NULL
)  ;

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
  MODIFY `serialNo` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=127;

--
-- AUTO_INCREMENT for table `staff`
--
ALTER TABLE `staff`
  MODIFY `REGNO` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
