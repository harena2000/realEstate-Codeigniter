-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 08, 2021 at 09:07 PM
-- Server version: 10.4.19-MariaDB
-- PHP Version: 8.0.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `realestate`
--

-- --------------------------------------------------------

--
-- Table structure for table `achete`
--

CREATE TABLE `achete` (
  `idAchete` int(3) NOT NULL,
  `idClient` int(3) NOT NULL,
  `idMaison` int(3) NOT NULL,
  `reste` double NOT NULL,
  `debutContrat` date NOT NULL,
  `finContrat` date NOT NULL,
  `contrat` int(2) NOT NULL,
  `remise` tinyint(1) DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `achete`
--

INSERT INTO `achete` (`idAchete`, `idClient`, `idMaison`, `reste`, `debutContrat`, `finContrat`, `contrat`, `remise`) VALUES
(1, 1, 7, 18628000, '2021-11-07', '2024-11-07', 3, 0),
(2, 4, 5, 17340000, '2021-11-07', '2024-11-07', 3, 0),
(3, 3, 4, 13820000, '2021-11-07', '2026-11-07', 5, 0);

-- --------------------------------------------------------

--
-- Table structure for table `agence`
--

CREATE TABLE `agence` (
  `idAgence` int(5) NOT NULL,
  `emailAgence` varchar(65) NOT NULL,
  `nomAgence` char(20) NOT NULL,
  `prenomAgence` char(30) DEFAULT NULL,
  `dateNaissanceAgence` date NOT NULL,
  `lieuNaissanceAgence` char(30) NOT NULL,
  `sexeAgence` tinyint(1) NOT NULL DEFAULT 0,
  `adresseAgence` varchar(65) NOT NULL,
  `villeAgence` char(25) NOT NULL,
  `paysAgence` int(3) NOT NULL,
  `statusAgence` tinyint(1) DEFAULT 0,
  `anneeExperience` int(2) DEFAULT NULL,
  `contactAgence` varchar(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `agence`
--

INSERT INTO `agence` (`idAgence`, `emailAgence`, `nomAgence`, `prenomAgence`, `dateNaissanceAgence`, `lieuNaissanceAgence`, `sexeAgence`, `adresseAgence`, `villeAgence`, `paysAgence`, `statusAgence`, `anneeExperience`, `contactAgence`) VALUES
(1, 'voahary@gmail.com', 'Rakotoarison', 'Fitahiantsoa Voahary', '2024-06-22', 'Antsirabe', 0, 'Campus UAZ Vohitsoa Sambaina', 'Antsirabe', 4, 0, NULL, '8'),
(2, 'ricardo@gmail.com', 'Ramamonjisoa', 'Ricardo', '2021-10-13', 'Ambohibary', 0, 'Ambohibary Lot 565', 'Antsirabe', 4, 0, NULL, '034 23 354 54');

-- --------------------------------------------------------

--
-- Table structure for table `agence_maison`
--

CREATE TABLE `agence_maison` (
  `idAgenceMaison` int(5) NOT NULL,
  `idAgence` int(5) NOT NULL,
  `idMaison` int(5) NOT NULL,
  `dateAjouter` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `agence_maison`
--

INSERT INTO `agence_maison` (`idAgenceMaison`, `idAgence`, `idMaison`, `dateAjouter`) VALUES
(1, 1, 1, '0000-00-00 00:00:00'),
(3, 1, 3, '0000-00-00 00:00:00'),
(4, 1, 4, '0000-00-00 00:00:00'),
(5, 1, 5, '0000-00-00 00:00:00'),
(6, 1, 6, '0000-00-00 00:00:00'),
(7, 2, 7, '0000-00-00 00:00:00'),
(8, 1, 8, '2021-10-28 11:11:06');

-- --------------------------------------------------------

--
-- Table structure for table `argent`
--

CREATE TABLE `argent` (
  `idSolde` int(3) NOT NULL,
  `idClient` int(3) NOT NULL,
  `solde` double DEFAULT 20000000
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `argent`
--

INSERT INTO `argent` (`idSolde`, `idClient`, `solde`) VALUES
(1, 2, 20000000),
(2, 3, 16170000),
(3, 1, 15218000),
(4, 4, 15540000),
(5, 5, 20000000),
(6, 7, 20000000);

-- --------------------------------------------------------

--
-- Table structure for table `argent_agence`
--

CREATE TABLE `argent_agence` (
  `idArgentAgence` int(11) NOT NULL,
  `idAgence` int(5) NOT NULL,
  `salaire` double DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `argent_agence`
--

INSERT INTO `argent_agence` (`idArgentAgence`, `idAgence`, `salaire`) VALUES
(1, 1, 2900000),
(2, 1, 100000),
(3, 1, 100000),
(4, 2, 468200),
(5, 2, 100000),
(6, 1, 4360000),
(7, 1, 3530000),
(8, 1, 100000),
(9, 1, 3000000),
(10, 1, 100000),
(11, 1, 100000),
(12, 2, 4682000),
(13, 2, 100000),
(14, 1, 4360000),
(15, 1, 100000),
(16, 1, 3530000),
(17, 1, 100000),
(18, 1, 100000),
(19, 1, 100000);

-- --------------------------------------------------------

--
-- Table structure for table `calendrier`
--

CREATE TABLE `calendrier` (
  `idCalendrier` int(11) NOT NULL,
  `idAgence` int(5) NOT NULL,
  `titreEvent` varchar(225) NOT NULL,
  `startEvent` datetime NOT NULL,
  `endEvent` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `calendrier`
--

INSERT INTO `calendrier` (`idCalendrier`, `idAgence`, `titreEvent`, `startEvent`, `endEvent`) VALUES
(4, 1, 'Meeting with John', '2021-10-18 00:00:00', '2021-10-19 00:00:00'),
(5, 1, 'Farany', '2021-10-14 00:00:00', '2021-10-15 00:00:00'),
(6, 1, 'Harena Meeting', '2021-10-12 00:00:00', '2021-10-13 00:00:00'),
(8, 1, 'Evenement tena lava ity soratra ity', '2021-10-05 00:00:00', '2021-10-06 00:00:00'),
(9, 2, 'Titre Lava be ity\nMerci Beaucoup', '2021-10-06 00:00:00', '2021-10-07 00:00:00'),
(10, 2, 'Semaine de Prière', '2021-10-10 00:00:00', '2021-10-17 00:00:00'),
(11, 2, 'Anniversaire\nJims Bira', '2021-10-19 14:00:00', '2021-10-19 15:00:00'),
(12, 2, 'Ef mihidina an dalana hoazy', '2021-10-05 00:00:00', '2021-10-06 00:00:00'),
(13, 1, 'Visite : <br>Golden Park ', '2021-10-29 00:59:00', '2021-10-29 01:00:00'),
(17, 1, 'End of Project', '2024-11-08 00:00:00', '2024-11-09 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `calendrier_visite`
--

CREATE TABLE `calendrier_visite` (
  `idVisite` int(5) NOT NULL,
  `idMaison` int(5) NOT NULL,
  `idAgence` int(5) NOT NULL,
  `titreEvent` varchar(255) NOT NULL,
  `startEvent` datetime NOT NULL,
  `endEvent` datetime NOT NULL,
  `labelColor` varchar(6) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `calendrier_visite`
--

INSERT INTO `calendrier_visite` (`idVisite`, `idMaison`, `idAgence`, `titreEvent`, `startEvent`, `endEvent`, `labelColor`) VALUES
(1, 7, 2, 'Visite : <br>Welcome to Paradis', '2021-10-23 23:56:00', '2021-10-23 23:58:00', '#ff0a0'),
(2, 5, 0, 'Visite : <br>Golden Park ', '2021-10-29 00:59:00', '2021-10-29 01:00:00', '#00000');

-- --------------------------------------------------------

--
-- Table structure for table `check_liste`
--

CREATE TABLE `check_liste` (
  `idCheck` int(4) NOT NULL,
  `idClient` int(3) NOT NULL,
  `idMaison` int(3) NOT NULL,
  `dateDepot` datetime NOT NULL DEFAULT current_timestamp(),
  `depot` double NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `check_liste`
--

INSERT INTO `check_liste` (`idCheck`, `idClient`, `idMaison`, `dateDepot`, `depot`) VALUES
(6, 1, 3, '2021-10-26 02:13:01', 2900000),
(11, 1, 3, '2021-10-27 08:22:04', 100000),
(12, 1, 3, '2021-10-27 08:22:08', 100000),
(13, 1, 7, '2021-11-06 22:22:54', 468200),
(14, 1, 7, '2021-11-06 23:26:03', 100000),
(15, 1, 5, '2021-11-07 16:40:06', 4360000),
(16, 7, 4, '2021-11-08 08:40:51', 3530000),
(17, 7, 4, '2021-11-08 08:40:57', 100000),
(18, 4, 1, '2027-11-08 08:47:00', 3000000),
(19, 4, 1, '2027-11-08 08:47:05', 100000),
(20, 4, 1, '2027-11-08 08:47:08', 100000),
(21, 1, 7, '2021-11-08 08:52:49', 4682000),
(22, 1, 7, '2021-11-08 08:53:05', 100000),
(23, 4, 5, '2021-11-08 08:53:40', 4360000),
(24, 4, 5, '2021-11-08 08:53:44', 100000),
(25, 3, 4, '2021-11-08 08:54:17', 3530000),
(26, 3, 4, '2021-11-08 08:54:22', 100000),
(27, 3, 4, '2021-11-08 18:49:23', 100000),
(28, 3, 4, '2021-11-08 18:49:26', 100000);

-- --------------------------------------------------------

--
-- Table structure for table `client`
--

CREATE TABLE `client` (
  `idClient` int(3) NOT NULL,
  `emailClient` varchar(65) NOT NULL,
  `nomClient` char(30) DEFAULT NULL,
  `prenomClient` char(25) DEFAULT NULL,
  `sexe` tinyint(1) DEFAULT NULL,
  `dateNaissanceClient` date DEFAULT NULL,
  `lieuNaissanceClient` char(30) DEFAULT NULL,
  `adresse` varchar(50) DEFAULT NULL,
  `ville` char(25) DEFAULT NULL,
  `pays` int(3) DEFAULT NULL,
  `profession` char(25) DEFAULT NULL,
  `status` tinyint(1) DEFAULT 0,
  `contactClient` varchar(19) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `client`
--

INSERT INTO `client` (`idClient`, `emailClient`, `nomClient`, `prenomClient`, `sexe`, `dateNaissanceClient`, `lieuNaissanceClient`, `adresse`, `ville`, `pays`, `profession`, `status`, `contactClient`) VALUES
(1, 'fitahiana@gmail.com', 'Andrianomenjanahary', 'Nomentsoa Fitahiana', 1, NULL, NULL, 'Betania', 'Toliara', 4, 'Manageur', 1, '034 01 103 75'),
(2, 'mahefaniainaharenarico@gmail.com', 'Mahefaniaina', 'Harena Rico', 0, NULL, NULL, 'Campus UAZ Vohitsoa Sambaina', 'Antsirabe', 4, 'Informatics', 0, '034 33 135 51'),
(3, 'daniel@gmail.com', 'Andrianirina', 'Daniel Pierre', 0, NULL, NULL, 'Tanjonandriana', 'Antananarivo', 4, 'Informatics', 0, '034 01 103 75'),
(4, 'fitia@gmail.com', 'Fitiamampionona', 'Lucianna', 1, NULL, NULL, 'Betania', 'Toliara', 4, 'Nursing', 0, '034 01 103 75'),
(5, 'ignace@gmail.com', 'Laingotiana', 'Igniace', 0, '2021-10-20', 'Antananarivo', 'Ambohimanambola Lot 345', 'Antananarivo', 4, 'Professeur Informatique', 0, '034 23 542 34'),
(7, 'mischma@gmail.com', 'Ismael', 'Mychou', 1, '2021-10-20', 'Port Berger', 'Any @nay', 'Ambanja', 4, 'Infirmière', 0, '034 01 103 75');

-- --------------------------------------------------------

--
-- Table structure for table `maison`
--

CREATE TABLE `maison` (
  `idMaison` int(3) NOT NULL,
  `nomMaison` varchar(25) NOT NULL,
  `adresseMaison` varchar(30) NOT NULL,
  `villeMaison` char(25) NOT NULL,
  `paysMaison` int(3) NOT NULL,
  `couleur` varchar(50) DEFAULT NULL,
  `grandeur` int(4) NOT NULL,
  `chambre` int(1) DEFAULT NULL,
  `cuisine` int(1) DEFAULT NULL,
  `douche` int(1) DEFAULT NULL,
  `garage` int(1) DEFAULT NULL,
  `prix` double NOT NULL,
  `imgMaison` varchar(50) DEFAULT NULL,
  `statusMaison` tinyint(1) DEFAULT 0,
  `description` text DEFAULT '\'No Description\''
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `maison`
--

INSERT INTO `maison` (`idMaison`, `nomMaison`, `adresseMaison`, `villeMaison`, `paysMaison`, `couleur`, `grandeur`, `chambre`, `cuisine`, `douche`, `garage`, `prix`, `imgMaison`, `statusMaison`, `description`) VALUES
(1, 'Sweet Garden ', 'Campus UAZ Vohitsoa Sambaina', 'Antsirabe', 4, 'Black, Red', 250, 2, 1, 2, 1, 15000000, 'affiche1.jpg', 0, 'The Redaction House is a compact home for a fiber artist and her young family, an unapologetically contemporary addition to a long necklace of large, prosaic spec homes surrounding a small lake in suburban Milwaukee. Built on a narrow sliver of land that had been considered unsuitable for new construction because of its limited size and prohibitive zoning restrictions, the house is a case study in architecture’s ability to exploit the perceived constraints of a challenging context, offering genuine design solutions that address fundamental issues of privacy, density, and life embedded in the bromide aesthetics of suburbia.\r\n\r\nThe Redaction House is a compact home for a fiber artist and her young family, an unapologetically contemporary addition to a long necklace of large, prosaic spec homes surrounding a small lake in suburban Milwaukee. Built on a narrow sliver of land that had been considered unsuitable for new construction because of its limited size and prohibitive zoning restrictions, the house is a case study in architecture’s ability to exploit the perceived constraints of a challenging context, offering genuine design solutions that address fundamental issues of privacy, density, and life embedded in the bromide aesthetics of suburbia.'),
(3, 'Gold space', 'Campus UAZ Vohitsoa Sambaina', 'Antsirabe', 4, 'Gold, Black', 350, 5, NULL, 3, 1, 14500000, 'affiche3.png', 0, 'The Redaction House is a compact home for a fiber artist and her young family, an unapologetically contemporary addition to a long necklace of large, prosaic spec homes surrounding a small lake in suburban Milwaukee.  Built on a narrow sliver of land that had been considered unsuitable for new construction because of its limited size and prohibitive zoning restrictions, the house is a case study in architecture’s ability to exploit the perceived constraints of a challenging context, offering genuine design solutions that address fundamental issues of privacy, density, and life embedded in the bromide aesthetics of suburbia.'),
(4, 'Change the Mouvement', 'Betongolo C4 - lot 123', 'Antananarivo', 4, 'Yellow, White', 215, 3, 1, 1, 0, 17650000, 'affiche4.png', 1, 'The Redaction House is a compact home for a fiber artist and her young family, an unapologetically contemporary addition to a long necklace of large, prosaic spec homes surrounding a small lake in suburban Milwaukee. Built on a narrow sliver of land that had been considered unsuitable for new construction because of its limited size and prohibitive zoning restrictions, the house is a case study in architecture’s ability to exploit the perceived constraints of a challenging context, offering genuine design solutions that address fundamental issues of privacy, density, and life embedded in the bromide aesthetics of suburbia.'),
(5, 'Golden Park ', 'Campus UAZ Vohitsoa Sambaina', 'Antsirabe', 4, 'Yellow, White', 231, 5, 1, 2, 1, 21800000, 'affiche5.png', 1, 'The Redaction House is a compact home for a fiber artist and her young family, an unapologetically contemporary addition to a long necklace of large, prosaic spec homes surrounding a small lake in suburban Milwaukee. Built on a narrow sliver of land that had been considered unsuitable for new construction because of its limited size and prohibitive zoning restrictions, the house is a case study in architecture’s ability to exploit the perceived constraints of a challenging context, offering genuine design solutions that address fundamental issues of privacy, density, and life embedded in the bromide aesthetics of suburbia.'),
(6, 'World of Technologie', 'Betongolo C4 - lot 123', 'Antananarivo', 4, 'Green, White', 213, 3, 1, 1, 1, 12300000, 'affiche6.jpg', 0, 'The Redaction House is a compact home for a fiber artist and her young family, an unapologetically contemporary addition to a long necklace of large, prosaic spec homes surrounding a small lake in suburban Milwaukee. Built on a narrow sliver of land that had been considered unsuitable for new construction because of its limited size and prohibitive zoning restrictions, the house is a case study in architecture’s ability to exploit the perceived constraints of a challenging context, offering genuine design solutions that address fundamental issues of privacy, density, and life embedded in the bromide aesthetics of suburbia.'),
(7, 'Welcome to Paradis', 'Campus UAZ Vohitsoa Sambaina', 'Antsirabe', 4, 'Gray, Black', 123, 3, 2, 1, 1, 23410000, 'affiche7.jpg', 1, 'The Redaction House is a compact home for a fiber artist and her young family, an unapologetically contemporary addition to a long necklace of large, prosaic spec homes surrounding a small lake in suburban Milwaukee. Built on a narrow sliver of land that had been considered unsuitable for new construction because of its limited size and prohibitive zoning restrictions, the house is a case study in architecture’s ability to exploit the perceived constraints of a challenging context, offering genuine design solutions that address fundamental issues of privacy, density, and life embedded in the bromide aesthetics of suburbia.'),
(8, 'Beautiful', 'Campus UAZ Vohitsoa Sambaina', 'Antsirabe', 4, 'Yellow, White', 200, 3, 1, 1, 0, 15000000, 'affiche8.jpg', 0, 'The Redaction House is a compact home for a fiber artist and her young family, an unapologetically contemporary addition to a long necklace of large, prosaic spec homes surrounding a small lake in suburban Milwaukee. Built on a narrow sliver of land that had been considered unsuitable for new construction because of its limited size and prohibitive zoning restrictions, the house is a case study in architecture’s ability to exploit the perceived constraints of a challenging context, offering genuine design solutions that address fundamental issues of privacy, density, and life embedded in the bromide aesthetics of suburbia. The Redaction House is a compact home for a fiber artist and her young family, an unapologetically contemporary addition to a long necklace of large, prosaic spec homes surrounding a small lake in suburban Milwaukee. Built on a narrow sliver of land that had been considered unsuitable for new construction because of its limited size and prohibitive zoning restrictions, the house is a case study in architecture’s ability to exploit the perceived constraints of a challenging context, offering genuine design solutions that address fundamental issues of privacy, density, and life embedded in the bromide aesthetics of suburbia.');

-- --------------------------------------------------------

--
-- Table structure for table `maison_image`
--

CREATE TABLE `maison_image` (
  `idMaisonImage` int(5) NOT NULL,
  `idMaison` int(5) NOT NULL,
  `nomChambre` varchar(25) NOT NULL,
  `imgChambre` varchar(65) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `maison_image`
--

INSERT INTO `maison_image` (`idMaisonImage`, `idMaison`, `nomChambre`, `imgChambre`) VALUES
(1, 3, 'Bedroom', 'Bedroom0.png'),
(2, 3, 'Bedroom', 'Bedroom1.png'),
(3, 3, 'Kitchen', 'Kitchen2.png'),
(4, 3, 'Bathroom', 'Bathroom3.png'),
(5, 5, 'Kitchen', 'Kitchen4.png'),
(6, 4, 'Garage', 'Garage5.png'),
(7, 3, 'Garage', 'Garage6.png'),
(10, 4, 'Bathroom', 'Bathroom9.png'),
(12, 4, 'Bedroom', 'Bedroom11.png'),
(13, 4, 'Kitchen', 'Kitchen12.png'),
(14, 4, 'Bedroom', 'Bedroom13.png'),
(17, 7, 'Kitchen', 'Kitchen14.png'),
(18, 7, 'Kitchen', 'Kitchen17.png'),
(19, 7, 'Garage', 'Garage18.png'),
(20, 7, 'Bathroom', 'Bathroom19.png'),
(21, 7, 'Bedroom', 'Bedroom20.png'),
(22, 7, 'Bedroom', 'Bedroom21.png'),
(23, 7, 'Bedroom', 'Bedroom22.png'),
(24, 1, 'Bedroom', 'Bedroom23.png'),
(25, 1, '', '24.png'),
(26, 1, 'Kitchen', 'Kitchen25.png'),
(27, 1, '', '26.png'),
(28, 1, '', '27.png'),
(29, 1, '', '28.png');

-- --------------------------------------------------------

--
-- Table structure for table `message`
--

CREATE TABLE `message` (
  `idMessage` int(5) NOT NULL,
  `groupName` varchar(30) NOT NULL,
  `email` varchar(65) NOT NULL,
  `message` text DEFAULT NULL,
  `dateMessage` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `message`
--

INSERT INTO `message` (`idMessage`, `groupName`, `email`, `message`, `dateMessage`) VALUES
(2, 'Ricardo', 'fitahiana@gmail.com', 'Bonjour Letsy', '2021-10-28 02:37:37'),
(3, 'Ricardo', 'fitahiana@gmail.com', 'Salut', '2021-10-28 02:49:50'),
(4, 'Ricardo', 'fitahiana@gmail.com', 'Mbola zah ihan ty', '2021-10-28 02:52:13'),
(7, 'Pinterest', 'mischma@gmail.com', 'Bonjour letsy...\r\nTiako be le trano', '2021-10-28 03:09:54'),
(16, 'Ricardo', 'fitahiana@gmail.com', 'Ca va tsara', '2021-10-28 03:53:09'),
(17, 'Ricardo', 'ricardo@gmail.com', 'Yeuh Ca va tsara ka...', '2021-10-28 03:54:17'),
(24, 'Ricardo', 'mahefaniainaharenarico@gmail.com', 'Salut daholo', '2021-10-28 10:07:14'),
(27, 'Pinterest', 'voahary@gmail.com', 'Merci Beaucoup', '2021-11-03 21:03:21'),
(31, 'Harena Sweet Garden', 'fitahiana@gmail.com', 'Bonjour Ndry', '2021-11-04 10:19:47');

-- --------------------------------------------------------

--
-- Table structure for table `message_group`
--

CREATE TABLE `message_group` (
  `idGroup` int(5) NOT NULL,
  `groupName` varchar(25) NOT NULL,
  `emailAgence` varchar(65) NOT NULL,
  `emailClient` varchar(65) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `message_group`
--

INSERT INTO `message_group` (`idGroup`, `groupName`, `emailAgence`, `emailClient`) VALUES
(1, 'Harena Sweet Garden', 'voahary@gmail.com', 'fitahiana@gmail.com'),
(2, 'Ricardo', 'ricardo@gmail.com', 'fitahiana@gmail.com'),
(3, 'Pinterest', 'voahary@gmail.com', 'mischma@gmail.com'),
(4, 'Ricardo', 'ricardo@gmail.com', 'mahefaniainaharenarico@gmail.com'),
(5, 'Harena Sweet Garden', 'voahary@gmail.com', 'daniel@gmail.com');

-- --------------------------------------------------------

--
-- Table structure for table `pays`
--

CREATE TABLE `pays` (
  `idPays` int(3) NOT NULL,
  `nomPays` char(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `pays`
--

INSERT INTO `pays` (`idPays`, `nomPays`) VALUES
(1, 'France'),
(2, 'United Kingdom'),
(3, 'United State of America'),
(4, 'Madagascar');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `idUser` int(3) NOT NULL,
  `emailUser` varchar(50) NOT NULL,
  `password` varchar(200) NOT NULL,
  `pdpUser` varchar(50) DEFAULT NULL,
  `permision` tinyint(1) NOT NULL DEFAULT 0,
  `disable` tinyint(1) NOT NULL DEFAULT 0,
  `code_confirmation` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`idUser`, `emailUser`, `password`, `pdpUser`, `permision`, `disable`, `code_confirmation`) VALUES
(0, 'admin@gmail.com', '21232f297a57a5a743894a0e4a801fc3', '2.png', 1, 0, 'cfcd208495d565ef66e7dff9f98764da'),
(1, 'fitahiana@gmail.com', '4904630994bf68d2354c647fbaadefec', '1.png', 0, 0, 'cfcd208495d565ef66e7dff9f98764da'),
(2, 'mahefaniainaharenarico@gmail.com', 'ee5f841c732380f2238f6cb6c565c79f', '2.png', 0, 0, 'cfcd208495d565ef66e7dff9f98764da'),
(3, 'daniel@gmail.com', 'aa47f8215c6f30a0dcdb2a36a9f4168e', NULL, 0, 0, 'cfcd208495d565ef66e7dff9f98764da'),
(4, 'voahary@gmail.com', 'a7c704aaf299331e17b2b57dd459a86b', '1.png', 2, 0, 'cfcd208495d565ef66e7dff9f98764da'),
(5, 'fitia@gmail.com', 'bfe5ba19605ad2855f673f0bda11376f', NULL, 0, 0, 'cfcd208495d565ef66e7dff9f98764da'),
(6, 'ignace@gmail.com', 'e7dcb76610adff90d15a8deb8c745468', '5.png', 0, 0, 'cfcd208495d565ef66e7dff9f98764da'),
(7, 'ricardo@gmail.com', '6720720054e9d24fbf6c20a831ff287e', '2.png', 2, 0, 'cfcd208495d565ef66e7dff9f98764da'),
(8, 'mischma@gmail.com', 'f16dc0fe4d2f4677ab3ef3a78ef56a77', '7.png', 0, 0, 'cfcd208495d565ef66e7dff9f98764da');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `achete`
--
ALTER TABLE `achete`
  ADD PRIMARY KEY (`idAchete`);

--
-- Indexes for table `agence`
--
ALTER TABLE `agence`
  ADD PRIMARY KEY (`idAgence`);

--
-- Indexes for table `agence_maison`
--
ALTER TABLE `agence_maison`
  ADD PRIMARY KEY (`idAgenceMaison`);

--
-- Indexes for table `argent`
--
ALTER TABLE `argent`
  ADD PRIMARY KEY (`idSolde`);

--
-- Indexes for table `argent_agence`
--
ALTER TABLE `argent_agence`
  ADD PRIMARY KEY (`idArgentAgence`);

--
-- Indexes for table `calendrier`
--
ALTER TABLE `calendrier`
  ADD PRIMARY KEY (`idCalendrier`);

--
-- Indexes for table `calendrier_visite`
--
ALTER TABLE `calendrier_visite`
  ADD PRIMARY KEY (`idVisite`);

--
-- Indexes for table `check_liste`
--
ALTER TABLE `check_liste`
  ADD PRIMARY KEY (`idCheck`);

--
-- Indexes for table `client`
--
ALTER TABLE `client`
  ADD PRIMARY KEY (`idClient`);

--
-- Indexes for table `maison`
--
ALTER TABLE `maison`
  ADD PRIMARY KEY (`idMaison`);

--
-- Indexes for table `maison_image`
--
ALTER TABLE `maison_image`
  ADD PRIMARY KEY (`idMaisonImage`);

--
-- Indexes for table `message`
--
ALTER TABLE `message`
  ADD PRIMARY KEY (`idMessage`);

--
-- Indexes for table `message_group`
--
ALTER TABLE `message_group`
  ADD PRIMARY KEY (`idGroup`);

--
-- Indexes for table `pays`
--
ALTER TABLE `pays`
  ADD PRIMARY KEY (`idPays`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`idUser`,`emailUser`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `achete`
--
ALTER TABLE `achete`
  MODIFY `idAchete` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `agence`
--
ALTER TABLE `agence`
  MODIFY `idAgence` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `agence_maison`
--
ALTER TABLE `agence_maison`
  MODIFY `idAgenceMaison` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `argent`
--
ALTER TABLE `argent`
  MODIFY `idSolde` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `argent_agence`
--
ALTER TABLE `argent_agence`
  MODIFY `idArgentAgence` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `calendrier`
--
ALTER TABLE `calendrier`
  MODIFY `idCalendrier` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `calendrier_visite`
--
ALTER TABLE `calendrier_visite`
  MODIFY `idVisite` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `check_liste`
--
ALTER TABLE `check_liste`
  MODIFY `idCheck` int(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;

--
-- AUTO_INCREMENT for table `client`
--
ALTER TABLE `client`
  MODIFY `idClient` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `maison`
--
ALTER TABLE `maison`
  MODIFY `idMaison` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `maison_image`
--
ALTER TABLE `maison_image`
  MODIFY `idMaisonImage` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;

--
-- AUTO_INCREMENT for table `message`
--
ALTER TABLE `message`
  MODIFY `idMessage` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=46;

--
-- AUTO_INCREMENT for table `message_group`
--
ALTER TABLE `message_group`
  MODIFY `idGroup` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `pays`
--
ALTER TABLE `pays`
  MODIFY `idPays` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `idUser` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
