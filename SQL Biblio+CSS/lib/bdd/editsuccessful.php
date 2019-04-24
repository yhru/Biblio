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
        <META HTTP-EQUIV="PRAGMAS" CONTENT="NO-CACHE">
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
              if (isset($_GET['successedit'])){
                $CodeLivre = $_GET['successedit'];
                $Edit_Title = $_POST["Title"];
                $Edit_Author = $_POST["FirstName"];
                $Edit_Editor = $_POST["Editor"];
                $Edit_Year = $_POST["PublicationYear"];
                $Edit_Language = $_POST["Langage"];
                $Edit_Resum = $_POST["Resum"];
                $Edit_ListeKW = $_POST["ListeKW"];
              }

              try{
            		$bdd = new PDO($dsn,$username,$password);
            	}
            	catch(Exception $e){
            		die("Erreur : " . $e->getMessage());
            	}

              if(isset($_POST['formulaire_edit'])){
                $target_directory = '../assets/images/coverpage/';
                if(!empty($_FILES["picture"]["name"])){
                    //unlink($target_directory.$CodeLivre.".jpg");
                		$target_file = $target_directory . basename($_FILES["picture"]["name"]);
                    $check = getimagesize($_FILES["picture"]["tmp_name"]);
                    move_uploaded_file($_FILES["picture"]["tmp_name"], $target_file);
              			rename($target_file, $target_directory . $CodeLivre . ".jpg");
                }
                $save_image_path = "lib/assets/images/coverpage/". $CodeLivre;

                $editbook = $bdd->prepare("UPDATE book,keyword,author SET Title = '$Edit_Title', FirstName = '$Edit_Author', Editor = '$Edit_Editor', PublicationYear = '$Edit_Year', Langage = '$Edit_Language', Resum = '$Edit_Resum', ListeKW = '$Edit_ListeKW', Coverpage = '$save_image_path' WHERE book.IdAuthor = author.IdAuthor AND book.IdKeyWord = keyword.IdKeyWord AND book.IdBook = '$CodeLivre'");
          			$editbook->execute();
                echo '<label> Votre livre a été correctement modifié </label>'.'<br/>';
                echo '<a href="editbookmenu.php"> Retour à la page précédente </a>';
              }
          ?>
        </section>
    <footer>
    </footer>
    </body>
</html>
