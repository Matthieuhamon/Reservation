<?php
session_start();
require 'config.php';

// Vérifier si l'utilisateur est connecté
if (!isset($_SESSION['user_id'])) {
    header("Location: connexion.php");
    exit();
}

if (isset($_POST['reserver'])) {
    $date = $_POST['date'];
    $heure = $_POST['heure'];
    $date_heure = $date . ' ' . $heure;

    // Vérifier si le créneau est disponible
    $stmt = $conn->prepare("SELECT COUNT(*) FROM rendez_vous WHERE date_heure = ?");
    $stmt->execute([$date_heure]);
    $count = $stmt->fetchColumn();

    if ($count == 0) {
        // Insérer le rendez-vous
        $stmt = $conn->prepare("INSERT INTO rendez_vous (utilisateur_id, date_heure) VALUES (?, ?)");
        $stmt->execute([$_SESSION['user_id'], $date_heure]);
        header("Location: rdv.php");
    } else {
        echo "<p style='color:red;'>Ce créneau est déjà réservé.</p>";
    }
}

// Supprimer un rendez-vous
if (isset($_POST['supprimer']) && isset($_POST['rdv_id'])) {
    $rdv_id = $_POST['rdv_id'];

    // Supprimer uniquement si c'est bien le rendez-vous de l'utilisateur
    $stmt = $conn->prepare("DELETE FROM rendez_vous WHERE id = ? AND utilisateur_id = ?");
    $stmt->execute([$rdv_id, $user_id]);

    header("Location: rdv.php");
}
?>


