<?php
// Desactivation de l'affichage des erreurs
ini_set('display_errors', 0);

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Nettoyage de base (sans filter_var)
    $nom = strip_tags(trim($_POST["nom"]));
    $email = strip_tags(trim($_POST["email"]));
    $message = strip_tags(trim($_POST["message"]));

    // Vérification de l'email par expression régulière (compatible toutes versions PHP)
    $email_valide = preg_match('/^[a-zA-Z0-9._-]+@[a-zA-Z0-9._-]+\.[a-zA-Z]{2,4}$/', $email);

    // Validation
    if (empty($nom) || empty($message) || !$email_valide) {
        echo "<p style='color:red; font-family:Arial;'>Erreur : Veuillez remplir le formulaire correctement.</p>";
        exit;
    }

    // Configuration de l'email
    $destinataire = "valentino.lercher@gmail.com"; 
    $sujet = "[Site Web] Nouveau message de $nom";
    
    // Corps du message
    $corps_mail = "Nouveau message reçu depuis le formulaire du site :\n\n";
    $corps_mail .= "Nom : $nom\n";
    $corps_mail .= "Courriel : $email\n\n";
    $corps_mail .= "Message :\n$message\n";

    // Entêtes spécifiques pour la fonction mail() de Free
    $entetes = "MIME-Version: 1.0" . "\r\n";
    $entetes .= "Content-type: text/plain; charset=UTF-8" . "\r\n";
    $entetes .= "From: valentino.lercher@free.fr" . "\r\n"; 
    $entetes .= "Reply-To: $email" . "\r\n"; 

    // Envoi du mail
    if (mail($destinataire, $sujet, $corps_mail, $entetes)) {
        echo "<script>alert('Votre message a bien été envoyé.'); window.location.href='contact.html';</script>";
    } else {
        echo "<p style='color:red; font-family:Arial;'>Une erreur technique est survenue lors de l'envoi. Veuillez réessayer ultérieurement.</p>";
    }
} else {
    header("Location: contact.html");
    exit;
}
?>