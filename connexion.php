<?php require 'config.php'; ?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Connexion</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css">
    <link rel="stylesheet" href="assets/css/style.css">
</head>
<body class="d-flex flex-column justify-content-center align-items-center vh-100 bg-light">
    <a href="index.php" class="close-btn">
        <i class="fas fa-times"></i>
    </a>
    <div class="container">
        <div class="card shadow p-4" style="max-width: 400px; margin: auto;">
            <h2 class="text-center mb-4">Connexion</h2>

            <!-- Affichage des erreurs -->
            <?php if (isset($_GET['error'])): ?>
                <p class="text-danger text-center"><?php echo htmlspecialchars($_GET['error']); ?></p>
            <?php endif; ?>

            <form action="traitement-c.php" method="POST">
                <div class="mb-3">
                    <label for="email" class="form-label">Email :</label>
                    <input type="email" class="form-control" name="email" required>
                </div>
                <div class="mb-3">
                    <label for="password" class="form-label">Mot de passe :</label>
                    <input type="password" class="form-control" name="password" required>
                </div>
                <div class="d-grid">
                    <button type="submit" class="btn btn-primary">Se connecter</button>
                </div>
            </form>
            <p class="text-center mt-3">
                Pas encore inscrit ? <a href="inscription.php" class="text-decoration-none">Créez un compte</a>
            </p>
        </div>
    </div>
</body>
</html>