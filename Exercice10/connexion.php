<?php
require_once 'bdd.php';


if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = htmlspecialchars($_POST['loginEmail']);
    $password = $_POST['loginPassword'];

    $user = loginUser($email, $password);

    if ($user) {
        session_start();
        $_SESSION['user'] = $user;

        header("Location: index.php");
        exit();
    } else {
        $errorMessage = 'Adresse e-mail ou mot de passe incorrect.';
        header("Location: authentification.php");
    }
}

?>
