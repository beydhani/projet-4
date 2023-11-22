<?php 
session_start(); // Démarre la session si ce n'est pas déjà fait

// Vérifie s'il y a des messages d'erreur ou de succès à afficher
if (isset($_SESSION['error'])) {
    echo '<div class="alert alert-danger">' . $_SESSION['error'] . '</div>';
    unset($_SESSION['error']); // Efface le message d'erreur après l'affichage
}

if (isset($_SESSION['success'])) {
    echo '<div class="alert alert-success">' . $_SESSION['success'] . '</div>';
    unset($_SESSION['success']); // Efface le message de succès après l'affichage
}

?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Inscription - Billet simple pour l'Alaska</title>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="public/styles.css">
</head>
<body>
    <?php include(APP_ROOT . '/views/header.php'); ?>

    <main role="main" class="container mt-4">
        <div class="row">
            <div class="col-lg-8 mx-auto">
                <h1 class="mt-4">Inscription</h1>
                <form action="/Blog/router.php?action=inscrire" method="post" class="mt-4 text-center">
                    <div class="form-group">
                        <label for="nom_utilisateur">Nom d'utilisateur</label>
                        <input type="text" class="form-control" name="nom_utilisateur" id="nom_utilisateur" required>
                    </div>
                    <div class="form-group">
                        <label for="email">Email</label>
                        <input type="email" class="form-control" name="email" id="email" required>
                    </div>
                    <div class="form-group">
                        <label for="mot_de_passe">Mot de passe</label>
                        <input type="password" class="form-control" name="mot_de_passe" id="mot_de_passe" required>
                    </div>
                    <button type="submit" class="btn btn-primary">S'inscrire</button>
                </form>
            </div>
        </div>
    </main>
    <?php include(APP_ROOT . '/views/footer.php'); ?>

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.9.2/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
