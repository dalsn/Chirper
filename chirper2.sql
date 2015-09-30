-- phpMyAdmin SQL Dump
-- version 4.2.7
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Dec 05, 2014 at 11:35 AM
-- Server version: 5.6.16
-- PHP Version: 5.5.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `chirper2`
--

-- --------------------------------------------------------

--
-- Table structure for table `ci_sessions`
--

CREATE TABLE IF NOT EXISTS `ci_sessions` (
  `session_id` varchar(40) NOT NULL DEFAULT '0',
  `ip_address` varchar(45) NOT NULL DEFAULT '0',
  `user_agent` varchar(120) NOT NULL,
  `last_activity` int(10) unsigned NOT NULL DEFAULT '0',
  `user_data` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `ci_sessions`
--

INSERT INTO `ci_sessions` (`session_id`, `ip_address`, `user_agent`, `last_activity`, `user_data`) VALUES
('1a907fafa46ab127c700e9c8ec128b0c', '::1', 'Mozilla/5.0 (Windows NT 6.1; WOW64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/38.0.2125.111 Safari/537.36', 1417772067, 'a:1:{s:9:"user_data";s:0:"";}'),
('8a5bc343e7f62a01eac9aca85263c564', '::1', 'Mozilla/5.0 (Windows NT 6.1; WOW64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/38.0.2125.111 Safari/537.36', 1417749173, 'a:2:{s:9:"user_data";s:0:"";s:7:"post_id";s:2:"17";}');

-- --------------------------------------------------------

--
-- Table structure for table `comments`
--

CREATE TABLE IF NOT EXISTS `comments` (
`commentID` int(11) NOT NULL,
  `commenter` int(11) NOT NULL,
  `post_id` int(11) NOT NULL,
  `song_id` int(11) NOT NULL,
  `comment` varchar(140) NOT NULL,
  `timestamp` varchar(50) NOT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=24 ;

--
-- Dumping data for table `comments`
--

INSERT INTO `comments` (`commentID`, `commenter`, `post_id`, `song_id`, `comment`, `timestamp`) VALUES
(2, 16, 17, 17, 'Nobody else feeling this song?', '1415057469'),
(3, 16, 10, 12, 'Loud it!', '1415057664'),
(6, 16, 18, 15, 'You too? lool', '1415060296'),
(7, 16, 18, 15, 'I should download this song', '1415060311'),
(8, 16, 13, 14, 'shaking my bombom', '1415062539'),
(9, 7, 18, 15, 'Cool song', '1415119660'),
(14, 9, 13, 14, 'This girl! Lol', '1415632603'),
(16, 29, 13, 14, 'I wanna see!', '1415633909'),
(21, 37, 24, 22, 'ydghkgkl', '1417752385'),
(22, 37, 24, 22, 'fsasdADSGASFDS', '1417752393');

-- --------------------------------------------------------

--
-- Table structure for table `password`
--

CREATE TABLE IF NOT EXISTS `password` (
`passwordID` int(11) NOT NULL,
  `salt1` varchar(255) NOT NULL,
  `salt2` varchar(255) NOT NULL,
  `pwhash` varchar(255) NOT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=39 ;

--
-- Dumping data for table `password`
--

INSERT INTO `password` (`passwordID`, `salt1`, `salt2`, `pwhash`) VALUES
(7, '605152301', '512513825', '909bea0b894428ac8dba74ed00ed8e5f72b48d69'),
(9, '487231258', '194259785', 'f7c7536726a20923e8a64933ee2214fd01727900'),
(10, '488768838', '477991716', '1ba337efb891b06f276c465bcf09224622cbf33a'),
(11, '414769628', '666995565', 'bd1a780e59abe2822bfce9c365bb83a287c454f5'),
(13, '532735647', '480985165', '1be1e50def76e72a433d33dd2f54425cfe40ed03'),
(14, '1090758209', '365096053', '47c5450970d6c60e90085459a783813bf4d8b4dc'),
(15, '227467479', '84410525', '5727a9d54f6ec7a652f31645f3f572aa902941bc'),
(16, '975398370', '967653961', '9c2ef03667dfd11e007c8d567d97b15be4b692ba'),
(17, '325204643', '933912730', '05ad71229e2364da3dd1764e59ce10f3499e1e7a'),
(18, '1044968039', '270036752', 'd07991ce7ac98ff72ee87965ad9d09083cbad27e'),
(25, '733883601', '840140272', 'ff22642161209ae67cccad2893296c15eb568fe4'),
(30, '1181485048', '547921823', 'cdb0040d847dcc9174a2c908cd9e08e6e59c0804'),
(31, '263444590', '208533764', '3e936fbab6d3966e18d44255eea79c31008c2469'),
(32, '1280875521', '40285822', 'af07cba9fd1462443ee523e72f66fc72ba239b98'),
(33, '428761800', '6968112', '86e4430712e61753e0ae955866e31914a9dff465'),
(34, '875324073', '508189455', 'cd28d281cd842063e5b652e1bec16e7f2c825def'),
(35, '351413121', '400904407', 'b4f0b6389ae35663e29fd4a539664d0ebe5114c2'),
(36, '1167487511', '973625697', '273c17888481b941b064bbf5384062bdf83704a3'),
(38, '609019042', '802458273', '0fd78ed7b883fe5e0985550a63144934d098d48d');

-- --------------------------------------------------------

--
-- Table structure for table `post`
--

CREATE TABLE IF NOT EXISTS `post` (
`postID` int(11) NOT NULL,
  `poster_id` int(11) NOT NULL,
  `song_id` int(11) NOT NULL,
  `comment` varchar(140) NOT NULL,
  `timestamp` varchar(255) NOT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=27 ;

--
-- Dumping data for table `post`
--

INSERT INTO `post` (`postID`, `poster_id`, `song_id`, `comment`, `timestamp`) VALUES
(1, 15, 6, 'Dope song', '1415023287'),
(2, 15, 6, 'I too love it', '1415023405'),
(3, 15, 7, 'Wow! Just wow!', '1415023487'),
(10, 16, 12, 'Another one from the dude', '1415025454'),
(13, 16, 14, 'Intoxicating song', '1415030966'),
(17, 16, 17, 'Nice song', '1415049596'),
(18, 15, 15, 'Loving it!', '1415060209'),
(19, 7, 18, 'I''m feeling this song', '1415119862'),
(22, 15, 18, 'I like this one', '1415460464'),
(23, 15, 20, 'Check out this one', '1415460867'),
(24, 37, 22, 'This hausa dude', '1417749291');

-- --------------------------------------------------------

--
-- Table structure for table `poster`
--

CREATE TABLE IF NOT EXISTS `poster` (
`posterID` int(11) NOT NULL,
  `password_id` int(11) NOT NULL,
  `username` varchar(30) NOT NULL,
  `email` varchar(40) NOT NULL,
  `posterName` varchar(255) DEFAULT NULL,
  `bio` varchar(1500) DEFAULT NULL,
  `address` varchar(255) DEFAULT NULL,
  `web` varchar(255) DEFAULT NULL,
  `img_file` varchar(255) DEFAULT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=38 ;

--
-- Dumping data for table `poster`
--

INSERT INTO `poster` (`posterID`, `password_id`, `username`, `email`, `posterName`, `bio`, `address`, `web`, `img_file`) VALUES
(7, 7, 'dals_njidda', 'falee@yahoo.com', 'Dalhatu Njidda', 'Programmer', '29 Manister Road', 'cms-stu-iis.gre.ac.uk/nd314', '557de2cbaae04ef8a5bd3d0cc5db59c6.jpg'),
(9, 9, 'aisa_bebe', 'aisa_bebe@yahoo.com', 'Rasheeda Njidda', 'English student', 'Kano', 'bfsngfbsfhs', 'b31c91699ebf8fcafacf514a5c575294.png'),
(10, 10, 'aybaba', 'aa111@gre.ac.uk', 'Ayo Femi', 'Programmer', 'London', 'gre.ac.uk', '33eb78642763d982247bf5f235de617b.jpg'),
(13, 13, 'sexydiva', 'sami@yahoo.com', 'Sameera Nadama', 'Sexy diva', 'Sokoto', '', NULL),
(14, 14, 'ac600', 'aswin@gre.ac.uk', '', '', '', '', NULL),
(15, 15, 'shams', 'shamseeyah@gmail.com', 'Shamseeyah Ilyas', 'Public health professional', 'Sunderland', 'twitter.com/shamseeyah1', '24a08c34790ec66947d3c0782dfe44db.png'),
(16, 16, 'neerah', 'muneerah@yahoo.com', 'Muneerah Ihsan', 'Student', 'Kaduna', 'neerah95', '0302251065ea76d3e62a6bcbebaebc15.jpg'),
(17, 17, 'beeloved', 'hnjidda@gmail.com', 'Habiba Njidda', 'Housewife', 'Kano', '', '670e0fd8c081b2f00a43392e53886dc6.jpg'),
(37, 38, 'ma442', 'ma442@gre.ac.uk', NULL, NULL, NULL, NULL, 'b97e4ce2546f7aeb794d3ba8dba32b13.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `song`
--

CREATE TABLE IF NOT EXISTS `song` (
`songID` int(11) NOT NULL,
  `songName` char(60) NOT NULL,
  `artist` varchar(50) NOT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=23 ;

--
-- Dumping data for table `song`
--

INSERT INTO `song` (`songID`, `songName`, `artist`) VALUES
(6, 'skelewu', 'davido'),
(7, 'give me love', 'ed sheeran'),
(12, 'kiss me', 'ed sheeran'),
(14, 'dorobucci', 'don jazzy'),
(15, 'paradise', 'maher zain'),
(16, 'dark paradise', 'lana del rey'),
(17, 'your love', 'nicki minaj'),
(18, 'i''m not the only one', 'sam smith'),
(19, 'dark paradise', 'davido'),
(20, 'i''m not the only one', 'brad'),
(21, 'kurukere', 'fela'),
(22, 'ganga da garaya', 'morell');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `ci_sessions`
--
ALTER TABLE `ci_sessions`
 ADD PRIMARY KEY (`session_id`), ADD KEY `last_activity_idx` (`last_activity`);

--
-- Indexes for table `comments`
--
ALTER TABLE `comments`
 ADD PRIMARY KEY (`commentID`), ADD KEY `carries` (`post_id`), ADD KEY `have` (`song_id`);

--
-- Indexes for table `password`
--
ALTER TABLE `password`
 ADD PRIMARY KEY (`passwordID`);

--
-- Indexes for table `post`
--
ALTER TABLE `post`
 ADD PRIMARY KEY (`postID`), ADD KEY `has` (`song_id`), ADD KEY `makes` (`poster_id`);

--
-- Indexes for table `poster`
--
ALTER TABLE `poster`
 ADD PRIMARY KEY (`posterID`), ADD UNIQUE KEY `email` (`email`), ADD UNIQUE KEY `username` (`username`), ADD KEY `owns` (`password_id`);

--
-- Indexes for table `song`
--
ALTER TABLE `song`
 ADD PRIMARY KEY (`songID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `comments`
--
ALTER TABLE `comments`
MODIFY `commentID` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=24;
--
-- AUTO_INCREMENT for table `password`
--
ALTER TABLE `password`
MODIFY `passwordID` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=39;
--
-- AUTO_INCREMENT for table `post`
--
ALTER TABLE `post`
MODIFY `postID` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=27;
--
-- AUTO_INCREMENT for table `poster`
--
ALTER TABLE `poster`
MODIFY `posterID` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=38;
--
-- AUTO_INCREMENT for table `song`
--
ALTER TABLE `song`
MODIFY `songID` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=23;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `comments`
--
ALTER TABLE `comments`
ADD CONSTRAINT `carries` FOREIGN KEY (`post_id`) REFERENCES `post` (`postID`) ON DELETE CASCADE ON UPDATE CASCADE,
ADD CONSTRAINT `have` FOREIGN KEY (`song_id`) REFERENCES `song` (`songID`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `post`
--
ALTER TABLE `post`
ADD CONSTRAINT `has` FOREIGN KEY (`song_id`) REFERENCES `song` (`songID`) ON DELETE NO ACTION ON UPDATE NO ACTION,
ADD CONSTRAINT `makes` FOREIGN KEY (`poster_id`) REFERENCES `poster` (`posterID`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `poster`
--
ALTER TABLE `poster`
ADD CONSTRAINT `owns` FOREIGN KEY (`password_id`) REFERENCES `password` (`passwordID`) ON DELETE NO ACTION ON UPDATE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
