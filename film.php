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
    <section>
        <h2 class="bg-[#8666C6] text-center uppercase text-white text-2xl p-9">Nom du film</h2>
        <div class="flex flex-col md:flex-row p-5 md:p-10 justify-center">
            <div class="flex justify-center">
                <img src="asset/img/affiche-film-joker.jpg" class="w-48 md:w-80">
            </div>
            <div class="pl-4">
                <p class="md:text-base mb-2 mt-10">Nom du film</p>
                <p class="md:text-base mb-2">Auteur : Nom</p>
                <p class="md:text-base mb-2">Réalisateur : Nom</p>
                <p class="md:text-base mb-2">Sortie : Date</p>
                <p class="md:text-base mb-5">Genre : Genre</p>
            </div>
            <button class="place-self-center">Lien vers la platform</button>
        </div>
        <div class="p-5 md:w-96 md:w-2/3 md:m-auto">
            <p class="font-bold">Synopsis :</p>
            <p>En 1981, Arthur Fleck travaille dans une agence de clowns à Gotham City. Méprisé et incompris par ceux qui lui font face, il mène une morne vie en marge de la société et habite dans un immeuble miteux avec sa mère Penny. Un soir, il se fait agresser dans le métro par trois traders de Wayne Enterprise alcoolisés qui le brutalisent, le poussant à les tuer en retour. Son geste inspire à une partie de la population l'idée de s'en prendre eux aussi aux puissants. Dans cette société décadente, Arthur bascule peu à peu dans la folie et finit par devenir le Joker, un dangereux tueur psychopathe victime d'hallucinations et le plus grand criminel de Gotham City.</p>
        </div>
        <div class="flex justify-center mb-10 px-5 md:px-0">
            <iframe class="md:w-full md:h-96" src="https://www.youtube.com/embed/_LUWnjT3iks" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" allowfullscreen></iframe>
        </div>
    </section>
    <?php
        include ('content/footer.php');
    ?>
</body>
</html>