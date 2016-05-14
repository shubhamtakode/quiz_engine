-- phpMyAdmin SQL Dump
-- version 4.1.12
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: May 14, 2016 at 01:59 PM
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
('123456', 'quizengine', 'test', 'test');

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
('123', 'test', 'test', '123456');

-- --------------------------------------------------------

--
-- Table structure for table `domain_permissions`
--

CREATE TABLE IF NOT EXISTS `domain_permissions` (
  `permissions_id` varchar(32) NOT NULL,
  `domain_id` varchar(32) NOT NULL,
  `no_of_quiz` int(11) NOT NULL,
  `questions_per_quiz` smallint(6) NOT NULL,
  `mcq_ms` bit(1) NOT NULL DEFAULT b'0',
  `fill_in_blanks` bit(1) NOT NULL DEFAULT b'0',
  `essay_questions` bit(1) NOT NULL DEFAULT b'0',
  `sequence` bit(1) NOT NULL DEFAULT b'0',
  PRIMARY KEY (`permissions_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `essay_questions`
--

CREATE TABLE IF NOT EXISTS `essay_questions` (
  `question_id` varchar(32) NOT NULL,
  `title` varchar(255) NOT NULL,
  `reference_essay` varchar(500) NOT NULL,
  `quiz_id` varchar(32) NOT NULL,
  PRIMARY KEY (`question_id`),
  KEY `fk_quiz_id4` (`quiz_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `fill_in_blanks`
--

CREATE TABLE IF NOT EXISTS `fill_in_blanks` (
  `question_id` varchar(32) NOT NULL,
  `title` tinyblob NOT NULL,
  `answer1` varchar(100) NOT NULL,
  `answer2` varchar(100) NOT NULL,
  `quiz_id` varchar(32) NOT NULL,
  PRIMARY KEY (`question_id`),
  KEY `fk_quiz_id5` (`quiz_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `mcq_ms_questions`
--

CREATE TABLE IF NOT EXISTS `mcq_ms_questions` (
  `question_id` varchar(32) NOT NULL,
  `quiz_id` varchar(32) NOT NULL,
  `question_title` blob NOT NULL,
  `option1` blob NOT NULL,
  `option2` blob NOT NULL,
  `option3` blob NOT NULL,
  `option4` blob NOT NULL,
  `option5` blob NOT NULL,
  `correct_option1` tinyint(4) NOT NULL,
  `question_type` bit(1) NOT NULL,
  `correct_option2` tinyint(4) NOT NULL,
  `correct_option3` tinyint(4) NOT NULL,
  KEY `fk_quiz_id1` (`quiz_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `notifications`
--

CREATE TABLE IF NOT EXISTS `notifications` (
  `notification_id` varchar(32) NOT NULL,
  `subject` varchar(50) NOT NULL,
  `message` tinyblob NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

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
  `quiz_id` varchar(32) NOT NULL,
  `quiz_title` varchar(255) NOT NULL,
  `quiz_setting_id` varchar(32) NOT NULL,
  `user_id` varchar(32) NOT NULL,
  PRIMARY KEY (`quiz_id`),
  KEY `fk_quiz_settings` (`quiz_setting_id`),
  KEY `fk_user_id` (`user_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `quiz-settings`
--

CREATE TABLE IF NOT EXISTS `quiz-settings` (
  `quiz_setting_id` varchar(32) NOT NULL,
  `total_questions` smallint(6) NOT NULL,
  `total_marks` float NOT NULL,
  `quiz_type` bit(1) NOT NULL DEFAULT b'1',
  `display_introduction` bit(1) NOT NULL,
  `introduction_contents` tinyblob NOT NULL,
  `total_time` int(11) NOT NULL,
  `question_time_limit` int(11) NOT NULL,
  `random_questions` bit(1) NOT NULL,
  `show_answer` bit(1) NOT NULL,
  `allow_review` bit(1) NOT NULL,
  `when_fail` tinyblob NOT NULL,
  PRIMARY KEY (`quiz_setting_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `sequence_questions`
--

CREATE TABLE IF NOT EXISTS `sequence_questions` (
  `question_id` varchar(32) NOT NULL,
  `title` varchar(255) NOT NULL,
  `answer1` varchar(255) NOT NULL,
  `answer2` varchar(255) NOT NULL,
  `answer3` varchar(255) NOT NULL,
  `answer4` varchar(255) NOT NULL,
  `answer5` varchar(255) NOT NULL,
  `quiz_id` varchar(32) NOT NULL,
  PRIMARY KEY (`question_id`),
  KEY `fk_quiz_id3` (`quiz_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `true_false_questions`
--

CREATE TABLE IF NOT EXISTS `true_false_questions` (
  `question_id` varchar(32) NOT NULL,
  `title` tinyblob NOT NULL,
  `answer` bit(1) NOT NULL,
  `hint` tinyblob NOT NULL,
  `quiz_id` varchar(32) NOT NULL,
  PRIMARY KEY (`question_id`),
  KEY `fk_quiz_id` (`quiz_id`)
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

--
-- Constraints for table `essay_questions`
--
ALTER TABLE `essay_questions`
  ADD CONSTRAINT `fk_quiz_id4` FOREIGN KEY (`quiz_id`) REFERENCES `quiz` (`quiz_id`);

--
-- Constraints for table `fill_in_blanks`
--
ALTER TABLE `fill_in_blanks`
  ADD CONSTRAINT `fk_quiz_id5` FOREIGN KEY (`quiz_id`) REFERENCES `quiz` (`quiz_id`);

--
-- Constraints for table `mcq_ms_questions`
--
ALTER TABLE `mcq_ms_questions`
  ADD CONSTRAINT `fk_quiz_id1` FOREIGN KEY (`quiz_id`) REFERENCES `quiz` (`quiz_id`);

--
-- Constraints for table `quiz`
--
ALTER TABLE `quiz`
  ADD CONSTRAINT `fk_user_id` FOREIGN KEY (`user_id`) REFERENCES `domainusers` (`domain_id`),
  ADD CONSTRAINT `fk_author_id` FOREIGN KEY (`user_id`) REFERENCES `domainusers` (`user_id`),
  ADD CONSTRAINT `fk_quiz_settings` FOREIGN KEY (`quiz_setting_id`) REFERENCES `quiz-settings` (`quiz_setting_id`);

--
-- Constraints for table `sequence_questions`
--
ALTER TABLE `sequence_questions`
  ADD CONSTRAINT `fk_quiz_id3` FOREIGN KEY (`quiz_id`) REFERENCES `quiz` (`quiz_id`);

--
-- Constraints for table `true_false_questions`
--
ALTER TABLE `true_false_questions`
  ADD CONSTRAINT `fk_quiz_id` FOREIGN KEY (`quiz_id`) REFERENCES `quiz` (`quiz_id`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
