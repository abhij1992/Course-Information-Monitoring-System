-- phpMyAdmin SQL Dump
-- version 4.1.14
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Apr 23, 2015 at 04:31 PM
-- Server version: 5.6.17
-- PHP Version: 5.5.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `cms`
--

-- --------------------------------------------------------

--
-- Table structure for table `course_info`
--

CREATE TABLE IF NOT EXISTS `course_info` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `chap_no` int(2) NOT NULL,
  `unit_no` int(2) NOT NULL,
  `text` varchar(256) NOT NULL,
  `est_hrs` int(3) NOT NULL,
  `is_heading` int(1) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `faculty`
--

CREATE TABLE IF NOT EXISTS `faculty` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `uname` varchar(30) NOT NULL,
  `pword` varchar(18) NOT NULL,
  `name` varchar(30) NOT NULL,
  `isAdmin` int(2) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Dumping data for table `faculty`
--

INSERT INTO `faculty` (`id`, `uname`, `pword`, `name`, `isAdmin`) VALUES
(1, '13MCA', '13MCA', 'joshua', 0),
(2, 'admin', 'admin', 'administrator', 1),
(3, '11MCA', '11MCA', 'James', 0);

-- --------------------------------------------------------

--
-- Table structure for table `notification`
--

CREATE TABLE IF NOT EXISTS `notification` (
  `id` int(5) NOT NULL AUTO_INCREMENT,
  `heading` varchar(40) NOT NULL,
  `content` varchar(500) NOT NULL,
  `date` date NOT NULL,
  `subject_code` int(5) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `progress`
--

CREATE TABLE IF NOT EXISTS `progress` (
  `id` int(5) NOT NULL AUTO_INCREMENT,
  `completed_hrs` int(3) NOT NULL,
  `is_complete` int(3) NOT NULL,
  `subject_code` varchar(20) DEFAULT NULL,
  `section` varchar(3) DEFAULT NULL,
  `course_id` int(5) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=23 ;

-- --------------------------------------------------------

--
-- Table structure for table `subject`
--

CREATE TABLE IF NOT EXISTS `subject` (
  `id` int(5) NOT NULL AUTO_INCREMENT,
  `subject_code` varchar(15) NOT NULL,
  `section` varchar(4) NOT NULL,
  `subject_name` varchar(40) NOT NULL,
  `faculty_id` int(5) NOT NULL,
  `semester` int(3) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=7 ;

--
-- Dumping data for table `subject`
--

INSERT INTO `subject` (`id`, `subject_code`, `section`, `subject_name`, `faculty_id`, `semester`) VALUES
(1, '12MCA42', 'A', 'Java Programming', 1, NULL),
(2, '12MCA42', 'B', 'Java Programming', 1, NULL),
(3, '13MCA43', 'A', 'J2EE', 1, NULL),
(4, '13MCA43', 'B', 'J2EE', 1, NULL),
(5, '13MCA41', 'A', 'Analysis and Design of Algorithms', 3, NULL),
(6, '13MCA41', 'B', 'Analysis and Design of Algorithms', 3, NULL);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
