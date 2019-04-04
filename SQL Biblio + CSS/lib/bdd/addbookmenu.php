<?php
	session_start();
	if ($_SESSION['TypeGroup'] == null || $_SESSION['TypeGroup'] == 2){
		header('Location: ../../index.php');
	}
?>
<!DOCTYPE html>
<html>
    <head>
        <title> Ajouter un livre </title>
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
				<br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/>
				<form method="post" action="addbookmain.php" enctype="multipart/form-data">
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
						<label>La couverture : </label>
						<input type="file" name="picture" accept="image/jpg">
					</div>

					<div class="filterinfos">
						<label>Les mots-clés : </label>
						<input type="text" name="CodeKey"></div>
					</div>

					<input type="submit" value="Ajouter" name="Add">
				</form>
    </body>
    <footer>
    </footer>
</html>
