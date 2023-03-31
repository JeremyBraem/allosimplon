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

function getAllavoir() {
    $pdo = getDatabaseConnexion();
    $req = 'SELECT * FROM avoir';
    $rows = $pdo->query($req);
    return $rows;
}

function readavoir($id_film, $id_categories) {
    $pdo = getDatabaseConnexion();
    $req = "SELECT * FROM avoir WHERE id_film = '$id_film'";
    $stmt = $pdo->query($req);
    $row = $stmt->fetchAll();
    if (!empty($row)) {
        return $row[0];
    }
}

function createcat($nom_categories) {
    try {
        $pdo = getDatabaseConnexion();
        $req = "INSERT INTO categories (nom_categories)
                VALUE ('$nom_categories')";
        $pdo->exec($req);
    }
    catch(PDOException $e) {
        echo $req . "<br>" . $e->getMessage();
    }
}

function updatecat($id_categories, $nom_categories) {
    try {
        $pdo = getDatabaseConnexion();
        $req = "UPDATE categories SET
            nom_categories = '$nom_categories'
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
        $req = "DELETE FROM categories WHERE id_categories = '$id_categories' ";
        $pdo->exec($req);
    }
    catch(PDOException $e) {
        echo $req . "<br>" . $e->getMessage();
    }
}

function newcat() {
	$categories['id_categories'] = "";
	$categories['nom_categories'] = "";
}

?>