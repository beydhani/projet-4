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
}
?>