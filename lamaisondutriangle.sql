-- phpMyAdmin SQL Dump
-- version 5.1.3
-- https://www.phpmyadmin.net/
--
-- Hôte : localhost
-- Généré le : ven. 07 oct. 2022 à 07:49
-- Version du serveur : 5.7.33
-- Version de PHP : 7.4.19

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `lamaisondutriangle`
--
CREATE DATABASE IF NOT EXISTS `lamaisondutriangle` DEFAULT CHARACTER SET utf8 COLLATE utf8_general_ci;
USE `lamaisondutriangle`;

-- --------------------------------------------------------

--
-- Structure de la table `cours`
--

CREATE TABLE `cours` (
  `id_cours` smallint(6) NOT NULL,
  `titre_cours` varchar(25) NOT NULL,
  `description_cours` text NOT NULL,
  `date` datetime NOT NULL,
  `prix_cours` smallint(6) NOT NULL,
  `nb_places` tinyint(4) NOT NULL,
  `nb_participants` tinyint(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `membres`
--

CREATE TABLE `membres` (
  `id_membre` mediumint(9) NOT NULL,
  `nom_membre` varchar(25) NOT NULL,
  `prenom_membre` varchar(25) NOT NULL,
  `pseudo` varchar(25) NOT NULL,
  `mail_membre` varchar(50) NOT NULL,
  `telephone_membre` varchar(10) NOT NULL,
  `adresse_membre` varchar(255) NOT NULL,
  `mot_de_passe` varchar(255) NOT NULL,
  `avatar` varchar(255) DEFAULT NULL,
  `statut_membre` enum('admin','membre') NOT NULL DEFAULT 'membre'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 ROW_FORMAT=COMPACT;

--
-- Déchargement des données de la table `membres`
--

INSERT INTO `membres` (`id_membre`, `nom_membre`, `prenom_membre`, `pseudo`, `mail_membre`, `telephone_membre`, `adresse_membre`, `mot_de_passe`, `avatar`, `statut_membre`) VALUES
(1, 'Nekka', 'Oroshi', 'Caracole', 'o.nekka@furvent.com', '0102030405', '1 rue du vent', '$2y$10$VTqYnHP0jttzXQP5FBG86Olz.A62YQAcYmV/T1MtZ6wTe22mJlY1i', NULL, 'admin'),
(2, 'Follereau', 'Raoul', 'Lepreux', 'raoul.follereau@lepreux.fr', '0102030405', '111 rue de la Paix', '$2y$10$Z6YGtckPSF98oVjX2D6LmufoW2omoEJOzY7PsUK/lYQH2Oel2fjIG', NULL, 'membre'),
(3, 'Polpot', 'Jean-Jacques', 'Fifrelin', 'polpot@rigolol.com', '0102030405', '666 avenue des Fifous', '$2y$10$js1k/BCGJlfs6Z5rb2tF2O5jtf7iGQX4R9UzWTbCsEmCitkLpqZK2', NULL, 'membre'),
(5, 'Ploup', 'Plip', 'Fifreline', 'cuicui@gmal.com', '0908070605', '222 rue de la Guerre', '$2y$10$ko4NKj4lZH5g/Jk2KsNDuu3t2kf789H94No1ICk4f.7dHOxdxfzKC', NULL, 'membre'),
(6, 'Ploup', 'Jean-David', 'Pipou91', 'patatra@plouf.fr', '0905010509', '222 rue de la Guerre 91000 Evry', '$2y$10$sWL/82NZwCaiPYSPx7sNH.Psn1n.500wQdA6BMwms3pDBFhO6J34.', NULL, 'membre'),
(7, 'Delajungle', 'Maurice', '47bidibule', 'maurice@asdelajungle.jungle', '0102030405', '1 volcan 91000 Evry', '$2y$10$UQsE0Dm/XCQ85IADi56t7eXzU1vN/ainoKPuyBkFgm0NpWRh2gbd.', NULL, 'membre'),
(8, 'Jaizon', 'Djesohn', 'Jason', 'jai.dje@zonsohn.com', '1234567890', '666 avenue des Fifous', '$2y$10$4HEeAse4vBXiW6rLV.Wk0O4TuV/PI9igTi1lxq6ZPRS3BqeD/HOLm', 'https://thispersondoesnotexist.com/image', 'membre');

-- --------------------------------------------------------

--
-- Structure de la table `produits`
--

CREATE TABLE `produits` (
  `id_produit` smallint(6) NOT NULL,
  `nom_produit` varchar(25) NOT NULL,
  `reference_fournisseur` varchar(50) NOT NULL,
  `fournisseur` varchar(25) NOT NULL,
  `photo_produit_1` varchar(255) NOT NULL,
  `photo_produit_2` varchar(255) NOT NULL,
  `photo_produit_3` varchar(255) NOT NULL,
  `photo_produit_4` varchar(255) NOT NULL,
  `photo_produit_5` varchar(255) NOT NULL,
  `description_produit` text NOT NULL,
  `materiau` varchar(50) NOT NULL,
  `prix_produit` decimal(10,2) NOT NULL,
  `type_produit` enum('triangle','accessoire') NOT NULL,
  `stock` smallint(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 ROW_FORMAT=COMPACT;

--
-- Déchargement des données de la table `produits`
--

INSERT INTO `produits` (`id_produit`, `nom_produit`, `reference_fournisseur`, `fournisseur`, `photo_produit_1`, `photo_produit_2`, `photo_produit_3`, `photo_produit_4`, `photo_produit_5`, `description_produit`, `materiau`, `prix_produit`, `type_produit`, `stock`) VALUES
(1, 'Triangle \"SNCF\"', '123.321', 'Triangle d\'or', 'pascher/image1.jpg', 'pascher/image2.jpg', 'pascher/image3.jpg', 'pascher/image4.jpg', '', 'petit et facile à manier, parfait pour offrir ou comme instrument de secours.', 'acier', '5.00', 'triangle', 123),
(2, 'Triangle Elementaire', '321.123', 'Triangle d\'or', 'pascherdebutant/image1.jpg', 'pascherdebutant/image2.jpg', 'pascherdebutant/image3.jpg', '', '', 'léger, facile à prendre en main, découverte.', 'acier', '7.50', 'triangle', 321),
(3, 'Triangle Standardum', '426.624', 'Triangle d\'argent', 'moyenmoins/image1.jpg', 'moyenmoins/image2.jpg', 'moyenmoins/image3.jpg', 'moyenmoins/image4.jpg', '', 'finition classique, 7 pouces, résistant.', 'acier', '35.00', 'triangle', 333),
(4, 'Triangle Standardum ++', '357.753', 'Triangle d\'argent', 'moyen/image1.jpg', 'moyen/image2.jpg', 'moyen/image3.jpg', '', '', 'classique, finition impeccable.', 'acier', '55.00', 'triangle', 444),
(5, 'Le Pointu', '987.789', 'Triangle d\'or', 'cher/image1.jpg', 'cher/image2.jpg', 'cher/image3.jpg', '', '', 'profilé, élégant, clarté du son.', 'acier', '125.00', 'triangle', 555),
(6, 'Escargot', '951.159', 'Triangle de bronze', 'cheretoriginal/image1.jpg', 'cheretoriginal/image2.jpg', 'cheretoriginal/image3.jpg', '', '', 'artisanat, sonorité unique, design original.', 'bronze', '275.00', 'triangle', 666),
(7, 'Le huit pouces', '729.927', 'Triangle de bronze', 'trescher/image1.jpg', 'trescher/image2.jpg', 'trescher/image3.jpg', '', '', 'artisanat, sonorité unique, recommandé, 8 pouces.', 'bronze', '299.99', 'triangle', 777),
(8, 'Le DeluX', '546.654', 'Triangle de bronze', 'trestrescher/image1.jpg', 'trestrescher/image2.jpg', 'trestrescher/image3.jpg', '', '', 'artisanat, sonorité unique, exceptionnel.', 'bronze', '351.00', 'triangle', 888),
(9, 'Autonome', '951.159', 'Triangle de bronze', 'autonome/image1.jpg', 'autonome/image2.jpg', 'autonome/image3.jpg', '', '', 'original, une main, bille d\'acier, rythmique impeccable, facile.', 'acier et plastique', '55.55', 'triangle', 999),
(10, 'Batte Elementaire', '11.11.11', 'Cbatte !', 'battepascher/image1.jpg', 'battepascher/image2.jpg', 'battepascher/image3.jpg', '', '', 'batte premier prix, bonne prise en main', 'acier et laiton', '1.50', 'accessoire', 111),
(11, 'Batte standard', '22.22.22', 'Cbatte !', 'battestandard/image1.jpg', 'battestandard/image2.jpg', 'battestandard/image3.jpg', '', '', 'la batte prisée par tous les percussionnistes', 'acier et laiton', '18.70', 'accessoire', 123),
(12, 'Batte Delux', '33.33.33', 'Cbatte !', 'battetrescher/image1.jpg', 'battetrescher/image2.jpg', 'battetrescher/image3.jpg', '', '', 'nec plus ultra des battes, une qualité supérieure pour des sensations fines', 'acier et bronze', '49.00', 'accessoire', 222),
(13, 'Métronome début', '123', 'Métronomix', 'metronompascher/image1.jpg', 'metronompascher/image2.jpg', 'metronompascher/image3.jpg', 'metronompascher/image4.jpg', '', 'un classique des métronomes, à même de remplir les besoins de tous les percussionnistes', 'matière plastique', '24.90', 'accessoire', 456),
(14, 'Métronome standard', '456', 'Swiss-swass', 'metronomstandard/image1.jpg', 'metronomstandard/image2.jpg', 'metronomstandard/image3.jpg', 'metronomstandard/image4.jpg', 'metronomstandard/image5.jpg', 'une entrée de gamme pour ce fournisseur, mais déjà un produit de grande qualité', 'alliage', '55.00', 'accessoire', 12),
(15, 'Métronome de luxe', '789', 'Swiss-swass', 'metronomcher/image1.jpg', 'metronomcher/image2.jpg', 'metronomcher/image3.jpg', 'metronomcher/image4.jpg', '', 'calibré pour répondre aux attentes de tous les musiciens', 'bois massif', '143.00', 'accessoire', 999),
(16, 'Support double', '999.111', 'Support Table', 'supportdouble/image1.jpg', 'supportdouble/image2.jpg', '', '', '', 'de quoi faire pâlir d\'envie tous vos camarades percussionnistes avec ce support qui vous permettra de manipuler jusqu\'à 2 triangles en même temps', 'acier et plastique', '68.00', 'accessoire', 55),
(17, 'Support solo', '111.999', 'Support Table', 'supporttriangle/image1.jpg', 'supporttriangle/image2.jpg', 'supporttriangle/image3.jpg', 'supporttriangle/image4.jpg', 'supporttriangle/image5.jpg', 'un support sur lequel vous pourrez toujours compter', 'acier', '89.00', 'accessoire', 1);

-- --------------------------------------------------------

--
-- Structure de la table `spectacles`
--

CREATE TABLE `spectacles` (
  `id_spectacle` smallint(6) NOT NULL,
  `titre_spectacle` varchar(25) NOT NULL,
  `site_spectacle` varchar(255) NOT NULL,
  `photo_spectacle` varchar(255) NOT NULL,
  `description_spectacle` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 ROW_FORMAT=COMPACT;

--
-- Déchargement des données de la table `spectacles`
--

INSERT INTO `spectacles` (`id_spectacle`, `titre_spectacle`, `site_spectacle`, `photo_spectacle`, `description_spectacle`) VALUES
(1, 'Talence', 'https://orchestre-symphonique-de-talence.com/', 'concert1.jpg', 'Merci au public d’être venu en nombre cette année pour tous les concerts de printemps.\r\n\r\nL’orchestre symphonique de Talence aura le plaisir de vous retrouver en septembre pour la rentrée avec un concert déjà prévu le 15 septembre \r\n\r\nhttps://www.instagram.com/stories/grandbarrail/2925503442655414417/\r\nhttps://www.thefork.fr/restaurant/le-grand-barrail-r463837?utm_source=sigilium&utm_medium=email&utm_campaign=29647'),
(2, 'Concert de Noël', 'https://www.orchestre-orleans.com/', 'concert2.jpg', 'MOZART / extraits des Vêpres\r\nHAYDN / extrait de la Création\r\nMENDELSSOHN / extraits d’Elias\r\nSCHUBERT / 2e Mouvement de la Symphonie n°5\r\n\r\nComme chaque année, l’Orchestre Symphonique d’Orléans et le Chœur Symphonique du Conservatoire d’Orléans vous invitent à célébrer Noël en musique. Nouveauté qui sonne comme un retour aux sources pour notre Orchestre, ce concert se tiendra dans la salle qui l’a vu naître : celle de l’Institut. Comme un autre clin d’œil à ses débuts, il se produira dans une formation instrumentale allégée, aux côtés du Chœur Symphonique du Conservatoire et de deux solistes pour vous offrir un réjouissant florilège d’oratorios et d’airs sacrés.'),
(3, 'Concert à Boulieu !', 'https://ardechemusiqueetdanse.fr', 'concert3.jpg', 'Représentation de L’orchestre symphonique le 22 janvier à Boulieu les Annonay'),
(4, 'Abbaye Royale de l\'Epau', 'https://musicalemans.fr/', 'concert4.jpg', 'L\'orchestre symphonique du Mans invite Angissimo !'),
(5, 'tirlimpimon', 'http://magmusic.fr/2022/09/cest-le-grand-retour-des-festivals-cet-ete/', 'concert5.jpg', 'Un beau f2 du côté de Brunoy.'),
(6, 'tirlimpimon', 'http://magmusic.fr/2022/09/cest-le-grand-retour-des-festivals-cet-ete/', 'concert5.jpg', 'Un drôle de t-shirt en fait');

-- --------------------------------------------------------

--
-- Structure de la table `spectacles_validation`
--

CREATE TABLE `spectacles_validation` (
  `id_validation` smallint(6) NOT NULL,
  `titre` varchar(50) NOT NULL,
  `site` varchar(255) NOT NULL,
  `photo` varchar(255) NOT NULL,
  `description` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `spectacles_validation`
--

INSERT INTO `spectacles_validation` (`id_validation`, `titre`, `site`, `photo`, `description`) VALUES
(1, 'tirlimpimon', 'http://magmusic.fr/2022/09/cest-le-grand-retour-des-festivals-cet-ete/', 'https://images.unsplash.com/photo-1566204773863-cf63e6d4ab88?ixlib=rb-1.2.1&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=516&q=80', 'Un beau f2 du côté de Brunoy.');

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `cours`
--
ALTER TABLE `cours`
  ADD PRIMARY KEY (`id_cours`);

--
-- Index pour la table `membres`
--
ALTER TABLE `membres`
  ADD PRIMARY KEY (`id_membre`);

--
-- Index pour la table `produits`
--
ALTER TABLE `produits`
  ADD PRIMARY KEY (`id_produit`);

--
-- Index pour la table `spectacles`
--
ALTER TABLE `spectacles`
  ADD PRIMARY KEY (`id_spectacle`);

--
-- Index pour la table `spectacles_validation`
--
ALTER TABLE `spectacles_validation`
  ADD PRIMARY KEY (`id_validation`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `cours`
--
ALTER TABLE `cours`
  MODIFY `id_cours` smallint(6) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `membres`
--
ALTER TABLE `membres`
  MODIFY `id_membre` mediumint(9) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT pour la table `produits`
--
ALTER TABLE `produits`
  MODIFY `id_produit` smallint(6) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT pour la table `spectacles`
--
ALTER TABLE `spectacles`
  MODIFY `id_spectacle` smallint(6) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT pour la table `spectacles_validation`
--
ALTER TABLE `spectacles_validation`
  MODIFY `id_validation` smallint(6) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
