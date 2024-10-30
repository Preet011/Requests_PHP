<?php
    session_start();


    $message = '';
    if (isset($_SESSION['message'])) {
        $message = $_SESSION['message'];
        unset($_SESSION['message']);
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

        <label for="username">Pseudonyme</label>
        <input type="text" id="username" name="username">

        <label for="email">Email</label>
        <input type="email" id="email" name="email">

        <label for="telephone">Telephone</label>
        <input type="text" id="telephone" name="telephone">

        <label for="sexe">Sexe</label>
        <select name="sexe" id="sexe">
            <option value="m">Homme</option>
            <option value="f">Femme</option>
        </select>

        <label for="service">Service</label>
        <input type="text" id="service" name="service">

        <label for="date_embauche">Date d'embauche</label>
        <input type="text" id="date_embauche" name="date_embauche">

        <label for="salaire">Salaire</label>
        <input type="text" id="salaire" name="salaire">

        <label for="profile_photo">profile photo</label>
        <input type="file" id="profile_photo" name="profile_photo">

        <input type="submit" value="Enregistrer" name="submit_form">
    </form>
</body>

</html>

