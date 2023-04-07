-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Dec 04, 2022 at 08:20 PM
-- Server version: 5.7.36
-- PHP Version: 7.4.26

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `cowboy_property_management`
--

-- --------------------------------------------------------

--
-- Table structure for table `application`
--

DROP TABLE IF EXISTS `application`;
CREATE TABLE IF NOT EXISTS `application` (
  `applicationId` int(11) NOT NULL AUTO_INCREMENT,
  `customerId` int(11) NOT NULL,
  `date` date NOT NULL,
  `leaseId` int(11) DEFAULT NULL,
  `status` varchar(15) NOT NULL,
  `unitType` varchar(15) NOT NULL,
  PRIMARY KEY (`applicationId`)
) ENGINE=MyISAM AUTO_INCREMENT=27 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `application`
--

INSERT INTO `application` (`applicationId`, `customerId`, `date`, `leaseId`, `status`, `unitType`) VALUES
(1, 1, '2022-01-01', 1, 'approved', 'studio'),
(2, 2, '2022-03-02', NULL, 'rejected', 'apartment'),
(3, 2, '2022-03-02', 2, 'approved', 'studio'),
(4, 3, '2022-05-01', 3, 'approved', 'studio'),
(5, 4, '2022-01-01', 4, 'approved', 'apartment'),
(6, 5, '2022-01-01', 5, 'approved', 'townhome'),
(7, 6, '2022-03-02', 6, 'approved', 'townhome'),
(8, 7, '2022-01-01', NULL, 'rejected', 'condo'),
(9, 8, '2019-01-01', 7, 'approved', 'townhome'),
(10, 9, '2022-09-01', 8, 'approved', 'condo'),
(11, 10, '2022-01-01', 9, 'approved', 'condo'),
(12, 11, '2019-01-01', 10, 'approved', 'condo'),
(13, 12, '2018-01-02', 11, 'approved', 'townhome'),
(14, 13, '2021-01-01', 12, 'approved', 'condo'),
(15, 14, '2021-06-05', 13, 'approved', 'condo'),
(16, 15, '2021-06-05', 14, 'approved', 'condo'),
(17, 16, '2022-01-05', 15, 'approved', 'townhome'),
(18, 17, '2021-03-01', 16, 'approved', 'townhome'),
(19, 18, '2022-11-15', 17, 'approved', 'condo'),
(20, 19, '2020-03-09', 18, 'approved', 'townhome'),
(21, 20, '2021-01-01', 19, 'approved', 'townhome'),
(22, 7, '2022-11-27', 20, 'approved', 'studio'),
(26, 20, '2023-01-01', 24, 'submitted', 'studio');

-- --------------------------------------------------------

--
-- Table structure for table `complaint`
--

DROP TABLE IF EXISTS `complaint`;
CREATE TABLE IF NOT EXISTS `complaint` (
  `complaintId` int(11) NOT NULL AUTO_INCREMENT,
  `leaseId` int(11) DEFAULT NULL,
  `complainant` int(11) DEFAULT NULL,
  `offender` int(11) DEFAULT NULL,
  `type` varchar(15) NOT NULL,
  `description` varchar(6000) NOT NULL,
  `dateTime` datetime NOT NULL,
  PRIMARY KEY (`complaintId`)
) ENGINE=MyISAM AUTO_INCREMENT=32 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `complaint`
--

