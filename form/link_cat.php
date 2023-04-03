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
    $sql = "SELECT * FROM `film`";
    $stmt = $pdo ->prepare($sql);
    $stmt->execute();
    if (isset($_POST['select_cat'])){
        echo"$_POST[select_cat]";
    }
?>
<div>
    <select name='select_cat' form='form_cat'>
    <?php
    $sql = "SELECT * FROM `categories`";
    $cat = $pdo->prepare($sql);
    $cat -> execute();  
        while($cats = $cat->fetch(PDO::FETCH_ASSOC, PDO::FETCH_ORI_NEXT)){
            echo"
                <option value='$cats[id_categories]'>$cats[nom_categories]</option>";
        }
            ?>
    </select>
    <select name='select_film' form='form_cat'>
            <?php
            if(isset($_GET['id_film'])){
                $sql = "SELECT * FROM `film` WHERE id_film=$_GET[id_film]";
                $film = $pdo->prepare($sql);
                $film -> execute();
                $film = $film->fetch(PDO::FETCH_ASSOC, PDO::FETCH_ORI_NEXT);
                echo"
                <option value=$film[id_film]>$film[nom]</option>";
                while($film = $stmt->fetch(PDO::FETCH_ASSOC, PDO::FETCH_ORI_NEXT)){
                    if ($_GET['id_film']!=$film['id_film']){
                        echo"
                        <option value='$film[id_film]'>$film[titre_film]</option>";
                    }
                }
            }
            else{
                while($film = $stmt->fetch(PDO::FETCH_ASSOC, PDO::FETCH_ORI_NEXT)){
                    echo"
                        <option value='$film[id_film]'>$film[titre_film]</option>";
                }
            }
            ?>
    </select>
    <form action="../traitement/crud/link_cat_traitement.php" method="POST" id='form_cat'>
        <input type='submit'>
    </form>
    <?php
    $sql = "SELECT categories.nom_categories AS nom_categories, film.titre_film AS titre_film, categories.id_categories AS id_categories, film.id_film AS id_film
    FROM avoir
    JOIN categories ON avoir.id_categories = categories.id_categories
    JOIN film ON avoir.id_film = film.id_film";
    // Exécution de la requête
    $stmt = $pdo->query($sql);
    // Récupération des résultats
    $results = $stmt->fetchAll(PDO::FETCH_ASSOC);
    // Affichage des résultats
    foreach ($results as $row) {
    echo $row['nom_categories'] . " a  " . $row['titre_film'] . "<br>";
    }
    ?>
    <a href="../form/crud.php">Retour aux films<br></a> 

</div>
