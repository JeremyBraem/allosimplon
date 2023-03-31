<?php
session_start();

require_once ('content/bdd.php');

// Requête SQL pour sélectionner tous les films
$sql = "SELECT * FROM film";
$sqlCat = "SELECT * FROM categories";

// Exécution de la requête
$stmt = $pdo->query($sql);
$stmtCat = $pdo->query($sqlCat);

// Récupération des résultats
$results = $stmt->fetchAll(PDO::FETCH_ASSOC);
$resultsCat = $stmtCat->fetchAll(PDO::FETCH_ASSOC);

?>
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="asset/style/reset.css" rel="stylesheet">
    <link href="asset/style/font.css" rel="stylesheet">
    <script src="https://cdn.tailwindcss.com"></script>
    <script src="https://cdn.tailwindcss.com?plugins=forms,typography,aspect-ratio,line-clamp"></script>
    <script src="https://cdn.jsdelivr.net/npm/swiper@9/swiper-element-bundle.min.js"></script>
    <link rel="shortcut icon" href="asset/img/AlloSimplonFav.png"/>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Roboto&family=Source+Code+Pro&display=swap" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/swiper@9/swiper-element-bundle.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/flowbite/1.6.4/flowbite.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/simple-parallax-js@5.5.1/dist/simpleParallax.min.js"></script>
    <title>AlloSimplon</title>
