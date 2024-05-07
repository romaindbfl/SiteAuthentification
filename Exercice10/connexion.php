<?php
require_once 'bdd.php';
session_start();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = htmlspecialchars($_POST['loginEmail']);
    $password = $_POST['loginPassword'];

    $user = loginUser($email, $password);

    if ($user) {
       
        $_SESSION['user'] = $user;

        header("Location: index.php");
        exit();
    } else {
        $_SESSION['error'] = "Adresse e-mail ou mot de passe incorrect.";
        header("Location: authentification.php");
        exit;
    }
}

?>
