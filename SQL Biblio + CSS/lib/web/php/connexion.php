<?php
  require '../../../config/configuration.php';
 ?>
<html>
  <head>
    <title>Se connecter</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <label style="font-size:14px; font-family:calibri;">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href="../../../lib/styles/css/style.css">
  </head>
  <body>
    <header>
        <div class="topnav">
            <img class="logo" src="..\..\..\lib\styles\css\logo.png">
        </div>
    </header>
    <br/><br/><br/><br/><br/><br/><br/><br/>
    <form action="connexion.php" method="post">
      <input type="text" placeholder="Nom d'utilisateur" name="user" value=""/>
      <input type="password" placeholder="Mot de passe" name="mdp" value=""/>

      <input type="submit" name="connexion" value="Se connecter"/>
    </form>
  </body>
  <footer>
  </footer>
</html>
<?php
  /* Nous avons configuré l'insertion du nom d'utilisateur sensible à la cable, c'est à dire que l'utilisateur devra mettre correctement
  les majuscules et minuscules au bon endroit, chose qui n'était pas possible avec l'interclassement 'latin1_swedish_ci' pour le champ
  user, nous l'avons alors configuré en 'utf8_bin' qui lui, est sensible à la casse !! */

  //Connexion à la base de données
  try{
    $bdd = new PDO($dsn,$username,$password);
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
      $userinput = htmlentities($_POST['user']);
      $mdpinput = md5(htmlentities($_POST['mdp']));
      //Requete pour comparer User + Password que l'utilisateur a inséré et le User + Password de la base de données
      $requete = $bdd->prepare("SELECT * FROM user WHERE User = :User and Passwd = :Passwd");
      $requete->bindValue(':User', $userinput, PDO::PARAM_STR);
      $requete->bindValue(':Passwd', $mdpinput, PDO::PARAM_STR);
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
        $_SESSION['User'] = $donnees['User'];
        $_SESSION['Passwd'] = $donnees['Passwd'];
        $_SESSION['TypeGroup'] = $donnees['TypeGroup'];
        if (isset($_SESSION['User']) AND isset($_SESSION['Passwd'])){
            echo 'Vous êtes à présent connecté ' . '<strong>' . $_SESSION['User'] . '</strong>';
        }
        header('Location: ../../../index.php');
        exit;
      }
    }
  }
 ?>
