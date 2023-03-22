-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Hôte : localhost
-- Généré le : mer. 22 mars 2023 à 10:20
-- Version du serveur : 10.5.18-MariaDB-0+deb11u1
-- Version de PHP : 7.4.33

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `bdrdugas2`
--

-- --------------------------------------------------------

--
-- Structure de la table `atelier`
--

CREATE TABLE `atelier` (
  `IDEVENEMENT` int(11) NOT NULL,
  `NBPARTICIPANTS` int(11) DEFAULT NULL,
  `NBPLACESRESTANTES` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Déchargement des données de la table `atelier`
--

INSERT INTO `atelier` (`IDEVENEMENT`, `NBPARTICIPANTS`, `NBPLACESRESTANTES`) VALUES
(2, 40, 37),
(5, 25, 0),
(7, 30, 30);

-- --------------------------------------------------------

--
-- Structure de la table `commentaire_atelier`
--

CREATE TABLE `commentaire_atelier` (
  `IDCOMMENTAIRE` int(11) NOT NULL,
  `EMAIL` varchar(32) NOT NULL,
  `COMMENTAIRE` varchar(255) NOT NULL,
  `IDATELIER` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `commentaire_atelier`
--

INSERT INTO `commentaire_atelier` (`IDCOMMENTAIRE`, `EMAIL`, `COMMENTAIRE`, `IDATELIER`) VALUES
(1, 'email', 'commentaireTest', 2),
(2, 't@t.com', 'cici es', 5),
(3, 't@t.com', 'cici es', 5),
(4, 't@t.com', 'cici est', 5),
(5, 'truc@truc.com', 'truc', 2),
(6, 'a@a.ac', 'a', 2),
(7, 'a@a.ac', 'a', 2),
(8, 'a3@a.ac', 'a3', 2),
(9, '3@3.com', '3', 2),
(10, '3@3.com', '333333333', 7);

-- --------------------------------------------------------

--
-- Structure de la table `conference`
--

CREATE TABLE `conference` (
  `IDEVENEMENT` int(11) NOT NULL,
  `THEME` varchar(128) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Déchargement des données de la table `conference`
--

INSERT INTO `conference` (`IDEVENEMENT`, `THEME`) VALUES
(1, 'Conference1'),
(6, 'Conference2');

-- --------------------------------------------------------

--
-- Structure de la table `evenement`
--

CREATE TABLE `evenement` (
  `IDEVENEMENT` int(11) NOT NULL,
  `IDHACKATHON` int(11) NOT NULL,
  `NOMEVENEMENT` char(64) DEFAULT NULL,
  `DATEDEBUT` date DEFAULT NULL,
  `DATEFIN` date DEFAULT NULL,
  `DUREE` time DEFAULT NULL,
  `TYPE` varchar(20) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Déchargement des données de la table `evenement`
--

INSERT INTO `evenement` (`IDEVENEMENT`, `IDHACKATHON`, `NOMEVENEMENT`, `DATEDEBUT`, `DATEFIN`, `DUREE`, `TYPE`) VALUES
(1, 1, 'evenementconf1', '2022-11-25', '2022-11-27', '48:00:00', 'conference'),
(2, 1, 'evenementatel1', '2022-11-25', '2022-11-27', '25:00:00', 'atelier'),
(5, 2, 'evenementatel2', '2023-03-01', '2023-03-31', '24:00:00', 'atelier'),
(6, 2, 'evenementconf2', '2023-03-07', '2023-03-17', '42:00:00', 'conference'),
(7, 1, 'Atelier3', '2023-03-20', '2023-03-22', '23:00:00', 'atelier');

-- --------------------------------------------------------

--
-- Structure de la table `favoris`
--

CREATE TABLE `favoris` (
  `IDFAVORIS` int(11) NOT NULL,
  `IDPARTICIPANT` int(11) NOT NULL,
  `IDHACKATHON` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Structure de la table `hackathon`
--

CREATE TABLE `hackathon` (
  `IDHACKATHON` int(11) NOT NULL,
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
  `NBPLACESRESTANTES` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Déchargement des données de la table `hackathon`
--

INSERT INTO `hackathon` (`IDHACKATHON`, `DATEDEBUT`, `DATEFIN`, `HEUREDEBUT`, `HEUREFIN`, `LIEU`, `RUE`, `VILLE`, `CP`, `THEME`, `DESCRIPTION`, `IMAGE`, `DATELIMITE`, `NBPLACES`, `NBPLACESRESTANTES`) VALUES
(1, '2022-11-25', '2022-11-28', '12:00:00', '18:00:00', 'Talent Garden', '100 Avenue Willy Brandt', 'Lille', '59777', 'La nuit du code citoyen', 'La Nuit du Code Citoyen est un hackathon open source qui a pour but d’accélérer des projets numériques d’intérêt général sur le thème Transitions.', 'https://cdn.pixabay.com/photo/2020/05/30/17/18/wind-power-plant-5239642__480.jpg', '2022-10-25', 51, 50),
(2, '2021-12-08', '2021-12-22', '09:30:00', '18:00:00', 'Loco Numérique', '123 Bd Louis Blanc', 'La Roche Sur Yon', '85000', 'Hackathon sur le changement climatique et la protection de la biodiversité', 'Un hackathon pour mieux connaître et protéger la biodiversité', 'https://cdn.pixabay.com/photo/2020/03/19/21/25/laptop-4948837__480.jpg', '2021-11-08', 20, 19),
(3, '2022-01-27', '2022-01-30', '18:30:00', '20:30:00', 'Lelaptop: atelier modulable', '7 rue Geoffroy Langevin', 'Paris', '75004', 'DefInSpace', '24H pour imaginer la défense spatiale de demain', 'https://media.istockphoto.com/photos/laser-cannon-incapacitates-enemy-satellite-in-space-picture-id1265211446?b=1&k=20&m=1265211446&s=170667a&w=0&h=3oeJG_wzOus3Vn_08d61PpcEkTYFiiquxpghRTvcdWU=', NULL, 40, 39),
(5, '2023-06-28', '2023-06-30', NULL, NULL, 'Euratechnologies', '165 Avenue de Bretagne', 'Lille', '59000', 'Hackathon Summer Space Festival', NULL, 'https://cdn.pixabay.com/photo/2016/10/20/18/35/earth-1756274__340.jpg', NULL, 150, 150),
(6, '2023-11-05', '2023-11-06', '08:00:00', '08:00:00', 'Le palace', '4 rue Voltaire', 'Nantes', '44000', 'InnovHathon', NULL, NULL, NULL, 25, 25),
(7, '2023-04-09', '2023-04-11', NULL, NULL, 'La Cantine', '11 Rue La Noue', 'Nantes', '44200', 'Hacking Health', ' Un marathon d\'innovation en santé', 'https://cdn.pixabay.com/photo/2016/11/09/15/27/dna-1811955__340.jpg', '2022-03-09', 250, 250),
(8, '2022-12-16', '2022-12-16', '00:00:00', '00:00:00', 'lieu', 'rue', 'ville', '85555', 'theme', 'description', NULL, '2022-11-16', 25, 25);

-- --------------------------------------------------------

--
-- Structure de la table `inscription`
--

CREATE TABLE `inscription` (
  `CODE` int(11) NOT NULL,
  `IDPARTICIPANT` int(11) NOT NULL,
  `IDHACKATHON` int(11) NOT NULL,
  `DATEINSCRIPTION` date DEFAULT NULL,
  `DESCRIPTION` char(255) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Déchargement des données de la table `inscription`
--

INSERT INTO `inscription` (`CODE`, `IDPARTICIPANT`, `IDHACKATHON`, `DATEINSCRIPTION`, `DESCRIPTION`) VALUES
(6, 30, 2, '2023-03-17', 'oui test'),
(7, 30, 3, '2023-03-17', 'oui test2'),
(18, 32, 2, '2023-03-20', ''),
(14, 1, 2, '2023-03-20', 'oui2'),
(17, 31, 2, '2023-03-20', 'oui');

-- --------------------------------------------------------

--
-- Structure de la table `intervenant`
--

CREATE TABLE `intervenant` (
  `IDINTERVENANT` int(11) NOT NULL,
  `NOM` char(32) DEFAULT NULL,
  `PRENOM` char(32) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

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

CREATE TABLE `intervenir` (
  `IDINTERVENANT` int(11) NOT NULL,
  `IDEVENEMENT` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

-- --------------------------------------------------------

--
-- Structure de la table `messenger_messages`
--

CREATE TABLE `messenger_messages` (
  `id` bigint(20) NOT NULL,
  `body` longtext NOT NULL,
  `headers` longtext NOT NULL,
  `queue_name` varchar(190) NOT NULL,
  `created_at` datetime NOT NULL,
  `available_at` datetime NOT NULL,
  `delivered_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Structure de la table `participant`
--

CREATE TABLE `participant` (
  `IDPARTICIPANT` int(11) NOT NULL,
  `NOM` char(32) DEFAULT NULL,
  `PRENOM` char(32) DEFAULT NULL,
  `DATENAISSANCE` date DEFAULT NULL,
  `VILLE` char(64) DEFAULT NULL,
  `RUE` varchar(128) DEFAULT NULL,
  `CP` char(5) DEFAULT NULL,
  `EMAIL` char(32) DEFAULT NULL,
  `LOGIN` char(32) DEFAULT NULL,
  `MDP` char(64) DEFAULT NULL,
  `ROLES` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin NOT NULL CHECK (json_valid(`ROLES`))
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Déchargement des données de la table `participant`
--

INSERT INTO `participant` (`IDPARTICIPANT`, `NOM`, `PRENOM`, `DATENAISSANCE`, `VILLE`, `RUE`, `CP`, `EMAIL`, `LOGIN`, `MDP`, `ROLES`) VALUES
(1, 'Beauchene', 'Swan', '2002-10-25', 'Sainte-Foy', '66 rue des Fauvettes', '85150', 'swanbeauchene@gmail.com', 'sbeauchene', '$2y$10$4QP8AajZcpLp4Ga04dYOKuLqqVmSEOaLjTfDdi9Td9WORHa0P0oOC', '[\"ROLE_USER\"]'),
(20, 'Frontera', 'Martin', '2022-12-08', 'Jard', 'Jard', '45645', 'martin@email.com', 'mfrontera', '$2y$10$NRvcKQzeXIlwhV9V7k3liOys3yGki3MK2l4EB8DwxlqXxRpjDFVsO', '[\"ROLE_USER\"]'),
(24, 'n\'importe quoi', 'toto', '2022-12-16', 'grobreuil', 'eryrey', '85142', 'martin.frontera85@gmail.com', 'tn\'importe quoi', '$2y$10$zTqBpRjH0DUsQXGmxvnPY.g8XZi9F4f5Yu7Ic7m1v4.aTDvB0umOy', '[\"ROLE_USER\"]'),
(26, 'n\'importe quoi', 'toto', '2022-12-14', 'grobreuil', '12 rue des jonquilles', '85142', 'mr.licorne85@gmail.com', 'tn\'importe quoi', '$2y$10$.G1LTPQjNh7Gl8RW87pwQ.rzdBJ3WquCgTQM8DZnMR6zN4EsduC1.', '[\"ROLE_USER\"]'),
(27, 'Frontera', 'Martin', '2022-12-01', 'Jard', 'Jard', '45645', 'martin@email.com', 'mfrontera', '$2y$10$JXrY0e/ESbazgbqHKyHRFOu45dr6hft8Y23haoJc3vBI.NDhhRzVm', '[\"ROLE_USER\"]'),
(28, 'a', 'z', '2023-02-15', 'e', 'r', 'ttttt', 'aze@zae', 'za', '$2y$10$2Tq9WoAcGMP2YwvHoh6HjOWnHR6prxd8IRZt43RwRKTlxCsU6a.xW', '[\"ROLE_USER\"]'),
(30, 'test', 'test', '2023-03-14', 'zqd', 'zqd', '85100', 'qdzb@gmail.com', 'ttest', '$2y$10$dxLxvqyJf2R20LOML.riS.UL5Ia2sAIfujec.zCC4YZONZkctymoK', '[\"ROLE_USER\"]'),
(31, 'T K T', 'ABCDEFGHIjklmnopqrstuvwxyz', '0001-11-30', 'La roche', '61 rue pas ouf', '8617a', 'test@gmail.fr', 'at k t', '$2y$10$IXu.Z6da.VcBkcQ1CExnqOyjhX0FUxwBx3zQ0Hib/ASOu85UaIZz.', '[\"ROLE_USER\"]'),
(32, 'a', 'a', '2023-03-01', 'La roche', 'a', '77777', 'test@gmail.fr', 'aa', '$2y$10$/EX0cevdFYD23pDI/kxe0ejS4L6eOkFCtD0LHyVKBuda/i3akCTRa', '[\"ROLE_USER\"]');

-- --------------------------------------------------------

--
-- Structure de la table `participant_atelier`
--

CREATE TABLE `participant_atelier` (
  `IDPARTICIPANT_ATELIER` int(11) NOT NULL,
  `NOM` varchar(32) NOT NULL,
  `PRENOM` varchar(32) NOT NULL,
  `EMAIL` varchar(32) NOT NULL,
  `IDATELIER` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `participant_atelier`
--

INSERT INTO `participant_atelier` (`IDPARTICIPANT_ATELIER`, `NOM`, `PRENOM`, `EMAIL`, `IDATELIER`) VALUES
(1, 'test', 'test', 'test', 2),
(2, 'hdfgh', 'ghfgh', 'ffff@fff.fr', 5),
(3, 'nom', 'prenom', 'email@gmail.com', 5),
(4, 'nom2', 'prenom2', 'email@gmail.com', 2),
(43, 'ab', 'ab', 'email2@gmail.com', 5),
(44, 'ab', 'ab', 'email3@gmail.com', 5),
(45, 'ab', 'ab', 'email4@gmail.com', 5),
(46, 'ab', 'ab', 'email5@gmail.com', 5),
(47, 'ab', 'ab', 'email6@gmail.com', 5);

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `atelier`
--
ALTER TABLE `atelier`
  ADD PRIMARY KEY (`IDEVENEMENT`);

--
-- Index pour la table `commentaire_atelier`
--
ALTER TABLE `commentaire_atelier`
  ADD PRIMARY KEY (`IDCOMMENTAIRE`),
  ADD KEY `FK_ATELIER` (`IDATELIER`) USING BTREE;

--
-- Index pour la table `conference`
--
ALTER TABLE `conference`
  ADD PRIMARY KEY (`IDEVENEMENT`);

--
-- Index pour la table `evenement`
--
ALTER TABLE `evenement`
  ADD PRIMARY KEY (`IDEVENEMENT`),
  ADD KEY `FK_EVENEMENT_HACKATHON` (`IDHACKATHON`);

--
-- Index pour la table `favoris`
--
ALTER TABLE `favoris`
  ADD PRIMARY KEY (`IDFAVORIS`),
  ADD KEY `FK_PARTICIPANT` (`IDPARTICIPANT`) USING BTREE,
  ADD KEY `FK_HACKATHON` (`IDHACKATHON`) USING BTREE;

--
-- Index pour la table `hackathon`
--
ALTER TABLE `hackathon`
  ADD PRIMARY KEY (`IDHACKATHON`);

--
-- Index pour la table `inscription`
--
ALTER TABLE `inscription`
  ADD PRIMARY KEY (`CODE`),
  ADD KEY `FK_INSCRIPTION_PARTICIPANT` (`IDPARTICIPANT`),
  ADD KEY `FK_INSCRIPTION_HACKATHON` (`IDHACKATHON`);

--
-- Index pour la table `intervenant`
--
ALTER TABLE `intervenant`
  ADD PRIMARY KEY (`IDINTERVENANT`);

--
-- Index pour la table `intervenir`
--
ALTER TABLE `intervenir`
  ADD PRIMARY KEY (`IDINTERVENANT`,`IDEVENEMENT`),
  ADD KEY `FK_INTERVENIR_CONFERENCE` (`IDEVENEMENT`);

--
-- Index pour la table `messenger_messages`
--
ALTER TABLE `messenger_messages`
  ADD PRIMARY KEY (`id`),
  ADD KEY `IDX_75EA56E0FB7336F0` (`queue_name`),
  ADD KEY `IDX_75EA56E0E3BD61CE` (`available_at`),
  ADD KEY `IDX_75EA56E016BA31DB` (`delivered_at`);

--
-- Index pour la table `participant`
--
ALTER TABLE `participant`
  ADD PRIMARY KEY (`IDPARTICIPANT`);

--
-- Index pour la table `participant_atelier`
--
ALTER TABLE `participant_atelier`
  ADD PRIMARY KEY (`IDPARTICIPANT_ATELIER`),
  ADD KEY `FK_PARTICIPANT_ATELIER` (`IDATELIER`) USING BTREE;

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `commentaire_atelier`
--
ALTER TABLE `commentaire_atelier`
  MODIFY `IDCOMMENTAIRE` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT pour la table `evenement`
--
ALTER TABLE `evenement`
  MODIFY `IDEVENEMENT` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT pour la table `favoris`
--
ALTER TABLE `favoris`
  MODIFY `IDFAVORIS` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;

--
-- AUTO_INCREMENT pour la table `hackathon`
--
ALTER TABLE `hackathon`
  MODIFY `IDHACKATHON` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT pour la table `inscription`
--
ALTER TABLE `inscription`
  MODIFY `CODE` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT pour la table `intervenant`
--
ALTER TABLE `intervenant`
  MODIFY `IDINTERVENANT` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT pour la table `messenger_messages`
--
ALTER TABLE `messenger_messages`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `participant`
--
ALTER TABLE `participant`
  MODIFY `IDPARTICIPANT` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;

--
-- AUTO_INCREMENT pour la table `participant_atelier`
--
ALTER TABLE `participant_atelier`
  MODIFY `IDPARTICIPANT_ATELIER` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=48;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
