<?php
require_once 'bdd.php';
// Démarrer la session si ce n'est pas déjà fait
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = htmlspecialchars(strip_tags($_POST['username']));
    $email = htmlspecialchars(strip_tags($_POST['email']));
    $password = $_POST['password'];

    // Vérifications du mot de passe
    if(strlen($password) < 8) {
        $_SESSION['error'] = "Le mot de passe doit contenir au moins 8 caractères.";
        header("Location: authentification.php");
        exit;
    }

    // (?=.*[a-z]) : Au moins une lettre minuscule.
    // (?=.*[A-Z]) : Au moins une lettre majuscule.
    //(?=.*\d) : Au moins un chiffre.
    //(?=.*[@$!%*?&]) : Au moins un caractère spécial parmi @$!%*?&.
    //[A-Za-z\d@$!%*?&]+ : Permet n'importe quel caractère alphanumérique ou spécial dans la liste @$!%*?&.
    if (!preg_match("/^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[@$!%*?&])[A-Za-z\d@$!%*?&]+$/", $password)) {
        $_SESSION['error'] ="Le mot de passe doit contenir au moins une lettre majuscule, une lettre minuscule, un chiffre et un caractère spécial.";
        header("Location: authentification.php");
        exit;
    }

    // Appel de la fonction pour enregistrer l'utilisateur
    $result = registerUser($username, $email, $password);

    // Gestion des résultats de l'enregistrement
if ($result === "Enregistrement réussi") {
    $_SESSION['success'] = "Inscription réussie ! Vous pouvez maintenant vous connecter.";
    header("Location: authentification.php");
} elseif ($result === "L'email existe déjà.") {
    $_SESSION['error'] = "L'adresse e-mail existe déjà. Veuillez choisir une autre adresse e-mail.";
    header("Location: authentification.php");
} elseif ($result === "L'username existe déjà.") {
    $_SESSION['error'] = "L'username existe déjà. Veuillez choisir un autre username.";
    header("Location: authentification.php");
} else {
    // Message d'erreur générique
    $_SESSION['error'] = "Une erreur est survenue lors de l'inscription. Veuillez réessayer.";
    header("Location: authentification.php");
}
}
?>
