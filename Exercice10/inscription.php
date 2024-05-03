<?php
require_once 'bdd.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = strip_tags($_POST['username']);
    $email = strip_tags($_POST['email']);
    $password = $_POST['password'];

    $result = registerUser($username, $email, $password);

    if ($result === "Enregistrement réussi") {
        echo "<p>Inscription réussie ! Vous pouvez maintenant vous connecter.</p>";
    } elseif ($result === "L'email existe déjà.") {
        echo "<p>L'adresse e-mail existe déjà. Veuillez choisir une autre adresse e-mail.</p>";
    } elseif ($result === "L'username existe déjà.") {
        echo "<p>L'username existe déjà. Veuillez choisir un autre username.</p>";
    } else {
        // Message d'erreur générique
        echo "<p>Une erreur est survenue lors de l'inscription. Veuillez réessayer.</p>";
    }
}


?>
