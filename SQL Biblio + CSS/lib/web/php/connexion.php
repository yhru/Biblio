<html>
  <head>
    <title>Se connecter</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <label style="font-size:22px; font-family:calibri;">
    <link rel="stylesheet" type="text/css" href="../../../lib/styles/css/style.css">
  </head>
  <body>
    <form action="connexion.php" method="post">
      Utilisateur:<input type="text" name="user" value="" />
      Mot de passe:<input type="password" name="mdp" value="" />

      <input type="submit" name="connexion" value="Se connecter" />
    </form>
  </body>
</html>
<?php
  session_start();
  $bdd = new PDO("mysql:host=127.0.0.1;dbname=data;charset=utf8","root","");
  if(isset($_POST['connexion'])){
    if(empty($_POST['user'])){
      echo "Veuillez remplir le champ utilisateur";
    } else {
      if(empty($_POST['mdp'])){
        echo "Entrez un mot de passe";
      }else {
        $user=htmlentities($_POST['user']);
        $mdp=htmlentities($_POST['mdp']);
      //  $bdd = new PDO("mysql:host=127.0.0.1;dbname=data;charset=utf8","root","");

      }if(!$bdd){
        echo "Base de données: Erreur de connexion";
        }else{

          $requete="SELECT * FROM utilisateur WHERE user = '".$user."' and mdp='".$mdp."'";
          $retour = $bdd->query($requete);
          while($donnees = $retour->fetch()){
            $row_cnt=mysqli_num_rows($retour);
            if($row_cnt==0){
              echo "Nom d'utilisateur ou mot de passe incorrect.";
            }else{
              $_SESSION['user'] = $user;
              echo "Vous êtes connecté.";
            }

          }

          }
      }

    }

 ?>
