<?php
// Démarrer la session
session_start();

// Vérifier si l'utilisateur n'est pas connecté
if (!isset($_SESSION['user'])) {
    // Rediriger vers la page de connexion
    header('Location: Exercice10.1.php');
    exit();
}
?>
