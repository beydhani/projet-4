<?php
    if (session_status() == PHP_SESSION_NONE) {
        session_start();
    }
// On démarre une session si y'en a pas 
?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= htmlspecialchars($contenuArticle->titre) ?> - Billet simple pour l'Alaska</title>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="/Blog/public/styles.css">
</head>
<body>
    <!-- On inclut le header Admin -->
    <?php include(APP_ROOT . '/views/headerAdmin.php'); ?>
    <!-- On vérifie que ce soit bien l'admin qui est connecté -->
    <?php if (isset($_SESSION['admin_nom_utilisateur']) && $_SESSION['admin_nom_utilisateur'] == 'JeanForteroche'): ?>
    <main role="main" class="container mt-4 text-center">
        <div class="row">
            <div class="col-lg-8 mx-auto text-center chapitre">
                <h1 class="mt-4"><?= htmlspecialchars($contenuArticle->titre) ?></h1>
                <p class="lead"><?= nl2br($contenuArticle->contenu) ?></p>
            </div>
        </div>
        <div class="text-center mt-3">
            <form action="router.php?action=editerArticleAdmin" method="post">
                <input type="hidden" name="id_article" value="<?= htmlspecialchars($this->articleModel->id) ?>">
                <button type="submit" class="btn btn-primary">Éditer l'article</button>
            </form>
        </div>
        <div class="text-center mt-3">
            <form action="router.php?action=supprimerArticleAdmin" method="post">
                <input type="hidden" name="id_article" value="<?= htmlspecialchars($this->articleModel->id) ?>">
                <button type="submit" class="btn btn-danger" onclick="return confirm('Êtes-vous sûr de vouloir supprimer cet article et tous les commentaires liés?');">Supprimer l'article</button>
            </form>
        </div>
        <!-- On inclut les commentaires -->
        <?= $commentairesContent ?>
    </main>

    <?php else: ?>
        <!-- Petit lien de retour  -->
        <a class="navbar-brand" href="/Blog/">Vous n'êtes pas autorisé. Retournez à l'acceuil en cliquant ici</a>
        <?php endif; ?>
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.9.2/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>