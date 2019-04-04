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
        <title> Modifier un livre </title>
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
      		<h1>Quel livre souhaitez-vous modifier ?</h1>
          <br/>
          <?php
              $uniqueresultat = 0;
              try{
            		$bdd = new PDO($dsn,$username,$password);
            	}
            	catch(Exception $e){
            		die("Erreur : " . $e->getMessage());
            	}

              if(isset($_POST['1'])){
                if (isset($_POST['recherche'])){
          				$usersearch = $_POST['recherche'];
                  $columns = array('Title','FirstName','Editor','PublicationYear','Langage','Resum','ListeKW');
          				for ($i=0;$i<count($columns);$i++){
          					$requete = "SELECT * FROM book, author, keyword WHERE book.IdAuthor = author.IdAuthor AND keyword.IdKeyWord = book.IdKeyWord AND $columns[$i] LIKE '%$usersearch%'";
          				  $retour = $bdd->query($requete);
                    if($uniqueresultat != 1){
            				  while($donnees = $retour->fetch()){
                        $uniqueresultat = 1;
            				    bookdisplay_function_editresult($donnees);
                        $answer = $donnees['IdBook'];
                        echo'<a href="editbookmain.php?bookedit='.$answer.'">Modifier</a><br/><br/>';
                      }
          				  }
          			  }
          			}
              }

          		if(isset($_POST['2'])){
          			foreach($_POST as $key => $value){
                  $arraycolumns[] = $key;
                  $arrayvalue[] = $value;
                }
          			$requete = $bdd->prepare("SELECT * FROM book,author,keyword WHERE author.IdAuthor = book.IdAuthor AND keyword.IdKeyWord = book.IdKeyWord AND $arraycolumns[1] LIKE '%$arrayvalue[1]%'
                AND $arraycolumns[2] LIKE '%$arrayvalue[2]%' AND $arraycolumns[3] LIKE '%$arrayvalue[3]%' AND $arraycolumns[4] LIKE '%$arrayvalue[4]%' AND $arraycolumns[5] LIKE '%$arrayvalue[5]%'");
                //var_dump($requete);
          		  $requete->execute();
                $retour = $requete->fetchAll();
                if (count($retour) == 0) {
                  header('Location: erreur.php');
                  exit;
                }
                else{
                  foreach ($retour as $donnees){
            		      bookdisplay_function_editresult($donnees);
                      $answer = $donnees['IdBook'];
                      echo'<a href="editbookmain.php?bookedit='.$answer.'">Modifier</a><br/><br/>';
          			  }
                }
          		  echo "<br/>";
          	 }
          ?>
        </section>
    <footer>
    </footer>
    </body>
</html>
