-- phpMyAdmin SQL Dump
-- version 5.1.3
-- https://www.phpmyadmin.net/
--
-- Host: 192.168.56.5:3306:3306
-- Gegenereerd op: 05 mei 2022 om 10:59
-- Serverversie: 8.0.28
-- PHP-versie: 8.0.15

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
CREATE DATABASE IF NOT EXISTS `pompoen` DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci;
USE `pompoen`;

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `automatisch`
--

DROP TABLE IF EXISTS `automatisch`;
CREATE TABLE `automatisch` (
  `ID` int NOT NULL,
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
  `cyclus2A` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Gegevens worden geëxporteerd voor tabel `automatisch`
--

INSERT INTO `automatisch` (`ID`, `tijd`, `ventilator1A`, `ventilator2A`, `raam1A`, `raam2A`, `deur1A`, `deur2A`, `lichtA`, `vat1A`, `vat2A`, `vat3A`, `tijdvat1A`, `tijdvat2A`, `tijdvat3A`, `cyclus1A` , `cyclus2A`) VALUES
(1, '2022-04-28 14:12:16', 0, 1, 0, 1, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0);

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `control`
--

DROP TABLE IF EXISTS `control`;
CREATE TABLE `control` (
  `ID` int NOT NULL,
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
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Gegevens worden geëxporteerd voor tabel `control`
--

INSERT INTO `control` (`ID`, `tijd`, `ventilator1`, `ventilator2`, `raam1`, `raam2`, `deur1`, `deur2`, `tijdvat1`, `vat1wateren`, `tijdvat2`, `vat2wateren`, `tijdvat3`, `vat3wateren`, `licht`) VALUES
(1, '2022-04-28 14:12:16', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0);

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `gewicht`
--

DROP TABLE IF EXISTS `gewicht`;
CREATE TABLE `gewicht` (
  `ID` int NOT NULL,
  `tijd` datetime NOT NULL,
  `gewicht p1` int NOT NULL,
  `gewicht p2` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Gegevens worden geëxporteerd voor tabel `gewicht`
--

INSERT INTO `gewicht` (`ID`, `tijd`, `gewicht p1`, `gewicht p2`) VALUES
(1, '2022-04-28 13:50:59', 5, 17),
(2, '2022-04-28 14:06:05', 5, 17),
(3, '2022-04-28 14:07:14', 5, 17),
(4, '2022-04-28 14:07:34', 8, 16),
(5, '2022-04-28 14:13:02', 1500, 17),
(6, '2022-04-28 14:13:09', 1500, 17),
(7, '2022-04-28 14:16:47', 1, 1);

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `log`
--

DROP TABLE IF EXISTS `log`;
CREATE TABLE `log` (
  `ID` int NOT NULL,
  `tijd` datetime NOT NULL,
  `temperatuur` int NOT NULL,
  `grondvochtigheid` int NOT NULL,
  `lichtsterkte` int NOT NULL,
  `co2` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `pompoen 1`
--

DROP TABLE IF EXISTS `pompoen 1`;
CREATE TABLE `pompoen 1` (
  `ID` int NOT NULL,
  `tijd` datetime NOT NULL,
  `temperatuur` int NOT NULL,
  `luchtvochtigheid` int NOT NULL,
  `grondvochtigheidlaag1` int NOT NULL,
  `grondvochtigheidlaag2` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Gegevens worden geëxporteerd voor tabel `pompoen 1`
--

INSERT INTO `pompoen 1` (`ID`, `tijd`, `temperatuur`, `luchtvochtigheid`, `grondvochtigheidlaag1`, `grondvochtigheidlaag2`) VALUES
(1, '2022-04-28 11:08:34', 5, 49, 3, 7),
(2, '2022-04-28 12:20:28', 9, 50, 9, 9);

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `pompoen 2`
--

DROP TABLE IF EXISTS `pompoen 2`;
CREATE TABLE `pompoen 2` (
  `ID` int NOT NULL,
  `tijd` datetime NOT NULL,
  `temperatuur2` int NOT NULL,
  `luchtvochtigheid2` int NOT NULL,
  `grondvochtigheidlaag12` int NOT NULL,
  `grondvochtigheidlaag22` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Gegevens worden geëxporteerd voor tabel `pompoen 2`
--

INSERT INTO `pompoen 2` (`ID`, `tijd`, `temperatuur2`,`luchtvochtigheid2`, `grondvochtigheidlaag12`, `grondvochtigheidlaag22`) VALUES
(1, '2022-04-28 11:09:19', 17, 26 , 25, 33);

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `serre`
--

DROP TABLE IF EXISTS `serre`;
CREATE TABLE `serre` (
  `ID` int NOT NULL,
  `tijd` datetime NOT NULL,
  `deur 1` tinyint(1) NOT NULL,
  `deur 2` tinyint(1) NOT NULL,
  `raam 1` tinyint(1) NOT NULL,
  `raam 2` tinyint(1) NOT NULL,
  `lichtsterkte` int NOT NULL,
  `co2` int NOT NULL,
  `luchtvochtigheid` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Gegevens worden geëxporteerd voor tabel `serre`
--

INSERT INTO `serre` (`ID`, `tijd`, `deur 1`, `deur 2`, `raam 1`, `raam 2`, `lichtsterkte`, `co2`, `luchtvochtigheid`) VALUES
(1, '2022-03-03 00:00:00', 5, 3, 5, 4, 1, 9, 6);

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `threshold`
--

DROP TABLE IF EXISTS `threshold`;
CREATE TABLE `threshold` (
  `ID` int NOT NULL,
  `tijd` datetime NOT NULL,
  `tempventilator1T` int NOT NULL,
  `tempventilator2T` int NOT NULL,
  `tempraam1T` int NOT NULL,
  `tempraam2T` int NOT NULL,
  `tempdeur1T` int NOT NULL,
  `tempdeur2T` int NOT NULL,
  `minvat1T` int NOT NULL,
  `maxvat1T` int NOT NULL,
  `minvat2T` int NOT NULL,
  `maxvat2T` int NOT NULL,
  `minvat3T` int NOT NULL,
  `maxvat3T` int NOT NULL,
  `grondvochtigheid1laag1T` int NOT NULL,
  `grondvochtigheid1laag2T` int NOT NULL,
  `grondvochtigheid2laag12T` int NOT NULL,
  `grondvochtigheid2laag22T` int NOT NULL,
  `lichtT` int NOT NULL,
  `lichtkleurT` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Gegevens worden geëxporteerd voor tabel `threshold`
--

INSERT INTO `threshold` (`ID`, `tijd`, `tempventilator1T`, `tempventilator2T`, `tempraam1T`, `tempraam2T`, `tempdeur1T`, `tempdeur2T`, `minvat1T`, `maxvat1T`, `minvat2T`, `maxvat2T`, `minvat3T`, `maxvat3T`, `grondvochtigheid1laag1T`, `grondvochtigheid1laag2T`, `grondvochtigheid2laag12T`, `grondvochtigheid2laag22T`, `lichtT`, `lichtkleurT`) VALUES
(1, '2022-04-28 14:12:16', 0, 0, 0, 0, 2, 0, 2, 0, 0, 5, 0, 0, 0, 0, 0, 3, 0, 5);

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `users`
--

DROP TABLE IF EXISTS `users`;
CREATE TABLE `users` (
  `id` int NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  `password` varchar(1000) COLLATE utf8mb4_general_ci NOT NULL,
  `full_name` varchar(255) COLLATE utf8mb4_general_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Gegevens worden geëxporteerd voor tabel `users`
--

INSERT INTO `users` (`id`, `email`, `password`, `full_name`) VALUES
(1, 'hverschueren99@gmail.com', '$2y$10$z8sTIctY/yyIdaVRhgD/m.VVXqEr1h7Rg9mJiBlpzNjccRYmkyLd2', 'Hanne Verschueren');

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `water`
--

DROP TABLE IF EXISTS `water`;
CREATE TABLE `water` (
  `ID` int NOT NULL,
  `tijd` datetime NOT NULL,
  `waterlevelvat1` smallint NOT NULL,
  `waterlevelvat2` smallint NOT NULL,
  `waterlevelvat3` smallint NOT NULL,
  `roerder` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Gegevens worden geëxporteerd voor tabel `water`
--

INSERT INTO `water` (`ID`, `tijd`, `waterlevelvat1`, `waterlevelvat2`, `waterlevelvat3` , `roerder`) VALUES
(1, '2022-03-03 00:00:00', 0, 0, 0, 0);

--
-- Indexen voor geëxporteerde tabellen
--

--
-- Indexen voor tabel `automatisch`
--
ALTER TABLE `automatisch`
  ADD PRIMARY KEY (`ID`);

--
-- Indexen voor tabel `control`
--
ALTER TABLE `control`
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
-- Indexen voor tabel `pompoen 1`
--
ALTER TABLE `pompoen 1`
  ADD PRIMARY KEY (`ID`);

--
-- Indexen voor tabel `pompoen 2`
--
ALTER TABLE `pompoen 2`
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
  ADD UNIQUE KEY `email` (`email`);

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
  MODIFY `ID` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT voor een tabel `log`
--
ALTER TABLE `log`
  MODIFY `ID` int NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT voor een tabel `pompoen 1`
--
ALTER TABLE `pompoen 1`
  MODIFY `ID` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT voor een tabel `pompoen 2`
--
ALTER TABLE `pompoen 2`
  MODIFY `ID` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT voor een tabel `serre`
--
ALTER TABLE `serre`
  MODIFY `ID` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT voor een tabel `threshold`
--
ALTER TABLE `threshold`
  MODIFY `ID` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT voor een tabel `users`
--
ALTER TABLE `users`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT voor een tabel `water`
--
ALTER TABLE `water`
  MODIFY `ID` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
