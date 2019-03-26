<?php
  require '../../../config/configuration.php';
 ?>
<html>
    <head>
        <title> result.php </title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <label style="font-size:14px; font-family:calibri;">
        <link rel="stylesheet" type="text/css" href="../../../lib/styles/css/style.css">
    </head>
   <body>
   <header>
        <div class="topnav">
			<img class="logo" src="..\..\..\lib\styles\css\logo.png">
		</div>
    </header>

	<section>
		<h1>Resultat</h1>
    <br/>
		<?php
    if(isset($_GET['detail'])){
      $detail = $_GET['detail'];
    }
    $uniqueresultat = 0;
		include('functions.php');
		//PDO = PHP Data Object, me permet de me connecter en localhost (127.0.0.1) sur la base de données data (qui se trouve sur phpmyadmin)
		$bdd = new PDO($dsn,$username,$password);
    if(isset($_POST['1'])){
      if (isset($_POST['recherche'])){
				$usersearch = $_POST['recherche'];
        $columns = array('Title','FirstName','Editor','PublicationYear','Langage','Resum','ListeKW');
				for ($i=0;$i<count($columns);$i++){
					$requete = "SELECT * FROM book, author, keyword WHERE book.IdAuthor = author.IdAuthor AND keyword.IdKeyWord = book.IdKeyWord AND $columns[$i] LIKE '%$usersearch%'";
				  $retour = $bdd->query($requete);
          //var_dump($requete);
          if($uniqueresultat != 1){
  				  while($donnees = $retour->fetch()){
              //var_dump($donnees);
              $uniqueresultat = 1;
  				    bookdisplay_function_result($donnees);
              $answer = $donnees['IdBook'];
              echo'<a href="detail.php?booksearch='.$answer.'">+ de detail</a><br/><br/>';
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
      $donnees = $requete->fetch();
      if(mysql_num_rows($donnees)){ 
        header('Location: erreur.php');
        exit;
      }
      else{
      //var_dump($retour);
  		while($donnees = $requete->fetch()){
        //var_dump($donnees);
  		  bookdisplay_function_result($donnees);
        $answer = $donnees['IdBook'];
        echo'<a href="detail.php?bookfilter='.$answer.'">+ de detail</a><br/><br/>';
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
