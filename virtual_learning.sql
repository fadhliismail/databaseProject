-- phpMyAdmin SQL Dump
-- version 4.2.11
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Jan 30, 2015 at 06:40 PM
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
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `group`
--

CREATE TABLE IF NOT EXISTS `group` (
`GroupNo` int(11) NOT NULL,
  `ReportNo` int(11) NOT NULL,
  `AverageScore` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `report`
--

CREATE TABLE IF NOT EXISTS `report` (
`ReportNo` int(11) NOT NULL,
  `ReportLink` varchar(255) NOT NULL,
  `Submission_Timestamp` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

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
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

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
  `Department` varchar(255) NOT NULL,
  `User_pass` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

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
MODIFY `AssessmentNo` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `group`
--
ALTER TABLE `group`
MODIFY `GroupNo` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `report`
--
ALTER TABLE `report`
MODIFY `ReportNo` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `score`
--
ALTER TABLE `score`
MODIFY `ScoreNo` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `student`
--
ALTER TABLE `student`
MODIFY `StudentNo` int(11) NOT NULL AUTO_INCREMENT;
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
