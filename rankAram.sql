-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Hôte : localhost
-- Généré le : ven. 28 avr. 2023 à 20:43
-- Version du serveur : 5.7.34
-- Version de PHP : 7.4.21

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `rankAram`
--

-- --------------------------------------------------------

--
-- Structure de la table `users`
--

CREATE TABLE `users` (
  `Id_users` int(11) NOT NULL,
  `username` varchar(50) DEFAULT NULL,
  `gameName` varchar(50) DEFAULT NULL,
  `email` varchar(100) DEFAULT NULL,
  `password` varchar(100) NOT NULL,
  `role` int(1) NOT NULL DEFAULT '2',
  `created_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `valided_at` date DEFAULT NULL,
  `mmr` int(4) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `users`
--

INSERT INTO `users` (`Id_users`, `username`, `gameName`, `email`, `password`, `role`, `created_at`, `valided_at`, `mmr`) VALUES
(1, 'Lilsan09', 'Lilsan', 'alexisferrer60160@gmail.com', 'azertyuiop123', 1, '2023-04-14 17:14:00', '2023-04-14', 200),
(4, 'lilouille', NULL, 'afandhc@gmail.com', '$2y$10$3MlPxnPscdtEfWHiM2WpF.WR.6hjcCVojPtXC8Xxy.9ib4JAEo/02', 2, '2023-04-16 14:54:15', '2023-04-16', NULL),
(5, 'KEULODEU', NULL, 'passagetitre@gmail.com', '$2y$10$lENj7hT8XUFuUEEDBqoxrujlvgfahzh7grzxml8CfwceQ1eO5UnnO', 2, '2023-04-16 15:00:56', NULL, NULL),
(6, 'Spankz', NULL, 'spank@gmail.com', '$2y$10$oadAk27UaliHRy36KVFW4uYTUk3I1T2hywElMUi15gzVB3zpcB0Jy', 2, '2023-04-17 00:58:48', NULL, NULL),
(7, 'Coucouatous', NULL, 'kassandradubois13@yahoo.fr', '$2y$10$ziAUpuMfAnilB5clWSMyb.jMKCmW8rDQ0ZWINv2RRRv5n/cFh1.E.', 2, '2023-04-22 17:03:33', '2023-04-22', NULL);

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`Id_users`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `users`
--
ALTER TABLE `users`
  MODIFY `Id_users` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
