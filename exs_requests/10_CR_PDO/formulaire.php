<?php
    session_start();

    // Inclure la connexion à la base de données
    require_once 'db/database.php';
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
    <!-- Zone d'affichage des messages -->
    <?php if (isset($_SESSION['message'])): ?>
        <div class="success-message">
            <?php $_SESSION['message'] ?>
        </div>
        <?php unset($_SESSION['message']); // Supprime le message après affichage ?>
    <?php endif; ?>

    <?php if (isset($_SESSION['errors'])): ?>
        <div class="error-message">
            <ul>
                <?php foreach ($_SESSION['errors'] as $error): ?>
                    <li><?php $error ?></li>
                <?php endforeach; ?>
            </ul>
        </div>
        <?php unset($_SESSION['errors']); // Supprime les erreurs après affichage ?>
    <?php endif; ?>

    <form method="post" action="process.php">
        <h1>Ajouter un employé</h1>

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

        <!-- <div class="radio-group">
            <label>Sexe</label><br>
            <input type="radio" name="sexe" value="m" checked> Homme
            <input type="radio" name="sexe" value="f"> Femme
        </div> -->
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

        <input type="submit" value="Enregistrer" name="submit_form">
    </form>

    <form action="process.php" method="POST" enctype="multipart/form-data">
        <label for="photo">Ajouter ou changer de photo de profil</label>
        <input type="file" name="photo" id="photo">

        <!-- Sélection de l'employé -->
        <label for="employe">Choisissez l'employé :</label>
        <select name="employe_id" id="employe_id" required>
            <option value="">-- Sélectionnez un employé --</option>
            <?php
                // Récupérer tous les employés depuis la base de données
                $stmt = $pdo->query("SELECT id, prenom, nom FROM employes");
                var_dump(($stmt));
                if (!$stmt) {
                    print_r($pdo->errorInfo());
                }
                while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
                    echo "<option value='{$row['id']}'>{$row['prenom']} {$row['nom']}</option>";
                }
            ?>
        </select>

        <input type="submit" value="Changer de photo" name="submit_photo">
    </form>

</body>

</html>

