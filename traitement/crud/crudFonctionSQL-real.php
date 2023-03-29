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

function getAllRealisateur() {
    $pdo = getDatabaseConnexion();
    $req = 'SELECT * FROM realisateur';
    $rows = $pdo->query($req);
    return $rows;
}

function readRealisateur($id_realisateur) {
    $pdo = getDatabaseConnexion();
    $req = "SELECT * FROM realisateur WHERE id_realisateur = '$id_realisateur'";
    $stmt = $pdo->query($req);
    $row = $stmt->fetchAll();
    if (!empty($row)) {
        return $row[0];
    }
}

function createRealisateur($nom_realisateur) {
    try {
        $pdo = getDatabaseConnexion();
        $req = "INSERT INTO realisateur (nom_realisateur)
                VALUE ('$nom_realisateur')";
        $pdo->exec($req);
    }
    catch(PDOException $e) {
        echo $req . "<br>" . $e->getMessage();
    }
}

function updateRealisateur($id_realisateur, $nom_realisateur) {
    $nom_realisateur = addslashes($nom_realisateur);
    try {
        $pdo = getDatabaseConnexion();
        $req = "UPDATE realisateur SET 
            nom_realisateur = '$nom_realisateur',
            WHERE id_realisateur = $id_realisateur";
        $pdo->exec($req);
    }
    catch(PDOException $e) {
        echo $req . "<br>" . $e->getMessage();
    }
}

function deleteRealisateur($id_realisateur) {
    try {
        $pdo = getDatabaseConnexion();
        $req = "DELETE FROM realisateur WHERE id_realisateur = '$id_realisateur' ";
        $pdo->exec($req);
    }
    catch(PDOException $e) {
        echo $req . "<br>" . $e->getMessage();
    }
}

function newrealisateur() {
	$realisateur['id_realisateur'] = "";
	$realisateur['nom_realisateur'] = "";
}

?>