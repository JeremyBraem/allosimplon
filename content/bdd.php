<?php
// Définition des constantes pour la connexion à la base de données
define('DB_HOST', 'localhost'); // Nom de l'hôte
define('DB_NAME', 'allosimplon'); // Nom de la base de données
define('DB_USER', 'root'); // Nom d'utilisateur de la base de données
define('DB_PASS', ''); // Mot de passe de l'utilisateur de la base de données

// Connexion à la base de données avec PDO
try {
    $pdo = new PDO("mysql:host=" . DB_HOST . ";dbname=" . DB_NAME, DB_USER, DB_PASS);
    // Définition des options de PDO pour une gestion d'erreur plus stricte
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    // Définition du jeu de caractères à utiliser pour la connexion
    $pdo->exec("SET NAMES 'utf8'");
} catch (PDOException $e) {
    // En cas d'erreur de connexion, affichage du message d'erreur et arrêt du script
    die("Erreur de connexion à la base de données : " . $e->getMessage());
}


/*------------------------------------------------------------------------------------------------------------*/ 
/* ce code ci-dessus est préférable car il utilise des constantes pour définir les paramètres de 
connexion à la base de données, ce qui permet une gestion plus facile et centralisée de ces paramètres. 
De plus, il définit des options pour la gestion d'erreurs avec PDO et le jeu de caractères utilisé, 
ce qui améliore la sécurité et la fiabilité de la connexion à la base de données.

vs

<?php
// Informations de connexion à la base de données
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "bddex";

// Connexion à la base de données
try {
    $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
    // Configuration de l'attribut PDO::ATTR_ERRMODE pour afficher les erreurs
    $con->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch(PDOException $e) {
    echo "Erreur : " . $e->getMessage();
    exit();
}
*/?>