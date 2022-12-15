-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1
-- Généré le : jeu. 15 déc. 2022 à 16:03
-- Version du serveur : 10.4.24-MariaDB
-- Version de PHP : 8.1.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `mds_poo_projet`
--

-- --------------------------------------------------------

--
-- Structure de la table `books`
--

CREATE TABLE `books` (
  `id` int(11) NOT NULL,
  `created` datetime NOT NULL DEFAULT current_timestamp(),
  `updated` datetime NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `serie_id` int(11) DEFAULT NULL,
  `title` varchar(200) NOT NULL,
  `num` varchar(5) NOT NULL,
  `writer` varchar(100) NOT NULL,
  `illustrator` varchar(100) NOT NULL,
  `editor` varchar(100) DEFAULT NULL,
  `releaseyear` smallint(6) DEFAULT NULL,
  `strips` smallint(6) DEFAULT NULL,
  `cover` varchar(30) DEFAULT NULL,
  `rep` tinyint(1) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `books`
--

INSERT INTO `books` (`id`, `created`, `updated`, `serie_id`, `title`, `num`, `writer`, `illustrator`, `editor`, `releaseyear`, `strips`, `cover`, `rep`) VALUES
(3, '2022-11-09 14:57:23', '2022-12-15 13:56:07', 4, 'Volume 3', '3', 'Watanabe, Tsunehiko', 'Hinotsuki, Neko', 'Delcourt', 2019, 172, '3.png', 0),
(6, '2022-11-09 15:01:26', '2022-12-15 13:56:10', 2, 'Cache-cache au bout du monde\r\n', '3', 'Stettler, Jérôme', 'Stettler, Jérôme', 'La Joie de Lire', 2005, 30, '6.jpg', 1),
(8, '2022-11-09 15:05:21', '2022-12-15 14:59:01', 3, 'Issue 1 ', '1', 'Austen, Chuck', 'Finch, David', 'Marvel Comics', 2018, 100, '7.jpg', 1),
(9, '2022-11-09 15:05:21', '2022-12-15 13:56:15', 3, 'Issue 2', '2', 'Austen, Chuck', 'Finch, David', 'Marvel Comics', 2018, NULL, '8.jpg', 0),
(15, '2022-12-15 14:08:39', '2022-12-15 14:12:08', 2, 'TESTSERIE', '2', 'TESTSERIE', 'TESTSERIE', 'TESTSERIE', 30022, 15, '15.jpg', 15),
(18, '2022-12-15 15:10:00', '2022-12-15 15:10:00', 2, 'gfezs', '80', 'gfsdfg', 'gfsdg', 'gfsd', 580, 850, 'image-639b2ab84d178.jpg', 127);

-- --------------------------------------------------------

--
-- Structure de la table `series`
--

CREATE TABLE `series` (
  `id` int(11) NOT NULL,
  `created` datetime NOT NULL DEFAULT current_timestamp(),
  `updated` datetime NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `title` varchar(50) NOT NULL,
  `origin` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `series`
--

INSERT INTO `series` (`id`, `created`, `updated`, `title`, `origin`) VALUES
(2, '2022-11-09 14:25:50', '2022-11-09 14:25:50', 'Cache-cache', 'BD'),
(3, '2022-11-09 14:25:50', '2022-11-09 14:25:50', 'Call of Duty: The Brotherhood', 'comics'),
(4, '2022-11-09 14:28:31', '2022-11-09 14:36:49', 'A Fantasy lazy life', 'Manga'),
(5, '2022-11-09 14:36:28', '2022-11-09 14:36:28', 'Rash!!', 'Manga');

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `books`
--
ALTER TABLE `books`
  ADD PRIMARY KEY (`id`),
  ADD KEY `serie_id` (`serie_id`);

--
-- Index pour la table `series`
--
ALTER TABLE `series`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `books`
--
ALTER TABLE `books`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT pour la table `series`
--
ALTER TABLE `series`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `books`
--
ALTER TABLE `books`
  ADD CONSTRAINT `books_ibfk_1` FOREIGN KEY (`serie_id`) REFERENCES `series` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
