<?php
    if (session_status() == PHP_SESSION_NONE) {
        session_start();
    }
// if (!defined('APP_ROOT')) {
//     define('APP_ROOT', __DIR__);
// }
?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= htmlspecialchars($this->articleModel->titre) ?> - Billet simple pour l'Alaska</title>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="/Blog/public/styles.css">
</head>
<body>
    <!-- On inclut un header -->
    <?php include(APP_ROOT.'/views/header.php'); ?>

    <main role="main" class="container mt-4">
        <div class="row">
            <div class="col-lg-8 mx-auto text-center chapitre">
                <h1 class="mt-4"><?= htmlspecialchars($this->articleModel->titre) ?></h1>
                <p class="lead"><?= nl2br(htmlspecialchars($this->articleModel->contenu)) ?></p>
            </div>
        </div>
        <?php
        // On inclut la vue pour écrire un commentaire
        $id_article = $article;
        if (isset($article)) {
            include(APP_ROOT.'/views/EcrireCommentaire.php');
        } else {
            echo "Impossible de charger le formulaire de commentaire.";
        }
        ?>
        <!-- On inclut les anciens commentaires -->
        <?= $commentairesContent ?>
       
    </main>
    <!-- On inclut un footer -->
    <?php include(APP_ROOT.'/views/footer.php'); ?>
    

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.9.2/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>