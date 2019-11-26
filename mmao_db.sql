-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Nov 26, 2019 at 04:16 PM
-- Server version: 5.7.24-log
-- PHP Version: 7.2.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `mmao_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `fight`
--

CREATE TABLE `fight` (
  `id` int(11) NOT NULL,
  `sender_id` int(11) NOT NULL,
  `receiver_id` int(11) NOT NULL,
  `winner_id` int(11) NOT NULL,
  `status` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `fight`
--

INSERT INTO `fight` (`id`, `sender_id`, `receiver_id`, `winner_id`, `status`) VALUES
(192, 5, 6, 5, 'ignored'),
(193, 5, 6, 5, 'ignored'),
(194, 5, 6, 5, 'ignored'),
(195, 5, 6, 5, 'ignored'),
(196, 5, 6, 6, 'done'),
(197, 5, 6, 5, 'done'),
(198, 5, 6, 5, 'done'),
(199, 5, 6, 5, 'done'),
(200, 7, 5, 5, 'done'),
(201, 5, 7, 5, 'done'),
(202, 8, 5, 8, 'done'),
(203, 8, 6, 8, 'done'),
(204, 5, 6, 6, 'ignored'),
(205, 5, 14, 5, 'done'),
(206, 14, 5, 5, 'completed'),
(207, 15, 6, 6, 'completed');

-- --------------------------------------------------------

--
-- Table structure for table `fighter`
--

CREATE TABLE `fighter` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `firstname` text NOT NULL,
  `lastname` text NOT NULL,
  `characterurl` text,
  `training` text,
  `matches` int(11) NOT NULL DEFAULT '0',
  `win` int(11) NOT NULL DEFAULT '0',
  `loss` int(11) NOT NULL DEFAULT '0',
  `striking` int(11) NOT NULL,
  `grapling` int(11) NOT NULL,
  `stamina` int(11) NOT NULL,
  `health` int(11) NOT NULL,
  `background` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `fighter`
--

INSERT INTO `fighter` (`id`, `user_id`, `firstname`, `lastname`, `characterurl`, `training`, `matches`, `win`, `loss`, `striking`, `grapling`, `stamina`, `health`, `background`) VALUES
(8, 5, 'Mehmet', 'Balci', 'img/fighter2.gif', NULL, 3, 6, 3, 58, 89, 70, 57, 'wrestling'),
(9, 6, 'Ghaleb', 'Hamie', 'img/fighter1.gif', NULL, 3, 2, 4, 47, 60, 65, 55, 'boxing'),
(17, 7, 'test', 'boxer', 'img/fighter1.gif', NULL, 2, 1, 1, 70, 40, 55, 65, 'boxing'),
(18, 8, 'Boxing', 'Legend', 'img/fighter2.gif', NULL, 2, 2, 0, 70, 30, 55, 65, 'boxing'),
(22, 14, 'hans', 'anders', 'img/fighter3.gif', NULL, 3, 0, 2, 70, 30, 55, 65, 'boxing'),
(23, 15, 'jowed', 'vdb', 'img/fighter2.gif', NULL, 3, 0, 1, 70, 30, 55, 65, 'boxing');

-- --------------------------------------------------------

--
-- Table structure for table `messages`
--

CREATE TABLE `messages` (
  `id` int(11) NOT NULL,
  `sender_id` int(11) NOT NULL,
  `receiver_id` int(11) NOT NULL,
  `msg` text
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `messages`
--

INSERT INTO `messages` (`id`, `sender_id`, `receiver_id`, `msg`) VALUES
(25, 6, 5, 'Fight offer accepted'),
(26, 6, 5, 'Fight offer accepted'),
(27, 5, 7, 'Fight offer accepted'),
(28, 7, 5, 'Fight offer accepted'),
(29, 5, 8, 'Fight offer accepted'),
(30, 6, 8, 'Fight offer accepted'),
(31, 14, 5, 'Fight offer accepted'),
(32, 5, 14, 'Fight offer accepted'),
(33, 6, 15, 'Fight offer accepted');

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `train`
--

CREATE TABLE `train` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `attribute` text NOT NULL,
  `status` text NOT NULL,
  `points` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `train`
--

INSERT INTO `train` (`id`, `user_id`, `attribute`, `status`, `points`) VALUES
(9, 6, 'striking', 'completed', 47),
(10, 5, 'stamina', 'completed', 67),
(11, 5, 'grapling', 'completed', 89),
(12, 5, 'stamina', 'completed', 70),
(13, 5, 'health', 'completed', 56),
(14, 5, 'health', 'completed', 57),
(15, 5, 'striking', 'completed', 58);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(10) UNSIGNED NOT NULL,
  `admin` int(11) NOT NULL DEFAULT '0',
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `fighter` int(11) DEFAULT '1',
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `admin`, `name`, `fighter`, `email`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(5, 1, 'mehmet', 2, 'mehmetemin.balci@live.nl', NULL, '$2y$10$ofVRl3d6l8JksJRZpl3AROld7K4wGrpUkxBFuej3J1diHmgAlymn.', 'aDTTYx7UAa65a0ylLeULe3VjVoZt4nHE0blwRUpFwwFl7VLqWYD7l9WX9RXS', '2019-01-10 12:38:19', '2019-01-10 12:49:35'),
(6, 0, 'ghaleb', 2, 'ghaleb@hotmail.com', NULL, '$2y$10$Y4.a4/5.pPZ.LkEFKldnvufA0GswqzDLEiSxt7Ye/3rRNmUHQxYjW', 'caGmcQPZglZFpG9kMSCszspLOXsfmzHo6wRCey3VCbUOfRh6B9GUPTAM81Jz', '2019-01-10 12:38:50', '2019-01-10 12:52:09'),
(7, 0, 'hasan', 2, 'hasan@hotmail.com', NULL, '$2y$10$jqgZ.yZEYQ0MjTiEbzAKWO8O17Y8rG2Scehn7XYMLwwByh0Z6t6DW', 'yGEojUcRWI9q16jZRgEAT4ckhYaIk3bBVABHZmhFOq3vZVfroU4td5JD03q6', '2019-02-07 19:00:36', '2019-02-07 19:28:36'),
(8, 0, 'testjes', 2, 'test@test.com', NULL, '$2y$10$OgCW9h6VI1o3LA3CtUuRKOI06EQL5ZTv0y.u6ahiFhHbV4es4AlYq', 'fm17E0j07ZjUfQYGRbp4vjU3HJYhIw9XpXOFXNs75eepjn0RZ7LfXzcWFBJJ', '2019-02-07 20:59:55', '2019-02-07 21:06:37'),
(14, 0, 'huso', 2, 'haa@hotmail.com', NULL, '$2y$10$uhvQPpw8Lvga4o7IPWZ/..zCrUvE4AHK9eIpXW9Y/F8/zJdnC760S', 'mKm0ml7LwnkFEuNj8MH2ohHJ3S9q6Ov2hunTM77W9fREFSq82fRuwO2KGpGv', '2019-10-20 11:52:33', '2019-10-20 11:56:45'),
(15, 0, 'kemalettin', 2, 'kemal@hotmail.com', NULL, '$2y$10$s9G2mUu05UKtWwbV0kev6eqDuSR6r.oxb/Y45eoiACAbw7jZUZ1qW', 'YGV8tfZdiH5nG676tmOt8DOebqABc8Y0tmXcPm6iR2UB1q7TkKDTVxAdRZOb', '2019-11-17 16:59:14', '2019-11-17 16:59:40');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `fight`
--
ALTER TABLE `fight`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `fighter`
--
ALTER TABLE `fighter`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `messages`
--
ALTER TABLE `messages`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `train`
--
ALTER TABLE `train`
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
-- AUTO_INCREMENT for table `fight`
--
ALTER TABLE `fight`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=208;

--
-- AUTO_INCREMENT for table `fighter`
--
ALTER TABLE `fighter`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT for table `messages`
--
ALTER TABLE `messages`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=34;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `train`
--
ALTER TABLE `train`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
