-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3308
-- Généré le : lun. 21 nov. 2022 à 13:24
-- Version du serveur : 5.7.36
-- Version de PHP : 7.4.26

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `festival`
--

-- --------------------------------------------------------

--
-- Structure de la table `groupe`
--

DROP TABLE IF EXISTS `groupe`;
CREATE TABLE IF NOT EXISTS `groupe` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nom` varchar(255) COLLATE utf8mb4_bin NOT NULL,
  `description` text COLLATE utf8mb4_bin NOT NULL,
  `cout` decimal(10,2) NOT NULL,
  `pays_origine` varchar(255) COLLATE utf8mb4_bin NOT NULL,
  `musiciens` varchar(255) COLLATE utf8mb4_bin NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_bin NOT NULL,
  `photo` text COLLATE utf8mb4_bin NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=167 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_bin;

--
-- Déchargement des données de la table `groupe`
--

INSERT INTO `groupe` (`id`, `nom`, `description`, `cout`, `pays_origine`, `musiciens`, `email`, `photo`) VALUES
(164, 'OneRepublic', 'OneRepublic est un groupe de pop rock américain, originaire de Colorado Springs, dans le Colorado, fondé en 2002.', '27.50', 'États-Unis', 'Ryan Tedder\r\nZach Filkins\r\nDrew Brown\r\nBrent Kutzle\r\nEddie Fisher', 'onerepublic@gmail.com', 'https://upload.wikimedia.org/wikipedia/commons/thumb/7/73/OneRepublic2013.jpg/260px-OneRepublic2013.jpg'),
(156, 'The Rolling Stones', 'The Rolling Stones est un groupe britannique de rock originaire de Londres, en Angleterre.', '35.00', 'Royaume-Uni', 'Mick Jagger\r\nKeith Richards\r\nRon Wood', 'rollingstones@gmail.com', 'https://upload.wikimedia.org/wikipedia/commons/thumb/5/5e/Rolling_Stones_onstage_at_Summerfest_2015.jpg/330px-Rolling_Stones_onstage_at_Summerfest_2015.jpg'),
(117, 'Eiffeil 65', 'Eiffeil 65 est un groupe de musique Italien créé en 1998 à Turin.', '15.00', 'France', '- Gianfranco Randone\r\n- Maurizio Lobina\r\n- Gabry Ponte', 'eiffeil65@music.com', 'https://www.tsugi.fr/wp-content/uploads/2020/08/eiffel_65_copy.jpg'),
(163, 'The Chainsmokers', 'The Chainsmokers est un duo américain de disc jockeys et producteurs, composé d\'Andrew Taggart et Alex Pall, originaire de New York.', '30.00', 'États-Unis', 'Andrew Taggart\r\nAlex Pall\r\nMatt McGuire (batterie)', 'thechainsmokers@gmail.com', 'https://www.guettapen.com/wp-content/uploads/2020/07/TCS-FEQ2018_0711_205444-7362_DLG.jpg'),
(113, 'Coldplay', 'Coldplay est un groupe pop-rock britannique originaire de Londres, formé en 1996.', '20.00', 'Royaume-Uni', '- Chris Martin\r\n- Jon Buckland\r\n- Guy Berryman\r\n- Will Champion\r\n- Phil Harvey', 'coldplay@music.com', 'https://upload.wikimedia.org/wikipedia/commons/thumb/8/81/Coldplay_-_Global-Citizen-Festival_Hamburg_14.jpg/290px-Coldplay_-_Global-Citizen-Festival_Hamburg_14.jpg'),
(114, 'Suprême NTM', 'Suprême NTM, ou simplement NTM, est un groupe de rap français.', '12.00', 'France', '- Kool Shen\r\n- Joeystarr\r\n- DJ S\r\n- DJ Oliver\r\n- Psykopat (Animalxxx et Badreak)\r\n- Yazid\r\n- Kast\r\n- Lady V', 'ntm@music.com', 'https://upload.wikimedia.org/wikipedia/fr/thumb/2/23/Logo_NTM.png/220px-Logo_NTM.png'),
(162, 'Twenty One Pilots', 'Twenty One Pilots est un groupe d\'indie rock américain, originaire de Columbus dans l\'Ohio.', '35.00', 'États-Unis', 'Tyler Joseph\r\nJosh Dun', 'twentyonepilots@gmail.com', 'https://upload.wikimedia.org/wikipedia/commons/thumb/a/a3/Twenty_One_Pilots%2C_Alexandra_Palace%2C_London_%2830942538291%29.jpg/240px-Twenty_One_Pilots%2C_Alexandra_Palace%2C_London_%2830942538291%29.jpg'),
(161, 'Imagine Dragons', 'Imagine Dragons est un groupe de pop rock américain, originaire de Las Vegas, dans le Nevada.', '50.00', 'États-Unis', 'Dan Reynolds\r\nBen McKee (en)\r\nWayne Sermon\r\nDaniel Platzman (en)', 'imaginedragons@gmail.com', 'https://upload.wikimedia.org/wikipedia/commons/thumb/0/04/Imagine_Dragons%2C_Roundhouse%2C_London_%2835390234536%29.jpg/330px-Imagine_Dragons%2C_Roundhouse%2C_London_%2835390234536%29.jpg'),
(160, 'Dimitri Vegas & Like Mike', 'Dimitri Vegas & Like Mike est un groupe d\'electro house belgo-grec.', '25.00', 'Belgique', 'Dimitri Thivaios\r\nMichael Thivaios', 'dimitri&michael@gmail.com', 'https://upload.wikimedia.org/wikipedia/commons/thumb/c/c7/Dimitri_Vegas_%26_Like_Mike_in_TomorrowWorld_2013.jpg/260px-Dimitri_Vegas_%26_Like_Mike_in_TomorrowWorld_2013.jpg'),
(159, 'Black Eyed Peas', 'Black Eyed Peas (aussi appelé The Black Eyed Peas) est un groupe de hip-hop américain formé à Los Angeles, en Californie.', '45.00', 'États-Unis', 'will.i.am\r\napl.de.ap\r\nTaboo\r\nJ. Rey Soul', 'blackeyedpeas@gmail.com', 'https://cdn.britannica.com/82/149182-050-574AF9C2/Black-Eyed-Peas-Fergie-Taboo-ap.jpg'),
(157, 'Salut c\'est cool', 'Salut c\'est cool est un groupe de musique électronique humoristique français, originaire de Paris.', '25.00', 'France', 'Louis Donnot\r\nVadim Pigounides', 'salutcestcool@gmail.com', 'https://upload.wikimedia.org/wikipedia/commons/thumb/c/c1/Salut_c%27est_cool_-_Le_Confort_Moderne%2C_Poitiers_%282014-04-20_23.44.19_by_Xi_WEG%29.jpg/220px-Salut_c%27est_cool_-_Le_Confort_Moderne%2C_Poitiers_%282014-04-20_23.44.19_by_Xi_WEG%29.jpg'),
(158, 'LMFAO', 'LMFAO est un groupe de dance-pop américain, originaire de Pacific Palisades, en Californie.', '40.00', 'États-Unis', 'Redfoo\r\nSky Blu', 'lmfao@gmail.com', 'https://img-4.linternaute.com/QXh_837KGx46i3VV6fNatXiVvP0=/1500x/smart/bcd65a2e68ff4d2c8777ac348e96f519/ccmcms-linternaute/1376627.jpg');

-- --------------------------------------------------------

--
-- Structure de la table `pays`
--

DROP TABLE IF EXISTS `pays`;
CREATE TABLE IF NOT EXISTS `pays` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nom_pays` varchar(255) COLLATE utf8mb4_bin NOT NULL,
  `continent` varchar(255) COLLATE utf8mb4_bin NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=19 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_bin;

--
-- Déchargement des données de la table `pays`
--

INSERT INTO `pays` (`id`, `nom_pays`, `continent`) VALUES
(1, 'France', 'Europe'),
(2, 'Espagne', 'Europe'),
(3, 'Canada', 'Amérique'),
(4, 'Venezuela', 'Amérique'),
(5, 'Australie', 'Océanie'),
(6, 'Côte d\'Ivoire', 'Afrique'),
(7, 'Suisse', 'Europe'),
(8, 'États-Unis', 'Amérique'),
(9, 'Italie', 'Europe'),
(10, 'Méxique', 'Amérique'),
(11, 'Afrique du Sud', 'Afrique'),
(12, 'Nouvelle-Zélande', 'Océanie'),
(13, 'Nouvelle-Calédonie', 'Océanie'),
(14, 'Japon', 'Asie'),
(15, 'Chine', 'Asie'),
(16, 'Allemagne', 'Europe'),
(17, 'Royaume-Uni', 'Europe'),
(18, 'Belgique', 'Europe');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
