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

$sql = "DELETE FROM joue WHERE id_acteur = :id_acteur AND id_film = :id_film";
$stmt = $pdo->prepare($sql);
$stmt->bindParam(':id_acteur', $_POST['id_acteur']);
$stmt->bindParam(':id_film', $_POST['id_film']);
$stmt->execute();
var_dump($_POST);
die;
?>