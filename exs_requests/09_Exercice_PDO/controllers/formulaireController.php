<?php
session_start();
 require 'db/data.php';
?>
<?php
if (isset($_POST['submit_form']) && $_SERVER['REQUEST_METHOD'] == "POST") {
    $prenom = $_POST['prenom'];
    $nom = $_POST['nom'];
    $username = $_POST['username'];
    $email = $_POST['email'];
    $telephone = $_POST['telephone'];
    $sexe = $_POST['sexe'];
    $service = $_POST['service'];
    $date_embauche = $_POST['date_embauche'];
    $salaire = $_POST['salaire'];

$message = '';

// EXERCICE 1

if (!strpos($email, '@') || !strpos($email, '.') ){
$message .=  '<p class="error"> Erreur: Invalid email format </p>';

}

// EXERCICE 2

if (!is_numeric($telephone) || strlen($telephone) < 10 || strlen($telephone) > 20 ) {
    $message .=  '<p class="error"> Erreur: Phone number must be numberic and between 10 to 20 characters.</p>';

}
// EXERCICE 3

if ($sexe !== 'm' && $sexe !== 'f' ) {
    $message .=  '<p class="error"> Erreur: Invalid gender</p>';
}

// EXERCICE 4

if (preg_match('/^\d{2}-\d{2}-\d{4}$/', $date_embauche)) {
    $date = new DateTime($date_embauche);
    $date_embauche = $date->format('Y-m-d');
    //var_dump($date_embauche);
} else {
    $message .=  '<p class="error">Erreur: Invalid date format</p>';
}

// EXERCICE 5

if (preg_match('/^\d+(.\d{1,2})?$/',$salaire) || $salaire <= 0) {
    $message .=  '<p class="error">Erreur: Invalid salary amount</p>';
}

// EXERCICE 6

if (strlen($username) < 5 || strlen($username) > 15  ) {
    $message .=  '<p class="error">Erreur:  Username must be between 5 to 15 characters.</p>';
}

// EXERCICE 7

if (empty($message)) {

    try {
        $request = $pdo->prepare('INSERT INTO employes (prenom, nom, username, email, telephone, sexe, service, date_embauche, salaire, profile_photo) VALUES (?,?,?,?,?,?,?,?,?,?)');

        $request -> execute([$prenom, $nom, $username, $email, $telephone, $sexe, $service, $date_embauche, $salaire, $profile_photo]);

        $message .= '<p class="success "> Employee registered </p>';
    }
    catch (PDOException $e) {

        echo $e->getMessage();


    }
}
$_SESSION['message'] = $message;


header('Location: ../formulaire.php');

exit;
}
?>