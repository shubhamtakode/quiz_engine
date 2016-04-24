-- phpMyAdmin SQL Dump
-- version 4.1.12
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Apr 24, 2016 at 09:16 AM
-- Server version: 5.6.16
-- PHP Version: 5.5.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `quizsystemdatabase`
--

-- --------------------------------------------------------

--
-- Table structure for table `domains`
--

CREATE TABLE IF NOT EXISTS `domains` (
  `domain_id` varchar(32) NOT NULL,
  `domain_name` varchar(100) NOT NULL,
  `domain_username` varchar(70) NOT NULL,
  `domain_password` varchar(255) NOT NULL,
  PRIMARY KEY (`domain_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `domains`
--

INSERT INTO `domains` (`domain_id`, `domain_name`, `domain_username`, `domain_password`) VALUES
('132456', 'abc', 'abc@xyz.com', '123456'),
('456', 'rk', 'rk', '1000'),
('xfczxczxc', 'sggs', 'sggs@sggs.ac.in', 'roshan');

-- --------------------------------------------------------

--
-- Table structure for table `domainusers`
--

CREATE TABLE IF NOT EXISTS `domainusers` (
  `user_id` varchar(32) NOT NULL,
  `username` varchar(70) NOT NULL,
  `password` varchar(255) NOT NULL,
  `domain_id` varchar(32) NOT NULL,
  PRIMARY KEY (`user_id`),
  KEY `fk_domainid` (`domain_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `domainusers`
--

INSERT INTO `domainusers` (`user_id`, `username`, `password`, `domain_id`) VALUES
('sdfsdf', 'sdf', 'sdf', 'xfczxczxc');

-- --------------------------------------------------------

--
-- Table structure for table `question-types`
--

CREATE TABLE IF NOT EXISTS `question-types` (
  `typeid` int(11) NOT NULL,
  `type` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `questions`
--

CREATE TABLE IF NOT EXISTS `questions` (
  `question_id` bigint(20) NOT NULL,
  `question_title` longblob NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `quiz`
--

CREATE TABLE IF NOT EXISTS `quiz` (
  `quiz_id` int(11) NOT NULL,
  `quiz_title` varchar(255) NOT NULL,
  `quiz_setting_id` bigint(20) NOT NULL,
  `user_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `quiz-settings`
--

CREATE TABLE IF NOT EXISTS `quiz-settings` (
  `quiz_setting_id` int(11) NOT NULL,
  `total_questions` int(11) NOT NULL,
  `total_marks` float NOT NULL,
  `quiz_type` bit(1) NOT NULL DEFAULT b'1'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE IF NOT EXISTS `users` (
  `user_info_id` varchar(32) NOT NULL,
  `user_type` tinyint(4) NOT NULL,
  `fname` varchar(100) NOT NULL,
  `mname` varchar(100) NOT NULL,
  `lname` varchar(100) NOT NULL,
  `primary_email` varchar(200) NOT NULL,
  `alternate_email` varchar(200) NOT NULL,
  `designation` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `domainusers`
--
ALTER TABLE `domainusers`
  ADD CONSTRAINT `fk_domainid` FOREIGN KEY (`domain_id`) REFERENCES `domains` (`domain_id`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
