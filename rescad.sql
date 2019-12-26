-- phpMyAdmin SQL Dump
-- version 4.0.4
-- http://www.phpmyadmin.net
--
-- Client: localhost
-- Généré le: Ven 20 Septembre 2019 à 19:55
-- Version du serveur: 5.6.12-log
-- Version de PHP: 5.4.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Base de données: `rescad`
--
CREATE DATABASE IF NOT EXISTS `rescad` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci;
USE `rescad`;

-- --------------------------------------------------------

--
-- Structure de la table `bilan`
--

CREATE TABLE IF NOT EXISTS `bilan` (
  `id_bilan` int(11) NOT NULL AUTO_INCREMENT,
  `libelle` text NOT NULL,
  `leader` int(11) NOT NULL,
  `traite` int(11) DEFAULT '0',
  `date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `intitule` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`id_bilan`),
  KEY `FK_bilan_leader` (`leader`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Structure de la table `categorie`
--

CREATE TABLE IF NOT EXISTS `categorie` (
  `id_cat` int(11) NOT NULL AUTO_INCREMENT,
  `libelle_cat` varchar(255) NOT NULL,
  PRIMARY KEY (`id_cat`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Structure de la table `emploi`
--

CREATE TABLE IF NOT EXISTS `emploi` (
  `id_emploi` int(11) NOT NULL AUTO_INCREMENT,
  `id_cat` int(11) NOT NULL,
  `id_local` int(11) NOT NULL,
  `poste_emploi` varchar(255) NOT NULL,
  `description_emploi` varchar(255) NOT NULL,
  `niveau_emploi` varchar(255) NOT NULL,
  `date_limite_emploi` datetime NOT NULL,
  `dat_publi_emploi` datetime NOT NULL,
  PRIMARY KEY (`id_emploi`),
  KEY `id_cat` (`id_cat`,`id_local`),
  KEY `id_local` (`id_local`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Structure de la table `evenements`
--

CREATE TABLE IF NOT EXISTS `evenements` (
  `id_even` int(11) NOT NULL AUTO_INCREMENT,
  `titre` varchar(255) NOT NULL,
  `details` varchar(255) NOT NULL,
  `photo` varchar(255) NOT NULL,
  PRIMARY KEY (`id_even`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Structure de la table `leader`
--

CREATE TABLE IF NOT EXISTS `leader` (
  `id_leader` int(11) NOT NULL AUTO_INCREMENT,
  `nom` varchar(50) NOT NULL,
  `prenom` varchar(255) NOT NULL,
  `role` varchar(255) DEFAULT NULL,
  `ecole` varchar(255) NOT NULL,
  `pays` varchar(255) NOT NULL,
  `email` varchar(50) DEFAULT NULL,
  `promo` varchar(100) NOT NULL,
  `password` text,
  PRIMARY KEY (`id_leader`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=11 ;

--
-- Contenu de la table `leader`
--

INSERT INTO `leader` (`id_leader`, `nom`, `prenom`, `role`, `ecole`, `pays`, `email`, `promo`, `password`) VALUES
(7, 'SORO', 'TEPI ALASSANE', 'admin', 'ESATIC', 'CI', 'tepialassane@gmail.com', '2015-2016', '111e2ecc3f7aaa5622bd90f86e73d3ed'),
(9, 'DOUMBIA', 'AL MOUSTAPHA', 'user', 'ESATIC', 'CI', 'moustapha@gmail.com', '2016-2017', '37f5108ee2c96a717b545c2322e30de9'),
(10, 'BOSSON', 'WILFRIED', 'user', 'ESATIC', 'CI', 'bosson@gmail.com', '2014-2015', '34eab56bf67ef37c59e782a8f0979285');

-- --------------------------------------------------------

--
-- Structure de la table `localite`
--

CREATE TABLE IF NOT EXISTS `localite` (
  `id_local` int(11) NOT NULL AUTO_INCREMENT,
  `libelle_local` varchar(255) NOT NULL,
  PRIMARY KEY (`id_local`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Structure de la table `orientation`
--

CREATE TABLE IF NOT EXISTS `orientation` (
  `id_orien` int(11) NOT NULL AUTO_INCREMENT,
  `titre_orien` varchar(255) NOT NULL,
  `detail_orien` varchar(255) NOT NULL,
  `photo_orien` varchar(255) NOT NULL,
  PRIMARY KEY (`id_orien`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Structure de la table `stage`
--

CREATE TABLE IF NOT EXISTS `stage` (
  `id_stage` int(11) NOT NULL AUTO_INCREMENT,
  `poste` varchar(255) NOT NULL,
  `niveau` varchar(255) NOT NULL,
  `experience` varchar(255) NOT NULL,
  `description_stage` varchar(255) NOT NULL,
  `profil` varchar(255) NOT NULL,
  `dossier_stage` varchar(255) NOT NULL,
  `date_publi` datetime NOT NULL,
  `date_limite` datetime NOT NULL,
  `id_cat` int(11) NOT NULL,
  `id_local` int(11) NOT NULL,
  PRIMARY KEY (`id_stage`),
  KEY `id_cat` (`id_cat`),
  KEY `id_cat_2` (`id_cat`,`id_local`),
  KEY `id_cat_3` (`id_cat`,`id_local`),
  KEY `id_local` (`id_local`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Structure de la table `suggestion`
--

CREATE TABLE IF NOT EXISTS `suggestion` (
  `id_sugg` int(11) NOT NULL AUTO_INCREMENT,
  `message` text NOT NULL,
  `nom` varchar(50) NOT NULL,
  `intitule` varchar(50) NOT NULL,
  `date` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `reponse` text,
  `resolu` int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id_sugg`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

--
-- Contraintes pour les tables exportées
--

--
-- Contraintes pour la table `bilan`
--
ALTER TABLE `bilan`
  ADD CONSTRAINT `FK_bilan_leader` FOREIGN KEY (`leader`) REFERENCES `leader` (`id_leader`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Contraintes pour la table `emploi`
--
ALTER TABLE `emploi`
  ADD CONSTRAINT `emploi_ibfk_1` FOREIGN KEY (`id_cat`) REFERENCES `categorie` (`id_cat`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `emploi_ibfk_2` FOREIGN KEY (`id_local`) REFERENCES `localite` (`id_local`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Contraintes pour la table `stage`
--
ALTER TABLE `stage`
  ADD CONSTRAINT `stage_ibfk_1` FOREIGN KEY (`id_cat`) REFERENCES `categorie` (`id_cat`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `stage_ibfk_2` FOREIGN KEY (`id_local`) REFERENCES `localite` (`id_local`) ON DELETE NO ACTION ON UPDATE NO ACTION;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
