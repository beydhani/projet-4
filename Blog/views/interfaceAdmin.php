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
        <title>Création d'Article - Billet simple pour l'Alaska</title>
        <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
        <link href="/Blog/public/styles.css" rel="stylesheet">
        <script src="https://cdn.tiny.cloud/1/no-api-key/tinymce/5/tinymce.min.js" referrerpolicy="origin"></script>
        <script>
            tinymce.init({
                selector: '#contenu',
                entity_encoding: 'raw',
                setup: function (editor) {
                    editor.on('change', function () {
                        editor.save();
                    });
                },
                required: true
            });
        </script>
    </head>
    <body>
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
        <?php include(APP_ROOT . '/views/headerAdmin.php'); ?>
        <?php if (isset($_SESSION['admin_nom_utilisateur']) && $_SESSION['admin_nom_utilisateur'] == 'JeanForteroche'): ?>
            <div class="container mt-5">
                <div class="row">
                    <div class="col-md-8 offset-md-2">
                        <h1 class="text-center mb-4">Créer un chapitre</h1>
                        <form method="post" action="/Blog/router.php?action=posterArticleAdmin">
                            <div class="form-group">
                                <label for="titre">Titre du chapitre</label>
                                <input type="text" class="form-control" name="titre" id="titre" placeholder="Entrez le titre ici" required>
                            </div>
                            <div class="form-group">
                                <label for="extrait">Extrait du chapitre </label>
                                <textarea id="extrait" name="extrait" class="form-control" rows="5" required></textarea>
                            </div>
                            <div class="form-group">
                                <label for="contenu">Contenu du chapitre</label>
                                <textarea id="contenu" name="contenu" class="form-control" rows="10" required></textarea>
                            </div>
                            <div class="text-center">
                                <button type="submit" class="btn btn-primary">Publier le chapitre</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        <?php else: ?>
            <a class="navbar-brand" href="<?APP_ROOT?>/Blog/">Vous n'êtes pas autorisé. Retournez à l'acceuil en cliquant ici</a>
        <?php endif; ?>
        <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/popper.js@1.9.2/dist/umd/popper.min.js"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
        
    </body>
</html>
