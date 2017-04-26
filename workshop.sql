-- phpMyAdmin SQL Dump
-- version 3.3.9
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Apr 26, 2017 at 03:23 PM
-- Server version: 5.5.8
-- PHP Version: 5.3.5

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `workshop`
--

-- --------------------------------------------------------

--
-- Table structure for table `adminusers`
--

CREATE TABLE IF NOT EXISTS `adminusers` (
  `UserID` int(11) NOT NULL AUTO_INCREMENT,
  `Username` varchar(255) CHARACTER SET utf8 NOT NULL,
  `Password` varchar(255) CHARACTER SET utf8 NOT NULL,
  `Email` varchar(255) CHARACTER SET utf8 NOT NULL,
  `FullName` varchar(255) CHARACTER SET utf8 NOT NULL,
  `Date` date NOT NULL,
  PRIMARY KEY (`UserID`),
  UNIQUE KEY `Username` (`Username`,`Email`,`FullName`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=16 ;

--
-- Dumping data for table `adminusers`
--

INSERT INTO `adminusers` (`UserID`, `Username`, `Password`, `Email`, `FullName`, `Date`) VALUES
(1, 'Refaat', '3d4f2bf07dc1be38b20cd6e46949a1071f9d0e3d', 'refo@gmail.com', 'Refaat Aish', '2017-03-07'),
(3, 'Abdelrahman', '273a0c7bd3c679ba9a6f5d99078e36e85d02b952', 'Abosi@gmail.com', 'Abdelrahman Mohamed', '2017-03-07'),
(4, 'Ahmed', '77bce9fb18f977ea576bbcd143b2b521073f0cd6', 'Dias@gmail.com', 'Ahmed Eldiasy', '2017-03-07'),
(6, 'Hussien', 'b7c40b9c66bc88d38a59e554c639d743e77f1b65', 'Hussien12@yahoo.com', 'Hussien Asous', '2017-03-07'),
(14, 'refo', '92b8ecb910f49f28ecc47738bac7224a92ace9dd', 'hima@gmail.com', 'Abdelrahman Mohamed', '2017-03-15'),
(15, 'shokry', 'f7c3bc1d808e04732adf679965ccc34ca7ae3441', 'shokrysuleiman032@gmail.com', 'Shokry Suleiman', '0000-00-00');

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE IF NOT EXISTS `categories` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `Name` varchar(255) CHARACTER SET utf32 NOT NULL,
  `Description` text CHARACTER SET utf32 NOT NULL,
  PRIMARY KEY (`ID`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=8 ;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`ID`, `Name`, `Description`) VALUES
(1, 'Computers', 'This category will be about all new and used computers with all models'),
(5, 'Laptop', 'This category will be about all new and used computers with all models .....'),
(6, 'Mobiles', 'This category will be about all new and used computers with all models ...\r\n'),
(7, 'Tablets', 'This category will be about all new and used Tablets with all models');

-- --------------------------------------------------------

--
-- Table structure for table `items`
--

CREATE TABLE IF NOT EXISTS `items` (
  `ItemID` int(11) NOT NULL AUTO_INCREMENT,
  `Name` varchar(255) CHARACTER SET utf8 NOT NULL,
  `Description` text CHARACTER SET utf8 NOT NULL,
  `Price` varchar(255) CHARACTER SET utf8 NOT NULL,
  `Add_Date` date NOT NULL,
  `Country_Made` varchar(255) CHARACTER SET utf8 NOT NULL,
  `Status` varchar(255) CHARACTER SET utf8 NOT NULL,
  `Cat_ID` int(11) NOT NULL,
  `Member_ID` int(11) NOT NULL,
  PRIMARY KEY (`ItemID`),
  KEY `con3` (`Member_ID`),
  KEY `const1` (`Cat_ID`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=16 ;

--
-- Dumping data for table `items`
--

INSERT INTO `items` (`ItemID`, `Name`, `Description`, `Price`, `Add_Date`, `Country_Made`, `Status`, `Cat_ID`, `Member_ID`) VALUES
(1, 'Laptop Dell', 'good lap', '$1200', '2017-04-13', 'England', '2', 5, 1),
(3, 'Iphone 6', 'good phone', '$1200', '2017-04-10', 'chines', '1', 6, 1),
(4, 'Dell', 'Laptop;Ram:8GB;HD:1Tera', '4000', '2017-04-24', 'china', '2', 5, 15),
(5, 'Hp', 'Laptop;Ram:8GB;HD:1Tera;Navidia:2GB;Cori5', '5000', '2017-04-24', 'china', '2', 5, 15),
(6, 'Apple', 'Laptop;Ram:12GB;HD:1.5Tera;Cori7', '10000', '2017-04-24', 'china', '2', 5, 15),
(7, 'Toshiba', 'Laptop;Ram:8GB;HD:1.5Tera;Navidia:2GB;Cori7', '7000', '2017-04-24', 'china', '2', 5, 15),
(8, 'Acer', 'Laptop;Ram:8GB;HD:1.5Tera;Navidia:2GB;Cori7', '8000', '2017-04-24', 'china', '2', 5, 15),
(9, 'SONY', 'Laptop;Ram:8GB;HD:1.5Tera;Navidia:4GB;Cori7', '9000', '2017-04-24', 'china', '2', 5, 15),
(10, 'Vio', 'Laptop;Ram:12GB;HD:1.5Tera;Navidia:4GB;Cori7', '11000', '2017-04-24', 'china', '2', 5, 15),
(11, 'Lenovo', 'Laptop;Ram:12GB;HD:1.5Tera;Navidia:2GB;Cori7', '12000', '2017-04-24', 'china', '2', 5, 15),
(12, 'Dell', 'Laptop;Ram:6GB;HD:1Tera;Cori3', '4000', '2017-04-24', 'china', '2', 5, 15),
(13, 'HP', 'Laptop;Ram:6GB;HD:1Tera;Cori5', '5000', '2017-04-24', 'china', '2', 5, 15),
(14, 'Apple', 'Laptop;Ram:8GB;HD:1.5Tera;Cori5', '10000', '2017-04-24', 'china', '2', 5, 15),
(15, 'Toshiba', 'Laptop;Ram:8GB;HD:1Tera;Cori5;AMD:2GB', '7000', '2017-04-24', 'china', '2', 5, 15);

-- --------------------------------------------------------

--
-- Table structure for table `uploaditems`
--

CREATE TABLE IF NOT EXISTS `uploaditems` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `Name` varchar(255) CHARACTER SET utf32 NOT NULL,
  `Model` varchar(255) CHARACTER SET utf32 NOT NULL,
  `Price` varchar(255) COLLATE utf8_czech_ci NOT NULL,
  `image` varchar(255) CHARACTER SET utf32 NOT NULL,
  `status` varchar(255) COLLATE utf8_czech_ci NOT NULL,
  PRIMARY KEY (`ID`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_czech_ci AUTO_INCREMENT=8 ;

--
-- Dumping data for table `uploaditems`
--

INSERT INTO `uploaditems` (`ID`, `Name`, `Model`, `Price`, `image`, `status`) VALUES
(3, 'pc', 'asdf', '123', '32492065_1.PNG', '2'),
(4, 'laptop mac', '12312', '1200', '97116089_10.jpg', '2'),
(5, 'pc3', '123dsaf', '12800$', '15237426_8.PNG', '1'),
(6, 'laptop mac', '12ssasdf', '90012', '80871582_baby-violet-eyes.jpg', '0'),
(7, 'qwe', 'wqe', '213', '7031250_7.PNG', '3');

--
-- Constraints for dumped tables
--

--
-- Constraints for table `items`
--
ALTER TABLE `items`
  ADD CONSTRAINT `con3` FOREIGN KEY (`Member_ID`) REFERENCES `adminusers` (`UserID`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `const1` FOREIGN KEY (`Cat_ID`) REFERENCES `categories` (`ID`) ON DELETE CASCADE ON UPDATE CASCADE;
