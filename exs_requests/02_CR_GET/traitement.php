<?php

/** Exercice 1 : Affichage des paramètres
 * 
 *  Objectif : Afficher tous les paramètres passés dans l'URL
 * 
 * 
 *  1 . En gardant la page de rendu HTML, utiliser les informations de cette page pour les passer en paramètres d'URL
 * 
 *  2 . Dans ce second fichier nommé : traitement.php, $_GET doit être récupéré, vérifié et ses paramètres affichés sur le navigateur 
 * 
 */

 var_dump($_GET);
if (isset($_GET)) {
    foreach ($_GET as $key => $value) {
        echo "<p>" . htmlspecialchars($key) . ": " .  htmlspecialchars($value) . "</p>";
    }
} else {
    echo "<p> Il n'y a aucun paramètre passé dans l'URL </p>";
}

/** Exercice 2 : Validation des paramètres
 * 
 *  Objectif : Valider les paramètres reçus dans l'URL et afficher un message d'erreur si un paramètre est manquant
 * 
 *  1 . S'assurer que les paramètres article,couleur et prix sont présents dans l'URL
 * 
 *  2. Si un ou plusieurs paramètres manquent, afficher un message d'erreur spécifique pour chacun
 * 
 *  Exemple : "<p> Le paramètre 'Article' est manquant'"
 * 
 *  Tester en retirant des paramètres dans le href de la balise <a>
 */

if (isset($_GET['article']) && isset($_GET['couleur']) && isset($_GET['prix'])) {
    echo '<p> le paramètre ' . htmlspecialchars($_GET['article']) . ' est présent </p>';
    echo '<p> le paramètre ' . htmlspecialchars($_GET['couleur']) . ' est présent </p>';
    echo '<p> le paramètre ' . htmlspecialchars($_GET['prix']) . ' est présent </p>';
} else if (!isset($_GET['article'])) {
    echo '<p> Le paramètre ' . htmlspecialchars($_GET['article']) . 'est absent </p>';
} else if (!isset($_GET['couleur'])) {
    echo '<p> Le paramètre ' . htmlspecialchars($_GET['couleur']) . 'est absent </p>';
} else if (!isset($_GET['prix'])) {
    echo '<p> Le paramètre ' . htmlspecialchars($_GET['prix']) . 'est absent </p>';
}

/** Exercice 3 : Conversion du prix
 * 
 *  Objectif : Convertir le prix reçu dans l'URL de dollars à euros (utiliser le taux de conversion de 1 dollar = 0.92 euros)
 * 
 *  1 . Récupérer le dollars passé dans l'URL
 * 
 *  2 . Convertir en euros
 * 
 *  3 . Afficher le prix converti
 */

if (isset($_GET['prix'])) {
    $prix_dollars = $_GET['prix'];
    $prix_euros = $prix_dollars * 0.92;

    echo '<p> prix en dollars ' . htmlspecialchars($prix_dollars).'$'. ' </p>';
    echo '<p> prix en euros '  . htmlspecialchars($prix_euros).'€' . '</p>';
} else {
    echo '<p> Le paramètre ' . htmlspecialchars($_GET['prix']) . ' n\'existe pas </p>';
}

/** Exercice 4 : Affichage d'un message personnalisé
 * 
 *  Objectif : Afficher un message personnalisé en fonction de la couleur passée dans l'URL
 * 
 *  1 . Récupérer la couleur passée dans l'URL
 * 
 *  2 . Afficher un message en fonction de la couleur ( exemple si couleur jaune : "<p> Cette couleur me fait penser au soleil ! </p>)
 * 
 */

if (isset($_GET['couleur'])) {
    switch ($_GET['couleur']) {
        case 'rouge':
            echo "<p> La couleur " . htmlspecialchars($_GET["couleur"]) . ' me fait penser à la confiture de fraise </p>';
            break;
        case 'bleue':
            echo '<p> La couleur ' . htmlspecialchars($_GET['couleur']) . ' me fait penser au ciel sans les nuages </p>';
            break;
        case 'jaune':
            echo '<p> La couleur ' . htmlspecialchars($_GET['couleur']) . ' me fait penser a un magnifique soleil </p>';
            break;
        case 'verte':
            echo 'La couleur ' . htmlspecialchars($_GET['couleur']) . ' me fait penser à un joli brin d\'herbe </p>';
            break;
        default:
            echo '<p> La couleur ' . htmlspecialchars($_GET['couleur']) . ' est très jolie aussi </p>';
    }
} else {
    echo '<p> Aucun paramètre couleur n\'existe </p>';
}
/** Exercice 5 : Vérification du prix minimum
 * 
 *  Objectif : Vérifier si le prix reçu dans l'URL est supérieur à un montant minimum et afficher un message approprié
 * 
 *  1 . Déclarer un prix minimum (20 par exemple)
 * 
 *  2 . Comparer le prix reçu dans l'URL avec le prix minimum
 * 
 *  3 . Afficher un message indiquant si le prix est suffisant ou non 
 */

if (isset($_GET['prix'])) {
    $miniPrix = 20;

    if ($_GET['prix'] < $miniPrix) {
        echo '<p> le prix est insuffisant </p>';
    } else {
        echo '<p> Le prix est suffisant </p>';
    }
}
