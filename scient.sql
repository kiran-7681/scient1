-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 28, 2019 at 11:31 AM
-- Server version: 10.3.16-MariaDB
-- PHP Version: 7.1.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `scient`
--

-- --------------------------------------------------------

--
-- Table structure for table `accprojects`
--

CREATE TABLE `accprojects` (
  `username` varchar(100) NOT NULL,
  `mobile_number` int(15) NOT NULL,
  `email` varchar(200) NOT NULL,
  `s_username` varchar(100) NOT NULL,
  `s_description` varchar(100) NOT NULL,
  `id` int(6) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `accprojects`
--

INSERT INTO `accprojects` (`username`, `mobile_number`, `email`, `s_username`, `s_description`, `id`) VALUES
('kiran', 2147483647, 'kiranraj.krk.1729@gmail.com', 'abcd', 'abcde', 25),
('asd', 2147483647, 'kiranraj.krk.1729@gmail.com', 'idea', 'asdfa', 26),
('kiran', 2147483647, 'fasith35@gmail.com', 'kiran', 'asdknldkfa', 28);

-- --------------------------------------------------------

--
-- Table structure for table `projects`
--

CREATE TABLE `projects` (
  `username` varchar(50) NOT NULL,
  `mobile_number` int(10) NOT NULL,
  `email` varchar(100) NOT NULL,
  `s_username` varchar(100) NOT NULL,
  `s_description` varchar(255) NOT NULL,
  `created_at` datetime DEFAULT current_timestamp(),
  `id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `projects`
--

INSERT INTO `projects` (`username`, `mobile_number`, `email`, `s_username`, `s_description`, `created_at`, `id`) VALUES
('asd', 2147483647, 'sam@gmail.com', 'asd', 'asd', '2019-08-23 17:57:54', 29);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `username` varchar(50) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `created_at` datetime DEFAULT current_timestamp(),
  `status` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `email`, `password`, `created_at`, `status`) VALUES
(11, 'admin', 'sciprojectent@gmail.com', '$2y$10$VEWumbCvbIgaiwMif0CU9uKN/cKfuxPBI.H12WhxokPzkfnPShe.a', '2019-08-26 20:02:33', 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `accprojects`
--
ALTER TABLE `accprojects`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `projects`
--
ALTER TABLE `projects`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `username` (`username`),
  ADD UNIQUE KEY `email` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `projects`
--
ALTER TABLE `projects`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
