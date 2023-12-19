-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Dec 19, 2023 at 08:40 AM
-- Server version: 8.0.30
-- PHP Version: 8.1.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `dbsemaineprojetdef`
--

-- --------------------------------------------------------

--
-- Table structure for table `billets`
--

CREATE TABLE `billets` (
  `id_billet` int NOT NULL,
  `commentaire` text CHARACTER SET ascii COLLATE ascii_general_ci NOT NULL,
  `note_5` int NOT NULL,
  `id_user` int NOT NULL,
  `id_restau` int NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `billets`
--

INSERT INTO `billets` (`id_billet`, `commentaire`, `note_5`, `id_user`, `id_restau`) VALUES
(1, 'Super bon, merci =D', 5, 1, 1),
(2, 'miam miam', 4, 2, 3),
(3, 'miam miammm', 4, 2, 3);

-- --------------------------------------------------------

--
-- Table structure for table `chat_box`
--

CREATE TABLE `chat_box` (
  `id_chat` int NOT NULL,
  `id_message` int NOT NULL,
  `message` text CHARACTER SET ascii COLLATE ascii_general_ci NOT NULL,
  `id_user` int NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Table structure for table `commandes`
--

CREATE TABLE `commandes` (
  `num_commande` int NOT NULL,
  `etat_commande` varchar(25) CHARACTER SET ascii COLLATE ascii_general_ci NOT NULL,
  `commande_accepte` tinyint(1) NOT NULL,
  `id_logement` int NOT NULL,
  `id_restau` int NOT NULL,
  `id_plat` int NOT NULL,
  `id_user` int NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `commandes`
--

INSERT INTO `commandes` (`num_commande`, `etat_commande`, `commande_accepte`, `id_logement`, `id_restau`, `id_plat`, `id_user`) VALUES
(1, 'Livree', 1, 1, 2, 4, 1),
(2, 'En cours', 0, 2, 3, 2, 2),
(3, 'En cours', 0, 2, 3, 2, 2),
(4, 'En cours', 1, 2, 3, 2, 2),
(5, 'En cours', 1, 2, 3, 2, 2);

-- --------------------------------------------------------

--
-- Table structure for table `logement`
--

CREATE TABLE `logement` (
  `id_logement` int NOT NULL,
  `nom_logement` varchar(25) CHARACTER SET ascii COLLATE ascii_general_ci NOT NULL,
  `prix_logement` int NOT NULL,
  `id_user` int NOT NULL COMMENT 'clé primaire user'
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `logement`
--

INSERT INTO `logement` (`id_logement`, `nom_logement`, `prix_logement`, `id_user`) VALUES
(1, 'Appart1', 375, 1),
(2, 'Appart2', 450, 2),
(3, 'Appart3', 10, 3);

-- --------------------------------------------------------

--
-- Table structure for table `message`
--

CREATE TABLE `message` (
  `id_message` int NOT NULL,
  `message` text NOT NULL,
  `id_user` int NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `message`
--

INSERT INTO `message` (`id_message`, `message`, `id_user`) VALUES
(1, 'Trop salé wsh', 2),
(2, 'En retard', 3),
(3, ' ipsum lorem ipsum lorem ipsum lorem', 2),
(4, ' psum lorem ipsum lorem ipsum lorem', 1);

-- --------------------------------------------------------

--
-- Table structure for table `panier`
--

CREATE TABLE `panier` (
  `id_panier` int NOT NULL,
  `id_plat` int NOT NULL,
  `id_user` int NOT NULL,
  `id_restau` int NOT NULL,
  `prix_plat` int NOT NULL,
  `total_prix` int NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `panier`
--

INSERT INTO `panier` (`id_panier`, `id_plat`, `id_user`, `id_restau`, `prix_plat`, `total_prix`) VALUES
(1, 2, 1, 2, 15, 15);

-- --------------------------------------------------------

--
-- Table structure for table `plats`
--

CREATE TABLE `plats` (
  `id_plat` int NOT NULL,
  `nom_plat` varchar(25) CHARACTER SET ascii COLLATE ascii_general_ci NOT NULL,
  `type_plat` varchar(25) CHARACTER SET ascii COLLATE ascii_general_ci NOT NULL,
  `prix_plat` float NOT NULL,
  `id_restau` int NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `plats`
--

INSERT INTO `plats` (`id_plat`, `nom_plat`, `type_plat`, `prix_plat`, `id_restau`) VALUES
(1, 'Pizza', 'Plat', 15, 1),
(2, 'Nouilles', 'Plat', 12, 2),
(3, 'Mochi Glace', 'Dessert', 5, 2),
(4, 'Tiramisu', 'Dessert', 8, 1),
(5, 'Pain a l\'ail', 'entree', 10, 1),
(6, 'nems', 'entree', 8, 2);

-- --------------------------------------------------------

--
-- Table structure for table `restaurants`
--

CREATE TABLE `restaurants` (
  `id_restau` int NOT NULL,
  `nom_restau` varchar(25) CHARACTER SET ascii COLLATE ascii_general_ci NOT NULL,
  `type_restau` varchar(25) CHARACTER SET ascii COLLATE ascii_general_ci NOT NULL,
  `note_restau` int NOT NULL COMMENT 'étoile de 1 à 5',
  `nbr_vente_j` int NOT NULL,
  `nbr_vente_s` int NOT NULL,
  `nbr_vente_m` int NOT NULL,
  `nbr_j` int NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `restaurants`
--

INSERT INTO `restaurants` (`id_restau`, `nom_restau`, `type_restau`, `note_restau`, `nbr_vente_j`, `nbr_vente_s`, `nbr_vente_m`, `nbr_j`) VALUES
(1, 'Chez Luigi', 'Italien', 5, 1, 4, 5, 27),
(2, 'Chez Ying', 'Chinois', 5, 2, 4, 6, 27),
(3, 'Palais de jade', 'Chinois', 5, 2, 10, 10000, 25),
(4, 'La tour eiffel', 'Francais', 5, 2, 10, 10000, 25);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id_user` int NOT NULL,
  `nom_user` varchar(25) CHARACTER SET ascii COLLATE ascii_general_ci NOT NULL,
  `prenom_user` varchar(25) CHARACTER SET ascii COLLATE ascii_general_ci NOT NULL,
  `login_user` varchar(25) CHARACTER SET ascii COLLATE ascii_general_ci NOT NULL,
  `mdp_user` varchar(25) CHARACTER SET ascii COLLATE ascii_general_ci NOT NULL,
  `id_logement` int NOT NULL,
  `user_class` int NOT NULL DEFAULT '0'
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id_user`, `nom_user`, `prenom_user`, `login_user`, `mdp_user`, `id_logement`, `user_class`) VALUES
(1, 'Moreau', 'Romain', 'Mor_Ro', 'Test123*', 1, 1),
(2, 'Degueldre', 'Ugo', 'De_Ug', 'Test123*', 2, 0),
(3, 'Fofanah', 'Mankou', 'Fo_Man', 'Test123*', 3, 2);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `billets`
--
ALTER TABLE `billets`
  ADD PRIMARY KEY (`id_billet`);

--
-- Indexes for table `chat_box`
--
ALTER TABLE `chat_box`
  ADD PRIMARY KEY (`id_chat`);

--
-- Indexes for table `commandes`
--
ALTER TABLE `commandes`
  ADD PRIMARY KEY (`num_commande`);

--
-- Indexes for table `logement`
--
ALTER TABLE `logement`
  ADD PRIMARY KEY (`id_logement`);

--
-- Indexes for table `message`
--
ALTER TABLE `message`
  ADD PRIMARY KEY (`id_message`);

--
-- Indexes for table `panier`
--
ALTER TABLE `panier`
  ADD PRIMARY KEY (`id_panier`);

--
-- Indexes for table `plats`
--
ALTER TABLE `plats`
  ADD PRIMARY KEY (`id_plat`);

--
-- Indexes for table `restaurants`
--
ALTER TABLE `restaurants`
  ADD PRIMARY KEY (`id_restau`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id_user`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `billets`
--
ALTER TABLE `billets`
  MODIFY `id_billet` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `chat_box`
--
ALTER TABLE `chat_box`
  MODIFY `id_chat` int NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `commandes`
--
ALTER TABLE `commandes`
  MODIFY `num_commande` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `logement`
--
ALTER TABLE `logement`
  MODIFY `id_logement` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `message`
--
ALTER TABLE `message`
  MODIFY `id_message` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `panier`
--
ALTER TABLE `panier`
  MODIFY `id_panier` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `plats`
--
ALTER TABLE `plats`
  MODIFY `id_plat` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `restaurants`
--
ALTER TABLE `restaurants`
  MODIFY `id_restau` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id_user` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
