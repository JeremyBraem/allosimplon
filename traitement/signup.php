<?php
$host = 'localhost';
$username = 'root';
$dbname = 'allosimplon';
$password = '';

if(isset($_POST['insert'])){
    try {
    // se connecter à mysql
    $pdo = new PDO("mysql:host=$host;dbname=$dbname","$username","$password");
    } catch (PDOException $exc) {
        echo $exc->getMessage();
        exit();
    }
    // récupérer les valeurs
    $email_user = htmlspecialchars($_POST['email_user']);
    $hash = password_hash($_POST['mdp_user'], PASSWORD_DEFAULT);
    $nom_user = htmlspecialchars($_POST['nom_user']);
    $prenom_user = htmlspecialchars($_POST['prenom_user']);
    $id_role = "2";
    // Requête mysql pour insérer des données
    $sql = "INSERT INTO `user`(`nom_user`, `email_user`, `mdp_user`, `prenom_user`, `id_role`) VALUES (?,?,?,?,?)";
    $res = $pdo->prepare($sql);
    $exec = $res->execute(array($nom_user,$email_user,$hash,$prenom_user,$id_role));
    header("location:../connexion.php");
    exit();
    }
    ?>