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
    IdAuthor INT(11) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    FirstName CHAR(255) NOT NULL,
    LastName CHAR(255) NOT NULL
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
    PublicationYear TIMESTAMP NOT NULL,
    Langage CHAR(255) NOT NULL,
    Resum TEXT,
    IdKeyWord INT(11) NOT NULL
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

SQL;

try {
    $connection = new PDO("mysql:host=$host", $username, $password, $options);
    $connection->exec($installDB);

    echo "Database created";
} catch(PDOException $error) {
    echo $tableUsers . "<br>" . $error->getMessage();
}
