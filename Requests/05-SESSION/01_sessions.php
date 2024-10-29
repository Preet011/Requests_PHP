<?php session_start(); ?>
<!--  session_start() pour commencer une session et la garder active sur toutes les pages du navigateur -->
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
    <div class="container">
        <h1>Les Sessions</h1>
        <h2>1. Qu'est-ce qu'une session ?</h2>
        <p>Une session est un mécanisme qui permet de stocker des informations variables d'une page à l'autre pour un utilisateur précis.</p>
        <p>Lorsqu'une session est démarrée, PHP crée un fichier temporaire sur le serveur, associé à un identifiant unique (généralement stocké dans un cookie nommé 'PHPSESSID').</p>
        <p>Ce fichier contient les informations que l'on souhaite garder pendant toute la durée de la session (généralement le temps que l'utilisateur reste connecté).</p>

        <h2>2. Démarrer une session</h2>
        <p>Pour utiliser une session, la première chose à faire est de la démarrer. Pour cela, nous avons la fonction 'session_start()'. Cette fonction doit être appelée au tout début du script, avant que n'importe quel bout de code ne puisse être lû.</p>
        <p>NB : Si une session est déjà en cours, mettre 'session_start()' dans une nouvelle page ne créera pas de nouvelle session, mais réutilisera l'identifiant de la session déjà existante stockée sur le serveur.</p>

        <h2>3. Stocker les données dans une session</h2>
        <p>Les données sont stockées dans une session en utilisant la superglobale '$_SESSION', qui est comme $_POST ou $_GET, également un tableau associatif.</p>

        <?php
        // On va stocker quelques informations
        $_SESSION['prenom'] = "Mickaël";
        $_SESSION['age'] = 37;
        $_SESSION['est_majeur'] = true;
        ?>

        <p>Les données stockées dans $_SESSION restent accessibles tant que la session reste active.</p>

        <h2>4. Récupérer les données de la session</h2>
        <p>Maintenant que nous avons stocké des informations dans notre session, nous allons les afficher sur le navigateur (cela ne fonctionnera que si 'session_start()' a été appelée).</p>

        <?php
            echo "<p>Prénom: " . htmlspecialchars($_SESSION['prenom']). "</p>";
            echo "<p>Age: " . htmlspecialchars($_SESSION['age']). "</p>";
            var_dump($_SESSION);
        // ici
        ?>


        <!-- <?php
            if(isset($_SESSION['prenom'])) {
                echo " <h2>2. T'es bien connecté !</h2>";
            } else {
                echo "<p>Nous avons pas cette donnée en stock !</p>";
            }
        ?> -->

        <h2>5. Vérifier l'existence de données dans une session</h2>
        <p>Avant d'accéder à une donnée de session, les bonnes pratiques veulent que nous vérifions si elle existe déjà.</p>

        <?php
        if(isset($_SESSION['prenom'])) {
            echo "<p>Mon prénom est : " . htmlspecialchars($_SESSION['prenom']) ."</p>";
        } else {
            echo "<p>Le prénom n'est pas défini dans la session, la clé n'existe pas.</p>";
        }

        // Vérification avec une fausse clé
        if (isset($_SESSION['est_majeur'])) {
            echo "<p>". htmlspecialchars($_SESSION['est_majeur']). " existe bien</p>";
        } else {
            echo "<p>". htmlspecialchars($_SESSION['est_majeur']). " n'existe pas</p>";
        }

        ?>

        <h2>6. Modifier ou supprimer des données de session</h2>
        <h3>Modifier une session</h3>
        <p>Pour modifier les données d'une session, on va simplement récupérer la clé de la session qu'on souhaite modifier et lui attribuer une nouvelle valeur. Il faudra modifier chaque clé séparément si vous voulez changer toutes les données de session.</p>
        <p>Exemple : $_SESSION['prenom'] = "Antoine"</p>

        <?php
        $_SESSION['prenom'] = "Antoine";
         echo "<p>Nouveau prénom : ". htmlspecialchars($_SESSION['prenom'])."</p>";
        ?>

        <p>NB : Nous venons de réaffecter une valeur. L'ancien prénom restera inchangé dans l'affichage précédent, mais $_SESSION['prenom'] vaudra maintenant "Antoine" et non plus "Mickael".</p>

        <h3>Supprimer une donnée de la session</h3>
        <p>Pour supprimer une seule donnée de la session, on visera encore une fois la clé du tableau associatif $_SESSION.</p>
        <p>On utilisera également la fonction unset() qui sert à détruire des variables de la manière suivante : unset($_SESSION['age']) par exemple.</p>

        <?php
        unset($_SESSION['age']);
        // On vérifie si on a accès à l'âge stocké dans la session
        if(isset($_SESSION['age'])) {
            echo "<p>L'âge existe toujours dans la session</p>";
        } else {
            echo "<p>L'âge a bien été supprimé !</p>";
        }
        var_dump($_SESSION);
        ?>

        <h2>7. Détruire la session totalement</h2>
        <p>Pour détruire une session entière, y compris les données qu'elle conserve, on utilise la fonction 'session_destroy'.</p>
        <p>Cette commande ne prendra effet qu'à la fin du script, ce qui fait que vous devrez recharger la page pour voir si cela a bien fonctionné (cependant même si elle n'a d'effet qu'à la fin du script, les données de la session sont immédiatement rendues inaccessibles par le script).</p>

        <?php
        // ici
        session_destroy();
        // À associer avec un bouton déconnexion !
        var_dump("Destroyed !!" . $_SESSION);
        ?>

        <p>Testons ici : <a href="02_deconnexion.php">Vidage de session</a></p>
        <p>NB : Notons que session_destroy() ne supprimera pas automatiquement les cookies du client. Si vous voulez détruire le cookie associé à la session, vous devrez le faire manuellement.</p>
    </div>
</body>

</html>
