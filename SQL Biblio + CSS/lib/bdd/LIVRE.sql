-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3306
-- Généré le :  mer. 13 mars 2019 à 16:29
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
-- Base de données :  `data`
--

-- --------------------------------------------------------

--
-- Structure de la table `LIVRE`
--

DROP TABLE IF EXISTS `LIVRE`;
CREATE TABLE IF NOT EXISTS `livre` (
  `CodeLivre` int(11) NOT NULL AUTO_INCREMENT,
  `Title` varchar(254) NOT NULL,
  `Author` varchar(254) NOT NULL,
  `Editor` varchar(254) NOT NULL,
  `PublicationYear` int(11) NOT NULL,
  `Language` varchar(254) NOT NULL,
  `Resum` text NOT NULL,
  `CodeKey` varchar(254) NOT NULL,
  PRIMARY KEY (`CodeLivre`)
) ENGINE=MyISAM AUTO_INCREMENT=14 DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `LIVRE`
--

INSERT INTO `LIVRE` (`CodeLivre`, `Title`, `Author`, `Editor`, `PublicationYear`, `Language`, `Resum`, `CodeKey`) VALUES
(1, 'Max et les Maximonstres', 'Maurice Sendak', 'École des loisirs', 1963, 'Français', 'À force de faire bêtise sur bêtise dans son terrible costume de loup, Max s’est retrouvé puni et enfermé dans sa chambre. Mais pas seulement. Voilà qu’il se retrouve aussi roi d’une armée de bêtes immondes, les Maximonstres. Max le maudit les a domptés. Ils sont griffus, dentus, poilus, vivent sur une île et ne savent rien faire que des sarabandes, des fêtes horribles où il n’y a rien à manger. Max a la nostalgie de son chez-lui, des bonnes odeurs de cuisine et de l’amour de sa mère. Que faut- il faire pour rentrer ? Peut-être commencer par le désirer…', 'ENFANCE, MONSTRES'),
(3, 'Sur l île des Zertes', 'Claude Ponti', 'École des loisir', 1999, 'Français', 'Qui est Jules ? C est un Zerte. Il vit sur une île. Il a un ami, Diouc. Des ennemis, comme le Martabaff, qui tape sur tout ce qu il trouve. Et une étrange passion pour une brique à qui il offre beaucoup de fleurs. Heureusement, il finira par rencontrer avec Roméotte le véritable amour…', 'ENFANCE, ZERTE, ILE'),
(4, 'T choupi ne veut pas prêter', 'Thierry Courtin', 'Nathan', 1997, 'Français', 'Pilou vient passer l après-midi chez T choupi. T choupi refuse de prêter chacun de ses jouets à Pilou. Jusqu au moment où Tc houpi a envie de s amuser avec un jouet à Pilou...', 'ENFANCE, JOUET'),
(5, 'Mille secrets de poussins', 'Claude Ponti', 'École des loisir', 2005, 'Français', 'Un jour, les poussins sont entrés dans les livres de Claude Ponti, et ils n en sont pas ressortis. Ils s y sentent chez eux, ils y font pas mal de bêtises, surtout Blaise, le poussin masqué. Ils y vivent des aventures qui leur sont propres, parfois en se salissant beaucoup. On les a vus déboucher une tempêteuse, organiser des courses de chaises, échapper au Mange-Poussin et construire un immense château pour la fête d Anne Hiversère. Ce livre-ci est particulier car il répond à toutes les questions que l on peut se poser au sujet des poussins. Il révèle les secrets de leur vie : comment naissent-ils ? Que font-ils dans leur oeuf avant de naître ? Attendent-ils en lisant un livre ? En prenant un bain ? Font-ils des trous dans leur coquille avec une perceuse ? Où vivent-ils ? Qu est-ce qu ils aiment ? Comment aiment-ils aimer ? Qu y a-t-il dans un poussin ? Les poussins des livres peuvent-ils mourir ? Et qui est Blaise ? Pourquoi Blaise est-il Blaise ? Autant de réponses que de questions dans cet album. Plus une réponse pour toutes les questions qui n auraient pas été posées.', 'POUSSINS, ENFANCE'),
(6, 'Mireille l abeille', 'Antoon Krings', 'Gallimard Jeunesse Giboulées', 1994, 'Français', 'Travaille beaucoup pour faire des pots de miel et des bonbons dorés. Mais un jour, ses pots disparaissent. Après avoir cherché partout, elle rentre chez elle et trouve dans son lit un nain endormi…', 'ABEILLE, ENFANCE, MIEL'),
(7, 'Harry Potter and the philosopher s stone', 'J.K. Rowling', 'Latin edition', 1997, 'Anglais', 'Harry thinks he s a normal kid, living a sucky life with the Dursleys, his social-climbing Muggle Foster Parents who hate him and all that he represents. Much to his surprise, however, on his eleventh birthday, Gentle Giant Hagrid shows up and tells Harry that he s not only a wizard, but a wizarding celebrity due to having survived an attack by Lord Voldemort ten years ago, somehow rendering the evil wizard MIA. It s then off to Hogwarts, where Harry befriends Ron Weasley and Hermione Granger, forming the iconic Power Trio. The three begin to suspect that someone is planning to steal the mystical stone of the title, which could be used to restore Voldemort to full power.', 'ROMAN, FANTASTIQUE'),
(8, 'Où est Charlie ? Le Voyage Fantastique', 'Martin HandFord', 'Gründ', 1987, 'Français', 'Charlie est plus difficile à trouver que jamais, dans cet album qui met au défi votre sens de l observation ! Mais ce n est pas tout, il vous faut aussi retrouver une foule d autres personnages et d objets cachés dans toutes les pages.', 'LOISIR, ENFANCE'),
(9, 'Elmer', 'David McKee', 'Kaléidoscope', 1989, 'Français', 'Elmer est différent des autres éléphants : il est bariolé et cette différence lui déplaît. Mais il découvrira que sa singularité ne l empêche pas de rester le même bon Elmer pour ses amis.', 'ENFANCE, ELEPHANT'),
(10, 'Candide ou l optimisme', 'Voltaire', 'Magnard', 2013, 'Français', '« Candide ou l’optimisme » fait partie des textes majeurs de la littérature française. Ecrit par Voltaire en 1759, ce titre connaît un franc succès dès le vivant de l’auteur grâce à ses principes philosophiques qui affichent une grand optimisme quand à la capacité de l’homme à améliorer sa condition et ne pas considérer comme vivant déjà dans le meilleur des mondes possibles.', 'PHILOSOPHIE, OPTIMISME');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
