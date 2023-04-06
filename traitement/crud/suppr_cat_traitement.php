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

if(isset($_POST['id_categories']) && isset($_POST['id_film'])){
    $id_categories = $_POST['id_categories'];
    $id_film = $_POST['id_film'];

    $sql = "DELETE FROM avoir WHERE id_categories = :id_categories AND id_film = :id_film";
    $stmt = $pdo->prepare($sql);
    $stmt->execute(array(':id_categories' => $id_categories, ':id_film' => $id_film));
}
echo 'Liaison supprimé<br>';
echo '<a href=../../form/link_cat.php>Retour<br></a>';
die;
?>