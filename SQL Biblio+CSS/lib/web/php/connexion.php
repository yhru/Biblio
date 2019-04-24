<?php
  //Si le champ du formulaire 'nom d'utilisateur' est vide :
  if(empty($_POST['user'])){
    echo '<div class="alert alert-danger"> "Veuillez saisir votre nom d\'utilisateur" </div><br/>';
  }
  //Sinon si le champ du formulaire 'mot de passe' est vide :
  else if (empty($_POST['mdp'])){
    echo '<div class="alert alert-danger"> "Veuillez saisir un mot de passe" </div><br/>';
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
      echo '<div class="alert alert-danger"> Mot de passe ou Nom d\'utilisateur incorrect </div><br/>';
    }
    //Sinon
    else{
      //Ouverture de session + Affichage pour montrer à l'utilisateur qu'il est connecté
      session_start();
      $_SESSION['User'] = $donnees['User'];
      $_SESSION['Passwd'] = $donnees['Passwd'];
      $_SESSION['TypeGroup'] = $donnees['TypeGroup'];
      if (isset($_SESSION['User']) AND isset($_SESSION['Passwd'])){
          //alert alert-success
          echo '<div class=""> Vous êtes à présent connecté <strong>'.$_SESSION['User'].'</strong></div><br/>';
      }
    }
  }
?>