INSERT INTO `complaint` (`complaintId`, `leaseId`, `complainant`, `offender`, `type`, `description`, `dateTime`) VALUES
(1, 1, 1, 8, 'noise', 'Achoo is being so ridiculously noisy! It\'s unbearable.', '2022-11-18 07:54:00'),
(2, 1, 1, 8, 'noise', 'How many times do I have to complain about Achoo! They are being noisy... again!', '2022-11-09 06:54:00'),
(3, 1, 1, 8, 'noise', 'This is the third time this week... this is getting ridiculous. Achoo has their stereo cranked so loud!', '2022-11-10 07:36:00'),
(18, 19, 22, NULL, 'trash', 'The trash has yet to be taken out to the curb please send your people thank you', '2022-11-27 12:33:00'),
(8, 1, 1, NULL, 'smell', 'take care of the trashhhhh', '2022-11-20 09:11:00'),
(9, 1, 1, NULL, 'smell', 'You still haven\'t taken care of the trash and it smells SO BAD.', '2022-11-20 09:15:00'),
(17, 19, 22, NULL, 'trash', 'The trash company has yet to come please help', '2022-11-30 13:34:00'),
(19, 5, 7, NULL, 'noise', 'My neighbor is shooting off fireworks for some reason. It\'s snowing outside and they\'re shooting off fireworks!', '2022-11-29 15:13:00'),
(16, 19, 22, NULL, 'safety', 'Seems like something is prowling outside but I\'m too scared to investigate', '2022-11-25 01:33:00'),
(15, 4, 6, NULL, 'noise', 'Someone is yelling at the top of their lungs right outside the house. Can you please send security over? Sounds like an argument.', '2022-11-04 00:30:00'),
(13, 4, 6, NULL, 'safety', 'There was a man who looked really shady who was looking into people\'s open garages.', '2022-11-02 12:18:00'),
(14, 4, 6, NULL, 'trash', 'The trash company has yet to come by and the trash is seriously overflowing.', '2022-11-27 12:19:00'),
(20, 5, 7, NULL, 'smell', 'The trash company has not come in ten days. Please contact them.', '2022-08-11 15:14:00'),
(21, 5, 7, NULL, 'none', 'Very suspicious man looking in my window at 3 am', '2022-11-04 03:14:00'),
(22, 5, 7, NULL, 'trash', 'Hey the trash company is late again please contact them. Horrible smell when they don\'t come', '2022-09-30 15:15:00'),
(23, 15, 18, NULL, 'safety', 'Creepy person walking around neighborhood 3 am this mornin', '2022-11-29 03:18:00'),
(24, 15, 18, NULL, 'noise', 'yesterday them kids was so loud I couldn\'t sleep. ', '2022-09-09 03:18:00'),
(25, 15, 18, NULL, 'noise', 'they real loud again', '2022-10-18 15:19:00'),
(26, 15, 18, NULL, 'trash', 'the trash ppl haven\'t come yet', '2022-11-09 16:19:00'),
(27, 15, 18, NULL, 'safety', 'i saw that person again this mornin he was lookin in windows', '2022-11-29 03:20:00'),
(28, 19, 22, NULL, 'trash', 'The trash company hasn\'t come for a week', '2022-12-03 10:19:00'),
(29, 1, 3, NULL, 'smell', 'Bad smell coming out of sewer. Please investigate', '2022-11-15 12:21:00'),
(30, 1, 3, NULL, 'smell', 'Horrible smell coming out the sink', '2022-12-04 12:42:00'),
(31, 1, 3, NULL, 'noise', 'Kids really loud. Please call security', '2022-12-04 01:12:00');

-- --------------------------------------------------------

--
-- Table structure for table `customer`
--

DROP TABLE IF EXISTS `customer`;
CREATE TABLE IF NOT EXISTS `customer` (
  `customerId` int(11) NOT NULL AUTO_INCREMENT,
  `userId` int(11) DEFAULT NULL,
  `activeRenter` int(1) DEFAULT NULL,
  `leasePartySize` int(2) DEFAULT NULL,
  `CountNoiseComplaints` int(3) DEFAULT NULL,
  `firstName` varchar(80) NOT NULL,
  `lastName` varchar(80) NOT NULL,
  `dOB` date NOT NULL,
  `email` varchar(80) NOT NULL,
  `phone` bigint(12) NOT NULL,
  PRIMARY KEY (`customerId`)
) ENGINE=MyISAM AUTO_INCREMENT=31 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `customer`
--

INSERT INTO `customer` (`customerId`, `userId`, `activeRenter`, `leasePartySize`, `CountNoiseComplaints`, `firstName`, `lastName`, `dOB`, `email`, `phone`) VALUES
(1, 3, 1, 3, 0, 'Bob', 'Customer', '1965-05-05', 'bcustomer@example.com', 8011234567),
(2, 4, 0, 2, 0, 'Jeremy', 'Hilary', '2000-02-11', 'jhilary@example.com', 123456789),
(3, 5, 1, 2, 0, 'Wano', 'Schrum', '1950-06-03', 'wschrum@example.com', 8011234577),
(4, 6, 1, 2, 0, 'Alison', 'Wakenheimer', '1987-05-02', 'awaken@example.com', 6041234758),
(5, 7, 1, 1, 0, 'Balina', 'Ao', '1998-06-02', 'bao@example.com', 8005649870),
(6, 8, 1, 4, 0, 'Siegfried', 'Jensen', '1977-08-05', 'sjensen@example.com', 5002134568),
(7, 9, 0, 3, 0, 'Gandolf', 'Greyfield', '1982-06-03', 'grey@example.com', 6058459786),
(8, 10, 1, 1, 3, 'Achoo', 'Sneezy', '1956-03-02', 'sneezy@example.com', 2131231569),
(9, 11, 1, 2, 0, 'Helga', 'Ornery', '1687-09-30', 'helga@example.com', 1252369568),
(10, 12, 1, 1, 0, 'Abatha', 'Abe', '1967-05-04', 'abe@example.com', 5695874568),
(11, 13, 1, 1, 0, 'Kole', 'Kolini', '1952-06-18', 'kolini@example.com', 1894569875),
(12, 14, 1, 1, 0, 'Kyle', 'Kylini', '1943-08-09', 'kylini@example.com', 1644563698),
(13, 15, 1, 1, 1, 'Boberini', 'Bolithopia', '1988-06-15', 'bolithopia@example.com', 2365986538),
(14, 16, 1, 2, 0, 'Harken', 'Thoro', '1999-02-02', 'thoro@example.com', 5689584658),
(15, 17, 1, 3, 0, 'Gabe', 'Martholemew', '1958-06-03', 'martholemew@example.com', 6548456985),
(16, 18, 1, 4, 0, 'Tuile', 'Happiness', '1962-05-16', 'happiness@example.com', 1236549872),
(17, 19, 1, 1, 0, 'Rainy', 'Stevens', '1995-12-30', 'rainy@example.com', 5421231582),
(18, 20, 1, 2, 0, 'Job', 'Jobinski', '1956-02-01', 'jobinski@example.com', 1236594584),
(19, 21, 1, 2, 0, 'Helena', 'Orororo', '1654-06-08', 'orororo@example.com', 8016958456),
(20, 22, 1, 2, 0, 'Skinido', 'Kolina', '1987-05-02', 'skinido@example.com', 1654895632),
(30, NULL, NULL, NULL, NULL, 'renuka', 'reg', '1999-10-11', 'renu@gmail.com', 123456);

