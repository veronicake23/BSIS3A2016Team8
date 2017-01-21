-- phpMyAdmin SQL Dump
-- version 4.1.14
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Jan 21, 2017 at 03:13 AM
-- Server version: 5.6.17
-- PHP Version: 5.5.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `crud`
--

-- --------------------------------------------------------

--
-- Table structure for table `post`
--

CREATE TABLE IF NOT EXISTS `post` (
  `post_id` int(11) NOT NULL AUTO_INCREMENT,
  `thread_id` int(9) NOT NULL,
  `username` varchar(100) NOT NULL,
  `date` varchar(50) NOT NULL,
  `Content` varchar(5000) NOT NULL,
  PRIMARY KEY (`post_id`),
  KEY `thread_id` (`thread_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `post`
--

INSERT INTO `post` (`post_id`, `thread_id`, `username`, `date`, `Content`) VALUES
(1, 11, 'TOPTOP', '2017-01-21', 'WhAT EVER');

-- --------------------------------------------------------

--
-- Table structure for table `replies`
--

CREATE TABLE IF NOT EXISTS `replies` (
  `rep_id` int(11) NOT NULL AUTO_INCREMENT,
  `post_id` int(11) NOT NULL,
  `username` varchar(100) NOT NULL,
  `date` varchar(100) NOT NULL,
  `comment` varchar(5000) NOT NULL,
  PRIMARY KEY (`rep_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `thread`
--

CREATE TABLE IF NOT EXISTS `thread` (
  `thread_id` int(9) NOT NULL AUTO_INCREMENT,
  `username` varchar(100) NOT NULL,
  `Title` varchar(250) NOT NULL,
  `Description` varchar(5000) NOT NULL,
  `Category` varchar(250) NOT NULL,
  `Date` varchar(100) NOT NULL,
  PRIMARY KEY (`thread_id`),
  KEY `thread_id` (`thread_id`),
  KEY `username` (`username`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=12 ;

--
-- Dumping data for table `thread`
--

INSERT INTO `thread` (`thread_id`, `username`, `Title`, `Description`, `Category`, `Date`) VALUES
(9, 'gohan', 'NASA Discovered New Habitable Planet', ' NASA discovered New Habitable planet and it''s amazing. It is really amazing! whatever\r\n	', 'Science and Technology', '13-01-2017 13:42:21'),
(11, 'TOPTOP', 'Virtual Reality', 'etc etc etc etc etc whatever\r\n \r\n		', 'Science and Technology', '20-01-2017 23:31:16');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE IF NOT EXISTS `users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(50) NOT NULL,
  `surname` varchar(50) NOT NULL,
  `username` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  PRIMARY KEY (`username`),
  UNIQUE KEY `id` (`id`),
  KEY `username` (`username`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=30 ;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `surname`, `username`, `password`) VALUES
(23, 'Meliton', 'Lazaro', '', '7fad9b6fd0af2fecb513d61d439691e3'),
(24, 'Meliton', 'Lazaro', 'bluminous03', 'ffe553694f5096471590343432359e02'),
(28, 'Gohan', 'Son', 'Gohan', '9c532ce2a80fc7bcbcf19a41de67568c'),
(27, 'Kobe', 'Bryant', 'kobe24', '59514cbce9bd2231e93d612ddb440961'),
(25, 'Meliton', 'Lazaro', 'theweekdy', 'ffe553694f5096471590343432359e02'),
(29, 'Meliton', 'Seunghyun', 'TOPTOP', '8aab264665f2085687d9eeca4c67a691');

--
-- Constraints for dumped tables
--

--
-- Constraints for table `post`
--
ALTER TABLE `post`
  ADD CONSTRAINT `post_ibfk_1` FOREIGN KEY (`thread_id`) REFERENCES `thread` (`thread_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `thread`
--
ALTER TABLE `thread`
  ADD CONSTRAINT `thread_ibfk_1` FOREIGN KEY (`username`) REFERENCES `users` (`username`) ON DELETE CASCADE ON UPDATE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
