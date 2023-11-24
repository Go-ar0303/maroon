-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Хост: 127.0.0.1:3306
-- Время создания: Ноя 14 2023 г., 13:14
-- Версия сервера: 8.0.30
-- Версия PHP: 7.2.34

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- База данных: `MAROON`
--

-- --------------------------------------------------------

--
-- Структура таблицы `users`
--

CREATE TABLE `users` (
  `id` int UNSIGNED NOT NULL,
  `firstname` varchar(191) COLLATE utf8mb4_unicode_520_ci DEFAULT NULL,
  `lastname` varchar(191) COLLATE utf8mb4_unicode_520_ci DEFAULT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_520_ci DEFAULT NULL,
  `password` varchar(191) COLLATE utf8mb4_unicode_520_ci DEFAULT NULL,
  `admin` varchar(191) COLLATE utf8mb4_unicode_520_ci DEFAULT NULL,
  `avatar` varchar(191) COLLATE utf8mb4_unicode_520_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_520_ci;

--
-- Дамп данных таблицы `users`
--

INSERT INTO `users` (`id`, `firstname`, `lastname`, `email`, `password`, `admin`, `avatar`) VALUES
(1, 'dia', 'dia', 'dia@fhks.ru', '$2y$10$dFY2ngsMmMkktDHZNA4wDubCE/3XIZHy1.P2C9k3W7/3KXJV7k6Cm', NULL, NULL),
(2, 'nick', 'nick', 'nick@hjg.ru', '$2y$10$AE9A.nLK3IhS5IGXAA5oLOfjYTBKBjJHoU8ffyYnHS9HKPiqTk/fy', NULL, NULL),
(3, 'kira', 'kira', 'kira@gh.yt', '$2y$10$F1M0R1R3xnFVdS6CFs3Z1uQy1rIbV86qDFa2BEkEf7OSccyC6ukpS', 'on', 'noavatar.png'),
(4, 'liya', 'liya', 'liya14@mail.ru', '$2y$10$YL5Y4gJ608ssFOnWYqAUXeIWPHgy7YxyG/sP950.BKk5zacIXeoEC', 'on', 'noavatar.png'),
(5, 'Aria', 'Aria', 'aria@jk.ru', '$2y$10$dqeFpcL8Fr0yAwc7cUe75eh0cGNKGmklLFBXyhFBGGS9vedfVwl3m', 'on', 'noavatar.png');

--
-- Индексы сохранённых таблиц
--

--
-- Индексы таблицы `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT для сохранённых таблиц
--

--
-- AUTO_INCREMENT для таблицы `users`
--
ALTER TABLE `users`
  MODIFY `id` int UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
