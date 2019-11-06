-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 23, 2019 at 06:24 PM
-- Server version: 10.1.29-MariaDB
-- PHP Version: 7.2.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `thedentistss`
--

-- --------------------------------------------------------

--
-- Table structure for table `groupchat`
--

CREATE TABLE `groupchat` (
  `id` int(50) NOT NULL,
  `user_id` int(50) NOT NULL,
  `group_id` int(50) NOT NULL,
  `msg` varchar(1000) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `groupchat`
--

INSERT INTO `groupchat` (`id`, `user_id`, `group_id`, `msg`) VALUES
(1, 1, 1, 'Hi i am Basit Ali'),
(2, 2, 1, 'Hello i am ahmad khan'),
(3, 3, 1, 'Hi i am sana Gul'),
(4, 1, 1, 'how are you'),
(5, 3, 1, 'i am fine'),
(6, 2, 1, 'wow'),
(9, 1, 0, 'i am fine'),
(15, 1, 0, 'i am fine'),
(16, 1, 1, 'i am fine'),
(19, 1, 0, 'group_images/15696600653.jpg'),
(30, 1, 1, 'khaaan gg'),
(31, 1, 4, 'group_images/15698161903.jpg'),
(32, 1, 4, 'hasdfgdsh'),
(33, 1, 1, 'group_images/15714712564.jpg'),
(34, 1, 1, 'videos/1571474254001 Course Introduction.mp4');

-- --------------------------------------------------------

--
-- Table structure for table `groups`
--

CREATE TABLE `groups` (
  `id` int(50) NOT NULL,
  `name` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `groups`
--

INSERT INTO `groups` (`id`, `name`) VALUES
(1, 'Friends Gap shap '),
(2, 'Study Group'),
(3, 'Cs'),
(4, 'BSCS');

-- --------------------------------------------------------

--
-- Table structure for table `ind_chat`
--

CREATE TABLE `ind_chat` (
  `id` int(11) NOT NULL,
  `user_id` int(50) NOT NULL,
  `opp_id` int(50) NOT NULL,
  `msg` varchar(1000) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `ind_chat`
--

INSERT INTO `ind_chat` (`id`, `user_id`, `opp_id`, `msg`) VALUES
(1, 1, 2, 'Hi'),
(2, 2, 1, 'Hello'),
(4, 1, 2, 'what is your name'),
(5, 1, 2, 'how are you'),
(6, 1, 2, 'what is your name'),
(7, 1, 2, 'i am fine'),
(8, 1, 3, 'what is your name'),
(9, 1, 2, 'how are you');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `image` varchar(300) NOT NULL,
  `status` enum('enabled','disabled','','') NOT NULL DEFAULT 'enabled',
  `visibility` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `name`, `password`, `email`, `image`, `status`, `visibility`) VALUES
(1, 'Basit Ali', '21232f297a57a5a743894a0e4a801fc3', 'basitk41@gmail.com', 'uploaded_images/15698161011.jpg', 'enabled', 'on'),
(2, 'Ahmad Khan', '21232f297a57a5a743894a0e4a801fc3', 'ahmad@gmail.com', 'uploaded_images/1569438346As1.jpg', 'enabled', 'on'),
(3, 'Sana Gul', '21232f297a57a5a743894a0e4a801fc3', 'sana@gmail.com', 'uploaded_images/15694382963.jpg', 'enabled', 'on'),
(5, 'Ikram Hanif', '202cb962ac59075b964b07152d234b70', 'ikram@gmail.com', '', 'enabled', 'on'),
(6, 'Yawar Abbas', '21232f297a57a5a743894a0e4a801fc3', 'admin@gmail.com', '', 'enabled', 'on'),
(12, 'abc', '21232f297a57a5a743894a0e4a801fc3', 'abc@gmail.com', '', 'enabled', 'on');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `groupchat`
--
ALTER TABLE `groupchat`
  ADD PRIMARY KEY (`id`),
  ADD KEY `msg` (`msg`(767));

--
-- Indexes for table `groups`
--
ALTER TABLE `groups`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `ind_chat`
--
ALTER TABLE `ind_chat`
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
-- AUTO_INCREMENT for table `groupchat`
--
ALTER TABLE `groupchat`
  MODIFY `id` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=35;

--
-- AUTO_INCREMENT for table `groups`
--
ALTER TABLE `groups`
  MODIFY `id` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `ind_chat`
--
ALTER TABLE `ind_chat`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
