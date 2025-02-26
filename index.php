
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="assets/css/style.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Tenor+Sans&display=swap" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
    <title>Système de réservation</title>
</head>
<body class="d-flex flex-column" style="min-height: 100vh;">
    <header>
        <?php require 'header.php'; ?>
    </header>

    <main class="flex-grow-1 d-flex flex-column justify-content-center align-items-center text-center" style="background-color: #f8f9fa;">
        <h1 class="mb-3">Bienvenue sur notre système de réservation</h1>
        <p class="mb-4">Réservez votre créneau en toute simplicité !</p>
        <a href="reservation.php" class="btn btn-success btn-lg">Réserver maintenant</a>
    </main>

    <footer class="bg-dark text-white text-center pt-4 pb-2">
        <?php require 'footer.php'; ?>
    </footer>
</body>
</html>