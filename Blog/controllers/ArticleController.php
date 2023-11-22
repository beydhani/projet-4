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
}
?>