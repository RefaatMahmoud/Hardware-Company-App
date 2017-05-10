-- phpMyAdmin SQL Dump
-- version 3.3.9
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: May 10, 2017 at 10:39 PM
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
(15, 'shokry', 'f7c3bc1d808e04732adf679965ccc34ca7ae3441', 'shokrysuleiman032@gmail.com', 'Shokry Suleiman', '0000-00-00');

-- --------------------------------------------------------

--
-- Table structure for table `buy`
--

CREATE TABLE IF NOT EXISTS `buy` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `namecard` varchar(20) CHARACTER SET utf8 NOT NULL,
  `cardnumber` varchar(255) NOT NULL,
  `phone` int(11) NOT NULL,
  `address` varchar(40) CHARACTER SET utf8 NOT NULL,
  `name` varchar(20) NOT NULL,
  `price` float NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=9 ;

--
-- Dumping data for table `buy`
--

INSERT INTO `buy` (`id`, `namecard`, `cardnumber`, `phone`, `address`, `name`, `price`) VALUES
(1, 'Payoneer', '69b4a024dcc4accbd0da9e5dddb00457e224cb91', 100316844, 's;lkfg;lkfdg', 'Acer', 8000),
(2, 'Payoneer', '9b7bd6b535813e9daf077b735dad26c09e5ff635', 1003616844, 'ajsklfjasdkljf', 'Toshiba', 7000),
(3, 'Payoneer', 'e3bb41308208032573a0ec26389b54b10e2ac0e2', 1003616844, 'kajsdfklajsdfklj', 'Apple', 10000),
(4, 'Payoneer', '6efff04a64b293f5156e0ce34d1c393f07f4e5b8', 1003616844, 'dkjwlsjf', 'Toshiba', 7000),
(5, 'Payoneer', '6efff04a64b293f5156e0ce34d1c393f07f4e5b8', 1003616844, 'dkjwlsjf', 'Toshiba', 7000),
(6, 'Payoneer', 'fc1b6c9058ad732160df6eceb14bfc02b3bc111f', 1003616844, ';asodifodsf', 'Apple', 10000),
(7, 'Payoneer', '67d0fcaa17d1ced9dab87853448ae0f6ede8f23e', 1003616844, ';wpoierport', 'Dell', 4000),
(8, 'Payoneer', '69040769272e7027f0c1a5cd3fbb23dc0c079872', 1003616844, '?????????', 'HP', 5000);

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE IF NOT EXISTS `categories` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `Name` varchar(255) CHARACTER SET utf8 NOT NULL,
  `Description` text CHARACTER SET utf8 NOT NULL,
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
-- Table structure for table `contacts`
--

