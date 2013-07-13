-- phpMyAdmin SQL Dump
-- version 3.5.1
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Jul 09, 2013 at 11:23 PM
-- Server version: 5.5.25
-- PHP Version: 5.4.4

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";

--
-- Database: `Soelberg`
--

-- --------------------------------------------------------

--
-- Table structure for table `about`
--

CREATE TABLE `about` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `heading` varchar(30) NOT NULL,
  `information` text NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `about`
--

INSERT INTO `about` (`id`, `heading`, `information`) VALUES
(1, 'My Profile', 'Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Nam cursus. Morbi ut mi. Nullam enim leo, egestas id, condimentum at, laoreet mattis, massa. Sed eleifend nonummy diam. Praesent mauris ante, elementum et, bibendum at, posuere sit amet, nibh. ');

-- --------------------------------------------------------

--
-- Table structure for table `contact`
--

CREATE TABLE `contact` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(30) NOT NULL,
  `surname` varchar(30) NOT NULL,
  `email` varchar(50) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `contact`
--

INSERT INTO `contact` (`id`, `name`, `surname`, `email`) VALUES
(1, 'Michael', 'Soelberg', 'midasmidas@gmail.com');

-- --------------------------------------------------------

--
-- Table structure for table `home`
--

CREATE TABLE `home` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `filename` varchar(100) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=18 ;

--
-- Dumping data for table `home`
--

INSERT INTO `home` (`id`, `filename`) VALUES
(6, 'A Blessed Curse'),
(7, 'Goodbye; Go Live'),
(8, 'La mia luce'),
(9, 'All the arms around me, the darkness came. (Seal you his)'),
(10, 'No Fear (Chicken Head)'),
(11, 'Up Above'),
(12, 'dfdfdf'),
(13, 'Killdeer'),
(14, 'A Blessed Curse'),
(15, 'A Blessed Curse'),
(16, 'Goodbye; Go Live'),
(17, 'A Blessed Curse');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `userID` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(50) NOT NULL,
  `password` char(123) NOT NULL,
  PRIMARY KEY (`userID`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`userID`, `username`, `password`) VALUES
(3, 'michaelsoelberg', '6cbed820ace7be774c5b3d39b3425422');

-- --------------------------------------------------------

--
-- Table structure for table `work`
--

CREATE TABLE `work` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `filename` varchar(100) DEFAULT NULL,
  `description` char(1) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=50 ;

--
-- Dumping data for table `work`
--

INSERT INTO `work` (`id`, `filename`, `description`) VALUES
(24, 'A Blessed Curse', ''),
(25, 'Accept. Receive. Yes. (Seal you his)', ''),
(26, 'Acting no deception', ''),
(27, 'Again and Again', ''),
(28, 'All the arms around me, the darkness came. (Seal you his)', ''),
(29, 'Caught the fire', ''),
(30, 'Come Home1', ''),
(31, 'Goodbye; Go Live', ''),
(32, 'I take your hand', ''),
(33, 'I''m in here', ''),
(34, 'Innamorato di una vita vuota', ''),
(35, 'Killdeer', ''),
(36, 'La mia luce', ''),
(37, 'Mid Monday Morning Meditation Meltdown', ''),
(38, 'Move on, nothing to see here', ''),
(39, 'My eyes won''t see', ''),
(40, 'No Fear (Chicken Head)', ''),
(41, 'No signs of pain', ''),
(43, 'Non temere', ''),
(44, 'Received', ''),
(45, 'Simple and Content', ''),
(46, 'The Gifted', ''),
(47, 'Unbeguiled', ''),
(48, 'Under Construction', ''),
(49, 'Up Above', '');