</head>
<body class="bg-[#FCFCFC]">
    <?php
        include ('content/navbar.php');
    ?>
    <!-- Slider -->
    <div id="controls-carousel" class="relative w-full" data-carousel="static">
        <div class="relative h-32 overflow-hidden md:h-48 lg:h-96">
            <!-- Item 1 -->
            <div class="duration-700 ease-in-out" data-carousel-item>
                <img src="asset/img/film-forum.webp" class="absolute block w-full -translate-x-1/2 -translate-y-1/2 top-1/2 left-1/2" alt="...">
            </div>
            <!-- Item 2 -->
            <div class="duration-700 ease-in-out" data-carousel-item="active">
                <img src="asset/img/film-forum.webp" class="absolute block w-full -translate-x-1/2 -translate-y-1/2 top-1/2 left-1/2" alt="...">
            </div>
            <!-- Item 3 -->
            <div class=" duration-700 ease-in-out" data-carousel-item>
                <img src="asset/img/film-forum.webp" class="absolute block w-full -translate-x-1/2 -translate-y-1/2 top-1/2 left-1/2" alt="...">
            </div>
        </div>
        <!-- Slider controls -->
        <button type="button" class="absolute top-0 left-0 z-30 flex items-center justify-center h-full px-4 cursor-pointer group focus:outline-none" data-carousel-prev>
            <span class="inline-flex items-center justify-center w-10 h-10 rounded-full bg-white/30 dark:bg-gray-800/30 group-hover:bg-white/50 dark:group-hover:bg-gray-800/60 group-focus:ring-4 group-focus:ring-white dark:group-focus:ring-gray-800/70 group-focus:outline-none">
                <svg aria-hidden="true" class="w-6 h-6 text-white dark:text-gray-800" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7"></path></svg>
                <span class="sr-only">Previous</span>
            </span>
        </button>
        <button type="button" class="absolute top-0 right-0 z-30 flex items-center justify-center h-full px-4 cursor-pointer group focus:outline-none" data-carousel-next>
            <span class="inline-flex items-center justify-center w-10 h-10 rounded-full bg-white/30 dark:bg-gray-800/30 group-hover:bg-white/50 dark:group-hover:bg-gray-800/60 group-focus:ring-4 group-focus:ring-white dark:group-focus:ring-gray-800/70 group-focus:outline-none">
                <svg aria-hidden="true" class="w-6 h-6 text-white dark:text-gray-800" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"></path></svg>
                <span class="sr-only">Next</span>
            </span>
        </button>
    </div>
    <!-- Contenu -->
    <section>
        <h2 class="bg-[#8666C6] text-center uppercase text-white text-2xl p-9">à la une</h2>
        <div class="relative grid grid-cols-2 md:grid-cols-2 lg:grid-cols-4 mt-10 md:mt-20 md:gap-x-6 gap-x-3 px-10 md:px-20">
            <?php foreach ($results as $row): ?>
            <div class="mb-4">
                <div class="bg-[#8666C6] rounded-sm overflow-hidden">
                    <a href="<?php echo "film.php?id=" . $row['id_film'] . "'>" . $row['titre_film']; ?>">
                        <h3 class="text-xl text-center py-2 md:p-4 md:text-xl text-white"><?php echo $row['titre_film']; ?></h3>
                        <img src="asset/img/affiche/<?php echo $row['image_film']; ?>" class="rounded-b h-44 md:h-96">
                    </a>
                </div>
                <div class="flex place-content-around pt-1">
                    <img src="asset/img/unlike.png" class="h-5 md:w-5">
                </div>
            </div>
            <?php endforeach ?>
        </div>
    </section>
    <section class="mb-10">
        <h2 class="bg-[#FCFCFC] text-center uppercase bold text-[#8666C6] text-2xl font-semibold py-6 md:py-8">TOP 10</h2>
        <div class="flex items-center justify-center">
            <div class="w-full relative flex items-center justify-center px-10 md:px-16">
                <div class="mx-auto overflow-x-hidden overflow-y-hidden">    
                    <div id="slider" class="h-full flex lg:gap-8 md:gap-6 gap-14 items-center justify-start transition ease-out duration-700">
                    <?php foreach ($results as $row): ?>

                        <div class="flex flex-shrink-0 flex-col relative w-full sm:w-auto">
                            <a href="<?php echo "film.php?id=" . $row['id_film'] . "'>" . $row['titre_film']; ?>">
                                <h2 class="lg:text-xl leading-4 text-base lg:leading-5 text-white bg-[#8666C6] p-4 text-center"><?php echo $row['titre_film']; ?></h2>
                                <div class="">
                                    <img src="asset/img/affiche/<?php echo $row['image_film']; ?>" class="rounded-b w-full md:h-96">
                                </div>
                            </a>
                            <div class="flex place-content-around pt-1">
                                <img src="asset/img/unlike.png" class="h-5 md:w-5">
                            </div>
                        </div>
                        <?php endforeach ?>

                    </div>
                    
                </div>
            </div>
            <button aria-label="slide backward" class="absolute z-30 left-0 pl-3 md:pl-7 cursor-pointer" id="prev">
                <svg class="" height="25" viewBox="0 0 8 14" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path d="M7 1L1 7L7 13" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                </svg>
            </button>
            <button aria-label="slide forward" class="absolute z-30 right-0 pr-3 md:pr-7 cursor-pointer" id="next">
                <svg class="0" height="25" viewBox="0 0 8 14" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path d="M1 1L7 7L1 13" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                </svg>
            </button>
        </div>
    </section>
    <section>
        <img class="thumbnail-1 md:my-10" src="asset/img/parallax-1.png" alt="image">
        <img class="thumbnail-2 my-10" src="asset/img/parallax-2.png" alt="image">
    </section>
    <section class="px-10 bg-[#8666C6] md:hidden pb-10">
        <h2 class=" text-center uppercase text-white text-2xl pt-10">Catégories</h2>
        <swiper-container class="mySwiper" slides-per-view="1" space-between="30">
        <?php foreach ($resultsCat as $rowCat): ?>
            <swiper-slide >
                <div class="mb-4 my-8">
                    <div class="bg-[#FCFCFC] rounded-sm overflow-hidden h-44 w-60">
                        <a href="<?php echo "page-film.php?id=" . $rowCat['id_categories'] . "'>" . $rowCat['nom_categories']; ?>">
                            <h3 class="text-xl text-center py-2 md:p-4 md:text-xl text-black"><?php echo $rowCat['nom_categories']; ?></h3>
                            <img src="asset/img/categorie/<?php echo $rowCat['image_categories']; ?>" class="rounded-sm-b">
                        </a>
                    </div>
                </div>
            </swiper-slide>
            <?php endforeach ?>
        </swiper-container>
    </section>
    <section class="hidden md:block px-10 bg-[#8666C6]">
        <h2 class=" text-center uppercase text-white text-2xl pt-10">Catégories</h2>
        <swiper-container class="mySwiper p-10" slides-per-view="4"  space-between="30">
        <?php foreach ($resultsCat as $rowCat): ?>
            <swiper-slide >
                <div class="mb-4 w-fit">
                    <div class="bg-[#FCFCFC] rounded-sm overflow-hidden ">
                        <a href="<?php echo "page-film.php?id=" . $rowCat['id_categories'] . "'>" . $rowCat['nom_categories']; ?>">
                            <h3 class="text-xl text-center py-2 md:p-4 md:text-xl text-black"><?php echo $rowCat['nom_categories']; ?></h3>
                            <img src="asset/img/categorie/<?php echo $rowCat['image_categories']; ?>" class="rounded-sm-b h-44 md:h-36 md:w-60">
                        </a>
                    </div>
                </div>
            </swiper-slide>
            <?php endforeach ?>
        </swiper-container>
    </section>
    <?php
        include ('content/footer.php');
    ?>
    <script src="asset/js/swiper.js"></script>
    <script src="asset/js/parallax-1.js"></script>
    <script src="asset/js/parallax-2.js"></script>

</body>
</html>