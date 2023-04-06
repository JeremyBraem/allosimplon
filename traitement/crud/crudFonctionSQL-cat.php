<?php 
session_start();
if (isset($_SESSION['id_role'])) {
    if ($_SESSION['id_role'] != 1) {
        header('location:../index.php');
    }
}
else {
    header('location:../index.php');
}
?>
<?php

function getDatabaseConnexion() {
    define('DB_HOST', 'localhost');
    define('DB_NAME', 'allosimplon'); 
    define('DB_USER', 'root');
    define('DB_PASS', '');
    try {
        $pdo = new PDO("mysql:host=" . DB_HOST . ";dbname=" . DB_NAME, DB_USER, DB_PASS);
        // Définition des options de PDO pour une gestion d'erreur plus stricte
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        // Définition du jeu de caractères à utiliser pour la connexion
        $pdo->exec("SET NAMES 'utf8'");
        return $pdo;
    } catch (PDOException $e) {
        // En cas d'erreur de connexion, affichage du message d'erreur et arrêt du script
        die("Erreur de connexion à la base de données : " . $e->getMessage());
    }
}

function getAllcat() {
    $pdo = getDatabaseConnexion();
    $req = 'SELECT * FROM categories';
    $rows = $pdo->query($req);
    return $rows;
}

function readcat($id_categories) {
    $pdo = getDatabaseConnexion();
    $req = "SELECT * FROM categories WHERE id_categories = '$id_categories'";
    $stmt = $pdo->query($req);
    $row = $stmt->fetchAll();
    if (!empty($row)) {
        return $row[0];
    }
}

function createcat($nom_categories, $image_categories) {
    try {
        $pdo = getDatabaseConnexion();
        $req = "INSERT INTO categories (nom_categories, image_categories)
                VALUE ('$nom_categories', '$image_categories')";
        $pdo->exec($req);
    }
    catch(PDOException $e) {
        echo $req . "<br>" . $e->getMessage();
    }
}

function updatecat($id_categories, $nom_categories, $image_categories) {
    try {
        $pdo = getDatabaseConnexion();
        $req = "UPDATE categories SET
            nom_categories = '$nom_categories',
            image_categories = '$image_categories'
            WHERE id_categories = $id_categories";
        $pdo->exec($req);
    }
    catch(PDOException $e) {
        echo $req . "<br>" . $e->getMessage();
    }
}

function deletecat($id_categories) {
    try {
        $pdo = getDatabaseConnexion();
        $req = "DELETE FROM categories WHERE id_categories = '$id_categories'";
        $pdo->exec($req);
    }
    catch(PDOException $e) {
        echo $req . "<br>" . $e->getMessage();
    }
}

function newcat() {
	$categories['id_categories'] = "";
	$categories['nom_categories'] = "";
    $categories['image_categories'] = "";
    
}

?>