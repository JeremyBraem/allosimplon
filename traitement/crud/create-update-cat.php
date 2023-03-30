<?php
	include ('../../traitement/crud/crudFonctionSQL-cat.php');
    include ('../../traitement/crud/crudFonctionTable-cat.php');
	
	$action = $_POST["action"];
	if ($action == "DELETE") {
		$id_categories = $_POST["id_categories"];
	} else {
		$id_categories = $_POST["id_categories"];
		$nom_categories = $_POST["nom_categories"];
	}
	
	if ($action == "CREATE") {
		createcat($nom_categories);
		echo "categorie créé <br>";
		echo "<a href='../../form/crud-cat.php'>Liste des categories</a>";
	}
	
	if ($action == "UPDATE") {
		updatecat($id_categories, $nom_categories);
		echo "categories mis à jour <br>";
		echo "<a href='../../form/crud-cat.php'>Liste des categories</a>";
	}
	if ($action == "DELETE") {
		deletecat($id_categories);
		echo "categories suprimé <br>";
		echo "<a href='../../form/crud-cat.php'>Liste des categories</a>";
	}
?>