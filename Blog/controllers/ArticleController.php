<?php
// ArticleController.php

// On start une session si y'en a pas déjà
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}
// On require le modele et le fichier de connexion a la database
require (APP_ROOT .'/models/Article.php');
require_once (APP_ROOT .'/config/database.php');

class ArticleController {
    private $db;
    private $articleModel;
    public function __construct() {
        
        $database = new Database();
        $this->db = $database->getConnection();
        $this->articleModel = new Article($this->db);
    }
    // Afficher tous les articles
    public function tousArticles() {
        ob_start();
        $resultat = $this->articleModel->lire();
        require_once APP_ROOT.'/views/TousArticles.php';
        $contenu = ob_get_clean();
        echo $contenu;
    }
    public function tousArticlesAdmin() {
        $articles = $this->articleModel->lire(); 
        include APP_ROOT.'/views/TousArticlesAdmin.php'; 
    }
    // Afficher un article unique
    public function articleUnique($titre) {
        $this->articleModel->lireUn($titre);    
        $commentairesController = new CommentairesController();
        $commentairesContent = $commentairesController->afficherCommentaires($titre);
        $article = $this->articleModel->obtenirIdArticleParTitre($titre);
        require APP_ROOT . '/views/ArticleUnique.php';
    }
    public function articleUniqueAdmin($titre) {
        $this->articleModel->lireUn($titre); 
        $contenuArticle = $this->articleModel;   
        $commentairesController = new CommentairesController();
        $commentairesContent = $commentairesController->afficherCommentairesAdmin($titre);
        $article = $this->articleModel->obtenirIdArticleParTitre($titre);
        require APP_ROOT . '/views/ArticleUniqueAdmin.php';
    }
    // Créer un article
    public function creerArticle() {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $article = new Article($this->db);
            $article->titre = $_POST['titre'];
            $article->extrait = $_POST['extrait'];
            $article->contenu = $_POST['contenu'];
            if ($article->creerArticle()) {
                 $_SESSION['flash_messages']['success'] = 'Article créé avec succès.';
                 header('Location: /Blog/router.php?action=afficherCreerArticleAdmin');
                exit;
            } else {
                $_SESSION['flash_messages']['error'] = 'Il y a eu une erreur lors de la création de l\'article.';
                 header('Location: /Blog/router.php?action=afficherCreerArticleAdmin');
                exit;
            }
        }
    }
    // Supprimer un article 
    public function supprimerArticleAdmin($id_article) {
        // Si le modèle retourne true
        if ($this->articleModel->supprimer($id_article)) {
            // On set les flash_messages de success avec la superglobale SESSION
            $_SESSION['flash_messages']['success'] = 'Article supprimé avec succès.';
        } else {
            // On set les flash_messages d'erreur avec la superglobale SESSION
            $_SESSION['flash_messages']['error'] = 'Erreur lors de la suppression de l\'article.';
        }
        header('Location: /Blog/router.php?action=TousArticlesAdmin');
    }

    // Editer un article
    public function editerArticleAdmin($id_article) {
        // Crée une instance du modèle en lui passant la connexion a la database
        $article = new Article($this->db);
        // Défini l'id article dans l'instance
        $article->id = $id_article;
        // Appelle la méthode de modèle pour récupérer les données
        $article->lireUnParId(); 
        // Charge la vue
        require_once APP_ROOT . '/views/EditerArticleAdmin.php';
    }

    // Méthode qui va mettre à jour l'article édité
    public function miseAJourArticleAdmin() {
        // On vérifie que la méthode de requete HTTP c'est bien POST
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            // On crée une nouvelle instance du modele et on update avec les infos qu'on a reçu.
            $article = new Article($this->db);
            $article->id = $_POST['id_article'];
            $article->titre = $_POST['titre'];
            $article->extrait = $_POST['extrait'];
            $article->contenu = $_POST['contenu'];
            // Si la mise à jour s'est bien effectuée on set des flash_messages success
            if ($article->miseAJour()) {
                $_SESSION['flash_messages']['success'] = 'Article mis à jour avec succès.';
                header('Location: /Blog/router.php?action=TousArticlesAdmin');
            } else {
                // Sinon des flash messages error
                $_SESSION['flash_messages']['error'] = 'Erreur lors de la mise à jour de l\'article.';
                header('Location: /Blog/router.php?action=TousArticlesAdmin');
            }
            
            exit;
        }
    }
    // Méthode pour afficher l'interface de création d'article.
    public function afficherCreerArticleAdmin() {
        require_once APP_ROOT . '/views/interfaceAdmin.php';
    }
}
?>