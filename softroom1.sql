-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Värd: 127.0.0.1
-- Tid vid skapande: 17 jan 2024 kl 09:58
-- Serverversion: 10.4.28-MariaDB
-- PHP-version: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Databas: `softroom`
--

-- --------------------------------------------------------

--
-- Tabellstruktur `användare`
--

CREATE TABLE `användare` (
  `användarID` int(11) NOT NULL,
  `namnID` int(11) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `rollID` tinyint(4) DEFAULT NULL,
  `efternamnID` int(11) DEFAULT NULL,
  `personNummer` varchar(16) DEFAULT NULL,
  `lösenord` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumpning av Data i tabell `användare`
--

INSERT INTO `användare` (`användarID`, `namnID`, `email`, `rollID`, `efternamnID`, `personNummer`, `lösenord`) VALUES
(19, 14, 'Big@Big.Big', 2, 15, '11111111-0000', '5c322d4b606d774bdfbd7f31fdec6015634410c6');

-- --------------------------------------------------------

--
-- Tabellstruktur `inlämningar`
--

CREATE TABLE `inlämningar` (
  `inlämningID` int(11) NOT NULL,
  `användarID` int(11) DEFAULT NULL,
  `uppgiftID` int(11) DEFAULT NULL,
  `datum` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Tabellstruktur `inskrivningklass`
--

CREATE TABLE `inskrivningklass` (
  `klassID` int(11) DEFAULT NULL,
  `användarID` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumpning av Data i tabell `inskrivningklass`
--

INSERT INTO `inskrivningklass` (`klassID`, `användarID`) VALUES
(1, 6);

-- --------------------------------------------------------

--
-- Tabellstruktur `inskrivningkurs`
--

CREATE TABLE `inskrivningkurs` (
  `kursInskrivningID` int(11) NOT NULL,
  `användarID` int(11) DEFAULT NULL,
  `kursID` int(11) DEFAULT NULL,
  `betyg` char(1) DEFAULT NULL,
  `matrisVärden` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumpning av Data i tabell `inskrivningkurs`
--

INSERT INTO `inskrivningkurs` (`kursInskrivningID`, `användarID`, `kursID`, `betyg`, `matrisVärden`) VALUES
(83, 19, 39, NULL, NULL);

-- --------------------------------------------------------

--
-- Tabellstruktur `klass`
--

CREATE TABLE `klass` (
  `klassID` int(11) NOT NULL,
  `klass` varchar(50) DEFAULT NULL,
  `mentor1` int(11) DEFAULT NULL,
  `mentor2` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumpning av Data i tabell `klass`
--

INSERT INTO `klass` (`klassID`, `klass`, `mentor1`, `mentor2`) VALUES
(1, 'TE5', 4, 5);

-- --------------------------------------------------------

--
-- Tabellstruktur `klassschema`
--

CREATE TABLE `klassschema` (
  `eventID` int(11) NOT NULL,
  `lektionID` int(11) DEFAULT NULL,
  `startTid` datetime DEFAULT NULL,
  `slutTid` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Tabellstruktur `kravinskrivningar`
--

CREATE TABLE `kravinskrivningar` (
  `kravinskrivningID` int(11) NOT NULL,
  `kravID` int(11) NOT NULL,
  `kursID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumpning av Data i tabell `kravinskrivningar`
--

INSERT INTO `kravinskrivningar` (`kravinskrivningID`, `kravID`, `kursID`) VALUES
(4, 7, 39),
(5, 7, 39),
(6, 7, 39);

-- --------------------------------------------------------

--
-- Tabellstruktur `kunskapskrav`
--

CREATE TABLE `kunskapskrav` (
  `kunskapskravID` int(11) NOT NULL,
  `krav` longtext NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumpning av Data i tabell `kunskapskrav`
--

INSERT INTO `kunskapskrav` (`kunskapskravID`, `krav`) VALUES
(7, 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.');

-- --------------------------------------------------------

--
-- Tabellstruktur `kurs`
--

CREATE TABLE `kurs` (
  `kursID` int(11) NOT NULL,
  `namnID` int(11) DEFAULT NULL,
  `aktiv` bit(1) DEFAULT NULL,
  `picture` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumpning av Data i tabell `kurs`
--

INSERT INTO `kurs` (`kursID`, `namnID`, `aktiv`, `picture`) VALUES
(39, 20, b'1', 'bild1');

-- --------------------------------------------------------

--
-- Tabellstruktur `ledighetsansökningar`
--

CREATE TABLE `ledighetsansökningar` (
  `ledighetsansökningID` int(11) NOT NULL,
  `användarID` int(11) NOT NULL,
  `startDatum` datetime NOT NULL,
  `slutDatum` datetime NOT NULL,
  `information` text DEFAULT NULL,
  `status` bit(1) DEFAULT NULL,
  `skapad` datetime DEFAULT NULL,
  `svaradAv` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumpning av Data i tabell `ledighetsansökningar`
--

INSERT INTO `ledighetsansökningar` (`ledighetsansökningID`, `användarID`, `startDatum`, `slutDatum`, `information`, `status`, `skapad`, `svaradAv`) VALUES
(1, 7, '2023-11-27 13:47:04', '2023-11-30 13:47:04', 'Jag vill inte kommqa till skola nfuck er och eran utbilödning', b'1', '2023-11-27 13:47:04', NULL),
(2, 7, '2023-11-10 00:00:00', '2023-11-22 00:00:00', 'dddd', b'1', '2023-11-29 14:54:03', NULL),
(3, 7, '2023-11-30 00:00:00', '2023-12-09 00:00:00', 'ledigt tack', b'0', '2023-11-29 14:57:49', NULL),
(4, 7, '2023-12-14 00:00:00', '2023-12-22 00:00:00', 'shit pommes', NULL, '2023-12-01 09:21:44', NULL),
(5, 7, '2023-12-14 00:00:00', '2023-12-22 00:00:00', 'shit pommes', NULL, '2023-12-01 09:21:57', NULL),
(6, 7, '2023-12-14 00:00:00', '2023-12-22 00:00:00', 'shit pommes', NULL, '2023-12-01 09:22:02', NULL),
(7, 7, '2023-12-14 00:00:00', '2023-12-22 00:00:00', 'shit pommes', NULL, '2023-12-01 09:22:12', NULL),
(8, 7, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '', NULL, '2023-12-01 09:22:39', NULL),
(9, 7, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '', NULL, '2023-12-01 09:22:46', NULL),
(10, 7, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '', NULL, '2023-12-01 09:22:47', NULL),
(11, 7, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '', NULL, '2023-12-01 09:22:48', NULL),
(12, 7, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '', NULL, '2023-12-01 09:22:55', NULL),
(13, 7, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '', NULL, '2023-12-01 09:23:05', NULL),
(14, 7, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 'fffff', NULL, '2023-12-01 09:27:28', NULL),
(15, 7, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 'ddd', NULL, '2023-12-01 09:29:17', NULL),
(16, 7, '2023-12-14 00:00:00', '2023-12-21 00:00:00', 'sssd', NULL, '2023-12-01 09:30:07', NULL),
(17, 7, '2023-12-02 00:00:00', '2023-12-03 00:00:00', 'nej', NULL, '2023-12-01 13:10:43', NULL),
(18, 7, '2023-12-07 00:00:00', '2023-12-14 00:00:00', 'orkar inte komma', NULL, '2023-12-01 15:32:13', NULL),
(19, 7, '2023-12-05 00:00:00', '2023-12-06 00:00:00', 'lol', NULL, '2023-12-04 09:23:28', NULL);

-- --------------------------------------------------------

--
-- Tabellstruktur `lektion`
--

CREATE TABLE `lektion` (
  `lektionID` int(11) NOT NULL,
  `kursID` int(11) DEFAULT NULL,
  `sal` tinytext DEFAULT NULL,
  `startTid` datetime DEFAULT NULL,
  `slutTid` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Tabellstruktur `namn`
--

CREATE TABLE `namn` (
  `namnID` int(11) NOT NULL,
  `namn` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumpning av Data i tabell `namn`
--

INSERT INTO `namn` (`namnID`, `namn`) VALUES
(1, 'Linus'),
(2, 'Anders'),
(3, 'Lindbäck'),
(4, 'Ludwig'),
(5, 'Gustavsson'),
(6, 'Programmering 1'),
(7, 'Programmering 2'),
(8, 'Tillämpad programmering'),
(9, 'Gymnasieingeniör i praktiken'),
(10, 'AI 1'),
(11, 'AI 2'),
(12, 'WALLA'),
(13, 'matte1'),
(14, 'Erwin'),
(15, 'Hörnell'),
(16, 'the'),
(17, 'goat'),
(20, 'test');

-- --------------------------------------------------------

--
-- Tabellstruktur `närvaro`
--

CREATE TABLE `närvaro` (
  `användarID` int(11) DEFAULT NULL,
  `lektionID` int(11) DEFAULT NULL,
  `frånvaroILektionen` smallint(6) DEFAULT NULL,
  `gitlitgFrånvaro` smallint(6) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Tabellstruktur `roll`
--

CREATE TABLE `roll` (
  `rollID` tinyint(4) NOT NULL,
  `roll` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumpning av Data i tabell `roll`
--

INSERT INTO `roll` (`rollID`, `roll`) VALUES
(1, 'elev'),
(2, 'lärare'),
(3, 'admin');

-- --------------------------------------------------------

--
-- Tabellstruktur `uppgifter`
--

CREATE TABLE `uppgifter` (
  `uppgiftID` int(11) NOT NULL,
  `kursID` int(11) DEFAULT NULL,
  `namnID` int(11) DEFAULT NULL,
  `titel` varchar(255) NOT NULL,
  `beskrivningText` varchar(255) DEFAULT NULL,
  `inlämningsDatum` datetime DEFAULT NULL,
  `inlämnad` bit(1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumpning av Data i tabell `uppgifter`
--

INSERT INTO `uppgifter` (`uppgiftID`, `kursID`, `namnID`, `titel`, `beskrivningText`, `inlämningsDatum`, `inlämnad`) VALUES
(1, 1, 5, 'Det var fryx på fest', 'Finns det 1080p skärmar som är 4k? ', '2023-12-15 00:00:00', b'0'),
(2, NULL, NULL, 'hej hej', 'gg game', '2023-12-07 00:00:00', NULL);

--
-- Index för dumpade tabeller
--

--
-- Index för tabell `användare`
--
ALTER TABLE `användare`
  ADD PRIMARY KEY (`användarID`),
  ADD KEY `fk_namnID_Anvandare` (`namnID`),
  ADD KEY `fk_rollID_Anvandare` (`rollID`),
  ADD KEY `fk_efternamnID_Anvandare` (`efternamnID`);

--
-- Index för tabell `inlämningar`
--
ALTER TABLE `inlämningar`
  ADD PRIMARY KEY (`inlämningID`),
  ADD KEY `fk_AnvandarID_Inlamningar` (`användarID`),
  ADD KEY `fk_uppgiftID_Inlamningar` (`uppgiftID`);

--
-- Index för tabell `inskrivningklass`
--
ALTER TABLE `inskrivningklass`
  ADD KEY `fk_KlassID_inskrivningklass` (`klassID`),
  ADD KEY `fk_anvandarID_inskrivningklass` (`användarID`);

--
-- Index för tabell `inskrivningkurs`
--
ALTER TABLE `inskrivningkurs`
  ADD PRIMARY KEY (`kursInskrivningID`),
  ADD KEY `fk_KursID_inskrivningkurs` (`kursID`),
  ADD KEY `fk_ElevID_inskrivningkurs` (`användarID`) USING BTREE;

--
-- Index för tabell `klass`
--
ALTER TABLE `klass`
  ADD PRIMARY KEY (`klassID`),
  ADD KEY `KlassID` (`klassID`),
  ADD KEY `KlassID_2` (`klassID`);

--
-- Index för tabell `klassschema`
--
ALTER TABLE `klassschema`
  ADD PRIMARY KEY (`eventID`),
  ADD KEY `fk_lektionID_Schema` (`lektionID`);

--
-- Index för tabell `kravinskrivningar`
--
ALTER TABLE `kravinskrivningar`
  ADD PRIMARY KEY (`kravinskrivningID`);

--
-- Index för tabell `kunskapskrav`
--
ALTER TABLE `kunskapskrav`
  ADD PRIMARY KEY (`kunskapskravID`);

--
-- Index för tabell `kurs`
--
ALTER TABLE `kurs`
  ADD PRIMARY KEY (`kursID`),
  ADD KEY `fk_namnID_Kurs` (`namnID`);

--
-- Index för tabell `ledighetsansökningar`
--
ALTER TABLE `ledighetsansökningar`
  ADD PRIMARY KEY (`ledighetsansökningID`);

--
-- Index för tabell `lektion`
--
ALTER TABLE `lektion`
  ADD PRIMARY KEY (`lektionID`),
  ADD KEY `fk_kursID_Lektion` (`kursID`),
  ADD KEY `fk_namnID_Lektion` (`sal`(255));

--
-- Index för tabell `namn`
--
ALTER TABLE `namn`
  ADD PRIMARY KEY (`namnID`);

--
-- Index för tabell `närvaro`
--
ALTER TABLE `närvaro`
  ADD KEY `fk_AnvandarID_Narvaro` (`användarID`),
  ADD KEY `fk_lektionID_Narvaro` (`lektionID`);

--
-- Index för tabell `roll`
--
ALTER TABLE `roll`
  ADD PRIMARY KEY (`rollID`);

--
-- Index för tabell `uppgifter`
--
ALTER TABLE `uppgifter`
  ADD PRIMARY KEY (`uppgiftID`),
  ADD KEY `fk_kursID_Uppgifter` (`kursID`),
  ADD KEY `fk_namnID_Uppgifter` (`namnID`);

--
-- AUTO_INCREMENT för dumpade tabeller
--

--
-- AUTO_INCREMENT för tabell `användare`
--
ALTER TABLE `användare`
  MODIFY `användarID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT för tabell `inlämningar`
--
ALTER TABLE `inlämningar`
  MODIFY `inlämningID` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT för tabell `inskrivningkurs`
--
ALTER TABLE `inskrivningkurs`
  MODIFY `kursInskrivningID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=84;

--
-- AUTO_INCREMENT för tabell `klass`
--
ALTER TABLE `klass`
  MODIFY `klassID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT för tabell `klassschema`
--
ALTER TABLE `klassschema`
  MODIFY `eventID` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT för tabell `kravinskrivningar`
--
ALTER TABLE `kravinskrivningar`
  MODIFY `kravinskrivningID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT för tabell `kunskapskrav`
--
ALTER TABLE `kunskapskrav`
  MODIFY `kunskapskravID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT för tabell `kurs`
--
ALTER TABLE `kurs`
  MODIFY `kursID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=40;

--
-- AUTO_INCREMENT för tabell `ledighetsansökningar`
--
ALTER TABLE `ledighetsansökningar`
  MODIFY `ledighetsansökningID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT för tabell `lektion`
--
ALTER TABLE `lektion`
  MODIFY `lektionID` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT för tabell `namn`
--
ALTER TABLE `namn`
  MODIFY `namnID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT för tabell `roll`
--
ALTER TABLE `roll`
  MODIFY `rollID` tinyint(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT för tabell `uppgifter`
--
ALTER TABLE `uppgifter`
  MODIFY `uppgiftID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- Restriktioner för dumpade tabeller
--

--
-- Restriktioner för tabell `användare`
--
ALTER TABLE `användare`
  ADD CONSTRAINT `fk_efternamnID_Anvandare` FOREIGN KEY (`efternamnID`) REFERENCES `namn` (`namnID`),
  ADD CONSTRAINT `fk_namnID_Anvandare` FOREIGN KEY (`namnID`) REFERENCES `namn` (`namnID`),
  ADD CONSTRAINT `fk_rollID_Anvandare` FOREIGN KEY (`rollID`) REFERENCES `roll` (`rollID`);

--
-- Restriktioner för tabell `kurs`
--
ALTER TABLE `kurs`
  ADD CONSTRAINT `fk_namnID_Kurs` FOREIGN KEY (`namnID`) REFERENCES `namn` (`namnID`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
