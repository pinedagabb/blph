-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Oct 01, 2016 at 07:46 AM
-- Server version: 10.1.13-MariaDB
-- PHP Version: 7.0.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `bucketlistph`
--

-- --------------------------------------------------------

--
-- Table structure for table `bucketlist`
--

CREATE TABLE `bucketlist` (
  `bl_id` int(8) NOT NULL,
  `post_id` int(8) NOT NULL,
  `username` varchar(40) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `bucketlist`
--

INSERT INTO `bucketlist` (`bl_id`, `post_id`, `username`) VALUES
(8, 21, 'andrew'),
(12, 24, 'mryoso'),
(14, 16, 'andrew'),
(15, 18, 'andrew'),
(17, 17, 'andrew'),
(25, 15, 'gab'),
(26, 16, 'gab'),
(27, 17, 'gab'),
(28, 18, 'gab'),
(29, 19, 'gab');

-- --------------------------------------------------------

--
-- Table structure for table `checks`
--

CREATE TABLE `checks` (
  `check_id` int(8) NOT NULL,
  `post_id` int(8) NOT NULL,
  `username` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `checks`
--

INSERT INTO `checks` (`check_id`, `post_id`, `username`) VALUES
(6, 16, 'gab'),
(7, 16, 'andrew'),
(8, 15, 'andrew'),
(10, 19, 'andrew');

-- --------------------------------------------------------

--
-- Table structure for table `comments`
--

CREATE TABLE `comments` (
  `comment_id` int(8) NOT NULL,
  `post_id` int(8) NOT NULL,
  `username` varchar(20) CHARACTER SET latin1 NOT NULL,
  `comment` varchar(60) CHARACTER SET latin1 NOT NULL,
  `date` datetime(6) NOT NULL,
  `userprofpic` varchar(40) NOT NULL,
  `name_user` varchar(60) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `comments`
--

INSERT INTO `comments` (`comment_id`, `post_id`, `username`, `comment`, `date`, `userprofpic`, `name_user`) VALUES
(7, 16, 'andrew', 'Gabriel is gwapo', '2016-09-30 12:14:05.000000', 'hob3.jpg', 'pineda, andrew'),
(8, 16, 'andrew', 'Hehehe', '2016-09-30 12:16:58.000000', 'hob3.jpg', 'pineda, andrew'),
(9, 16, 'gab', 'Wow! Boracay is so nice!', '2016-09-30 12:23:52.000000', 'hiking.jpg', 'Pineda, Gabriel Andrew'),
(10, 18, 'gab', 'Very chill!', '2016-09-30 12:24:16.000000', 'hiking.jpg', 'Pineda, Gabriel Andrew'),
(11, 16, 'gab', 'WRF', '2016-09-30 12:29:00.000000', 'hiking.jpg', 'Pineda, Gabriel Andrew'),
(12, 15, 'gab', 'Woah so nice!', '2016-09-30 12:34:53.000000', 'hiking.jpg', 'Pineda, Gabriel Andrew'),
(13, 15, 'andrew', 'Cool', '2016-09-30 12:35:14.000000', 'hob3.jpg', 'pineda, andrew'),
(14, 17, 'andrew', 'Wow that chick!', '2016-09-30 01:28:50.000000', 'hob3.jpg', 'pineda, andrew'),
(15, 19, 'mcdo123', 'Wow whales!', '2016-09-30 01:37:07.000000', 'tumblr_ml9qeo1XzS1r65o3qo1_400.jpg', 'Mcdonald, Jollibee'),
(16, 18, 'mryoso', 'Nice!', '2016-09-30 06:25:01.000000', 'P4300137.JPG', 'Yoso, Mr'),
(17, 17, 'andrew', 'Nice surfboard', '2016-09-30 07:27:06.000000', 'hob3.jpg', 'pineda, andrew'),
(18, 23, 'gab', 'Hello!', '2016-09-30 11:45:51.000000', 'IMG_6587.JPG', 'Pineda, Gabriel Andrew'),
(19, 17, 'gab', 'Cool beach', '2016-10-01 12:24:04.000000', 'IMG_6587.JPG', 'Pineda, Gabriel Andrew'),
(20, 15, 'gab', 'Wew', '2016-10-01 09:37:18.000000', 'IMG_6587.JPG', 'Pineda, Gabriel Andrew');

-- --------------------------------------------------------

--
-- Table structure for table `likes`
--

CREATE TABLE `likes` (
  `like_id` int(8) NOT NULL,
  `post_id` int(8) NOT NULL,
  `username` varchar(40) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `likes`
--

INSERT INTO `likes` (`like_id`, `post_id`, `username`) VALUES
(44, 17, 'gab'),
(45, 16, 'gab');

-- --------------------------------------------------------

--
-- Table structure for table `post`
--

CREATE TABLE `post` (
  `post_id` int(8) NOT NULL,
  `pic1` varchar(80) DEFAULT NULL,
  `pic2` varchar(80) DEFAULT NULL,
  `pic3` varchar(80) DEFAULT NULL,
  `date_posted` date NOT NULL,
  `post_title` varchar(60) NOT NULL,
  `post_caption` varchar(1000) NOT NULL,
  `post_content` varchar(500) NOT NULL,
  `post_likes` int(5) NOT NULL DEFAULT '0',
  `post_checks` int(5) NOT NULL DEFAULT '0',
  `post_author` varchar(40) NOT NULL,
  `post_category` varchar(100) NOT NULL,
  `post_tags` varchar(150) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `post`
--

INSERT INTO `post` (`post_id`, `pic1`, `pic2`, `pic3`, `date_posted`, `post_title`, `post_caption`, `post_content`, `post_likes`, `post_checks`, `post_author`, `post_category`, `post_tags`) VALUES
(15, 'snoki.jpg', NULL, NULL, '2016-09-29', 'Snorkeling at Coron, Palawan Island', 'This is the most exciting thing i have ever done in my life. I love fishes! Lorem ipsum blah blah', 'Snorkeling!', 0, 1, 'gab', 'cebu', 'Snorkeling'),
(16, 'sea.jpg', NULL, NULL, '2016-09-29', 'Chilling at Boracay Island', 'Wow boracay is so beautiful! I love the sea, looks so calming!', 'Look at the sea!', 1, 2, 'gab', 'manila', 'Beach'),
(17, 'surf.jpg', NULL, NULL, '2016-09-29', 'Surfing at Dumaguete, Cebu', 'I love surfing! And i think this is the best place to surf!', 'Gnarlu!', 1, 0, 'gab', 'cebu', 'Surf'),
(18, 'osmenapeak.jpg', NULL, NULL, '2016-09-29', 'Chilling at Osmena Peak', 'The cliffs, the mountains, the ambiance, love it!', 'Wow', 0, 0, 'gab', 'cebu', 'Cliff'),
(19, 'whale.jpg', NULL, NULL, '2016-09-29', 'Whale sharking at OSLOB', 'The whale looks so big.. just like my..', 'Whales!', 0, 1, 'gab', 'bohol', 'Whale'),
(21, 'kayak.jpg', NULL, NULL, '2016-09-29', 'Island hopping at Lapu-Lapu Island', 'Hello this is so exciting!', 'Hello everyone!', 0, 0, 'andrew', 'bohol', 'Bangka'),
(23, 'hike.JPG', NULL, NULL, '2016-09-29', 'Hiking at the Mountains of Busay', 'Busay is a really nice place to unwind and think about antyhtihg', 'Busay is a really nice place to unwind and think about antyhthing!', 0, 0, 'andrew', 'cebu', 'Busay'),
(24, 'bgg.jpg', NULL, NULL, '2016-09-30', 'Camping @ Osmena Peak, Cebu', 'I love camping! So comfortable in here, breezy and a breathtaking view', 'Hehe', 0, 0, 'mryoso', 'cebu', 'Camp');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `username` varchar(20) NOT NULL,
  `email` varchar(50) NOT NULL,
  `first_name` varchar(50) NOT NULL,
  `password` varchar(40) NOT NULL,
  `last_name` varchar(50) NOT NULL,
  `dob` date NOT NULL,
  `profpic` varchar(60) DEFAULT NULL,
  `user_desc` varchar(200) NOT NULL,
  `address` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`username`, `email`, `first_name`, `password`, `last_name`, `dob`, `profpic`, `user_desc`, `address`) VALUES
('andrew', 'andrew@gmail.com', 'andrew', 'andrew', 'pineda', '1998-01-19', 'hob1.jpg', 'Hello i am gabriel andrew pineda and this is my description that is 80 characters at max! Gyea!', 'Cebu City'),
('gab', 'pinedagab@gmail.com', 'Gabriel Andrew', 'gwapo', 'Pineda', '1998-01-19', 'rme.png', 'Hello I am Gabriel Pineda Andrew and this is my profile! Hello there!!', 'Lapu-lapu'),
('mcdo123', 'mcdo@ph.com', 'Jollibee', '123', 'Mcdonald', '1998-01-19', 'tumblr_ml9qeo1XzS1r65o3qo1_400.jpg', '', ''),
('mryoso', 'mryoso@gmail.com', 'Mr', '123', 'Yoso', '1998-01-18', 'P4300137.JPG', '', ''),
('sils', 'ahello@gmail.com', 'Vub', '123', 'Bic', '1998-01-18', 'bggg.jpg', '', '');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `bucketlist`
--
ALTER TABLE `bucketlist`
  ADD PRIMARY KEY (`bl_id`);

--
-- Indexes for table `checks`
--
ALTER TABLE `checks`
  ADD PRIMARY KEY (`check_id`);

--
-- Indexes for table `comments`
--
ALTER TABLE `comments`
  ADD PRIMARY KEY (`comment_id`);

--
-- Indexes for table `likes`
--
ALTER TABLE `likes`
  ADD PRIMARY KEY (`like_id`);

--
-- Indexes for table `post`
--
ALTER TABLE `post`
  ADD PRIMARY KEY (`post_id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`username`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `bucketlist`
--
ALTER TABLE `bucketlist`
  MODIFY `bl_id` int(8) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;
--
-- AUTO_INCREMENT for table `checks`
--
ALTER TABLE `checks`
  MODIFY `check_id` int(8) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
--
-- AUTO_INCREMENT for table `comments`
--
ALTER TABLE `comments`
  MODIFY `comment_id` int(8) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;
--
-- AUTO_INCREMENT for table `likes`
--
ALTER TABLE `likes`
  MODIFY `like_id` int(8) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=46;
--
-- AUTO_INCREMENT for table `post`
--
ALTER TABLE `post`
  MODIFY `post_id` int(8) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
