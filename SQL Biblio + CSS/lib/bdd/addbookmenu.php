<?php
session_start();
if ($_SESSION['TypeGroup'] == null || $_SESSION['TypeGroup'] == 2){
		header('Location: ../../index.php');
}
?>
<!DOCTYPE html>
<html>
<head>
	<title>Page permettant d'alimenter la bdd</title>
	<meta charset="utf-8">
	<link rel="stylesheet" type="text/css" href="web/assets/css/style.css">

</head>
	<!-- L'ajout de livre fonctionne mais pas le champ pour l'image de couverture -->
	<form method="post" enctype="multipart/form-data" action="addbookmain.php" >
		<div class="filterinfos">
			<label>Titre du livre :</label>
			<input type="text" name="Title"><br/>

			<label>Auteur du livre : </label>
			<input type="text" name="Author"><br/>

			<label>Éditeur du livre : </label>
			<input type="text" name="Editor"><br/>

			<label>Année de parution du livre : </label>
			<input type="text" name="PublicationYear"><br/>
		</div>

		<div class="filterinfos">
			<label>La langue : </label>
			<input type="text" name="Language"><br/>

			<label>Le résumé : </label>
			<textarea name="Resum"></textarea><br/>
			<!-- EN CONSTRUCTION
			Nous cherchons une solution afin d'ajouter l'image (le chemin menant à l'image) dans notre base de données
			<label>La couverture : </label>
			<input type="file" name="Image" accept="image/jpg, image/png"> -->
		</div>

		<div class="filterinfos">
			<label>Les mots-clés : </label>
			<input type="text" name="CodeKey"></div>
		</div>
		<input type="submit" value="Ajouter">
	</form>
</html>
