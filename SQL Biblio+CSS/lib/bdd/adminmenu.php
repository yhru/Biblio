<?php
  session_start();
  if ($_SESSION['TypeGroup'] == null || $_SESSION['TypeGroup'] == 2){
		header('Location: ../../index.php');
	}
?>
<!DOCTYPE html>
<html>
    <head>
        <title> Base de données </title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <label style="font-size:14px; font-family:calibri;">
        <link rel="stylesheet" type="text/css" href="../styles/css/style.css">
    </head>

    <body>
        <header>
            <div class="topnav">
                <img class="logo" src="../assets/images/logo.png">
            </div>
        </header>
        <br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/>
        <center>
          <a href = "addbookmenu.php"> Ajouter </a><br/>
          <a href = "editbookmenu.php"> Modifier </a><br/>
        </center>
    </body>
    <footer>
    </footer>
</html>
