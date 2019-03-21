<?php
function bookdisplay_function_result (&$donnees){
	echo '<img src="../../../lib/assets/images/coverpage/'.($donnees['CodeLivre']).'.jpg"/>'.'<br/>';
	echo $donnees['Title'] . "<br/>";
}

function bookdisplay_function_detail (&$donnees){
	echo '<img src="../../../lib/assets/images/coverpage/'.($donnees['CodeLivre']).'.jpg"/>'.'<br/>';
	echo "Titre : " . $donnees['Title'] . "<br/>";
	echo "Auteur : " . $donnees['FirstName'] . " " . $donnees['LastName'] . "<br/>";
	echo "Editeur : " . $donnees['Editor'] . "<br/>";
	echo "Année de publication : " . $donnees['PublicationYear'] . "<br/>";
	echo "Langue : " . $donnees['Language'] . "<br/>";
  echo "Résumé : " . $donnees['Resum'] . "<br/>";
	echo "Mot-clés : " . $donnees['ListeKW'] . "<br/>";
}

function bookdisplay_function_comment (&$donnees){
	/*Le format US de la date AAAA-MM-JJ (ex : 2019-03-21) n'est pas très appréciable, nous avons donc fait un explode,on obtient alors un tableau de 3 valeurs,
	ensuite on fait le array reverse de ce tableau afin d'avoir le format JJ MM AAAA puis on fait implode avec "/" afin d'avoir ce format en chaine de caractères : JJ/MM/AAAA*/
	$donnees['Date'] = implode('/', array_reverse(explode('-', $donnees['Date'])));
	echo '<br/><strong>' . $donnees['Username'] . '</strong>' . '<em> le ' . $donnees['Date'] . ' à ' . $donnees['Heure'] . '</em><br/>';
	echo $donnees['Comment'] . '<br/>';
}
?>
