-- phpMyAdmin SQL Dump
-- version 5.0.1
-- https://www.phpmyadmin.net/
--
-- Host: mysql-server
-- Generation Time: Mar 28, 2022 at 11:24 AM
-- Server version: 8.0.19
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
-- Database: `blog`
--

-- --------------------------------------------------------

--
-- Table structure for table `posts`
--

CREATE TABLE `posts` (
  `id` int NOT NULL,
  `username` varchar(100) NOT NULL,
  `title` varchar(100) NOT NULL,
  `content` longtext NOT NULL,
  `date` timestamp(6) NOT NULL,
  `uid` int DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `posts`
--

INSERT INTO `posts` (`id`, `username`, `title`, `content`, `date`, `uid`) VALUES
(2, 'aditi', 'tennis', 'game', '2022-03-25 15:20:23.000372', 0),
(4, 'punit', 'carrom', 'efd', '2022-03-07 15:17:15.000000', 2),
(5, 'ravinder', 'tennis', 'punit', '2022-03-27 15:17:24.637703', 0),
(6, 'ravinder', 'bdfhjvgdhjbvgfjudkbvn', 'dfbfgb ngfb ngfs n', '2022-03-28 10:51:46.000000', 0),
(8, 'aaaaaaaaa', 'bbbbbbbbbb', 'cccccccc', '2028-03-22 11:01:33.000000', 0),
(9, 'zzz', 'zzz', 'zz', '2028-03-22 11:02:37.000000', 0),
(12, 'vbdfs', 'vfdsa', 'vdfa', '2028-03-22 12:20:24.000000', 0),
(14, '222', '222', '222', '2028-03-22 01:32:44.000000', 2),
(15, 'lll', 'llll', 'llll', '2028-03-22 02:41:11.000000', 5),
(16, 'oihhuii', 'huihuiu', 'juihuihui', '2028-03-22 03:55:37.000000', NULL),
(17, 'satyam', 'bottle', 'contain water', '2028-03-22 04:25:24.000000', 10);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int NOT NULL,
  `name` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  `role` varchar(100) NOT NULL,
  `status` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `password`, `role`, `status`) VALUES
(2, 'aastha', 'aastha@gmail.com', '123', 'user', 'approved'),
(5, 'admin', 'admin@gmail.com', 'admin', 'admin', 'approved'),
(6, 'nissan', 'nissan@gmail.com', '123', 'user', 'restricted'),
(7, 'shakeeb', 'shakeeb@gmail.com', '123', 'user', 'approved'),
(8, 'pc', 'pc@gmail.com', '123', 'user', 'approved'),
(10, 'satyam', 'satyam@gmail.com', '123', 'user', 'approved');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `posts`
--
ALTER TABLE `posts`
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
-- AUTO_INCREMENT for table `posts`
--
ALTER TABLE `posts`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
