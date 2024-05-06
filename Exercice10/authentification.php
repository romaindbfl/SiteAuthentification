<?php
include 'connexion.php'; 
include 'inscription.php'; 

?>
<?php
session_start();

// Vérifier s'il y a un message d'erreur dans la session
if (isset($_SESSION['error'])) {
    echo "<p>{$_SESSION['error']}</p>";
    // Une fois le message affiché, supprimez-le de la session pour qu'il ne s'affiche plus après le rechargement de la page
    unset($_SESSION['error']);
}
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Rainbow Six Siege</title>
    <link rel="stylesheet" href="Exercice10.css">
</head>
<body>
<header>
<img src="pictures/r6.png" alt="Logo Rainbow Six Siege" id="logo" width= "150px">
    <h1>Rainbow Six Siege</h1>
    <nav>
        <ul>
            <li><a href="index.php">Accueil</a></li> 
        </ul>
    </nav>
</header>


    <main>

        <section id="signup">
            <h1>Inscription</h1>
            <form action="inscription.php" method="post">
                <label for="username">Nom d'utilisateur :</label>
                <input type="text" id="username" name="username" required>

                <label for="email">Adresse e-mail :</label>
                <input type="email" id="email" name="email" required>

                <label for="password">Mot de passe :</label>
                <input type="password" id="password" name="password" required>

                <input type="submit" value="S'inscrire">
            </form>
        </section>

        <!-- Formulaire de Connexion -->
        <section id="login">
            <h1>Connexion</h1>
            <form action="connexion.php" method="post">
                <label for="loginEmail">Adresse e-mail :</label>
                <input type="email" id="loginEmail" name="loginEmail" required>

                <label for="loginPassword">Mot de passe :</label>
                <input type="password" id="loginPassword" name="loginPassword" required>

                <input type="submit" value="Se connecter">
            </form>
        </section>
    </main>

    <footer>
        <p>© 2020 Romain Deboffle. Tous droits réservés.</p>
    </footer>
</body>
</html>
