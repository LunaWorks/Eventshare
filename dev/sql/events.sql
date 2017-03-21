-- phpMyAdmin SQL Dump
-- version 4.6.4
-- https://www.phpmyadmin.net/
--
-- Gép: 127.0.0.1
-- Létrehozás ideje: 2017. Már 01. 22:49
-- Kiszolgáló verziója: 5.7.14
-- PHP verzió: 5.6.25

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Adatbázis: `events`
--

-- --------------------------------------------------------

--
-- Tábla szerkezet ehhez a táblához `events`
--

CREATE TABLE `events` (
  `id` int(11) NOT NULL,
  `title` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `date` date NOT NULL,
  `created` datetime NOT NULL,
  `modified` datetime NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT '1' COMMENT '1=Active, 0=Block'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- A tábla adatainak kiíratása `events`
--

INSERT INTO `events` (`id`, `title`, `date`, `created`, `modified`, `status`) VALUES
(1, 'Internet of Things World Forum', '2015-11-12', '2015-11-09 06:15:17', '2015-11-09 06:15:17', 1),
(2, 'The Future of Money and Technology Summit', '2015-11-26', '2015-11-09 06:15:17', '2015-11-09 06:15:17', 1),
(3, 'Chrome Dev Summit', '2015-11-26', '2015-11-09 06:15:17', '2015-11-09 06:15:17', 1),
(4, 'The Lean Startup Conference', '2015-11-17', '2015-11-09 06:15:17', '2015-11-09 06:15:17', 1),
(5, 'Web Submit for Developers', '2015-11-17', '2015-11-09 06:15:17', '2015-11-09 06:15:17', 1);

-- --------------------------------------------------------

--
-- Tábla szerkezet ehhez a táblához `tasks`
--

CREATE TABLE `tasks` (
  `id` int(11) NOT NULL,
  `task` text NOT NULL,
  `date` date NOT NULL,
  `time` time NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- A tábla adatainak kiíratása `tasks`
--

INSERT INTO `tasks` (`id`, `task`, `date`, `time`) VALUES
(2, 'Build to-do list app', '2014-10-23', '04:02:31'),
(3, 'Add to-do items', '2014-10-28', '16:21:12'),
(201, 'ewq', '2017-02-26', '16:20:16'),
(202, 'ewq', '2017-02-26', '16:21:11'),
(203, '', '2017-02-26', '16:21:13'),
(204, '', '2017-02-26', '16:21:19'),
(205, '', '2017-02-26', '16:21:21'),
(206, 'dsa', '2017-02-26', '16:21:23'),
(207, 'fe', '2017-02-26', '16:21:24'),
(208, 'fe', '2017-02-26', '16:21:42'),
(209, 'fe', '2017-02-26', '16:21:49'),
(210, 'fe', '2017-02-26', '16:21:52'),
(211, 'fe', '2017-02-26', '16:22:14'),
(212, 'tr', '2017-02-27', '18:26:13'),
(213, 'tr', '2017-02-27', '18:26:16'),
(214, '45', '2017-02-27', '18:26:18');

--
-- Indexek a kiírt táblákhoz
--

--
-- A tábla indexei `events`
--
ALTER TABLE `events`
  ADD PRIMARY KEY (`id`);

--
-- A tábla indexei `tasks`
--
ALTER TABLE `tasks`
  ADD PRIMARY KEY (`id`);

--
-- A kiírt táblák AUTO_INCREMENT értéke
--

--
-- AUTO_INCREMENT a táblához `events`
--
ALTER TABLE `events`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT a táblához `tasks`
--
ALTER TABLE `tasks`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=215;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
