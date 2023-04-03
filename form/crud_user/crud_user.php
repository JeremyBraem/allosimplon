<?php
    define('DB_HOST', 'localhost');
    define('DB_NAME', 'allosimplon');
    define('DB_USER', 'root');
    define('DB_PASS', '');
    try {
        $pdo = new PDO("mysql:host=" . DB_HOST . ";dbname=" . DB_NAME, DB_USER, DB_PASS);
        // Définition des options de PDO pour une gestion d'erreur plus stricte
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        // Définition du jeu de caractères à utiliser pour la connexion
        $pdo->exec("SET NAMES 'utf8'");
        return $pdo;
    } catch (PDOException $e) {
        // En cas d'erreur de connexion, affichage du message d'erreur et arrêt du script
        die("Erreur de connexion à la base de données : " . $e->getMessage());
    }

    $req = 'SELECT * FROM acteur';
    $rows = $pdo->query($req);
    return $rows;
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
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Roboto&family=Source+Code+Pro&display=swap" rel="stylesheet">
    <title>AlloSimplon</title>
</head>
<body>
<table border="1">
    <tr>
        <th class="border-2 border-black">ID</th>
        <th class="border-2 border-black">Nom</th>
        <th class="border-2 border-black">Email</th>
        <th class="border-2 border-black">MDP</th>
        <th class="border-2 border-black">Prénom</th>
        <th class="border-2 border-black">ID role</th>
    </tr>
    <?php foreach ($rows as $row): ?>
        <tr>
            <?php if ($k == 0){ ?>
                <td><?php echo '<a href=../form/form-film.php?id='.$row[$k].' >'.$row[$k].'</a>'; ?></td>
            <?php } else { ?>
                <td class="border-2 border-grey"><?php echo $row[$k]; ?></td>
            <?php } ?>
        </tr>
    <?php endforeach; ?>
</table>
</body>
</html>