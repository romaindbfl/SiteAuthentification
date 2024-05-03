<?php
$host = 'localhost';
$dbname = 'rainbow_six';
$username = 'root'; 
$password = ''; 

try {
    // Connexion à la base de données avec PDO
    $pdo = new PDO("mysql:host=$host;port=3307;dbname=$dbname;charset=utf8", $username, $password);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION); // Mode d'erreur

    // Fonction pour hacher le mot de passe
    function hashPassword($password) {
        return password_hash($password, PASSWORD_DEFAULT);
    }

    // Fonction pour vérifier le mot de passe haché
    function verifyPassword($password, $hash) {
        return password_verify($password, $hash);
    }

    // Fonction d'inscription
    function registerUser($username, $email, $password) {
        global $pdo;
    
        // Vérifier si l'email existe déjà dans la BDD
        $stmtEmail = $pdo->prepare("SELECT COUNT(*) FROM users WHERE email = ?");
        $stmtEmail->execute([$email]);
        $countEmail = $stmtEmail->fetchColumn();
    
        // Vérifier si l'username existe déjà dans la BDD
        $stmtUsername = $pdo->prepare("SELECT COUNT(*) FROM users WHERE username = ?");
        $stmtUsername->execute([$username]);
        $countUsername = $stmtUsername->fetchColumn();
    
        if ($countEmail > 0) {
            // L'email existe déjà dans la BDD
            return "L'email existe déjà.";
        }
    
        if ($countUsername > 0) {
            // L'username existe déjà dans la BDD
            return "L'username existe déjà.";
        }
    
        $hashedPassword = hashPassword($password);
    
        $stmtInsert = $pdo->prepare("INSERT INTO users (username, email, password) VALUES (?, ?, ?)");
        if ($stmtInsert->execute([$username, $email, $hashedPassword])) {
            // Utilisateur enregistré avec succès
            return "Enregistrement réussi";
        } else {
            // Erreur lors de l'insertion dans la BDD
            return "Erreur lors de l'inscription";
        }
    }
    

    // Fonction de connexion
    function loginUser($email, $password) {
        global $pdo;
        
        $stmt = $pdo->prepare("SELECT * FROM users WHERE email = ?");
        $stmt->execute([$email]);
        $user = $stmt->fetch();

        if ($user && verifyPassword($password, $user['password'])) {
            unset($user['password']); // Ne pas renvoyer le mot de passe haché
            return $user;
        } else {
            return false;
        }
    }
} catch (PDOException $e) {
    echo "Erreur de connexion : " . $e->getMessage();
}
?>
