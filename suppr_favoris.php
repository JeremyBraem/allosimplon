<?php
// Démarrez une session pour stocker les favoris de l'utilisateur
session_start();

// Inclure le fichier de configuration de la base de données
require_once ('content/bdd.php');

// Si l'utilisateur a soumis le formulaire de suppression de film aimé
if (isset($_POST['id_film'])) {
  $id_user = $_SESSION['id_user'];
  $id_film = $_POST['id_film'];

  // Supprimer le film aimé de la base de données
  $query = "DELETE FROM aime WHERE id_user = :id_user AND id_film = :id_film";
  $stmt = $pdo->prepare($query);
  $stmt->execute(['id_user' => $id_user, 'id_film' => $id_film]);
}

// Rediriger l'utilisateur vers la page des favoris
header('Location:profil.php');
exit();
?>
