<?php session_start(); ?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PHP - SESSION</title>
    <link rel="stylesheet" href="css/style.css">
</head>

<body>
    <div class="header-img">
        <img src="./img/logo_poleS.png" alt="Logo poleS">
    </div>

    <?php
    // if (isset($_SESSION)) {
    //     echo '<div class="session-data">';
    //     print_r($_SESSION); // Affiche les données de la session
    //     echo '</div>';
    // } else {
    //     echo '<div class="session-data">La session n\'existe plus</div>';
    // }
    // ?>

     <?php
            echo "<p> Nous avons " . htmlspecialchars($_SESSION['prenom']). " toujours présent !</p>";
            var_dump($_SESSION);
        // ici
        ?>

    <div class="code-section">
        Code :
        <pre>
            if (isset($_SESSION)) {
                echo $_SESSION;
            } else {
                echo "La session n'existe plus";
            }
        </pre>
    </div>



</body>

</html>