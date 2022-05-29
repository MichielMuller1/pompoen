-- phpMyAdmin SQL Dump
-- version 5.0.4deb2
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Gegenereerd op: 29 mei 2022 om 13:03
-- Serverversie: 10.5.15-MariaDB-0+deb11u1
-- PHP-versie: 7.4.28

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `pompoen`
--

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `automatisch`
--

CREATE TABLE `automatisch` (
  `ID` int(11) NOT NULL,
  `tijd` datetime NOT NULL,
  `ventilator1A` tinyint(1) NOT NULL,
  `ventilator2A` tinyint(1) NOT NULL,
  `raam1A` tinyint(1) NOT NULL,
  `raam2A` tinyint(1) NOT NULL,
  `deur1A` tinyint(1) NOT NULL,
  `deur2A` tinyint(1) NOT NULL,
  `lichtA` tinyint(1) NOT NULL,
  `vat1A` tinyint(1) NOT NULL,
  `vat2A` tinyint(1) NOT NULL,
  `vat3A` tinyint(1) NOT NULL,
  `tijdvat1A` tinyint(1) NOT NULL,
  `tijdvat2A` tinyint(1) NOT NULL,
  `tijdvat3A` tinyint(1) NOT NULL,
  `cyclus1A` tinyint(1) NOT NULL,
  `cyclus1Astart` time NOT NULL,
  `cyclus2A` tinyint(1) NOT NULL,
  `cyclus2Astart` time NOT NULL,
  `cyclus12A` tinyint(1) NOT NULL,
  `cyclus12Astart` time NOT NULL,
  `cyclus22A` tinyint(1) NOT NULL,
  `cyclus22Astart` time NOT NULL,
  `cyclus13A` tinyint(1) NOT NULL,
  `cyclus13Astart` time NOT NULL,
  `cyclus23A` tinyint(1) NOT NULL,
  `cyclus23Astart` time NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Gegevens worden geëxporteerd voor tabel `automatisch`
--

INSERT INTO `automatisch` (`ID`, `tijd`, `ventilator1A`, `ventilator2A`, `raam1A`, `raam2A`, `deur1A`, `deur2A`, `lichtA`, `vat1A`, `vat2A`, `vat3A`, `tijdvat1A`, `tijdvat2A`, `tijdvat3A`, `cyclus1A`, `cyclus1Astart`, `cyclus2A`, `cyclus2Astart`, `cyclus12A`, `cyclus12Astart`, `cyclus22A`, `cyclus22Astart`, `cyclus13A`, `cyclus13Astart`, `cyclus23A`, `cyclus23Astart`) VALUES
(1, '2022-04-28 14:12:16', 0, 1, 0, 1, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '00:00:00', 0, '00:00:00', 0, '00:00:00', 0, '00:00:00', 0, '00:00:00', 0, '00:00:00');

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `controls`
--

CREATE TABLE `controls` (
  `ID` int(11) NOT NULL,
  `tijd` datetime NOT NULL,
  `ventilator1` tinyint(1) NOT NULL,
  `ventilator2` tinyint(1) NOT NULL,
  `raam1` tinyint(1) NOT NULL,
  `raam2` tinyint(1) NOT NULL,
  `deur1` tinyint(1) NOT NULL,
  `deur2` tinyint(1) NOT NULL,
  `tijdvat1` tinyint(1) NOT NULL,
  `vat1wateren` tinyint(1) NOT NULL,
  `tijdvat2` tinyint(1) NOT NULL,
  `vat2wateren` tinyint(1) NOT NULL,
  `tijdvat3` tinyint(1) NOT NULL,
  `vat3wateren` tinyint(1) NOT NULL,
  `licht` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Gegevens worden geëxporteerd voor tabel `controls`
--

INSERT INTO `controls` (`ID`, `tijd`, `ventilator1`, `ventilator2`, `raam1`, `raam2`, `deur1`, `deur2`, `tijdvat1`, `vat1wateren`, `tijdvat2`, `vat2wateren`, `tijdvat3`, `vat3wateren`, `licht`) VALUES
(1, '2022-04-28 14:12:16', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0);

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `gewicht`
--

CREATE TABLE `gewicht` (
  `ID` int(11) NOT NULL,
  `tijd` datetime NOT NULL,
  `gewichtp1` int(11) NOT NULL,
  `gewichtp2` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Gegevens worden geëxporteerd voor tabel `gewicht`
--

INSERT INTO `gewicht` (`ID`, `tijd`, `gewichtp1`, `gewichtp2`) VALUES
(9, '2022-05-28 10:26:24', 200, 200),
(10, '2022-05-29 10:52:33', 200, 200);

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `log`
--

CREATE TABLE `log` (
  `ID` int(11) NOT NULL,
  `tijd` datetime NOT NULL,
  `temperatuur` int(11) NOT NULL,
  `grondvochtigheid` int(11) NOT NULL,
  `lichtsterkte` int(11) NOT NULL,
  `co2` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `pompoen1`
--

CREATE TABLE `pompoen1` (
  `ID` int(11) NOT NULL,
  `tijd` datetime NOT NULL,
  `temperatuur` int(11) NOT NULL,
  `luchtvochtigheid` int(11) NOT NULL,
  `grondvochtigheidlaag1` int(11) NOT NULL,
  `grondvochtigheidlaag2` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Gegevens worden geëxporteerd voor tabel `pompoen1`
--

INSERT INTO `pompoen1` (`ID`, `tijd`, `temperatuur`, `luchtvochtigheid`, `grondvochtigheidlaag1`, `grondvochtigheidlaag2`) VALUES
(1, '2022-04-28 11:08:34', 20, 49, 25, 30);

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `pompoen2`
--

CREATE TABLE `pompoen2` (
  `ID` int(11) NOT NULL,
  `tijd` datetime NOT NULL,
  `temperatuur2` int(11) NOT NULL,
  `luchtvochtigheid2` int(11) NOT NULL,
  `grondvochtigheidlaag12` int(11) NOT NULL,
  `grondvochtigheidlaag22` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Gegevens worden geëxporteerd voor tabel `pompoen2`
--

INSERT INTO `pompoen2` (`ID`, `tijd`, `temperatuur2`, `luchtvochtigheid2`, `grondvochtigheidlaag12`, `grondvochtigheidlaag22`) VALUES
(1, '2022-04-28 11:09:19', 30, 26, 25, 33);

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `serre`
--

CREATE TABLE `serre` (
  `ID` int(11) NOT NULL,
  `tijd` datetime NOT NULL,
  `deur 1` tinyint(1) NOT NULL,
  `deur 2` tinyint(1) NOT NULL,
  `raam 1` tinyint(1) NOT NULL,
  `raam 2` tinyint(1) NOT NULL,
  `lichtsterkte` int(11) NOT NULL,
  `co2` int(11) NOT NULL,
  `luchtvochtigheid` int(11) NOT NULL,
  `regenstatus` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Gegevens worden geëxporteerd voor tabel `serre`
--

INSERT INTO `serre` (`ID`, `tijd`, `deur 1`, `deur 2`, `raam 1`, `raam 2`, `lichtsterkte`, `co2`, `luchtvochtigheid`, `regenstatus`) VALUES
(1, '2022-03-03 00:00:00', 5, 3, 5, 4, 1, 9, 6, 0);

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `threshold`
--

CREATE TABLE `threshold` (
  `ID` int(11) NOT NULL,
  `tijd` datetime NOT NULL,
  `tempventilator1T` int(11) NOT NULL,
  `tempventilator2T` int(11) NOT NULL,
  `tempraam1T` int(11) NOT NULL,
  `tempraam2T` int(11) NOT NULL,
  `tempdeur1T` int(11) NOT NULL,
  `tempdeur2T` int(11) NOT NULL,
  `minvat1T` int(11) NOT NULL,
  `maxvat1T` int(11) NOT NULL,
  `minvat2T` int(11) NOT NULL,
  `maxvat2T` int(11) NOT NULL,
  `minvat3T` int(11) NOT NULL,
  `maxvat3T` int(11) NOT NULL,
  `grondvochtigheid1laag1T` int(11) NOT NULL,
  `grondvochtigheid1laag2T` int(11) NOT NULL,
  `grondvochtigheid2laag12T` int(11) NOT NULL,
  `grondvochtigheid2laag22T` int(11) NOT NULL,
  `lichtT` int(11) NOT NULL,
  `regen` int(11) NOT NULL,
  `rood` int(11) NOT NULL,
  `groen` int(11) NOT NULL,
  `blauw` int(11) NOT NULL,
  `apiTemperatuur` int(11) NOT NULL,
  `apiMinuten` int(11) NOT NULL,
  `ledstripstart` time NOT NULL,
  `ledstripstop` time NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Gegevens worden geëxporteerd voor tabel `threshold`
--

INSERT INTO `threshold` (`ID`, `tijd`, `tempventilator1T`, `tempventilator2T`, `tempraam1T`, `tempraam2T`, `tempdeur1T`, `tempdeur2T`, `minvat1T`, `maxvat1T`, `minvat2T`, `maxvat2T`, `minvat3T`, `maxvat3T`, `grondvochtigheid1laag1T`, `grondvochtigheid1laag2T`, `grondvochtigheid2laag12T`, `grondvochtigheid2laag22T`, `lichtT`, `regen`, `rood`, `groen`, `blauw`, `apiTemperatuur`, `apiMinuten`, `ledstripstart`, `ledstripstop`) VALUES
(1, '2022-04-28 14:12:16', 0, 0, 0, 0, 2, 0, 2, 0, 0, 5, 0, 0, 0, 0, 0, 3, 0, 5, 0, 0, 0, 0, 0, '00:00:00', '00:00:00');

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(1000) NOT NULL,
  `full_name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Gegevens worden geëxporteerd voor tabel `users`
--

INSERT INTO `users` (`id`, `username`, `password`, `full_name`) VALUES
(1, 'hverschueren99@gmail.com', '$2y$10$z8sTIctY/yyIdaVRhgD/m.VVXqEr1h7Rg9mJiBlpzNjccRYmkyLd2', 'Hanne Verschueren'),
(2, 'BOON', '$2y$10$z8sTIctY/yyIdaVRhgD/m.VVXqEr1h7Rg9mJiBlpzNjccRYmkyLd2', 'pieter janssen');

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `water`
--

CREATE TABLE `water` (
  `ID` int(11) NOT NULL,
  `tijd` datetime NOT NULL,
  `waterlevelvat1` smallint(6) NOT NULL,
  `waterlevelvat2` smallint(6) NOT NULL,
  `waterlevelvat3` smallint(6) NOT NULL,
  `roerder` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Gegevens worden geëxporteerd voor tabel `water`
--

INSERT INTO `water` (`ID`, `tijd`, `waterlevelvat1`, `waterlevelvat2`, `waterlevelvat3`, `roerder`) VALUES
(1, '2022-05-27 20:44:04', 6289, 5408, 0, 0);

--
-- Indexen voor geëxporteerde tabellen
--

--
-- Indexen voor tabel `automatisch`
--
ALTER TABLE `automatisch`
  ADD PRIMARY KEY (`ID`);

--
-- Indexen voor tabel `controls`
--
ALTER TABLE `controls`
  ADD PRIMARY KEY (`ID`);

--
-- Indexen voor tabel `gewicht`
--
ALTER TABLE `gewicht`
  ADD PRIMARY KEY (`ID`);

--
-- Indexen voor tabel `log`
--
ALTER TABLE `log`
  ADD PRIMARY KEY (`ID`);

--
-- Indexen voor tabel `pompoen1`
--
ALTER TABLE `pompoen1`
  ADD PRIMARY KEY (`ID`);

--
-- Indexen voor tabel `pompoen2`
--
ALTER TABLE `pompoen2`
  ADD PRIMARY KEY (`ID`);

--
-- Indexen voor tabel `serre`
--
ALTER TABLE `serre`
  ADD PRIMARY KEY (`ID`);

--
-- Indexen voor tabel `threshold`
--
ALTER TABLE `threshold`
  ADD PRIMARY KEY (`ID`);

--
-- Indexen voor tabel `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`username`);

--
-- Indexen voor tabel `water`
--
ALTER TABLE `water`
  ADD PRIMARY KEY (`ID`);

--
-- AUTO_INCREMENT voor geëxporteerde tabellen
--

--
-- AUTO_INCREMENT voor een tabel `gewicht`
--
ALTER TABLE `gewicht`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT voor een tabel `log`
--
ALTER TABLE `log`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT voor een tabel `pompoen1`
--
ALTER TABLE `pompoen1`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT voor een tabel `pompoen2`
--
ALTER TABLE `pompoen2`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT voor een tabel `serre`
--
ALTER TABLE `serre`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT voor een tabel `threshold`
--
ALTER TABLE `threshold`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT voor een tabel `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT voor een tabel `water`
--
ALTER TABLE `water`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
