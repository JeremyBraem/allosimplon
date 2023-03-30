<?php
	include ('../traitement/crud/crudFonctionSQL-acteur.php');
    include ('../traitement/crud/crudFonctionTable-acteur.php');
	
	$id_acteur = $_GET["id"];
	if ($id_acteur == 0) {
		$acteur = newacteur();
		$action = "CREATE";
		$libelle = "Creer";
	} else {
		$acteur = readacteur($id_acteur);
		if (isset($acteur) && !empty($acteur)) {
			$action = "UPDATE";
			$libelle = "Mettre a jour";
		}
	}
?>

<html>
<body>

	<form action="../traitement/crud/create-update-acteur.php" enctype="multipart/form-data" method="POST">
	<p>
		<a href="crud.php">Liste des utilisateurs</a>
		<input type="hidden" name="id_acteur" value="<?php echo isset($acteur['id_acteur']) ? $acteur['id_acteur'] : ''; ?>"/>
		<input type="hidden" name="action" value="<?php echo $action; ?>"/>
		 <div>
        	<label for="nom_acteur">Nom :</label>
        	<input type="text" id="nom_acteur" name="nom_acteur" value="<?php echo isset($acteur['nom_acteur']) ? $acteur['nom_acteur'] : ''; ?>">
	    </div>
		<div class="button">
			<button type="submit"><?php echo $libelle; ?></button>
		</div>
	</p>
	</form>
	<br>

	<?php if ($action!="CREATE") { ?>
	<form action="../traitement/crud/create-update-acteur.php" method="POST">
		<input type="hidden" name="action" value="DELETE"/>
		<input type="hidden" name="id_acteur" value="<?php echo $acteur['id_acteur'];  ?>"/>
		<p>
		<div class="button">
			<button type="submit">Supprimer</button>
		</div>
		</p>

	</form>
	<?php } ?>

</body>
</html>