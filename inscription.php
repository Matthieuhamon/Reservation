<?php require 'config.php'; ?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Inscription</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css">
    <link rel="stylesheet" href="assets/css/style.css">
</head>
<body class="d-flex flex-column justify-content-center align-items-center vh-100 bg-light">
    <a href="index.php" class="close-btn">
        <i class="fas fa-times"></i>
    </a>
    <div class="container">
        <div class="card shadow p-4" style="max-width: 600px; margin: auto;">
            <h2 class="text-center mb-4">Inscription</h2>
            <form action="traitement.php" method="POST">
                <div class="row">
                    <div class="col-md-6 mb-3">
                        <label for="nom" class="form-label">Nom :</label>
                        <input type="text" class="form-control" name="nom" required>
                    </div>
                    <div class="col-md-6 mb-3">
                        <label for="prenom" class="form-label">Prénom :</label>
                        <input type="text" class="form-control" name="prenom" required>
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-6 mb-3">
                        <label for="email" class="form-label">Email :</label>
                        <input type="email" class="form-control" name="email" required>
                    </div>
                    <div class="col-md-6 mb-3">
                        <label for="telephone" class="form-label">Téléphone :</label>
                        <input type="tel" class="form-control" name="telephone" required>
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-6 mb-3">
                        <label for="date_naissance" class="form-label">Date de naissance :</label>
                        <input type="date" class="form-control" name="date_naissance" required>
                    </div>
                    <div class="col-md-6 mb-3">
                        <label for="adresse" class="form-label">Adresse :</label>
                        <input type="text" class="form-control" name="adresse" required>
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-6 mb-3">
                        <label for="password" class="form-label">Mot de passe :</label>
                        <input type="password" class="form-control" name="password" required>
                    </div>
                    <div class="col-md-6 mb-3">
                        <label for="password_confirm" class="form-label">Confirmer le mot de passe :</label>
                        <input type="password" class="form-control" name="password_confirm" required>
                    </div>
                </div>

                <div class="d-grid">
                    <button type="submit" class="btn btn-success">S'inscrire</button>
                </div>
            </form>
            <p class="text-center mt-3">
                Déjà un compte ? <a href="connexion.php" class="text-decoration-none">Connectez-vous</a>
            </p>
        </div>
    </div>
</body>
</html>