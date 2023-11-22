<!DOCTYPE html>
<html lang="fr">
    <head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>EDITION d'Article</title>
    <!-- Inclure Bootstrap CSS -->
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <link href="/Blog/public/styles.css" rel="stylesheet">
    <script src="https://cdn.tiny.cloud/1/no-api-key/tinymce/5/tinymce.min.js" referrerpolicy="origin"></script>
    <script>
        tinymce.init({
            selector: '#contenu',
            entity_encoding: 'raw'
        });
    </script>
       
    </head>
    <body>
    <?php if (isset($_SESSION['admin_nom_utilisateur']) && $_SESSION['admin_nom_utilisateur'] == 'JeanForteroche'): ?>
        <?php include(APP_ROOT . '/views/headerAdmin.php'); ?>
        <div class="container mt-5">
            <div class="row">
                <div class="col-md-8 offset-md-2">
                    <h1 class="text-center mb-4">Éditer un article</h1>
                    <form method="post" action="/Blog/router.php?action=miseAJourArticleAdmin">
                        <input type="hidden" name="id_article" value="<?= htmlspecialchars($article->id) ?>">     
                        <div class="form-group">
                            <label for="titre">Titre de l'article</label>
                            <input type="text" class="form-control" name="titre" id="titre" value="<?= htmlspecialchars($article->titre) ?>" required>
                        </div>

                        <div class="form-group">
                            <label for="extrait">Extrait de l'article</label>
                            <textarea id="extrait" name="extrait" class="form-control" rows="5"><?= htmlspecialchars($article->extrait) ?></textarea>
                        </div>

                        <div class="form-group">
                            <label for="contenu">Contenu de l'article</label>
                            <textarea id="contenu" name="contenu" class="form-control" rows="10"><?= htmlspecialchars($article->contenu) ?></textarea>
                        </div>

                        <div class="text-center">
                            <button type="submit" class="btn btn-primary">Mettre à jour l'article</button>
                        </div>
                    </form>
                    <div class="text-center" style="margin-top:10px;">
                    <button class="btn btn-primary" onclick="location.href='/Blog/router.php?action=TousArticlesAdmin'">Annuler l'édition</button>
                    </div>
                </div>
            </div>
        </div>
    <?php else: ?>
        <a class="navbar-brand" href="/Blog/">Vous n'êtes pas autorisé. Retournez à l'acceuil en cliquant ici</a>
    <?php endif; ?>

        <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/popper.js@1.9.2/dist/umd/popper.min.js"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    </body>
</html>
