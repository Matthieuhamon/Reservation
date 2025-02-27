<?php
require 'config.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nom = htmlspecialchars(trim($_POST['nom'])); 
    $prenom = htmlspecialchars(trim($_POST['prenom']));
    $date_naissance = $_POST['date_naissance'];
    $adresse = htmlspecialchars(trim($_POST['adresse']));
    $telephone = htmlspecialchars(trim($_POST['telephone']));
    $email = htmlspecialchars(trim($_POST['email']));
    $password = $_POST['password'];
    $password_confirm = $_POST['password_confirm'];

    // Vérification si les mots de passe correspondent
    if ($password !== $password_confirm) {
        echo "<p style='color:red;'>Erreur : Les mots de passe ne correspondent pas.</p>"; // Affichage de l'erreur
    } else {
        // Hachage du mot de passe
        $password_hash = password_hash($password, PASSWORD_DEFAULT);

        // Vérifie si l'email existe déjà
        $check_email = $conn->prepare("SELECT id FROM utilisateurs WHERE email = ?");
        $check_email->execute([$email]);

        if ($check_email->rowCount() > 0) {
            echo "<p style='color:red;'>Erreur : Cet email est déjà utilisé !</p>";
        } else {
            // Préparation de la requête d'insertion
            $sql = "INSERT INTO utilisateurs (nom, prenom, date_naissance, adresse, telephone, email, password) 
                    VALUES (:nom, :prenom, :date_naissance, :adresse, :telephone, :email, :password)";
            $stmt = $conn->prepare($sql);

            // Exécution de la requête
            if ($stmt->execute([
                ':nom' => $nom, 
                ':prenom' => $prenom, 
                ':date_naissance' => $date_naissance, 
                ':adresse' => $adresse, 
                ':telephone' => $telephone, 
                ':email' => $email, 
                ':password' => $password_hash
            ])) {
                // Récupérer l'ID du nouvel utilisateur
                $user_id = $conn->lastInsertId();
                
                // Démarrer une session et enregistrer les infos utilisateur
                session_start();
                $_SESSION['user_id'] = $user_id;
                $_SESSION['email'] = $email;
                $_SESSION['nom'] = $nom;
                $_SESSION['prenom'] = $prenom;
                
                // Rediriger vers le profil
                header("Location: profil.php");
                exit();
            }
        }
    }
}
?>