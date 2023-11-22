<?php
// CommentairesController.php
// On require le fichier pour la db et les models Commentaire et article
require_once APP_ROOT . '/models/Commentaires.php';
require_once APP_ROOT . '/config/database.php';
require_once APP_ROOT . '/models/Article.php';

// La classe
class CommentairesController {
    // Les propriétés et le constructeur
    private $commentaireModel;
    private $articleModel;
    public function __construct() {
        $database = new Database();
        $db = $database->getConnection();
        $this->commentaireModel = new Commentaire($db);
        $this->articleModel = new Article($db);
    }
}
?>