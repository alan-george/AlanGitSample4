-- phpMyAdmin SQL Dump
-- version 4.0.4
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Jul 23, 2015 at 09:01 AM
-- Server version: 5.6.12-log
-- PHP Version: 5.4.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `lms_db`
--
CREATE DATABASE IF NOT EXISTS `lms_db` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci;
USE `lms_db`;

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

DROP TABLE IF EXISTS `admin`;
CREATE TABLE IF NOT EXISTS `admin` (
  `loginid` int(8) NOT NULL,
  `password` varchar(10) NOT NULL,
  `authentication` varchar(15) NOT NULL,
  PRIMARY KEY (`loginid`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COMMENT='ADMINISTRATOR table';

-- --------------------------------------------------------

--
-- Table structure for table `components`
--

DROP TABLE IF EXISTS `components`;
CREATE TABLE IF NOT EXISTS `components` (
  `compid` int(5) NOT NULL,
  `comptype` text NOT NULL,
  `compdate` date NOT NULL,
  `ciaid` int(5) NOT NULL,
  `subid` int(8) NOT NULL,
  PRIMARY KEY (`compid`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `course`
--

DROP TABLE IF EXISTS `course`;
CREATE TABLE IF NOT EXISTS `course` (
  `cid` varchar(5) NOT NULL,
  `cname` text NOT NULL,
  PRIMARY KEY (`cid`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COMMENT='COURSE table';

-- --------------------------------------------------------

--
-- Table structure for table `groupassign`
--

DROP TABLE IF EXISTS `groupassign`;
CREATE TABLE IF NOT EXISTS `groupassign` (
  `groupid` int(5) NOT NULL,
  `subid` int(8) NOT NULL,
  `details` varchar(100) NOT NULL,
  `submission` varchar(100) NOT NULL,
  PRIMARY KEY (`groupid`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `marks`
--

DROP TABLE IF EXISTS `marks`;
CREATE TABLE IF NOT EXISTS `marks` (
  `mid` int(5) NOT NULL,
  `regno` int(8) NOT NULL,
  `subid` int(8) NOT NULL,
  `cia1marks` int(25) NOT NULL,
  `midsemmarks` int(50) NOT NULL,
  `cia3marks` int(25) NOT NULL,
  PRIMARY KEY (`mid`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `onlinecourse`
--

DROP TABLE IF EXISTS `onlinecourse`;
CREATE TABLE IF NOT EXISTS `onlinecourse` (
  `sid` int(8) NOT NULL,
  `upload` varchar(100) NOT NULL,
  `grade` varchar(10) NOT NULL,
  `comment` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `opensrep`
--

DROP TABLE IF EXISTS `opensrep`;
CREATE TABLE IF NOT EXISTS `opensrep` (
  `osid` int(8) NOT NULL,
  `cid` int(8) NOT NULL,
  `author` text NOT NULL,
  `upload` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `polling`
--

DROP TABLE IF EXISTS `polling`;
CREATE TABLE IF NOT EXISTS `polling` (
  `studid` int(8) NOT NULL,
  `courseid` int(8) NOT NULL,
  `vote` varchar(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `student`
--

DROP TABLE IF EXISTS `student`;
CREATE TABLE IF NOT EXISTS `student` (
  `regno` int(8) NOT NULL,
  `studentname` text NOT NULL,
  `studentpassword` varchar(8) NOT NULL,
  `semester` varchar(3) NOT NULL,
  `totalpresent` int(100) NOT NULL,
  `cid` varchar(8) DEFAULT NULL,
  PRIMARY KEY (`regno`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COMMENT='STUDENT table';

-- --------------------------------------------------------

--
-- Table structure for table `subject`
--

DROP TABLE IF EXISTS `subject`;
CREATE TABLE IF NOT EXISTS `subject` (
  `subjectid` int(5) NOT NULL,
  `subjectname` text NOT NULL,
  `cid` int(8) NOT NULL,
  `tid` int(8) NOT NULL,
  `classcond` int(100) NOT NULL,
  PRIMARY KEY (`subjectid`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `teacher`
--

DROP TABLE IF EXISTS `teacher`;
CREATE TABLE IF NOT EXISTS `teacher` (
  `teacherid` int(8) NOT NULL,
  `teachername` text NOT NULL,
  `teacherpassword` varchar(8) NOT NULL,
  `courseid1` varchar(8) NOT NULL,
  `courseid2` varchar(8) NOT NULL,
  `courseid3` varchar(8) NOT NULL,
  PRIMARY KEY (`teacherid`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COMMENT='TEACHER table';

-- --------------------------------------------------------

--
-- Table structure for table `visitfacul`
--

DROP TABLE IF EXISTS `visitfacul`;
CREATE TABLE IF NOT EXISTS `visitfacul` (
  `vfid` int(10) NOT NULL,
  `vfname` varchar(25) NOT NULL,
  `reftid` int(8) NOT NULL,
  `materials` varchar(100) NOT NULL,
  `details` varchar(50) NOT NULL,
  PRIMARY KEY (`vfid`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
