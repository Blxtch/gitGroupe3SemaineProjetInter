-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3306
-- Généré le : lun. 18 déc. 2023 à 13:53
-- Version du serveur : 8.0.31
-- Version de PHP : 8.0.26

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `delivisimsgr3`
--

-- --------------------------------------------------------

--
-- Structure de la table `billets`
--

DROP TABLE IF EXISTS `billets`;
CREATE TABLE IF NOT EXISTS `billets` (
  `id_billet` int NOT NULL AUTO_INCREMENT,
  `commentaire` text CHARACTER SET ascii COLLATE ascii_general_ci NOT NULL,
  `note_5` int NOT NULL,
  `id_user` int NOT NULL,
  PRIMARY KEY (`id_billet`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Structure de la table `chat_box`
--

DROP TABLE IF EXISTS `chat_box`;
CREATE TABLE IF NOT EXISTS `chat_box` (
  `id_chat` int NOT NULL AUTO_INCREMENT,
  `id_message` int NOT NULL,
  `message` text CHARACTER SET ascii COLLATE ascii_general_ci NOT NULL,
  `id_user` int NOT NULL,
  PRIMARY KEY (`id_chat`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Structure de la table `commandes`
--

DROP TABLE IF EXISTS `commandes`;
CREATE TABLE IF NOT EXISTS `commandes` (
  `num_commande` int NOT NULL AUTO_INCREMENT,
  `etat_commande` varchar(25) CHARACTER SET ascii COLLATE ascii_general_ci NOT NULL,
  `commande_accepte` tinyint(1) NOT NULL,
  `id_logement` int NOT NULL,
  `id_restau` int NOT NULL,
  `id_plat` int NOT NULL,
  `id_user` int NOT NULL,
  PRIMARY KEY (`num_commande`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Structure de la table `logement`
--

DROP TABLE IF EXISTS `logement`;
CREATE TABLE IF NOT EXISTS `logement` (
  `id_logement` int NOT NULL AUTO_INCREMENT,
  `nom_logement` varchar(25) CHARACTER SET ascii COLLATE ascii_general_ci NOT NULL,
  `prix_logement` int NOT NULL,
  `id_user` int NOT NULL COMMENT 'clé primaire user',
  PRIMARY KEY (`id_logement`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Structure de la table `message`
--

DROP TABLE IF EXISTS `message`;
CREATE TABLE IF NOT EXISTS `message` (
  `id_message` int NOT NULL AUTO_INCREMENT,
  `message` int NOT NULL,
  PRIMARY KEY (`id_message`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Structure de la table `panier`
--

DROP TABLE IF EXISTS `panier`;
CREATE TABLE IF NOT EXISTS `panier` (
  `id_panier` int NOT NULL AUTO_INCREMENT,
  `id_plat` int NOT NULL,
  `id_user` int NOT NULL,
  `id_restau` int NOT NULL,
  `prix_plat` int NOT NULL,
  `total_prix` int NOT NULL,
  PRIMARY KEY (`id_panier`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Structure de la table `plats`
--

DROP TABLE IF EXISTS `plats`;
CREATE TABLE IF NOT EXISTS `plats` (
  `id_plat` int NOT NULL AUTO_INCREMENT,
  `nom_plat` varchar(25) CHARACTER SET ascii COLLATE ascii_general_ci NOT NULL,
  `type_plat` varchar(25) CHARACTER SET ascii COLLATE ascii_general_ci NOT NULL,
  `prix_plat` float NOT NULL,
  `id_restau` int NOT NULL,
  PRIMARY KEY (`id_plat`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Structure de la table `restaurants`
--

DROP TABLE IF EXISTS `restaurants`;
CREATE TABLE IF NOT EXISTS `restaurants` (
  `id_restau` int NOT NULL AUTO_INCREMENT,
  `nom_restau` varchar(25) CHARACTER SET ascii COLLATE ascii_general_ci NOT NULL,
  `type_restau` varchar(25) CHARACTER SET ascii COLLATE ascii_general_ci NOT NULL,
  `note_restau` int NOT NULL COMMENT 'étoile de 1 à 5',
  `nbr_vente_j` int NOT NULL,
  `nbr_vente_s` int NOT NULL,
  `nbr_vente_m` int NOT NULL,
  `nbr_j` int NOT NULL,
  PRIMARY KEY (`id_restau`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Structure de la table `user`
--

DROP TABLE IF EXISTS `user`;
CREATE TABLE IF NOT EXISTS `user` (
  `id_user` int NOT NULL AUTO_INCREMENT,
  `nom_user` varchar(25) CHARACTER SET ascii COLLATE ascii_general_ci NOT NULL,
  `prenom_user` varchar(25) CHARACTER SET ascii COLLATE ascii_general_ci NOT NULL,
  `id_logement` int NOT NULL,
  PRIMARY KEY (`id_user`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
