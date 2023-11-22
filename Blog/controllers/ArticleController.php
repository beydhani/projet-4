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
}
?>