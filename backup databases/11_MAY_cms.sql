-- phpMyAdmin SQL Dump
-- version 4.1.14
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: May 11, 2015 at 02:06 PM
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
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=65 ;

--
-- Dumping data for table `course_info`
--

INSERT INTO `course_info` (`id`, `chap_no`, `unit_no`, `text`, `est_hrs`, `is_heading`, `sub_code`) VALUES
(1, 1, 0, 'Introduction', 8, 1, '13MCA41'),
(2, 1, 1, 'Overview of the subject, Notion of Algorithm', 8, 0, '13MCA41'),
(3, 1, 2, 'Fundamentals of Algorithmic Problem Solving', 6, 0, '13MCA41'),
(4, 1, 3, 'Important Problem Types', 4, 0, '13MCA41'),
(5, 1, 4, 'Fundamental Data Structures', 1, 0, '13MCA41'),
(6, 1, 5, 'Analysis Framework', 1, 0, '13MCA41'),
(7, 1, 6, 'Asymptotic Notations and Basic Efficiency', 1, 0, '13MCA41'),
(8, 1, 7, 'Mathematical Analysis of Non-Recursive', 2, 0, '13MCA41'),
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
(28, 4, 5, 'Algorithms for Generating Combinatorial Objects', 2, 0, '13MCA41'),
(30, 1, 1, 'unit11', 2, 0, '13MCA56'),
(31, 1, 2, 'unit12', 2, 0, '13MCA56'),
(32, 1, 3, 'unit13', 2, 0, '13MCA56'),
(33, 1, 0, 'chapter1', 6, 1, '13MCA56'),
(34, 2, 1, 'unit21', 3, 0, '13MCA56'),
(35, 2, 2, 'unit22', 2, 0, '13MCA56'),
(36, 2, 3, 'unit23', 3, 0, '13MCA56'),
(37, 2, 4, 'unit24', 4, 0, '13MCA56'),
(38, 2, 0, 'chapter2', 12, 1, '13MCA56'),
(39, 3, 1, 'unit31', 1, 0, '13MCA56'),
(40, 3, 2, 'unit32', 2, 0, '13MCA56'),
(41, 3, 3, 'unit33', 4, 0, '13MCA56'),
(42, 3, 0, 'chapter3', 7, 1, '13MCA56'),
(43, 1, 1, 'u1', 2, 0, '11MCA11'),
(44, 1, 2, 'u2', 3, 0, '11MCA11'),
(45, 1, 3, 'u4', 4, 0, '11MCA11'),
(46, 1, 4, 'u5', 2, 0, '11MCA11'),
(47, 1, 0, 'Chap1', 11, 1, '11MCA11'),
(48, 2, 1, 'u12', 2, 0, '11MCA11'),
(49, 2, 2, 'u14', 2, 0, '11MCA11'),
(50, 2, 3, 'u13', 1, 0, '11MCA11'),
(51, 2, 0, 'chap2', 5, 1, '11MCA11'),
(52, 3, 1, 'asd', 3, 0, '11MCA11'),
(53, 3, 2, 'asd', 4, 0, '11MCA11'),
(54, 3, 0, 'chap3', 7, 1, '11MCA11'),
(55, 4, 1, 'asd', 3, 0, '11MCA11'),
(56, 4, 2, 'sdf', 3, 0, '11MCA11'),
(57, 4, 0, 'asd', 6, 1, '11MCA11'),
(58, 1, 1, 'asd', 4, 0, '11MCA12'),
(59, 1, 2, 'gse', 1, 0, '11MCA12'),
(60, 1, 0, 'asdasd', 5, 1, '11MCA12'),
(61, 2, 1, 'asd', 3, 0, '11MCA12'),
(62, 2, 2, 'asde', 3, 0, '11MCA12'),
(63, 2, 3, 'sdf', 2, 0, '11MCA12'),
(64, 2, 0, '44ad', 8, 1, '11MCA12');

-- --------------------------------------------------------

--
-- Table structure for table `faculty`
--

CREATE TABLE IF NOT EXISTS `faculty` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `uname` varchar(30) NOT NULL,
  `pword` varchar(18) NOT NULL,
  `name` varchar(30) NOT NULL,
  `isAdmin` int(2) DEFAULT '0',
  `email` varchar(50) DEFAULT 'yourmail@example.com',
  `address` varchar(200) DEFAULT 'Your Adress',
  `phone_no` varchar(15) DEFAULT '000-0000-000',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=6 ;

--
-- Dumping data for table `faculty`
--

