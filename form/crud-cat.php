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
        include ('../traitement/crud/crudFonctionSQL-cat.php');
        include ('../traitement/crud/crudFonctionTable-cat.php');
        $rows = getAllcat();
        afficherTable($rows, getHeaderTable());
    ?>
    
    <a href=form-cat.php?id=0 >Ajouter une catégorie<br></a> 
    <a href=crud.php >Voir films<br></a>
    <a href=crud-real.php >Voir réalisateurs<br></a>
    <a href=crud-acteur.php >Voir acteurs</a>

    



</body>
</html>
