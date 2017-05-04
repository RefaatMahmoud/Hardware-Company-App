-- phpMyAdmin SQL Dump
-- version 2.11.6
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: May 03, 2017 at 03:07 AM
-- Server version: 5.0.51
-- PHP Version: 5.2.6

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

CREATE TABLE `adminusers` (
  `UserID` int(11) NOT NULL auto_increment,
  `Username` varchar(255) character set utf8 NOT NULL,
  `Password` varchar(255) character set utf8 NOT NULL,
  `Email` varchar(255) character set utf8 NOT NULL,
  `FullName` varchar(255) character set utf8 NOT NULL,
  `Date` date NOT NULL,
  PRIMARY KEY  (`UserID`),
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
-- Table structure for table `buy`
--

CREATE TABLE `buy` (
  `id` int(10) NOT NULL auto_increment,
  `namecard` varchar(20) character set utf8 NOT NULL,
  `cardnumber` varchar(255) NOT NULL,
  `phone` int(11) NOT NULL,
  `address` varchar(40) character set utf8 NOT NULL,
  `name` varchar(20) NOT NULL,
  `price` float NOT NULL,
  PRIMARY KEY  (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=6 ;

--
-- Dumping data for table `buy`
--

INSERT INTO `buy` (`id`, `namecard`, `cardnumber`, `phone`, `address`, `name`, `price`) VALUES
(1, 'Payoneer', '69b4a024dcc4accbd0da9e5dddb00457e224cb91', 100316844, 's;lkfg;lkfdg', 'Acer', 8000),
(2, 'Payoneer', '9b7bd6b535813e9daf077b735dad26c09e5ff635', 1003616844, 'ajsklfjasdkljf', 'Toshiba', 7000),
(3, 'Payoneer', 'e3bb41308208032573a0ec26389b54b10e2ac0e2', 1003616844, 'kajsdfklajsdfklj', 'Apple', 10000),
(4, 'Payoneer', '6efff04a64b293f5156e0ce34d1c393f07f4e5b8', 1003616844, 'dkjwlsjf', 'Toshiba', 7000),
(5, 'Payoneer', '6efff04a64b293f5156e0ce34d1c393f07f4e5b8', 1003616844, 'dkjwlsjf', 'Toshiba', 7000);

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `ID` int(11) NOT NULL auto_increment,
  `Name` varchar(255) character set utf8 NOT NULL,
  `Description` text character set utf8 NOT NULL,
  PRIMARY KEY  (`ID`)
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

CREATE TABLE `contacts` (
  `id` int(11) NOT NULL auto_increment,
  `name` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `message` text NOT NULL,
  PRIMARY KEY  (`id`),
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

CREATE TABLE `items` (
  `ItemID` int(11) NOT NULL auto_increment,
  `image` varchar(255) character set utf8 NOT NULL,
  `Name` varchar(255) character set utf8 NOT NULL,
  `Description` text character set utf8 NOT NULL,
  `Price` varchar(255) character set utf8 NOT NULL,
  `Add_Date` date NOT NULL,
  `Country_Made` varchar(255) character set utf8 NOT NULL,
  `Status` varchar(255) character set utf8 NOT NULL,
  `Cat_ID` int(11) NOT NULL,
  `Member_ID` int(11) NOT NULL,
  PRIMARY KEY  (`ItemID`),
  KEY `con3` (`Member_ID`),
  KEY `const1` (`Cat_ID`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=16 ;

--
-- Dumping data for table `items`
--

INSERT INTO `items` (`ItemID`, `image`, `Name`, `Description`, `Price`, `Add_Date`, `Country_Made`, `Status`, `Cat_ID`, `Member_ID`) VALUES
(4, '5514526_lab4.JPG', 'Dell', 'Laptop;Ram:8GB;HD:1Tera', '4000', '2017-04-24', 'china', '2', 5, 1),
(5, '17871093_lab5.png', 'Hp', 'Laptop;Ram:8GB;HDD:1Tera;Navidia:2GB;Core i5', '5000', '2017-04-24', 'china', '2', 5, 4),
(12, '80264283_lab4.png', 'Dell', 'Laptop;Ram:6GB;HD:1Tera;Cori3', '4000', '2017-04-24', 'china', '1', 5, 1),
(13, '3790283_lab5.jpeg', 'HP', 'Laptop;Ram:6GB;HD:1Tera;Cori5', '5000', '2017-04-24', 'china', '1', 5, 1),
(14, '3668212_lab6.png', 'Apple', 'Laptop;Ram:8GB;HD:1.5Tera;Cori5', '10000', '2017-04-24', 'china', '2', 5, 1);

-- --------------------------------------------------------

--
-- Table structure for table `uploaditems`
--

CREATE TABLE `uploaditems` (
  `ID` int(11) NOT NULL auto_increment,
  `Name` varchar(255) character set utf8 NOT NULL,
  `Model` varchar(255) character set utf8 NOT NULL,
  `Price` varchar(255) collate utf8_czech_ci NOT NULL,
  `image` varchar(255) character set utf8 NOT NULL,
  `status` varchar(255) collate utf8_czech_ci NOT NULL,
  PRIMARY KEY  (`ID`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_czech_ci AUTO_INCREMENT=25 ;

--
-- Dumping data for table `uploaditems`
--

INSERT INTO `uploaditems` (`ID`, `Name`, `Model`, `Price`, `image`, `status`) VALUES
(12, 'Dell', 'Laptop;Ram:8GB;HD:1Tera	', '4000', '47753906_lab4.JPG', '1'),
(13, 'Hp', 'Laptop;Ram:8GB;HD:1Tera;Navidia:2GB;Core i5	', '5000', '72711182_lab5.png', '1'),
(21, 'Dell', 'Laptop;Ram:6GB;HDD:1Tera;Core i3	', '4000', '27581787_lab4.JPG', '3'),
(22, 'HP', 'Laptop;Ram:6GB;HDD:1Tera;Core i5	', '5000', '44036865_lab5.jpeg', '3'),
(23, 'Apple', 'Laptop;Ram:8GB;HDD:1.5Tera;Core i5	', '10000', '97213746_lab6.jpg', '3');

-- --------------------------------------------------------

--
-- Table structure for table `useraccount`
--

CREATE TABLE `useraccount` (
  `id` int(11) NOT NULL auto_increment,
  `name` varchar(25) character set utf8 NOT NULL,
  `password` varchar(50) character set utf8 NOT NULL,
  `email` varchar(50) character set utf8 NOT NULL,
  `phone` int(11) NOT NULL,
  PRIMARY KEY  (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

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
