-- phpMyAdmin SQL Dump
-- version 4.1.14
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: May 27, 2015 at 05:32 PM
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
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=114 ;

--
-- Dumping data for table `course_info`
--

INSERT INTO `course_info` (`id`, `chap_no`, `unit_no`, `text`, `est_hrs`, `is_heading`, `sub_code`) VALUES
(1, 1, 1, 'Introduction', 2, 0, '13MCA11'),
(2, 1, 2, 'What is C?', 2, 0, '13MCA11'),
(3, 1, 3, 'Stucture of a C program', 1, 0, '13MCA11'),
(4, 1, 4, 'Comments and Reviews', 1, 0, '13MCA11'),
(5, 1, 0, 'Introduction to C', 6, 1, '13MCA11'),
(6, 2, 1, 'Numerics variables', 2, 0, '13MCA11'),
(7, 2, 2, 'Character Variables', 2, 0, '13MCA11'),
(8, 2, 3, 'how to stores a String?', 1, 0, '13MCA11'),
(9, 2, 4, 'Arrays', 3, 0, '13MCA11'),
(10, 2, 0, 'Data Types', 8, 1, '13MCA11'),
(11, 3, 1, 'Why Functions?', 1, 0, '13MCA11'),
(12, 3, 2, 'Modular Programming', 1, 0, '13MCA11'),
(13, 3, 3, 'Functions calls', 2, 0, '13MCA11'),
(14, 3, 4, 'Return types', 1, 0, '13MCA11'),
(15, 3, 5, 'Arguments and its types', 2, 0, '13MCA11'),
(16, 3, 6, 'Local Variables', 1, 0, '13MCA11'),
(17, 3, 0, 'Functions', 8, 1, '13MCA11'),
(18, 4, 1, 'Why are structures?', 2, 0, '13MCA11'),
(19, 4, 2, 'How to define a Structure', 1, 0, '13MCA11'),
(20, 4, 3, 'Unions', 2, 0, '13MCA11'),
(21, 4, 4, 'Difference between Unions and Structures', 2, 0, '13MCA11'),
(22, 4, 0, 'Stuctures and Unions', 7, 1, '13MCA11'),
(23, 5, 1, 'Pointer Notations', 2, 0, '13MCA11'),
(24, 5, 2, 'Pointers to send array to a function', 2, 0, '13MCA11'),
(25, 5, 3, 'Pointer arthmetic', 1, 0, '13MCA11'),
(26, 5, 4, 'Advantages of Pointers', 2, 0, '13MCA11'),
(27, 5, 0, 'Pointers', 7, 1, '13MCA11'),
(28, 1, 1, 'What is Information?', 2, 0, '11MCA41'),
(29, 1, 2, 'Why information is important?', 1, 0, '11MCA41'),
(30, 1, 3, 'Search Engines', 3, 0, '11MCA41'),
(31, 1, 4, 'Search Engineers', 3, 0, '11MCA41'),
(32, 1, 0, 'Introduction', 9, 1, '11MCA41'),
(33, 2, 1, 'Architecture', 2, 0, '11MCA41'),
(34, 2, 2, 'Basic Building Blocks', 3, 0, '11MCA41'),
(35, 2, 3, 'Text Acquisition', 3, 0, '11MCA41'),
(36, 2, 4, 'Text Transformation', 4, 0, '11MCA41'),
(37, 2, 5, 'User Interaction', 3, 0, '11MCA41'),
(38, 2, 0, 'Architecture of a Search Engine', 15, 1, '11MCA41'),
(39, 3, 1, 'Deciding what to search', 2, 0, '11MCA41'),
(40, 3, 2, 'Crawling the Web', 1, 0, '11MCA41'),
(41, 3, 3, 'Directory Crawling', 2, 0, '11MCA41'),
(42, 3, 4, 'Detectign Duplicates', 1, 0, '11MCA41'),
(43, 3, 0, 'Crawls and Feeds', 6, 1, '11MCA41'),
(44, 4, 1, 'Text Statistics', 2, 0, '11MCA41'),
(45, 4, 2, 'Document parsing', 2, 0, '11MCA41'),
(46, 4, 3, 'Document structure', 1, 0, '11MCA41'),
(47, 4, 4, 'Information extraction', 1, 0, '11MCA41'),
(48, 4, 0, 'Processign Text', 6, 1, '11MCA41'),
(49, 5, 1, 'Abstract model of ranking', 2, 0, '11MCA41'),
(50, 5, 2, 'Inverted Indexes', 2, 0, '11MCA41'),
(51, 5, 3, 'Compression', 1, 0, '11MCA41'),
(52, 5, 4, 'Entropy', 2, 0, '11MCA41'),
(53, 5, 0, 'Ranking with Indexes', 7, 1, '11MCA41'),
(54, 1, 1, 'Java programming fundamentals and Data types', 3, 0, '11MCA21'),
(55, 1, 2, 'Key attributes of OOP', 2, 0, '11MCA21'),
(56, 1, 3, 'Type conversion,functions,variables', 2, 0, '11MCA21'),
(57, 1, 0, 'Fundamentals', 7, 1, '11MCA21'),
(58, 2, 1, 'Input from keyboard and if,else if,else', 3, 0, '11MCA21'),
(59, 2, 2, 'Switch statement ,for,while,do while', 3, 0, '11MCA21'),
(60, 2, 3, 'Enhanced Loops,break,continues,reference variables', 2, 0, '11MCA21'),
(61, 2, 4, 'Methods,returns from methods ,returning values', 1, 0, '11MCA21'),
(62, 2, 0, 'Program Control Statements', 8, 1, '11MCA21'),
(63, 3, 1, 'Arrays,multi-dimensional arrays', 2, 0, '11MCA21'),
(64, 3, 2, 'Array references and for-each style', 2, 0, '11MCA21'),
(65, 3, 3, 'string fundamentals,constructors,length method', 1, 0, '11MCA21'),
(66, 3, 4, 'string buffer and builder', 3, 0, '11MCA21'),
(67, 3, 0, 'Data types and string handling', 8, 1, '11MCA21'),
(68, 4, 1, 'Access specifiers,pass objects,arguments', 2, 0, '11MCA21'),
(69, 4, 2, 'Objects,method overloading', 1, 0, '11MCA21'),
(70, 4, 3, 'overloading constructors,static,nested class', 2, 0, '11MCA21'),
(71, 4, 4, 'when are constructors executed,tpes of cons.', 3, 0, '11MCA21'),
(72, 4, 0, 'A closer looks at methods and classes', 8, 1, '11MCA21'),
(73, 5, 1, 'Interfaces', 3, 0, '11MCA21'),
(74, 5, 2, 'packages', 3, 0, '11MCA21'),
(75, 5, 0, 'Interfaces and packages', 6, 1, '11MCA21'),
(76, 1, 1, 'Introduction to OOPs', 3, 0, '11MCA21'),
(77, 1, 2, 'Directives', 2, 0, '11MCA21'),
(78, 1, 3, 'Classes', 3, 0, '11MCA21'),
(79, 1, 0, 'Introductions to C++', 8, 1, '11MCA21'),
(80, 2, 1, 'Class,methods', 3, 0, '11MCA21'),
(81, 2, 2, 'Overloading,overriding', 3, 0, '11MCA21'),
(82, 2, 3, 'Casting,typecast', 2, 0, '11MCA21'),
(83, 2, 0, 'Classes and methods', 7, 1, '11MCA21'),
(84, 3, 1, 'Passing objects as arguments', 3, 0, '11MCA21'),
(85, 3, 2, 'Dynamic objects', 2, 0, '11MCA21'),
(86, 3, 3, 'Pointers to objects', 3, 0, '11MCA21'),
(87, 3, 0, 'Objects', 8, 1, '11MCA21'),
(88, 4, 1, 'Base class,inheritance', 3, 0, '11MCA21'),
(89, 4, 2, 'inheritance of multiple base class,destructors', 2, 0, '11MCA21'),
(90, 4, 3, 'Operator overloading', 3, 0, '11MCA21'),
(91, 4, 0, 'Inheritance', 8, 1, '11MCA21'),
(92, 5, 1, 'Virtual base class', 3, 0, '11MCA21'),
(93, 5, 2, 'Virtual attribute is inherited', 2, 0, '11MCA21'),
(94, 5, 3, 'Early and late binding', 3, 0, '11MCA21'),
(95, 5, 0, 'Virtual functions', 8, 1, '11MCA21'),
(96, 1, 1, 'Simulation tools and appropirate problems', 2, 0, '13MCA51'),
(97, 1, 2, 'System environments', 2, 0, '13MCA51'),
(98, 1, 3, 'Types of Models', 3, 0, '13MCA51'),
(99, 1, 0, 'Introduction', 7, 1, '13MCA51'),
(100, 2, 1, 'Terminology and concepts', 3, 0, '13MCA51'),
(101, 2, 2, 'Random variable,probabilty distribition', 3, 0, '13MCA51'),
(102, 2, 0, 'Statistical Models in simulation', 6, 1, '13MCA51'),
(103, 3, 1, 'Properties of random numbers', 2, 0, '13MCA51'),
(104, 3, 2, 'Generate pseudo random numbers', 3, 0, '13MCA51'),
(105, 3, 3, 'Techniques for generating random numbers', 2, 0, '13MCA51'),
(106, 3, 0, 'Random number generation', 7, 1, '13MCA51'),
(107, 4, 1, 'Characteristics of queuing systems', 3, 0, '13MCA51'),
(108, 4, 2, 'Inventory system', 3, 0, '13MCA51'),
(109, 4, 0, 'Queing Models', 6, 1, '13MCA51'),
(110, 5, 1, 'Data collection', 2, 0, '13MCA51'),
(111, 5, 2, 'Goodness of fit tests', 3, 0, '13MCA51'),
(112, 5, 3, 'Chi-squaretest,k-Stest', 4, 0, '13MCA51'),
(113, 5, 0, 'Input Modelling', 9, 1, '13MCA51');

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
(1, 'admin', 'admin', 'Administrator', 1, 'yourmail@example.com', 'Your Adress', '000-0000-000'),
(2, '11EMP11', '11EMP11', 'Lolika padmanbhan', 0, 'mymail@example.com', 'Bengaluru', '9738276311'),
(3, '12EMP12', '12EMP12', 'Suresh', 0, 'yourmail@example.com', 'Your Adress', '000-0000-000'),
(4, '13EMP13', '13EMP13', 'Prakash', 0, 'yourmail@example.com', 'Your Adress', '000-0000-000'),
(5, '14EMP14', '14EMP14', 'Premalatha C', 0, 'yourmail@example.com', 'Your Adress', '000-0000-000');

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
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=8 ;

