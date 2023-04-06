<?php
	include ('../../traitement/crud/crudFonctionSQL-cat.php');
    include ('../../traitement/crud/crudFonctionTable-cat.php');
	
	$action = $_POST["action"];
	if ($action == "DELETE") {
		$id_categories = $_POST["id_categories"];
	} else {
		$id_categories = $_POST["id_categories"];
		$nom_categories = $_POST["nom_categories"];
		$image_categories = $_FILES["image_categories"];
	}

	if(!empty($_FILES['image_categories']))
    {
        $name_file_cat = $_FILES['image_categories']['name'];
        $type_file_cat = $_FILES['image_categories']['type'];
        $size_file_cat = $_FILES['image_categories']['size'];
        $tmp_file_cat = $_FILES['image_categories']['tmp_name'];
        $error_file_cat = $_FILES['image_categories']['error'];

		$extensions_cat = ['png', 'jpg', 'jpeg', 'webp', 'jfif'];
        $type_cat = ['image/png', 'image/jpg', 'image/jpeg', 'image/webp', 'image/jfif'];
        $extension_cat = explode('.', $name_file_cat);
        $max_size_cat = 900000;
		$file_cat = uniqid() . '.' . strtolower(end($extension_cat));
        if(in_array($type_file_cat, $type_cat))
        {
            // On vérifie que il n'y a pas deux extensions
            if(count($extension_cat) <= 2 && in_array(strtolower(end($extension_cat)), $extensions_cat))
            {
                if($size_file_cat < $max_size_cat)
                {
                    // On bouge l'image uploadé dans le dossier upload
                    if(move_uploaded_file($tmp_file_cat, 'C:/wamp64/www/allosimplon/asset/img/categorie/'. $file_cat)) {
                        $image_categories = $file_cat;
                        echo "Upload réussi";
					}
                    else {
						echo "Upload échoué";
                        echo "<a href='../../form/crud-cat.php'>Liste des categories</a>";
                        die;
					}
                }
                else
                {
                    echo "Fichier trop lourd ou format incorrect<br>";
                    echo "<a href='../../form/crud-cat.php'>Liste des categories</a><br>";
                    die;
                }
            }
            else 
            {
                echo "Extension non autorisé<br>";
                echo "<a href='../../form/crud-cat.php'>Liste des categories</a><br>";
                die;
            }
        }
        else
        {
            echo "Type non autorisé<br>";
            echo "<a href='../../form/crud-cat.php'>Liste des categories</a><br>";
            die;
        }
    }
	
	if ($action == "CREATE") {
		createcat($nom_categories, $image_categories);
		echo "categorie créé <br>";
		echo "<a href='../../form/crud-cat.php'>Liste des categories</a>";
	}
	if ($action == "UPDATE") {
		updatecat($id_categories, $nom_categories, $image_categories);
		echo "categories mis à jour <br>";
		echo "<a href='../../form/crud-cat.php'>Liste des categories</a>";
	}
	if ($action == "DELETE") {
		deletecat($id_categories);
		echo "categories suprimé <br>";
		echo "<a href='../../form/crud-cat.php'>Liste des categories</a>";
	}
?>