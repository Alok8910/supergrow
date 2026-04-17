-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 17, 2026 at 02:48 PM
-- Server version: 10.4.27-MariaDB
-- PHP Version: 7.4.33

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `mess_management`
--

-- --------------------------------------------------------

--
-- Table structure for table `meal_intents`
--

CREATE TABLE `meal_intents` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `meal_date` date NOT NULL,
  `meal_type` varchar(20) NOT NULL,
  `choice` enum('default','skip') DEFAULT 'default',
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `meal_intents`
--

INSERT INTO `meal_intents` (`id`, `user_id`, `meal_date`, `meal_type`, `choice`, `created_at`) VALUES
(17, 1, '2026-04-17', 'Lunch', 'skip', '2026-04-17 11:39:57'),
(18, 1, '2026-04-17', 'Dinner', 'default', '2026-04-17 11:39:57');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `meal_intents`
--
ALTER TABLE `meal_intents`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `unique_meal` (`user_id`,`meal_date`,`meal_type`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `meal_intents`
--
ALTER TABLE `meal_intents`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
