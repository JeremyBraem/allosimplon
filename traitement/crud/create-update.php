<?php
	include ('../../traitement/crud/crudFonctionSQL.php');
    include ('../../traitement/crud/crudFonctionTable.php');
	$action = $_GET["action"];

	if ($action == "DELETE") {
		$id_film = $_GET["id_film"];
	} else {
		$id_film = $_GET["id_film"];
		$titre_film = $_GET["titre_film"];
		$date_film = $_GET["date_film"];
		$synopsis_film = $_GET["synopsis_film"];
		$lien_film = $_GET["lien_film"];
        $image_film = $_GET["image_film"];
        $bande_annonce_film = $_GET["bande_annonce_film"];
	}
	
	if ($action == "CREATE") {
		createFilm($titre_film, $synopsis_film, $bande_annonce_film, $lien_film, $image_film, $date_film);
		echo "film créé <br>";
		echo "<a href='../../form/crud.php'>Liste des films</a>";
	}
	
	if ($action == "UPDATE") {
		updateFilm($id_film, $titre_film, $synopsis_film, $bande_annonce_film, $lien_film, $image_film, $date_film);
		echo "film update <br>";
		echo "<a href='../../form/crud.php'>Liste des films</a>";
	}
	if ($action == "DELETE") {
		deleteFilm($id_film);
		echo "film delete <br>";
		echo "<a href='../../form/crud.php'>Liste des films</a>";
	}
	
?>