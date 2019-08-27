-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Хост: 127.0.0.1:3306
-- Время создания: Авг 27 2019 г., 11:27
-- Версия сервера: 8.0.12
-- Версия PHP: 7.2.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- База данных: `skalfa`
--

-- --------------------------------------------------------

--
-- Структура таблицы `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `login` varchar(25) NOT NULL,
  `password` varchar(64) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `email` varchar(64) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `img` varchar(128) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `country` varchar(64) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `user`
--

INSERT INTO `user` (`id`, `login`, `password`, `email`, `img`, `country`) VALUES
(118, 'test01', 'e10adc3949ba59abbe56e057f20f883e', 'test01@gmail.com', 'public/images/ava/20190827111235Chrysanthemum.jpg', 'Австралия'),
(119, 'test02', 'e10adc3949ba59abbe56e057f20f883e', 'test02@gmail.com', 'public/images/ava/20190827111246Desert.jpg', 'Австрия'),
(120, 'test03', 'e10adc3949ba59abbe56e057f20f883e', 'test03@gmail.com', 'public/images/ava/20190827111258Hydrangeas.jpg', 'Азербайджан'),
(121, 'test04', 'e10adc3949ba59abbe56e057f20f883e', 'test04@gmail.com', 'public/images/ava/20190827111309Jellyfish.jpg', 'Аландские о-ва'),
(122, 'test05', 'e10adc3949ba59abbe56e057f20f883e', 'test05@gmail.com', 'public/images/ava/20190827111320Koala.jpg', 'Албания'),
(123, 'test06', 'e10adc3949ba59abbe56e057f20f883e', 'test06@gmail.com', 'public/images/ava/20190827111332Lighthouse.jpg', 'Алжир'),
(124, 'test07', 'e10adc3949ba59abbe56e057f20f883e', 'test07@gmail.com', 'public/images/ava/20190827111342Penguins.jpg', 'Американское Самоа'),
(125, 'test08', 'e10adc3949ba59abbe56e057f20f883e', 'test08@gmail.com', 'public/images/ava/20190827111355Tulips.jpg', 'Ангилья'),
(126, 'test09', 'e10adc3949ba59abbe56e057f20f883e', 'test09@gmail.com', 'public/images/ava/20190827111411Chrysanthemum.jpg', 'Ангола'),
(127, 'test10', 'e10adc3949ba59abbe56e057f20f883e', 'test10@gmail.com', 'public/images/ava/20190827111425Desert.jpg', 'Андорра'),
(128, 'test11', 'e10adc3949ba59abbe56e057f20f883e', 'test11@gmail.com', 'public/images/ava/20190827111437Hydrangeas.jpg', 'Антарктида'),
(129, 'test12', 'e10adc3949ba59abbe56e057f20f883e', 'test12@gmail.com', 'public/images/ava/20190827111447Jellyfish.jpg', 'Антигуа и Барбуда'),
(130, 'test13', 'e10adc3949ba59abbe56e057f20f883e', 'test13@gmail.com', 'public/images/ava/20190827111500Koala.jpg', 'Аргентина'),
(131, 'test14', 'e10adc3949ba59abbe56e057f20f883e', 'test14@gmail.com', 'public/images/ava/20190827111510Lighthouse.jpg', 'Армения'),
(132, 'test15', 'e10adc3949ba59abbe56e057f20f883e', 'test15@gmail.com', 'public/images/ava/20190827111520Penguins.jpg', 'Аруба'),
(133, 'test16', 'e10adc3949ba59abbe56e057f20f883e', 'test16@gmail.com', 'public/images/ava/20190827111532Tulips.jpg', 'Афганистан'),
(134, 'test17', 'fcb1a7bbe091b4ee78748946cb762a84', 'test17@gmail.com', 'public/images/ava/20190827111601Chrysanthemum.jpg', 'Багамы'),
(135, 'test18', 'e10adc3949ba59abbe56e057f20f883e', 'test18@gmail.com', 'public/images/ava/20190827111726firewatch-night-widescreen-wallpaper-59155-60939-hd-wallpapers.jpg', 'Ангола'),
(136, 'test19', 'e10adc3949ba59abbe56e057f20f883e', 'test19@gmail.com', 'public/images/ava/20190827112703H6oHRYa__ws.jpg', 'Ливия');

--
-- Индексы сохранённых таблиц
--

--
-- Индексы таблицы `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `u-login` (`login`) USING BTREE,
  ADD UNIQUE KEY `u-email` (`email`);

--
-- AUTO_INCREMENT для сохранённых таблиц
--

--
-- AUTO_INCREMENT для таблицы `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=137;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
