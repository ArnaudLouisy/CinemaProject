-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3306
-- Généré le :  mar. 04 jan. 2022 à 16:00
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
  `admin` int(1) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id_client`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `client`
--

INSERT INTO `client` (`id_client`, `nom`, `prenom`, `email`, `mot_de_passe`, `admin`) VALUES
(1, 'Administrateur', 'Admin ', 'admin@lprs.fr', 'azerty1234', 1),
(2, 'TRAN', 'Killian', 'k.tran@lprs.fr', 'mauxdepass', 1);

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
  `annee_sortie` int(3) NOT NULL,
  `description` varchar(10000) NOT NULL,
  `image` varchar(50) NOT NULL,
  PRIMARY KEY (`id_film`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `film`
--

INSERT INTO `film` (`id_film`, `titre`, `annee_sortie`, `description`, `image`) VALUES
(1, 'Spiderman No Way Home', 2021, 'Pour la première fois dans l\'histoire cinématographique de Spider-Man, notre sympathique héros est démasqué et n\'est plus capable de séparer sa vie normale des enjeux considérables de son rôle de super-héros. Lorsqu\'il sollicite l\'aide du Docteur Strange, les enjeux deviennent encore plus dangereux, le forçant à se demander ce que signifie vraiment être Spider-Man.', 'spidermannwh.jpg'),
(3, 'Les éternels ', 2021, 'Après les événements d\'\"Avengers : Endgame\", une tragédie imprévue oblige les Éternels à sortir de l\'ombre et à se rassembler à nouveau face à l\'ennemi le plus ancien de la race humaine : les Déviants.', 'leseternels.jpg'),
(6, 'Les Tuche 4 ', 2021, 'Après avoir démissionné de son poste de président de la République, Jeff et sa famille sont heureux de retrouver leur village de Bouzolles. À l\'approche des fêtes de fin d\'année, Cathy demande un unique cadeau : renouer les liens avec sa sœur Maguy, et son mari Jean-Yves avec qui Jeff est fâché depuis 10 ans. La réconciliation aurait pu se dérouler sans problème, sauf que lors d\'un déjeuner, Jeff et Jean-Yves, vont une nouvelle fois trouver un sujet de discorde : Noël.', 'lestuche.jpg'),
(7, 'Shang-Chi et la Légende des Dix Anneaux', 2021, 'Shang-Chi, un maître des arts martiaux, doit affronter son passé et tout ce qu\'il pensait avoir laissé derrière lorsqu\'il se trouve entremêlé aux affaires de la mystérieuse organisation des Dix Anneaux.', 'shangchi.jpg'),
(8, 'Raya et le Dernier Dragon', 2021, 'Humains et dragons vivaient en harmonie au royaume de Kumandra, jusqu\'à ce qu\'une force maléfique ne s\'abatte sur le royaume. Les dragons se sacrifièrent alors pour sauver l\'humanité. Lorsque cette force réapparait cinq siècles plus tard, Raya, une guerrière solitaire, se met en quête du dernier dragon pour restaurer l\'harmonie sur Kumandra, désormais divisée. Commence pour elle un long voyage au cours duquel elle découvrira qu\'il lui faudra bien plus qu\'un dragon pour sauver le monde.', 'raya.jpg'),
(9, 'OU EST ANNE FRANK !', 2021, 'Kitty, l’amie imaginaire d’Anne Frank à qui était dédié le célèbre journal, a mystérieusement pris vie de nos jours dans la maison où s’était réfugiée Anne avec sa famille, à Amsterdam, devenue depuis un lieu emblématique recevant des visiteurs du monde entier.', 'anefrank.jpg');

-- --------------------------------------------------------

--
-- Structure de la table `reservation`
--

DROP TABLE IF EXISTS `reservation`;
CREATE TABLE IF NOT EXISTS `reservation` (
  `id_reservation` int(16) NOT NULL AUTO_INCREMENT,
  `moyen_paiment` varchar(50) NOT NULL,
  `date_reservation` int(8) NOT NULL,
  `heure_reservation` time NOT NULL,
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
  `type_salle` varchar(15) NOT NULL,
  `ref_film` int(16) NOT NULL,
  PRIMARY KEY (`id_salle`),
  KEY `fk_salle_de_cinema_film` (`ref_film`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `salle_de_cinema`
--

INSERT INTO `salle_de_cinema` (`id_salle`, `nom_salle`, `nombre_places`, `type_salle`, `ref_film`) VALUES
(1, '1', 25, '4DX', 1),
(2, '2', 50, 'Ice', 1);

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
