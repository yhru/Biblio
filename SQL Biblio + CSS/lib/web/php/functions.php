<?php
function bookdisplay_function_result (&$donnees){
	echo '<img src="../../../lib/assets/images/coverpage/'.($donnees['CodeLivre']).'.jpg"/>'.'<br/>';
	echo $donnees['Title'] . "<br/>";
}

function bookdisplay_function_detail (&$donnees){
	echo '<img src="../../../lib/assets/images/coverpage/'.($donnees['CodeLivre']).'.jpg"/>'.'<br/>';
	echo $donnees['Title'] . "<br/><br />";
	echo $donnees['Author'] . "<br/><br />";
	echo $donnees['Editor'] . "<br/><br />";
	echo $donnees['PublicationYear'] . "<br/><b/><br/>";
	echo $donnees['Language'] . "<br/><br />";
  echo $donnees['Resum'] . "<br/><b/><br/>";
	echo $donnees['CodeKey'] . "<br/><b/><br/>";
}
?>