-- --------------------------------------------------------

--
-- Table structure for table `employee`
--

DROP TABLE IF EXISTS `employee`;
CREATE TABLE IF NOT EXISTS `employee` (
  `employeeId` int(11) NOT NULL AUTO_INCREMENT,
  `userId` int(11) NOT NULL,
  `firstName` varchar(80) NOT NULL,
  `lastName` varchar(80) NOT NULL,
  `employeeType` varchar(8) NOT NULL,
  PRIMARY KEY (`employeeId`)
) ENGINE=MyISAM AUTO_INCREMENT=25 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `employee`
--

INSERT INTO `employee` (`employeeId`, `userId`, `firstName`, `lastName`, `employeeType`) VALUES
(1, 1, 'Bill', 'Smith', 'CTO'),
(2, 2, 'Pauline', 'Jones', 'Employee'),
(3, 4, 'Cassidy', 'Hoff', 'Employee'),
(4, 5, 'Saurabh', 'Dhaigude', 'Employee'),
(5, 6, 'Renuka', 'Reglagadda', 'Employee'),
(6, 7, 'Kelly', 'Kelley', 'Employee'),
(7, 8, 'Jones', 'Jonesy', 'Employee'),
(8, 9, 'Athena', 'Steadway', 'Employee'),
(9, 10, 'Bruce', 'Bochy', 'Employee'),
(10, 11, 'Tim', 'Lincecum', 'Employee'),
(11, 12, 'Albert', 'Pujols', 'Employee'),
(12, 13, 'Agatha', 'Christie', 'Employee'),
(13, 14, 'Wednesday', 'Addams', 'Employee'),
(14, 15, 'Anakin', 'Skywalker', 'Employee'),
(15, 16, 'Ace', 'Ventura', 'Employee'),
(16, 17, 'Sid', 'Sidway', 'Employee'),
(17, 18, 'Polly', 'Pollyana', 'Employee'),
(18, 19, 'Lydia', 'Lydiana', 'Employee'),
(19, 20, 'Chad', 'Chadderts', 'Employee'),
(20, 21, 'Bob', 'Bobberts', 'Employee');

-- --------------------------------------------------------

--
-- Table structure for table `financial_transaction`
--

DROP TABLE IF EXISTS `financial_transaction`;
CREATE TABLE IF NOT EXISTS `financial_transaction` (
  `finTranId` int(16) NOT NULL AUTO_INCREMENT,
  `employeeId` int(11) DEFAULT NULL,
  `customerId` int(11) DEFAULT NULL,
  `amountDue` float NOT NULL,
  `type` varchar(20) NOT NULL,
  `dueDate` date NOT NULL,
  `overdue` int(1) NOT NULL,
  `amountPaid` float NOT NULL,
  `creditCardNumber` int(19) DEFAULT NULL,
  PRIMARY KEY (`finTranId`)
) ENGINE=MyISAM AUTO_INCREMENT=29 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `financial_transaction`
--

