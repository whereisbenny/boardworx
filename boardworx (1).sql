-- phpMyAdmin SQL Dump
-- version 4.1.12
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Jul 22, 2014 at 11:24 PM
-- Server version: 5.5.36
-- PHP Version: 5.4.27

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `boardworx`
--

-- --------------------------------------------------------

--
-- Table structure for table `tbcustomer`
--

CREATE TABLE IF NOT EXISTS `tbcustomer` (
  `customerid` int(100) NOT NULL AUTO_INCREMENT,
  `firstname` varchar(50) NOT NULL,
  `lastname` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  `phone` varchar(20) NOT NULL,
  `street` varchar(50) NOT NULL,
  `town` varchar(20) NOT NULL,
  `city` varchar(20) NOT NULL,
  `country` varchar(20) NOT NULL,
  PRIMARY KEY (`customerid`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `tbcustomer`
--

INSERT INTO `tbcustomer` (`customerid`, `firstname`, `lastname`, `email`, `username`, `password`, `phone`, `street`, `town`, `city`, `country`) VALUES
(1, 'James', 'Ding', 'james@imagex.co.nz', 'admin', 'test', '021752345', '25 Long Street', 'Papatoetoe', 'Auckland', 'NewZealand'),
(2, 'bla', 'var', 'hello@gmail.com', 'admin', 'admin', '21212121', '50 the strand', 'parnell', 'auckland', 'new zealand');

-- --------------------------------------------------------

--
-- Table structure for table `tbproduct`
--

CREATE TABLE IF NOT EXISTS `tbproduct` (
  `productid` int(20) NOT NULL AUTO_INCREMENT,
  `productname` varchar(100) NOT NULL,
  `price` float NOT NULL,
  `typeid` int(50) NOT NULL,
  `picturelink` varchar(50) NOT NULL,
  PRIMARY KEY (`productid`),
  KEY `typeid_2` (`typeid`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=44 ;

--
-- Dumping data for table `tbproduct`
--

INSERT INTO `tbproduct` (`productid`, `productname`, `price`, `typeid`, `picturelink`) VALUES
(4, 'BURTON SHIFT', 699, 1, 'boards/1.png'),
(9, 'BURTON TIDE', 599, 1, 'boards/2.png'),
(10, 'BURTON BLITZ', 649, 1, 'boards/3.png'),
(11, 'GNU SHAFT', 499, 1, 'boards/4.png'),
(12, 'SKATE BANANA', 799, 1, 'boards/5.png'),
(13, 'CUSTOM', 549, 1, 'boards/6.png'),
(14, 'POWER', 249, 2, 'boots/1.png'),
(15, 'STYLE', 349, 2, 'boots/2.png'),
(16, 'BREEZE', 299, 2, 'boots/3.png'),
(17, 'DELUXE', 399, 2, 'boots/4.png'),
(18, 'SAGE', 249, 2, 'boots/5.png'),
(19, 'ADVENTURE', 349, 2, 'boots/6.png'),
(20, 'LOAD', 249, 3, 'bindings/1.png'),
(21, 'STYLE', 199, 3, 'bindings/2.png'),
(22, 'JAZZLE', 299, 3, 'bindings/3.png'),
(23, 'POWDER', 349, 3, 'bindings/4.png'),
(24, 'LOUD', 299, 3, 'bindings/5.png'),
(25, 'DOME', 199, 3, 'bindings/6.png'),
(26, 'STYLE', 449, 4, 'jackets/1.png'),
(27, 'MULTI', 249, 4, 'jackets/2.png'),
(28, 'ZEON', 199, 4, 'jackets/3.png'),
(29, 'BLING', 299, 4, 'jackets/4.png'),
(30, 'HARVEST', 399, 4, 'jackets/5.png'),
(31, 'CAPRI', 349, 4, 'jackets/6.png'),
(32, 'ACTIVE', 199, 5, 'goggles/1.png'),
(33, 'ID2', 249, 5, 'goggles/2.png'),
(34, 'PINNER', 299, 5, 'goggles/3.png'),
(35, 'APXS', 399, 5, 'goggles/4.png'),
(36, 'POP', 349, 5, 'goggles/5.png'),
(37, 'ROUGE', 299, 5, 'goggles/6.png'),
(38, 'WOODERSON', 299, 6, 'pants/1.png'),
(39, 'HOLDEN', 399, 6, 'pants/2.png'),
(40, 'MONARCH', 249, 6, 'pants/3.png'),
(41, 'SLAUSON', 379, 6, 'pants/4.png'),
(42, 'MUIR', 229, 6, 'pants/5.png'),
(43, 'HAMMER', 189, 6, 'pants/6.png');

-- --------------------------------------------------------

--
-- Table structure for table `tbproducttype`
--

CREATE TABLE IF NOT EXISTS `tbproducttype` (
  `typeid` int(50) NOT NULL AUTO_INCREMENT,
  `typename` varchar(100) NOT NULL,
  `picturelink` varchar(50) NOT NULL,
  PRIMARY KEY (`typeid`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=7 ;

--
-- Dumping data for table `tbproducttype`
--

INSERT INTO `tbproducttype` (`typeid`, `typename`, `picturelink`) VALUES
(1, 'BOARDS', 'board.png'),
(2, 'BOOTS', 'boot.png'),
(3, 'BINDINGS', 'bind.png'),
(4, 'JACKETS', 'jacket.png'),
(5, 'GOGGLES', 'goggle.png'),
(6, 'PANTS', 'pants.png');

--
-- Constraints for dumped tables
--

--
-- Constraints for table `tbproduct`
--
ALTER TABLE `tbproduct`
  ADD CONSTRAINT `tbproduct_ibfk_1` FOREIGN KEY (`typeid`) REFERENCES `tbproducttype` (`typeid`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
