-- phpMyAdmin SQL Dump
-- version 3.3.9
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Apr 27, 2017 at 09:38 AM
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
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=8 ;

--
-- Dumping data for table `adminusers`
--

INSERT INTO `adminusers` (`UserID`, `Username`, `Password`, `Email`, `FullName`, `Date`) VALUES
(1, 'Refaat', '3d4f2bf07dc1be38b20cd6e46949a1071f9d0e3d', 'refo@gmail.com', 'Refaat Aish', '2017-03-07'),
(3, 'Abdelrahman', '273a0c7bd3c679ba9a6f5d99078e36e85d02b952', 'Abosi@gmail.com', 'Abdelrahman Mohamed', '2017-03-07'),
(4, 'Ahmed', '77bce9fb18f977ea576bbcd143b2b521073f0cd6', 'Dias@gmail.com', 'Ahmed Eldiasy', '2017-03-07'),
(5, 'Shokry', '42cfe854913594fe572cb9712a188e829830291f', 'sheko@hotmail.com', 'Shokry soliman', '2017-03-07'),
(6, 'Hussien', '6fbcf2da48bf52bbe74cc83d13a104977574a19d', 'Hussien12@yahoo.com', 'Hussien Asous', '2017-03-07'),
(7, 'Sayde', '44bf3f4d70350b90cf4f967fae75d7e8b3f3cd5e', 'Fo@gmail.com', 'Sayed Aish', '2017-03-08');

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE IF NOT EXISTS `categories` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `Name` varchar(255) CHARACTER SET utf32 NOT NULL,
  `Description` text CHARACTER SET utf32 NOT NULL,
  `Comments` varchar(255) CHARACTER SET utf32 NOT NULL,
  PRIMARY KEY (`ID`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`ID`, `Name`, `Description`, `Comments`) VALUES
(1, 'Microwaves', 'Save Food', '');

-- --------------------------------------------------------

--
-- Table structure for table `contacts`
--

CREATE TABLE IF NOT EXISTS `contacts` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `message` text NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `id` (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=8 ;

--
-- Dumping data for table `contacts`
--

INSERT INTO `contacts` (`id`, `name`, `email`, `message`) VALUES
(3, 'Hussein', 'husseinasous@yahoo.com', 'Hi, i am hussein a special agent like 007!!'),
(5, 'sdsdsds', 'dsdsds', 'dsdsdsd'),
(6, 'sayed', 'sayedabdo@gmail.com', 'hi, iam sayed abdo!!'),
(7, 'zead', 'zeadmohamed@yahoo.com', 'Hi, iam zead Androider!!');

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
  PRIMARY KEY (`ItemID`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=11 ;

--
-- Dumping data for table `items`
--

INSERT INTO `items` (`ItemID`, `Name`, `Description`, `Price`, `Add_Date`, `Country_Made`, `Status`, `Cat_ID`, `Member_ID`) VALUES
(10, 'Galaxy s3', 'very good', '1.500', '2017-03-11', 'Germany', 'good', 1, 1);

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
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_czech_ci AUTO_INCREMENT=9 ;

--
-- Dumping data for table `uploaditems`
--

INSERT INTO `uploaditems` (`ID`, `Name`, `Model`, `Price`, `image`, `status`) VALUES
(8, 'new item', 'hp', '2.700', '66171265_messi.jpg', '1');
