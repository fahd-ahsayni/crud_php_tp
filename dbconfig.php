<?php
$nomServeur = "localhost";
$nomUtilisateur = "root";
$motDePasse = "";
$nomBaseDeDonnees = "Naji_db"; // nom de base de donnees

try {
    $connexion = new PDO("mysql:host=$nomServeur;dbname=$nomBaseDeDonnees", $nomUtilisateur, $motDePasse);
    $connexion->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch(PDOException $e) {
    echo "Échec de la connexion: " . $e->getMessage();
}
