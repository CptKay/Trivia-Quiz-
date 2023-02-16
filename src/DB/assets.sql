-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: mysql
-- Generation Time: Feb 15, 2023 at 03:21 PM
-- Server version: 8.0.31
-- PHP Version: 8.0.19

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `triviaQuiz`
--

-- --------------------------------------------------------

--
-- Table structure for table `assets`
--

CREATE TABLE `assets` (
  `id` int NOT NULL,
  `type` enum('TITLE','TEXT','IMAGE') COLLATE utf8mb4_unicode_ci NOT NULL,
  `value` varchar(128) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` text COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `assets`
--

INSERT INTO `assets` (`id`, `type`, `value`, `description`) VALUES
(1, 'TITLE', 'Trivia Quiz', 'Page title in header'),
(2, 'TEXT', 'Category', 'Text in start page'),
(3, 'TEXT', 'Number of questions', 'Text in start page'),
(4, 'TEXT', 'Select', 'Text in start page'),
(5, 'IMAGE', 'LOGOGO.png', 'Logo image start page'),
(6, 'IMAGE', 'lessthan30.gif', 'Gif animation result 30 or less'),
(7, 'IMAGE', 'MORETHAN50.gif', 'Gif animation result 50 or more'),
(8, 'IMAGE', 'MORETHAN70.gif', 'Gif animation result 70 or more'),
(9, 'IMAGE', 'MORETHAN90.gif', 'Gif animation result 90 or more'),
(10, 'IMAGE', '', '');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `assets`
--
ALTER TABLE `assets`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `assets`
--
ALTER TABLE `assets`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
