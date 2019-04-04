<!DOCTYPE html>
<?php
  require '../../../config/configuration.php';
 ?>
<html>
    <head>
        <title> index.html </title>
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
      <div class="container">
        <form name="inscription" class="form-search" method="POST" action="">
          <div class="form-group">
            <label for="Username"> Nom d'utilisateur : </label>
            <input type="text" id="username" name="username" minlength="5"required>
            <!--<center><label> (5 caractères minimum) </label></center>-->
          </div>

          <div class="form-group">
            <label for="Password"> Mot de passe : </label>
            <input type="password" id="password" name="password" minlength="1"required>
            <!--<center><label> (6 caractères minimum) </label></center>-->
          </div>

          <div class="form-group">
            <label for="PasswordConfirmed"> Confirmer votre mot de passe : </label>
            <input type="password" id="passwordconfirmed" name="passwordconfirmed" minlength="1"required>
          </div>

          <div class="form-group">
            <label> Votre adresse email : </label>
            <input type="email" id="mail" name="mail" minlength="1"required>
          </div>

          <div class="form-group">
            <label> Confirmez votre adresse email : </label>
            <input type="email" id="mail" name="mailconfirmed" minlength="1"required>
          </div>

          <button type="submit" name="inscription" class="btn btn-primary"> Valider </button>
        </form>
      </div>
    <br/>

    <?php
    //On défini une variable appelé $validregistration comme étant 'true', cette variable est utilisée plus bas
    $validregistration = true;

    //Si on clique sur le bouton 'Valider'
    if (isset($_POST['inscription'])){
      //On stocke toutes les données insérées par l'utilisateur dans des variables
      $user_registered = htmlentities($_POST['username']);
      $pw = $_POST['password'];
      $pwconfirmed = htmlentities($_POST['passwordconfirmed']);
      $mail = $_POST['mail'];
      $mailconfirmed = htmlentities($_POST['mailconfirmed']);

      //Si mdp = mdp confirmé et si mail = mail confirmé
      if($pw == $pwconfirmed && $mail == $mailconfirmed){
        //Connexion à la BDD via un try / catch, + gestion d'erreur PDO et PHP
        try{
          $bdd = new PDO($dsn,$username,$password);
          $bdd->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        }
        catch(Exception $e){
          die("Erreur : " . $e->getMessage());
        }

        //Via cette requete, on vérifie si le nom d'utilisateur est déja présent dans la BDD
        $requete_user = "SELECT User FROM user WHERE User = '$user_registered'";
        $retour = $bdd->query($requete_user);
        while($donnees = $retour->fetch()){
          $validregistration = false;
          echo 'Ce nom d\'utilisateur existe déjà.'.'<br/>';
        }

        //Via cette autre requete, on vérifie si l'adresse mail est déja présente dans la BDD
        $requete_mail = "SELECT Mail FROM user WHERE Mail = '$mail'";
        $retour = $bdd->query($requete_mail);
        while($donnees = $retour->fetch()){
          $validregistration = false;
          echo 'Cette adresse mail existe déjà.'.'<br/>';
        }

        //Si toutes les informations ne rencontrent aucune restrictions ($validregistration == true)
        if($validregistration){
          echo 'Vous êtes inscrit';
          //Le mot de passe du nouvel utilisateur est crypté avant l'envoi dans la base de données
          $pwconfirmed = md5($pwconfirmed);
          //Date de création du compte
          $account_creation_date = date_default_timezone_set('Europe/Paris'); $account_creation_date = date('Y-m-d H:i:s');
          //Requete SQL permettant d'ajouter le nouvel utilisateur dans la BDD
        	$requete = $bdd->prepare('INSERT INTO user(User, Passwd, Mail, RegistrationDate, TypeGroup) VALUES(:User, :Passwd, :Mail, :RegistrationDate, :TypeGroup)');
        	//Exécute de la requete dans la base de données phpmyadmin : ajout de l'utilisateur validé !
        	$requete->execute(array(
        		'User' => $user_registered,
        		'Passwd' => $pwconfirmed,
        		'Mail' => $mailconfirmed,
        		'RegistrationDate' => $account_creation_date,
            'TypeGroup' => 2
        	));

          //Le nouvel utilisateur est ajouté, retour à la page index.php
          //header('Location: ../../../index.php');
          exit;
       }
      }
      else{
        if($pw != $pwconfirmed && $mail != $mailconfirmed){
          echo 'La confirmation de votre mot de passe et de votre adresse mail est incorrect';
        }
        elseif($pw <> $pwconfirmed){
          echo 'Les mot de passes insérées ne sont pas identiques';
        }
        elseif($mail <> $mailconfirmed){
          echo 'Les adresses mails insérées ne sont pas identiques';
        }
      }
    }
    ?>
    </body>
    <footer>
    </footer>
</html>
