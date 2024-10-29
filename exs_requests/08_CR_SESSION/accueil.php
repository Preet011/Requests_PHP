<?php
// On démarre la session
session_start();

// On vérifie si les informations sont bien présentes dans la session
if (isset($_SESSION['nom']) && isset($_SESSION['prenom']) && isset($_SESSION['email'])) {
    // Si oui, on affiche un message de bienvenue avec les informations
    echo '<h1>Bienvenue, ' . htmlspecialchars($_SESSION['prenom']) . ' ' . htmlspecialchars($_SESSION['nom']) . '!</h1>';
    echo '<p>Votre email : ' . htmlspecialchars($_SESSION['email']) . '</p>';
} else {
    // Si les informations ne sont pas présentes, on invite l'utilisateur à s'inscrire à nouveau
    echo '<p>Erreur : aucune information trouvée. Veuillez vous inscrire à nouveau.</p>';
}
?>
