-- phpMyAdmin SQL Dump
-- version 4.0.10deb1
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Czas wygenerowania: 29 Lut 2016, 08:18
-- Wersja serwera: 5.5.46-0ubuntu0.14.04.2
-- Wersja PHP: 5.5.9-1ubuntu4.14

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Baza danych: `projectdb`
--
DROP DATABASE projectdb;
-- DROP DATABASE IF EXISTS `projectdb`;
CREATE DATABASE IF NOT EXISTS `projectdb` DEFAULT CHARACTER SET utf8 COLLATE utf8_general_ci;
USE `projectdb`;
-- DROP TABLE `gol`, `karta`, `klub`, `liga`, `migration`, `stadion`, `terminarz`, `user`, `zawodnik`;
-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `gol`
--

CREATE TABLE IF NOT EXISTS `gol` (
  `id_golu` int(11) NOT NULL AUTO_INCREMENT,
  `id_terminarza` int(11) NOT NULL,
  `id_strzelca` int(11) NOT NULL,
  `id_asystenta` int(11) NOT NULL,
  `minuta` text NOT NULL,
  PRIMARY KEY (`id_golu`),
  UNIQUE KEY `id_terminarza` (`id_terminarza`),
  UNIQUE KEY `id_strzelca` (`id_strzelca`),
  UNIQUE KEY `id_asystenta` (`id_asystenta`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `karta`
--

CREATE TABLE IF NOT EXISTS `karta` (
  `id_kartki` int(11) NOT NULL AUTO_INCREMENT,
  `id_terminarza` int(11) NOT NULL,
  `id_zawodnika` int(11) NOT NULL,
  `kolor` text NOT NULL,
  `minuta` text NOT NULL,
  PRIMARY KEY (`id_kartki`),
  UNIQUE KEY `id_terminarza` (`id_terminarza`,`id_zawodnika`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `klub`
--

CREATE TABLE IF NOT EXISTS `klub` (
  `id_klubu` int(11) NOT NULL AUTO_INCREMENT,
  `nazwa_klubu` text NOT NULL,
  `id_ligi` int(11) NOT NULL,
  `id_stadionu` int(11) DEFAULT NULL,
  `logo` text,
  `trener` text,
  PRIMARY KEY (`id_klubu`),
  KEY `id_ligi` (`id_ligi`),
  KEY `id_stadionu` (`id_stadionu`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=144 ;

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `liga`
--

CREATE TABLE IF NOT EXISTS `liga` (
  `id_ligi` int(11) NOT NULL AUTO_INCREMENT,
  `nazwa_ligi` text NOT NULL,
  `kraj` text NOT NULL,
  `logo` text NOT NULL,
  PRIMARY KEY (`id_ligi`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=6 ;

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `migration`
--

CREATE TABLE IF NOT EXISTS `migration` (
  `version` varchar(180) NOT NULL,
  `apply_time` int(11) DEFAULT NULL,
  PRIMARY KEY (`version`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `stadion`
--

CREATE TABLE IF NOT EXISTS `stadion` (
  `id_stadionu` int(11) NOT NULL AUTO_INCREMENT,
  `nazwa` text NOT NULL,
  `pojemnosc` text NOT NULL,
  `rok_wybudowania` year(4) NOT NULL,
  `zdjecie` text,
  PRIMARY KEY (`id_stadionu`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=2 ;

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `terminarz`
--

CREATE TABLE IF NOT EXISTS `terminarz` (
  `id_terminarza` int(11) NOT NULL AUTO_INCREMENT,
  `data` date NOT NULL,
  `godzina` time NOT NULL,
  `home` int(11) NOT NULL,
  `away` int(11) NOT NULL,
  `wynik` text NOT NULL,
  PRIMARY KEY (`id_terminarza`),
  UNIQUE KEY `away` (`away`),
  UNIQUE KEY `home` (`home`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `user`
--

CREATE TABLE IF NOT EXISTS `user` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `auth_key` varchar(32) COLLATE utf8_unicode_ci NOT NULL,
  `password_hash` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `password_reset_token` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `status` smallint(6) NOT NULL DEFAULT '10',
  `created_at` int(11) NOT NULL,
  `updated_at` int(11) NOT NULL,
  `role` int(11) NOT NULL DEFAULT '10',
  PRIMARY KEY (`id`),
  UNIQUE KEY `username` (`username`),
  UNIQUE KEY `email` (`email`),
  UNIQUE KEY `password_reset_token` (`password_reset_token`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=2 ;

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `zawodnik`
--

CREATE TABLE IF NOT EXISTS `zawodnik` (
  `id_zawodnika` int(11) NOT NULL AUTO_INCREMENT,
  `imie` text NOT NULL,
  `nazwisko` text NOT NULL,
  `id_klubu` int(11) NOT NULL,
  `pozycja` text NOT NULL,
  `wzrost` int(11) NOT NULL,
  `nr_koszulki` int(11) NOT NULL,
  `zdjecie` text,
  `kraj` text NOT NULL,
  PRIMARY KEY (`id_zawodnika`),
  KEY `id_klubu` (`id_klubu`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=19 ;

--
-- Ograniczenia dla zrzutów tabel
--

--
-- Ograniczenia dla tabeli `gol`
--
ALTER TABLE `gol`
  ADD CONSTRAINT `gol_ibfk_1` FOREIGN KEY (`id_terminarza`) REFERENCES `terminarz` (`id_terminarza`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `gol_ibfk_2` FOREIGN KEY (`id_strzelca`) REFERENCES `zawodnik` (`id_zawodnika`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `gol_ibfk_3` FOREIGN KEY (`id_asystenta`) REFERENCES `zawodnik` (`id_zawodnika`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ograniczenia dla tabeli `karta`
--
ALTER TABLE `karta`
  ADD CONSTRAINT `karta_ibfk_1` FOREIGN KEY (`id_terminarza`) REFERENCES `terminarz` (`id_terminarza`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ograniczenia dla tabeli `klub`
--
ALTER TABLE `klub`
  ADD CONSTRAINT `klub_ibfk_1` FOREIGN KEY (`id_ligi`) REFERENCES `liga` (`id_ligi`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `klub_ibfk_2` FOREIGN KEY (`id_stadionu`) REFERENCES `stadion` (`id_stadionu`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ograniczenia dla tabeli `terminarz`
--
ALTER TABLE `terminarz`
  ADD CONSTRAINT `terminarz_ibfk_1` FOREIGN KEY (`home`) REFERENCES `klub` (`id_klubu`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `terminarz_ibfk_2` FOREIGN KEY (`away`) REFERENCES `klub` (`id_klubu`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ograniczenia dla tabeli `zawodnik`
--
ALTER TABLE `zawodnik`
  ADD CONSTRAINT `zawodnik_ibfk_1` FOREIGN KEY (`id_klubu`) REFERENCES `klub` (`id_klubu`) ON DELETE CASCADE ON UPDATE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

ALTER TABLE gol AUTO_INCREMENT = 1;
ALTER TABLE karta AUTO_INCREMENT = 1;
ALTER TABLE klub AUTO_INCREMENT = 1;
ALTER TABLE liga AUTO_INCREMENT = 1;
ALTER TABLE migration AUTO_INCREMENT = 1;
ALTER TABLE stadion AUTO_INCREMENT = 1;
ALTER TABLE terminarz AUTO_INCREMENT = 1;
ALTER TABLE user AUTO_INCREMENT = 1;
ALTER TABLE zawodnik AUTO_INCREMENT = 1;