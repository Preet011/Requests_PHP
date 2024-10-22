<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Formulaire</title>
    <link rel="stylesheet" href="css/style.css">
</head>

<body>
    <div class="header-img">
        <img src="./img/logo_poleS.png" alt="Logo poleS">
    </div>

    <h1>Formulaire</h1>
    <div class="form-container">
        <form method="post" action="">
            <label for="prenom">Prénom</label><br>
            <input type="text" id="prenom" name="prenom">

            <br>

            <label for="description">Description</label><br>
            <textarea name="description" id="description" cols="30" rows="10"></textarea>

            <br>

            <input type="submit" value="Envoyer">
        </form>
    </div>

    <p>on peut très bien utiliser les paramètres d'url avec POST, mais c'est très déconseillé. Notamment pour des questions de sécurité ou encore de taille maximale d'une URL (limite à 2000 caractères)</p>

    <pre>
    <code>
        <body>
            <!-- Notez l'ajout des paramètres dans l'URL de l'action -->
            <form action="?id=123&type=test" method="post">
            <label for="nom">Nom:</label>
            <input type="text" id="nom" name="nom" required>

            <label for="prenom">Prénom:</label>
            <input type="text" id="prenom" name="prenom" required>

            <input type="submit" value="Envoyer">
            </form>
        </body>
        </html>
    </code>
    </pre>

    <pre>
    <code>
        <?php
        // Récupération des paramètres de l'URL
        $id = $_GET['id'];
        $type = $_GET['type'];

        // Récupération des données POST
        $nom = $_POST['nom'];
        $prenom = $_POST['prenom'];

        // Affichage des données
        echo "ID (paramètre URL): " . htmlspecialchars($id) . "<br>";
        echo "Type (paramètre URL): " . htmlspecialchars($type) . "<br>";
        echo "Nom (POST): " . htmlspecialchars($nom) . "<br>";
        echo "Prénom (POST): " . htmlspecialchars($prenom) . "<br>";
        ?>
    </code>

    </pre>

    <pre>
    <code>
        <?php
        // La superglobale $_SERVER
        //-------------------------
        // $_SERVER est une superglobale qui contient des informations sur le serveur et l'environnement d'exécution.

        // $_SERVER est un array qui est disponible dans tous les contextes du script, y compris au sein des fonctions.

        // Syntaxe de $_SERVER : $_SERVER = array('clé1' => 'valeur1', 'cléN' => 'valeurN');

        // Elle fournit des informations comme le type de requête HTTP, le chemin d'accès aux fichiers, l'adresse IP du client, etc.

        // Exemple : $_SERVER["REQUEST_METHOD"] retourne la méthode HTTP utilisée pour accéder à la page (GET, POST, etc.).

        //-----------------------
        // La superglobale $_POST
        //-----------------------
        // $_POST est une superglobale qui permet de récupérer les données saisies dans un formulaire.

        // $_POST est une superglobale, donc un array. Il est disponible dans tous les contextes du script, y compris au sein des fonctions.

        // Syntaxe de $_POST : $_POST = array('name1' => 'valeur input1', 'nameN' => 'valeur inputN');

        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            echo '<div class="result">';
            echo '<h1>Résultats du formulaire</h1>';
            echo '<p>Prénom : ' . htmlspecialchars($_POST['prenom']) . '</p>';
            echo '<p>Description : ' . htmlspecialchars($_POST['description']) . '</p>';
            echo '</div>';
        }
        ?>
    </code>

    </pre>

</body>

</html>
