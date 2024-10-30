<?php

// 2- connexion :
try {
    $pdo = new PDO(
        'mysql:host=localhost;dbname=societe3',
        'root',
        '',
        array(
            PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
            PDO::MYSQL_ATTR_INIT_COMMAND => 'set NAMES utf8'
        )
    );
} catch (PDOException $e) {

    echo '<p class="error">Erreur de connexion à la base de données : ' . $e->getMessage() . '</p>';

    die;
}

?>