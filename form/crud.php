<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="asset/style/reset.css" rel="stylesheet">
    <link href="asset/style/font.css" rel="stylesheet">
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Roboto&family=Source+Code+Pro&display=swap" rel="stylesheet">
    <title>AlloSimplon</title>
</head>
<body>
    <?php
        include ('../traitement/crud/crudFonctionSQL.php');
        include ('../traitement/crud/crudFonctionTable.php');
        $rows = getAllFilms();
        afficherTable($rows, getHeaderTable());
    ?>
    
    <a href=form-film.php?id=0 >ajouter un film<br></a> 
    <a href=crud-real.php>Voir réalisateurs<br></a> 
    <a href=crud-acteur.php>Voir acteur<br></a>
    <a href=crud-cat.php>Voir catégories<br></a>
    <a href=link_acteur.php>Ajouter un acteur à un film<br></a>
    <a href=link_real.php>Ajouter un réalisateur à un film<br></a>
    <a href=link_cat.php>Ajouter une categorie à un film<br></a>

</body>
</html>
