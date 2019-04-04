<?php
  try{
    $bdd = new PDO($dsn,$username,$password);
    $bdd->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
  }
  catch(Exception $e){
    die("Erreur : " . $e->getMessage());
  }
?>
