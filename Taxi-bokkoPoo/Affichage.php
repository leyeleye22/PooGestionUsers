<?php
require_once 'Databases.php';
$db = new Databases();
$list = $db->AfficheP();

?>
<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tableau de données</title>
    <link rel="stylesheet" type="text/css" href="styles.css">
</head>
<style>
    table {
        width: 100%;
        border-collapse: collapse;
    }

    table th,
    table td {
        border: 1px solid #000;
        padding: 8px;
        text-align: center;
    }

    table th {
        background-color: #007BFF;
        color: #fff;
    }

    table tr:nth-child(even) {
        background-color: #f2f2f2;
    }
</style>

<body>
    <h1>Liste des Utilisateur du site</h1>
    <table>
        <thead>
            <tr>
                <th>Nom</th>
                <th>Prénom</th>
                <th>Adresse mail</th>
                <th>Date Inscription</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($list as $leye) : ?>
                <tr>
                    <td><?php echo $leye['nom']; ?></td>
                    <td><?php echo $leye['prenom']; ?></td>
                    <td><?php echo $leye['email']; ?></td>
                    <td><?php echo $leye['dateInscription']; ?></td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</body>

</html>