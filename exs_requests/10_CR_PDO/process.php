<?php
 session_start();

// Inclure la connexion à la base de données
require_once 'db/database.php';

// Information ou rappel: On echappe pas de données qui sont destinées à la BDD pour plusieurs raisons :

// 1 - La BDD n'en a pas besoin
// 2 - Les requêtes préparées sont là pour ça (echapper les données et sécuriser contre les injections SQL)

// En revanche on echappe TOUJOURS lors de l'affichage de données

$message = "";
$errors = [];

/** Exercice 1 : Validation de l'email
 *
 *  Objectif : Ajouter un champ pour l'adresse e-mail dans le formulaire et valider que l'email est bien formaté avant de l'enregistrer dans la BDD
 *             Ajouter également l'email dans la BDD (vider les données avant) dans la table employes
 *
 *  1 . Modifier le formulaire (formulaire_front) pour inclure un champ email
 *
 *  2 . Ajouter la validation dans le code PHP pour vérifier que l'email est valide
 */
if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    if (isset($_POST['email'])) {

        if (!filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)) {
            $errors[] =  ' L\'email est incorrect ! ';
            // echo ' L\'email est incorrect ';
        }
    }


    /** Exercice 2 : Validation numero téléphone
     *
     *  Objectif : Ajouter un champ pour le numéro de téléphone
     *             Ajouter également dans la BDD dans la table employes
     *
     *  1 . Ajouter champ téléphone au formulaire
     *
     *  2 . Valider qu'il contient uniquement des chiffres et contient entre 10 et 20 caractères
     *
     */

    // On vérifie ^[0-9]{10,15}$

    // ^ la vérification est faite en début de chaîne
    // [0-9] correspond à tous les chiffres de 0 à 9
    // {10,15} il doit y avoir minimum 10 chiffres et maximum 15 chiffres dans la chaîne

    if (isset($_POST['telephone'])) {
        if (!preg_match('/^[0-9]{10,20}$/', $_POST['telephone'])) {
            $errors[] =  ' Le numéro de téléphone est incorrect ! ';
            // echo ' Le numero de téléphone est incorrect ';
        }
    }

    /** Exercice 3 : Valider le genre en menu déroulant
     *
     *  Objectif : Modifier l'input de type radio pour en faire un select pour chaque genre
     *
     *  1 . Modifier l'input en select
     *
     *  2 . Vérifier que les valeurs correspondent dans le PHP et soient validées
     *
     *
     */

    if (isset($_POST['sexe'])) {
        if ($_POST['sexe'] != 'f' && $_POST['sexe'] != 'm') {
            $errors[] = ' Le sexe est incorrect ';
            // echo ' Le sexe est incorrect ';
        }
    }

    /** Exercice 4 : Validation de la date avec formatage
     *
     *  Objectif : S'assurer que la date est au format 'jj-mm-aaaa' et la transformer en 'aaaa-mm-jj'
     *
     *  1 . Valider le format de la date FR
     *
     *  2 . Reformater le format en US (aaaa-mm-jj)
     *
     */

    // /^ vérifiation faite début de la chaine
    // \d{2}-\d{2}-\d{4}$/ On attend 2 chiffres suivis de - suivi de 2 chiffres avec - suivi de 4 chiffres
    // $ signifie que la vérification s'arrête ici (et que la chaîne doit s'arrêter ici !)

    if (isset($_POST['date_embauche'])) {

        if (!preg_match('/^\d{2}-\d{2}-\d{4}$/', $_POST['date_embauche'])) {
            $errors[] = ' La date d\'embauche n\'est pas au bon format';
            // echo ' Erreur : la date embauche n\'est pas au bon format';
        } else {
            $date = new DateTime($_POST['date_embauche']);
            $date_embauche = $date->format('Y-m-d');
        }

    }

    /** Exercice 5 : Validation du salaire avec format monétaire
     *
     *  Objectif : Vérifier que le salaire est un montant monétaire valide (il ne peut pas être négatif par exemple)
     *
     *  1 . Modifier la validation pour que le salaire soit un nombre positif avec jusqu'à 2 décimales
     *
     *  2 . Utiliser des fonctions PHP vues en cours pour formater le salaire et le valider
     */

    // ^ début de chaine
    // d+ (d = n'importe quel chiffre entre 0 et 9, + signifie n'importe quelle longueur de chiffres, aussi bien 2 que 200000)
    // . = le point de décimale
    // d{2} = deux chiffres maximum après la virgule
    // ()? = facultatif
    // $ terminaison de la chaine

    if (isset($_POST['salaire'])) {
        if (!preg_match('/^\d+(\.\d{2})?$/', $_POST['salaire'])) {
            $errors[] = ' Erreur : Le salaire n\'est pas au bon format ';
            // echo ' Erreur : Le salaire n\'est pas au format nombres';
        }
    }

    /** Exercice 6 : Validation de la longueur du nom d'utilisateur
     *
     *  Objectif : Vérifier que le nom d'utilisateur a une longueur spécifique
     *
     *  1 . Ajouter un champs dans le formulaire pour le nom d'utilisateur (username), dans la table employes egalement
     *
     *  2 . Valider que l'utilisateur a entre 5 et 15 caractères
     *
     *
     */

    if (isset($_POST['username'])) {
        if (mb_strlen($_POST['username']) < 5 || mb_strlen($_POST['username']) > 15) {
            $errors[] = ' Erreur : Le pseudonyme doit faire entre 5 et 15 caractères ';
            // echo ' Erreur : Le pseudonyme doit contenir entre 5 et 15 caractères ';
        }
    }

}

    /** Exercice 7 : Utilisation des requêtes préparées
     *
     *  Objectif : S'assurer que toutes les requêtes SQL vers la BDD soient préparée pour éviter les injections SQL
     *
     *  1 . Utiliser PDO pour assurer une connexion à la base de données
     *  2 . Préparer une requête SQL pour envoyer toutes les données du formulaire dans la BDD
     *  3 . Empecher l'envoi à la BDD si $errors contient des erreurs
     *
     *
     *  Aide : Voir cours sur PDO
     */
    if (isset($_POST['submit_form']) && $_SERVER['REQUEST_METHOD'] === 'POST') {

        if (empty($errors)) {
            // Connexion à la base de données et insertion
            try {

                $sql = "INSERT INTO employes (prenom, nom, username, email, telephone, sexe, service, date_embauche, salaire) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?)";
                // ou $sql = "INSERT INTO employes (prenom,nom,pseudonyme,email,telephone,sexe,service,date_embauche,salaire) VALUES (:prenom,:nom,:pseudonyme,:email,:telephone,:sexe,:service,:date_embauche,:salaire)";

                $request = $pdo->prepare($sql);
                /* $request->bindParam(':prenom', $_POST['prenom']);
                $request->bindParam(':nom', $_POST['nom']);
                $request->bindParam(':pseudonyme', $_POST['username']);
                $request->bindParam(':email', $_POST['email']);
                $request->bindParam(':telephone', $_POST['telephone']);
                $request->bindParam(':sexe', $_POST['sexe']);
                $request->bindParam(':service', $_POST['service']);
                $request->bindParam(':date_embauche', $_POST['date_embauche']);
                $request->bindParam(':salaire', $_POST['salaire']);
                */

                $result = $request->execute([
                    $_POST['prenom'],
                    $_POST['nom'],
                    $_POST['username'],
                    $_POST['email'],
                    $_POST['telephone'],
                    $_POST['sexe'],
                    $_POST['service'],
                    $date_embauche,
                    $_POST['salaire']
                ]);

                if ($result) {
                    $_SESSION['message'] = '<h2>Les données ont bien été envoyées</h2>';
                } else {
                    $_SESSION['message'] = '<h2>Il y a eu un problème lors de l\'envoi des données</h2>';
                }
            } catch (PDOException $e) {
                die('Erreur d\'insertion  ' . $e->getMessage()); // Affiche l'erreur de connexion
            }
        header('Location: formulaire.php');
        exit();
    } else {
        $_SESSION['errors'] = $errors;
        header('Location: formulaire.php');
        exit();
    }
}

 /** Exercice 8 : Ajouter photo profil (BONUS)
 *
 *  Objectif : Ajouter une photo de profil à l'utilisateur (il faudra créer un nouveau formulaire 'modif user' et une requête UPDATE pour la BDD et non INSERT INTO), l'image doit être nullable
 *
 *  Attention : Ajouter enctype="multipart/form-data" au formulaire pour que ça fonctionne
 *
 *  Faites des recherches sur $_FILES et la fonction move_uploaded_file()
 *
 *  1 . Ajouter un champ pour ajouter des fichiers dans le formulaire
 *       Il faudra récupérer tous les employés dans un select pour ajouter la photo au  salarié selectionné
 *
 *  2 . Traiter le champ dans PHP (ajouter une limite de taille de 20mb)
 *
 *  3 . La photo uploadée doit être enregistrée dans un dossier img,photo comme vous voudrez
 *
 *  4 . Une fois la vérification faite, l'enregistrée dans la BDD sur l'utilisateur souhaité, ne pas oublier de selectionner un utilisateur (par son id)
 */


    if (isset($_FILES['photo']) && isset($_POST['submit_photo']) && isset($_POST['employe_id'])) {
        $employeId = $_POST['employe_id']; // L'ID de l'employé sélectionné

        if ($_FILES['photo']['size'] > 2000000) {
            $_SESSION['message'] = 'Votre image est trop grande';
        } else {
            try {
                // Mettre à jour l'enregistrement de l'employé avec la photo
                $updateDatas = "UPDATE employes SET photo_profil = :photo WHERE id = :id";
                $request = $pdo->prepare($updateDatas);
                $request->bindValue(':photo', $_FILES['photo']['name']);
                $request->bindValue(':id', $employeId); // Utiliser l'ID de l'employé sélectionné

                $resultat = $request->execute();

                if ($resultat) {
                    move_uploaded_file($_FILES['photo']['tmp_name'], './img/' . $_FILES['photo']['name']);
                    $_SESSION['message'] = 'La photo a bien été ajoutée';
                } else {
                    $_SESSION['message'] = 'Il y a eu un problème lors de l\'update de l\'utilisateur';
                }
            } catch (PDOException $e) {
                $errors[] = 'Erreur de connexion à la base de données: ' . $e->getMessage();
            }
        }

        // Stocker les erreurs dans la session
        if (!empty($errors)) {
            $_SESSION['errors'] = $errors;
        }
        header('Location: formulaire.php');
        exit;
    }
?>
