<?php
session_start();

require_once ('content/bdd.php');

// Requête SQL pour sélectionner tous les films
$sql = "SELECT * FROM film";

// Exécution de la requête
$stmt = $pdo->query($sql);

// Récupération des résultats
$films = $stmt->fetchAll(PDO::FETCH_ASSOC);
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
    <link rel="shortcut icon" href="asset/img/AlloSimplonFav.png"/>
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
        <h2 class="bg-[#8666C6] text-center uppercase text-white text-2xl p-9">film</h2>
        <div class="px-10 md:px-20 mt-10">
            <div class="group inline">
                <a class="text-xl text-black hover:text-[#694AA6]" href="#">Filtre ▼</a>
                <ul class="absolute hidden text-gray-700 pt-1 group-hover:block shadow z-50">
                    <li class="">
                        <a class="bg-[#694AA6] text-[#FCFCFC] py-2 px-5 block">Catégories</a>
                    </li>
                    <?php 
                        echo "<li>";
                        foreach ($categories as $categorie) {
                            echo "<li><a class='bg-[#FCFCFC] hover:bg-gray-100 py-1 px-4 block' href='page-film.php?id=" . $categorie['id_categories'] . "'>" . $categorie['nom_categories'] . "</a></li>";
                        }
                        echo "</li>";
					?>
                </ul>
            </div>
        </div>
        <div class=" grid grid-cols-2 md:grid-cols-2 lg:grid-cols-4 my-10 md:gap-x-6 gap-x-3 px-10 md:px-20">
        <?php foreach ($films as $film): ?>
            <div class="mb-4">
                <div class="bg-[#8666C6] rounded-sm overflow-hidden">
                    <a href="<?php echo "film.php?id=" . $film['id_film'] . "'>" . $film['titre_film']; ?>">
                        <h3 class="text-['10px'] text-center p-2 md:p-4 text-sm md:text-xl text-white"><?php echo $film['titre_film']; ?></h3>
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