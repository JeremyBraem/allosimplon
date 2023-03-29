<?php
session_start();

require_once ('content/bdd.php');

if (isset($_GET['id'])) {
    $id_categorie = $_GET['id'];
    $sql_film = "SELECT *
            FROM film
            INNER JOIN avoir ON avoir.id_film = film.id_film
            WHERE avoir.id_categories = :id_categorie";
    $stmt_film = $pdo->prepare($sql_film);
    $stmt_film->bindParam(':id_categorie', $id_categorie);
    $stmt_film->execute();
    $films = $stmt_film->fetchAll(PDO::FETCH_ASSOC);
}
else {
    header('location:page-all-film.php');
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="asset/style/reset.css" rel="stylesheet">
    <link href="asset/style/font.css" rel="stylesheet">
    <link href="asset/style/swiper.css" rel="stylesheet">
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="shortcut icon" href=""/>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Roboto&family=Source+Code+Pro&display=swap" rel="stylesheet">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/flowbite/1.6.4/flowbite.min.js"></script>
    <script src="https://unpkg.com/tailwindcss-jit-cdn"></script>
    <title>AlloSimplon</title>
</head>
<body class="bg-[#FCFCFC]">
    <?php
        include ('content/navbar.php');
    ?>
    <section>
        <?php 
        if (isset($_GET['id'])) {
            $id_categorie = $_GET['id'];
            // Ajouter une requête pour récupérer le nom de la catégorie
            $sql_cat = "SELECT nom_categories FROM categories WHERE id_categories = :id_categorie";
            $stmt_cat = $pdo->prepare($sql_cat);
            $stmt_cat->bindParam(':id_categorie', $id_categorie);
            $stmt_cat->execute();
            $categorie = $stmt_cat->fetch(PDO::FETCH_ASSOC);
            // Vérifier si la catégorie existe
            if ($categorie) {
                $nom_categorie = $categorie['nom_categories'];
                // Afficher le nom de la catégorie dans une zone d'en-tête
                echo "<h2 class='bg-[#8666C6] text-center uppercase text-white text-2xl p-9'>film : $nom_categorie</h2>";
            }
        }?>
        </h2>
        <div class=" grid grid-cols-2 md:grid-cols-2 lg:grid-cols-4 my-10 md:gap-x-6 gap-x-3 px-10 md:px-20">
        <?php foreach ($films as $film): ?>
            <div class="mb-4">
                <div class="bg-[#8666C6] rounded-sm overflow-hidden">
                    <a href="<?php echo "film.php?id=" . $film['id_film'] . "'>" . $film['titre_film']; ?>">
                        <h3 class="text-xl text-center p-2 md:p-4 text-[16px] md:text-xl text-white"><?php echo $film['titre_film']; ?></h3>
                        <img src="asset/img/affiche/<?php echo $film['image_film'];?>" class="rounded-b h-44 md:h-96">
                    </a>
                </div>
                <div class="flex place-content-around pt-1">
                    <img src="asset/img/unlike.png" class="h-5 md:w-5">
                </div>
            </div>
            <?php endforeach ?>
        </div>
    </section>
    <?php
        include ('content/footer.php');
    ?>
</body>
</html>