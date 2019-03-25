<html>
  <head>
    <title>Se connecter</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <label style="font-size:14px; font-family:calibri;">
    <link rel="stylesheet" type="text/css" href="../../../lib/styles/css/style.css">
  </head>
  <body>
    <form action="connexion.php" method="post">
      <input type="text" placeholder="Nom d'utilisateur" name="user" value=""/>
      <input type="password" placeholder="Mot de passe" name="mdp" value=""/>

      <input type="submit" name="connexion" value="Se connecter"/>
    </form>
  </body>
</html>
<?php
  /* Nous avons configuré l'insertion du nom d'utilisateur sensible à la cable, c'est à dire que l'utilisateur devra mettre correctement
  les majuscules et minuscules au bon endroit, chose qui n'était pas possible avec l'interclassement 'latin1_swedish_ci' pour le champ
  user, nous l'avons alors configuré en 'utf8_bin' qui lui, est sensible à la casse !! */

  //Connexion à la base de données
  try{
    $bdd = new PDO("mysql:host=127.0.0.1;dbname=data;charset=utf8","root","");
    $bdd->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
  }
  catch(Exception $e){
    die("Erreur : " . $e->getMessage());
  }

  //Si je clique sur 'se connecter'
  if(isset($_POST['connexion'])){
    //Si le champ du formulaire 'nom d'utilisateur' est vide :
    if(empty($_POST['user'])){
      echo "Veuillez saisir votre nom d'utilisateur";
    }
    //Sinon si le champ du formulaire 'mot de passe' est vide :
    else if (empty($_POST['mdp'])){
      echo "Veuillez saisir votre mot de passe";
    }
    //Sinon (= aucunes restrictions)
    else{
      /* On stocke le nom d'utilisateur dans la variable $user, de même pour le mot de passe sauf qu'on le script en plus
      afin de faire correspondre le mot de passe crypté dans la BDD et le mot de passe crypté que l'utilisateur à insérer */
      $user = htmlentities($_POST['user']);
      $mdp = md5(htmlentities($_POST['mdp']));
      //Requete pour comparer User + Password que l'utilisateur a inséré et le User + Password de la base de données
      $requete = $bdd->prepare("SELECT * FROM utilisateur WHERE user = :user and password = :mdp");
      $requete->bindValue(':user', $user, PDO::PARAM_STR);
      $requete->bindValue(':mdp', $mdp, PDO::PARAM_STR);
      $requete->execute();
      $donnees = $requete->fetch();
      //var_dump($donnees);

      //Si il y a pas de résultats : Affichage pour montrer à l'utilisateur qu'il est connecté
      if (!$donnees){
        echo "Mot de passe ou Nom d'utilisateur incorrect";
      }
      //Sinon
      else{
        //Ouverture de session + Affichage pour montrer à l'utilisateur qu'il est connecté
        session_start();
        $_SESSION['user'] = $donnees['user'];
        $_SESSION['mdp'] = $donnees['password'];
        if (isset($_SESSION['user']) AND isset($_SESSION['mdp'])){
            echo 'Vous êtes à présent connecté ' . '<strong>' . $_SESSION['user'] . '</strong>';
        }
      }
    }
  }
 ?>
