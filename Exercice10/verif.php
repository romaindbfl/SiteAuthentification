<?php
session_start();

// Vérifier si l'utilisateur est connecté en vérifiant la présence de la variable de session 'user'
if (!isset($_SESSION['user'])) {
    // Stocker le message d'erreur dans la session
    $_SESSION['error'] = "Vous devez vous connecter pour accéder à cette page.";
    
    // Rediriger l'utilisateur vers la page d'authentification
    header("Location: authentification.php");
    exit();
}
?>
