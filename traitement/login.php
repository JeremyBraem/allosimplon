<?php
session_start();
require_once ('../content/bdd.php');

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    // Vérification des champs et sécurisation
    $email = filter_var($_POST["email"], FILTER_VALIDATE_EMAIL);
    $password = htmlspecialchars(trim($_POST["password"]));
    $message = "";
    // Vérification que les champs obligatoires sont remplis
    if (!isset($email) || !isset($password)) {
        // Redirection vers la page de login avec un message d'erreur
        $message = "Champs vide";
        echo $message;
        exit();
    } else {
        // Connexion à la base de données
        try {
            $pdo = new PDO("mysql:host=" . DB_HOST . ";dbname=" . DB_NAME, DB_USER, DB_PASS);
            // Configuration de l'attribut PDO::ATTR_ERRMODE pour afficher les erreurs
            $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            // Récupération des informations de l'utilisateur correspondant à l'email fourni
            $stmt = $pdo->prepare("SELECT * FROM user WHERE email_user = :email_user");
            $stmt->bindParam(":email_user", $email);
            $stmt->execute();
            $utilisateur = $stmt->fetch(PDO::FETCH_ASSOC);
            if (!$utilisateur) {
                // Redirection vers la page de login avec un message d'erreur
                $message = 'Utilisateur ou mot de passe incorrect';
                echo $message;
                exit();
            } else {
                // Vérification du mot de passe
                if (password_verify($password, $utilisateur["mdp_user"])) {
                    // Création de la session utilisateur
                    $_SESSION["user"] = $utilisateur["id_user"];
                    $_SESSION["nom_user"] = $utilisateur["nom_user"];
                    $_SESSION["prenom_user"] = $utilisateur["prenom_user"];
                    $_SESSION["id_role"] = $utilisateur["id_role"];
                    // Redirection vers la page d'accueil
                    header("location:../index.php");
                    exit();
                } else {
                    // Redirection vers la page de login avec un message d'erreur
                    $message = 'Utilisateur ou mot de passe incorrect';
                    echo $message;
                    exit();
                }
            }
        } catch(PDOException $e) {
            // Redirection vers la page de login avec un message d'erreur
            $message = "Erreur de connexion";
            echo $message;
            exit();
        }
    }
} else {
    // Redirection vers la page de login
    header("location:connexion.php");
    exit();
}
?>
