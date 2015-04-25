-- phpMyAdmin SQL Dump
-- version 4.1.14
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Apr 25, 2015 at 08:18 AM
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
  `sub_code` varchar(20) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=29 ;

--
-- Dumping data for table `course_info`
--

INSERT INTO `course_info` (`id`, `chap_no`, `unit_no`, `text`, `est_hrs`, `is_heading`, `sub_code`) VALUES
(1, 1, 0, 'Introduction', 8, 1, '13MCA41'),
(2, 1, 1, 'Overview of the subject, Notion of Algorithm', 1, 0, '13MCA41'),
(3, 1, 2, 'Fundamentals of Algorithmic Problem Solving', 1, 0, '13MCA41'),
(4, 1, 3, 'Important Problem Types', 1, 0, '13MCA41'),
(5, 1, 4, 'Fundamental Data Structures', 1, 0, '13MCA41'),
(6, 1, 5, 'Analysis Framework', 1, 0, '13MCA41'),
(7, 1, 6, 'Asymptotic Notations and Basic Efficiency', 1, 0, '13MCA41'),
(8, 1, 7, 'Mathematical Analysis of Non-Recursive', 1, 0, '13MCA41'),
(9, 1, 8, 'Mathematical Analysis of Recursive Algorithms', 1, 0, '13MCA41'),
(10, 2, 0, 'Brute Force', 5, 1, '13MCA41'),
(11, 2, 1, 'Selection Sort', 1, 0, '13MCA41'),
(12, 2, 2, 'Bubble sort', 1, 0, '13MCA41'),
(13, 2, 3, 'Sequential Search', 1, 0, '13MCA41'),
(14, 2, 4, 'String Matching', 2, 0, '13MCA41'),
(16, 3, 0, 'Divide and Conquer', 6, 1, '13MCA41'),
(17, 3, 1, 'Mergesort', 1, 0, '13MCA41'),
(18, 3, 2, 'Quicksort', 1, 0, '13MCA41'),
(19, 3, 3, 'Binary Search', 1, 0, '13MCA41'),
(20, 3, 4, 'Binary Tree Traversals and Related Properties', 2, 0, '13MCA41'),
(21, 3, 5, 'Multiplication of Large Integers', 1, 0, '13MCA41'),
(22, 3, 6, 'Stressen’s Matrix Multiplication', 1, 0, '13MCA41'),
(23, 4, 0, 'Decrease and Conquer', 5, 1, '13MCA41'),
(24, 4, 1, 'Insertion sort', 1, 0, '13MCA41'),
(25, 4, 2, 'Depth First Search', 1, 0, '13MCA41'),
(26, 4, 3, 'Breadth First Search', 1, 0, '13MCA41'),
(27, 4, 4, 'Topological Sorting', 1, 0, '13MCA41'),
(28, 4, 5, 'Algorithms for Generating Combinatorial Objects', 2, 0, '13MCA41');

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
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Dumping data for table `notification`
--

INSERT INTO `notification` (`id`, `heading`, `content`, `date`, `subject_code`) VALUES
(1, 'Test portion for T1', 'asdqwe\r\nasd\r\nasd\r\nqw\r\nasd\r\nzx\r\ncasd\r\n', '2015-04-24', 13),
(2, 'Assignment 1', '1)What is the Library Skills Workbook?\r\n2)What are "discipline-specific versions" of the Library Skills Workbook?\r\n3)Who has to do the Workbook?\r\n4)Will I receive academic credit for completing the Workbook?\r\n5)Do I need to complete the Workbook by a specific date?\r\n6)Can the Workbook be completed at any time, night or day?\r\n7)Can the Workbook be accessed off campus?\r\n8)How long will it take me to complete the Workbook?\r\n9)Can I print out a copy of the questions?\r\n10)What do I need to do to pass', '2015-04-25', 13);

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
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=14 ;

--
-- Dumping data for table `progress`
--

INSERT INTO `progress` (`id`, `completed_hrs`, `is_complete`, `subject_code`, `section`, `course_id`) VALUES
(1, 1, 0, '13MCA41', 'A', 1),
(2, 1, 0, '13MCA41', 'A', 2),
(3, 1, 0, '13MCA41', 'B', 1),
(8, 2, 0, '13MCA41', 'B', 2),
(9, 3, 0, '13MCA41', 'B', 3),
(10, 1, 0, '13MCA41', 'B', 4),
(11, 2, 0, '13MCA41', 'B', 7),
(12, 2, 0, '13MCA41', 'B', 9),
(13, 1, 0, '13MCA41', 'B', 11);

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
(1, '12MCA42', 'A', 'Java Programming', 1, 4),
(2, '12MCA42', 'B', 'Java Programming', 1, 4),
(3, '13MCA43', 'A', 'J2EE', 1, 4),
(4, '13MCA43', 'B', 'J2EE', 1, 4),
(5, '13MCA41', 'A', 'Analysis and Design of Algorithms', 3, 4),
(6, '13MCA41', 'B', 'Analysis and Design of Algorithms', 3, 4);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
