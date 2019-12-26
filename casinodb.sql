-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 26, 2019 at 08:48 AM
-- Server version: 10.1.40-MariaDB
-- PHP Version: 7.3.5

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `casinodb`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin_logins`
--

CREATE TABLE `admin_logins` (
  `id` int(255) UNSIGNED NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `deposit` int(255) DEFAULT NULL,
  `created_at` date DEFAULT NULL,
  `updated_at` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admin_logins`
--

INSERT INTO `admin_logins` (`id`, `username`, `password`, `deposit`, `created_at`, `updated_at`) VALUES
(1, 'a@b.c', '9292c19ff9aec0e2b385c37f371e68e2c1270d40f1a93f50ad7dd3465e1d6e95', NULL, '2019-12-14', '2019-12-14');

-- --------------------------------------------------------

--
-- Table structure for table `game_data`
--

CREATE TABLE `game_data` (
  `game_id` int(255) NOT NULL,
  `admin_id` int(255) UNSIGNED DEFAULT NULL,
  `user_id` int(255) UNSIGNED DEFAULT NULL,
  `table_no` int(255) NOT NULL,
  `bid` int(255) DEFAULT NULL,
  `created_at` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `game_data`
--

INSERT INTO `game_data` (`game_id`, `admin_id`, `user_id`, `table_no`, `bid`, `created_at`) VALUES
(3, NULL, 3, 3, 3500, '2019-10-07'),
(4, NULL, 4, 5, 2225, '2019-09-19'),
(5, NULL, 5, 4, 5000, '2019-08-06'),
(18, 1, NULL, 5, 2000, '2019-12-20'),
(19, 1, NULL, 1, 2500, '2019-12-20'),
(22, NULL, 3, 3, 500, '2019-12-21'),
(23, 1, NULL, 2, 500, '2019-12-22'),
(28, 1, NULL, 3, 1000, '2019-12-22'),
(38, NULL, 2, 3, 500, '2019-12-22'),
(39, NULL, 2, 2, 200, '2019-12-22'),
(40, NULL, 2, 2, 700, '2019-12-22'),
(41, 1, NULL, 2, 500, '2019-12-24'),
(42, 1, NULL, 3, 500, '2019-12-24'),
(43, 1, NULL, 3, 500, '2019-12-24'),
(44, 1, NULL, 3, 500, '2019-12-24'),
(45, 1, NULL, 3, 500, '2019-12-24'),
(46, 1, NULL, 3, 500, '2019-12-24'),
(47, 1, NULL, 3, 500, '2019-12-24'),
(50, 1, NULL, 3, 500, '2019-12-26');

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) NOT NULL,
  `token` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `password_resets`
--

INSERT INTO `password_resets` (`email`, `token`) VALUES
('urvishjoshi49@gmail.com', '4221cf296d2f7b66b3de363c3644af249af3a56ce50153b61e2bd3913d4db027'),
('urvishjoshi49@gmail.com', '4221cf296d2f7b66b3de363c3644af249af3a56ce50153b61e2bd3913d4db027'),
('urvishjoshi49@gmail.com', '4221cf296d2f7b66b3de363c3644af249af3a56ce50153b61e2bd3913d4db027'),
('urvishjoshi49@gmail.com', '4221cf296d2f7b66b3de363c3644af249af3a56ce50153b61e2bd3913d4db027');

-- --------------------------------------------------------

--
-- Table structure for table `user_details`
--

CREATE TABLE `user_details` (
  `id` int(255) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `phone` bigint(255) UNSIGNED NOT NULL,
  `deposit` int(255) UNSIGNED DEFAULT NULL,
  `active` enum('0','1','-1') NOT NULL DEFAULT '0',
  `created_at` date NOT NULL,
  `updated_at` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user_details`
--

INSERT INTO `user_details` (`id`, `name`, `email`, `phone`, `deposit`, `active`, `created_at`, `updated_at`) VALUES
(1, 'aaaaa', 'a@a.a', 99999999999, 0, '1', '2019-12-16', '2019-12-18'),
(2, 'bbbbb', 'b@b.b', 99999999999, 0, '1', '2019-12-18', '2019-12-18'),
(3, 'ccccc', 'c@c.c', 999999999, NULL, '-1', '2019-12-18', '2019-12-18'),
(4, 'ddddd', 'd@d.d', 99999999999, NULL, '0', '2019-12-18', '2019-12-18'),
(5, 'eeeee', 'e@e.e', 999999999, NULL, '0', '2019-12-18', '2019-12-18');

-- --------------------------------------------------------

--
-- Table structure for table `user_logins`
--

CREATE TABLE `user_logins` (
  `id` int(255) UNSIGNED NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `created_at` date NOT NULL,
  `updated_at` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user_logins`
--

INSERT INTO `user_logins` (`id`, `username`, `password`, `created_at`, `updated_at`) VALUES
(1, 'a@a.a', '9292c19ff9aec0e2b385c37f371e68e2c1270d40f1a93f50ad7dd3465e1d6e95', '2019-12-18', '2019-12-18'),
(2, 'b@b.b', '9292c19ff9aec0e2b385c37f371e68e2c1270d40f1a93f50ad7dd3465e1d6e95', '2019-11-18', '2019-11-18'),
(3, 'c@c.c', '9292c19ff9aec0e2b385c37f371e68e2c1270d40f1a93f50ad7dd3465e1d6e95', '2019-10-23', '2019-10-16'),
(4, 'd@d.d', '9292c19ff9aec0e2b385c37f371e68e2c1270d40f1a93f50ad7dd3465e1d6e95', '2019-09-17', '2019-09-17'),
(5, 'e@e.e', 'demo', '2019-08-06', '2019-08-14');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin_logins`
--
ALTER TABLE `admin_logins`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `username` (`username`),
  ADD KEY `id` (`id`);

--
-- Indexes for table `game_data`
--
ALTER TABLE `game_data`
  ADD PRIMARY KEY (`game_id`),
  ADD KEY `user_id` (`user_id`),
  ADD KEY `admin_id` (`admin_id`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `email` (`email`);

--
-- Indexes for table `user_details`
--
ALTER TABLE `user_details`
  ADD PRIMARY KEY (`id`),
  ADD KEY `email` (`email`),
  ADD KEY `name` (`name`,`phone`);

--
-- Indexes for table `user_logins`
--
ALTER TABLE `user_logins`
  ADD PRIMARY KEY (`id`),
  ADD KEY `username` (`username`),
  ADD KEY `id` (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin_logins`
--
ALTER TABLE `admin_logins`
  MODIFY `id` int(255) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `game_data`
--
ALTER TABLE `game_data`
  MODIFY `game_id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=52;

--
-- AUTO_INCREMENT for table `user_details`
--
ALTER TABLE `user_details`
  MODIFY `id` int(255) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `user_logins`
--
ALTER TABLE `user_logins`
  MODIFY `id` int(255) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `game_data`
--
ALTER TABLE `game_data`
  ADD CONSTRAINT `admin` FOREIGN KEY (`admin_id`) REFERENCES `admin_logins` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `user` FOREIGN KEY (`user_id`) REFERENCES `user_logins` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `user_details`
--
ALTER TABLE `user_details`
  ADD CONSTRAINT `user_id` FOREIGN KEY (`id`) REFERENCES `user_logins` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
