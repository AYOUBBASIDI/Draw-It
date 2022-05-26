-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 26, 2022 at 10:48 PM
-- Server version: 10.4.22-MariaDB
-- PHP Version: 8.1.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `drawit`
--

-- --------------------------------------------------------

--
-- Table structure for table `accepted`
--

CREATE TABLE `accepted` (
  `id_accepte` int(11) NOT NULL,
  `designer_accepted` int(11) NOT NULL,
  `job_accepted` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `accepted`
--

INSERT INTO `accepted` (`id_accepte`, `designer_accepted`, `job_accepted`) VALUES
(12, 11, 26),
(13, 11, 27);

-- --------------------------------------------------------

--
-- Table structure for table `jobs`
--

CREATE TABLE `jobs` (
  `id_job` int(11) NOT NULL,
  `type` varchar(100) NOT NULL,
  `favcolor` varchar(100) NOT NULL,
  `delay` varchar(100) NOT NULL,
  `price` varchar(100) NOT NULL,
  `description` varchar(1000) NOT NULL,
  `creator` int(11) NOT NULL,
  `requests` int(11) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `jobs`
--

INSERT INTO `jobs` (`id_job`, `type`, `favcolor`, `delay`, `price`, `description`, `creator`, `requests`) VALUES
(24, 'Esse suscipit ex acc', '#446f72', 'Sint tempora ut hic ', '704', 'Fugiat laborum ex e', 9, 2),
(25, 'Modi iste magnam et ', '#4f4ac8', 'Fugit sint aut assu', '740', 'Iste eum illum veri', 9, 0),
(26, 'Magni minus esse vit', '#0eb345', 'Cupiditate reprehend', '873', 'Itaque velit modi en', 4, 0),
(27, 'Aliquam accusantium ', '#485475', 'Fugiat dolor libero ', '703', 'Fuga Praesentium ea', 4, 0),
(28, 'Adipisci omnis et qu', '#646fb2', 'Dolor numquam simili', '823', 'Vel qui dolor ullam ', 4, 1);

-- --------------------------------------------------------

--
-- Table structure for table `requests`
--

CREATE TABLE `requests` (
  `id` int(11) NOT NULL,
  `job` int(11) NOT NULL,
  `designer` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `requests`
--

INSERT INTO `requests` (`id`, `job`, `designer`) VALUES
(15, 24, 10),
(17, 24, 11),
(18, 28, 11);

-- --------------------------------------------------------

--
-- Table structure for table `tests`
--

CREATE TABLE `tests` (
  `id_test` int(11) NOT NULL,
  `title` varchar(100) NOT NULL,
  `details` varchar(1000) NOT NULL,
  `slug` varchar(100) NOT NULL,
  `colors` varchar(100) NOT NULL,
  `genre` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id_user` int(11) NOT NULL,
  `fname` varchar(100) NOT NULL,
  `lname` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `pwd` varchar(100) NOT NULL,
  `role` varchar(100) NOT NULL,
  `situation` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id_user`, `fname`, `lname`, `email`, `pwd`, `role`, `situation`) VALUES
(4, 'Sandra', 'Selma', 'camidyve@mailinator.com', '$2y$10$tF2e88iuDi4Dh55cuSIhG.WASUUtmgZBfOmpt2wHjPettrLguvZJe', 'client', ''),
(9, 'bihi', 'BSD', 'ayoubbsd4@gmail.com', '$2y$10$.d1gsbCtL.EBqq7tS2m07uBbb2f28HawExbpj.2b.QpX4yN4O6EA.', 'client', '1'),
(10, 'Reed Wilkinson', 'Elmo Pate', 'kofobomati@mailinator.com', '$2y$10$zi/FsvGfD0CvlVkp/dDt5eRKcsLDKgIVUbWiW7A54v1dJ1m557/7.', 'designer', ''),
(11, 'Isabella Barnett', 'Hector Torres', 'mysyraxev@mailinator.com', '$2y$10$thbcY//9cfg9Olix7X4duuA6rYl/gLPhdzroARRlzI4D2p39SpD/q', 'designer', ''),
(12, 'Russell', 'Austin', 'tyjo@mailinator.com', '$2y$10$e74toD6XlyNvUI1GlxR86upzP55LnMxkgDgx8k4dBacsjP5svVCc.', 'client', '1');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `accepted`
--
ALTER TABLE `accepted`
  ADD PRIMARY KEY (`id_accepte`),
  ADD KEY `designer` (`designer_accepted`),
  ADD KEY `job` (`job_accepted`);

--
-- Indexes for table `jobs`
--
ALTER TABLE `jobs`
  ADD PRIMARY KEY (`id_job`),
  ADD KEY `creator` (`creator`);

--
-- Indexes for table `requests`
--
ALTER TABLE `requests`
  ADD PRIMARY KEY (`id`),
  ADD KEY `designer` (`designer`),
  ADD KEY `job` (`job`);

--
-- Indexes for table `tests`
--
ALTER TABLE `tests`
  ADD PRIMARY KEY (`id_test`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id_user`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `accepted`
--
ALTER TABLE `accepted`
  MODIFY `id_accepte` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `jobs`
--
ALTER TABLE `jobs`
  MODIFY `id_job` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;

--
-- AUTO_INCREMENT for table `requests`
--
ALTER TABLE `requests`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `tests`
--
ALTER TABLE `tests`
  MODIFY `id_test` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `accepted`
--
ALTER TABLE `accepted`
  ADD CONSTRAINT `accepted_ibfk_1` FOREIGN KEY (`designer_accepted`) REFERENCES `users` (`id_user`),
  ADD CONSTRAINT `accepted_ibfk_2` FOREIGN KEY (`job_accepted`) REFERENCES `jobs` (`id_job`);

--
-- Constraints for table `jobs`
--
ALTER TABLE `jobs`
  ADD CONSTRAINT `jobs_ibfk_1` FOREIGN KEY (`creator`) REFERENCES `users` (`id_user`);

--
-- Constraints for table `requests`
--
ALTER TABLE `requests`
  ADD CONSTRAINT `requests_ibfk_1` FOREIGN KEY (`designer`) REFERENCES `users` (`id_user`),
  ADD CONSTRAINT `requests_ibfk_2` FOREIGN KEY (`job`) REFERENCES `jobs` (`id_job`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
