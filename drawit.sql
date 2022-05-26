-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 26, 2022 at 12:22 PM
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
  `id` int(11) NOT NULL,
  `designer` int(11) NOT NULL,
  `job` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `jobs`
--

CREATE TABLE `jobs` (
  `id` int(11) NOT NULL,
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

INSERT INTO `jobs` (`id`, `type`, `favcolor`, `delay`, `price`, `description`, `creator`, `requests`) VALUES
(8, 'Totam', '#ea9350', '3 day', '18 $', 'Quas dolor est exped', 2, 4),
(9, 'Consequatur Id eos', '#17462e', 'Tempora voluptas id ', '594', 'Ea harum excepturi d', 2, 1),
(11, 'Temporibus hic incid', '#875611', 'Perferendis quisquam', '270', 'Sequi voluptatum vol', 2, 1),
(12, 'Occaecat corrupti n', '#568c4f', 'Consectetur qui rec', '219', 'Autem earum enim rat', 2, 1),
(13, 'Ullamco in ex dolori', '#444294', 'Atque ab voluptatum ', '144', 'Tenetur sequi perfer', 2, 1),
(18, 'Vitae in cum ea in e', '#afa1dc', 'Enim omnis sed aut p', '493', 'Eiusmod totam dicta ', 2, 1),
(19, 'Eos aut officiis nis', '#ecf649', 'Iste cupidatat quasi', '558', 'Et debitis molestiae', 2, 0),
(20, 'Voluptatum velit cul', '#0aee2b', 'Cupidatat tempora de', '689', 'Aute laborum Volupt', 2, 0);

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
(1, 8, 3),
(2, 9, 3),
(3, 8, 3),
(4, 8, 3),
(5, 11, 3),
(6, 12, 3),
(7, 13, 3),
(8, 18, 3);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `fname` varchar(100) NOT NULL,
  `lname` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `pwd` varchar(100) NOT NULL,
  `role` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `fname`, `lname`, `email`, `pwd`, `role`) VALUES
(2, 'Kenneth', 'Clinton', 'soqybemy@mailinator.com', 'pop', 'client'),
(3, 'Wesley', 'Ishmael', 'xasis@mailinator.com', '123', 'designer'),
(4, 'Sandra', 'Selma', 'camidyve@mailinator.com', '$2y$10$tF2e88iuDi4Dh55cuSIhG.WASUUtmgZBfOmpt2wHjPettrLguvZJe', 'client');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `accepted`
--
ALTER TABLE `accepted`
  ADD PRIMARY KEY (`id`),
  ADD KEY `designer` (`designer`),
  ADD KEY `job` (`job`);

--
-- Indexes for table `jobs`
--
ALTER TABLE `jobs`
  ADD PRIMARY KEY (`id`),
  ADD KEY `creator` (`creator`);

--
-- Indexes for table `requests`
--
ALTER TABLE `requests`
  ADD PRIMARY KEY (`id`),
  ADD KEY `designer` (`designer`),
  ADD KEY `job` (`job`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `accepted`
--
ALTER TABLE `accepted`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `jobs`
--
ALTER TABLE `jobs`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `requests`
--
ALTER TABLE `requests`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `accepted`
--
ALTER TABLE `accepted`
  ADD CONSTRAINT `accepted_ibfk_1` FOREIGN KEY (`designer`) REFERENCES `users` (`id`),
  ADD CONSTRAINT `accepted_ibfk_2` FOREIGN KEY (`job`) REFERENCES `jobs` (`id`);

--
-- Constraints for table `jobs`
--
ALTER TABLE `jobs`
  ADD CONSTRAINT `jobs_ibfk_1` FOREIGN KEY (`creator`) REFERENCES `users` (`id`);

--
-- Constraints for table `requests`
--
ALTER TABLE `requests`
  ADD CONSTRAINT `requests_ibfk_1` FOREIGN KEY (`designer`) REFERENCES `users` (`id`),
  ADD CONSTRAINT `requests_ibfk_2` FOREIGN KEY (`job`) REFERENCES `jobs` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
