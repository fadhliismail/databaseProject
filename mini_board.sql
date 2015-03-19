-- phpMyAdmin SQL Dump
-- version 4.1.14
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: 2015 年 3 朁E19 日 14:47
-- サーバのバージョン： 5.6.17
-- PHP Version: 5.5.12

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
-- テーブルの構造 `mini_board`
--

CREATE TABLE IF NOT EXISTS `mini_board` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(30) NOT NULL,
  `text` varchar(140) NOT NULL,
  `time` datetime NOT NULL,
  `AssessmentID` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=41 ;

--
-- テーブルのデータのダンプ `mini_board`
--

INSERT INTO `mini_board` (`id`, `name`, `text`, `time`, `AssessmentID`) VALUES
(1, '#', ',', '2015-03-15 05:03:37', 1),
(2, '#', 'test', '2015-03-15 05:09:12', 1),
(3, '#', 'test8', '2015-03-15 05:10:07', 1),
(4, '#', 'how many messages can I write?', '2015-03-15 05:10:30', 1),
(5, 'Yusuke', 'feagea', '2015-03-15 05:11:19', 18),
(6, '#', 'des', '2015-03-15 05:11:25', 54),
(7, '#', 'afeafea', '2015-03-15 05:11:30', 0),
(8, 'Yusuke', 'test', '2015-03-15 05:11:47', 0),
(9, '434q', 'esgeaa', '2015-03-15 05:11:56', 0),
(10, '434q', 'geaaeege', '2015-03-15 05:12:02', 0),
(11, '434q', 'eleven', '2015-03-15 05:19:55', 0),
(12, '434q', 'fea', '2015-03-14 21:21:02', 0),
(13, '434q', 'efage', '2015-03-14 22:24:14', 0),
(14, '434q', 'rhrsrhs', '2015-03-14 22:25:12', 0),
(15, 'abc', 'geage', '2015-03-16 14:52:21', 0),
(16, 'abc', 'test\r\ntest\r\ntest\r\ntest 111111', '2015-03-16 15:04:05', 0),
(17, 'Yusuke', 'eee', '2015-03-16 23:11:16', 18),
(18, 'Yusuke', 'this is a test pattern 2', '2015-03-17 18:23:36', 54),
(19, 'Natsu', 'testdesu', '2015-03-18 01:49:27', 18),
(20, 'Natsu', 'teateate', '2015-03-18 01:51:59', 54),
(21, 'Natsu', 'teateatae', '2015-03-18 01:52:14', 89),
(22, 'Natsu', '', '2015-03-18 01:53:50', 18),
(23, 'Natsu', '', '2015-03-18 01:53:54', 18),
(24, 'Natsu', 'gagea', '2015-03-18 01:53:57', 18),
(25, 'Natsu', 'fafafea', '2015-03-18 02:00:41', 18),
(26, 'Natsu', '', '2015-03-18 02:02:37', 18),
(27, 'Natsu', '', '2015-03-18 02:02:41', 18),
(28, 'Natsu', '', '2015-03-18 02:05:56', 18),
(29, 'Natsu', '', '2015-03-18 02:05:58', 18),
(30, 'Natsu', '', '2015-03-18 02:14:47', 18),
(31, 'Natsu', '', '2015-03-18 02:14:52', 18),
(32, 'Natsu', '', '2015-03-18 02:15:10', 54),
(33, 'Nat', 'sgsgsrr', '2015-03-18 02:26:43', 54),
(34, 'TETY', 'ZYEYSEZ', '2015-03-18 11:26:44', 89),
(35, 'Yusuke', 'fea', '2015-03-18 18:38:50', 18),
(36, 'nanana', 'fe', '2015-03-18 18:56:06', 18),
(37, 'afage', 'efafgea', '2015-03-18 19:05:25', 18),
(38, 'yusuea', 'aefaf', '2015-03-18 19:05:44', 54),
(39, 'afafa', 'hiiji', '2015-03-18 19:05:58', 89),
(40, 'yusuke', 'agea', '2015-03-18 19:07:40', 18);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
