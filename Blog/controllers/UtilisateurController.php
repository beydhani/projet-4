<?php
// UtilisateurController.php

require_once APP_ROOT.'/models/Utilisateur.php';
require_once APP_ROOT.'/config/database.php';

class UtilisateurController {
    private $utilisateurModel;
    public function __construct() {
        $database = new Database();
        $db = $database->getConnection();
        $this->utilisateurModel = new Utilisateur($db);
    }
}
?>