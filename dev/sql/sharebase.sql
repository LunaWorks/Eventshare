-- phpMyAdmin SQL Dump
-- version 4.6.4
-- https://www.phpmyadmin.net/
--
-- Gép: 127.0.0.1
-- Létrehozás ideje: 2017. Már 19. 21:47
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
-- Tábla szerkezet ehhez a táblához `adminlog`
--

CREATE TABLE `adminlog` (
  `id` int(11) NOT NULL,
  `userid` int(11) NOT NULL,
  `descreption` varchar(255) NOT NULL,
  `whendate` date DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- A tábla adatainak kiíratása `adminlog`
--

INSERT INTO `adminlog` (`id`, `userid`, `descreption`, `whendate`) VALUES
(1, 25, 'Új Eseményt hozott létre', NULL),
(2, 25, 'Új bejegyzést tett', NULL),
(3, 33, 'Új bejegyzést tett', NULL),
(4, 33, 'Új bejegyzést tett', NULL),
(5, 25, 'Új Eseményt hozott létre', NULL),
(6, 25, 'Új Eseményt hozott létre', NULL),
(7, 25, 'Új Eseményt hozott létre', NULL),
(8, 25, 'Új Eseményt hozott létre', NULL),
(11, 25, 'Kijelentkezett', '2017-03-13'),
(14, 33, 'Bejelentkezett', '2017-03-13'),
(13, 25, 'Bejelentkezett', '2017-03-13'),
(15, 33, 'Kijelentkezett', '2017-03-13'),
(16, 25, 'Kijelentkezett', '2017-03-13'),
(17, 25, 'Bejelentkezett', '2017-03-14'),
(18, 42, 'Bejelentkezett', '2017-03-14'),
(19, 25, 'Kijelentkezett', '2017-03-14'),
(20, 42, 'Kijelentkezett', '2017-03-15'),
(21, 25, 'Bejelentkezett', '2017-03-15'),
(22, 25, 'Kijelentkezett', '2017-03-15'),
(23, 25, 'Bejelentkezett', '2017-03-15'),
(24, 25, 'Új bejegyzést tett', NULL),
(25, 25, 'Új bejegyzést tett', NULL),
(26, 25, 'Kijelentkezett', '2017-03-15'),
(27, 25, 'Bejelentkezett', '2017-03-15'),
(28, 25, 'Kijelentkezett', '2017-03-15'),
(29, 25, 'Bejelentkezett', '2017-03-15'),
(30, 25, 'Kijelentkezett', '2017-03-15'),
(31, 25, 'Bejelentkezett', '2017-03-15'),
(32, 25, 'Kijelentkezett', '2017-03-15'),
(33, 25, 'Bejelentkezett', '2017-03-15'),
(34, 33, 'Bejelentkezett', '2017-03-15'),
(35, 33, 'Kijelentkezett', '2017-03-15'),
(36, 42, 'Bejelentkezett', '2017-03-15'),
(37, 25, 'Kijelentkezett', '2017-03-15'),
(38, 33, 'Bejelentkezett', '2017-03-15'),
(39, 42, 'Kijelentkezett', '2017-03-15'),
(40, 25, 'Bejelentkezett', '2017-03-15'),
(41, 33, 'Kijelentkezett', '2017-03-15'),
(42, 45, 'Bejelentkezett', '2017-03-15'),
(43, 45, 'Kijelentkezett', '2017-03-15'),
(44, 25, 'Bejelentkezett', '2017-03-16'),
(45, 25, 'Kijelentkezett', '2017-03-16'),
(46, 25, 'Bejelentkezett', '2017-03-17'),
(47, 25, 'Új bejegyzést tett', NULL),
(48, 25, 'Új bejegyzést tett', NULL),
(49, 25, 'Új bejegyzést tett', NULL),
(50, 25, 'Új bejegyzést tett', NULL),
(51, 25, 'Új bejegyzést tett', NULL),
(52, 25, 'Új bejegyzést tett', NULL),
(53, 25, 'Új bejegyzést tett', NULL),
(54, 25, 'Új bejegyzést tett', NULL),
(55, 25, 'Új bejegyzést tett', NULL),
(56, 25, 'Új bejegyzést tett', NULL),
(57, 25, 'Kijelentkezett', '2017-03-17'),
(58, 25, 'Bejelentkezett', '2017-03-17'),
(59, 33, 'Bejelentkezett', '2017-03-17'),
(60, 33, 'Kijelentkezett', '2017-03-17'),
(61, 25, 'Kijelentkezett', '2017-03-17'),
(62, 25, 'Bejelentkezett', '2017-03-18'),
(63, 25, 'Kijelentkezett', '2017-03-18'),
(64, 26, 'Új Eseményt hozott létre', NULL),
(65, 25, 'Bejelentkezett', '2017-03-18'),
(66, 25, 'Kijelentkezett', '2017-03-18'),
(67, 25, 'Bejelentkezett', '2017-03-18'),
(68, 25, 'Kijelentkezett', '2017-03-18'),
(69, 25, 'Bejelentkezett', '2017-03-18'),
(70, 25, 'Új bejegyzést tett', NULL),
(71, 25, 'Új bejegyzést tett', NULL),
(72, 25, 'Új bejegyzést tett', NULL),
(73, 25, 'Új bejegyzést tett', NULL),
(74, 25, 'Új bejegyzést tett', NULL),
(75, 25, 'Új bejegyzést tett', NULL),
(76, 25, 'Új bejegyzést tett', NULL),
(77, 25, 'Új bejegyzést tett', NULL),
(78, 25, 'Új bejegyzést tett', NULL),
(79, 25, 'Új bejegyzést tett', NULL),
(80, 25, 'Új bejegyzést tett', NULL),
(81, 25, 'Új bejegyzést tett', NULL),
(82, 25, 'Új bejegyzést tett', NULL),
(83, 25, 'Új bejegyzést tett', NULL),
(84, 25, 'Új bejegyzést tett', NULL),
(85, 25, 'Új bejegyzést tett', NULL),
(86, 25, 'Új bejegyzést tett', NULL),
(87, 25, 'Új bejegyzést tett', NULL),
(88, 25, 'Új bejegyzést tett', NULL),
(89, 25, 'Új bejegyzést tett', NULL),
(90, 25, 'Új bejegyzést tett', NULL),
(91, 25, 'Új bejegyzést tett', NULL),
(92, 25, 'Kijelentkezett', '2017-03-18'),
(93, 25, 'Bejelentkezett', '2017-03-19'),
(94, 25, 'Új bejegyzést tett', NULL),
(95, 25, 'Kijelentkezett', '2017-03-19'),
(96, 25, 'Bejelentkezett', '2017-03-19'),
(97, 25, 'Kijelentkezett', '2017-03-19'),
(98, 25, 'Bejelentkezett', '2017-03-19'),
(99, 25, 'Kijelentkezett', '2017-03-19'),
(100, 25, 'Bejelentkezett', '2017-03-19'),
(101, 25, 'Kijelentkezett', '2017-03-19');

-- --------------------------------------------------------

--
-- Tábla szerkezet ehhez a táblához `celendarevents`
--

CREATE TABLE `celendarevents` (
  `id` int(11) NOT NULL,
  `userid` int(11) NOT NULL,
  `who` varchar(255) NOT NULL DEFAULT 'Nincs partner',
  `descreption` varchar(255) NOT NULL,
  `place` varchar(255) CHARACTER SET utf8 COLLATE utf8_hungarian_ci NOT NULL,
  `startingtime` date NOT NULL,
  `endingtime` date NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- A tábla adatainak kiíratása `celendarevents`
--

INSERT INTO `celendarevents` (`id`, `userid`, `who`, `descreption`, `place`, `startingtime`, `endingtime`) VALUES
(8, 25, '', '21', '21', '2017-03-08', '2017-03-05'),
(9, 25, 'P', '234', '4234', '2017-03-11', '2017-03-04');

-- --------------------------------------------------------

--
-- Tábla szerkezet ehhez a táblához `contact`
--

CREATE TABLE `contact` (
  `id` int(11) NOT NULL,
  `adminid` int(11) NOT NULL,
  `who` varchar(255) CHARACTER SET utf8 COLLATE utf8_hungarian_ci NOT NULL,
  `letter` varchar(255) CHARACTER SET utf8 COLLATE utf8_hungarian_ci NOT NULL,
  `email` varchar(255) CHARACTER SET utf8 COLLATE utf8_hungarian_ci NOT NULL,
  `date` date NOT NULL,
  `subject` varchar(255) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- A tábla adatainak kiíratása `contact`
--

INSERT INTO `contact` (`id`, `adminid`, `who`, `letter`, `email`, `date`, `subject`) VALUES
(1, 26, '312', '2312312', '311313', '2017-03-05', '321@gmail.com'),
(2, 26, '312', '2312312', '311313', '2017-03-05', '321@gmail.com'),
(3, 26, '12312', '3123213', '312312', '2017-03-05', '1321@3421321321'),
(4, 26, '12312', '3123213', '312312', '2017-03-05', '1321@3421321321'),
(5, 26, '12312', '3123213', '312312', '2017-03-05', '1321@3421321321'),
(6, 26, '12312', '3123213', '312312', '2017-03-05', '1321@3421321321'),
(7, 26, '213', '123', '123', '2017-03-05', '3213@32'),
(8, 26, '312', '312', '321', '2017-03-05', '3213@3421'),
(9, 26, '312', '321', '312', '2017-03-05', '312@321'),
(10, 26, 'kurva anyád', 'szia admin, kurva anyád ^^', 'Probléma', '2017-03-06', 'valentine_41@windowslive.com'),
(11, 26, '321', '312', '321', '2017-03-06', '33123@21'),
(12, 26, '321', '321', '3211', '2017-03-06', '3123@sa'),
(13, 26, '32131', '', '312321', '2017-03-06', '123123v@3213'),
(14, 26, '321', '321', '321', '2017-03-06', '123123v@321331'),
(15, 26, '', '', '', '2017-03-06', ''),
(16, 26, '', '', '', '2017-03-06', ''),
(17, 26, '', '', '', '2017-03-17', '');

-- --------------------------------------------------------

--
-- Tábla szerkezet ehhez a táblához `friends`
--

CREATE TABLE `friends` (
  `id` int(11) NOT NULL,
  `usersid` int(11) DEFAULT '0',
  `othersid` int(11) NOT NULL DEFAULT '0',
  `date` date NOT NULL,
  `accepted` int(11) DEFAULT '0'
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- A tábla adatainak kiíratása `friends`
--

INSERT INTO `friends` (`id`, `usersid`, `othersid`, `date`, `accepted`) VALUES
(65, 33, 42, '2017-03-15', 1),
(64, 25, 42, '2017-03-15', 1),
(69, 33, 40, '2017-03-15', 0),
(70, 33, 25, '2017-03-17', 1);

-- --------------------------------------------------------

--
-- Tábla szerkezet ehhez a táblához `garbage`
--

CREATE TABLE `garbage` (
  `id` int(11) NOT NULL,
  `userid` int(11) NOT NULL,
  `category` varchar(50) CHARACTER SET utf8 COLLATE utf8_hungarian_ci NOT NULL,
  `descreption` varchar(50) CHARACTER SET utf8 COLLATE utf8_hungarian_ci NOT NULL,
  `sharedate` date NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- A tábla adatainak kiíratása `garbage`
--

INSERT INTO `garbage` (`id`, `userid`, `category`, `descreption`, `sharedate`) VALUES
(49, 25, 'Sport', 'Football meccs lesz nem sokára!', '2017-01-18'),
(50, 25, 'Sport', 'Football meccs lesz nem sokára!', '2017-01-18');

-- --------------------------------------------------------

--
-- Tábla szerkezet ehhez a táblához `guests`
--

CREATE TABLE `guests` (
  `id` int(11) NOT NULL,
  `guest` varchar(255) CHARACTER SET utf8 COLLATE utf8_hungarian_ci NOT NULL,
  `opinion` varchar(255) CHARACTER SET utf8 COLLATE utf8_hungarian_ci NOT NULL,
  `rate` int(2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Tábla szerkezet ehhez a táblához `list`
--

CREATE TABLE `list` (
  `id` int(11) NOT NULL,
  `userid` int(11) NOT NULL,
  `todo` varchar(255) NOT NULL,
  `datetime` date NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- A tábla adatainak kiíratása `list`
--

INSERT INTO `list` (`id`, `userid`, `todo`, `datetime`) VALUES
(8, 25, 'newElement()', '2017-02-25'),
(7, 25, '', '2017-02-25'),
(6, 25, '', '2017-02-25'),
(9, 25, 'newElement()', '2017-02-25'),
(10, 25, 'newElement()', '2017-02-25'),
(11, 25, '', '2017-03-09'),
(12, 25, '', '2017-03-09'),
(13, 25, '', '2017-03-13'),
(14, 25, '', '2017-03-13'),
(15, 25, '', '2017-03-13'),
(16, 25, '', '2017-03-13'),
(17, 25, '', '2017-03-13'),
(18, 25, '', '2017-03-13'),
(19, 25, '', '2017-03-18'),
(20, 25, '', '2017-03-18'),
(21, 25, '', '2017-03-18'),
(22, 25, '', '2017-03-18'),
(23, 25, '', '2017-03-18'),
(24, 25, '', '2017-03-18'),
(25, 25, '', '2017-03-18');

-- --------------------------------------------------------

--
-- Tábla szerkezet ehhez a táblához `message`
--

CREATE TABLE `message` (
  `usersid` int(11) NOT NULL,
  `date` varchar(255) CHARACTER SET utf8 COLLATE utf8_hungarian_ci NOT NULL,
  `what` varchar(255) CHARACTER SET utf8 COLLATE utf8_hungarian_ci NOT NULL,
  `otherid` int(11) NOT NULL,
  `id` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- A tábla adatainak kiíratása `message`
--

INSERT INTO `message` (`usersid`, `date`, `what`, `otherid`, `id`) VALUES
(25, '213213', '2017-02-22 20:19:36', 29, 1),
(25, 'faszfej kurva', '2017-02-22 20:19:50', 33, 2),
(33, 'Holnap menjÃ¼nk moziba! ', '2017-02-22 22:00:05', 25, 4),
(42, 'szia krajnyiii', '2017-02-28 20:53:02', 25, 5),
(25, 'hello!', '2017-03-06 10:20:40', 33, 6),
(25, '312321oiuwqeofwejoiwefjweoifjweoiwejfowejfweofijewofiwejfoiwejfoiewjfewoifjiweofwefewfewfewfwewefew', '2017-03-06 10:20:55', 33, 7),
(25, 'rzinluoÅ‘', '2017-03-06 12:05:28', 33, 8),
(45, 'Szia! Nagyon szÃ©p az oldalad, igazÃ¡n Ã¼gyes vagy!', '2017-03-06 19:28:44', 25, 9),
(25, '', '2017-03-09 11:54:05', 34, 10),
(25, '', '2017-03-09 11:54:23', 34, 11),
(25, '', '2017-03-09 11:54:33', 34, 12),
(42, 'fwefew', '2017-03-12 19:30:45', 34, 17);

-- --------------------------------------------------------

--
-- Tábla szerkezet ehhez a táblához `news`
--

CREATE TABLE `news` (
  `id` int(11) NOT NULL,
  `name` varchar(255) CHARACTER SET utf8 COLLATE utf8_hungarian_ci NOT NULL,
  `descreption` varchar(301) CHARACTER SET utf8 COLLATE utf8_hungarian_ci NOT NULL,
  `image` varchar(255) CHARACTER SET utf8 COLLATE utf8_hungarian_ci DEFAULT NULL,
  `time` date NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- A tábla adatainak kiíratása `news`
--

INSERT INTO `news` (`id`, `name`, `descreption`, `image`, `time`) VALUES
(4, 'asd', 'asd', 'kepek/caballe.png', '2017-03-19'),
(5, 'fasz', 'kocosg', 'kepek/rougeone.jpg', '2017-03-19'),
(9, 'dsa', 'dsad', 'kepek/', '2017-03-19'),
(10, 'cdasd', 'dasdas', 'kepek/divak.png', '2017-03-19'),
(12, 'üöü', 'óúóú', 'kepek/', '2017-03-19'),
(15, 'Jövő héten már 24 fok is lesz', 'A következő napokban ismét melegszik a levegő. Napközben többfelé 20 Celsius-fok felett,  helyenként a leghidegebb órákban is 10 fok körül alakul a hőmérséklet. Túlnyomóan száraz lesz az idő, néhol előfordulhat eső - derül ki az Országos Meteorológiai Szolgálat középtávú előrejelzéséből.', 'kepek/kepecske.jpg', '2017-03-19');

-- --------------------------------------------------------

--
-- Tábla szerkezet ehhez a táblához `notes`
--

CREATE TABLE `notes` (
  `id` int(11) NOT NULL,
  `userid` int(11) NOT NULL,
  `category` varchar(50) CHARACTER SET utf8 COLLATE utf8_hungarian_ci NOT NULL,
  `descreption` varchar(50) CHARACTER SET utf8 COLLATE utf8_hungarian_ci NOT NULL,
  `sharedate` date NOT NULL,
  `picture` varchar(255) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- A tábla adatainak kiíratása `notes`
--

INSERT INTO `notes` (`id`, `userid`, `category`, `descreption`, `sharedate`, `picture`) VALUES
(52, 25, 'Sport', 'Foci meccs.', '2017-02-19', ''),
(53, 25, 'Friends', 'Moziba menés ', '2017-02-19', ''),
(55, 42, 'Travel', 'Megyünk good charlotte koncetre! :)', '2017-02-28', '');

-- --------------------------------------------------------

--
-- Tábla szerkezet ehhez a táblához `rating`
--

CREATE TABLE `rating` (
  `id` int(11) NOT NULL,
  `userid` int(11) NOT NULL,
  `rate` int(11) NOT NULL,
  `opinion` varchar(255) CHARACTER SET utf8 COLLATE utf8_hungarian_ci NOT NULL,
  `datetime` date NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- A tábla adatainak kiíratása `rating`
--

INSERT INTO `rating` (`id`, `userid`, `rate`, `opinion`, `datetime`) VALUES
(1, 25, 5, 'Nekem ez tetszik!', '2017-03-09'),
(2, 25, 5, 'Nekem ez tetszik!', '2017-03-09'),
(3, 25, 9, '3211', '2017-03-09'),
(4, 25, 4, '321', '2017-03-09'),
(5, 42, 9, 'Egész jól kis oldal, összetett, meg a dolgaimat könnyedén átláthatom! ', '2017-03-14');

-- --------------------------------------------------------

--
-- Tábla szerkezet ehhez a táblához `shop`
--

CREATE TABLE `shop` (
  `id` int(11) NOT NULL,
  `colors` varchar(255) NOT NULL,
  `cost` int(11) NOT NULL,
  `rating` int(11) NOT NULL,
  `name` varchar(255) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- A tábla adatainak kiíratása `shop`
--

INSERT INTO `shop` (`id`, `colors`, `cost`, `rating`, `name`) VALUES
(1, '#ff8000', 210, 7, 'Narancs árnyalat'),
(2, '#800000', 50, 5, 'Isteni szín');

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
  `password` varchar(255) CHARACTER SET utf8 DEFAULT NULL,
  `legitimacy` text CHARACTER SET utf8,
  `picture` varchar(255) DEFAULT NULL,
  `lastsign` datetime DEFAULT NULL,
  `custom` varchar(255) DEFAULT NULL,
  `sharepoint` int(10) DEFAULT NULL,
  `notification` int(10) DEFAULT NULL,
  `loggedin` tinyint(4) DEFAULT '0'
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- A tábla adatainak kiíratása `users`
--

INSERT INTO `users` (`id`, `name`, `username`, `age`, `available`, `logindate`, `password`, `legitimacy`, `picture`, `lastsign`, `custom`, `sharepoint`, `notification`, `loggedin`) VALUES
(25, 'Rápolthy Bálint', 'Balintskac', 21, 1, '2017-01-13', '7815696ecbf1c96e6894b779456d330e', 'diak', 'kepek/barimage.bmp', '2017-03-19 19:28:08', 'black', 320, 0, 0),
(26, 'Admin Főnök', 'admin', 30, 1, '2017-01-14', '441b5ddfa7dffbc7bed9564da24a13f6', 'admin', 'kepek/defaultpic.jpg', '2017-03-19 18:38:01', NULL, 0, 0, 0),
(29, 'Horváth Tamás', 'Tomas41', 24, 1, '2017-01-29', '81dc9bdb52d04dc20036dbd8313ed055', 'diak', 'kepek/rougeone.jpg', NULL, NULL, 0, 0, 0),
(33, 'Ács Péter', 'Parasztragu', 18, 1, '2017-02-11', '49bd32255ea98067c64c478ee9ed7c2b', 'diak', 'kepek/defaultpic.jpg', '2017-03-17 22:56:37', NULL, 0, 0, 0),
(34, '432', '423', 432, 1, '2017-02-12', 'e4a6222cdb5b34375400904f03d8e6a5', 'diak', 'kepek/defaultpic.jpg', NULL, NULL, 0, 0, 0),
(40, 'Vágó István', 'vágóka', 40, 1, '2017-02-22', '7815696ecbf1c96e6894b779456d330e', 'diak', 'kepek/defaultpic.jpg', '2017-02-22 19:38:53', NULL, 0, 0, 0),
(42, 'Tóth Bence', 'SaaltY', 21, 1, '2017-02-28', '496245cdb30a5eed6b518006311fe18a', 'diak', 'kepek/rougeone.jpg', '2017-03-15 17:51:48', NULL, NULL, NULL, 0),
(45, 'Helembai Györgyi', 'Gyorgyina', 25, 1, '2017-03-06', '496245cdb30a5eed6b518006311fe18a', 'diak', 'kepek/bird.jpg', '2017-03-15 22:12:15', NULL, NULL, NULL, 0);

--
-- Indexek a kiírt táblákhoz
--

--
-- A tábla indexei `adminlog`
--
ALTER TABLE `adminlog`
  ADD PRIMARY KEY (`id`);

--
-- A tábla indexei `celendarevents`
--
ALTER TABLE `celendarevents`
  ADD PRIMARY KEY (`id`);

--
-- A tábla indexei `contact`
--
ALTER TABLE `contact`
  ADD PRIMARY KEY (`id`);

--
-- A tábla indexei `friends`
--
ALTER TABLE `friends`
  ADD PRIMARY KEY (`id`);

--
-- A tábla indexei `garbage`
--
ALTER TABLE `garbage`
  ADD PRIMARY KEY (`id`);

--
-- A tábla indexei `guests`
--
ALTER TABLE `guests`
  ADD PRIMARY KEY (`id`);

--
-- A tábla indexei `list`
--
ALTER TABLE `list`
  ADD PRIMARY KEY (`id`);

--
-- A tábla indexei `message`
--
ALTER TABLE `message`
  ADD PRIMARY KEY (`id`);

--
-- A tábla indexei `news`
--
ALTER TABLE `news`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `name` (`name`),
  ADD UNIQUE KEY `descreption` (`descreption`);

--
-- A tábla indexei `notes`
--
ALTER TABLE `notes`
  ADD PRIMARY KEY (`id`);

--
-- A tábla indexei `rating`
--
ALTER TABLE `rating`
  ADD PRIMARY KEY (`id`);

--
-- A tábla indexei `shop`
--
ALTER TABLE `shop`
  ADD PRIMARY KEY (`id`);

--
-- A tábla indexei `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `name` (`name`),
  ADD UNIQUE KEY `username` (`username`);

--
-- A kiírt táblák AUTO_INCREMENT értéke
--

--
-- AUTO_INCREMENT a táblához `adminlog`
--
ALTER TABLE `adminlog`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=102;
--
-- AUTO_INCREMENT a táblához `celendarevents`
--
ALTER TABLE `celendarevents`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
--
-- AUTO_INCREMENT a táblához `contact`
--
ALTER TABLE `contact`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;
--
-- AUTO_INCREMENT a táblához `friends`
--
ALTER TABLE `friends`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=71;
--
-- AUTO_INCREMENT a táblához `garbage`
--
ALTER TABLE `garbage`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=51;
--
-- AUTO_INCREMENT a táblához `guests`
--
ALTER TABLE `guests`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT a táblához `list`
--
ALTER TABLE `list`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;
--
-- AUTO_INCREMENT a táblához `message`
--
ALTER TABLE `message`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;
--
-- AUTO_INCREMENT a táblához `news`
--
ALTER TABLE `news`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;
--
-- AUTO_INCREMENT a táblához `notes`
--
ALTER TABLE `notes`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=96;
--
-- AUTO_INCREMENT a táblához `rating`
--
ALTER TABLE `rating`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT a táblához `shop`
--
ALTER TABLE `shop`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT a táblához `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=46;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
