-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Gegenereerd op: 05 jun 2018 om 13:50
-- Serverversie: 10.1.30-MariaDB
-- PHP-versie: 7.2.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `hospital`
--

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `clients`
--

CREATE TABLE `clients` (
  `client_id` int(11) NOT NULL,
  `client_name` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Gegevens worden geëxporteerd voor tabel `clients`
--

INSERT INTO `clients` (`client_id`, `client_name`) VALUES
(9, 'John Doe'),
(10, 'Jane Doe'),
(12, 'Liam van Maaren');

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `patients`
--

CREATE TABLE `patients` (
  `patient_id` int(11) NOT NULL,
  `patient_name` varchar(50) DEFAULT NULL,
  `species_id` int(11) NOT NULL,
  `client_id` int(11) NOT NULL,
  `patient_status` text
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Gegevens worden geëxporteerd voor tabel `patients`
--

INSERT INTO `patients` (`patient_id`, `patient_name`, `species_id`, `client_id`, `patient_status`) VALUES
(1, 'Bobbie', 1, 9, 'Koorts, eet slecht, blaft veel te veel'),
(9, 'Minoes', 2, 10, 'Drinkt niet, haaruitval, mager'),
(10, 'Kees', 1, 9, 'Eet te veel, vetzucht, jankt en kotst'),
(12, 'Check', 5, 9, 'test');

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `species`
--

CREATE TABLE `species` (
  `species_id` int(11) NOT NULL,
  `species_description` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Gegevens worden geëxporteerd voor tabel `species`
--

INSERT INTO `species` (`species_id`, `species_description`) VALUES
(1, 'Hond'),
(2, 'Kat'),
(5, 'Yestin'),
(6, 'Hoi'),
(7, 'Vis');

--
-- Indexen voor geëxporteerde tabellen
--

--
-- Indexen voor tabel `clients`
--
ALTER TABLE `clients`
  ADD PRIMARY KEY (`client_id`);

--
-- Indexen voor tabel `patients`
--
ALTER TABLE `patients`
  ADD PRIMARY KEY (`patient_id`),
  ADD KEY `species_id` (`species_id`),
  ADD KEY `client_id` (`client_id`);

--
-- Indexen voor tabel `species`
--
ALTER TABLE `species`
  ADD PRIMARY KEY (`species_id`);

--
-- AUTO_INCREMENT voor geëxporteerde tabellen
--

--
-- AUTO_INCREMENT voor een tabel `clients`
--
ALTER TABLE `clients`
  MODIFY `client_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT voor een tabel `patients`
--
ALTER TABLE `patients`
  MODIFY `patient_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT voor een tabel `species`
--
ALTER TABLE `species`
  MODIFY `species_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
