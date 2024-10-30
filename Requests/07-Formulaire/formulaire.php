<?php
    session_start();  // Démarre la session pour récupérer les messages

    // Récupération des messages (s'il y en a) depuis la session
    $message = '';
    if (isset($_SESSION['message'])) {
        $message = $_SESSION['message'];
        unset($_SESSION['message']);  // On supprime le message de la session après l'avoir affiché
    }
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Formulaire d'enregistrement</title>
    <link rel="stylesheet" href="css/style.css">
</head>

<body>
    <div class="header-img">
        <img src="./img/logo_poleS.png" alt="Logo PoleS">
    </div>
    <form method="post" action="controllers/formulaireController.php">
        <h1>Ajouter un employé</h1>

        <!-- Message d'erreur ou succès -->
        <?php if (!empty($message)): ?>
            <div class="message <?= strpos($message, 'Erreur') !== false ? 'error' : 'success' ?>">
                <?= $message ?>
            </div>
        <?php endif; ?>

        <label for="prenom">Prénom</label>
        <input type="text" id="prenom" name="prenom">

        <label for="nom">Nom</label>
        <input type="text" id="nom" name="nom">

        <div class="radio-group">
            <label>Sexe</label><br>
            <input type="radio" name="sexe" value="m" checked> Homme
            <input type="radio" name="sexe" value="f" <?php if (isset($_POST['sexe']) && htmlspecialchars($_POST['sexe']) == 'f') echo 'checked'; ?>> Femme
        </div>

        <label for="service">Service</label>
        <input type="text" id="service" name="service">

        <label for="date_embauche">Date d'embauche</label>
        <input type="text" id="date_embauche" name="date_embauche" placeholder="jj-mm-aaaa">

        <label for="salaire">Salaire</label>
        <input type="text" id="salaire" name="salaire" >

        <input type="submit" value="Enregistrer">
    </form>
</body>

</html>

