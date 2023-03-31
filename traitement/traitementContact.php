<?php
// Récupération des données soumises par le formulaire
$name = $_POST['name'];
$email = $_POST['email'];
$firstname = $_POST['firstname'];
$message = $_POST['message'];

// Construction du message à envoyer
$body = "Nom: " . $name . "\n";
$body .= "Prénom: " . $firstname . "\n";
$body .= "E-mail: " . $email . "\n";
$body .= "Message: \n" . $message . "\n";

// Envoi du message par e-mail
mail('braemjeremypro@gmail.com', 'Nouveau message de contact', $body, 'De: '.$email);
?>
