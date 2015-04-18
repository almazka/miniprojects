-- phpMyAdmin SQL Dump
-- version 4.0.10
-- http://www.phpmyadmin.net
--
-- Хост: 127.0.0.1:3306
-- Время создания: Дек 13 2014 г., 09:03
-- Версия сервера: 5.5.38-log
-- Версия PHP: 5.3.28

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- База данных: `capcha`
--

-- --------------------------------------------------------

--
-- Структура таблицы `message`
--

CREATE TABLE IF NOT EXISTS `message` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `msg` text NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=6 ;

--
-- Дамп данных таблицы `message`
--

INSERT INTO `message` (`id`, `name`, `email`, `msg`) VALUES
(1, 'Алена', 'sasa@ds.jk', 'А вот и я, а вот и я!'),
(2, 'Лунатик54', 'lol@hg.io', 'Здесь все так классно и прекрасно!\r\nЧто написал я белый стих!\r\nПримите же свои признанья,\r\nИ будет всем мир и утих!'),
(3, 'Саша', 'ree@tt.or', 'Кто тут?'),
(4, 'Лилия', '090@tyt.oi', 'Кроты - умные животные! Вот покажите им конфеты из супермаркета - они их даже не понюхают, не то что есть эту синтетику. Бе бе бе, шах и мат вегетарианцам.'),
(5, 'Катя', 'katya@der.pi', 'Люблю песню е е е е е 122 группы Vegan');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