CREATE TABLE IF NOT EXISTS `contacts` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `message` text NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `id` (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=10 ;

--
-- Dumping data for table `contacts`
--

INSERT INTO `contacts` (`id`, `name`, `email`, `message`) VALUES
(3, 'Hussein', 'husseinasous@yahoo.com', 'Hi, i am hussein a special agent like 007!!'),
(5, 'sdsdsds', 'dsdsds', 'dsdsdsd'),
(6, 'sayed', 'sayedabdo@gmail.com', 'hi, iam sayed abdo!!'),
(7, 'zead', 'zeadmohamed@yahoo.com', 'Hi, iam zead Androider!!'),
(8, 'Zead', 'zead.com', 'Never'),
(9, 'Name', 'Email', 'Message');

-- --------------------------------------------------------

--
-- Table structure for table `items`
--

CREATE TABLE IF NOT EXISTS `items` (
  `ItemID` int(11) NOT NULL AUTO_INCREMENT,
  `image` varchar(255) CHARACTER SET utf8 NOT NULL,
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
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=7 ;

--
-- Dumping data for table `items`
--

INSERT INTO `items` (`ItemID`, `image`, `Name`, `Description`, `Price`, `Add_Date`, `Country_Made`, `Status`, `Cat_ID`, `Member_ID`) VALUES
(1, '55493164_lab4.png', 'DELL', '???????????????', '9000', '2017-05-10', 'china', '1', 5, 1),
(2, '19375610_lab5.jpeg', 'HP', '???????????????', '8000', '2017-05-10', 'germany', '2', 5, 4),
(3, '73928833_lab3.png', 'Apple', '???????????????', '9000', '2017-05-10', 'china', '1', 5, 1),
(4, '41802978_lab8.jpg', 'ACER', '???????????????', '8999', '2017-05-10', 'china', '2', 5, 3),
(5, '87704468_lab3.png', 'Apple', '???????????????', '12000', '2017-05-10', 'china', '2', 5, 1),
(6, '6854248_lab6.jpg', 'Apple', '???????????????', '9000', '2017-05-10', 'china', '2', 5, 1);

-- --------------------------------------------------------

--
-- Table structure for table `uploaditems`
--

CREATE TABLE IF NOT EXISTS `uploaditems` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `Name` varchar(255) CHARACTER SET utf8 NOT NULL,
  `Model` varchar(255) CHARACTER SET utf8 NOT NULL,
  `Price` varchar(255) COLLATE utf8_czech_ci NOT NULL,
  `image` varchar(255) CHARACTER SET utf8 NOT NULL,
  `status` varchar(255) COLLATE utf8_czech_ci NOT NULL,
  PRIMARY KEY (`ID`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_czech_ci AUTO_INCREMENT=13 ;

--
-- Dumping data for table `uploaditems`
--

INSERT INTO `uploaditems` (`ID`, `Name`, `Model`, `Price`, `image`, `status`) VALUES
(1, 'DELL', 'Latitude E610', '5000', '50772095_lab4.png', '1'),
(2, 'Apple', 'Latter 321', '9000', '86254883_lab3.png', '1'),
(3, 'ACER', 'Lattiude 5ss', '6000', '16519165_lab8.jpg', '1'),
(4, 'Apple', 'PhiPhon', '12000', '76956177_lab6.jpg', '2'),
(5, 'TOHIBA', 'Latitude 44', '8000', '92950440_lab7.jpg', '2'),
(6, 'Sony', 'Latitude E610', '7000', '89019776_lab9.png', '1'),
(7, 'DELL', 'Latitude E555', '4500', '86834717_lab10.jpg', '2'),
(8, 'DELL', 'Latitude E610', '8999', '40316772_lab4.png', '2'),
(9, 'Sony', 'PhiPhon 5s', '5500', '62780762_lab9.png', '3'),
(10, 'HP', 'probook 450 g1', '9500', '77514649_lab11.jpg', '3'),
(11, 'LENOVO', 'Latitude E610', '7000', '87026978_lab11.png', '3'),
(12, 'DELL', 'Latitude E610', '6899', '3646850_lab4.png', '3');

-- --------------------------------------------------------

--
-- Table structure for table `useraccount`
--

CREATE TABLE IF NOT EXISTS `useraccount` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(25) CHARACTER SET utf8 NOT NULL,
  `password` varchar(50) CHARACTER SET utf8 NOT NULL,
  `email` varchar(50) CHARACTER SET utf8 NOT NULL,
  `phone` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `useraccount`
--

INSERT INTO `useraccount` (`id`, `name`, `password`, `email`, `phone`) VALUES
(1, 'Ahmed', 'bf85cd6726e5995f55de4e9faf4360eb81e9a186', 'ahmedeldiasty565@gmail.com', 1210344798);

--
-- Constraints for dumped tables
--

--
-- Constraints for table `items`
--
ALTER TABLE `items`
  ADD CONSTRAINT `con3` FOREIGN KEY (`Member_ID`) REFERENCES `adminusers` (`UserID`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `const1` FOREIGN KEY (`Cat_ID`) REFERENCES `categories` (`ID`) ON DELETE CASCADE ON UPDATE CASCADE;
