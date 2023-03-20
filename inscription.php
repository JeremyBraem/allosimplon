<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="asset/style/reset.css" rel="stylesheet">
    <link href="asset/style/font.css" rel="stylesheet">
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="shortcut icon" href=""/>
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
    <section>
        <h2 class="bg-[#8666C6] text-center uppercase text-white text-2xl p-9">Inscription</h2>
        <div class=" md:w-1/3 m-auto flex flex-col p-10">
            <label class="mb-2 text-xl">E-mail :</label>
            <input class="border border-black" type="email" name="email" required>
            <label class="mb-2 mt-7 text-xl">Nom :</label>
            <input class="border border-black" type="name" name="name" required>
            <label class="mb-2 mt-7 text-xl">Prénom :</label>
            <input class="border border-black" type="firstname" name="firstname" required>
            <label class="mb-2 mt-7 text-xl">Mot de passe :</label>
            <input class="border border-black" type="password" name="password" required>
            <label class="mb-2 mt-7 text-xl">Vérification du mot de passe :</label>
            <input class="border border-black" type="password" name="password" required>
            <button class="place-self-center mt-10 bg-[#8666C6] text-[#FCFCFC] px-10 py-3 rounded">S'inscrire</button>

        </div>
    </section>



    <?php
        include ('content/footer.php');
    ?>
    <script src="asset/js/swiper.js"></script>
    <script src="asset/js/swiper2.js"></script>

</body>
</html>