<?php
	include ('../traitement/crud/crudFonctionSQL.php');
    include ('../traitement/crud/crudFonctionTable.php');
	
	$id_film = $_GET["id"];
	if ($id_film == 0) {
		$film = newFilm();
		$action = "CREATE";
		$libelle = "Creer";
	} else {
		$film = readFilm($id_film);
		if (isset($film) && !empty($film)) {
			$action = "UPDATE";
			$libelle = "Mettre a jour";
		}
	}
?>
<!DOCTYPE html>
<html lang="en">
<body class="bg-[#FCFCFC]">
	<form action="../traitement/crud/create-update.php" enctype="multipart/form-data" method="POST">
	<p>
		<a href="crud.php">Liste des films</a>
		<input type="hidden" name="id_film" value="<?php echo isset($film['id_film']) ? $film['id_film'] : ''; ?>" required/>
		<input type="hidden" name="action" value="<?php echo $action; ?>"/>
		 <div>
        	<label for="titre_film">titre :</label>
        	<input type="text" id="titre_film" name="titre_film" value="<?php echo isset($film['titre_film']) ? $film['titre_film'] : ''; ?>" required>
	    </div>
	    <div>
	        <label for="synopsis_film">synopsis :</label>
	        <input type="text" id="synopsis_film" name="synopsis_film" value="<?php echo isset($film['synopsis_film']) ? $film['synopsis_film'] : '';  ?>" required></input>
	    </div>
	    <div>
	        <label for="date_film">date :</label>
	        <input type="text" id="date_film" name="date_film" value="<?php echo isset($film['date_film']) ? $film['date_film'] : '';  ?>" required></input>
	    </div>
		<div>
			<label for="image_film">image :</label>
			<input type="file" id="image_film" name="image_film" accept=".jpg, .jpeg, .png, .webp, .jfif" value="<?php echo isset($film['image_film']) ? $film['image_film'] : ''; ?>">
		</div>
        <div>
	        <label for="lien_film">lien :</label>
	        <input id="lien_film" name="lien_film" value="<?php echo isset($film['lien_film']) ? $film['lien_film'] : '';  ?>" required></input>
		</div>
        <div>
	        <label for="bande_annonce_film">bande annonce :</label>
	        <input id="bande_annonce_film" name="bande_annonce_film" value="<?php echo isset($film['bande_annonce_film']) ? $film['bande_annonce_film'] : '';  ?>" required></input>
	    </div>
		<div class="button">
			<button type="submit"><?php echo $libelle; ?></button>
		</div>
	</p>
	</form>
	<br>

	<?php if ($action!="CREATE") { ?>
	<form action="../traitement/crud/create-update.php" method="POST">
		<input type="hidden" name="action" value="DELETE"/>
		<input type="hidden" name="id_film" value="<?php echo $film['id_film'];  ?>"/>
		<p>
		<div class="button">
			<button type="submit">Supprimer</button>
		</div>
		</p>
	</form>
	<?php } ?>
</body>
</html>