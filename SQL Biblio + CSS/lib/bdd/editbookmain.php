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
                <img class="logo" src="../styles/css/logo.png">
            </div>
        </header>
        <section>
          <br/>
          <?php
              if (isset($_GET['bookedit'])){
                $CodeLivre = $_GET['bookedit'];
              }
              echo $CodeLivre;

              try{
            		$bdd = new PDO($dsn,$username,$password);
            	}
            	catch(Exception $e){
            		die("Erreur : " . $e->getMessage());
            	}

              $requete = "SELECT * FROM book,author,keyword WHERE book.IdAuthor = author.IdAuthor AND book.IdKeyWord = keyword.IdKeyWord AND IdBook = '$CodeLivre'";
              $retour = $bdd->query($requete);
              while($donnees = $retour->fetch()){
                infosdisplay_function_editform ($donnees);
              }
          ?>
        </section>
    <footer>
    </footer>
    </body>
</html>
