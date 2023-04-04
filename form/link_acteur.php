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
?>
<div>
    <form method="post">
    <select name='select_acteur' form='form_acteur'>
    <?php
    $sql = "SELECT * FROM `acteur`";
    $acteur = $pdo->prepare($sql);
    $acteur -> execute();
        while($acteurs = $acteur->fetch(PDO::FETCH_ASSOC)){
            echo"
                <option value='$acteurs[id_acteur]'>$acteurs[nom_acteur]</option>";
            }
            ?>
    </select>
    <select name='select_film' form='form_acteur'>
            <?php
                while($film = $stmt->fetch(PDO::FETCH_ASSOC)){
                    echo"
                        <option name='titre_film' value='$film[id_film]'>$film[titre_film]</option>";
                }
            ?>
    </select>
    </form>
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
    foreach ($results as $row) { ?>
        <form method="post"><?php echo $row['nom_acteur'] ?> joue dans <?php echo $row['titre_film'] ?><br></form>
        <form action="../traitement/crud/suppr_acteur_traitement.php" method="POST"  name="delete_joue">
            <input type="hidden" name="id_acteur" value="<?php echo $row['id_acteur'] ?>">
            <input type="hidden" name="id_film" value="<?php echo $row['id_film'] ?>">
            <input type="submit" value="supprimer">
        </form>
    <?php } ?>
<a href="../form/crud.php">Retour aux films<br></a> 
</div>