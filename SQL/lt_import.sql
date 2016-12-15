-- phpMyAdmin SQL Dump
-- version 4.1.14.8
-- http://www.phpmyadmin.net
--
-- Generation Time: Dec 01, 2016 at 04:07 PM
-- Server version: 5.5.50-0+deb7u2-log
-- PHP Version: 5.4.45-0+deb7u5

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;


--
-- Table structure for table `params`
--

CREATE TABLE IF NOT EXISTS `params` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `option` text COLLATE latin1_general_ci NOT NULL,
  `value` int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci AUTO_INCREMENT=3 ;

--
-- Dumping data for table `params`
--

INSERT INTO `params` (`id`, `option`, `value`) VALUES
(1, 'enabled', 1),
(2, 'access_key', 123456);

-- --------------------------------------------------------

--
-- Table structure for table `signups`
--

CREATE TABLE IF NOT EXISTS `signups` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `studentId` int(11) NOT NULL,
  `teacherId` int(11) NOT NULL,
  `dept` text COLLATE utf8_unicode_ci,
  `purpose` text COLLATE utf8_unicode_ci,
  `time` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=843 ;


-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE IF NOT EXISTS `users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` text COLLATE utf8_unicode_ci NOT NULL,
  `hash` text COLLATE utf8_unicode_ci NOT NULL,
  `firstName` text COLLATE utf8_unicode_ci NOT NULL,
  `lastName` text COLLATE utf8_unicode_ci NOT NULL,
  `email` text COLLATE utf8_unicode_ci NOT NULL,
  `gradYear` int(11) NOT NULL,
  `teacher` int(11) NOT NULL DEFAULT '0',
  `dept` text COLLATE utf8_unicode_ci,
  `secondaryDept` text COLLATE utf8_unicode_ci,
  `maxStudents` int(11) NOT NULL DEFAULT '20',
  `firstTime` tinyint(1) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=2089 ;


/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
