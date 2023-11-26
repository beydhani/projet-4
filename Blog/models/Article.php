<?php
// Article.php
// C'est le modèle qui va communiquer avec notre base de données pour la table articles.
// Il va gérer les données et les renvoyer au controleur ArticleController.php

//On requiert le fichier pour se connecter à la base de données.
require_once APP_ROOT .'/config/database.php';
//On crée une classe Article avec des méthodes qui vont servir à manipuler nos données.
class Article {
    //On déclare des variables qu'on va utiliser dans nos méthodes.
    private $conn;
    private $table_name = "articles";
    public $id;
    public $titre;
    public $extrait;
    public $contenu;
    public $date_publication;

    // Constructeur de classe.
    public function __construct($db) {
        $this->conn = $db;
    }
    // Méthode pour lire tous les articles
    public function lire() {
        // Requète SQL
        $query = "SELECT id, titre, extrait, contenu, date_publication FROM " . $this->table_name . " ORDER BY date_publication DESC";

        // Préparation de la requète avec PDO (méthode prepare de pdo)
        $stmt = $this->conn->prepare($query);

        // Execution de la requête
        $stmt->execute();

        // On retourne l'objet PDO $stmt
        return $stmt;
    }
    // Méthode pour lire un seul article par son titre
    public function lireUn($titre) {
        // La requète avec un placeholder pour le titre
        $query = "SELECT id, titre, extrait, contenu, date_publication FROM " . $this->table_name . " WHERE titre = ? LIMIT 0,1";

        // Préparation de la requète avec PDO (méthode prepare de pdo)
        $stmt = $this->conn->prepare($query);
        // Nettoyage du titre avec la méthode htmlspecialchars pour éviter les injections SQL et les failles XSS et striptags
        $titre = htmlspecialchars(strip_tags($titre));

        // Liaison du titre nettoyé au placeholder
        $stmt->bindParam(1, $titre);

        //Execution
        $stmt->execute();

        // On récupere le resultat sous forme de tableau associatif
        $row = $stmt->fetch(PDO::FETCH_ASSOC);

        // On assigne a chaque propriété la donnée correspondante.
        $this->id = $row['id'];
        $this->titre = $row['titre'];
        $this->extrait = $row['extrait'];
        $this->contenu = $row['contenu'];
        $this->date_publication = $row['date_publication'];
    }
    // Méthode pour lire un article par son ID
    public function lireUnParId() {
        // Requete
        $query = "SELECT id, titre, extrait, contenu, date_publication FROM " . $this->table_name . " WHERE id = :id LIMIT 0,1";
    
        // Préparation
        $stmt = $this->conn->prepare($query);
    
        // On lie l'id avec le placeholder
        $stmt->bindParam(':id', $this->id);
    
        // Execution
        $stmt->execute();
        // Récupération
        $row = $stmt->fetch(PDO::FETCH_ASSOC);
    
        // Assignation
        $this->id = $row['id'];
        $this->titre = $row['titre'];
        $this->extrait = $row['extrait'];
        $this->contenu = $row['contenu'];
        $this->date_publication = $row['date_publication'];
    }
    // Méthode pour supprimer un article.
    public function supprimer($id_article) {
        // Si $id_article n'est pas fourni on retourne false
        if (!$id_article) {
            return false;
        }
    
        // Requete
        $query = "DELETE FROM " . $this->table_name . " WHERE id = :id";
    
        // Preparation
        $stmt = $this->conn->prepare($query);
    
        // Nettoyage de $id_article
        $id_article = htmlspecialchars(strip_tags($id_article));
        // Liaison au placeholder
        $stmt->bindParam(':id', $id_article, PDO::PARAM_INT);
    
        // if else pour le booléen d'execution de la requete
        if ($stmt->execute()) {
            return true;
        }
    
        return false;
    }
    // Méthode pour obtenir l'id d'un article par son titre
    public function obtenirIdArticleParTitre($titre) {
        // Requete avec placeholder
        $query = "SELECT id FROM " . $this->table_name . " WHERE titre = :titre LIMIT 1";
        // Preparation
        $stmt = $this->conn->prepare($query);
        // Nettoyage
        $titre = htmlspecialchars(strip_tags($titre));
        // Liaison
        $stmt->bindParam(':titre', $titre);
        // Execution
        $stmt->execute();

        // Si la requete retourne un objet avec 1 row
        if ($stmt->rowCount() == 1) {
            // Récupération
            $row = $stmt->fetch(PDO::FETCH_ASSOC);
            // On retourne l'id
            return $row['id'];
        } else {
            // Sinon on retourne rien.
            return null; 
        }

    }
    // Méthode pour créer un article.
    public function creerArticle() {
        // Requete avec plein de placeholders
        $query = "INSERT INTO ". $this->table_name ." (titre, extrait, contenu, date_publication) VALUES (:titre, :extrait, :contenu, :date_publication)";
        // Preparation
        $stmt = $this->conn->prepare($query);
        // Nettoyage et liaison
        $this->titre = htmlspecialchars(strip_tags($this->titre));
        $this->extrait = htmlspecialchars(strip_tags($this->extrait));
        $this->contenu = $this->contenu;
        $this->date_publication = date('Y-m-d H:i:s');
        $stmt->bindParam(':titre', $this->titre);
        $stmt->bindParam(':extrait', $this->extrait);
        $stmt->bindParam(':contenu', $this->contenu);
        $stmt->bindParam(':date_publication', $this->date_publication);
        // Si la requete s'execute on retourne true
        if ($stmt->execute()) {
            return true;
        }
        // Sinon false par défaut
        return false;
    }
    // Méthode pour mettre à jour un article
    public function miseAJour() {
        // Requete
        $query = "UPDATE " . $this->table_name . " SET titre = :titre, extrait = :extrait, contenu = :contenu WHERE id = :id";
        // Preparation
        $stmt = $this->conn->prepare($query);
        // Nettoyage
        $this->titre = htmlspecialchars(strip_tags($this->titre));
        $this->extrait = htmlspecialchars(strip_tags($this->extrait));
        $this->contenu = $this->contenu;
        $this->id = htmlspecialchars(strip_tags($this->id));
        // Liaison
        $stmt->bindParam(':titre', $this->titre);
        $stmt->bindParam(':extrait', $this->extrait);
        $stmt->bindParam(':contenu', $this->contenu);
        $stmt->bindParam(':id', $this->id);
        // Si l'execution réussit on retourne true sinon false.
        if ($stmt->execute()) {
            return true;
        }

        return false;
    }
}
?>