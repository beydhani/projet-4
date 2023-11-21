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
    // Méthode connecter
    public function connecter() {
        // Requête SQL pour vérifier les informations de l'administrateur
        $query = "SELECT id, nom_utilisateur, mot_de_passe FROM " . $this->table_name . " WHERE nom_utilisateur = :nom_utilisateur LIMIT 0,1";

        // Préparation de la requète avec PDO (méthode prepare de pdo)
        $stmt = $this->conn->prepare($query);

        // Nettoyage du nom d'utilisateur fourni pour éviter les injections SQL et les failles XSS
        $this->nom_utilisateur = htmlspecialchars(strip_tags($this->nom_utilisateur));
        //On lie le nom d'utilisateur fourni au paramètre de la requète avec bindParam
        $stmt->bindParam(':nom_utilisateur', $this->nom_utilisateur);

        // Exécution de la requête
        $stmt->execute();

        // On récupère la ligne de résultat sous forme de tableau associatif
        $row = $stmt->fetch(PDO::FETCH_ASSOC);

        // On vérifie le mot de passe fourni avec le mot de passe dans le tableau récupéré
        //  avec la méthode password_verify
        //Si c'est bon on assigne l'id à notre objet et on retourne true
        if (password_verify($this->mot_de_passe, $row['mot_de_passe'])) {
            $this->id = $row['id'];
            return true;
        }
        // Sinon on retourne false
        return false;
    }
}