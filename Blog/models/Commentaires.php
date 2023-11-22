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
}
?>