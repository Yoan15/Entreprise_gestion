-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1
-- Généré le : lun. 30 nov. 2020 à 10:14
-- Version du serveur :  10.4.11-MariaDB
-- Version de PHP : 7.4.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `employer`
--

-- --------------------------------------------------------

--
-- Structure de la table `emp`
--

CREATE TABLE `emp` (
  `NOEMP` int(4) NOT NULL,
  `NOM` varchar(20) DEFAULT NULL,
  `PRENOM` varchar(20) DEFAULT NULL,
  `EMPLOI` varchar(20) DEFAULT NULL,
  `SUP` int(4) DEFAULT NULL,
  `EMBAUCHE` date DEFAULT NULL,
  `SAL` float(9,2) DEFAULT NULL,
  `COMM` float(9,2) DEFAULT NULL,
  `NOSERV` int(2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `emp`
--

INSERT INTO `emp` (`NOEMP`, `NOM`, `PRENOM`, `EMPLOI`, `SUP`, `EMBAUCHE`, `SAL`, `COMM`, `NOSERV`) VALUES
(1000, 'LEROY', 'PAUL', 'PRESIDENT', NULL, '1987-10-25', 55005.50, NULL, 1),
(1100, 'DELPIERRE', 'DOROTHEE', 'SECRETAIRE', 1000, '1987-10-25', 12351.20, NULL, 1),
(1101, 'DUMONT', 'LOUIS', 'VENDEUR', 1300, '1987-10-25', 9047.90, 0.00, 1),
(1102, 'MINET', 'MARC', 'VENDEUR', 1300, '1987-10-25', 8085.81, 17230.00, 1),
(1104, 'NYS', 'ETIENNE', 'TECHNICIEN', 1200, '1987-10-25', 12342.20, NULL, 1),
(1105, 'DENIMAL', 'JEROME', 'COMPTABLE', 1600, '1987-10-25', 15746.60, NULL, 1),
(1200, 'LEMAIRE', 'GUY', 'DIRECTEUR', 1000, '1987-11-03', 36303.60, NULL, 2),
(1201, 'MARTIN', 'JEAN', 'TECNICIEN', 1200, '1987-06-25', 11235.10, NULL, 2),
(1202, 'DUPONT', 'JACQUES', 'TECNICIEN', 1200, '1988-10-30', 10313.00, NULL, 2),
(1300, 'LENOIR', 'GERARD', 'DIRECTEUR', 1000, '1987-04-02', 31353.10, 13071.00, 3),
(1301, 'GERARD', 'ROBERT', 'VENDEUR', 1300, '1999-04-16', 7694.77, 12430.00, 3),
(1303, 'MASURE', 'EMILE', 'TECHNICIEN', 1200, '1988-06-17', 10451.10, NULL, 3),
(1500, 'DUPONT', 'JEAN', 'DIRECTEUR', 1000, '1987-10-23', 28434.80, NULL, 5),
(1501, 'DUPIRE', 'PIERRE', 'ANALYSTE', 1500, '1984-10-24', 23102.30, NULL, 5),
(1502, 'DURAND', 'BERNARD', 'PROGRAMMEUR', 1500, '1987-07-30', 13201.30, NULL, 5),
(1503, 'DELNATTE', 'LUC', 'PUPITREUR', 1500, '1999-01-15', 8801.01, NULL, 5),
(1600, 'LAVARE', 'PAUL', 'DIRECTEUR', 1000, '1991-12-13', 31238.10, NULL, 6),
(1601, 'CARON', 'ALAIN', 'COMPTABLE', 1600, '1985-09-16', 33003.30, NULL, 6),
(1602, 'DUBOIS', 'JULES', 'VENDEUR', 1300, '1990-12-20', 9520.95, 35535.00, 6),
(1603, 'MOREL', 'ROBERT', 'COMPTABLE', 1600, '1985-07-18', 33003.30, NULL, 6),
(1604, 'HAVET', 'ALAIN', 'VENDEUR', 1300, '1991-01-01', 9388.94, 33415.00, 6),
(1605, 'RICHARD', 'JULES', 'COMPTABLE', 1600, '1985-10-22', 33503.40, NULL, 5),
(1615, 'DUPREZ', 'JEAN', 'BALAYEUR', 1000, '1998-10-22', 6000.60, NULL, 5);

-- --------------------------------------------------------

--
-- Structure de la table `emp2`
--

CREATE TABLE `emp2` (
  `NOEMP` int(4) NOT NULL,
  `NOM` varchar(20) DEFAULT NULL,
  `PRENOM` varchar(20) DEFAULT NULL,
  `EMPLOI` varchar(20) DEFAULT NULL,
  `SUP` int(4) DEFAULT NULL,
  `EMBAUCHE` date DEFAULT NULL,
  `SAL` float(9,2) DEFAULT NULL,
  `COMM` float(9,2) DEFAULT NULL,
  `NOSERV` int(2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `emp2`
--

INSERT INTO `emp2` (`NOEMP`, `NOM`, `PRENOM`, `EMPLOI`, `SUP`, `EMBAUCHE`, `SAL`, `COMM`, `NOSERV`) VALUES
(1000, 'LEROY', 'PAUL', 'PRESIDENT', NULL, '1987-10-25', 55005.50, NULL, 1),
(1101, 'DUMONT', 'LOUIS', 'VENDEUR', 1300, '1987-10-25', 9952.69, 0.00, 1),
(1102, 'MINET', 'MARC', 'VENDEUR', 1300, '1987-10-25', 8894.39, 17230.00, 1),
(1104, 'NYS', 'ETIENNE', 'TECHNICIEN', 1200, '1987-10-25', 13576.42, NULL, 1),
(1105, 'DENIMAL', 'JEROME', 'COMPTABLE', 1600, '1987-10-25', 17321.26, NULL, 1),
(1200, 'LEMAIRE', 'GUY', 'DIRECTEUR', 1000, '1987-11-03', 36303.60, NULL, 2),
(1201, 'MARTIN', 'JEAN', 'TECNICIEN', 1200, '1987-06-25', 12358.61, NULL, 2),
(1202, 'DUPONT', 'JACQUES', 'TECNICIEN', 1200, '1988-10-30', 11344.30, NULL, 2),
(1300, 'LENOIR', 'GERARD', 'DIRECTEUR', 1000, '1987-04-02', 31353.10, 13071.00, 3),
(1301, 'GERARD', 'ROBERT', 'VENDEUR', 1300, '1999-04-16', 8464.25, 12430.00, 3),
(1303, 'MASURE', 'EMILE', 'TECHNICIEN', 1200, '1988-06-17', 11496.21, NULL, 3),
(1500, 'DUPONT', 'JEAN', 'DIRECTEUR', 1000, '1987-10-23', 28434.80, NULL, 5),
(1501, 'DUPIRE', 'PIERRE', 'ANALYSTE', 1500, '1984-10-24', 23102.30, NULL, 5),
(1502, 'DURAND', 'BERNARD', 'PROGRAMMEUR', 1500, '1987-07-30', 14521.43, NULL, 5),
(1503, 'DELNATTE', 'LUC', 'PUPITREUR', 1500, '1999-01-15', 9681.11, NULL, 5),
(1504, 'DECONINCK', 'YOAN', 'DEVELOPPEUR', 1500, '2020-10-19', 20000.00, NULL, 5),
(1600, 'LAVARE', 'PAUL', 'DIRECTEUR', 1000, '1991-12-13', 31238.10, NULL, 6),
(1601, 'CARON', 'ALAIN', 'COMPTABLE', 1600, '1985-09-16', 33003.30, NULL, 6),
(1602, 'DUBOIS', 'JULES', 'VENDEUR', 1300, '1990-12-20', 10473.05, 35535.00, 6),
(1603, 'MOREL', 'ROBERT', 'COMPTABLE', 1600, '1985-07-18', 33003.30, NULL, 6),
(1604, 'HAVET', 'ALAIN', 'VENDEUR', 1300, '1991-01-01', 10327.83, 33415.00, 6),
(1605, 'RICHARD', 'JULES', 'COMPTABLE', 1600, '1985-10-22', 33503.40, NULL, 5),
(5555, 'VALJEAN', 'JEAN', 'TEST', 1000, '2020-11-02', 20000.00, NULL, 4),
(5556, 'DUPOND', 'LOUIS', 'TEST', 5555, '2020-11-02', 20000.00, NULL, 4),
(5558, 'GOODENOUGH', 'DAVID', 'DEVELOPPEUR', 1000, '2020-11-06', 50000.00, 20000.00, 5),
(6000, 'LEWIS', 'MIKE', 'TEST', 5555, '2020-11-09', 30000.00, NULL, 4),
(6001, 'VITCH', 'BORIS', 'TEST', 6000, '2020-11-13', 20000.00, 10000.00, 7),
(6002, 'KARAKOV', 'NONNA', 'TEST', 6000, '2020-11-27', 24785.00, 2457.00, 8);

-- --------------------------------------------------------

--
-- Structure de la table `profil`
--

CREATE TABLE `profil` (
  `id` int(11) NOT NULL,
  `username` varchar(30) DEFAULT NULL,
  `mdp` varchar(255) DEFAULT NULL,
  `profil` varchar(30) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `profil`
--

INSERT INTO `profil` (`id`, `username`, `mdp`, `profil`) VALUES
(2, 'yoann.deco@gmail.com', '$2y$10$NDBKRF04YSJ92Auu0ezFxOMcNFuqQGYqOL3awUSxZmk4fPCQrgiwq', 'admin'),
(3, 'jean.delacroix@hotmail.fr', '$2y$10$Q8xqtPl./tTBfOddAX71yOxYCMFNKQXjHqpwkz6ZQN.ru02ghs7HS', 'utilisateur'),
(4, 'duval.kevin@hotmail.com', '$2y$10$zP/a2/gOQ82Kog0YCLIBSu5Mmqff.MQ6lC27B7B4pFPPg1/2I8fii', 'utilisateur'),
(5, 'dupond.maurice@gmail.com', '$2y$10$N7ys18niIHNmG24YJHfpOOfsufwltiyt1vDe7WdHcht9WX7JG13TO', 'utilisateur'),
(6, 'ma.r@gmail.com', '$2y$10$phdY86Y6cDsnZSiqLzPXseJqsYwzDtndLUZrpmQV04TdnB1FrA5Fi', 'utilisateur'),
(7, 'test@gmail.com', '$2y$10$m4KR9snOQcFf2vJfdmLwruIts8ysndlIoPz.izYDPUcil47kDcLcW', 'utilisateur'),
(8, 'a.r@gmail.com', '$2y$10$RdPIpmW87dnBBSCaOHF5YOKWEoPwnV.suI.k//VzqPqzMBCwpjc.O', 'utilisateur'),
(19, 'test@gmail.com', '$2y$10$3.SKYhcKYCVDl2pPTHd8qu9NDtEluAqQINHMjhlq//5LUJcmqXAe.', 'utilisateur'),
(25, 'test2@gmail.com', '$2y$10$CfObAjvDJw9EvTBhFzgrV.UHSrTeXYbX1qw8FPH1M9pJazCrjA0vK', 'utilisateur'),
(29, 'test3@gmail.com', '$2y$10$ImDDwoonANoMYPCtW29ntua7FI0izaa7ScI2Idk9KYEWUdF.VQ8ZK', 'utilisateur');

-- --------------------------------------------------------

--
-- Structure de la table `projet`
--

CREATE TABLE `projet` (
  `noproj` int(3) NOT NULL,
  `nomproj` varchar(10) DEFAULT NULL,
  `budget` float(6,2) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Structure de la table `serv`
--

CREATE TABLE `serv` (
  `NOSERV` int(2) NOT NULL,
  `SERVICE` varchar(20) DEFAULT NULL,
  `VILLE` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `serv`
--

INSERT INTO `serv` (`NOSERV`, `SERVICE`, `VILLE`) VALUES
(1, 'DIRECTION', 'PARIS'),
(2, 'LOGISTIQUE', 'SECLIN'),
(3, 'VENTES', 'ROUBAIX'),
(4, 'FORMATION', 'VILLENEUVE DASCQ'),
(5, 'INFORMATIQUE', 'LILLE'),
(6, 'COMPTABILITE', 'LILLE'),
(7, 'TECHNIQUE', 'ROUBAIX');

-- --------------------------------------------------------

--
-- Structure de la table `serv2`
--

CREATE TABLE `serv2` (
  `NOSERV` int(2) NOT NULL,
  `SERV` varchar(20) DEFAULT NULL,
  `VILLE` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `serv2`
--

INSERT INTO `serv2` (`NOSERV`, `SERV`, `VILLE`) VALUES
(1, 'DIRECTION', 'PARIS'),
(2, 'LOGISTIQUE', 'SECLIN'),
(3, 'VENTES', 'ROUBAIX'),
(4, 'FORMATION', 'VILLENEUVE D\'ASCQ'),
(5, 'INFORMATIQUE', 'LILLE'),
(6, 'COMPTABILITE', 'LILLE'),
(7, 'TECHNIQUE', 'ROUBAIX'),
(8, 'AUTRE TEST', 'CALAIS');

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `emp`
--
ALTER TABLE `emp`
  ADD PRIMARY KEY (`NOEMP`),
  ADD KEY `NOSERV` (`NOSERV`),
  ADD KEY `SUP` (`SUP`);

--
-- Index pour la table `emp2`
--
ALTER TABLE `emp2`
  ADD PRIMARY KEY (`NOEMP`),
  ADD KEY `NOSERV` (`NOSERV`),
  ADD KEY `SUP` (`SUP`);

--
-- Index pour la table `profil`
--
ALTER TABLE `profil`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `serv`
--
ALTER TABLE `serv`
  ADD PRIMARY KEY (`NOSERV`);

--
-- Index pour la table `serv2`
--
ALTER TABLE `serv2`
  ADD PRIMARY KEY (`NOSERV`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `profil`
--
ALTER TABLE `profil`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `emp`
--
ALTER TABLE `emp`
  ADD CONSTRAINT `emp_ibfk_1` FOREIGN KEY (`NOSERV`) REFERENCES `serv` (`NOSERV`),
  ADD CONSTRAINT `emp_ibfk_2` FOREIGN KEY (`SUP`) REFERENCES `emp` (`NOEMP`);

--
-- Contraintes pour la table `emp2`
--
ALTER TABLE `emp2`
  ADD CONSTRAINT `emp2_ibfk_1` FOREIGN KEY (`NOSERV`) REFERENCES `serv2` (`NOSERV`),
  ADD CONSTRAINT `emp2_ibfk_2` FOREIGN KEY (`SUP`) REFERENCES `emp2` (`NOEMP`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
