<?php
session_start();
    if(isset($_SESSION["user"])){
        header("location:profil.php");
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
        <h2 class="bg-[#8666C6] text-center uppercase text-white text-2xl p-9">Connexion</h2>
        <form class=" lg:w-2/4 m-auto flex flex-col p-10" action="traitement/login.php" method="POST">
            <label class="mb-2 text-xl">E-mail :</label>
            <input class="border border-black p-1 bg-white rounded" type="email" name="email" required>
            <label class="mb-2 mt-7 text-xl">Mot de passe :</label>
            <input class="border border-black p-1 bg-white rounded" type="password" name="password" required>
            <a href="#">Mot de passe oublié ?</a>
            <button class="place-self-center mt-8 bg-[#8666C6] text-[#FCFCFC] px-10 py-3 text-xl rounded">Se connecter</button>
        </form>
    </section>
    <?php
        include ('content/footer.php');
    ?>
    <script src="asset/js/swiper.js"></script>
    <script src="asset/js/swiper2.js"></script>

</body>
</html>