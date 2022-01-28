-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Host: mysql
-- Generation Time: Jan 28, 2022 at 02:48 PM
-- Server version: 5.7.29
-- PHP Version: 8.0.14

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `t`
--

-- --------------------------------------------------------

--
-- Table structure for table `attaches`
--

CREATE TABLE `attaches` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `num` int(11) NOT NULL,
  `price` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `attaches`
--

INSERT INTO `attaches` (`id`, `user_id`, `product_id`, `num`, `price`) VALUES
(1, 5, 2, 1, 2),
(3, 2, 2, 33, 34),
(4, 5, 8, 3, 4);

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `id` int(11) NOT NULL,
  `title` varchar(200) NOT NULL,
  `description` text,
  `image` varchar(200) DEFAULT NULL,
  `status` tinyint(4) NOT NULL,
  `timestamps` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `title`, `description`, `image`, `status`, `timestamps`) VALUES
(2, 'ffff', ' tset', '11', 1, 1111111),
(8, 'sdf', '', '', 0, 1643370302);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `username` varchar(200) NOT NULL COMMENT 'username',
  `email` varchar(200) NOT NULL COMMENT 'user email',
  `password` varchar(32) NOT NULL,
  `role` tinyint(4) NOT NULL DEFAULT '0' COMMENT '0 member  1 admin',
  `email_verified` tinyint(4) NOT NULL DEFAULT '0' COMMENT '0 has not verified\r\n1 verified',
  `captcha` varchar(36) DEFAULT NULL COMMENT 'captcha code for email verify',
  `activie_time` int(11) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `email`, `password`, `role`, `email_verified`, `captcha`, `activie_time`) VALUES
(1, 'coder5@qq.com', 'coder5@qq.com', '1', 0, 1, NULL, 0),
(2, 'akash', 'dfs@fe.net', 'dfs@fe.net', 0, 0, NULL, 0),
(3, 'abcdef', 'abcdef@qq.com', '$2y$10$.f1ZO3CpXWqJfFkXJHevA.7hZ', 0, 0, NULL, 0),
(4, '111111', '111@qq.com', '$2y$10$emUtW3brDFg2O27IvAcxyeSqC', 0, 0, NULL, 0),
(5, '222222', '222@qq.com', 'e3ceb5881a0a1fdaad01296d7554868d', 1, 0, NULL, 1643381171),
(6, '333222', '333@qq.com', 'e24094c9b1f439e3d6dcf90064f7402b', 0, 0, '41567d4d13abf16c3279f6842bfbf6f4', 1643373634),
(9, '444@qq.com', '444@qq.com', '97a61118f0ef254c9e1ad265f9b3f430', 0, 0, '8e7be5417695b56feb3d81d2e0e3a094', 0),
(12, '555@qq.com', '555@qq.com', 'd6c0d437566ce16eccc6b647adf0a2d0', 0, 1, '35f299e3144a2d80116712b72304fb28', 0),
(14, '666@qq.com', '666@qq.com', 'cdf2628d43f941c34796949e0857e3a5', 0, 1, '', 0),
(15, '777@qq.com', '777@qq.com', 'ccc3098f5e8ad53ecbfd9e433f4552e6', 0, 1, '', 0);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `attaches`
--
ALTER TABLE `attaches`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD KEY `email` (`email`),
  ADD KEY `activie_time` (`activie_time`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `attaches`
--
ALTER TABLE `attaches`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
