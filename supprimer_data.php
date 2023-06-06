<?php
include 'dbconfig.php';

if (isset($_GET['id'])) {
    $id = $_GET['id'];

    try {
        $stmt = $connexion->prepare("DELETE FROM users WHERE id=:id");
        $stmt->bindParam(':id', $id);
        $stmt->execute();

        header('Location: lecture_data.php');

        exit;
    } catch(PDOException $e) {
        echo "Erreur: " . $e->getMessage();
    }
} else {
    echo "ID not provided.";
}

$connexion = null;
?>
