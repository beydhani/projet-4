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
    // Méthode pour écrire un nouveau commentaire
    public function ecrireCommentaire() {
        // On assigne aux propriétés les données reçues
        $this->commentaireModel->id_article = $_POST['id_article'];
        $this->commentaireModel->id_utilisateur = $_POST['id_utilisateur']; 
        $this->commentaireModel->contenu = $_POST['contenu'];
        // On setup des flash_messages
        if ($this->commentaireModel->ajouter()) {
            $_SESSION['flash_messages']['success'] = "Commentaire ajouté avec succès.";
        } else {
            $_SESSION['flash_messages']['error'] = "Erreur lors de l'ajout du commentaire.";
        }
        // On redirige vers la page de l'article avec $_SERVER['HTTP_REFERER']
        header('Location: ' . $_SERVER['HTTP_REFERER']);
        exit;
    }
    // Méthode pour signaler un commentaire
    public function signalerCommentaire() {
        // On démarre une nouvelle session si y'en a pas déjà
        if (session_status() == PHP_SESSION_NONE) {
            session_start();
        }
        // On vérifie si l'utilisateur est connecté et si l'id du commentaire a été envoyé
        if (isset($_POST['id_commentaire']) && isset($_SESSION['nom_utilisateur'])) {
            // On récupère l'id du commentaire et on crée un identifiant pour le signalement
            $id_commentaire = $_POST['id_commentaire'];
            $commentSignalId = 'signal-' . $id_commentaire; 
            // On vérifie si le commentaire a pas encore été signalé 
            if (!isset($_SESSION['commentaires_signales'][$commentSignalId])) {
                // S'il a pas encore été signalé on appelle la méthode signaler du modèle
                // Si c'est bon on set les flash_messages success
                if ($this->commentaireModel->signaler($id_commentaire)) {
                    $_SESSION['flash_messages']['success'] = "Commentaire signalé avec succès.";
                } else {
                    // Sinon on set les flash messages error
                    $_SESSION['flash_messages']['error'] = "Erreur lors du signalement du commentaire.";
                }
                // On set le booléen à true pour indiquer qu'il a été signalé
                $_SESSION['commentaires_signales'][$commentSignalId] = true;
            } else {
                // S'il a déjà été signalé on en informe l'user
                $_SESSION['flash_messages']['info'] = "Vous avez déjà signalé ce commentaire.";
            }
        }
        // On redirige 
        header('Location: ' . $_SERVER['HTTP_REFERER']);
        exit;
    }
    // Méthode pour supprimer un commentaire par article
    public function supprimerCommentairesParArticle($id_article) {
        // On vérifie si l'id_article est fourni
        if (!$id_article) {
            echo ("id_article non fourni");
            return false;
        }
        // On utilise la méthode du modèle
        return $this->commentaireModel->supprimerParArticle($id_article);
    }
    // Méthode pour supprimer un commentaire 
    public function supprimerCommentaire() {
        // On vérifie qu'on a l'id du commentaire envoyé
        if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['id_commentaire'])) {
            // On assigne la valeur dans le modèle
            $id_commentaire = $_POST['id_commentaire'];
            $this->commentaireModel->id = $id_commentaire;
            // On execute la méthode de modèle et on met des flash_messages en fonction du résultat.
            if ($this->commentaireModel->supprimer()) {
                $_SESSION['flash_messages']['success'] = 'Commentaire supprimé avec succès.';
            } else {
                $_SESSION['flash_messages']['error'] = 'Erreur lors de la suppression du commentaire.';
            }
            // On renvoie vers la même page.
            header('Location: ' . $_SERVER['HTTP_REFERER']);
            exit;
        }
    }
}
?>