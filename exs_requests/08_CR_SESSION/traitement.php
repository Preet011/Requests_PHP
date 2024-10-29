<?php
// On lance la session
session_start();

// Si le bouton est bien cliqué (name = "submit_inscription" ET que la méthode est bien POST)
if (isset($_POST['submit_inscription']) && $_SERVER['REQUEST_METHOD'] == "POST") {

    // Alors on vérifie si $_POST contient toutes les clés requises (même si le required est dans le HTML on peut facilement le retirer et déjouer la sécurité)
    if (isset($_POST['nom']) && isset($_POST['prenom']) && isset($_POST['email']) && isset($_POST['mdp'])) {

        // Inutile d'échapper les données si on ne compte pas les afficher (ce qui est notre cas)
        // htmlspecialchars va echapper nos données pour l'affichage mais inutile de le faire pour récupérer les données car il risque de modifier la taille de nos valeurs (ce qui peut poser problème si on a une limite spécifique dans la BDD)

        // Si c'est le cas alors on vérifie toutes les conditions demandées
        if (mb_strlen($_POST['nom']) < 2 || mb_strlen($_POST['nom']) > 30) {
            echo '<p> Le nom doit comporter entre 2 et 30 caractères </p>';
        } else if (mb_strlen($_POST['prenom']) < 2 || mb_strlen($_POST['prenom']) > 30) {
            echo '<p> Le prénom doit comporter entre 2 et 30 caractères </p>';
        } else if (mb_strlen($_POST['mdp']) < 6 || mb_strlen($_POST['mdp']) > 20) {
            echo '<p> Le mdp doit comporter entre 6 et 20 caractères </p>';
        }

        // Si le code arrive ici c'est qu'aucune des conditions n'est remplie et par conséquent que les conditions sont bien remplies

        // On peut donc stocker les informations de $_POST dans la session avec les clés correspondantes
        $_SESSION['nom'] = trim($_POST['nom']);
        $_SESSION['prenom'] = trim($_POST['prenom']);
        $_SESSION['email'] = trim($_POST['email']);
        $_SESSION['mdp'] = trim($_POST['mdp']);

        // Redirection vers la page d'accueil après validation
            header('Location: accueil.php');
            exit(); // Toujours utiliser exit() après une redirection
        
    } else {
        // Si tous les champs n'apparaissent pas, un message d'erreur est affiché
        echo '<p> Erreur : Il manque des champs à remplir </p>';
    }
} else {
    // Sinon on envoit un message d'erreur
    echo '<p> Erreur : Le bouton de soumission n\'a pas été cliqué ou la méthode n\'est pas POST';
}
