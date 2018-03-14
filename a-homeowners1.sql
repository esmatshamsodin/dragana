-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 13, 2018 at 11:25 AM
-- Server version: 10.1.30-MariaDB
-- PHP Version: 7.2.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `a-homeowners`
--

-- --------------------------------------------------------

--
-- Table structure for table `grundbuch`
--

CREATE TABLE `grundbuch` (
  `id` int(11) NOT NULL,
  `address` varchar(200) NOT NULL,
  `hausnumber` int(100) NOT NULL,
  `size` int(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `grundbuch`
--

INSERT INTO `grundbuch` (`id`, `address`, `hausnumber`, `size`) VALUES
(1, 'ramprstorfergasse', 21, 105),
(2, 'ramperstorfergasse', 22, 110),
(3, 'ramperstorfergasse', 23, 112),
(4, 'herzgasse79', 38, 62),
(5, 'herzgasse79', 39, 60),
(6, 'herzgasse79', 40, 52);

-- --------------------------------------------------------

--
-- Table structure for table `house`
--

CREATE TABLE `house` (
  `hause_id` int(11) NOT NULL,
  `image` varchar(200) NOT NULL,
  `fk_grund_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `house`
--

INSERT INTO `house` (`hause_id`, `image`, `fk_grund_id`) VALUES
(1, 'https://i.ytimg.com/vi/Xx6t0gmQ_Tw/maxresdefault.jpg', 1),
(2, 'https://upload.wikimedia.org/wikipedia/commons/9/96/Vasskertentrance.jpg', 2),
(3, 'https://cdn.trendir.com/wp-content/uploads/2016/06/Modern-house-in-Auckland-New-Zealand.jpg', 3);

-- --------------------------------------------------------

--
-- Table structure for table `likes`
--

CREATE TABLE `likes` (
  `likes_id` int(11) NOT NULL,
  `fk_user_id` int(11) NOT NULL,
  `fk_posts_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `owners`
--

CREATE TABLE `owners` (
  `id` int(11) NOT NULL,
  `name` varchar(55) NOT NULL,
  `lastname` varchar(55) NOT NULL,
  `birthdate` date NOT NULL,
  `phone` int(100) NOT NULL,
  `address` varchar(100) NOT NULL,
  `number-of-rel` int(55) NOT NULL,
  `can-vot` int(1) NOT NULL,
  `fk_hause_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `owners`
--

INSERT INTO `owners` (`id`, `name`, `lastname`, `birthdate`, `phone`, `address`, `number-of-rel`, `can-vot`, `fk_hause_id`) VALUES
(1, 'John', 'Doe', '1987-01-03', 688960011, 'ramperstorfergasse8-12', 5, 1, 1);

-- --------------------------------------------------------

--
-- Table structure for table `posts`
--

CREATE TABLE `posts` (
  `post_id` int(11) NOT NULL,
  `text` varchar(250) NOT NULL,
  `active` int(1) NOT NULL,
  `likes_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `renters`
--

CREATE TABLE `renters` (
  `id` int(11) NOT NULL,
  `name` varchar(55) NOT NULL,
  `lastname` varchar(55) NOT NULL,
  `birthdate` date NOT NULL,
  `phone` int(55) NOT NULL,
  `address` varchar(200) NOT NULL,
  `can-vot` int(1) NOT NULL,
  `can-propose` int(1) NOT NULL,
  `can-comment` int(1) NOT NULL,
  `can-see-nach` int(1) NOT NULL,
  `fk_hause_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `renters`
--

INSERT INTO `renters` (`id`, `name`, `lastname`, `birthdate`, `phone`, `address`, `can-vot`, `can-propose`, `can-comment`, `can-see-nach`, `fk_hause_id`) VALUES
(1, 'maxim', 'max', '1989-02-06', 68896325, 'ramperstorfergasse', 1, 1, 1, 1, 1);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `userId` int(11) NOT NULL,
  `userName` varchar(30) NOT NULL,
  `userEmail` varchar(60) NOT NULL,
  `userPass` varchar(255) NOT NULL,
  `usertype` varchar(60) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`userId`, `userName`, `userEmail`, `userPass`, `usertype`) VALUES
(1, 'esmat', 'admin@admin.com', '8d969eef6ecad3c29a3a629280e686cf0c3f5d5a86aff3ca12020c923adc6c92', '');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `grundbuch`
--
ALTER TABLE `grundbuch`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `house`
--
ALTER TABLE `house`
  ADD PRIMARY KEY (`hause_id`),
  ADD KEY `fk_grund_id` (`fk_grund_id`);

--
-- Indexes for table `likes`
--
ALTER TABLE `likes`
  ADD PRIMARY KEY (`likes_id`),
  ADD KEY `fk_user_id` (`fk_user_id`),
  ADD KEY `fk_posts_id` (`fk_posts_id`);

--
-- Indexes for table `owners`
--
ALTER TABLE `owners`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_hause_id` (`fk_hause_id`);

--
-- Indexes for table `posts`
--
ALTER TABLE `posts`
  ADD PRIMARY KEY (`post_id`),
  ADD KEY `likes_id` (`likes_id`);

--
-- Indexes for table `renters`
--
ALTER TABLE `renters`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_hause_id` (`fk_hause_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`userId`),
  ADD UNIQUE KEY `userEmail` (`userEmail`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `likes`
--
ALTER TABLE `likes`
  MODIFY `likes_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `userId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `house`
--
ALTER TABLE `house`
  ADD CONSTRAINT `house_ibfk_1` FOREIGN KEY (`fk_grund_id`) REFERENCES `grundbuch` (`id`),
  ADD CONSTRAINT `house_ibfk_2` FOREIGN KEY (`fk_grund_id`) REFERENCES `grundbuch` (`id`);

--
-- Constraints for table `likes`
--
ALTER TABLE `likes`
  ADD CONSTRAINT `likes_ibfk_1` FOREIGN KEY (`fk_user_id`) REFERENCES `users` (`userId`),
  ADD CONSTRAINT `likes_ibfk_2` FOREIGN KEY (`fk_posts_id`) REFERENCES `posts` (`post_id`);

--
-- Constraints for table `owners`
--
ALTER TABLE `owners`
  ADD CONSTRAINT `owners_ibfk_1` FOREIGN KEY (`fk_hause_id`) REFERENCES `house` (`hause_id`);

--
-- Constraints for table `posts`
--
ALTER TABLE `posts`
  ADD CONSTRAINT `posts_ibfk_1` FOREIGN KEY (`likes_id`) REFERENCES `likes` (`likes_id`);

--
-- Constraints for table `renters`
--
ALTER TABLE `renters`
  ADD CONSTRAINT `renters_ibfk_1` FOREIGN KEY (`fk_hause_id`) REFERENCES `house` (`hause_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
