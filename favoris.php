<?php
session_start();
require_once('content/bdd.php');
if (isset($_POST['add_aimer'])) {
    $id_user = $_SESSION['id_user'];
    $id_film = $_POST['id_film'];

    $query = "SELECT * FROM aime WHERE id_user = :id_user AND id_film = :id_film";
    $stmt = $pdo->prepare($query);
    $stmt->execute(['id_user' => $id_user, 'id_film' => $id_film]);

    if ($stmt->rowCount() == 0) {
    // Si le film n'est pas déjà aimé, ajoutez-le à la base de données
    $query = "INSERT INTO aime (id_user, id_film) VALUES (:id_user, :id_film)";
    $stmt = $pdo->prepare($query);
    $stmt->execute(['id_user' => $id_user, 'id_film' => $id_film]);
    }
}
// Si l'utilisateur a soumis le formulaire de suppression de film aimé
if (isset($_POST['remove_aimer'])) {
    $id_user = $_SESSION['id_user'];
    $id_film = $_POST['id_film'];

    // Supprimer le film aimé de la base de données
    $query = "DELETE FROM aime WHERE id_user = :id_user AND id_film = :id_film";
    $stmt = $pdo->prepare($query);
    $stmt->execute(['id_user' => $id_user, 'id_film' => $id_film]);
}

$id_user = $_SESSION['id_user'];
$query = "SELECT film.titre_film, film.id_film FROM aime JOIN film ON aime.id_film = film.id_film WHERE aime.id_user = :id_user";
$stmt = $pdo->prepare($query);
$stmt->execute(['id_user' => $id_user]);
$aimed_film = $stmt->fetchAll(PDO::FETCH_ASSOC);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="asset/style/reset.css" rel="stylesheet">
    <link href="asset/style/font.css" rel="stylesheet">
    <script src="https://cdn.tailwindcss.com"></script>
    <script src="https://cdn.tailwindcss.com?plugins=forms,typography,aspect-ratio,line-clamp"></script>
    <script src="https://cdn.jsdelivr.net/npm/swiper@9/swiper-element-bundle.min.js"></script>
    <link rel="shortcut icon" href="asset/img/AlloSimplonFav.png"/>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Roboto&family=Source+Code+Pro&display=swap" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/swiper@9/swiper-element-bundle.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/flowbite/1.6.4/flowbite.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/simple-parallax-js@5.5.1/dist/simpleParallax.min.js"></script>
    <title>AlloSimplon</title>
</head>
    <?php include ('content/navbar.php');
    ?>
<h2>film aimés</h2>

<ul>
<?php foreach ($aimed_film as $aimed_film): ?>
  <li><?php echo $aimed_film['titre_film']; ?></li>
  <form action="suppr_favoris.php" method="POST">
      <input type="hidden" name="id_film" value="<?php echo $aimed_film['id_film']; ?>">
      <button type="submit">Supprimer de mes favoris</button>
  </form>
<?php endforeach; ?>

</ul>
</html>