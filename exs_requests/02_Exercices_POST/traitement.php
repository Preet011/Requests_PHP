<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Formulaire</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
<?php


 // EXERCICE 1

$errors = [];
$warning = "";
$confirm_Msg = "";
if ($_SERVER["REQUEST_METHOD"] == "POST") {


    if (empty($_POST['firstname'])) {
        $errors[] = "The field 'First name' is required";
    }
    if (empty($_POST['lastname'])) {
        $errors[] = "The field 'Last name' is required";
    }
    if (empty($_POST['email'])) {
        $errors[] = "The field 'Email' is required";
    }
    if (empty($_POST['password'])) {
        $errors[] = "The field 'Password' is required";
    }
    if (empty($_POST['city'])) {
        $errors[] = "The field 'City' is required";
    } else {  // Exercice 4
        $city_length = strlen($_POST['city']);
        if ($city_length > 20) {
          $errors[] = "The field 'City' cannot exceed 20 characters!!!";
        }else if ($city_length > 10){
            $warning = "ALERT: field 'City' is exceeding 13 characters";

    }}


    if (empty($_POST['country'])) {
        $errors[] = "The field 'Country' is required";
    }


 if (!empty($errors)) {
    echo '<div class="result">';
    echo '<h2>Empty Fields: </h2>';
    foreach ($errors as $error) {
       echo "<p style='color:red;'>$error</p/>";

    }
    echo "</div>";
 } else if (!empty($warning)) {
    echo '<div class="result">';
    echo "<p style='color:orange;'>$warning</p/>";
    echo "</div>";
 }
 // Exercice 2

if(empty($errors)) {

// Exercice 5
    $city_upper = strtoupper($_POST['city']);

    $confirm_Msg ="Thanks for submitting !";

    echo '<div class="result">';

    echo "<h2 style='color:#01422f;'>The DATA submitted is: </h2>";
    echo "<p>First name: " . htmlspecialchars($_POST['firstname']) . "</p>";
    echo "<p>Last name: " . htmlspecialchars($_POST['lastname']) . "</p>";
    echo "<p>Email: " . htmlspecialchars($_POST['email']) . "</p>";
    echo "<p>Password: " . htmlspecialchars($_POST['password']) . "</p>";
    echo "<p>City: " . htmlspecialchars($_POST['city']) . "</p>";
    echo "<p>Country: " . htmlspecialchars($_POST['country']) . "</p>";

    echo "</div>";

    echo '<div class="confirm">';
    echo "<p style='color:green;'<strong>$confirm_Msg</strong></p>";
    echo "</div>";
 }
 }




?>
<!--
Utiliser form.php pour le formulaire
// Créer un formulaire avec en champ (nom,prenom,email,motdepasse,ville,pays)
/** Exercice 1 : Validation de formulaire
 *
 *  Objectif : Vérifier si tous les champs du formulaire ont été remplis et afficher un message d'erreur pour chaque champ manquant
 *
 *  1 . S'assurer que tous les champs sont remplis avant d'afficher les données
 *
 */






/** Exercice 2 : traitement et affichage sécurisé
 *
 *  Objectif : Afficher les données du formulaire de manière sécurisée pour les éviter les attaques XSS (échapper les données) (possibilité de copier/coller le traitement de l'exercice 1)
 *
 */




/** Exercice 3 : Afficher les données précédentes
 *
 *  Objectif : Réafficher les données précédemment saisies dans le formulaire après la soumission
 *
 *  1 . Pré-remplir les champs du formulaire avec les valeurs soumises précédemment
 *
 *  *  Cet exercice se fera donc dans la partie formulaire directement ! (Vous devrez supprimer la partie action du formulaire pour qu'il redirige la requête sur la même page)
 *
 */






/** Exercice 4 : Limitation de longueur pour adresse
 *
 *  Objectif : Limiter la longueur de l'adresse saisie par l'utilisateur à 200 caractères et afficher un message d'avertissement si ce seuil est dépassé
 *
 *  1 . Verifier la longueur du champ adresse
 *
 *  2 . Afficher un message si la longueur dépasse 130 caractères
 *
 *
 * Ne pas oublier de réactiver la partie action pour qu'il redirige la requête sur cette page
 */

/** Exercice 5 : Conversion de données
 *
 *  Objectif : Convertir la ville en majuscule avant de l'afficher et afficher un message de confirmation
 *
 *  1 . Convertir la ville reçue du formulaire en majuscule
 *
 *  2 . Afficher la ville en majuscule ainsi qu'un message de confirmation 'merci pour votre soumission'
 *
 */
-->
</body>
</html>
