<?php

	include ('../../traitement/crud/crudFonctionSQL.php');
    include ('../../traitement/crud/crudFonctionTable.php');
	
	$action = $_POST["action"];
	if ($action == "DELETE") {
		$id_film = $_POST["id_film"];
	} else {
		$id_film = $_POST["id_film"];
		$titre_film = $_POST["titre_film"];
		$date_film = $_POST["date_film"];
		$synopsis_film = $_POST["synopsis_film"];
		$lien_film = $_POST["lien_film"];
        $image_film = $_FILES["image_film"]["name"];
        $bande_annonce_film = $_POST["bande_annonce_film"];
	}

    if(!empty($_FILES['image_film']))
    {
        $name_file = $_FILES['image_film']['name'];
        $type_file = $_FILES['image_film']['type'];
        $size_file = $_FILES['image_film']['size'];
        $tmp_file = $_FILES['image_film']['tmp_name'];
        $error_file = $_FILES['image_film']['error'];

		$extensions = ['png', 'jpg', 'jpeg', 'webp', 'jfif'];
        $type = ['image/png', 'image/jpg', 'image/jpeg', 'image/webp', 'image/jfif'];
        $extension = explode('.', $name_file);
        $max_size = 500000;
		$file = uniqid() . '.' . strtolower(end($extension));
        if(in_array($type_file, $type))
        {
            // On vérifie que il n'y a pas deux extensions
            if(count($extension) <= 2 && in_array(strtolower(end($extension)), $extensions))
            {
                if($size_file < $max_size)
                {
                    // On bouge l'image uploadé dans le dossier upload
                    if(move_uploaded_file($tmp_file, 'C:/wamp64/www/allosimplon/asset/img/affiche/'. $file)) {
                        $image_film = $file;
                        echo "Upload réussi";
					}
                    else {
						echo "Upload échoué";
					}
                }
                else
                {
                    echo "Fichier trop lourd ou format incorrect";
                }
            }
            else 
            {
                echo "Extension non autorisé";
            }
        }   
        else 
        {
            echo "Type non autorisé";
        }
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