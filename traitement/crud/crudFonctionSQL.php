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

function getAllFilms() {
    $pdo = getDatabaseConnexion();
    $req = 'SELECT * FROM film';
    $rows = $pdo->query($req);
    return $rows;
}

function readFilm($id_film) {
    $pdo = getDatabaseConnexion();
    $req = "SELECT * FROM film WHERE id_film = '$id_film'";
    $stmt = $pdo->query($req);
    $row = $stmt->fetchAll();
    if (!empty($row)) {
        return $row[0];
    }
}

function createFilm($titre_film, $synopsis_film, $bande_annonce_film, $lien_film, $image_film, $date_film) {
    $synopsis_film = addslashes($synopsis_film);

    try {
        $pdo = getDatabaseConnexion();
        $req = "INSERT INTO film (titre_film, synopsis_film, bande_annonce_film, lien_film, image_film, date_film)
                VALUE ('$titre_film', '$synopsis_film', '$bande_annonce_film', '$lien_film', '$image_film', '$date_film')";
        $pdo->exec($req);
    }
    catch(PDOException $e) {
        echo $req . "<br>" . $e->getMessage();
    }
}

function updateFilm($id_film, $titre_film, $synopsis_film, $bande_annonce_film, $lien_film, $image_film, $date_film) {
    $synopsis_film = addslashes($synopsis_film);
    try {
        $pdo = getDatabaseConnexion();
        $req = "UPDATE film SET 
            titre_film = '$titre_film',
            synopsis_film = '$synopsis_film',
            bande_annonce_film = '$bande_annonce_film',
            lien_film = '$lien_film',
            image_film = '$image_film',
            date_film = '$date_film'
            WHERE id_film = $id_film";

        $pdo->exec($req);
    }
    catch(PDOException $e) {
        echo $req . "<br>" . $e->getMessage();
    }
}

function deleteFilm($id_film) {
    try {
        $pdo = getDatabaseConnexion();
        $req = "DELETE FROM film WHERE id_film = '$id_film' ";
        $pdo->exec($req);
    }
    catch(PDOException $e) {
        echo $req . "<br>" . $e->getMessage();
    }
}

function newFilm() {
	$film['id_film'] = "";
	$film['titre_film'] = "";
	$film['synopsis_film'] = "";
	$film['bande_annonce_film'] = "";
	$film['lien_film'] = "";
	$film['image_film'] = "";
    $film['date_film'] = "";

}

?>