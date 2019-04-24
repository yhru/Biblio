<?php
	require '../../config/configuration.php';
	session_start();
	if ($_SESSION['TypeGroup'] == null || $_SESSION['TypeGroup'] == 2){
			header('Location: ../../index.php');
	}
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
		$bdd = new PDO($dsn,$username,$password);
	}
	catch(Exception $e){
		die("Erreur : " . $e->getMessage());
	}

	if(isset($_POST["Add"])){
		$target_directory = "../assets/images/coverpage/";
		$target_file = $target_directory . basename($_FILES["picture"]["name"]);
		$upload = false;
		$check = getimagesize($_FILES["picture"]["tmp_name"]);

		if($check){
			$requeteauthor = $bdd->prepare('INSERT INTO author(FirstName) VALUES(:FirstName)');
			$requeteauthor->execute(array("FirstName" => $author));
			$idauthor = $bdd->lastInsertId();

			$requetekeyword = $bdd->prepare('INSERT INTO keyword(ListeKW) VALUES(:ListeKW)');
			$requetekeyword->execute(array("ListeKW" => $keywords));
			$idkeyword = $bdd->lastInsertId();

			$requete = $bdd->prepare('INSERT INTO book(Title, Editor, PublicationYear, Langage, Resum, IdAuthor, IdKeyWord) VALUES("'.$title.'", "'.$editor.'", "'.$publicationyear.'", "'.$language.'", "'.$resum.'","'.$idauthor.'","'.$idkeyword.'")');
			$requete->execute();
			$idbook = $bdd->lastInsertId();

			move_uploaded_file($_FILES["picture"]["tmp_name"], $target_file);
			rename($target_file, $target_directory . $idbook . ".jpg");
			echo "Le fichier uploadé de type " . $check["mime"] . " est valide.".'<br/>';
			$save_image_path = "lib/assets/images/coverpage/". $idbook;
			$imagebdd = $bdd->prepare("UPDATE book SET Coverpage = '$save_image_path' WHERE IdBook = '$idbook'");
			$imagebdd->execute();
			$upload = true;
		}
		else{
			$errormsg = "Le fichier n'est pas une image valide.";
			echo $errormsg;
			$upload = false;
		}
	}
?>