--
-- Dumping data for table `notification`
--

INSERT INTO `notification` (`id`, `heading`, `content`, `date`, `subject_code`) VALUES
(1, 'Assignment 1', 'Deadline 30th May', '2015-05-27', '13MCA11'),
(3, 'Test Tomorrow', 'Class test tomorrow', '2015-05-27', '13MCA11'),
(4, 'T2 Portions uploaded to groups', 'T2 Portions uploaded to groups', '2015-05-27', '11MCA41'),
(5, 'Assignemnt 1', 'Submit before 22nd June', '2015-05-27', '11MCA21'),
(6, 'Test of 23th May', 'class test', '2015-05-27', '11MCA21'),
(7, 'Deadline fo Bonus marks', '29th May 2015', '2015-05-27', '13MCA51');

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
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=48 ;

--
-- Dumping data for table `progress`
--

INSERT INTO `progress` (`id`, `completed_hrs`, `is_complete`, `subject_code`, `section`, `course_id`) VALUES
(1, 2, 0, '13MCA11', 'A', 1),
(2, 2, 0, '13MCA11', 'A', 2),
(3, 1, 0, '13MCA11', 'A', 3),
(4, 1, 0, '13MCA11', 'A', 4),
(5, 2, 0, '13MCA11', 'A', 6),
(6, 2, 0, '13MCA11', 'A', 7),
(7, 1, 0, '13MCA11', 'A', 8),
(8, 3, 0, '13MCA11', 'A', 9),
(9, 1, 0, '13MCA11', 'A', 11),
(10, 1, 0, '13MCA11', 'A', 12),
(11, 2, 0, '13MCA11', 'A', 13),
(12, 1, 0, '13MCA11', 'A', 14),
(13, 2, 0, '13MCA11', 'A', 15),
(14, 1, 0, '13MCA11', 'A', 16),
(15, 1, 0, '13MCA11', 'A', 18),
(16, 2, 0, '11MCA41', 'A', 28),
(17, 1, 0, '11MCA41', 'A', 29),
(18, 2, 0, '11MCA41', 'A', 30),
(19, 3, 0, '11MCA41', 'A', 31),
(20, 2, 0, '11MCA41', 'A', 33),
(21, 3, 0, '11MCA41', 'A', 34),
(22, 3, 0, '11MCA21', 'A', 76),
(23, 2, 0, '11MCA21', 'A', 54),
(24, 1, 0, '11MCA21', 'A', 77),
(25, 1, 0, '11MCA21', 'A', 55),
(26, 2, 0, '11MCA21', 'A', 78),
(27, 1, 0, '11MCA21', 'A', 56),
(28, 3, 0, '11MCA21', 'A', 58),
(29, 3, 0, '11MCA21', 'A', 80),
(30, 1, 0, '11MCA21', 'A', 59),
(31, 3, 0, '11MCA21', 'B', 76),
(32, 2, 0, '11MCA21', 'B', 77),
(33, 3, 0, '11MCA21', 'B', 54),
(34, 3, 0, '11MCA21', 'B', 78),
(35, 2, 0, '11MCA21', 'B', 55),
(36, 2, 0, '11MCA21', 'B', 56),
(37, 3, 0, '11MCA21', 'B', 58),
(38, 1, 0, '11MCA21', 'B', 80),
(39, 1, 0, '11MCA21', 'B', 59),
(40, 2, 0, '13MCA51', 'A', 96),
(41, 2, 0, '13MCA51', 'A', 97),
(42, 3, 0, '13MCA51', 'A', 98),
(43, 3, 0, '13MCA51', 'A', 100),
(44, 3, 0, '13MCA51', 'A', 101),
(45, 2, 0, '13MCA51', 'A', 103),
(46, 3, 0, '13MCA51', 'A', 104),
(47, 1, 0, '13MCA51', 'A', 105);

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
(1, '13MCA11', 'A', 'C Programming', 2, 1),
(4, '11MCA41', 'A', 'Information Retreival ', 2, 4),
(7, '11MCA21', 'A', 'Java', 3, 2),
(8, '11MCA21', 'B', 'C++ Programming', 3, 2),
(9, '11MCA31', 'A', 'Computer Networks', 5, 3),
(11, '11MCA33', 'A', 'Software Engineering', 4, 3),
(13, '13MCA51', 'A', 'System Simulation and Modelling', 2, 5);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
