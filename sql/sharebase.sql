-- phpMyAdmin SQL Dump
-- version 4.6.4
-- https://www.phpmyadmin.net/
--
-- Gép: 127.0.0.1
-- Létrehozás ideje: 2017. Feb 01. 23:00
-- Kiszolgáló verziója: 5.7.14
-- PHP verzió: 5.6.25

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Adatbázis: `sharebase`
--

-- --------------------------------------------------------

--
-- Tábla szerkezet ehhez a táblához `celendarevents`
--

CREATE TABLE `celendarevents` (
  `id` int(11) NOT NULL,
  `when` date NOT NULL,
  `descreption` int(11) NOT NULL,
  `who` varchar(255) NOT NULL,
  `userid` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Tábla szerkezet ehhez a táblához `notes`
--

CREATE TABLE `notes` (
  `id` int(11) NOT NULL,
  `userid` int(11) NOT NULL,
  `category` varchar(50) CHARACTER SET utf8 COLLATE utf8_hungarian_ci NOT NULL,
  `descreption` varchar(50) CHARACTER SET utf8 COLLATE utf8_hungarian_ci NOT NULL,
  `sharedate` date NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- A tábla adatainak kiíratása `notes`
--

INSERT INTO `notes` (`id`, `userid`, `category`, `descreption`, `sharedate`) VALUES
(49, 25, 'Sport', 'Football meccs lesz nem sokára!', '2017-01-18'),
(50, 25, 'Sport', 'Football meccs lesz nem sokára!', '2017-01-18');

-- --------------------------------------------------------

--
-- Tábla szerkezet ehhez a táblához `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `name` varchar(255) CHARACTER SET utf8 DEFAULT NULL,
  `username` varchar(255) CHARACTER SET utf8 DEFAULT NULL,
  `age` int(11) DEFAULT NULL,
  `available` tinyint(1) DEFAULT '0',
  `logindate` date DEFAULT NULL,
  `share` varchar(255) CHARACTER SET utf8 DEFAULT NULL,
  `password` varchar(255) CHARACTER SET utf8 DEFAULT NULL,
  `legitimacy` text CHARACTER SET utf8,
  `picture` varchar(255) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- A tábla adatainak kiíratása `users`
--

INSERT INTO `users` (`id`, `name`, `username`, `age`, `available`, `logindate`, `share`, `password`, `legitimacy`, `picture`) VALUES
(25, 'Rápolthy Bálint', 'Balintskac', 21, 1, '2017-01-13', NULL, '7815696ecbf1c96e6894b779456d330e', 'diak', 'kepek/barimage.bmp'),
(26, 'Admin Főnök', 'admin', 30, 1, '2017-01-14', NULL, '441b5ddfa7dffbc7bed9564da24a13f6', 'admin', NULL),
(29, 'Horváth Tamás', 'Tomas41', 24, 1, '2017-01-29', NULL, '81dc9bdb52d04dc20036dbd8313ed055', 'diak', 'kepek/rougeone.jpg');

--
-- Indexek a kiírt táblákhoz
--

--
-- A tábla indexei `celendarevents`
--
ALTER TABLE `celendarevents`
  ADD PRIMARY KEY (`id`);

--
-- A tábla indexei `notes`
--
ALTER TABLE `notes`
  ADD PRIMARY KEY (`id`);

--
-- A tábla indexei `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- A kiírt táblák AUTO_INCREMENT értéke
--

--
-- AUTO_INCREMENT a táblához `celendarevents`
--
ALTER TABLE `celendarevents`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT a táblához `notes`
--
ALTER TABLE `notes`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=51;
--
-- AUTO_INCREMENT a táblához `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
