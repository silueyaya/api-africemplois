-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3306
-- Généré le :  lun. 05 nov. 2018 à 06:02
-- Version du serveur :  5.7.23
-- Version de PHP :  7.2.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données :  `africemplois`
--

-- --------------------------------------------------------

--
-- Structure de la table `entreprise`
--

DROP TABLE IF EXISTS `entreprise`;
CREATE TABLE IF NOT EXISTS `entreprise` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `raison_sociale` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `logo` varchar(200) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `telephone` varchar(11) COLLATE utf8mb4_unicode_ci NOT NULL,
  `image_id` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `IDX_D19FA603DA5256D` (`image_id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `entreprise`
--

INSERT INTO `entreprise` (`id`, `raison_sociale`, `logo`, `email`, `telephone`, `image_id`) VALUES
(1, 'MTN', 'mtn.png', 'mtn@gmail.com', '05050504', NULL),
(2, 'Orange', 'orange.png', 'orange@gmail.com', '07070704', NULL),
(3, 'Moov', 'moov.png', 'moove@gmail.com', '02021036', NULL),
(4, 'AFRICAB', 'africab.png', 'africab@gmail.com', '04947382', NULL),
(5, 'Cote D\'Ivoire Telecomme', 'telecom.png', 'telecom@gmail.com', '06020543', NULL);

-- --------------------------------------------------------

--
-- Structure de la table `evenement`
--

DROP TABLE IF EXISTS `evenement`;
CREATE TABLE IF NOT EXISTS `evenement` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `ville_id` int(11) NOT NULL,
  `type_evenement_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `titre_evenement` varchar(30) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description_evenement` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at_evenement` datetime NOT NULL,
  `ending_at_evenement` datetime NOT NULL,
  `statut_evenement` tinyint(1) NOT NULL,
  `validation_evenement` tinyint(1) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `IDX_B26681EA73F0036` (`ville_id`),
  KEY `IDX_B26681E88939516` (`type_evenement_id`),
  KEY `IDX_B26681EA76ED395` (`user_id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `evenement`
--

INSERT INTO `evenement` (`id`, `ville_id`, `type_evenement_id`, `user_id`, `titre_evenement`, `description_evenement`, `created_at_evenement`, `ending_at_evenement`, `statut_evenement`, `validation_evenement`) VALUES
(1, 4, 1, 2, 'Moisson', 'dhsdhgdsjksdkjsd', '2018-10-16 00:00:00', '2018-10-29 00:00:00', 1, 1),
(2, 5, 2, 3, '', 'DJKJHJDSFJHFDJHFD', '2018-10-25 00:00:00', '2018-10-28 00:00:00', 1, 1);

-- --------------------------------------------------------

--
-- Structure de la table `media_object`
--

DROP TABLE IF EXISTS `media_object`;
CREATE TABLE IF NOT EXISTS `media_object` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `content_url` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Structure de la table `migration_versions`
--

DROP TABLE IF EXISTS `migration_versions`;
CREATE TABLE IF NOT EXISTS `migration_versions` (
  `version` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`version`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Déchargement des données de la table `migration_versions`
--

INSERT INTO `migration_versions` (`version`) VALUES
('20181014172839'),
('20181026173229'),
('20181030222057'),
('20181105012226');

-- --------------------------------------------------------

--
-- Structure de la table `niveau`
--

DROP TABLE IF EXISTS `niveau`;
CREATE TABLE IF NOT EXISTS `niveau` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `libelle_niveau` varchar(30) COLLATE utf8mb4_unicode_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Structure de la table `offre`
--

DROP TABLE IF EXISTS `offre`;
CREATE TABLE IF NOT EXISTS `offre` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `ville_id` int(11) NOT NULL,
  `entreprise_id` int(11) NOT NULL,
  `type_contrat_id` int(11) NOT NULL,
  `secteur_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `titre_offre` varchar(30) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description_offre` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` datetime NOT NULL,
  `ending_at` datetime NOT NULL,
  `statut` tinyint(1) NOT NULL,
  `validation` tinyint(1) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `IDX_AF86866FA73F0036` (`ville_id`),
  KEY `IDX_AF86866FA4AEAFEA` (`entreprise_id`),
  KEY `IDX_AF86866F520D03A` (`type_contrat_id`),
  KEY `IDX_AF86866F9F7E4405` (`secteur_id`),
  KEY `IDX_AF86866FA76ED395` (`user_id`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `offre`
--

INSERT INTO `offre` (`id`, `ville_id`, `entreprise_id`, `type_contrat_id`, `secteur_id`, `user_id`, `titre_offre`, `description_offre`, `created_at`, `ending_at`, `statut`, `validation`) VALUES
(1, 1, 1, 3, 2, 2, 'Developpeur Web', 'Lorem ipsum dolor sit amet, ad nam vivendo evertitur sadipscing, omnium corpora definitionem pri ad. Id eros essent his, eu odio alii possit eum, usu ut scripserit disputationi. Sea movet scripta ne. Vix fabulas instructior ea, duis denique voluptaria quo no. Duo malorum corrumpit at.\r\n\r\nEam graeci aliquam ancillae ut. Ius id quando lucilius constituto, ea cum vidit commodo nusquam. Paulo luptatum eos an. Cum partem ubique definitiones ad, albucius periculis cu vix. An tacimates eleifend eos. Ipsum appareat et vim.\r\n\r\nMei odio sensibus ut, urbanitas necessitatibus ne duo. Primis perfecto intellegam cu per. Cum ea quot vitae eripuit. Pri aperiam dignissim id, et sit natum augue, animal fuisset pri ei. Stet democritum scriptorem cum ut. Eu vis meliore eloquentiam, pro ne eirmod deserunt sensibus. Sea assum expetenda repudiandae ad, eum viris tibique repudiandae ut.\r\n\r\nTe autem placerat eleifend usu, id errem audiam impedit usu. Cibo eruditi equidem ut pro, nam velit legendos tacimates ad. Dicant bonorum duo no, sumo facilisi cu sed. Ei sea docendi offendit, ei quo consul docendi fastidii. Cum legimus detraxit at. At salutatus evertitur omittantur per. At mel latine tamquam scriptorem, pri errem delenit indoctum in, mel graeci euismod periculis te.\r\n\r\nAn meis contentiones nam. In nec paulo bonorum, regione sanctus urbanitas in ius. Ex autem sonet tractatos eos, pri suas diceret conclusionemque ei, nec ea veri omnium. Labore accusam verterem ea ius.', '2018-10-16 15:00:00', '2018-11-22 18:00:00', 2, 1),
(2, 2, 2, 2, 3, 3, 'Vente de Maison', 'In a professional context it often happens that private or corporate clients corder a publication to be made and presented with the actual content still not being ready. Think of a news blog that\'s filled with content hourly on the day of going live. However, reviewers tend to be distracted by comprehensible content, say, a random text copied from a newspaper or the internet. The are likely to focus on the text, disregarding the layout and its elements. Besides, random text risks to be unintendedly humorous or offensive, an unacceptable risk in corporate environments. Lorem ipsum and its many variants have been employed since the early 1960ies, and quite likely since the sixteenth century.', '2018-10-09 10:00:00', '2018-10-30 17:00:00', 2, 1),
(3, 2, 3, 1, 1, 3, 'Maison a vendre', 'kjshjdshjdshghgsdjksddddddddddddddddddddddd', '2018-10-15 10:00:00', '2018-10-26 15:00:00', 2, 1),
(4, 5, 4, 3, 4, 4, 'Chauffeur', 'ghgfgdsssjbnvvsshthjgvbfgfddf', '2018-10-10 12:00:00', '2018-10-23 08:00:00', 0, 1),
(5, 3, 5, 3, 1, 2, 'Tranfert Appart', 'hjfhfghjkhjfgfdjgdhjhgrdfhgehgkjgddreejkyggftrytrgfdddhgfgfhkhgfhhhggdghhjgffjhgggjh', '2018-10-02 07:00:00', '2018-10-23 13:00:00', 1, 1),
(6, 4, 2, 1, 1, 4, 'Sortie Plage', 'jhqsdhdshdsjhsdhjgsyjdsisdhjsdhjsdgsdjsdjhsd', '2018-10-09 12:00:00', '2018-10-24 17:00:00', 1, 1),
(7, 3, 4, 1, 3, 2, 'First Tache', 'kildsqjhsdhbdshjsdukjsdhsdyths', '2018-10-10 11:00:00', '2018-10-24 13:00:00', 1, 1);

-- --------------------------------------------------------

--
-- Structure de la table `secteur`
--

DROP TABLE IF EXISTS `secteur`;
CREATE TABLE IF NOT EXISTS `secteur` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `libelle_secteur` varchar(30) COLLATE utf8mb4_unicode_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `secteur`
--

INSERT INTO `secteur` (`id`, `libelle_secteur`) VALUES
(1, 'Location'),
(2, 'Iformatique'),
(3, 'Immobilier'),
(4, 'Télephone'),
(5, 'Test 29'),
(6, 'Bonjour');

-- --------------------------------------------------------

--
-- Structure de la table `sous_secteur`
--

DROP TABLE IF EXISTS `sous_secteur`;
CREATE TABLE IF NOT EXISTS `sous_secteur` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `secteur_id` int(11) NOT NULL,
  `libelle_sous_secteur` varchar(30) COLLATE utf8mb4_unicode_ci NOT NULL,
  PRIMARY KEY (`id`),
  KEY `IDX_A34C5D529F7E4405` (`secteur_id`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `sous_secteur`
--

INSERT INTO `sous_secteur` (`id`, `secteur_id`, `libelle_sous_secteur`) VALUES
(1, 2, 'IDA'),
(2, 2, 'RIT'),
(3, 4, 'Samsung'),
(5, 4, 'Infinix'),
(6, 3, 'Tole'),
(7, 3, 'Porte'),
(9, 5, 'TestAZERTY'),
(10, 5, 'Test Dim');

-- --------------------------------------------------------

--
-- Structure de la table `type_contrat`
--

DROP TABLE IF EXISTS `type_contrat`;
CREATE TABLE IF NOT EXISTS `type_contrat` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `libelle_contrat` varchar(30) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `type_contrat`
--

INSERT INTO `type_contrat` (`id`, `libelle_contrat`) VALUES
(1, 'Stage'),
(2, 'CDD'),
(3, 'CDI'),
(4, 'Alternance'),
(5, 'Freelance');

-- --------------------------------------------------------

--
-- Structure de la table `type_evenement`
--

DROP TABLE IF EXISTS `type_evenement`;
CREATE TABLE IF NOT EXISTS `type_evenement` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `libelle_type_evenement` varchar(30) COLLATE utf8mb4_unicode_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `type_evenement`
--

INSERT INTO `type_evenement` (`id`, `libelle_type_evenement`) VALUES
(1, 'grillaide'),
(2, 'test 2');

-- --------------------------------------------------------

--
-- Structure de la table `user`
--

DROP TABLE IF EXISTS `user`;
CREATE TABLE IF NOT EXISTS `user` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(180) COLLATE utf8mb4_unicode_ci NOT NULL,
  `username_canonical` varchar(180) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(180) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_canonical` varchar(180) COLLATE utf8mb4_unicode_ci NOT NULL,
  `enabled` tinyint(1) NOT NULL,
  `salt` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `last_login` datetime DEFAULT NULL,
  `confirmation_token` varchar(180) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `password_requested_at` datetime DEFAULT NULL,
  `roles` longtext COLLATE utf8mb4_unicode_ci NOT NULL COMMENT '(DC2Type:array)',
  `fullname` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `prenom` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `UNIQ_8D93D64992FC23A8` (`username_canonical`),
  UNIQUE KEY `UNIQ_8D93D649A0D96FBF` (`email_canonical`),
  UNIQUE KEY `UNIQ_8D93D649C05FB297` (`confirmation_token`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `user`
--

INSERT INTO `user` (`id`, `username`, `username_canonical`, `email`, `email_canonical`, `enabled`, `salt`, `password`, `last_login`, `confirmation_token`, `password_requested_at`, `roles`, `fullname`, `prenom`) VALUES
(2, 'yaya', 'yaya', 'yaya@gmail.com', 'yaya@gmail.com', 1, NULL, '$2y$13$.756yVCMYbXRxywS5jFHWeA69kdXY64Z3x5/rRKa70qwA/H6skoJK', '2018-11-01 21:16:26', NULL, NULL, 'a:0:{}', NULL, NULL),
(3, 'bamba', 'bamba', 'bamba@gmail.com', 'bamba@gmail.com', 1, NULL, '$2y$13$zXdmYdbJ3ONhMxghIEmFceYDJem2LqJ94hfWT5Ji41ecuYlmqwHIy', '2018-10-30 19:01:13', NULL, NULL, 'a:0:{}', NULL, NULL),
(4, 'karim', 'karim', 'karim@gmail.com', 'karim@gmail.com', 1, NULL, '$2y$13$4SFgbhONvh1V7rUJ5dVljuPkzp0d2ZIixpL8naAhrJZdMXntl2YaG', '2018-10-30 18:58:32', NULL, NULL, 'a:0:{}', NULL, NULL),
(5, 'ali', 'ali', 'ali@gmail.com', 'ali@gmail.com', 1, NULL, '$2y$13$meXokTD.6pRLkJMdIzxZku.jizPoxDq1PKMsD/V7QIRMcJjOjF1Pi', '2018-10-31 11:49:59', NULL, NULL, 'a:0:{}', NULL, NULL);

-- --------------------------------------------------------

--
-- Structure de la table `ville`
--

DROP TABLE IF EXISTS `ville`;
CREATE TABLE IF NOT EXISTS `ville` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `libelle_ville` varchar(30) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `ville`
--

INSERT INTO `ville` (`id`, `libelle_ville`) VALUES
(1, 'Abidjan'),
(2, 'Daloa'),
(3, 'MAN'),
(4, 'BOUAKE'),
(5, 'YAKRO');

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `entreprise`
--
ALTER TABLE `entreprise`
  ADD CONSTRAINT `FK_D19FA603DA5256D` FOREIGN KEY (`image_id`) REFERENCES `media_object` (`id`);

--
-- Contraintes pour la table `evenement`
--
ALTER TABLE `evenement`
  ADD CONSTRAINT `FK_B26681E88939516` FOREIGN KEY (`type_evenement_id`) REFERENCES `type_evenement` (`id`),
  ADD CONSTRAINT `FK_B26681EA73F0036` FOREIGN KEY (`ville_id`) REFERENCES `ville` (`id`),
  ADD CONSTRAINT `FK_B26681EA76ED395` FOREIGN KEY (`user_id`) REFERENCES `user` (`id`);

--
-- Contraintes pour la table `offre`
--
ALTER TABLE `offre`
  ADD CONSTRAINT `FK_AF86866F520D03A` FOREIGN KEY (`type_contrat_id`) REFERENCES `type_contrat` (`id`),
  ADD CONSTRAINT `FK_AF86866F9F7E4405` FOREIGN KEY (`secteur_id`) REFERENCES `secteur` (`id`),
  ADD CONSTRAINT `FK_AF86866FA4AEAFEA` FOREIGN KEY (`entreprise_id`) REFERENCES `entreprise` (`id`),
  ADD CONSTRAINT `FK_AF86866FA73F0036` FOREIGN KEY (`ville_id`) REFERENCES `ville` (`id`),
  ADD CONSTRAINT `FK_AF86866FA76ED395` FOREIGN KEY (`user_id`) REFERENCES `user` (`id`);

--
-- Contraintes pour la table `sous_secteur`
--
ALTER TABLE `sous_secteur`
  ADD CONSTRAINT `FK_A34C5D529F7E4405` FOREIGN KEY (`secteur_id`) REFERENCES `secteur` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
