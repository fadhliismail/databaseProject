-- phpMyAdmin SQL Dump
-- version 4.2.11
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Feb 06, 2015 at 01:49 AM
-- Server version: 5.6.21
-- PHP Version: 5.6.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `virtual_learning`
--

-- --------------------------------------------------------

--
-- Table structure for table `assessment`
--

CREATE TABLE IF NOT EXISTS `assessment` (
`AssessmentNo` int(11) NOT NULL,
  `GroupNo` int(11) NOT NULL,
  `Report_to_Assess` int(11) NOT NULL,
  `Score` int(11) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=101 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `assessment`
--

INSERT INTO `assessment` (`AssessmentNo`, `GroupNo`, `Report_to_Assess`, `Score`) VALUES
(1, 3, 14, 24),
(2, 6, 21, 23),
(3, 6, 2, 33),
(4, 11, 13, 47),
(5, 10, 28, 20),
(6, 6, 21, 22),
(7, 30, 10, 40),
(8, 12, 4, 28),
(9, 16, 5, 46),
(10, 21, 19, 44),
(11, 26, 15, 38),
(12, 29, 19, 31),
(13, 17, 3, 48),
(14, 27, 2, 45),
(15, 17, 5, 22),
(16, 25, 24, 49),
(17, 5, 5, 23),
(18, 7, 4, 34),
(19, 28, 10, 32),
(20, 23, 10, 25),
(21, 7, 24, 28),
(22, 4, 26, 23),
(23, 21, 29, 45),
(24, 6, 1, 48),
(25, 9, 9, 38),
(26, 18, 30, 37),
(27, 29, 22, 46),
(28, 1, 7, 46),
(29, 8, 30, 24),
(30, 17, 4, 36),
(31, 17, 2, 41),
(32, 12, 21, 48),
(33, 11, 19, 27),
(34, 26, 29, 48),
(35, 7, 9, 49),
(36, 2, 23, 25),
(37, 10, 20, 44),
(38, 15, 15, 37),
(39, 29, 12, 33),
(40, 30, 3, 20),
(41, 22, 13, 24),
(42, 8, 5, 44),
(43, 1, 8, 25),
(44, 12, 12, 38),
(45, 17, 1, 25),
(46, 20, 30, 28),
(47, 27, 5, 36),
(48, 20, 25, 42),
(49, 20, 3, 40),
(50, 7, 7, 39),
(51, 25, 28, 27),
(52, 18, 15, 46),
(53, 23, 7, 23),
(54, 8, 4, 49),
(55, 19, 14, 26),
(56, 27, 16, 36),
(57, 26, 8, 29),
(58, 20, 13, 39),
(59, 9, 24, 25),
(60, 21, 30, 23),
(61, 17, 14, 35),
(62, 20, 25, 34),
(63, 2, 20, 43),
(64, 3, 10, 50),
(65, 14, 4, 33),
(66, 25, 29, 38),
(67, 4, 15, 20),
(68, 22, 27, 48),
(69, 4, 30, 34),
(70, 19, 20, 48),
(71, 26, 13, 40),
(72, 20, 11, 31),
(73, 22, 17, 46),
(74, 2, 30, 38),
(75, 1, 16, 30),
(76, 15, 24, 40),
(77, 14, 7, 45),
(78, 23, 20, 48),
(79, 17, 15, 23),
(80, 2, 16, 25),
(81, 11, 26, 36),
(82, 15, 6, 22),
(83, 24, 23, 47),
(84, 8, 27, 32),
(85, 6, 1, 40),
(86, 4, 28, 25),
(87, 23, 25, 22),
(88, 1, 29, 35),
(89, 7, 1, 33),
(90, 21, 23, 25),
(91, 29, 17, 26),
(92, 16, 26, 28),
(93, 13, 19, 27),
(94, 29, 30, 20),
(95, 1, 27, 35),
(96, 3, 28, 28),
(97, 7, 16, 45),
(98, 13, 14, 20),
(99, 20, 16, 35),
(100, 20, 30, 22);

-- --------------------------------------------------------

--
-- Table structure for table `group`
--

CREATE TABLE IF NOT EXISTS `group` (
`GroupNo` int(11) NOT NULL,
  `ReportNo` int(11) NOT NULL,
  `AverageScore` int(11) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=101 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `group`
--

INSERT INTO `group` (`GroupNo`, `ReportNo`, `AverageScore`) VALUES
(1, 2, 19),
(2, 6, 16),
(3, 6, 18),
(4, 1, 27),
(5, 3, 18),
(6, 9, 18),
(7, 9, 27),
(8, 10, 29),
(9, 5, 23),
(11, 9, 29),
(12, 2, 23),
(13, 3, 25),
(14, 2, 20),
(15, 2, 21),
(16, 7, 29),
(17, 4, 20),
(18, 4, 27),
(19, 2, 17),
(20, 10, 30),
(21, 6, 18),
(22, 3, 20),
(23, 4, 24),
(24, 10, 27),
(25, 4, 19),
(26, 4, 26),
(27, 3, 19),
(28, 2, 17),
(29, 7, 23),
(30, 8, 22),
(31, 9, 25),
(32, 5, 20),
(33, 10, 15),
(34, 5, 21),
(35, 5, 15),
(36, 1, 25),
(37, 1, 30),
(38, 1, 22),
(39, 6, 19),
(40, 5, 19),
(41, 8, 28),
(42, 8, 20),
(43, 6, 17),
(44, 8, 16),
(45, 1, 18),
(46, 10, 29),
(47, 7, 20),
(48, 5, 17),
(49, 3, 21),
(50, 5, 20),
(51, 7, 30),
(52, 6, 21),
(53, 10, 22),
(54, 2, 30),
(55, 8, 29),
(56, 1, 20),
(57, 5, 23),
(58, 4, 25),
(59, 5, 19),
(60, 3, 27),
(61, 10, 23),
(62, 4, 17),
(63, 4, 15),
(64, 4, 22),
(65, 7, 29),
(66, 1, 21),
(67, 9, 28),
(68, 4, 27),
(69, 3, 18),
(70, 2, 24),
(71, 10, 19),
(72, 7, 29),
(73, 6, 26),
(74, 7, 29),
(75, 4, 17),
(76, 9, 20),
(77, 6, 15),
(78, 4, 25),
(79, 7, 15),
(80, 7, 25),
(81, 8, 21),
(82, 4, 15),
(83, 2, 28),
(84, 1, 20),
(85, 9, 26),
(86, 10, 22),
(87, 4, 24),
(88, 3, 21),
(89, 8, 26),
(90, 3, 21),
(91, 2, 16),
(92, 8, 24),
(93, 3, 23),
(94, 3, 30),
(95, 7, 22),
(96, 10, 25),
(97, 2, 30),
(98, 3, 20),
(99, 2, 17),
(100, 10, 15);

-- --------------------------------------------------------

--
-- Table structure for table `report`
--

CREATE TABLE IF NOT EXISTS `report` (
`ReportNo` int(11) NOT NULL,
  `ReportLink` varchar(255) NOT NULL,
  `Submission_Timestamp` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `Submission_Updated` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB AUTO_INCREMENT=31 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `report`
--

INSERT INTO `report` (`ReportNo`, `ReportLink`, `Submission_Timestamp`, `Submission_Updated`) VALUES
(1, 'BlackjackCoupons.co.uk', '2015-02-05 14:53:10', '2015-02-05 14:53:10'),
(2, 'TribalCMS.co.uk', '2015-02-05 14:53:10', '2015-02-05 14:53:10'),
(3, 'IRSAnalysis.co.uk', '2015-02-05 14:53:10', '2015-02-05 14:53:10'),
(4, 'DumbDecisions.co.uk', '2015-02-05 14:53:10', '2015-02-05 14:53:10'),
(5, 'eFlirtation.co.uk', '2015-02-05 14:53:10', '2015-02-05 14:53:10'),
(6, 'GolfRebanking.co.uk', '2015-02-05 14:53:10', '2015-02-05 14:53:10'),
(7, 'BirdWash.co.uk', '2015-02-05 14:53:10', '2015-02-05 14:53:10'),
(8, 'VisitorBiz.co.uk', '2015-02-05 14:53:10', '2015-02-05 14:53:10'),
(9, 'AdminParking.co.uk', '2015-02-05 14:53:10', '2015-02-05 14:53:10'),
(10, 'MLSLibrary.co.uk', '2015-02-05 14:53:10', '2015-02-05 14:53:10'),
(11, 'DetectMesothelioma.co.uk', '2015-02-05 14:53:10', '2015-02-05 14:53:10'),
(12, 'IdahoFallsHouses.co.uk', '2015-02-05 14:53:10', '2015-02-05 14:53:10'),
(13, 'WikiZip.co.uk', '2015-02-05 14:53:10', '2015-02-05 14:53:10'),
(14, 'OyYachts.co.uk', '2015-02-05 14:53:10', '2015-02-05 14:53:10'),
(15, 'InfoExam.co.uk', '2015-02-05 14:53:10', '2015-02-05 14:53:10'),
(16, 'InnovationBrains.co.uk', '2015-02-05 14:53:10', '2015-02-05 14:53:10'),
(17, 'ExtraProm.co.uk', '2015-02-05 14:53:10', '2015-02-05 14:53:10'),
(18, 'LandscapingPortfolio.co.uk', '2015-02-05 14:53:10', '2015-02-05 14:53:10'),
(19, 'FurnishingExperts.co.uk', '2015-02-05 14:53:10', '2015-02-05 14:53:10'),
(20, 'VendingPrograms.co.uk', '2015-02-05 14:53:10', '2015-02-05 14:53:10'),
(21, 'ConcertStaff.co.uk', '2015-02-05 14:53:10', '2015-02-05 14:53:10'),
(22, 'DomainFundraiser.co.uk', '2015-02-05 14:53:10', '2015-02-05 14:53:10'),
(23, 'SalaryGame.co.uk', '2015-02-05 14:53:10', '2015-02-05 14:53:10'),
(24, 'PopBids.co.uk', '2015-02-05 14:53:10', '2015-02-05 14:53:10'),
(25, 'DnOptions.co.uk', '2015-02-05 14:53:10', '2015-02-05 14:53:10'),
(26, 'PalJam.co.uk', '2015-02-05 14:53:10', '2015-02-05 14:53:10'),
(27, 'SlyFriend.co.uk', '2015-02-05 14:53:10', '2015-02-05 14:53:10'),
(28, 'ParadeBlog.co.uk', '2015-02-05 14:53:10', '2015-02-05 14:53:10'),
(29, 'AirEnhancer.co.uk', '2015-02-05 14:53:10', '2015-02-05 14:53:10'),
(30, 'EspressoTalk.co.uk', '2015-02-05 14:53:10', '2015-02-05 14:53:10');

-- --------------------------------------------------------

--
-- Table structure for table `score`
--

CREATE TABLE IF NOT EXISTS `score` (
`ScoreNo` int(11) NOT NULL,
  `AssessmentNo` int(11) NOT NULL,
  `CriteriaNo` varchar(50) NOT NULL,
  `Comment` varchar(255) NOT NULL,
  `Score_Criteria` int(11) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=91 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `score`
--

INSERT INTO `score` (`ScoreNo`, `AssessmentNo`, `CriteriaNo`, `Comment`, `Score_Criteria`) VALUES
(1, 4, '1', 'Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Curabitur sed', 4),
(2, 17, '3', 'Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Curabitur sed', 3),
(3, 69, '2', 'Lorem ipsum dolor sit amet,', 8),
(4, 43, '2', 'Lorem ipsum dolor', 5),
(5, 79, '1', 'Lorem', 3),
(6, 83, '2', 'Lorem ipsum dolor', 2),
(7, 40, '2', 'Lorem ipsum dolor sit', 5),
(8, 44, '4', 'Lorem ipsum dolor sit amet, consectetuer', 2),
(9, 54, '4', 'Lorem ipsum dolor sit', 4),
(10, 50, '4', 'Lorem ipsum dolor sit amet,', 6),
(11, 65, '1', 'Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Curabitur sed', 2),
(12, 15, '2', 'Lorem ipsum dolor sit amet, consectetuer', 9),
(13, 31, '5', 'Lorem ipsum dolor', 3),
(14, 38, '5', 'Lorem ipsum dolor sit amet, consectetuer', 1),
(15, 75, '3', 'Lorem ipsum dolor sit amet, consectetuer adipiscing', 2),
(16, 25, '2', 'Lorem', 1),
(17, 20, '2', 'Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Curabitur', 4),
(18, 55, '1', 'Lorem', 6),
(19, 25, '4', 'Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Curabitur', 3),
(20, 63, '5', 'Lorem', 8),
(21, 1, '1', 'Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Curabitur', 4),
(22, 49, '2', 'Lorem ipsum', 8),
(23, 79, '4', 'Lorem ipsum dolor', 3),
(24, 45, '1', 'Lorem ipsum dolor sit amet, consectetuer', 6),
(25, 72, '3', 'Lorem ipsum dolor sit amet, consectetuer adipiscing elit.', 6),
(26, 85, '3', 'Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Curabitur', 9),
(27, 40, '2', 'Lorem ipsum dolor', 4),
(28, 43, '1', 'Lorem ipsum dolor sit amet,', 4),
(29, 71, '1', 'Lorem ipsum dolor', 5),
(30, 35, '2', 'Lorem ipsum dolor sit', 10),
(31, 44, '2', 'Lorem ipsum', 5),
(32, 15, '2', 'Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Curabitur', 1),
(33, 65, '4', 'Lorem ipsum dolor sit amet, consectetuer', 4),
(34, 44, '5', 'Lorem ipsum dolor', 8),
(35, 15, '4', 'Lorem', 1),
(36, 56, '1', 'Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Curabitur', 6),
(37, 80, '3', 'Lorem ipsum dolor sit amet, consectetuer', 1),
(38, 77, '3', 'Lorem ipsum dolor sit amet, consectetuer adipiscing', 1),
(39, 80, '4', 'Lorem ipsum dolor sit amet,', 8),
(40, 40, '4', 'Lorem', 1),
(41, 55, '3', 'Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Curabitur sed', 9),
(42, 7, '2', 'Lorem ipsum dolor sit amet,', 6),
(43, 50, '3', 'Lorem ipsum dolor sit amet, consectetuer', 7),
(44, 82, '4', 'Lorem ipsum', 4),
(45, 55, '4', 'Lorem ipsum dolor sit amet, consectetuer adipiscing elit.', 7),
(46, 79, '5', 'Lorem ipsum dolor', 4),
(47, 90, '4', 'Lorem', 6),
(48, 27, '1', 'Lorem ipsum dolor sit amet, consectetuer', 6),
(49, 10, '4', 'Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Curabitur', 5),
(50, 41, '4', 'Lorem ipsum dolor sit', 9),
(51, 17, '2', 'Lorem ipsum dolor sit amet, consectetuer adipiscing', 6),
(52, 29, '3', 'Lorem ipsum dolor sit amet, consectetuer adipiscing', 10),
(53, 1, '4', 'Lorem ipsum dolor sit', 4),
(54, 77, '5', 'Lorem', 6),
(55, 53, '4', 'Lorem ipsum dolor', 4),
(56, 27, '2', 'Lorem ipsum dolor sit amet, consectetuer adipiscing elit.', 3),
(57, 28, '4', 'Lorem', 7),
(58, 32, '4', 'Lorem ipsum', 9),
(59, 64, '3', 'Lorem', 5),
(60, 85, '2', 'Lorem ipsum dolor', 7),
(61, 13, '4', 'Lorem ipsum dolor sit', 9),
(62, 74, '4', 'Lorem ipsum dolor', 10),
(63, 6, '4', 'Lorem ipsum dolor sit amet,', 2),
(64, 23, '4', 'Lorem ipsum dolor', 7),
(65, 23, '4', 'Lorem ipsum dolor sit amet,', 1),
(66, 79, '2', 'Lorem ipsum dolor sit amet, consectetuer adipiscing elit.', 10),
(67, 45, '5', 'Lorem ipsum dolor sit amet, consectetuer', 4),
(68, 71, '5', 'Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Curabitur sed', 8),
(69, 41, '2', 'Lorem ipsum dolor sit', 1),
(70, 55, '3', 'Lorem ipsum dolor sit amet, consectetuer', 7),
(71, 45, '2', 'Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Curabitur', 3),
(72, 12, '5', 'Lorem', 4),
(73, 29, '3', 'Lorem ipsum dolor sit', 7),
(74, 3, '5', 'Lorem', 9),
(75, 77, '2', 'Lorem ipsum', 1),
(76, 80, '2', 'Lorem ipsum dolor sit', 10),
(77, 10, '4', 'Lorem ipsum dolor', 3),
(78, 6, '2', 'Lorem ipsum dolor sit amet,', 4),
(79, 77, '1', 'Lorem ipsum dolor sit amet, consectetuer', 10),
(80, 68, '5', 'Lorem ipsum dolor sit', 1),
(81, 4, '4', 'Lorem ipsum dolor', 6),
(82, 41, '2', 'Lorem ipsum', 3),
(83, 29, '1', 'Lorem ipsum dolor sit amet, consectetuer adipiscing elit.', 3),
(84, 35, '1', 'Lorem ipsum dolor sit amet, consectetuer adipiscing', 4),
(85, 33, '2', 'Lorem ipsum dolor sit amet,', 10),
(86, 50, '1', 'Lorem ipsum dolor sit amet, consectetuer adipiscing', 7),
(87, 73, '4', 'Lorem ipsum dolor', 1),
(88, 41, '3', 'Lorem ipsum dolor sit', 3),
(89, 54, '4', 'Lorem ipsum', 5),
(90, 44, '1', 'Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Curabitur sed', 6);

-- --------------------------------------------------------

--
-- Table structure for table `student`
--

CREATE TABLE IF NOT EXISTS `student` (
`StudentNo` int(11) NOT NULL,
  `FirstName` varchar(255) NOT NULL,
  `LastName` varchar(255) NOT NULL,
  `StudentId` int(11) NOT NULL,
  `GroupNo` int(11) NOT NULL,
  `Email` varchar(255) NOT NULL,
  `Department` varchar(255) NOT NULL,
  `User_pass` varchar(255) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=101 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `student`
--

INSERT INTO `student` (`StudentNo`, `FirstName`, `LastName`, `StudentId`, `GroupNo`, `Email`, `Department`, `User_pass`) VALUES
(4, 'Maxine', 'Frye', 82054043, 4, '', 'Nunc', 'HZK82ZCK1RP'),
(5, 'Jared', 'Mckay', 80341722, 6, '', 'turpis', 'WIH25ECJ0SQ'),
(7, 'Arthur', 'Ross', 28884745, 5, '', 'blandit', 'ZYE46HCI4VP'),
(8, 'Rhoda', 'Davenport', 79246190, 3, '', 'justo', 'ZJS27AEH1QG'),
(9, 'Leroy', 'Fuller', 94795782, 6, '', 'non', 'TNG50KZM8DZ'),
(10, 'Maisie', 'Noel', 57592160, 4, '', 'porta', 'SRU61HFJ6PM'),
(11, 'Charlotte', 'Phelps', 65384425, 4, '', 'mi', 'TWY09QUV6RA'),
(13, 'Frances', 'Wagner', 15103480, 4, '', 'nostra,', 'OVA74LFP7KX'),
(16, 'Adria', 'Cross', 3907755, 9, '', 'mattis', 'YJU39YHL1LB'),
(17, 'Kennan', 'Underwood', 83308970, 7, '', 'mauris', 'CBS44MAD5KI'),
(18, 'Breanna', 'Dotson', 15162195, 2, '', 'Donec', 'MCP61KBP8CQ'),
(19, 'Brennan', 'Duncan', 73199184, 6, '', 'elit.', 'BVY42AXI7GX'),
(20, 'Whilemina', 'Espinoza', 14784336, 4, '', 'non', 'UUE46CWY3SW'),
(21, 'Jasper', 'Graham', 85081338, 1, '', 'et', 'RND76NJP4DQ'),
(22, 'Drake', 'Henry', 77715902, 8, '', 'a,', 'BGQ96UUX8YO'),
(23, 'Mia', 'James', 4494640, 2, '', 'sit', 'ZJO72GJG9HN'),
(24, 'Lysandra', 'Swanson', 96050246, 7, '', 'purus', 'DLW41DXY2OB'),
(25, 'Breanna', 'Snow', 14001576, 9, '', 'leo', 'FWR63HUE3HN'),
(26, 'Drake', 'Booth', 32514984, 2, '', 'gravida', 'NXA05SSW3DY'),
(27, 'Astra', 'Montgomery', 80636809, 9, '', 'est,', 'JOZ69UTU4ZJ'),
(28, 'Mona', 'Suarez', 58347310, 5, '', 'Maecenas', 'QNY20PGR1TF'),
(29, 'Katell', 'Hartman', 66213837, 7, '', 'vulputate', 'FBY47AUE6NZ'),
(30, 'Dawn', 'Leonard', 53754574, 9, '', 'egestas', 'URS28RYE4LI'),
(32, 'Sandra', 'Cook', 56596547, 3, '', 'non,', 'SYJ44QWQ2QM'),
(33, 'Anjolie', 'Brooks', 5281828, 7, '', 'tellus', 'SGK12EWC9VL'),
(34, 'Kadeem', 'Hartman', 39981798, 2, '', 'eleifend', 'UNK84ORO2YO'),
(35, 'Ingrid', 'Stevens', 32306648, 9, '', 'morbi', 'NWX75ZLW8DX'),
(36, 'Raya', 'Alvarez', 81201383, 8, '', 'gravida.', 'PBN91FDH1TW'),
(37, 'Geraldine', 'Webb', 20321753, 1, '', 'molestie.', 'CMT45PQF5EL'),
(38, 'Adria', 'Delaney', 97683937, 1, '', 'in', 'JUT85AJH7PO'),
(39, 'Maia', 'Mcmillan', 95250148, 8, '', 'accumsan', 'LMS32KJV1TA'),
(40, 'Zane', 'Lawson', 89934810, 4, '', 'amet', 'RGA48DWC3VJ'),
(41, 'Madaline', 'Hester', 15259332, 6, '', 'enim', 'SVI46ICT4LG'),
(42, 'Jesse', 'Chang', 37045264, 8, '', 'sed,', 'LPP00ZPN6GF'),
(43, 'Declan', 'Nunez', 29935511, 3, '', 'ultrices', 'LQO83EFV9RH'),
(44, 'Ruby', 'Blair', 46408725, 5, '', 'molestie.', 'CXW01BTR7UQ'),
(45, 'Madaline', 'Baird', 28302409, 1, '', 'adipiscing.', 'BPA07QVZ0SX'),
(46, 'April', 'Donovan', 71961232, 3, '', 'Curabitur', 'DKF30MXO4OU'),
(48, 'Ashely', 'Hays', 27471760, 9, '', 'risus.', 'NVU66IEA7RA'),
(49, 'Tobias', 'Williamson', 41098480, 1, '', 'at,', 'YEW08JMK1CK'),
(50, 'Clark', 'Bell', 78326038, 1, '', 'posuere,', 'INR85GOZ6RG'),
(51, 'Marshall', 'James', 81242369, 1, '', 'Ut', 'VKP62FXB6DF'),
(52, 'Blythe', 'Goodwin', 43801088, 1, '', 'mus.', 'ZYU80IAB6KX'),
(53, 'Jack', 'Prince', 36573081, 5, '', 'neque.', 'BXN10QTT7IM'),
(56, 'Lynn', 'Guy', 76373891, 4, '', 'tristique', 'GHM25JXD3OS'),
(57, 'Mary', 'Zamora', 31814857, 8, '', 'varius', 'RTG81GRY9PN'),
(58, 'Galena', 'Massey', 79665916, 3, '', 'per', 'SYZ93LTI9HF'),
(59, 'Jolie', 'Whitney', 80923435, 7, '', 'at', 'JPT38NVJ5XR'),
(60, 'Kirestin', 'Harper', 56358757, 1, '', 'Donec', 'LIW55KJZ0ZQ'),
(61, 'Kristen', 'Ortega', 5518649, 2, '', 'a', 'RDK46KLI6CN'),
(62, 'Olympia', 'Sosa', 11206802, 1, '', 'libero', 'BHY45VAO1HJ'),
(63, 'Nissim', 'Durham', 62287644, 2, '', 'ornare', 'VRF36NBM6DB'),
(64, 'Imani', 'Phelps', 95441683, 1, '', 'tristique', 'DJZ29KJD9YJ'),
(65, 'Alea', 'Duran', 1388920, 3, '', 'ultrices', 'QOI11EID6BS'),
(66, 'Ryan', 'Fisher', 38801715, 4, '', 'Nunc', 'KSA70FGC2JY'),
(67, 'Maggy', 'Richards', 45950439, 5, '', 'ullamcorper.', 'GQQ79WQL5US'),
(69, 'Curran', 'Lyons', 89285983, 8, '', 'mauris,', 'FGH15KTX9TY'),
(70, 'Chloe', 'Hopkins', 8361576, 4, '', 'vitae,', 'SZB82NYH8RB'),
(71, 'Kamal', 'Conley', 53228516, 3, '', 'leo', 'RDC32FKD4UG'),
(73, 'Travis', 'Mcintosh', 53806590, 4, '', 'est', 'XVH59GHQ8XH'),
(74, 'Dawn', 'Knapp', 63006736, 8, '', 'vehicula', 'MHH50HXG4AP'),
(75, 'Donna', 'Castaneda', 48402575, 1, '', 'tellus,', 'NTS32IPJ0WI'),
(76, 'Nehru', 'Raymond', 27274444, 7, '', 'Pellentesque', 'EJB44VLN8NH'),
(77, 'Maya', 'Boone', 63669851, 3, '', 'Donec', 'PYV34YRH1FR'),
(78, 'Rama', 'Drake', 58988734, 6, '', 'vestibulum', 'OTK31ARL6BM'),
(80, 'Simon', 'Holland', 61995763, 4, '', 'Vestibulum', 'VFX73WBE4RP'),
(81, 'Eric', 'Mcfarland', 13330595, 2, '', 'Nulla', 'MYL88ICW0YZ'),
(82, 'Sage', 'Levine', 40618894, 2, '', 'id,', 'ACE12XAN5SE'),
(83, 'Zeus', 'Petty', 48648527, 9, '', 'Suspendisse', 'VYY04ADC5TE'),
(86, 'McKenzie', 'Mccall', 17553100, 2, '', 'Nulla', 'CFS19OLI7JJ'),
(87, 'Dolan', 'Wynn', 58238846, 5, '', 'quam.', 'NMG79FEB8SR'),
(88, 'Tamara', 'Yates', 72626376, 9, '', 'mollis', 'MRV36DHZ0SL'),
(89, 'Marvin', 'Kane', 53019834, 9, '', 'amet', 'WKY14UBI5CV'),
(90, 'Ferdinand', 'Fry', 58867638, 9, '', 'aliquet', 'PYH97JNA6ME'),
(91, 'Azalia', 'Velazquez', 43783337, 4, '', 'augue', 'ADM40HGJ7WE'),
(92, 'Brielle', 'Maynard', 44760357, 9, '', 'Nam', 'AOY14XNF0JK'),
(93, 'Summer', 'Mccormick', 91398712, 3, '', 'elit', 'EYT93UXC5XC'),
(94, 'Scott', 'Cunningham', 44292011, 8, '', 'montes,', 'AMI12JEG3ZU'),
(95, 'Desiree', 'Lamb', 48260705, 8, '', 'Aliquam', 'OKR78WCU4MZ'),
(96, 'Karyn', 'Ellis', 25931272, 4, '', 'Aliquam', 'XBA59UVQ4OZ'),
(97, 'Christine', 'Morin', 89832842, 8, '', 'velit', 'STB71AUA8KD'),
(98, 'Clayton', 'Ware', 34484139, 2, '', 'Duis', 'ANH78CFL8TK'),
(99, 'Gannon', 'Barnett', 57730534, 6, '', 'dapibus', 'HCP51VQC1RI'),
(100, 'Nathan', 'Whitehead', 13226177, 6, '', 'nibh.', 'WJG99YMJ7JO');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `assessment`
--
ALTER TABLE `assessment`
 ADD PRIMARY KEY (`AssessmentNo`), ADD KEY `fk_assessment` (`Report_to_Assess`);

--
-- Indexes for table `group`
--
ALTER TABLE `group`
 ADD PRIMARY KEY (`GroupNo`), ADD KEY `fk_group` (`ReportNo`);

--
-- Indexes for table `report`
--
ALTER TABLE `report`
 ADD PRIMARY KEY (`ReportNo`);

--
-- Indexes for table `score`
--
ALTER TABLE `score`
 ADD PRIMARY KEY (`ScoreNo`), ADD KEY `fk_score` (`AssessmentNo`);

--
-- Indexes for table `student`
--
ALTER TABLE `student`
 ADD PRIMARY KEY (`StudentNo`), ADD KEY `fk_student` (`GroupNo`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `assessment`
--
ALTER TABLE `assessment`
MODIFY `AssessmentNo` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=101;
--
-- AUTO_INCREMENT for table `group`
--
ALTER TABLE `group`
MODIFY `GroupNo` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=101;
--
-- AUTO_INCREMENT for table `report`
--
ALTER TABLE `report`
MODIFY `ReportNo` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=31;
--
-- AUTO_INCREMENT for table `score`
--
ALTER TABLE `score`
MODIFY `ScoreNo` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=91;
--
-- AUTO_INCREMENT for table `student`
--
ALTER TABLE `student`
MODIFY `StudentNo` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=101;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `assessment`
--
ALTER TABLE `assessment`
ADD CONSTRAINT `fk_assessment` FOREIGN KEY (`Report_to_Assess`) REFERENCES `report` (`ReportNo`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `group`
--
ALTER TABLE `group`
ADD CONSTRAINT `fk_group` FOREIGN KEY (`ReportNo`) REFERENCES `report` (`ReportNo`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `score`
--
ALTER TABLE `score`
ADD CONSTRAINT `fk_score` FOREIGN KEY (`AssessmentNo`) REFERENCES `assessment` (`AssessmentNo`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `student`
--
ALTER TABLE `student`
ADD CONSTRAINT `fk_student` FOREIGN KEY (`GroupNo`) REFERENCES `group` (`GroupNo`) ON DELETE CASCADE ON UPDATE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
