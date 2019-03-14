<?php
	//Récupération des données dans les variables suivantes  
	$title = $_POST['Title'];
	$author = $_POST['Author'];
	$editor = $_POST['Editor'];
	$publicationyear = $_POST['PublicationYear'];
	$language = $_POST['Language'];
	$resum = $_POST['Resum'];
	$keywords = $_POST['CodeKey'];

	//Connexion à la base de données + traitement des erreurs par un TRY/CATCH
	try{
		$bdd = new PDO("mysql:host=127.0.0.1;dbname=data;charset=utf8","root","");
	}

	catch(Exception $e){
		die("Erreur : " . $e->getMessage());
	}

	//Requete SQL afin d'ajouter les données
	$requete = $bdd->prepare('INSERT INTO LIVRE(Title, Author, Editor, PublicationYear, Language, Resum, CodeKey) VALUES(:Title, :Author, :Editor, :PublicationYear, :Language, :Resum, :CodeKey)');

	//Exécuter les modifications sur la base de données phpmyadmin (ici la modification est un ajout de livre)
	$requete->execute(array(
		'Title' => $title,
		'Author' => $author,
		'Editor' => $editor,
		'PublicationYear' => $publicationyear,
		'Language' => $language,
		'Resum' => $resum,
		'CodeKey' => $keywords
	));
?>