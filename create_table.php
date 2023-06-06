<?php
include 'dbconfig.php';

try {
    // SQL pour créer une table
    $sql = "CREATE TABLE users2 (
    id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    prenom VARCHAR(30) NOT NULL,
    nom VARCHAR(30) NOT NULL,
    email VARCHAR(50),
    date_inscription TIMESTAMP
    )";

    // on utilise exec() car aucune donnée n'est retournée
    $connexion->exec($sql);
    echo "Table user créée avec succès";
} catch(PDOException $e) {
    echo $sql . "<br>" . $e->getMessage();
}

$connexion = null;
