<?php
	include ('../traitement/crud/crudFonctionSQL-real.php');
    include ('../traitement/crud/crudFonctionTable-real.php');
	
	$id_realisateur = $_GET["id"];
	if ($id_realisateur == 0) {
		$realisateur = newRealisateur();
		$action = "CREATE";
		$libelle = "Creer";
	} else {
		$realisateur = readrealisateur($id_realisateur);
		if (isset($realisateur) && !empty($realisateur)) {
			$action = "UPDATE";
			$libelle = "Mettre a jour";
		}
	}
?>

<html>
<body>

	<form action="../traitement/crud/create-update-real.php" enctype="multipart/form-data" method="POST">
	<p>
		<a href="crud-real.php">Liste des utilisateurs</a>
		<input type="hidden" name="id_realisateur" value="<?php echo isset($realisateur['id_realisateur']) ? $realisateur['id_realisateur'] : ''; ?>"/>
		<input type="hidden" name="action" value="<?php echo $action; ?>"/>
		 <div>
        	<label for="nom_realisateur">Nom :</label>
        	<input type="text" id="nom_realisateur" name="nom_realisateur" value="<?php echo isset($realisateur['nom_realisateur']) ? $realisateur['nom_realisateur'] : ''; ?>">
	    </div>
		<div class="button">
			<button type="submit"><?php echo $libelle; ?></button>
		</div>
	</p>
	</form>
	<br>

	<?php if ($action!="CREATE") { ?>
	<form action="../traitement/crud/create-update-real.php" method="POST">
		<input type="hidden" name="action" value="DELETE"/>
		<input type="hidden" name="id_realisateur" value="<?php echo $realisateur['id_realisateur'];  ?>"/>
		<p>
		<div class="button">
			<button type="submit">Supprimer</button>
		</div>
		</p>

	</form>
	<?php } ?>

</body>
</html>