INSERT INTO `financial_transaction` (`finTranId`, `employeeId`, `customerId`, `amountDue`, `type`, `dueDate`, `overdue`, `amountPaid`, `creditCardNumber`) VALUES
(1, 3, NULL, 1500, 'wages', '2022-11-30', 0, 1500, NULL),
(25, NULL, 20, 1500, 'rent', '2023-01-01', 0, 1500, 12341561),
(23, 1, NULL, 1500, 'wages', '2023-01-01', 0, 1500, NULL),
(4, 2, NULL, 1500, 'wages', '2022-11-30', 0, 1500, NULL),
(5, 4, NULL, 1500, 'wages', '2022-11-30', 0, 1500, NULL),
(6, 5, NULL, 1500, 'wages', '2022-11-30', 0, 1500, NULL),
(7, 1, NULL, 3000, 'wages', '2022-11-30', 0, 3000, NULL),
(8, 6, NULL, 1500, 'wages', '2022-11-30', 0, 1500, NULL),
(9, 7, NULL, 1500, 'wages', '2022-11-30', 0, 1500, NULL),
(10, 8, NULL, 1500, 'wages', '2022-11-30', 0, 1500, NULL),
(11, 9, NULL, 1500, 'wages', '2022-11-30', 0, 1500, NULL),
(12, 10, NULL, 1500, 'wages', '2022-11-30', 0, 1500, NULL),
(13, NULL, 1, 1600, 'rent', '2022-12-01', 0, 1600, 12345678),
(14, NULL, 1, 150, 'late fee', '2022-11-15', 0, 150, 12345678),
(15, NULL, 8, 1600, 'rent', '2022-11-01', 1, 150, 98765432),
(16, NULL, 5, 1300, 'rent', '2022-12-01', 0, 1300, 36548975),
(17, NULL, 20, 1000, 'rent', '2022-12-01', 0, 1000, 65498765),
(18, NULL, 19, 150, 'late fee', '2022-12-15', 0, 0, NULL),
(19, NULL, 9, 1700, 'rent', '2022-12-01', 0, 0, NULL),
(20, NULL, 15, 1400, 'rent', '2022-12-01', 0, 0, NULL),
(21, NULL, 11, 1200, 'rent', '2022-12-01', 0, 0, NULL),
(22, NULL, 14, 1500, 'rent', '2022-12-01', 0, 1500, 87956453),
(26, NULL, 1, 150, 'late fee', '2022-11-15', 0, 1500, 12341568),
(27, NULL, 1, 1500, 'rent', '2023-02-01', 0, 1500, 1234567),
(28, NULL, 1, 1500, 'rent', '2023-03-01', 0, 1500, 12345678);

-- --------------------------------------------------------

--
-- Table structure for table `lease`
--

DROP TABLE IF EXISTS `lease`;
CREATE TABLE IF NOT EXISTS `lease` (
  `leaseId` int(11) NOT NULL AUTO_INCREMENT,
  `customerId` int(11) NOT NULL,
  `applicationId` int(11) NOT NULL,
  `term` float NOT NULL,
  `startDate` date NOT NULL,
  PRIMARY KEY (`leaseId`)
) ENGINE=MyISAM AUTO_INCREMENT=21 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `lease`
--

INSERT INTO `lease` (`leaseId`, `customerId`, `applicationId`, `term`, `startDate`) VALUES
(1, 1, 1, 36, '2022-01-01'),
(2, 2, 3, 36, '2022-03-02'),
(3, 3, 4, 14, '2022-05-15'),
(4, 4, 5, 14, '2022-01-01'),
(5, 5, 6, 24, '2022-01-01'),
(6, 6, 7, 24, '2022-03-02'),
(7, 8, 9, 48, '2019-03-01'),
(8, 9, 10, 24, '2022-09-01'),
(9, 10, 11, 36, '2022-01-01'),
(10, 11, 12, 36, '2019-01-01'),
(11, 12, 13, 60, '2018-01-01'),
(12, 13, 14, 60, '2021-01-01'),
(13, 14, 15, 48, '2021-06-05'),
(14, 15, 16, 36, '2021-06-05'),
(15, 16, 17, 14, '2022-01-05'),
(16, 17, 18, 24, '2021-03-15'),
(17, 18, 19, 14, '2022-11-15'),
(18, 19, 20, 48, '2020-03-09'),
(19, 20, 21, 36, '2021-03-01'),
(20, 7, 22, 24, '2022-12-01');

-- --------------------------------------------------------

--
-- Table structure for table `maintenance`
--

DROP TABLE IF EXISTS `maintenance`;
CREATE TABLE IF NOT EXISTS `maintenance` (
  `maintenanceId` int(11) NOT NULL AUTO_INCREMENT,
  `unitId` int(11) NOT NULL,
  `employeeId` int(11) NOT NULL,
  `date` date NOT NULL,
  `issue` varchar(6000) NOT NULL,
  `status` varchar(15) NOT NULL,
  PRIMARY KEY (`maintenanceId`)
) ENGINE=MyISAM AUTO_INCREMENT=21 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `maintenance`
--

