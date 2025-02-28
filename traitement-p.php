<?php
session_start();

// Inclure la connexion à la base de données
require 'config.php';

// Vérifier si l'utilisateur est connecté
if (!isset($_SESSION['user_id'])) {
    header("Location: connexion.php"); // Rediriger vers la page de connexion si l'utilisateur n'est pas connecté
    exit();
}

// Récupérer l'ID de l'utilisateur
$user_id = $_SESSION['user_id'];

// Traitement de la mise à jour des informations
if (isset($_POST['action']) && $_POST['action'] == 'update') {
    // Récupérer les données du formulaire
    $nom = htmlspecialchars(trim($_POST['nom']));
    $prenom = htmlspecialchars(trim($_POST['prenom']));
    $date_naissance = $_POST['date_naissance'];
    $adresse = ($_POST['adresse']);
    $telephone = htmlspecialchars(trim($_POST['telephone']));
    $email = htmlspecialchars(trim($_POST['email']));

    // Mettre à jour l'adresse dans la base de données
    $stmt_update = $conn->prepare("UPDATE utilisateurs SET adresse = ? WHERE id = ?");
    if ($stmt_update->execute([$adresse, $user_id])) {
        $_SESSION['adresse'] = $adresse; // Met à jour l'adresse en session
        $success = "Vos informations ont été mises à jour avec succès.";
        header("Location: profil.php?success=" . urlencode($success));
        exit();
    } else {
        $error = "Une erreur est survenue lors de la mise à jour de vos informations.";
        header("Location: profil.php?error=" . urlencode($error));
        exit();
    }

    // Vérifier l'unicité de l'email
    $stmt_check_email = $conn->prepare("SELECT id FROM utilisateurs WHERE email = ? AND id != ?");
    $stmt_check_email->execute([$email, $user_id]);

    if ($stmt_check_email->rowCount() > 0) {
        $error = "Cet email est déjà utilisé.";
        header("Location: profil.php?error=" . urlencode($error));
        exit();
    }

    // Si l'email est unique, procéder à la mise à jour
    $stmt_update = $conn->prepare(
        "UPDATE utilisateurs SET nom = ?, prenom = ?, date_naissance = ?, adresse = ?, telephone = ?, email = ? WHERE id = ?"
    );
    if ($stmt_update->execute([$nom, $prenom, $date_naissance, $adresse, $telephone, $email, $user_id])) {
        $_SESSION['email'] = $email; // Met à jour l'email en session
        $success = "Vos informations ont été mises à jour avec succès.";
        header("Location: profil.php?success=" . urlencode($success));
        exit();
    } else {
        $error = "Une erreur est survenue lors de la mise à jour de vos informations.";
        header("Location: profil.php?error=" . urlencode($error));
        exit();
    }
}

// Traitement de la suppression du compte
if (isset($_POST['action']) && $_POST['action'] == 'delete_account') {
    // Supprimer toutes les données associées à l'utilisateur
    $stmt_delete = $conn->prepare("DELETE FROM utilisateurs WHERE id = ?");
    if ($stmt_delete->execute([$user_id])) {
        session_destroy(); // Détruire la session de l'utilisateur
        header("Location: index.php"); // Rediriger vers la page d'accueil après la suppression
        exit();
    } else {
        $error = "Une erreur est survenue lors de la suppression de votre compte.";
        header("Location: profil.php?error=" . urlencode($error));
        exit();
    }
}
?>