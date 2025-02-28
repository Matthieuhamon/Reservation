<?php require 'config.php'; ?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Tenor+Sans&display=swap" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
    <link rel="stylesheet" type="text/css" href="assets/css/style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css">
    <title>Système de réservation</title>
</head>

<body class="d-flex flex-column" style="min-height: 100vh;">
    <header>
        <nav class="navbar navbar-expand-lg bg-black" data-bs-theme="dark">
            <div class="container-fluid py-3 px-5">
                <a class="nav-link active titre fs-4 text-white" href="index.php">Book'in Time</a>
                <div class="collapse navbar-collapse" id="navbarNav">
                    <ul class="navbar-nav ms-auto gap-4">
                        <li class="nav-item">
                            <a class="btn btn-outline-success rounded-pill fs-5 me-2" href="inscription.php">S'inscrire</a>
                        </li>
                        <li class="nav-item">
                            <a class="btn btn-outline-primary rounded-pill fs-5 me-5" href="connexion.php">Se connecter</a>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>
    </header>

    <main class="flex-grow-1 d-flex flex-column justify-content-center align-items-center text-center" style="background-color: #f8f9fa;">
        <h1 class="mb-3 titre">Bienvenue sur notre système de réservation</h1>
        <p class="mb-4">Réservez votre créneau en toute simplicité !</p>
        <a href="connexion.php" class="btn btn-success btn-lg">Réserver maintenant</a>
    </main>

    <footer class="bg-dark text-white text-center pt-4 pb-2">
    <p>&copy; 2025 Book'in Time. Tous droits réservés.</p>
    <p>
        <a href="#">Facebook</a> | 
        <a href="#">Instagram</a> | 
        <a href="#">Twitter</a>
    </p>
</footer>
</body>
</html>
