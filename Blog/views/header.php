<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="/Blog/public/styles.css" rel="stylesheet">
</head>
<header>
        <nav class="navbar navbar-expand-lg navbar-light bg-light">
            <div class="container">
                <a class="navbar-brand" href="/Blog/">
                <img src="/Blog/public/logo.png" alt="Logo" style="height: 140px; border-radius: 50%;">
                </a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarNav">
                    <ul class="navbar-nav ml-auto">
                        <li class="nav-item active">
                            <a class="nav-link" href="/Blog/">Accueil <span class="sr-only">(current)</span></a>
                        </li>

                        <?php if (isset($_SESSION['nom_utilisateur'])): ?>
                        <li class="nav-item">
                            <span class="navbar-text" style="color:red;">
                                Bonjour, <?= htmlspecialchars($_SESSION['nom_utilisateur']); ?>
                            </span>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="/Blog/config/deconnexion.php">Déconnexion</a>
                        </li>
                    <?php else: ?>
                        <li class="nav-item">
                            <a class="nav-link" href="router.php?action=afficherConnexionUser">Connexion</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="router.php?action=afficherInscriptionUser">Inscription</a>
                        </li>
                    <?php endif; ?>
                    </ul>
                </div>
            </div>
        </nav>
</header>