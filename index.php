<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="asset/style/reset.css" rel="stylesheet">
    <link href="asset/style/font.css" rel="stylesheet">
    <link href="asset/style/parallax.css" rel="stylesheet">
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
        <div class="grid grid-cols-2 md:grid-cols-2 lg:grid-cols-4 mt-10 md:mt-20 md:gap-x-6 gap-x-3 px-10 md:px-20">
            <div class="bg-[#8666C6] rounded-sm overflow-hidden mb-4 h-44 md:h-96">
                <a href="#">
                    <h3 class="text-xl text-center p-2 md:p-4 text-sm md:text-3xl text-white">Joker</h3>
                    <img src="asset/img/affiche-film-joker.jpg" class="rounded-b">
                </a>
            </div>
            <div class="bg-[#8666C6] rounded-sm overflow-hidden mb-4 h-44 md:h-96">
                <a href="#">
                    <h3 class="text-xl text-center p-2 md:p-4 text-sm md:text-3xl text-white">Joker</h3>
                    <img src="asset/img/affiche-film-joker.jpg" class="rounded-b">
                </a>
            </div>
            <div class="bg-[#8666C6] rounded-sm overflow-hidden mb-4 h-44 md:h-96">
                <a href="#">
                    <h3 class="text-xl text-center p-2 md:p-4 text-sm md:text-3xl text-white">Joker</h3>
                    <img src="asset/img/affiche-film-joker.jpg" class="rounded-b">
                </a>
            </div>
            <div class="bg-[#8666C6] rounded-sm overflow-hidden mb-4 h-44 md:h-96">
                <a href="#">
                    <h3 class="text-xl text-center p-2 md:p-4 text-sm md:text-3xl text-white">Joker</h3>
                    <img src="asset/img/affiche-film-joker.jpg" class="rounded-b">
                </a>
            </div>
        </div>
    </section>
    <section>
        <h2 class="bg-[#FCFCFC] text-center uppercase bold text-[#8666C6] text-2xl font-semibold py-10 md:py-20">TOP 10</h2>
        <div class="grid grid-cols-2 md:grid-cols-2 lg:grid-cols-4 md:gap-x-6 gap-x-3 px-10 md:px-20 pb-10">
            <div class="bg-[#8666C6] rounded-sm overflow-hidden mb-4 h-44 md:h-96">
                <a href="#">
                    <h3 class="text-xl text-center p-2 md:p-4 text-sm md:text-3xl text-white">Joker</h3>
                    <img src="asset/img/affiche-film-joker.jpg">
                </a>
            </div>
            <div class="bg-[#8666C6] rounded-sm overflow-hidden mb-4 h-44 md:h-96">
                <a href="#">
                    <h3 class="text-xl text-center p-2 md:p-4 text-sm md:text-3xl text-white">Joker</h3>
                    <img src="asset/img/affiche-film-joker.jpg">
                </a>
            </div>
        </div>
    </section>
    <section class="bg-[#8666C6]">
        <h2 class=" text-center uppercase text-white text-2xl p-9">Catégories</h2>
        <div class="grid grid-cols-2 md:grid-cols-2 lg:grid-cols-4 mt-10 md:gap-x-6 gap-x-3 px-10 md:px-20 pb-10">
            <div class="bg-[#FCFCFC] rounded-sm overflow-hidden mb-4 h-28 md:h-60 md:w-68">
                <a href="#">
                    <h3 class="text-xl text-center p-2 md:p-4 text-sm md:text-3xl text-[#8666C6]">Action</h3>
                    <img src="asset/img/action-genre.jpg">
                </a>
            </div>
            <div class="bg-[#FCFCFC] rounded-sm overflow-hidden mb-4 h-28 md:h-60 md:w-68">
                <a href="#">
                    <h3 class="text-xl text-center p-2 md:p-4 text-sm md:text-3xl text-[#8666C6]">Action</h3>
                    <img src="asset/img/action-genre.jpg">
                </a>
            </div>
            <div class="bg-[#FCFCFC] rounded-sm overflow-hidden mb-4 h-28 md:h-60 md:w-68">
                <a href="#">
                    <h3 class="text-xl text-center p-2 md:p-4 text-sm md:text-3xl text-[#8666C6]">Action</h3>
                    <img src="asset/img/action-genre.jpg">
                </a>
            </div>
            <div class="bg-[#FCFCFC] rounded-sm overflow-hidden mb-4 h-28 md:h-60 md:w-68">
                <a href="#">
                    <h3 class="text-xl text-center p-2 md:p-4 text-sm md:text-3xl text-[#8666C6]">Action</h3>
                    <img src="asset/img/action-genre.jpg">
                </a>
            </div>
        </div>
    </section>
    <?php
        include ('content/footer.php');
    ?>
</body>
</html>