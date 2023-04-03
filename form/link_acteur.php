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
    if (isset($_POST['select_acteur'])){
        echo"$_POST[select_acteur]";
    }
    if (isset($_POST['select_film'])){
        echo"$_POST[select_film]";
    }
?>
<div>
    <select name='select_acteur' form='form_acteur'>
    <?php
    $sql = "SELECT * FROM `acteur`";
    $acteur = $pdo->prepare($sql);
    $acteur -> execute();  
        while($acteurs = $acteur->fetch(PDO::FETCH_ASSOC, PDO::FETCH_ORI_NEXT)){
            echo"
                <option value='$acteurs[id_acteur]'>$acteurs[nom_acteur]</option>";
        }
            ?>
    </select>
    <select name='select_film' form='form_acteur'>
            <?php
            if(isset($_GET['id_film'])){
                $sql = "SELECT * FROM `film` WHERE id_film=$_GET[id_film]";
                $film = $pdo->prepare($sql);
                $film -> execute();
                $film = $film->fetch(PDO::FETCH_ASSOC, PDO::FETCH_ORI_NEXT);
                echo"
                <option value=$film[id_film]>$film[titre_film]</option>";
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
    <form action="../traitement/crud/link_acteur_traitement.php" method="POST" id='form_acteur'>
        <input type='submit'>
    </form>
    <?php
    $sql = "SELECT acteur.nom_acteur AS nom_acteur, film.titre_film AS titre_film, acteur.id_acteur AS id_acteur, film.id_film AS id_film
    FROM joue
    JOIN acteur ON joue.id_acteur = acteur.id_acteur
    JOIN film ON joue.id_film = film.id_film";
    // Exécution de la requête
    $stmt = $pdo->query($sql);
    // Récupération des résultats
    $results = $stmt->fetchAll(PDO::FETCH_ASSOC);
    // Affichage des résultats
    foreach ($results as $row) {
    echo $row['nom_acteur'] . " joue dans " . $row['titre_film'] . "<br>";
    }
    ?>
    <div>
</div>
<a href="../form/crud.php">Retour aux films<br></a> 
</div>