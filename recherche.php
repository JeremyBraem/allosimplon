<?php
session_start();
require_once ('content/bdd.php');
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
    <link rel="shortcut icon" href="asset/img/AlloSimplonTR.png"/>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Roboto&family=Source+Code+Pro&display=swap" rel="stylesheet">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/flowbite/1.6.4/flowbite.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/simple-parallax-js@5.5.1/dist/simpleParallax.min.js"></script>
    <title>AlloSimplon</title>
</head>
<body class="bg-[#FCFCFC]">
<?php
include ('content/navbar.php');

if(isset($_GET['search'])) {
    $search = $_GET['search'];
}
    $sql = "SELECT * FROM film WHERE titre_film LIKE :search OR synopsis_film LIKE :search OR date_film LIKE :search";
    $stmt = $pdo->prepare($sql);
    $stmt->bindValue(':search', '%' . $search . '%', PDO::PARAM_STR);
    $stmt->execute();
    $recs = $stmt->fetchAll(PDO::FETCH_ASSOC);
?>
<section>
    <h2 class="bg-[#8666C6] text-center uppercase text-white text-2xl p-9"><?php echo "Recherche : $search" ?></h2>
    <div class="p-5 md:w-2/3 md:m-auto md:mt-20 md:flex md:flex-col content-center">
        <?php foreach($recs as $rec) { ?>
            <a href="<?php echo "film.php?id=" . $rec['id_film'] . "'>" . $rec['titre_film']; ?>">
                <div class="md:flex md:mb-20">
                    <div class="flex md:block mb-5">
                        <img src="asset/img/affiche/<?php echo $rec['image_film']; ?>" class=" rounded-b h-44 md:h-56 pr-8">
                        <h2 class="text-xl mb-3 w-32"><?php echo $rec['titre_film'] ?></h2>
                    </div>
                    <div class="md:w-2/3 mb-10">
                        <p class="mb-3 text-[16px]"><?php echo $rec['synopsis_film'] ?></p>
                        <p><?php echo $rec['date_film'] ?></p>
                    </div>
                </div>
            </a>
        <?php } ?>
    </div>
</section>