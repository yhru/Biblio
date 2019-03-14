<?php
        include('lib/web/otherpages/php/functions.php');
?>
<!DOCTYPE html>
<html>
    <head>
        <title> index.html </title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <label style="font-size:14px; font-family:calibri;"> 
        <link rel="stylesheet" type="text/css" href="lib/styles/css/style.css">
    </head>

    <body>
        <header>
            <div class="topnav">
                <a href="http://localhost/SQL%20Biblio/index.php">
                <img class="logo" src="../../../../lib/styles/css/logo.png">
            </div>
        </header>

        <section>
            <span class= "titre"> <h1>Quel livre recherchez-vous ? </h1></span><br />
            <label>Vous êtes ici :</label><strong>Accueil</strong><br /><br />
            <form class="form-search" method="POST" action="lib/web/otherpages/php/result.php">
                <div class=livreali>
                    <label>Recherche : </label><input class="champ" type="text" name="recherche" placeholder="Saisissez votre recherche..."/>
                    <input class="clean" type="reset" value="&#10006"/>
                    <input class="search" type="submit" name="1" value="&#10004"><br /><br /><br /><br />
                </div>
            </form>
                <div class="cssformulaire">       
                    <form name="formulaire2" class="form-search" method="POST" action="lib/web/otherpages/php/result.php">
                        <strong>Recherche avancée : </strong><br />
                        <span class="form-advanced"><p>Formulaire à plusieurs champs (Veuillez remplir un ou plusieurs champs) :
                        <input class="clean" type="reset" value="&#10006"/><input  class="search" type="submit" name="2" value="&#10004"></p> 
                        <label for="Title">Le titre du livre : </label><input class="champ" type="text" name="Title" placeholder="Ex : Harry Potter ..."/><br />        
                        <label for ="Author">Auteur du livre : </label><input class="champ" type="text" name="Author" placeholder="Ex : Claude Ponti ..."/><br />
                        <label for="Editor">Editeur du livre : </label><input class="champ" type="text" name="Editor" placeholder="Ex : Hachette jeunesse ..."/><br /><br />
                        <label>Langue : </label> 
                            <select name="Language" id="choix">
                                <option value="default"></option>
                                <option value="Français">Français</option>
                                <option value="Anglais">Anglais</option>
                            </select>
                    </form>
                </div>
            </section>

            <footer>
            </footer>
    </body>
</html>