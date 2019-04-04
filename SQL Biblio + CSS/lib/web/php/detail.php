<?php
  require '../../../config/configuration.php';
 ?>
<html>
  <head>
    <title>Detail du livre</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="../../../lib/styles/css/style.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
  </head>
  <div class="container">
    <h1> Detail du livre </h1><br/>
    <?php
    if (isset($_GET['booksearch'])){
      $detail = 1;
      $CodeLivre = $_GET['booksearch'];
    }
    else{
      $detail = 2;
      $CodeLivre = $_GET['bookfilter'];
    }

    include('functions.php');

    try{
      $bdd = new PDO($dsn,$username,$password);
    }
    catch(Exception $e){
      die("Erreur : " . $e->getMessage());
    }

    $requete = "SELECT * FROM book,author,keyword WHERE book.IdAuthor = author.IdAuthor AND book.IdKeyWord = keyword.IdKeyWord AND IdBook = '$CodeLivre'";
    $retour = $bdd->query($requete);
    while($donnees = $retour->fetch()){
      bookdisplay_function_detail($donnees);
    }
    ?>

    <?php
      //On inclut + éxécute les fichiers message.php et storymessages.php afin d'appliquer les fonctions de ces 2 classes
      require_once 'class/message.php';
      $Comments;
      //On déclare une variable $error et on l'initialise comme étant null, cette variable sera utilisé plus tard si on a une erreur de saisie
      $error = null;
      //On déclare une variable $success et on l'initialise comme étant false, elle sera = true si elle passe les conditions de saisies
      $success = false;
      //Si l'utilisateur a mis un pseudo et un message
      if(isset($_POST['Username'], $_POST['Comment'])){
        //On crée un nouveau message comportant en paramètre le pseudo et le message, ce message est stocké dans $Comment
        $Comment = new Commentary($_POST['Username'], $_POST['Comment']);
        //Si $Comment respecte les conditions de saisies
        if($Comment->CheckValidBoolean()){
          $success = true;

          if(isset($_POST['Comment'])){
            //Récupération des données dans les variables suivantes
            $Username = $_POST['Username'];
            $Date = date('Y-m-d');
            $Heure = date_default_timezone_set('Europe/Paris'); $Heure = date('H:i:s');
            $Comment = $_POST['Comment'];

            //Requete SQL afin d'ajouter les données
            $requete = $bdd->prepare('INSERT INTO comment(Username, Day, Hour, Comment, IdBook) VALUES(:Username, :Day, :Hour, :Comment, :IdBook)');
            //Ajout d'un commentaire au livre correspondant dans la base de données (Table : "comment") :
            $requete->execute(array(
              ':Username' => $Username,
              ':Day' => $Date,
              ':Hour' => $Heure,
              ':Comment' => $Comment,
              ':IdBook' => $CodeLivre
            ));
          }
          //Cette ligne de code permet de vider le champ de recherche (donc on y voit de nouveau le placeholder de chaque champ)
          $_POST = array();
        }
        else{
          //Si $Comment ne respecte pas les conditions de saisies, on va alors appliqué la fonction GetErrorsCommentary sur $Comment qui sera stocké dans $error
          $error = $Comment->GetErrorsCommentary();
          $_POST = array();
        }
      }
    ?>

    <!-- Liste des commentaires du plus ancien au plus récent -->
    <br/><h1 class ="messages"> Commentaires </h1><br/>

    <!-- Si y a une erreur -->
    <?php if(!empty($error)): ?>
    <div class="alert alert-danger">
    <!--Il affiche ceci -->
      Formulaire invalide
    </div>
    <?php endif ?>

    <!-- Si la saisie est valide -->
    <?php if($success): ?>
    <div class="alert alert-success">
      <!-- Il affichera alors ceci -->
      Votre message a été correctement enregistré et apparaitra dans les commentaires
    </div>
    <?php endif ?>

    <!-- Un formulaire composé du pseudo et du message -->
    <form action="" method="post">
      <div class="form-group">
        <!--Si il y a il y a une erreur dans le username, il rajoutera 'is-invalid' à ma classe sinon il ne rajoute rien -->
        <input name="Username" placeholder="Votre pseudo" type="text" class="form-control <?= isset($error['Username']) ? 'is-invalid' : '' ?>">
        <!-- Si il y a une erreur au niveau du Pseudo (qui est trop court) -->
        <?php if(isset($error['Username'])): ?>
          <!-- Il affichera alors comme quoi que le pseudo est trop court -->
          <div class="invalid-feedback"> <?= $error['Username'] ?></div>
        <?php endif ?>
      </div>
      <div class="form-group">
        <!--Si il y a il y a une erreur dans le commentaire, il rajoutera 'is-invalid' à ma classe sinon il ne rajoute rien -->
        <textarea name="Comment" placeholder="Votre avis sur ce livre !" class="form-control <?= isset($error['Comment']) ? 'is-invalid' : '' ?>"><?= htmlentities($_POST['Comment'] ?? '') ?></textarea>
        <!-- Si il y a une erreur au niveau du message (qui est trop court) -->
        <?php if(isset($error['Comment'])): ?>
          <!-- Il affiche alors comme quoi que le message est trop court -->
          <div class="invalid-feedback"> <?= $error['Comment'] ?></div>
        <?php endif ?>
      </div>
      <!-- Le bouton de submit du commentaire -->
      <button class="btn btn-primary">Partager</button>
    </form>

    <?php
      $requete = "SELECT Username, Day, Hour, Comment FROM book,comment WHERE book.IdBook = comment.IdBook AND book.IdBook = '$CodeLivre' ORDER BY Day DESC, Hour DESC";
      $retour = $bdd->query($requete);
      while($donnees = $retour->fetch()){
        bookdisplay_function_comment($donnees);
      }
    ?>
  <br/><br/><center><a href = "../../../index.php"> Retourner à l'acceuil </a></center><br/><br/>
</div>
</html>
