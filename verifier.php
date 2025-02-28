<?php
// verifier.php
require 'config.php';

if (isset($_GET['token'])) {
    $token = $_GET['token'];

    // Vérification du token dans la base de données
    $sql = "SELECT * FROM utilisateurs WHERE verification_token = ?";
    $stmt = $conn->prepare($sql);
    $stmt->execute([$token]);

    if ($stmt->rowCount() > 0) {
        // L'utilisateur existe, activation de son compte
        $user = $stmt->fetch();
        $sql = "UPDATE utilisateurs SET verification_token = NULL, est_active = 1 WHERE id = ?";
        $stmt = $conn->prepare($sql);
        $stmt->execute([$user['id']]);

        echo "Ton compte a été activé avec succès!";
    } else {
        echo "Token invalide.";
    }
}
?>