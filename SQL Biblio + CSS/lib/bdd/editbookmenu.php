<?php
  include('../web/php/functions.php');
  session_start();
?>
<!DOCTYPE html>
<html>
    <head>
        <title> Accueil </title>
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
            <span class= "titre"> <h1>Quel livre recherchez-vous ? </h1></span><br />
            <label>Vous êtes ici : </label><strong>Accueil</strong><br /><br />
            <form class="form-search" method="POST" action="editresult.php">
                <div class=livreali>
                    <label>Recherche : </label><input class="champ" type="text" name="recherche" placeholder="Saisissez votre recherche..."/>
                    <input class="clean" type="reset" value="&#10006;"/>
                    <input class="search" type="submit" name="1" value="&#10004;">
                    <br/><br/><br/><br/>
                </div>
            </form>
                <div class="cssformulaire">
                    <form name="formulaire_edit" class="form-search" method="POST" action="editresult.php">
                        <strong>Recherche avancée : </strong><br />
                        <label class="form-advanced">Formulaire à plusieurs champs (Veuillez remplir un ou plusieurs champs) : </label>
                        <input class="clean" type="reset" value="&#10006;"/><input  class="search" type="submit" name="2" value="&#10004;"></p>
                        <label for="Title">Le titre du livre : </label><input class="champ" type="text" name="Title" placeholder="Ex : Harry Potter .."/><br/>
                        <label for ="Author">Auteur du livre : </label><input class="champ" type="text" name="FirstName" placeholder="Ex : Claude Ponti .."/><br/>
                        <label for="Editor">Editeur du livre : </label><input class="champ" type="text" name="Editor" placeholder="Ex : Hachette jeunesse .."/><br/>
                        <label for="KeyWord">Mots-clés : </label><input class="champ" type="text" name="ListeKW" placeholder="Ex : Enfance .."/><br /><br/>
                        <label>Langue : </label>
                        <select name="Langage" id="choix">
                            <option value="Français">Français</option>
                            <option value="Anglais">Anglais</option>
                        </select><br><br>
                    </form>
                </div>
                <br/>
        </section>
    <footer>
    </footer>
    </body>
</html>
