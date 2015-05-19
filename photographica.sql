-- phpMyAdmin SQL Dump
-- version 4.1.12
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: May 12, 2015 at 02:46 PM
-- Server version: 5.6.16
-- PHP Version: 5.5.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `photographica`
--

-- --------------------------------------------------------

--
-- Table structure for table `blockedusers`
--

CREATE TABLE IF NOT EXISTS `blockedusers` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `blocker` varchar(16) NOT NULL,
  `blockee` varchar(16) NOT NULL,
  `blockdate` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `follower`
--

CREATE TABLE IF NOT EXISTS `follower` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user1` varchar(16) NOT NULL,
  `user2` varchar(16) NOT NULL,
  `datemade` datetime NOT NULL,
  `accepted` enum('0','1') NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `friends`
--

CREATE TABLE IF NOT EXISTS `friends` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user1` varchar(16) NOT NULL,
  `user2` varchar(16) NOT NULL,
  `datemade` datetime NOT NULL,
  `accepted` enum('0','1') NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `notifications`
--

CREATE TABLE IF NOT EXISTS `notifications` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(16) NOT NULL,
  `initiator` varchar(16) NOT NULL,
  `app` varchar(255) NOT NULL,
  `note` varchar(255) NOT NULL,
  `did_read` enum('0','1') NOT NULL DEFAULT '0',
  `date_time` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `photos`
--

CREATE TABLE IF NOT EXISTS `photos` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user` varchar(16) NOT NULL,
  `gallery` varchar(50) NOT NULL,
  `filename` varchar(255) NOT NULL,
  `description` varchar(255) DEFAULT NULL,
  `uploaddate` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=7 ;

--
-- Dumping data for table `photos`
--

INSERT INTO `photos` (`id`, `user`, `gallery`, `filename`, `description`, `uploaddate`) VALUES
(1, 'ansh_vyas747', '../HomeN/users/ansh_vyas747/albums/myalbum/', 'myalbum', 'myalbum', '2015-05-11 01:50:51');

-- --------------------------------------------------------

--
-- Table structure for table `project_detail`
--

CREATE TABLE IF NOT EXISTS `project_detail` (
  `p_id` int(11) NOT NULL AUTO_INCREMENT,
  `p_name` varchar(256) NOT NULL,
  `p_detail` text NOT NULL,
  `accept` enum('0','1') NOT NULL DEFAULT '1',
  `p_dp` int(11) NOT NULL COMMENT 'project display pic',
  `username` varchar(256) NOT NULL,
  PRIMARY KEY (`p_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `status`
--

CREATE TABLE IF NOT EXISTS `status` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `osid` int(11) NOT NULL,
  `account_name` varchar(16) NOT NULL,
  `author` varchar(16) NOT NULL,
  `type` enum('a','b','c') NOT NULL,
  `data` text NOT NULL,
  `postdate` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `user_accounts`
--

