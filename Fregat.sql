-- phpMyAdmin SQL Dump
-- version 4.6.5.2
-- https://www.phpmyadmin.net/
--
-- Хост: 127.0.0.1:3306
-- Время создания: Авг 14 2019 г., 16:09
-- Версия сервера: 5.5.53-log
-- Версия PHP: 7.1.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- База данных: `Fregat`
--

-- --------------------------------------------------------

--
-- Структура таблицы `Courier`
--

CREATE TABLE `Courier` (
  `id` int(10) NOT NULL,
  `name` varchar(255) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `Courier`
--

INSERT INTO `Courier` (`id`, `name`) VALUES
(1, 'Попков Сергей Николаевич'),
(2, 'Антон Чусов'),
(3, 'Егор Летов'),
(4, 'Саша Черных'),
(5, 'Андрей Сергеев'),
(6, 'Энтуан Пивоваров'),
(7, 'Гандариана Лесупояровских');

-- --------------------------------------------------------

--
-- Структура таблицы `Region`
--

CREATE TABLE `Region` (
  `id` int(10) NOT NULL,
  `name` varchar(255) NOT NULL,
  `travel_time` int(10) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `Region`
--

INSERT INTO `Region` (`id`, `name`, `travel_time`) VALUES
(1, 'Санкт-Петербург', 1),
(2, 'Уфа', 2),
(3, 'Нижний Новгород', 3),
(4, 'Владимир', 4),
(5, 'Кострома', 5),
(6, 'Екатеринбург', 6),
(7, 'Ковров', 7),
(8, 'Воронеж', 8),
(9, 'Самара', 9),
(10, 'Астрахань', 10);

-- --------------------------------------------------------

--
-- Структура таблицы `Travel`
--

CREATE TABLE `Travel` (
  `id` int(10) NOT NULL,
  `region_id` int(10) NOT NULL,
  `departure` date NOT NULL,
  `courier_id` int(10) NOT NULL,
  `arrive` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `Travel`
--

INSERT INTO `Travel` (`id`, `region_id`, `departure`, `courier_id`, `arrive`) VALUES
(1, 1, '2019-08-15', 1, '2019-08-16'),
(2, 2, '2019-08-01', 2, '2019-08-03'),
(3, 3, '2019-08-16', 3, '2019-08-19'),
(4, 4, '2019-08-19', 4, '2019-08-23'),
(5, 5, '2019-08-04', 5, '2019-08-09'),
(6, 6, '2019-08-03', 6, '2019-08-09'),
(7, 7, '2019-08-23', 7, '2019-08-30');

--
-- Индексы сохранённых таблиц
--

--
-- Индексы таблицы `Courier`
--
ALTER TABLE `Courier`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `Region`
--
ALTER TABLE `Region`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `Travel`
--
ALTER TABLE `Travel`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `courier_id` (`courier_id`);

--
-- AUTO_INCREMENT для сохранённых таблиц
--

--
-- AUTO_INCREMENT для таблицы `Courier`
--
ALTER TABLE `Courier`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT для таблицы `Region`
--
ALTER TABLE `Region`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
--
-- AUTO_INCREMENT для таблицы `Travel`
--
ALTER TABLE `Travel`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
