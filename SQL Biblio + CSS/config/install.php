<?php
/*
Lien pour mettre à jour la BDD
http://localhost/Biblio/SQL%20Biblio/config/configuration.php
 */
require 'configuration.php';
$installDB = <<<SQL
CREATE DATABASE $dbname;
use $dbname;
CREATE TABLE $author (
    IdAuthor INT(11) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    FirstName CHAR(255) NOT NULL
);
CREATE TABLE $keyword (
    IdKeyWord INT(11) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    ListeKW TEXT NOT NULL
);
CREATE TABLE $status (
    IdGroup INT(11) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    TypeGroup VARCHAR(255) NOT NULL
);
CREATE TABLE $book (
    IdBook INT(11) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    Title VARCHAR(255) NOT NULL,
    IdAuthor INT(11) NOT NULL,
    Editor VARCHAR(255) NOT NULL,
    PublicationYear YEAR(4) NOT NULL,
    Langage CHAR(255) NOT NULL,
    Resum TEXT,
    IdKeyWord INT(11) NOT NULL,
    Coverpage VARCHAR(128) NULL
);
CREATE TABLE $comment (
    IdComment INT(11) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    Username VARCHAR(255) NOT NULL,
    Day DATE,
    Hour TIME,
    Comment TEXT,
    IdBook INT(11) NOT NULL
);
CREATE TABLE $user (
  IdUser INT(11) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
  User VARCHAR(255) CHARACTER SET utf8 COLLATE utf8_bin NOT NULL,
  Passwd VARCHAR(255) NOT NULL,
  Mail VARCHAR(100) NOT NULL,
  RegistrationDate DATETIME,
  TypeGroup VARCHAR(255) NOT NULL
);
/*
INSERT INTO `author` (`IdAuthor`, `FirstName`) VALUES
(1, 'Maurice Sendak'),
(2, 'Roger Hargreaves'),
(3, 'Claude Ponti'),
(4, 'Thierry Courtin'),
(5, 'Antoon Krings'),
(6, 'David McKee'),
(7, 'J.K Rowling'),
(8, 'Martin HandFord'),
(9, 'Voltaire');

INSERT INTO `book` (`IdBook`, `Title`, `IdAuthor`, `Editor`, `PublicationYear`, `Langage`, `Resum`, `IdKeyWord`, `Coverpage`) VALUES
(1, 'Max et les Maximonstres', 1, 'École des loisirs', 1963, 'Français', 'À force de faire bêtise sur bêtise dans son terrible costume de loup, Max s’est retrouvé puni et enfermé dans sa chambre. Mais pas seulement. Voilà qu’il se retrouve aussi roi d’une armée de bêtes immondes, les Maximonstres. Max le maudit les a domptés. Ils sont griffus, dentus, poilus, vivent sur une île et ne savent rien faire que des sarabandes, des fêtes horribles où il n’y a rien à manger. Max a la nostalgie de son chez-lui, des bonnes odeurs de cuisine et de l’amour de sa mère. Que faut- il faire pour rentrer ? Peut-être commencer par le désirer…', 1, 'lib/assets/images/coverpage/1'),
(2, 'M.Chatouille', 2, 'Hachette jeunesse', 1971, 'Français', 'Monsieur Chatouille, avec ses longs bras, aime beaucoup chatouiller ses amis et ses voisins. Mais eux, qu en pensent-ils ?', 2, 'lib/assets/images/coverpage/2'),
(3, 'Sur l île des Zertes', 3, 'École des loisir', 1999, 'Français', 'Qui est Jules ? C est un Zerte. Il vit sur une île. Il a un ami, Diouc. Des ennemis, comme le Martabaff, qui tape sur tout ce qu il trouve. Et une étrange passion pour une brique à qui il offre beaucoup de fleurs. Heureusement, il finira par rencontrer avec Roméotte le véritable amour…', 3, 'lib/assets/images/coverpage/3'),
(4, 'T choupi ne veut pas prêter', 4, 'Nathan', 1997, 'Français', 'Pilou vient passer l après-midi chez T choupi. T choupi refuse de prêter chacun de ses jouets à Pilou. Jusqu au moment où Tc houpi a envie de s amuser avec un jouet à Pilou...', 2, 'lib/assets/images/coverpage/4'),
(5, 'Mille secrets de poussins', 3, 'École des loisir', 2005, 'Français', 'Un jour, les poussins sont entrés dans les livres de Claude Ponti, et ils n en sont pas ressortis. Ils s y sentent chez eux, ils y font pas mal de bêtises, surtout Blaise, le poussin masqué. Ils y vivent des aventures qui leur sont propres, parfois en se salissant beaucoup. On les a vus déboucher une tempêteuse, organiser des courses de chaises, échapper au Mange-Poussin et construire un immense château pour la fête d Anne Hiversère. Ce livre-ci est particulier car il répond à toutes les questions que l on peut se poser au sujet des poussins. Il révèle les secrets de leur vie : comment naissent-ils ? Que font-ils dans leur oeuf avant de naître ? Attendent-ils en lisant un livre ? En prenant un bain ? Font-ils des trous dans leur coquille avec une perceuse ? Où vivent-ils ? Qu est-ce qu ils aiment ? Comment aiment-ils aimer ? Qu y a-t-il dans un poussin ? Les poussins des livres peuvent-ils mourir ? Et qui est Blaise ? Pourquoi Blaise est-il Blaise ? Autant de réponses que de questions dans cet album. Plus une réponse pour toutes les questions qui n auraient pas été posées.', 4, 'lib/assets/images/coverpage/5'),
(6, 'Mireille l\'abeille', 5, 'Gallimard Jeunesse Giboulées', 1994, 'Français', 'Travaille beaucoup pour faire des pots de miel et des bonbons dorés. Mais un jour, ses pots disparaissent. Après avoir cherché partout, elle rentre chez elle et trouve dans son lit un nain endormi…', 5, 'lib/assets/images/coverpage/6'),
(7, 'Harry Potter and the philosopher s stone', 7, 'Latin edition', 1997, 'Anglais', 'Harry thinks he s a normal kid, living a sucky life with the Dursleys, his social-climbing Muggle Foster Parents who hate him and all that he represents. Much to his surprise, however, on his eleventh birthday, Gentle Giant Hagrid shows up and tells Harry that he s not only a wizard, but a wizarding celebrity due to having survived an attack by Lord Voldemort ten years ago, somehow rendering the evil wizard MIA. It s then off to Hogwarts, where Harry befriends Ron Weasley and Hermione Granger, forming the iconic Power Trio. The three begin to suspect that someone is planning to steal the mystical stone of the title, which could be used to restore Voldemort to full power.', 7, 'lib/assets/images/coverpage/7'),
(8, 'Où est Charlie ? Le Voyage Fantastique', 8, 'Gründ', 1987, 'Français', 'Charlie est plus difficile à trouver que jamais, dans cet album qui met au défi votre sens de l observation ! Mais ce n est pas tout, il vous faut aussi retrouver une foule d autres personnages et d objets cachés dans toutes les pages.', 9, 'lib/assets/images/coverpage/8'),
(9, 'Elmer', 6, 'Kaléidoscope', 1989, 'Français', 'Elmer est différent des autres éléphants : il est bariolé et cette différence lui déplaît. Mais il découvrira que sa singularité ne l empêche pas de rester le même bon Elmer pour ses amis.', 8, 'lib/assets/images/coverpage/9'),
(10, 'Candide ou l optimisme', 9, 'Magnard', 2013, 'Français', '« Candide ou l’optimisme » fait partie des textes majeurs de la littérature française. Ecrit par Voltaire en 1759, ce titre connaît un franc succès dès le vivant de l’auteur grâce à ses principes philosophiques qui affichent une grand optimisme quand à la capacité de l’homme à améliorer sa condition et ne pas considérer comme vivant déjà dans le meilleur des mondes possibles.', 10, 'lib/assets/images/coverpage/10');

INSERT INTO `comment` (`IdComment`, `Username`, `Day`, `Hour`, `Comment`, `IdBook`) VALUES
(1, 'Romuald HENRY', '2019-03-21', '08:20:00', 'Ce livre est génial, je vous le conseille !', 1),
(2, 'Armand Gentot', '2019-03-21', '09:20:00', 'Wouah c\'est énorme comme bouquin !', 1),
(3, 'Romuald HENRY', '2019-03-21', '09:10:24', 'Je n\'aime pas M.Chatouille personnellement ... ', 2),
(4, 'Maxim Joseau', '2019-03-21', '11:00:00', 'MDR Linux !!!!!!!!!', 1),
(5, 'Nicolas Chevalier', '2019-03-21', '22:00:00', 'Max est trop bien !', 1),
(6, 'Romuald HENRY', '2019-03-21', '09:44:24', 'Je confirme Armand !', 1),
(7, 'JellalEternal', '2019-03-21', '19:28:47', 'Salut à tous les amis, c\'est DavidLa ... \"MAIS FERME LA !!!!\"', 1),
(8, 'JellalEternal', '2019-03-21', '20:28:38', 'Damn la team Shape, j\'espère que vous allez bien, c\'est Tibo ... \"FERME LA !!\"', 2),
(9, 'Monsieur la saucisse', '2019-03-21', '20:52:37', 'TiboInShape pue la merde Jellal !', 2),
(10, 'Louis Plancq', '2019-03-22', '08:18:37', 'ggwp le game ', 1),
(11, 'Cloud', '2019-03-25', '17:27:01', 'Super livre !', 1);

INSERT INTO `user` (`IdUser`, `User`, `Passwd`, `Mail`, `RegistrationDate`, `TypeGroup`) VALUES
(1, 'JellalEternal', 'cc8c0a97c2dfcd73caff160b65aa39e2', 'henry.romu@gmail.com', '2019-03-25 16:51:16', '1'),
(3, 'Armand Gentot', '0a5b3913cbc9a9092311630e869b4442', 'gentot.armand@gmail.com', '2019-03-26 01:57:39', '2');

INSERT INTO `keyword` (`IdKeyWord`, `ListeKW`) VALUES
(1, 'ENFANCE, MONSTRES'),
(2, 'ENFANCE, JOUET'),
(3, 'ENFANCE, ZERTE, ILE'),
(4, 'POUSSINS, ENFANCE'),
(5, 'ABEILLE, ENFANCE, MIEL'),
(6, 'MONSIEUR, MADAME, CHATOUILLE, ENFANCE'),
(7, 'ROMAN, FANTASTIQUE, SORCIER, MAGIE'),
(8, 'ENFANCE, ELEPHANT'),
(9, 'LOISIR, ENFANCE'),
(10, 'PHILOSOPHIE, OPTIMISME'); */
SQL;

try {
    $connection = new PDO("mysql:host=$host", $username, $password, $options);
    $connection->exec($installDB);
    echo "Database created";
} catch(PDOException $error) {
    echo $tableUsers . "<br>" . $error->getMessage();
}