CREATE TABLE IF NOT EXISTS `user_accounts` (
  `id` int(12) NOT NULL AUTO_INCREMENT,
  `user_name` varchar(256) DEFAULT NULL,
  `facebook` varchar(256) DEFAULT NULL,
  `instagram` varchar(256) DEFAULT NULL,
  `twitter` varchar(256) DEFAULT NULL,
  `google` varchar(256) DEFAULT NULL,
  `flickr` varchar(256) DEFAULT NULL,
  `snapchat` varchar(256) DEFAULT NULL,
  `bbm` varchar(256) DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `user_name` (`user_name`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `user_basic_info`
--

CREATE TABLE IF NOT EXISTS `user_basic_info` (
  `ID` int(12) NOT NULL AUTO_INCREMENT,
  `user_name` varchar(254) NOT NULL COMMENT 'foreign key',
  `cover` varchar(256) DEFAULT NULL COMMENT 'cover picture',
  `full_name` varchar(254) DEFAULT NULL,
  `dob` date DEFAULT NULL COMMENT 'date of birth',
  `gender` enum('M','F','G','L','B','T') DEFAULT NULL COMMENT 'male , female , gay , lesbian , bisexual , transgender',
  `genre` varchar(200) DEFAULT NULL,
  `street` text COMMENT 'Street address',
  `landmark` varchar(256) DEFAULT NULL COMMENT 'nearby landmark',
  `city` varchar(50) DEFAULT NULL COMMENT 'City',
  `State` varchar(50) DEFAULT NULL COMMENT 'state',
  `country` varchar(256) DEFAULT NULL,
  `zip` bigint(10) DEFAULT NULL COMMENT 'postal zip code',
  `m_language` varchar(254) DEFAULT NULL COMMENT 'mother tounge',
  `p_language` varchar(254) NOT NULL DEFAULT 'English' COMMENT 'preferred language',
  `bio` text COMMENT 'about photographer',
  `h_sec` enum('N','Y') NOT NULL DEFAULT 'N',
  `s_sec` enum('N','Y') NOT NULL DEFAULT 'N',
  `grad` enum('N','Y') NOT NULL DEFAULT 'N',
  `pg` enum('N','Y') NOT NULL DEFAULT 'N',
  `proff` enum('N','Y') NOT NULL DEFAULT 'N',
  `hi_sec` text NOT NULL,
  `se_sec` text NOT NULL,
  `grad_d` text NOT NULL,
  `pg_d` text NOT NULL,
  `proff_d` text NOT NULL,
  `fav_quote` text COMMENT 'favorite quote',
  `website` text COMMENT 'if you have it',
  `w_photo` enum('Passion','Hobby') NOT NULL DEFAULT 'Hobby' COMMENT 'what photography mean to you',
  `w_your` enum('Amature','Professional') NOT NULL DEFAULT 'Amature' COMMENT 'what do u think about your photography?',
  `d_adult` enum('Y','N') NOT NULL DEFAULT 'N' COMMENT 'dishplay adult content ?',
  `user_rate` float NOT NULL DEFAULT '0' COMMENT 'ratting given by other users',
  PRIMARY KEY (`ID`),
  UNIQUE KEY `user_name` (`user_name`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=8 ;

--
-- Dumping data for table `user_basic_info`
--

INSERT INTO `user_basic_info` (`ID`, `user_name`, `cover`, `full_name`, `dob`, `gender`, `genre`, `street`, `landmark`, `city`, `State`, `country`, `zip`, `m_language`, `p_language`, `bio`, `h_sec`, `s_sec`, `grad`, `pg`, `proff`, `hi_sec`, `se_sec`, `grad_d`, `pg_d`, `proff_d`, `fav_quote`, `website`, `w_photo`, `w_your`, `d_adult`, `user_rate`) VALUES
(1, 'ansh_vyas747', '../HomeN/users/ansh_vyas747/coverpic/sea.jpg', 'Anshul Vyas', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'English', NULL, 'N', 'N', 'N', 'N', 'N', '', '', '', '', '', NULL, NULL, 'Hobby', 'Amature', 'N', 0),
(2, 'shreya22', 'NULL', 'Shreya Sahu', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'English', NULL, 'N', 'N', 'N', 'N', 'N', '', '', '', '', '', NULL, NULL, 'Hobby', 'Amature', 'N', 0),
(3, 'kani123', 'NULL', 'Kanishk', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'English', NULL, 'N', 'N', 'N', 'N', 'N', '', '', '', '', '', NULL, NULL, 'Hobby', 'Amature', 'N', 0),
(4, 'aman123', 'NULL', 'Aman Jain', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'English', NULL, 'N', 'N', 'N', 'N', 'N', '', '', '', '', '', NULL, NULL, 'Hobby', 'Amature', 'N', 0),
(5, 'bhittal25', 'NULL', 'Shubhankar Mohan', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'English', NULL, 'N', 'N', 'N', 'N', 'N', '', '', '', '', '', NULL, NULL, 'Hobby', 'Amature', 'N', 0),
(6, 'sart_23', 'NULL', 'sarthak', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'English', NULL, 'N', 'N', 'N', 'N', 'N', '', '', '', '', '', NULL, NULL, 'Hobby', 'Amature', 'N', 0),
(7, 'lucky_suman', 'NULL', 'Lucky Suman', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'English', NULL, 'N', 'N', 'N', 'N', 'N', '', '', '', '', '', NULL, NULL, 'Hobby', 'Amature', 'N', 0);

-- --------------------------------------------------------

--
-- Table structure for table `user_login`
--

CREATE TABLE IF NOT EXISTS `user_login` (
  `ID` int(12) NOT NULL AUTO_INCREMENT,
  `User_name` varchar(254) NOT NULL COMMENT 'foreign key',
  `Email_Id` varchar(254) DEFAULT NULL,
  `mobil_no` varchar(10) DEFAULT NULL COMMENT 'mobile no of user',
  `password` varchar(254) NOT NULL,
  `notes_check` datetime NOT NULL,
  `d_pic` varchar(254) DEFAULT NULL COMMENT 'Dishplay Picture',
  `ip` varchar(254) NOT NULL DEFAULT '0..0.0.0' COMMENT 'ip address for tracking last login',
  `browser` varchar(254) DEFAULT NULL COMMENT 'web brouser for last login',
  `signup_date` datetime NOT NULL COMMENT 'signup date',
  `last_login` datetime NOT NULL COMMENT 'date n time for last login',
  `s_ques` enum('1','2','3','4','5') NOT NULL COMMENT 'Security question',
  `s_ans` varchar(256) DEFAULT NULL COMMENT 'Answer',
  `activated` enum('0','1') NOT NULL,
  `user_level` enum('0','1','2','3') NOT NULL DEFAULT '0',
  PRIMARY KEY (`ID`),
  UNIQUE KEY `User_name` (`User_name`,`Email_Id`,`mobil_no`),
  KEY `d_pic` (`d_pic`),
  KEY `d_pic_2` (`d_pic`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=8 ;

--
-- Dumping data for table `user_login`
--

INSERT INTO `user_login` (`ID`, `User_name`, `Email_Id`, `mobil_no`, `password`, `notes_check`, `d_pic`, `ip`, `browser`, `signup_date`, `last_login`, `s_ques`, `s_ans`, `activated`, `user_level`) VALUES
(1, 'ansh_vyas747', 'anshul.vyas380@gmail.com', '9424597149', 'anshul16', '2015-04-18 10:58:54', 'upload/1429347534wehappy.jpg', '127.0.0.1', 'Google Chrome', '2015-04-18 10:58:54', '2015-05-09 06:32:39', '2', 'eddy', '1', '0'),
(2, 'shreya22', 'shreya.iiitm@gmail.com', '8827875927', 'shreya22', '2015-04-18 10:59:44', 'upload/1429347584hihi.jpg', '127.0.0.1', 'Google Chrome', '2015-04-18 10:59:44', '2015-04-18 10:59:44', '5', 'white', '1', '0'),
(3, 'kani123', 'kanishk71@gmail.com', '9424588056', 'kani123', '2015-04-18 11:05:09', 'upload/1429347909i1.jpg', '127.0.0.1', 'Google Chrome', '2015-04-18 11:05:09', '2015-04-18 11:05:09', '4', 'toytrain', '1', '0'),
(4, 'aman123', 'aman123@gmail.com', '8520963017', 'qwerty123', '2015-04-18 11:07:51', 'upload/1429348071my answers.jpg', '127.0.0.1', 'Google Chrome', '2015-04-18 11:07:51', '2015-04-18 11:07:51', '2', 'tom', '1', '0'),
(5, 'bhittal25', 'mohanshubhankar@gmail.com', '7741756981', 'shubhi123', '2015-04-18 11:21:59', 'upload/1429348919img.jpg', '127.0.0.1', 'Google Chrome', '2015-04-18 11:21:59', '2015-04-18 11:21:59', '4', 'robo', '1', '0'),
(6, 'sart_23', 'sarthakjoshi71@gmail.com', '8527419630', 'sartqwert', '2015-04-18 11:30:39', 'upload/1429349439happy.jpg', '127.0.0.1', 'Google Chrome', '2015-04-18 11:30:39', '2015-04-18 11:30:39', '2', 'eddy', '1', '0'),
(7, 'lucky_suman', 'luckysuman850@gmail.com', '882788527', 'jaimatadi', '2015-04-18 11:34:18', 'upload/1429349658hima1.jpg', '127.0.0.1', 'Google Chrome', '2015-04-18 11:34:18', '2015-04-18 11:34:18', '5', 'red', '1', '0');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
