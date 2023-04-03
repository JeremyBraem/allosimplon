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
    $sql = "SELECT * FROM `avoir` WHERE id_film=$_POST[select_film] AND id_categories=$_POST[select_cat]";
    $stmt = $pdo ->prepare($sql);
    $stmt->execute();
    $stmt=$stmt->fetch(PDO::FETCH_ASSOC,PDO::FETCH_ORI_NEXT);
    if (!$stmt) {
        $sql="INSERT INTO avoir(id_categories,id_film) VALUES (?,?)";
        $stmt=$pdo->prepare($sql);
        $stmt->bindParam(1,$_POST['select_cat']);
        $stmt->bindParam(2,$_POST['select_film']);
        $stmt->execute();
        echo "categorie ajouté au film<br>";
        echo '<a href=../../form/crud.php>Retour<br></a>';
        }
    else {
        echo "categorie déjà ajouté au film<br>";
        echo '<a href=../../form/link_cat.php>Retour<br></a>';
        die;
    }
?>