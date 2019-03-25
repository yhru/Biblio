<?php

/**
 * Configuration for database connection
 *
 */
$host = "localhost";
$username = "root";
$password = "";
$dbname = "Biblio";
$dsn = "mysql:host=". $host . ";dbname=" . $dbname . ";charset=utf8";
$author = "author";
$keyword = "keyword";
$book = "book";
$comment = "comment";
$status = "status";
$user = "user";
$options = array(
    PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION
);

/**
 * Open a connection via PDO to create a
 * new database and table with structure.
 *
 */
