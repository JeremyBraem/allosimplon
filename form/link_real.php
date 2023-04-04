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
<select name='select_realisateur' form='form_realisateur'>
<?php
$sql = "SELECT * FROM `realisateur`";
$realisateur = $pdo->prepare($sql);
$realisateur -> execute();
    while($realisateurs = $realisateur->fetch(PDO::FETCH_ASSOC)){
        echo"
            <option value='$realisateurs[id_realisateur]'>$realisateurs[nom_realisateur]</option>";
        }
        ?>
</select>
<select name='select_film' form='form_realisateur'>
        <?php
            while($film = $stmt->fetch(PDO::FETCH_ASSOC)){
                echo"
                    <option name='titre_film' value='$film[id_film]'>$film[titre_film]</option>";
            }
        ?>
</select>
</form>
<form action="../traitement/crud/link_real_traitement.php" method="POST" id='form_realisateur'>
    <input type='submit'>
</form>

<?php
$sql = "SELECT realisateur.nom_realisateur AS nom_realisateur, film.titre_film AS titre_film, realisateur.id_realisateur AS id_realisateur, film.id_film AS id_film
FROM fait
JOIN realisateur ON fait.id_realisateur = realisateur.id_realisateur
JOIN film ON fait.id_film = film.id_film";
// Exécution de la requête
$stmt = $pdo->query($sql);
// Récupération des résultats
$results = $stmt->fetchAll(PDO::FETCH_ASSOC);
// Affichage des résultats
foreach ($results as $row) { ?>
    <form method="post"><?php echo $row['nom_realisateur'] ?> a fait <?php echo $row['titre_film'] ?><br></form>
    <form action="../traitement/crud/suppr_real_traitement.php" method="POST"  name="delete_fait">
        <input type="hidden" name="id_realisateur" value="<?php echo $row['id_realisateur'] ?>">
        <input type="hidden" name="id_film" value="<?php echo $row['id_film'] ?>">
        <input type="submit" value="supprimer">
    </form>
<?php } ?>
<a href="../form/crud.php">Retour aux films<br></a> 
</div>