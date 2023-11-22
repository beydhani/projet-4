<?php
// Utilisateur.php

require_once APP_ROOT.'/config/database.php';

class Utilisateur {
    // Connexion à la base de données et nom de la table et propriétés
    private $conn;
    private $table_name = "utilisateurs";
    public $id;
    public $nom_utilisateur;
    public $email;
    public $mot_de_passe;

    // Constructeur avec $db comme connexion à la base de données
    public function __construct($db) {
        $this->conn = $db;
    }
    // Méthode pour inscrire un nouvel utilisateur
    public function inscrire() {
        // Vérifier si l'email existe déjà
        if ($this->emailExiste()) {
            return false;
        }
    
        // Vérifier si le nom d'utilisateur existe déjà
        if ($this->nomUtilisateurExiste()) {
            return false;
        }
    
        // Requête SQL pour insérer un nouvel utilisateur
        $query = "INSERT INTO " . $this->table_name . " SET nom_utilisateur=:nom_utilisateur, email=:email, mot_de_passe=:mot_de_passe";

        // Préparation de la requête
        $stmt = $this->conn->prepare($query);

        // Nettoyage des données
        $this->nom_utilisateur = htmlspecialchars(strip_tags($this->nom_utilisateur));
        $this->email = htmlspecialchars(strip_tags($this->email));
        $this->mot_de_passe = htmlspecialchars(strip_tags($this->mot_de_passe));
        //Hashage du mot de passe 
        $this->mot_de_passe = password_hash($this->mot_de_passe, PASSWORD_DEFAULT);
        // Liaison des paramètres
        $stmt->bindParam(':nom_utilisateur', $this->nom_utilisateur);
        $stmt->bindParam(':email', $this->email);
        $stmt->bindParam(':mot_de_passe', $this->mot_de_passe);

        // Exécution de la requête
        if ($stmt->execute()) {
            return true;
        }

        return false;
    
    }
    // Méthode pour vérifier si l'email existe déjà
    public function emailExiste() {
        // Requête pour vérifier si l'email existe déjà
        $query = "SELECT id FROM " . $this->table_name . " WHERE email = :email LIMIT 1";
    
        // Préparation de la requête
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(':email', $this->email);
        $stmt->execute();
        // Si l'objet a plus de 0 row l'email existe donc on retourne true
        if ($stmt->rowCount() > 0) {
            return true;
        }
        return false;
    }
}
?>