INSERT INTO `faculty` (`id`, `uname`, `pword`, `name`, `isAdmin`, `email`, `address`, `phone_no`) VALUES
(1, '13MCA', '13MCA', 'joshua', 0, 'yourmail@example.com', 'Your Adress', '000-0000-000'),
(2, 'admin', 'admin', 'administrator', 1, 'yourmail@example.com', 'Your Adress', '000-0000-000'),
(3, '11MCA', '11MCA', 'James', 0, 'asdasd@asda.com', '#f2,asdasd\r\nasdasd\r\nasdasd\r\nljlkjlasdlkajsd\r\nasdasd', '9986660169'),
(4, 'abhi', 'lol', 'Abhi', 0, 'yourmail@example.com', 'Your Adress', '000-0000-000'),
(5, '1MCA11', '1MCA11', 'sem1', 0, 'asd@asd.com', 'kashdkjh3kjashdkhkj3kjkajsdkjnkn3kjna\r\nasdasdkj\r\nasdjhasd\r\n', '9986660168');

-- --------------------------------------------------------

--
-- Table structure for table `notification`
--

CREATE TABLE IF NOT EXISTS `notification` (
  `id` int(5) NOT NULL AUTO_INCREMENT,
  `heading` varchar(40) NOT NULL,
  `content` varchar(500) NOT NULL,
  `date` date NOT NULL,
  `subject_code` varchar(15) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Dumping data for table `notification`
--

INSERT INTO `notification` (`id`, `heading`, `content`, `date`, `subject_code`) VALUES
(1, 'Assignment T1', 'Deadline 10th May', '2015-04-26', '13MCA41'),
(2, 'T1 Portion ', 'Test from this to that', '2015-04-27', '13MCA56'),
(3, 'Assignment 1', 'asdasd', '2015-04-28', '13MCA41');

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
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=34 ;

--
-- Dumping data for table `progress`
--

INSERT INTO `progress` (`id`, `completed_hrs`, `is_complete`, `subject_code`, `section`, `course_id`) VALUES
(1, 1, 0, '13MCA41', 'A', 1),
(2, 8, 0, '13MCA41', 'A', 2),
(3, 1, 0, '13MCA41', 'B', 1),
(8, 8, 0, '13MCA41', 'B', 2),
(9, 4, 0, '13MCA41', 'B', 3),
(10, 4, 0, '13MCA41', 'B', 4),
(11, 2, 0, '13MCA41', 'B', 7),
(12, 2, 0, '13MCA41', 'B', 9),
(13, 1, 0, '13MCA41', 'B', 11),
(14, 1, 0, '13MCA41', 'B', 5),
(15, 6, 0, '13MCA41', 'A', 3),
(16, 1, 0, '13MCA41', 'A', 4),
(17, 1, 0, '13MCA41', 'A', 7),
(18, 1, 0, '11MCA11', 'A', 48),
(19, 2, 0, '11MCA11', 'A', 46),
(20, 1, 0, '11MCA11', 'A', 52),
(21, 1, 0, '11MCA12', 'B', 63),
(22, 1, 0, '11MCA12', 'B', 58),
(23, 1, 0, '11MCA12', 'B', 61),
(24, 2, 0, '13MCA41', 'A', 5),
(25, 1, 0, '13MCA41', 'A', 6),
(26, 2, 0, '13MCA41', 'B', 6),
(27, 2, 0, '13MCA56', 'A', 30),
(28, 1, 0, '13MCA56', 'A', 31),
(29, 1, 0, '13MCA56', 'A', 32),
(30, 4, 0, '13MCA56', 'A', 37),
(31, 3, 0, '13MCA41', 'B', 8),
(32, 1, 0, '13MCA41', 'B', 12),
(33, 2, 0, '13MCA41', 'A', 8);

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
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=14 ;

--
-- Dumping data for table `subject`
--

INSERT INTO `subject` (`id`, `subject_code`, `section`, `subject_name`, `faculty_id`, `semester`) VALUES
(1, '12MCA42', 'A', 'Java Programming', 1, 4),
(2, '12MCA42', 'B', 'Java Programming', 1, 4),
(3, '13MCA43', 'A', 'J2EE', 1, 4),
(4, '13MCA43', 'B', 'J2EE', 1, 4),
(5, '13MCA41', 'A', 'Analysis and Design of Algorithms', 3, 4),
(6, '13MCA41', 'B', 'Analysis and Design of Algorithms', 3, 4),
(11, '13MCA56', 'A', 'AJP', 3, 4),
(12, '11MCA11', 'A', 'web', 5, 1),
(13, '11MCA12', 'B', 'C programming', 5, 1);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
