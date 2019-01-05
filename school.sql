-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 05, 2019 at 06:58 PM
-- Server version: 10.1.35-MariaDB
-- PHP Version: 7.2.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `school`
--

-- --------------------------------------------------------

--
-- Table structure for table `conection`
--

CREATE TABLE `conection` (
  `student_id` int(11) NOT NULL,
  `course_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Dumping data for table `conection`
--

INSERT INTO `conection` (`student_id`, `course_id`) VALUES
(3, 2),
(34, 2),
(34, 3),
(34, 4),
(34, 6),
(35, 2),
(35, 3),
(35, 4),
(35, 6),
(38, 2),
(39, 2),
(43, 2),
(51, 12),
(51, 13),
(51, 14);

-- --------------------------------------------------------

--
-- Table structure for table `courses`
--

CREATE TABLE `courses` (
  `id` int(11) NOT NULL,
  `name` varchar(50) COLLATE utf8_bin NOT NULL,
  `description` varchar(500) COLLATE utf8_bin NOT NULL,
  `pic` varchar(50) COLLATE utf8_bin NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Dumping data for table `courses`
--

INSERT INTO `courses` (`id`, `name`, `description`, `pic`) VALUES
(2, 'java', 'this is a good course', 'identify-thumbcache-viewer.png'),
(3, 'Full stack ', 'this course is the course that i am in ', 'full stack developer.JPG'),
(4, 'oop', 'this course will teach you oop in the best way ', 'oop.jpg'),
(6, 'ss', 'jj', ''),
(7, 'ss', 'jj', ''),
(8, 'aa', 'aa', ''),
(9, 'aa', 'aa', ''),
(10, 'aa', 'aa', ''),
(11, 'aa', 'aa', ''),
(12, 'aa', 'aa', ''),
(13, 'aa', 'aa', ''),
(14, 'aa', 'aa', ''),
(16, 'asd', 'asdad', '_גרשון.jpg'),
(17, 'asl,kl;;;lasdm', '1,sam', '_גרשון.jpg'),
(18, 'asl,kl;;;lasdm', '1,sam', '_גרשון.jpg'),
(19, 'sa', '.,masd', '_גרשון.jpg'),
(20, 'aa', ';alsdk;', '_גרשון.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `students`
--

CREATE TABLE `students` (
  `id` int(11) NOT NULL,
  `name` varchar(50) COLLATE utf8_bin NOT NULL,
  `lastname` varchar(50) COLLATE utf8_bin NOT NULL,
  `email` varchar(50) COLLATE utf8_bin NOT NULL,
  `phonenum` int(25) NOT NULL,
  `pic` varchar(50) COLLATE utf8_bin NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Dumping data for table `students`
--

INSERT INTO `students` (`id`, `name`, `lastname`, `email`, `phonenum`, `pic`) VALUES
(3, 'moshe', 'gershon', 'moshe@gmail.com	', 12345, '_גרשון.jpg'),
(4, 'Ma', 'Long', 'malong@malong.com', 1234567890, 'malong.jpg'),
(5, 'Timo', 'Boll', 'timo@boll.com', 1478523691, 'timoboll.jpg'),
(14, 'aa', 'ss', 'ss', 322655464, ''),
(15, 'aa', 'ss', 'ss', 322655464, ''),
(17, 'Dolev', 'Seri', 'dolev@dolev.com', 525030555, ''),
(19, 'short', 'pai', 'short@pai.com', 3, 'pi.jpg'),
(23, '', '', '', 0, ''),
(24, '', '', '', 0, ''),
(25, '', '', '', 0, ''),
(26, '', '', '', 0, ''),
(27, '', '', '', 0, ''),
(28, 'asd', 'asd', 'asd', 354, ''),
(29, 'asd', 'asd', 'asd', 354, ''),
(30, 'asd', 'asd', 'asd', 354, ''),
(34, '', '', '', 0, ''),
(35, '', '', '', 0, ''),
(38, 'moshe', 'gershon', 'gershon@gmail.com', 546290202, '_גרשון.jpg'),
(39, 'moshe', 'gershon', 'gershon@gmail.com', 546290202, '_גרשון.jpg'),
(43, 'opj', 'kjkjh', 'kjh@kjj.com', 545456666, ''),
(44, ';m', ';l,', ';l,', 54, ''),
(45, ';m', ';l,', ';l,', 54, ''),
(46, 'coffee', 'gershon', 'a@test.com', 1234567890, '_גרשון.jpg'),
(47, 'moshe', 'gershon', ';laksj@alskd.com', 5454545, '_גרשון.jpg'),
(48, 'moshe', 'gershon', ';laksj@alskd.com', 5454545, '_גרשון.jpg'),
(49, 'moshe', 'gershon', ';laksj@alskd.com', 5454545, '_גרשון.jpg'),
(50, 'moshe', 'gershon', ';laksj@alskd.com', 5454545, '_גרשון.jpg'),
(51, 'oriya', 'lsdakkj', 'kjasdh@kajs.com', 3546354, '_גרשון.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `name` varchar(20) COLLATE utf8_bin NOT NULL,
  `password` varchar(11) COLLATE utf8_bin NOT NULL,
  `pic` varchar(500) COLLATE utf8_bin NOT NULL,
  `prmition_level` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `password`, `pic`, `prmition_level`) VALUES
(1, 'moshe@moshe.com', '12345', '_גרשון.jpg', 1),
(3, 'noam@noam.com', '12345', 'noam is craying.jpg', 2),
(7, 'm@m.com', '12345', 'identify-thumbcache-viewer.png', 3),
(8, 's', '', '', 0),
(11, 'david', '12345', 'identify-thumbcache-viewer.png', 2),
(12, 'david', '12345', 'identify-thumbcache-viewer.png', 2),
(13, 'david', '12345', 'identify-thumbcache-viewer.png', 2),
(14, 's', '12345', 'identify-thumbcache-viewer.png', 2),
(15, 's', '12345', 'identify-thumbcache-viewer.png', 2),
(16, ';asdlk', '123345', 'identify-thumbcache-viewer.png', 3),
(17, ';asdlk', '123345', 'identify-thumbcache-viewer.png', 3),
(18, ';asdlk', '123345', 'identify-thumbcache-viewer.png', 3),
(19, 'mosmosm', '1', '', 1),
(20, 's', '123345', '', 2),
(21, 's', '123345', '', 2),
(22, 's', '123345', '', 2),
(23, 's', '123345', '', 2),
(24, 'ddd', '13246', '', 2),
(25, 'ddd', '13246', '', 2),
(26, 'ddd', '13246', '', 2),
(27, 'ddd', '13246', '', 2),
(28, 'ddd', '13246', '', 2),
(29, 'ddd', '13246', '', 2),
(30, 'ddd', '13246', '', 2),
(34, 'Noam', '1234', 'noam is craying.jpg', 2),
(35, 'mosmosm@h.com', '4545', '_גרשון.jpg', 3),
(36, 'moshe@mosh.com', '12345', '_גרשון.jpg', 3),
(37, 'moshe@mosh.com', '12345', '_גרשון.jpg', 3),
(38, 'n@n.com', '12345', '_גרשון.jpg', 3),
(39, 'n@n.com', '12345', '_גרשון.jpg', 3),
(40, 's@s.com', '12345', '_גרשון.jpg', 3),
(41, 's@s.com', '12345', '_גרשון.jpg', 3),
(42, 'n@m.com', '12345', '_גרשון.jpg', 3),
(43, 'n@m.com', '12345', '_גרשון.jpg', 3),
(44, 'moshe@aa.com', '12', '_גרשון.jpg', 2),
(45, '\'asl', '\';las', '_גרשון.jpg', 3),
(46, 'mosmosm', '12345', 'hqdefault.jpg', 3),
(47, 'mosmosm', '12345', 'hqdefault.jpg', 3),
(48, ';.,as', 'lsa,m', '_גרשון.jpg', 3),
(49, 'as;,m.,', '1', '_גרשון.jpg', 3);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `conection`
--
ALTER TABLE `conection`
  ADD PRIMARY KEY (`student_id`,`course_id`),
  ADD KEY `course` (`course_id`);

--
-- Indexes for table `courses`
--
ALTER TABLE `courses`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `students`
--
ALTER TABLE `students`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `courses`
--
ALTER TABLE `courses`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `students`
--
ALTER TABLE `students`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=52;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=50;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `conection`
--
ALTER TABLE `conection`
  ADD CONSTRAINT `course` FOREIGN KEY (`course_id`) REFERENCES `courses` (`id`),
  ADD CONSTRAINT `student` FOREIGN KEY (`student_id`) REFERENCES `students` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
