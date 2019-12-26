-- --------------------------------------------------------
-- Hôte :                        localhost
-- Version du serveur:           5.7.19 - MySQL Community Server (GPL)
-- SE du serveur:                Win64
-- HeidiSQL Version:             9.4.0.5125
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!50503 SET NAMES utf8mb4 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;

-- Export de la structure de la table rescad. bilan
CREATE TABLE IF NOT EXISTS `bilan` (
  `id_bilan` int(11) NOT NULL AUTO_INCREMENT,
  `libelle` text NOT NULL,
  `leader` int(11) NOT NULL,
  `traite` int(11) DEFAULT '0',
  `date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `intitule` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`id_bilan`),
  KEY `FK_bilan_leader` (`leader`),
  CONSTRAINT `FK_bilan_leader` FOREIGN KEY (`leader`) REFERENCES `leader` (`id_leader`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

-- Export de données de la table rescad.bilan : ~0 rows (environ)
/*!40000 ALTER TABLE `bilan` DISABLE KEYS */;
/*!40000 ALTER TABLE `bilan` ENABLE KEYS */;

-- Export de la structure de la table rescad. leader
CREATE TABLE IF NOT EXISTS `leader` (
  `id_leader` int(11) NOT NULL AUTO_INCREMENT,
  `nom` varchar(50) NOT NULL,
  `email` varchar(50) DEFAULT NULL,
  `password` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`id_leader`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;

-- Export de données de la table rescad.leader : ~1 rows (environ)
/*!40000 ALTER TABLE `leader` DISABLE KEYS */;
/*!40000 ALTER TABLE `leader` ENABLE KEYS */;

-- Export de la structure de la table rescad. suggestion
CREATE TABLE IF NOT EXISTS `suggestion` (
  `id_sugg` int(11) NOT NULL AUTO_INCREMENT,
  `message` text NOT NULL,
  `nom` varchar(50) NOT NULL,
  `intitule` varchar(50) NOT NULL,
  `date` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `reponse` text,
  `resolu` int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id_sugg`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=latin1;

-- Export de données de la table rescad.suggestion : ~0 rows (environ)
/*!40000 ALTER TABLE `suggestion` DISABLE KEYS */;
/*!40000 ALTER TABLE `suggestion` ENABLE KEYS */;

/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IF(@OLD_FOREIGN_KEY_CHECKS IS NULL, 1, @OLD_FOREIGN_KEY_CHECKS) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
