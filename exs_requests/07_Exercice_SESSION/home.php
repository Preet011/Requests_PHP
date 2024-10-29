<?php session_start();

if (!isset($_SESSION)) {
    echo "<h2>No user found! Try to reconnect.</h2>";
}

?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home Page</title>
</head>
<body>

<?php

echo "<h2> Welcome, " .  htmlspecialchars( $_SESSION['prenom']) . "  " .htmlspecialchars($_SESSION['nom']) . "! </h2>";

echo "<h3>Email: " . htmlspecialchars( $_SESSION['email']) . "</h3>";

var_dump($_SESSION);

?>

</body>
</html>