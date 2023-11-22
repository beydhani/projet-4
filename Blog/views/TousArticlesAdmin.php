<?php
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}
?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Page d'Accueil - Billet simple pour l'Alaska</title>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <link href ="public/styles.css" rel="stylesheet">
</head>
<body>
    <?php include(APP_ROOT . '/views/headerAdmin.php'); ?>
    <?php
        if (isset($_SESSION['flash_messages'])) {
            // Affichage des messages de succès
                if (isset($_SESSION['flash_messages']['success'])) {
                    echo '<div class="alert alert-success">' . $_SESSION['flash_messages']['success'] . '</div>';
                } 

            // Affichage des messages d'erreur
                if (isset($_SESSION['flash_messages']['error'])) {
                    echo '<div class="alert alert-danger">' . $_SESSION['flash_messages']['error'] . '</div>';
                }

                // Effacement des messages flash après affichage
                unset($_SESSION['flash_messages']);
        }
    ?>
    <?php if (isset($_SESSION['admin_nom_utilisateur']) && $_SESSION['admin_nom_utilisateur'] == 'JeanForteroche'): ?>
    <main role="main" class="container mt-4">
    <div class="text-center">
    Bienvenue sur la page des chapitres. Vous pouvez éditer ou supprimer un article et ses commentaires en cliquant dessus. 
    </div>
        <?php
            echo '<div class="container mt-5">';
            echo '<h1 class="mb-4">Tous les Articles</h1>';
            while ($row = $articles->fetch(PDO::FETCH_ASSOC)) {
                echo '<div class="card mb-4">';
                echo '<div class="card-body">';
                echo '<h2 class="card-title"><a href="router.php?action=articleUniqueAdmin&titre=' . $row['titre'] . '">' . $row['titre'] . '</a></h2>';
                echo '<p class="card-text">' . $row['extrait'] . '</p>';
                echo ' <a href="router.php?action=articleUniqueAdmin&titre=' . urlencode($row['titre']) . '">[Lire la suite]</a></p>';
                echo '</div>';
                echo '</div>';
            }
            echo '</div>';
        ?>
    </main>
    <?php else: ?>
        <a class="navbar-brand" href="<?APP_ROOT?>/Blog/">Vous n'êtes pas autorisé. Retournez à l'acceuil en cliquant ici</a>
        <?php endif; ?>
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.9.2/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>