INSERT INTO `maintenance` (`maintenanceId`, `unitId`, `employeeId`, `date`, `issue`, `status`) VALUES
(1, 1, 2, '2022-11-29', 'microwave stopped working', 'unresolved'),
(2, 4, 2, '2022-10-19', 'Cannot get toilet unplugged. I don\'t want it to overflow.', 'resolved'),
(3, 5, 2, '2022-11-09', 'Light keeps flickering in the living room.', 'resolved'),
(4, 6, 2, '2022-12-01', 'My daughter came in for Christmas and she has a kid and the kid bumped the edge of the counter and the lining started falling off. ', 'resolved'),
(5, 7, 2, '2022-11-04', 'I hear a noise coming from the attic but I can\'t access the ladder because the handle to access it fell off when I pulled on it', 'resolved'),
(6, 8, 7, '2022-12-01', 'The sink water is coming out brown.', 'unresolved'),
(7, 9, 7, '2022-10-15', 'The oven won\'t heat up and it smells like something is burning.', 'resolved'),
(8, 10, 7, '2022-11-16', 'The oven won\'t heat up.', 'resolved'),
(9, 11, 7, '2022-11-30', 'Our microwave is broken.', 'unresolved'),
(10, 12, 11, '2022-11-30', 'The curtain rod fell off of our wall.', 'unresolved'),
(11, 13, 11, '2022-09-02', 'The trash chute handle fell off', 'resolved'),
(12, 14, 11, '2022-11-12', 'First floor balcony railing is swaying back and forth please come secure it', 'resolved'),
(13, 15, 11, '2022-10-13', 'There\'s a crack appearing in our drywall since the earthquake.', 'resolved'),
(14, 16, 11, '2022-09-12', 'Our toilet is about to overflow!', 'resolved'),
(15, 17, 5, '2022-11-20', 'Toilet keeps making dripping noises.', 'resolved'),
(16, 18, 5, '2022-11-25', 'Sink is leaking in the bathroom on the first floor.', 'resolved'),
(17, 19, 4, '2022-09-12', 'The sewer is getting backed up and it smells really bad in our bathroom.', 'resolved'),
(18, 21, 3, '2022-11-05', 'Someone threw a rock in our window and it broke. Help', 'resolved'),
(19, 22, 3, '2022-11-01', 'Fence to the unit is splintering and there\'s a huge hole in the middle.', 'resolved'),
(20, 23, 3, '2022-11-28', 'The doorknob to the backyard broke off.', 'unresolved');

-- --------------------------------------------------------

--
-- Table structure for table `property`
--

DROP TABLE IF EXISTS `property`;
CREATE TABLE IF NOT EXISTS `property` (
  `propertyId` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(80) NOT NULL,
  `manager` int(11) NOT NULL,
  PRIMARY KEY (`propertyId`)
) ENGINE=MyISAM AUTO_INCREMENT=22 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `property`
--

INSERT INTO `property` (`propertyId`, `name`, `manager`) VALUES
(1, 'Blueridge Lane', 1),
(2, 'Canopy Lane', 2),
(3, 'Canyon Ave', 2),
(4, '2700 South', 2),
(5, '1234 North', 2),
(6, '8760 Vermont Ave', 3),
(7, 'Yacht Way', 4),
(8, 'Point Ave', 6),
(9, 'Kale Ave', 6),
(10, 'Game Way', 5),
(11, 'South Southern St', 9),
(12, 'Layton Way', 8),
(13, 'Bountiful Corner', 7),
(14, 'Sutter St', 9),
(15, 'Banyan Way', 7),
(16, 'Juniper Ave', 3),
(17, 'Accordion St', 3),
(18, 'Ghost Ave', 5),
(19, 'Serendipity Ave', 6),
(20, 'Redridge Lane', 1);

-- --------------------------------------------------------

--
-- Table structure for table `property_unit`
--

DROP TABLE IF EXISTS `property_unit`;
CREATE TABLE IF NOT EXISTS `property_unit` (
  `unitId` int(11) NOT NULL AUTO_INCREMENT,
  `propertyId` int(11) NOT NULL,
  `beds` int(2) NOT NULL,
  `baths` float NOT NULL,
  `price` float NOT NULL,
  `squareFootage` int(5) NOT NULL,
  `occupied` int(1) NOT NULL,
  PRIMARY KEY (`unitId`)
) ENGINE=MyISAM AUTO_INCREMENT=27 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `property_unit`
--

