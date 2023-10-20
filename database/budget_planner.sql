-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 22, 2023 at 01:15 PM
-- Server version: 10.4.25-MariaDB
-- PHP Version: 8.1.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `budget_planner`
--

-- --------------------------------------------------------

--
-- Table structure for table `budgets`
--

CREATE TABLE `budgets` (
  `id` int(11) NOT NULL,
  `name` varchar(255) DEFAULT NULL,
  `savings` varchar(20) DEFAULT NULL,
  `budget` varchar(20) DEFAULT NULL,
  `e_date` int(11) DEFAULT NULL,
  `e_month` int(10) DEFAULT NULL,
  `e_year` year(4) DEFAULT NULL,
  `created_by` int(11) DEFAULT NULL,
  `is_active` tinyint(1) DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `budgets`
--

INSERT INTO `budgets` (`id`, `name`, `savings`, `budget`, `e_date`, `e_month`, `e_year`, `created_by`, `is_active`, `created_at`, `updated_at`) VALUES
(11, 'February Budget ', '5000', '50000', 11, 2, 2023, 1, 1, '2023-02-11 00:40:37', '2023-02-11 00:41:37'),
(13, 'buknj', '55', '5555', 11, 2, 2023, 13, 1, '2023-02-11 00:49:12', '2023-02-11 01:51:26');

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `id` int(11) NOT NULL,
  `name` varchar(255) DEFAULT NULL,
  `is_editable` tinyint(1) DEFAULT NULL,
  `is_active` tinyint(1) DEFAULT NULL,
  `created_by` int(1) DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `name`, `is_editable`, `is_active`, `created_by`, `created_at`, `updated_at`) VALUES
(19, 'Gas bill', 0, 1, 1, '2023-02-11 00:38:12', '2023-02-11 00:38:12'),
(20, 'Electricity bill', 0, 1, 1, '2023-02-11 00:38:21', '2023-02-11 00:38:21'),
(21, 'School fees', 0, 1, 1, '2023-02-11 00:38:30', '2023-02-11 00:38:42'),
(22, 'Tuition fees', 0, 1, 1, '2023-02-11 00:38:35', '2023-02-11 00:38:48'),
(23, 'Bus fare', 0, 1, 1, '2023-02-11 00:38:58', '2023-02-11 00:38:58'),
(28, 'kmlkm', NULL, 1, 13, '2023-02-11 01:49:35', '2023-02-11 01:49:35'),
(29, 'kjn', NULL, 1, 15, '2023-02-11 02:40:03', '2023-02-11 02:40:03');

-- --------------------------------------------------------

--
-- Table structure for table `expenses`
--

CREATE TABLE `expenses` (
  `id` int(11) NOT NULL,
  `description` varchar(1000) DEFAULT NULL,
  `amount` varchar(255) DEFAULT NULL,
  `budget_id` int(11) DEFAULT NULL,
  `category_id` int(11) DEFAULT NULL,
  `e_date` int(4) DEFAULT NULL,
  `e_month` int(11) DEFAULT NULL,
  `e_year` int(11) DEFAULT NULL,
  `is_active` tinyint(1) DEFAULT NULL,
  `created_by` int(11) DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `expenses`
--

INSERT INTO `expenses` (`id`, `description`, `amount`, `budget_id`, `category_id`, `e_date`, `e_month`, `e_year`, `is_active`, `created_by`, `created_at`, `updated_at`) VALUES
(22, 'jnkjbjb', '550', 11, 19, 11, 2, 2023, 1, 1, '2023-02-11 00:42:09', '2023-02-11 00:42:09'),
(23, 'kjnjn', '600', 11, 20, 11, 2, 2023, 1, 1, '2023-02-11 00:42:57', '2023-02-11 00:43:07'),
(25, 'knjkn', '66', 13, 19, 11, 2, 2023, 1, 13, '2023-02-11 00:49:57', '2023-02-11 00:49:57');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `firstname` varchar(200) DEFAULT NULL,
  `lastname` varchar(200) DEFAULT NULL,
  `username` varchar(255) DEFAULT NULL,
  `image` text DEFAULT NULL,
  `email` varchar(200) DEFAULT NULL,
  `password` varchar(200) DEFAULT NULL,
  `is_role` tinyint(1) DEFAULT NULL,
  `is_status` int(11) DEFAULT NULL,
  `is_active` tinyint(1) DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `firstname`, `lastname`, `username`, `image`, `email`, `password`, `is_role`, `is_status`, `is_active`, `created_at`, `updated_at`) VALUES
(1, 'Admin', 'Admin', 'admin', 'avatars/avatar1676058357c0377398bd35e080dc8213bda71f1ac5.jpg', 'admin@gmail.com', 'aa5f9f65b56c061344c609e01f3f021e', 0, 1, 1, '2022-11-24 23:46:21', '2023-02-11 02:19:48'),
(13, 'Nimra', 'Rahat', 'nimra', 'avatars/avatar1676062208c0377398bd35e080dc8213bda71f1ac5.jpg', 'nimra@gmail.com', 'aa5f9f65b56c061344c609e01f3f021e', 1, 1, 1, '2023-02-11 00:44:53', '2023-02-11 01:52:32'),
(15, 'Aimen', 'Rajpoot', 'aimen', 'avatars/avatar1676064437eafc2d8d69121aa7e12f6a7344edd4de.jpg', 'aimen@gmail.com', '900150983cd24fb0d6963f7d28e17f72', 1, 1, 1, '2023-02-11 02:21:47', '2023-02-11 02:29:37'),
(18, 'test', 'test', 'test1', 'avatar.png', 'test1@gmail.com', '900150983cd24fb0d6963f7d28e17f72', 1, 1, 1, '2023-02-11 02:45:52', '2023-02-11 02:47:14');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `budgets`
--
ALTER TABLE `budgets`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `expenses`
--
ALTER TABLE `expenses`
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
-- AUTO_INCREMENT for table `budgets`
--
ALTER TABLE `budgets`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;

--
-- AUTO_INCREMENT for table `expenses`
--
ALTER TABLE `expenses`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
