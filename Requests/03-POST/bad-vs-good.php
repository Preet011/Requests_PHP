<!-- MAUVAISE PRATIQUE : Utiliser des paramètres d'URL avec POST -->

<form action="process.php?id=123&action=submit" method="POST">
    <label for="name">Nom :</label>
    <input type="text" name="name" id="name" required>
    <input type="submit" value="Envoyer">
</form>

<?php
// process.php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Accès aux données de l'URL (mauvaise pratique)
    $id = $_GET['id'];  // Les données sensibles peuvent être visibles dans l'URL
    $action = $_GET['action'];

    // Accès aux données POST
    $name = $_POST['name'];

    echo "ID: $id<br>";
    echo "Action: $action<br>";
    echo "Nom: $name<br>";
}
?>

<!--
    Problèmes ici 🔼
        - Les paramètres id et action sont passés via l'URL ($_GET), bien que la méthode soit POST. Ces données peuvent être modifiées facilement ou exposées dans l'historique du navigateur.
        - Cela introduit des risques de sécurité, surtout si des informations sensibles sont transmises.
-->

<!-- ********************************************************************************************************** -->

<!-- BONNE PRATIQUE : Envoyer toutes les données via POST -->

<form action="post.php" method="POST">
    <input type="hidden" name="id" value="123"> <!-- Utilisation de champs cachés -->
    <input type="hidden" name="action" value="submit">

    <label for="name">Nom :</label>
    <input type="text" name="name" id="name" required>
    <input type="submit" value="Envoyer">
</form>

<?php
// process.php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Accès sécurisé aux données POST
    $id = $_POST['id'];
    $action = $_POST['action'];
    $name = $_POST['name'];

    echo "ID: $id<br>";
    echo "Action: $action<br>";
    echo "Nom: $name<br>";
}
?>

<!--
    Bonnes pratiques ici 🔼
        - Les données sont envoyées via le corps de la requête POST, ce qui les rend invisibles dans l'URL.
        - L'utilisation de champs cachés (<input type="hidden">) permet de passer des informations non visibles à l'utilisateur mais disponibles pour le traitement côté serveur. (l'autre moyen serait de passer par les SESSION. À voir plus tard)
        - Cela réduit l'exposition aux risques de sécurité et garantit que les données ne sont pas mises en cache ou modifiées via l'URL.

-->
