<?php
	include ('../../traitement/crud/crudFonctionSQL-acteur.php');
    include ('../../traitement/crud/crudFonctionTable-acteur.php');
	
	$action = $_POST["action"];
	if ($action == "DELETE") {
		$id_acteur = $_POST["id_acteur"];
	} else {
		$id_acteur = $_POST["id_acteur"];
		$nom_acteur = $_POST["nom_acteur"];
	}

	
	if ($action == "CREATE") {
		createActeur($nom_acteur);
		echo "acteur créé <br>";
		echo "<a href='../../form/crud-acteur.php'>Liste des acteurs</a>";
	}
	
	if ($action == "UPDATE") {
		updateActeur($id_acteur, $nom_acteur);
		echo "acteur mis à jour <br>";
		echo "<a href='../../form/crud-acteur.php'>Liste des acteurs</a>";
	}
	if ($action == "DELETE") {
		deleteActeur($id_acteur);
		echo "acteur suprimé <br>";
		echo "<a href='../../form/crud-acteur.php'>Liste des acteurs</a>";
	}
?>