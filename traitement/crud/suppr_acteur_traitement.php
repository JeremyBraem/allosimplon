<?php 
$host = '127.0.0.1';
$db   = 'allosimplon';
$user = 'root';
$pass = '';
$port = "3306";
$charset = 'utf8mb4';

$options = [
    \PDO::ATTR_ERRMODE            => \PDO::ERRMODE_EXCEPTION,
    \PDO::ATTR_DEFAULT_FETCH_MODE => \PDO::FETCH_ASSOC,
    \PDO::ATTR_EMULATE_PREPARES   => false,
];
$dsn = "mysql:host=$host;dbname=$db;charset=$charset;port=$port";
try {
    $pdo = new \PDO($dsn, $user, $pass, $options);
    } catch (\PDOException $e) {
            throw new \PDOException($e->getMessage(), (int)$e->getCode());
}
if (isset($_POST['delete_joue'])) {
    // Récupérer les identifiants de l'acteur et du film
    $id_acteur = $_POST['id_acteur'];
    $id_film = $_POST['id_film'];
    // Requête pour supprimer la ligne de la table de relation "joue"
    $sql = "DELETE FROM joue WHERE id_acteur = :id_acteur AND id_film = :id_film";
    $stmt = $pdo->prepare($sql);
    $stmt->execute(['id_acteur' => $id_acteur, 'id_film' => $id_film]);
}
?>