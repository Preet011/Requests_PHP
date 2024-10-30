<?php
session_start();  // Démarrer la session pour stocker les messages

//---------------------------
// Validation de formulaire
//---------------------------
// Créer un formulaire qui permet d'enregistrer un nouvel employé dans le BDD societe.

$message = '';  // variable pour afficher les messages d'erreur

// 2- connexion :
try {
    $pdo = new PDO(
        'mysql:host=localhost;dbname=societe2',
        'root',
        '',
        array(
            PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
            PDO::MYSQL_ATTR_INIT_COMMAND => 'set NAMES utf8'
        )
    );
} catch (PDOException $e) {
    // En cas d'erreur de connexion, on capture l'exception
    echo '<p class="error">Erreur de connexion à la base de données : ' . $e->getMessage() . '</p>';
    // error_log($e->getMessage(), 3, 'chemin/vers/le/fichier_log.log'); // Pour enregistrer les erreurs dans un fichier de log
    die; // Arrête le script si la connexion échoue
}


// 3- Traitement de $_POST :
if ($_POST) {   // est équivalent à !empty($_POST)

    // Contrôles du formulaire :
    if (!isset($_POST['prenom']) || strlen($_POST['prenom']) < 3 || strlen($_POST['prenom']) > 20) {
        $message .= '<p class="error">Erreur: Le prénom doit comporter entre 3 et 20 caractères.</p>';
    }

    if (!isset($_POST['nom']) || strlen($_POST['nom']) < 3 || strlen($_POST['nom']) > 20) {
        $message .= '<p class="error">Erreur: Le nom doit comporter entre 3 et 20 caractères.</p>';
    }

    if (!isset($_POST['service']) || strlen($_POST['service']) < 3 || strlen($_POST['service']) > 30) {
        $message .= '<p class="error">Erreur: Le service doit comporter entre 3 et 30 caractères.</p>';
    }

    if (!isset($_POST['sexe']) || ($_POST['sexe'] != 'm' && $_POST['sexe'] != 'f')) {
        $message .= '<p class="error">Erreur: Le sexe n\'est pas valide.</p>';
    }

    if (!isset($_POST['date_embauche']) || !strtotime($_POST['date_embauche'])) {
        $message .= '<p class="error">Erreur: La date n\'est pas valide.</p>';
    }

    if (!isset($_POST['salaire']) || !is_numeric($_POST['salaire']) || $_POST['salaire'] <= 0) {
        $message .= '<p class="error">Erreur: Le salaire doit être un nombre positif.</p>';
    }

// 4 . Vérifications avec preg_match()

    // la fonction preg_match() va nous servir à vérifier un certain nombre d'élements grâce aux expressions régulières
    /**
     * Une expression régulière est une chaîne de caractères type, un motif (pattern), qui décrit un ensemble de chaînes de caractères possibles.
     * C’est un modèle interprété par un moteur, lequel va essayer de trouver des correspondances du modèle dans le texte recherché.
     */
    // on va utiliser une série de symboles pour l'utiliser
    // Exemple pour vérifier la date d'embauche dans le traitement du formulaire
    if ($_POST) {
        if (preg_match('/^\d{2}-\d{2}-\d{4}$/', $_POST['date_embauche'] == 0)) {
            $message .= '<p> Erreur: La date fournie n\'est pas correcte </p>';
        }
    }

    // qu'est ce que c'est que ce charabia ?

    // preg_math() la fonction preg_match recherche une correspondance entre la chaine de caractères reçue et l'expression entre ses ()
    // /^ début de la vérification, il va vérifier à partir du premier caractère de la chaîne
    // d{2}- il attend exactement 2 chiffres en premiers elements de la chaîne de caractères suivis de '-'
    // \d{2}- même chose qu'au dessus
    // \d{4} Cette fois ci il attend 4 chiffres
    // $/ il termine sa vérification ici, la chaîne ne doit pas contenir d'autres caractères après d{4}

    // En clair, l'expression attend un format de date ('01-05-2009') 2 chiffres - 2 chiffres - 4 chiffres
    // Attention !! preg_match ne vérifie que le format de la chaîne de caractères, il ne vérifiera pas si c'est bien une date qui y est entrée ( ou ce qu'on attend d'autre )

    //-----
    // Si la variable $message est vide, c'est que le formulaire est valide : on peut enregistrer en BDD :
    if (empty($message)) {

        // on reformate la date en yyyy-mm-dd :
        $date = new DateTime($_POST['date_embauche']);
        $date_embauche = $date->format('Y-m-d');

        try {
            // La requête préparée :
            $request = $pdo->prepare('INSERT INTO employes (`prenom`, `nom`, `sexe`, `service`, `date_embauche`, `salaire`) VALUES (:prenom, :nom, :sexe, :service, :date_embauche, :salaire)');

            $request->bindParam(':prenom', $_POST['prenom']);
            $request->bindParam(':nom', $_POST['nom']);
            $request->bindParam(':sexe', $_POST['sexe']);
            $request->bindParam(':service', $_POST['service']);
            $request->bindParam(':date_embauche', $date_embauche);
            $request->bindParam(':salaire', $_POST['salaire']);

            var_dump($request);
            // Try,catch :
            // try contient le code à tester qui pourrait potentiellement causer une Exception (une erreur), si c'est le cas, il transfert l'erreur au bloc catch qui se chargera de l'afficher


            $resultat = $request->execute();

            // Message de réussite ou d'échec de l'enregistrement :
            if ($resultat) {
                $message .= '<p class="success">L\'employé a bien été ajouté.</p>';
            } else {
                $message .= '<p class="error">Erreur lors de l\'enregistrement de l\'employé.</p>';
            }
        } catch (PDOException $e) {
            // ATTENTION : lors du déploiement de l'application, on ne laisse JAMAIS apparaître les erreurs sur le client, on va préferer enregistrer l'erreur dans un fichier de logs par exemple avec error_log(), puis retourner une page 500 à l'utilisateur en le redirigeant dessus
            echo $e->getMessage();

            // error_log($e->getMessage(), 3, 'chemin/vers/l\'erreur');
            // header('Location: page_500.php');
            // exit;
        }
    }

    // On stocke le message dans la session
    $_SESSION['message'] = $message;

    // Redirection vers le formulaire
    //$base_url = rtrim(dirname($_SERVER['REQUEST_URI']), '/') . '/formulaire.php';
    // header('Location: /formulaire.php');
    // exit;
    header('Location: ../formulaire.php');
    exit;
}


?>