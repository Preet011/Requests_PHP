
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>include GET</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
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


// EXERCICE 1


if (!empty($_GET)) {
    echo '<div class="details">';
    echo '<h1>Product details:</h1>';
    echo '<p>Article : ' . htmlspecialchars($_GET['article']) . '</p>';
    echo '<p>Color : ' . htmlspecialchars($_GET['color']) . '</p>';
    echo '<p>Price : ' . htmlspecialchars($_GET['price']) . '$</p>';
    echo '</div>';
} else {
    echo '<p class="error">No parameters!</p>';
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
 */


 // EXERCICE 2


$required = ['article', 'color','price'];
foreach ($required as $param){
    if (!isset($_GET[$param])) {
       echo "<p>The parameter $param is missing</p>";
    }
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


  // EXERCICE 3

 if(isset($_GET['price'])){
    $price_dollars = (float)$_GET['price'];
    $convert_rate = 0.92;
    $price_euros = $price_dollars * $convert_rate;
    echo '<div class="details">';
    echo "<p>Price in euros is: " . number_format($price_euros, 2) . "€</p>";
    echo '</div>';
};



/** Exercice 4 : Affichage d'un message personnalisé
 *
 *  Objectif : Afficher un message personnalisé en fonction de la couleur passée dans l'URL
 *
 *  1 . Récupérer la couleur passée dans l'URL
 *
 *  2 . Afficher un message en fonction de la couleur ( exemple si couleur jaune : "<p> Cette couleur me fait penser au soleil ! </p>)
 *
 */

 // EXERCICE 4


if(isset($_GET['color'])){
    $color = $_GET['color'];
    echo '<div class="details">';
    switch ($color) {
        case 'black':
            echo "<p>This color evokes mystery, power, fear and sadness.</p>";
            break;
        case 'pink':
            echo "<p>This color lifts our spirit and represent softness..</p>";
            break;
        case 'brown':
            echo "<p>This color can remindes you of wood and soil.</p>";
            break;
        default:
            echo "<p>Color not found</p>";
            break;
    }
    echo '</div>';
};

/** Exercice 5 : Vérification du prix minimum
 *
 *  Objectif : Vérifier si le prix reçu dans l'URL est supérieur à un montant minimum et afficher un message appriprié
 *
 *  1 . Déclarer un prix minimum (20 par exemple)
 *
 *  2 . Comparer le prix reçu dans l'URL avec le prix minimum
 *
 *  3 . Afficher un message indiquant si le prix est suffisant ou non
 */

 //  // EXERCICE 5

 $min_price = 28;

 if(isset($_GET['price'])){

    $price = (float)$_GET['price'];

    if ($price >= $min_price) {

    echo '<div class="details">';
    echo "<p>The price is sufficient.</p>";
    echo '</div>';}

    else {
        echo '<div class="details">';
        echo "<p>The price is too low. It needs to be higher than $min_price $</p>";
        echo '</div>';}

    };


?>
</body>
</html>
