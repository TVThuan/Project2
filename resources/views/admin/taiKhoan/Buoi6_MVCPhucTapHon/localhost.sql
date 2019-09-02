-- phpMyAdmin SQL Dump
-- version 3.1.1
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: May 04, 2018 at 10:53 AM
-- Server version: 5.1.30
-- PHP Version: 5.2.8

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `finaldemo`
--
CREATE DATABASE `finaldemo` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci;
USE `finaldemo`;

-- --------------------------------------------------------

--
-- Table structure for table `tbllop`
--

CREATE TABLE IF NOT EXISTS `tbllop` (
  `ma` int(11) NOT NULL AUTO_INCREMENT,
  `ten` varchar(50) NOT NULL,
  PRIMARY KEY (`ma`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Dumping data for table `tbllop`
--

INSERT INTO `tbllop` (`ma`, `ten`) VALUES
(1, 'lop 1'),
(2, 'lop 2'),
(3, 'lop 3');

-- --------------------------------------------------------

--
-- Table structure for table `tblsv`
--

CREATE TABLE IF NOT EXISTS `tblsv` (
  `ma` int(11) NOT NULL AUTO_INCREMENT,
  `ten` varchar(50) NOT NULL,
  `gt` tinyint(1) NOT NULL,
  `malop` int(11) NOT NULL,
  PRIMARY KEY (`ma`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=5 ;

--
-- Dumping data for table `tblsv`
--

INSERT INTO `tblsv` (`ma`, `ten`, `gt`, `malop`) VALUES
(2, 'Hoa Ms', 0, 3),
(3, 'aaa', 0, 3),
(4, 'bbb', 1, 1);
