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
              if (isset($_GET['successedit'])){
                $CodeLivre = $_GET['successedit'];
              }

              try{
            		$bdd = new PDO($dsn,$username,$password);
            	}
            	catch(Exception $e){
            		die("Erreur : " . $e->getMessage());
            	}

              if(isset($_POST['formulaire_edit'])){
                $editbook = $bdd->prepare("UPDATE book,keyword,author SET Title = 'Mongol' WHERE book.IdAuthor = author.IdAuthor AND book.IdKeyWord = keyword.IdKeyWord AND IdBook = '$CodeLivre'");
          			$editbook->execute();
                echo '<label> Votre livre a été correctement modifié </label>';
                echo '<a href="editbookmenu.php"> Retour à la page précédente </a>'; 
              }
          ?>
        </section>
    <footer>
    </footer>
    </body>
</html>
