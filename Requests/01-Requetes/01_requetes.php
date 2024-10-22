<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Les Requêtes HTTP</title>
    <link rel="stylesheet" href="css/style.css">
</head>

<body>
    <div class="header-img">
        <img src="./img/logo_poleS.png" alt="Logo PoleS">
    </div>

    <h1>Les requêtes HTTP</h1>
    <h2>Qu'est-ce que HTTP</h2>
    <p>HTTP (HyperText Transfer Protocol) est un protocole de communication utilisé pour envoyer et recevoir des informations sur le web. Il fonctionne selon un modèle client-serveur, où le client envoie une requête et le serveur répond avec la ressource demandée.</p>
    <p><strong>Client :</strong> Généralement un navigateur web qui envoie une requête pour une ressource.</p>
    <p><strong>Serveur :</strong> Héberge les ressources demandées et répond aux requêtes des clients.</p>

    <hr>

    <h2>Structure de la requête HTTP</h2>
    <pre><code>GET /index.html HTTP/1.1</code></pre>
    <p><strong>Méthode HTTP :</strong> Le type d'opération à effectuer (GET, POST, PUT, DELETE).</p>
    <p><strong>URI (Uniform Resource Identifier) :</strong> L'adresse de la ressource demandée.</p>
    <p><strong>Version HTTP :</strong> La version du protocole HTTP utilisée.</p>

    <hr>

    <h2>En-têtes de requête</h2>
    <p>Les en-têtes fournissent des informations supplémentaires sur la requête. Ils sont facultatifs mais souvent utilisés pour transmettre des données importantes.</p>

    <p>Exemple d'en-têtes courants :</p>
    <ul>
        <li><strong>Host :</strong> Indique le nom de domaine du serveur.</li>
        <li><strong>User-Agent :</strong> Fournit des informations sur le client (navigateur, version).</li>
        <li><strong>Accept :</strong> Spécifie les types de médias que le client peut traiter (HTML, JSON, XML, etc.).</li>
        <li><strong>Authorization :</strong> Utilisé pour transmettre des informations d'authentification.</li>
    </ul>

    <h2>Le corps de la requête</h2>
    <p>Il est utilisé principalement avec les méthodes POST et PUT pour envoyer des données au serveur (comme les données d'un formulaire).</p>
    <p>Le corps de la requête est facultatif et souvent vide pour les méthodes comme GET.</p>
    <p>Exemple de données de formulaire avec POST :</p>
    <pre><code>username=john&password=jdjdiezlaldjdkd</code></pre>
    <p>on peut très bien utiliser les paramètres d'url avec POST, mais c'est très déconseillé</p>

    <pre>
    <code>
        <body>
            <!-- Notez l'ajout des paramètres dans l'URL de l'action -->
            <form action="?id=123&type=test" method="post">
            <label for="nom">Nom:</label>
            <input type="text" id="nom" name="nom" >

            <label for="prenom">Prénom:</label>
            <input type="text" id="prenom" name="prenom" >

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
            $id = isset($_GET['id']) ? $_GET['id'] : 'ID non fourni';
            $type = isset($_GET['type']) ? $_GET['type'] : 'Type non fourni';

            // Récupération des données POST
            $nom = isset($_POST['nom']) ? $_POST['nom'] : 'Nom non fourni';
            $prenom = isset($_POST['prenom']) ? $_POST['prenom'] : 'Prénom non fourni';

            // Affichage des données
            echo "ID (paramètre URL): " . htmlspecialchars($id) . "<br>";
            echo "Type (paramètre URL): " . htmlspecialchars($type) . "<br>";
            echo "Nom (POST): " . htmlspecialchars($nom) . "<br>";
            echo "Prénom (POST): " . htmlspecialchars($prenom) . "<br>";

            /* On utilise htmlspecialchars() pour éviter d'éventuelles attaques XSS lorsque les données sont affichées. */
        ?>
    </code>

    </pre>

    <h2>Les méthodes HTTP</h2>
    <h3>GET</h3>
    <ul>
        <li>Utilisée pour demander une ressource.</li>
        <li>Les données sont envoyées dans l'URL sous forme de paramètres de requête.</li>
        <li>Ne modifie pas l'état du serveur.</li>
    </ul>

    <h3>POST</h3>
    <ul>
        <li>Utilisée pour soumettre des données au serveur, souvent pour créer une nouvelle ressource.</li>
        <li>Les données sont envoyées dans le corps de la requête.</li>
    </ul>

    <h3>PUT</h3>
    <ul>
        <li>Utilisée pour mettre à jour ou créer une ressource à un emplacement spécifique.</li>
        <li>L'URL de la requête spécifie la ressource à mettre à jour.</li>
    </ul>

    <h3>DELETE</h3>
    <ul>
        <li>Utilisée pour supprimer une ressource spécifique.</li>
    </ul>

    <h3>HEAD</h3>
    <ul>
        <li>Similaire à GET, mais sans renvoyer le corps de la réponse. Utilisée pour vérifier l'existence ou les métadonnées d'une ressource.</li>
    </ul>

    <hr>

    <h2>Codes statut HTTP</h2>
    <ul>
        <li><strong>200 OK :</strong> La requête a réussi, et la réponse contient la ressource demandée.</li>
        <li><strong>400 Bad Request :</strong> La requête est mal formée.</li>
        <li><strong>401 Unauthorized :</strong> Authentification nécessaire.</li>
        <li><strong>403 Forbidden :</strong> Accès refusé même si authentifié.</li>
        <li><strong>404 Not Found :</strong> La ressource demandée est introuvable.</li>
        <li><strong>500 Internal Server Error :</strong> Le serveur a rencontré une erreur.</li>
        <li><strong>502 Bad Gateway :</strong> Le serveur a reçu une réponse invalide d'un autre serveur.</li>
        <li><strong>503 Service Unavailable :</strong> Le serveur est temporairement indisponible, surcharge ou maintenance.</li>
    </ul>

    <hr>

    <h2>Sécurité HTTP</h2>
    <h3>HTTPS</h3>
    <p>HTTPS (HyperText Transfer Protocol Secure) est la version sécurisée de HTTP. Il utilise SSL/TLS pour chiffrer les données échangées entre le client et le serveur.</p>

</body>

</html>
