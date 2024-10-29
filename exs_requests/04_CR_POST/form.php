<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Exs POST CR</title>
</head>
<body>
    <h1>Formulaire 2</h1>
    <form action="traitement.php" method="POST">
        <label for="name">Nom</label>
        <input type="text" id="name" name="name" value=<?php echo isset($_POST['name']) ? htmlspecialchars($_POST['name']) : "" ?> >

        <label for="firstname">Prénom</label>
        <input type="text" id="firstname" name="firstname" value=<?php echo isset($_POST['firstname']) ? htmlspecialchars($_POST['firstname']) : "" ?> >

        <label for="email">Email</label>
        <input type="text" id="email" name="email" value=<?php echo isset($_POST['email']) ? htmlspecialchars($_POST['email']) : "" ?> >

        <label for="city">Ville</label>
        <input type="text" id="city" name="city" value=<?php echo isset($_POST['city']) ? htmlspecialchars( $_POST['city']) : "" ?>>

        <label for="mdp">Mot de passe</label>
        <input type="text" id="mdp" name="mdp" value=<?php echo isset($_POST['mdp']) ? htmlspecialchars($_POST['mdp']) : "" ?>>

        <label for="country">Pays</label>
        <input type="text" id="country" name="country" value=<?php echo isset($_POST['country']) ? htmlspecialchars($_POST['country']) : ""?>>

        <input type="submit" value="Envoyer">
    </form>

</body>

</html>