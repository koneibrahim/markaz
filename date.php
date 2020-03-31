<?php
	// Enregistrons les informations de date dans des variables

	$jour = date('d');
	$mois = date('m');
	$annee = date('Y');

	$heure = date('H');
	$minute = date('i');
	// Si l'heure est plus grand que 18h Affiche Bonsoir
	if ($heure >=18){
	// Maintenant on peut afficher ce qu'on a recueilli
	echo '<h3> Bonsoir Aujourd\'hui le ' . $jour . '/' . $mois . '/' . $annee . 
	'et il est'   . $heure. ' H ' . $minute. ' Min</h3>';
	}
	else{
	// Maintenant on peut afficher ce qu'on a recueilli
	echo '<h3> Bonjour Aujourd\'hui le ' . $jour . '/' . $mois . '/' . $annee . 
	'et il est'   . $heure. ' H ' . $minute. ' Min</h3>';
 	}
?>


