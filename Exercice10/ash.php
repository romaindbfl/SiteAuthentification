<?php
include_once 'verif.php';
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
        <img src="r6.png" alt="Logo Rainbow Six Siege" id="logo" width= "80px">
        <h1>Rainbow Six Siege</h1>
    </header>

    <main>

        <section id="operators">
            <h1>Opérateurs</h1>
            <section id = "attackers">
                <h2>Attaquants</h2>
                <figure>
                <img src="ash.png" alt="Opérateur Ash" width="300" height="200">
                <figcaption>Ash</figcaption>
                </figure>

                
               <section class="comment-section">
    <h3>Commentaires sur la photo</h3>
    <form action="commentaires.php" method="post">
    <textarea name="comment" placeholder="Ajouter un commentaire"></textarea>
    <input type="hidden" name="image_id" value="1"> 
    <input type="submit" value="Ajouter commentaire">
</form>


    <!-- Liste des commentaires -->
    <div class="comments-list">
        <?php
        $imageId = 1; // Remplacez 1 par l'ID réel de l'image "ash.png"
        // Inclure le code PHP pour afficher les commentaires
        include 'commentaires.php';
        ?>
    </div>
</section>


    </main>

    <footer>
        <p>© 2020 Romain Deboffle. Tous droits réservés.</p>
    </footer>
</body>
</html>
