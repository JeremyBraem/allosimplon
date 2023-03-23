<?php
session_start(); // Démarrer la session
require_once ('content/bdd.php');

$sql = "SELECT *
        FROM film
        JOIN joue ON film.id_film = joue.id_film
        JOIN acteur ON joue.id_acteur = acteur.id_acteur
        JOIN fait ON film.id_film = fait.id_film
        JOIN realisateur ON fait.id_realisateur = realisateur.id_realisateur";

$result = $pdo->query($sql);

    // Stocker les données des films et des acteurs dans un tableau
$films = array();
$acteurs = array();
$realisateurs = array();

while ($row = $result->fetch()) {
    $film = array(  
        'titre_film' => $row['titre_film'],
        'synopsis_film' => $row['synopsis_film'],
        'bande_annonce_film' => $row['bande_annonce_film'],
        'image_film' => $row['image_film'],
        'date_film' => $row['date_film'],
        'lien_film' => $row['lien_film'],
        'realisateur' => $row['nom_realisateur'] // Stocker directement le nom du réalisateur
    );


    $acteur = array(
        'nom_acteur' => $row['nom_acteur']
    );
    
    // Ajouter le film au tableau des films
    array_push($films, $film);
    
    // Ajouter l'acteur au tableau des acteurs pour ce film
    if (!isset($acteurs[$row['id_film']])) {
        $acteurs[$row['id_film']] = array();
    }
    array_push($acteurs[$row['id_film']], $acteur);
}

// Stocker les tableaux des films et des acteurs dans la session
$_SESSION['films'] = $films;
$_SESSION['acteurs'] = $acteurs;
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
    <script src="./content/src/carousel.js" defer></script>
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
    <section class="">
        <h2 class="bg-[#8666C6] text-center uppercase text-white text-2xl p-9"><?php echo $film['titre_film'] ?></h2>
        <div class="md:bg-[#FCFCFC] md:w-4/5 md:m-auto">
            <div class="flex flex-col md:flex-row p-5 md:p-10 md:justify-center md:m-auto">
                <div class="flex justify-center">
                    <img src="asset/img/affiche-film-joker.jpg" class="w-80">
                </div>
                <div class="px-10">
                    <p class="md:text-base mb-2 mt-10"><?php echo $film['titre_film'] ?></p>
                    <p class="md:text-base mb-2">
                        <?php foreach ($_SESSION['acteurs'] as $acteurs) {
                            echo "Acteurs : ";
                            foreach ($acteurs as $acteur) {
                                echo $acteur['nom_acteur'] . "<br>";
                            }
                        }
                        ?>
                    </p>
                    <p class="md:text-base mb-2">
                        <?php foreach ($_SESSION['realisateurs'] as $realisateurs) {
                            echo "realisateurs : ";
                            foreach ($realisateurs as $realisateur) {
                                echo $realisateur['nom_realisateur'] . "<br>";
                            }
                        }
                        ?>
                    </p>
                    <p class="md:text-base mb-2">Sortie : <?php echo $film['date_film'] ?></p>
                    <p class="md:text-base mb-5">Genre : Genre</p>
                    <a href="<?php echo $film['lien_film']?>" target="_blank"><button class="place-self-center bg-[#8666C6] text-[#FCFCFC] px-5 py-3 rounded">Lien vers la platform</button></a>
                </div>
            </div>
            <div class="p-7 md:w-96 md:w-3/4 md:m-auto mb-5 md:pb-10">
                <p class="font-bold mb-4">Synopsis :</p>
                <p><?php echo $film['synopsis_film'] ?></p>
            </div>
            <div class="flex justify-center px-5 md:px-0 mb-10">
                <iframe class="md:w-full md:h-96" src="<?php echo $film['bande_annonce_film'] ?>" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" allowfullscreen></iframe>
            </div>
        </div>
    </section>
    <?php
        include ('content/footer.php');
    ?>
</body>
</html>