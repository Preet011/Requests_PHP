<?php session_start(); ?>

<?php

if($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["submit"])){

    $lastname  = trim($_POST['nom'] );
    $firstname= trim($_POST['prenom'])  ;
    $email = trim($_POST['email'] ) ;
    $mdp = trim($_POST['mdp']) ;

    var_dump($_POST);

    $valid = true;

        if (mb_strlen($firstname) < 2 || mb_strlen($firstname) > 30) {
            echo "<p>First name must be between 2 and 30 characters.</p>";
            $valid = false;
        }

        if (mb_strlen($lastname) < 2 || mb_strlen($lastname) > 30) {
            echo "<p>Last name must be between 2 and 30 characters.</p>";
            $valid = false;
        }


        if (mb_strlen($mdp) < 6 || mb_strlen($mdp) > 20) {
            echo "<p>Password must be between 6 and 20 characters.</p>";
            $valid = false;
        }

if ($valid) {

    $_SESSION['prenom'] = $firstname;
    $_SESSION['nom'] = $lastname;
    $_SESSION['email'] = $email;
    $_SESSION['mdp'] = $mdp;

    print_r($_SESSION);

    header("Location: home.php");

    exit();

}

} else {
    echo "<p>Form not submitted</p>";
}

// var_dump($_SESSION);

?>

