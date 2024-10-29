<?php
// 1. Vérification de la soumission du formulaire
if (isset($_POST['color'])) {
    $color = $_POST['color'];
    // 2. Création ou mise à jour du cookie avec la couleur sélectionnée
    setcookie('bgcolor', $color, time() + (86400 * 30)); // Cookie expirant dans 30 jours
    // Redirige vers la même page pour appliquer le cookie
    // header("Location: " . $_SERVER['PHP_SELF']); // redirige vers le fichier actuel
    header("Location: index.php" );
    // Arrête l'exécution du script après la redirection
    exit();
}

// 3. Récupération de la couleur du cookie si elle existe
$bgcolor = isset($_COOKIE['bgcolor']) ? $_COOKIE['bgcolor'] : 'white'; // Valeur par défaut : blanc
?>

<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Choix de couleur de fond</title>
   <link rel="stylesheet" href="css/style.css">
</head>

<body class="<?php echo htmlspecialchars($bgcolor); ?>">
    <h1>Choisissez votre couleur de fond :</h1>

    <form action="" method="POST">
        <input type="radio" id="red" name="color" value="red" <?php echo ($bgcolor == 'red') ? 'checked' : ''; ?>>
        <label for="red">Rouge</label><br>

        <input type="radio" id="green" name="color" value="green" <?php echo ($bgcolor == 'green') ? 'checked' : ''; ?>>
        <label for="green">Vert</label><br>

        <input type="radio" id="blue" name="color" value="blue" <?php echo ($bgcolor == 'blue') ? 'checked' : ''; ?>>
        <label for="blue">Bleu</label><br>

        <input type="submit" value="Appliquer">
    </form>

    <!-- Lien vers la deuxième page -->
    <h2><a href="page2.php">Aller à la deuxième page</a></h2>
    
    <h2><a href="?reset=true">Réinitialiser la couleur</a></h2>

    <?php
    // 4. Réinitialisation du cookie
    // Vérifie si le paramètre 'reset' est présent dans l'URL
    if (isset($_GET['reset'])) {

        // Utilise setcookie pour supprimer le cookie 'bgcolor'
        // En définissant une date d'expiration passée (time() - 3600), le cookie est supprimé
        setcookie('bgcolor', '', time() - 3600);

        // Redirige vers la même page pour éviter de garder le paramètre 'reset' dans l'URL
        header("Location: " . $_SERVER['PHP_SELF']);
        
        // Arrête l'exécution du script après la redirection
        exit();
    }
    ?>
</body>

</html>
