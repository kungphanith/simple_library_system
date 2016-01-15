-- phpMyAdmin SQL Dump
-- version 3.5.1
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Jan 15, 2016 at 01:48 AM
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
  `other` text NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL,
  `is_deleted` tinyint(1) NOT NULL,
  `code` varchar(10) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `book`
--

INSERT INTO `book` (`id`, `title`, `author_name`, `publisher`, `year`, `category_id`, `other`, `created_at`, `updated_at`, `is_deleted`, `code`) VALUES
(1, 'the end of the world', 'vilieam tana', 'sonada printing', '2015', 1, 'lfkaljdf', '2016-01-13 00:00:00', '0000-00-00 00:00:00', 0, 'BC0003');

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
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

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
  `recieved_by` datetime NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL,
  `is_deleted` tinyint(1) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

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
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=44 ;

--
-- Dumping data for table `student`
--

INSERT INTO `student` (`id`, `code`, `name_khmer`, `latin_name`, `gender`, `phone`, `email`, `dob`, `school_name`, `picture_file`, `other`, `created_at`, `updated_at`, `is_deleted`) VALUES
(1, 'LIB0004', 'គង់ ផាណីត', 'Kung Phanith', 'm', '098987564', '', '2016-01-13', '', '', 'dfd', '2016-01-14 00:00:00', '2016-01-14 00:00:00', 0),
(23, 'LBP0023', '0', '0', '0', '0', '0', '0000-00-00', '0', '', '0', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0),
(25, 'LBP0025', 'asdf', 'adsf', 'df', 'adsf', 'dsf', '0000-00-00', '', '', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0),
(27, 'LBP0027', 'ទូច សីហា', 'Touch Seyha', 'm', '098654', 'sdfasdf', '0000-00-00', 'adsfasdf', '', 'asdf', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0),
(28, 'LBP0028', 'សេង សីហា', 'fasdf', 'ប', 'asdf', 'ថាសដថ', '0000-00-00', 'asdfasd', '', 'asdf', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0),
(29, 'LBP0029', 'fsd', 'fasdf', 'asdf', 'adsf', 'dsf', '0000-00-00', 'sdaf', '', 'asdf', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0),
(37, 'LBP0037', 'sdf', 'asdf', 'adsf', 'adsf', 'dsf', '0000-00-00', 'df', '', 'df', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0),
(39, 'LBP0039', 'asdfa', 'asdf', 'asdf', '', '', '0000-00-00', '', '', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0),
(40, 'LBP0040', '', '', '', '', '', '0000-00-00', '', '', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0),
(41, 'LBP0041', 'fsdfasdfasdfa', '', '', '', '', '0000-00-00', '', '', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0),
(42, 'LBP0042', 'afsdfasdf', '', '', '', '', '0000-00-00', '', '', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0),
(43, 'LBP0043', 'asdfasdf', '', '', '', '', '0000-00-00', '', '', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0);

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
