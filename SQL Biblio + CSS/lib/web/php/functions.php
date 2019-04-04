<?php
function bookdisplay_function_result (&$donnees){
	echo '<img src="../../../'.$donnees['Coverpage'].'.jpg" width=320 height=480/>'.'<br/>';
	echo $donnees['Title'] . "<br/>";
}

function bookdisplay_function_detail (&$donnees){
	echo '<img src="../../../'.$donnees['Coverpage'].'.jpg"/>'.'<br/>';
	echo "Titre : " . $donnees['Title'] . "<br/>";
	echo "Auteur : " . $donnees['FirstName'] . "<br/>";
	echo "Editeur : " . $donnees['Editor'] . "<br/>";
	echo "Année de publication : " . $donnees['PublicationYear'] . "<br/>";
	echo "Langue : " . $donnees['Langage'] . "<br/>";
  echo "Résumé : " . $donnees['Resum'] . "<br/>";
	echo "Mot-clés : " . $donnees['ListeKW'] . "<br/>";
}

function bookdisplay_function_comment (&$donnees){
	/*Le format US de la date AAAA-MM-JJ (ex : 2019-03-21) n'est pas très appréciable, nous avons donc fait un explode,on obtient alors un tableau de 3 valeurs,
	ensuite on fait le array reverse de ce tableau afin d'avoir le format JJ MM AAAA puis on fait implode avec "/" afin d'avoir ce format en chaine de caractères : JJ/MM/AAAA*/
	$donnees['Day'] = implode('/', array_reverse(explode('-', $donnees['Day'])));
	echo '<br/><strong>' . $donnees['Username'] . '</strong>' . '<em> le ' . $donnees['Day'] . ' à ' . $donnees['Hour'] . '</em><br/>';
	echo $donnees['Comment'] . '<br/>';
}

function bookdisplay_function_editresult (&$donnees){
	echo '<img src="../../'.$donnees['Coverpage'].'.jpg"/>'.'<br/>';
	echo $donnees['Title'] . "<br/>";
}

function infosdisplay_function_editform (&$donnees){
	echo '<form name="formulaire_edit" class="form-search" method="POST" action=""editsuccessful.php?successedit='.$CodeLivre.'"">
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
					<label>Valider la modification </label>
					<input class="search" type="submit" name="formulaire_edit" value="&#10004;"><br/><br/>
				</form>';
}
?>
