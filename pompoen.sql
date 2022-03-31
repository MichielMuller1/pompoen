-- phpMyAdmin SQL Dump
-- version 5.0.4deb2
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Gegenereerd op: 25 mrt 2022 om 15:52
-- Serverversie: 10.5.12-MariaDB-0+deb11u1
-- PHP-versie: 7.4.25

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
CREATE TABLE IF NOT EXISTS `gewicht` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `tijd` datetime NOT NULL,
  `gewicht p1` int(11) NOT NULL,
  `gewicht p2` int(11) NOT NULL,
  PRIMARY KEY (`ID`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `log`
--

DROP TABLE IF EXISTS `log`;
CREATE TABLE IF NOT EXISTS `log` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `tijd` datetime NOT NULL,
  `temperatuur` int(11) NOT NULL,
  `grondvochtigheid` int(11) NOT NULL,
  `lichtsterkte` int(11) NOT NULL,
  `co2` int(11) NOT NULL,
  PRIMARY KEY (`ID`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `pompoen 1`
--

DROP TABLE IF EXISTS `pompoen 1`;
CREATE TABLE IF NOT EXISTS `pompoen 1` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `tijd` datetime NOT NULL,
  `temperatuur` int(11) NOT NULL,
  `grondvochtigheid` int(11) NOT NULL,
  PRIMARY KEY (`ID`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `pompoen 2`
--

DROP TABLE IF EXISTS `pompoen 2`;
CREATE TABLE IF NOT EXISTS `pompoen 2` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `tijd` datetime NOT NULL,
  `temperatuur` int(11) NOT NULL,
  `grondvochtigheid` int(11) NOT NULL,
  PRIMARY KEY (`ID`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `serre`
--

DROP TABLE IF EXISTS `serre`;
CREATE TABLE IF NOT EXISTS `serre` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `tijd` datetime NOT NULL,
  `deur 1` tinyint(1) NOT NULL,
  `deur 2` tinyint(1) NOT NULL,
  `raam 1` tinyint(1) NOT NULL,
  `raam 2` tinyint(1) NOT NULL,
  `lichtsterkte` int(11) NOT NULL,
  `co2` int(11) NOT NULL,
  PRIMARY KEY (`ID`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4;

--
-- Gegevens worden geëxporteerd voor tabel `serre`
--

INSERT INTO `serre` (`ID`, `tijd`, `deur 1`, `deur 2`, `raam 1`, `raam 2`, `lichtsterkte`, `co2`) VALUES
(1, '2022-03-03', 0, 0, 0, 0, 0, 0);

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `threashhold`
--

DROP TABLE IF EXISTS `threshold`;
CREATE TABLE IF NOT EXISTS `threshold` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `tijd` datetime NOT NULL,
  `temp ventilator 1` int(11) NOT NULL,
  `temp ventilator 2` int(11) NOT NULL,
  `temp raam/deur` int(11) NOT NULL,
  `min vat 1` int(11) NOT NULL,
  `max vat 1` int(11) NOT NULL,
  `min vat 2` int(11) NOT NULL,
  `max vat 2` int(11) NOT NULL,
  `grondvochtigheid 1` int(11) NOT NULL,
  `grondvochtigheid 2` int(11) NOT NULL,
  PRIMARY KEY (`ID`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4;

--
-- Gegevens worden geëxporteerd voor tabel `threshold`
--

INSERT INTO `threshold` (`ID`, `tijd`, `temp ventilator 1`, `temp ventilator 2`, `temp raam/deur`, `min vat 1`, `max vat 1`, `min vat 2`, `max vat 2`, `grondvochtigheid 1`, `grondvochtigheid 2`) VALUES
(1, '2022-03-03', 0, 0, 0, 0, 0, 0, 0, 0, 0);

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `water`
--

DROP TABLE IF EXISTS `water`;
CREATE TABLE IF NOT EXISTS `water` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `tijd` datetime NOT NULL,
  `vat 1` int(11) NOT NULL,
  `vat 2` int(11) NOT NULL,
  `vat 3` int(11) NOT NULL,
  `in_vat 1` tinyint(1) NOT NULL,
  `in_vat 2` tinyint(1) NOT NULL,
  `uit_vat 1.1` tinyint(1) NOT NULL,
  `uit_vat 1.2` tinyint(1) NOT NULL,
  `uit_vat 2.1` tinyint(1) NOT NULL,
  `uit_vat 2.2` tinyint(1) NOT NULL,
  `roerder` tinyint(1) NOT NULL,
  PRIMARY KEY (`ID`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4;

--
-- Gegevens worden geëxporteerd voor tabel `water`
--

INSERT INTO `water` (`ID`, `tijd`, `vat 1`, `vat 2`, `vat 3`, `in_vat 1`, `in_vat 2`, `uit_vat 1.1`, `uit_vat 1.2`, `uit_vat 2.1`, `uit_vat 2.2`, `roerder`) VALUES
(1, '2022-03-03', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
