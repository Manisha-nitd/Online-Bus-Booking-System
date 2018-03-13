-- phpMyAdmin SQL Dump
-- version 4.0.4
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Jun 16, 2017 at 11:43 AM
-- Server version: 5.6.12-log
-- PHP Version: 5.4.16

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `citylink_db`
--
CREATE DATABASE IF NOT EXISTS `citylink_db` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci;
USE `citylink_db`;

-- --------------------------------------------------------

--
-- Table structure for table `booking`
--

CREATE TABLE IF NOT EXISTS `booking` (
  `bookid` int(8) NOT NULL,
  `uid` int(8) NOT NULL,
  `bid` int(8) NOT NULL,
  `bname` varchar(12) NOT NULL,
  `noofper` int(3) NOT NULL,
  `seatno` varchar(20) NOT NULL,
  `dateofbook` date NOT NULL,
  `dateofjour` date NOT NULL,
  `ratebybus` decimal(10,0) NOT NULL,
  PRIMARY KEY (`bookid`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `bus`
--

CREATE TABLE IF NOT EXISTS `bus` (
  `bid` int(8) NOT NULL,
  `bname` varchar(20) NOT NULL,
  `from` varchar(30) NOT NULL,
  `to` varchar(30) NOT NULL,
  `nos` int(2) NOT NULL,
  `ac` varchar(3) NOT NULL,
  `days` varchar(25) NOT NULL,
  `time` varchar(20) NOT NULL,
  PRIMARY KEY (`bid`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `bus`
--

INSERT INTO `bus` (`bid`, `bname`, `from`, `to`, `nos`, `ac`, `days`, `time`) VALUES
(1, 'SKYLINER', 'KOLKATA', 'MUMBAI', 35, 'AC', 'FRI', '09:00PM'),
(2, 'SKYLINER', 'MUMBAI', 'KOLKATA', 35, 'AC', 'SAT', '07:00PM'),
(3, 'EXPRESSWAY', 'KOLKATA', 'MUMBAI', 40, 'AC', 'SUN', '07:00PM'),
(4, 'EXPRESSWAY', 'MUMBAI', 'KOLKATA', 40, 'AC', 'MON', '07:00AM');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE IF NOT EXISTS `user` (
  `cid` int(5) NOT NULL,
  `name` varchar(20) NOT NULL,
  `gender` varchar(5) NOT NULL,
  `dob` date NOT NULL,
  `contactno` varchar(10) DEFAULT NULL,
  `emailid` varchar(25) NOT NULL,
  `password` varchar(25) NOT NULL,
  `username` varchar(25) NOT NULL,
  `city` varchar(25) NOT NULL,
  PRIMARY KEY (`cid`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
