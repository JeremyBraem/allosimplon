<?php
session_start();
// Connexion BDD
require_once ('content/bdd.php');
// Récup l'id
$id_film = $_GET['id'];
// Jointure
$sql = "SELECT * ,
               GROUP_CONCAT(DISTINCT nom_acteur SEPARATOR ', ') AS acteurs,
               GROUP_CONCAT(DISTINCT nom_realisateur SEPARATOR ', ') AS realisateurs,
               GROUP_CONCAT(DISTINCT nom_categories SEPARATOR ', ') AS categories
        FROM film
        LEFT JOIN joue ON film.id_film = joue.id_film
        LEFT JOIN acteur ON acteur.id_acteur = joue.id_acteur
        LEFT JOIN fait ON film.id_film = fait.id_film
        LEFT JOIN realisateur ON realisateur.id_realisateur = fait.id_realisateur
        LEFT JOIN avoir ON film.id_film = avoir.id_film
        LEFT JOIN categories ON categories.id_categories = avoir.id_categories
        WHERE film.id_film = :id_film
        GROUP BY film.id_film";

$stmt = $pdo->prepare($sql);
$stmt->bindParam(':id_film', $id_film, PDO::PARAM_INT);
// Execute la requête
$stmt->execute();
$film = $stmt->fetch(PDO::FETCH_ASSOC);

// Si le film existe dans la bdd
if (!$film) {
    echo "Ce film n'existe pas.";
    exit;
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
        <h2 class="bg-[#8666C6] text-center uppercase text-white text-2xl p-9"><?php echo $film['titre_film']; ?></h2>
        <div class="md:bg-[#FCFCFC] md:w-4/5 md:m-auto">
            <div class="flex flex-col md:flex-row p-5 md:p-10 md:justify-center md:m-auto">
                <div class="flex justify-center">
                    <img src="asset/img/<?php echo $film['image_film'];?>" class="md:w-80">
                </div>
                <div class="px-5 md:px-10 md:w-96">
                    <p class="md:text-base mb-2 mt-10"><?php echo "<strong>Titre du film :</strong> " . $film['titre_film']; ?></p>
                    <p class="md:text-base mb-2"> <?php echo "<strong>Réalisateurs :</strong> " . $film['realisateurs']; ?></p>
                    <p class="md:text-base mb-2"><?php echo "<strong>Acteurs : </strong>" .  $film['acteurs']; ?></p>
                    <p class="md:text-base mb-2"><?php echo "<strong>Sortie :</strong> " . $film['date_film']; ?></p>
                    <p class="md:text-base mb-5"><?php echo "<strong>Genre :</strong> " . $film['categories']; ?></p>
                    <a href="<?php echo $film['lien_film']?>" target="_blank"><button class="place-self-center bg-[#8666C6] text-[#FCFCFC] px-5 py-3 rounded">Lien vers la platform</button></a>
                </div>
            </div>
            <div class="p-7 md:w-96 md:w-3/4 md:m-auto mb-5 md:pb-10">
                <p class="font-bold mb-4">Synopsis :</p>
                <p><?php echo $film['synopsis_film'] ?></p>
            </div>
            <div class="flex justify-center px-5 md:px-0 mb-10">
                <iframe class="md:w-full md:h-96" src="<?php echo $film['bande_annonce_film'] ?>" allowfullscreen autoplay='0'></iframe>
            </div>
        </div>
    </section>
    <?php
        include ('content/footer.php');
    ?>
</body>
</html>