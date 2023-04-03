<?php
session_start();
require_once ('content/bdd.php');
// Exécuter une requête SQL pour récupérer les données de l'utilisateur
$sql = "SELECT nom_user, prenom_user, email_user FROM user";
$result = $pdo->query($sql);
// Traiter les résultats de la requête SQL
if ($result->rowCount() > 0) {
    // Récupérer les données de l'utilisateur et les stocker dans des variables
    while ($row = $result->fetch()) {
        $_SESSION['nom_user'] = $row['nom_user'];
        $_SESSION['prenom_user'] = $row['prenom_user'];
        $_SESSION['email_user'] = $row['email_user'];
    }
} else {
    echo "Aucun utilisateur trouvé.";
}
// Les variables sont stockées dans la session et peuvent être récupérées sur d'autres pages
$nom_user = $_SESSION['nom_user'];
$prenom_user = $_SESSION['prenom_user'];
$email_user = $_SESSION['email_user'];
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
    <link rel="shortcut icon" href="asset/img/AlloSimplonFav.png"/>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Roboto&family=Source+Code+Pro&display=swap" rel="stylesheet">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/flowbite/1.6.4/flowbite.min.js"></script>
    <script src="https://unpkg.com/swiper/swiper-bundle.min.js"></script>
    <link rel="stylesheet" href="https://unpkg.com/swiper/swiper-bundle.min.css" />
    <title>AlloSimplon</title>
</head>
<body class="bg-[#FCFCFC]">
    <?php
        include ('content/navbar.php');      
    ?>
    <h2 class="bg-[#8666C6] text-center uppercase text-white text-2xl p-9">PROFIL</h2>
    <div class="md:w-1/3 md:m-auto md:p-10 flex flex-col mt-10">
        <div class="flex mb-10 pl-5 md:pl-9">
            <img src="asset/img/bouton-informations.png" class="h-10">
            <div class="flex flex-col pl-5">
                <div class="flex gap-5 mt-2">
                    <h3 class="text-xl">Information générales</h3>
                </div>
                <div class="flex gap-10 mt-10">
                    <?php
                     echo "<p>$nom_user</p>
                    <p>$prenom_user</p>";
                    ?>
                </div>
            </div>
        </div>
        <div class="flex pl-5 md:pl-9">
            <img src="asset/img/compte.png" class="h-10">
            <div class="flex flex-col pl-5">
                <div class="flex gap-5 mt-2">
                    <h3 class="text-xl">Compte</h3>
                </div>
                <div class="flex flex-col gap-5 mt-10">
                    <?php
                    echo "<p>$email_user</p>
                    <p>***********</p>"
                    ?>
                </div>
            </div>
        </div>
        <button class="place-self-center mt-8 bg-[#8666C6] text-[#FCFCFC] px-10 py-3 text-xl rounded">Modifier</button>
    </div>

    <div class="bg-[#8666C6] w-56 md:w-[500px] h-[2px] mx-auto my-5"></div>
    
    <div class="flex mb-10 m-auto w-1/3 justify-center gap-2">
        <img src="asset/img/like.png" class="h-5 my-auto">
        <h3 class="my-auto text-2xl">Favoris</h3>
    </div>
    <div>
    <div class="relative grid grid-cols-2 md:grid-cols-2 lg:grid-cols-3 mt-10 md:mt-20 md:gap-x-6 gap-x-3 px-10 md:px-20">
            <div class="mb-4 w-28 md:w-72 m-auto">
                <div class="bg-[#8666C6] rounded-sm overflow-hidden">
                    <a href="#">
                        <h3 class="text-xl text-center p-2 md:p-4 text-sm md:text-3xl text-white">Joker</h3>
                        <img src="asset/img/affiche-film-joker.jpg" class="rounded-b">
                    </a>
                </div>
                <div class="flex place-content-around pt-1">
                    <p>De : Todd Phillips</p>
                    <img src="asset/img/unlike.png" class="h-5 md:w-5">
                </div>
            </div>
            <div class="mb-4 w-28 md:w-72 m-auto">
                <div class="bg-[#8666C6] rounded-sm overflow-hidden">
                    <a href="#">
                        <h3 class="text-xl text-center p-2 md:p-4 text-sm md:text-3xl text-white">Joker</h3>
                        <img src="asset/img/affiche-film-joker.jpg" class="rounded-b">
                    </a>
                </div>
                <div class="flex place-content-around pt-1">
                    <p>De : Todd Phillips</p>
                    <img src="asset/img/unlike.png" class="h-5 md:w-5">
                </div>
            </div>
            <div class="mb-4 w-28 md:w-72 m-auto">
                <div class="bg-[#8666C6] rounded-sm overflow-hidden">
                    <a href="#">
                        <h3 class="text-xl text-center p-2 md:p-4 text-sm md:text-3xl text-white">Joker</h3>
                        <img src="asset/img/affiche-film-joker.jpg" class="rounded-b">
                    </a>
                </div>
                <div class="flex place-content-around pt-1">
                    <p>De : Todd Phillips</p>
                    <img src="asset/img/unlike.png" class="h-5 md:w-5">
                </div>
            </div>
            <div class="mb-4 w-28 md:w-72 m-auto">
                <div class="bg-[#8666C6] rounded-sm overflow-hidden">
                    <a href="#">
                        <h3 class="text-xl text-center p-2 md:p-4 text-sm md:text-3xl text-white">Joker</h3>
                        <img src="asset/img/affiche-film-joker.jpg" class="rounded-b">
                    </a>
                </div>
                <div class="flex place-content-around pt-1">
                    <p>De : Todd Phillips</p>
                    <img src="asset/img/unlike.png" class="h-5 md:w-5">
                </div>
            </div>
        </div>
    </div>
    <?php
        include ('content/footer.php');
    ?>
    <script src="asset/js/swiper.js"></script>
    <script src="asset/js/swiper2.js"></script>

</body>
</html>