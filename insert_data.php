<?php
include 'dbconfig.php';

try {
    $stmt = $connexion->prepare("INSERT INTO users (prenom, nom, email) VALUES (:prenom, :nom, :email)");
    $stmt->bindParam(':prenom', $prenom);
    $stmt->bindParam(':nom', $nom);
    $stmt->bindParam(':email', $email);

    $prenom = $_POST['prenom'];
    $nom = $_POST['nom'];
    $email = $_POST['email'];
    $stmt->execute();

    header('Location: index.html');
    
    exit;
} catch(PDOException $e) {
    echo "Erreur: " . $e->getMessage();
}
$connexion = null;
?>
