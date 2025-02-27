<?php
require 'config.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nom = htmlspecialchars($_POST['nom']);
    $prenom = htmlspecialchars($_POST['prenom']);
    $date_naissance = $_POST['date_naissance'];
    $adresse = htmlspecialchars($_POST['adresse']);
    $telephone = htmlspecialchars($_POST['telephone']);
    $email = htmlspecialchars($_POST['email']);
    $password = password_hash($_POST['password']); 
    $password_confirm = $_POST['password_confirm'];

    // Vérification si les mots de passe correspondent
    if ($password !== $password_confirm) {
        die("Erreur : Les mots de passe ne correspondent pas.");
    }

    $password_hash = password_hash($password, PASSWORD_DEFAULT);

    // Vérifie si l'email existe déjà
    $check_email = $conn->prepare("SELECT id FROM utilisateurs WHERE email = ?");
    $check_email->execute([$email]);

    if ($check_email->rowCount() > 0) {
        die("Erreur : Cet email est déjà utilisé !");
    }

    $sql = "INSERT INTO utilisateurs (nom, prenom, date_naissance, adresse, telephone, email, password) 
            VALUES (?, ?, ?, ?, ?, ?, ?)";
    $stmt = $conn->prepare($sql);

    if ($stmt->execute([$nom, $prenom, $date_naissance, $adresse, $telephone, $email, $password])) {
        echo "Inscription réussie ! <a href='login.php'>Connectez-vous ici</a>";
    } else {
        echo "Erreur lors de l'inscription.";
    }
}
?>