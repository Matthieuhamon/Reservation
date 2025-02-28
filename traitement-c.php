<?php
session_start(); // Démarre la session

// Inclure la connexion à la base de données
require 'config.php';

// Vérifier si les champs sont remplis
if (isset($_POST['email']) && isset($_POST['password'])) {
    $email = htmlspecialchars(trim($_POST['email']));
    $password = $_POST['password'];

    // Préparer la requête pour vérifier l'utilisateur dans la base de données
    $stmt = $conn->prepare("SELECT id, nom, prenom, mot_de_passe FROM utilisateurs WHERE email = ?");
    $stmt->execute([$email]);
    $user = $stmt->fetch(); // Récupérer les données de l'utilisateur

    if ($user) {
        // Vérifier si le mot de passe correspond
        if (password_verify($password, $user['mot_de_passe'])) {
            // Connexion réussie : créer les variables de session
            $_SESSION['user_id'] = $user['id'];
            $_SESSION['email'] = $user['email'];
            $_SESSION['nom'] = $user['nom'];
            $_SESSION['prenom'] = $user['prenom'];

            // Rediriger vers la page de profil
            header("Location: profil.php");
            exit();
        } else {
            // Le mot de passe est incorrect
            echo "<p style='color:red;'>Erreur : Mot de passe incorrect.</p>";
        }
    } else {
        // L'email n'existe pas dans la base de données
        echo "<p style='color:red;'>Erreur : L'email n'est pas reconnu.</p>";
    }
} else {
    // Si les champs ne sont pas remplis correctement
    echo "<p style='color:red;'>Erreur : Veuillez remplir tous les champs.</p>";
}
?>