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
        <img src="r6.png" alt="Logo Rainbow Six Siege" id="logo" width= "150px">
        <h1>Rainbow Six Siege</h1>
        <nav>
            <ul>
                <li><a href="#operators">Opérateurs</a></li>
                <li><a href="#maps">Cartes</a></li>
            </ul>
        </nav>
    </header>

    <main>

        <section id="operators">
            <h1>Opérateurs (cliquez sur la photo pour accéder à leurs informations)</h1>
            <section id = "attackers">
                <h2>Attaquants</h2>
                <figure>
                <a href="ash.php"><img src="ash.png" alt="Opérateur Ash" width="300" height="200"></a>
                <figcaption>Ash</figcaption>
                </figure>
</section>

                <figure>
                <a href="sledge.php"><img src="sledge.png" alt="Opérateur Sledge" width="300" height="200"></a>
                <figcaption>Sledge</figcaption>
                </figure>
            </section>
            <section id = "defenders">
                <h2>Défenseurs</h2>
                <figure>
                <a href="bandit.php"><img src="bandit.png" alt="Opérateur Bandit" width="300" height="200"></a>
                <figcaption>Bandit</figcaption>
                </figure>
                <figure>
                <a href="vigil.php"><img src="vigil.png" alt="Opérateur Vigil" width="300" height="200"></a>
                <figcaption>Vigil</figcaption>
                </figure>
            </section>
           
        </section>

        <section id="maps">
            <h1>Cartes</h1>
            <figure>
            <img src="frontiere.png" alt="Carte Frontiere" width="700" height="400">
            <figcaption>Frontiere</figcaption>
            </figure>
            <figure>
            <img src="chalet.png" alt="Carte Chalet" width="700" height="400">
            <figcaption>Chalet</figcaption>
            </figure>
        </section>

    </main>

    <footer>
        <p>© 2020 Romain Deboffle. Tous droits réservés.</p>
    </footer>
</body>
</html>
