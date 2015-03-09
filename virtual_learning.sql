-- phpMyAdmin SQL Dump
-- version 4.2.11
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Mar 09, 2015 at 12:09 PM
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
) ENGINE=InnoDB AUTO_INCREMENT=91 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `assessment`
--

INSERT INTO `assessment` (`AssessmentNo`, `GroupNo`, `Report_to_Assess`, `Score`) VALUES
(1, 4, 14, 24),
(2, 7, 21, 23),
(3, 7, 2, 33),
(4, 11, 13, 47),
(5, 10, 28, 20),
(6, 6, 21, 22),
(7, 30, 10, 40),
(8, 12, 4, 28),
(9, 16, 5, 46),
(10, 21, 19, 44),
(11, 28, 15, 38),
(12, 29, 19, 31),
(13, 13, 3, 48),
(14, 27, 2, 45),
(15, 16, 5, 22),
(16, 25, 24, 49),
(17, 5, 5, 23),
(18, 8, 4, 34),
(19, 28, 10, 32),
(20, 23, 10, 25),
(21, 30, 24, 28),
(22, 5, 26, 23),
(23, 28, 27, 45),
(24, 6, 1, 48),
(25, 9, 9, 38),
(26, 18, 30, 37),
(27, 29, 22, 46),
(28, 1, 7, 46),
(29, 9, 30, 24),
(30, 13, 4, 36),
(31, 17, 2, 41),
(32, 12, 21, 48),
(33, 11, 19, 27),
(34, 26, 29, 48),
(35, 10, 9, 49),
(36, 2, 23, 25),
(37, 10, 20, 44),
(38, 15, 15, 37),
(39, 29, 12, 33),
(40, 30, 3, 20),
(41, 22, 13, 24),
(42, 14, 11, 44),
(43, 1, 8, 25),
(44, 12, 12, 38),
(45, 17, 1, 25),
(46, 19, 30, 28),
(47, 27, 11, 36),
(48, 16, 25, 42),
(49, 20, 3, 40),
(50, 7, 7, 39),
(51, 25, 28, 27),
(52, 18, 15, 46),
(53, 24, 7, 23),
(54, 8, 6, 49),
(55, 19, 14, 26),
(56, 27, 16, 36),
(57, 26, 8, 29),
(58, 18, 13, 39),
(59, 9, 24, 25),
(60, 21, 18, 23),
(61, 17, 14, 35),
(62, 20, 25, 34),
(63, 2, 20, 43),
(64, 3, 12, 50),
(65, 14, 6, 33),
(66, 25, 29, 38),
(67, 5, 17, 20),
(68, 22, 27, 48),
(69, 4, 18, 34),
(70, 19, 20, 48),
(71, 26, 26, 40),
(72, 20, 11, 31),
(73, 22, 17, 46),
(74, 3, 18, 38),
(75, 1, 16, 30),
(76, 15, 22, 40),
(77, 14, 9, 45),
(78, 23, 22, 48),
(79, 13, 17, 23),
(80, 3, 16, 25),
(81, 11, 26, 36),
(82, 15, 6, 22),
(83, 24, 23, 47),
(84, 24, 27, 32),
(85, 6, 8, 40),
(86, 4, 28, 25),
(87, 23, 25, 22),
(88, 2, 29, 35),
(89, 8, 1, 33),
(90, 21, 23, 25);

-- --------------------------------------------------------

--
-- Table structure for table `group`
--

