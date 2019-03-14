<?php
function bookdisplay_function (&$donnees){
	echo '<img src="../../../lib/assets/images/coverpage/'.($donnees['CodeLivre']).'.jpg"/>'.'<br/>'; 
	echo $donnees['Title'] . "<br/><br />";
	echo $donnees['Author'] . "<br/><br />";
	echo $donnees['Editor'] . "<br/><br />";
	echo $donnees['Language'] . "<br/><br />";
    echo $donnees['Resum'] . "<br/><br /><br /><br />";
}
?>