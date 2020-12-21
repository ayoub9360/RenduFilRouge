-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Hôte : localhost
-- Généré le : lun. 21 déc. 2020 à 15:12
-- Version du serveur :  10.5.8-MariaDB
-- Version de PHP : 7.4.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `filRouge`
--
CREATE DATABASE IF NOT EXISTS `filRouge` DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci;
USE `filRouge`;

-- --------------------------------------------------------

--
-- Structure de la table `friendslist`
--

CREATE TABLE `friendslist` (
  `friendsList_id` int(11) NOT NULL,
  `friendsList_userID1` int(11) NOT NULL,
  `friendsList_userID2` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `friendslist`
--

INSERT INTO `friendslist` (`friendsList_id`, `friendsList_userID1`, `friendsList_userID2`) VALUES
(3, 11, 12),
(13, 13, 11),
(14, 13, 12),
(15, 14, 11),
(16, 14, 13),
(17, 14, 12);

-- --------------------------------------------------------

--
-- Structure de la table `message`
--

CREATE TABLE `message` (
  `message_id` int(11) NOT NULL,
  `message_content` text NOT NULL,
  `message_date` datetime NOT NULL,
  `user_id` int(11) NOT NULL,
  `sondage_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `message`
--

INSERT INTO `message` (`message_id`, `message_content`, `message_date`, `user_id`, `sondage_id`) VALUES
(14, 'Ninho sera premier !', '2020-12-21 15:41:59', 14, 34),
(15, 'Bien sûr !', '2020-12-21 15:42:07', 11, 34),
(16, 'Je ne pense pas que nous allons reprendre un cours normal de si tôt...', '2020-12-21 15:44:07', 14, 38),
(17, 'Gotaga toujours premiers partout ! :)', '2020-12-21 15:45:11', 14, 39),
(18, 'C\'est sûr !', '2020-12-21 15:51:36', 11, 38),
(19, 'Je suis depuis le début pour les verts et je le resterais !', '2020-12-21 15:52:14', 11, 40),
(20, 'Je trouve les résultats du sondage tout a fait normal pas vous ?', '2020-12-21 15:52:47', 11, 42),
(21, 'Bien sûr que oui :)', '2020-12-21 15:52:55', 14, 42);

-- --------------------------------------------------------

--
-- Structure de la table `sondage`
--

CREATE TABLE `sondage` (
  `sondage_id` int(11) NOT NULL,
  `sondage_question` text NOT NULL,
  `user_id` int(11) NOT NULL,
  `sondage_finish` timestamp NOT NULL DEFAULT current_timestamp(),
  `sondage_image` varchar(1000) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `sondage`
--

INSERT INTO `sondage` (`sondage_id`, `sondage_question`, `user_id`, `sondage_finish`, `sondage_image`) VALUES
(34, 'Quel sera l\'artiste francais le plus streamer en 2020', 14, '2020-11-10 14:25:00', '../upload/111-1110552_spotify-hd.png'),
(35, 'Quand est ce que eren va arrivée chez les marh ? ', 11, '2020-11-17 14:27:00', '../upload/34251e2bf29962a405b566c0e56f7b53.jpg'),
(38, 'Quand est ce que nous reprendrons un cours de vie normal ? ', 11, '2020-12-31 22:59:00', '../upload/200309-D-HN545-003.jpg'),
(39, 'Quel sera le streamer le plus vu de 2020 ? ', 11, '2020-11-10 22:59:00', '../upload/656558-16x9-lg.jpg'),
(40, 'Qui va gagner koh lanta ? ', 11, '2020-12-31 22:59:00', '../upload/Koh-Lanta,_le_combat_des_héros.jpeg'),
(41, 'Quel série sera nommé meilleur série 2020 ?', 11, '2020-12-31 22:59:00', '../upload/oscar2020-record-di-candidature-per-netflix-1920x1080-1.jpg'),
(42, 'Est ce que j\'aurais une bonne note ? ', 14, '2020-12-31 22:59:00', '../upload/e078f973570067.5c0e571e3417c.png'),
(43, 'Quel est le meilleurs fast food ? ', 14, '2020-12-31 22:59:00', '../upload/thumb.jpg'),
(44, 'Quel est le meilleurs réseau social ? ', 11, '2020-12-31 22:59:00', '../upload/0__OPEhzGeo4utcKD7.jpg');

-- --------------------------------------------------------

--
-- Structure de la table `sondageReponse`
--

CREATE TABLE `sondageReponse` (
  `sondageReponse_id` int(11) NOT NULL,
  `sondage_id` int(11) NOT NULL,
  `sondageReponse_reponse` varchar(255) NOT NULL,
  `sondageReponse_score` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `sondageReponse`
--

INSERT INTO `sondageReponse` (`sondageReponse_id`, `sondage_id`, `sondageReponse_reponse`, `sondageReponse_score`) VALUES
(56, 34, 'Maitre Gims', 2),
(57, 34, 'Jul', 3),
(58, 34, 'Pnl', 5),
(59, 34, 'Ninho', 9),
(60, 35, 'Dans le prochain épisode', 10),
(61, 35, 'Dans deux épisodes', 5),
(62, 35, 'Dans plus de 2 épisodes', 1),
(63, 35, 'Dans la prochaine saison ', 0),
(70, 38, 'Cette année', 2),
(71, 38, 'L\'année prochaine', 6),
(72, 38, 'Dans plus de 2 ans', 5),
(73, 38, 'Dans plus de 5 ans', 2),
(74, 39, 'Gotaga', 13),
(75, 39, 'Michou', 9),
(76, 39, 'Kameto', 6),
(77, 39, 'Zerator', 7),
(78, 40, 'Les bleus', 3),
(79, 40, 'Les Verts', 5),
(80, 40, 'Les Oranges', 10),
(81, 40, 'Les Rouges', 4),
(82, 41, 'Lucifer', 8),
(83, 41, 'Suits', 5),
(84, 41, 'Vikings', 2),
(85, 41, 'The 100', 4),
(86, 42, 'Oui', 100),
(87, 42, 'Bien sûr ', 200),
(88, 42, 'Bien sûr que oui', 400),
(89, 42, 'Oui une deuxièmes fois ', 300),
(90, 43, 'Mcdo', 4),
(91, 43, 'Kfc', 3),
(92, 43, 'Burger King', 7),
(93, 43, 'Quick', 2),
(94, 44, 'Facebook', 0),
(95, 44, 'Twitter', 0),
(96, 44, 'Instagram', 0),
(97, 44, 'SnapChat', 0);

-- --------------------------------------------------------

--
-- Structure de la table `user`
--

CREATE TABLE `user` (
  `user_id` int(11) NOT NULL,
  `user_pseudo` varchar(30) NOT NULL,
  `user_firstName` varchar(30) NOT NULL,
  `user_lastName` varchar(30) NOT NULL,
  `user_email` varchar(100) NOT NULL,
  `user_password` varchar(200) NOT NULL,
  `user_online` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `user`
--

INSERT INTO `user` (`user_id`, `user_pseudo`, `user_firstName`, `user_lastName`, `user_email`, `user_password`, `user_online`) VALUES
(11, 'Ayoub9360', 'Ayoub', 'Guendouz', 'ayoub.elguendouz@gmail.com', '9f86d081884c7d659a2feaa0c55ad015a3bf4f1b2b0b822cd15d6c15b0f00a08', 1),
(12, 'Utilisateur 1', 'testet', 'testest', 'ayoub@gmail.com', '37268335dd6931045bdcdf92623ff819a64244b53d0e746d438797349d4da578', 0),
(13, 'Samy', 'estt', 'test', 'teqsdqsdst@gmail.com', '37268335dd6931045bdcdf92623ff819a64244b53d0e746d438797349d4da578', 0),
(14, 'Alexandre.G', 'Alexandre', 'Gaillot', 'alexandre@gmail.com', '13e15721c9d4ad58d34983344dfba265a90d80f63db77c2eb3804379d9608889', 1),
(15, 'AyoubPseudo', 'ayoub', 'ayoub', 'ayoub@mail.com', 'c3a186cf8c3515610381cbb79b71dc860c756aa95a2ca0752080ea70e01297a0', 1);

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `friendslist`
--
ALTER TABLE `friendslist`
  ADD PRIMARY KEY (`friendsList_id`);

--
-- Index pour la table `message`
--
ALTER TABLE `message`
  ADD PRIMARY KEY (`message_id`);

--
-- Index pour la table `sondage`
--
ALTER TABLE `sondage`
  ADD PRIMARY KEY (`sondage_id`);

--
-- Index pour la table `sondageReponse`
--
ALTER TABLE `sondageReponse`
  ADD PRIMARY KEY (`sondageReponse_id`);

--
-- Index pour la table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`user_id`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `friendslist`
--
ALTER TABLE `friendslist`
  MODIFY `friendsList_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT pour la table `message`
--
ALTER TABLE `message`
  MODIFY `message_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT pour la table `sondage`
--
ALTER TABLE `sondage`
  MODIFY `sondage_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=45;

--
-- AUTO_INCREMENT pour la table `sondageReponse`
--
ALTER TABLE `sondageReponse`
  MODIFY `sondageReponse_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=98;

--
-- AUTO_INCREMENT pour la table `user`
--
ALTER TABLE `user`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