INSERT INTO `property_unit` (`unitId`, `propertyId`, `beds`, `baths`, `price`, `squareFootage`, `occupied`) VALUES
(1, 2, 2, 1, 1600, 500, 1),
(2, 2, 1, 1, 1400, 350, 1),
(3, 2, 1, 1, 1400, 350, 0),
(4, 2, 1, 1, 1300, 300, 0),
(5, 1, 2, 2, 2000, 2000, 1),
(6, 3, 2, 2.5, 2050.5, 2000, 1),
(7, 4, 1, 1.5, 1500, 1000, 1),
(8, 5, 3, 2, 2300, 1800, 1),
(9, 6, 1, 1, 1600, 1000, 1),
(10, 7, 2, 2, 1800, 1600, 1),
(11, 8, 2, 2, 1800, 1600, 1),
(12, 9, 1, 1.5, 1800, 1800, 1),
(13, 10, 3, 3, 2300, 2000, 1),
(14, 11, 2, 2, 1600, 1600, 1),
(15, 12, 2, 2, 1600, 1600, 1),
(16, 13, 1, 1, 1500, 1200, 1),
(17, 14, 2, 2, 1600, 1600, 1),
(18, 15, 3, 2, 2000, 1800, 1),
(19, 16, 2, 2, 2000, 1800, 1),
(20, 17, 1, 1, 1515.5, 1300, 1),
(21, 18, 2, 2, 1850.5, 1800, 1),
(22, 19, 2, 2.5, 2000, 2100, 1),
(23, 20, 2, 1.5, 1700, 1650, 1),
(24, 2, 1, 1, 1600, 1600, 0);

-- --------------------------------------------------------

--
-- Table structure for table `roles`
--

DROP TABLE IF EXISTS `roles`;
CREATE TABLE IF NOT EXISTS `roles` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(100) NOT NULL,
  `role` varchar(100) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=51 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `roles`
--

INSERT INTO `roles` (`id`, `username`, `role`) VALUES
(1, 'bsmith', 'CTO'),
(2, 'pjones', 'employee'),
(3, 'bcustomer', 'customer'),
(4, 'choff', 'employee'),
(5, 'sdhaigude', 'employee'),
(6, 'rreglagadda', 'employee'),
(7, 'kkelley', 'employee'),
(8, 'jjonesy', 'employee'),
(9, 'asteadway', 'employee'),
(10, 'bbochy', 'employee'),
(11, 'tlincecum', 'employee'),
(12, 'apujols', 'employee'),
(13, 'achristie', 'employee'),
(14, 'waddams', 'employee'),
(15, 'askywalker', 'employee'),
(16, 'aventura', 'employee'),
(17, 'ssidway', 'employee'),
(18, 'ppollyana', 'employee'),
(19, 'llydiana', 'employee'),
(20, 'cchadderts', 'employee'),
(21, 'bbobberts', 'employee'),
(22, 'jhilary', 'customer'),
(23, 'wschrum', 'customer'),
(24, 'awakenheimer', 'customer'),
(25, 'bao', 'customer'),
(26, 'sjensen', 'customer'),
(27, 'ggreyfield', 'customer'),
(28, 'asneezy', 'customer'),
(29, 'hornery', 'customer'),
(30, 'aabe', 'customer'),
(31, 'kkolini', 'customer'),
(32, 'kkylini', 'customer'),
(33, 'bbolithopia', 'customer'),
(34, 'hthoro', 'customer'),
(35, 'gmartholemew', 'customer'),
(36, 'thappiness', 'customer'),
(37, 'rstevens', 'customer'),
(38, 'jjobinski', 'customer'),
(39, 'horororo', 'customer'),
(40, 'skolina', 'customer'),
(45, 'ritalian', 'customer'),
(46, 'renu', 'customer'),
(47, 'renu', 'customer'),
(48, 'renuka', 'customer'),
(49, 'renuka', 'customer'),
(50, 'renuka', 'customer');

-- --------------------------------------------------------

--
-- Table structure for table `website_user`
--

DROP TABLE IF EXISTS `website_user`;
CREATE TABLE IF NOT EXISTS `website_user` (
  `username` varchar(80) NOT NULL,
  `password` varchar(128) NOT NULL,
  `userId` int(11) NOT NULL AUTO_INCREMENT,
  `customerId` int(11) DEFAULT NULL,
  `employeeId` int(11) DEFAULT NULL,
  `firstName` varchar(80) NOT NULL,
  `lastName` varchar(80) NOT NULL,
  `userStatus` varchar(7) NOT NULL,
  PRIMARY KEY (`userId`)
) ENGINE=MyISAM AUTO_INCREMENT=51 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `website_user`
--

