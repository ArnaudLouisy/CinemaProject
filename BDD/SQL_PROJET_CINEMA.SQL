CREATE DATABE IF NOT EXISTS ramovie_project;

USE ramovie_project;

CREATE TABLE IF NOT EXISTS client (
  `id_client` int(16) NOT NULL AUTO_INCREMENT,
  `nom` varchar(50) NOT NULL,
  `prenom` varchar(50) NOT NULL,
 `email` varchar(50) NOT NULL,
  `mot_de_passe` varchar(50) NOT NULL,
    PRIMARY KEY (`id_client`)
)ENGINE=InnoDB   ;

CREATE TABLE IF NOT EXISTS reservation(

  `id_reservation` int(16) NOT NULL AUTO_INCREMENT,
  `moyen_paiment` varchar(50) NOT NULL,
  `date_reservation` int (8) NOT NULL,
  `ref_client` int(16) NOT NULL,
  `ref_salle` int(16) NOT NULL,
  PRIMARY KEY (`id_reservation`)

) ENGINE=InnoDB   ;

CREATE TABLE IF NOT EXISTS correspond (
  `nombre de place` int(19) NOT NULL,
  `ref_reservation` int(16) NOT NULL,
  `ref_tarif` int(16) NOT NULL,
  PRIMARY KEY (`ref_reservation`, `ref_tarif`)

)ENGINE=InnoDB  ;

CREATE TABLE IF NOT EXISTS tarif (
`id_tarif`int(16) NOT NULL AUTO_INCREMENT,
`nom_tarif` varchar(50) NOT NULL
`prix`int(16) NOT NULL,
`description_tarif` varchar(50) NOT NULL,
PRIMARY KEY (`id_tarif`)

) ENGINE=InnoDB ;

CREATE TABLE IF NOT EXISTS salle_de_cinema(
`id_salle` int(16) NOT NULL AUTO_INCREMENT,
`nom_salle` varchar(50) NOT NULL,
`nombre_places` int(16) NOT NULL,
`ref_film` int(16) NOT NULL,
PRIMARY KEY (`id_salle`)

)ENGINE=InnoDB ;

CREATE TABLE IF NOT EXISTS film(
`id_film` int(16) NOT NULL AUTO_INCREMENT,
`titre` varchar(50) NOT NULL,
`année_sortie` int(3) NOT NULL,
`description` varchar(50) NOT NULL,
`image` varchar(50) NOT NULL,
PRIMARY KEY (`id_film`)
)ENGINE=InnoDB ;

ALTER TABLE `reservation`
ADD CONSTRAINT `fk_reservation_client` FOREIGN KEY (`ref_client`) REFERENCES `client` (`id_client`),
ADD CONSTRAINT `fk_reservation_salle_de_cinema` FOREIGN KEY (`ref_salle`) REFERENCES `salle_de_cinema` (`id_salle`);

ALTER TABLE `correspond`
ADD CONSTRAINT `fk_correspond_reservation` FOREIGN KEY (`ref_reservation`) REFERENCES `reservation`(`id_reservation`),
ADD CONSTRAINT `fk_correspond_tarif` FOREIGN KEY (`ref_tarif`) REFERENCES `tarif` (`id_tarif`);

ALTER TABLE `salle_de_cinema`
ADD CONSTRAINT `fk_salle_de_cinema_film`FOREIGN KEY (`ref_film`) REFERENCES `film`(`id_film`);

ALTER TABLE `film` CHANGE `image` `image` BLOB NOT NULL;
