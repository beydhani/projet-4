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
}
?>