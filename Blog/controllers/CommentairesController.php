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
    // Méthode pour afficher tous les commentaires liés à un article par son titre
    public function afficherCommentaires($titreArticle) {
        // On obtient l'ID de l'article par son titre avec la méthode du modèle article
        $idArticle = $this->articleModel->obtenirIdArticleParTitre($titreArticle);
        if ($titreArticle) {
            // On affecte l'ID obtenu à la propriété d'id d'article du modèle commentaire
            $this->commentaireModel->id_article = $idArticle;
            // On récupère tous les commentaires associés à l'article avec la méthode du modèle commentaire
            $commentaires = $this->commentaireModel->lireParArticle();
            // On démarre un tampon
            ob_start();
            // On iclut la vue
            include APP_ROOT . '/views/AfficherCommentaires.php'; 
            // On récupère le contenu du tampon dans content et on l'arrête
            $content = ob_get_clean();
            // On retourne content
            return $content;
        } else {
            echo 'Article non trouvé';
            return;
        }
    }
    // Méthode pour afficher les commentaires admin
    // Même fonctionnement que la précédente mais une vue différente
    public function afficherCommentairesAdmin($titreArticle) {
        $idArticle = $this->articleModel->obtenirIdArticleParTitre($titreArticle);
        if ($idArticle) {
            $this->commentaireModel->id_article = $idArticle;
            $commentaires = $this->commentaireModel->lireParArticle($idArticle);
            ob_start();
            include APP_ROOT.'/views/AfficherCommentairesAdmin.php';
            $content = ob_get_clean();
            return $content;
        } else {
            echo 'Article non trouvé.';
            return;
        }
    }
}
?>