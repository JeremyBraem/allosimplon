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
$host = 'localhost';
$username = 'root';
$dbname = 'allosimplon';
$password = '';
$message = '';

if(isset($_POST['insert'])){
    try {
        // se connecter à mysql
        $pdo = new PDO("mysql:host=$host;dbname=$dbname","$username","$password");
        // activer les exceptions PDO pour les erreurs de requête
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        // récupérer l'adresse email soumise dans le formulaire
        $email_user = htmlspecialchars($_POST['email_user']);

        // Vérifier si l'adresse email existe déjà dans la base de données
        $query = "SELECT COUNT(*) FROM `user` WHERE `email_user`=?";
        $stmt = $pdo->prepare($query);
        $stmt->execute(array($email_user));
        $count = $stmt->fetchColumn();

        if($count > 0) {
            // l'adresse email existe déjà dans la base de données, afficher un message d'erreur
            $message = '<p class="text-red-600 font-bold">Cette adresse email est déjà enregistrée.</p>';
        } else {
            // l'adresse email n'existe pas encore dans la base de données, insérer les données
            $hash = password_hash($_POST['mdp_user'], PASSWORD_DEFAULT);
            $nom_user = htmlspecialchars($_POST['nom_user']);
            $prenom_user = htmlspecialchars($_POST['prenom_user']);
            $id_role = "2";
            // Requête mysql pour insérer des données
            $sql = "INSERT INTO `user`(`nom_user`, `email_user`, `mdp_user`, `prenom_user`, `id_role`) VALUES (?,?,?,?,?)";
            $res = $pdo->prepare($sql);
            $exec = $res->execute(array($nom_user,$email_user,$hash,$prenom_user,$id_role));

            if($exec) {
                // insertion réussie, afficher un message de confirmation
                $message = '<p class="text-green-600 font-bold">Inscription validé</p>';
                }
            }
        }
        catch(PDOException $e) {
            // Redirection vers la page de login avec un message d'erreur
            $message = "Erreur de connexion";
            echo $message;
            exit();
        }
    }
    include ('content/navbar.php');
    ?>
    <section>
        <h2 class="bg-[#8666C6] text-center uppercase text-white text-2xl p-9">Inscription</h2>
        <p class=""><?php echo $message ?></p>
        <form class=" lg:w-2/4 m-auto flex flex-col p-10" method="POST">
            <label class="mb-2 text-xl">E-mail :</label>
            <input class="border border-black p-1 bg-white rounded" type="email" name="email_user" required>
            
            <label class="mb-2 mt-7 text-xl">Nom :</label>
            <input class="border border-black p-1 bg-white rounded" type="name" name="nom_user" required>
            <label class="mb-2 mt-7 text-xl">Prénom :</label>
            <input class="border border-black p-1 bg-white rounded" type="firstname" name="prenom_user" required>
            <label class="mb-2 mt-7 text-xl">Mot de passe :</label>
            <input class="border border-black p-1 bg-white rounded" type="password" name="mdp_user" required>
            <!-- <label class="mb-2 mt-7 text-xl">Vérification du mot de passe :</label>
            <input class="border border-black p-1 bg-white rounded" type="password" name="$mdp_user" required> -->
            <button name="insert" class="place-self-center mt-8 bg-[#8666C6] text-[#FCFCFC] px-10 py-3 text-xl rounded">S'inscrire</button>
        </form>
    </section>
    <?php
        include ('content/footer.php');
    ?>
</body>
</html>