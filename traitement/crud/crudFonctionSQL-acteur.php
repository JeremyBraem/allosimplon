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

function getAllacteur() {
    $pdo = getDatabaseConnexion();
    $req = 'SELECT * FROM acteur';
    $rows = $pdo->query($req);
    return $rows;
}

function readacteur($id_acteur) {
    $pdo = getDatabaseConnexion();
    $req = "SELECT * FROM acteur WHERE id_acteur = '$id_acteur'";
    $stmt = $pdo->query($req);
    $row = $stmt->fetchAll();
    if (!empty($row)) {
        return $row[0];
    }
}

function createacteur($nom_acteur) {
    try {
        $pdo = getDatabaseConnexion();
        $req = "INSERT INTO acteur (nom_acteur)
                VALUE ('$nom_acteur')";
        $pdo->exec($req);
    }
    catch(PDOException $e) {
        echo $req . "<br>" . $e->getMessage();
    }
}

function updateacteur($id_acteur, $nom_acteur) {
    try {
        $pdo = getDatabaseConnexion();
        $req = "UPDATE acteur SET 
            nom_acteur = '$nom_acteur'
            WHERE id_acteur = $id_acteur";
        $pdo->exec($req);
    }
    catch(PDOException $e) {
        echo $req . "<br>" . $e->getMessage();
    }
}

function deleteacteur($id_acteur) {
    try {
        $pdo = getDatabaseConnexion();
        $req = "DELETE FROM acteur WHERE id_acteur = '$id_acteur' ";
        $pdo->exec($req);
    }
    catch(PDOException $e) {
        echo $req . "<br>" . $e->getMessage();
    }
}

function newacteur() {
	$acteur['id_acteur'] = "";
	$acteur['nom_acteur'] = "";
}

?>