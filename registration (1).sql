-- phpMyAdmin SQL Dump
-- version 4.9.5
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:8889
-- Generation Time: Dec 19, 2020 at 10:17 PM
-- Server version: 5.7.24
-- PHP Version: 7.4.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `registration`
--

-- --------------------------------------------------------

--
-- Table structure for table `post_rating`
--

CREATE TABLE `post_rating` (
  `RATE_ID` int(11) NOT NULL,
  `VOTE` varchar(45) NOT NULL,
  `userpost_POST_ID` int(11) NOT NULL,
  `userdata_ID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `post_rating`
--

INSERT INTO `post_rating` (`RATE_ID`, `VOTE`, `userpost_POST_ID`, `userdata_ID`) VALUES
(1, '', 1, 1),
(2, '', 1, 1),
(3, 'like', 1, 1),
(4, 'like', 1, 1),
(5, 'like', 1, 1),
(6, 'like', 1, 1);

-- --------------------------------------------------------

--
-- Table structure for table `replies`
--

CREATE TABLE `replies` (
  `ID` int(11) NOT NULL,
  `REPLY_TEXT` text NOT NULL,
  `userpost_POST_ID` int(11) NOT NULL,
  `userdata_ID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `replies`
--

INSERT INTO `replies` (`ID`, `REPLY_TEXT`, `userpost_POST_ID`, `userdata_ID`) VALUES
(1, '  NIce reply from me', 1, 1),
(2, '  Very interesting', 2, 1),
(3, '  this is reply for post 2', 2, 1),
(4, '  this is text reply', 1, 1),
(5, '  test username', 2, 1),
(6, '  test username', 1, 1),
(7, '  something nice', 1, 1);

-- --------------------------------------------------------

--
-- Table structure for table `userdata`
--

CREATE TABLE `userdata` (
  `ID` int(11) NOT NULL,
  `FIRST_NAME` varchar(100) NOT NULL,
  `LAST_NAME` varchar(100) NOT NULL,
  `EMAIL` varchar(100) NOT NULL,
  `USERNAME` varchar(100) NOT NULL,
  `PASSWORD` varchar(100) NOT NULL,
  `ROLE` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `userdata`
--

INSERT INTO `userdata` (`ID`, `FIRST_NAME`, `LAST_NAME`, `EMAIL`, `USERNAME`, `PASSWORD`, `ROLE`) VALUES
(1, 'Daniyar', '', 'dannyabeuov@gmail.com', 'danny', 'cst', 'admin');

-- --------------------------------------------------------

--
-- Table structure for table `userpost`
--

CREATE TABLE `userpost` (
  `POST_ID` int(11) NOT NULL,
  `POST_TITLE` varchar(1000) NOT NULL,
  `POST_DESC` text NOT NULL,
  `POST_CATEGORY` varchar(200) NOT NULL,
  `userdata_ID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `userpost`
--

INSERT INTO `userpost` (`POST_ID`, `POST_TITLE`, `POST_DESC`, `POST_CATEGORY`, `userdata_ID`) VALUES
(1, 'fafasasfasfasfas', '', 'Black Desert Online', 0),
(2, 'Gear', '     So far, I have no clue how to progress with my gear, seeing how tuvala cannot be enhanced anymore. And buying enhanced gear off the market seems rather expensive, as I only have 1.5B silver.', 'Black Desert Online', 0),
(3, 'hshsdhsdhsdhsdh', '     sdgsdgsd;oghsd;kgbsbg;sn', 'Among us', 1),
(4, 'Gear', '     opinfaila;fbaslfbaifbaif;afknaklfaifbsafbafaf', 'Black Desert Online', 1),
(5, 'some title', '     some text description', 'Cyberpunk', 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `post_rating`
--
ALTER TABLE `post_rating`
  ADD PRIMARY KEY (`RATE_ID`),
  ADD KEY `fk_post_rating_userpost1_idx` (`userpost_POST_ID`),
  ADD KEY `fk_post_rating_userdata1_idx` (`userdata_ID`);

--
-- Indexes for table `replies`
--
ALTER TABLE `replies`
  ADD PRIMARY KEY (`ID`),
  ADD KEY `fk_replies_userpost_idx` (`userpost_POST_ID`),
  ADD KEY `fk_replies_userdata1_idx` (`userdata_ID`);

--
-- Indexes for table `userdata`
--
ALTER TABLE `userdata`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `userpost`
--
ALTER TABLE `userpost`
  ADD PRIMARY KEY (`POST_ID`),
  ADD KEY `fk_userpost_userdata1_idx` (`userdata_ID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `post_rating`
--
ALTER TABLE `post_rating`
  MODIFY `RATE_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `replies`
--
ALTER TABLE `replies`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `userdata`
--
ALTER TABLE `userdata`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `userpost`
--
ALTER TABLE `userpost`
  MODIFY `POST_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `post_rating`
--
ALTER TABLE `post_rating`
  ADD CONSTRAINT `fk_post_rating_userdata1` FOREIGN KEY (`userdata_ID`) REFERENCES `userdata` (`ID`) ON DELETE CASCADE ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_post_rating_userpost1` FOREIGN KEY (`userpost_POST_ID`) REFERENCES `userpost` (`POST_ID`) ON DELETE CASCADE ON UPDATE NO ACTION;

--
-- Constraints for table `replies`
--
ALTER TABLE `replies`
  ADD CONSTRAINT `fk_replies_userdata1` FOREIGN KEY (`userdata_ID`) REFERENCES `userdata` (`ID`) ON DELETE CASCADE ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_replies_userpost` FOREIGN KEY (`userpost_POST_ID`) REFERENCES `userpost` (`POST_ID`) ON DELETE CASCADE ON UPDATE NO ACTION;

--
-- Constraints for table `userpost`
--
ALTER TABLE `userpost`
  ADD CONSTRAINT `fk_userpost_userdata1` FOREIGN KEY (`userdata_ID`) REFERENCES `userdata` (`ID`) ON DELETE CASCADE ON UPDATE NO ACTION;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
