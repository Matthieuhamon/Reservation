<?php
session_start();

// Vérifier si l'utilisateur est connecté
if (!isset($_SESSION['user_id'])) {
    header("Location: connexion.php");
    exit();
}

// Inclure la connexion à la base de données
require 'config.php';

// Récupérer les informations de l'utilisateur
$user_id = $_SESSION['user_id'];
$stmt = $conn->prepare("SELECT * FROM utilisateurs WHERE id = ?");
$stmt->execute([$user_id]);
$user = $stmt->fetch();

if (!$user) {
    echo "Utilisateur non trouvé.";
    exit();
}

// Récupérer les rendez-vous de l'utilisateur
$stmt = $conn->prepare("SELECT id, date_heure FROM rendez_vous WHERE utilisateur_id = ? ORDER BY date_heure ASC");
$stmt->execute([$user_id]);
$rendez_vous = $stmt->fetchAll();
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Profil</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="container mt-5">
        <h1 class="text-center mb-4">Profil</h1>

        <!-- Messages de succès ou d'erreur -->
        <?php if (isset($_GET['success'])) { echo "<div class='alert alert-success'>" . htmlspecialchars($_GET['success']) . "</div>"; } ?>
        <?php if (isset($_GET['error'])) { echo "<div class='alert alert-danger'>" . htmlspecialchars($_GET['error']) . "</div>"; } ?>

        <div class="row">
            <!-- Colonne des infos utilisateur -->
            <div class="col-md-6">
                <h3>Informations personnelles</h3>
                <form action="traitement-p.php" method="POST">
                    <div class="mb-3">
                        <label for="nom" class="form-label">Nom</label>
                        <input type="text" class="form-control" id="nom" name="nom" value="<?= htmlspecialchars($user['nom']) ?>" required>
                    </div>
                    <div class="mb-3">
                        <label for="prenom" class="form-label">Prénom</label>
                        <input type="text" class="form-control" id="prenom" name="prenom" value="<?= htmlspecialchars($user['prenom']) ?>" required>
                    </div>
                    <div class="mb-3">
                        <label for="date_naissance" class="form-label">Date de naissance</label>
                        <input type="date" class="form-control" id="date_naissance" name="date_naissance" value="<?= $user['date_naissance'] ?>" required>
                    </div>
                    <div class="mb-3">
                        <label for="adresse" class="form-label">Adresse</label>
                        <input type="text" class="form-control" id="adresse" name="adresse" value="<?= htmlspecialchars($user['adresse']) ?>" required>
                    </div>
                    <div class="mb-3">
                        <label for="telephone" class="form-label">Téléphone</label>
                        <input type="text" class="form-control" id="telephone" name="telephone" value="<?= htmlspecialchars($user['telephone']) ?>" required>
                    </div>
                    <div class="mb-3">
                        <label for="email" class="form-label">Email</label>
                        <input type="email" class="form-control" id="email" name="email" value="<?= htmlspecialchars($user['email']) ?>" required>
                    </div>
                    
                    <button type="submit" name="action" value="update" class="btn btn-primary">Mettre à jour</button>
                </form>

                <!-- Suppression du compte -->
                <form action="traitement-p.php" method="POST" class="mt-3">
                    <button type="submit" name="action" value="delete_account" class="btn btn-danger" onclick="return confirm('Êtes-vous sûr de vouloir supprimer votre compte ? Toutes les données seront perdues.')">Supprimer mon compte</button>
                </form>
            </div>

            <!-- Colonne des rendez-vous -->
            <div class="col-md-6">
                <h3>Vos Rendez-vous</h3>
                <table class="table">
                    <thead>
                        <tr>
                            <th>Date et Heure</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php if (count($rendez_vous) > 0): ?>
                            <?php foreach ($rendez_vous as $rdv): ?>
                                <tr>
                                    <td><?= htmlspecialchars($rdv['date_heure']); ?></td>
                                    <td>
                                        <form action="traitement-rdv.php" method="POST">
                                            <input type="hidden" name="rdv_id" value="<?= $rdv['id']; ?>">
                                            <button type="submit" name="supprimer" class="btn btn-danger btn-sm">Annuler</button>
                                        </form>
                                    </td>
                                </tr>
                            <?php endforeach; ?>
                        <?php else: ?>
                            <tr><td colspan="2">Aucun rendez-vous pris.</td></tr>
                        <?php endif; ?>
                    </tbody>
                </table>

                <!-- Bouton pour aller à la page de prise de rendez-vous -->
                <a href="rdv.php" class="btn btn-success">Prendre un rendez-vous</a>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
