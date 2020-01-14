-- phpMyAdmin SQL Dump
-- version 4.7.9
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Jan 14, 2020 at 03:38 PM
-- Server version: 5.7.21
-- PHP Version: 7.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `rescad`
--

-- --------------------------------------------------------

--
-- Table structure for table `bilan`
--

DROP TABLE IF EXISTS `bilan`;
CREATE TABLE IF NOT EXISTS `bilan` (
  `id_bilan` int(11) NOT NULL AUTO_INCREMENT,
  `libelle` text NOT NULL,
  `leader` int(11) NOT NULL,
  `traite` int(11) DEFAULT '0',
  `date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `intitule` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`id_bilan`),
  KEY `FK_bilan_leader` (`leader`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `categorie`
--

DROP TABLE IF EXISTS `categorie`;
CREATE TABLE IF NOT EXISTS `categorie` (
  `id_cat` int(11) NOT NULL AUTO_INCREMENT,
  `libelle_cat` varchar(255) NOT NULL,
  PRIMARY KEY (`id_cat`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `depart`
--

DROP TABLE IF EXISTS `depart`;
CREATE TABLE IF NOT EXISTS `depart` (
  `id_dep` int(11) NOT NULL AUTO_INCREMENT,
  `nom` varchar(255) NOT NULL,
  PRIMARY KEY (`id_dep`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `emploi`
--

DROP TABLE IF EXISTS `emploi`;
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
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `evenements`
--

DROP TABLE IF EXISTS `evenements`;
CREATE TABLE IF NOT EXISTS `evenements` (
  `id_even` int(11) NOT NULL AUTO_INCREMENT,
  `titre` varchar(255) NOT NULL,
  `details` varchar(255) NOT NULL,
  `photo` varchar(255) NOT NULL,
  PRIMARY KEY (`id_even`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `localite`
--

DROP TABLE IF EXISTS `localite`;
CREATE TABLE IF NOT EXISTS `localite` (
  `id_local` int(11) NOT NULL AUTO_INCREMENT,
  `libelle_local` varchar(255) NOT NULL,
  PRIMARY KEY (`id_local`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `orientation`
--

DROP TABLE IF EXISTS `orientation`;
CREATE TABLE IF NOT EXISTS `orientation` (
  `id_orien` int(11) NOT NULL AUTO_INCREMENT,
  `titre_orien` varchar(255) NOT NULL,
  `detail_orien` varchar(255) NOT NULL,
  `photo_orien` varchar(255) NOT NULL,
  PRIMARY KEY (`id_orien`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `stage`
--

DROP TABLE IF EXISTS `stage`;
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
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `suggestion`
--

DROP TABLE IF EXISTS `suggestion`;
CREATE TABLE IF NOT EXISTS `suggestion` (
  `id_sugg` int(11) NOT NULL AUTO_INCREMENT,
  `message` text NOT NULL,
  `nom` varchar(50) NOT NULL,
  `intitule` varchar(50) NOT NULL,
  `date` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `reponse` text,
  `resolu` int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id_sugg`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
CREATE TABLE IF NOT EXISTS `users` (
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
) ENGINE=InnoDB AUTO_INCREMENT=29 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id_leader`, `nom`, `prenom`, `role`, `ecole`, `pays`, `email`, `promo`, `password`) VALUES
(7, 'SORO', 'TEPI ALASSANE', 'admin', 'ESATIC', 'CI', 'tepialassane@gmail.com', '2015-2016', '111e2ecc3f7aaa5622bd90f86e73d3ed'),
(9, 'DOUMBIA', 'AL MOUSTAPHA', 'user', 'ESATIC', 'CI', 'moustapha@gmail.com', '2016-2017', '37f5108ee2c96a717b545c2322e30de9'),
(10, 'BOSSON', 'WILFRIED', 'user', 'ESATIC', 'CI', 'bosson@gmail.com', '2014-2015', '34eab56bf67ef37c59e782a8f0979285'),
(11, 'Mointi', 'Dje Bi', 'user', 'ESATIC', 'CI', 'mointi@gmail.com', '2013-2016', '202cb962ac59075b964b07152d234b70'),
(17, 'Stéphano', 'Paul', 'user', 'ESATIC', 'FRANCE', 'paul@gmail.com', '2018-2019', 'fcea920f7412b5da7be0cf42b8c93759'),
(24, 'Kouassi', 'Bob', 'user', 'ESATIC', 'FRANCE', 'mointipatrice@gmail.com', '2018-2019', '202cb962ac59075b964b07152d234b70'),
(25, 'Kouassi', 'Bob', 'user', 'ESATIC', 'FRANCE', 'mointipatrice@gmail.com', '2018-2019', '202cb962ac59075b964b07152d234b70'),
(28, 'Goli', 'Paul', 'admin', 'ESATIC', 'FRANCE', 'goli@gmail.com', '2018-2019', '202cb962ac59075b964b07152d234b70');

--
-- Constraints for dumped tables
--

--
-- Constraints for table `bilan`
--
ALTER TABLE `bilan`
  ADD CONSTRAINT `FK_bilan_leader` FOREIGN KEY (`leader`) REFERENCES `users` (`id_leader`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `emploi`
--
ALTER TABLE `emploi`
  ADD CONSTRAINT `emploi_ibfk_1` FOREIGN KEY (`id_cat`) REFERENCES `categorie` (`id_cat`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `emploi_ibfk_2` FOREIGN KEY (`id_local`) REFERENCES `localite` (`id_local`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `stage`
--
ALTER TABLE `stage`
  ADD CONSTRAINT `stage_ibfk_1` FOREIGN KEY (`id_cat`) REFERENCES `categorie` (`id_cat`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `stage_ibfk_2` FOREIGN KEY (`id_local`) REFERENCES `localite` (`id_local`) ON DELETE NO ACTION ON UPDATE NO ACTION;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
