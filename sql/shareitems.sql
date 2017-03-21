-- phpMyAdmin SQL Dump
-- version 4.6.4
-- https://www.phpmyadmin.net/
--
-- Gép: 127.0.0.1
-- Létrehozás ideje: 2017. Jan 26. 22:27
-- Kiszolgáló verziója: 5.7.14
-- PHP verzió: 5.6.25

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Adatbázis: `shareitems`
--

-- --------------------------------------------------------

--
-- Tábla szerkezet ehhez a táblához `activitylist`
--

CREATE TABLE `activitylist` (
  `id` int(11) NOT NULL,
  `userid` int(11) NOT NULL,
  `list` varchar(255) CHARACTER SET utf8 COLLATE utf8_hungarian_ci NOT NULL,
  `sharedate` date NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- A tábla adatainak kiíratása `activitylist`
--

INSERT INTO `activitylist` (`id`, `userid`, `list`, `sharedate`) VALUES
(1, 25, '32', '2017-01-18'),
(2, 25, '<ul><li>32</ul></li>', '2017-01-18'),
(3, 25, '<ul><li>432</ul></li>', '2017-01-18'),
(4, 25, 'edzés,gitározás,fogorvos,gördeszkázás', '2017-01-18'),
(5, 25, 'edzés,gitározás,fogorvos,gördeszkázás', '2017-01-18'),
(6, 25, 'fewfw', '2017-01-24'),
(7, 25, 'fewfw', '2017-01-24'),
(8, 25, 'fewfw', '2017-01-24');

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

--
-- Indexek a kiírt táblákhoz
--

--
-- A tábla indexei `activitylist`
--
ALTER TABLE `activitylist`
  ADD PRIMARY KEY (`id`);

--
-- A tábla indexei `notes`
--
ALTER TABLE `notes`
  ADD PRIMARY KEY (`id`);

--
-- A kiírt táblák AUTO_INCREMENT értéke
--

--
-- AUTO_INCREMENT a táblához `activitylist`
--
ALTER TABLE `activitylist`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
--
-- AUTO_INCREMENT a táblához `notes`
--
ALTER TABLE `notes`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=51;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
