<?php
// Commentaires.php

require_once APP_ROOT.'/config/database.php';

class Commentaire {
    // Connexion à la base de données et nom de la table et autres propriétés
    private $conn;
    private $table_name = "commentaires";
    public $id;
    public $id_article;
    public $id_utilisateur;
    public $contenu;
    public $date_publication;
    public $signale;

    // Constructeur avec $db comme connexion à la base de données
    public function __construct($db) {
        $this->conn = $db;
    }

    // Méthode pour ajouter un nouveau commentaire
    public function ajouter() {
        // Requête SQL 
        $query = "INSERT INTO " . $this->table_name . " SET id_article=:id_article, id_utilisateur=:id_utilisateur, contenu=:contenu, date_publication=NOW()";

        // Préparation de la requête
        $stmt = $this->conn->prepare($query);

        // Nettoyage et liaison des données
        $this->id_article = htmlspecialchars(strip_tags($this->id_article));
        $this->id_utilisateur = htmlspecialchars(strip_tags($this->id_utilisateur));
        $this->contenu = htmlspecialchars(strip_tags($this->contenu));

        $stmt->bindParam(':id_article', $this->id_article);
        $stmt->bindParam(':id_utilisateur', $this->id_utilisateur);
        $stmt->bindParam(':contenu', $this->contenu);

        // Exécution de la requête et return true ou false
        if ($stmt->execute()) {
            return true;
        }

        return false;
    }

    // Méthode pour lire tous les commentaires d'un article
    public function lireParArticle() {
        // Requête
        $query = "SELECT c.id, c.id_article, c.contenu, c.date_publication, c.signalé, u.nom_utilisateur 
        FROM " . $this->table_name . " AS c
        JOIN utilisateurs AS u ON c.id_utilisateur = u.id
        WHERE c.id_article = ? 
        ORDER BY c.signalé DESC";
        // Préparation de la requête et liaison
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(1, $this->id_article);

        // Exécution de la requête
        $stmt->execute();
        // Retourne $stmt
        return $stmt;
    }

    // Méthode pour supprimer un commentaire
    public function supprimer() {
        // Requête SQL 
        $query = "DELETE FROM " . $this->table_name . " WHERE id = ?";

        // Préparation de la requête
        $stmt = $this->conn->prepare($query);

        // Liaison de l'id du commentaire à supprimer
        $stmt->bindParam(1, $this->id);

        // Exécution de la requête et return le booleen
        if ($stmt->execute()) {
            return true;
        }

        return false;
    }
    // Méthode pour signaler un commentaire
    public function signaler($id_commentaire) {
        // Préparation de la requête SQL pour incrémenter le compteur de signalement
        $query = "UPDATE " . $this->table_name . " SET signalé = signalé + 1 WHERE id = :id_commentaire";

        // Préparation de la déclaration
        $stmt = $this->conn->prepare($query);

        // Liaison du paramètre
        $stmt->bindParam(':id_commentaire', $id_commentaire);

        // Exécution de la requête
        if ($stmt->execute()) {
            return true;
        }

        return false;
    }
    // Supprimer les commentaires d'un article
    public function supprimerParArticle($id_article) {
        // Requête
        $query = "DELETE FROM " . $this->table_name . " WHERE id_article = :id_article";
        // Préparation et liaison
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(':id_article', $id_article, PDO::PARAM_INT);
        // Execution et return le booleen
        if ($stmt->execute()) {
            return true;
        }
        return false;
    }
}
?>