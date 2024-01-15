-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Värd: 127.0.0.1
-- Tid vid skapande: 15 jan 2024 kl 09:48
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
  `personNummer` varchar(16) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumpning av Data i tabell `användare`
--

INSERT INTO `användare` (`användarID`, `namnID`, `email`, `rollID`, `efternamnID`, `personNummer`) VALUES
(4, 2, 'test@mail.com', 1, 3, '1234567890'),
(5, 1, 'mail@mail.com', 1, 2, '1234567890'),
(6, 4, 'mail@mail.mail', 2, 5, '1234567890');

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
-- Tabellstruktur `inskriving_kurs`
--

CREATE TABLE `inskriving_kurs` (
  `kursInskrivningID` int(11) NOT NULL,
  `elevID` int(11) DEFAULT NULL,
  `kursID` int(11) DEFAULT NULL,
  `betyg` char(1) DEFAULT NULL,
  `matrisVärden` varchar(50) DEFAULT NULL,
  `matris` varchar(255) DEFAULT NULL,
  `martistext1` varchar(2000) DEFAULT NULL,
  `martistext2` varchar(2000) DEFAULT NULL,
  `martistext3` varchar(2000) DEFAULT NULL,
  `selectedSubject` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumpning av Data i tabell `inskriving_kurs`
--

INSERT INTO `inskriving_kurs` (`kursInskrivningID`, `elevID`, `kursID`, `betyg`, `matrisVärden`, `matris`, `martistext1`, `martistext2`, `martistext3`, `selectedSubject`) VALUES
(44, NULL, NULL, 'C', NULL, NULL, 'Svenska - Nivå E:Läsning och förståelse:Kunna förstå och tolka enklare texter på svenska.Identifiera huvudidéer och viktig information i texter.Använda grundläggande ordförråd för att förstå och uttrycka sig.Skrivning:Kunna formulera enkla meningar och korta texter på svenska.Använda grundläggande ordförråd och grammatik.Muntlig kommunikation:Deltagande i enkla muntliga konversationer med grundläggande ordförråd och uttal.', 'Svenska - Nivå C:Läsning och förståelse:Kunna förstå och tolka enklare texter på svenska.Identifiera huvudidéer och viktig information i texter.Använda grundläggande ordförråd för att förstå och uttrycka sig.Skrivning:Kunna formulera enkla meningar och korta texter på svenska.Använda grundläggande ordförråd och grammatik.Muntlig kommunikation:Deltagande i enkla muntliga konversationer med grundläggande ordförråd och uttal.', 'Svenska - Nivå A:Läsning och förståelse:Kunna förstå och tolka enklare texter på svenska.Identifiera huvudidéer och viktig information i texter.Använda grundläggande ordförråd för att förstå och uttrycka sig.Skrivning:Kunna formulera enkla meningar och korta texter på svenska.Använda grundläggande ordförråd och grammatik.Muntlig kommunikation:Deltagande i enkla muntliga konversationer med grundläggande ordförråd och uttal.', 'Svenska'),
(45, NULL, NULL, 'B', NULL, NULL, 'Engelska - Nivå E:Läsning och förståelse:Förstå enkla texter på engelska.Identifiera huvudidéer och viktig information i texter.Identifiera grundläggande information och huvudidéer i texterna.Skrivning:Kunna formulera enkla meningar och korta texter på engelska.Använda grundläggande ordförråd och grammatik.Muntlig kommunikation:\n  Deltagande i enkla muntliga konversationer med grundläggande ordförråd och uttal.', 'Engelska - Nivå C:Läsning och förståelse:Förstå enkla texter på engelska.Identifiera huvudidéer och viktig information i texter.Identifiera grundläggande information och huvudidéer i texterna.Skrivning:Kunna formulera enkla meningar och korta texter på engelska.Använda grundläggande ordförråd och grammatik.Muntlig kommunikation:\n  Deltagande i enkla muntliga konversationer med grundläggande ordförråd och uttal.', 'Engelska - Nivå A:Läsning och förståelse:Förstå enkla texter på engelska.Identifiera huvudidéer och viktig information i texter.Identifiera grundläggande information och huvudidéer i texterna.Skrivning:Kunna formulera enkla meningar och korta texter på engelska.Använda grundläggande ordförråd och grammatik.Muntlig kommunikation:\n  Deltagande i enkla muntliga konversationer med grundläggande ordförråd och uttal.', 'Engelska'),
(46, NULL, NULL, 'D', NULL, NULL, '<h2>Matematik - Nivå E:</h2><br>\n<h3>Problemlösning och analys:</h3>\n\n<br>\nKunna lösa enkla matematiska problem och analysera dem.\n<br>\nIdentifiera grundläggande matematiska begrepp och relationer.\n\n<br>Använda grundläggande matematiskt språk för att förstå och beskriva problem och lösningar.\n<br>\n\n<h3>Beräkning och mätning:</h3><br>\n\nKunna utföra enkla beräkningar och mätningar inom matematik.\n<br>\nAnvända grundläggande matematiska operationer och mättekniker.\n<br>\n\n<h3>Muntlig och skriftlig kommunikation:<br></h3>\n  Deltagande i enkla muntliga och skriftliga diskussioner inom matematik med användning av grundläggande matematiska begrepp och uttrycksformer.\n\n<br>\n<br>', '<h2>Matematik - Nivå C:</h2><br>\n<h3>Problemlösning och analys:</h3>\n\n<br>\nKunna lösa enkla matematiska problem och analysera dem.\n<br>\nIdentifiera grundläggande matematiska begrepp och relationer.\n\n<br>Använda grundläggande matematiskt språk för att förstå och beskriva problem och lösningar.\n<br>\n\n<h3>Beräkning och mätning:</h3><br>\n\nKunna utföra enkla beräkningar och mätningar inom matematik.\n<br>\nAnvända grundläggande matematiska operationer och mättekniker.\n<br>\n\n<h3>Muntlig och skriftlig kommunikation:<br></h3>\n  Deltagande i enkla muntliga och skriftliga diskussioner inom matematik med användning av grundläggande matematiska begrepp och uttrycksformer.\n\n<br>\n<br>', '<h2>Matematik - Nivå A:</h2><br>\n<h3>Problemlösning och analys:</h3>\n\n<br>\nKunna lösa enkla matematiska problem och analysera dem.\n<br>\nIdentifiera grundläggande matematiska begrepp och relationer.\n\n<br>Använda grundläggande matematiskt språk för att förstå och beskriva problem och lösningar.\n<br>\n\n<h3>Beräkning och mätning:</h3><br>\n\nKunna utföra enkla beräkningar och mätningar inom matematik.\n<br>\nAnvända grundläggande matematiska operationer och mättekniker.\n<br>\n\n<h3>Muntlig och skriftlig kommunikation:<br></h3>\n  Deltagande i enkla muntliga och skriftliga diskussioner inom matematik med användning av grundläggande matematiska begrepp och uttrycksformer.\n\n<br>\n<br>', 'Matte'),
(47, NULL, NULL, 'F', NULL, NULL, '<h2>Fysik - Nivå E:</h2><br>\n<h3>Läsning och förståelse:</h3>\n\n<br>\nKunna förstå och tolka enklare texter inom fysik.\n<br>\nIdentifiera huvudidéer och viktig information i fysikaliska texter.\n\n<br>Använda grundläggande facktermer för att förstå och uttrycka sig inom fysik.\n<br>\n\n<h3>Skrivning:</h3><br>\n\nKunna formulera enkla satser och korta texter inom fysik.\n<br>\nAnvända grundläggande facktermer och grammatik inom fysik.\n<br>\n\n<h3>Muntlig kommunikation:<br></h3>\n  Deltagande i enkla muntliga konversationer inom fysik med grundläggande facktermer och uttal.\n\n<br>\n<br>', '<h2>Fysik - Nivå C:</h2><br>\n<h3>Läsning och förståelse:</h3>\n\n<br>\nKunna förstå och tolka enklare texter inom fysik.\n<br>\nIdentifiera huvudidéer och viktig information i fysikaliska texter.\n\n<br>Använda grundläggande facktermer för att förstå och uttrycka sig inom fysik.\n<br>\n\n<h3>Skrivning:</h3><br>\n\nKunna formulera enkla satser och korta texter inom fysik.\n<br>\nAnvända grundläggande facktermer och grammatik inom fysik.\n<br>\n\n<h3>Muntlig kommunikation:<br></h3>\n  Deltagande i enkla muntliga konversationer inom fysik med grundläggande facktermer och uttal.\n\n<br>\n<br>', '<h2>Fysik - Nivå A:</h2><br>\n<h3>Läsning och förståelse:</h3>\n\n<br>\nKunna förstå och tolka enklare texter inom fysik.\n<br>\nIdentifiera huvudidéer och viktig information i fysikaliska texter.\n\n<br>Använda grundläggande facktermer för att förstå och uttrycka sig inom fysik.\n<br>\n\n<h3>Skrivning:</h3><br>\n\nKunna formulera enkla satser och korta texter inom fysik.\n<br>\nAnvända grundläggande facktermer och grammatik inom fysik.\n<br>\n\n<h3>Muntlig kommunikation:<br></h3>\n  Deltagande i enkla muntliga konversationer inom fysik med grundläggande facktermer och uttal.\n\n<br>\n<br>', 'Fysik'),
(48, NULL, NULL, 'A', NULL, NULL, '<h2> Samhällskunskap - Nivå E:</h2><br>\n<h3>Läsning och förståelse:</h3><br>\nKunna förstå och tolka enklare texter inom samhällskunskap.\n<br>\nIdentifiera huvudidéer och viktig information i samhällskunskapliga texter.\n<br>\nAnvända grundläggande begrepp och termer för att förstå och tolka texterna.\n<br>\n\n<h3>Skrivning:</h3><br>\n\nKunna formulera enkla meningar och korta texter inom samhällskunskap.\n<br>\nAnvända grundläggande begrepp och grammatik inom samhällskunskap.\n<br>\n\n<h3>Muntlig kommunikation:<br></h3>\n  Deltagande i enkla muntliga konversationer inom samhällskunskap med grundläggande begrepp, ordförråd och uttal.\n<br><br>', '<h2> Samhällskunskap - Nivå C:</h2><br>\n<h3>Läsning och förståelse:</h3><br>\nKunna förstå och tolka enklare texter inom samhällskunskap.\n<br>\nIdentifiera huvudidéer och viktig information i samhällskunskapliga texter.\n<br>\nAnvända grundläggande begrepp och termer för att förstå och tolka texterna.\n<br>\n\n<h3>Skrivning:</h3><br>\n\nKunna formulera enkla meningar och korta texter inom samhällskunskap.\n<br>\nAnvända grundläggande begrepp och grammatik inom samhällskunskap.\n<br>\n\n<h3>Muntlig kommunikation:<br></h3>\n  Deltagande i enkla muntliga konversationer inom samhällskunskap med grundläggande begrepp, ordförråd och uttal.\n<br><br>', '<h2> Samhällskunskap - Nivå A:</h2><br>\n<h3>Läsning och förståelse:</h3><br>\nKunna förstå och tolka enklare texter inom samhällskunskap.\n<br>\nIdentifiera huvudidéer och viktig information i samhällskunskapliga texter.\n<br>\nAnvända grundläggande begrepp och termer för att förstå och tolka texterna.\n<br>\n\n<h3>Skrivning:</h3><br>\n\nKunna formulera enkla meningar och korta texter inom samhällskunskap.\n<br>\nAnvända grundläggande begrepp och grammatik inom samhällskunskap.\n<br>\n\n<h3>Muntlig kommunikation:<br></h3>\n  Deltagande i enkla muntliga konversationer inom samhällskunskap med grundläggande begrepp, ordförråd och uttal.\n<br><br>', 'Samhällskunskap'),
(49, NULL, NULL, 'E', NULL, NULL, '<h2> Biologi - Nivå E:</h2><br>\n<h3>Läsning och förståelse:</h3>\n\n<br>\nKunna förstå och tolka enklare biologiska texter på svenska.\n<br>\nIdentifiera huvudidéer och viktig information inom biologiska ämnen.\n\n<br>Använda grundläggande biologiskt ordförråd för att förstå och uttrycka sig.\n<br>\n\n<h3>Skrivning inom biologi:</h3><br>\n\nKunna formulera enkla meningar och korta texter om biologiska ämnen på svenska.\n<br>\nAnvända grundläggande biologiskt ordförråd och grammatik.\n<br>\n\n<h3>Muntlig kommunikation inom biologi:<br></h3>\n  Deltagande i enkla muntliga konversationer om biologiska ämnen med grundläggande ordförråd och uttal.\n\n<br>\n<br>', '<h2> Biologi - Nivå C:</h2><br>\n<h3>Läsning och förståelse:</h3>\n\n<br>\nKunna förstå och tolka enklare biologiska texter på svenska.\n<br>\nIdentifiera huvudidéer och viktig information inom biologiska ämnen.\n\n<br>Använda grundläggande biologiskt ordförråd för att förstå och uttrycka sig.\n<br>\n\n<h3>Skrivning inom biologi:</h3><br>\n\nKunna formulera enkla meningar och korta texter om biologiska ämnen på svenska.\n<br>\nAnvända grundläggande biologiskt ordförråd och grammatik.\n<br>\n\n<h3>Muntlig kommunikation inom biologi:<br></h3>\n  Deltagande i enkla muntliga konversationer om biologiska ämnen med grundläggande ordförråd och uttal.\n\n<br>\n<br>', '<h2> Biologi - Nivå A:</h2><br>\n<h3>Läsning och förståelse:</h3>\n\n<br>\nKunna förstå och tolka enklare biologiska texter på svenska.\n<br>\nIdentifiera huvudidéer och viktig information inom biologiska ämnen.\n\n<br>Använda grundläggande biologiskt ordförråd för att förstå och uttrycka sig.\n<br>\n\n<h3>Skrivning inom biologi:</h3><br>\n\nKunna formulera enkla meningar och korta texter om biologiska ämnen på svenska.\n<br>\nAnvända grundläggande biologiskt ordförråd och grammatik.\n<br>\n\n<h3>Muntlig kommunikation inom biologi:<br></h3>\n  Deltagande i enkla muntliga konversationer om biologiska ämnen med grundläggande ordförråd och uttal.\n\n<br>\n<br>', 'Biologi'),
(50, NULL, NULL, 'D', NULL, NULL, '<h2> Kemi - Nivå E:</h2><br>\n<h3>Läsning och förståelse:</h3>\n\n<br>\nKunna förstå och tolka enklare texter om kemi.\n<br>\nIdentifiera huvudidéer och viktig information i texter om kemi.\n\n<br>Använda grundläggande ordförråd relaterat till kemi för att förstå och uttrycka sig.\n<br>\n\n<h3>Skrivning:</h3><br>\n\nKunna formulera enkla meningar och korta texter om kemi.\n<br>\nAnvända grundläggande ordförråd och grammatik relaterat till kemi.\n<br>\n\n<h3>Muntlig kommunikation:<br></h3>\n  Deltagande i enkla muntliga konversationer om kemi med grundläggande ordförråd och uttal.\n\n<br>\n<br>', '<h2> Kemi - Nivå C:</h2><br>\n<h3>Läsning och förståelse:</h3>\n\n<br>\nKunna förstå och tolka enklare texter om kemi.\n<br>\nIdentifiera huvudidéer och viktig information i texter om kemi.\n\n<br>Använda grundläggande ordförråd relaterat till kemi för att förstå och uttrycka sig.\n<br>\n\n<h3>Skrivning:</h3><br>\n\nKunna formulera enkla meningar och korta texter om kemi.\n<br>\nAnvända grundläggande ordförråd och grammatik relaterat till kemi.\n<br>\n\n<h3>Muntlig kommunikation:<br></h3>\n  Deltagande i enkla muntliga konversationer om kemi med grundläggande ordförråd och uttal.\n\n<br>\n<br>', '<h2> Kemi - Nivå A:</h2><br>\n<h3>Läsning och förståelse:</h3>\n\n<br>\nKunna förstå och tolka enklare texter om kemi.\n<br>\nIdentifiera huvudidéer och viktig information i texter om kemi.\n\n<br>Använda grundläggande ordförråd relaterat till kemi för att förstå och uttrycka sig.\n<br>\n\n<h3>Skrivning:</h3><br>\n\nKunna formulera enkla meningar och korta texter om kemi.\n<br>\nAnvända grundläggande ordförråd och grammatik relaterat till kemi.\n<br>\n\n<h3>Muntlig kommunikation:<br></h3>\n  Deltagande i enkla muntliga konversationer om kemi med grundläggande ordförråd och uttal.\n\n<br>\n<br>', 'Kemi'),
(51, NULL, NULL, 'A', NULL, NULL, '<h2>Idrott - Nivå E:</h2><br>\n<h3>Läsning och förståelse:</h3>\n\n<br>\nKunna förstå och tolka enklare texter om olika idrotter och dess regler på svenska.\n<br>\nIdentifiera huvudidéer och viktig information i texter om träning och hälsa.\n<br>Använda grundläggande ordförråd för att förstå och uttrycka sig inom idrottsrelaterade ämnen.\n<br>\n\n<h3>Skrivning:</h3><br>\n\nKunna formulera enkla meningar och korta texter om olika idrotter, träning och hälsa på svenska.\n<br>\nAnvända grundläggande ordförråd och grammatik inom idrottsrelaterade ämnen.\n<br>\n\n<h3>Muntlig kommunikation:<br></h3>\n  Deltagande i enkla muntliga konversationer om olika idrotter, träning och hälsa med grundläggande ordförråd och uttal.\n\n<br>\n<br>', '<h2>Idrott - Nivå C:</h2><br>\n<h3>Läsning och förståelse:</h3>\n\n<br>\nKunna förstå och tolka enklare texter om olika idrotter och dess regler på svenska.\n<br>\nIdentifiera huvudidéer och viktig information i texter om träning och hälsa.\n<br>Använda grundläggande ordförråd för att förstå och uttrycka sig inom idrottsrelaterade ämnen.\n<br>\n\n<h3>Skrivning:</h3><br>\n\nKunna formulera enkla meningar och korta texter om olika idrotter, träning och hälsa på svenska.\n<br>\nAnvända grundläggande ordförråd och grammatik inom idrottsrelaterade ämnen.\n<br>\n\n<h3>Muntlig kommunikation:<br></h3>\n  Deltagande i enkla muntliga konversationer om olika idrotter, träning och hälsa med grundläggande ordförråd och uttal.\n\n<br>\n<br>', '<h2>Idrott - Nivå A:</h2><br>\n<h3>Läsning och förståelse:</h3>\n\n<br>\nKunna förstå och tolka enklare texter om olika idrotter och dess regler på svenska.\n<br>\nIdentifiera huvudidéer och viktig information i texter om träning och hälsa.\n<br>Använda grundläggande ordförråd för att förstå och uttrycka sig inom idrottsrelaterade ämnen.\n<br>\n\n<h3>Skrivning:</h3><br>\n\nKunna formulera enkla meningar och korta texter om olika idrotter, träning och hälsa på svenska.\n<br>\nAnvända grundläggande ordförråd och grammatik inom idrottsrelaterade ämnen.\n<br>\n\n<h3>Muntlig kommunikation:<br></h3>\n  Deltagande i enkla muntliga konversationer om olika idrotter, träning och hälsa med grundläggande ordförråd och uttal.\n\n<br>\n<br>', 'Idrott'),
(52, NULL, NULL, 'B', NULL, NULL, '<h2>Musik - Nivå E:</h2><br>\n<h3>Läsning och förståelse:</h3>\n\n<br>\nKunna förstå och tolka enklare texter om musik.\n<br>\nIdentifiera huvudidéer och viktig information om musik i texter.\n\n<br>Använda grundläggande musikrelaterade termer för att förstå och uttrycka sig om musik.\n<br>\n\n<h3>Skrivning:</h3><br>\n\nKunna formulera enkla meningar och korta texter om musik.\n<br>\nAnvända grundläggande musikrelaterade termer och grammatik.\n<br>\n\n<h3>Muntlig kommunikation:<br></h3>\n  Deltagande i enkla muntliga konversationer om musik med grundläggande musikrelaterade termer och uttal.\n\n<br>\n<br>', '<h2>Musik - Nivå C:</h2><br>\n<h3>Läsning och förståelse:</h3>\n\n<br>\nKunna förstå och tolka enklare texter om musik.\n<br>\nIdentifiera huvudidéer och viktig information om musik i texter.\n\n<br>Använda grundläggande musikrelaterade termer för att förstå och uttrycka sig om musik.\n<br>\n\n<h3>Skrivning:</h3><br>\n\nKunna formulera enkla meningar och korta texter om musik.\n<br>\nAnvända grundläggande musikrelaterade termer och grammatik.\n<br>\n\n<h3>Muntlig kommunikation:<br></h3>\n  Deltagande i enkla muntliga konversationer om musik med grundläggande musikrelaterade termer och uttal.\n\n<br>\n<br>', '<h2>Musik - Nivå A:</h2><br>\n<h3>Läsning och förståelse:</h3>\n\n<br>\nKunna förstå och tolka enklare texter om musik.\n<br>\nIdentifiera huvudidéer och viktig information om musik i texter.\n\n<br>Använda grundläggande musikrelaterade termer för att förstå och uttrycka sig om musik.\n<br>\n\n<h3>Skrivning:</h3><br>\n\nKunna formulera enkla meningar och korta texter om musik.\n<br>\nAnvända grundläggande musikrelaterade termer och grammatik.\n<br>\n\n<h3>Muntlig kommunikation:<br></h3>\n  Deltagande i enkla muntliga konversationer om musik med grundläggande musikrelaterade termer och uttal.\n\n<br>\n<br>', 'Musik'),
(53, NULL, NULL, 'A', NULL, NULL, '<h2> Programmering - Nivå E:</h2><br>\n<h3>Läsning och förståelse:</h3>\n\n<br>\nKunna förstå och tolka enklare programmeringstexter.\n<br>\nIdentifiera huvudidéer och viktig information i programmeringsmaterial.\n\n<br>Använda grundläggande programmeringsordförråd för att förstå och uttrycka sig.\n<br>\n\n<h3>Skrivning:</h3><br>\n\nKunna formulera enkla programmeringskod och korta beskrivningar på svenska.\n<br>\nAnvända grundläggande programmeringsordförråd och grammatik.\n<br>\n\n<h3>Muntlig kommunikation:<br></h3>\n  Deltagande i enkla muntliga programmeringsdiskussioner med grundläggande ordförråd och uttal.\n\n<br>\n<br>', '<h2> Programmering - Nivå C:</h2><br>\n<h3>Läsning och förståelse:</h3>\n\n<br>\nKunna förstå och tolka enklare programmeringstexter.\n<br>\nIdentifiera huvudidéer och viktig information i programmeringsmaterial.\n\n<br>Använda grundläggande programmeringsordförråd för att förstå och uttrycka sig.\n<br>\n\n<h3>Skrivning:</h3><br>\n\nKunna formulera enkla programmeringskod och korta beskrivningar på svenska.\n<br>\nAnvända grundläggande programmeringsordförråd och grammatik.\n<br>\n\n<h3>Muntlig kommunikation:<br></h3>\n  Deltagande i enkla muntliga programmeringsdiskussioner med grundläggande ordförråd och uttal.\n\n<br>\n<br>', '<h2> Programmering - Nivå A:</h2><br>\n<h3>Läsning och förståelse:</h3>\n\n<br>\nKunna förstå och tolka enklare programmeringstexter.\n<br>\nIdentifiera huvudidéer och viktig information i programmeringsmaterial.\n\n<br>Använda grundläggande programmeringsordförråd för att förstå och uttrycka sig.\n<br>\n\n<h3>Skrivning:</h3><br>\n\nKunna formulera enkla programmeringskod och korta beskrivningar på svenska.\n<br>\nAnvända grundläggande programmeringsordförråd och grammatik.\n<br>\n\n<h3>Muntlig kommunikation:<br></h3>\n  Deltagande i enkla muntliga programmeringsdiskussioner med grundläggande ordförråd och uttal.\n\n<br>\n<br>', 'Programmering'),
(54, NULL, NULL, 'B', NULL, NULL, '<h2> Teknik - Nivå E :</h2><br>\n<h3>Läsning och förståelse:</h3>\n\n<br>\nKunna förstå och tolka enkla texter inom ämnet Teknik.\n<br>\nIdentifiera huvudidéer och viktig information i texter om Teknik.\n\n<br>Använda grundläggande terminologi för att förstå och uttrycka sig inom ämnet Teknik.\n<br>\n\n<h3>Skrivning:</h3><br>\n\nKunna formulera enkla meningar och korta texter om ämnet Teknik.\n<br>\nAnvända grundläggande terminologi och grammatik inom ämnet Teknik.\n<br>\n\n<h3>Muntlig kommunikation:<br></h3>\n  Deltagande i enkla muntliga samtal om ämnet Teknik med grundläggande terminologi och uttal.\n\n<br>\n<br>', '<h2> Teknik - Nivå C:</h2><br>\n<h3>Läsning och förståelse:</h3>\n\n<br>\nKunna förstå och tolka enkla texter inom ämnet Teknik.\n<br>\nIdentifiera huvudidéer och viktig information i texter om Teknik.\n\n<br>Använda grundläggande terminologi för att förstå och uttrycka sig inom ämnet Teknik.\n<br>\n\n<h3>Skrivning:</h3><br>\n\nKunna formulera enkla meningar och korta texter om ämnet Teknik.\n<br>\nAnvända grundläggande terminologi och grammatik inom ämnet Teknik.\n<br>\n\n<h3>Muntlig kommunikation:<br></h3>\n  Deltagande i enkla muntliga samtal om ämnet Teknik med grundläggande terminologi och uttal.\n\n<br>\n<br>', '<h2> Teknik - Nivå E:</h2><br>\n<h3>Läsning och förståelse:</h3>\n\n<br>\nKunna förstå och tolka enkla texter inom ämnet Teknik.\n<br>\nIdentifiera huvudidéer och viktig information i texter om Teknik.\n\n<br>Använda grundläggande terminologi för att förstå och uttrycka sig inom ämnet Teknik.\n<br>\n\n<h3>Skrivning:</h3><br>\n\nKunna formulera enkla meningar och korta texter om ämnet Teknik.\n<br>\nAnvända grundläggande terminologi och grammatik inom ämnet Teknik.\n<br>\n\n<h3>Muntlig kommunikation:<br></h3>\n  Deltagande i enkla muntliga samtal om ämnet Teknik med grundläggande terminologi och uttal.\n\n<br>\n<br>', 'Teknik');

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
-- Tabellstruktur `kurs`
--

CREATE TABLE `kurs` (
  `kursID` int(11) NOT NULL,
  `namnID` int(11) DEFAULT NULL,
  `aktiv` bit(1) DEFAULT NULL,
  `användarID` int(11) DEFAULT NULL,
  `picture` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumpning av Data i tabell `kurs`
--

INSERT INTO `kurs` (`kursID`, `namnID`, `aktiv`, `användarID`, `picture`) VALUES
(1, 6, b'1', 4, ''),
(2, 7, b'1', 6, ''),
(3, 8, b'1', 6, ''),
(4, 9, b'1', 4, ''),
(5, 10, b'1', 4, ''),
(6, 11, b'1', 6, ''),
(7, 12, b'1', 4, 'dwadasdawd'),
(8, 12, NULL, 4, 'dwadasdawd'),
(9, 13, NULL, 4, 'aa');

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
  `datum` datetime DEFAULT NULL,
  `namnID` int(11) DEFAULT NULL,
  `startTid` datetime DEFAULT NULL,
  `slutTid` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Tabellstruktur `namn`
--

CREATE TABLE `namn` (
  `nameID` int(11) NOT NULL,
  `name` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumpning av Data i tabell `namn`
--

INSERT INTO `namn` (`nameID`, `name`) VALUES
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
(13, 'matte1');

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
(1, 'Lärare'),
(2, 'Elev');

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
-- Index för tabell `inskriving_kurs`
--
ALTER TABLE `inskriving_kurs`
  ADD PRIMARY KEY (`kursInskrivningID`),
  ADD KEY `fk_ElevID_Inskriving_kurs` (`elevID`),
  ADD KEY `fk_KursID_Inskriving_kurs` (`kursID`);

--
-- Index för tabell `inskrivningklass`
--
ALTER TABLE `inskrivningklass`
  ADD KEY `fk_KlassID_inskrivningklass` (`klassID`),
  ADD KEY `fk_anvandarID_inskrivningklass` (`användarID`);

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
  ADD KEY `fk_namnID_Lektion` (`namnID`);

--
-- Index för tabell `namn`
--
ALTER TABLE `namn`
  ADD PRIMARY KEY (`nameID`);

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
  MODIFY `användarID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT för tabell `inlämningar`
--
ALTER TABLE `inlämningar`
  MODIFY `inlämningID` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT för tabell `inskriving_kurs`
--
ALTER TABLE `inskriving_kurs`
  MODIFY `kursInskrivningID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=55;

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
-- AUTO_INCREMENT för tabell `kurs`
--
ALTER TABLE `kurs`
  MODIFY `kursID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

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
  MODIFY `nameID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT för tabell `roll`
--
ALTER TABLE `roll`
  MODIFY `rollID` tinyint(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

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
  ADD CONSTRAINT `fk_efternamnID_Anvandare` FOREIGN KEY (`efternamnID`) REFERENCES `namn` (`nameID`),
  ADD CONSTRAINT `fk_namnID_Anvandare` FOREIGN KEY (`namnID`) REFERENCES `namn` (`nameID`),
  ADD CONSTRAINT `fk_rollID_Anvandare` FOREIGN KEY (`rollID`) REFERENCES `roll` (`rollID`);

--
-- Restriktioner för tabell `kurs`
--
ALTER TABLE `kurs`
  ADD CONSTRAINT `fk_namnID_Kurs` FOREIGN KEY (`namnID`) REFERENCES `namn` (`nameID`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
