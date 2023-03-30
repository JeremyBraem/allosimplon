<?php
	include ('../traitement/crud/crudFonctionSQL-cat.php');
    include ('../traitement/crud/crudFonctionTable-cat.php');
	
	$id_categories = $_GET["id"];
	if ($id_categories == 0) {
		$categories = newcat();
		$action = "CREATE";
		$libelle = "Creer";
	} else {
		$categories = readcat($id_categories);
		if (isset($categories) && !empty($categories)) {
			$action = "UPDATE";
			$libelle = "Mettre a jour";
		}
	}
?>

<html>
<body>

	<form action="../traitement/crud/create-update-cat.php" enctype="multipart/form-data" method="POST">
	<p>
		<a href="crud.php">Liste des utilisateurs</a>
		<input type="hidden" name="id_categories" value="<?php echo isset($categories['id_categories']) ? $categories['id_categories'] : ''; ?>"/>
		<input type="hidden" name="action" value="<?php echo $action; ?>"/>
		 <div>
        	<label for="nom_categories">Nom :</label>
        	<input type="text" id="nom_categories" name="nom_categories" value="<?php echo isset($categories['nom_categories']) ? $categories['nom_categories'] : ''; ?>">
	    </div>
		<div class="button">
			<button type="submit"><?php echo $libelle; ?></button>
		</div>
	</p>
	</form>
	<br>

	<?php if ($action!="CREATE") { ?>
	<form action="../traitement/crud/create-update-cat.php" method="POST">
		<input type="hidden" name="action" value="DELETE"/>
		<input type="hidden" name="id_categories" value="<?php echo $categories['id_categories'];  ?>"/>
		<p>
		<div class="button">
			<button type="submit">Supprimer</button>
		</div>
		</p>

	</form>
	<?php } ?>

</body>
</html>