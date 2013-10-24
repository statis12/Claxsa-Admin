-- phpMyAdmin SQL Dump
-- version 3.2.4
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Oct 24, 2013 at 09:31 AM
-- Server version: 5.1.41
-- PHP Version: 5.3.1

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `ehelp`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE IF NOT EXISTS `admin` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(80) NOT NULL,
  `password` varchar(100) NOT NULL,
  `name` varchar(45) NOT NULL,
  `email` varchar(100) NOT NULL,
  `phone` varchar(25) DEFAULT NULL,
  `address` text,
  `created_date` datetime DEFAULT NULL,
  `modified_date` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id`, `username`, `password`, `name`, `email`, `phone`, `address`, `created_date`, `modified_date`) VALUES
(1, 'admin', 'a6ce32c951b4835d902cafa9246653c4', 'Yuda', 'blackstrike12@yahoo.com', NULL, NULL, NULL, '2013-10-24 01:39:02');

-- --------------------------------------------------------

--
-- Table structure for table `authassignment`
--

CREATE TABLE IF NOT EXISTS `AuthAssignment` (
  `itemname` varchar(64) NOT NULL,
  `userid` varchar(64) NOT NULL,
  `bizrule` text,
  `data` text,
  PRIMARY KEY (`itemname`,`userid`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data for table `authassignment`
--

INSERT INTO `AuthAssignment` (`itemname`, `userid`, `bizrule`, `data`) VALUES
('administrator', 'admin', NULL, 'N;'),
('administrator', 'admin2', NULL, 'N;');

-- --------------------------------------------------------

--
-- Table structure for table `authitem`
--

CREATE TABLE IF NOT EXISTS `AuthItem` (
  `name` varchar(64) NOT NULL,
  `type` int(11) NOT NULL,
  `description` text,
  `bizrule` text,
  `data` text,
  PRIMARY KEY (`name`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data for table `authitem`
--

INSERT INTO `AuthItem` (`name`, `type`, `description`, `bizrule`, `data`) VALUES
('administrator', 2, 'administrator user', NULL, 'N;'),
('authenticated', 2, 'authenticated user', 'return !Yii::app()->user->isGuest;', 'N;'),
('guest', 2, 'guest user', 'return Yii::app()->user->isGuest;', 'N;');

-- --------------------------------------------------------

--
-- Table structure for table `authitemchild`
--

CREATE TABLE IF NOT EXISTS `AuthItemChild` (
  `parent` varchar(64) NOT NULL,
  `child` varchar(64) NOT NULL,
  PRIMARY KEY (`parent`,`child`),
  KEY `child` (`child`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data for table `authitemchild`
--


-- --------------------------------------------------------

--
-- Table structure for table `left_menu`
--

CREATE TABLE IF NOT EXISTS `left_menu` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(100) NOT NULL,
  `url` varchar(150) NOT NULL,
  `sort` int(11) DEFAULT '0',
  `top_menu_id` int(11) NOT NULL,
  `controller` varchar(100) NOT NULL,
  `created_date` datetime DEFAULT NULL,
  `modified_date` datetime DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_left_menu_top_menu` (`top_menu_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Dumping data for table `left_menu`
--

INSERT INTO `left_menu` (`id`, `name`, `url`, `sort`, `top_menu_id`, `controller`, `created_date`, `modified_date`) VALUES
(1, 'Top Menu', 'topMenu', 0, 1, 'topMenu', NULL, NULL),
(2, 'Left Menu', 'leftMenu', 0, 1, 'leftMenu', NULL, NULL),
(3, 'User Admin', 'admin', 0, 2, 'admin', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `top_menu`
--

CREATE TABLE IF NOT EXISTS `top_menu` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(100) NOT NULL,
  `sort` int(11) DEFAULT '0',
  `created_date` datetime DEFAULT NULL,
  `modified_date` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `top_menu`
--

INSERT INTO `top_menu` (`id`, `name`, `sort`, `created_date`, `modified_date`) VALUES
(1, 'Setting', 0, NULL, NULL),
(2, 'Account', 1, NULL, NULL);

--
-- Constraints for dumped tables
--

--
-- Constraints for table `left_menu`
--
ALTER TABLE `left_menu`
  ADD CONSTRAINT `fk_left_menu_top_menu` FOREIGN KEY (`top_menu_id`) REFERENCES `top_menu` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
