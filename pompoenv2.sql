-- phpMyAdmin SQL Dump
-- version 5.1.3
-- https://www.phpmyadmin.net/
--
-- Host: database:3306
-- Gegenereerd op: 31 mrt 2022 om 13:34
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
-- Tabelstructuur voor tabel `gewicht`
--

DROP TABLE IF EXISTS `gewicht`;
CREATE TABLE `gewicht` (
  `ID` int NOT NULL,
  `tijd` datetime NOT NULL,
  `gewicht p1` int NOT NULL,
  `gewicht p2` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

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
  `grondvochtigheid` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `pompoen 2`
--

DROP TABLE IF EXISTS `pompoen 2`;
CREATE TABLE `pompoen 2` (
  `ID` int NOT NULL,
  `tijd` datetime NOT NULL,
  `temperatuur` int NOT NULL,
  `grondvochtigheid` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

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
  `co2` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Gegevens worden geëxporteerd voor tabel `serre`
--

INSERT INTO `serre` (`ID`, `tijd`, `deur 1`, `deur 2`, `raam 1`, `raam 2`, `lichtsterkte`, `co2`) VALUES
(1, '2022-03-03 00:00:00', 0, 0, 0, 0, 0, 0);

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `threshold`
--

DROP TABLE IF EXISTS `threshold`;
CREATE TABLE `threshold` (
  `ID` int NOT NULL,
  `tijd` datetime NOT NULL,
  `temp ventilator 1` int NOT NULL,
  `temp ventilator 2` int NOT NULL,
  `temp raam 1` int NOT NULL,
  `temp raam 2` int NOT NULL,
  `temp deur 1` int NOT NULL,
  `temp deur 2` int NOT NULL,
  `min vat 1` int NOT NULL,
  `max vat 1` int NOT NULL,
  `min vat 2` int NOT NULL,
  `max vat 2` int NOT NULL,
  `grondvochtigheid 1` int NOT NULL,
  `grondvochtigheid 2` int NOT NULL,
  `licht` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Gegevens worden geëxporteerd voor tabel `threshold`
--

INSERT INTO `threshold` (`ID`, `tijd`, `temp ventilator 1`, `temp ventilator 2`, `temp raam 1`, `temp raam 2`, `temp deur 1`, `temp deur 2`, `min vat 1`, `max vat 1`, `min vat 2`, `max vat 2`, `grondvochtigheid 1`, `grondvochtigheid 2`, `licht`) VALUES
(1, '2022-03-03 00:00:00', 5, 6, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0);

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
  `vat 1` int NOT NULL,
  `vat 2` int NOT NULL,
  `vat 3` int NOT NULL,
  `in_vat 1` tinyint(1) NOT NULL,
  `in_vat 2` tinyint(1) NOT NULL,
  `uit_vat 1.1` tinyint(1) NOT NULL,
  `uit_vat 1.2` tinyint(1) NOT NULL,
  `uit_vat 2.1` tinyint(1) NOT NULL,
  `uit_vat 2.2` tinyint(1) NOT NULL,
  `roerder` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Gegevens worden geëxporteerd voor tabel `water`
--

INSERT INTO `water` (`ID`, `tijd`, `vat 1`, `vat 2`, `vat 3`, `in_vat 1`, `in_vat 2`, `uit_vat 1.1`, `uit_vat 1.2`, `uit_vat 2.1`, `uit_vat 2.2`, `roerder`) VALUES
(1, '2022-03-03 00:00:00', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0);

--
-- Indexen voor geëxporteerde tabellen
--

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
  MODIFY `ID` int NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT voor een tabel `log`
--
ALTER TABLE `log`
  MODIFY `ID` int NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT voor een tabel `pompoen 1`
--
ALTER TABLE `pompoen 1`
  MODIFY `ID` int NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT voor een tabel `pompoen 2`
--
ALTER TABLE `pompoen 2`
  MODIFY `ID` int NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT voor een tabel `serre`
--
ALTER TABLE `serre`
  MODIFY `ID` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT voor een tabel `threshold`
--
ALTER TABLE `threshold`
  MODIFY `ID` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

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
