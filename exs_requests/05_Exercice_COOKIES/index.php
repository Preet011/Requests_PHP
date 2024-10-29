<?php
   // get bgColor from the cookie or default to white
    $color = isset($_COOKIE[$bg]) ? $_COOKIE['bg'] : 'white';

    // Handle for submission for color choice

    if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['color']) {
        $bg = $_POST['color'];
        setcookie("langue", $langue, time() + $year);
    }
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Choix de couleur de fond</title>
<link rel="stylesheet" href="css/style.css">
</head>

<body class="">
    <h1>Choisissez votre couleur de fond :</h1>

    <form action="" method="POST">
        <input type="radio" id="red" name="color" value="?color=red">
        <label for="red">Rouge</label><br>

        <input type="radio" id="green" name="color" value="?color=green">
        <label for="green">Vert</label><br>

        <input type="radio" id="blue" name="color" value="?color=blue">
        <label for="blue">Bleu</label><br>

        <input type="submit" value="Appliquer">
    </form>

    <!-- Lien vers la deuxième page -->
    <h2><a href="page2.php">Aller à la deuxième page</a></h2>

    <h2><a href="?reset=true">Réinitialiser la couleur</a></h2>

</body>

</html>
