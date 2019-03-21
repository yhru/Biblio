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
		<?php
    $detail = 100;
    if(isset($_GET['detail'])){
      $detail = $_GET['detail'];
    }

		include('functions.php');
		//PDO = PHP Data Object, me permet de me connecter en localhost (127.0.0.1) sur la base de données data (qui se trouve sur phpmyadmin)
		$bdd = new PDO("mysql:host=127.0.0.1;dbname=data;charset=utf8","root","");
    if(isset($_POST['1']) or $detail == 1){
      if (isset($_POST['recherche'])){
				$usersearch = $_POST['recherche'];
        $columns = array('CodeLivre','Title','Author','Editor','PublicationYear','Language','Resum','CodeKey');
				for ($i=0;$i<=0;$i++){
					$requete = "SELECT * FROM livre WHERE $columns[$i] LIKE '%$usersearch%'";
				  $retour = $bdd->query($requete);
				  while($donnees = $retour->fetch()){
				      bookdisplay_function_result($donnees);
              $answer = $donnees['CodeLivre'];
              echo'<a href="detail.php?booksearch='.$answer.'">+ de detail</a><br/><br/>';
					}
			  }
			}
    }

		if(isset($_POST['2'])){
			foreach($_POST as $key => $value) {
				if(!(empty($_POST[$key])))
				{
					$requete = "SELECT * FROM livre WHERE $key LIKE '%$value%'";
					$retour = $bdd->query($requete);
					while($donnees = $retour->fetch()){
						bookdisplay_function_result($donnees);
            $answer = $donnees['CodeLivre'];
            echo'<a href="detail.php?bookfilter='.$answer.'">+ de detail</a><br/><br/>';
					}
					echo "<br/>";
        }
			}
		}
	?>
	</section>
	<footer>
  </footer>
</body>
</html>
