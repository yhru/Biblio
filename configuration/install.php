<?php
/**
 * Open a connection via PDO to create a
 * new database and table with structure.
 *
 */
require 'configuration.php';

$installDB = <<<SQL

CREATE DATABASE $dbname;

use $dbname;

CREATE TABLE $author (
    CodeAuthor INT(11) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    FirstName CHAR(254) NOT NULL,
    LastName CHAR(254) NOT NULL
);

CREATE TABLE $keywords (
    CodeKeyWords INT(11) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    ListeKW TEXT NOT NULL
);

CREATE TABLE $livre (
    CodeLivre INT(11) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    Title CHAR(254) NOT NULL,
    CodeAuthor INT(11) NOT NULL,
    Editor CHAR(254) NOT NULL,
    PublicationYear TIMESTAMP NOT NULL,
    Language CHAR(254) NOT NULL,
    Resum TEXT,
    CodeKeyWords INT(11) NOT NULL
);

CREATE TABLE $comment (
    IdComment INT(11) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    Username VARCHAR(254) NOT NULL,
    Jour DATE,
    Heure TIME,
    Comment TEXT,
    CodeLivre INT(11) NOT NULL
);
SQL;

try {
    $connection = new PDO("mysql:host=$host", $username, $password, $options);
    $connection->exec($installDB);

    echo "Database created";
} catch(PDOException $error) {
    echo $tableUsers . "<br>" . $error->getMessage();
}

?>
