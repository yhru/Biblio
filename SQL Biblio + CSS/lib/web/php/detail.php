<html>
  <head>
    <title> result.php </title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <label style="font-size:22px; font-family:calibri;">
    <link rel="stylesheet" type="text/css" href="../../../lib/styles/css/style.css">
  </head>
  <?php
    $detail = 0;
   ?>
<a href="result.php?detail='.$detail.'">Retourner à la page précédente</a><br/><br/>
</html>
<?php
  $answer = $_GET['livre'];
  include('functions.php');
  $_POST['recherche'] = NULL;
  $bdd = new PDO("mysql:host=127.0.0.1;dbname=data;charset=utf8","root","");
  $requete = "SELECT* FROM livre WHERE CodeLivre = '$answer'";
  $retour = $bdd->query($requete);
  while($donnees = $retour->fetch()){
    bookdisplay_function_detail($donnees);
  }
?>
