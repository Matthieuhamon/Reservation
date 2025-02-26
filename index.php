
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

    <main class="flex-grow-1">
        <form method="POST" action="traitement.php">
        1er nombre : <input type="text" name="nombre1">
        Opérateur : <input type="text" name="opérateur">
        2ème nombre : <input type="text" name="nombre2">
        <input type="submit" value="Envoyer">
        </form>
    </main>

    <footer class="bg-dark text-white text-center pt-4 pb-2" style="margin-top: 10vh;">
        <?php require 'footer.php'; ?>
    </footer>
</body>
</html>