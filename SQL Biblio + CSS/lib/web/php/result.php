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
		include('functions.php');
			$ensdonnees = 0;
			//PDO = PHP Data Object, me permet de me connecter en localhost (127.0.0.1) sur la base de données data (qui se trouve sur phpmyadmin)
			$bdd = new PDO("mysql:host=127.0.0.1;dbname=data;charset=utf8","root","");

			if(isset($_POST['1'])){
				//$numberresult = 0;
				//Si le champ est vide et qu'on clique sur le bouton submit => On a tout les livres ! 
				if(empty($_POST['recherche'])){
					//La requête que l'on veut faire
					$requete = "SELECT * FROM livre";

					//On va chercher (query) dans notre base de données (bdd) des résultats de la requête $requete
					$retour = $bdd->query($requete);

					//Affiche le résultat de la requête ($données represente un tableau champ par champ de mes valeurs)
					//Ici, il y a tous les champs !
					while($donnees = $retour->fetch()){
						bookdisplay_function($donnees);
						//$numberresult ++;
					}
					echo "<br /><br />";
				}
				else
				{
					$usersearch = $_POST['recherche'];
					for ($i=0;$i<=4;$i++){
						echo $columns[$i];
					//$requete = "SELECT * FROM livre WHERE $columns[$i] LIKE '%$usersearch%'";
					$retour = $bdd->query($requete);
					while($donnees = $retour->fetch()){
						bookdisplay_function($donnees);
					}
					echo "<br/>";}
				}
			}
			
			if(isset($_POST['2'])){
				foreach($_POST as $key => $value) {
					if(!(empty($_POST[$key])))
					{
						$requete = "SELECT * FROM livre WHERE $key LIKE '%$value%'";
						$retour = $bdd->query($requete);
						while($donnees = $retour->fetch()){
							bookdisplay_function($donnees);
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