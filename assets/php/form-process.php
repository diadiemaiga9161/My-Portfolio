<?php

ini_set('display_errors', 1);
error_reporting(E_ALL);

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Récupérer les données du formulaire
    $name = htmlspecialchars($_POST['name']);
    $email = htmlspecialchars($_POST['email']);
    $message = htmlspecialchars($_POST['message']);
    
    // Valider les champs
    if (empty($name) || empty($email) || empty($message)) {
        echo "Tous les champs sont obligatoires.";
        exit;
    }

    // Adresse e-mail de destination
    $to = "doumaiga3@gmail.com";
    $subject = "Nouveau message du formulaire de contact";

    // Contenu de l'e-mail
    $emailBody = "Nom et prénom: $name\n";
    $emailBody .= "Adresse e-mail: $email\n";
    $emailBody .= "Message:\n$message\n";

    // En-têtes de l'e-mail
    $headers = "From: $email\r\n";
    $headers .= "Reply-To: $email\r\n";

    // Envoyer l'e-mail
    if (mail($to, $subject, $emailBody, $headers)) {
        echo "Votre message a été envoyé avec succès.";
    } else {
        echo "Une erreur est survenue lors de l'envoi du message.";
    }
} else {
    echo "Méthode non autorisée.";
}
?>
