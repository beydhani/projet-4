<?php
// router.php
// On définit APP_ROOT
define('APP_ROOT', __DIR__);
// On require les fichiers dont on a besoin
require APP_ROOT.'/controllers/ArticleController.php';
require_once APP_ROOT.'/controllers/CommentairesController.php';
$articleController = new ArticleController();

// On récupère l'URL
$request = $_SERVER['REQUEST_URI'];
// On établi les scénarios pour la vue d'entrée du blog.
switch ($request) {

    case "/Blog/":
    case "/Blog/index.php":
        $articleController->tousArticles();
        break;
    default:
        header("HTTP/1.0 404 Not Found");
        break;
}

// On récupère les actions
$action = $_GET['action'] ?? '';
// On établit les scénarios
switch ($action) {
        case 'articleUnique':
            $titre = $_GET['titre'] ?? '';
            if (!empty($titre)) {
                $articleController->articleUnique($titre);
            } else {
                echo "Un titre d'article est requis.";
            }
            break;
        case 'articleUniqueAdmin':
            $titre = $_GET['titre'] ?? '';
            $articleController->articleUniqueAdmin($titre);
            break;
        case 'inscrire':
            require_once APP_ROOT . '/controllers/UtilisateurController.php';
            $utilisateurController = new UtilisateurController();
            $utilisateurController->inscrire();
            break;
        case "connecter":
            require APP_ROOT . '/controllers/UtilisateurController.php';
            $utilisateurController = new UtilisateurController();
            $utilisateurController->connecter();
            
            break;
        case "ecrireCommentaire":
            require_once APP_ROOT . '/controllers/CommentairesController.php';
            $commentairesController = new CommentairesController();
            $commentairesEcrire = $commentairesController->ecrireCommentaire();
            break;
        case "signalerCommentaire":
            require_once APP_ROOT . '/controllers/CommentairesController.php';
            $commentairesController = new CommentairesController();
            $commentairesEcrire = $commentairesController->signalerCommentaire();
            break;
        case "connecterAdmin": 
            require_once APP_ROOT . '/controllers/AdministrateurController.php';
            $administrateurController = new AdministrateurController();
            $nom_utilisateur = $_POST['nom_utilisateur'] ?? null;
            $mot_de_passe = $_POST['mot_de_passe'] ?? null;
            $adminstrateurConnecter = $administrateurController->connecterAdmin($nom_utilisateur, $mot_de_passe);
            break;
        case "posterArticleAdmin":
            require_once APP_ROOT . '/controllers/ArticleController.php';
            $articleController = new ArticleController();
            $creerArticle = $articleController->creerArticle();
        case "TousArticlesAdmin":
            require_once APP_ROOT . '/controllers/ArticleController.php';
            $articleController = new ArticleController();
            $tousArticlesAdmin = $articleController->tousArticlesAdmin();
            break;
        case "supprimerArticleAdmin":
            require_once APP_ROOT . '/controllers/CommentairesController.php';
            require_once APP_ROOT . '/controllers/ArticleController.php';
            $articleController = new ArticleController();
            $commentaireController = new CommentairesController();
            $id_article = $_POST['id_article'] ?? null;
            if ($id_article) {
                $commentaireController->supprimerCommentairesParArticle($id_article);
                $articleController->supprimerArticleAdmin($id_article);             
            }
            
            break;
        case 'supprimerCommentaire':
            require_once APP_ROOT . '/controllers/CommentairesController.php';
            $commentairesController = new CommentairesController();
            $commentairesController->supprimerCommentaire();
            break;
        case 'editerArticleAdmin':
            require_once APP_ROOT . '/controllers/ArticleController.php';
            $articleController = new ArticleController();
            $id_article = $_POST['id_article'];
            $articleController->editerArticleAdmin($id_article);
            break;
        case 'miseAJourArticleAdmin':
            require_once APP_ROOT . '/controllers/ArticleController.php';
            $articleController = new ArticleController();
            $articleController->miseAJourArticleAdmin();
            break;
        case 'afficherConnexionAdmin':
            require_once APP_ROOT.'/controllers/AdministrateurController.php';
            $administrateurController = new AdministrateurController();
            $afficherConnexionAdmin = $administrateurController->afficherConnexionAdmin();
            break;
        case 'afficherConnexionUser':
            require_once APP_ROOT.'/controllers/UtilisateurController.php';
            $utilisateurController = new UtilisateurController();
            $afficherConnexionUser = $utilisateurController->afficherConnexionUser();
            break;
        case 'afficherInscriptionUser':
            require_once APP_ROOT.'/controllers/UtilisateurController.php';
            $utilisateurController = new UtilisateurController();
            $afficherInscriptionUser = $utilisateurController->afficherInscriptionUser();
            break;
        case 'afficherCreerArticleAdmin': 
            require_once APP_ROOT . '/controllers/ArticleController.php';
            $articleController = new ArticleController();
            $afficherCreerArticleAdmin = $articleController->afficherCreerArticleAdmin();
        default:
            header("HTTP/1.0 404 Not Found");
            // echo "Page non trouvée.";
            break;
}

?>
