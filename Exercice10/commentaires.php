<?php
// Démarrer la session si ce n'est pas déjà fait
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}

// Vérifier si l'utilisateur est connecté
if (!isset($_SESSION['user'])) {
    header('Location: Exercice10.1.php');
    exit();
}

include_once 'bdd.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $comment = $_POST['comment'];
    
    // Vérifier si 'id' est défini dans $_SESSION['user'] et le convertir en entier
    if (isset($_SESSION['user']['id'])) {
        $userId = intval($_SESSION['user']['id']);
        
        // Insertion du commentaire dans la base de données
        $stmt = $pdo->prepare("INSERT INTO commentaires (user_id, comment_text) VALUES (?, ?)");
        $stmt->execute([$userId, $comment]);
    } else {
        // Redirection vers la page précédente avec un message d'erreur
        header("Location: {$_SERVER['HTTP_REFERER']}?error=user_id");
        exit();
    }

    // Redirection vers la page précédente
    header("Location: {$_SERVER['HTTP_REFERER']}");
    exit();
}

$stmt = $pdo->prepare("SELECT commentaires.*, users.username FROM commentaires 
                      INNER JOIN users ON commentaires.user_id = users.id 
                      ORDER BY commentaires.created_at DESC");
$stmt->execute();
$comments = $stmt->fetchAll();
?>

<!-- Affichage des commentaires -->
<div class="comments-list">
    <?php foreach ($comments as $comment): ?>
        <div class="comment">
            <p><strong>Utilisateur:</strong> <?php echo htmlspecialchars($comment['username']); ?></p>
            <p>« <?php echo htmlspecialchars($comment['comment_text']); ?> »</p>
            <p><small><em>Date:</em> <?php echo htmlspecialchars($comment['created_at']); ?></small></p>
        </div>
    <?php endforeach; ?>
</div>
</div>