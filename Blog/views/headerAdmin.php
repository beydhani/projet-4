<?php
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}
if (!defined('APP_ROOT')) {
    define('APP_ROOT', __DIR__);
}
?>
<header>
        <nav class="navbar navbar-expand-lg navbar-light bg-light">
            <div class="container">
                <a class="navbar-brand" href="/Blog/router.php?action=afficherCreerArticleAdmin">
                    <img src="/Blog/public/logo.png" alt="Logo" style="height: 140px; border-radius: 50%;">
                </a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarNav">
                    <ul class="navbar-nav ml-auto">
                    <?php if (isset($_SESSION['admin_nom_utilisateur']) && $_SESSION['admin_nom_utilisateur'] == 'JeanForteroche'): ?>
                        <li class="nav-item active">
                            <a class="nav-link" href="/Blog/router.php?action=afficherCreerArticleAdmin">Ecrire un nouveau chapitre <span class="sr-only">(current)</span></a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="/Blog/router.php?action=TousArticlesAdmin">Lire tous les chapites</a>
                        </li>

                        <li class="nav-item">
                            <span class="navbar-text" style="color:red;">
                                Bonjour Jean Forteroche 
                            </span>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="/Blog/config/deconnexion.php">Déconnexion</a>
                        </li>
                    <?php else: ?>
                        <li class="nav-item">
                            <span class="navbar-text">
                                Bonjour, vous n'avez rien à faire ici
                            </span>
                        </li>
                    <?php endif; ?>
                    </ul>
                </div>
            </div>
        </nav>
</header>