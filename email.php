<?php
// sendEmail.php
require 'libs/PHPMailer/src/Exception.php';
require 'libs/PHPMailer/src/PHPMailer.php';
require 'libs/PHPMailer/src/SMTP.php';

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

function sendVerificationEmail($userEmail, $token) {
    $mail = new PHPMailer(true);
    try {
        // Paramètres du serveur SMTP
        $mail->isSMTP();
        $mail->Host = 'smtp.gmail.com';
        $mail->SMTPAuth = true;
        $mail->Username = 'bookin.time.verif@gmail.com'; 
        $mail->Password = 'hlkh yulu migp tnwe';
        $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
        $mail->Port = 587;

        // Destinataire
        $mail->setFrom('bookin.time.verif@gmail.com', 'Matthieu');
        $mail->addAddress($userEmail); // Email de l'utilisateur

        // Sujet
        $mail->Subject = 'Verification de ton adresse email';

        // Corps de l'email
        $verificationLink = "http://localhost/Reservation/verifier.php?token=" . $token; 
        $mail->Body = "Clique sur ce lien pour vérifier ton email et activer ton compte : <a href='" . $verificationLink . "'>Vérifier mon email</a>";

        // Envoi de l'email
        $mail->send();
    } catch (Exception $e) {
        echo "Erreur d'envoi: {$mail->ErrorInfo}";
    }
}
?>