<?php
session_start();

require_once ('content/bdd.php');
if (!isset($_SESSION)) {
    header('location:connexion.php');
}

$sql = "SELECT id_user, nom_user, prenom_user, email_user FROM user";
$result = $pdo->query($sql);

$id_user = $_SESSION['id_user'];
$nom_user = $_SESSION['nom_user'];
$prenom_user = $_SESSION['prenom_user'];
$email_user = $_SESSION['email_user'];
if (isset($_POST['add_aimer'])) {
    $id_user = $_SESSION['id_user'];
    $id_film = $_POST['id_film'];

    $query = "SELECT * FROM aime WHERE id_user = :id_user AND id_film = :id_film";
    $stmt = $pdo->prepare($query);
    $stmt->execute(['id_user' => $id_user, 'id_film' => $id_film]);

    if ($stmt->rowCount() == 0) {
    // Si le film n'est pas déjà aimé, ajoutez-le à la base de données
    $query = "INSERT INTO aime (id_user, id_film) VALUES (:id_user, :id_film)";
    $stmt = $pdo->prepare($query);
    $stmt->execute(['id_user' => $id_user, 'id_film' => $id_film]);
    }
}
// Si l'utilisateur a soumis le formulaire de suppression de film aimé
if (isset($_POST['remove_aimer'])) {
    $id_user = $_SESSION['id_user'];
    $id_film = $_POST['id_film'];

    // Supprimer le film aimé de la base de données
    $query = "DELETE FROM aime WHERE id_user = :id_user AND id_film = :id_film";
    $stmt = $pdo->prepare($query);
    $stmt->execute(['id_user' => $id_user, 'id_film' => $id_film]);
}

$id_user = $_SESSION['id_user'];
$query = "SELECT film.* FROM aime JOIN film ON aime.id_film = film.id_film WHERE aime.id_user = :id_user";
$stmt = $pdo->prepare($query);
$stmt->execute(['id_user' => $id_user]);
$aimed_film = $stmt->fetchAll(PDO::FETCH_ASSOC);
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
        <div class="relative grid grid-cols-2 md:grid-cols-2 lg:grid-cols-3 place-items-center mt-10 md:mt-20 md:gap-x-6 gap-x-3 px-10 md:px-20">
        <?php foreach ($aimed_film as $aimed_film): ?>
            <div class="mb-4">
                <div class="bg-[#8666C6] rounded-sm overflow-hidden h-56 md:h-[440px] w-full md:w-64">
                    <a href="<?php echo "film.php?id=" . $aimed_film['id_film'] . "'>" . $aimed_film['titre_film']; ?>">
                        <h3 class="text-xl text-center py-2 md:p-4 md:text-xl text-white"><?php echo $aimed_film['titre_film']; ?></h3>
                        <img src="asset/img/affiche/<?php echo $aimed_film['image_film']; ?>" class="rounded-b w-full md:h-96">
                    </a>
                </div>
                <div class="flex place-content-around pt-1">
                    <form method="post" action="suppr_favoris.php">
                        <input type="hidden" name="id_film" value="<?php echo $aimed_film['id_film']; ?>">
                        <button type="submit" name="add_aimer"><img src="asset/img/like.png" class="h-5 md:w-5"></button>
                    </form>
                </div>
            </div>
        <?php endforeach; ?>
        </div>
    </div>
    <?php
        include ('content/footer.php');
    ?>
    <script src="asset/js/swiper.js"></script>
    <script src="asset/js/swiper2.js"></script>

</body>
</html>