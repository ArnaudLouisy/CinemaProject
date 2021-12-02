-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3306
-- Généré le :  jeu. 02 déc. 2021 à 12:41
-- Version du serveur :  5.7.26
-- Version de PHP :  7.3.5

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données :  `ramovie_project`
--

-- --------------------------------------------------------

--
-- Structure de la table `client`
--

DROP TABLE IF EXISTS `client`;
CREATE TABLE IF NOT EXISTS `client` (
  `id_client` int(16) NOT NULL AUTO_INCREMENT,
  `nom` varchar(50) NOT NULL,
  `prenom` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `mot_de_passe` varchar(50) NOT NULL,
  PRIMARY KEY (`id_client`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `correspond`
--

DROP TABLE IF EXISTS `correspond`;
CREATE TABLE IF NOT EXISTS `correspond` (
  `nombre de place` int(19) NOT NULL,
  `ref_reservation` int(16) NOT NULL,
  `ref_tarif` int(16) NOT NULL,
  PRIMARY KEY (`ref_reservation`,`ref_tarif`),
  KEY `fk_correspond_tarif` (`ref_tarif`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `film`
--

DROP TABLE IF EXISTS `film`;
CREATE TABLE IF NOT EXISTS `film` (
  `id_film` int(16) NOT NULL AUTO_INCREMENT,
  `titre` varchar(50) NOT NULL,
  `année_sortie` int(3) NOT NULL,
  `description` varchar(50) NOT NULL,
  PRIMARY KEY (`id_film`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `reservation`
--

DROP TABLE IF EXISTS `reservation`;
CREATE TABLE IF NOT EXISTS `reservation` (
  `id_reservation` int(16) NOT NULL AUTO_INCREMENT,
  `moyen_paiment` varchar(50) NOT NULL,
  `date_reservation` int(8) NOT NULL,
  `ref_client` int(16) NOT NULL,
  `ref_salle` int(16) NOT NULL,
  PRIMARY KEY (`id_reservation`),
  KEY `fk_reservation_client` (`ref_client`),
  KEY `fk_reservation_salle_de_cinema` (`ref_salle`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `salle_de_cinema`
--

DROP TABLE IF EXISTS `salle_de_cinema`;
CREATE TABLE IF NOT EXISTS `salle_de_cinema` (
  `id_salle` int(16) NOT NULL AUTO_INCREMENT,
  `nom_salle` varchar(50) NOT NULL,
  `nombre_places` int(16) NOT NULL,
  `ref_film` int(16) NOT NULL,
  PRIMARY KEY (`id_salle`),
  KEY `fk_salle_de_cinema_film` (`ref_film`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `tarif`
--

DROP TABLE IF EXISTS `tarif`;
CREATE TABLE IF NOT EXISTS `tarif` (
  `id_tarif` int(16) NOT NULL AUTO_INCREMENT,
  `nom_tarif` varchar(50) NOT NULL,
  `prix` int(16) NOT NULL,
  `description_tarif` varchar(50) NOT NULL,
  PRIMARY KEY (`id_tarif`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `correspond`
--
ALTER TABLE `correspond`
  ADD CONSTRAINT `fk_correspond_reservation` FOREIGN KEY (`ref_reservation`) REFERENCES `reservation` (`id_reservation`),
  ADD CONSTRAINT `fk_correspond_tarif` FOREIGN KEY (`ref_tarif`) REFERENCES `tarif` (`id_tarif`);

--
-- Contraintes pour la table `reservation`
--
ALTER TABLE `reservation`
  ADD CONSTRAINT `fk_reservation_client` FOREIGN KEY (`ref_client`) REFERENCES `client` (`id_client`),
  ADD CONSTRAINT `fk_reservation_salle_de_cinema` FOREIGN KEY (`ref_salle`) REFERENCES `salle_de_cinema` (`id_salle`);

--
-- Contraintes pour la table `salle_de_cinema`
--
ALTER TABLE `salle_de_cinema`
  ADD CONSTRAINT `fk_salle_de_cinema_film` FOREIGN KEY (`ref_film`) REFERENCES `film` (`id_film`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
