<?php
// Administrateur.php
// C'est le modèle qui va communiquer avec notre base de données pour la table administrateur.
// Il va gérer les données et les renvoyer au controleur AdministrateurController.php


//On requiert le fichier pour se connecter à la base de données.
require_once (APP_ROOT .'/config/database.php');
//On crée une classe Administrateur avec des méthodes qui vont servir à manipuler nos données.
class Administrateur {
    //On déclare des propriétés qu'on va utiliser dans nos méthodes.
    private $conn;
    private $table_name = "administrateur";
    public $id;
    public $nom_utilisateur;
    public $mot_de_passe;
    // Constructeur de classe.
    public function __construct($db) {
        $this->conn = $db; //
    }
}