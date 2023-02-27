-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3307
-- Généré le : ven. 16 déc. 2022 à 15:51
-- Version du serveur : 10.6.5-MariaDB
-- Version de PHP : 7.4.26

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `hackatons`
--

-- --------------------------------------------------------

--
-- Structure de la table `atelier`
--

DROP TABLE IF EXISTS `atelier`;
CREATE TABLE IF NOT EXISTS `atelier` (
  `IDEVENEMENT` int(11) NOT NULL,
  `NBPARTICIPANTS` int(11) DEFAULT NULL,
  `NOMEVENEMENT` char(64) DEFAULT NULL,
  `DATEDEBUT` date DEFAULT NULL,
  `DATEFIN` date DEFAULT NULL,
  `DUREE` time DEFAULT NULL,
  PRIMARY KEY (`IDEVENEMENT`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb3;

--
-- Déchargement des données de la table `atelier`
--

INSERT INTO `atelier` (`IDEVENEMENT`, `NBPARTICIPANTS`, `NOMEVENEMENT`, `DATEDEBUT`, `DATEFIN`, `DUREE`) VALUES
(2, 40, 'atelier1', '2022-11-25', '2022-11-27', '48:00:00');

-- --------------------------------------------------------

--
-- Structure de la table `conference`
--

DROP TABLE IF EXISTS `conference`;
CREATE TABLE IF NOT EXISTS `conference` (
  `IDEVENEMENT` int(11) NOT NULL,
  `THEME` varchar(128) DEFAULT NULL,
  `NOMEVENEMENT` char(64) DEFAULT NULL,
  `DATEDEBUT` date DEFAULT NULL,
  `DATEFIN` date DEFAULT NULL,
  `DUREE` time DEFAULT NULL,
  PRIMARY KEY (`IDEVENEMENT`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb3;

--
-- Déchargement des données de la table `conference`
--

INSERT INTO `conference` (`IDEVENEMENT`, `THEME`, `NOMEVENEMENT`, `DATEDEBUT`, `DATEFIN`, `DUREE`) VALUES
(1, 'Conference1', 'Conference1', '2022-11-25', '2022-11-27', '48:00:00');

-- --------------------------------------------------------

--
-- Structure de la table `evenement`
--

DROP TABLE IF EXISTS `evenement`;
CREATE TABLE IF NOT EXISTS `evenement` (
  `IDEVENEMENT` int(11) NOT NULL AUTO_INCREMENT,
  `IDHACKATHON` int(11) NOT NULL,
  `NOMEVENEMENT` char(64) DEFAULT NULL,
  `DATEDEBUT` date DEFAULT NULL,
  `DATEFIN` date DEFAULT NULL,
  `DUREE` time DEFAULT NULL,
  PRIMARY KEY (`IDEVENEMENT`),
  KEY `FK_EVENEMENT_HACKATHON` (`IDHACKATHON`)
) ENGINE=MyISAM AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb3;

--
-- Déchargement des données de la table `evenement`
--

INSERT INTO `evenement` (`IDEVENEMENT`, `IDHACKATHON`, `NOMEVENEMENT`, `DATEDEBUT`, `DATEFIN`, `DUREE`) VALUES
(1, 1, 'evenementconf1', '2022-11-25', '2022-11-27', '48:00:00'),
(2, 1, 'evenementatel1', '2022-11-25', '2022-11-27', '48:00:00');

-- --------------------------------------------------------

--
-- Structure de la table `hackathon`
--

DROP TABLE IF EXISTS `hackathon`;
CREATE TABLE IF NOT EXISTS `hackathon` (
  `IDHACKATHON` int(11) NOT NULL AUTO_INCREMENT,
  `DATEDEBUT` date DEFAULT NULL,
  `DATEFIN` date DEFAULT NULL,
  `HEUREDEBUT` time DEFAULT NULL,
  `HEUREFIN` time DEFAULT NULL,
  `LIEU` char(255) DEFAULT NULL,
  `RUE` char(255) DEFAULT NULL,
  `VILLE` char(255) DEFAULT NULL,
  `CP` char(5) DEFAULT NULL,
  `THEME` char(255) DEFAULT NULL,
  `DESCRIPTION` char(255) DEFAULT NULL,
  `IMAGE` char(255) DEFAULT NULL,
  `DATELIMITE` date DEFAULT NULL,
  `NBPLACES` bigint(11) DEFAULT NULL,
  PRIMARY KEY (`IDHACKATHON`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8mb3;

--
-- Déchargement des données de la table `hackathon`
--

INSERT INTO `hackathon` (`IDHACKATHON`, `DATEDEBUT`, `DATEFIN`, `HEUREDEBUT`, `HEUREFIN`, `LIEU`, `RUE`, `VILLE`, `CP`, `THEME`, `DESCRIPTION`, `IMAGE`, `DATELIMITE`, `NBPLACES`) VALUES
(1, '2022-11-24', '2022-11-28', '12:00:00', '18:00:00', 'Talent Garden', '100 Avenue Willy Brandt', 'Lille', '59777', 'La nuit du code citoyen', 'La Nuit du Code Citoyen est un hackathon open source qui a pour but d’accélérer des projets numériques d’intérêt général sur le thème Transitions.', 'https://cdn.pixabay.com/photo/2020/05/30/17/18/wind-power-plant-5239642__480.jpg', '2022-10-24', 51),
(2, '2021-12-08', '2021-12-22', '09:30:00', '18:00:00', 'Loco Numérique', '123 Bd Louis Blanc', 'La Roche Sur Yon', '85000', 'Hackathon sur le changement climatique et la protection de la biodiversité', 'Un hackathon pour mieux connaître et protéger la biodiversité', 'https://cdn.pixabay.com/photo/2020/03/19/21/25/laptop-4948837__480.jpg', '2021-11-08', 20),
(3, '2022-01-27', '2022-01-30', '18:30:00', '20:30:00', 'Lelaptop: atelier modulable', '7 rue Geoffroy Langevin', 'Paris', '75004', 'DefInSpace', '24H pour imaginer la défense spatiale de demain', 'https://media.istockphoto.com/photos/laser-cannon-incapacitates-enemy-satellite-in-space-picture-id1265211446?b=1&k=20&m=1265211446&s=170667a&w=0&h=3oeJG_wzOus3Vn_08d61PpcEkTYFiiquxpghRTvcdWU=', NULL, 40),
(4, '2022-03-19', '2022-03-20', '07:00:00', '23:30:00', 'Tour Franklin', '100-101 Terrasse Boieldieu', 'Puteaux', '92800', 'TadHack', 'Vous avez la fibre tech et l\'esprit innovateur? TADhack vous donnera les clefs pour une expérience unique, travaillez avec des experts de la voice tech et de l\'IA', NULL, NULL, NULL),
(5, '2023-06-28', '2023-06-30', NULL, NULL, 'Euratechnologies', '165 Avenue de Bretagne', 'Lille', '59000', 'Hackathon Summer Space Festival', NULL, 'https://cdn.pixabay.com/photo/2016/10/20/18/35/earth-1756274__340.jpg', NULL, 150),
(6, '2023-11-05', '2023-11-06', '08:00:00', '08:00:00', 'Le palace', '4 rue Voltaire', 'Nantes', '44000', 'InnovHathon', NULL, NULL, NULL, 25),
(7, '2023-04-09', '2023-04-11', NULL, NULL, 'La Cantine', '11 Rue La Noue', 'Nantes', '44200', 'Hacking Health', ' Un marathon d\'innovation en santé', 'https://cdn.pixabay.com/photo/2016/11/09/15/27/dna-1811955__340.jpg', '2022-03-09', 250),
(8, '2022-12-16', '2022-12-16', '00:00:00', '00:00:00', 'lieu', 'rue', 'ville', '85555', 'theme', 'description', NULL, '2022-11-16', 25);

-- --------------------------------------------------------

--
-- Structure de la table `inscription`
--

DROP TABLE IF EXISTS `inscription`;
CREATE TABLE IF NOT EXISTS `inscription` (
  `CODE` int(11) NOT NULL AUTO_INCREMENT,
  `IDPARTICIPANT` int(11) NOT NULL,
  `IDHACKATHON` int(11) NOT NULL,
  `DATEINSCRIPTION` date DEFAULT NULL,
  `DESCRIPTION` char(255) DEFAULT NULL,
  PRIMARY KEY (`CODE`),
  KEY `FK_INSCRIPTION_PARTICIPANT` (`IDPARTICIPANT`),
  KEY `FK_INSCRIPTION_HACKATHON` (`IDHACKATHON`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb3;

--
-- Déchargement des données de la table `inscription`
--

INSERT INTO `inscription` (`CODE`, `IDPARTICIPANT`, `IDHACKATHON`, `DATEINSCRIPTION`, `DESCRIPTION`) VALUES
(1, 1, 2, '2022-12-12', 'ad');

-- --------------------------------------------------------

--
-- Structure de la table `intervenant`
--

DROP TABLE IF EXISTS `intervenant`;
CREATE TABLE IF NOT EXISTS `intervenant` (
  `IDINTERVENANT` int(11) NOT NULL AUTO_INCREMENT,
  `NOM` char(32) DEFAULT NULL,
  `PRENOM` char(32) DEFAULT NULL,
  PRIMARY KEY (`IDINTERVENANT`)
) ENGINE=MyISAM AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb3;

--
-- Déchargement des données de la table `intervenant`
--

INSERT INTO `intervenant` (`IDINTERVENANT`, `NOM`, `PRENOM`) VALUES
(1, 'Santero', 'Antony'),
(2, 'Armand', 'Rébecca'),
(3, 'Hebert', 'Aimée'),
(4, 'Ribeiro', 'Marielle'),
(5, 'Savary', 'Hilaire');

-- --------------------------------------------------------

--
-- Structure de la table `intervenir`
--

DROP TABLE IF EXISTS `intervenir`;
CREATE TABLE IF NOT EXISTS `intervenir` (
  `IDINTERVENANT` int(11) NOT NULL,
  `IDEVENEMENT` int(11) NOT NULL,
  PRIMARY KEY (`IDINTERVENANT`,`IDEVENEMENT`),
  KEY `FK_INTERVENIR_CONFERENCE` (`IDEVENEMENT`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb3;

-- --------------------------------------------------------

--
-- Structure de la table `messenger_messages`
--

DROP TABLE IF EXISTS `messenger_messages`;
CREATE TABLE IF NOT EXISTS `messenger_messages` (
  `id` bigint(20) NOT NULL AUTO_INCREMENT,
  `body` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `headers` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue_name` varchar(190) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` datetime NOT NULL,
  `available_at` datetime NOT NULL,
  `delivered_at` datetime DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `IDX_75EA56E0FB7336F0` (`queue_name`),
  KEY `IDX_75EA56E0E3BD61CE` (`available_at`),
  KEY `IDX_75EA56E016BA31DB` (`delivered_at`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Structure de la table `participant`
--

DROP TABLE IF EXISTS `participant`;
CREATE TABLE IF NOT EXISTS `participant` (
  `IDPARTICIPANT` int(11) NOT NULL AUTO_INCREMENT,
  `NOM` char(32) DEFAULT NULL,
  `PRENOM` char(32) DEFAULT NULL,
  `DATENAISSANCE` date DEFAULT NULL,
  `VILLE` char(64) DEFAULT NULL,
  `RUE` varchar(128) DEFAULT NULL,
  `CP` char(5) DEFAULT NULL,
  `EMAIL` char(32) DEFAULT NULL,
  `LOGIN` char(32) DEFAULT NULL,
  `MDP` char(64) DEFAULT NULL,
  `ROLES` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin NOT NULL CHECK (json_valid(`ROLES`)),
  PRIMARY KEY (`IDPARTICIPANT`)
) ENGINE=InnoDB AUTO_INCREMENT=28 DEFAULT CHARSET=utf8mb3;

--
-- Déchargement des données de la table `participant`
--

INSERT INTO `participant` (`IDPARTICIPANT`, `NOM`, `PRENOM`, `DATENAISSANCE`, `VILLE`, `RUE`, `CP`, `EMAIL`, `LOGIN`, `MDP`, `ROLES`) VALUES
(1, 'Beauchene', 'Swan', '2002-10-25', 'Sainte-Foy', '66 rue des Fauvettes', '85150', 'swanbeauchene@gmail.com', 'sbeauchene', '$2y$10$4QP8AajZcpLp4Ga04dYOKuLqqVmSEOaLjTfDdi9Td9WORHa0P0oOC', '[\"ROLE_USER\"]'),
(20, 'Frontera', 'Martin', '2022-12-08', 'Jard', 'Jard', '45645', 'martin@email.com', 'mfrontera', '$2y$10$NRvcKQzeXIlwhV9V7k3liOys3yGki3MK2l4EB8DwxlqXxRpjDFVsO', '[\"ROLE_USER\"]'),
(24, 'n\'importe quoi', 'toto', '2022-12-16', 'grobreuil', 'eryrey', '85142', 'martin.frontera85@gmail.com', 'tn\'importe quoi', '$2y$10$zTqBpRjH0DUsQXGmxvnPY.g8XZi9F4f5Yu7Ic7m1v4.aTDvB0umOy', '[\"ROLE_USER\"]'),
(26, 'n\'importe quoi', 'toto', '2022-12-14', 'grobreuil', '12 rue des jonquilles', '85142', 'mr.licorne85@gmail.com', 'tn\'importe quoi', '$2y$10$.G1LTPQjNh7Gl8RW87pwQ.rzdBJ3WquCgTQM8DZnMR6zN4EsduC1.', '[\"ROLE_USER\"]'),
(27, 'Frontera', 'Martin', '2022-12-01', 'Jard', 'Jard', '45645', 'martin@email.com', 'mfrontera', '$2y$10$JXrY0e/ESbazgbqHKyHRFOu45dr6hft8Y23haoJc3vBI.NDhhRzVm', '[\"ROLE_USER\"]');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
