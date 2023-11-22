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
}
?>