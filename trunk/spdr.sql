-- phpMyAdmin SQL Dump
-- version 3.3.9
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Oct 03, 2012 at 01:21 AM
-- Server version: 5.5.16
-- PHP Version: 5.3.5

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `spdr`
--

-- --------------------------------------------------------

--
-- Table structure for table `email`
--

CREATE TABLE IF NOT EXISTS `email` (
  `id` int(5) NOT NULL AUTO_INCREMENT,
  `name` varchar(20) NOT NULL,
  `sender` varchar(30) NOT NULL,
  `reciever` varchar(30) NOT NULL,
  `message` varchar(500) NOT NULL,
  `toe` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=8 ;

--
-- Dumping data for table `email`
--

INSERT INTO `email` (`id`, `name`, `sender`, `reciever`, `message`, `toe`) VALUES
(1, '', '', '', '', '2012-10-02 16:00:37'),
(2, 'Nikesh', 'nikesh.yadav@gmail.com', 'nikesh@gmail.com', '', '2012-10-02 16:58:17'),
(3, 'Nikesh', 'nikesh.yadav@gmail.com', 'nikesh@gmail.com', '', '2012-10-02 16:59:25'),
(4, 'nikesh', 'nikesh@gmail.com', 'adsfas@das.com', '', '2012-10-02 18:32:02'),
(5, 'nikesh', 'nikesh@gmail.com', 'adsfas@das.com', '', '2012-10-02 18:33:58'),
(6, 'Nikesh', 'adfasdf@sdfgmail.com', 'sdas@sxcvx.ocm', 'dsfsdfsdfsdf', '2012-10-02 19:07:20'),
(7, 'Nikesh', 'nikesh.yadav@gmail.com', 'nikesh.yadav@gmail.com', 'sdfsdfsdfsd df sd f', '2012-10-02 19:22:38');

-- --------------------------------------------------------

--
-- Table structure for table `game_result`
--

CREATE TABLE IF NOT EXISTS `game_result` (
  `id` int(5) NOT NULL AUTO_INCREMENT,
  `player` varchar(20) NOT NULL,
  `gameid` int(11) NOT NULL,
  `result` tinyint(1) NOT NULL COMMENT '1=win 0=loss',
  `toe` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=18 ;

--
-- Dumping data for table `game_result`
--

INSERT INTO `game_result` (`id`, `player`, `gameid`, `result`, `toe`) VALUES
(1, '1', 1, 1, '2012-10-02 16:00:58'),
(2, '1', 1, 1, '2012-10-02 16:26:11'),
(3, '9', 1, 1, '2012-10-02 16:01:50'),
(4, '9', 1, 1, '2012-10-02 16:01:51'),
(5, '9', 1, 1, '2012-10-02 16:01:52'),
(6, '9', 2, 0, '2012-10-02 16:01:58'),
(7, '9', 1, 0, '2012-10-02 16:01:59'),
(8, '9', 3, 0, '2012-10-02 16:02:00'),
(9, '9', 3, 0, '2012-10-02 16:02:00'),
(10, '9', 3, 1, '2012-10-02 16:02:01'),
(11, '9', 2, 1, '2012-10-02 16:02:02'),
(12, '9', 1, 0, '2012-10-02 16:02:03'),
(13, '9', 1, 0, '2012-10-02 16:10:22'),
(14, '9', 1, 0, '2012-10-02 16:10:24'),
(15, '9', 3, 0, '2012-10-02 16:10:49'),
(16, '9', 3, 1, '2012-10-02 16:10:58'),
(17, '9', 3, 1, '2012-10-02 19:27:19');

-- --------------------------------------------------------

--
-- Table structure for table `register`
--

CREATE TABLE IF NOT EXISTS `register` (
  `id` int(5) NOT NULL AUTO_INCREMENT,
  `user` varchar(20) NOT NULL,
  `email` varchar(50) NOT NULL,
  `password` varchar(20) NOT NULL,
  `toe` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  UNIQUE KEY `user` (`user`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=10 ;

--
-- Dumping data for table `register`
--

INSERT INTO `register` (`id`, `user`, `email`, `password`, `toe`) VALUES
(8, 'tarun', 'tarun@gmail.com', '1234', '2012-10-02 10:45:49'),
(9, 'nikesh', 'nikesh@gmail.com', '12345', '2012-10-02 14:00:29');
