<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->

    <title>Liste des utilisateurs</title>
</head>

<body>
    <div class="container">
        <h1>Liste des utilisateurs</h1>
        <a href="index.html" class="btn btn-primary mb-3">Ajouter un utilisateur</a>
        <?php
        include 'dbconfig.php';

        try {
            $stmt = $connexion->prepare("SELECT id, prenom, nom, email, date_inscription FROM users");
            $stmt->execute();
            $users = $stmt->fetchAll();
        } catch(PDOException $e) {
            echo "Erreur: " . $e->getMessage();
        }

        if (empty($users)) {
            echo "<p>Aucun utilisateur trouvé.</p>";
        } else {
        ?>
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Prénom</th>
                        <th>Nom</th>
                        <th>Email</th>
                        <th>Date d'inscription</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    foreach ($users as $user) {
                        echo "<tr>
                            <td>" . $user['id'] . "</td>
                            <td>" . $user['prenom'] . "</td>
                            <td>" . $user['nom'] . "</td>
                            <td>" . $user['email'] . "</td>
                            <td>" . $user['date_inscription'] . "</td>
                            <td>
                                <a href='form_modifier.php?id=" . $user['id'] . "' class='btn btn-warning'>Modifier</a>
                                <a href='supprimer_data.php?id=" . $user['id'] . "' class='btn btn-danger'>Supprimer</a>
                            </td>
                        </tr>";
                    }
                    ?>
                </tbody>
            </table>
        <?php } ?>
    </div>

    <!-- Bootstrap JavaScript -->
</body>

</html>
