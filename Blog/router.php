<?php
// router.php
// On définit APP_ROOT
define('APP_ROOT', __DIR__);
// On require les fichiers dont on a besoin
require_once APP_ROOT.'/controllers/ArticleController.php';
require_once APP_ROOT.'/controllers/CommentairesController.php';
require_once APP_ROOT.'/controllers/UtilisateurController.php';
require_once APP_ROOT.'/controllers/AdministrateurController.php';

$articleController = new ArticleController();
$commentairesController = new CommentairesController();
$utilisateurController = new UtilisateurController();
$administrateurController = new AdministrateurController();
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
            $utilisateurController->inscrire();
            break;
        case "connecter":
            $utilisateurController->connecter();
            
            break;
        case "ecrireCommentaire":
            $commentairesEcrire = $commentairesController->ecrireCommentaire();
            break;
        case "signalerCommentaire":
            $commentairesEcrire = $commentairesController->signalerCommentaire();
            break;
        case "connecterAdmin": 
            $nom_utilisateur = $_POST['nom_utilisateur'] ?? null;
            $mot_de_passe = $_POST['mot_de_passe'] ?? null;
            $adminstrateurConnecter = $administrateurController->connecterAdmin($nom_utilisateur, $mot_de_passe);
            break;
        case "posterArticleAdmin":
            $creerArticle = $articleController->creerArticle();
        case "TousArticlesAdmin":

            $tousArticlesAdmin = $articleController->tousArticlesAdmin();
            break;
        case "supprimerArticleAdmin":
            $commentaireController = new CommentairesController();
            $id_article = $_POST['id_article'] ?? null;
            if ($id_article) {
                $commentaireController->supprimerCommentairesParArticle($id_article);
                $articleController->supprimerArticleAdmin($id_article);             
            }
            
            break;
        case 'supprimerCommentaire':
            $commentairesController->supprimerCommentaire();
            break;
        case 'editerArticleAdmin':
            $id_article = $_POST['id_article'];
            $articleController->editerArticleAdmin($id_article);
            break;
        case 'miseAJourArticleAdmin':
            $articleController->miseAJourArticleAdmin();
            break;
        case 'afficherConnexionAdmin':
            $afficherConnexionAdmin = $administrateurController->afficherConnexionAdmin();
            break;
        case 'afficherConnexionUser':
            $afficherConnexionUser = $utilisateurController->afficherConnexionUser();
            break;
        case 'afficherInscriptionUser':
            $afficherInscriptionUser = $utilisateurController->afficherInscriptionUser();
            break;
        case 'afficherCreerArticleAdmin': 
            $afficherCreerArticleAdmin = $articleController->afficherCreerArticleAdmin();
        default:
            header("HTTP/1.0 404 Not Found");
            break;
}

?>
