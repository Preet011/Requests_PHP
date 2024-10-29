<?php
// 1. Récupérer la couleur du cookie si elle existe
$bgcolor = isset($_COOKIE['bgcolor']) ? $_COOKIE['bgcolor'] : 'white'; // Valeur par défaut : blanc
?>

<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Page 2</title>
    <link rel="stylesheet" href="css/style.css"> <!-- Lien vers le fichier CSS -->
</head>

<body class="<?php echo htmlspecialchars($bgcolor); ?>"> <!-- Appliquer la classe correspondante pour la couleur -->
    <h1>Bienvenue sur la page 2</h1>
    <p>Ceci est une deuxième page qui conserve la couleur de fond sélectionnée.</p>
    
    <h2><a href="index.php">Retour à la première page</a></h2>
</body>

</html>
