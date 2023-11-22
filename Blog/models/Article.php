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
}
?>