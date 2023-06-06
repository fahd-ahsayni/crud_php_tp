<?php
include 'dbconfig.php';

$id = $_POST['id'];
$prenom = $_POST['prenom'];
$nom = $_POST['nom'];
$email = $_POST['email'];

try {
    $stmt = $connexion->prepare("UPDATE users SET prenom=:prenom, nom=:nom, email=:email WHERE id=:id");
    $stmt->bindParam(':prenom', $prenom);
    $stmt->bindParam(':nom', $nom);
    $stmt->bindParam(':email', $email);
    $stmt->bindParam(':id', $id);
    $stmt->execute();

    header('Location: lecture_data.php');
    
} catch(PDOException $e) {
    echo "Erreur: " . $e->getMessage();
}
$connexion = null;
?>
