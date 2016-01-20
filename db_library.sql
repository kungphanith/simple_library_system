-- phpMyAdmin SQL Dump
-- version 3.5.1
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Jan 20, 2016 at 10:20 AM
-- Server version: 5.5.24-log
-- PHP Version: 5.4.3

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `db_library`
--

-- --------------------------------------------------------

--
-- Table structure for table `book`
--

CREATE TABLE IF NOT EXISTS `book` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `title` varchar(100) NOT NULL,
  `author_name` varchar(100) NOT NULL,
  `publisher` varchar(100) NOT NULL,
  `year` varchar(10) NOT NULL,
  `category_id` int(5) NOT NULL,
  `quantity` int(5) NOT NULL,
  `other` text NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL,
  `is_deleted` tinyint(1) NOT NULL,
  `code` varchar(10) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=20 ;

--
-- Dumping data for table `book`
--

INSERT INTO `book` (`id`, `title`, `author_name`, `publisher`, `year`, `category_id`, `quantity`, `other`, `created_at`, `updated_at`, `is_deleted`, `code`) VALUES
(1, 'ចុងបញ្ចប់នៃពីភពលោក', 'vilieam tana', 'sonada printing', '2015', 1, 0, 'other edit', '2016-01-13 00:00:00', '2016-01-17 03:01:00', 0, 'BC0003'),
(2, 'ស្ថានភាពរាស្ត្រខ្មែរ', 'គង់ ផាណីត', 'គ្មាន', '២០១៥', 1, 0, 'no', '0000-00-00 00:00:00', '2016-01-17 03:01:19', 0, 'B00002'),
(3, '៩៩ វិធីដើម្បីជោគជ័យ', 'សេង ដារ៉ារដ្ឋា', 'គ្មាន', '2005', 1, 0, 'មិនដឹង គ្មានយោបល', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 'B00003'),
(4, 'ថសដថាសដថ', 'ាសដថ', 'សដថ', 'ាដសថ', 1, 0, 'ាសដថ', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 'B00004'),
(5, 'title', 'authoer', 'publisher', 'year', 1, 0, 'other', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 1, 'B00005'),
(6, 't titledfdfsdfasf', 't authoer ', 't publisher', '0', 0, 0, '', '0000-00-00 00:00:00', '2016-01-17 02:43:59', 1, 'B00006'),
(7, 'asdf', 'asdf', 'asdf', 'asdf', 1, 0, 'asdf6666', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 'B00007'),
(8, 'fasdfasdf', 'asdf', 'afsdfas', 'asdf', 1, 0, 'asdf', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 'B00008'),
(9, '0', '0', '0', '0', 0, 0, '0', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 1, 'B00009'),
(10, '0', '0', '0', '0', 0, 0, '0', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 1, 'B00010'),
(11, '0', '0', '0', '0', 0, 0, '0', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 1, 'B00011'),
(12, '0', '0', '0', '0', 0, 0, '0', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 1, 'B00012'),
(13, 'sdf', 'asdf', 'asdf', 'asdf', 1, 3, 'asdf', '0000-00-00 00:00:00', '2016-01-18 07:10:56', 0, 'B00013'),
(14, 'hello', 'hello', 'hello', 'hello', 1, 0, 'hello', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 1, 'B00014'),
(15, 'យុទ្ធសាស្ត្រដើម្បីជោគជ័យ', 'សេក បណ្ឌិត', 'រោងពុម្ពជោគជ័យ', '២០១៣', 1, 3, 'other edits test', '2016-01-17 02:49:52', '2016-01-18 07:09:35', 0, 'B00015'),
(16, 'sdfasdf', 'adsf', 'asdfasdf', 'asdf', 1, 0, 'sdf', '2016-01-17 02:51:32', '0000-00-00 00:00:00', 1, 'B00016'),
(17, 'dfa', 'sasdf', 'dsf', 'asdf', 1, 0, 'asdfasdf', '2016-01-17 03:33:00', '0000-00-00 00:00:00', 0, 'B00017'),
(18, 'as', 'afasd fasdfas', 'a sdf', '2012', 1, 6, 'dsf', '2016-01-18 07:01:46', '0000-00-00 00:00:00', 0, 'B00018'),
(19, 'sadfasdfasdfsdf', 'asdf', 'asdf', '2014', 1, 7, '6666', '2016-01-18 07:04:41', '0000-00-00 00:00:00', 0, 'B00019');

