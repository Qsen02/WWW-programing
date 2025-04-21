-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Хост: 127.0.0.1
-- Време на генериране: 21 апр 2025 в 11:07
-- Версия на сървъра: 10.4.32-MariaDB
-- Версия на PHP: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- База данни: `cars-crossed`
--

-- --------------------------------------------------------

--
-- Структура на таблица `automobile`
--

CREATE TABLE `automobile` (
  `id` int(11) NOT NULL,
  `number` varchar(8) NOT NULL,
  `type` enum('лек','товарен','автобус') NOT NULL,
  `trailer` tinyint(1) NOT NULL,
  `passengers` int(11) NOT NULL,
  `driver_name` varchar(40) NOT NULL,
  `month` int(12) NOT NULL,
  `driver_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf32 COLLATE=utf32_bin;

--
-- Схема на данните от таблица `automobile`
--

INSERT INTO `automobile` (`id`, `number`, `type`, `trailer`, `passengers`, `driver_name`, `month`, `driver_id`) VALUES
(1, 'A2315BA', 'лек', 0, 3, 'Иван Иванов', 7, 1),
(2, 'PB1234S', 'автобус', 0, 10, 'Димитър Димитров', 3, 2),
(5, 'CB7432CB', 'товарен', 1, 1, 'Георги Георгиев', 10, 4),
(19, 'EH4833A', 'лек', 0, 3, 'Калоян Радостинов', 9, 19);

-- --------------------------------------------------------

--
-- Структура на таблица `drivers`
--

CREATE TABLE `drivers` (
  `id` int(11) NOT NULL,
  `firstname` varchar(20) NOT NULL,
  `lastname` varchar(20) NOT NULL,
  `city` varchar(20) NOT NULL,
  `country` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf32 COLLATE=utf32_bin;

--
-- Схема на данните от таблица `drivers`
--

INSERT INTO `drivers` (`id`, `firstname`, `lastname`, `city`, `country`) VALUES
(1, 'Иван', 'Иванов', 'Бургас', 'България'),
(2, 'Димитър', 'Димитров', 'Пловдив', 'България'),
(4, 'Георги', 'Георгиев', 'София', 'България'),
(19, 'Калоян', 'Радостинов', 'Плевен', 'България');

-- --------------------------------------------------------

--
-- Структура на таблица `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `firstname` varchar(30) NOT NULL,
  `lastname` varchar(30) NOT NULL,
  `email` varchar(30) NOT NULL,
  `password` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Схема на данните от таблица `users`
--

INSERT INTO `users` (`id`, `firstname`, `lastname`, `email`, `password`) VALUES
(9, 'Иванчо', 'Иванов', 'ivancho@gmail.com', '$2y$10$ldhLfd9siCylMOV1xaQQEu9d14EOQ/JQQ8ZiijYYJTA625F.Ni1TC'),
(10, 'Ясен', 'Генчев', 'qsen@gmail.com', '$2y$10$xW4CxqKY0ESrZLhj9Wk0Eu1s/ab/VN2Heha/d0DI30bj7owdda.rC'),
(13, 'Иванчо', 'Пенчев', 'ivancho@gmail.com', '$2y$10$YW87pnzmuzhMtzA7FHl25.w1yGDD19s6XVRdW43.8.303NKmgCSlO');

--
-- Indexes for dumped tables
--

--
-- Индекси за таблица `automobile`
--
ALTER TABLE `automobile`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `driver_id` (`driver_id`);

--
-- Индекси за таблица `drivers`
--
ALTER TABLE `drivers`
  ADD PRIMARY KEY (`id`);

--
-- Индекси за таблица `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `automobile`
--
ALTER TABLE `automobile`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT for table `drivers`
--
ALTER TABLE `drivers`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- Ограничения за дъмпнати таблици
--

--
-- Ограничения за таблица `automobile`
--
ALTER TABLE `automobile`
  ADD CONSTRAINT `automobile_ibfk_1` FOREIGN KEY (`driver_id`) REFERENCES `drivers` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
