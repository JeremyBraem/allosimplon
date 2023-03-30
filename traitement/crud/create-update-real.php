<?php
	include ('../../traitement/crud/crudFonctionSQL-real.php');
    include ('../../traitement/crud/crudFonctionTable-real.php');
	
	$action = $_POST["action"];
	if ($action == "DELETE") {
		$id_realisateur = $_POST["id_realisateur"];
	} else {
		$id_realisateur = $_POST["id_realisateur"];
		$nom_realisateur = $_POST["nom_realisateur"];
	}

	
	if ($action == "CREATE") {
		createRealisateur($nom_realisateur);
		echo "realisateur créé <br>";
		echo "<a href='../../form/crud-real.php'>Liste des realisateurs</a>";
	}
	
	if ($action == "UPDATE") {
		updateRealisateur($id_realisateur, $nom_realisateur);
		echo "realisateur update <br>";
		echo "<a href='../../form/crud-real.php'>Liste des realisateurs</a>";
	}
	if ($action == "DELETE") {
		deleteRealisateur($id_realisateur);
		echo "realisateur delete <br>";
		echo "<a href='../../form/crud-real.php'>Liste des realisateurs</a>";
	}
?>