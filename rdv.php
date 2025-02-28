<?php
session_start();
require 'config.php';

// Vérifier si l'utilisateur est connecté
if (!isset($_SESSION['user_id'])) {
    header("Location: connexion.php");
    exit();
}

// Récupérer les rendez-vous de l'utilisateur
$user_id = $_SESSION['user_id'];
$stmt = $conn->prepare("SELECT * FROM rendez_vous WHERE utilisateur_id = ?");
$stmt->execute([$user_id]);
$rendez_vous = $stmt->fetchAll();
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gestion des Rendez-vous</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="container my-5">
        <h1 class="text-center mb-4">Book'in Time</h1>

        <?php if (isset($_GET['success'])) { echo "<div class='alert alert-success'>" . htmlspecialchars($_GET['success']) . "</div>"; } ?>
        <?php if (isset($_GET['error'])) { echo "<div class='alert alert-danger'>" . htmlspecialchars($_GET['error']) . "</div>"; } ?>

        <!-- Formulaire de réservation -->
        <form class="mb-5" action="traitement-rdv.php" method="POST">
            <div class="mb-3">
                <label for="date" class="form-label">Sélectionnez une date</label>
                <input type="date" class="form-control" id="date" name="date" required>
            </div>
            <div class="mb-3">
                <label for="heure" class="form-label">Sélectionnez une heure</label>
                <input type="time" class="form-control" id="heure" name="heure" required>
            </div>
            <button type="submit" name="reserver" class="btn btn-success">Réserver</button>
        </form>

    <!-- Liste des rendez-vous -->
    <h3>Vos Rendez-vous</h3>
    <table class="table">
        <thead>
            <tr>
                <th>Date</th>
                <th>Heure</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($rendez_vous as $rdv): ?>
                <tr>
                    <td><?= htmlspecialchars($rdv['date_heure']); ?></td>
                    <td>
                        <form action="traitement-rdv.php" method="POST">
                            <input type="hidden" name="rdv_id" value="<?= $rdv['id']; ?>">
                            <button type="submit" name="supprimer" class="btn btn-danger">Annuler</button>
                        </form>
                    </td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>

    <a href="profil.php" class="btn btn-secondary mt-3">Retour au profil</a>
    </div>
</body>
</html>
