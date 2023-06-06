<?php
include 'dbconfig.php';

$id = $_GET['id'];

try {
    $stmt = $connexion->prepare("SELECT * FROM users WHERE id=:id");
    $stmt->bindParam(':id', $id);
    $stmt->execute();
    $user = $stmt->fetch();
} catch (PDOException $e) {
    echo "Erreur: " . $e->getMessage();
}

?>

<!doctype html>
<html lang="fr">

<head>
    <meta charset="utf-8">
    <title>Mise à jour des informations de l'utilisateur</title>
</head>

<body>
    <h1>Mise à jour des informations de l'utilisateur</h1>
    <form action="modifier_data.php" method="post">
        <input type="hidden" name="id" value="<?php echo $id; ?>">
        <label for="prenom">Prénom:</label><br>
        <input type="text" id="prenom" name="prenom" value="<?php echo $user['prenom']; ?>"><br>
        <label for="nom">Nom:</label><br>
        <input type="text" id="nom" name="nom" value="<?php echo $user['nom']; ?>"><br>
        <label for="email">Email:</label><br>
        <input type="text" id="email" name="email" value="<?php echo $user['email']; ?>"><br>
        <input type="submit" value="Mettre à jour">
    </form>
</body>

</html>