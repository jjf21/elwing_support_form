<?php

	$nom = htmlspecialchars($_POST["nom"]);
	//$prenom = htmlspecialchars($_POST["prenom"]);
	//$Adresse = htmlspecialchars($_POST["Adresse"]);
	//$Remarques = htmlspecialchars($_POST["Remarques"]);
	

	echo 'Bonjour ' . $nom . ', vous allez être redirigé vers notre plateforme de SAV <br>' ;
	echo '<br>';
	echo 'Cordialement, <br>';
	echo ' l équipe ELWING';

	// 1 : on ouvre le fichier
	$monfichier = fopen('donneesformulaire.xls', 'a+'); 
	fputs($monfichier, $nom."\n"); 
	//fputs($monfichier, $prenom."\n"); 
	//fputs($monfichier, $Adresse."\n"); 
	//fputs($monfichier, $Remarques."\n"); 

	// 3 : quand on a fini de l'utiliser, on ferme le fichier
	fclose($monfichier);


?>