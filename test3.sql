-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Aug 23, 2020 at 07:07 PM
-- Server version: 10.3.22-MariaDB
-- PHP Version: 7.1.33

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `test3`
--

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `password` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `password`) VALUES
(1, 'wwq', 'zombbboy.z77z@gmail.com', '$2y$10$H7zIdkyjboZzt2utUXiLoO0cFz3RaTBNzAuwKes6qoZGBHZlXZMFi'),
(2, 'Lost', 'weqw@gmail.ru', '$2y$10$VpegtOYVn4j6binbe807c.kC1eJP2s1eJpv0HuIxwIUjZKQXV8B5e'),
(3, 'wwqq', 'wwe@gmail.com', '$2y$10$Mjhj.Qd.P3Hw19cq0yrZ7.XRKXQYl5hNUQzP3YCgA8jM9xMUjLO4W'),
(4, 'qqwss', 'qqqw@g.com', '$2y$10$j9j5dTSn2aOtiVYXhE2V6ufURWHXboDvC1JKtME5n/235UVBMFWNO'),
(5, '123', 'ssa@m.ru', '$2y$10$9tDVVBxFBytp65qavORiBeL/y/jrDjWEyVAhFTbLZPMkbwjfw5CcS');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