-- --------------------------------------------------------

--
-- Table structure for table `book_category`
--

CREATE TABLE IF NOT EXISTS `book_category` (
  `id` int(5) NOT NULL AUTO_INCREMENT,
  `name` varchar(100) NOT NULL,
  `description` text NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL,
  `is_deleted` tinyint(1) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `book_category`
--

INSERT INTO `book_category` (`id`, `name`, `description`, `created_at`, `updated_at`, `is_deleted`) VALUES
(1, 'សិល្បៈ', 'For the art', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0);

-- --------------------------------------------------------

--
-- Table structure for table `borrowing`
--

CREATE TABLE IF NOT EXISTS `borrowing` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `book_id` int(10) NOT NULL,
  `student_id` int(10) NOT NULL,
  `is_inroom` tinyint(1) NOT NULL,
  `borrow_at` datetime NOT NULL,
  `lend_by` int(5) NOT NULL,
  `returned_at` datetime NOT NULL,
  `recieved_by` int(5) NOT NULL,
  `recieved_at` date NOT NULL,
  `is_returned` tinyint(1) NOT NULL DEFAULT '0',
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL,
  `is_deleted` tinyint(1) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=18 ;

--
-- Dumping data for table `borrowing`
--

INSERT INTO `borrowing` (`id`, `book_id`, `student_id`, `is_inroom`, `borrow_at`, `lend_by`, `returned_at`, `recieved_by`, `recieved_at`, `is_returned`, `created_at`, `updated_at`, `is_deleted`) VALUES
(1, 2, 51, 1, '0000-00-00 00:00:00', 1, '0000-00-00 00:00:00', 0, '0000-00-00', 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0),
(2, 1, 0, 0, '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0, '0000-00-00', 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 1),
(3, 3, 0, 0, '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0, '0000-00-00', 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 1),
(4, 8, 51, 0, '2016-01-01 00:00:00', 0, '2016-01-09 00:00:00', 0, '0000-00-00', 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 1),
(5, 8, 53, 0, '2016-01-01 00:00:00', 0, '2016-01-04 00:00:00', 0, '0000-00-00', 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 1),
(6, 13, 51, 0, '2016-01-07 00:00:00', 0, '2016-01-09 00:00:00', 0, '0000-00-00', 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 1),
(7, 4, 53, 0, '2016-01-17 00:00:00', 0, '2016-01-08 00:00:00', 0, '0000-00-00', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 1),
(8, 4, 51, 0, '2016-01-17 00:00:00', 0, '2016-01-17 00:00:00', 0, '0000-00-00', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 1),
(9, 1, 51, 1, '2016-01-01 00:00:00', 1, '2016-01-02 00:00:00', 1, '2016-01-30', 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0),
(10, 15, 1, 0, '2016-01-21 00:00:00', 1, '2016-01-01 00:00:00', 0, '0000-00-00', 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0),
(11, 3, 1, 0, '2016-01-08 00:00:00', 1, '2016-01-23 00:00:00', 0, '0000-00-00', 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0),
(12, 3, 51, 0, '2016-01-07 00:00:00', 1, '2016-01-07 00:00:00', 0, '2016-01-22', 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0),
(13, 4, 53, 0, '2016-01-01 00:00:00', 1, '2016-01-02 00:00:00', 1, '2016-01-02', 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0),
(14, 3, 53, 0, '2016-01-09 00:00:00', 1, '2016-01-10 00:00:00', 1, '2016-01-21', 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0),
(15, 15, 1, 0, '2016-02-12 00:00:00', 1, '2016-02-13 00:00:00', 0, '0000-00-00', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0),
(16, 15, 53, 0, '2016-01-23 00:00:00', 1, '2016-01-23 00:00:00', 0, '0000-00-00', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0),
(17, 3, 51, 0, '2016-01-14 00:00:00', 1, '2016-01-21 00:00:00', 1, '2016-01-20', 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0);

-- --------------------------------------------------------

--
-- Table structure for table `equipment`
--

CREATE TABLE IF NOT EXISTS `equipment` (
  `id` int(5) NOT NULL AUTO_INCREMENT,
  `name` varchar(50) NOT NULL,
  `quantity` int(5) NOT NULL,
  `price` float NOT NULL,
  `description` text NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL,
  `is_deleted` tinyint(1) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `student`
--

CREATE TABLE IF NOT EXISTS `student` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `code` varchar(10) NOT NULL,
  `name_khmer` varchar(100) NOT NULL,
  `latin_name` varchar(100) NOT NULL,
  `gender` varchar(10) NOT NULL,
  `phone` varchar(50) NOT NULL,
  `email` varchar(100) NOT NULL,
  `dob` date NOT NULL,
  `school_name` varchar(100) NOT NULL,
  `picture_file` text NOT NULL,
  `other` text NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL,
  `is_deleted` tinyint(1) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=54 ;

--
-- Dumping data for table `student`
--

INSERT INTO `student` (`id`, `code`, `name_khmer`, `latin_name`, `gender`, `phone`, `email`, `dob`, `school_name`, `picture_file`, `other`, `created_at`, `updated_at`, `is_deleted`) VALUES
(1, 'LIB0004', 'គង់ ផាណីត', 'Kung Phanith', 'M', '098987564', 'dfasdfasdf', '2016-01-13', '', '', 'dfd', '2016-01-14 00:00:00', '2016-01-14 00:00:00', 0),
(50, 'LBP00050', 'សៀង ចាន់ណាក់', 'Seang Channak', 'F', '0887634', 'fsadf', '2015-12-29', 'sdfaadsfadsf', '', 'sdfasdf', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 1),
(51, 'LBP00051', 'ទេព បព្រឹក', 'tep Boprik', 'M', '098987865', 'tem.boprik@gmail.com', '2016-01-06', 'hgmas', '', 'fasdfasdf', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0),
(52, 'LBP00052', 'គាំ ច័ន្ទតុលា', 'Korm Charn Tola', 'F', '0967539818', 'korm.chantola@gmail.com', '2016-01-16', 'cici', '', 'no idea', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 1),
(53, 'LBP00053', 'អាន គុណកូឡា', 'An KunKola', 'M', '098098975', '2gmail@gmail.com', '2016-01-01', 'sdfasd', '', 'asdf', '2016-01-17 12:21:11', '2016-01-17 12:21:11', 0);

-- --------------------------------------------------------

--
-- Table structure for table `tracking`
--

CREATE TABLE IF NOT EXISTS `tracking` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `user_id` int(5) NOT NULL,
  `action` varchar(100) NOT NULL,
  `description` text NOT NULL,
  `created_at` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE IF NOT EXISTS `user` (
  `id` int(5) NOT NULL AUTO_INCREMENT,
  `username` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `encrypted_password` text NOT NULL,
  `full_name_kh` varchar(50) NOT NULL,
  `latin_name` varchar(50) NOT NULL,
  `is_admin` tinyint(1) NOT NULL,
  `is_active` tinyint(1) NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL,
  `is_deleted` tinyint(1) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `username`, `email`, `encrypted_password`, `full_name_kh`, `latin_name`, `is_admin`, `is_active`, `created_at`, `updated_at`, `is_deleted`) VALUES
(1, 'administrator', 'administrator@localdomain.com', '01b307acba4f54f55aafc33bb06bbbf6ca803e9a', 'គង់ ផាណីត', 'Kung Phanith', 1, 1, '2016-01-14 00:00:00', '2016-01-14 00:00:00', 0);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
