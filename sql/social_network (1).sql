-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 08, 2019 at 09:07 AM
-- Server version: 10.1.38-MariaDB
-- PHP Version: 7.2.16

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `social_network`
--

-- --------------------------------------------------------

--
-- Table structure for table `catagory`
--

CREATE TABLE `catagory` (
  `id` int(35) NOT NULL,
  `name` varchar(50) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `catagory`
--

INSERT INTO `catagory` (`id`, `name`) VALUES
(1, 'Html & Css'),
(2, 'SEO'),
(3, 'Android'),
(4, 'Ios');

-- --------------------------------------------------------

--
-- Table structure for table `comments`
--

CREATE TABLE `comments` (
  `id` int(35) NOT NULL,
  `post_id` int(30) NOT NULL,
  `user_id` int(30) NOT NULL,
  `comment` varchar(255) NOT NULL,
  `comment_auther` varchar(50) NOT NULL,
  `date` varchar(50) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `comments`
--

INSERT INTO `comments` (`id`, `post_id`, `user_id`, `comment`, `comment_auther`, `date`) VALUES
(4, 1, 1, 'jhjshdkjasd\r\n', 'Zain Zulifqar', '06/04/19 01:58:08pm'),
(5, 1, 2, 'hey there', 'dummy', '06/04/19 01:59:25pm');

-- --------------------------------------------------------

--
-- Table structure for table `messages`
--

CREATE TABLE `messages` (
  `id` int(35) NOT NULL,
  `sender_name` varchar(30) NOT NULL,
  `sender_id` int(30) NOT NULL,
  `receiver_id` int(20) NOT NULL,
  `receiver_name` varchar(50) NOT NULL,
  `msg_sub` varchar(50) NOT NULL,
  `msg` varchar(255) NOT NULL,
  `reply` varchar(50) NOT NULL,
  `status` varchar(10) NOT NULL,
  `date` varchar(50) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `messages`
--

INSERT INTO `messages` (`id`, `sender_name`, `sender_id`, `receiver_id`, `receiver_name`, `msg_sub`, `msg`, `reply`, `status`, `date`) VALUES
(1, 'Zain Zulifqar ', 1, 1, 'Zain Zulifqar ', 'User Panel', 'hey there...!!!!', 'no', 'unread', '10/02/19'),
(2, 'dummy ', 2, 1, 'Zain Zulifqar ', 'hello', 'msdajsd', 'no', 'unread', '06/04/19'),
(3, 'Zain Zulifqar ', 1, 2, 'dummy ', 'zain', 'hey there', 'no', 'unread', '06/04/19');

-- --------------------------------------------------------

--
-- Table structure for table `post`
--

CREATE TABLE `post` (
  `id` int(35) NOT NULL,
  `user_id` int(30) NOT NULL,
  `user_name` varchar(50) NOT NULL,
  `catagory_id` int(20) NOT NULL,
  `title` varchar(50) NOT NULL,
  `content` varchar(50) NOT NULL,
  `date` varchar(50) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `post`
--

INSERT INTO `post` (`id`, `user_id`, `user_name`, `catagory_id`, `title`, `content`, `date`) VALUES
(1, 1, 'Zain Zulifqar', 2, 'Dummy', 'Dummy Dummy', '10/02/19 10:25:19pm');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` int(35) NOT NULL,
  `fname` varchar(30) NOT NULL,
  `email` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  `about_yourself` varchar(255) NOT NULL,
  `country` varchar(50) NOT NULL,
  `birthday` varchar(50) NOT NULL,
  `gender` varchar(10) NOT NULL,
  `image` varchar(255) NOT NULL,
  `reg_date` varchar(50) NOT NULL,
  `last_login` varchar(50) NOT NULL,
  `status` varchar(10) NOT NULL,
  `verification_code` int(100) NOT NULL,
  `posts` text NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `fname`, `email`, `password`, `about_yourself`, `country`, `birthday`, `gender`, `image`, `reg_date`, `last_login`, `status`, `verification_code`, `posts`) VALUES
(1, 'Zain Zulifqar', 'zainzulifqar@gmail.com', 'zainzulifqar', '', 'pakistan', '1997-12-09', 'male', '30688834_1236261906510655_7966613886113331974_n.jpg', '10-02-19 10:21:12pm', '1554541098', 'unverified', 2022297565, 'no'),
(2, 'dummy', 'dummy@gmail.com', 'zainzulifqar', '', 'pakistan', '1223-01-09', 'male', 'default.jpg', '06-04-19 01:58:45pm', '1554541176', 'unverified', 41051725, 'no');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `catagory`
--
ALTER TABLE `catagory`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `comments`
--
ALTER TABLE `comments`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `messages`
--
ALTER TABLE `messages`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `post`
--
ALTER TABLE `post`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `catagory`
--
ALTER TABLE `catagory`
  MODIFY `id` int(35) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `comments`
--
ALTER TABLE `comments`
  MODIFY `id` int(35) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `messages`
--
ALTER TABLE `messages`
  MODIFY `id` int(35) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `post`
--
ALTER TABLE `post`
  MODIFY `id` int(35) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(35) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