INSERT INTO `website_user` (`username`, `password`, `userId`, `customerId`, `employeeId`, `firstName`, `lastName`, `userStatus`) VALUES
('bsmith', '$2y$10$9V8cSUCtoKMNMpyMM32m1u5/MI4uAbMxPWPKN9xp2dfNU6W7VKeh2', 1, NULL, 1, 'Bill', 'Smith', 'active'),
('pjones', '$2y$10$M7c1YHVo9zSu/FHueL27xOK9rhnYo6PPN6vtgGBymyF2lFC1gYsp.', 2, NULL, 2, 'Pauline', 'Jones', 'active'),
('bcustomer', '$2y$10$QwRJPlkZryraorjPl6Df8esbBgnDPABnOKwHe4MJqEh9sZXefZ2Gi', 3, 1, NULL, 'Bob', 'Customer', 'active'),
('jhilary', '$2y$10$Ficvpk6ucIVaVcabtn6ZjO5GtkRkCEx22W8tXX60SiPCkG44tXNrK', 4, 2, NULL, 'Jeremy', 'Hilary', 'active'),
('wschrum', '$2y$10$WItVeeia9HN.GGUVcFdmQuF/Y6RYR40umHm1Qb3xNTTT9o3.hkV42', 5, 3, NULL, 'Wano', 'Schrum', 'active'),
('awakenheimer', '$2y$10$.EjjkgQLlLUeKonwZ28d4.pbIZ5xrBOE25cVYHWwv7WT9eXukEPz.', 6, 4, NULL, 'Alison', 'Wakenheimer', 'active'),
('bao', '$2y$10$r6SGv2TmBgg2YqNKCX2c.ekCmJGVMEwLAW89G18Cs.DI0KfqmiuYG', 7, 5, NULL, 'Balina', 'Ao', 'active'),
('sjensen', '$2y$10$dTzt0HgnqafQW5M.5tqtLeWLnPy6gYd2oZWa69dA82X1HNMXTyZ4S', 8, 6, NULL, 'Siegfried', 'Jensen', 'active'),
('ggreyfield', '$2y$10$/GEA435WAc734dWrWHDaAusOWFJ55Ri.jjxKLIk4Z7EC9v1w4MKq6', 9, 7, NULL, 'Gandolf', 'Greyfield', 'active'),
('asneezy', '$2y$10$Dau4lmdpRmATE.HF8yhE/.w2DdfGKHiA0L.YJhBAfWCFp67GMDzry', 10, 8, NULL, 'Achoo', 'Sneezy', 'active'),
('hornery', '$2y$10$CXdQA3o/NuzArPWu3NLKu.hdzMu8.iPKDVnA3yFjvf5Dunjsew4Lq', 11, 9, NULL, 'Helga', 'Ornery', 'active'),
('aabe', '$2y$10$m1yQUm9niJUzJ1Xwu927bOit9PbezW.RZ2kAn8PrD6z0Ly/1j54pS', 12, 10, NULL, 'abatha', 'abe', 'active'),
('kkolini', '$2y$10$7NqZDj9VuXMhBUJa9Wm6DeqTvLfgXRDmz0K2Bfxj1oEj6j9hCP6S6', 13, 11, NULL, 'Kole', 'Kolini', 'active'),
('kkylini', '$2y$10$GV8fR1NvjyJlbXjFoDwlz.Z2XKt.KOFHL8oyvqEqYfdvYstQSoFBa', 14, 12, NULL, 'Kyle', 'Kylini', 'active'),
('bbolithopia', '$2y$10$mabs/8Nlfl369W.k.zs4xOISTUGrKuFhhG05Z0MY2lQknWWu8FKFG', 15, 13, NULL, 'Boberini', 'Bolithopia', 'active'),
('hthoro', '$2y$10$fBzp6JTyi0z59M.DvFVXAeNW/ejjtY010lz/gc1TBxc6WS/y2PhSm', 16, 14, NULL, 'Harken', 'Thoro', 'active'),
('gmartholemew', '$2y$10$.pghWxD2vIcBCJidPRi9k.b/BxEf8VlaV4O2Hzbny.IbdWjWMDkeS', 17, 15, NULL, 'Gabe', 'Martholemew', 'active'),
('thappiness', '$2y$10$5FToVr0FEuOItH7I/m1L4unHT6tK1KLGAgJp8OXgcd.kfNLK57btu', 18, 16, NULL, 'Tuile', 'Happiness', 'active'),
('rstevens', '$2y$10$oUZkqdRL8A2lMkp4JrNBteVAhQ3saMlV3EiL7m.3u1dYnIL9BI6cG', 19, 17, NULL, 'Rainy', 'Stevens', 'active'),
('jjobinski', '$2y$10$/UsGPmfL0E/JFKDfVZ3vEu88X2A7J.xt2qb5xCI2ik2uxp.YA0Eba', 20, 18, NULL, 'Job', 'Jobinski', 'active'),
('horororo', '$2y$10$779edhz7cWcZrm6.c2O8S.ijd41tClYf57M0DrMnOtTmA5k6MWIOm', 21, 19, NULL, 'Helena', 'Orororo', 'active'),
('skolina', '$2y$10$yj4.TiQCc5CAmHzDYqtJLuoH6ktzwL2RCsZI29tiYr4QqWmqBuuly', 22, 20, NULL, 'Skinido', 'Kolina', 'active'),
('choff', '$2y$10$copL5QLYXUI72ySbvJSDLuifzEym7tnR1S9.gOZYqE8nehkzpRFW.', 23, NULL, 3, 'Cassidy', 'Hoff', 'active'),
('rreglagadda', '$2y$10$4tiF2gcNS.k6cTCmVGpqVe8EP9PuJNuis354AVRlBixMGsZM145iK', 25, NULL, 5, 'Renuka', 'Reglagadda', 'active'),
('kkelley', '$2y$10$w2YoJbh2Tz3XxwzwObVREOq4FprySpxajzL54M7RmgYwbkIiXfa86', 26, NULL, 6, 'Kelly', 'Kelley', 'active'),
('jjonesy', '$2y$10$hgQRiFvfOFfc4ahU5NZFwe9UaTDwEGITMMZZU0x5AMJUbL9QkXHju', 27, NULL, 7, 'Jones', 'Jonesy', 'active'),
('asteadway', '$2y$10$SfGCFceGUuWpmRiP59KiD.daKQf1wlmuJOuwhIrtjMEWrPcgHt.bC', 28, NULL, 8, 'Athena', 'Steadway', 'active'),
('bbochy', '$2y$10$lQOYwXBdkURXa0YjPsGL6O.e4ItDnjh0dYLnP0Xckz/VmpgMwyjFG', 29, NULL, 9, 'Bruce', 'Bochy', 'active'),
('tlincecum', '$2y$10$SwpCpK7iUfACAlFVk4b0cu.ZRO65Nr.vTh/mwPUIkhAjaL5hkt6u2', 30, NULL, 10, 'Tim', 'Lincecum', 'active'),
('apujols', '$2y$10$ASHft.s75nViaZsKegk45ud21HjaJz2ohVymILHqa4c79nkjHSMpq', 31, NULL, 11, 'Albert', 'Pujols', 'active'),
('achristie', '$2y$10$YwtOVgPLYHOrM/OZQMRoCuB9Ij0sM1PMUB0.BJS3OYeKQqxGHEykm', 32, NULL, 12, 'Agatha', 'Christie', 'active'),
('waddams', '$2y$10$Cy1T9ijaZSop2U44yt5UPuy8nSRC/8vkLpKHbQFxHVGv0IpRcfK1.', 33, NULL, 13, 'Wednesday', 'Addams', 'active'),
('askywalker', '$2y$10$IZSQv5FEbHXSPZwjTCSP/uelCMw81/6zG3QSO3MNoiqBuVZUKSUc6', 34, NULL, 14, 'Anakin', 'Skywalker', 'active'),
('aventura', '$2y$10$Egbqps2UOb.Da20kfPj9T.LO8RgwIDiHYAnTR0KtN0F2l1X.tJCaG', 35, NULL, 15, 'Ace', 'Ventura', 'active'),
('ssidway', '$2y$10$ldEMRIBpveco03tt0U5o.eybw4VCF7UE9xd79OVqK0ADaXt8bx6tO', 36, NULL, 16, 'Sid', 'Sidway', 'active'),
('ppollyana', '$2y$10$qX86/.TbQrfN9ftbKU9iFO8YCBca9rQJ53Nd76Hio9lJW3l7gPRse', 37, NULL, 17, 'Polly', 'Pollyana', 'active'),
('llydiana', '$2y$10$QNpVteTs2ny3Wa0Wq.s1R..ZfUuvF.1TUBrM.rQnCSG0sn00J.HQi', 38, NULL, 18, 'Lydia', 'Lydiana', 'active'),
('cchadderts', '$2y$10$5JtYCffuK6tzCGCjZt5yaOh4Haxqh2Js1G8QiDZDCu4pCXYyVnriy', 39, NULL, 19, 'Chad', 'Chadderts', 'active'),
('bbobberts', '$2y$10$cHUVg.fBdjc0TNp/3/izQuhcEIjzPRERanjy1jfkCFOTGj.1M9R7.', 40, NULL, 20, 'Bob', 'Bobberts', 'active'),
('renuka', '$2y$10$kzXU8KCLwScrZgOmbYrRl.cL9yk5wm/HcUJD3FU0IruDj6J87GtcK', 49, 30, NULL, 'renuka', 'reg', 'active');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
