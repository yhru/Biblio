<?php
  include('lib/web/php/functions.php');
  session_start();
?>
<!DOCTYPE html>
<html>
    <head>
        <title> Accueil </title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <label style="font-size:14px; font-family:calibri;">
        <link rel="stylesheet" type="text/css" href="lib/styles/css/style.css">
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    </head>

    <body>
        <header>
            <div class="topnav">
              <a href="index.php">
                <img class="logo" src="lib\styles\css\logo.png">
              </a>
              <div class="login_container">
                <form class="login-input" action="/lib/web/php/connexion.php">
                  <input type="text" placeholder="Username" name="username">
                  <input type="text" placeholder="Password" name="passwd">
                  <button type="submit" class="btn btn-outline-light">Login</button>
                </form>
              </div>
            </div>
        </header>

        <section>
            <span class= "titre"> <h1>Quel livre recherchez-vous ? </h1></span><br />
            <label>Vous êtes ici :</label><strong>Accueil</strong><br /><br />
            <form class="form-search" method="POST" action="lib/web/php/result.php">
                <div class=livreali>
                    <label>Recherche : </label><input class="champ" type="text" name="recherche" placeholder=""/>
                    <input class="search" type="submit" name="1" value="&#128269;"><br /><br /><br /><br />
                </div>
            </form>
                <div class="cssformulaire">
                    <form name="formulaire2" class="form-search" method="POST" action="lib/web/php/result.php">
                        <strong>Recherche avancée : </strong><br />
                        <label class="form-advanced">Formulaire à plusieurs champs (Veuillez remplir un ou plusieurs champs) : </label>
                        <input class="clean" type="reset" value="&#10006;"/><input  class="search" type="submit" name="2" value="&#128269;"></p>
                        <div class="aligntext">
                          <table align="center">
                          <tr>
                            <td><label for="Title">Titre du livre : </label></td>
                            <td><input class="champ" type="text" name="Title" placeholder="Ex : Harry Potter ..."/></td>
                          </tr>
                          <tr>
                            <td><label for ="Author">Auteur du livre : </label></td>
                            <td><input class="champ" type="text" name="Author" placeholder="Ex : Claude Ponti ..."/></td>
                          </tr>
                          <tr>
                            <td><label for="Editor">Editeur du livre : </label></td>
                            <td><input class="champ" type="text" name="Editor" placeholder="Ex : Hachette jeunesse ..."/></td>
                          </tr>
                          <tr>
                            <td><label for="KeyWord">Mots-clés : </label></td>
                            <td><input class="champ" type="text" name="ListeKW" placeholder="Ex : Enfance .."/></td>
                          </tr>
                        </table>
                        </div>
                        <label>Langue : </label>
                            <select name="Langage" id="choix">
                                <option value="Français">Français</option>
                                <option value="Anglais">Anglais</option>
                            </select><br><br>
                    </form>
                </div>
                <br/><br/>
            <?php
              if(isset($_SESSION['User'])){
                if($_SESSION['TypeGroup'] == 1){
                  echo'<a href = "lib/bdd/adminmenu.php"> Base de données </a><br/>';
                }
              }
             ?>
            <a href = "lib/bdd/addbookmenu.php"> Lien pour ajouter un livre à la Base de données </a><br/>
            <a href = "lib/web/php/inscription.php"> S'inscrire </a><br/>
            <a href = "lib/web/php/connexion.php"> Se connecter </a><br/>
                ______________________________________
                <div class="slideshow-container">
                  <div class="mySlides fade">
                    <img src="lib\styles\css\bibli1.jpg" style="width: 100%">
                  </div>

                  <div class="mySlides fade">
                    <img src="lib\styles\css\bibli2.jpg" style="width: 100%">
                  </div>

                </div>
                <br />

                <div style="text-align:center">
                    <span class="dot"></span>
                    <span class="dot"></span>
              </div>

              <script>
                var slideIndex = 0;
                showSlides();

                function showSlides() {
                  var i;
                  var slides = document.getElementsByClassName("mySlides");
                  var dots = document.getElementsByClassName("dot");
                  for (i = 0; i < slides.length; i++) {
                    slides[i].style.display = "none";
                  }
                  slideIndex++;
                  if (slideIndex > slides.length) {slideIndex = 1}
                  for (i = 0; i < dots.length; i++) {
                    dots[i].className = dots[i].className.replace(" active", "");
                  }
                  slides[slideIndex-1].style.display = "block";
                  dots[slideIndex-1].className += " active";
                  setTimeout(showSlides, 5000); // Change image every 2 seconds
                }
            </script>
    </section>
    <footer>
    </footer>
    </body>
</html>