CREATE TABLE IF NOT EXISTS `group` (
`GroupNo` int(11) NOT NULL,
  `ReportNo` int(11) DEFAULT NULL,
  `AverageScore` int(11) DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=101 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `group`
--

INSERT INTO `group` (`GroupNo`, `ReportNo`, `AverageScore`) VALUES
(1, 1, 4),
(2, 2, 7),
(3, 3, 46),
(4, 4, 4),
(5, 5, 11),
(6, 6, 29),
(7, 7, 36),
(8, 8, 15),
(9, 9, 17),
(10, 10, 8),
(11, 11, 33),
(12, 12, 33),
(13, 13, 27),
(14, 14, 25),
(15, 15, 14),
(16, 16, 50),
(17, 17, 38),
(18, 18, 21),
(19, 19, 10),
(20, 20, 24),
(21, 21, 3),
(22, 22, 13),
(23, 23, 43),
(24, 24, 42),
(25, 25, 4),
(26, 26, 6),
(27, 27, 7),
(28, 28, 41),
(29, 29, 7),
(30, 30, 10),
(31, 31, 31),
(32, 32, 12),
(33, 33, 40),
(34, 34, 46),
(35, 35, 0),
(36, 36, 50),
(37, 37, 8),
(38, 38, 41),
(39, 39, 33),
(40, 40, 18),
(41, 41, 45),
(42, 42, 23),
(43, 43, 15),
(44, 44, 1),
(45, 45, 50),
(46, 46, 21),
(47, 47, 45),
(48, 48, 26),
(49, 49, 36),
(50, 50, 50),
(51, 51, 26),
(52, 52, 44),
(53, 53, 22),
(54, 54, 36),
(55, 55, 13),
(56, 56, 35),
(57, 57, 14),
(58, 58, 31),
(59, 59, 25),
(60, 60, 35),
(61, 61, 31),
(62, 62, 46),
(63, 63, 5),
(64, 64, 39),
(65, 65, 42),
(66, 66, 5),
(67, 67, 37),
(68, 68, 11),
(69, 69, 24),
(70, 70, 2),
(71, 71, 2),
(72, 72, 21),
(73, 73, 28),
(74, 74, 2),
(75, 75, 47),
(76, 76, 21),
(77, 77, 29),
(78, 78, 46),
(79, 79, 48),
(80, 80, 34),
(81, 81, 23),
(82, 82, 1),
(83, 83, 40),
(84, 84, 15),
(85, 85, 48),
(86, 86, 2),
(87, 87, 35),
(88, 88, 1),
(89, 89, 40),
(90, 90, 15),
(91, 91, 26),
(92, 92, 22),
(93, 93, 5),
(94, 94, 35),
(95, 95, 29),
(96, 96, 49),
(97, 97, 43),
(98, 98, 14),
(99, 99, 20),
(100, 100, 27);

-- --------------------------------------------------------

--
-- Table structure for table `report`
--

CREATE TABLE IF NOT EXISTS `report` (
`ReportNo` int(11) NOT NULL,
  `GroupNo` int(11) NOT NULL,
  `File_Link` varchar(255) NOT NULL,
  `File_Name` varchar(255) NOT NULL,
  `File_Size` varchar(255) NOT NULL,
  `File_Type` varchar(255) NOT NULL,
  `Group` varchar(50) NOT NULL,
  `Intro` blob NOT NULL,
  `Main` blob NOT NULL,
  `Conclusion` blob NOT NULL,
  `Submission_Timestamp` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `Submission_Updated` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB AUTO_INCREMENT=38 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `report`
--

INSERT INTO `report` (`ReportNo`, `GroupNo`, `File_Link`, `File_Name`, `File_Size`, `File_Type`, `Group`, `Intro`, `Main`, `Conclusion`, `Submission_Timestamp`, `Submission_Updated`) VALUES
(1, 0, 'BlackjackCoupons.co.uk', '', '', '', '', '', '', '', '2015-02-05 14:53:10', '2015-02-05 14:53:10'),
(2, 0, 'TribalCMS.co.uk', '', '', '', '', '', '', '', '2015-02-05 14:53:10', '2015-02-05 14:53:10'),
(3, 0, 'IRSAnalysis.co.uk', '', '', '', '', '', '', '', '2015-02-05 14:53:10', '2015-02-05 14:53:10'),
(4, 0, 'DumbDecisions.co.uk', '', '', '', '', '', '', '', '2015-02-05 14:53:10', '2015-02-05 14:53:10'),
(5, 0, 'eFlirtation.co.uk', '', '', '', '', '', '', '', '2015-02-05 14:53:10', '2015-02-05 14:53:10'),
(6, 0, 'GolfRebanking.co.uk', '', '', '', '', '', '', '', '2015-02-05 14:53:10', '2015-02-05 14:53:10'),
(7, 0, 'BirdWash.co.uk', '', '', '', '', '', '', '', '2015-02-05 14:53:10', '2015-02-05 14:53:10'),
(8, 0, 'VisitorBiz.co.uk', '', '', '', '', '', '', '', '2015-02-05 14:53:10', '2015-02-05 14:53:10'),
(9, 0, 'AdminParking.co.uk', '', '', '', '', '', '', '', '2015-02-05 14:53:10', '2015-02-05 14:53:10'),
(10, 0, 'MLSLibrary.co.uk', '', '', '', '', '', '', '', '2015-02-05 14:53:10', '2015-02-05 14:53:10'),
(11, 0, 'DetectMesothelioma.co.uk', '', '', '', '', '', '', '', '2015-02-05 14:53:10', '2015-02-05 14:53:10'),
(12, 0, 'IdahoFallsHouses.co.uk', '', '', '', '', '', '', '', '2015-02-05 14:53:10', '2015-02-05 14:53:10'),
(13, 0, 'WikiZip.co.uk', '', '', '', '', '', '', '', '2015-02-05 14:53:10', '2015-02-05 14:53:10'),
(14, 0, 'OyYachts.co.uk', '', '', '', '', '', '', '', '2015-02-05 14:53:10', '2015-02-05 14:53:10'),
(15, 0, 'InfoExam.co.uk', '', '', '', '', '', '', '', '2015-02-05 14:53:10', '2015-02-05 14:53:10'),
(16, 0, 'InnovationBrains.co.uk', '', '', '', '', '', '', '', '2015-02-05 14:53:10', '2015-02-05 14:53:10'),
(17, 0, 'ExtraProm.co.uk', '', '', '', '', '', '', '', '2015-02-05 14:53:10', '2015-02-05 14:53:10'),
(18, 0, 'LandscapingPortfolio.co.uk', '', '', '', '', '', '', '', '2015-02-05 14:53:10', '2015-02-05 14:53:10'),
(19, 0, 'FurnishingExperts.co.uk', '', '', '', '', '', '', '', '2015-02-05 14:53:10', '2015-02-05 14:53:10'),
(20, 0, 'VendingPrograms.co.uk', '', '', '', '', '', '', '', '2015-02-05 14:53:10', '2015-02-05 14:53:10'),
(21, 0, 'ConcertStaff.co.uk', '', '', '', '', '', '', '', '2015-02-05 14:53:10', '2015-02-05 14:53:10'),
(22, 0, 'DomainFundraiser.co.uk', '', '', '', '', '', '', '', '2015-02-05 14:53:10', '2015-02-05 14:53:10'),
(23, 0, 'SalaryGame.co.uk', '', '', '', '', '', '', '', '2015-02-05 14:53:10', '2015-02-05 14:53:10'),
(24, 0, 'PopBids.co.uk', '', '', '', '', '', '', '', '2015-02-05 14:53:10', '2015-02-05 14:53:10'),
(25, 0, 'DnOptions.co.uk', '', '', '', '', '', '', '', '2015-02-05 14:53:10', '2015-02-05 14:53:10'),
(26, 0, 'PalJam.co.uk', '', '', '', '', '', '', '', '2015-02-05 14:53:10', '2015-02-05 14:53:10'),
(27, 0, 'SlyFriend.co.uk', '', '', '', '', '', '', '', '2015-02-05 14:53:10', '2015-02-05 14:53:10'),
(28, 0, 'ParadeBlog.co.uk', '', '', '', '', '', '', '', '2015-02-05 14:53:10', '2015-02-05 14:53:10'),
(29, 0, 'AirEnhancer.co.uk', '', '', '', '', '', '', '', '2015-02-05 14:53:10', '2015-02-05 14:53:10'),
(30, 0, 'EspressoTalk.co.uk', '', '', '', '', '', '', '', '2015-02-05 14:53:10', '2015-02-05 14:53:10'),
(31, 4, 'http://localhost/virtual_learning/uploads/unltd_logo.jpg', 'unltd_logo.jpg', '51430', 'image/jpeg', '', '', '', '', '2015-03-09 01:36:54', '2015-03-09 00:36:54'),
(32, 4, 'http://localhost/virtual_learning/uploads/Soompi Post.docx', 'Soompi Post.docx', '14660', 'application/vnd.openxmlformats-officedocument.wordprocessingml.document', '', '', '', '', '2015-03-09 01:38:59', '2015-03-09 00:38:59'),
(34, 4, 'http://localhost/virtual_learning/uploads/the-northern-line-game.jpg', 'the-northern-line-game.jpg', '276324', 'image/jpeg', '', '', '', '', '2015-03-09 01:46:48', '2015-03-09 00:46:48'),
(35, 4, 'http://localhost/virtual_learning/uploads/Lee%20Juck%20-%20I%27m%20So%20Fortunate.docx', 'Lee Juck - I''m So Fortunate.docx', '15133', 'application/vnd.openxmlformats-officedocument.wordprocessingml.document', '', '', '', '', '2015-03-09 01:47:22', '2015-03-09 00:47:22'),
(36, 4, 'http://localhost/virtual_learning/uploads/12339297_9648727_lz.jpg', '12339297_9648727_lz.jpg', '118379', 'image/jpeg', '', '', '', '', '2015-03-09 11:28:10', '2015-03-09 10:28:10'),
(37, 4, 'http://localhost/virtual_learning/uploads/report.xml', 'report.xml', '2411', 'text/xml', '', '', '', '', '2015-03-09 11:41:29', '2015-03-09 10:41:29');

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
) ENGINE=InnoDB AUTO_INCREMENT=151 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `score`
--

INSERT INTO `score` (`ScoreNo`, `AssessmentNo`, `CriteriaNo`, `Comment`, `Score_Criteria`) VALUES
(1, 1, '1', 'vitae purus gravida sagittis. Duis gravida. Praesent eu nulla at sem molestie sodales. Mauris blandit enim consequat purus. Maecenas libero', 2),
(2, 1, '2', 'Phasellus at augue id ante dictum cursus. Nunc mauris elit, dictum eu, eleifend nec, malesuada ut, sem. Nulla interdum. Curabitur', 3),
(3, 1, '3', 'semper et, lacinia vitae, sodales at, velit. Pellentesque ultricies dignissim lacus. Aliquam rutrum lorem ac risus. Morbi metus. Vivamus euismod', 4),
(4, 1, '4', 'lorem lorem, luctus ut, pellentesque eget, dictum placerat, augue. Sed molestie. Sed id risus quis diam luctus lobortis. Class aptent', 7),
(5, 1, '5', 'Sed et libero. Proin mi. Aliquam gravida mauris ut mi. Duis risus odio, auctor vitae, aliquet nec, imperdiet nec, leo.', 5),
(6, 2, '1', 'urna. Nullam lobortis quam a felis ullamcorper viverra. Maecenas iaculis aliquet diam. Sed diam lorem, auctor quis, tristique ac, eleifend', 10),
(7, 2, '2', 'nisi. Aenean eget metus. In nec orci. Donec nibh. Quisque nonummy ipsum non arcu. Vivamus sit amet risus. Donec egestas.', 6),
(8, 2, '3', 'elementum, lorem ut aliquam iaculis, lacus pede sagittis augue, eu tempor erat neque non quam. Pellentesque habitant morbi tristique senectus', 3),
(9, 2, '4', 'ornare sagittis felis. Donec tempor, est ac mattis semper, dui lectus rutrum urna, nec luctus felis purus ac tellus. Suspendisse', 7),
(10, 2, '5', 'ipsum. Donec sollicitudin adipiscing ligula. Aenean gravida nunc sed pede. Cum sociis natoque penatibus et magnis dis parturient montes, nascetur', 4),
(11, 3, '1', 'ipsum. Donec sollicitudin adipiscing ligula. Aenean gravida nunc sed pede. Cum sociis natoque penatibus et magnis dis parturient montes, nascetur', 8),
(12, 3, '2', 'orci, consectetuer euismod est arcu ac orci. Ut semper pretium neque. Morbi quis urna. Nunc quis arcu vel quam dignissim', 3),
(13, 3, '3', 'Suspendisse non leo. Vivamus nibh dolor, nonummy ac, feugiat non, lobortis quis, pede. Suspendisse dui. Fusce diam nunc, ullamcorper eu,', 9),
(14, 3, '4', 'Mauris vel turpis. Aliquam adipiscing lobortis risus. In mi pede, nonummy ut, molestie in, tempus eu, ligula. Aenean euismod mauris', 9),
(15, 3, '5', 'mi eleifend egestas. Sed pharetra, felis eget varius ultrices, mauris ipsum porta elit, a feugiat tellus lorem eu metus. In', 4),
(16, 4, '1', 'commodo hendrerit. Donec porttitor tellus non magna. Nam ligula elit, pretium et, rutrum non, hendrerit id, ante. Nunc mauris sapien,', 9),
(17, 4, '2', 'Fusce mollis. Duis sit amet diam eu dolor egestas rhoncus. Proin nisl sem, consequat nec, mollis vitae, posuere at, velit.', 3),
(18, 4, '3', 'augue ac ipsum. Phasellus vitae mauris sit amet lorem semper auctor. Mauris vel turpis. Aliquam adipiscing lobortis risus. In mi', 8),
(19, 4, '4', 'lorem, luctus ut, pellentesque eget, dictum placerat, augue. Sed molestie. Sed id risus quis diam luctus lobortis. Class aptent taciti', 1),
(20, 4, '5', 'parturient montes, nascetur ridiculus mus. Aenean eget magna. Suspendisse tristique neque venenatis lacus. Etiam bibendum fermentum metus. Aenean sed pede', 9),
(21, 5, '1', 'sem ut dolor dapibus gravida. Aliquam tincidunt, nunc ac mattis ornare, lectus ante dictum mi, ac mattis velit justo nec', 9),
(22, 5, '2', 'sit amet luctus vulputate, nisi sem semper erat, in consectetuer ipsum nunc id enim. Curabitur massa. Vestibulum accumsan neque et', 4),
(23, 5, '3', 'libero lacus, varius et, euismod et, commodo at, libero. Morbi accumsan laoreet ipsum. Curabitur consequat, lectus sit amet luctus vulputate,', 8),
(24, 5, '4', 'vulputate dui, nec tempus mauris erat eget ipsum. Suspendisse sagittis. Nullam vitae diam. Proin dolor. Nulla semper tellus id nunc', 4),
(25, 5, '5', 'velit dui, semper et, lacinia vitae, sodales at, velit. Pellentesque ultricies dignissim lacus. Aliquam rutrum lorem ac risus. Morbi metus.', 1),
(26, 6, '1', 'aliquet lobortis, nisi nibh lacinia orci, consectetuer euismod est arcu ac orci. Ut semper pretium neque. Morbi quis urna. Nunc', 7),
(27, 6, '2', 'orci, in consequat enim diam vel arcu. Curabitur ut odio vel est tempor bibendum. Donec felis orci, adipiscing non, luctus', 7),
(28, 6, '3', 'eros non enim commodo hendrerit. Donec porttitor tellus non magna. Nam ligula elit, pretium et, rutrum non, hendrerit id, ante.', 9),
(29, 6, '4', 'ullamcorper viverra. Maecenas iaculis aliquet diam. Sed diam lorem, auctor quis, tristique ac, eleifend vitae, erat. Vivamus nisi. Mauris nulla.', 10),
(30, 6, '5', 'sed dictum eleifend, nunc risus varius orci, in consequat enim diam vel arcu. Curabitur ut odio vel est tempor bibendum.', 5),
(31, 7, '1', 'laoreet ipsum. Curabitur consequat, lectus sit amet luctus vulputate, nisi sem semper erat, in consectetuer ipsum nunc id enim. Curabitur', 4),
(32, 7, '2', 'orci. Phasellus dapibus quam quis diam. Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas. Fusce', 5),
(33, 7, '3', 'molestie dapibus ligula. Aliquam erat volutpat. Nulla dignissim. Maecenas ornare egestas ligula. Nullam feugiat placerat velit. Quisque varius. Nam porttitor', 3),
(34, 7, '4', 'sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Aenean eget magna. Suspendisse tristique neque venenatis lacus. Etiam', 4),
(35, 7, '5', 'mus. Proin vel nisl. Quisque fringilla euismod enim. Etiam gravida molestie arcu. Sed eu nibh vulputate mauris sagittis placerat. Cras', 7),
(36, 8, '1', 'Sed pharetra, felis eget varius ultrices, mauris ipsum porta elit, a feugiat tellus lorem eu metus. In lorem. Donec elementum,', 6),
(37, 8, '2', 'dolor, nonummy ac, feugiat non, lobortis quis, pede. Suspendisse dui. Fusce diam nunc, ullamcorper eu, euismod ac, fermentum vel, mauris.', 6),
(38, 8, '3', 'Nulla eget metus eu erat semper rutrum. Fusce dolor quam, elementum at, egestas a, scelerisque sed, sapien. Nunc pulvinar arcu', 10),
(39, 8, '4', 'sollicitudin orci sem eget massa. Suspendisse eleifend. Cras sed leo. Cras vehicula aliquet libero. Integer in magna. Phasellus dolor elit,', 6),
(40, 8, '5', 'vel, faucibus id, libero. Donec consectetuer mauris id sapien. Cras dolor dolor, tempus non, lacinia at, iaculis quis, pede. Praesent', 10),
(41, 9, '1', 'Maecenas iaculis aliquet diam. Sed diam lorem, auctor quis, tristique ac, eleifend vitae, erat. Vivamus nisi. Mauris nulla. Integer urna.', 8),
(42, 9, '2', 'auctor velit. Aliquam nisl. Nulla eu neque pellentesque massa lobortis ultrices. Vivamus rhoncus. Donec est. Nunc ullamcorper, velit in aliquet', 8),
(43, 9, '3', 'non dui nec urna suscipit nonummy. Fusce fermentum fermentum arcu. Vestibulum ante ipsum primis in faucibus orci luctus et ultrices', 2),
(44, 9, '4', 'tellus. Phasellus elit pede, malesuada vel, venenatis vel, faucibus id, libero. Donec consectetuer mauris id sapien. Cras dolor dolor, tempus', 5),
(45, 9, '5', 'massa. Integer vitae nibh. Donec est mauris, rhoncus id, mollis nec, cursus a, enim. Suspendisse aliquet, sem ut cursus luctus,', 4),
(46, 10, '1', 'sem semper erat, in consectetuer ipsum nunc id enim. Curabitur massa. Vestibulum accumsan neque et nunc. Quisque ornare tortor at', 9),
(47, 10, '2', 'Curabitur sed tortor. Integer aliquam adipiscing lacus. Ut nec urna et arcu imperdiet ullamcorper. Duis at lacus. Quisque purus sapien,', 5),
(48, 10, '3', 'fermentum vel, mauris. Integer sem elit, pharetra ut, pharetra sed, hendrerit a, arcu. Sed et libero. Proin mi. Aliquam gravida', 9),
(49, 10, '4', 'ut, pellentesque eget, dictum placerat, augue. Sed molestie. Sed id risus quis diam luctus lobortis. Class aptent taciti sociosqu ad', 5),
(50, 10, '5', 'sem, consequat nec, mollis vitae, posuere at, velit. Cras lorem lorem, luctus ut, pellentesque eget, dictum placerat, augue. Sed molestie.', 6),
(51, 11, '1', 'magna. Sed eu eros. Nam consequat dolor vitae dolor. Donec fringilla. Donec feugiat metus sit amet ante. Vivamus non lorem', 3),
(52, 11, '2', 'odio. Aliquam vulputate ullamcorper magna. Sed eu eros. Nam consequat dolor vitae dolor. Donec fringilla. Donec feugiat metus sit amet', 4),
(53, 11, '3', 'eu dui. Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Aenean eget magna. Suspendisse tristique neque', 6),
(54, 11, '4', 'ac arcu. Nunc mauris. Morbi non sapien molestie orci tincidunt adipiscing. Mauris molestie pharetra nibh. Aliquam ornare, libero at auctor', 2),
(55, 11, '5', 'nulla. Integer urna. Vivamus molestie dapibus ligula. Aliquam erat volutpat. Nulla dignissim. Maecenas ornare egestas ligula. Nullam feugiat placerat velit.', 8),
(56, 12, '1', 'condimentum. Donec at arcu. Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia Curae; Donec tincidunt. Donec', 6),
(57, 12, '2', 'ante. Vivamus non lorem vitae odio sagittis semper. Nam tempor diam dictum sapien. Aenean massa. Integer vitae nibh. Donec est', 8),
(58, 12, '3', 'mauris eu elit. Nulla facilisi. Sed neque. Sed eget lacus. Mauris non dui nec urna suscipit nonummy. Fusce fermentum fermentum', 3),
(59, 12, '4', 'mi lorem, vehicula et, rutrum eu, ultrices sit amet, risus. Donec nibh enim, gravida sit amet, dapibus id, blandit at,', 10),
(60, 12, '5', 'pharetra. Nam ac nulla. In tincidunt congue turpis. In condimentum. Donec at arcu. Vestibulum ante ipsum primis in faucibus orci', 5),
(61, 13, '1', 'Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Aenean eget magna. Suspendisse tristique neque venenatis lacus.', 4),
(62, 13, '2', 'facilisis vitae, orci. Phasellus dapibus quam quis diam. Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis', 5),
(63, 13, '3', 'odio vel est tempor bibendum. Donec felis orci, adipiscing non, luctus sit amet, faucibus ut, nulla. Cras eu tellus eu', 3),
(64, 13, '4', 'mi pede, nonummy ut, molestie in, tempus eu, ligula. Aenean euismod mauris eu elit. Nulla facilisi. Sed neque. Sed eget', 1),
(65, 13, '5', 'ullamcorper. Duis cursus, diam at pretium aliquet, metus urna convallis erat, eget tincidunt dui augue eu tellus. Phasellus elit pede,', 9),
(66, 14, '1', 'eget mollis lectus pede et risus. Quisque libero lacus, varius et, euismod et, commodo at, libero. Morbi accumsan laoreet ipsum.', 6),
(67, 14, '2', 'fringilla. Donec feugiat metus sit amet ante. Vivamus non lorem vitae odio sagittis semper. Nam tempor diam dictum sapien. Aenean', 7),
(68, 14, '3', 'molestie. Sed id risus quis diam luctus lobortis. Class aptent taciti sociosqu ad litora torquent per conubia nostra, per inceptos', 3),
(69, 14, '4', 'tincidunt vehicula risus. Nulla eget metus eu erat semper rutrum. Fusce dolor quam, elementum at, egestas a, scelerisque sed, sapien.', 5),
(70, 14, '5', 'luctus ut, pellentesque eget, dictum placerat, augue. Sed molestie. Sed id risus quis diam luctus lobortis. Class aptent taciti sociosqu', 7),
(71, 15, '1', 'nascetur ridiculus mus. Donec dignissim magna a tortor. Nunc commodo auctor velit. Aliquam nisl. Nulla eu neque pellentesque massa lobortis', 5),
(72, 15, '2', 'auctor odio a purus. Duis elementum, dui quis accumsan convallis, ante lectus convallis est, vitae sodales nisi magna sed dui.', 1),
(73, 15, '3', 'gravida. Praesent eu nulla at sem molestie sodales. Mauris blandit enim consequat purus. Maecenas libero est, congue a, aliquet vel,', 5),
(74, 15, '4', 'nascetur ridiculus mus. Proin vel nisl. Quisque fringilla euismod enim. Etiam gravida molestie arcu. Sed eu nibh vulputate mauris sagittis', 2),
(75, 15, '5', 'Pellentesque ultricies dignissim lacus. Aliquam rutrum lorem ac risus. Morbi metus. Vivamus euismod urna. Nullam lobortis quam a felis ullamcorper', 3),
(76, 16, '1', 'ornare sagittis felis. Donec tempor, est ac mattis semper, dui lectus rutrum urna, nec luctus felis purus ac tellus. Suspendisse', 4),
(77, 16, '2', 'sit amet lorem semper auctor. Mauris vel turpis. Aliquam adipiscing lobortis risus. In mi pede, nonummy ut, molestie in, tempus', 5),
(78, 16, '3', 'justo. Proin non massa non ante bibendum ullamcorper. Duis cursus, diam at pretium aliquet, metus urna convallis erat, eget tincidunt', 3),
(79, 16, '4', 'sociosqu ad litora torquent per conubia nostra, per inceptos hymenaeos. Mauris ut quam vel sapien imperdiet ornare. In faucibus. Morbi', 2),
(80, 16, '5', 'natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Proin vel nisl. Quisque fringilla euismod enim. Etiam gravida molestie', 10),
(81, 17, '1', 'fringilla est. Mauris eu turpis. Nulla aliquet. Proin velit. Sed malesuada augue ut lacus. Nulla tincidunt, neque vitae semper egestas,', 2),
(82, 17, '2', 'Curabitur vel lectus. Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Donec dignissim magna a tortor.', 3),
(83, 17, '3', 'Aenean eget metus. In nec orci. Donec nibh. Quisque nonummy ipsum non arcu. Vivamus sit amet risus. Donec egestas. Aliquam', 5),
(84, 17, '4', 'vehicula risus. Nulla eget metus eu erat semper rutrum. Fusce dolor quam, elementum at, egestas a, scelerisque sed, sapien. Nunc', 9),
(85, 17, '5', 'aliquet molestie tellus. Aenean egestas hendrerit neque. In ornare sagittis felis. Donec tempor, est ac mattis semper, dui lectus rutrum', 1),
(86, 18, '1', 'scelerisque neque sed sem egestas blandit. Nam nulla magna, malesuada vel, convallis in, cursus et, eros. Proin ultrices. Duis volutpat', 9),
(87, 18, '2', 'mattis. Integer eu lacus. Quisque imperdiet, erat nonummy ultricies ornare, elit elit fermentum risus, at fringilla purus mauris a nunc.', 2),
(88, 18, '3', 'Etiam bibendum fermentum metus. Aenean sed pede nec ante blandit viverra. Donec tempus, lorem fringilla ornare placerat, orci lacus vestibulum', 10),
(89, 18, '4', 'libero et tristique pellentesque, tellus sem mollis dui, in sodales elit erat vitae risus. Duis a mi fringilla mi lacinia', 9),
(90, 18, '5', 'cursus, diam at pretium aliquet, metus urna convallis erat, eget tincidunt dui augue eu tellus. Phasellus elit pede, malesuada vel,', 7),
(91, 19, '1', 'elementum at, egestas a, scelerisque sed, sapien. Nunc pulvinar arcu et pede. Nunc sed orci lobortis augue scelerisque mollis. Phasellus', 4),
(92, 19, '2', 'luctus, ipsum leo elementum sem, vitae aliquam eros turpis non enim. Mauris quis turpis vitae purus gravida sagittis. Duis gravida.', 1),
(93, 19, '3', 'penatibus et magnis dis parturient montes, nascetur ridiculus mus. Proin vel nisl. Quisque fringilla euismod enim. Etiam gravida molestie arcu.', 2),
(94, 19, '4', 'Duis gravida. Praesent eu nulla at sem molestie sodales. Mauris blandit enim consequat purus. Maecenas libero est, congue a, aliquet', 5),
(95, 19, '5', 'nunc, ullamcorper eu, euismod ac, fermentum vel, mauris. Integer sem elit, pharetra ut, pharetra sed, hendrerit a, arcu. Sed et', 5),
(96, 20, '1', 'Etiam laoreet, libero et tristique pellentesque, tellus sem mollis dui, in sodales elit erat vitae risus. Duis a mi fringilla', 1),
(97, 20, '2', 'pellentesque. Sed dictum. Proin eget odio. Aliquam vulputate ullamcorper magna. Sed eu eros. Nam consequat dolor vitae dolor. Donec fringilla.', 3),
(98, 20, '3', 'libero est, congue a, aliquet vel, vulputate eu, odio. Phasellus at augue id ante dictum cursus. Nunc mauris elit, dictum', 3),
(99, 20, '4', 'ut dolor dapibus gravida. Aliquam tincidunt, nunc ac mattis ornare, lectus ante dictum mi, ac mattis velit justo nec ante.', 5),
(100, 20, '5', 'dictum sapien. Aenean massa. Integer vitae nibh. Donec est mauris, rhoncus id, mollis nec, cursus a, enim. Suspendisse aliquet, sem', 2),
(101, 21, '1', 'nibh sit amet orci. Ut sagittis lobortis mauris. Suspendisse aliquet molestie tellus. Aenean egestas hendrerit neque. In ornare sagittis felis.', 10),
(102, 21, '2', 'arcu. Aliquam ultrices iaculis odio. Nam interdum enim non nisi. Aenean eget metus. In nec orci. Donec nibh. Quisque nonummy', 8),
(103, 21, '3', 'adipiscing non, luctus sit amet, faucibus ut, nulla. Cras eu tellus eu augue porttitor interdum. Sed auctor odio a purus.', 3),
(104, 21, '4', 'mattis. Integer eu lacus. Quisque imperdiet, erat nonummy ultricies ornare, elit elit fermentum risus, at fringilla purus mauris a nunc.', 6),
(105, 21, '5', 'enim mi tempor lorem, eget mollis lectus pede et risus. Quisque libero lacus, varius et, euismod et, commodo at, libero.', 1),
(106, 22, '1', 'Mauris vel turpis. Aliquam adipiscing lobortis risus. In mi pede, nonummy ut, molestie in, tempus eu, ligula. Aenean euismod mauris', 4),
(107, 22, '2', 'faucibus leo, in lobortis tellus justo sit amet nulla. Donec non justo. Proin non massa non ante bibendum ullamcorper. Duis', 1),
(108, 22, '3', 'risus. Donec nibh enim, gravida sit amet, dapibus id, blandit at, nisi. Cum sociis natoque penatibus et magnis dis parturient', 2),
(109, 22, '4', 'dis parturient montes, nascetur ridiculus mus. Proin vel nisl. Quisque fringilla euismod enim. Etiam gravida molestie arcu. Sed eu nibh', 8),
(110, 22, '5', 'nec ante blandit viverra. Donec tempus, lorem fringilla ornare placerat, orci lacus vestibulum lorem, sit amet ultricies sem magna nec', 4),
(111, 23, '1', 'vitae aliquam eros turpis non enim. Mauris quis turpis vitae purus gravida sagittis. Duis gravida. Praesent eu nulla at sem', 9),
(112, 23, '2', 'rutrum magna. Cras convallis convallis dolor. Quisque tincidunt pede ac urna. Ut tincidunt vehicula risus. Nulla eget metus eu erat', 2),
(113, 23, '3', 'malesuada vel, convallis in, cursus et, eros. Proin ultrices. Duis volutpat nunc sit amet metus. Aliquam erat volutpat. Nulla facilisis.', 4),
(114, 23, '4', 'Sed eu nibh vulputate mauris sagittis placerat. Cras dictum ultricies ligula. Nullam enim. Sed nulla ante, iaculis nec, eleifend non,', 5),
(115, 23, '5', 'arcu. Sed eu nibh vulputate mauris sagittis placerat. Cras dictum ultricies ligula. Nullam enim. Sed nulla ante, iaculis nec, eleifend', 1),
(116, 24, '1', 'aliquam eros turpis non enim. Mauris quis turpis vitae purus gravida sagittis. Duis gravida. Praesent eu nulla at sem molestie', 6),
(117, 24, '2', 'vitae sodales nisi magna sed dui. Fusce aliquam, enim nec tempus scelerisque, lorem ipsum sodales purus, in molestie tortor nibh', 9),
(118, 24, '3', 'Cras interdum. Nunc sollicitudin commodo ipsum. Suspendisse non leo. Vivamus nibh dolor, nonummy ac, feugiat non, lobortis quis, pede. Suspendisse', 3),
(119, 24, '4', 'amet risus. Donec egestas. Aliquam nec enim. Nunc ut erat. Sed nunc est, mollis non, cursus non, egestas a, dui.', 1),
(120, 24, '5', 'Aenean eget metus. In nec orci. Donec nibh. Quisque nonummy ipsum non arcu. Vivamus sit amet risus. Donec egestas. Aliquam', 6),
(121, 25, '1', 'velit in aliquet lobortis, nisi nibh lacinia orci, consectetuer euismod est arcu ac orci. Ut semper pretium neque. Morbi quis', 2),
(122, 25, '2', 'Nullam velit dui, semper et, lacinia vitae, sodales at, velit. Pellentesque ultricies dignissim lacus. Aliquam rutrum lorem ac risus. Morbi', 9),
(123, 25, '3', 'magna. Sed eu eros. Nam consequat dolor vitae dolor. Donec fringilla. Donec feugiat metus sit amet ante. Vivamus non lorem', 9),
(124, 25, '4', 'ut mi. Duis risus odio, auctor vitae, aliquet nec, imperdiet nec, leo. Morbi neque tellus, imperdiet non, vestibulum nec, euismod', 8),
(125, 25, '5', 'aliquet. Phasellus fermentum convallis ligula. Donec luctus aliquet odio. Etiam ligula tortor, dictum eu, placerat eget, venenatis a, magna. Lorem', 4),
(126, 26, '1', 'Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Etiam laoreet, libero et tristique pellentesque, tellus sem mollis dui, in sodales', 4),
(127, 26, '2', 'Nulla tempor augue ac ipsum. Phasellus vitae mauris sit amet lorem semper auctor. Mauris vel turpis. Aliquam adipiscing lobortis risus.', 8),
(128, 26, '3', 'massa. Mauris vestibulum, neque sed dictum eleifend, nunc risus varius orci, in consequat enim diam vel arcu. Curabitur ut odio', 10),
(129, 26, '4', 'eu, placerat eget, venenatis a, magna. Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Etiam laoreet, libero et tristique pellentesque,', 2),
(130, 26, '5', 'lacinia vitae, sodales at, velit. Pellentesque ultricies dignissim lacus. Aliquam rutrum lorem ac risus. Morbi metus. Vivamus euismod urna. Nullam', 1),
(131, 27, '1', 'molestie in, tempus eu, ligula. Aenean euismod mauris eu elit. Nulla facilisi. Sed neque. Sed eget lacus. Mauris non dui', 2),
(132, 27, '2', 'nascetur ridiculus mus. Donec dignissim magna a tortor. Nunc commodo auctor velit. Aliquam nisl. Nulla eu neque pellentesque massa lobortis', 9),
(133, 27, '3', 'porttitor eros nec tellus. Nunc lectus pede, ultrices a, auctor non, feugiat nec, diam. Duis mi enim, condimentum eget, volutpat', 6),
(134, 27, '4', 'nulla magna, malesuada vel, convallis in, cursus et, eros. Proin ultrices. Duis volutpat nunc sit amet metus. Aliquam erat volutpat.', 8),
(135, 27, '5', 'blandit at, nisi. Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Proin vel nisl. Quisque fringilla', 10),
(136, 28, '1', 'ipsum ac mi eleifend egestas. Sed pharetra, felis eget varius ultrices, mauris ipsum porta elit, a feugiat tellus lorem eu', 7),
(137, 28, '2', 'malesuada fringilla est. Mauris eu turpis. Nulla aliquet. Proin velit. Sed malesuada augue ut lacus. Nulla tincidunt, neque vitae semper', 3),
(138, 28, '3', 'Nulla aliquet. Proin velit. Sed malesuada augue ut lacus. Nulla tincidunt, neque vitae semper egestas, urna justo faucibus lectus, a', 9),
(139, 28, '4', 'in, hendrerit consectetuer, cursus et, magna. Praesent interdum ligula eu enim. Etiam imperdiet dictum magna. Ut tincidunt orci quis lectus.', 7),
(140, 28, '5', 'In faucibus. Morbi vehicula. Pellentesque tincidunt tempus risus. Donec egestas. Duis ac arcu. Nunc mauris. Morbi non sapien molestie orci', 1),
(141, 29, '1', 'in consequat enim diam vel arcu. Curabitur ut odio vel est tempor bibendum. Donec felis orci, adipiscing non, luctus sit', 6),
(142, 29, '2', 'turpis nec mauris blandit mattis. Cras eget nisi dictum augue malesuada malesuada. Integer id magna et ipsum cursus vestibulum. Mauris', 7),
(143, 29, '3', 'faucibus leo, in lobortis tellus justo sit amet nulla. Donec non justo. Proin non massa non ante bibendum ullamcorper. Duis', 7),
(144, 29, '4', 'Proin ultrices. Duis volutpat nunc sit amet metus. Aliquam erat volutpat. Nulla facilisis. Suspendisse commodo tincidunt nibh. Phasellus nulla. Integer', 3),
(145, 29, '5', 'eget varius ultrices, mauris ipsum porta elit, a feugiat tellus lorem eu metus. In lorem. Donec elementum, lorem ut aliquam', 5),
(146, 30, '1', 'tempus non, lacinia at, iaculis quis, pede. Praesent eu dui. Cum sociis natoque penatibus et magnis dis parturient montes, nascetur', 6),
(147, 30, '2', 'enim. Mauris quis turpis vitae purus gravida sagittis. Duis gravida. Praesent eu nulla at sem molestie sodales. Mauris blandit enim', 1),
(148, 30, '3', 'egestas nunc sed libero. Proin sed turpis nec mauris blandit mattis. Cras eget nisi dictum augue malesuada malesuada. Integer id', 7),
(149, 30, '4', 'commodo ipsum. Suspendisse non leo. Vivamus nibh dolor, nonummy ac, feugiat non, lobortis quis, pede. Suspendisse dui. Fusce diam nunc,', 3),
(150, 30, '5', 'mattis ornare, lectus ante dictum mi, ac mattis velit justo nec ante. Maecenas mi felis, adipiscing fringilla, porttitor vulputate, posuere', 3);

-- --------------------------------------------------------

--
-- Table structure for table `student`
--

CREATE TABLE IF NOT EXISTS `student` (
`StudentNo` int(11) NOT NULL,
  `FirstName` varchar(20) NOT NULL,
  `LastName` varchar(23) NOT NULL,
  `Email` varchar(100) NOT NULL,
  `User_pass` varchar(25) NOT NULL,
  `StudentId` int(11) NOT NULL,
  `GroupNo` int(11) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=91 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `student`
--

INSERT INTO `student` (`StudentNo`, `FirstName`, `LastName`, `Email`, `User_pass`, `StudentId`, `GroupNo`) VALUES
(1, 'Brooke', 'Pickering', 'BrookePickering@ucl.ac.uk', 'test', 14073184, 1),
(2, 'Lucy', 'Giles', 'LucyGiles@ucl.ac.uk', 'ees4liey1eY', 66526786, 1),
(3, 'Benjamin', 'Dawson', 'BenjaminDawson@ucl.ac.uk', 'ic9zueGhi', 55728934, 1),
(4, 'Adam', 'Bruce', 'AdamBruce@ucl.ac.uk', 'xier6Jie6', 65753208, 2),
(5, 'Thomas', 'Holden', 'ThomasHolden@ucl.ac.uk', 'ooXi6eeT8iw', 77096758, 2),
(6, 'Amy', 'Kerr', 'AmyKerr@ucl.ac.uk', 'aiChooh8jeh', 45867151, 2),
(7, 'Mollie', 'Davies', 'MollieDavies@ucl.ac.uk', 'Ohxohzoh6', 86259696, 3),
(8, 'Zachary', 'Wright', 'ZacharyWright@ucl.ac.uk', 'uo6chaeTeiz', 99221457, 3),
(9, 'Jonathan', 'Sharpe', 'JonathanSharpe@ucl.ac.uk', 'aisoh2mieT2', 48971384, 3),
(10, 'Rachel', 'Howard', 'RachelHoward@ucl.ac.uk', 'raquae5Eesh', 45401486, 4),
(11, 'Logan', 'Browne', 'LoganBrowne@ucl.ac.uk', 'aiH5eech8c', 8907706, 4),
(12, 'Lara', 'Short', 'LaraShort@ucl.ac.uk', 'Ophe8kee7ee', 99760077, 4),
(13, 'Louie', 'Wong', 'LouieWong@ucl.ac.uk', 'Oorie3oo0', 46530846, 5),
(14, 'Daniel', 'Palmer', 'DanielPalmer@ucl.ac.uk', 'Ogahch9goo1', 18312339, 5),
(15, 'Finlay', 'Donnelly', 'FinlayDonnelly@ucl.ac.uk', 'ohL9shuf1', 30847594, 5),
(16, 'Maya', 'Burns', 'MayaBurns@ucl.ac.uk', 'youva2ahYai', 58915436, 6),
(17, 'Keira', 'Summers', 'KeiraSummers@ucl.ac.uk', 'Eish3ooge', 2610763, 6),
(18, 'Mohammad', 'Dunn', 'MohammadDunn@ucl.ac.uk', 'gahcuS0iegh', 78038779, 6),
(19, 'Katherine', 'Evans', 'KatherineEvans@ucl.ac.uk', 'jae4Kohraez', 57783440, 7),
(20, 'Anna', 'Howard', 'AnnaHoward@ucl.ac.uk', 'Ta1authixe', 48126048, 7),
(21, 'Charlie', 'Armstrong', 'CharlieArmstrong@ucl.ac.uk', 'Dood9Kaiy8Uo', 90859207, 7),
(22, 'Cameron', 'Simmons', 'CameronSimmons@ucl.ac.uk', 'Mei9aipi2', 47092387, 8),
(23, 'Eloise', 'Burke', 'EloiseBurke@ucl.ac.uk', 'Ii0eef6ahth', 37628132, 8),
(24, 'Thomas', 'Watkins', 'ThomasWatkins@ucl.ac.uk', 'IeDeek8hahf', 7366556, 8),
(25, 'Rosie', 'Clayton', 'RosieClayton@ucl.ac.uk', 'shaeg6Ahgie', 40973246, 9),
(26, 'Sofia', 'Holt', 'SofiaHolt@ucl.ac.uk', 'wiMoufaek4', 15319401, 9),
(27, 'Katie', 'Blackburn', 'KatieBlackburn@ucl.ac.uk', 'phuThop5', 65612643, 9),
(28, 'Hayden', 'Hurst', 'HaydenHurst@ucl.ac.uk', 'zaht1Weitir', 71115234, 10),
(29, 'Laura', 'Hutchinson', 'LauraHutchinson@ucl.ac.uk', 'woh3nim6Tu', 87167062, 10),
(30, 'Elliot', 'Randall', 'ElliotRandall@ucl.ac.uk', 'meeZ8mahwei', 31224430, 10),
(31, 'Scarlett', 'Sharpe', 'ScarlettSharpe@ucl.ac.uk', 'Oht1Ahh7', 46737342, 11),
(32, 'Daniel', 'Schofield', 'DanielSchofield@ucl.ac.uk', 'Iezi1yibeng', 5936602, 11),
(33, 'Katherine', 'Williams', 'KatherineWilliams@ucl.ac.uk', 'oe5ahshahJae', 89427060, 11),
(34, 'Charlotte', 'Stephenson', 'CharlotteStephenson@ucl.ac.uk', 've3ShoTu9vai', 43760249, 12),
(35, 'Katie', 'Craig', 'KatieCraig@ucl.ac.uk', 'WiivahK9ahj', 13489010, 12),
(36, 'Sofia', 'Wall', 'SofiaWall@ucl.ac.uk', 'Luoqu8jee1n', 88403651, 12),
(37, 'Molly', 'Metcalfe', 'MollyMetcalfe@ucl.ac.uk', 'Xae9Fat8us4', 21406700, 13),
(38, 'Finley', 'Anderson', 'FinleyAnderson@ucl.ac.uk', 'Io6ain2am', 37160157, 13),
(39, 'Naomi', 'Cooke', 'NaomiCooke@ucl.ac.uk', 'iek5IeWoh', 68999268, 13),
(40, 'Isabel', 'Connor', 'IsabelConnor@ucl.ac.uk', 'rap3Aigee', 61750462, 14),
(41, 'Joseph', 'Chan', 'JosephChan@ucl.ac.uk', 'luDe2chai', 23367155, 14),
(42, 'Harley', 'Rahman', 'HarleyRahman@ucl.ac.uk', 'ihaiSar0hoh', 53006197, 14),
(43, 'Jay', 'Hobbs', 'JayHobbs@ucl.ac.uk', 'zaeK0yezas', 4777646, 15),
(44, 'Erin', 'Walsh', 'ErinWalsh@ucl.ac.uk', 'aeMi1aiQu', 10840872, 15),
(45, 'Molly', 'Russell', 'MollyRussell@ucl.ac.uk', 'auGei5za3ah', 11068064, 15),
(46, 'Gabriel', 'Stevens', 'GabrielStevens@ucl.ac.uk', 'aimah7Eev5V', 88630093, 16),
(47, 'Muhammad', 'Brady', 'MuhammadBrady@ucl.ac.uk', 'thohCiehae6X', 68935366, 16),
(48, 'Jasmine', 'Kirby', 'JasmineKirby@ucl.ac.uk', 'Uu9Aecaich', 82292589, 16),
(49, 'Tilly', 'Sinclair', 'TillySinclair@ucl.ac.uk', 'Niez2ahquix6vu', 25631273, 17),
(50, 'Mohammad', 'Wheeler', 'MohammadWheeler@ucl.ac.uk', 'oM5Zifoezei', 21893050, 17),
(51, 'Zachary', 'Kelly', 'ZacharyKelly@ucl.ac.uk', 'evo9IezaiN', 97462147, 17),
(52, 'Tom', 'Flynn', 'TomFlynn@ucl.ac.uk', 'aif1Osaej', 14138172, 18),
(53, 'Callum', 'Rowley', 'CallumRowley@ucl.ac.uk', 'Ahr3Wah7ee', 86319898, 18),
(54, 'Oscar', 'Burns', 'OscarBurns@ucl.ac.uk', 'nied2Jeojoo', 4785616, 18),
(55, 'Gabriel', 'Williams', 'GabrielWilliams@ucl.ac.uk', 'Iec3luak0i', 70527508, 19),
(56, 'Ewan', 'Atkins', 'EwanAtkins@ucl.ac.uk', 'egohh9aeH', 80487745, 19),
(57, 'Isabella', 'Miles', 'IsabellaMiles@ucl.ac.uk', 'Aiqu0xeey', 19025721, 19),
(58, 'Sienna', 'Dunn', 'SiennaDunn@ucl.ac.uk', 'Kikoneiso0', 40393336, 20),
(59, 'Noah', 'Harvey', 'NoahHarvey@ucl.ac.uk', 'uy9shahF', 14330840, 20),
(60, 'Reece', 'Hobbs', 'ReeceHobbs@ucl.ac.uk', 'yahng5See', 68423387, 20),
(61, 'Ewan', 'Thomson', 'EwanThomson@ucl.ac.uk', 'oog5Zach', 93325950, 21),
(62, 'Lucy', 'Owen', 'LucyOwen@ucl.ac.uk', 'ahXu3Die', 35565977, 21),
(63, 'Mohammad', 'Gordon', 'MohammadGordon@ucl.ac.uk', 'eeLoh8eek6Moh', 59429823, 21),
(64, 'Leah', 'Coles', 'LeahColes@ucl.ac.uk', 'ohGoph7oocoo', 83045718, 22),
(65, 'Libby', 'Price', 'LibbyPrice@ucl.ac.uk', 'Giil0Yoi6puk', 33879764, 22),
(66, 'Joshua', 'Griffin', 'JoshuaGriffin@ucl.ac.uk', 'Faenu1fah7', 34033692, 22),
(67, 'Reece', 'Weston', 'ReeceWeston@ucl.ac.uk', 'eezaeci3Ohph', 26202686, 23),
(68, 'Cameron', 'Hawkins', 'CameronHawkins@ucl.ac.uk', 'die2aiXof', 12655844, 23),
(69, 'Gabriel', 'Poole', 'GabrielPoole@ucl.ac.uk', 'phuT2oolev7', 53013071, 23),
(70, 'Megan', 'Poole', 'MeganPoole@ucl.ac.uk', 'Eishoo9Eogh', 43637235, 24),
(71, 'Alisha', 'Cameron', 'AlishaCameron@ucl.ac.uk', 'ou6JieKei', 96772204, 24),
(72, 'Louie', 'Stephenson', 'LouieStephenson@ucl.ac.uk', 're9Yeesohf9', 80014733, 24),
(73, 'Sarah', 'Swift', 'SarahSwift@ucl.ac.uk', 'Rig0aido', 80158667, 25),
(74, 'Maya', 'Lamb', 'MayaLamb@ucl.ac.uk', 'beuSi5Nai', 10464590, 25),
(75, 'Leo', 'Baxter', 'LeoBaxter@ucl.ac.uk', 'aenoong3Oo', 46747072, 25),
(76, 'Louis', 'Dunn', 'LouisDunn@ucl.ac.uk', 'ouGaigh2', 79503366, 26),
(77, 'Billy', 'Hale', 'BillyHale@ucl.ac.uk', 'FieNee8ew', 39812524, 26),
(78, 'Freya', 'Parry', 'FreyaParry@ucl.ac.uk', 'Omai7Iev', 15854046, 26),
(79, 'Mollie', 'Jackson', 'MollieJackson@ucl.ac.uk', 'iemu5HeCah', 6426615, 27),
(80, 'Harry', 'Burgess', 'HarryBurgess@ucl.ac.uk', 'iciemohh2R', 23022896, 27),
(81, 'Paige', 'Phillips', 'PaigePhillips@ucl.ac.uk', 'ahw1du8za7Eiv', 55382747, 27),
(82, 'Kyle', 'Hayes', 'KyleHayes@ucl.ac.uk', 'Tiesh2nah', 92983488, 28),
(83, 'Leon', 'Lyons', 'LeonLyons@ucl.ac.uk', 'ta3Bahqu0', 31627439, 28),
(84, 'Elise', 'Bray', 'EliseBray@ucl.ac.uk', 'queenuze7Qu', 69152420, 28),
(85, 'Joel', 'Little', 'JoelLittle@ucl.ac.uk', 'Iet4ohsiNg5', 60224011, 29),
(86, 'Sienna', 'Burns', 'SiennaBurns@ucl.ac.uk', 'Thoo4loi1sh', 10481086, 29),
(87, 'David', 'Whitehead', 'DavidWhitehead@ucl.ac.uk', 'phuoDo0Vooroh', 60905600, 29),
(88, 'Harry', 'Wong', 'HarryWong@ucl.ac.uk', 'eiKet9ea', 28056499, 30),
(89, 'Sienna', 'Butler', 'SiennaButler@ucl.ac.uk', 'aichaigiiF5', 99920548, 30),
(90, 'Christopher', 'Parkin', 'ChristopherParkin@ucl.ac.uk', 'Ahghae8ae', 15257009, 30);

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
 ADD PRIMARY KEY (`GroupNo`);

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
 ADD PRIMARY KEY (`StudentNo`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `assessment`
--
ALTER TABLE `assessment`
MODIFY `AssessmentNo` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=91;
--
-- AUTO_INCREMENT for table `group`
--
ALTER TABLE `group`
MODIFY `GroupNo` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=101;
--
-- AUTO_INCREMENT for table `report`
--
ALTER TABLE `report`
MODIFY `ReportNo` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=38;
--
-- AUTO_INCREMENT for table `score`
--
ALTER TABLE `score`
MODIFY `ScoreNo` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=151;
--
-- AUTO_INCREMENT for table `student`
--
ALTER TABLE `student`
MODIFY `StudentNo` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=91;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `assessment`
--
ALTER TABLE `assessment`
ADD CONSTRAINT `fk_assessment` FOREIGN KEY (`Report_to_Assess`) REFERENCES `report` (`ReportNo`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `score`
--
ALTER TABLE `score`
ADD CONSTRAINT `fk_score` FOREIGN KEY (`AssessmentNo`) REFERENCES `assessment` (`AssessmentNo`) ON DELETE CASCADE ON UPDATE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
