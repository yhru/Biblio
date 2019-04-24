<?php
  session_start();
  if ($_SESSION['TypeGroup'] == null || $_SESSION['TypeGroup'] == 2){
		header('Location: ../../index.php');
	}
  include('../web/php/functions.php');
  require '../../config/configuration.php';
?>
<!DOCTYPE html>
<html>
    <head>
        <title> Livre à modifier </title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <label style="font-size:14px; font-family:calibri;">
        <link rel="stylesheet" type="text/css" href="../styles/css/style.css">
    </head>

    <body>
        <header>
            <div class="topnav">
                <img class="logo" src="../assets/images/logo.png">
            </div>
        </header>
        <section>
          <br/>
          <?php
              if (isset($_GET['bookedit'])){
                $CodeLivre = $_GET['bookedit'];
              }

              try{
            		$bdd = new PDO($dsn,$username,$password);
            	}
            	catch(Exception $e){
            		die("Erreur : " . $e->getMessage());
            	}

              $requete = "SELECT * FROM book,author,keyword WHERE book.IdAuthor = author.IdAuthor AND book.IdKeyWord = keyword.IdKeyWord AND IdBook = '$CodeLivre'";
              $retour = $bdd->query($requete);
              while($donnees = $retour->fetch()){
                //infosdisplay_function_editform ($donnees, $CodeLivre);
                echo '<form name="formulaire_edit" class="form-search" method="POST" action="editsuccessful.php?successedit='.$CodeLivre.'" enctype="multipart/form-data">

              					<label for="Title">Le titre du livre : </label>
              					<input class="champ" type="text" name="Title" value="'.$donnees['Title'].'"/><br/>

              					<label for ="Author">Auteur du livre : </label>
              					<input class="champ" type="text" name="FirstName" value="'.$donnees['FirstName'].'"/><br/>

              					<label for="Editor">Editeur du livre : </label>
              					<input class="champ" type="text" name="Editor" value="'.$donnees['Editor'].'"/><br/>

              					<label for="PublicationYear">Année de publication : </label>
              					<input class="champ" type="text" name="PublicationYear" value="'.$donnees['PublicationYear'].'"/><br/>

              					<label for="Langage">Langue : </label>
              					<input class="champ" type="text" name="Langage" value="'.$donnees['Langage'].'"/><br/>

              					<label for="Resum">Résumé : </label><br/>
              					<textarea class="champ" type="text" name="Resum" cols="50" rows="5"/>"'.$donnees['Resum'].'"</textarea><br/>

              					<label for="KeyWord">Mots-clés : </label>
              					<input class="champ" type="text" name="ListeKW" value="'.$donnees['ListeKW'].'"/><br/><br/>

              					<label>La couverture : </label>
              					<input type="file" name="picture" accept="image/jpg"><br/><br/>

              					<label>Valider la modification </label>
              					<input class="search" type="submit" name="formulaire_edit" value="&#10004;"><br/><br/>
              				</form>';
              }
          ?>
        </section>
    <footer>
    </footer>
    </body>
</html>
