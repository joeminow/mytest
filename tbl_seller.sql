-- phpMyAdmin SQL Dump
-- version 4.0.4.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Oct 04, 2015 at 10:55 AM
-- Server version: 5.6.11
-- PHP Version: 5.5.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `ngci`
--

-- --------------------------------------------------------

--
-- Table structure for table `tbl_seller`
--

CREATE TABLE IF NOT EXISTS `tbl_seller` (
  `sel_id` int(5) NOT NULL AUTO_INCREMENT,
  `sel_nam` varchar(225) NOT NULL,
  `sel_cat` varchar(150) NOT NULL,
  `sel_add` varchar(500) NOT NULL,
  `sel_phn` varchar(20) NOT NULL,
  `sel_eml` varchar(100) NOT NULL,
  PRIMARY KEY (`sel_id`),
  KEY `sel_id` (`sel_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `tbl_seller`
--

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
